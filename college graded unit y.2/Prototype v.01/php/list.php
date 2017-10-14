<?php
//created on 26/04/2016 last rev. 12/05/2016
//This script contains various 'getters' methods
	include ('db.php');
	
//fetch data from the database and display it as a list for editing the club members
function get_list()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM member_form";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$id = $row['member_id'];
			$name = $row['name'];
			$surname = $row['surname'];
			echo "<form action='edit_member.php' method='post'>";
			echo "<li>Member ID: $id</li> <input type='text' value='$name' readonly> <input type='text' value='$surname' readonly>";
			echo "<input type='hidden' value='$id' name='id'>";
			echo "<input type='submit' value='edit'>";
			echo "</form>";
		}
}
	
//these functions are used for admin messenger panel, they create selection lists
// for the moment only single user can be messaged or the whole group like all admins etc
function get_list_admins()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM member_form WHERE is_admin=1";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$id = $row['member_id'];
			$name = $row['name'];
			$surname = $row['surname'];	
				echo "<li>$name $surname Select: <input name='sendto' type='radio' value='$id' required></li>";
		}
}
//get list of coaches for selection
function get_list_coaches()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM member_form WHERE is_coach=1";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$id = $row['member_id'];
			$name = $row['name'];
			$surname = $row['surname'];	
				echo "<li>$name $surname Select: <input name='sendto' type='radio' value='$id' required></li>";
		}
}
//get list of senior players for selection
function get_list_players()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM member_form WHERE is_active=1 AND is_admin =0 AND is_junior=0 AND is_coach=0";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$id = $row['member_id'];
			$name = $row['name'];
			$surname = $row['surname'];	
			$is_admin = $row['is_admin'];
			$is_coach = $row['is_coach'];
			$is_junior = $row['is_junior'];
			
			if($is_admin==0&&$is_coach==0&&$is_junior==0)
			{
				echo "<li>$name $surname Select: <input name='sendto' type='radio' value='$id' required></li>";
			}
			else
			{
				echo "<li>No active players found yet.</li>";
			}
		}
}
//get list of junior players for selection
function get_list_juniors()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM member_form WHERE is_junior=1";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$id = $row['member_id'];
			$name = $row['name'];
			$surname = $row['surname'];	
				echo "<li>$name $surname Select: <input name='sendto' type='radio' value='$id' required></li>";
		}
}		
//get insured list for editing
function get_insured_list()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM member_form";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$id = $row['member_id'];
			$name = $row['name'];
			$surname = $row['surname'];
			$is_junior = $row['is_junior'];
			$is_coach = $row['is_coach'];
			$is_admin = $row['is_coach'];
			
			echo "<form action='edit_insurance.php' method='post'>";
			if($is_junior==1)
			{
				echo "<li>Junior player ID: $id</li>Name: $name Surname: $surname<br>";
			}
			if($is_admin==0&&$is_coach==0&&$is_junior==0)
			{
				echo "<li>Senior player ID: $id</li>Name: $name Surname: $surname<br>";
			}
			if($is_admin==1||$is_coach==1)
			{
				echo "<li>Club Member ID: $id</li>Name: $name Surname: $surname<br>";
			}
			echo "<input type='hidden' value='$id' name='id'>";
			echo "<input type='submit' value='edit'>";
			echo "</form>";
		}
}
//get insurance list
function get_member_insurance_list($member_id)
{
	global $con;
		
		// DB Query
		$sql = "SELECT * FROM insurance_fees_form WHERE member_ID=$member_id";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
		{
			$id = $row['ID'];
			$member_id = $row['member_ID'];
			$season = $row['season'];
			$fees = $row['fees'];
			$timestamp = $row['timestamp'];
			
			echo "<li><form action='php/remove_insurance_record.php' method='post'>";
			echo " ID: $id Added at: $timestamp<br>";
			echo "Season: $season <br>";
			echo "Fees: $fees <input type='hidden'name='id' value='$id'><input type='submit' value='remove'><br>";
			echo "</form></li>";
		}
}

