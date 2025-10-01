<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚨 SOLUCIÓN INMEDIATA - CMS</title>
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
        <h1>🚨 SOLUCIÓN INMEDIATA</h1>
        
        <div class="critical">
            <h3>🔍 PROBLEMA IDENTIFICADO:</h3>
            <p>El CMS busca contenido con ID <code>existing_808646052</code> pero no lo encuentra.</p>
            <p>Por eso muestra pantalla en blanco.</p>
        </div>
        
        <div class="success">
            <h3>✅ SOLUCIÓN INMEDIATA:</h3>
            <ol>
                <li><strong>Crear contenido de prueba</strong> en localStorage</li>
                <li><strong>Forzar carga</strong> del contenido original</li>
                <li><strong>Arreglar búsqueda</strong> de contenido</li>
            </ol>
        </div>
        
        <div style="margin-top: 20px;">
            <button class="btn btn-success" onclick="createTestContent()">🔧 Crear Contenido de Prueba</button>
            <button class="btn btn-danger" onclick="forceShowOriginal()">👁️ Forzar Contenido Original</button>
            <button class="btn" onclick="clearAndReload()">🔄 Limpiar y Recargar</button>
        </div>
        
        <div style="margin-top: 20px;">
            <a href="index.php?cms_admin_token=true" class="btn btn-success">🌐 Probar Modo Admin</a>
            <a href="index.php" class="btn">👁️ Probar Modo Visitante</a>
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
            </div>
            
            <div id="cms-root">
                <!-- El contenido del CMS se cargará aquí -->
            </div>
        </div>
        
        <div id="debug-info" style="margin-top: 20px; padding: 15px; background: #e9ecef; border-radius: 4px;">
            <h4>🔍 Información de Debug:</h4>
            <div id="debug-content"></div>
        </div>
    </div>
    
    <script>
        // Función MD5 simple
        function md5(str) {
            let hash = 0;
            if (str.length === 0) return hash.toString();
            for (let i = 0; i < str.length; i++) {
                const char = str.charCodeAt(i);
                hash = ((hash << 5) - hash) + char;
                hash = hash & hash;
            }
            return Math.abs(hash).toString();
        }
        
        function createTestContent() {
            console.log('🔧 Creando contenido de prueba...');
            
            const currentUrl = 'index.php';
            const pageId = 'existing_' + md5(currentUrl);
            
            const testContent = `
                <div style="padding: 20px; background: #e8f5e8; border-radius: 8px; margin: 20px 0;">
                    <h2 style="color: #28a745;">✅ CONTENIDO DE PRUEBA CREADO</h2>
                    <p>Este es contenido de prueba que se ha creado automáticamente.</p>
                    <p>Si ves esto, significa que el CMS está funcionando correctamente.</p>
                    <p><strong>ID de la página:</strong> ${pageId}</p>
                    <p><strong>URL:</strong> ${currentUrl}</p>
                </div>
            `;
            
            const pageData = {
                id: pageId,
                url: currentUrl,
                name: 'Scuola Italiana di Montevideo',
                content: testContent,
                template: 'existing_page',
                lastModified: new Date().toLocaleString()
            };
            
            // Guardar en localStorage
            const savedPages = JSON.parse(localStorage.getItem('savedPages')) || [];
            const existingIndex = savedPages.findIndex(page => page.id === pageId);
            
            if (existingIndex !== -1) {
                savedPages[existingIndex] = pageData;
            } else {
                savedPages.push(pageData);
            }
            
            localStorage.setItem('savedPages', JSON.stringify(savedPages));
            
            console.log('✅ Contenido de prueba creado:', pageData);
            alert('✅ Contenido de prueba creado! Recarga la página para verlo.');
        }
        
        function forceShowOriginal() {
            console.log('👁️ Forzando contenido original...');
            
            const cmsRoot = document.getElementById('cms-root');
            const originalContent = document.getElementById('original-content');
            
            if (cmsRoot && originalContent) {
                cmsRoot.style.display = 'none';
                originalContent.style.display = 'block';
                document.body.classList.remove('loading-cms-content');
                
                console.log('✅ Contenido original forzado');
                alert('✅ Contenido original mostrado!');
            }
        }
        
        function clearAndReload() {
            if (confirm('¿Estás seguro de que quieres limpiar todo y recargar?')) {
                localStorage.clear();
                location.reload();
            }
        }
        
        function showDebugInfo() {
            const debugDiv = document.getElementById('debug-content');
            const cmsRoot = document.getElementById('cms-root');
            const originalContent = document.getElementById('original-content');
            
            const currentUrl = 'index.php';
            const pageId = 'existing_' + md5(currentUrl);
            const savedPages = JSON.parse(localStorage.getItem('savedPages')) || [];
            const foundPage = savedPages.find(page => page.id === pageId);
            
            let html = '<div style="font-family: monospace; font-size: 12px;">';
            html += `URL actual: ${currentUrl}<br>`;
            html += `ID buscado: ${pageId}<br>`;
            html += `Páginas guardadas: ${savedPages.length}<br>`;
            html += `Página encontrada: ${foundPage ? '✅ Sí' : '❌ No'}<br>`;
            html += `cms-root encontrado: ${!!cmsRoot}<br>`;
            html += `original-content encontrado: ${!!originalContent}<br>`;
            html += `body.loading-cms-content: ${document.body.classList.contains('loading-cms-content')}<br>`;
            html += `cms-root display: ${cmsRoot ? cmsRoot.style.display : 'N/A'}<br>`;
            html += `cms-root innerHTML length: ${cmsRoot ? cmsRoot.innerHTML.length : 'N/A'}<br>`;
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
