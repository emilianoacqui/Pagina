<?php
require_once(__DIR__ . '/../config/bootstrap.php');

class TeacherModel {
    private $conn;
    
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }
    
    /**
     * Gets classes assigned to a teacher
     */
    public function getTeacherClasses($userId) {
        $stmt = $this->conn->prepare("
            SELECT c.id_clase, c.nombre, c.año
            FROM clases c
            JOIN usuarios_clases uc ON c.id_clase = uc.id_clase
            WHERE uc.id_usuario = ? AND uc.rol_en_clase = 'profesor'
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
     * Gets students by class for a teacher
     */
    public function getStudentsByClass($classIds) {
        if (empty($classIds)) {
            return [];
        }
        
        $in = implode(',', array_map('intval', $classIds));
        $sql = "
            SELECT uc.id_clase, u.id_usuario, u.nombre, u.email
            FROM usuarios_clases uc
            JOIN usuarios u ON uc.id_usuario = u.id_usuario
            WHERE uc.id_clase IN ($in) AND uc.rol_en_clase='alumno'
            ORDER BY u.nombre
        ";
        
        $result = $this->conn->query($sql);
        $studentsByClass = [];
        while ($row = $result->fetch_assoc()) {
            $studentsByClass[$row['id_clase']][] = $row;
        }
        return $studentsByClass;
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
        $sql = "SELECT * FROM calendario WHERE id_clase IN ($in) ORDER BY fecha DESC";
        
        $result = $this->conn->query($sql);
        $calendar = [];
        while ($row = $result->fetch_assoc()) {
            $calendar[$row['id_clase']][] = $row;
        }
        return $calendar;
    }
    
    /**
     * Verifies teacher has access to a class
     */
    public function verifyClassAccess($userId, $classId) {
        $stmt = $this->conn->prepare("
            SELECT 1 FROM usuarios_clases 
            WHERE id_usuario = ? AND id_clase = ? AND rol_en_clase = 'profesor' 
            LIMIT 1
        ");
        $stmt->bind_param("ii", $userId, $classId);
        $stmt->execute();
        $stmt->store_result();
        $hasAccess = $stmt->num_rows > 0;
        $stmt->close();
        return $hasAccess;
    }
    
    /**
     * Adds a calendar event
     */
    public function addCalendarEvent($classId, $fecha, $tipo, $descripcion, $userId) {
        $stmt = $this->conn->prepare("
            INSERT INTO calendario (id_clase, fecha, tipo, descripcion, creado_por) 
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("isssi", $classId, $fecha, $tipo, $descripcion, $userId);
        $success = $stmt->execute();
        $eventId = $success ? $this->conn->insert_id : null;
        $stmt->close();
        return $success ? ['success' => true, 'event_id' => $eventId] : ['success' => false];
    }
    
    /**
     * Deletes a calendar event
     */
    public function deleteCalendarEvent($eventId, $userId) {
        $stmt = $this->conn->prepare("
            SELECT c.id_clase
            FROM calendario c
            JOIN usuarios_clases uc ON c.id_clase = uc.id_clase
            WHERE c.id = ? AND uc.id_usuario = ? AND uc.rol_en_clase='profesor' 
            LIMIT 1
        ");
        $stmt->bind_param("ii", $eventId, $userId);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows === 0) {
            $stmt->close();
            return ['success' => false, 'error' => 'No tiene permisos'];
        }
        $stmt->close();
        
        $stmt2 = $this->conn->prepare("DELETE FROM calendario WHERE id = ?");
        $stmt2->bind_param("i", $eventId);
        $success = $stmt2->execute();
        $stmt2->close();
        
        return ['success' => $success];
    }
}
?>

