<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db -> executeQuery('select * from Notes where id = :id', [
    'id' => $_POST['id'],
]) -> findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];
$postBody = $_POST['body'];

if (Validator::isEmtpy($postBody)) {
    $errors['body'] = 'A body is required';
}

if (Validator::maxChars($postBody, 1000)) {
    $errors['body'] = 'A body must be less than 1000 characters';
}

if (!empty($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db -> executeQuery('update Notes set body = :body where id = :id', [
    'body' => $postBody,
    'id' => $_POST['id'],
]);

header('location: /notes');
die();