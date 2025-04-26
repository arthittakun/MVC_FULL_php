<?php
class PageModel extends Model {
    protected $table = 'pages';

    public function getItems($search = '', $limit = 10, $offset = 0) {
        if ($search) {
            $sql = "SELECT * FROM {$this->table} 
                    WHERE name LIKE ? OR description LIKE ? 
                    ORDER BY created_at DESC LIMIT ? OFFSET ?";
            $search = "%{$search}%";
            return $this->query($sql, [$search, $search, $limit, $offset])->fetchAll();
        }

        $sql = "SELECT * FROM {$this->table} 
                ORDER BY created_at DESC LIMIT ? OFFSET ?";
        return $this->query($sql, [$limit, $offset])->fetchAll();
    }

    public function getTotalItems($search = '') {
        if ($search) {
            $sql = "SELECT COUNT(*) as total FROM {$this->table} 
                    WHERE name LIKE ? OR description LIKE ?";
            $search = "%{$search}%";
            return $this->query($sql, [$search, $search])->fetch()['total'];
        }

        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        return $this->query($sql)->fetch()['total'];
    }
}
