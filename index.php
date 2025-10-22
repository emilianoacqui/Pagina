<?php
// Redirección central a la vista pública, preservando parámetros de la URL
$target = 'VISTA/PaginaWeb/Pagina/index.php';
$query  = $_SERVER['QUERY_STRING'] ?? '';
if ($query !== '') {
    $target .= (strpos($target, '?') === false ? '?' : '&') . $query;
}
// Redirección por header (server-side)
header('Cache-Control: no-store');
header('Location: ' . $target, true, 302);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="0;url=<?php echo htmlspecialchars($target, ENT_QUOTES, 'UTF-8'); ?>">
  <title>Redireccionando…</title>
  <script>
    (function(){
      var target = <?php echo json_encode($target); ?>;
      // Fallback JS por si el header/meta fallan
      try { window.location.replace(target); } catch(e) { window.location.href = target; }
    })();
  </script>
</head>
<body>
  <p>Redirigiendo a <a href="<?php echo htmlspecialchars($target, ENT_QUOTES, 'UTF-8'); ?>">la página principal</a>…</p>
</body>
</html>
