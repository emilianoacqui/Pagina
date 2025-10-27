<?php
session_start();
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');
require_once(__DIR__ . '/../../MODELO/Paneles/StudentModel.php');

// Verificar autenticación de alumno
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'alumno') {
    http_response_code(401);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

$idAlumno = intval($_SESSION['id_usuario']);
$studentModel = new StudentModel();

// Obtener todas las clases del alumno
$clasesAlumno = $studentModel->getStudentClasses($idAlumno);

$classIds = [];
foreach ($clasesAlumno as $clase) {
    $classIds[] = $clase['id_clase'];
}

// Obtener profesores por clase
$profesoresPorClase = [];
if (!empty($classIds)) {
    $profesoresPorClase = $studentModel->getTeachersByClass($classIds);
}

// Obtener eventos
$eventos = [];
if (!empty($classIds)) {
    $eventos = $studentModel->getEventsForClasses($classIds);
} else {
    $eventos = $studentModel->getGeneralEvents();
}

// Obtener calendario por clase
$calendarioPorClase = [];
$fechasProximas = [];
if (!empty($classIds)) {
    $calendarioPorClase = $studentModel->getCalendarByClass($classIds);
    $fechasProximas = $studentModel->getUpcomingDates($classIds);
}

// Retornar datos como JSON para el panel
header('Content-Type: application/json');

$data = [
    'clases_alumno' => $clasesAlumno,
    'profesores_por_clase' => $profesoresPorClase,
    'eventos' => $eventos,
    'calendario_por_clase' => $calendarioPorClase,
    'fechas_proximas' => $fechasProximas,
    'id_alumno' => $idAlumno,
    'nombre' => $_SESSION['nombre'] ?? ''
];

echo json_encode($data);
?>

