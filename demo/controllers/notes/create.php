<?php

require base_path("Core/Validator.php");

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

view("notes/create.view.php", [
    "heading" => "Create note",
    "errors" => [],
]);
