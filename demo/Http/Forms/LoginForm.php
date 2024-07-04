<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm {
    protected $errors = [];

    public function __construct(public array $attributes) {

        if (!Validator::email($attributes['email'])) {
            $this -> errors['email'] = 'Please enter a valid email address';
        }

        if (!Validator::passwordLength($attributes['password'], 7,
            255)) {
            $this -> errors['password'] = 'The password must be at least 7 characters long';
        }
    }

    public static function validate($attributes) {
        $instance = new static($attributes);

        if ($instance -> failed()) {
            $instance -> throw();
        }


        return $instance;
    }

    public function throw() {
       return ValidationException::throw($this -> getErrors(), $this -> attributes);
    }

    public function failed() {
        return count($this -> errors);
    }

    public function getErrors() {
        return $this -> errors;
    }

    public function error($field, $message) {
        $this -> errors[$field] = $message;

        return $this;
    }
}