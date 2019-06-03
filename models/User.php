<?php


class User
{

	public static function getUserDaten($user_id) {

		$db = Db::getConnection();
		$sql = "SELECT * FROM user WHERE user_id = :user_id";

		if($result = $db->prepare($sql)) {
			$result->bindParam(':user_id', $user_id);
			$result->execute();

			$user_daten = [];

			while($row = $result->fetch()) {
				$user_daten['user_id'] = $row['user_id'];
				$user_daten['user_name'] = $row['user_name'];
				$user_daten['user_lastname'] = $row['user_lastname'];
				$user_daten['user_email'] = $row['user_email'];
				$user_daten['user_foto'] = $row['user_foto'];
				$user_daten['user_password'] = $row['user_password'];
				$user_daten['user_status'] = $row['user_status'];
			}

			if($result->rowCount() > 0) {
				return $user_daten;
			} else {
				return false;
			}
		}
	}


	public static function updateUserDaten($user_id, $user_name, $user_lastname, $user_email){

		$db = Db::getConnection();

		$sql = "UPDATE user SET user_name = :user_name, user_lastname = :user_lastname, user_email = :user_email WHERE user_id = :user_id";

		if($result = $db->prepare($sql)){
			$result->bindParam(':user_name', $user_name);
			$result->bindParam(':user_lastname', $user_lastname);
			$result->bindParam(':user_email', $user_email);
			$result->bindParam(':user_id', $user_id);

			$result->execute();

			if($result->rowCount() > 0){

				return true;
			}

		}
	}


	public static function getNotAllowedUserDaten($user_not_allowed) {

		$user_not_allowed = trim(stripslashes(htmlspecialchars($user_not_allowed)));

		$db = Db::getConnection();
		$sql = "SELECT * FROM user WHERE user_allowed = :user_not_allowed";

		if($result = $db->prepare($sql)) {
			$result->bindParam(':user_not_allowed', $user_not_allowed);
			$result->execute();

			$user_daten = [];
			$i = 0;
			while($row = $result->fetch()) {
				$user_daten[$i]['user_id'] = $row['user_id'];
				$user_daten[$i]['user_name'] = $row['user_name'];
				$user_daten[$i]['user_lastname'] = $row['user_lastname'];
				$user_daten[$i]['user_email'] = $row['user_email'];
				$user_daten[$i]['user_allowed'] = $row['user_allowed'];
				$i++;
			}

			if($result->rowCount() > 0) {
				return $user_daten;
			} else {
				return false;
			}
		}
	}



}// end User
