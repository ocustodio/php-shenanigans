<?php


use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address';
};

if (!Validator::passwordLength($password, 7, 255)) {
    $errors['password'] = 'The password must be at least 7 characters long';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);

$user = $db -> executeQuery('select * from Users where email = :email', [
    'email' => $email,
]) -> find();

if ($user) {
    header('location: /');
}

if (!$user) {
    $db -> executeQuery('insert into Users (email, password) values (:email, :password)', [
        'email' => $email,
        'password' => $password,
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');

    exit();
}

