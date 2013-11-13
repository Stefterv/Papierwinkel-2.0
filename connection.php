<?php 
	global $connection;
	$connection = new mysqli("localhost", "root", "root", "Papierwinkel");
	//$connection = new mysqli("localhost", "steftnp108_pap", "16102013", "steftnp108_Papierwinkel");
	if ($connection->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
	}
?>