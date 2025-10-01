<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✅ PRUEBA RÁPIDA - CMS CORREGIDO</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f0f0f0; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
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
        <h1>✅ PRUEBA RÁPIDA - CMS CORREGIDO</h1>
        
        <div class="success">
            <h3>🔧 CORRECCIONES APLICADAS:</h3>
            <ul>
                <li>✅ <strong>Errores 404 corregidos:</strong> thumbnail.jpg → scuola.jpg, calidadinstitucional.png → nuestro-colegio.jpg</li>
                <li>✅ <strong>Footer restaurado:</strong> HTML completo del footer agregado</li>
                <li>✅ <strong>Bucle de redirección eliminado:</strong> Prevención de clics removida</li>
                <li>✅ <strong>Navegación normal:</strong> Enlaces funcionan correctamente</li>
            </ul>
        </div>
        
        <div class="success">
            <h3>🧪 PRUEBA AHORA:</h3>
            <ol>
                <li><strong>Modo Admin:</strong> <a href="index.php?cms_admin_token=true" class="btn btn-success">Abrir Modo Admin</a></li>
                <li><strong>Modo Visitante:</strong> <a href="index.php" class="btn">Abrir Modo Visitante</a></li>
                <li><strong>Sin errores 404:</strong> Revisa la consola (F12)</li>
                <li><strong>Footer visible:</strong> Debería aparecer al final</li>
            </ol>
        </div>
        
        <div class="success">
            <h3>🎯 RESULTADO ESPERADO:</h3>
            <ul>
                <li>✅ <strong>Sin errores 404</strong> en la consola</li>
                <li>✅ <strong>Footer visible</strong> en ambas versiones</li>
                <li>✅ <strong>Sin redirección</strong> automática</li>
                <li>✅ <strong>Contenido completo</strong> visible</li>
            </ul>
        </div>
        
        <div style="margin-top: 30px;">
            <a href="index.php?cms_admin_token=true" class="btn btn-success">🌐 Probar Modo Admin</a>
            <a href="index.php" class="btn">👁️ Probar Modo Visitante</a>
            <a href="DIAGNOSTICO_CRITICO.php" class="btn">🔍 Ejecutar Diagnóstico</a>
        </div>
        
        <div style="margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 4px;">
            <h4>📋 CONTENIDO DE PRUEBA:</h4>
            <div id="original-content">
                <h2>Contenido Original</h2>
                <p>Este es el contenido original que debería mostrarse cuando no hay contenido guardado.</p>
                <p>Si ves este contenido, significa que el CMS está funcionando correctamente.</p>
            </div>
            
            <div id="cms-root">
                <!-- El contenido del CMS se cargará aquí -->
            </div>
        </div>
    </div>
    
    <!-- Usar el JavaScript corregido -->
    <script src="cms-admin.js"></script>
    
    <script>
        // Mostrar información de debug
        window.addEventListener('load', function() {
            console.log('✅ Página de prueba cargada');
            console.log('🔍 Verificando elementos DOM...');
            
            const cmsRoot = document.getElementById('cms-root');
            const originalContent = document.getElementById('original-content');
            
            console.log('cms-root encontrado:', !!cmsRoot);
            console.log('original-content encontrado:', !!originalContent);
            
            if (typeof loadSavedContent === 'function') {
                console.log('✅ Función loadSavedContent disponible');
            } else {
                console.error('❌ Función loadSavedContent no disponible');
            }
        });
    </script>
</body>
</html>
