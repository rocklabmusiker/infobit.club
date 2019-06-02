<?php 


	$params = [
		'host' => 'localhost',
		'dbname' => 'Lernportal',
		'user' => 'root',
		'password' => '',
	];

	try {
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn, $params['user'], $params['password']);
		// $db->exec("set names utf8"); // устанавливает кодировку для базы данных
	} catch(PDOException $e) {
		die('Ошибка соединения базы данных для ajax');
	}


