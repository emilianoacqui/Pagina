<?php
session_start();
session_unset();
session_destroy();
header('Location: ../../VISTA/PaginaWeb/Pagina/index.php');
exit;
?>