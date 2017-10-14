<?php
//created on 07/05/2016 last rev. 07/05/2016
//This script places message into database
	include ('db.php');
	session_start();
	global $con;
	
	$header = $_POST['msg_topic'];
	$context = $_POST['context'];
	$sendto = $_POST['sendto'];
	$sentby = $_POST['sentby'];
	//if any of these is set it sends the message to the all members:
	if (!isset($_POST["sadmin"])) 
	{
		$send_admin =0;
	}
	else
	{
		$send_admin = $_POST['sadmin'];
	}

	if (!isset($_POST["scoach"])) 
	{
		$send_coach =0;
	}
	else
	{
		$send_coach = $_POST['scoach'];
	}
		
	if (!isset($_POST["splayer"])) 
	{
		$send_player=0;
	}
	else
	{
		$send_player = $_POST['splayer'];
	}
		
	if (!isset($_POST["sjunior"])) 
	{
		$send_junior=0;
	}
	else
	{
		$send_junior = $_POST['sjunior']; 
	}
	
	$insert_data = "INSERT INTO messenger (sendto, sentby, header, text, send_admin, send_coach, send_junior, send_player)
	VALUES ( '$sendto', '$sentby','$header', '$context', '$send_admin', '$send_coach','$send_player','$send_junior')";
	
	$insert_data_query = mysqli_query($con, $insert_data);
	
    print "Message was sent!<br>";
	print "Redirecting...<br>";
	header("refresh:2; url=http://localhost/Prototype v.01/main_page.php");

?>