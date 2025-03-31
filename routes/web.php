<?php
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/AboutController.php';

$request = trim($_SERVER['REQUEST_URI'], '/');

switch ($request) {
    case '':
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'about':
        $aboutController = new AboutController();
        $aboutController->index();
        break;

    default:
        http_response_code(404);
        require_once __DIR__ . '/../app/core/404.php';
        break;

}
