<?php

// Load the config file
$config = require_once "../config.php";

try {
    $db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'], $config['db']['user'], $config['db']['pass']);
} catch (PDOException $e) {
    die($e->getMessage());
}
