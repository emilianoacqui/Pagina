<?php
// Debug del contenido guardado
require_once 'PagesManagerClass.php';

$manager = new PagesManager();
$pages = $manager->getAllPages();

echo "<h1>Debug del Contenido Guardado</h1>";

foreach ($pages as $page) {
    if (isset($page['url']) && $page['url'] === 'index.php') {
        echo "<h2>Página index.php encontrada:</h2>";
        echo "<p><strong>ID:</strong> " . htmlspecialchars($page['id']) . "</p>";
        echo "<p><strong>Nombre:</strong> " . htmlspecialchars($page['name']) . "</p>";
        echo "<p><strong>Última modificación:</strong> " . htmlspecialchars($page['lastModified']) . "</p>";
        echo "<p><strong>Tamaño del contenido:</strong> " . strlen($page['content']) . " caracteres</p>";
        
        // Mostrar las primeras 500 caracteres del contenido
        echo "<h3>Primeros 500 caracteres del contenido:</h3>";
        echo "<pre style='background: #f0f0f0; padding: 10px; border: 1px solid #ccc;'>";
        echo htmlspecialchars(substr($page['content'], 0, 500));
        echo "</pre>";
        
        // Verificar si contiene elementos específicos
        $content = $page['content'];
        echo "<h3>Verificación de elementos:</h3>";
        echo "<ul>";
        echo "<li>Contiene navbar: " . (strpos($content, 'navbar') !== false ? "✅ Sí" : "❌ No") . "</li>";
        echo "<li>Contiene header: " . (strpos($content, 'header') !== false ? "✅ Sí" : "❌ No") . "</li>";
        echo "<li>Contiene education-levels: " . (strpos($content, 'education-levels') !== false ? "✅ Sí" : "❌ No") . "</li>";
        echo "<li>Contiene about-section: " . (strpos($content, 'about-section') !== false ? "✅ Sí" : "❌ No") . "</li>";
        echo "<li>Contiene quality-section: " . (strpos($content, 'quality-section') !== false ? "✅ Sí" : "❌ No") . "</li>";
        echo "<li>Contiene projects-section: " . (strpos($content, 'projects-section') !== false ? "✅ Sí" : "❌ No") . "</li>";
        echo "<li>Contiene news-section: " . (strpos($content, 'news-section') !== false ? "✅ Sí" : "❌ No") . "</li>";
        echo "<li>Contiene footer: " . (strpos($content, 'footer') !== false ? "✅ Sí" : "❌ No") . "</li>";
        echo "</ul>";
        
        break;
    }
}

if (!isset($page)) {
    echo "<p style='color: red;'>❌ No se encontró página index.php guardada</p>";
    echo "<p>Esto significa que necesitas:</p>";
    echo "<ol>";
    echo "<li>Ir a <a href='index.php?cms_admin_token=true'>index.php?cms_admin_token=true</a></li>";
    echo "<li>Hacer clic en 'Editar esta página'</li>";
    echo "<li>Modificar algo y guardar</li>";
    echo "</ol>";
}
?>
