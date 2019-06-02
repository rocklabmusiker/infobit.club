<?php 


class Login 

{

	public static function checkLoginData($loginEmail, $loginPassword) {

		$loginEmail = trim(stripslashes(htmlspecialchars($loginEmail)));

		$db = Db::getConnection();
		$sql = 'SELECT * FROM user WHERE user_email = :loginEmail';

		$result = $db->prepare($sql);
		$result->bindParam(':loginEmail', $loginEmail, PDO::PARAM_STR);
		$result->execute();

		$user = $result->fetch();
		$hash_password = $user['user_password'];

		$pass_check = password_verify($loginPassword, $hash_password); 

		if($pass_check) {
			return $user;
		} 
			
		
		return false;
		
		
	}


}