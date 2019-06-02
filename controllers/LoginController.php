<?php



class LoginController
{

	public function actionIndex() {

		$loginEmail = '';
		$loginPassword = '';

		if(isset($_POST['submit'])) {

			$loginEmail = $_POST['loginEmail'];
			$loginPassword = $_POST['loginPassword'];


			$userData = Login::checkLoginData($loginEmail, $loginPassword);

			if($userData == false) {
				echo '<div class="alert alert-danger text-center" role="alert">
						Falsche Anmeldedaten
					</div>';
			} else {
				// ad userId to Session
				Session::addDatenToSession($userData['user_id'], $userData['user_status'], $userData['user_allowed']);

				if($userData['user_allowed'] == 'ja'){
					header('Location: home');
				} else {
					header('Location: neue_anfrage');
					// email zu mir senden

					$empfaenger = "danielwagnerpost@gmail.com"; // email
					$betreff = "Anfrage zu dem Zugang zum Learnspace";
					$from = "Name: " .$userData['user_name'] . ", Email: " . $userData['user_email'];
					$text = "Bitte um den Zugang zum Learnspace 38.1" . "\n" . $from;
					mail($empfaenger, $betreff, $text, $from);


				}


			}
		}

		require_once(ROOT . '/views/login/index.php');
		return true;
	}
}
