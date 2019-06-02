<?php 




class Router 
{
	private $routes;

	public function __construct() 
	{
		$routesPath = ROOT . '/config/routes.php';
		$this->routes = include($routesPath);
	}

	/*метод возвращает строку из адресной строки браузера*/
	private function getURI() 
	{
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{
		// Получить строку запроса
		
		$uri = $this->getURI();
		

		// Проверить наличие такого запроса в routes.php
		foreach($this->routes as $uriPattern => $path) {

			// Сравниваем $uriPattern и $uri
			if(preg_match("~$uriPattern~", $uri)) {


				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				// Определить контроллер, action,параметры 

				$segments = explode('/', $internalRoute); // разбиваем строку на сегменты, по разделителю /
				
				$controllerName = array_shift($segments).'Controller'; // array_shift() получает первое значение из массива и удаляет его из массива
				$controllerName = ucfirst($controllerName); // делаем первую букву заглавной
				

				$actionName = 'action'.ucfirst(array_shift($segments)); // получаем имя action

				$parameters = $segments;

				// Подключить файл класса-контроллера
				$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

				if(file_exists($controllerFile)) {
					include_once($controllerFile);
				}

				// Создать объект, вызвать метод (т.е. action)
				$controllerObject = new $controllerName;


				$result = call_user_func_array([$controllerObject, $actionName],$parameters);


				if($result != null) { // как только находит совпадение, выходит из цикла
					break;
				}

			}

		}
		
	}
}