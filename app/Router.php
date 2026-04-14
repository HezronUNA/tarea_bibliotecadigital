<?php

namespace App;

class Router
{
    protected $routes = [];

    public function get($path, $controller, $method)
    {
        $this->routes['GET'][$path] = ['controller' => $controller, 'method' => $method];
    }

    public function post($path, $controller, $method)
    {
        $this->routes['POST'][$path] = ['controller' => $controller, 'method' => $method];
    }

    public function put($path, $controller, $method)
    {
        $this->routes['PUT'][$path] = ['controller' => $controller, 'method' => $method];
    }

    public function delete($path, $controller, $method)
    {
        $this->routes['DELETE'][$path] = ['controller' => $controller, 'method' => $method];
    }

    public function match($method, $path)
    {
        $path = parse_url($path, PHP_URL_PATH);
        
        if (strpos($path, 'public') !== false) {
            $path = substr($path, strpos($path, 'public') + 6);
        }
        
        $path = rtrim($path, '/');
        if (empty($path)) {
            $path = '/';
        }
        
        if (isset($this->routes[$method][$path])) {
            return $this->routes[$method][$path];
        }

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
        $route = preg_replace('#\{([^}]+)\}#', '___PARAM___', $route);
        $route = preg_quote($route, '#');
        $route = str_replace('___PARAM___', '([^/]+)', $route);
        return '#^' . $route . '$#';
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }
        
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
