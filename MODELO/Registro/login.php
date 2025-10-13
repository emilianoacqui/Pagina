<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__ . '/../config/bootstrap.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['ok' => false, 'error' => 'Método no permitido']);
  exit;
}

$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';

if ($email === '' || $pass === '') {
  echo json_encode(['ok' => false, 'error' => 'Email y contraseña son obligatorios']);
  exit;
}

$stmt = $conn->prepare("SELECT id_usuario, nombre, email, password, rol FROM usuarios WHERE email=? LIMIT 1");
if (!$stmt) {
  echo json_encode(['ok' => false, 'error' => 'Error en la base de datos: ' . $conn->error]);
  exit;
}
$stmt->bind_param("s", $email);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_assoc();

if (!$user || !password_verify($pass, $user['password'])) {
  echo json_encode(['ok' => false, 'error' => 'Credenciales inválidas']);
  exit;
}

/* Login OK: guardamos sesión */
$_SESSION['id_usuario'] = $user['id_usuario'];
$_SESSION['nombre']     = $user['nombre'];
$_SESSION['email']      = $user['email'];
$_SESSION['rol']        = $user['rol'];

/* Redirección por rol */
$redirect = '../../MODELO/Registro/dashboard.php';
if ($user['rol'] === 'coordinador') {
    $redirect = '../../VISTA/Paneles/html/coordinador_panel.php';
} elseif ($user['rol'] === 'profesor') {
    $redirect = '../../VISTA/Paneles/html/profesor_panel.php';
} elseif ($user['rol'] === 'alumno') {
    $redirect = '../../VISTA/Paneles/html/alumno_panel.php';
}
echo json_encode(['ok' => true, 'redirect' => $redirect]);
exit();
?>
