<?php
//created on 10/05/2016 last rev. 10/05/2016
//This scripts updates existing game record
	include ('db.php');
	session_start();
//if update button was pressed		
if($_POST){
    if(isset($_POST['update']))
	{
        update_training_record();
    }
}
//this function changes game record data and updates it inside the database	
function update_training_record()
{
	global $con;
	
	$form_id = $_POST['form_id'];
	$member_ID = $_POST['coaches'];
	$training_date = $_POST['training_date'];		
	$location = $_POST['location'];
	$time = $_POST['time'];		
	$skills = $_POST['skills'];
	$players = $_POST['players'];
	$accidents = $_POST['accidents'];

	
	$update_data = "UPDATE training_record_form
	SET member_ID='$member_ID', training_date='$training_date', location='$location', time='$time',
	skills_activities='$skills', player_present='$players', accidents='$accidents'
	WHERE ID=$form_id";
	
	if (mysqli_query($con, $update_data)) 
	{
		print "Data was updated!<br>";
		print "Redirecting...<br>";
		header("refresh:1; url=http://localhost/Prototype v.01/edit_training_record.php");
		exit;	
	} 
	else 
	{
		echo "Error updating record: " . mysqli_error($con);
	}
}

?>