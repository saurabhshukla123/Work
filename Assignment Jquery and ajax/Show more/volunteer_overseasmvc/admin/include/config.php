<?php
/**
 * @author Tatvasoft
 * All Global constant will be declare here.
 *
 */

$error_display = 1;
if($error_display) {    
    ini_set('display_errors',1);
    error_reporting(E_ALL); // & ~E_NOTICE & ~E_WARNING
}else{
    error_reporting(1);
}
session_start();

//SITE NAME have path of your project directory
define('SITE_NAME', 'volunteer_overseasmvc');
define('SITE_URL','http://'.$_SERVER['HTTP_HOST'].'/'.SITE_NAME.'/');
define('ADMIN_SITE_URL','http://'.$_SERVER['HTTP_HOST'].'/'.SITE_NAME.'/admin/');


define('SITE_PATH', $_SERVER["DOCUMENT_ROOT"]. '/'.SITE_NAME .'/admin/');
define('SITE_PATH_FRONT', $_SERVER["DOCUMENT_ROOT"]. '/'.SITE_NAME .'/');
define('INCLUDE_PATH', SITE_PATH . 'include/');
define('ASSETS_URL', SITE_URL . 'admin/public/');
define('UPLOAD_URL', SITE_URL . 'admin/public/upload/');

//defines the database username and password.
define("DB_HOST", "localhost");
define("DB_PORT", "3306");
define("DB_USER_NAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "volunteeroverseas");

define('DEFAULT_CONTROLLER', 'admin');
define('ADMIN_CONTROLLER', 'admin');
define('DEFAULT_ACTION', 'index');
?>