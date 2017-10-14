<?php
//created on 08/05/2016 last rev. 08/05/2016
//this script removes entry form database inside insurance records
	include ('db.php');
	global $con;
	
	$id = $_POST['id'];
	
	$remove_message = "DELETE FROM insurance_fees_form WHERE ID = $id";
	
	if (mysqli_query($con, $remove_message)) 
	{
		print "Record was removed!<br>";
		print "Redirecting...<br>";
		header("refresh:1; url=http://localhost/Prototype v.01/insurance.php");
		exit;
	} 
	else 
	{
		echo "Error deleting record: " . mysqli_error($con);
	}
?>