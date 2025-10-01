<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Simple - Sin Footer</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f0f0f0; }
        .test-container { 
            max-width: 800px; 
            margin: 0 auto; 
            background: white; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .success { background: #d4edda; border: 1px solid #28a745; padding: 15px; border-radius: 4px; margin: 10px 0; }
        .error { background: #f8d7da; border: 1px solid #dc3545; padding: 15px; border-radius: 4px; margin: 10px 0; }
        .info { background: #d1ecf1; border: 1px solid #17a2b8; padding: 15px; border-radius: 4px; margin: 10px 0; }
        .btn { 
            background: #007cba; 
            color: white; 
            padding: 10px 20px; 
            text-decoration: none; 
            border-radius: 4px; 
            display: inline-block; 
            margin: 5px;
        }
        .btn:hover { background: #005a87; }
    </style>
</head>
<body>
    <div class="test-container">
        <h1>🧪 Test Simple - Sin Footer</h1>
        
        <div class="info">
            <h3>📋 Estado Actual</h3>
            <p>He eliminado temporalmente el footer del contenido original para evitar conflictos.</p>
            <p>Ahora el contenido principal debería mostrarse correctamente.</p>
        </div>
        
        <div class="success">
            <h3>✅ Pasos para Probar</h3>
            <ol>
                <li><strong>Modo Admin:</strong> <a href="index.php?cms_admin_token=true" class="btn">Abrir Modo Admin</a></li>
                <li><strong>Editar:</strong> Haz clic en "✏️ Editar esta página"</li>
                <li><strong>Modificar:</strong> Cambia algún texto en las secciones principales</li>
                <li><strong>Guardar:</strong> Haz clic en "💾 Guardar cambios"</li>
                <li><strong>Verificar:</strong> <a href="index.php" class="btn">Abrir Modo Visitante</a></li>
            </ol>
        </div>
        
        <div class="info">
            <h3>🔍 Debug</h3>
            <p>Si aún no funciona, abre la consola del navegador (F12) y busca estos mensajes:</p>
            <ul>
                <li><code>🔍 Buscando contenido para: index.php con ID: existing_[número]</code></li>
                <li><code>✅ Contenido cargado del servidor</code> o <code>✅ Contenido cargado de localStorage</code></li>
                <li><code>ℹ️ No se encontró contenido guardado, mostrando contenido original</code></li>
            </ul>
        </div>
        
        <div class="info">
            <h3>📊 Verificar Contenido Guardado</h3>
            <p><a href="debug_content.php" class="btn">Ver Debug del Contenido</a></p>
        </div>
        
        <div class="success">
            <h3>🎯 Lo que Debería Pasar Ahora</h3>
            <ul>
                <li>✅ <strong>Sin contenido guardado:</strong> Se muestra el contenido original completo (sin footer)</li>
                <li>✅ <strong>Con contenido guardado:</strong> Se muestra el contenido editado completo</li>
                <li>✅ <strong>Sin parpadeo:</strong> El contenido se oculta inmediatamente</li>
                <li>✅ <strong>Sin área vacía:</strong> Todo el contenido principal se muestra</li>
            </ul>
        </div>
    </div>
</body>
</html>
