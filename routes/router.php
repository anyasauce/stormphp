<?php
namespace App\Routes;

use Core\Blade;

class InvalidRouteActionException extends \Exception {}

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
        $request = strtok($request, '?');
        $request = rtrim($request, '/');

        error_log("Resolving route for: " . $request);

        foreach ($this->routes as $route) {
            error_log("Checking route: " . $route['route']);

            if ($_SERVER['REQUEST_METHOD'] === $route['method'] && $request === $route['route']) {
                error_log("Route matched: " . $route['route']);

                if ($route['middleware']) {
                    $this->handleMiddleware($route['middleware']);
                }

                $action = $route['action'];

                if (is_array($action)) {
                    [$controllerName, $methodName] = $action;
                } elseif (is_string($action)) {
                    [$controllerName, $methodName] = explode('@', $action);
                } else {
                    throw new InvalidRouteActionException();
                }

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
        if (is_array($middleware)) {
            [$class, $method] = $middleware;
            if (class_exists($class)) {
                (new $class)->$method();
            }
        } elseif (is_string($middleware) && strpos($middleware, '::') !== false) {
            [$class, $method] = explode('::', $middleware);
            if (class_exists($class)) {
                (new $class)->$method();
            }
        }
    }
}
