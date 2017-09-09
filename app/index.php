<?php
//---------------------------------------------------------------------
//             | By WDelenclos - http://wdelenclos.fr |
//---------------------------------------------------------------------

ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
// Afficher les erreurs et les avertissements
error_reporting(E_ALL & ~E_NOTICE);

require_once 'config.php';
require_once 'function.php';
include_once 'connect.php';
include_once 'function/notifs.php';

if(!isset($_GET['p'])){
    $_GET['p'] = '';
}

$route = $_GET['p'];

$routeInfo = routage();
$label =  $routeInfo[0];
$title =  $routeInfo[1];
root($label, $title);








