<?php


try {
    $bdd = new PDO(DNS. DBNAME , USERNAME , PASSWD );
}catch (PDOException $e) {
    $e->getMessage();
}