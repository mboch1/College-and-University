<?php
//created on 12/05/2016 last rev. 12/05/2016
//this script sends form data to the database and creates a new squad for selection
	include ('db.php');
	session_start();
	
	global $con;
	
	$squad_id=$_POST['squad_id'];
	$squad_name = $_POST['squad_name'];
	$coach_id = $_POST['coach_id'];	
	
	//check if the record already exists!
	$result = mysqli_query($con,"SELECT * FROM squads WHERE squad_id='$squad_id' LIMIT 1");

    if(mysqli_fetch_array($result) == 0)
	{	
		$insert_data = "INSERT INTO squads (squad_id, squad_name, coach_id) VALUES ('$squad_id','$squad_name', '$coach_id')";		
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
	}
	else
	{
		print "Record for this member already exists, please use edit instead!<br>";
		print "Redirecting...<br>";
		header("refresh:10; url=http://localhost/Prototype v.01/squad_selector.php");	
	}
		
?>