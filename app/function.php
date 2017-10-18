<?php
//--------------------------------------------------------------
require('config.php');// Recupération de la configuration
//--------------------------------------------------------------


// Utilitaire -------------------------------------
function console_print( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( '" . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( '" . $data . "' );</script>";

    echo $output;
}

// Rootage -------------------------------
function routage(){ // Moteur de rooting
    $title = "";
    $label = "";
    $route = $_GET['p'];
    switch ($route) {
        case "":
            $label ="login";
            $title = "Connectez-vous";
            break;

	    case "new":
		    $label ="login";
		    $title = "Création d'un compte";
		    break;

        case "login":
            $label ="login";
            $title = "Connectez-vous";
            break;

        case "dashboard":
            $label ="content_dashboard";
            $title = "Liste des patients";
            break;

        case "compte":
            $label ="content_profile";
            $title = "Profil du praticien";
            break;
	    case "export":
		    $label ="content_export";
		    $title = "Visualisation des exports";
		    break;
        case "nouveau":
            $label ="content_new";
            $title = "Nouveau patient";
            break;

	    case "nouveauP":
		    $label ="content_newP";
		    $title = "Nouveau praticien";
		    break;

        case "details":
            $label ="content_details";
            $title = "Details du patient";
            break;

        case "liste":
            $label ="content_list";
            $title = "Liste des patients";
            break;
	    case "listeP":
		    $label ="content_listP";
		    $title = "Liste des praticiens";
		    break;
	    case "lexical":
		    $label ="content_lexical";
		    $title = "Test LexicalAccess";
		    break;
	    case "vtnv":
		    $label ="content_vtnv";
		    $title = "Test VTNV";
		    break;
	    case "shared1":
		    $label ="content_shared1";
		    $title = "Justification théorique";
		    break;
	    case "guide":
		    $label ="content_guide";
		    $title = "Guide d'utilisation";
		    break;
	    case "training":
		    $label ="content_training";
		    $title = "Entrainement";
		    break;
	    case "shared2":
		    $label ="content_shared2";
		    $title = "Question Clinique";
		    break;
	    case "shared3":
		    $label ="content_shared3";
		    $title = "Objectifs";
		    break;
        case "tests":
            $label ="content_tests";
            $title = "Consignes";
            break;
        case "logout":
            $label ="logout";
            $title = "Déconnecté";
            break;
        case "introuvable":
            $label ="403";
            $title = "Identifiant introuvable";
            break;
        default:
            $label ="404";
            $title = "Erreur 404";
            break;
    }
    if($title == null){
        $title = "404";
        $label = "404";
    }
    $exit = array($label, $title);
    return $exit;
}



function root($label, $title){

    if($label == "logout" ){
        session_destroy();
        header('Location: index.php?p=login&logout=true' );
    }

    if($label == "content_dashboard" || $label == "content_shared1" || $label == "content_export" || $label == "content_training" || $label == "content_lexical" || $label == "content_vtnv" || $label == "content_guide" || $label == "content_shared2" || $label == "content_shared3" || $label == "content_profile"  || $label == "content_new" || $label == "content_newP" || $label == "content_list" || $label == "content_listP" || $label == "content_details"|| $label == "content_tests" ){
        include_once 'template/head.php';
        include_once 'template/nav.php';
    }
    if((@include 'template/'.$label.'.php') === false){
        include_once 'template/404.php';
    }
    else{
        include_once 'template/'.$label.'.php';
        if($label !== "login" && $label !== "404"&& $label !== "403" ){
            include_once 'template/footer.php';
        }
    }
}
function sendMail($email){
	//Envoi du mail de confirmation
	$mail = $email; // Déclaration de l'adresse de destination.
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	//=====Déclaration des messages au format texte et au format HTML.
	$message_txt = "Voici votre identifiant PR2M : ".crc32($_POST['sign_Email']);
	$message_html = "<html><head></head><body><i>Voici votre identifiant PR2M : </i> <b>".  crc32($_POST['sign_Email'])."</b>.</body></html>";
	//==========

	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========

	//=====Définition du sujet.
	$sujet = "Votre compte PR2M";
	//=========

	//=====Création du header de l'e-mail.
	$header = "From: \"Equipe PR2M \"<equipe.pr2m@gmail.com>".$passage_ligne;
	$header.= "Reply-to: \"Equipe PR2M \" <equipe.pr2m@gmail.com>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========

	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format texte.
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========

	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
	//==========

	header('Location: ../index.php?n=100&p=dashboard&identifiant='.crc32($_POST['sign_Email']) );

}


// Praticiens
function addPraticien($bdd){

    try {
        $sql = "INSERT INTO `praticien`
        (id, identifiant, nom , prenom, create_date, email, patients)
        VALUES
        ( null, :identifiant, :nom ,:prenom, :create_date, :email, :patients)
        ";
        console_print($_POST['sign_Name']);
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(':identifiant', crc32($_POST['sign_Email']));
        $stmt->bindValue(':nom', $_POST['sign_Name']);
        $stmt->bindValue(':prenom', $_POST['sign_FirstName']);
        $stmt->bindValue(':email', $_POST['sign_Email']);
	    $stmt->bindValue(':create_date', $_POST['sign_date']);
        $arr = array();
        $stmt->bindValue(':patients', json_encode($arr));
        $stmt->execute();
        sendMail($_POST['sign_Email']);
	    $id =  crc32($_POST['sign_Email']);
	    header('Location: ../index.php?n=100&p=listeP&identifiant='.$_POST['sign_id'].'&id='.$id );
	}
    catch (PDOException $e) {

        $error = $e->getMessage();
	    header('Location: ../index.php?n=500&p=listeP&identifiant=' .$_POST['sign_id']. '&erreur='.$error );
    }
}
function searchPraticien($bdd)
{

    try {
        $sql = 'SELECT id,identifiant, nom, prenom, email, patients
        FROM `praticien`
        WHERE identifiant = :identifiant';
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(':identifiant',$_POST['identifiant']);
        $stmt->execute();
        $row = $stmt->fetchObject();
        $ide = $row->identifiant;
        if($ide == 0 || $ide == null){
            $boolean = false;
        }
        else{
            $boolean = true;
        }

    } catch (PDOException $e) {

        $e->getMessage();
    }
    return $boolean;
}
function listAllPraticiens($bdd)
{
	try {
		$sql = 'SELECT *
        FROM `praticien`';
		$stmt = $bdd->prepare($sql);
		$stmt->execute();

		while ($row = $stmt->fetchObject()) {

			echo('
                    
                
                 <tr>
                                <td>' . $row->id . '</td>
                                <td>
                                    <a>' . $row->nom . ' ' . $row->prenom . '</a>
                                    <br />
                                    <small>'. date('m/d/Y', $row->create_date) .'</small>
                               
                                </td>
                                <td>
                                 <a>' . $row->email . '</a>
                                 <br />
                                 <small>Identifiant: ' . $row->identifiant . '</small>
							  </td>
							  <td>
							   <a>' . count(json_decode($row->patients, true)) . '</a>
							  </td>
                              
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-chevron-right"></i> Voir </a>
                                    <a href="function/deleteP.php?id=' . $row->identifiant . '&identifiant='.$_SESSION['identifiant'].'" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ' . $row->nom . ' ?\')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Supprimer</a>
                                </td>
                            </tr>
                
                ');


		};
		$stmt = null;


	} catch (PDOException $e) {

		echo $e->getMessage();
	}
}
function removePraticien($bdd){
	try {
		$sql = "DELETE FROM `praticien` WHERE `identifiant`=:id" ;
		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':id',$_GET['id']);
		$stmt->execute();
		$id =  crc32($_GET['id']);
		header('Location: ../index.php?n=400&p=listeP&identifiant='.$_GET['identifiant'].'&id='.$id );
	}
	catch (PDOException $e) {

		$error = $e->getMessage();
		header('Location: ../index.php?n=500&p=listeP&identifiant=' .$_GET['identifiant']. '&erreur='.$error );
	}
}

// Patients
function searchOnePatient($bdd)
{

	try {
		$sql = 'SELECT *
        FROM `patients`
        WHERE id = :id';
		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':id',$_GET['id']);
		$stmt->execute();
		$row = $stmt->fetchObject();

	} catch (PDOException $e) {

		$e->getMessage();
	}
	return $row;
}
function addPatient($bdd) {

	try {
		$sql  = "INSERT INTO `patients` (`nom`, `prenom`, `date_naissance`, `lateralite`, `niveau`, `commentaire`,  `praticien`) VALUES (:nom, :prenom, :date_naissance, :lateralite, :niveau, :commentaire,  :identifiant)";

		$stmt = $bdd->prepare($sql);

		$stmt->bindValue( ':nom', $_POST['nom'] );
		$stmt->bindValue( ':prenom', $_POST['prenom'] );
		$stmt->bindValue( ':date_naissance', $_POST['date'] );
		$stmt->bindValue( ':niveau', $_POST['level'] );
		$stmt->bindValue( ':lateralite', $_POST['lateralite'] );
		$stmt->bindValue( ':commentaire', $_POST['commentaire'] );
		$stmt->bindValue( ':identifiant', $_POST['identifiant'] );
		$stmt->execute();


	} catch ( PDOException $Exception ) {
		var_dump( $Exception->getMessage() );
		die();
	};
	try{
		$sqli  = 'SELECT * FROM `patients` WHERE nom = :nom AND prenom = :prenom';
		$stmt = $bdd->prepare( $sqli );
		$stmt->bindValue( ':nom', $_POST['nom'] );
		$stmt->bindValue( ':prenom', $_POST['prenom'] );
		$stmt->execute();
		$row = $stmt->fetchObject();
		$id  = $row->id;
	}
	catch( PDOException $Exception ){
		var_dump( $Exception->getMessage() );
		die();
	}
	try {
		$sqlo = "INSERT INTO `tests` ( `patient`, `praticien`, `lastupdate`) VALUES( :patient, :praticien, :lastupdate )";
		$stmt = $bdd->prepare( $sqlo );
		$stmt->bindValue( ':patient', $id );
		$stmt->bindValue( ':praticien', $_POST['identifiant'] );
		$stmt->bindValue( ':lastupdate', null );
		$stmt->execute();
	} catch ( PDOException $Exception ) {
		var_dump( $Exception->getMessage() );
		die();
	};

	header( 'Location: ../index.php?n=201&p=details&identifiant=' . $_POST['identifiant'] . '&id=' . $id );
}
function updatePatient($bdd)
{
	$sql = "INSERT INTO `user`
        (id, pseudo, pw , adresse_mail)
        VALUES
        ( null, :pseudo, :pw ,:adresse_mail)
        ";
	$stmt = $bdd->prepare( $sql );
	$stmt->bindValue( ':pseudo' , htmlspecialchars($_POST['pseudo']) );
	$stmt->bindValue( ':pw' ,  sha1($_POST['pw'] ));
	$stmt->bindValue( ':adresse_mail' , htmlspecialchars($_POST['adresse_mail']) );
	$stmt->execute();
	header('Location:login.html');
}
function listAllPatient($bdd)
{
    try {
        $sql = 'SELECT *
        FROM `patients`
        WHERE praticien = :identifiant';
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(':identifiant',$_GET['identifiant']);
        $stmt->execute();

        while ($row = $stmt->fetchObject()) {

            // Tesst du nombre de tests effectués
            $done = 0;
            if($row->test_t0_emme !== null ){
                $done++;
            }
            if($row->test_t0_evip  !== null ){
                $done++;
            }
            if($row->test_t0_dra  !== null ){
                $done++;
            }
            if($row->test_t0_la_denomination  !== null ){
                $done++;
            }
            if($row->test_vtnv !== null ){
                $done++;
            }
            if($row->test_t0_la_designation  !== null  ){
                $done++;
            }

            $advencement = $done * 16.7;

            switch ($done){
                case 0:
                    $actionBtn = "<button type=\"button\" class=\"btn btn-default btn-xs\">En attente</button>";
                    $status = 'info';
                    break;
                case 6:
                    $actionBtn = "<button type=\"button\" class=\"btn btn-success btn-xs\">Terminé</button>";
                    $status = 'green';
                    break;
                default:
                    $actionBtn = "<button type=\"button\" class=\"btn btn-warning btn-xs\">En cours</button>";
                    $status = 'orange';
                    break;
            }

            echo('
                    
                
                 <tr>
                                <td>' . $row->id . '</td>
                                <td>
                                    <a>' . $row->nom . ' ' . $row->prenom . '</a>
                                    <br />
                                    <small>' . $row->date_naissance . '</small>
                                </td>
                                <td>
                                    <a>' . $row->niveau . ' - ' . $row->lateralite . '</a>
                                    <br />
                                    <small>' . $row->commentaire . '</small>
                                </td>
                                <td class="project_progress">
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-'.$status.'" role="progressbar" data-transitiongoal="'.$advencement.'"></div>
                                    </div>
                                    <small>'.$done.'/6 tests effectués</small>
                                </td>
                                <td>
                                    
                                    '.$actionBtn.'
                                </td>
                                <td>
                                    <a href="?p=details&identifiant='.$_SESSION['identifiant'].'&id='.$row->id.'" class="btn btn-primary btn-xs"><i class="fa fa-chevron-right"></i> Voir </a>
                                 
                                    <a href="function/delete.php?id=' . $row->id . '&identifiant='.$_SESSION['identifiant'].'" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ' . $row->nom . ' ?\')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Supprimer</a>
                                </td>
                            </tr>
                
                ');


        };
        $stmt = null;


    } catch (PDOException $e) {

        echo $e->getMessage();
    }
}
function listWaitingPatient($bdd)
{
    try {
        $sql = 'SELECT *
        FROM `tests`
        WHERE praticien = :identifiant
        AND  patients = :patient' ;
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(':identifiant',$_GET['identifiant']);
	    $stmt->bindValue(':patient',$_GET['patient']);
        $stmt->execute();

        while ($row = $stmt->fetchObject()) {

            // Tesst du nombre de tests effectués
	        $done = 0;
	        if($row->test_t0_emme !== null ){
		        $done++;
	        }
	        if($row->test_t0_evip  !== null ){
		        $done++;
	        }
	        if($row->test_t0_dra  !== null ){
		        $done++;
	        }
	        if($row->test_t0_la_denomination  !== null ){
		        $done++;
	        }
	        if($row->test_vtnv !== null ){
		        $done++;
	        }
	        if($row->test_t0_la_designation  !== null  ){
		        $done++;
	        }
            if ($done == 0){
                $advencement = $done * 16.7;

                switch ($done){
                    case 0:
                        $actionBtn = "<button type=\"button\" class=\"btn btn-default btn-xs\">En attente</button>";
                        $status = 'info';
                        break;
                    case 6:
                        $actionBtn = "<button type=\"button\" class=\"btn btn-success btn-xs\">Terminé</button>";
                        $status = 'green';
                        break;
                    default:
                        $actionBtn = "<button type=\"button\" class=\"btn btn-warning btn-xs\">En cours</button>";
                        $status = 'orange';
                        break;
                }

                echo('
                        
                    
                     <tr>
                                    <td>' . $row->id . '</td>
                                    <td>
                                        <a>' . $row->nom . ' ' . $row->prenom . '</a>
                                        <br />
                                        <small>' . $row->date_naissance . '</small>
                                    </td>
                                    <td>
                                        <a>' . $row->niveau . ' - ' . $row->lateralite . '</a>
                                        <br />
                                        <small>' . $row->commentaire . '</small>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress_sm">
                                            <div class="progress-bar bg-'.$status.'" role="progressbar" data-transitiongoal="'.$advencement.'"></div>
                                        </div>
                                        <small>'.$done.'/6 tests effectués</small>
                                    </td>
                                    <td>
                                        
                                        '.$actionBtn.'
                                    </td>
                                    <td>
                                        <a href="?p=details&identifiant='.$_SESSION['identifiant'].'&id='.$row->id.'" class="btn btn-primary btn-xs"><i class="fa fa-chevron-right"></i> Voir </a>
                                        <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                    
                    ');
            }


        };
        $stmt = null;


    } catch (PDOException $e) {

        echo $e->getMessage();
    }
}
function countPatient($bdd)
{
    try {
        $sql = 'SELECT *
        FROM `patients`
        WHERE praticien = :identifiant';
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(':identifiant',$_GET['identifiant']);
        $stmt->execute();
        $patientsInfo = [];
        $patientsInfo[0] = 0; // Patients en cours
        $patientsInfo[1] = 0; // Patients en attente
        $patientsInfo[2] = 0; // Patients Terminés
        $patientsInfo[3] = 0; // Patients total
        while ($row = $stmt->fetchObject()) {




            // Tesst du nombre de tests effectués
            $done = 0;
            if($row->test_t0_emme !== null ){
                $done++;
            }
            if($row->test_t0_evip  !== null ){
                $done++;
            }
            if($row->test_t0_dra  !== null ){
                $done++;
            }
            if($row->test_t0_la_denomination  !== null ){
                $done++;
            }
            if($row->test_vtnv !== null ){
                $done++;
            }
            if($row->test_t0_la_designation  !== null  ){
                $done++;
            }

            $advencement = $done * 16.7;

            if($done == 6){
                $patientsInfo[2]++;

            }
            if($done == 0){
                $patientsInfo[1]++;

            }
            if($done !== 0 && $done !== 6){
                $patientsInfo[0]++;

            }
            $patientsInfo[3]++;





        };
        $stmt = null;


    } catch (PDOException $e) {

        echo $e->getMessage();
    }
    return $patientsInfo;
}
function removePatient($bdd){
	try {
		$sql = "DELETE FROM `patients` WHERE `id`=:id" ;
		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':id',$_GET['id']);
		$stmt->execute();
		$id =  crc32($_GET['id']);
		header('Location: ../index.php?n=420&p=liste&identifiant='.$_GET['identifiant'].'&id='.$id );
	}
	catch (PDOException $e) {

		$error = $e->getMessage();
		header('Location: ../index.php?n=500&p=liste&identifiant=' .$_GET['identifiant']. '&erreur='.$error );
	}
}
function getTestData($id, $bdd){
	try {
		$sql = 'SELECT *
        FROM `tests`
        WHERE patient = :id';
		$stmt = $bdd->prepare($sql);
		$stmt->bindValue(':id',$id);
		$stmt->execute();
		$row = $stmt->fetchObject();

	} catch (PDOException $e) {

		$e->getMessage();
	}
	return $row;
}

