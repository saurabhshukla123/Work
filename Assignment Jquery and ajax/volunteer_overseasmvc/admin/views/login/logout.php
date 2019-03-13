<?php
include "../admin/include/init.php";
include "../admin/include/check_session.php";
session_unset();
session_destroy();

header("location:home.php");

?>