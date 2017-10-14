<?php
//created on 01/05/2016 last rev. 06/05/2016
//this script edits existing member data and sends it to update script, also allows the admin to change the password
	include ('php/db.php');
	session_start();
	global $con;
	
	$id = $_POST['id'];
	$member_id = $id;
	$sql = "SELECT * FROM member_form WHERE member_id=$member_id";
		
	// Connect to DB and run the Query 
	$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$member_id2 = $row['member_id'];
			$name = $row['name'];
			$surname = $row['surname'];
			$name = $row['name'];
			$surname = $row['surname'];
			$DOB = $row['DOB'];
			$SRU_number = $row['SRU_number'];	
			$address_street =$row['address_street'];	
			$address_post = $row['address_post'];	
			$address_city = $row['address_city'];	
			$email =$row['email'];
			$tel_number = $row['tel_number'];
			$mob_number = $row['mob_number'];
			$login = $row['login'];
			$password =$row['password'];
			$is_active =$row['is_active'];
			$is_admin = $row['is_admin'];
			$is_coach = $row['is_coach'];
			$is_junior =$row['is_junior'];
			$salt =$row['salt'];
		}
?>	
	
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Existing Member Form Editor</title>
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
						<li><a href="nmember.php"><span class="glyphicon glyphicon-list-alt"> New Member</span></a></li>
						<li class="divider"></li>
						<li class="dropdown-header">View/Edit:</li>
						<li class="active"><a href="exmember.php"><span class="glyphicon glyphicon-list-alt"> Existing Members</span></a></li>
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

		<form action="php/send_update_member.php" method="post">
			<fieldset>
				<legend>Personal information: (all fields are required)</legend>
				<label for="name">Name(s):</label><br>
				<?php echo "<input class='mytext' data-toggle='tooltip' value='$name' placeholder='Name format 'Abcde'' type='text' name='name' pattern='[A-Z]{1}[a-z]{0,}' required><br>";?>
				<label for="surname">Surname:</label><br>
				<?php echo "<input class='mytext' data-toggle='tooltip' value='$surname' placeholder='Surname format 'Abcde'' type='text' name='surname' pattern='[A-Z]{1}[a-z]{0,}' required><br>";?>
				<label for="DOB">Date of birth:</label><br>
				<?php echo "<input class='mytext' type='date' value='$DOB' name='DOB' required><br>";?>				
				<label for="SRU_number">SRU Number:</label><br>
				<?php echo "<input class='mytext' value='$SRU_number' placeholder='Numbers only.' type='number' min='0' name='SRU_number' pattern='[0-9]*' inputmode='numeric'><br>";?>
				<label for="address_street">Address (Street, nr):</label><br>
				<?php echo "<input class='mytext' value='$address_street' placeholder='Example: 1 Castle Street' type='text' name='address_street' required><br>";?>
				<label for="address_post">Address (Post Code):</label><br>
				<?php echo "<input class='mytext' value='$address_post' placeholder='Example: EH12AB' type='text' name='address_post' required><br>";?>
				<label for="address_city">Address (City):</label><br>
				<?php echo "<input class='mytext' value='$address_city' placeholder='Example: Edinburgh' type='text' name='address_city' required><br>";?>
				<label for="email">Email:</label><br>
				<?php echo "<input class='mytext' value='$email' placeholder='Example: mail@email.com' type='email' name='email' required><br>";?>
				<label for="tel_number">Home number:</label><br>
				<?php echo "<input class='mytext' value='$tel_number' placeholder='Numbers only, no spaces' type='text' pattern='[0-9]*' name='tel_number' required><br>";?>
				<label for="mob_number">Mobile number:</label><br>
				<?php echo "<input class='mytext' value='$mob_number' placeholder='Numbers only, no spaces' type='text' pattern='[0-9]*' name='mob_number' required><br>";?>

				<fieldset>
					<legend>Account settings: (all fields are required)</legend>	
					Is an admin account:<br>
					<?php
					if($is_admin==1)
					{
					echo "<input type='radio' name='admin' value='1' required checked='checked'> Yes<br>";
					echo "<input type='radio' name='admin' value='0' required> No<br>";
					}
					else
					{
					echo "<input type='radio' name='admin' value='1' required> Yes<br>";
					echo "<input type='radio' name='admin' value='0' required checked='checked'> No<br>";
					}
					if($is_coach==1)
					{
					echo "Is a coach account:<br>";
					echo "<input type='radio' name='coach' value='1' required checked='checked'> Yes<br>";
					echo "<input type='radio' name='coach' value='0' required> No<br>";
					}
					else
					{
					echo "Is a coach account:<br>";
					echo "<input type='radio' name='coach' value='1' required> Yes<br>";
					echo "<input type='radio' name='coach' value='0' required checked='checked'> No<br>";
					}
					if($is_active==1)					
					{
					echo "Is an active account:<br>";
					echo "<input type='radio' name='active' value='1' checked='checked' required> Yes<br>";
					echo "<input type='radio' name='active' value='0' required> No<br>";
					}
					else
					{
					echo "Is an active account:<br>";
					echo "<input type='radio' name='active' value='1' required> Yes<br>";
					echo "<input type='radio' name='active' value='0' checked required> No<br>";				
					}
					if($is_junior==1)
					{
					echo "Is a junior player member account:<br>";
					echo "<input type='radio' name='junior' value='1' checked required> Yes<br>";
					echo "<input type='radio' name='junior' value='0' required> No<br>";
					}	
					else
					{
					echo "Is a junior player member account:<br>";
					echo "<input type='radio' name='junior' value='1' required> Yes<br>";
					echo "<input type='radio' name='junior' value='0' checked required> No<br>";
					}						
					//store member ID, PASSWORD and SALT here:
					echo "<input class='mytext' value='$member_id2' type='number' name='member_id2' hidden><br>";
					?>
					<h4>Send updated data</h4>
					<input type="submit" name="UpdateData" value="Update Data"><br><br>
					Login(view only):<br>
					<?php echo "<input class='mytext' value='$login' placeholder='login' type='text' name='login' readonly><br>";?>	
					Type new password here:<br>
					<?php echo "<input class='mytext' value='$password' placeholder='password' type='text' name='password'><br>";?>	
					Salt(view only):<br>
					<?php echo "<input class='mytext' value='$salt'  type='text' name='salt' readonly><br><br>";?>	
					<input type="submit" name="ChangePassword" value="Change Password"><br><br>
					<h4>Remove account (WARNING THIS IS IRREVERSIBLE)</h4>
					<input type="submit" name="DeleteAccount" value="Delete Account"><br>
				</fieldset>
				
			</fieldset>
		</form>
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