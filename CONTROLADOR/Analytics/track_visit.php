<?php
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');

header('Content-Type: application/json');

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
    $sessionId = session_id();
    
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
