<?php
/**
 * @author Tatvasoft
 * config,pagination,core mvc files will be includ here along with Database connectivity.
 *
 */

require_once("config.php");

//require_once("class.pagging.php");

// database connections begins
$conn = mysqli_connect(DB_HOST,DB_USER_NAME,DB_PASSWORD,DB_NAME, DB_PORT);

// Check connection
if($conn === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
// database connections ends

require_once("mvc_functions.php");


?>