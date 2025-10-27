# Análisis de Estructura MVC - Scuola Italiana

## 📋 Resumen Ejecutivo

**Estado General:** Hay violaciones significativas del patrón MVC en varias áreas.

**Problemas Principales:**
1. ❌ Consultas SQL directas en controladores (deberían usar modelos)
2. ❌ Lógica de negocio en vistas (debería estar en controladores/modelos)
3. ❌ Funciones auxiliares en controladores (deberían estar en modelos)
4. ❌ Archivos casi vacíos en CONTROLADOR que solo redirigen

---

## 🔴 PROBLEMAS CRÍTICOS IDENTIFICADOS

### 1. **CONTROLADOR con Consultas SQL Directas**

#### ❌ CONTROLADOR/Auth/login.php
**Problema:** Consulta SQL directa en lugar de usar modelo
```php
$stmt = $conn->prepare("SELECT id_usuario, nombre, email, password, rol FROM usuarios WHERE email=? LIMIT 1");
```
**Solución:** Crear `MODELO/Auth/UserModel.php` con método `authenticateUser()`

#### ❌ CONTROLADOR/Auth/register.php
**Problema:** Consulta SQL y lógica de validación en controlador
```php
$stmt = $conn->prepare("SELECT id_usuario FROM usuarios WHERE email=? LIMIT 1");
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
```
**Solución:** Mover a `MODELO/Auth/UserModel.php` con métodos:
- `checkEmailExists()`
- `registerUser()`

#### ❌ CONTROLADOR/Calendario/get_calendar_events.php
**Problema:** Múltiples consultas SQL directas
```php
$stmt = $conn->prepare("SELECT c.id_clase, c.nombre, c.año FROM clases c...");
$sql = "SELECT cal.id, cal.fecha, cal.tipo...";
```
**Solución:** Crear `MODELO/Calendario/CalendarModel.php` con métodos:
- `getUserClasses()`
- `getEventsForClasses()`
- `getEventColor()`

#### ❌ CONTROLADOR/Calendario/get_group_calendar.php
**Problema:** Consultas SQL y lógica de autorización
```php
$stmt = $conn->prepare("SELECT 1 FROM usuarios_clases...");
$stmt = $conn->prepare("SELECT nombre, año FROM clases...");
$stmt = $conn->prepare("SELECT cal.id, cal.fecha...");
```
**Solución:** Mover a `MODELO/Calendario/CalendarModel.php` con métodos:
- `verifyUserAccess()`
- `getClassInfo()`
- `getClassEvents()`

#### ❌ CONTROLADOR/Jobs/procesar_trabajo.php
**Problema:** Creación de tabla en controlador
```php
$conn->query("CREATE TABLE IF NOT EXISTS job_applications...");
```
**Problema:** Consulta SQL y manejo de archivos
**Solución:** Crear `MODELO/Jobs/JobApplicationModel.php` con:
- `ensureTable()` - auto-llamado en constructor
- `submitApplication()`
- Métodos de validación de archivos

#### ❌ CONTROLADOR/Analytics/reset_stats.php
**Problema:** Consulta SQL directa
```php
$result = $conn->query("DELETE FROM page_analytics");
```
**Solución:** Ya existe `AnalyticsModel` -> agregar método `resetStats()` y usarlo

---

### 2. **VISTA con Lógica de Negocio y Consultas SQL**

#### ❌ VISTA/Paneles/html/alumno_panel.php
**Problema:** MUCHAS consultas SQL en la vista
```php
$stmt = $conn->prepare("SELECT c.id_clase, c.nombre...");
$sql = "SELECT uc.id_clase, u.id_usuario...";
$sql = "SELECT e.*, c.nombre...";
$sql = "SELECT id_clase, fecha, tipo...";
```
**Líneas afectadas:** 22-98 (más de 70 líneas de SQL)

**Problema:** También tiene lógica de presentación compleja

**Solución:** 
1. Crear `CONTROLADOR/Paneles/alumno_panel.php` que prepare todos los datos
2. Mover consultas a modelos: `StudentModel`, `ClassModel`, `EventModel`, `CalendarModel`
3. La vista solo muestra datos ya preparados

#### ❌ VISTA/Paneles/html/profesor_panel.php
**Mismo problema:** Consultas SQL directas en vista (líneas 102-147)
**Misma solución:** Crear controlador y modelos correspondientes

#### ❌ VISTA/Paneles/html/coordinador_panel.php
**Problema:** Consultas SQL y lógica de negocio (líneas 23-50+)
```php
if (isset($_POST['crear_usuario'])) {
    $stmt = $conn->prepare("INSERT INTO usuarios...");
}
```
**Solución:** 
1. Crear `CONTROLADOR/Paneles/coordinador_panel_ajax.php`
2. Usar `UserModel` para operaciones de usuarios

---

### 3. **Funciones Auxiliares en CONTROLADOR (Deberían estar en MODELO)**

#### ❌ CONTROLADOR/Cms/load_page_content.php
**Problema:** Función `jsHash()` está en controlador (líneas 43-52)
**Solución:** Mover a `PagesManager` como método privado

#### ❌ CONTROLADOR/Cms/save_page_content.php
**Problema:** Funciones `jsHash()` y `sanitizeCmsContent()` en controlador (líneas 14-47)
**Solución:** Mover a `PagesManager` como métodos

