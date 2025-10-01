<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔍 DIAGNÓSTICO CRÍTICO - CMS</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f0f0f0; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        .critical { background: #f8d7da; border: 2px solid #dc3545; padding: 15px; border-radius: 4px; margin: 10px 0; }
        .success { background: #d4edda; border: 1px solid #28a745; padding: 15px; border-radius: 4px; margin: 10px 0; }
        .warning { background: #fff3cd; border: 1px solid #ffc107; padding: 15px; border-radius: 4px; margin: 10px 0; }
        .btn { background: #007cba; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block; margin: 5px; }
        .btn:hover { background: #005a87; }
        .btn-danger { background: #dc3545; }
        .btn-success { background: #28a745; }
        .code { background: #f8f9fa; padding: 10px; border-radius: 4px; font-family: monospace; margin: 10px 0; }
        .test-result { padding: 10px; margin: 5px 0; border-radius: 4px; }
        .test-pass { background: #d4edda; color: #155724; }
        .test-fail { background: #f8d7da; color: #721c24; }
        .test-warning { background: #fff3cd; color: #856404; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 DIAGNÓSTICO CRÍTICO DEL CMS</h1>
        
        <div class="critical">
            <h3>🚨 PROBLEMA REPORTADO:</h3>
            <ul>
                <li>✅ <strong>Visitante:</strong> Ve la página perfectamente</li>
                <li>❌ <strong>Admin:</strong> Solo ve el footer</li>
                <li>❌ <strong>Cambios:</strong> No se guardan</li>
                <li>❌ <strong>Redirección:</strong> Se abre un segundo y redirige</li>
            </ul>
        </div>

        <div class="warning">
            <h3>🔧 ARCHIVOS INVESTIGADOS:</h3>
            <ul>
                <li><strong>index.php:</strong> Footer restaurado completamente</li>
                <li><strong>cms-admin.js:</strong> Sistema de carga de contenido</li>
                <li><strong>gestorCont.php:</strong> Gestor separado (posible conflicto)</li>
                <li><strong>pages_data.json:</strong> Datos guardados</li>
            </ul>
        </div>

        <h2>🧪 PRUEBAS DE DIAGNÓSTICO</h2>
        
        <div class="test-result test-warning">
            <h4>Prueba 1: Verificar Elementos DOM</h4>
            <p>Verificar que existan los elementos #cms-root y #original-content</p>
            <button class="btn" onclick="testDOM()">🔍 Verificar DOM</button>
            <div id="dom-result"></div>
        </div>

        <div class="test-result test-warning">
            <h4>Prueba 2: Verificar localStorage</h4>
            <p>Comprobar si hay contenido guardado en localStorage</p>
            <button class="btn" onclick="testLocalStorage()">💾 Verificar localStorage</button>
            <div id="localStorage-result"></div>
        </div>

        <div class="test-result test-warning">
            <h4>Prueba 3: Verificar Servidor</h4>
            <p>Comprobar si el servidor responde correctamente</p>
            <button class="btn" onclick="testServer()">🌐 Verificar Servidor</button>
            <div id="server-result"></div>
        </div>

        <div class="test-result test-warning">
            <h4>Prueba 4: Verificar CSS</h4>
            <p>Comprobar si hay conflictos de CSS</p>
            <button class="btn" onclick="testCSS()">🎨 Verificar CSS</button>
            <div id="css-result"></div>
        </div>

        <div class="test-result test-warning">
            <h4>Prueba 5: Verificar JavaScript</h4>
            <p>Comprobar si hay errores en JavaScript</p>
            <button class="btn" onclick="testJavaScript()">⚡ Verificar JavaScript</button>
            <div id="javascript-result"></div>
        </div>

        <h2>🚀 ACCIONES CORRECTIVAS</h2>
        
        <div class="success">
            <h3>✅ SOLUCIONES IMPLEMENTADAS:</h3>
            <ul>
                <li>Footer restaurado completamente</li>
                <li>Sistema de prevención de redirección activado</li>
                <li>Logs de depuración mejorados</li>
            </ul>
        </div>

        <div class="critical">
            <h3>🔧 PRÓXIMOS PASOS:</h3>
            <ol>
                <li><strong>Ejecutar todas las pruebas</strong> de diagnóstico</li>
                <li><strong>Revisar resultados</strong> en la consola del navegador</li>
                <li><strong>Identificar el problema específico</strong></li>
                <li><strong>Aplicar solución dirigida</strong></li>
            </ol>
        </div>

        <div style="margin-top: 30px;">
            <a href="index.php?cms_admin_token=true" class="btn btn-success">🌐 Probar Modo Admin</a>
            <a href="index.php" class="btn">👁️ Probar Modo Visitante</a>
            <button class="btn btn-danger" onclick="clearAllData()">🗑️ Limpiar Todo</button>
        </div>

        <div id="diagnostic-results" style="margin-top: 20px;"></div>
    </div>

    <script>
        function testDOM() {
            const result = document.getElementById('dom-result');
            const cmsRoot = document.getElementById('cms-root');
            const originalContent = document.getElementById('original-content');
            
            let html = '<div class="code">';
            html += `cms-root: ${cmsRoot ? '✅ Encontrado' : '❌ No encontrado'}<br>`;
            html += `original-content: ${originalContent ? '✅ Encontrado' : '❌ No encontrado'}<br>`;
            
            if (cmsRoot) {
                html += `cms-root display: ${cmsRoot.style.display || 'default'}<br>`;
                html += `cms-root innerHTML length: ${cmsRoot.innerHTML.length}<br>`;
            }
            
            if (originalContent) {
                html += `original-content display: ${originalContent.style.display || 'default'}<br>`;
            }
            
            html += '</div>';
            result.innerHTML = html;
        }

        function testLocalStorage() {
            const result = document.getElementById('localStorage-result');
            const savedPages = JSON.parse(localStorage.getItem('savedPages')) || [];
            
            let html = '<div class="code">';
            html += `Páginas guardadas: ${savedPages.length}<br>`;
            
            if (savedPages.length > 0) {
                savedPages.forEach((page, index) => {
                    html += `${index + 1}. ${page.name} (${page.id})<br>`;
                    html += `   Contenido: ${page.content ? page.content.length + ' caracteres' : 'Sin contenido'}<br>`;
                });
            } else {
                html += 'No hay páginas guardadas en localStorage<br>';
            }
            
            html += '</div>';
            result.innerHTML = html;
        }

        async function testServer() {
            const result = document.getElementById('server-result');
            result.innerHTML = '<div class="code">Probando servidor...</div>';
            
            try {
                const response = await fetch('load_page_content.php?pageUrl=index.php');
                const data = await response.json();
                
                let html = '<div class="code">';
                html += `Servidor: ${response.ok ? '✅ Funcionando' : '❌ Error'}<br>`;
                html += `Respuesta: ${JSON.stringify(data, null, 2)}<br>`;
                html += '</div>';
                
                result.innerHTML = html;
            } catch (error) {
                result.innerHTML = `<div class="code">❌ Error: ${error.message}</div>`;
            }
        }

        function testCSS() {
            const result = document.getElementById('css-result');
            const body = document.body;
            const loadingClass = body.classList.contains('loading-cms-content');
            
            let html = '<div class="code">';
            html += `body.loading-cms-content: ${loadingClass ? '✅ Activo' : '❌ Inactivo'}<br>`;
            
            // Verificar estilos aplicados
            const cmsRoot = document.getElementById('cms-root');
            const originalContent = document.getElementById('original-content');
            
            if (cmsRoot) {
                const computedStyle = window.getComputedStyle(cmsRoot);
                html += `cms-root display: ${computedStyle.display}<br>`;
                html += `cms-root visibility: ${computedStyle.visibility}<br>`;
            }
            
            if (originalContent) {
                const computedStyle = window.getComputedStyle(originalContent);
                html += `original-content display: ${computedStyle.display}<br>`;
                html += `original-content visibility: ${computedStyle.visibility}<br>`;
            }
            
            html += '</div>';
            result.innerHTML = html;
        }

        function testJavaScript() {
            const result = document.getElementById('javascript-result');
            
            let html = '<div class="code">';
            
            // Verificar si cms-admin.js está cargado
            const scripts = Array.from(document.scripts);
            const cmsScript = scripts.find(script => script.src.includes('cms-admin.js'));
            html += `cms-admin.js: ${cmsScript ? '✅ Cargado' : '❌ No cargado'}<br>`;
            
            // Verificar funciones globales
            html += `md5 function: ${typeof md5 === 'function' ? '✅ Disponible' : '❌ No disponible'}<br>`;
            html += `loadSavedContent function: ${typeof loadSavedContent === 'function' ? '✅ Disponible' : '❌ No disponible'}<br>`;
            
            // Verificar errores en consola
            html += 'Revisa la consola del navegador (F12) para errores JavaScript<br>';
            
            html += '</div>';
            result.innerHTML = html;
        }

        function clearAllData() {
            if (confirm('¿Estás seguro de que quieres limpiar todos los datos? Esto eliminará todo el contenido guardado.')) {
                localStorage.clear();
                alert('Datos limpiados. Recarga la página para ver el efecto.');
            }
        }

        // Ejecutar diagnóstico automático al cargar
        window.addEventListener('load', function() {
            console.log('🔍 Diagnóstico automático iniciado');
            testDOM();
            testLocalStorage();
        });
    </script>
</body>
</html>
