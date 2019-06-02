

<?php
session_start(); 

require_once('../db_ajax.php');

if(isset($_POST['email'])) {

	$user_email = trim(stripcslashes(htmlspecialchars($_POST['email'])));


	$sql = "SELECT user_id FROM user WHERE user_email = :user_email";

	if($result = $db->prepare($sql)){

		$result->bindParam(':user_email', $user_email);

		$result->execute();
		
		if($result->rowCount() > 0) {


			exit(json_encode(array("status" => 1, "msg" => "Bitte überprüfen Sie ihre Email-Postfach!")));
		} else {
			exit(json_encode(array("status" => 0, "msg" => "Diese Email-Adresse kennen wir nicht!")));

		} 
	}


}
