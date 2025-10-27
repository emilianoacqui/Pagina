<?php
require_once(__DIR__ . '/../config/bootstrap.php');

class UserModel {
    private $conn;
    
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }
    
    /**
     * Authenticates a user by email and password
     */
    public function authenticateUser($email, $password) {
        $stmt = $this->conn->prepare("SELECT id_usuario, nombre, email, password, rol FROM usuarios WHERE email=? LIMIT 1");
        if (!$stmt) {
            return ['success' => false, 'error' => 'Error en la base de datos: ' . $this->conn->error];
        }
        
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $user = $res->fetch_assoc();
        $stmt->close();
        
        if (!$user || !password_verify($password, $user['password'])) {
            return ['success' => false, 'error' => 'Credenciales inválidas'];
        }
        
        return [
            'success' => true,
            'user' => [
                'id_usuario' => $user['id_usuario'],
                'nombre' => $user['nombre'],
                'email' => $user['email'],
                'rol' => $user['rol']
            ]
        ];
    }
    
    /**
     * Checks if an email already exists
     */
    public function checkEmailExists($email) {
        $stmt = $this->conn->prepare("SELECT id_usuario FROM usuarios WHERE email=? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $exists = $stmt->num_rows > 0;
        $stmt->close();
        return $exists;
    }
    
    /**
     * Registers a new user
     */
    public function registerUser($email, $password, $rol = 'alumno', $nombre = null) {
        // Si no se proporciona nombre, usar parte antes del @
        if (!$nombre) {
            list($nombre) = explode('@', $email, 2);
        }
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $email, $hash, $rol);
        
        if ($stmt->execute()) {
            $userId = $this->conn->insert_id;
            $stmt->close();
            return [
                'success' => true,
                'user_id' => $userId
            ];
        } else {
            $error = $this->conn->error;
            $stmt->close();
            return [
                'success' => false,
                'error' => $error
            ];
        }
    }
    
    /**
     * Gets user information by ID
     */
    public function getUserById($userId) {
        $stmt = $this->conn->prepare("SELECT id_usuario, nombre, email, rol FROM usuarios WHERE id_usuario=? LIMIT 1");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $res = $stmt->get_result();
        $user = $res->fetch_assoc();
        $stmt->close();
        return $user;
    }
    
    /**
     * Gets all users
     */
    public function getAllUsers() {
        $users = [];
        $result = $this->conn->query("SELECT id_usuario, nombre, email, rol FROM usuarios ORDER BY nombre");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    
    /**
     * Updates user information
     */
    public function updateUser($userId, $nombre, $email, $rol = null) {
        $sql = "UPDATE usuarios SET nombre = ?, email = ?";
        $params = [$nombre, $email];
        $types = "ss";
        
        if ($rol) {
            $sql .= ", rol = ?";
            $params[] = $rol;
            $types .= "s";
        }
        
        $sql .= " WHERE id_usuario = ?";
        $params[] = $userId;
        $types .= "i";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
    
    /**
     * Deletes a user
     */
    public function deleteUser($userId) {
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        $stmt->bind_param("i", $userId);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}
?>

