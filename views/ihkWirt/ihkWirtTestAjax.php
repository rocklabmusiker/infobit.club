<?php
session_start();

require_once('../db_ajax.php');

if(isset($_POST['frage_id'])) {

	$user_id = trim(stripcslashes(htmlspecialchars($_POST['user_id'])));
	$frage_id = trim(stripcslashes(htmlspecialchars($_POST['frage_id'])));
	$user_antworten = trim(stripcslashes(htmlspecialchars($_POST['user_antworten'])));

	$_SESSION['session_user_fragen_ihk_wirt'][$frage_id] = ['user_antworten' => $user_antworten];




}
