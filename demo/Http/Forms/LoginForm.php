<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm {
    protected $errors = [];

    public function validate($email, $password) {
        if (!Validator::email($email)) {
            $this -> errors['email'] = 'Please enter a valid email address';
        }

        if (!Validator::passwordLength($password, 7, 255)) {
            $this -> errors['password'] = 'The password must be at least 7 characters long';
        }

        return empty($this -> errors);
    }

    public function getErrors() {
        return $this -> errors;
    }

    public function error($field, $message) {
        $this -> errors[$field] = $message;
    }
}