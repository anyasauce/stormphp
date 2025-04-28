<?php

use App\Routes\Router;
use App\Controllers\AuthController; // 👈 IMPORT this!
use App\Middleware\Middleware;       // 👈 IMPORT middleware if you want shorter

$router = new Router();

$router->get('', [AuthController::class, 'showWelcome']);
$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'showRegisterForm']);
$router->post('/register', [AuthController::class, 'register']);

$router->get('/profile', [AuthController::class, 'showProfile'], [Middleware::class, 'userAuth']);
$router->get('/dashboard', [AuthController::class, 'showDashboard'], [Middleware::class, 'userAuth']);

$router->post('/update', [AuthController::class, 'update'], [Middleware::class, 'userAuth']);
$router->post('/delete', [AuthController::class, 'delete'], [Middleware::class, 'userAuth']);

$router->get('/logout', [AuthController::class, 'logout'], [Middleware::class, 'userAuth']);