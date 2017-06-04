<?php

require'config.php';

try {
    $bdd = new PDO($dsn. $dbname , $username , $passwd );
}catch (PDOException $e) {
    $e->getMessage();
}