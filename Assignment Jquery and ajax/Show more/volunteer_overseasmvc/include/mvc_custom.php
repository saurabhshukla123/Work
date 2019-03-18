<?php


include(INCLUDE_PATH . 'mvc_router.php');
include(INCLUDE_PATH . 'mvc_functions.php');
//include 'mvc_functions.php';
//include 'mvc_router.php';
$objRouter = new Router();
$routes = $objRouter->resolvePath();
$class = '';

if ($routes->controller != '' && $routes->action != '')
{	
	if (file_exists(SITE_PATH . 'controllers/' . $routes->controller . '.php'))
	{
		include(SITE_PATH . 'core/basecontroller.php');
		include(SITE_PATH . 'controllers/' . $routes->controller . '.php');
		$class = ucfirst($routes->controller);
		$method = $routes->action;
		$params = $routes->params;		
	}
	else
	{
		header("Location: 404.php");
	}

	if ($class != '' && class_exists($class))
	{
		$classObject = new $class();

		if (method_exists($classObject, $method))
		{
			call_user_func_array(array(&$classObject, $method), $params);
			exit;
		}
	}
}
?>