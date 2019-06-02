<?php 


class GetName
{

	public static function getNameFromSession($idFromSession) {
		$db = Db::getConnection();

		$sql = "SELECT * FROM user WHERE user_id = :idFromSession";

		$result = $db->prepare($sql);
		$result->bindParam(':idFromSession', $idFromSession, PDO::PARAM_INT);
		$result->execute();

		return $result->fetch();
		
	}
}