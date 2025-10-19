<?php
require_once '../../MODELO/Gestor/PagesManagerClass.php';

header('Content-Type: application/json');

$manager = new PagesManager();

// Manejar tanto GET como POST
$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'getAll':
        try {
            $pages = $manager->getAllPages();
            echo json_encode([
                'success' => true,
                'data' => $pages
            ]);
        } catch (Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Error al cargar páginas: ' . $e->getMessage()
            ]);
        }
        break;
    
    case 'getById':
        $pageId = $_POST['pageId'] ?? $_GET['pageId'] ?? '';
        if ($pageId) {
            try {
                $page = $manager->getPage($pageId);
                echo json_encode([
                    'success' => true,
                    'data' => $page
                ]);
            } catch (Exception $e) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Error al cargar página: ' . $e->getMessage()
                ]);
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'ID no especificado'
            ]);
        }
        break;
        
    case 'save':
        $pageData = null;
        
        // Manejar datos JSON si vienen en el body
        if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
            $input = file_get_contents('php://input');
            $pageData = json_decode($input, true);
        } else {
            // Manejar datos POST tradicionales
            $pageData = json_decode($_POST['pageData'] ?? '', true);
        }
        
        if ($pageData) {
            try {
                $result = $manager->savePage($pageData);
                echo json_encode([
                    'success' => $result !== false,
                    'message' => $result ? 'Página guardada correctamente' : 'Error al guardar'
                ]);
            } catch (Exception $e) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Error al guardar: ' . $e->getMessage()
                ]);
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Datos inválidos'
            ]);
        }
        break;
        
    case 'delete':
        $pageId = null;
        
        // Manejar datos JSON si vienen en el body
        if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);
            $pageId = $data['id'] ?? null;
        } else {
            // Manejar datos POST tradicionales
            $pageId = $_POST['pageId'] ?? $_POST['id'] ?? null;
        }
        
        if ($pageId) {
            try {
                $result = $manager->deletePage($pageId);
                echo json_encode([
                    'success' => $result !== false,
                    'message' => $result ? 'Página eliminada correctamente' : 'Error al eliminar'
                ]);
            } catch (Exception $e) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Error al eliminar: ' . $e->getMessage()
                ]);
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'ID no especificado'
            ]);
        }
        break;
        
    default:
        echo json_encode([
            'success' => false,
            'message' => 'Acción no válida'
        ]);
        break;
}
?>
