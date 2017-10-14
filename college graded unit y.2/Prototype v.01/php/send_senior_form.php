<?php
//created on 11/05/2016 last rev. 12/05/2016
//This script places senior player data record into database
	include ('db.php');
	session_start();
	
	$member_ID = $_POST['seniors'];
	$kin_name = $_POST['Next_of_kin_name'];
	$kin_tel = $_POST['Next_of_kin_tel'];
	$Doctor_name = $_POST['doc_name'];
	$Doctor_tel = $_POST['doc_tel'];
	$health_issues = $_POST['health'];
	
	//check if the record already exists!
	$result = mysqli_query($con,"SELECT * FROM senior_player_member_form WHERE member_ID='$member_ID' LIMIT 1");

    if(mysqli_fetch_array($result) == 0)
	{
		$insert_player_record = "INSERT INTO senior_player_member_form (member_ID, Next_of_kin_name, Next_of_kin_tel, Doctor_name, Doctor_tel, health_issues) 
		VALUES ('$member_ID', '$kin_name', '$kin_tel', '$Doctor_name', '$Doctor_tel', '$health_issues')";
	
		$insert_data_query = mysqli_query($con, $insert_player_record);
	
		if($insert_data_query=1)
		{
			print "Record was created!<br>";
			print "Redirecting...<br>";
			header("refresh:2; url=http://localhost/Prototype v.01/senior_player_form.php");
		}
		else
		{
			print "An error has occured!<br>";
			print "Redirecting...<br>";
			header("refresh:5; url=http://localhost/Prototype v.01/senior_player_form.php");		
		}
	}
	else
	{
		print "Record for this member already exists, please use edit instead!<br>";
		print "Redirecting...<br>";
		header("refresh:10; url=http://localhost/Prototype v.01/senior_player_form.php");	
	}
?>