<?php
//created on 11/05/2016 last rev. 12/05/2016
//This scripts updates or existing junior player skill personal record
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
	
	$update_data = "UPDATE junior_player_member_form
	SET G1_name='$G1_name', G1_relationship='$G1_relationship', G1_address='$G1_address', G1_tel='$G1_tel',
	G2_name='$G2_name', G2_relationship='$G2_relationship', G2_address='$G2_address', G2_tel='$G2_tel', 
	Doctor_name='$Doctor_name', Doctor_tel='$Doctor_tel', health_issues='$health_issues'
	WHERE ID=$form_id";
	
	if (mysqli_query($con, $update_data)) 
	{
		print "Data was updated!<br>";
		print "Redirecting...<br>";
		header("refresh:2; url=http://localhost/Prototype v.01/edit_junior.php");
		exit;	
	} 
	else 
	{
		echo "Error updating record: " . mysqli_error($con);
	}
}
	
?>