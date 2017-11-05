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

$data = json_decode($_POST["la"]);

function updateVTNVData($data,$bdd)
{
	$patientID = (int)$data->patientID;
	$testype = $data->testType;
	$testMoment = $data->testMoment;
	$dataparse = json_encode($data);
	if($testype == 'eval'){
		if($testMoment == "pre"){
			try {
				$sql = "UPDATE `tests` SET  `lastupdate` = ".time().",`pre_la` = :pre_la WHERE `tests`.`patient` =".$patientID;
				$stmt = $bdd->prepare($sql);
				$stmt->bindValue(':pre_la', $dataparse);
				$stmt->execute();
				echo('Execute pre_la');
			}
			catch( PDOException $Exception ) {
				var_dump($Exception->getMessage());
			}
		}
		if($testMoment == "post"){
			try {
				$sql = "UPDATE `tests` SET  `lastupdate` = ".time().",`post_la` = :post_la WHERE `tests`.`patient` =".$patientID;
				$stmt = $bdd->prepare($sql);
				$stmt->bindValue(':post_la', $dataparse);
				$stmt->execute();
				echo('Execute pre_la');
			}
			catch( PDOException $Exception ) {
				var_dump($Exception->getMessage());
			}
		}
		
	}
	else if ($testype == 'train'){
		$sql ="SELECT `train_json` FROM `tests` WHERE `tests`.`patient` =".$patientID;
		$stmt = $bdd->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetchObject();
		$row = $row->train_json;
		var_dump($row->train_json);
		if($row == null || $row == ''|| $row == '{}'|| $row == 'null'){
			$row = [];
		}
		else{
			$row = json_decode($row);
		}
		array_push($row, array('date' => date('d/m'), 'data' => $dataparse));
		$rowa = json_encode($row);
		try {
			$sqlb = "UPDATE `tests` SET  `lastupdate` = ".time().", `train_json` = :train_json WHERE `tests`.`patient` = ".$patientID;
			$stmtb = $bdd->prepare($sqlb);
			$stmtb->bindValue(':train_json', $rowa);
			var_dump($stmtb);
			$stmtb->execute();
		}
		catch( PDOException $Exception ) {
			var_dump($Exception->getMessage());
		}
	}
}
updateVTNVData($data, $bdd);