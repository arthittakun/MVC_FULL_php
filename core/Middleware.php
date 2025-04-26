<?php
class Middleware {
    public static function auth() {
        if (!isset($_SESSION['user_id'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                header('Location: /login');
            } else {
                header('HTTP/1.0 401 Unauthorized');
                echo json_encode(['error' => 'Unauthorized']);
            }
            exit;
        }
    }
}
