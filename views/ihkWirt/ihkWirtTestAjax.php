<?php
session_start(); 

require_once('../db_ajax.php');

if(isset($_POST['frage_id'])) {

	$user_id = trim(stripcslashes(htmlspecialchars($_POST['user_id'])));
	$frage_id = trim(stripcslashes(htmlspecialchars($_POST['frage_id'])));
	$user_antworten = trim(stripcslashes(htmlspecialchars($_POST['user_antworten'])));
	$secondsFromTimer = $_POST['secondsFromTimer'];


	$_SESSION['session_user_fragen'][$frage_id] = ['user_antworten' => $user_antworten];
	$_SESSION['timestamp_timer'] = $secondsFromTimer;



}


		