<?php
/**
 * @author Tatvasoft
 * config,pagination,core mvc files will be includ here along with Database connectivity.
 *
 */

require_once("config.php");

//require_once("class.pagging.php");

// database connections begins
$conn = new mysqli(DB_HOST,DB_USER_NAME,DB_PASSWORD,DB_NAME, DB_PORT);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
// database connections ends

require_once("mvc_custom.php");
?>