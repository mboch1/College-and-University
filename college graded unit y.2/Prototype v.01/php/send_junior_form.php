<?php
//created on 11/05/2016 last rev. 11/05/2016
//This script places junior player data record into database
	include ('db.php');
	session_start();
	
	$member_ID = $_POST['juniors'];
	$G1_name = $_POST['G1_name'];
	$G1_relationship = $_POST['G1_relation'];
	$G1_address = $_POST['G1_address'];
	$G1_tel = $_POST['G1_tel'];
	$G2_name = $_POST['G2_name'];
	$G2_relationship = $_POST['G2_relation'];
	$G2_address = $_POST['G2_address'];
	$G2_tel = $_POST['G2_tel'];
	$Doctor_name = $_POST['doc_name'];
	$Doctor_tel = $_POST['doc_tel'];
	$health_issues = $_POST['health'];
	
	//check if the record already exists!
	$result = mysqli_query($con,"SELECT * FROM junior_player_member_form WHERE member_ID='$member_ID' LIMIT 1");

    if(mysqli_fetch_array($result) == 0)
	{ 
		$insert_player_record = "INSERT INTO junior_player_member_form (member_ID, G1_name, G1_relationship, G1_address, G1_tel, G2_name, G2_relationship, G2_address, G2_tel, Doctor_name, Doctor_tel, health_issues) 
		VALUES ('$member_ID', '$G1_name', '$G1_relationship', '$G1_address', '$G1_tel', '$G2_name', '$G2_relationship', '$G2_address', '$G2_tel', '$Doctor_name', '$Doctor_tel', '$health_issues')";
	
		$insert_data_query = mysqli_query($con, $insert_player_record);
	
		if($insert_data_query=1)
		{
			print "Record was created!<br>";
			print "Redirecting...<br>";
			header("refresh:2; url=http://localhost/Prototype v.01/junior_player_form.php");
		}
		else
		{
			print "An error has occured!<br>";
			print "Redirecting...<br>";
			header("refresh:5; url=http://localhost/Prototype v.01/junior_player_form.php");		
		}
	}
	else
	{
		print "Record for this member already exists, please use edit instead!<br>";
		print "Redirecting...<br>";
		header("refresh:10; url=http://localhost/Prototype v.01/junior_player_form.php");
		
	}

?>