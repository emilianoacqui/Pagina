<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
    exit;
}

$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$nivel = trim($_POST['nivel'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');
$como_se_entero_array = $_POST['como_se_entero'] ?? [];
$como_se_entero = is_array($como_se_entero_array) ? implode(', ', $como_se_entero_array) : '';

// Validaciones básicas
if (empty($nombre) || empty($email) || empty($telefono) || empty($mensaje)) {
    echo json_encode(['success' => false, 'error' => 'Todos los campos obligatorios deben ser completados']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'Email inválido']);
    exit;
}

// Crear tabla si no existe
$createTable = "
CREATE TABLE IF NOT EXISTS admisiones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    nivel VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL,
    como_se_entero VARCHAR(255),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('nuevo', 'contactado', 'procesado') DEFAULT 'nuevo'
)";

if (!$conn->query($createTable)) {
    echo json_encode(['success' => false, 'error' => 'Error al crear tabla: ' . $conn->error]);
    exit;
}

// Insertar datos
$stmt = $conn->prepare("
    INSERT INTO admisiones (nombre, email, telefono, nivel, mensaje, como_se_entero) 
    VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->bind_param("ssssss", $nombre, $email, $telefono, $nivel, $mensaje, $como_se_entero);

if ($stmt->execute()) {
    echo json_encode([
        'success' => true, 
        'message' => 'Solicitud enviada correctamente. Nos pondremos en contacto contigo pronto.'
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al guardar la solicitud: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
