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

}// end Cat