<?php

$config = require('config.php');

$db = new Database($config['database'], 'root' ,'root');

$heading = "Note Title";

$note = $db -> executeQuery('select * from Notes where id = :id', ['id' => $_GET['id']]) -> fetch();

require "views/note.view.php";