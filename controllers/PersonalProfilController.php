<?php 



class PersonalProfilController
{
	public function actionIndex() {


		$user_id = $_SESSION['user_id'];
		$error;
		$message_text;

		if(isset($_FILES['datei'])){
			$users_daten = User::getUserDaten($user_id);

			$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
			$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));

			$bild_upload = PersonalProfil::bildUpload($filename, $extension, $user_id);

			if($bild_upload){
				$error = false;
				$message_text = 'Super! Das Profilbild wurde geändert!';
			}
			
			
		}

		// get user daten
		$users_daten = User::getUserDaten($user_id);


		// update user daten
		if(isset($_POST['change_user_daten'])){

			$user_id = $_SESSION['user_id'];
			$user_name = $_POST['user_name'];
			$user_lastname = $_POST['user_lastname'];
			$user_email = $_POST['user_email'];
			

			if($user_name != '' && $user_lastname != '' && $user_email != ''){
				$update_user_daten = User::updateUserDaten($user_id, $user_name, $user_lastname, $user_email);
				
				$error = false;
				$message_text = 'Super! Die Änderungen wurden vorgenommen!';
				header("Refresh:3");
			} else {
				$error = true;
				$message_text = 'Hat nicht geklappt. Alle Textfelder müssen ausgefüllt sein!';
			} 
			

		}


		// change Password

		if(isset($_POST['change_password'])){

			$password_old = $_POST['password_old'];
			$password_new_1 = $_POST['password_new_1'];
			$password_new_2 = $_POST['password_new_2'];

			$users_daten = User::getUserDaten($user_id);
			$user_old_password = $users_daten['user_password'];

			$pass_check = password_verify($password_old, $user_old_password);

			if($pass_check == true && $password_new_1 == $password_new_2){

				PersonalProfil::changePassword($user_id, $password_new_1);
				
				$error = false;
				$message_text = 'Ihr Passwort wurde geändert!';
				header("Refresh:3");	
	
			} 
			else {
				$error = true;
				$message_text = 'Fehler! Ihr altes Passwort ist nicht korrekt. Bitte, versuchen Sie es erneut!';
			}


		}


		require_once(ROOT . '/views/personalProfil/personalProfil.php');
		return true;
	}
	
}



 ?>