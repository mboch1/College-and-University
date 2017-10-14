<?php
//created on 23/04/2016 last rev. 23/04/2016
//This script creates a connection to the database, usable over all other scripts
	$servername = "localhost";
	$username = "root";
	$password = "1234password";
	$dbname = "srdb";

	// Connect to DB $con is going to be used as a global variable!
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	if(mysqli_connect_errno()){
		echo "Connection to DB error: " . mysqli_connect_errno();
	}
?>