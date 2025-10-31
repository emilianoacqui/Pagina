<?php
session_start();
require_once('../../MODELO/config/bootstrap.php');
require_once('../../MODELO/Calendario/CalendarModel.php');

header('Content-Type: application/json');

// Verificar que sea profesor
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'profesor') {
    http_response_code(401);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

$id_profesor = intval($_SESSION['id_usuario']);
$id_clase = isset($_GET['id_clase']) ? intval($_GET['id_clase']) : 0;

if (!$id_clase) {
    http_response_code(400);
    echo json_encode(['error' => 'ID de clase requerido']);
    exit;
}

try {
    // Use CalendarModel
    $calendarModel = new CalendarModel();
    
    // Verificar que el profesor pertenece a esta clase
    if (!$calendarModel->verifyUserClassAccess($id_profesor, $id_clase, 'profesor')) {
        http_response_code(403);
        echo json_encode(['error' => 'No tienes acceso a esta clase']);
        exit;
    }
    
    // Get class info
    $clase = $calendarModel->getClassInfo($id_clase);
    
    // Get events for this class
    $eventos = $calendarModel->getClassEvents($id_clase);
    
    echo json_encode([
        'clase' => $clase,
        'eventos' => $eventos
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
}
?>
