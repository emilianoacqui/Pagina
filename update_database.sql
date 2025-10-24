-- Script para actualizar la base de datos con más tipos de tareas
-- Ejecutar este script en phpMyAdmin o tu cliente MySQL

-- Agregar más opciones al enum de tipos
ALTER TABLE `calendario` 
MODIFY COLUMN `tipo` ENUM('tarea','examen','prueba','oral','proyecto','entrega','otro') NOT NULL DEFAULT 'otro';

-- Opcional: Agregar algunos datos de ejemplo
-- INSERT INTO `calendario` (`id_clase`, `fecha`, `tipo`, `descripcion`, `creado_por`) VALUES
-- (15, '2025-01-15', 'examen', 'Examen de Matemáticas - Unidad 3', 17),
-- (15, '2025-01-20', 'tarea', 'Tarea de Historia - Capítulo 5', 17),
-- (15, '2025-01-18', 'prueba', 'Prueba de Ciencias Naturales', 17),
-- (15, '2025-01-22', 'oral', 'Presentación oral de Literatura', 17),
-- (15, '2025-01-25', 'proyecto', 'Proyecto final de Arte', 17),
-- (16, '2025-01-18', 'examen', 'Examen de Inglés', 17),
-- (16, '2025-01-25', 'entrega', 'Entrega de trabajo práctico', 17);
