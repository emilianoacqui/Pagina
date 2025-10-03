<?php
class PagesManager {
    private $conn;
    
    public function __construct() {
        require_once 'conexion.php';
        $this->conn = $conn;
        $this->ensureTables();
    }
    
    private function ensureTables() {
        $sql = "CREATE TABLE IF NOT EXISTS cms_pages (
            id VARCHAR(255) PRIMARY KEY,
            url VARCHAR(512) NOT NULL,
            name VARCHAR(255) DEFAULT NULL,
            content MEDIUMTEXT NOT NULL,
            template VARCHAR(100) DEFAULT 'existing_page',
            last_modified DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            UNIQUE KEY uq_cms_pages_url (url)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        $this->conn->query($sql);
    }
    
    public function getPage($id) {
        $stmt = $this->conn->prepare("SELECT id, url, name, content, template, DATE_FORMAT(last_modified, '%Y-%m-%d %H:%i:%s') as lastModified FROM cms_pages WHERE id = ? LIMIT 1");
        $stmt->bind_param('s', $id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row ?: null;
        }
        $stmt->close();
        return null;
    }
    
    public function getAllPages() {
        $pages = [];
        $sql = "SELECT id, url, name, content, template, DATE_FORMAT(last_modified, '%Y-%m-%d %H:%i:%s') as lastModified FROM cms_pages ORDER BY last_modified DESC";
        if ($result = $this->conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $pages[] = $row;
            }
            $result->free();
        }
        return $pages;
    }
    
    public function savePage($pageData) {
        $id = $pageData['id'] ?? '';
        $url = $pageData['url'] ?? '';
        $name = $pageData['name'] ?? null;
        $content = $pageData['content'] ?? '';
        $template = $pageData['template'] ?? 'existing_page';
        
        if (!$id || !$url || $content === '') {
            return false;
        }
        
        // Upsert
        $sql = "INSERT INTO cms_pages (id, url, name, content, template)
                VALUES (?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                    url = VALUES(url),
                    name = VALUES(name),
                    content = VALUES(content),
                    template = VALUES(template)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssss', $id, $url, $name, $content, $template);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
    
    public function deletePage($id) {
        $stmt = $this->conn->prepare("DELETE FROM cms_pages WHERE id = ?");
        $stmt->bind_param('s', $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}
?>