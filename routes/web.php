<?php

require_once __DIR__ . '/router.php';
require_once __DIR__ . '/../app/middleware/Middleware.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$router = new Router();

$router->get('', 'AuthController@showWelcome');
$router->get('login', 'AuthController@showLoginForm');
$router->post('login', 'AuthController@login');
$router->get('register', 'AuthController@showRegisterForm');
$router->post('register', 'AuthController@register');

$router->get('profile', 'AuthController@showProfile', 'Middleware::userAuth');
$router->get('dashboard', 'AuthController@showDashboard', 'Middleware::userAuth');

$router->post('update', 'AuthController@update', 'Middleware::userAuth');
$router->post('delete', 'AuthController@delete', 'Middleware::userAuth');

$router->get('logout', 'AuthController@logout', 'Middleware::userAuth');
