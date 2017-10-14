<?php
//created on 01/05/2016 last rev. 06/05/2016
//This form is adding new basic member account to the club database and allows to set further priviliges
	require_once('php/db.php');
	session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create New Member Form</title>
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
				<li><a href="consents_form.php"><span class="glyphicon glyphicon-th-list"> Parental Consents</a></span></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"> Form Editor <b class="caret"></b></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Create:</li>
						<li class="active"><a href="nmember.php"><span class="glyphicon glyphicon-list-alt"> New Member</span></a></li>
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
		<form action="php/send_newmember.php" method="post">
			<fieldset>
				<legend>Personal information: (all fields are required)</legend>
				<label for="name">Name(s):</label><br>
				<input class="mytext" data-toggle="tooltip" title="example: 'Abcde'" placeholder="Name format 'Abcde'" type="text" name="name" pattern="[A-Z]{1}" required><br>
				<label for="surname">Surname:</label><br>
				<input class="mytext" data-toggle="tooltip" title="example: 'Abcde'" placeholder="Surname format 'Abcde'" type="text" name="surname" pattern="[A-Z]{1}" required><br>
				<label for="DOB">Date of birth:</label><br>
				<input class="mytext" type="date" name="DOB" required><br>				
				<label for="SRU_number">SRU Number:</label><br>
				<input class="mytext" placeholder="Numbers only." type="number" min="0" name="SRU_number" pattern="[0-9]*" inputmode="numeric"><br>
				<label for="address_street">Address (Street, nr):</label><br>
				<input class="mytext" placeholder="Example: 1 Castle Street" type="text" name="address_street" required><br>
				<label for="address_post">Address (Post Code):</label><br>
				<input class="mytext" placeholder="Example: EH12AB" type="text" name="address_post" required><br>
				<label for="address_city">Address (City):</label><br>
				<input class="mytext" placeholder="Example: Edinburgh" type="text" name="address_city" required><br>
				<label for="email">Email:</label><br>
				<input class="mytext" placeholder="Example: mail@email.com" type="email" name="email" required><br>	
				<label for="tel_number">Home number:</label><br>
				<input class="mytext" placeholder="Numbers only, no spaces" type="text" pattern="[0-9]*" name="tel_number" required><br>	
				<label for="mob_number">Mobile number:</label><br>
				<input class="mytext" placeholder="Numbers only, no spaces" type="text" pattern="[0-9]*" name="mob_number" required><br>	

				<fieldset>
					<legend>Account settings: (all fields are required)</legend>
					<h4>Choosing more than 1 account type will cause an error!</h4>
					<label for="login">Login:</label><br>
					<input class="mytext" placeholder="login" type="text" name="login"><br>	
					<label for="password">Password:</label><br>
					<input class="mytext" placeholder="password" type="text" name="password"><br>	
					<label for="admin">Is an admin account:</label><br>
					<input type="radio" name="admin" value="1" required> Yes<br>
					<input type="radio" name="admin" value="0" required> No<br>
					<label for="coach">Is a coach account:</label><br>
					<input type="radio" name="coach" value="1" required> Yes<br>
					<input type="radio" name="coach" value="0" required> No<br>	
					<label for="junior">Is a junior player member account:</label><br>
					<input type="radio" name="junior" value="1" required> Yes<br>
					<input type="radio" name="junior" value="0" required> No<br>
					<label for="player">Is a senior player member account:</label><br>
					<input type="radio" name="player" required> Yes<br>
					<input type="radio" name="player" required> No<br>
					<label for="active">Is an active account:</label>
					<h5>Leave "yes" to make the account active.</h5>
					<input type="radio" name="active" value="1" checked required> Yes<br>
					<input type="radio" name="active" value="0" required> No<br>		
					<input type="submit" value="Submit">
				</fieldset>
			</fieldset>
		</form>	
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