---

### 4. **Archivos sin Propósito o Vacíos**

#### ⚠️ CONTROLADOR/Cms/load.php
```php
<?php
require_once(__DIR__ . '/../../MODELO/Gestor/load_page_content.php');
```
**Problema:** Solo redirige, innecesario
**Solución:** Eliminar y usar `load_page_content.php` directamente

#### ⚠️ CONTROLADOR/Cms/save.php
```php
<?php
require_once(__DIR__ . '/save_page_content.php');
```
**Problema:** Solo redirige, innecesario
**Solución:** Eliminar y usar `save_page_content.php` directamente

#### ⚠️ CONTROLADOR/Jobs/apply.php
```php
<?php
require_once(__DIR__ . '/procesar_trabajo.php');
```
**Problema:** Solo redirige
**Solución:** Eliminar y usar `procesar_trabajo.php` directamente

---

### 5. **MODELO con Lógica de Presentación**

#### ❌ MODELO/Gestor/view_page.php
**Problema:** Este es un archivo de **vista**, no de modelo. Contiene HTML completo.
**Solución:** Mover a `VISTA/PaginaWeb/cms/view_page.php` o integrar con `gestorCont.php`

---

## ✅ LO QUE ESTÁ BIEN

### ✓ ARCHIVOS CORRECTOS:

1. **MODELO/Gestor/PagesManagerClass.php** ✅
   - Separación correcta: maneja datos/persistencia
   - Usa prepared statements
   - No tiene lógica de presentación

2. **MODELO/Analytics/AnalyticsModel.php** ✅
   - Separación correcta
   - Métodos bien definidos
   - Uso correcto en controladores

3. **CONTROLADOR/Analytics/get_stats.php** ✅
   - Solo delega al modelo
   - No tiene lógica de negocio
   - Buen ejemplo de controlador

4. **CONTROLADOR/Analytics/track_visit.php** ✅
   - Uso correcto del modelo
   - Solo procesa petición y delega

5. **CONTROLADOR/Cms/pages_manager.php** ✅
   - Usa el modelo `PagesManager`
   - No tiene consultas SQL directas

---

## 📝 PLAN DE REFACTORIZACIÓN RECOMENDADO

### Fase 1: Crear Modelos Faltantes
1. `MODELO/Auth/UserModel.php` - Autenticación y usuarios
2. `MODELO/Calendario/CalendarModel.php` - Calendarios y eventos
3. `MODELO/Paneles/StudentModel.php` - Datos de estudiantes
4. `MODELO/Paneles/ClassModel.php` - Datos de clases
5. `MODELO/Jobs/JobApplicationModel.php` - Aplicaciones de trabajo

### Fase 2: Refactorizar Controladores
1. `CONTROLADOR/Auth/*` - Usar `UserModel`
2. `CONTROLADOR/Calendario/*` - Usar `CalendarModel`
3. `CONTROLADOR/Paneles/*` - Crear controladores para paneles
4. `CONTROLADOR/Jobs/*` - Usar `JobApplicationModel`
5. `CONTROLADOR/Analytics/reset_stats.php` - Usar `AnalyticsModel`

### Fase 3: Limpiar Vistas
1. `VISTA/Paneles/html/*` - Solo HTML/CSS
2. Mover toda la lógica a controladores
3. Los controladores preparan datos, las vistas los muestran

### Fase 4: Reorganizar Estructura
1. Eliminar archivos innecesarios (load.php, save.php, apply.php)
2. Mover funciones auxiliares a modelos
3. Mover view_page.php a VISTA

---

## 🎯 PRINCIPIO MVC EN ACCIÓN

**Correcto:**
```php
// CONTROLADOR: Solo coordina
$model = new UserModel();
$result = $model->authenticateUser($email, $password);
echo json_encode($result);

// MODELO: Solo lógica de datos
class UserModel {
    public function authenticateUser($email, $pass) {
        $stmt = $this->conn->prepare("SELECT...");
        // lógica aquí
    }
}

// VISTA: Solo presenta datos
<html>...</html>
```

**Incorrecto (lo que tienes ahora):**
```php
// CONTROLADOR haciendo trabajo de MODELO
$stmt = $conn->prepare("SELECT...");  // ❌ Debería estar en modelo

// VISTA haciendo trabajo de CONTROLADOR y MODELO
$stmt = $conn->prepare("SELECT...");  // ❌ Debería estar en modelo
// ... lógica de negocio ...            // ❌ Debería estar en controlador
```

---

## 📊 ESTADÍSTICAS

- **Archivos con violaciones:** ~15 archivos
- **Consultas SQL fuera de modelos:** ~25 consultas
- **Vistas con lógica de negocio:** 3 archivos grandes
- **Funciones auxiliares mal ubicadas:** 2 funciones

---

## 🚀 PRIORIDADES

**ALTA PRIORIDAD** (Seguridad y Mantenibilidad):
1. Mover consultas SQL de controladores a modelos
2. Extraer lógica de negocio de vistas a controladores
3. Implementar UserModel para login seguro

**MEDIA PRIORIDAD**:
4. Crear modelos faltantes
5. Refactorizar paneles de usuarios
6. Limpiar archivos innecesarios

**BAJA PRIORIDAD**:
7. Reorganizar estructura de carpetas
8. Optimizar arquitectura general

