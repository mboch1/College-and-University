<?php
//created on 09/05/2016 last rev. 12/05/2016
//This script places game record into database
	include ('db.php');
	session_start();
	
	$squad_id = $_POST['squad'];
	$member_ID = $_POST['member_id'];
	$op_name = $_POST['opposition_name'];
	$date = $_POST['date'];
	$location = $_POST['location'];
	$result = $_POST['result'];
	$score = $_POST['score'];
	$KOTime = $_POST['KOTime'];
	$SR_1Half_comments = $_POST['SR_1Half_comments'];
	$SR_2Half_comments = $_POST['SR_2Half_comments'];
	$Points_For1 = $_POST['Points_For1'];
	$Points_For2 = $_POST['Points_For2'];
	$Opp_1Half_comments = $_POST['Opp_1Half_comments'];
	$Opp_2Half_comments = $_POST['Opp_2Half_comments'];
	$Points_Against1 = $_POST['Points_Against1'];
	$Points_Against2 = $_POST['Points_Against2'];
	
	
	$insert_game_record = "INSERT INTO game_record_form(squad_id, member_ID, opposition_name, date, location, result, score, KOTime, SR_1Half_comments, SR_2Half_comments, Points_For1, Points_For2, Opp_1Half_comments, Opp_2Half_comments, Points_Against1, Points_Against2)
	VALUES('$squad_id','$member_ID','$op_name', '$date','$location','$result','$score','$KOTime','$SR_1Half_comments','$SR_2Half_comments','$Points_For1','$Points_For2','$Opp_1Half_comments','$Opp_2Half_comments','$Points_Against1','$Points_Against2')";
	
	$insert_data_query = mysqli_query($con, $insert_game_record);
	
    print "Record was created!<br>";
	print "Redirecting...<br>";
	header("refresh:1; url=http://localhost/Prototype v.01/game_record.php");

?>