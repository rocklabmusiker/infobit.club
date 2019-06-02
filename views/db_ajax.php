<?php


	$params = [
		'host' => 'db5000092882.hosting-data.io',
		'dbname' => 'dbs87526',
		'user' => 'dbu76741',
		'password' => '123Allesistdabei!data',
	];

	try {
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn, $params['user'], $params['password']);
		// $db->exec("set names utf8"); // устанавливает кодировку для базы данных
	} catch(PDOException $e) {
		die('Datenbankverbindung fehlgeschlagen für ajax');
	}
