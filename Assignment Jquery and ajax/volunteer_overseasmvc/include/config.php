<?php
/**
 * @author Tatvasoft
 * All Global constant will be declare here.
 *
 */

$error_display = 0;
if($error_display) {    
    ini_set('display_errors',1);
    error_reporting(E_ALL); // & ~E_NOTICE & ~E_WARNING
}else{
    error_reporting(1);
}
session_start();

//SITE NAME have path of your project directory
define('SITE_NAME', 'volunteer_overseasmvc'); // e.g volunteer_overseas
define('SITE_URL','http://'.$_SERVER['HTTP_HOST'].'/'.SITE_NAME.'/');
define('ADMIN_SITE_URL','http://'.$_SERVER['HTTP_HOST'].'/'.SITE_NAME.'/admin/');
define('ADMIN_ASSETS_URL','http://'.$_SERVER['HTTP_HOST'].'/'.SITE_NAME.'/admin/'.'public/');

define('SITE_PATH', $_SERVER["DOCUMENT_ROOT"]. '/'.SITE_NAME .'/');
define('INCLUDE_PATH', SITE_PATH . 'include/');
define('ASSETS_URL', SITE_URL . 'public/');
define('UPLOAD_URL', SITE_URL . 'public/upload/');
define('UPLOAD_VIDEO_URL1', SITE_URL . 'public/uploadsvideo/');
define('UPLOAD_IMAGE_URL1', SITE_URL . 'public/uploadsimage/');
define('UPLOAD_VIDEO_URL', 'public/uploadsvideo/');
define('UPLOAD_IMAGE_URL','public/uploadsimage/');

define('PROJECT_GALLERY', SITE_URL . 'public/images/projects_gallery/');
//defines the database username and password.
define("DB_HOST", "localhost");
define("DB_PORT", "3306");
define("DB_USER_NAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "volunteeroverseas");

define('DEFAULT_CONTROLLER', 'home');
define('ADMIN_CONTROLLER', 'admin');
define('DEFAULT_ACTION', 'index');
define('IMAGES', 'public/images/');



?>