<?php
//created on 08/05/2016 last rev. 08/05/2016
//This page edits selected player profile and skills
	require_once('php/db.php');
	include('php/list.php');
	session_start();

if(isset($_POST['edit']))
{	
	$id = $_POST['id'];
	$name =$_POST['name'];
	$surname=$_POST['surname'];
}
	$sql = "SELECT * FROM player_profile_form WHERE member_ID=$id";
		
	// Connect to DB and run the Query 
	$result=mysqli_query($con, $sql);
	
	if($result)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$squad_id = $row['squad_ID'];
			
			if($squad_id=="")
			{
				echo "error!";
			}
			
			$passing_standard = $row['passing_standard'];
			$passing_spin = $row['passing_spin'];
			$passing_pop = $row['passing_pop'];
			$passing_comments = $row['passing_comments'];
			$tackling_front = $row['tackling_front'];
			$tackling_rear = $row['tackling_rear'];	
			$tackling_side =$row['tackling_side'];	
			$tackling_scrabble = $row['tackling_scrabble'];	
			$tackling_comments = $row['tackling_comments'];	
			$kicking_drop =$row['kicking_drop'];
			$kicking_punt = $row['kicking_punt'];
			$kicking_grubber = $row['kicking_grubber'];
			$kicking_goal = $row['kicking_goal'];
			$kicking_comments =$row['kicking_comments'];
			$pos_full_back=$row['pos_full_back'];
			$pos_wing =$row['pos_wing'];
			$pos_centre = $row['pos_centre'];
			$pos_fly_half = $row['pos_fly_half'];
			$pos_scrum_half =$row['pos_scrum_half'];
			$pos_hooker = $row['pos_hooker'];
			$pos_prop = $row['pos_prop'];
			$pos_2row =$row['pos_2row'];
			$pos_back_row =$row['pos_back_row'];
		}
	}		
	
