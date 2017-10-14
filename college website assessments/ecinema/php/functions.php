<?php
include ('db.php');

	// Function to get the client ip address
	function getIp() {
		$ip = $_SERVER['REMOTE_ADDR'];
	 
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
	 
		return $ip;
	}
	
	// Get Categories Function
	function getCarousel(){
		global $con;
		
		// DB Query
		$get_carousel = "SELECT * FROM home WHERE id=1 LIMIT 1";
		
		// Connect to DB and run the Query 
		$run_get_carousel = mysqli_query($con, $get_carousel);
		
		while($row_carousel=mysqli_fetch_array($run_get_carousel)){
			$carousel_id = $row_carousel['id'];
			$carousel_image_one = $row_carousel['carousel_image_one'];
			$carousel_image_two = $row_carousel['carousel_image_two'];
			$carousel_image_three = $row_carousel['carousel_image_three'];
			
			echo "
				<div class='item active'>
				  <img class='first-slide' src='uploads/$carousel_image_one' alt='First slide'>
				</div>
				<div class='item'>
				  <img class='second-slide' src='uploads/$carousel_image_two' alt='Second slide'>
				</div>
				<div class='item'>
				  <img class='third-slide' src='uploads/$carousel_image_three' alt='Third slide'>
				</div>
			";
		}
	}

	/*
			why it doesnt work??? unused
	function getBanner(){
		global $con;
		
		// DB Query
		$get_banner = "SELECT * FROM home WHERE id=1 LIMIT 1";
		
		// Connect to DB and run the Query 
		$run_get_banner = mysqli_query($con, $get_banner);
		
		while($row_banner=mysqli_fetch_array($run_get_banner)){
			$carousel_id = $row_carousel['id'];
			$carousel_image_one = $row_carousel['carousel_image_one'];
			//$carousel_image_two = $row_carousel['carousel_image_two'];
			//$carousel_image_three = $row_carousel['carousel_image_three'];
			
			echo "<img class="first-slide" src="uploads/$carousel_image_one" alt="First slide">";
		}
	}
	*/
	
	function getPanelOne(){
		global $con;
		
		// DB Query
		$get_panel_one = "SELECT * FROM home WHERE id=1 LIMIT 1";
		
		// Connect to DB and run the Query 
		$run_get_panel_one = mysqli_query($con, $get_panel_one);
		
		while($row_panel_one=mysqli_fetch_array($run_get_panel_one)){
			$panel_one_id = $row_panel_one['id'];
			$panel_one_section_one_image = $row_panel_one['panel_one_section_one_image'];
			$panel_one_section_one_title = $row_panel_one['panel_one_section_one_title'];
			$panel_one_section_one_desc = $row_panel_one['panel_one_section_one_desc'];
			$panel_one_section_two_image = $row_panel_one['panel_one_section_two_image'];
			$panel_one_section_two_title = $row_panel_one['panel_one_section_two_title'];
			$panel_one_section_two_desc = $row_panel_one['panel_one_section_two_desc'];			
			$panel_one_section_three_image = $row_panel_one['panel_one_section_three_image'];
			$panel_one_section_three_title = $row_panel_one['panel_one_section_three_title'];
			$panel_one_section_three_desc = $row_panel_one['panel_one_section_three_desc'];	
			
			echo "
				<div class='col-lg-4'>
					<img class='img-circle' src='uploads/$panel_one_section_one_image' alt='Generic placeholder image' width='140' height='140'>
					<h2>$panel_one_section_one_title</h2>
					<p>$panel_one_section_one_desc</p>
					<p><a class='btn btn-default' href='#' role='button'>View details &raquo;</a></p>
				</div><!-- /.col-lg-4 -->
				<div class='col-lg-4'>
					<img class='img-circle' src='uploads/$panel_one_section_two_image' alt='Generic placeholder image' width='140' height='140'>
					<h2>$panel_one_section_two_title</h2>
					<p>$panel_one_section_two_desc</p>
					<p><a class='btn btn-default' href='#' role='button'>View details &raquo;</a></p>
				</div><!-- /.col-lg-4 -->
				<div class='col-lg-4'>
					<img class='img-circle' src='uploads/$panel_one_section_three_image' alt='Generic placeholder image' width='140' height='140'>
					<h2>$panel_one_section_three_title</h2>
					<p>$panel_one_section_three_desc</p>
					<p><a class='btn btn-default' href='#' role='button'>View details &raquo;</a></p>
				</div><!-- /.col-lg-4 -->
			";
		}
	}
?>
	
