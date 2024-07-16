<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([
    0, 1, 2, 3, 4, 5, 6, 7, 8, 9
]);

$newVari = $numbers -> filter(function ($number) {
    return $number % 2 === 0;
});

var_dump($newVari);