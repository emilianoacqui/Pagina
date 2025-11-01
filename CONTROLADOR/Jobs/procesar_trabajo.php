<?php
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');
require_once(__DIR__ . '/../../MODELO/Jobs/JobApplicationModel.php');

header('Content-Type: application/json');

// Validaciones básicas
$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$celular = trim($_POST['celular'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

// Validar campos obligatorios
if ($nombre === '' || $email === '' || $mensaje === '') {
    echo json_encode(['success' => false, 'message' => 'Por favor complete todos los campos obligatorios']);
    exit;
}

// Validar que el mensaje no contenga URLs inválidas
if (preg_match('/\b(https?:\/\/|www\.)[^\s]+/i', $mensaje)) {
    echo json_encode(['success' => false, 'message' => 'No se permiten enlaces web en el mensaje']);
    exit;
}

// Validar que el nombre no contenga URLs
if (preg_match('/\b(https?:\/\/|www\.)[^\s]+/i', $nombre)) {
    echo json_encode(['success' => false, 'message' => 'El nombre no puede contener enlaces web']);
    exit;
}

// Validar que el celular solo contenga números, espacios, guiones y paréntesis
if (!empty($celular) && !preg_match('/^[0-9\s\-()]+$/', $celular)) {
    echo json_encode(['success' => false, 'message' => 'El número de celular contiene caracteres inválidos']);
    exit;
}

// Use JobApplicationModel
$jobModel = new JobApplicationModel();

// Validate email
if (!$jobModel->validateEmail($email)) {
    echo json_encode(['success' => false, 'message' => 'Email inválido']);
    exit;
}

// Handle CV upload if provided
$cvPath = null;
if (!empty($_FILES['cv']['name'])) {
    // Validate file
    $fileValidation = $jobModel->validateFile($_FILES['cv']);
    if (!$fileValidation['valid']) {
        echo json_encode(['success' => false, 'message' => $fileValidation['error']]);
        exit;
    }
    
    // Upload file
    $uploadResult = $jobModel->uploadCV($_FILES['cv']);
    if (!$uploadResult['success']) {
        echo json_encode(['success' => false, 'message' => $uploadResult['error']]);
        exit;
    }
    $cvPath = $uploadResult['path'];
}

// Submit application using model
$success = $jobModel->submitApplication($nombre, $email, $celular, $mensaje, $cvPath);

if ($success) {
    // Respuesta para peticiones HTML (form normal) o AJAX
    if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') === false) {
        header('Location: ../../VISTA/PaginaWeb/Pagina/trabaja-con-nosotros.php?enviado=1');
        exit;
    }
    echo json_encode(['success' => true, 'message' => 'Solicitud enviada correctamente']);
} else {
    echo json_encode(['success' => false, 'message' => 'No se pudo guardar la solicitud']);
}
?>
