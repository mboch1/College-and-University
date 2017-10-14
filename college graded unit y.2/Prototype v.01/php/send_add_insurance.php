<?php
//created on 08/05/2016 last rev. 08/05/2016
//this script sends form data to the database and creates an insurance record
	include ('db.php');
	session_start();
	
	global $con;
	
	$season = $_POST['season'];
	$fees = $_POST['fees'];
	$member_id = $_POST['member_id'];
	
	$insert_data = "INSERT INTO insurance_fees_form (member_ID, season, fees) VALUES ('$member_id','$season', '$fees')";
				
	$insert_data_query = mysqli_query($con, $insert_data);
	

    print "New record was added!<br>";
	print "Redirecting...<br>";
	header("refresh:1; url=http://localhost/Prototype v.01/insurance.php");
	exit;	
?>