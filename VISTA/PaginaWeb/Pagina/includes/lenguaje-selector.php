<?php
// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Establecer idioma por defecto si no existe
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'es'; // Español por defecto
}

// Cambiar idioma si se recibe por GET
if (isset($_GET['lang']) && in_array($_GET['lang'], ['es', 'en', 'it'])) {
    $_SESSION['lang'] = $_GET['lang'];
    // Recargar la página sin el parámetro lang en la URL
    $redirect_url = strtok($_SERVER["REQUEST_URI"], '?');
    header("Location: $redirect_url");
    exit();
}

// Cargar el archivo de traducciones correspondiente
$lang_file = __DIR__ . '/translations/' . $_SESSION['lang'] . '.php';
if (file_exists($lang_file)) {
    require_once $lang_file;
} else {
    // Si no existe el archivo, cargar español por defecto
    require_once __DIR__ . '/translations/es.php';
}

// Función para obtener traducciones
function t($key) {
    global $translations;
    return isset($translations[$key]) ? $translations[$key] : $key;
}
?>

<?php if (!isset($render_language_selector) || $render_language_selector): ?>
<div class="language-selector">
    <button class="lang-toggle" id="langToggle" aria-label="Selector de idioma">
        <span class="current-lang">
            <?php 
            $flags = [
                'es' => '🇪🇸',
                'en' => '🇬🇧',
                'it' => '🇮🇹'
            ];
            echo $flags[$_SESSION['lang']];
            ?>
            <span class="lang-code"><?php echo strtoupper($_SESSION['lang']); ?></span>
        </span>
        <svg class="arrow-icon" width="12" height="12" viewBox="0 0 12 12" fill="none">
            <path d="M2 4L6 8L10 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </button>
    
    <div class="lang-dropdown" id="langDropdown">
        <a href="?lang=es" class="lang-option <?php echo $_SESSION['lang'] === 'es' ? 'active' : ''; ?>">
            <span class="flag">🇪🇸</span>
            <span class="lang-name">Español</span>
        </a>
        <a href="?lang=en" class="lang-option <?php echo $_SESSION['lang'] === 'en' ? 'active' : ''; ?>">
            <span class="flag">🇬🇧</span>
            <span class="lang-name">English</span>
        </a>
        <a href="?lang=it" class="lang-option <?php echo $_SESSION['lang'] === 'it' ? 'active' : ''; ?>">
            <span class="flag">🇮🇹</span>
            <span class="lang-name">Italiano</span>
        </a>
    </div>
</div>
<?php endif; ?>