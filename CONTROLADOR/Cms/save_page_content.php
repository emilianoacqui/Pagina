<?php
require_once '../../MODELO/Gestor/PagesManagerClass.php';

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

    // Sanitizar contenido: eliminar cms_admin_token de cualquier URL
    function sanitizeCmsContent($html) {
        if (!is_string($html) || $html === '') return $html;
        // Quitar ocurrencias directas en query strings
        $patterns = [
            '/([?&])cms_admin_token=true(&)?/i',
        ];
        $replacements = [
            function($m){
                // Si había otro parámetro después, conservar el separador ? o & correctamente
                if (isset($m[2]) && $m[2] === '&') {
                    return $m[1]; // deja ? o & y el resto seguirá
                }
                // Si era el único parámetro
                return $m[1] === '?' ? '' : '';
            }
        ];
        $result = preg_replace_callback($patterns[0], $replacements[0], $html);
        // Limpiar posibles ? o & colgantes al final de href/src
        $result = preg_replace('/\?(?:\s*|[&#]*)"/i', '"', $result);
        $result = preg_replace('/&(?![a-z0-9#])/i', '', $result);
        return $result;
    }

    $content = sanitizeCmsContent($content);
    
    $pageData = [
        'id' => 'existing_' . jsHash($pageUrl),
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
