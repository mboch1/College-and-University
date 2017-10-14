<?php
//created on 23/04/2016 last rev. 30/04/2016
//This is is a SR login page which redirects user to the proper interface

	require_once('php/db.php');
	session_start();

	if(isset($_SESSION['username'])!="")
	{
		header("Location: main_page.php");
	}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SR Club App Login Page</title>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom CSS stylesheet goes here:  -->	
	<link href="css/customsheet.css" media="screen" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body> 
  <!-- Top of the page, banner space -->
	<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<img src="img/baner.jpg">
		</div>
	</div>		
		<!-- Content and menu row -->
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-4"></div>
			<div class="col-xs-12 col-sm-6 col-md-8 col-lg-4">
				<form class="form-signin" action="php/login.php" method="post">
					<h2 class="form-signin-heading">Simply Rugby Application</h2>
					<h2 class="form-signin-heading">Login here:</h2>
					<label for="inputUsername" class="sr-only">Your username:</label>
					<input type="text" id="inputUsername" name="login" class="form-control" placeholder="Username" required autofocus>
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
					<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" id="loginbutton">Login</button>
				</form>
			</div>
			<div class="col-sm-3 col-md-2 col-lg-4"></div>
		</div>
	</div>
		<div class="row">
		<div class="col-sm-3 col-md-2 col-lg-4"></div>
			<div class="col-xs-12 col-sm-6 col-md-8 col-lg-4">
				<h3>Welcome to the Simply Rugby web application!</h3><br>
				<p>Please login using received club member credentials from the secretary.</p>
				<p>If You will get lost or uncertain please search the user guide, link to which is provided <a href="help/User Guide.docx">here</a></p>
			</div>
			<div class="col-sm-3 col-md-2 col-lg-4"></div>
		</div>
		<div class="row">
			<div class="span12">
				<footer>
					<center><p>&copy; Simply Rugby Application, 2016</p></center>
				</footer>
			</div>
		</div>
	</div>
</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>