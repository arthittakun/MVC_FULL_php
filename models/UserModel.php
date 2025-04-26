<?php
class UserModel extends Model {
    protected $table = 'users';

    public function getUsers($limit = 10, $offset = 0) {
        $sql = "SELECT * FROM {$this->table} LIMIT ? OFFSET ?";
        return $this->query($sql, [$limit, $offset])->fetchAll();
    }

    public function getTotalUsers() {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        return $this->query($sql)->fetch()['total'];
    }

    public function searchUsers($keyword) {
        $sql = "SELECT * FROM {$this->table} WHERE name LIKE ? OR email LIKE ?";
        $keyword = "%{$keyword}%";
        return $this->query($sql, [$keyword, $keyword])->fetchAll();
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->query($sql, [$id])->fetch();
    }

    public function createUser($data) {
        $sql = "INSERT INTO {$this->table} (name, email, password) VALUES (?, ?, ?)";
        return $this->query($sql, [
            $data['name'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
    }

    public function updateUser($id, $data) {
        $sql = "UPDATE {$this->table} SET name = ?, email = ? WHERE id = ?";
        return $this->query($sql, [
            $data['name'],
            $data['email'],
            $id
        ]);
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->query($sql, [$id]);
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM {$this->table} WHERE email = ?";
        return $this->query($sql, [$email])->fetch();
    }
}
