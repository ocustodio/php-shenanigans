<?php

$config = require base_path('config.php');

$db = new Database($config['database'], 'root' ,'root');

$notes = $db -> executeQuery('select * from Notes where user_id = 2') -> findAll();

view("notes/index.view.php", [
    "heading" => "Notes",
    "notes" => $notes,
]);