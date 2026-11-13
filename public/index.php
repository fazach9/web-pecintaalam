
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$config = require __DIR__ . '/../config/config.php';

date_default_timezone_set(
    $config['timezone'] ?? 'Asia/Jakarta'
);

// Core
require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Core/Router.php';

// Controllers
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';

// Helpers
require_once __DIR__ . '/../app/Helpers/security.php';

// Router
$router = new Router();

// Halaman utama
$router->get('/', [HomeController::class, 'index']);

// Login
$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);

// Logout
$router->post('/logout', [AuthController::class, 'logout']);

// Jalankan routing
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = $_SERVER['REQUEST_URI'] ?? '/';

$router->dispatch($method, $uri);
