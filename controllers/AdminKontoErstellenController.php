<?php



class AdminKontoErstellenController

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

						$user_name_post = $user_name;
						$user_email_post = $user_email;
						$empfaenger = $user_email_post; // email
						$betreff = "Lernportal 38.1";
						$from = "https://infobit.club";
						$text = "Hallo $user_name_post. Sie wurden erfolgreich registriert.\n Mit freundlichen Grüßen \n $from";
						$email_send = mail($empfaenger, $betreff, $text, $from);

						if($email_send){
							echo '<script> location.replace("/admin/adminHome"); </script>';
						}
						// header('Location: neue_anfrage');


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

		require_once(ROOT . '/views/admin/kontoErstellen/kontoErstellen.php');
		return true;
	}


}
