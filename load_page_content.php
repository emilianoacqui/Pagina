<?php
require_once 'PagesManagerClass.php';

header('Content-Type: application/json');

$pageUrl = $_GET['pageUrl'] ?? '';

if ($pageUrl) {
    $manager = new PagesManager();
    $pageId = 'existing_' . jsHash($pageUrl);
    $savedPage = $manager->getPage($pageId);
    // Si no encontró por id, buscar por URL
    if (!$savedPage) {
        // Búsqueda directa por URL usando getAll (simple y suficiente para volumen bajo)
        foreach ($manager->getAllPages() as $page) {
            if (isset($page['url']) && $page['url'] === $pageUrl) {
                $savedPage = $page;
                break;
            }
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