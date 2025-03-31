<?php
class Router
{
    private $routes = [];

    public function get($route, $action, $middleware = null)
    {
        $this->routes[] = ['method' => 'GET', 'route' => $route, 'action' => $action, 'middleware' => $middleware];
    }

    public function post($route, $action, $middleware = null)
    {
        $this->routes[] = ['method' => 'POST', 'route' => $route, 'action' => $action, 'middleware' => $middleware];
    }

    public function resolve($request)
    {
        $request = trim($request, '/');

        foreach ($this->routes as $route) {
            if ($_SERVER['REQUEST_METHOD'] === $route['method'] && $request === $route['route']) {

                if ($route['middleware']) {
                    $this->handleMiddleware($route['middleware']);
                }

                list($controllerName, $methodName) = explode('@', $route['action']);
                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                    if (method_exists($controller, $methodName)) {
                        $controller->$methodName();
                        return;
                    }
                }
            }
        }

        http_response_code(404);
        Blade::render('Error', [
            'code' => 404,
            'message' => 'The page you are looking for doesn’t exist or has been moved.'
        ]);
    }

    private function handleMiddleware($middleware)
    {
        if (strpos($middleware, '::') !== false) {
            list($class, $method) = explode('::', $middleware);
            if (class_exists($class)) {
                call_user_func([$class, $method]);
            }
        }
    }
}
