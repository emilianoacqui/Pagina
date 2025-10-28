<?php
require_once(__DIR__ . '/../config/bootstrap.php');

class StudentModel {
    private $conn;
    
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }
    
    /**
     * Gets classes assigned to a student
     */
    public function getStudentClasses($userId) {
        $stmt = $this->conn->prepare("
            SELECT c.id_clase, c.nombre, c.año
            FROM clases c
            JOIN usuarios_clases uc ON c.id_clase = uc.id_clase
            WHERE uc.id_usuario = ? AND uc.rol_en_clase = 'alumno'
            ORDER BY c.año, c.nombre
        ");
        $stmt->bind_param("i", $userId);
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
     * Gets teachers by class for a student
     */
    public function getTeachersByClass($classIds) {
        if (empty($classIds)) {
            return [];
        }
        
        $in = implode(',', array_map('intval', $classIds));
        $sql = "
            SELECT uc.id_clase, u.id_usuario, u.nombre, u.email
            FROM usuarios_clases uc
            JOIN usuarios u ON uc.id_usuario = u.id_usuario
            WHERE uc.id_clase IN ($in) AND uc.rol_en_clase='profesor'
            ORDER BY u.nombre
        ";
        
        $result = $this->conn->query($sql);
        $teachersByClass = [];
        while ($row = $result->fetch_assoc()) {
            $teachersByClass[$row['id_clase']][] = $row;
        }
        return $teachersByClass;
    }
    
    /**
     * Gets events for classes
     */
    public function getEventsForClasses($classIds) {
        if (empty($classIds)) {
            return [];
        }
        
        $in = implode(',', array_map('intval', $classIds));
        $sql = "SELECT e.*, c.nombre AS clase_nombre
                FROM eventos e
                LEFT JOIN clases c ON e.id_clase = c.id_clase
                WHERE e.tipo = 'general' OR (e.tipo='clase' AND e.id_clase IN ($in))
                ORDER BY e.fecha DESC";
        
        $result = $this->conn->query($sql);
        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
        return $events;
    }
    
    /**
     * Gets events (only general) when no classes
     */
    public function getGeneralEvents() {
        $result = $this->conn->query("SELECT e.*, NULL AS clase_nombre FROM eventos e WHERE e.tipo='general' ORDER BY e.fecha DESC");
        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
        return $events;
    }
    
    /**
     * Gets calendar by class
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
     * Gets upcoming dates
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
}
?>

