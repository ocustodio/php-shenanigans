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