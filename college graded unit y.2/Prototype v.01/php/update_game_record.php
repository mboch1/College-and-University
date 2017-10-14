<?php
//created on 09/05/2016 last rev. 10/05/2016
//This scripts updates existing game record
	include ('db.php');
	session_start();
		
if($_POST){
    if(isset($_POST['update']))
	{
        update_game_record();
    }
}
//this function changes game record data and updates it inside the database	
function update_game_record()
{
	global $con;
	
	$form_id = $_POST['form_id'];
	$squad_id = $_POST['squad'];
	$member_ID = $_POST['coaches'];
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
	
	$update_data = "UPDATE game_record_form
	SET squad_id='$squad_id', member_ID='$member_ID', opposition_name='$op_name', date='$date', location='$location', result='$result',
	score='$score', KOTime='$KOTime', SR_1Half_comments='$SR_1Half_comments', SR_2Half_comments='$SR_2Half_comments',
	Points_For1='$Points_For1', Points_For2='$Points_For2', Opp_1Half_comments='$Opp_1Half_comments',
	Opp_2Half_comments='$Opp_2Half_comments', Points_Against1='$Points_Against1', Points_Against2='$Points_Against2' WHERE 
	ID=$form_id";
	
	if (mysqli_query($con, $update_data)) 
	{
		print "Data was updated!<br>";
		print "Redirecting...<br>";
		header("refresh:1; url=http://localhost/Prototype v.01/edit_game_record.php");
		exit;	
	} 
	else 
	{
		echo "Error updating record: " . mysqli_error($con);
	}
}

?>