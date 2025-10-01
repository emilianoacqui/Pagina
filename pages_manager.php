<?php
require_once 'PagesManagerClass.php';

header('Content-Type: application/json');

$manager = new PagesManager();

$action = $_POST['action'] ?? '';

switch ($action) {
    case 'getAll':
        echo json_encode($manager->getAllPages());
        break;
        
    case 'save':
        $pageData = json_decode($_POST['pageData'], true);
        if ($pageData) {
            $result = $manager->savePage($pageData);
            echo json_encode([
                'success' => $result !== false,
                'message' => $result ? 'Página guardada correctamente' : 'Error al guardar'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
        }
        break;
        
    case 'delete':
        $pageId = $_POST['pageId'] ?? null;
        if ($pageId) {
            $result = $manager->deletePage($pageId);
            echo json_encode([
                'success' => $result !== false,
                'message' => $result ? 'Página eliminada correctamente' : 'Error al eliminar'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'ID no especificado']);
        }
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Acción no válida']);
        break;
}
?>