<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
  header('Location: ../../VISTA/Auth/index.php');
  exit;
}
$rol = $_SESSION['rol'] ?? 'desconocido';
?>
<!doctype html>
<html lang="es"><meta charset="utf-8">
<title>Panel</title>
<body>
  <h1>Bienvenido, <?=htmlspecialchars($_SESSION['nombre'])?> (<?=htmlspecialchars($rol)?>)</h1>
  <p>Acá va el panel del rol.</p>
  <form method="post" action="../../CONTROLADOR/Auth/logout.php"><button>Cerrar sesión</button></form>
</body>
</html>
