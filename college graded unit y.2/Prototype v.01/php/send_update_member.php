<?php
//created on 02/05/2016 last rev. 06/05/2016
//This scripts works depending on which button was pressed in the form 
//it will execute one of these functions.
	include ('db.php');
	session_start();
		
if($_POST){
    if(isset($_POST['UpdateData']))
	{
        update_data();
    }
	else if(isset($_POST['ChangePassword']))
	{
        reset_password();
    }
	else if(isset($_POST['DeleteAccount']))
	{
        remove_account();
    }
}
//this function changes existing member data and updates it inside the database	
function update_data()
{
	global $con;
	
	$id = $_POST['member_id2'];
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
	$is_active = $_POST['active'];
	$is_admin = $_POST['admin'];
	$is_coach = $_POST['coach'];
	$is_junior = $_POST['junior'];	
	
	$update_data = "UPDATE member_form 
	SET name='$name', surname='$surname', DOB='$DOB', SRU_number='$SRU_number',
	address_street='$address_street', address_post='$address_post', address_city='$address_city', email='$email', 
	tel_number='$tel_number', mob_number='$mob_number', login='$login', is_active='$is_active', is_admin='$is_admin', 
	is_coach='$is_coach', is_junior='$is_junior'
	WHERE $id=member_id";
	
	if (mysqli_query($con, $update_data)) 
	{
		print "Data was updated!<br>";
		print "Redirecting...<br>";
		header("refresh:2; url=http://localhost/Prototype v.01/main_page.php");
		exit;	
	} 
	else 
	{
		echo "Error updating record: " . mysqli_error($con);
	}
}

//this function changes existing password and updates it and salt inside the database
function reset_password()
{		
	global $con;
		
	$password = $_POST['password'];
	$id = $_POST['member_id2'];
	
	// A higher "cost" is more secure but consumes more processing power
	$cost = 10;

	// Create a random salt
	$binarySalt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
	$salt = strtr(base64_encode($binarySalt), '+', '.');
	$salt = sprintf("$2a$%02d$", $cost) . $salt;

	// Hash the password with the salt
	$encrypted_password = crypt($password, $salt);
			
	$update_password = "UPDATE member_form 
	SET salt='$salt', password='$encrypted_password' 
	WHERE $id = member_id";
	
	if (mysqli_query($con, $update_password)) 
	{
		print "Password was updated!<br>";
		print "Redirecting...<br>";
		header("refresh:2; url=http://localhost/Prototype v.01/main_page.php");
		exit;	
	} 
	else 
	{
		echo "Error updating password: " . mysqli_error($con);
	}
}

//this function removes account, this is irreversible, might add backup in future
function remove_account()
{		
	global $con;
	
	$id = $_POST['member_id2'];
	
	$remove_account = "DELETE FROM member_form WHERE member_id = $id";
	
	if (mysqli_query($con, $remove_account)) 
	{
		print "Account was removed!<br>";
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