<?php
	require_once("includes/db.php");
	session_start();

	if(isset($_SESSION["admin_name"])==""){
		header("Location: index.php");
	}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iCinema Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">iCinema Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Howdy! <?php echo $_SESSION["admin_name"]?> <i class="fa fa-user"></i>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
                    </li>
					<li>
                        <a href="home-page.php"><i class="fa fa-fw fa-desktop"></i> Home Page</a>
                    </li>
					<li>
                        <a href="on-cinema.php"><i class="fa fa-files-o fa-fw"></i> On Cinema</a>
                    </li>
					<li>
                        <a href="premier.php"><i class="fa fa-files-o fa-fw"></i> Premiere</a>
                    </li>
					<li>
                        <a href="coming-soon.php"><i class="fa fa-files-o fa-fw"></i> Coming Soon</a>
                    </li>
					<li>
                        <a href="news.php"><i class="fa fa-files-o fa-fw"></i> News</a>
                    </li>
					<li>
                        <a href="tickets.php"><i class="fa fa-files-o fa-fw"></i> Tickets</a>
                    </li>
					<li>
                        <a href="connect.php"><i class="fa fa-files-o fa-fw"></i> Connect</a>
                    </li>
					
					<li class="active">
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                    </li>
                    <li class="sub-menu">
                        <a href="#"><b>All Users</b></a>
						<a class="sub-menu-option" href="bin.php"><span>Bin</span></a>
                    </li>
					
					<!--
					<li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-files-o fa-fw"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
						<li class="sub-menu">
							<a href="#"><b>All Users</b></a>
							<a class="sub-menu-option" href="bin.php"><span>Bin</span></a>
						</li>
                        </ul>
                    </li>
					-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style="height: 580px">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
						<div>
							<h1 class="page-header">
								Users
							</h1>
							
						</div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-files-o fa-fw"></i> Users
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
							<form action="" method="post" enctype="multipart/form-data">
								<table class="table table-bordered table-hover table-striped">
									<thead>
										<tr>
											<th class="width-16-percent">Username</th>
											<th class="width-16-percent">First Name</th>
											<th class="width-16-percent">Last Name</th>
											<th class="width-16-percent">Email</th>
											<th class="width-16-percent">IP Address</th>
										</tr>
									</thead>
									<tbody>
									<?php
										global $con;	
										
										// DB Query
										$get_users = "SELECT id, username, first_name, last_name, email, ip_address FROM users WHERE user_deleted = 'no' AND user_erased = 'no' ORDER BY username ASC";
										
										// Connect to DB and run the Query 
										$run_get_users = mysqli_query($con, $get_users);
							
										while($catch_user = mysqli_fetch_array($run_get_users)){
											$user_id = $catch_user['id'];
											$username = $catch_user['username'];
											$user_first_name = $catch_user['first_name'];
											$user_last_name = $catch_user['last_name'];
											$user_email = $catch_user['email'];
											$user_ip = $catch_user['ip_address'];
										
									?>
											<tr>
												<td><input type="checkbox" name="remove[]" value="<?php echo $user_id; ?>"/> <b class="user-name"><?php echo $username; ?> </b> </td>
												<td class="width-16-percent"><?php echo $user_first_name; ?></td>
												<td class="width-16-percent"><?php echo $user_last_name; ?></td>
												<td class="width-16-percent"><?php echo $user_email; ?></td>
												<td class="width-16-percent"><?php echo $user_ip; ?></td>
											</tr>
									<?php 
										}
									?>		
									</tbody>
								</table>
								
								<div class="publish-btns">
									<i class="fa fa-fw fa-trash-o"></i><input class="button-transparent text-left" type="submit" name="delete_user" value="Delete" />
								</div>
							</form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- Custom jQuery -->
	<script src="js/main.js"></script>

</body>

</html>
<?php
	// Deletes The Selected Users
	if(isset($_POST['delete_user'])){
		if(!isset($_POST['remove'])){
			echo"<script>alert('Please Select a Username to Delete!')</script>";
			echo"<script>window.open('users.php','_self')</script>";
		}else{
			foreach($_POST['remove'] as $remove_id){
												
				$delete_user = "UPDATE users SET user_deleted='yes' WHERE id='$remove_id'";
												
				$run_delete_user = mysqli_query($con, $delete_user);
												
				if($run_delete_user){
					echo"<script>alert('User(s) Deleted!')</script>";
					echo"<script>window.open('users.php','_self')</script>";
				}
			}
		}
	}
?>