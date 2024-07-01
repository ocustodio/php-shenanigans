<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];
$postBody = $_POST['body'];
$maxChars = 1000;
$currentUserId = 1;

if (Validator::isEmtpy($postBody)) {
    $errors['body'] = 'A body is required.';
}

if (Validator::maxChars($postBody, $maxChars)) {
    $errors['body'] = 'The body can not be more than 1,000 characters.';
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

if (empty($errors)) {
    $db -> executeQuery("insert into Notes(body, user_id) values (:body, :user_id)", [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
}

header('location: /notes');
die();
