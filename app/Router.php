<?php

namespace App;

class Router
{
    protected $routes = [];

    public function get($path, $controller, $method)
    {
        $this->routes['GET'][$path] = ['controller' => $controller, 'method' => $method];
    }

    public function match($method, $path)
    {
        // Parse query string and get only the path
        $path = parse_url($path, PHP_URL_PATH);
        
        // Remove everything after public directory
        if (strpos($path, 'public') !== false) {
            $path = substr($path, strpos($path, 'public') + 6);
        }
        
        // Clean up the path
        $path = rtrim($path, '/');
        if (empty($path)) {
            $path = '/';
        }
        
        // Check for exact match
        if (isset($this->routes[$method][$path])) {
            return $this->routes[$method][$path];
        }

        // Check for parameter routes
        foreach ($this->routes[$method] as $route => $action) {
            $pattern = $this->convertRouteToRegex($route);
            if (preg_match($pattern, $path, $matches)) {
                $action['params'] = array_slice($matches, 1);
                return $action;
            }
        }

        return null;
    }

    protected function convertRouteToRegex($route)
    {
        $route = preg_quote($route, '#');
        $route = preg_replace('#\\{([^}]+)\\}#', '([^/]+)', $route);
        return '#^' . $route . '$#';
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];

        $route = $this->match($method, $path);

        if (!$route) {
            http_response_code(404);
            return view('404');
        }

        $controller = $route['controller'];
        $methodName = $route['method'];
        $params = $route['params'] ?? [];

        $controllerInstance = new $controller();
        
        if (count($params) > 0) {
            return call_user_func_array([$controllerInstance, $methodName], $params);
        }
        
        return $controllerInstance->$methodName();
    }
}
