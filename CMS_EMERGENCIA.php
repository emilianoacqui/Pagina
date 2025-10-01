<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚨 CMS DE EMERGENCIA</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f0f0f0; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        .critical { background: #f8d7da; border: 2px solid #dc3545; padding: 15px; border-radius: 4px; margin: 10px 0; }
        .success { background: #d4edda; border: 1px solid #28a745; padding: 15px; border-radius: 4px; margin: 10px 0; }
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
    <div class="container">
        <h1>🚨 CMS DE EMERGENCIA</h1>
        
        <div class="critical">
            <h3>🔧 MODO DE EMERGENCIA ACTIVADO:</h3>
            <ul>
                <li>✅ <strong>Siempre muestra contenido original</strong></li>
                <li>✅ <strong>Elimina pantalla en blanco</strong></li>
                <li>✅ <strong>Funciona inmediatamente</strong></li>
                <li>✅ <strong>Modo edición disponible</strong></li>
            </ul>
        </div>
        
        <div class="success">
            <h3>🧪 PRUEBA AHORA:</h3>
            <ol>
                <li><strong>Modo Admin:</strong> <a href="index.php?cms_admin_token=true" class="btn btn-success">Abrir Modo Admin</a></li>
                <li><strong>Modo Visitante:</strong> <a href="index.php" class="btn">Abrir Modo Visitante</a></li>
                <li><strong>Debería ver:</strong> TODO el contenido (header, secciones, proyectos, noticias, footer)</li>
                <li><strong>Sin pantalla en blanco:</strong> Contenido visible inmediatamente</li>
            </ol>
        </div>
        
        <div style="margin-top: 20px;">
            <a href="index.php?cms_admin_token=true" class="btn btn-success">🌐 Probar Modo Admin</a>
            <a href="index.php" class="btn">👁️ Probar Modo Visitante</a>
            <a href="SOLUCION_INMEDIATA.php" class="btn">🔧 Solución Inmediata</a>
        </div>
        
        <div style="margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 4px;">
            <h4>📋 CONTENIDO DE PRUEBA:</h4>
            <div id="original-content">
                <h2>Contenido Original</h2>
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
            
            <div id="cms-root">
                <!-- El contenido del CMS se cargará aquí -->
            </div>
        </div>
        
        <div style="margin-top: 20px; padding: 15px; background: #e9ecef; border-radius: 4px;">
            <h4>🔍 Información de Debug:</h4>
            <div id="debug-content"></div>
        </div>
    </div>
    
    <!-- Usar el JavaScript de emergencia -->
    <script src="cms-admin-EMERGENCIA.js"></script>
    
    <script>
        // Mostrar información de debug
        function showDebugInfo() {
            const debugDiv = document.getElementById('debug-content');
            const cmsRoot = document.getElementById('cms-root');
            const originalContent = document.getElementById('original-content');
            
            let html = '<div style="font-family: monospace; font-size: 12px;">';
            html += `cms-root encontrado: ${!!cmsRoot}<br>`;
            html += `original-content encontrado: ${!!originalContent}<br>`;
            html += `body.loading-cms-content: ${document.body.classList.contains('loading-cms-content')}<br>`;
            html += `cms-root display: ${cmsRoot ? cmsRoot.style.display : 'N/A'}<br>`;
            html += `original-content display: ${originalContent ? originalContent.style.display : 'N/A'}<br>`;
            html += `cms-root innerHTML length: ${cmsRoot ? cmsRoot.innerHTML.length : 'N/A'}<br>`;
            html += `original-content innerHTML length: ${originalContent ? originalContent.innerHTML.length : 'N/A'}<br>`;
            html += '</div>';
            
            debugDiv.innerHTML = html;
        }
        
        // Mostrar información de debug al cargar
        window.addEventListener('load', function() {
            setTimeout(showDebugInfo, 1000);
        });
        
        // Actualizar debug cada 2 segundos
        setInterval(showDebugInfo, 2000);
    </script>
</body>
</html>
