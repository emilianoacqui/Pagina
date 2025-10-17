<?php
// view_page.php - MEJORADO PARA LOCALHOST
require_once 'PagesManagerClass.php';

$pageId = $_GET['id'] ?? null;
if (!$pageId) {
    header('HTTP/1.0 404 Not Found');
    exit('Página no especificada');
}

$manager = new PagesManager();
$page = $manager->getPage($pageId);
$isExistingTemplate = isset($page['template']) && $page['template'] === 'existing_page';

if (!$page) {
    header('HTTP/1.0 404 Not Found');
    exit('Página no encontrada');
}

$isEditMode = isset($_GET['cms_admin_token']) && $_GET['cms_admin_token'] === 'true';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page['name']) ?> - Scuola Italiana</title>
    
    <!-- 🔥 INCLUIR ESTILOS GLOBALES DEL SITIO -->
    <style>
        /* Estilos base consistentes con el sitio principal */
        body { 
            margin: 0; 
            padding: 0; 
            font-family: 'Arial', sans-serif;
            background: white;
        }
        
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #0A2452;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            z-index: 1000;
            font-size: 14px;
        }
        
        .back-button:hover {
            background: #1B2F6F;
        }
        
        /* 🔥 Asegurar que el contenido de la página se vea bien */
        .template-frame * {
            max-width: 100% !important;
        }
        
        /* Estilos de edición solo en modo CMS */
        <?php if ($isEditMode): ?>
        .editable-text:hover, .editable-image:hover {
            outline: 2px dashed #3498db;
            cursor: pointer;
            background: rgba(52, 152, 219, 0.1);
        }
        <?php endif; ?>
        
        <?php if ($isExistingTemplate): ?>
        .cms-existing-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
        }
        .cms-existing-header {
            background: linear-gradient(135deg, #0A2452, #1B2F6F);
            color: white;
            padding: 20px;
        }
        .cms-existing-title {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .cms-existing-subtitle {
            margin-top: 6px;
            opacity: 0.9;
            font-size: 14px;
        }
        .cms-existing-content {
            background: #fff;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            border-radius: 12px;
            margin-top: -20px;
            padding: 24px;
        }
        .cms-existing-footer {
            margin-top: 30px;
            padding: 16px;
            text-align: center;
            color: #667;
            font-size: 13px;
        }
        <?php endif; ?>
    </style>
</head>
<body>
    <a href="index.php" class="back-button">← Volver al Inicio</a>
    
    <!-- 🔥 CONTENIDO DE LA PÁGINA -->
    <?php if ($isExistingTemplate): ?>
        <div class="cms-existing-header">
            <div class="cms-existing-wrapper">
                <h1 class="cms-existing-title"><?= htmlspecialchars($page['name']) ?></h1>
                <div class="cms-existing-subtitle">Contenido editado desde el sitio</div>
            </div>
        </div>
        <div class="cms-existing-wrapper">
            <div class="cms-existing-content template-frame">
                <?= $page['content'] ?>
            </div>
            <div class="cms-existing-footer">
                AMC Scuola Italiana di Montevideo • Vista de contenido guardado
            </div>
        </div>
    <?php else: ?>
        <div style="width: 100%; max-width: 100vw; overflow-x: hidden;">
            <?= $page['content'] ?>
        </div>
    <?php endif; ?>
    
    <?php if ($isEditMode): ?>
    <script>
        console.log('🔧 Modo edición activado para página ID: <?= $pageId ?>');
        
        // Aquí irá la lógica de edición cuando la implementemos
    </script>
    <?php endif; ?>
</body>
</html>