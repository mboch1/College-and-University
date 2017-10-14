<?php
//created on 11/05/2016 last rev. 11/05/2016
//This scripts updates existing junior player consents form
	include ('db.php');
	session_start();
	global $con;
		

	$form_id = $_POST['form_id'];
	$season = $_POST['season'];
	$G1_consent = $_POST['g1_con'];
	$G2_consent = $_POST['g2_con'];
	
if(isset($_POST['remove']))
{
	//use this id to indicate which form data is going to be removed
	$sql = "DELETE FROM consents_form WHERE ID=$form_id";
	// Connect to DB and run the Query 
	mysqli_query($con, $sql);
	header("refresh:1; url=http://localhost/Prototype v.01/consents_form.php");
}
	
	
if(isset($_POST['update']))
{
	$update_data = "UPDATE consents_form SET season='$season', G1_consent='$G1_consent', G2_consent='$G2_consent' WHERE ID=$form_id";
	
	if (mysqli_query($con, $update_data)) 
	{
		print "Data was updated!<br>";
		print "Redirecting...<br>";
		header("refresh:2; url=http://localhost/Prototype v.01/consents_form.php");
		exit;	
	} 
	else 
	{
		echo "Error updating record: " . mysqli_error($con);
	}
}

?>