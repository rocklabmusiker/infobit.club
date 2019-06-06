<?php


require_once('../../db_ajax.php');

if(isset($_POST['cat_titel']) && isset($_POST['cat_theme'])) {

	$cat_titel = trim(stripcslashes(htmlspecialchars($_POST['cat_titel'])));
	$cat_theme = trim(stripcslashes(htmlspecialchars($_POST['cat_theme'])));

	$sql = "INSERT INTO category (cat_titel, cat_theme) VALUES (:cat_titel, :cat_theme)";

	if($result = $db->prepare($sql)){

		$result->bindParam(':cat_titel', $cat_titel);
		$result->bindParam(':cat_theme', $cat_theme);

		$result->execute();

		if($result->rowCount() > 0) {
			echo true;
		} else {
			echo false;
		}
	}


}
