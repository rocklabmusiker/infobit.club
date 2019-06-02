<?php 

return [


	'wbsZwischen' => 'wbsZwischen/index',
	
	'ihkWirtTest/([0-9]+)' => 'ihkWirt/test/$1', // actionIndex in IhkFachController
	'ihkWirt' => 'ihkWirt/index', 

	'ihkFachTest/([0-9]+)' => 'ihkFach/test/$1', // actionIndex in IhkFachController
	'ihkFach' => 'ihkFach/index', // actionIndex in IhkFachController
	'home' => 'home/index', // actionIndex in HomeController

	'personalProfil' => 'personalProfil/index',

	'logout' => 'logout/logout', // actionLogout in LogoutController
	'neue_anfrage' => 'neueAnfrage/index',
	'passwort_vergessen' => 'passwortVergessen/index',
	'konto_erstellen' => 'kontoErstellen/index',
	'' => 'login/index', // actionIndex in LoginController

];