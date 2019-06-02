

<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
require_once('../db_ajax.php');
require_once('../PHPMailer/Exception.php');
require_once('../PHPMailer/PHPMailer.php');

if(isset($_POST['email'])) {

	$user_email = trim(stripcslashes(htmlspecialchars($_POST['email'])));


	$sql = "SELECT user_id FROM user WHERE user_email = :user_email";

	if($result = $db->prepare($sql)){

		$result->bindParam(':user_email', $user_email);

		$result->execute();

		if($result->rowCount() > 0) {
			// erstellen und speichern token
			$user_token = "qwertzuiopasdfghjklyxcvbnm1234567890";
			$user_token = str_shuffle($user_token);
			$user_token = substr($user_token, 0, 10);

			$token_sql = "UPDATE user SET user_token = :user_token,
				user_token_expire=DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE user_email = :user_email";
					$row = $db->prepare($token_sql);
					$row->bindParam(':user_token', $user_token);
					$row->bindParam(':user_email', $user_email);
					$row->execute();


				$mail = new PHPMailer();
				$mail->addAddress($user_email);
				$mail->setFrom("hallo@infobit.club", "infobit.club-Passwort");
				$mail->Subject = "Passwort wiederherstellen";
				$mail->isHTML(true);
				$mail->Body = "
					Hi,<br><br>
					Um das Passwort wiederherzustellen, klicke auf den Link:<br>
					<a href='
					https://infobit.club/passwortVergessen/passwortWiederherstellen/0?email=$user_email&token=$user_token
					'>https://infobit.club/passwortVergessen/passwortWiederherstellen/0?email=$user_email&token=$user_token</a><br><br>

					Mit freundlichen Grüßen<br>
					infobit.club
				";

				if($mail->send()){
					exit(json_encode(array("status" => 1, "msg" => "Bitte überprüfen Sie ihre Email-Postfach!")));
				} else {
					exit(json_encode(array("status" => 1, "msg" => "Es hat nicht geklappt! Bitte, versuhen Sie es wieder!")));
				}

		} else {
			exit(json_encode(array("status" => 0, "msg" => "Diese Email-Adresse kennen wir nicht!")));

		}
	}


}
