<?php

class Validator {
    public static function isEmtpy($value) {
        return strlen(trim($value)) === 0;
    }
    
    public static function maxChars($value, $numChars = INF) {
        return strlen($value) > $numChars;
    }
}