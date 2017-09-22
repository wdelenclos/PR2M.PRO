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

if(!empty($_FILES)){

	//connect with the database
	$targetDir = "../data/databaseFiles/pre/emme/";
	$fileName = $_GET['u'].'.xls';
	$targetFile = $targetDir.$fileName;

	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
		//insert file information into db table
		$sql = "INSERT INTO `patients`
        (test_emme)
        VALUES
        ( :test_emme)
       	WHERE id = :id;
        ";
		console_print('Fichier envoyé');
		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':test_emme', $fileName);
		$stmt->bindValue(':id', $_POST['sign_Name']);
		$stmt->execute();
	}

}