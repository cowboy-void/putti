<?php
	session_start();

	function __autoload($className){
		$fileName = 'actions/'.$className.'.php';

		if (file_exists($fileName))
			require_once($fileName);
	}

	$actions = explode('/', $_SERVER['PATH_INFO']);
	array_shift($actions);
	$controllerName = array_shift($actions);

	if (class_exists($controllerName)) {
		$controller = new $controllerName($actions);
	
	} else {
		include('views/default.php');
		exit;
	
	}

?>