?>	
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit Player Skills Form</title>
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
			echo "<form id='skills' action='php/update_player_skills.php' method='post'>
			<fieldset>
			<legend>Edit Player $name $surname skills here: </legend>
			<h4>All fields must not be empty (except for the comments section)</h4><br>
			<h4>Skill values are between 1-5 (1 bad, 5 best)</h4><br>
			<label>Squad ID(use existing squad ID only!):</label><br> <input class='mytext' value='$squad_id' type='number' min='1' name='squad_ID' required><br>
			<label>Passing Standard:</label><br> <input class='mytext' value='$passing_standard' type='number' min='1' max='5' name='passing_standard' required><br>
			<label>Passing Spin:</label><br> <input class='mytext' value='$passing_spin' type='number' min='1' max='5' name='passing_spin' required><br>
			<label>Passing Pop:</label><br> <input class='mytext' value='$passing_pop' type='number' min='1' max='5' name='passing_pop' required><br>
			<label>Passing Comments:</label><br> <textarea rows='6' cols='35' form='skills' name='passing_comments' wrap='hard' placeholder='Passing Commentary' required>$passing_comments</textarea><br>
			<label>Tackling Front:</label><br> <input class='mytext' value='$tackling_front' type='number' min='1' max='5' name='tackling_front' required><br>
			<label>Tackling Rear:</label><br> <input class='mytext' value='$tackling_rear' type='number' min='1' max='5' name='tackling_rear' required><br>
			<label>Tackling Side:</label><br> <input class='mytext' value='$tackling_side' type='number' min='1' max='5' name='tackling_side' required><br>
			<label>Tackling Scrabble:</label><br> <input class='mytext' value='$tackling_scrabble' type='number' min='1' max='5' name='tackling_scrabble' required><br>
			<label>Tackling Comments:</label><br> <textarea rows='6' cols='35' form='skills' name='tackling_comments' wrap='hard' placeholder='Tackling Commentary' required>$tackling_comments</textarea><br>
			<label>Kicking Drop:</label><br> <input class='mytext' value='$kicking_drop' type='number' min='1' max='5' name='kicking_drop' required><br>
			<label>Kicking Punt:</label><br> <input class='mytext' value='$kicking_punt' type='number' min='1' max='5' name='kicking_punt' required><br>
			<label>Kicking Grabber:</label><br> <input class='mytext' value='$kicking_grubber' type='number' min='1' max='5' name='kicking_grubber' required><br>
			<label>Kicking Goal:</label><br>  <input class='mytext' value='$kicking_goal' type='number' min='1' max='5' name='kicking_goal' required><br>
			<label>Kicking Comments:</label><br>  <textarea rows='6' cols='35' form='skills' name='kicking_comments' wrap='hard' placeholder='Kicking Commentary' required>$kicking_comments</textarea><br>
			";
			if($pos_full_back==1)
			{
				echo"<label>Position Full Back:</label> Yes<input value='1' type='radio' name='pos_full_back' checked required> No<input value='0' type='radio' name='pos_full_back' required><br> ";
			}
			else
			{
				echo"<label>Position Full Back:</label> Yes<input value='1' type='radio' name='pos_full_back' required> No<input value='0' type='radio' name='pos_full_back' checked required><br> ";
			}
			if($pos_wing==1)
			{
				echo"<label>Position Wing:</label> Yes<input value='1' type='radio' name='pos_wing' checked required> No<input value='0' type='radio' name='pos_wing' required><br>";
			}
			else
			{
				echo"<label>Position Wing:</label> Yes<input value='1' type='radio' name='pos_wing' required> No<input value='0' type='radio' name='pos_wing' checked required><br>";
			}
			if($pos_centre==1)
			{
				echo"<label>Position Centre:</label> Yes<input value='1' type='radio' name='pos_centre' checked required> No<input value='0' type='radio' name='pos_centre' required><br>";
			}
			else
			{
				echo"<label>Position Centre:</label> Yes<input value='1' type='radio' name='pos_centre'  required> No<input value='0' type='radio' name='pos_centre' checked required><br>";
			}
			if($pos_fly_half==1)
			{
				echo"<label>Position Fly Half:</label> Yes<input value='1' type='radio' name='pos_fly_half' checked required> No<input value='0' type='radio' name='pos_fly_half' required><br>";
			}
			else
			{
				echo"<label>Position Fly Half:</label> Yes<input value='1' type='radio' name='pos_fly_half' required> No<input value='0' type='radio' name='pos_fly_half' checked required><br>";
			}
			if($pos_scrum_half==1)
			{
				echo"<label>Position Scrum Half:</label> Yes<input value='1' type='radio' name='pos_scrum_half' checked required> No<input value='0' type='radio' name='pos_scrum_half' required><br>";
			}
			else
			{
				echo"<label>Position Scrum Half:</label> Yes<input value='1' type='radio' name='pos_scrum_half' required> No<input value='0' type='radio' name='pos_scrum_half' checked required><br>";
			}
			if($pos_hooker==1)
			{
				echo"<label>Position Hooker:</label> Yes<input value='1' type='radio' name='pos_hooker' checked required> No<input value='0' type='radio' name='pos_hooker' required><br>";
			}
			else
			{
				echo"<label>Position Hooker:</label> Yes<input value='1' type='radio' name='pos_hooker' required> No<input value='0' type='radio' name='pos_hooker' checked required><br>";
			}			
			if($pos_prop==1)
			{
				echo"<label>Position Prop:</label> Yes<input value='1' type='radio' name='pos_prop' checked required> No<input value='0' type='radio' name='pos_prop' required><br>";
			}
			else
			{
				echo"<label>Position Prop:</label> Yes<input value='1' type='radio' name='pos_prop' required> No<input value='0' type='radio' name='pos_prop' checked required><br>";
			}
			if($pos_2row==1)
			{
				echo"<label>Position 2nd Row:</label> Yes<input value='1' type='radio' name='pos_2row' checked required> No<input value='0' type='radio' name='pos_2row' required><br>";
			}
			else
			{
				echo"<label>Position 2nd Row:</label> Yes<input value='1' type='radio' name='pos_2row' required> No<input value='0' type='radio' name='pos_2row' checked required><br>";
			}
			if($pos_back_row==1)
			{
				echo"<label>Position Back Row:</label> Yes<input value='1' type='radio' name='pos_back_row' checked required> No<input value='0' type='radio' name='pos_back_row' required><br>";
			}
			else
			{
				echo"<label>Position Back Row:</label> Yes<input value='1' type='radio' name='pos_back_row' required> No<input value='0' type='radio' name='pos_back_row' checked required><br>";
			}					
			echo"<input value='$id' name='member_id' type='hidden'><input value='$name' name='name' type='hidden'>
				<br>Finish and update skills:<br><input value='$surname' name='surname' type='hidden'><input value='UpdateSkills' name='UpdateSkills' type='Submit'><br>
				<br>Warning this operation is irreversible!:<br><input value='DeleteSkills' name='DeleteSkills' type='Submit'>";
			echo"</fieldset>";
			echo"</form>";
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