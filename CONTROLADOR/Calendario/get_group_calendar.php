<?php
session_start();
require_once('../../MODELO/config/bootstrap.php');

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
    // Verificar que el profesor pertenece a esta clase
    $stmt = $conn->prepare("
        SELECT 1 FROM usuarios_clases 
        WHERE id_usuario = ? AND id_clase = ? AND rol_en_clase = 'profesor'
    ");
    $stmt->bind_param("ii", $id_profesor, $id_clase);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows === 0) {
        http_response_code(403);
        echo json_encode(['error' => 'No tienes acceso a esta clase']);
        exit;
    }
    $stmt->close();
    
    // Obtener información de la clase
    $stmt = $conn->prepare("SELECT nombre, año FROM clases WHERE id_clase = ?");
    $stmt->bind_param("i", $id_clase);
    $stmt->execute();
    $clase = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    
    // Obtener todos los eventos de esta clase (de todos los profesores)
    $stmt = $conn->prepare("
        SELECT cal.id, cal.fecha, cal.tipo, cal.descripcion, u.nombre as profesor_nombre
        FROM calendario cal
        JOIN usuarios u ON cal.creado_por = u.id_usuario
        WHERE cal.id_clase = ?
        ORDER BY cal.fecha ASC
    ");
    $stmt->bind_param("i", $id_clase);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $eventos = [];
    while ($row = $result->fetch_assoc()) {
        $eventos[] = [
            'id' => $row['id'],
            'title' => ucfirst($row['tipo']) . ' - ' . $row['profesor_nombre'],
            'start' => $row['fecha'],
            'allDay' => true,
            'color' => getEventColor($row['tipo']),
            'extendedProps' => [
                'tipo' => $row['tipo'],
                'profesor' => $row['profesor_nombre'],
                'descripcion' => $row['descripcion']
            ]
        ];
    }
    $stmt->close();
    
    echo json_encode([
        'clase' => $clase,
        'eventos' => $eventos
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
}

function getEventColor($tipo) {
    switch ($tipo) {
        case 'tarea':
            return '#3498db'; // Azul
        case 'examen':
            return '#e74c3c'; // Rojo
        case 'prueba':
            return '#9b59b6'; // Púrpura
        case 'oral':
            return '#e67e22'; // Naranja oscuro
        case 'proyecto':
            return '#27ae60'; // Verde
        case 'entrega':
            return '#f39c12'; // Naranja
        case 'otro':
            return '#95a5a6'; // Gris
        default:
            return '#95a5a6'; // Gris
    }
}
?>
