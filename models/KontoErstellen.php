
<?php



class KontoErstellen
{


	public static function insertNewUserDaten($user_name, $user_email, $user_password) {

		$user_name = trim(stripslashes(htmlspecialchars($user_name)));
		$user_email = trim(stripslashes(htmlspecialchars($user_email)));
		$user_password = trim(stripslashes(htmlspecialchars($user_password)));
		$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);


		$db = Db::getConnection();
		$sql = "INSERT INTO user SET user_name = :user_name, user_email = :user_email, user_password = :user_password_hash";

		if($result = $db->prepare($sql)) {
			$result->bindParam(':user_name', $user_name);
			$result->bindParam(':user_email', $user_email);
			$result->bindParam(':user_password_hash', $user_password_hash);
			$result->execute();



			if($result->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		}
	}
}
