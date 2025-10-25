<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<?php 
$menuTarget = isset($menuTarget) ? $menuTarget : 'menuScuola.php'; 
// Si estamos en modo admin, propagar el token al destino del menú
$menuHref = $menuTarget;
if (isset($_GET['cms_admin_token']) && $_GET['cms_admin_token'] === 'true') {
    $menuHref .= (strpos($menuHref, '?') !== false ? '&' : '?') . 'cms_admin_token=true';
}
?>
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo">
        </div>
        <div class="nav-menu-button" onclick="window.location.href='<?php echo htmlspecialchars($menuHref, ENT_QUOTES); ?>'">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>
