<?php

return [
	'admin/adminFragenEinlegen' => 'adminFragenEinlegen/index',
	'admin/adminHome' => 'adminHome/index',

	'wbsZwischen' => 'wbsZwischen/index',

	'ihkWirtTest/([0-9]+)' => 'ihkWirt/test/$1', // actionIndex in IhkFachController
	'ihkWirt' => 'ihkWirt/index',

	'ihkFachTest/([0-9]+)' => 'ihkFach/test/$1', // actionIndex in IhkFachController
	'ihkFach' => 'ihkFach/index', // actionIndex in IhkFachController
	'home' => 'home/index', // actionIndex in HomeController

	'personalProfil' => 'personalProfil/index',

	'logout' => 'logout/logout', // actionLogout in LogoutController
	'passwortVergessen/passwortWiederherstellen/([0-9]+)' => 'passwortWiederherstellen/index/$1',
	'neue_anfrage' => 'neueAnfrage/index',
	'passwort_vergessen' => 'passwortVergessen/index',
	'konto_erstellen' => 'kontoErstellen/index',
	'' => 'login/index', // actionIndex in LoginController

];
