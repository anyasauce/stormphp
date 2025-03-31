<?php
// index.php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/core/Blade.php';

try {
    // Load the routes
    require_once __DIR__ . '/../routes/web.php';

    // Resolve the current request URI using the Router
    $router->resolve($_SERVER['REQUEST_URI']);
} catch (Throwable $e) {
    // Handle errors gracefully
    error_log("Fatal Error: " . $e->getMessage());
    http_response_code(500);
    Blade::render('Error', [
        'code' => 500,
        'message' => 'Internal Server Error: ' . $e->getMessage()
    ]);
}
