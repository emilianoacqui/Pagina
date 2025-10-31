<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');
require_once(__DIR__ . '/../../MODELO/Auth/UserModel.php');

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

// Hardcoded gestor account
if ($email === 'gestor@scuolaitaliana.edu.uy' && $pass === 'gestor123') {
  $_SESSION['id_usuario'] = 0;
  $_SESSION['nombre']     = 'Gestor';
  $_SESSION['email']      = $email;
  $_SESSION['rol']        = 'gestor';
  echo json_encode(['ok' => true, 'redirect' => '../../VISTA/PaginaWeb/Pagina/gestorCont.php']);
  exit;
}

// Use UserModel for authentication
$userModel = new UserModel();
$result = $userModel->authenticateUser($email, $pass);

if (!$result['success']) {
  echo json_encode(['ok' => false, 'error' => $result['error']]);
  exit;
}

// Login OK: guardamos sesión
$user = $result['user'];
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