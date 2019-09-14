<?php


class IhkFachController
{

	private $ihk_fach_abschluss;
	public $mehrere_antworten;
	public $antworten_anzahl;
	public $einzelne_antwort_gesamtzahl;
	public $checked_box;

	public function actionIndex(){

		$_SESSION['session_user_fragen_ihk_fach'] = [];
		$_SESSION['cat_theme'] = '';

		$this->ihk_fach_abschluss = 'ihk_fach_abschluss';

		if(Category::getCategoryDaten($this->ihk_fach_abschluss)){

			$cat = Category::getCategoryDaten($this->ihk_fach_abschluss);
			$frage_num = 0;
		}


		require_once(ROOT . '/views/ihkFach/ihkFach.php');
		return true;
	}



	public function actionTest($cat_id){

		if(isset($_GET['cat_id']))
		{
			$cat_id = $_GET['cat_id'];
			$frage_num = $_GET['frage_num'];
		}



		// выводим вопрос по категории
		if(SelfTest::getSelfTestFragen($cat_id, $frage_num)){
			$frage = SelfTest::getSelfTestFragen($cat_id, $frage_num);

		} // ende Fragen::getFragen


		// считаем все вопросы одной категории, отсчёт с 1
		if(SelfTest::countSelfTestFragen($cat_id)){
			$fragen_anzahl = SelfTest::countSelfTestFragen($cat_id);
		}

		// выводим кол-во пунктов

		$gesamtprozentzahl = SelfTest::rechnenErgebnissen($_SESSION['session_user_fragen_ihk_fach']);
		// var_dump($gesamtprozentzahl);
		// echo '<br>';
		// var_dump($_SESSION['session_user_fragen_ihk_fach']);

		$erreichte_note = 0;
		// erreichte Note
		if($gesamtprozentzahl >= 95){
			$erreichte_note = 1;
		} else if($gesamtprozentzahl >= 91 && $gesamtprozentzahl < 100){
			$erreichte_note = 1.5;
		} else if($gesamtprozentzahl >= 86 && $gesamtprozentzahl < 91){
			$erreichte_note = 2;
		}else if($gesamtprozentzahl >= 80 && $gesamtprozentzahl < 86){
			$erreichte_note = 2.5;
		}else if($gesamtprozentzahl >= 73 && $gesamtprozentzahl < 80){
			$erreichte_note = 3;
		}else if($gesamtprozentzahl >= 66 && $gesamtprozentzahl < 73){
			$erreichte_note = 3.5;
		}else if($gesamtprozentzahl >= 57 && $gesamtprozentzahl < 66){
			$erreichte_note = 4;
		}else if($gesamtprozentzahl >= 49 && $gesamtprozentzahl < 57){
			$erreichte_note = 4.5;
		}else if($gesamtprozentzahl >= 38 && $gesamtprozentzahl < 49){
			$erreichte_note = 5;
		}else {
			$erreichte_note = 6;
		}


		require_once(ROOT . '/views/ihkFach/ihkFachTest.php');
		return true;
	}
}



 ?>
