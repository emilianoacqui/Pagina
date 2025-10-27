<?php
require_once(__DIR__ . '/../config/bootstrap.php');

class PagesManager {
    private $conn;
    
    public function __construct() {
        global $conn;
        $this->conn = $conn;
        $this->ensureTables();
    }
    
    /**
     * Normalizes URL to avoid duplicates
     */
    private static function normalizeUrl($url) {
        $url = trim($url);
        // Quitar fragmentos y querystring para clave lógica
        $url = preg_replace('/[#?].*$/', '', $url);
        // Quitar trailing slash excepto si es solo '/'
        if ($url !== '/' ) { $url = rtrim($url, '/'); }
        // Normalizar espacios y minúsculas si no es absoluto con esquema
        // (mantener mayúsculas si fuese necesario para rutas específicas)
        return $url;
    }
    
    /**
     * Simple hash function compatible with JavaScript
     */
    public static function jsHash($str) {
        $hash = 0;
        if (strlen($str) == 0) return $hash;
        for ($i = 0; $i < strlen($str); $i++) {
            $char = ord($str[$i]);
            $hash = (($hash << 5) - $hash) + $char;
            $hash = $hash & $hash; // Convert to 32-bit integer
        }
        return abs($hash);
    }
    
    /**
     * Sanitizes CMS content by removing cms_admin_token from URLs
     */
    public static function sanitizeCmsContent($html) {
        if (!is_string($html) || $html === '') return $html;
        // Quitar ocurrencias directas en query strings
        $patterns = [
            '/([?&])cms_admin_token=true(&)?/i',
        ];
        $replacements = [
            function($m){
                // Si había otro parámetro después, conservar el separador ? o & correctamente
                if (isset($m[2]) && $m[2] === '&') {
                    return $m[1]; // deja ? o & y el resto seguirá
                }
                // Si era el único parámetro
                return $m[1] === '?' ? '' : '';
            }
        ];
        $result = preg_replace_callback($patterns[0], $replacements[0], $html);
        // Limpiar posibles ? o & colgantes al final de href/src
        $result = preg_replace('/\?(?:\s*|[&#]*)"/i', '"', $result);
        $result = preg_replace('/&(?![a-z0-9#])/i', '', $result);
        return $result;
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
        
        if (!$this->conn->query($sql)) {
            die("Error creando tabla: " . $this->conn->error);
        }
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
        // Devolver solo la versión más reciente por URL para evitar duplicados visuales
        $pages = [];
        $sql = "SELECT p.id, p.url, p.name, p.content, p.template,
                       DATE_FORMAT(p.last_modified, '%Y-%m-%d %H:%i:%s') as lastModified
                FROM cms_pages p
                INNER JOIN (
                    SELECT url, MAX(last_modified) AS max_lm
                    FROM cms_pages
                    GROUP BY url
                ) t ON t.url = p.url AND p.last_modified = t.max_lm
                ORDER BY p.last_modified DESC";
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
        
        // Normalizar URL para evitar variantes que generen duplicados
        $url = self::normalizeUrl($url);
        
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