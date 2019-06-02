<?php 


class LogoutController 
{

	public function actionLogout() {
		unset($_SESSION['userId']);
		header('Location: /');
	}
}