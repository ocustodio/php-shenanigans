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
            ],
            [
                "id" => 2,
                "name" => "Joao",
                "lastName" => "Leonardo",
            ],
            [
                "id" => 3,
                "name" => "Marco",
                "lastName" => "Polo",
            ],
        ];
    ?>

    <h1> 
        Hello, <?= $message ?>
    </h1>

    <ul>
        <?php foreach($listOfNames as $names) : ?>
            <li>
                <?= $names["id"] ?> |
                <?= "{$names["name"]}  {$names["lastName"]}" ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p>
        <?= "1st /> " . $listOfNames[0] ?>
    </p>
</body>
</html>