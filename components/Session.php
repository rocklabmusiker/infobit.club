<?php 


class Session
{

	public static function addDatenToSession($user_id, $user_status, $user_allowed) {
		$_SESSION['user_status'] = $user_status;
		$_SESSION['user_id'] = $user_id;
		$_SESSION['user_allowed'] = $user_allowed;


	}

}


