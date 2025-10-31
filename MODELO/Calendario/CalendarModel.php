<?php
require_once(__DIR__ . '/../config/bootstrap.php');

class CalendarModel {
    private $conn;
    
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }
    
    /**
     * Gets classes for a user by role
     */
    public function getUserClasses($userId, $role) {
        $stmt = $this->conn->prepare("
            SELECT c.id_clase, c.nombre, c.año
            FROM clases c
            JOIN usuarios_clases uc ON c.id_clase = uc.id_clase
            WHERE uc.id_usuario = ? AND uc.rol_en_clase = ?
            ORDER BY c.año, c.nombre
        ");
        $stmt->bind_param("is", $userId, $role);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $classes = [];
        while ($row = $result->fetch_assoc()) {
            $classes[] = $row;
        }
        $stmt->close();
        return $classes;
    }
    
    /**
     * Gets events for specific classes
     */
    public function getEventsForClasses($classIds, $role = 'alumno') {
        if (empty($classIds)) {
            return [];
        }
        
        $in = implode(',', array_map('intval', $classIds));
        
        if ($role === 'alumno') {
            $sql = "SELECT cal.id, cal.fecha, cal.tipo, cal.descripcion, c.nombre as clase_nombre, c.año
                    FROM calendario cal
                    JOIN clases c ON cal.id_clase = c.id_clase
                    WHERE cal.id_clase IN ($in)
                    ORDER BY cal.fecha ASC";
        } else {
            $sql = "SELECT cal.id, cal.fecha, cal.tipo, cal.descripcion, c.nombre as clase_nombre, c.año, u.nombre as profesor_nombre
                    FROM calendario cal
                    JOIN clases c ON cal.id_clase = c.id_clase
                    JOIN usuarios u ON cal.creado_por = u.id_usuario
                    WHERE cal.id_clase IN ($in)
                    ORDER BY cal.fecha ASC";
        }
        
        $result = $this->conn->query($sql);
        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
        return $events;
    }
    
    /**
     * Gets calendar events formatted for FullCalendar
     */
    public function getCalendarEvents($userId, $role, $userName = null) {
        $classes = $this->getUserClasses($userId, $role);
        
        if (empty($classes)) {
            return [];
        }
        
        $classIds = [];
        foreach ($classes as $class) {
            $classIds[] = $class['id_clase'];
        }
        
        if (empty($classIds)) {
            return [];
        }
        
        $events = $this->getEventsForClasses($classIds, $role);
        
        $formattedEvents = [];
        foreach ($events as $event) {
            $isTeacher = ($role === 'profesor');
            $eventData = [
                'id' => $event['id'],
                'title' => ucfirst($event['tipo']) . ' - ' . $event['año'] . '° ' . $event['clase_nombre'],
                'start' => $event['fecha'],
                'allDay' => true,
                'color' => self::getEventColor($event['tipo']),
                'extendedProps' => [
                    'tipo' => $event['tipo'],
                    'clase' => $event['año'] . '° ' . $event['clase_nombre'],
                    'descripcion' => $event['descripcion']
                ]
            ];
            
            if ($isTeacher && isset($event['profesor_nombre'])) {
                $eventData['extendedProps']['profesor'] = $event['profesor_nombre'];
                $eventData['extendedProps']['es_mi_tarea'] = ($event['profesor_nombre'] === $userName);
            }
            
            $formattedEvents[] = $eventData;
        }
        
        return $formattedEvents;
    }
    
    /**
     * Verifies that a user has access to a class
     */
    public function verifyUserClassAccess($userId, $classId, $role) {
        $stmt = $this->conn->prepare("
            SELECT 1 FROM usuarios_clases 
            WHERE id_usuario = ? AND id_clase = ? AND rol_en_clase = ?
        ");
        $stmt->bind_param("iis", $userId, $classId, $role);
        $stmt->execute();
        $stmt->store_result();
        $hasAccess = $stmt->num_rows > 0;
        $stmt->close();
        return $hasAccess;
    }
    
    /**
     * Gets class information by ID
     */
    public function getClassInfo($classId) {
        $stmt = $this->conn->prepare("SELECT nombre, año FROM clases WHERE id_clase = ?");
        $stmt->bind_param("i", $classId);
        $stmt->execute();
        $result = $stmt->get_result();
        $class = $result->fetch_assoc();
        $stmt->close();
        return $class;
    }
    
    /**
     * Gets all events for a specific class
     */
    public function getClassEvents($classId) {
        $stmt = $this->conn->prepare("
            SELECT cal.id, cal.fecha, cal.tipo, cal.descripcion, u.nombre as profesor_nombre
            FROM calendario cal
            JOIN usuarios u ON cal.creado_por = u.id_usuario
            WHERE cal.id_clase = ?
            ORDER BY cal.fecha ASC
        ");
        $stmt->bind_param("i", $classId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = [
                'id' => $row['id'],
                'title' => ucfirst($row['tipo']) . ' - ' . $row['profesor_nombre'],
                'start' => $row['fecha'],
                'allDay' => true,
                'color' => self::getEventColor($row['tipo']),
                'extendedProps' => [
                    'tipo' => $row['tipo'],
                    'profesor' => $row['profesor_nombre'],
                    'descripcion' => $row['descripcion']
                ]
            ];
        }
        $stmt->close();
        return $events;
    }
    
    /**
     * Gets upcoming dates for classes (next N days)
     */
    public function getUpcomingDates($classIds, $days = 30) {
        if (empty($classIds)) {
            return [];
        }
        
        $in = implode(',', array_map('intval', $classIds));
        $fechaActual = date('Y-m-d');
        $fechaLimite = date('Y-m-d', strtotime("+{$days} days"));
        
        $sql = "SELECT cal.fecha, cal.tipo, c.nombre as clase_nombre, c.año
                FROM calendario cal
                JOIN clases c ON cal.id_clase = c.id_clase
                WHERE cal.id_clase IN ($in) 
                AND cal.fecha BETWEEN ? AND ?
                ORDER BY cal.fecha ASC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $fechaActual, $fechaLimite);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $dates = [];
        while ($row = $result->fetch_assoc()) {
            $dates[] = $row;
        }
        $stmt->close();
        return $dates;
    }
    
    /**
     * Gets calendar items grouped by class
     */
    public function getCalendarByClass($classIds) {
        if (empty($classIds)) {
            return [];
        }
        
        $in = implode(',', array_map('intval', $classIds));
        $sql = "SELECT id_clase, fecha, tipo FROM calendario WHERE id_clase IN ($in) ORDER BY fecha ASC";
        $result = $this->conn->query($sql);
        
        $calendar = [];
        while ($row = $result->fetch_assoc()) {
            $calendar[$row['id_clase']][] = $row;
        }
        return $calendar;
    }
    
    /**
     * Adds a calendar event
     */
    public function addEvent($classId, $fecha, $tipo, $descripcion, $creadoPor) {
        $stmt = $this->conn->prepare("
            INSERT INTO calendario (id_clase, fecha, tipo, descripcion, creado_por) 
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("isssi", $classId, $fecha, $tipo, $descripcion, $creadoPor);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
    
    /**
     * Gets event color by type
     */
    public static function getEventColor($tipo) {
        switch ($tipo) {
            case 'tarea':
                return '#3498db'; // Azul
            case 'examen':
                return '#e74c3c'; // Rojo
            case 'prueba':
                return '#9b59b6'; // Púrpura
            case 'oral':
                return '#e67e22'; // Naranja oscuro
            case 'proyecto':
                return '#27ae60'; // Verde
            case 'entrega':
                return '#f39c12'; // Naranja
            case 'otro':
                return '#95a5a6'; // Gris
            default:
                return '#95a5a6'; // Gris
        }
    }
}
?>

