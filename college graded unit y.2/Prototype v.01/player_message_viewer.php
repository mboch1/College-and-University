<?php
//created on 13/05/2016 last rev. 14/05/2016
//This page displays messages addressed for the user or group of users
	require_once('php/db.php');
	session_start();
	include('php/view_messages.php');
	global $con;
	
	//use name of the currently logged in user from the session settings:
	$login=$_SESSION['username'];
	
	$sql = "SELECT * FROM member_form WHERE login='$login'";
	// Connect to DB and run the Query 
	$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$member_id=$row['member_id'];
			$is_admin=$row['is_admin'];		
			$is_coach=$row['is_coach'];	
			$is_active=$row['is_active'];	
			$is_junior=$row['is_junior'];
		}		
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Message Box</title>
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
<div class="row">

<!-- Create Vertical Navbar and wrapper -->	
   <div class="col-sm-3">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Menu: </span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Sidebar menu</span>
        </div>
	<!-- Menu -->		
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
			<ul class="nav navbar-nav">
				<?php echo"<li><a href='#'>"."<span class='glyphicon glyphicon-user'><b>Welcome: ".$_SESSION["username"]."</b></span>"."</a></li>"?>
				<li><a href="player_interface.php"><span class="glyphicon glyphicon-home"> Main Page</span></a></li>
				<li><a href="personal_viewer.php"><span class="glyphicon glyphicon-envelope"> Personal Records</a></span></li>
				<li class="active"><a href="player_message_viewer.php"><span class="glyphicon glyphicon-envelope"> Message Box</a></span></li>
				<li><a href="insurance_viewer.php"><span class="glyphicon glyphicon-th-list"> Your Insurance</a></span></li>
				<?php
				if($is_junior==1&&$is_active==1)
				{
					echo "<li><a href='view_consents_form.php'><span class='glyphicon glyphicon-th-list'> View Parental Consents</a></span></li>";
				}
				?>
				<?php if(!isset($_SESSION['user_name'])){?>
				<li><a href="php/logout.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
				<?php } ?>
			</ul>
        </div>
	<!-- End of menu, navbar collapse -->
      </div>
    </div>
  </div>
  
  
<!-- Main Content goes here! -->
  
	<div class="col-sm-9">
	<legend>Received messages:</legend>
	<ol><?php get_messages($member_id,$is_admin,$is_coach,$is_active,$is_junior);?></ol>
	
	</div>
  
</div>

  <!-- //Main Content goes here! -->
  
	<!-- Footer -->
	<div class="container">
		<div class="row">
			<footer>
				<center><p>&copy; Simply Rugby Application, 2016</p></center>
			</footer>
		</div>
	</div>
	<!-- //Footer -->
</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>