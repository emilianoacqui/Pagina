<?php
require_once 'PagesManagerClass.php';

header('Content-Type: application/json');

$pageUrl = $_GET['pageUrl'] ?? '';

if ($pageUrl) {
    $manager = new PagesManager();
    $pages = $manager->getAllPages();
    
    $pageId = 'existing_' . jsHash($pageUrl);
    $savedPage = null;
    
    // Buscar página por ID o por URL
    foreach ($pages as $page) {
        if ($page['id'] === $pageId || (isset($page['url']) && $page['url'] === $pageUrl)) {
            $savedPage = $page;
            break;
        }
    }
    
    if ($savedPage && isset($savedPage['content'])) {
        echo json_encode([
            'success' => true,
            'content' => $savedPage['content'],
            'pageId' => $savedPage['id']
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No hay contenido guardado para esta página'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'URL no especificada'
    ]);
}

// Hash simple compatible con el usado en JavaScript
function jsHash($str) {
    // Usar el mismo algoritmo que JavaScript para consistencia
    $hash = 0;
    if (strlen($str) == 0) return $hash;
    for ($i = 0; $i < strlen($str); $i++) {
        $char = ord($str[$i]);
        $hash = (($hash << 5) - $hash) + $char;
        $hash = $hash & $hash; // Convert to 32-bit integer
    }
    return abs($hash);
}
?>