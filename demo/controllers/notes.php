<?php

$config = require('config.php');

$db = new Database($config['database'], 'root' ,'root');

$heading = "Notes";

$notes = $db -> executeQuery('select * from Notes where user_id = 2') -> findAll();

require "views/notes.view.php";