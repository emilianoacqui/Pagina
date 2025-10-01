<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🧪 PRUEBA SIMPLIFICADA - CMS</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .header { background: #2c3e50; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; max-width: 800px; margin: 0 auto; }
        .test-section { background: #f8f9fa; padding: 15px; margin: 10px 0; border-radius: 8px; }
        .btn { background: #007cba; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block; margin: 5px; }
        .btn:hover { background: #005a87; }
        .btn-success { background: #28a745; }
        .btn-danger { background: #dc3545; }
        
        /* CSS para el CMS */
        body.loading-cms-content #original-content {
            display: none !important;
        }
        
        body.loading-cms-content #cms-root {
            display: block !important;
        }
        
        #cms-root {
            display: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🧪 PRUEBA SIMPLIFICADA DEL CMS</h1>
        <p>Versión simplificada para diagnosticar el problema</p>
    </div>
    
    <div class="content">
        <div class="test-section">
            <h3>🔧 INSTRUCCIONES DE PRUEBA:</h3>
            <ol>
                <li><strong>Modo Admin:</strong> <a href="?cms_admin_token=true" class="btn btn-success">Abrir Modo Admin</a></li>
                <li><strong>Modo Visitante:</strong> <a href="?" class="btn">Abrir Modo Visitante</a></li>
                <li><strong>Diagnóstico:</strong> <a href="DIAGNOSTICO_CRITICO.php" class="btn">Ejecutar Diagnóstico</a></li>
            </ol>
        </div>
        
        <div class="test-section">
            <h3>📋 CONTENIDO ORIGINAL:</h3>
            <div id="original-content">
                <h2>Contenido Original de Prueba</h2>
                <p>Este es el contenido original que debería mostrarse cuando no hay contenido guardado.</p>
                <p>Si ves este contenido, significa que el CMS está funcionando correctamente.</p>
                
                <h3>Sección de Prueba</h3>
                <p>Esta es una sección adicional para probar la funcionalidad del CMS.</p>
                <p>Puedes editar este contenido usando el botón "✏️ Editar esta página" en modo admin.</p>
                
                <h3>Lista de Elementos</h3>
                <ul>
                    <li>Elemento 1: Prueba de funcionalidad</li>
                    <li>Elemento 2: Verificación de persistencia</li>
                    <li>Elemento 3: Test de visibilidad</li>
                </ul>
            </div>
        </div>
        
        <div class="test-section">
            <h3>🎯 CONTENIDO CMS:</h3>
            <div id="cms-root">
                <!-- El contenido del CMS se cargará aquí -->
            </div>
        </div>
        
        <div class="test-section">
            <h3>🔍 INFORMACIÓN DE DEBUG:</h3>
            <div id="debug-info">
                <p>Información de debug aparecerá aquí...</p>
            </div>
        </div>
        
        <div class="test-section">
            <h3>🚀 ACCIONES RÁPIDAS:</h3>
            <button class="btn btn-success" onclick="testLoadContent()">📂 Probar Carga</button>
            <button class="btn btn-danger" onclick="clearAllData()">🗑️ Limpiar Todo</button>
            <button class="btn" onclick="showDebugInfo()">🔍 Mostrar Debug</button>
        </div>
    </div>
    
    <!-- Usar el JavaScript simplificado -->
    <script src="cms-admin-SIMPLIFICADO.js"></script>
    
    <script>
        function testLoadContent() {
            console.log('🧪 Probando carga de contenido...');
            if (typeof loadSavedContent === 'function') {
                loadSavedContent();
            } else {
                console.error('❌ Función loadSavedContent no disponible');
            }
        }
        
        function clearAllData() {
            if (confirm('¿Estás seguro de que quieres limpiar todos los datos?')) {
                localStorage.clear();
                location.reload();
            }
        }
        
        function showDebugInfo() {
            const debugDiv = document.getElementById('debug-info');
            const cmsRoot = document.getElementById('cms-root');
            const originalContent = document.getElementById('original-content');
            
            let html = '<div style="font-family: monospace; background: #f8f9fa; padding: 10px; border-radius: 4px;">';
            html += `cms-root encontrado: ${!!cmsRoot}<br>`;
            html += `original-content encontrado: ${!!originalContent}<br>`;
            html += `body.loading-cms-content: ${document.body.classList.contains('loading-cms-content')}<br>`;
            html += `cms-root display: ${cmsRoot ? cmsRoot.style.display : 'N/A'}<br>`;
            html += `cms-root innerHTML length: ${cmsRoot ? cmsRoot.innerHTML.length : 'N/A'}<br>`;
            html += `Páginas en localStorage: ${JSON.parse(localStorage.getItem('savedPages') || '[]').length}<br>`;
            html += '</div>';
            
            debugDiv.innerHTML = html;
        }
        
        // Mostrar información de debug al cargar
        window.addEventListener('load', function() {
            setTimeout(showDebugInfo, 1000);
        });
    </script>
</body>
</html>
