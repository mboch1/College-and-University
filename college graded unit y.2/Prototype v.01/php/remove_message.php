<?php
//created on 07/05/2016 last rev. 08/05/2016
//this script removes message from the database, no user will be able to view it any more
	include ('db.php');
	global $con;
	
	$id = $_POST['id'];
	
	$remove_message = "DELETE FROM messenger WHERE ID = $id";
	
	if (mysqli_query($con, $remove_message)) 
	{
		print "Message was removed!<br>";
		print "Redirecting...<br>";
		header("refresh:1; url=http://localhost/Prototype v.01/message_editor.php");
		exit;
	} 
	else 
	{
		echo "Error deleting record: " . mysqli_error($con);
	}
?>