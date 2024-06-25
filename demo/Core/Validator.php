<?php

namespace Core;

class Validator {
    public static function isEmtpy($value) {
        return strlen(trim($value)) === 0;
    }
    
    public static function maxChars($value, $numChars = INF) {
        return strlen($value) > $numChars;
    }

    public static function passwordLength($value, $minChars, $maxChars) {
        return strlen($value) >= $minChars && strlen($value) <= $maxChars;
    }

    public static function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

}