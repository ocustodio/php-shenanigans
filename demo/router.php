<?php

$routes = require('routes.php');

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($statusCode = Response::NOT_FOUND) {
    http_response_code($statusCode);
    
    require "views/$statusCode.php";

    die();
}

routeToController($uri, $routes);