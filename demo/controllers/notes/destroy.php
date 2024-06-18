<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database'], 'root' ,'root');

$currentUserId = 1;

$note = $db -> executeQuery('select * from Notes where id = :id', [
    'id' => $_POST['id']
]) -> findOrFail();

authorize($note['user_id'] === $currentUserId);

$db -> executeQuery('delete from Notes where id = :id', [
    'id' => $_POST['id'],
]);

header('location: /notes');
exit();

