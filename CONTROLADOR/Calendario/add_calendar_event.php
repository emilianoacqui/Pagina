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

// Verificar que sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

try {
    // Obtener datos del POST
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        http_response_code(400);
        echo json_encode(['error' => 'Datos JSON inválidos']);
        exit;
    }
    
    $id_clase = intval($input['id_clase'] ?? 0);
    $fecha = $input['fecha'] ?? '';
    $tipo = $input['tipo'] ?? '';
    $descripcion = trim($input['descripcion'] ?? '');
    
    // Validar datos
    if (!$id_clase || !$fecha || !$tipo) {
        http_response_code(400);
        echo json_encode(['error' => 'Faltan datos requeridos']);
        exit;
    }
    
    // Validar tipo
    $tipos_validos = ['tarea', 'examen', 'prueba', 'oral', 'proyecto', 'entrega', 'otro'];
    if (!in_array($tipo, $tipos_validos)) {
        http_response_code(400);
        echo json_encode(['error' => 'Tipo de tarea inválido']);
        exit;
    }
    
    // Validar que el profesor pertenece a la clase
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
    
    // Insertar la nueva tarea
    $stmt = $conn->prepare("
        INSERT INTO calendario (id_clase, fecha, tipo, descripcion, creado_por) 
        VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("isssi", $id_clase, $fecha, $tipo, $descripcion, $id_profesor);
    
    if ($stmt->execute()) {
        $nueva_id = $conn->insert_id;
        
        // Obtener información completa de la tarea creada
        $stmt2 = $conn->prepare("
            SELECT cal.id, cal.fecha, cal.tipo, cal.descripcion, c.nombre as clase_nombre, c.año, u.nombre as profesor_nombre
            FROM calendario cal
            JOIN clases c ON cal.id_clase = c.id_clase
            JOIN usuarios u ON cal.creado_por = u.id_usuario
            WHERE cal.id = ?
        ");
        $stmt2->bind_param("i", $nueva_id);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $tarea = $result->fetch_assoc();
        $stmt2->close();
        
        // Preparar respuesta
        $evento = [
            'id' => $tarea['id'],
            'title' => ucfirst($tarea['tipo']) . ' - ' . $tarea['año'] . '° ' . $tarea['clase_nombre'],
            'start' => $tarea['fecha'],
            'allDay' => true,
            'color' => getEventColor($tarea['tipo']),
            'extendedProps' => [
                'tipo' => $tarea['tipo'],
                'clase' => $tarea['año'] . '° ' . $tarea['clase_nombre'],
                'descripcion' => $tarea['descripcion'],
                'profesor' => $tarea['profesor_nombre'],
                'es_mi_tarea' => true
            ]
        ];
        
        echo json_encode([
            'success' => true,
            'message' => 'Tarea agregada correctamente',
            'evento' => $evento
        ]);
        
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Error al guardar la tarea: ' . $stmt->error]);
    }
    
    $stmt->close();
    
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
