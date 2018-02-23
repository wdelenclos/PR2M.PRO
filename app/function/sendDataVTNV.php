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

$data = json_decode($_POST["vtnv"]);
function updateVTNVData($data, $bdd)
{
	$patientID = (int)$data->PatientID;
	$testype = $data->Type;
	$dataparse = json_encode($data);
	echo($patientID);
	if($testype == 'pre'){
		try {
			$sql = "INSERT INTO `tests` (`lastupdate`,`pre_json`) VALUES  (`:time`, `:pre_json`) WHERE `tests`.`patient` =".$patientID;
			$stmt = $bdd->prepare($sql);
			$stmt->bindValue(':pre_json', $dataparse);
			$stmt->bindValue(':time', time());
			$stmt->execute();
			echo('Send pre');
		}
		catch( PDOException $Exception ) {
			var_dump($Exception->getMessage());
		}
	}
	else{
		try {
			$sql = "INSERT INTO `tests` (`lastupdate`,`post_json`) VALUES  (`:time`, `:post_json`) WHERE `tests`.`patient` =".$patientID;
			$stmt = $bdd->prepare($sql);
			$stmt->bindValue(':post_json', $dataparse);
			$stmt->bindValue(':time', time());
			$stmt->execute();
			echo('Send post');
		}
		catch( PDOException $Exception ) {
			var_dump($Exception->getMessage());
		}
	}
}
updateVTNVData($data, $bdd);