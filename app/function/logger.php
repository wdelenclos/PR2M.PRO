<?php

ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
// Afficher les erreurs et les avertissements
error_reporting(E_ALL & ~E_NOTICE);

require ('../config.php');
require ('../connect.php');
require ('../function.php');
$identifiant = $_POST['identifiant'];
$result = searchPraticien($bdd);

if($result == true){
    session_start();
	setcookie('userID', $identifiant, time() + SESSIONEXPRIRE);
    header('Location: ../index.php?p=dashboard&identifiant='.$identifiant );
}
else {
    header('Location: ../index.php?p=&n=560' );
}

