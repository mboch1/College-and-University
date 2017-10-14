<?php
//created on 30/04/2016 last rev. 06/05/2016
//this script sends form data to the database and creates a new user
	include ('db.php');
	session_start();
	
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$DOB = $_POST['DOB'];
	$SRU_number = $_POST['SRU_number'];	
	$address_street = $_POST['address_street'];	
	$address_post = $_POST['address_post'];	
	$address_city = $_POST['address_city'];	
	$email = $_POST['email'];
	$tel_number = $_POST['tel_number'];
	$mob_number = $_POST['mob_number'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$is_active = $_POST['active'];
	$is_admin = $_POST['admin'];
	$is_coach = $_POST['coach'];
	$is_junior = $_POST['junior'];
				
	// A higher "cost" is more secure but consumes more processing power
	$cost = 10;
	// Create a random salt
	$binarySalt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
	$salt = strtr(base64_encode($binarySalt), '+', '.');
	// Prefix information about the hash so PHP knows how to verify it later.
	// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
	$salt = sprintf("$2a$%02d$", $cost) . $salt;
	// Hash the password with the salt
	$encrypted_password = crypt($password, $salt);
	
	$insert_data = "INSERT INTO member_form (salt, name, surname, DOB, SRU_number, address_street, address_post, address_city, email, tel_number, mob_number, login, password, is_active, is_admin, is_coach, is_junior)
	VALUES ('$salt', '$name', '$surname', '$DOB', '$SRU_number', '$address_street', '$address_post', '$address_city', '$email', '$tel_number', '$mob_number', '$login', '$encrypted_password', '$is_active', '$is_admin', '$is_coach', '$is_junior')";
				
	if($insert_data_query = mysqli_query($con, $insert_data))
	{	
		echo "A new member was added!<br>";
		echo "Redirecting...<br>";
		header("refresh:2; url=http://localhost/Prototype v.01/nmember.php");
		exit;
	}	
	else
	{
		echo "An error has occured while setting a new member!<br>";
		echo "Please check connection or contact system administrator. Redirecting...<br>";
		header("refresh:5; url=http://localhost/Prototype v.01/nmember.php");
		exit;
	}
?>