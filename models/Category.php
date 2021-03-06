<?php


class Category
{

	public static function getCategoryDaten($cat_theme) {

		$db = Db::getConnection();
		// $sql = "SELECT * FROM category WHERE cat_theme = :cat_theme ORDER BY cat_jahr DESC";
		$sql = "SELECT c.*, count(h.cat_id) as anzahl, min(h.erreichte_note) as note FROM category as c LEFT JOIN user_history as h ON c.cat_id = h.cat_id where c.cat_theme = :cat_theme  group by c.cat_titel";
		if($result = $db->prepare($sql)) {
			$result->bindParam(':cat_theme', $cat_theme);
			$result->execute();

			$cat_daten = [];
			$i = 0;
			while($row = $result->fetch()) {
				$cat_daten[$i]['cat_id'] = $row['cat_id'];
				$cat_daten[$i]['cat_titel'] = $row['cat_titel'];
				$cat_daten[$i]['cat_theme'] = $row['cat_theme'];
				$cat_daten[$i]['anzahl'] = $row['anzahl'];
				$cat_daten[$i]['note'] = $row['note'];
				$i++;
			}

			if($result->rowCount() > 0) {
				return $cat_daten;
			} else {
				return false;
			}
		}
	}



	public static function getLastCategory($cat_theme) {

		$db = Db::getConnection();
		$sql = "SELECT * FROM category WHERE cat_theme = '".$cat_theme."' ORDER BY cat_id DESC LIMIT 1";

		if($result = $db->query($sql)) {
			$result->execute();

			$last_cat = [];
			while($row = $result->fetch()) {
				$last_cat['cat_id'] = $row['cat_id'];
				$last_cat['cat_titel'] = $row['cat_titel'];
				$last_cat['cat_theme'] = $row['cat_theme'];
			}

			if($result->rowCount() > 0) {
				return $last_cat;
			} else {
				return false;
			}
		}
	}

	public static function neueCatEinlegen($cat_titel, $cat_theme, $cat_jahr){

		$db = Db::getConnection();

		$cat_titel = trim(stripcslashes(htmlspecialchars($cat_titel)));
		$cat_theme = trim(stripcslashes(htmlspecialchars($cat_theme)));
		$cat_jahr = trim(stripcslashes(htmlspecialchars($cat_jahr)));

		$sql = "INSERT INTO category (cat_titel, cat_theme, cat_jahr) VALUES (:cat_titel, :cat_theme, :cat_jahr)";

		if($result = $db->prepare($sql)){

			$result->bindParam(':cat_titel', $cat_titel);
			$result->bindParam(':cat_theme', $cat_theme);
			$result->bindParam(':cat_jahr', $cat_jahr);
			$result->execute();

			if($result->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		}

	}

}// end Cat