//for player_skills_editor.php
function get_player_list()
{
	global $con;
	
		// DB Query limit to one query per user ID, crude but working :)
		$sql1 = "SELECT * FROM player_profile_form";
		// Connect to DB and run the Query 
		$result1=mysqli_query($con, $sql1);
		//this is a workaround for a problem of fetching a not-yet existing form from the database
		while($row1 = mysqli_fetch_assoc($result1))
		{
			$player_id = $row1['member_ID'];
			
		// DB Query
		$sql = "SELECT * FROM member_form WHERE is_admin=0 AND is_coach=0 AND is_active=1 AND member_id=$player_id LIMIT 1";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

			while($row = mysqli_fetch_assoc($result))
			{
				$id = $row['member_id'];
				$name = $row['name'];
				$surname = $row['surname'];
				$is_junior = $row['is_junior'];
				
				if($is_junior==1)
				{
					echo "<li><form action='edit_player.php' method='post'>
					Junior Player: $name $surname<br>
					<input type='hidden' name='id' value='$id'> 
					<input type='hidden' name='name' value='$name'> 
					<input type='hidden' name='surname' value='$surname'>
					<input type='submit' name='edit' value='edit'> 
					</form></li>";
				}
				else
				{
					echo "<li><form action='edit_player.php' method='post'>
					Senior Player: $name $surname<br>
					<input type='hidden' name='id' value='$id'> 
					<input type='hidden' name='name' value='$name'> 
					<input type='hidden' name='surname' value='$surname'> 
					<input type='submit' name='edit' value='edit'> 
					</form></li>";
				}
			}
		}
}

//for set_player_skills.php
function get_player_list2()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM member_form WHERE is_admin=0 AND is_coach=0 AND is_active=1 ";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

			while($row = mysqli_fetch_assoc($result))
			{
				$id = $row['member_id'];
				$name = $row['name'];
				$surname = $row['surname'];
				$is_junior = $row['is_junior'];
				
				if($is_junior==1)
				{
					echo "<li><form action='edit_player_skills.php' method='post'>
					Junior Player: $name $surname<br>
					<input type='hidden' name='id' value='$id'> 
					<input type='hidden' name='name' value='$name'> 
					<input type='hidden' name='surname' value='$surname'> 
					<input type='submit' value='edit'>
 
					</form></li>";
				}
				else
				{
					echo "<li><form action='edit_player_skills.php' method='post'>
					Senior Player: $name $surname<br>
					<input type='hidden' name='id' value='$id'> 
					<input type='hidden' name='name' value='$name'> 
					<input type='hidden' name='surname' value='$surname'> 
					<input type='submit' value='edit'> 
					</form></li>";
				}
			}
}
//get existing game record list
function get_game_record_list()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM game_record_form";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

			while($row = mysqli_fetch_assoc($result))
			{
				$ID = $row['ID'];
				$timestamp = $row['timestamp'];
				$member_id = $row['member_ID'];
				$opposition_name = $row['opposition_name'];
				$location=$row['location'];
				$date=$row['date'];
				
				//get trainer/record creator name
				$sql2 = "SELECT * FROM member_form WHERE member_id=$member_id";
				// Connect to DB and run the Query 
				$result2=mysqli_query($con, $sql2);
					
				while($row2 = mysqli_fetch_assoc($result2))
				{
					$name = $row2['name'];
					$surname = $row2['surname'];
				}
				
				
				echo "<li><form action='' method='post'>
					Game ID: $ID, Created on: $timestamp By: $name $surname<br>
					Location: $location Date: $date Opposition: $opposition_name<br>
					<input type='hidden' name='edit_this' value='$ID'> 
					<input type='submit' name='edit' value='edit'> <br>
					Remove record<br>
					(Warning this is irreversible!):<br>
					<input type='submit' name='remove' value='remove'> <br>
					</form></li>";
			}
}

