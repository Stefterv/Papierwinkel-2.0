<?php 
	global $connection;
	$connection = new mysqli("localhost", "root", "root", "Papierwinkel");
	if ($connection->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
	}
?>