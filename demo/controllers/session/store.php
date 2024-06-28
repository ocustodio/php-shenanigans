<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Email is invalid';
}

if (!Validator::passwordLength($password)) {
    $errors['password'] = 'Please provide a valid password';
}

if (!empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db -> executeQuery('select * from Users where email = :email', [
    'email' => $email
]) -> find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email,
        ]);

        header('location: /');
        exit();
    }
}

return view ('session/create.view.php', [
    'errors' => [
        'password' => 'Wrong email or password, try again.',
    ]
]);


