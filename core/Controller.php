<?php
class Controller {
    protected $auth = false;
    protected $excludeMethods = [];

    public function __construct() {
        if ($this->auth) {
            $this->checkAuth();
        }
    }

    protected function checkAuth() {
        $currentMethod = $this->getCurrentMethod();
        
        if (!in_array($currentMethod, $this->excludeMethods)) {
            if (!isset($_SESSION['user_id'])) {
                header('Location: /login');
                exit;
            }
        }
    }

    private function getCurrentMethod() {
        $trace = debug_backtrace();
        foreach ($trace as $item) {
            if (isset($item['class']) && $item['class'] !== __CLASS__) {
                return $item['function'];
            }
        }
        return '';
    }

    protected function view($name, $data = []) {
        if ($this->auth && !isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        $view = new View();
        return $view->render($name, $data);
    }

    protected function model($name) {
        require_once "models/{$name}.php";
        return new $name();
    }
}
