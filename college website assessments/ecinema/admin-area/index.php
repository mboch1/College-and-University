<?php
	require_once("includes/db.php");
	session_start();

	if(isset($_SESSION["admin_name"])!=""){
		header("Location: admin.php");
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

    <title>iCinema Admin</title>

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
			  <div class="navbar-brand">iCinema Admin</div>
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
        <div style="font-family: Verdana, Geneva, sans-serif; font-size: 14px; padding-bottom: 10px;"></div>
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
		 
			$username = $_POST['username'];
			$password = $_POST['password'];
			$encrypted_password = md5($password);
			
			//DB Query
			$sql = "SELECT * FROM admins WHERE admin_name = '$username' AND password = '$encrypted_password' LIMIT 1";
			
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			
			if(is_array($row)) {
				$_SESSION["user_id"] = $row['id'];
				$_SESSION["admin_name"] = $row['admin_name'];
				header("Location: admin.php");
			} else {
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Invalid Username or Password!');\n";
				echo "window.location='index.php'";
				echo "</script>";
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
