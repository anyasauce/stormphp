<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Core\Blade;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    require_once __DIR__ . '/../routes/web.php';

    $request = str_replace('/stormphp/public', '', $_SERVER['REQUEST_URI']);
    $request = rtrim($request, '/');
    if ($request === '') {
        $request = '/';
    }

    $router->resolve($request);

} catch (Throwable $e) {
    error_log("Fatal Error: " . $e->getMessage());
    http_response_code(500);
    Blade::render('Error', [
        'code' => 500,
        'message' => 'Internal Server Error: ' . $e->getMessage()
    ]);
}
