<?php
require_once 'PagesManagerClass.php';

header('Content-Type: application/json');

$pageUrl = $_POST['pageUrl'] ?? '';
$content = $_POST['content'] ?? '';
$pageTitle = $_POST['pageTitle'] ?? '';

if ($pageUrl && $content) {
    $manager = new PagesManager();
    
    // Usar la misma función de hash que JavaScript
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
    
    $pageData = [
        'id' => 'existing_' . jsHash($pageUrl),
        'url' => $pageUrl,
        'name' => $pageTitle,
        'content' => $content,
        'template' => 'existing_page',
        'lastModified' => date('Y-m-d H:i:s')
    ];
    
    $result = $manager->savePage($pageData);
    
    if ($result !== false) {
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