//get existing game record list
function get_training_record_list()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM training_record_form";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

			while($row = mysqli_fetch_assoc($result))
			{
				$ID = $row['ID'];
				$timestamp = $row['timestamp'];
				$member_id = $row['member_ID'];
				$training_date = $row['training_date'];
				$location=$row['location'];
				
				//get trainer/record creator name
				$sql2 = "SELECT * FROM member_form WHERE member_id=$member_id";
				// Connect to DB and run the Query 
				$result2=mysqli_query($con, $sql2);
					
				while($row2 = mysqli_fetch_assoc($result2))
				{
					$name = $row2['name'];
					$surname = $row2['surname'];
				}
				
				
				echo "<li><form action='' method='post'>
					Training ID: $ID, Created on: $timestamp By: $name $surname<br>
					Location: $location Date: $training_date<br>
					<input type='hidden' name='edit_this' value='$ID'> 
					<input type='submit' name='edit' value='edit'> <br>
					Remove record<br>
					(Warning this is irreversible!):<br>
					<input type='submit' name='remove' value='remove'> <br>
					</form></li>";
			}
}
//get junior player list for parental consents
function get_junior_player_list()
{
	global $con;
		// DB Query limit to one query per user ID with use distinct member id selection :)
		$sql1 = "SELECT DISTINCT member_ID FROM consents_form";
		// Connect to DB and run the Query 
		$result1=mysqli_query($con, $sql1);
		//this is a workaround for a problem of fetching a not-yet existing form from the database
		while($row1 = mysqli_fetch_assoc($result1))
		{
			$player_id = $row1['member_ID'];
		
		// DB Query
		$sql = "SELECT * FROM member_form WHERE is_junior=1 AND is_active=1 AND member_id=$player_id";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);
		
		if($result)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$player_id2 = $row['member_id'];
				$name = $row['name'];
				$surname = $row['surname'];
				$DOB = $row['DOB'];
				$SRU_number=$row['SRU_number'];
				
				
				echo "<li><form action='' method='post'>
					Player ID: $player_id2 $name $surname<br>
					Date of birth: $DOB <br>
					SRU Number: $SRU_number<br>
					<input type='hidden' name='edit_this' value='$player_id2'> 
					<input type='submit' name='edit' value='edit'> <br>
					</form></li>";
			}
		}
		}
}	
// get and create a junior player list for further editing
function get_junior_player_list3()
{
	global $con;
		// DB Query limit to one query per user ID with use distinct member id selection :)
		$sql1 = "SELECT DISTINCT member_ID FROM junior_player_member_form";
		// Connect to DB and run the Query 
		$result1=mysqli_query($con, $sql1);
		//this is a workaround for a problem of fetching a not-yet existing form from the database
		while($row1 = mysqli_fetch_assoc($result1))
		{
			$player_id = $row1['member_ID'];
		
		// DB Query
		$sql = "SELECT * FROM member_form WHERE is_junior=1 AND is_active=1 AND member_id=$player_id";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);
		
		if($result)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$player_id2 = $row['member_id'];
				$name = $row['name'];
				$surname = $row['surname'];
				$DOB = $row['DOB'];
				$SRU_number=$row['SRU_number'];
				
				
				echo "<li><form action='' method='post'>
					Player ID: $player_id2 $name $surname<br>
					Date of birth: $DOB <br>
					SRU Number: $SRU_number<br>
					<input type='hidden' name='edit_this' value='$player_id2'> 
					<input type='submit' name='edit' value='edit'> <br>
					</form></li>";
			}
		}
		}
}			
// get and create a senior player list for further editing
function get_senior_player_list()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM member_form WHERE is_junior=0 AND is_coach=0 AND is_admin=0 AND is_active=1";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

			while($row = mysqli_fetch_assoc($result))
			{
				$player_id = $row['member_id'];
				$name = $row['name'];
				$surname = $row['surname'];
				$DOB = $row['DOB'];
				$SRU_number=$row['SRU_number'];
				
				
				echo "<li><form action='' method='post'>
					Player ID: $player_id $name $surname<br>
					Date of birth: $DOB <br>
					SRU Number: $SRU_number<br>
					<input type='hidden' name='edit_this' value='$player_id'> 
					<input type='submit' name='edit' value='edit'> <br>
					Remove record<br>
					(Warning this is irreversible!):<br>
					<input type='submit' name='remove' value='remove'> <br>
					</form></li>";
			}
}	
//get senior player list version 2 with limits for edit senior player form
function get_senior_player_list2()
{
	global $con;
	
		// DB Query limit to one query per user ID with use distinct member id selection :)
		$sql1 = "SELECT DISTINCT member_ID FROM senior_player_member_form";
		// Connect to DB and run the Query 
		$result1=mysqli_query($con, $sql1);
		//this is a workaround for a problem of fetching a not-yet existing form from the database
		while($row1 = mysqli_fetch_assoc($result1))
		{
			$player_id = $row1['member_ID'];
		
		// DB Query
		$sql = "SELECT * FROM member_form WHERE is_junior=0 AND is_coach=0 AND is_admin=0 AND is_active=1 AND member_id=$player_id";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

			while($row = mysqli_fetch_assoc($result))
			{
				$player_id2 = $row['member_id'];
				$name = $row['name'];
				$surname = $row['surname'];
				$DOB = $row['DOB'];
				$SRU_number=$row['SRU_number'];
				
				
				echo "<li><form action='' method='post'>
					Player ID: $player_id2 $name $surname<br>
					Date of birth: $DOB <br>
					SRU Number: $SRU_number<br>
					<input type='hidden' name='edit_this' value='$player_id2'> 
					<input type='submit' name='edit' value='edit'> <br>
					Remove record<br>
					(Warning this is irreversible!):<br>
					<input type='submit' name='remove' value='remove'> <br>
					</form></li>";
			}
		}
}	
// get and create a squad list for further editing
function get_squad_list()
{
	global $con;

		// DB Query
		$sql = "SELECT * FROM squads";
		
		// Connect to DB and run the Query 
		$result=mysqli_query($con, $sql);

			while($row1 = mysqli_fetch_assoc($result))
			{
				$squad_id = $row1['squad_id'];
				$ID	= $row1['ID'];
				$squad_name = $row1['squad_name'];	
				$coach_id = $row1['coach_id'];
				
				echo "<li><form action='' method='post'>
					Squad ID: $squad_id: $squad_name<br>
					
					<input type='hidden' name='edit_this' value='$ID'> 
					<input type='submit' name='edit' value='edit'> <br>
					Remove record<br>
					(Warning this is irreversible!):<br>
					<input type='submit' name='remove' value='remove'> <br>
					</form></li>";
				// DB Query to display current coach of this squad:
				$sql3 = "SELECT * FROM member_form WHERE member_id = $coach_id";
				// Connect to DB and run the Query 
				$result3=mysqli_query($con, $sql3);
				echo "Currently assigned coach:<br>";
				while($row3 = mysqli_fetch_assoc($result3))
				{
					$name = $row3['name'];	
					$surname = $row3['surname'];
					
					echo " $name $surname <br><br>";
				}
				
				
				// DB Query to display current members of this squad:
				$sql4 = "SELECT * FROM player_profile_form WHERE squad_ID = $squad_id";
				// Connect to DB and run the Query 
				$result4=mysqli_query($con, $sql4);
				echo "Squad members:<br>";

				while($row2 = mysqli_fetch_assoc($result4))
				{
					$member_id = $row2['member_ID'];
					
					// DB Query to get member names
					$sql6 = "SELECT * FROM member_form WHERE member_id = $member_id";
					// Connect to DB and run the Query 
					$result6=mysqli_query($con, $sql6);
					
					while($row3 = mysqli_fetch_assoc($result6))
					{
						$name = $row3['name'];
						$surname= $row3['surname'];
						echo "$name $surname<br>";
					}
					
				}
			}
}	
?>