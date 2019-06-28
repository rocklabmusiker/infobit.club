<?php



class AdminPasswortVergessenController

{

	public function actionIndex(){

		require_once(ROOT . '/views/admin/passwortVergessen/passwortVergessen.php');
		return true;
	}


}
