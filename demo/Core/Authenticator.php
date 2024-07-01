<?php

namespace Core;

class Authenticator {


    public function attemptLogin($email, $password) {
        $user = App::resolve(Database::class) -> executeQuery('select * from Users where email = :email', [
            'email' => $email,
        ]) -> find();


        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this -> login([
                    'email' => $email,
                ]);

                return true;
            }
        }

        return false;
    }

    public function attemptRegister($email, $password) {
        $user = App::resolve(Database::class) -> executeQuery('select * from Users where email = :email', [
            'email' => $email,
        ]);

        if (!$user) {
            App::resolve(Database::class) -> executeQuery('insert into Users (email, password) values (:email, :password)', [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ]);

            $this -> login([
                'email' => $email,
            ]);

            return false;
        }

        return true;
    }

    public function login($user) {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function logout() {
        Session::destroy();
    }
}