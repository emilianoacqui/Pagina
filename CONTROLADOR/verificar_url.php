<?php
header('Content-Type: application/json');

// Función para verificar si una URL es accesible
function verificarUrlAccesible($url) {
    // Inicializar cURL
    $ch = curl_init($url);
    
    // Configurar opciones de cURL
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Tiempo máximo de espera: 10 segundos
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // No verificar certificado SSL
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Seguir redirecciones
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
    
    // Ejecutar la petición
    curl_exec($ch);
    
    // Obtener el código de estado HTTP
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    
    // Cerrar la sesión cURL
    curl_close($ch);
    
    // Considerar la URL como válida si el código de estado es menor a 400
    // (2xx y 3xx son códigos de éxito y redirección)
    $esValida = ($httpCode >= 200 && $httpCode < 400) && empty($error);
    
    return [
        'valida' => $esValida,
        'codigo' => $httpCode,
        'error' => $error
    ];
}

// Obtener la URL del POST
$url = $_POST['url'] ?? '';

// Validar que la URL no esté vacía
if (empty($url)) {
    echo json_encode(['valida' => false, 'error' => 'URL no proporcionada']);
    exit;
}

// Validar formato básico de URL
if (!filter_var($url, FILTER_VALIDATE_URL)) {
    echo json_encode(['valida' => false, 'error' => 'Formato de URL inválido']);
    exit;
}

// Verificar que la URL use HTTP o HTTPS
$urlParts = parse_url($url);
if (!in_array(strtolower($urlParts['scheme'] ?? ''), ['http', 'https'])) {
    echo json_encode(['valida' => false, 'error' => 'El protocolo debe ser HTTP o HTTPS']);
    exit;
}

// Verificar si la URL es accesible
$resultado = verificarUrlAccesible($url);

echo json_encode([
    'valida' => $resultado['valida'],
    'codigo' => $resultado['codigo'],
    'error' => $resultado['valida'] ? '' : 'La URL no es accesible (Código: ' . $resultado['codido'] . ')'
]);
