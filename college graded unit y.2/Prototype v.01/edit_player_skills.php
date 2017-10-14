<?php
//created on 08/05/2016 last rev. 08/05/2016
//This page creates a skill profile for selected player
	require_once('php/db.php');
	include('php/list.php');
	session_start();

	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$surname= $_POST['surname'];

?>	
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit player skills</title>
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
				<li><a href="c_squad_selector.php"><span class="glyphicon glyphicon-th-list"> Squads Manager</a></span></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"> Form Editor <b class="caret"></b></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Create:</li>
						<li><a href="set_player_skills.php"><span class="glyphicon glyphicon-pawn"> New Player Skill Profile</a></span></li>
						<li><a href="game_record.php"><span class="glyphicon glyphicon-blackboard"> New Game Record</a></span></li>
						<li><a href="training_record.php"><span class="glyphicon glyphicon-bullhorn"> New Training Record</a></span></li>
						<li><a href="junior_player_form.php"><span class="glyphicon glyphicon-knight"> New Junior Player Form</a></span></li>
						<li><a href="senior_player_form.php"><span class="glyphicon glyphicon-king"> New Senior Player Form</a></span></li>
						<li class="divider"></li>
						<li class="dropdown-header">View/Edit:</li>
						<li class="active"><a href="player_skills_editor.php"><span class="glyphicon glyphicon-pawn"> Player Skills</a></span></li>
						<li><a href="edit_game_record.php"><span class="glyphicon glyphicon-blackboard"> Existing Game Record</a></span></li>
						<li><a href="edit_training_record.php"><span class="glyphicon glyphicon-bullhorn"> Existing Training Record</a></span></li>
						<li><a href="edit_junior.php"><span class="glyphicon glyphicon-knight"> Existing Junior Player Form</a></span></li>
						<li><a href="edit_senior.php"><span class="glyphicon glyphicon-king"> Existing Senior Player Form</a></span></li>
					</ul>
				</li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"> Message Editor <b class="caret"></b></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Create:</li>
						<li><a href="messenger.php"><span class="glyphicon glyphicon-envelope"> New Message</a></span></li>
						<li class="divider"></li>
						<li class="dropdown-header">Edit existing:</li>
						<li><a href="message_editor.php"><span class="glyphicon glyphicon-envelope"> Existing Messages</a></span></li>
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
	<?php 
	  echo "<form id='skills' action='php/send_player_skills.php' method='post'>
			<fieldset>
			<legend>Set Player $name $surname skills here: </legend>
			<label for='squad'>Select squad*:</label><br>
			<select name='squad_id' required>";
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
			<label>Passing Standard:</label><br> <input class='mytext' type='number' min='1' max='5' name='passing_standard' required><br>
			<label>Passing Spin:</label><br> <input class='mytext' type='number' min='1' max='5' name='passing_spin' required><br>
			<label>Passing Pop:</label><br> <input class='mytext' type='number' min='1' max='5' name='passing_pop' required><br>
			<label>Passing Comments:</label><br> <textarea rows='6' cols='35' form='skills' name='passing_comments' wrap='hard' placeholder='Passing Commentary' required></textarea><br>
			<label>Tackling Front:</label><br> <input class='mytext' type='number' min='1' max='5' name='tackling_front' required><br>
			<label>Tackling Rear:</label><br> <input class='mytext' type='number' min='1' max='5' name='tackling_rear' required><br>
			<label>Tackling Side:</label><br> <input class='mytext' type='number' min='1' max='5' name='tackling_side' required><br>
			<label>Tackling Scrabble:</label><br> <input class='mytext' type='number' min='1' max='5' name='tackling_scrabble' required><br>
			<label>Tackling Comments:</label><br> <textarea rows='6' cols='35' form='skills' name='tackling_comments' wrap='hard' placeholder='Tackling Commentary' required></textarea><br>
			<label>Kicking Drop:</label><br> <input class='mytext' type='number' min='1' max='5' name='kicking_drop' required><br>
			<label>Kicking Punt:</label><br> <input class='mytext' type='number' min='1' max='5' name='kicking_punt' required><br>
			<label>Kicking Grabber:</label><br> <input class='mytext' type='number' min='1' max='5' name='kicking_grubber' required><br>
			<label>Kicking Goal:</label><br>  <input class='mytext' type='number' min='1' max='5' name='kicking_goal' required><br>
			<label>Kicking Comments:</label><br>  <textarea rows='6' cols='35' form='skills' name='kicking_comments' wrap='hard' placeholder='Kicking Commentary' required></textarea><br>
			<label>Position Full Back:</label> Yes<input value='1' type='radio' name='pos_full_back' required> No<input  value='0' type='radio' name='pos_full_back' required><br> 
			<label>Position Wing:</label> Yes<input value='1' type='radio' name='pos_wing' required> No<input  value='0' type='radio' name='pos_wing' required><br>
			<label>Position Centre:</label> Yes<input value='1' type='radio' name='pos_centre' required> No<input  value='0' type='radio' name='pos_centre' required><br>
			<label>Position Fly Half:</label> Yes<input value='1' type='radio' name='pos_fly_half' required> No<input  value='0' type='radio' name='pos_fly_half' required><br>
			<label>Position Scrum Half:</label> Yes<input value='1' type='radio' name='pos_scrum_half' required> No<input  value='0' type='radio' name='pos_scrum_half' required><br>
			<label>Position Hooker:</label> Yes<input value='1' type='radio' name='pos_hooker' required> No<input  value='0' type='radio' name='pos_hooker' required><br>
			<label>Position Prop:</label> Yes<input  value='1' type='radio' name='pos_prop' required> No<input  value='0' type='radio' name='pos_prop' required><br>
			<label>Position 2nd Row:</label> Yes<input  value='1' type='radio' name='pos_2row' required> No<input  value='0' type='radio' name='pos_2row' required><br>
			<label>Position Back Row:</label> Yes<input  value='1' type='radio' name='pos_back_row' required> No<input value='0' type='radio' name='pos_back_row' required><br>
			<input type='hidden' name='id' value='$id'>
			<input value='Send' type='submit'>
			</fieldset>
			</form>";
	?>
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