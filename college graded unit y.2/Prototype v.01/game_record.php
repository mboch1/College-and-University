<?php
//created on 08/05/2016 last rev. 09/05/2016
//This page allows to create new game record on an active account
	require_once('php/db.php');
	session_start();
	
	//use name of the currently logged in user from the session settings:
	$login=$_SESSION['username'];
	
	$sql = "SELECT * FROM member_form WHERE login='$login'";
	// Connect to DB and run the Query 
	$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$id=$row['member_id'];
		}		
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Game Records</title>
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
				<li><a href="coach_interface.php"><span class="glyphicon glyphicon-home"> Main Page</span></a></li>
				<li><a href="coach_message_viewer.php"><span class="glyphicon glyphicon-envelope"> Message Box</a></span></li>
				<li><a href="squad_selector.php"><span class="glyphicon glyphicon-th-list"> Squads Manager</a></span></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"> Form Editor <b class="caret"></b></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Create:</li>
						<li><a href="set_player_skills.php"><span class="glyphicon glyphicon-pawn"> New Player Skill Profile</a></span></li>
						<li class="active"><a href="game_record.php"><span class="glyphicon glyphicon-blackboard"> New Game Record</a></span></li>
						<li><a href="training_record.php"><span class="glyphicon glyphicon-bullhorn"> New Training Record</a></span></li>
						<li><a href="junior_player_form.php"><span class="glyphicon glyphicon-knight"> New Junior Player Form</a></span></li>
						<li><a href="senior_player_form.php"><span class="glyphicon glyphicon-king"> New Senior Player Form</a></span></li>
						<li class="divider"></li>
						<li class="dropdown-header">View/Edit:</li>
						<li><a href="player_skills_editor.php"><span class="glyphicon glyphicon-pawn"> Player Skills</a></span></li>
						<li><a href="edit_game_record.php"><span class="glyphicon glyphicon-blackboard"> Existing Game Record</a></span></li>
						<li><a href="edit_training_record.php"><span class="glyphicon glyphicon-bullhorn"> Existing Training Record</a></span></li>
						<li><a href="edit_junior.php"><span class="glyphicon glyphicon-knight"> Existing Junior Player Form</a></span></li>
						<li><a href="edit_senior.php"><span class="glyphicon glyphicon-king"> Existing Senior Player Form</a></span></li>
					</ul>
				</li>
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
		<?php echo"
		<form action='php/send_game_record.php' method='post'>
			<fieldset>
				<legend>Add new game record and create future fixture:</legend>
				<h4>All fields marked with * are required</h4>
					<label for='squad'>Select squad*:</label><br><select name='squad' required>";
					//get squads IDs
					$sql3 = "SELECT * FROM squads";
					// Connect to DB and run the Query 
					$result3=mysqli_query($con, $sql3);
					
					while($row2 = mysqli_fetch_assoc($result3))
					{
						$squad_id = $row2['squad_id'];
						$squad_name=$row2['squad_name'];
						echo"<option value='$squad_id'>$squad_id: $squad_name</option>";
					}	
					echo"
					</select><br>
					<label for='opposition_name'>Opposition name*:</label><br><input class='mytext' type='text' name='opposition_name' required><br>
					<label for='date'>Date(dd-mm-yyyy)*:</label><br><input class='mytext' type='date' name='date' required><br>
					<label for='location'>Location*:</label><br><input class='mytext' type='text' placeholder='Home/Away' name='location' required><br>
					<label for='result'>Result(draw is default):</label><br>Win<input type='radio' name='result' value='1'> Loss<input type='radio' name='result' value='0'> Draw<input type='radio' name='result' value='2' checked><br>
					<label for='score'>End Score:</label><br><input placeholder='00:00 format' type='text' value='00:00' name='score' pattern='[0-9]{2}[:][0-9]{2}'><br>
					<label for='KOTime'>K/O Time(hh:mm:ss):</label><br><input type='text' placeholder='hh:mm:ss' pattern='[0-9]{2}[:][0-9]{2}[:][0-9]{2}' name='KOTime'><br>
					<label for='SR_1Half_comments'>Simply Rugby 1st Half Comments:</label><br><textarea for='game_record' wrap='hard' name='SR_1Half_comments' rows='4' cols='50'></textarea><br>
					<label for='SR_2Half_comments'>Simply Rugby 2nd Half Comments:</label><br><textarea for='game_record' wrap='hard' name='SR_2Half_comments' rows='4' cols='50'></textarea><br>
					<label for='Points_For1'>1st Half Points For:</label><br><input class='mytext' type='number' min='0' value='0' name='Points_For1'><br>
					<label for='Points_For2'>2nd Half Points For:</label><br><input class='mytext' type='number' min='0' value='0' name='Points_For2'><br>
					<label for='Opp_1Half_comments'>Opposition 1st Half Comments:</label><br><textarea for='game_record' wrap='hard' name='Opp_1Half_comments' rows='4' cols='50'></textarea><br>
					<label for='Opp_2Half_comments'>Opposition 2nd Half Comments:</label><br><textarea for='game_record' wrap='hard' name='Opp_2Half_comments' rows='4' cols='50'></textarea><br>
					<label for='Points_Against1'>1st Half Points Against:</label><br><input class='mytext' type='number' min='0' value='0' name='Points_Against1'><br>
					<label for='Points_Against2'>2nd Half Points Against:</label><br><input class='mytext' type='number' min='0' value='0' name='Points_Against2'><br>
					<input type='hidden' value='$id' name='member_id'>					
					<input type='submit' value='Submit'><br>
			<fieldset>
		</form>
			";?>
	
	
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