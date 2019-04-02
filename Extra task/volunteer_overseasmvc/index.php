<?php
/**
 * @author Tatvasoft
 * This is entry point from where it will dispatch / route your URL to the appropriate controllers/actions.
 *
 */
$siteURL = explode("/",$_SERVER['REQUEST_URI']);

$find_key=array_search("admin",$siteURL,true); 

if(isset($siteURL[$find_key]) && $siteURL[$find_key] == 'admin' ){
    include('admin/home.php');
}else{
    include('include/init.php');
}
?>