# 📋 Instrucciones para Actualizar la Base de Datos

## 🎯 Cambios Necesarios

Para que funcionen los nuevos tipos de tareas, necesitas ejecutar este comando SQL en tu base de datos:

### 1. Conectar a tu base de datos
- Abre phpMyAdmin o tu cliente MySQL favorito
- Selecciona la base de datos `sigie`

### 2. Ejecutar el comando SQL
```sql
ALTER TABLE `calendario` 
MODIFY COLUMN `tipo` ENUM('tarea','examen','prueba','oral','proyecto','entrega','otro') NOT NULL DEFAULT 'otro';
```

### 3. Verificar que funcionó
Puedes verificar que el cambio se aplicó correctamente ejecutando:
```sql
DESCRIBE calendario;
```

Deberías ver que la columna `tipo` ahora tiene más opciones.

## 🎨 Nuevos Tipos de Tareas y Colores

| Tipo | Color | Descripción |
|------|-------|-------------|
| 🔵 **Tarea** | Azul (#3498db) | Tareas regulares |
| 🔴 **Examen** | Rojo (#e74c3c) | Exámenes formales |
| 🟣 **Prueba** | Púrpura (#9b59b6) | Pruebas cortas |
| 🟠 **Oral** | Naranja oscuro (#e67e22) | Presentaciones orales |
| 🟢 **Proyecto** | Verde (#27ae60) | Proyectos largos |
| 🟡 **Entrega** | Naranja (#f39c12) | Entregas de trabajos |
| ⚪ **Otro** | Gris (#95a5a6) | Otros eventos |

## ✅ Funcionalidades Mejoradas

1. **Los profesores ahora ven:**
   - Sus propias tareas marcadas con ✅
   - Todas las tareas de sus grupos
   - Información de quién creó cada tarea

2. **Nuevos tipos de tareas:**
   - Más opciones para categorizar actividades
   - Colores diferenciados para fácil identificación

3. **Interfaz mejorada:**
   - Mejor información en los popups
   - Identificación clara de tareas propias

## 🚀 ¡Listo para usar!

Una vez ejecutado el comando SQL, el sistema estará completamente funcional con todas las mejoras.
