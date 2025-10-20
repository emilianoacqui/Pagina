<?php
// Archivo de prueba para verificar la conexión CMS
require_once 'MODELO/Gestor/PagesManagerClass.php';

header('Content-Type: application/json');

try {
    $manager = new PagesManager();
    $pages = $manager->getAllPages();
    
    echo json_encode([
        'success' => true,
        'count' => count($pages),
        'data' => $pages
    ], JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}
?>
