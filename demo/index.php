<?php

require "functions/functions.php";

// require "router.php";

// connect to MySQL database.

$dsn = "mysql:host=127.0.0.1;port=3306;dbname=Demo;charset=utf8mb4";

$pdo = new PDO($dsn, 'root', 'root');

$statement = $pdo -> prepare("select * from Posts");

$statement -> execute();

$posts = $statement -> fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>". $post['title'] . "</li>";
}