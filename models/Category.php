<?php


class Category
{

	public static function getCategoryDaten($cat_theme) {

		$db = Db::getConnection();
		$sql = "SELECT * FROM category WHERE cat_theme = :cat_theme";

		if($result = $db->prepare($sql)) {
			$result->bindParam(':cat_theme', $cat_theme);
			$result->execute();

			$cat_daten = [];
			$i = 0;
			while($row = $result->fetch()) {
				$cat_daten[$i]['cat_id'] = $row['cat_id'];
				$cat_daten[$i]['cat_titel'] = $row['cat_titel'];
				$cat_daten[$i]['cat_theme'] = $row['cat_theme'];
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

	public static function neueCatEinlegen($cat_titel, $cat_theme){

		$db = Db::getConnection();

		$cat_titel = trim(stripcslashes(htmlspecialchars($cat_titel)));
		$cat_theme = trim(stripcslashes(htmlspecialchars($cat_theme)));

		$sql = "INSERT INTO category (cat_titel, cat_theme) VALUES (:cat_titel, :cat_theme)";

		if($result = $db->prepare($sql)){

			$result->bindParam(':cat_titel', $cat_titel);
			$result->bindParam(':cat_theme', $cat_theme);
			$result->execute();

			if($result->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		}

	}

}// end Cat
