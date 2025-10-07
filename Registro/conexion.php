<?php
$host = "localhost";
$user = "root";
$pass = "";        // en XAMPP suele estar vacío
$db   = "sigie";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  http_response_code(500);
  die("Error de conexión: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
