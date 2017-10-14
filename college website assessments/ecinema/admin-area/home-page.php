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

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
	<script>
	tinymce.init({
    selector: "textarea.tinymce",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
	
	</script>
</head>

<body>
<?php
	global $con;
									
	$page_id = 1;
	
	//Check if home tabe is empty
	$check_empty_table = "SELECT count(id) AS total FROM home LIMIT 1";
	
	$result = mysqli_query($con, $check_empty_table);
	
	$total = $result->fetch_object()->total;
	
	if($total == 0){
		$first_query = "INSERT INTO home (id, carousel_image_one, carousel_image_two, carousel_image_three, panel_one_section_one_image, panel_one_section_one_title, panel_one_section_one_desc, panel_one_section_two_image, panel_one_section_two_title, panel_one_section_two_desc, panel_one_section_three_image, panel_one_section_three_title, panel_one_section_three_desc) VALUES ('1', 'None.', 'None.', 'None.', 'None.', 'None.', 'None.', 'None.', 'None.', 'None.', 'None.', 'None.', 'None.')";
		
		$insert_first_query = mysqli_query($con, $first_query);
		
		if($insert_first_query){
			mysqli_close($con);
			echo"<script>alert('HomePage Ready!')</script>";
			echo"<script>window.open('home-page.php', '_self')</script>";
		}
	}
											
	// DB Query
	$get_page_data = "SELECT id, carousel_image_one, carousel_image_two, carousel_image_three, panel_one_section_one_image, panel_one_section_one_title, panel_one_section_one_desc, panel_one_section_two_image, panel_one_section_two_title, panel_one_section_two_desc, panel_one_section_three_image, panel_one_section_three_title, panel_one_section_three_desc FROM home WHERE id = $page_id";
											
	// Connect to DB and run the Query 
	$run_get_page_data = mysqli_query($con, $get_page_data);
											
	while($catch_data = mysqli_fetch_array($run_get_page_data)){
		$id = $catch_data['id'];
		$carousel_image_one_read = $catch_data['carousel_image_one'];
		$carousel_image_two_read = $catch_data['carousel_image_two'];
		$carousel_image_three_read = $catch_data['carousel_image_three'];
		$panel_one_section_one_image_read = $catch_data['panel_one_section_one_image'];
		$panel_one_section_one_title_read = $catch_data['panel_one_section_one_title'];
		$panel_one_section_one_desc_read = $catch_data['panel_one_section_one_desc'];
		$panel_one_section_two_image_read = $catch_data['panel_one_section_two_image'];
		$panel_one_section_two_title_read = $catch_data['panel_one_section_two_title'];
		$panel_one_section_two_desc_read = $catch_data['panel_one_section_two_desc'];
		$panel_one_section_three_image_read = $catch_data['panel_one_section_three_image'];
		$panel_one_section_three_title_read = $catch_data['panel_one_section_three_title'];
		$panel_one_section_three_desc_read = $catch_data['panel_one_section_three_desc'];
	}
?>
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
					<li class="active">
                        <a href="#"><i class="fa fa-fw fa-desktop"></i> Home Page</a>
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
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-files-o fa-fw"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="users.php"> All Users </a>
                            </li>
                            <li>
                                <a href="bin.php"> Bin </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
						<div>
							<h1 class="page-header">
								Home Page
							</h1>
						</div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-files-o fa-fw"></i> Home Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
				
					<form action="" method="post" enctype="multipart/form-data">
						<table>
							<div class="col-lg-8">
								<!--<form id="init-title" onSubmit="javascript:return false">-->
								
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title" style="font-size: 14px;"><b>Carousel Section</b></h3>
										</div>
										<p class="help-block" style="margin-top: 10px; margin-bottom: 0px; font-weight: bold;">Slide 1</p>
										<div id="upload" class="panel-body">
											<input type="file" class="custom-file-input" name="carousel_image_one" value="<?php echo $carousel_image_one_read; ?>" />																			
										</div>
										<p class="help-block" style="margin-top: -5px; margin-bottom: 10px;">Slide: <?php echo $carousel_image_one_read; ?></p>
										<p class="help-block" style="margin-top: -5px; margin-bottom: 10px;">Recommended Image Size: 1920x1080.</p>
										
										<p class="help-block" style="margin-top: 10px; margin-bottom: 0px; font-weight: bold;">Slide 2</p>
										<div id="upload" class="panel-body">
											<input type="file" class="custom-file-input" name="carousel_image_two" value="<?php echo $carousel_image_two_read; ?>" />																			
										</div>
										<p class="help-block" style="margin-top: -5px; margin-bottom: 10px;">Slide: <?php echo $carousel_image_two_read; ?></p>
										<p class="help-block" style="margin-top: -5px; margin-bottom: 10px;">Recommended Image Size: 1920x1080.</p>
										
										<p class="help-block" style="margin-top: 10px; margin-bottom: 0px; font-weight: bold;">Slide 3</p>
										<div id="upload" class="panel-body">
											<input type="file" class="custom-file-input" name="carousel_image_three" value="<?php echo $carousel_image_three_read; ?>" />																			
										</div>
										<p class="help-block" style="margin-top: -5px; margin-bottom: 10px;">Slide: <?php echo $carousel_image_three_read; ?></p>
										<p class="help-block" style="margin-top: -5px; margin-bottom: 10px;">Recommended Image Size: 1920x1080.</p>
									</div>
								
								</br>

									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title" style="font-size: 14px;"><b>Panel One Section</b></h3>
										</div>
										<p class="help-block" style="margin-top: 10px; margin-bottom: 0px; font-weight: bold;">Section 1</p>
										<p class="help-block" style="margin-top: 15px; margin-bottom: 0px;">Old Image: <?php echo $panel_one_section_one_image_read; ?></p>
										<div id="upload" class="panel-body">
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: bold;">New Image:</p>
											<input type="file" class="custom-file-input" name="panel_one_section_one_image" value="<?php echo $panel_one_section_one_image_read; ?>" />																			
										</div>
										<p class="help-block" style="margin-top: -5px; margin-bottom: 10px;">Recommended Image Size: 1920x1080.</p>
										
										<div class="form-group">
											<p class="help-block" style="margin-top: 20px; margin-bottom: 15px; margin-left: 15px;">Old Title: <?php echo $panel_one_section_one_title_read; ?></p>
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 15px; font-weight: bold;">New Title:</p>
											<input class="title-form-control page-header-new-header" type="text" name="panel_one_section_one_title" placeholder="Enter title here"/>
										</div>
										
										<div class="panel-body">
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 0px;">Old Description:</p>
											<textarea id="section-one-description-reading" class="form-control" rows="5" maxlength="500" ><?php echo $panel_one_section_one_desc_read; ?></textarea>
											</br>
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: bold;">New Description:</p>
											<textarea id="section-one-description" class="form-control" name="panel_one_section_one_desc" rows="5" maxlength="500" ></textarea>
										</div>
										<p id="panel_one_section_one_desc_textarea" class="help-block" style="margin-top: -5px; margin-bottom: 10px;"></p>										
										
										</br>

										<p class="help-block" style="margin-top: 10px; margin-bottom: 0px; font-weight: bold;">Section 2</p>
										<p class="help-block" style="margin-top: 15px; margin-bottom: 0px;">Old Image: <?php echo $panel_one_section_two_image_read; ?></p>
										<div id="upload" class="panel-body">
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: bold;">New Image:</p>
											<input type="file" class="custom-file-input" name="panel_one_section_two_image" value="<?php echo $panel_one_section_two_image_read; ?>" />																			
										</div>
										<p class="help-block" style="margin-top: -5px; margin-bottom: 10px;">Recommended Image Size: 1920x1080.</p>

										<div class="form-group">
											<p class="help-block" style="margin-top: 20px; margin-bottom: 15px; margin-left: 15px;">Old Title: <?php echo $panel_one_section_two_title_read; ?></p>
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 15px; font-weight: bold;">New Title:</p>
											<input class="title-form-control page-header-new-header" type="text" name="panel_one_section_two_title" placeholder="Enter title here"/>
										</div>
										
										<div class="panel-body">
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 0px;">Old Description:</p>
											<textarea id="section-two-description-reading" class="form-control" rows="5" maxlength="500" ><?php echo $panel_one_section_two_desc_read; ?></textarea>
											</br>
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: bold;">New Description:</p>
											<textarea id="section-two-description" class="form-control" name="panel_one_section_two_desc" rows="5" maxlength="500" ></textarea>
										</div>
										<p id="panel_one_section_two_desc_textarea" class="help-block" style="margin-top: -5px; margin-bottom: 10px;"></p>										
										
										</br>

										<p class="help-block" style="margin-top: 10px; margin-bottom: 0px; font-weight: bold;">Section 3</p>
										<p class="help-block" style="margin-top: 15px; margin-bottom: 0px;">Old Image: <?php echo $panel_one_section_three_image_read; ?></p>
										<div id="upload" class="panel-body">
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: bold;">New Image:</p>
											<input type="file" class="custom-file-input" name="panel_one_section_three_image" value="<?php echo $panel_one_section_three_image_read; ?>" />																			
										</div>
										<p class="help-block" style="margin-top: -5px; margin-bottom: 10px;">Recommended Image Size: 1920x1080.</p>
										
										<div class="form-group">
											<p class="help-block" style="margin-top: 20px; margin-bottom: 15px; margin-left: 15px;">Old Title: <?php echo $panel_one_section_three_title_read; ?></p>
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 15px; font-weight: bold;">New Title:</p>
											<input class="title-form-control page-header-new-header" type="text" name="panel_one_section_three_title" placeholder="Enter title here"/>
										</div>
										
										<div class="panel-body">
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 0px;">Old Description:</p>
											<textarea id="section-three-description-reading" class="form-control" rows="5" maxlength="500" ><?php echo $panel_one_section_three_desc_read; ?></textarea>
											</br>
											<p class="help-block" style="margin-top: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: bold;">New Description:</p>
											<textarea id="section-three-description" class="form-control" name="panel_one_section_three_desc" rows="5" maxlength="500" ></textarea>
										</div>
										<p id="panel_one_section_three_desc_textarea" class="help-block" style="margin-top: -5px; margin-bottom: 10px;"></p>										
										
										</br>										
									</div>
									
								</br>

								   <div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title" style="font-size: 14px;"><b>Panel Two Section</b></h3>
										</div>
										<div class="panel-body">
											<!--
											<textarea id="panel_two_section_textarea" class="form-control tinymce" name="panel_two_section_textarea" rows="10"></textarea>
											-->
										</div>
										<p id="panel_two_section_one_desc_textarea" class="help-block" style="margin-top: -5px; margin-bottom: 10px;"></p>
									</div>
									
								</br>
							</div>
					
							<div class="col-lg-4">
								
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title"><i class="fa fa-globe fa-fw"></i> Publish</h3>
										</div>
										<div class="panel-body">
											<div class="list-group-item publish-btns">
												<i class="fa fa-fw fa-file"></i> Status: <b>Published</b>
											</div>
											</br>
											<div class="publish-btns">
												<button type="submit" class="btn btn-primary push-right" name="update_home_page"><b>Update</b></button>
											</div>
										</div>
									</div>
								
							</div>
						</table>
					</form>
					
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
	
	<script>
	$(document).ready(function() {
		var text_max_char = 500;
		$('#panel_one_section_one_desc_textarea').html(text_max_char + ' Characters Remaining.');
		$('#panel_one_section_two_desc_textarea').html(text_max_char + ' Characters Remaining.');
		$('#panel_one_section_three_desc_textarea').html(text_max_char + ' Characters Remaining.');

		$('#section-one-description').keyup(function() {
			var text_length = $('#section-one-description').val().length;
			var text_remaining = text_max_char - text_length;

			$('#panel_one_section_one_desc_textarea').html(text_remaining + ' Characters Remaining.');
		});
		
		$('#section-two-description').keyup(function() {
			var text_length = $('#section-two-description').val().length;
			var text_remaining = text_max_char - text_length;

			$('#panel_one_section_two_desc_textarea').html(text_remaining + ' Characters Remaining.');
		});
		
		$('#section-three-description').keyup(function() {
			var text_length = $('#section-three-description').val().length;
			var text_remaining = text_max_char - text_length;

			$('#panel_one_section_three_desc_textarea').html(text_remaining + ' Characters Remaining.');
		});
	});
	</script>
	
</body>

</html>
<?php 
		
	if(isset($_POST['update_home_page'])){
		
		if (empty($_FILES['carousel_image_one']['name'])) {
			$carousel_image_one_write = $carousel_image_one_read;
		}else{
			// Getting the 'carousel image one' from the image field
			$carousel_image_one_write = $_FILES['carousel_image_one']['name'];
			$carousel_image_one_write_tmp = $_FILES['carousel_image_one']['tmp_name'];
			
			// Saving the 'carousel image one' into the 'uploads' folder in the admin area
			move_uploaded_file($carousel_image_one_write_tmp, "uploads/$carousel_image_one_write");
		}
		
		if (empty($_FILES['carousel_image_two']['name'])) {
			$carousel_image_two_write = $carousel_image_two_read;
		}else{
			// Getting the 'carousel image two' from the image field
			$carousel_image_two_write = $_FILES['carousel_image_two']['name'];
			$carousel_image_two_write_tmp = $_FILES['carousel_image_two']['tmp_name'];
			
			// Saving the 'carousel image two' into the 'uploads' folder in the admin area
			move_uploaded_file($carousel_image_two_write_tmp, "uploads/$carousel_image_two_write");
		}
		
		if (empty($_FILES['carousel_image_three']['name'])) {
			$carousel_image_three_write = $carousel_image_three_read;
		}else{
			// Getting the 'carousel image three' from the image field
			$carousel_image_three_write = $_FILES['carousel_image_three']['name'];
			$carousel_image_three_write_tmp = $_FILES['carousel_image_three']['tmp_name'];
			
			// Saving the 'carousel image three' into the 'uploads' folder in the admin area
			move_uploaded_file($carousel_image_three_write_tmp, "uploads/$carousel_image_three_write");
		}

		if (empty($_POST['panel_one_section_one_title'])) {		
			$panel_one_section_one_title_write = $panel_one_section_one_title_read;
		}else{
			$panel_one_section_one_title_write = $_POST['panel_one_section_one_title'];
		}
		
		if (empty($_POST['panel_one_section_two_title'])) {		
			$panel_one_section_two_title_write = $panel_one_section_two_title_read;
		}else{
			$panel_one_section_two_title_write = $_POST['panel_one_section_two_title'];
		}
		
		if (empty($_POST['panel_one_section_three_title'])) {		
			$panel_one_section_three_title_write = $panel_one_section_three_title_read;
		}else{
			$panel_one_section_three_title_write = $_POST['panel_one_section_three_title'];
		}
		
		if (empty($_POST['panel_one_section_one_desc'])) {		
			$panel_one_section_one_desc_write = $panel_one_section_one_desc_read;
		}else{
			$panel_one_section_one_desc_write = $_POST['panel_one_section_one_desc'];
		}
		
		if (empty($_POST['panel_one_section_two_desc'])) {		
			$panel_one_section_two_desc_write = $panel_one_section_two_desc_read;
		}else{
			$panel_one_section_two_desc_write = $_POST['panel_one_section_two_desc'];
		}
		
		if (empty($_POST['panel_one_section_three_desc'])) {		
			$panel_one_section_three_desc_write = $panel_one_section_three_desc_read;
		}else{
			$panel_one_section_three_desc_write = $_POST['panel_one_section_three_desc'];
		}

		if (empty($_FILES['panel_one_section_one_image']['name'])) {
			$panel_one_section_one_image_write = $panel_one_section_one_image_read;
		}else{
			// Getting the 'panel one section one image' from the image field
			$panel_one_section_one_image_write = $_FILES['panel_one_section_one_image']['name'];
			$panel_one_section_one_image_write_tmp = $_FILES['panel_one_section_one_image']['tmp_name'];
			
			// Saving the 'panel one section one image' into the 'uploads' folder in the admin area
			move_uploaded_file($panel_one_section_one_image_write_tmp, "uploads/$panel_one_section_one_image_write");
		}

		if (empty($_FILES['panel_one_section_two_image']['name'])) {
			$panel_one_section_two_image_write = $panel_one_section_two_image_read;
		}else{
			// Getting the 'panel one section two image' from the image field
			$panel_one_section_two_image_write = $_FILES['panel_one_section_two_image']['name'];
			$panel_one_section_two_image_write_tmp = $_FILES['panel_one_section_two_image']['tmp_name'];
			
			// Saving the 'panel one section two image' into the 'uploads' folder in the admin area
			move_uploaded_file($panel_one_section_two_image_write_tmp, "uploads/$panel_one_section_two_image_write");
		}
		
		if (empty($_FILES['panel_one_section_three_image']['name'])) {
			$panel_one_section_three_image_write = $panel_one_section_three_image_read;
		}else{
			// Getting the carousel image three from the image field
			$panel_one_section_three_image_write = $_FILES['panel_one_section_three_image']['name'];
			$panel_one_section_three_image_write_tmp = $_FILES['panel_one_section_three_image']['tmp_name'];
			
			// Saving the carousel image into the 'uploads' folder in the admin area
			move_uploaded_file($panel_one_section_three_image_write_tmp, "uploads/$panel_one_section_three_image_write");
		}
						
		// Inserting the data into DB
		$update_page = "UPDATE home 
						SET carousel_image_one = '$carousel_image_one_write', 
							carousel_image_two = '$carousel_image_two_write', 
							carousel_image_three = '$carousel_image_three_write', 
							panel_one_section_one_image = '$panel_one_section_one_image_write', 
							panel_one_section_one_title = '$panel_one_section_one_title_write', 
							panel_one_section_one_desc = '$panel_one_section_one_desc_write', 
							panel_one_section_two_image = '$panel_one_section_two_image_write', 
							panel_one_section_two_title = '$panel_one_section_two_title_write', 
							panel_one_section_two_desc = '$panel_one_section_two_desc_write', 
							panel_one_section_three_image = '$panel_one_section_three_image_write', 
							panel_one_section_three_title = '$panel_one_section_three_title_write', 
							panel_one_section_three_desc = '$panel_one_section_three_desc_write'
						WHERE id=$page_id";
		
		$update_page_query = mysqli_query($con, $update_page);
		
		if($update_page_query){
			mysqli_close($con);
			echo"<script>alert('HomePage Updated!')</script>";
			echo"<script>window.open('home-page.php', '_self')</script>";
		}
	}
	
?>