<?php 


class Fragen
{

	public static function getFragen($cat_id, $frage_num) {

		$db = Db::getConnection();
		$sql = "SELECT * FROM fragen WHERE frage_cat_id = :cat_id LIMIT 1 OFFSET ".$frage_num;

		if($result = $db->prepare($sql)) {
			$result->bindParam(':cat_id', $cat_id);
			$result->execute();


			if($result->rowCount() > 0) {
				return $result->fetch();
			} else {
				return false;
			}
		}
	}


	public static function countFragen($cat_id) {

		$db = Db::getConnection();
		$sql = "SELECT COUNT(frage_titel) FROM fragen WHERE frage_cat_id = :cat_id";

		if($result = $db->prepare($sql)) {
			$result->bindParam(':cat_id', $cat_id);
			$result->execute();


			if($result->rowCount() > 0) {
				return $result->fetch();
			} else {
				return false;
			}
		}
	}


	public static function rechnenErgebnissen($cat_id) {

		$db = Db::getConnection();
		/*$sql = "SELECT fragen.richtige_antwort, session_storage.session_antworten FROM fragen, session_storage WHERE fragen.frage_id = session_storage.session_frage_id && session_storage.session_user_id = :user_id";*/


		$sql = "SELECT * FROM fragen WHERE frage_cat_id = :cat_id";

		if($result = $db->prepare($sql)) {
			$result->bindParam(':cat_id', $cat_id);
			$result->execute();

			$punktzahl = 0;

			while($row = $result->fetch()) {

				// $session_antworten = $row['session_antworten'];
				
				$session_antworten = '';


				if(isset($_SESSION['session_user_fragen'][$row['frage_id']])) {

					$session_antworten = $_SESSION['session_user_fragen'][$row['frage_id']]['user_antworten'];
					
					$array_user_antworten = explode(',', $session_antworten);

					$fragen_antworten = $row['richtige_antwort'];
					$array_richtige_antworten = explode(',', $fragen_antworten);

					$antwort_richtig = true;

					if(count($array_user_antworten) != count($array_richtige_antworten)){
						$antwort_richtig = false;
					}

					for ($i=0; $i < count($array_user_antworten); $i++) { 

						if(!in_array($array_user_antworten[$i], $array_richtige_antworten)){

							$antwort_richtig = false;
							break;

						} 

					}
					
					

					if($antwort_richtig == true){
						$punktzahl++;	
					}


				}	
		

			}

			if($result->rowCount() > 0) {
				return $punktzahl * 3.33;
			} else {
				return false;
			}
		}
	}




} // end class Fragen