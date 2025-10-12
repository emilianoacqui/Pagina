<?php
// conexion.php
$host = "localhost";  // Servidor de la base de datos
$usuario = "root";    // Usuario de MySQL (por defecto es root)
$password = "";       // Contraseña de MySQL (por defecto vacía en XAMPP)
$basedatos = "sigie";  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $password, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configurar charset
$conn->set_charset("utf8");
?>