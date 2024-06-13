<?php

use Core\Response;
use Core\Router;



function dnd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
};

function urlPath($path) {
    return $_SERVER["REQUEST_URI"] === $path;
};

function abort($statusCode = Response::NOT_FOUND) {
    http_response_code($statusCode);
    
    require base_path("views/$statusCode.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
        abort($status);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);
    require base_path('views/' . $path);
}