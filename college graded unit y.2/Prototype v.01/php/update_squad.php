<?php
//created on 12/05/2016 last rev. 12/05/2016
//this script updates form data inside the database for squads
	include ('db.php');
	session_start();
	
	global $con;
	
	$squad_id=$_POST['squad_ID'];
	$squad_name = $_POST['squad_name'];
	$coach_id = $_POST['coaches'];	

	$insert_data = "UPDATE squads SET squad_name='$squad_name', coach_id='$coach_id' WHERE squad_id=$squad_id";		
	$insert_data_query = mysqli_query($con, $insert_data);
		
		if($insert_data_query=1)
		{
			print "Record was created!<br>";
			print "Redirecting...<br>";
			header("refresh:2; url=http://localhost/Prototype v.01/squad_selector.php");
		}
		else
		{
			print "An error has occured!<br>";
			print "Redirecting...<br>";
			header("refresh:5; url=http://localhost/Prototype v.01/squad_selector.php");		
		}

?>