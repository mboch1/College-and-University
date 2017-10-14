<?php
//created on 07/05/2016 last rev. 12/05/2016
//This script loads all messages which were created by the active member
include ('db.php');

function get_all_messages()
{
	global $con;
		
		//use name of the currently logged in user from the session settings:
		$login=$_SESSION['username'];
	
		$sql = "SELECT * FROM member_form WHERE login='$login'";
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$user_id=$row['member_id'];
		}	
		
		// DB Query
		$sql2 = "SELECT * FROM messenger WHERE sentby='$user_id'";
		
		// Connect to DB and run the Query 
		$result2=mysqli_query($con, $sql2);

		while($row2 = mysqli_fetch_assoc($result2))
		{
			$id = $row2['ID'];
			$header = $row2['header'];
			$sendto = $row2['sendto'];
			$is_admin = $row2['send_admin'];
			$is_coach = $row2['send_coach'];
			$is_player = $row2['send_player'];
			$is_junior = $row2['send_junior'];
			$timestamp = $row2['timestamp'];
			
			echo "<li><form action='php/remove_message.php' method='post'>";
			echo "
				Title: $header <br>
				Created on: $timestamp <br>
				Send to: <br>
				Member ID [member id]: $sendto<br>
				All admins [1] if true: $is_admin<br>
				All coaches [1] if true: $is_coach<br>
				All players [1] if true: $is_player<br>
				All juniors [1] if true: $is_junior<br>
				<input type='hidden' value='$id' name='id'>
				<input type='submit' value='remove'>
				</form></li>";
		}
}
	
?>