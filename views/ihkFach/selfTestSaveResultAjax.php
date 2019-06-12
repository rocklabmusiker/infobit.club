<?php
session_start(); 

require_once('../db_ajax.php');

if(isset($_POST['cat_id'])) {

	$user_id = trim(stripcslashes(htmlspecialchars($_POST['user_id'])));
	$cat_id = trim(stripcslashes(htmlspecialchars($_POST['cat_id'])));
	$gesamtprozentzahl = trim(stripcslashes(htmlspecialchars($_POST['gesamtprozentzahl'])));
	$erreichte_note = trim(stripcslashes(htmlspecialchars($_POST['erreichte_note'])));
	$vergangene_zeit = trim(stripcslashes(htmlspecialchars($_POST['vergangene_zeit'])));


	$sql = "INSERT INTO user_history (user_id, cat_id, gesamtprozentzahl, erreichte_note, vergangene_zeit) VALUES (:user_id, :cat_id, :gesamtprozentzahl, :erreichte_note, :vergangene_zeit)";

	if($result = $db->prepare($sql)){

		$result->bindParam(':user_id', $user_id);
		$result->bindParam(':cat_id', $cat_id);
		$result->bindParam(':gesamtprozentzahl', $gesamtprozentzahl);
		$result->bindParam(':erreichte_note', $erreichte_note);
		$result->bindParam(':vergangene_zeit', $vergangene_zeit);

		$result->execute();
		
		if($result->rowCount() > 0) {
			echo true;
		} else {
			echo false;
		} 
	}


}


		