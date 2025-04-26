<?php
class ApiMiddleware {
    public static function auth() {
        $headers = getallheaders();
        
        // Debug headers
        error_log('Request Headers: ' . json_encode($headers));

        if (!isset($headers['Authorization'])) {
            self::sendError('No Authorization header found', 401, ['headers' => $headers]);
        }

        if (!preg_match('/^Bearer\s+(.*?)$/', $headers['Authorization'], $matches)) {
            self::sendError('Invalid token format. Must be: Bearer <token>', 401);
        }

        $token = $matches[1];
        $payload = JWT::verify($token);
        
        if (!$payload) {
            self::sendError('Token verification failed', 401, [
                'token' => $token,
                'decoded' => [
                    'header' => self::decodeJWTPart($token, 0),
                    'payload' => self::decodeJWTPart($token, 1)
                ]
            ]);
        }
        
        return $payload;
    }

    private static function decodeJWTPart($token, $part) {
        $parts = explode('.', $token);
        return $parts[$part] ?? null ? 
            json_decode(base64_decode(strtr($parts[$part], '-_', '+/')), true) : null;
    }
    
    private static function sendError($message, $code = 401, $debug = []) {
        header('HTTP/1.1 ' . $code);
        header('Content-Type: application/json');
        echo json_encode([
            'error' => $message,
            'debug' => $debug
        ]);
        exit;
    }
}
