<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db -> executeQuery('select * from Notes where user_id = 1') -> findAll();

view("notes/index.view.php", [
    "heading" => "Notes",
    "notes" => $notes,
]);

