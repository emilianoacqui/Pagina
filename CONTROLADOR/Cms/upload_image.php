<?php
// Simple image upload endpoint for CMS
// Saves uploaded file to VISTA/PaginaWeb/uploads and returns JSON

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('No se recibió archivo válido');
    }

    $file = $_FILES['image'];

    // Validations
    $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!isset($allowed[$mime])) {
        throw new Exception('Formato no permitido. Solo JPG, PNG o WEBP');
    }

    if ($file['size'] > 5 * 1024 * 1024) { // 5MB
        throw new Exception('El archivo supera el tamaño máximo (5MB)');
    }

    // Target directory relative to this script
    $targetDir = __DIR__ . '/../../VISTA/PaginaWeb/uploads/';
    $parentDir = dirname($targetDir);
    if (!is_dir($parentDir)) {
        throw new Exception('Directorio base inexistente: ' . $parentDir);
    }
    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0777, true)) {
            throw new Exception('No se pudo crear el directorio de destino: ' . $targetDir);
        }
    }

    // Unique filename
    $ext = $allowed[$mime];
    $basename = date('Ymd_His') . '_' . bin2hex(random_bytes(4));
    $filename = $basename . '.' . $ext;

    $dest = $targetDir . $filename;
    if (!move_uploaded_file($file['tmp_name'], $dest)) {
        throw new Exception('No se pudo guardar el archivo');
    }

    // File permissions (optional)
    @chmod($dest, 0644);

    echo json_encode([
        'success' => true,
        'filename' => $filename
    ]);
    exit;
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
    exit;
}
