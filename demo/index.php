<?php 

$name = "Victor";
$trained = true;

$message = "$name. you " . ($trained ? "already" : "did not") . " trained today!";

$listOfNames = [
    [
        "id" => 1,
        "name" => "Vito",
        "lastName" => "Custodio",
        "age" => 25, 
    ],
    [
        "id" => 2,
        "name" => "Marco",
        "lastName" => "Leonardo",
        "age" => 25,
    ],
    [
        "id" => 3,
        "name" => "Marco",
        "lastName" => "Polo",
        "age" => 22,
    ],
    [
        "id" => 4,
        "name" => "John",
        "lastName" => "Doe",
        "age" => 17,
    ],
];

// function filter(array $arrayData, $fn, ) {
//     $filteredData = [];

//     foreach($arrayData as $data) {
//         if ($fn($data)) {
//             $filteredData[] = $data;
//         }
//     }

//     return $filteredData;
// }

$filteredBooks = array_filter($listOfNames, function ($data) {
    return $data["age"] >= 25;
});

require "index.view.php";