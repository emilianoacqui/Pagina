<?php
header('Content-Type: application/json; charset=utf-8');
require_once(__DIR__ . '/../../MODELO/config/bootstrap.php');
require_once(__DIR__ . '/../../MODELO/Auth/UserModel.php');

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

// Enforce dominio institucional también en backend
if (!preg_match('/@scuolaitaliana\.edu\.uy$/i', $email)) {
  echo json_encode(['ok' => false, 'error' => 'Debe usar un correo @scuolaitaliana.edu.uy']);
  exit;
}

// Check if email already exists using UserModel
$userModel = new UserModel();
if ($userModel->checkEmailExists($email)) {
  echo json_encode(['ok' => false, 'error' => 'El correo ya está registrado']);
  exit;
}

// Register user using UserModel
$result = $userModel->registerUser($email, $pass, 'alumno');

if ($result['success']) {
  echo json_encode(['ok' => true, 'message' => 'Registro exitoso']);
} else {
  echo json_encode(['ok' => false, 'error' => 'Error al registrar: ' . $result['error']]);
}
?>