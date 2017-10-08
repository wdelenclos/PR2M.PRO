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


echo $_POST;
if($_GET['p']=='0'){
	if($_GET['t']=='EMME'){
		//connect with the database
		$targetDir = "../data/databaseFiles/pre/emme/";
		$fileName = $_GET['u'].'.xls';
		$targetFile = $targetDir.$fileName;

		if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
			//insert file information into db table
			$sql = "REPLACE INTO `tests` (`test_emme`) VALUES `patients`.`id` = :id ";
			console_print('Fichier envoyé');
			$stmt = $bdd->prepare($sql);
			$stmt->bindValue(':test_emme', $fileName);
			$stmt->bindValue(':id', $_GET['id']);
			$stmt->execute();
		}
	}
	else if($_GET['t']=='EVIP'){
		$sql = "UPDATE `patients` SET `test_t0_evip` = :test_evip WHERE `patients`.`id` = :id ";
		console_print('Fichier envoyé');
		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':test_evip', $_POST['evip_score']);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		echo "<script type='text/javascript'>document.location.replace('/app/index.php?p=details&identifiant=".$_COOKIE['userID']."&id=".$_GET['id']."&n=101');</script>";
	}
	else if($_GET['t']==''){
		$sql = "UPDATE `patients` SET `test_evip` = :test_evip WHERE `patients`.`id` = :id ";
		console_print('Fichier envoyé');
		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':test_evip', $_POST['evip_score']);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		echo "<script type='text/javascript'>document.location.replace('/app/index.php?p=details&identifiant=".$_COOKIE['userID']."&id=".$_GET['id']."&n=101');</script>";

	}
	else if($_GET['t']==''){
		$sql = "UPDATE `patients` SET `test_evip` = :test_evip WHERE `patients`.`id` = :id ";
		console_print('Fichier envoyé');
		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':test_evip', $_POST['evip_score']);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		echo "<script type='text/javascript'>document.location.replace('/app/index.php?p=details&identifiant=".$_COOKIE['userID']."&id=".$_GET['id']."&n=101');</script>";

	}
	else if($_GET['t']==''){
		$sql = "UPDATE `patients` SET `test_evip` = :test_evip WHERE `patients`.`id` = :id ";
		console_print('Fichier envoyé');
		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':test_evip', $_POST['evip_score']);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		echo "<script type='text/javascript'>document.location.replace('/app/index.php?p=details&identifiant=".$_COOKIE['userID']."&id=".$_GET['id']."&n=101');</script>";

	}
	else if($_GET['t']==''){
		$sql = "UPDATE `patients` SET `test_evip` = :test_evip WHERE `patients`.`id` = :id ";
		console_print('Fichier envoyé');
		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':test_evip', $_POST['evip_score']);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		echo "<script type='text/javascript'>document.location.replace('/app/index.php?p=details&identifiant=".$_COOKIE['userID']."&id=".$_GET['id']."');</script>";

	}
	else{
		echo "<script type='text/javascript'>document.location.replace('/app/index.php?p=details&identifiant=".$_COOKIE['userID']."&id=".$_GET['id']."&n=500');</script>";

	}

}
else if($_GET['p']=='1'){

	if($_GET['t']==''){

	}
	else{
		header('Location: ../index.php?n=530&p=dashboard&identifiant='.$_POST['identifiant'] );
	}
}
else if($_GET['p']=='2'){
	if($_GET['t']==''){

	}
	else if($_GET['t']==''){

	}
	else if($_GET['t']==''){

	}
	else if($_GET['t']==''){

	}
	else if($_GET['t']==''){

	}
	else if($_GET['t']==''){

	}
	else{
		header('Location: ../index.php?n=520&p=dashboard&identifiant='.$_POST['identifiant'] );
	}


}
else {
	var_dump($_POST);
}

function updateTestData($id, $obj, $bdd)
{
	$patientID = (int)$obj['id'];
	try {
		$sql = "UPDATE `tests` SET `lastupdate` =  ".time().", `emme_pre`= :emme_pre, `emme_post` =  :emme_post, `dra_pre_tmps` =  :dra_pre_tmps, `dra_pre_precision` = :dra_pre_precision, `evip_pre_base` = :evip_pre_base, `evip_pre_plafond` = :evip_pre_plafond, `evip_pre_temps` = :evip_pre_temps , `la_pre` = :la_pre, `vtnv_pre` = :vtnv_pre, `dra_post_tmps` = :dra_post_tmps, `dra_post_precision` = :dra_post_precision, `evip_post_base` = :evip_post_base, `evip_post_plafond` = :evip_post_plafond, `evip_post_temps` = :evip_post_temps, `la_post` = :la_post, `vtnv_post` = :vtnv_post
           WHERE `tests`.`patient` =".$patientID;

		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':emme_pre',$obj['emme_pre']);
		$stmt->bindValue(':emme_post',$obj['emme_post']);
		$stmt->bindValue(':dra_pre_tmps',$obj['dra_pre_tmps']);
		$stmt->bindValue(':dra_pre_precision',$obj['dra_pre_precision']);
		$stmt->bindValue(':evip_pre_base',$obj['evip_pre_base']);
		$stmt->bindValue(':evip_pre_plafond',$obj['evip_pre_plafond']);
		$stmt->bindValue(':evip_pre_temps',$obj['evip_pre_temps']);
		$stmt->bindValue(':la_pre',$obj['la_pre']);
		$stmt->bindValue(':vtnv_pre',$obj['vtnv_pre']);
		$stmt->bindValue(':dra_post_tmps',$obj['dra_post_tmps']);
		$stmt->bindValue(':dra_post_precision',$obj['dra_post_precision']);
		$stmt->bindValue(':evip_post_base',$obj['evip_post_base']);
		$stmt->bindValue(':evip_post_plafond',$obj['evip_post_plafond']);
		$stmt->bindValue(':evip_post_temps',$obj['evip_post_temps']);
		$stmt->bindValue(':la_post',$obj['la_post']);
		$stmt->bindValue(':vtnv_post',$obj['vtnv_post']);
		var_dump( $stmt );
		$stmt->execute();
	}
	catch( PDOException $Exception ) {
		var_dump($Exception->getMessage());
	}
}

updateTestData($_POST['identifiantusr'], $_POST, $bdd);