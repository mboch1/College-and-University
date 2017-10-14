<?php
//created on 23/04/2016 last rev. 04/05/2016
//this is login script which chooses interface for the user depending on the credentials and compares given password with encrypted one inside database
	require_once('db.php');
	session_start(['cookie_lifetime' => 86400]); // Starting Session, cookie set to 1 day
	
	global $con;	
	
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["login"]) || empty($_POST["password"]))
		{
			$error = "Both fields are required.";
		}
		else if(!empty($_POST["login"]) || !empty($_POST["password"]))
		{
		// Define $username and $password
			$username=$_POST['login'];
			$password2=$_POST['password'];
 
		// To protect from MySQL injection
			$username = stripslashes($username);
			$password2 = stripslashes($password2);
			$username = mysqli_real_escape_string($con, $username);
			$password2 = mysqli_real_escape_string($con, $password2);

		//Check for active username in database
			$sql="SELECT * FROM member_form WHERE login='$username' and is_active=1";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			//super admin account for testing purposes
			if($username=="admin1"&&$password2=="pass1234")
			{
					$_SESSION['username'] = $username; // Start Session
					$_SESSION['password'] = $password2;
					header("location: http://localhost/Prototype%20v.01/main_page.php");
			}
			//Check if we have a data into the array
			else if(is_array($row)) 
			{
				//If we have data inside the array do this:
				$salt = $row['salt'];
				$encrypted_password = $row['password'];
				$hashed_password = crypt($password2, $salt);
				//Compare the 'Encrypted Password' saved into the DB with the hash of the 'Password' entered by the user
				if($encrypted_password == $hashed_password)
				{
					//If username and password exist in our database then create a session.
					//Otherwise echo an error.
					//Redirects user to the proper interface
					//admin interface start here:
						if($row["is_admin"]==1&&$row["is_coach"]==0&&$row["is_active"]==1)
						{
							$_SESSION['username'] = $username; // Start Session
							$_SESSION['password'] = $password2;
							header("location: http://localhost/Prototype%20v.01/main_page.php"); 
						}
					//coach interface start here:
						else if($row["is_admin"]==0&&$row["is_coach"]==1&&$row["is_active"]==1)
						{
							$_SESSION['username'] = $username;
							$_SESSION['password'] = $password2;
							header("location: http://localhost/Prototype%20v.01/coach_interface.php"); 
						}
					//player member interface start here:
						else if($row["is_admin"]==0&&$row["is_coach"]==0&&$row["is_active"]==1)
						{
							$_SESSION['username'] = $username;
							$_SESSION['password'] = $password2;
							header("location: http://localhost/Prototype%20v.01/player_interface.php");						
						}	
				}
				else
				{
					echo "An unknown error has occurred while checking credentials, please contact administration.";
					echo "Redirecting...";
					header("refresh:6; url=http://localhost/Prototype v.01/index.php");
				}
			}	
			else
			{
				echo "Login/Password doesn't exist or unknown error has occured.";
				echo "Redirecting...";
				header("refresh:6; url=http://localhost/Prototype v.01/index.php");
			}
		}	
	}
?>