<?php

require base_path("Core/Validator.php");

$config = require base_path("config.php");
$db = new Database($config['database'], 'root', 'root');

$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postBody = $_POST['body'];
    $maxChars = 1000;

    if (Validator::isEmtpy($postBody)) {
        $errors['body'] = 'A body is required.';
    }

    if (Validator::maxChars($postBody, $maxChars)) {
        $errors['body'] = 'The body can not be more than 1,000 characters.';
    }

    if (empty($errors)) {
        $db -> executeQuery("insert into Notes(body, user_id) values (:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 2
        ]);
    }
}

view("notes/create.view.php", [
    "heading" => "Create note",
    "errors" => $errors,
]);
