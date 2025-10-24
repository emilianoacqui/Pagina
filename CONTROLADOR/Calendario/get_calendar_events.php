<?php
session_start();
require_once('../../MODELO/config/bootstrap.php');

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
    $eventos = [];
    
    if ($rol === 'alumno') {
        // Obtener clases del alumno
        $stmt = $conn->prepare("
            SELECT c.id_clase, c.nombre, c.año
            FROM clases c
            JOIN usuarios_clases uc ON c.id_clase = uc.id_clase
            WHERE uc.id_usuario = ? AND uc.rol_en_clase = 'alumno'
        ");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $clases_ids = [];
        while ($row = $result->fetch_assoc()) {
            $clases_ids[] = $row['id_clase'];
        }
        $stmt->close();
        
        if (!empty($clases_ids)) {
            $in = implode(',', array_map('intval', $clases_ids));
            $sql = "SELECT cal.id, cal.fecha, cal.tipo, cal.descripcion, c.nombre as clase_nombre, c.año
                    FROM calendario cal
                    JOIN clases c ON cal.id_clase = c.id_clase
                    WHERE cal.id_clase IN ($in)
                    ORDER BY cal.fecha ASC";
            
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $eventos[] = [
                    'id' => $row['id'],
                    'title' => ucfirst($row['tipo']) . ' - ' . $row['año'] . '° ' . $row['clase_nombre'],
                    'start' => $row['fecha'],
                    'allDay' => true,
                    'color' => getEventColor($row['tipo']),
                    'extendedProps' => [
                        'tipo' => $row['tipo'],
                        'clase' => $row['año'] . '° ' . $row['clase_nombre'],
                        'descripcion' => $row['descripcion']
                    ]
                ];
            }
        }
        
    } elseif ($rol === 'profesor') {
        // Obtener clases del profesor
        $stmt = $conn->prepare("
            SELECT c.id_clase, c.nombre, c.año
            FROM clases c
            JOIN usuarios_clases uc ON c.id_clase = uc.id_clase
            WHERE uc.id_usuario = ? AND uc.rol_en_clase = 'profesor'
        ");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $clases_ids = [];
        while ($row = $result->fetch_assoc()) {
            $clases_ids[] = $row['id_clase'];
        }
        $stmt->close();
        
        if (!empty($clases_ids)) {
            $in = implode(',', array_map('intval', $clases_ids));
            $sql = "SELECT cal.id, cal.fecha, cal.tipo, cal.descripcion, c.nombre as clase_nombre, c.año, u.nombre as profesor_nombre
                    FROM calendario cal
                    JOIN clases c ON cal.id_clase = c.id_clase
                    JOIN usuarios u ON cal.creado_por = u.id_usuario
                    WHERE cal.id_clase IN ($in)
                    ORDER BY cal.fecha ASC";
            
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $eventos[] = [
                    'id' => $row['id'],
                    'title' => ucfirst($row['tipo']) . ' - ' . $row['año'] . '° ' . $row['clase_nombre'],
                    'start' => $row['fecha'],
                    'allDay' => true,
                    'color' => getEventColor($row['tipo']),
                    'extendedProps' => [
                        'tipo' => $row['tipo'],
                        'clase' => $row['año'] . '° ' . $row['clase_nombre'],
                        'descripcion' => $row['descripcion'],
                        'profesor' => $row['profesor_nombre']
                    ]
                ];
            }
        }
    }
    
    echo json_encode($eventos);
    
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
        case 'otro':
            return '#f39c12'; // Naranja
        default:
            return '#95a5a6'; // Gris
    }
}
?>
