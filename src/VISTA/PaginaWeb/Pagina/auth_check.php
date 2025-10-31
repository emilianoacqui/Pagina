<?php
session_start();
require_once('../../../MODELO/conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['rol'])) {
    // Si no está logueado, redirigir al login
    header('Location: ../../../VISTA/Auth/index.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
    exit();
}

// Verificar si el usuario tiene permisos de gestor (admin, coordinador, o gestor)
$allowed_roles = ['admin', 'coordinador', 'gestor'];
if (!in_array($_SESSION['rol'], $allowed_roles)) {
    // Si no tiene permisos, mostrar error
    die('
    <!DOCTYPE html>
    <html>
    <head>
        <title>Acceso Denegado</title>
        <style>
            body { font-family: Arial, sans-serif; text-align: center; padding: 50px; background: #f5f5f5; }
            .error { background: #e74c3c; color: white; padding: 20px; border-radius: 5px; display: inline-block; }
        </style>
    </head>
    <body>
        <div class="error">
            <h2>Acceso Denegado</h2>
            <p>No tienes permisos para acceder al gestor de contenido.</p>
            <a href="../../../VISTA/Auth/index.php" style="color: white;">Volver al login</a>
        </div>
    </body>
    </html>
    ');
}

// Si llegamos aquí, el usuario está autenticado y tiene permisos
?>
