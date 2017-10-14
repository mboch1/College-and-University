<?php
//created on 09/05/2016 last rev. 09/05/2016
//This scripts updates or removes existing player skill record
	include ('db.php');
	session_start();
		
if($_POST){
    if(isset($_POST['UpdateSkills']))
	{
        update_skills();
    }
	else if(isset($_POST['DeleteSkills']))
	{
        remove_skills();
    }
}
//this function changes existing member data and updates it inside the database	
function update_skills()
{
	global $con;
	
	$id = $_POST['member_id'];
	$squad_id = $_POST['squad_ID'];
	$passing_standard = $_POST['passing_standard'];
	$passing_spin = $_POST['passing_spin'];
	$passing_pop = $_POST['passing_pop'];
	$passing_comments = $_POST['passing_comments'];
	$tackling_front = $_POST['tackling_front'];
	$tackling_rear = $_POST['tackling_rear'];	
	$tackling_side =$_POST['tackling_side'];	
	$tackling_scrabble = $_POST['tackling_scrabble'];	
	$tackling_comments = $_POST['tackling_comments'];	
	$kicking_drop =$_POST['kicking_drop'];
	$kicking_punt = $_POST['kicking_punt'];
	$kicking_grubber = $_POST['kicking_grubber'];
	$kicking_goal = $_POST['kicking_goal'];
	$kicking_comments = $_POST['kicking_comments'];
	$pos_full_back= $_POST['pos_full_back'];
	$pos_wing = $_POST['pos_wing'];
	$pos_centre = $_POST['pos_centre'];
	$pos_fly_half = $_POST['pos_fly_half'];
	$pos_scrum_half =$_POST['pos_scrum_half'];
	$pos_hooker = $_POST['pos_hooker'];
	$pos_prop = $_POST['pos_prop'];
	$pos_2row = $_POST['pos_2row'];
	$pos_back_row = $_POST['pos_back_row'];
	
	$update_data = "UPDATE player_profile_form
	SET squad_ID='$squad_id', passing_standard='$passing_standard', passing_spin='$passing_spin', passing_pop='$passing_pop',
	passing_comments='$passing_comments', tackling_front='$tackling_front', tackling_rear='$tackling_rear', tackling_side='$tackling_rear', 
	tackling_scrabble='$tackling_scrabble', tackling_comments='$tackling_comments', kicking_drop='$kicking_drop', kicking_punt='$kicking_punt', kicking_grubber='$kicking_grubber', 
	kicking_goal='$kicking_goal', kicking_comments='$kicking_comments', pos_full_back='$pos_full_back', pos_wing='$pos_wing', pos_centre='$pos_centre', pos_fly_half='$pos_fly_half', pos_scrum_half='$pos_scrum_half', pos_hooker='$pos_hooker', pos_prop='$pos_prop', pos_2row='$pos_2row', pos_back_row='$pos_back_row' 
	WHERE member_ID=$id";
	
	if (mysqli_query($con, $update_data)) 
	{
		print "Data was updated!<br>";
		print "Redirecting...<br>";
		header("refresh:2; url=http://localhost/Prototype v.01/player_skills_editor.php");
		exit;	
	} 
	else 
	{
		echo "Error updating record: " . mysqli_error($con);
	}
}

//this function removes skill record, this is irreversible, might add safety backup archive in the future
function remove_skills()
{		
	global $con;
	
	$id = $_POST['member_id'];
	
	$remove_skills = "DELETE FROM player_profile_form WHERE member_ID = $id";
	
	if (mysqli_query($con, $remove_skills)) 
	{
		print "Profile was removed!<br>";
		print "Redirecting...<br>";
		header("refresh:2; url=http://localhost/Prototype v.01/main_page.php");
		exit;
	} 
	else 
	{
		echo "Error deleting record: " . mysqli_error($con);
	}
}
	
	
?>