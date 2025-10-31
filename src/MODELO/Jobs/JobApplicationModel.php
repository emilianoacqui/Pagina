<?php
require_once(__DIR__ . '/../config/bootstrap.php');

class JobApplicationModel {
    private $conn;
    
    public function __construct() {
        global $conn;
        $this->conn = $conn;
        $this->ensureTable();
    }
    
    /**
     * Ensures the job_applications table exists
     */
    private function ensureTable() {
        $this->conn->query("CREATE TABLE IF NOT EXISTS job_applications (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            celular VARCHAR(50) DEFAULT NULL,
            mensaje TEXT NOT NULL,
            cv_path VARCHAR(512) DEFAULT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    }
    
    /**
     * Validates email format
     */
    public function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    /**
     * Validates file upload
     */
    public function validateFile($file, $allowedTypes = ['pdf', 'doc', 'docx'], $maxSize = 5242880) {
        if (!isset($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return ['valid' => false, 'error' => 'No se recibió archivo válido'];
        }
        
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowedTypes)) {
            return ['valid' => false, 'error' => 'Tipo de archivo no permitido. Solo ' . implode(', ', $allowedTypes)];
        }
        
        if ($file['size'] > $maxSize) {
            return ['valid' => false, 'error' => 'El archivo supera el tamaño máximo (' . ($maxSize / 1024 / 1024) . 'MB)'];
        }
        
        return ['valid' => true];
    }
    
    /**
     * Handles CV file upload
     */
    public function uploadCV($file, $uploadDir = null) {
        if (!$uploadDir) {
            $uploadDir = __DIR__ . '/../../VISTA/Paneles/uploads';
        }
        
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                return ['success' => false, 'error' => 'No se pudo crear el directorio de destino'];
            }
        }
        
        $safeName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', basename($file['name']));
        $fileName = date('Ymd_His') . '_' . $safeName;
        $targetPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
        
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return ['success' => true, 'path' => 'uploads/' . $fileName, 'filename' => $fileName];
        } else {
            return ['success' => false, 'error' => 'Error al subir el CV'];
        }
    }
    
    /**
     * Submits a job application
     */
    public function submitApplication($nombre, $email, $celular, $mensaje, $cvPath = null) {
        $stmt = $this->conn->prepare("
            INSERT INTO job_applications (nombre, email, celular, mensaje, cv_path) 
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param('sssss', $nombre, $email, $celular, $mensaje, $cvPath);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
    
    /**
     * Gets all applications
     */
    public function getAllApplications() {
        $applications = [];
        $result = $this->conn->query("SELECT * FROM job_applications ORDER BY created_at DESC");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $applications[] = $row;
            }
        }
        return $applications;
    }
    
    /**
     * Gets an application by ID
     */
    public function getApplicationById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM job_applications WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $application = $result->fetch_assoc();
        $stmt->close();
        return $application;
    }
    
    /**
     * Deletes an application
     */
    public function deleteApplication($id) {
        $stmt = $this->conn->prepare("DELETE FROM job_applications WHERE id = ?");
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}
?>

