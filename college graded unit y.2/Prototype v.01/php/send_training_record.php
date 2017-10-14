<?php
//created on 10/05/2016 last rev. 10/05/2016
//This script places training record into database
	include ('db.php');
	session_start();
	global $con;
	
	$member_ID = $_POST['coaches'];
	$time = $_POST['time'];
	$training_date = $_POST['training_date'];
	$location = $_POST['location'];
	$skills_activities = $_POST['skills_activities'];
	$player_present = $_POST['player_present'];
	$accidents = $_POST['accidents'];
	
	
	$insert_training_record = "INSERT INTO training_record_form(member_ID, time, training_date, location, skills_activities, player_present, accidents)
	VALUES('$member_ID', '$time', '$training_date', '$location', '$skills_activities', '$player_present', '$accidents')";
	
	
	$insert_data_query = mysqli_query($con, $insert_training_record);
	if($inser_data_query=1)
	{
		print "Record was created!<br>";
		print "Redirecting...<br>";
		header("refresh:1; url=http://localhost/Prototype v.01/training_record.php");
	}
	else
	{
		print "Error occured while sending data!<br>";
		print "Redirecting...<br>";
		header("refresh:5; url=http://localhost/Prototype v.01/training_record.php");
	}

?>