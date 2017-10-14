<?php
//created on 08/05/2016 last rev. 08/05/2016
//this script sends form data to the database to set player skills
	include ('db.php');
	session_start();
	
	global $con;
	
		$member_id = $_POST['id'];
		$squad_id = $_POST['squad_id'];
		$passing_standard = $_POST['passing_standard'];
		$passing_spin = $_POST['passing_spin'];
		$passing_pop = $_POST['passing_pop'];
		$passing_comments = $_POST['passing_comments'];
		$tackling_front = $_POST['tackling_front'];
		$tackling_rear = $_POST['tackling_rear'];	
		$tackling_side = $_POST['tackling_side'];	
		$tackling_scrabble = $_POST['tackling_scrabble'];	
		$tackling_comments = $_POST['tackling_comments'];	
		$kicking_drop = $_POST['kicking_drop'];
		$kicking_punt = $_POST['kicking_punt'];
		$kicking_grubber = $_POST['kicking_grubber'];
		$kicking_goal = $_POST['kicking_goal'];
		$kicking_comments = $_POST['kicking_comments'];
		$pos_full_back= $_POST['pos_full_back'];
		$pos_wing = $_POST['pos_wing'];
		$pos_centre = $_POST['pos_centre'];
		$pos_fly_half = $_POST['pos_fly_half'];
		$pos_scrum_half = $_POST['pos_scrum_half'];
		$pos_hooker = $_POST['pos_hooker'];
		$pos_prop = $_POST['pos_prop'];
		$pos_2row = $_POST['pos_2row'];
		$pos_back_row = $_POST['pos_back_row'];
	
	$insert_data = "INSERT INTO player_profile_form (member_ID, squad_ID, passing_standard, passing_spin, passing_pop, passing_comments, tackling_front, tackling_rear, tackling_side, 
								tackling_scrabble, tackling_comments, kicking_drop, kicking_punt, kicking_grubber, kicking_goal, kicking_comments,
								pos_full_back, pos_wing, pos_centre, pos_fly_half, pos_scrum_half, pos_hooker, pos_prop, pos_2row, pos_back_row)
	VALUES ('$member_id', '$squad_id', '$passing_standard', '$passing_spin', '$passing_pop', '$passing_comments', '$tackling_front', '$tackling_rear', '$tackling_side', 
								'$tackling_scrabble', '$tackling_comments', '$kicking_drop', '$kicking_punt', '$kicking_grubber', '$kicking_goal', '$kicking_comments',
								'$pos_full_back', '$pos_wing', '$pos_centre', '$pos_fly_half', '$pos_scrum_half', '$pos_hooker', '$pos_prop', '$pos_2row', '$pos_back_row')";
				
	$insert_data_query = mysqli_query($con, $insert_data);
	
    print "Player skills were added!<br>";
	print "Redirecting...<br>";
	header("refresh:1; url=http://localhost/Prototype v.01/set_player_skills.php");
	exit;	
?>