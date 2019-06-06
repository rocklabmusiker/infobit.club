<?php



class KontoErstellenController

{
	public function actionIndex(){
		$error;
		$message_text;

		if(isset($_POST['konto_erstellen'])){

			$user_name = $_POST['reg_name'];
			$user_email = $_POST['reg_email'];
			$reg_password_1 = $_POST['reg_password_1'];
			$reg_password_2 = $_POST['reg_password_2'];

			$user_email_exists = User::checkUserEmailIfExists($user_email);
			if($user_email_exists == false){

				if($user_name != '' && $user_email != '' && $reg_password_1 != '' && $reg_password_2 != ''){

					if($reg_password_1 == $reg_password_2){

						$user_password = $reg_password_1;

						$insertUserDaten = KontoErstellen::insertNewUserDaten($user_name, $user_email, $user_password);

						$empfaenger = "danielwagnerpost@gmail.com"; // email
						$betreff = "Anfrage zu dem Zugang zum Learnspace";
						$from = "Name: " .$user_name . ", Email: " . $user_email;
						$text = "Bitte um den Zugang zum Learnspace 38.1" . "\n" . $from;
						mail($empfaenger, $betreff, $text, $from);

						// header('Location: neue_anfrage');
						echo '<script> location.replace("neue_anfrage"); </script>';

					}

				} else {
					$error = true;
					$message_text = 'Hat nicht geklappt. Alle Textfelder müssen ausgefüllt sein!';
				}
			} else{
				$error = true;
				$message_text = 'Fehler. Ihre Email-Adresse ist bereits vorhanden!';
			}



		}

		require_once(ROOT . '/views/kontoErstellen/kontoErstellen.php');
		return true;
	}


}
