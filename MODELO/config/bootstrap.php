<?php
// Bootstrap mínimo para rutas estables
// Define BASE_PATH y asegura carga de conexion.php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/..'));
}

// Cargar conexión (mantiene mysqli actual)
require_once BASE_PATH . '/conexion.php';

// Helper para rutas absolutas a MODELO
if (!function_exists('model_path')) {
    function model_path($relative)
    {
        return BASE_PATH . '/' . ltrim($relative, '/');
    }
}


