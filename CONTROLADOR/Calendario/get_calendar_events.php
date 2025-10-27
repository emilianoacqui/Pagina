<?php
session_start();
require_once('../../MODELO/config/bootstrap.php');
require_once('../../MODELO/Calendario/CalendarModel.php');

header('Content-Type: application/json');

// Verificar autenticación
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['rol'])) {
    http_response_code(401);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

$id_usuario = intval($_SESSION['id_usuario']);
$rol = $_SESSION['rol'];

try {
    // Use CalendarModel to get events
    $calendarModel = new CalendarModel();
    
    if ($rol === 'alumno' || $rol === 'profesor') {
        $userName = $_SESSION['nombre'] ?? null;
        $eventos = $calendarModel->getCalendarEvents($id_usuario, $rol, $userName);
        echo json_encode($eventos);
    } else {
        echo json_encode([]);
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
}
?>
