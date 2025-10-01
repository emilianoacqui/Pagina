<?php
// Archivo de prueba para verificar la persistencia
require_once 'PagesManagerClass.php';

// Hash simple compatible con el usado en JavaScript
function jsHash($str) {
    $hash = 0;
    if (strlen($str) == 0) return $hash;
    for ($i = 0; $i < strlen($str); $i++) {
        $char = ord($str[$i]);
        $hash = (($hash << 5) - $hash) + $char;
        $hash = $hash & $hash; // Convert to 32-bit integer
    }
    return abs($hash);
}

echo "<h1>Test de Persistencia del CMS</h1>";

// Probar función MD5
$testUrl = 'index.php';
$jsHash = jsHash($testUrl);
echo "<p><strong>URL de prueba:</strong> $testUrl</p>";
echo "<p><strong>Hash generado:</strong> $jsHash</p>";
echo "<p><strong>ID completo:</strong> existing_$jsHash</p>";

// Probar PagesManager
$manager = new PagesManager();
$pages = $manager->getAllPages();

echo "<h2>Páginas guardadas:</h2>";
echo "<p>Total de páginas: " . count($pages) . "</p>";

foreach ($pages as $page) {
    echo "<div style='border: 1px solid #ccc; margin: 10px; padding: 10px;'>";
    echo "<h3>" . htmlspecialchars($page['name']) . "</h3>";
    echo "<p><strong>ID:</strong> " . htmlspecialchars($page['id']) . "</p>";
    echo "<p><strong>URL:</strong> " . htmlspecialchars($page['url'] ?? 'N/A') . "</p>";
    echo "<p><strong>Última modificación:</strong> " . htmlspecialchars($page['lastModified'] ?? 'N/A') . "</p>";
    echo "<p><strong>Contenido:</strong> " . substr(strip_tags($page['content']), 0, 100) . "...</p>";
    echo "</div>";
}

// Probar búsqueda específica
$pageId = 'existing_' . jsHash('index.php');
echo "<h2>Búsqueda específica para index.php:</h2>";
echo "<p>Buscando ID: $pageId</p>";

$foundPage = null;
foreach ($pages as $page) {
    if ($page['id'] === $pageId || (isset($page['url']) && $page['url'] === 'index.php')) {
        $foundPage = $page;
        break;
    }
}

if ($foundPage) {
    echo "<p style='color: green;'>✅ Página encontrada: " . htmlspecialchars($foundPage['name']) . "</p>";
} else {
    echo "<p style='color: red;'>❌ Página no encontrada</p>";
}

echo "<hr>";
echo "<p><a href='index.php?cms_admin_token=true'>Ir al index en modo admin</a></p>";
?>
