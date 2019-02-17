<?php
include "../admin/include/init.php";

$request = $_SERVER['REQUEST_URI'];
$qs = $_SERVER['QUERY_STRING'];
$fileName = explode("/",$request);
$find_key=array_search("admin",$fileName,true); 

$dirName = explode('.',$fileName[$find_key+1]);
$qsName = explode('?',$fileName[$find_key+1]);

if($dirName[0] == 'home' || $dirName[0] == ''){
    require __DIR__ . '/views/login/home.php';
    exit();
}elseif($dirName[0] == 'login_db' || $dirName[0] == 'logout'){
    require __DIR__ .  '/views/login/'.$qsName[0];
    exit();
}elseif($dirName[0] == 'dashboard'){
    require __DIR__ . '/views/'.$dirName[0].'/'.$qsName[0];
    exit();
}elseif($dirName[0] == 'user' || $dirName[0] == 'user_db' || $dirName[0] == 'user_list' || $dirName[0] == 'user_update' || $dirName[0] == 'user_update_db'){
    require __DIR__ . '/views/user/'.$qsName[0];
    exit();
}else{
    require __DIR__ . '/404.php';
    exit();
}