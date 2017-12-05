<?php
// the message

$name = $_POST[sign_Name];
$firstName = $_POST[sign_FirstName];
$email = $_POST[sign_Email];

$msg = "Demande de compte de : \n $name $firstName \n Email : $email";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("equipe.pr2m@gmail.com","Demande de compte",$msg);
echo('Merci, nous vous recontacterons sous peu ! Demande : '.$msg )
?> 