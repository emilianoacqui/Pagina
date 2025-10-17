<?php
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');

header('Content-Type: application/json');

// Iniciar sesión para disponer de session_id
if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}

// Crear tabla de analytics si no existe
$conn->query("CREATE TABLE IF NOT EXISTS page_analytics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_url VARCHAR(500) NOT NULL,
    page_title VARCHAR(255) DEFAULT NULL,
    visit_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    user_agent TEXT,
    ip_address VARCHAR(45),
    referrer VARCHAR(500) DEFAULT NULL,
    session_id VARCHAR(100) DEFAULT NULL,
    INDEX idx_page_url (page_url),
    INDEX idx_visit_date (visit_date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

// Recibir datos via POST
$pageUrl = $_POST['page_url'] ?? '';
$pageTitle = $_POST['page_title'] ?? '';
$referrer = $_POST['referrer'] ?? '';

if ($pageUrl) {
    // Obtener información del visitante
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $ipAddress = $_SERVER['REMOTE_ADDR'] ?? '';
    $sessionId = session_id() ?: '';

    // Filtrar bots/crawlers comunes (no contar)
    if ($userAgent && preg_match('/bot|crawl|spider|slurp|bing|duckduck|baidu|yandex|crawler/i', $userAgent)) {
        echo json_encode(['success' => true, 'message' => 'Visita ignorada (bot)']);
        $conn->close();
        exit;
    }

    // Evitar sobreconteo: 1 visita por (page_url, session/ip) en una ventana de 30 minutos
    $sqlCheck = "SELECT COUNT(*) as c FROM page_analytics 
                 WHERE page_url = ? 
                   AND (session_id = ? OR ip_address = ?) 
                   AND visit_date >= DATE_SUB(NOW(), INTERVAL 30 MINUTE)";
    if ($stmtCheck = $conn->prepare($sqlCheck)) {
        $stmtCheck->bind_param('sss', $pageUrl, $sessionId, $ipAddress);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();
        $row = $result ? $result->fetch_assoc() : ['c' => 0];
        $stmtCheck->close();

        if ((int)$row['c'] > 0) {
            echo json_encode(['success' => true, 'message' => 'Visita ya registrada (deduplicada)']);
            $conn->close();
            exit;
        }
    }

    // Insertar visita
    $stmt = $conn->prepare("INSERT INTO page_analytics (page_url, page_title, user_agent, ip_address, referrer, session_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssss', $pageUrl, $pageTitle, $userAgent, $ipAddress, $referrer, $sessionId);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Visita registrada']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar visita']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'URL de página requerida']);
}

$conn->close();
?>
