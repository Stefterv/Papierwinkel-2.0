<?php 
  require_once("includes/constants.php");
	global $connection;
	$connection = new mysqli(DB_LOC, DB_USER, DB_PASS, DB_NAME);
	if ($connection->connect_errno) {
	    die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
	}
?>