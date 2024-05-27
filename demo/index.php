<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: monospace;
            font-size: 1.125rem;
            color: #FFFFFF;
            background-color: #0F0F0F;
        }
    </style>
</head>
<body>
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

        $filterByName = function (array $listOfNames, string $name) {
            $filteredBooks = [];

            foreach($listOfNames as $names) {
                if (strtolower($names["name"]) == $name) {
                    $filteredBooks[] = $names;
                }
                
                
            }

            return $filteredBooks;
        };

        $filteredBooks = $filterByName($listOfNames, "vito");
    ?>

    <h1>
        Hello, <?= $message ?>
    </h1>

    <ul>
        <?php foreach($filteredBooks as $names) : ?>
                    <li>
                        [<?= $names["id"] ?>]
                        <?= "{$names["name"]}  {$names["lastName"]}" ?>,
                        <?= $names["age"] ?>
                    </li>
        <?php endforeach; ?>
    </ul>

    <p>
        <?= "1st name /> " . $listOfNames[0]["name"] ?>
    </p>
</body>
</html>