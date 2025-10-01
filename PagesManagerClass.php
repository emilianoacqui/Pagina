<?php
class PagesManager {
    private $pagesFile;
    
    public function __construct($pagesFile = 'pages_data.json') {
        $this->pagesFile = $pagesFile;
        
        // Crear archivo si no existe
        if (!file_exists($this->pagesFile)) {
            file_put_contents($this->pagesFile, '[]', LOCK_EX);
        }
    }
    
    public function getPage($id) {
        $pages = $this->getAllPages();
        foreach ($pages as $page) {
            if ($page['id'] == $id) {
                return $page;
            }
        }
        return null;
    }
    
    public function getAllPages() {
        if (file_exists($this->pagesFile)) {
            $content = file_get_contents($this->pagesFile);
            $decoded = json_decode($content, true);
            return is_array($decoded) ? $decoded : [];
        }
        return [];
    }
    
    public function savePage($pageData) {
        $pages = $this->getAllPages();
        
        // Buscar si ya existe para actualizar
        $found = false;
        foreach ($pages as &$page) {
            if ($page['id'] == $pageData['id']) {
                $page = $pageData;
                $found = true;
                break;
            }
        }
        
        // Si no existe, agregar nueva
        if (!$found) {
            $pages[] = $pageData;
        }
        
        return file_put_contents($this->pagesFile, json_encode($pages, JSON_PRETTY_PRINT), LOCK_EX);
    }
    
    public function deletePage($id) {
        $pages = $this->getAllPages();
        $newPages = array_filter($pages, function($page) use ($id) {
            return $page['id'] != $id;
        });
        
        $newPages = array_values($newPages);
        return file_put_contents($this->pagesFile, json_encode($newPages, JSON_PRETTY_PRINT), LOCK_EX);
    }
}
?>