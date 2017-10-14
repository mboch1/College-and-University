<?php
	require_once("php/db.php");
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
		if (!isset($_POST['submit'])){
	?>
    <div class="container">
	  </br></br></br></br>
      <form class="form-signin" action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div style="font-family: Verdana, Geneva, sans-serif; font-size: 14px; padding-bottom: 10px;">Not registered? <a href="register.php">Register Here</a></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
      </form>
    </div> <!-- /container -->
	<?php
		} else {
			// Check DB connection
			if(mysqli_connect_errno()){
				echo "Connection to DB error: " . mysqli_connect_errno();
				exit();
			}
			
			//Gets the data from the input fields
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			//DB Query
			$sql = "SELECT * FROM users WHERE username = '$username' AND user_bloqued = 'no' LIMIT 1";
			
			//Connect to DB and run the query			
			$result = mysqli_query($con, $sql);
			
			//Put the result of the query into an array of data
			$row = mysqli_fetch_array($result);
			
			//Check if we have a data into the array
			if(is_array($row)) {
				
				//If we have data into the array do this...
				$id = $row['id'];
				$username = $row['username'];
				$salt = $row['str'];
				$encrypted_password = $row['password'];
				$user_attempts = $row['user_attempts'];
				$hashed_password = crypt($password, $salt);
				
				//Compare the 'Encrypted Password' saved into the DB with the hash of the 'Password' entered by the user
				if($encrypted_password == $hashed_password){
					
					//If passwords match do this...
					$user_attempts = 0;
					$user_attempts_query = "UPDATE users SET user_attempts = $user_attempts WHERE username = '$username' LIMIT 1";
					$run_user_attempts_query = mysqli_query($con, $user_attempts_query);
		
					if($run_user_attempts_query){
						echo "<script language=\"JavaScript\">\n";
						echo "alert('User Attempts Updated to 0!');\n";
						echo "window.location='login.php'";
						echo "</script>";	
					}
					mysqli_close($con);
					$_SESSION["user_id"] = $id;
					$_SESSION["user_name"] = $username;
					header("Location: index.php");
					exit();
				}else{
					
					//If passwords don't match do this...
					if($user_attempts > 1){
						$user_attempts_query = "UPDATE users SET user_bloqued = 'yes' WHERE username = '$username' LIMIT 1";
						$run_user_attempts_query = mysqli_query($con, $user_attempts_query);
		
						if($run_user_attempts_query){
							mysqli_close($con);
							echo "<script language=\"JavaScript\">\n";
							echo "alert('User Account blocked = YES!');\n";
							echo "window.location='login.php'";
							echo "</script>";	
							exit();
						}
						mysqli_close($con);
						echo "<script language=\"JavaScript\">\n";
						echo "alert('Your Account has been Blocked... Please Contact Admin!');\n";
						echo "window.location='login.php'";
						echo "</script>";		
					}else{
						$user_attempts++;
						$user_attempts_query = "UPDATE users SET user_attempts = $user_attempts WHERE username = '$username' LIMIT 1";
						$run_user_attempts_query = mysqli_query($con, $user_attempts_query);
		
						if($run_user_attempts_query){
							mysqli_close($con);
							echo "<script language=\"JavaScript\">\n";
							echo "alert('User Attempts Updated! CONT');\n";
							echo "window.location='login.php'";
							echo "</script>";	
							exit();
						}
					}
				}	
			} else {
				
				//If we don't have data into the array do this...
				
				//Check if the user has been blocked
				
				//DB Query
				$check_bloqued_user = "SELECT * FROM users WHERE username = '$username' AND user_bloqued = 'yes' LIMIT 1";
			
				//Connect to DB and run the query			
				$result = mysqli_query($con, $check_bloqued_user);
			
				//Put the result of the query into an array of data
				$row = mysqli_fetch_array($result);
			
				//Check if we have a data into the array
				if(is_array($row)) {
					
					//If we have data into the array it means that the user has been blocked...
					mysqli_close($con);
					echo "<script language=\"JavaScript\">\n";
					echo "alert('Your Account has been Blocked... Please Contact Admin!');\n";
					echo "window.location='login.php'";
					echo "</script>";
					exit();
				}else{
					
					//If we don't have data into the array it means that the user doesn't exist...
					mysqli_close($con);
					echo "<script language=\"JavaScript\">\n";
					echo "alert('User not registered!');\n";
					echo "window.location='login.php'";
					echo "</script>";
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
