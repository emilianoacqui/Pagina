<?php
require_once(__DIR__ . '/../config/bootstrap.php');

class AnalyticsModel {
    private $conn;

    public function __construct($conn = null) {
        $this->conn = $conn ?: $GLOBALS['conn'];
        $this->ensureSchema();
    }

    private function ensureSchema() {
        $this->conn->query("CREATE TABLE IF NOT EXISTS page_analytics (
            id INT AUTO_INCREMENT PRIMARY KEY,
            page_url VARCHAR(500) NOT NULL,
            page_title VARCHAR(255) DEFAULT NULL,
            visit_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            user_agent TEXT,
            ip_address VARCHAR(45),
            referrer VARCHAR(500) DEFAULT NULL,
            session_id VARCHAR(100) DEFAULT NULL,
            INDEX idx_page_url (page_url),
            INDEX idx_visit_date (visit_date)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    }

    public function trackVisit($pageUrl, $pageTitle, $referrer, $userAgent, $ipAddress, $sessionId) {
        if (!$pageUrl) { return ['success' => false, 'message' => 'URL de página requerida']; }

        // Bot filter
        if ($userAgent && preg_match('/bot|crawl|spider|slurp|bing|duckduck|baidu|yandex|crawler/i', $userAgent)) {
            return ['success' => true, 'message' => 'Visita ignorada (bot)'];
        }

        // Deduplicate within 30 minutes window per page_url + (session or ip)
        $sqlCheck = "SELECT COUNT(*) as c FROM page_analytics 
                     WHERE page_url = ? 
                       AND (session_id = ? OR ip_address = ?) 
                       AND visit_date >= DATE_SUB(NOW(), INTERVAL 30 MINUTE)";
        if ($stmtCheck = $this->conn->prepare($sqlCheck)) {
            $stmtCheck->bind_param('sss', $pageUrl, $sessionId, $ipAddress);
            $stmtCheck->execute();
            $result = $stmtCheck->get_result();
            $row = $result ? $result->fetch_assoc() : ['c' => 0];
            $stmtCheck->close();
            if ((int)$row['c'] > 0) {
                return ['success' => true, 'message' => 'Visita ya registrada (deduplicada)'];
            }
        }

        $stmt = $this->conn->prepare("INSERT INTO page_analytics (page_url, page_title, user_agent, ip_address, referrer, session_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssss', $pageUrl, $pageTitle, $userAgent, $ipAddress, $referrer, $sessionId);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok ? ['success' => true, 'message' => 'Visita registrada']
                   : ['success' => false, 'message' => 'Error al registrar visita'];
    }

    public function getStats($rangeDays = 30, $dailyDays = 7) {
        $stats = [
            'top_pages' => [],
            'daily_visits' => [],
            'hourly_visits' => [],
            'unique_visitors' => 0,
            'total_visits' => 0,
        ];

        // Top pages
        $sql = "SELECT page_url, page_title, COUNT(*) as visits 
                FROM page_analytics 
                WHERE visit_date >= DATE_SUB(NOW(), INTERVAL ? DAY)
                GROUP BY page_url, page_title 
                ORDER BY visits DESC 
                LIMIT 10";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param('i', $rangeDays);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_assoc()) {
                $stats['top_pages'][] = [
                    'url' => $row['page_url'],
                    'title' => $row['page_title'] ?: basename($row['page_url']),
                    'visits' => (int)$row['visits']
                ];
            }
            $stmt->close();
        }

        // Daily last N days
        $sql = "SELECT DATE(visit_date) as date, COUNT(*) as visits 
                FROM page_analytics 
                WHERE visit_date >= DATE_SUB(NOW(), INTERVAL ? DAY)
                GROUP BY DATE(visit_date) 
                ORDER BY date ASC";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param('i', $dailyDays);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_assoc()) {
                $stats['daily_visits'][] = [
                    'date' => $row['date'],
                    'visits' => (int)$row['visits']
                ];
            }
            $stmt->close();
        }

        // Hourly average (by hour) over last N days
        $sql = "SELECT HOUR(visit_date) as hour, COUNT(*) as visits 
                FROM page_analytics 
                WHERE visit_date >= DATE_SUB(NOW(), INTERVAL ? DAY)
                GROUP BY HOUR(visit_date) 
                ORDER BY hour ASC";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param('i', $dailyDays);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_assoc()) {
                $stats['hourly_visits'][] = [
                    'hour' => (int)$row['hour'],
                    'visits' => (int)$row['visits']
                ];
            }
            $stmt->close();
        }

        // Unique visitors (by IP) last rangeDays
        $sql = "SELECT COUNT(DISTINCT ip_address) as unique_visitors 
                FROM page_analytics 
                WHERE visit_date >= DATE_SUB(NOW(), INTERVAL ? DAY)";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param('i', $rangeDays);
            $stmt->execute();
            $res = $stmt->get_result();
            $row = $res->fetch_assoc();
            $stats['unique_visitors'] = (int)($row['unique_visitors'] ?? 0);
            $stmt->close();
        }

        // Total visits last rangeDays
        $sql = "SELECT COUNT(*) as total_visits 
                FROM page_analytics 
                WHERE visit_date >= DATE_SUB(NOW(), INTERVAL ? DAY)";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param('i', $rangeDays);
            $stmt->execute();
            $res = $stmt->get_result();
            $row = $res->fetch_assoc();
            $stats['total_visits'] = (int)($row['total_visits'] ?? 0);
            $stmt->close();
        }

        return $stats;
    }

    public function resetStats($since = null) {
        if ($since) {
            $stmt = $this->conn->prepare("DELETE FROM page_analytics WHERE visit_date >= ?");
            $stmt->bind_param('s', $since);
            $ok = $stmt->execute();
            $stmt->close();
            return ['success' => (bool)$ok, 'deleted_since' => $since];
        }
        $ok = $this->conn->query("TRUNCATE TABLE page_analytics");
        return ['success' => (bool)$ok, 'message' => 'Tabla vaciada'];
    }
}
