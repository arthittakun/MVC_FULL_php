<?php
class JWT {
    private static $key = 'your-secret-key';

    public static function generate($data) {
        $header = self::base64UrlEncode(json_encode(['typ' => 'JWT', 'alg' => 'HS256']));
        $payload = self::base64UrlEncode(json_encode([
            'user_id' => $data['user_id'],
            'username' => $data['username'],
            'user' => 'ควย',
            'iat' => time(),
            'exp' => time() + 3600
        ]));
        
        $signature = self::base64UrlEncode(
            hash_hmac('sha256', "$header.$payload", self::$key, true)
        );

        return "$header.$payload.$signature";
    }

    public static function verify($token) {
        try {
            $parts = explode('.', $token);
            if (count($parts) !== 3) {
                throw new Exception('Invalid token format');
            }

            list($header, $payload, $provided_signature) = $parts;

            // Verify signature
            $signature = self::base64UrlEncode(
                hash_hmac('sha256', "$header.$payload", self::$key, true)
            );

            if (!hash_equals($signature, $provided_signature)) {
                throw new Exception('Invalid signature');
            }

            $payload_data = json_decode(self::base64UrlDecode($payload), true);
            
            if (!$payload_data) {
                throw new Exception('Invalid payload');
            }

            if (isset($payload_data['exp']) && $payload_data['exp'] < time()) {
                throw new Exception('Token expired');
            }

            return $payload_data;
            
        } catch (Exception $e) {
            error_log('JWT Error: ' . $e->getMessage());
            return false;
        }
    }

    private static function base64UrlEncode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private static function base64UrlDecode($data) {
        return base64_decode(strtr($data, '-_', '+/'));
    }
}
