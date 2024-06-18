<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database'], 'root' ,'root');

$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db -> executeQuery('select * from Notes where id = :id', ['id' => $_GET['id']]) -> findOrFail();

    authorize($note['user_id'] === $currentUserId);
    
    $db -> executeQuery('delete from Notes where id = :id', [
        'id' => $_GET['id'],
    ]);

    header('location: /notes');
    exit();
} else {


    $note = $db -> executeQuery('select * from Notes where id = :id', ['id' => $_GET['id']]) -> findOrFail();

    authorize($note['user_id'] === $currentUserId);


    view("/notes/show.view.php", [
        "heading" => "Note Title",
        "note" => $note,
    ]);

}
