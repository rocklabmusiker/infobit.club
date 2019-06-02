<?php 



class NeueAnfrageController

{
	public function actionIndex(){

		require_once(ROOT . '/views/neueAnfrage/neueAnfrage.php');
		return true;
	}


}