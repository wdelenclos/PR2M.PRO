<?php


try {
    $bdd = new PDO(DNS. DBNAME , USERNAME , PASSWD );
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch (PDOException $e) {
    $e->getMessage();
}