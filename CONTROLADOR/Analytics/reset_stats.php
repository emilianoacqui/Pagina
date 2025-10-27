<?php
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');
require_once(__DIR__ . '/../../MODELO/Analytics/AnalyticsModel.php');

header('Content-Type: application/json');

// Verificar que el usuario esté autenticado y tenga permisos
session_start();
if (!isset($_SESSION['id_usuario']) || !in_array($_SESSION['rol'], ['admin', 'gestor'])) {
    echo json_encode(['success' => false, 'message' => 'No tienes permisos para realizar esta acción']);
    exit;
}

// Verificar método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// Verificar confirmación
$confirm = $_POST['confirm'] ?? '';
if ($confirm !== 'RESET_STATS') {
    echo json_encode(['success' => false, 'message' => 'Confirmación requerida']);
    exit;
}

try {
    // Use AnalyticsModel to reset stats
    $model = new AnalyticsModel($conn);
    $result = $model->resetStats();
    
    if ($result['success']) {
        // Log de la acción
        $logMessage = "Usuario " . $_SESSION['nombre'] . " (" . $_SESSION['rol'] . ") reseteó las estadísticas de analytics.";
        error_log($logMessage);
        
        echo json_encode([
            'success' => true, 
            'message' => $result['message'] ?? 'Estadísticas reseteadas correctamente'
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al resetear las estadísticas']);
    }
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}

$conn->close();
?>
