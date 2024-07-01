<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form -> validate($email, $password)) {

    if ((new Authenticator) -> attemptLogin($email, $password)) {
        redirect('/');
    }

    $form -> error('email', 'Wrong email or password, try again.');
}

Session::flash('errors', $form -> getErrors());

return redirect('/login');