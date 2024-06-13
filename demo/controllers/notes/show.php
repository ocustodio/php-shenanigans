<?php

$config = require base_path('config.php');

$db = new Database($config['database'], 'root' ,'root');

$currentUserId = 2;

$note = $db -> executeQuery('select * from Notes where id = :id', ['id' => $_GET['id']]) -> findOrFail();

authorize($note['user_id'] === $currentUserId);


view("/notes/show.view.php", [
    "heading" => "Note Title",
    "note" => $note,
]);