<?php



// FRONT CONTROLLER



// 1. Общие настройки

// вывод ошибок, при разработке сайта
ini_set('display_errors',1); // ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();


// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');



// 3. Установка соединения с БД



// 4. Вызов Router
$router = new Router();
$router->run();
