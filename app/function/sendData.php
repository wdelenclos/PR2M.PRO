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



function updateTestData($id, $obj, $bdd)
{
	$patientID = (int)$obj['id'];

	// Envoi du pre files
	move_uploaded_file($_FILES['pre_deno_excel']['tmp_name'],'../data/FilesUploads/emme/pre/'.$patientID.'_deno_results.xls');
	move_uploaded_file($_FILES['pre_deno_pdf']['tmp_name'],'../data/FilesUploads/emme/pre/'.$patientID.'_deno_fiche.jpg');
	move_uploaded_file($_FILES['pre_desi_excel']['tmp_name'],'../data/FilesUploads/emme/pre/'.$patientID.'_desi_results.xls');

	// Envoi du post files
	move_uploaded_file($_FILES['post_deno_excel']['tmp_name'],'../data/FilesUploads/emme/post/'.$patientID.'_deno_results.xls');
	move_uploaded_file($_FILES['post_deno_pdf']['tmp_name'],'../data/FilesUploads/emme/post/'.$patientID.'_deno_fiche.jpg');
	move_uploaded_file($_FILES['post_desi_excel']['tmp_name'],'../data/FilesUploads/emme/post/'.$patientID.'_desi_results.xls');


	try {
		$sql = "UPDATE `tests` SET `lastupdate` =  ".time().", `pre_deno_excel` = :pre_deno_excel, `pre_deno_pdf` = :pre_deno_pdf, `pre_desi_excel` = :pre_desi_excel, `pre_deno_score` = :pre_deno_score, `pre_desi_score` = :pre_desi_score, `pre_nb_erreur`= :pre_nb_erreur , `pre_time`= :pre_time , `post_deno_excel`= :post_deno_excel , `post_deno_pdf` = :post_deno_pdf, `post_desi_excel` = :post_desi_excel, `post_deno_score` = :post_deno_score, `post_desi_score` = :post_desi_score , `post_nb_erreur` = :post_nb_erreur , `post_time` = :post_time
           WHERE `tests`.`patient` =".$patientID;

		$stmt = $bdd->prepare($sql);
		if($_FILES['pre_deno_excel']["size"] !== 0 ){
			$stmt->bindValue(':pre_deno_excel','/pre/'.$patientID.'_deno_results.xls');
		}
		else{
			$stmt->bindValue(':pre_deno_excel','');
		}
		if($_FILES['pre_desi_excel']["size"] !== 0 ){
			$stmt->bindValue(':pre_desi_excel','/pre/'.$patientID.'_desi_results.xls');
		}
		else{
			$stmt->bindValue(':pre_desi_excel','');
		}
		if($_FILES['pre_deno_pdf']["size"] !== 0 ){
			$stmt->bindValue(':pre_deno_pdf','/pre/'.$patientID.'_deno_fiche.jpg');
		}
		else{
			$stmt->bindValue(':pre_deno_pdf','');
		}
		if (!is_int($obj['pre_deno_score'])){
			$predeno = 0;
		}
		else{
			$predeno = intval($obj['pre_deno_score']);
		}
		if (!is_int($obj['pre_desi_score'])){
			$predesi = 0;
		}
		else{
			$predesi = intval($obj['pre_desi_score']);
		}
		$stmt->bindValue(':pre_deno_score',$predeno);
		$stmt->bindValue(':pre_desi_score',predesi);
		$stmt->bindValue(':pre_nb_erreur',$obj['pre_nb_erreur']);
		$stmt->bindValue(':pre_time',$obj['pre_time']);
		if($_FILES['post_deno_excel']["size"] !== 0 ){
			$stmt->bindValue(':post_deno_excel','/post/'.$patientID.'_deno_results.xls');
		}
		else{
			$stmt->bindValue(':post_deno_excel','');
		}
		echo($_FILES['post_deno_pdf']["size"].' \n'. gettype($_FILES['post_deno_pdf']["size"]).'\n' );
		if($_FILES['post_deno_pdf']["size"] !== 0){
			$stmt->bindValue(':post_deno_pdf','/post/'.$patientID.'_deno_fiche.jpg');
		}
		else{
			$stmt->bindValue(':post_deno_pdf','');
		}
		if($_FILES['post_desi_excel']["size"] !== 0 ){
			$stmt->bindValue(':post_desi_excel','/post/'.$patientID.'_desi_results.xls');
		}
		else{
			$stmt->bindValue(':post_desi_excel','');
		}
		$stmt->bindValue(':post_deno_score',$obj['post_deno_score']);
		$stmt->bindValue(':post_desi_score',$obj['post_desi_score']);
		$stmt->bindValue(':post_nb_erreur',$obj['post_nb_erreur']);
		$stmt->bindValue(':post_time',$obj['post_time']);
		$stmt->execute();
		echo('Send !');
	}
	catch( PDOException $Exception ) {
		var_dump($Exception->getMessage());
	}
}

updateTestData($_POST['identifiantusr'], $_POST, $bdd);