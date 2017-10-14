<?php
ob_start();
//above ob_start is needed for fixing header refresh error
//created on 11/05/2016 last rev. 11/05/2016
//This page allows to edit senior player member personal data form
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
    <title>Edit senior player form</title>
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
						<li><a href="player_skills_editor.php"><span class="glyphicon glyphicon-pawn"> Player Skills</a></span></li>
						<li><a href="edit_game_record.php"><span class="glyphicon glyphicon-blackboard"> Existing Game Record</a></span></li>
						<li><a href="edit_training_record.php"><span class="glyphicon glyphicon-bullhorn"> Existing Training Record</a></span></li>
						<li><a href="edit_junior.php"><span class="glyphicon glyphicon-knight"> Existing Junior Player Form</a></span></li>
						<li class="active"><a href="edit_senior.php"><span class="glyphicon glyphicon-king"> Existing Senior Player Form</a></span></li>
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
			<legend>Existing Senior Players:</legend>
			<ol><?php get_senior_player_list2();?></ol>
		</div>
		
		<div class="col-sm-6">
<?php 
		if(isset($_POST['remove']))
		{
			//use this id to indicate which form data is going to be removed
			$id2=$_POST['edit_this'];
			$sql = "DELETE FROM junior_player_member_form WHERE member_ID=$id2";
			// Connect to DB and run the Query 
			mysqli_query($con, $sql);

			header("refresh:1; url=http://localhost/Prototype v.01/edit_senior.php");
		}
		if(isset($_POST['edit'])) 
		{
			//use this id to indicate which form data to download
			$id2=$_POST['edit_this'];
			$sql = "SELECT * FROM senior_player_member_form WHERE member_ID=$id2";
			// Connect to DB and run the Query 
			$result=mysqli_query($con, $sql);

		if($row = mysqli_fetch_assoc($result))
		{
			$ID = $row['ID'];
			$member_ID = $row['member_ID'];
			$Next_of_kin_name = $row['Next_of_kin_name'];
			$Next_of_kin_tel = $row['Next_of_kin_tel'];
			$doc_name = $row['Doctor_name'];
			$doc_tel = $row['Doctor_tel'];
			$health = $row['health_issues'];
		}	

	echo"
		<form action='php/update_senior_form.php' name='senior_player' method='post'>
			<fieldset>
				<legend>Update senior member record:</legend>
				<h4>All fields are required!</h4>";
					
					//get junior players name and surname
					$sql3 = "SELECT * FROM member_form WHERE member_id=$member_ID";
					// Connect to DB and run the Query 
					$result3=mysqli_query($con, $sql3);
					while($row2 = mysqli_fetch_assoc($result3))
					{
						$junior_id2 = $row2['member_id'];
						$name=$row2['name'];
						$surname=$row2['surname'];
						echo"<h4>This is $name $surname form</h4><br>";
					}	

					echo"
					<label for='kin_name'>Next of kin full name:</label><br><input class='mytext' value='$Next_of_kin_name' type='text' placeholder='example: John Doe' name='Next_of_kin_name' required><br>
					<label for='kin_tel'>Next of kin contact number:</label><br><input placeholder='0123456789' value='$Next_of_kin_tel' type='numbers' min='0' name='Next_of_kin_tel' required><br>
					<legend>Medical data:</legend>
					<label for='doc_name'>Doctors full name:</label><br><input class='mytext' value='$doc_name' type='text' placeholder='Name and Surname' name='doc_name' required><br>
					<label for='doc_tel'>Doctors telephone:</label><br><input class='mytext' value='$doc_tel' type='text' placeholder='Contact number' name='doc_tel' required><br>
					<label for='health'>Health issues:</label><br><textarea for='senior_player' wrap='hard' name='health' rows='4' cols='50' required>$health</textarea><br>
					<input type='hidden' value='$ID' name='ID'>
					<input type='submit' name='update' value='Update'><br>
					</fieldset>
					</form>";
	}
	else
	{
		echo"
			<form action='' name='senior_player' method='post'>
				<fieldset>
				<legend>Select senior member record first.</legend>
					<label for='G1_name'>Next of kin full name:</label><br><input class='mytext' type='text' placeholder='example: John Doe' name='G1_name'><br>
					<label for='G1_tel'>Next of kin contact number:</label><br><input placeholder='0123456789' type='numbers' name='G1_tel' ><br>
					<legend>Medical data:</legend>
					<label for='Doctor_name'>Doctors full name:</label><br><input class='mytext' type='text' placeholder='Name and Surname' name='doc_name' ><br>
					<label for='Doctor_tel'>Doctors telephone:</label><br><input class='mytext' type='text' placeholder='Contact number' name='doc_tel' ><br>
					<label for='health'>Health issues:</label><br><textarea for='junior_player' wrap='hard' name='health' rows='4' cols='50' >None</textarea><br>
				<fieldset>
			</form>";	
	}
ob_end_flush();?>
		</div>
	</div>
</div>
  
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