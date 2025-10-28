<?php
require_once '../../MODELO/Gestor/PagesManagerClass.php';

header('Content-Type: application/json');

$pageUrl = $_POST['pageUrl'] ?? '';
$content = $_POST['content'] ?? '';
$pageTitle = $_POST['pageTitle'] ?? '';

if ($pageUrl && $content) {
    $manager = new PagesManager();
    
    // Use PagesManager methods
    $content = PagesManager::sanitizeCmsContent($content);
    
    $pageData = [
        'id' => 'existing_' . PagesManager::jsHash($pageUrl),
        'url' => $pageUrl,
        'name' => $pageTitle,
        'content' => $content,
        'template' => 'existing_page',
        // last_modified se maneja por la BD
    ];
    
    $result = $manager->savePage($pageData);
    
    if ($result) {
        echo json_encode([
            'success' => true,
            'message' => 'Contenido guardado correctamente'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error al guardar en el servidor'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Datos incompletos'
    ]);
}
?>
