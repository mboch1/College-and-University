<?php
ob_start();
//above ob_start is needed for fixing header refresh error
//created on 14/05/2016 last rev. 14/05/2016
//This page is loading existing junior players and allows managing parental consents
//might consider adding season search engine as the number of entries will grow rapidly over time
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
    <title>Consents Form</title>
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
				<li><a href="main_page.php"><span class="glyphicon glyphicon-home"> Main Page</span></a></li>
				<li><a href="message_viewer.php"><span class="glyphicon glyphicon-envelope"> Message Box</a></span></li>
				<li><a href="insurance.php"><span class="glyphicon glyphicon-th-list"> Insurance Manager</a></span></li>
				<li class="active"><a href="consents_form.php"><span class="glyphicon glyphicon-th-list"> Parental Consents</a></span></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"> Form Editor <b class="caret"></b></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Create:</li>
						<li><a href="nmember.php"><span class="glyphicon glyphicon-list-alt"> New Member</span></a></li>
						<li class="divider"></li>
						<li class="dropdown-header">View/Edit:</li>
						<li><a href="exmember.php"><span class="glyphicon glyphicon-list-alt"> Existing Members</span></a></li>
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
		<div class="col-sm-6">
			<legend>Existing Junior Players:</legend>
			<ol><?php get_junior_player_list();?></ol>
		</div>
		
		<div class="col-sm-6">
	<?php 
		if(isset($_POST['edit'])) 
		{
			//use this id to indicate which form data to download
			$id2=$_POST['edit_this'];
			$sql = "SELECT * FROM consents_form WHERE member_ID=$id2";
			// Connect to DB and run the Query 
			$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$player_id2 = $row['member_ID'];
			$season = $row['season'];
			$G1_consent = $row['G1_consent'];
			$G2_consent = $row['G2_consent'];
			$form_id=$row['ID'];
			
		echo"
		<form action='php/update_consents_form.php' method='post'>
			<fieldset>
				<legend>Player ID: $player_id2 - Edit existing record form:</legend>";
				
				if($G1_consent==1)
				{
					echo"Guardian 1 consent: Yes <input type='radio' name='g1_con' value='1' required checked> No<input type='radio' name='g1_con' value='0'><br>";
				}
				else
				{
					echo"Guardian 1 consent: Yes <input type='radio' name='g1_con' value='1' required > No<input type='radio' name='g1_con' value='0' checked><br>";
				}
				if($G2_consent==1)
				{
					echo"Guardian 2 consent: Yes <input type='radio' name='g2_con' value='1' required checked> No<input type='radio' name='g2_con' value='0'><br>";
				}
				else
				{
					echo"Guardian 2 consent: Yes <input type='radio' name='g2_con' value='1' required> No<input type='radio' name='g2_con' value='0' checked><br>";
				}
				echo"
					<label for='season'>Season:</label><br><input placeholder='yyyy/yyyy format' type='text' value='$season' name='season' pattern='[0-9]{4}[/][0-9]{4}'><br>
					<input type='hidden' value='$form_id' name='form_id'>
					<input type='submit' name='update' value='Update'> Update parental consents <br>
					<input type='submit' name='remove' value='Remove'> (Warning this is irreversible!)<br>
			<fieldset>
		</form>";
		}
		}
		else
		{
		echo"		
		<form action='php/send_consents.php' method='post'>
			<fieldset>
				<legend>Add new record(select player ID):</legend>
				<label for='juniors'>Junior player ID:</label><br>
					<select name='juniors' required>";
					
					//get junior players ID
					$sql3 = "SELECT * FROM member_form WHERE is_junior=1 AND is_active=1";
					// Connect to DB and run the Query 
					$result3=mysqli_query($con, $sql3);
					
					while($row2 = mysqli_fetch_assoc($result3))
					{
						$junior_id2 = $row2['member_id'];

						echo"<option value='$junior_id2'>$junior_id2</option>";
					}
				echo"		
					</select><br>
					Guardian 1 consent: Yes <input type='radio' name='G1_consent' value='1' required> No <input type='radio' name='G1_consent' value='0'><br>
					Guardian 2 consent: Yes <input type='radio' name='G2_consent' value='1' required> No <input type='radio' name='G2_consent' value='0'><br>
					<label for='season'>Season:</label><br><input placeholder='yyyy/yyyy format' type='text' name='season' pattern='[0-9]{4}[/][0-9]{4}' required><br>				
					<input type='submit' value='submit'><br>
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