<?php
//created on 11/05/2016 last rev. 12/05/2016
//This scripts updates or existing senior player skill personal record
	include ('db.php');
	session_start();
		
if($_POST){
    if(isset($_POST['update']))
	{
        update_skills();
    }
}
//this function changes existing member data and updates it inside the database	
function update_skills()
{
	global $con;
	
	$form_id = $_POST['ID'];
	$Next_of_kin_name = $_POST['Next_of_kin_name'];
	$Next_of_kin_tel = $_POST['Next_of_kin_tel'];
	$Doctor_name = $_POST['doc_name'];
	$Doctor_tel = $_POST['doc_tel'];
	$health_issues = $_POST['health'];
	
	$update_data = "UPDATE senior_player_member_form
	SET Next_of_kin_name='$Next_of_kin_name', Next_of_kin_tel='$Next_of_kin_tel',
	Doctor_name='$Doctor_name', Doctor_tel='$Doctor_tel', health_issues='$health_issues' 
	WHERE ID=$form_id";
	
	if (mysqli_query($con, $update_data)) 
	{
		print "Data was updated!<br>";
		print "Redirecting...<br>";
		header("refresh:2; url=http://localhost/Prototype v.01/edit_senior.php");
		exit;	
	} 
	else 
	{
		echo "Error updating record: " . mysqli_error($con);
	}
}
	
?>