<?php
class AuthController extends Controller {
    public function loginPage() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /');
            exit;
        }
        return $this->view('auth/login', ['title' => 'Login']);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                return $this->view('auth/login', [
                    'title' => 'Login',
                    'error' => 'Username and password required'
                ]);
            }

            // จำลองการตรวจสอบ login
            if ($username === 'admin' && $password === 'password') {
                $_SESSION['user_id'] = 1;
                $_SESSION['username'] = $username;
                header('Location: /');
                exit;
            }

            return $this->view('auth/login', [
                'title' => 'Login',
                'error' => 'Invalid credentials'
            ]);
        }
    }

    public function logout() {
        session_destroy();
        echo json_encode(['status' => 'success']);
    }

    public function apiLogin() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (empty($input['username']) || empty($input['password'])) {
            header('HTTP/1.0 400 Bad Request');
            echo json_encode(['error' => 'Username and password required']);
            return;
        }

        if ($input['username'] === 'admin' && $input['password'] === 'password') {
            $userData = [
                'user_id' => 1,
                'username' => $input['username']
            ];
            
            echo json_encode([
                'status' => 'success',
                'token' => JWT::generate($userData)
            ]);
        } else {
            header('HTTP/1.0 401 Unauthorized');
            echo json_encode(['error' => 'Invalid credentials']);
        }
    }
}
