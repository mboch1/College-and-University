<?php
//created on 10/05/2016 last rev. 10/05/2016
//this script sends form data to the database and creates a parental consent record
	include ('db.php');
	session_start();
	
	global $con;
	
	$junior_id=$_POST['juniors'];
	$season = $_POST['season'];
	$G1 = $_POST['G1_consent'];
	$G2 = $_POST['G2_consent'];
	
	$insert_data = "INSERT INTO consents_form (member_ID, season, G1_consent, G2_consent) VALUES ('$junior_id','$season', '$G1', '$G2')";
				
	$insert_data_query = mysqli_query($con, $insert_data);
	

    print "New record was added!<br>";
	print "Redirecting...<br>";
	header("refresh:1; url=http://localhost/Prototype v.01/consents_form.php");
	exit;	
?>