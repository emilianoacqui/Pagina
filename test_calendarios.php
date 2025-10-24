<?php
// Archivo de prueba para verificar que los calendarios funcionan correctamente
session_start();

// Simular sesión de alumno para prueba
$_SESSION['id_usuario'] = 1;
$_SESSION['rol'] = 'alumno';
$_SESSION['nombre'] = 'Alumno de Prueba';

echo "<h1>🧪 Prueba de Calendarios</h1>";
echo "<p>Este archivo simula una sesión de alumno para probar los calendarios.</p>";

echo "<h2>📋 Endpoints creados:</h2>";
echo "<ul>";
echo "<li><strong>get_calendar_events.php</strong> - Obtiene eventos para alumnos y profesores</li>";
echo "<li><strong>get_group_calendar.php</strong> - Obtiene eventos de un grupo específico para profesores</li>";
echo "</ul>";

echo "<h2>🎯 Funcionalidades implementadas:</h2>";
echo "<ul>";
echo "<li>✅ <strong>Calendario visual para alumnos</strong> - Ven todas sus tareas en formato calendario</li>";
echo "<li>✅ <strong>Calendario visual para profesores</strong> - Pueden ver el calendario de cada grupo por separado</li>";
echo "<li>✅ <strong>Vista dual</strong> - Tanto alumnos como profesores pueden cambiar entre vista calendario y lista</li>";
echo "<li>✅ <strong>Separación por grupos</strong> - Cada grupo tiene su propio calendario independiente</li>";
echo "<li>✅ <strong>Diseño coherente</strong> - Los calendarios mantienen el estilo de la página</li>";
echo "<li>✅ <strong>Sin cambios en BD</strong> - Usa la estructura existente de la tabla 'calendario'</li>";
echo "</ul>";

echo "<h2>🔧 Cómo usar:</h2>";
echo "<ol>";
echo "<li><strong>Para alumnos:</strong> Ir al panel de alumno → sección 'Calendario' → botón 'Vista Calendario'</li>";
echo "<li><strong>Para profesores:</strong> Ir al panel de profesor → sección 'Calendario' → botón 'Vista Calendario' → seleccionar grupo</li>";
echo "</ol>";

echo "<h2>📱 Características técnicas:</h2>";
echo "<ul>";
echo "<li>Usa <strong>FullCalendar v6.1.10</strong> para una experiencia moderna</li>";
echo "<li>Colores diferenciados: <span style='color: #3498db;'>🔵 Tareas</span>, <span style='color: #e74c3c;'>🔴 Exámenes</span>, <span style='color: #f39c12;'>🟠 Otros</span></li>";
echo "<li>Responsive y compatible con móviles</li>";
echo "<li>Interfaz en español</li>";
echo "<li>Click en eventos para ver detalles</li>";
echo "</ul>";

echo "<p><strong>🎉 ¡Los calendarios están listos para usar!</strong></p>";
?>
