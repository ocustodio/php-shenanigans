<?php

$config = require('config.php');

$db = new Database($config['database'], 'root' ,'root');

$heading = "Note Title";
$currentUserId = 2;


$note = $db -> executeQuery('select * from Notes where id = :id', ['id' => $_GET['id']]) -> findOrFail();

authorize($note['user_id'] === $currentUserId);

require "views/note.view.php";