<?php
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');

header('Content-Type: application/json');

// Crear tabla si no existe
$conn->query("CREATE TABLE IF NOT EXISTS job_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    celular VARCHAR(50) DEFAULT NULL,
    mensaje TEXT NOT NULL,
    cv_path VARCHAR(512) DEFAULT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

// Validaciones básicas
$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$celular = trim($_POST['celular'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

if ($nombre === '' || $email === '' || $mensaje === '') {
    echo json_encode(['success' => false, 'message' => 'Campos obligatorios faltantes']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Email inválido']);
    exit;
}

// Manejo de subida de CV (opcional)
$cvPath = null;
if (!empty($_FILES['cv']['name'])) {
    $allowed = ['pdf','doc','docx'];
    $maxSize = 5 * 1024 * 1024; // 5MB
    $ext = strtolower(pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) {
        echo json_encode(['success' => false, 'message' => 'Tipo de archivo no permitido']);
        exit;
    }
    if ($_FILES['cv']['size'] > $maxSize) {
        echo json_encode(['success' => false, 'message' => 'El archivo supera el tamaño máximo (5MB)']);
        exit;
    }

    $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $safeName = preg_replace('/[^a-zA-Z0-9_\.-]/','_', basename($_FILES['cv']['name']));
    $fileName = date('Ymd_His') . '_' . $safeName;
    $targetPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
    if (!move_uploaded_file($_FILES['cv']['tmp_name'], $targetPath)) {
        echo json_encode(['success' => false, 'message' => 'Error al subir el CV']);
        exit;
    }
    $cvPath = 'uploads/' . $fileName;
}

$stmt = $conn->prepare("INSERT INTO job_applications (nombre, email, celular, mensaje, cv_path) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('sssss', $nombre, $email, $celular, $mensaje, $cvPath);
$ok = $stmt->execute();
$stmt->close();

if ($ok) {
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
