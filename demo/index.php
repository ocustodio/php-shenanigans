<?php

require "functions/functions.php";
// require "router.php";
require "Database.php";

$config = require('config.php');

$db = new Database($config['database'], 'root' ,'root');

$post = $db -> executeQuery("select * from Posts where Posts.id = 1") -> fetch();

dnd($post['title']);