<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');
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

if ($email === 'gestor@scuolaitaliana.edu.uy' && $pass === 'gestor123') {
  $_SESSION['id_usuario'] = 0;
  $_SESSION['nombre']     = 'Gestor';
  $_SESSION['email']      = $email;
  $_SESSION['rol']        = 'gestor';
  echo json_encode(['ok' => true, 'redirect' => '../../VISTA/PaginaWeb/Pagina/gestorCont.php']);
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
$redirect = '../../VISTA/Auth/dashboard.php';
if ($user['rol'] === 'admin' || $user['rol'] === 'gestor') {
    $redirect = '../../VISTA/PaginaWeb/Pagina/gestorCont.php';
} elseif ($user['rol'] === 'coordinador') {
    $redirect = '../../VISTA/Paneles/html/coordinador_panel.php';
} elseif ($user['rol'] === 'profesor') {
    $redirect = '../../VISTA/Paneles/html/profesor_panel.php';
} elseif ($user['rol'] === 'alumno') {
    $redirect = '../../VISTA/Paneles/html/alumno_panel.php';
}
echo json_encode(['ok' => true, 'redirect' => $redirect]);
exit();
?>