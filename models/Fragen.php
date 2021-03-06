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


	public static function rechnenErgebnissen($cat_id, $session_user_antworten) {

		$db = Db::getConnection();
		/*$sql = "SELECT fragen.richtige_antwort, session_storage.session_antworten FROM fragen, session_storage WHERE fragen.frage_id = session_storage.session_frage_id && session_storage.session_user_id = :user_id";*/


		$sql = "SELECT * FROM fragen WHERE frage_cat_id = :cat_id";

		if($result = $db->prepare($sql)) {
			$result->bindParam(':cat_id', $cat_id);
			$result->execute();



			$punktzahl = [];
			while($row = $result->fetch()) {

				$session_antworten = '';

				if(isset($session_user_antworten[$row['frage_id']])) {

					$session_antworten = $session_user_antworten[$row['frage_id']]['user_antworten'];

					$array_user_antworten = explode(',', $session_antworten);

					$fragen_antworten = $row['richtige_antwort'];
					$array_richtige_antworten = explode(',', $fragen_antworten);


					$antwort_richtig = 0;
					$antwort_gesamt = 0;
					$summe = 0;

					for ($i=0; $i < count($array_user_antworten); $i++) {

							if(in_array($array_user_antworten[$i], $array_richtige_antworten)){

								$antwort_richtig++;
							}
							$antwort_gesamt = count($array_richtige_antworten);
					}

					$summe = (3.33 / $antwort_gesamt) * $antwort_richtig;
					array_push($punktzahl, $summe);
				} // end if


			} // end while

			if($result->rowCount() > 0) {
				return round(array_sum($punktzahl),2);
			} else {
				return false;
			}
		}
	}


public static function frageEinsetzenMitBild($frage_titel, $frage_info, $frage_cat_id, $frage_cat_theme, $antwort_1, $antwort_2, $antwort_3, $antwort_4, $antwort_5, $antwort_6, $richtige_antwort,  $filename, $extension){


  $upload_folder = "template/images/testImages/" ; //Das Upload-Verzeichnis


  //Pfad zum Upload
  $new_path = $upload_folder.$filename.'.'.$extension;

  //Neuer Dateiname falls die Datei bereits existiert
  if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
   $id = 1;
   do {
   $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
   $id++;
   } while(file_exists($new_path));
  }

  //Alles okay, verschiebe Datei an neuen Pfad
	move_uploaded_file($_FILES['frage_bild']['tmp_name'], $new_path);
	$db = Db::getConnection();

	$bild = $filename.'.'.$extension;
	$sql = "INSERT INTO fragen (frage_titel, frage_info, frage_cat_id, frage_cat_theme, frage_bild, antwort_1, antwort_2, antwort_3, antwort_4, antwort_5, antwort_6, richtige_antwort)
  VALUES (:frage_titel, :frage_info, :frage_cat_id, :frage_cat_theme, :frage_bild, :antwort_1, :antwort_2, :antwort_3, :antwort_4, :antwort_5, :antwort_6, :richtige_antwort)";

	if($result = $db->prepare($sql)){
		$result->bindParam(':frage_titel', $frage_titel);
		$result->bindParam(':frage_info', $frage_info);
    $result->bindParam(':frage_cat_id', $frage_cat_id);
		$result->bindParam(':frage_cat_theme', $frage_cat_theme);
    $result->bindParam(':frage_bild', $bild);
    $result->bindParam(':antwort_1', $antwort_1);
    $result->bindParam(':antwort_2', $antwort_2);
    $result->bindParam(':antwort_3', $antwort_3);
    $result->bindParam(':antwort_4', $antwort_4);
    $result->bindParam(':antwort_5', $antwort_5);
    $result->bindParam(':antwort_6', $antwort_6);
    $result->bindParam(':richtige_antwort', $richtige_antwort);


		$result->execute();



		if($result->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}
}


public static function frageEinsetzenOhneBild($frage_titel, $frage_info, $frage_cat_id, $frage_cat_theme, $antwort_1, $antwort_2, $antwort_3, $antwort_4, $antwort_5, $antwort_6, $richtige_antwort){


	$db = Db::getConnection();
	$frage_bild = '';

	$sql = "INSERT INTO fragen (frage_titel, frage_info, frage_cat_id, frage_cat_theme, frage_bild, antwort_1, antwort_2, antwort_3, antwort_4, antwort_5, antwort_6, richtige_antwort)
  VALUES (:frage_titel, :frage_info, :frage_cat_id, :frage_cat_theme, :frage_bild, :antwort_1, :antwort_2, :antwort_3, :antwort_4, :antwort_5, :antwort_6, :richtige_antwort)";

	if($result = $db->prepare($sql)){
		$result->bindParam(':frage_titel', $frage_titel);
		$result->bindParam(':frage_info', $frage_info);
    $result->bindParam(':frage_cat_id', $frage_cat_id);
		$result->bindParam(':frage_cat_theme', $frage_cat_theme);
		$result->bindParam(':frage_bild', $frage_bild);
    $result->bindParam(':antwort_1', $antwort_1);
    $result->bindParam(':antwort_2', $antwort_2);
    $result->bindParam(':antwort_3', $antwort_3);
    $result->bindParam(':antwort_4', $antwort_4);
    $result->bindParam(':antwort_5', $antwort_5);
    $result->bindParam(':antwort_6', $antwort_6);
    $result->bindParam(':richtige_antwort', $richtige_antwort);


		$result->execute();



		if($result->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}
}


} // end class Fragen
