<?php
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');

header('Content-Type: application/json');

// Función para obtener estadísticas
function getPageStats($conn) {
    $stats = [];
    
    // Páginas más visitadas (últimos 30 días)
    $sql = "SELECT page_url, page_title, COUNT(*) as visits 
            FROM page_analytics 
            WHERE visit_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)
            GROUP BY page_url, page_title 
            ORDER BY visits DESC 
            LIMIT 10";
    
    $result = $conn->query($sql);
    $stats['top_pages'] = [];
    while ($row = $result->fetch_assoc()) {
        $stats['top_pages'][] = [
            'url' => $row['page_url'],
            'title' => $row['page_title'] ?: basename($row['page_url']),
            'visits' => (int)$row['visits']
        ];
    }
    
    // Visitas por día (últimos 7 días)
    $sql = "SELECT DATE(visit_date) as date, COUNT(*) as visits 
            FROM page_analytics 
            WHERE visit_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)
            GROUP BY DATE(visit_date) 
            ORDER BY date ASC";
    
    $result = $conn->query($sql);
    $stats['daily_visits'] = [];
    while ($row = $result->fetch_assoc()) {
        $stats['daily_visits'][] = [
            'date' => $row['date'],
            'visits' => (int)$row['visits']
        ];
    }
    
    // Visitas por hora (promedio)
    $sql = "SELECT HOUR(visit_date) as hour, COUNT(*) as visits 
            FROM page_analytics 
            WHERE visit_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)
            GROUP BY HOUR(visit_date) 
            ORDER BY hour ASC";
    
    $result = $conn->query($sql);
    $stats['hourly_visits'] = [];
    while ($row = $result->fetch_assoc()) {
        $stats['hourly_visits'][] = [
            'hour' => (int)$row['hour'],
            'visits' => (int)$row['visits']
        ];
    }
    
    // Total de visitas únicas (por IP)
    $sql = "SELECT COUNT(DISTINCT ip_address) as unique_visitors 
            FROM page_analytics 
            WHERE visit_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stats['unique_visitors'] = (int)$row['unique_visitors'];
    
    // Total de visitas
    $sql = "SELECT COUNT(*) as total_visits 
            FROM page_analytics 
            WHERE visit_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stats['total_visits'] = (int)$row['total_visits'];
    
    return $stats;
}

// Obtener estadísticas
$stats = getPageStats($conn);
echo json_encode($stats);

$conn->close();
?>
