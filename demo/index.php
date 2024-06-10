<?php

require "functions/functions.php";
// require "router.php";
require "Database.php";

$config = require('config.php');

$db = new Database($config['database'], 'root' ,'root');

$id = $_GET['id'];
$query = "select * from Posts where Posts.id = :id";

$post = $db -> executeQuery($query, [':id' => $id]) -> fetch();

dnd($post);