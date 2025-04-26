<?php
class ApiController extends Controller {
    private $user;

    public function __construct() {
        header('Content-Type: application/json');
        try {
            $this->user = ApiMiddleware::auth();
        } catch (Exception $e) {
            $this->sendError('Authentication failed: ' . $e->getMessage());
        }
    }

    public function getData() {
        try {
            echo json_encode([
                'status' => 'success',
                'user' => $this->user,
                'data' => [
                    ['id' => 1, 'name' => 'Item 1'],
                    ['id' => 2, 'name' => 'Item 2']
                ]
            ]);
        } catch (Exception $e) {
            $this->sendError($e->getMessage());
        }
    }

    private function sendError($message) {
        header('HTTP/1.1 401 Unauthorized');
        echo json_encode([
            'error' => $message
        ]);
        exit;
    }
}
