<?php

/**
 * Function pr to print array without exit
 */
function pr($printarray)
{
	echo "<pre>";
	print_r($printarray);
	echo "</pre>";
}

/**
 * Function pre to print array with exit
 */
function pre($printarray)
{
	echo "<pre>";
	print_r($printarray);
	echo "</pre>";
	exit;
}

/**
 * Function to check if user is logged-in or not.
 */
function checkIfLogin()
{
	if(isset($_SESSION['user_id'])) {
		return true;
	} else {
		return false;
	}
}

/**
 * Function to get name of user.
 */
function getLoginUserName()
{
	return $_SESSION['name'];
}

/**
 * Function to get user-id of logged-in user.
 */
function getUserId()
{
	return (!checkIfLogin() ? 0 : $_SESSION['user_id']);
}

function isAssociative(array $array)
    {
		
        $count_numeric_index = count(array_filter(array_keys($array), function($v){return is_numeric($v);}));
		if($count_numeric_index > 0)
			return false;
		else
			return true;
    }
	
	
function createUrl($route, $params = array())
{
	
	$url = SITE_URL . $route;
	if(!empty($params) && isAssociative($params)) {
		
		$url .= "?";
		$count = 0;
		foreach($params as $key=>$value) {
			if($count == 0)
				$url .= $key . "=" . $value;
			else
				$url .= "&".$key . "=" . $value;
			$count++;
		}
	}
	return $url;		
}

?>
