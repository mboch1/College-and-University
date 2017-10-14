<?php
//created on 11/05/2016 last rev. 11/05/2016
//This page delivers a new junior player member personal data form
	require_once('php/db.php');
	session_start();	
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Junior Player Form</title>
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
						<li><a href="game_record.php"><span class="glyphicon glyphicon-blackboard"> New Game Record</a></span></li>
						<li><a href="training_record.php"><span class="glyphicon glyphicon-bullhorn"> New Training Record</a></span></li>
						<li class="active"><a href="junior_player_form.php"><span class="glyphicon glyphicon-knight"> New Junior Player Form</a></span></li>
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
		<form action='php/send_junior_form.php' name='junior_player' method='post'>
			<fieldset>
				<legend>Add a new junior member record:</legend>
				<h4>All fields are required!</h4>
					<label for='juniors'>Select Player Name:</label><br>
					<select name='juniors' required>";
					//get junior players IDs
					$sql3 = "SELECT * FROM member_form WHERE is_junior=1 AND is_active=1";
					// Connect to DB and run the Query 
					$result3=mysqli_query($con, $sql3);
					
					
					while($row2 = mysqli_fetch_assoc($result3))
					{
						$junior_id2 = $row2['member_id'];
						$name=$row2['name'];
						$surname=$row2['surname'];
						echo"<option value='$junior_id2'>$name $surname</option>";
					}	
					if($row2=0)
					{
						echo"<option value='0'>No junior players</option>";
					}
					echo"
					</select><br>
					<label for='G1_name'>Guardian 1 full name:</label><br><input class='mytext' type='text' placeholder='example: John Doe' name='G1_name' required><br>
					<label for='G1_relation'>Guardian 1 relationship:</label><br><input class='mytext' type='text' placeholder='relationship' name='G1_relation' required><br>
					<label for='G1_address'>Guardian 1 address:</label><br><input class='mytext' type='text' placeholder='address' name='G1_address' required><br>
					<label for='G1_tel'>Guardian 1 contact number:</label><br><input placeholder='0123456789' type='numbers' name='G1_tel' required><br>
					<label for='G2_name'>Guardian 2 full name:</label><br><input class='mytext' type='text' placeholder='example: Janet Doe' name='G2_name' required><br>
					<label for='G2_relation'>Guardian 2 relationship:</label><br><input class='mytext' type='text' placeholder='relationship' name='G2_relation' required><br>
					<label for='G2_address'>Guardian 2 address:</label><br><input class='mytext' type='text' placeholder='address' name='G2_address' required><br>
					<label for='G2_tel'>Guardian 2 contact number:</label><br><input placeholder='0123456789' type='numbers' name='G2_tel' required><br>
					<legend>Medical data:</legend>
					<label for='Doctor_name'>Doctors full name:</label><br><input class='mytext' type='text' placeholder='Name and Surname' name='doc_name' required><br>
					<label for='Doctor_tel'>Doctors telephone:</label><br><input class='mytext' type='text' placeholder='Contact number' name='doc_tel' required><br>
					<label for='health'>Health issues:</label><br><textarea for='junior_player' wrap='hard' name='health' rows='4' cols='50' required>None</textarea><br>
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