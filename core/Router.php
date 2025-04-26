<?php
class Router {
    private $routes = [];
    private $errorHandlers = [];

    public function addRoute($method, $path, $handler) {
        // Sanitize path
        $path = filter_var($path, FILTER_SANITIZE_URL);
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function setErrorHandler($code, $handler) {
        $this->errorHandlers[$code] = $handler;
    }

    private function handleError($code) {
        if (isset($this->errorHandlers[$code])) {
            list($controller, $action) = explode('@', $this->errorHandlers[$code]);
            require_once "controllers/{$controller}.php";
            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } else {
            header("HTTP/1.0 {$code}");
            echo "Error {$code}";
        }
    }

    public function handleRequest($method, $uri) {
        try {
            // ลบหรือแก้ไข security headers ที่อาจบล็อกโฆษณา
            // header("X-Frame-Options: SAMEORIGIN");
            // header("X-XSS-Protection: 1; mode=block");
            // header("X-Content-Type-Options: nosniff");
            // header("Content-Security-Policy: default-src 'self'");
            // header("Referrer-Policy: strict-origin-when-cross-origin");

            // Sanitize inputs
            $method = filter_var($method, FILTER_SANITIZE_STRING);
            $uri = filter_var(parse_url($uri, PHP_URL_PATH), FILTER_SANITIZE_URL);
            
            foreach ($this->routes as $route) {
                if ($route['method'] === $method && $route['path'] === $uri) {
                    if (!str_contains($route['handler'], '@')) {
                        throw new Exception("Invalid route handler format");
                    }

                    list($controller, $action) = explode('@', $route['handler']);
                    
                    // Validate controller and action names
                    if (!preg_match('/^[A-Za-z0-9_]+$/', $controller) || 
                        !preg_match('/^[A-Za-z0-9_]+$/', $action)) {
                        throw new Exception("Invalid controller or action name");
                    }

                    $controllerFile = "controllers/{$controller}.php";
                    
                    if (!file_exists($controllerFile)) {
                        throw new Exception("Controller file not found");
                    }

                    require_once $controllerFile;
                    
                    if (!class_exists($controller)) {
                        throw new Exception("Controller class not found");
                    }

                    $controllerInstance = new $controller();
                    
                    if (!method_exists($controllerInstance, $action)) {
                        throw new Exception("Action method not found");
                    }

                    return $controllerInstance->$action();
                }
            }
            
            // No route found
            $this->handleError(404);

        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->handleError(500);
        }
    }
}
