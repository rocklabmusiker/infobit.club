<?php


class WbsZwischenController
{

	private $wbs_zwischen_abschluss;
	public $mehrere_antworten;
	public $antworten_anzahl;
	public $einzelne_antwort_gesamtzahl;
	public $checked_box;

	public function actionIndex(){

		$_SESSION['session_user_fragen_wbs_zwischen'] = [];
		$_SESSION['cat_theme_wbs_zwischen'] = '';

		$this->wbs_zwischen_abschluss = 'wbs_zwischen_abschluss';

		if(Category::getCategoryDaten($this->wbs_zwischen_abschluss)){

			$cat_wbs_zwischen_abschluss = Category::getCategoryDaten($this->wbs_zwischen_abschluss);
			$frage_num = 0;
			$back = 0; // zurück button
		}


		require_once(ROOT . '/views/wbsZwischen/wbsZwischen.php');
		return true;
	}



	public function actionTest($cat_id){

		if(isset($_GET['cat_id']))
		{
			$cat_id = $_GET['cat_id'];
			$frage_num = $_GET['frage_num'];
		}

		// выводим вопрос по категории
		if(Fragen::getFragen($cat_id, $frage_num)){
			$frage = Fragen::getFragen($cat_id, $frage_num);


			// вытаскиваем правильный ответ для определения кол-ва ответов, чтобы поставить checkbox oder radiobox
			$antworten_anzahl = $frage['richtige_antwort'];
			if($antworten_anzahl != ''){
				// если есть запятая в ответах, значит их больше одного
				if(strpos($antworten_anzahl, ',') === 1){
					$mehrere_antworten = true;
				} else {
					$mehrere_antworten = false;
				}

				// узнаём сколько ответов в вопросе
				if(strpos($antworten_anzahl, ',') === 1){

					$einzelne_antwort = explode(',', $antworten_anzahl);
					$einzelne_antwort_gesamtzahl = count($einzelne_antwort);
					$checked_box = 0;

				} else {
					$einzelne_antwort_gesamtzahl = 1;
				}


			} // ende if $antworten_anzahl


		} // ende Fragen::getFragen



		// считаем все вопросы одной категории, отсчёт с 1
		if(Fragen::countFragen($cat_id)){
			$fragen_anzahl = Fragen::countFragen($cat_id);
		}

		// выводим кол-во пунктов

			$session_user_antworten = $_SESSION['session_user_fragen_wbs_zwischen'];
			$gesamtprozentzahl = Fragen::rechnenErgebnissen($cat_id, $session_user_antworten);



		$erreichte_note = 0;
		// erreichte Note
		if($gesamtprozentzahl == 100){
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


		require_once(ROOT . '/views/wbsZwischen/wbsZwischenTest.php');
		return true;
	}
}



 ?>
