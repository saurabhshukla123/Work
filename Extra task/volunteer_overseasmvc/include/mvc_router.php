<?php

class Router
{

	var $getVars = '';
	var $action = '';
	var $controller = '';
	var $params = array();

	public function resolvePath()
	{
		global $customRoutes;
		if (!empty($_GET['__iserror']))
		{
			header("HTTP/1.0 404 Not Found");
			include('404.php');
			exit();
		}

		$qs = $_SERVER['QUERY_STRING'];

		/** Strip out any GET vars * */
		if (!empty($qs))
		{
			$query = explode('&', $qs);

			/** Remove url if exists * */
			foreach ($query as $key => $q) {
				if (strstr($q, 'url='))
				{
					unset($query[$key]);
				}
			}

			/** Remove getVars from $query (not $qs, used elesewhere) * */
			$remove = implode('&', $query);
			if ($remove !== '')
			{
				$remove = sprintf('%s%s', '&', $remove);
				$qs = str_replace($remove, '', $qs);
			}

			$getVars = array();
			foreach ($query as $pair) {
				if (strstr($pair, '='))
				{
					list($key, $value) = explode('=', $pair);
					$getVars[$key] = $value;
				}
			}

			$this->getVars = $getVars;

			/** Parse for controller / action * */
			$request = array_filter(explode('/', $qs));

			/** Only Controller Specified * */
			if (count($request) === 1)
			{
				$controller = str_replace('url=', '', $request[0]);
				$action = 'index';
			}

			/** Controller & Action Specified * */
			if (count($request) >= 2)
			{
				$controller = str_replace('url=', '', array_shift($request));
				$action = array_shift($request);

				/** Remaining Params * */
				if ($request)
				{
					foreach ($request as $param) {
						$this->params[] = $param;
					}
				}
			}

			if (isset($customRoutes[$controller]))
			{
				$customRequest = explode('/', $customRoutes[$controller]);
				$controller = $customRequest[0];
				$action = count($customRequest) >= 2 ? $customRequest[1] : $action;
			}

			if ($controller == "")
			{
				$controller = DEFAULT_CONTROLLER;
				$action = DEFAULT_ACTION;
			}

			$this->controller = $controller;
			$this->action = $action;

			return $this;
		}
	}

}

?>