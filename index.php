<?php
// Define base path
define('BASEPATH', __DIR__);

// Error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
// ini_set('error_log', BASEPATH . '/logs/error.log');

// // Security headers - อนุญาตโดเมนสำหรับโฆษณา
// header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://*.doubleclick.net https://*.google.com https://*.googlesyndication.com; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; img-src 'self' data: https: http:; font-src 'self' https://cdn.jsdelivr.net; frame-src 'self' https://*.doubleclick.net https://*.google.com https://*.googlesyndication.com;");
// header("X-Frame-Options: SAMEORIGIN"); // เปลี่ยนจาก DENY เป็น SAMEORIGIN
// header("X-XSS-Protection: 1; mode=block");
// header("X-Content-Type-Options: nosniff");
// header("Referrer-Policy: no-referrer-when-downgrade");
// header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
// header("Strict-Transport-Security: max-age=31536000; includeSubDomains");

// // Session security
// ini_set('session.cookie_httponly', 1);
// ini_set('session.cookie_secure', 1);
// ini_set('session.use_strict_mode', 1);
session_start();

// CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require_once 'core/Router.php';
require_once 'core/Controller.php';
require_once 'core/BaseViewController.php';  // เพิ่มบรรทัดนี้
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Middleware.php';
require_once 'core/JWT.php';
require_once 'core/ApiMiddleware.php';

$router = new Router();

// API Routes
$router->addRoute('POST', '/api/auth/login', 'AuthController@apiLogin');
// $router->addRoute('GET', '/api/data', 'ApiController@getData');
// $router->addRoute('POST', '/api/data', 'ApiController@createData');

// // Auth Routes
// $router->addRoute('GET', '/login', 'AuthController@loginPage');
// $router->addRoute('POST', '/login', 'AuthController@login');
// $router->addRoute('GET', '/logout', 'AuthController@logout');

// Protected Routes (ต้อง login ก่อน
$router->addRoute('GET', '/page', 'HomeController@page');
$router->addRoute('GET', '/', 'HomeController@index');
// $router->addRoute('GET', '/page', 'PageController@index');
// $router->addRoute('GET', '/page/edit/{id}', 'PageController@edit');
// $router->addRoute('GET', '/page/delete/{id}', 'PageController@delete');

// Register error handlers
$router->setErrorHandler(404, 'ErrorController@notFound');
$router->setErrorHandler(500, 'ErrorController@serverError');

// Handle current request
$router->handleRequest($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
