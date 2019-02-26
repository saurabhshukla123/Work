<?php

class BaseController
{
	
	public function __construct() {
       @set_exception_handler(array($this, 'exception_handler'));
	}
	
	public function exception_handler($exception) {
       print "Exception Caught: ". $exception->getMessage() ."\n";
	}
   
	function load_model($params)
	{
	
		$modelClass = $params;
		if (file_exists(SITE_PATH . 'models/' . $params . ".php"))
		{
			include_once(SITE_PATH . 'core/basemodel.php');
			require_once(SITE_PATH . 'models/' . $params . ".php");
		}

		if ($modelClass != '' && class_exists($modelClass))
		{
			$modelName = strtolower($modelClass);
			$this->$modelName = new $modelClass();
		}
	}

	function load_view($params, $mvcViewData = array())
	{
		if (file_exists(SITE_PATH . 'views/' . $params . ".php"))
		{
			if (!empty($mvcViewData))
			{
				extract($mvcViewData);
			}
			include(SITE_PATH . 'views/' . $params . ".php");
		}
	}
	function load_view_admin($params, $mvcViewData = array())
	{
		if (file_exists(SITE_PATH . 'views/admin/' . $params . ".php"))
		{
			if (!empty($mvcViewData))
			{
				extract($mvcViewData);
			}
			include(SITE_PATH . 'views/admin/' . $params . ".php");
		}
	}

	function load_ajax_view($params, $mvcViewData = array())
	{
		if (file_exists(SITE_PATH . 'views/' . $params . ".php"))
		{
			if (!empty($mvcViewData))
			{
				extract($mvcViewData);
			}
			require_once(SITE_PATH . 'views/' . $params . ".php");
			exit;
		}
	}

	function load_single_view($params, $mvcViewData = array())
	{
		if (file_exists(SITE_PATH . 'views/' . $params . ".php"))
		{
			if (!empty($mvcViewData))
			{
				extract($mvcViewData);
			}
			require_once(SITE_PATH . 'views/' . $params . ".php");
		}
	}

	function load_controller($params)
	{
		$controllerClass = $params;
		if (file_exists(SITE_PATH . 'controllers/' . $params . ".php"))
		{
			require_once(SITE_PATH . 'controllers/' . $params . ".php");
		}

		if ($controllerClass != '' && class_exists($controllerClass))
		{
			$controllerClassName = ucfirst($params);
			$this->$controllerClass = new $controllerClassName();
		}
	}
	
	function redirect($redirect_to = '', $params = array()) 
	{
		$redirect_url = SITE_URL . $redirect_to;
		if(!empty($params) && isAssociative($params)) {
		
			$redirect_url .= "?";
			$count = 0;
			foreach($params as $key=>$value) {
				if($count == 0)
					$redirect_url .= $key . "=" . $value;
				else
					$redirect_url .= "&".$key . "=" . $value;
				$count++;
			}
		}
		header('Location:'.$redirect_url);
		exit;
	}
	

	public function setFlash($key, $message) {
		if(trim($key) != '' && trim($message) != '') {
			$_SESSION['flash'][$key] = $message;
		} else {
			throw new Exception('flash key or message is missing');
		}
	}
	
	public function hasFlash($key) {
		if(trim($key) != '') {
			if(isset($_SESSION['flash'][$key])) {
				return true;
			} else {
				return false;
			}
		} else {
			throw new Exception('flash key is missing');
		}
	}
	
	public function getFlash($key) {
		if($this->hasFlash($key)) {
			$msg = $_SESSION['flash'][$key];
			unset($_SESSION['flash'][$key]);
			return $msg;
		}
	}
	
}

?>