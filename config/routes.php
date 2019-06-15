<?php

return [
	'admin/adminBenutzer' => 'adminBenutzer/index',
	'admin/adminIhkFachTest' => 'adminSelfTest/ihkFachFragenEinlegen',
	'admin/adminLinks' => 'adminLinks/index',
	'admin/adminWbsZwischenFragenEinlegen' => 'adminFragenEinlegen/wbsZwischenFragenEinlegen',
	'admin/adminIhkZwischenFragenEinlegen' => 'adminFragenEinlegen/ihkZwischenFragenEinlegen',
	'admin/adminIhkFragenEinlegen' => 'adminFragenEinlegen/ihkWirtFragenEinlegen',
	'admin/adminHome' => 'adminHome/index',


	'webentwicklung' => 'links/webentwicklung',
	'netzwerk' => 'links/netzwerk',
	'linuxWindows' => 'links/linuxWindows',
	'sql' => 'links/sql',
	'htmlCss' => 'links/htmlCss',
	'cSharp' => 'links/cSharp',
	'javascript' => 'links/javascript',
	'php' => 'links/php',


	'statistik' => 'statistik/index',
	'wbsZwischenTest/([0-9]+)' => 'wbsZwischen/test/$1',
	'wbsZwischen' => 'wbsZwischen/index',

	'ihkZwischenTest/([0-9]+)' => 'ihkZwischen/test/$1',
	'ihkZwischen' => 'ihkZwischen/index',

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
