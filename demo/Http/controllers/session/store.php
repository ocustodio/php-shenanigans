<?php

use Core\Authenticator;
use Http\Forms\LoginForm;


$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$signedIn = (new Authenticator) -> attemptLogin(
    $attributes['email'], $attributes['password']
);

if (!$signedIn) {
    $form -> error(
        'email',
        'Wrong email or password, try again.'
    ) -> throw();
}

redirect('/');
