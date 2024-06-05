<?php

// connect to MySQL database.

class Database {
    private $connection;

    public function __construct($config, $username = 'root', $password = '') {
        $dsn ='mysql:' . http_build_query($config, '', ';');

        $this -> connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function executeQuery (string $query): PDOStatement {
        $statement = $this -> connection -> prepare($query);
        $statement -> execute();

        return $statement;
    }
}