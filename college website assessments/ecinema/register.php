<?php
	require_once("php/db.php");
	include("php/functions.php");
	session_start();

	if(isset($_SESSION["user_name"])!=""){
		header("Location: index.php");
	}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>iCinema Website Project</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">iCinema Website Project</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="on-cinema.php">On Cinema</a></li>
                <li><a href="premiere.php">Premiere</a></li>
				<li><a href="coming-soon.php">Coming Soon</a></li>
				<li><a href="news.php">News</a></li>
				<li><a href="buy-tickets.php">Buy Tickets</a></li>
				<li><a href="connect.php">Connect</a></li>
				<li class="active"><a href="login.php">Login</a></li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
	
	<?php
		//echo $ip = getIp();
	?>	
	
	<?php
		if (!isset($_POST['submit'])) {
	?>
    <div class="container">
	  </br></br></br></br>
      <form class="form-signin" action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <h2 class="form-signin-heading">Register</h2>
        <label for="inputUsername" class="sr-only">Username</label>
		<input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
		<label for="inputFirstName" class="sr-only">First Name</label>
		<input type="text" id="inputFirstName" name="first_name" class="form-control" placeholder="First Name" required>
		<label for="inputLastName" class="sr-only">Last Name</label>
		<input type="text" id="inputLastName" name="last_name" class="form-control" placeholder="Last Name" required>
		<label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
		<label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
        <input type="password" id="inputConfirmPassword" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        <div style="font-family: Verdana, Geneva, sans-serif; font-size: 14px; padding-bottom: 10px;">Already registered? <a href="login.php">Login Here</a></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Register</button>
      </form>

    </div> <!-- /container -->
	<?php
		} else {		
			// Prepare data to insert into the DB
			$username	= $_POST['username'];
			$first_name	= $_POST['first_name'];
			$last_name	= $_POST['last_name'];
			$email		= $_POST['email'];
			$password	= $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			$ip_address = getIp();
			$user_attempts = 0;
			$bloqued = "no";
			$deleted = "no";
			$erased = "no";
			
			if($password == $confirm_password){
				//$encrypted_password = md5($password);
				
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
				
			} else {
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Password confirm failed!');\n";
				echo "window.location='register.php'";
				echo "</script>";
				exit();
			}

			// Checks if Username and Email exists. If not insert into the DB
			$exists = 0;
			
			// DB Queries
			$check_user_name = "SELECT username from users WHERE username = '$username' LIMIT 1";
			$check_user_email = "SELECT email from users WHERE email = '$email' LIMIT 1";

			// Run DB Queries
			$run_check_user_name_query = mysqli_query($con, $check_user_name);
			$run_check_user_email_query = mysqli_query($con, $check_user_email);
			
			// Checks the number of rows(entries) on the DB for Username and Email 
			$num_row_user = mysqli_num_rows($run_check_user_name_query);
			$num_row_email = mysqli_num_rows($run_check_user_email_query);
	
			$result = $num_row_user;
			if ($result == 1) {
				$exists = 1;
				$result = $num_row_email;
				if ($result == 1) $exists = 2;	
			} else {
				$result = $num_row_email;
				if ($result == 1) $exists = 3;
			}
		 
			if ($exists == 1){
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Username already exists!');\n";
				echo "window.location='register.php'";
				echo "</script>";
				exit();
			}
			else if ($exists == 2){ 
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Username and Email already exists!');\n";
				echo "window.location='register.php'";
				echo "</script>";
				exit();
			}
			else if ($exists == 3){ 
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Email already exists!');\n";
				echo "window.location='register.php'";
				echo "</script>";
				exit();
			}
			else {
				// Insert data into DB
				$insert_user = "INSERT  INTO users (username, first_name, last_name, email, password, ip_address, str, user_attempts, user_bloqued, user_deleted, user_erased) 
						VALUES ('$username', '$first_name', '$last_name', '$email', '$encrypted_password', '$ip_address', '$salt', '$user_attempts', '$bloqued', '$deleted', '$erased')";
				
				$insert_user_query = mysqli_query($con, $insert_user);
		 
				if ($insert_user_query) {
					mysqli_close($con);
					
					echo "<script language=\"JavaScript\">\n";
					echo "alert('User Successfully Registered!');\n";
					
					//Redirect to index.php but it could redirected to login.php 
					echo "window.location='index.php'";
					echo "</script>";
				} else {
					echo "Error Inserting User: " . mysqli_connect_errno();
					exit();
				}
			}
		}
		?>	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
