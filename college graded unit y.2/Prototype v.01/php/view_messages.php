<?php
//created on 08/05/2016 last rev. 08/05/2016
//This script loads all messages addressed to the user or group of users
include ('db.php');

function get_messages($member_id,$is_admin,$is_coach,$is_active,$is_junior)
{
	global $con;
		
		//check if message is addressed to the senior player member:
		if($member_id!=0&&$is_admin==0&&$is_coach==0&&$is_active==1&&$is_junior==0)
		{
			$is_player=1;
		}
		else
		{
			$is_player=0;
		}

		//personal messages
		if($member_id!=0&&$is_admin==0&&$is_coach==0&&$is_active==1&&$is_junior==0&&$is_player==0)
		{
			$sql = "SELECT * FROM messenger WHERE sendto=$member_id";
			$result=mysqli_query($con, $sql);
			while($row = mysqli_fetch_assoc($result))
			{
			$id = $row['ID'];
			$sentby = $row['sentby'];
			$header = $row['header'];
			$timestamp = $row['timestamp'];
			$content =$row['text'];
			
			//get the details of the sender
			$sql2 = "SELECT * FROM member_form WHERE member_id=$sentby";
			$result2=mysqli_query($con,$sql2);			
			while($row2 = mysqli_fetch_assoc($result2))
			{
				$name=$row2['name'];
				$surname=$row2['surname'];
			}
			
			
			echo "<li>Created on: $timestamp ID: $id<br>
				From: $name $surname <br>
				Title: $header <br>
				Content: $content<br></li>";
			}
		}
		//admin messages
		if($member_id!=0&&$is_admin==1&&$is_coach==0&&$is_active==1&&$is_junior==0&&$is_player==0)
		{
			$sql = "SELECT * FROM messenger WHERE sendto=$member_id OR send_admin=$is_admin";
			$result=mysqli_query($con, $sql);
			while($row = mysqli_fetch_assoc($result))
			{
			$id = $row['ID'];
			$sentby = $row['sentby'];
			$header = $row['header'];
			$timestamp = $row['timestamp'];
			$content =$row['text'];
			
			//get the details of the sender
			$sql2 = "SELECT * FROM member_form WHERE member_id=$sentby";
			$result2=mysqli_query($con,$sql2);			
			while($row2 = mysqli_fetch_assoc($result2))
			{
				$name=$row2['name'];
				$surname=$row2['surname'];
			}
			
			
			echo "<li>Created on: $timestamp ID: $id<br>
				From: $name $surname <br>
				Title: $header <br>
				Content: $content<br></li>";
			}
		}
		//coach messages
		if($member_id!=0&&$is_admin==0&&$is_coach==1&&$is_active==1&&$is_junior==0&&$is_player==0)
		{
			$sql = "SELECT * FROM messenger WHERE sendto=$member_id OR send_coach=$is_coach";
			$result=mysqli_query($con, $sql);
			while($row = mysqli_fetch_assoc($result))
			{
			$id = $row['ID'];
			$sentby = $row['sentby'];
			$header = $row['header'];
			$timestamp = $row['timestamp'];
			$content =$row['text'];

			//get the details of the sender
			$sql2 = "SELECT * FROM member_form WHERE member_id=$sentby";
			$result2=mysqli_query($con,$sql2);			
			while($row2 = mysqli_fetch_assoc($result2))
			{
				$name=$row2['name'];
				$surname=$row2['surname'];
			}
			
			
			echo "<li>Created on: $timestamp ID: $id<br>
				From: $name $surname <br>
				Title: $header <br>
				Content: $content<br></li>";
			}
		}
		//senior player messages
		if($member_id!=0&&$is_admin==0&&$is_coach==0&&$is_active==1&&$is_junior==0&&$is_player==1)
		{
			$sql = "SELECT * FROM messenger WHERE sendto=$member_id OR send_player=$is_player";
			$result=mysqli_query($con, $sql);
			while($row = mysqli_fetch_assoc($result))
			{
			$id = $row['ID'];
			$sentby = $row['sentby'];
			$header = $row['header'];
			$timestamp = $row['timestamp'];
			$content =$row['text'];
			
			//get the details of the sender
			$sql2 = "SELECT * FROM member_form WHERE member_id=$sentby";
			$result2=mysqli_query($con,$sql2);			
			while($row2 = mysqli_fetch_assoc($result2))
			{
				$name=$row2['name'];
				$surname=$row2['surname'];
			}
			
			
			echo "<li>Created on: $timestamp ID: $id<br>
				From: $name $surname <br>
				Title: $header <br>
				Content: $content<br></li>";
			}
		}
		//junior player messages
		if($member_id!=0&&$is_admin==0&&$is_coach==0&&$is_active==1&&$is_junior==1&&$is_player==0)
		{
			$sql = "SELECT * FROM messenger WHERE sendto=$member_id OR send_junior=$is_junior";
			$result=mysqli_query($con, $sql);
			while($row = mysqli_fetch_assoc($result))
			{
			$id = $row['ID'];
			$sentby = $row['sentby'];
			$header = $row['header'];
			$timestamp = $row['timestamp'];
			$content =$row['text'];
			
			//get the details of the sender
			$sql2 = "SELECT * FROM member_form WHERE member_id=$sentby";
			$result2=mysqli_query($con,$sql2);			
			while($row2 = mysqli_fetch_assoc($result2))
			{
				$name=$row2['name'];
				$surname=$row2['surname'];
			}
			
			
			echo "<li>Created on: $timestamp ID: $id<br>
				From: $name $surname <br>
				Title: $header <br>
				Content: $content<br></li>";
			}
		}
		//super admin only messages
		if($member_id==0&&$is_admin==1&&$is_coach==0&&$is_active==1&&$is_junior==0&&$is_player==0)
		{
			$sql = "SELECT * FROM messenger WHERE sendto=$member_id AND send_admin=$is_admin";
			$result=mysqli_query($con, $sql);
			
			while($row = mysqli_fetch_assoc($result))
			{
			$id = $row['ID'];
			$sentby = $row['sentby'];
			$header = $row['header'];
			$timestamp = $row['timestamp'];
			$content =$row['text'];
			
			//get the details of the sender
			$sql2 = "SELECT * FROM member_form WHERE member_id=$sentby";
			$result2=mysqli_query($con,$sql2);			
			while($row2 = mysqli_fetch_assoc($result2))
			{
				$name=$row2['name'];
				$surname=$row2['surname'];
			}
			
			
			echo "<li>Created on: $timestamp ID: $id<br>
				From: $name $surname <br>
				Title: $header <br>
				Content: $content<br></li>";
			}
		}		
		


}
	
?>