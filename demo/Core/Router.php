<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    protected function add($method, $uri, $controller) {
        $this -> routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null,
        ];

        return $this;
    }

    public function get($uri, $controller) {
        return $this -> add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        return $this -> add('POST', $uri, $controller);
    }

    public function delete($uri, $controller) {
        return $this -> add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller) {
        return $this -> add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller) {
        return $this -> add('PUT', $uri, $controller);
    }

    public function only($key) {
        $this -> routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method) {
        foreach($this -> routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

//                if($route['middleware'] === 'guest') {
//                    (new Guest()) -> handle();
//                }
//
//                if($route['middleware'] === 'auth') {
//                    (new Auth()) -> handle();
//                }

               Middleware::resolve($route['middleware']);

                return require base_path($route['controller']);
            }
        }

        $this -> abort();
    }

    protected function abort($statusCode = Response::NOT_FOUND) {
        http_response_code($statusCode);
        
        require base_path("views/$statusCode.php");
    
        die();
    }
}