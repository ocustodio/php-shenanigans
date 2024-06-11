<?php

function dnd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
};

function urlPath($path) {
    return $_SERVER["REQUEST_URI"] === $path;
};

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
        abort($status);
    }
}