<?php

namespace Core;

class Router {
    protected $routes = [];

    protected function add($method, $uri, $controller) {
        $this -> routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];
    }

    public function get($uri, $controller) {
        $this -> add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        $this -> add('POST', $uri, $controller);
    }

    public function delete($uri, $controller) {
        $this -> add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller) {
        $this -> add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller) {
        $this -> add('PUT', $uri, $controller);
    }

    public function route($uri, $method) {
        foreach($this -> routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this -> abort();
    }

    public function abort($statusCode = Response::NOT_FOUND) {
        http_response_code($statusCode);
        
        require base_path("views/$statusCode.php");
    
        die();
    }
}