<?php
ob_start();
//above ob_start is needed for fixing header refresh 
//created on 09/05/2016 last rev. 09/05/2016
//This page is displaying list of existing games and an editor form
//its been a test for me if it is possible to php-self the 'edit' button and
//load data onto form without creating the new instance of the web page  
	require_once('php/db.php');
	require_once('php/list.php');
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
    <title>Edit Game Record</title>
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
				<li ><a href="coach_interface.php"><span class="glyphicon glyphicon-home"> Main Page</span></a></li>
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
						<li><a href="player_skills_editor.php"><span class="glyphicon glyphicon-pawn"> Player Skills</a></span></li>
						<li class="active"><a href="edit_game_record.php"><span class="glyphicon glyphicon-blackboard"> Existing Game Record</a></span></li>
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
	
		<div class="col-sm-6">
			<h4>Existing game records:</h4>
			<ol><?php get_game_record_list();?></ol>
		</div>
		<div class="col-sm-6">
	<?php 
		if(isset($_POST['remove']))
		{
			//use this id to indicate which form data is going to be removed
			$id2=$_POST['edit_this'];
			$sql = "DELETE FROM game_record_form WHERE ID=$id2";
			// Connect to DB and run the Query 
			mysqli_query($con, $sql);

			header("refresh:1; url=http://localhost/Prototype v.01/edit_game_record.php");
		}
		if(isset($_POST['edit'])) 
		{
			//use this id to indicate which form data to download
			$id2=$_POST['edit_this'];
			$sql = "SELECT * FROM game_record_form WHERE ID=$id2";
			// Connect to DB and run the Query 
			$result=mysqli_query($con, $sql);

		if($row = mysqli_fetch_assoc($result))
		{
			$form_id=$row['ID'];
			$squad_id = $row['squad_id'];
			$member_ID = $row['member_ID'];
			$op_name = $row['opposition_name'];
			$date = $row['date'];
			$location = $row['location'];
			$result = $row['result'];
			$score = $row['score'];
			$KOTime = $row['KOTime'];
			$SR_1Half_comments = $row['SR_1Half_comments'];
			$SR_2Half_comments = $row['SR_2Half_comments'];
			$Points_For1 = $row['Points_For1'];
			$Points_For2 = $row['Points_For2'];
			$Opp_1Half_comments = $row['Opp_1Half_comments'];
			$Opp_2Half_comments = $row['Opp_2Half_comments'];
			$Points_Against1 = $row['Points_Against1'];
			$Points_Against2 = $row['Points_Against2'];
		}	
		
		
		echo"
		<form action='php/update_game_record.php' method='post'>
			<fieldset>
				<legend>Edit existing record:</legend>
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
					<label for='opposition_name'>Opposition name:</label><br><input class='mytext' type='text' value='$op_name' name='opposition_name'><br>
					<label for='date'>Date:</label><br><input class='mytext' type='date' value='$date' name='date'><br>
					<label for='location'>Location:</label><br><input class='mytext' type='text' value='$location' name='location'><br>";
					
					echo "<label for='coaches'>Coach:</label><br><select name='coaches' required>";
					//get coaches selection list
					$sql2 = "SELECT * FROM member_form WHERE is_coach=1 AND is_active=1";
					// Connect to DB and run the Query 
					$result2=mysqli_query($con, $sql2);
					
					while($row = mysqli_fetch_assoc($result2))
					{
						$member_id3 = $row['member_id'];
						$name = $row['name'];
						$surname = $row['surname'];
						echo"<option value='$member_id3'>$name $surname</option>";
					}
					echo "</select><br>";
					
					if($result==1)
					{
						echo"<label for='result'>Result:</label><br>Win<input type='radio' name='result' value='1' checked> Loss<input type='radio' name='result' value='0'> Draw<input type='radio' name='result' value='2'><br>";
					}
					else if($result==0)
					{
						echo"<label for='result'>Result:</label><br>Win<input type='radio' name='result' value='1'> Loss<input type='radio' name='result' value='0' checked> Draw<input type='radio' name='result' value='2'><br>";
					}
					else if($result==2)
					{
						echo"<label for='result'>Result:</label><br>Win<input type='radio' name='result' value='1'> Loss<input type='radio' name='result' value='0'> Draw<input type='radio' name='result' value='2' checked><br>";
					}
					//default
					else
					{
						echo"<label for='result'>Result:</label><br>Win<input type='radio' name='result' value='1'> Loss<input type='radio' name='result' value='0'> Draw<input type='radio' name='result' value='2' checked><br>";
					}
	
	echo"	
					<label for='score'>End Score:</label><br><input placeholder='00:00 format' type='text' value='$score' name='score' pattern='[0-9]{2}[:][0-9]{2}'><br>
					<label for='KOTime'>K/O Time:</label><br><input type='text' value='$KOTime' name='KOTime'><br>
					<label for='SR_1Half_comments'>Simply Rugby 1st Half Comments:</label><br><textarea for='game_record' wrap='hard' name='SR_1Half_comments' rows='4' cols='50'>$SR_1Half_comments</textarea><br>
					<label for='SR_2Half_comments'>Simply Rugby 2nd Half Comments:</label><br><textarea for='game_record' wrap='hard' name='SR_2Half_comments' rows='4' cols='50'>$SR_2Half_comments</textarea><br>
					<label for='Points_For1'>1st Half Points For:</label><br><input class='mytext' type='number' min='0' value='$Points_For1' name='Points_For1'><br>
					<label for='Points_For2'>2nd Half Points For:</label><br><input class='mytext' type='number' min='0' value='$Points_For2' name='Points_For2'><br>
					<label for='Opp_1Half_comments'>Opposition 1st Half Comments:</label><br><textarea for='game_record' wrap='hard' name='Opp_1Half_comments' rows='4' cols='50'>$Opp_1Half_comments</textarea><br>
					<label for='Opp_2Half_comments'>Opposition 2nd Half Comments:</label><br><textarea for='game_record' wrap='hard' name='Opp_2Half_comments' rows='4' cols='50'>$Opp_2Half_comments</textarea><br>
					<label for='Points_Against1'>1st Half Points Against:</label><br><input class='mytext' type='number' value='$Points_Against1' min='0' name='Points_Against1'><br>
					<label for='Points_Against2'>2nd Half Points Against:</label><br><input class='mytext' type='number' value='$Points_Against2' min='0' name='Points_Against2'><br>
					<input type='hidden' value='$form_id' name='form_id'>						
					<input type='submit' name='update' value='Update'><br>
			<fieldset>
		</form>";
		}
		else
		{
		echo"		
		<form action='' method='post'>
			<fieldset>
				<legend>Edit existing record(please select game first):</legend>
					<label for='opposition_name'>Opposition name:</label><br><input class='mytext' type='text' name='opposition_name'><br>
					<label for='date'>Date(dd-mm-yyyy):</label><br><input class='mytext' type='text' placeholder='dd-mm-yyyy' pattern='[0-9]{2}[:][0-9]{2}[:][0-9]{4}' name='date'><br>
					<label for='location'>Location:</label><br><input class='mytext' type='text' name='location'><br>
					<label for='result'>Result:</label><br>Win<input type='radio' name='result' value='1'> Loss<input type='radio' name='result' value='0'> Draw<input type='radio' name='result' value='2' checked><br>
					<label for='score'>End Score:</label><br><input placeholder='00:00 format' type='text' name='score' pattern='[0-9]{2}[:][0-9]{2}'><br>
					<label for='KOTime'>K/O Time:</label><br><input type='text' name='KOTime'><br>
					<label for='SR_1Half_comments'>Simply Rugby 1st Half Comments:</label><br><textarea for='game_record' wrap='hard' name='SR_1Half_comments' rows='4' cols='50'></textarea><br>
					<label for='SR_2Half_comments'>Simply Rugby 2nd Half Comments:</label><br><textarea for='game_record' wrap='hard' name='SR_2Half_comments' rows='4' cols='50'></textarea><br>
					<label for='Points_For1'>1st Half Points For:</label><br><input class='mytext' type='number' min='0' name='Points_For1'><br>
					<label for='Points_For2'>2nd Half Points For:</label><br><input class='mytext' type='number' min='0' name='Points_For2'><br>
					<label for='Opp_1Half_comments'>Opposition 1st Half Comments:</label><br><textarea for='game_record' wrap='hard' name='Opp_1Half_comments' rows='4' cols='50'></textarea><br>
					<label for='Opp_2Half_comments'>Opposition 2nd Half Comments:</label><br><textarea for='game_record' wrap='hard' name='Opp_2Half_comments' rows='4' cols='50'></textarea><br>
					<label for='Points_Against1'>1st Half Points Against:</label><br><input class='mytext' type='number' min='0' name='Points_Against1'><br>
					<label for='Points_Against2'>2nd Half Points Against:</label><br><input class='mytext' type='number' min='0' name='Points_Against2'><br>				
			<fieldset>
		</form>";
		}
ob_end_flush();?>
		</div>
	
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