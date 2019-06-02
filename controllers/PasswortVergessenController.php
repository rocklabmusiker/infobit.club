<?php



class PasswortVergessenController

{

	public function actionIndex(){

		require_once(ROOT . '/views/passwortVergessen/passwortVergessen.php');
		return true;
	}


}
