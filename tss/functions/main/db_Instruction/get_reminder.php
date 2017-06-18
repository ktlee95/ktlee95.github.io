<?php
	require_once('../login/dbConnect.php');
	
	$name = "";
	
	$name = $_SESSION['login_name'];
	
	$sql="SELECT *
			FROM   reminder
			WHERE  user_name='$name' 
			AND reminder_Status='Overdue'
			ORDER BY reminder_Date,reminder_Time;";
				
	$r = mysqli_query($con, $sql);

	
	$reminderlist_result = array();
	
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($reminderlist_result,array(
			"reminder_ID"=>$row['reminder_ID'],
			"reminder_Title"=>$row['reminder_Title'],
			"reminder_Description"=>$row['reminder_Description'],
			"reminder_Date"=>$row['reminder_Date'],
			"reminder_Time"=>$row['reminder_Time'],
			"reminder_Status"=>$row['reminder_Status']
		));
	}
	
	$sql="SELECT *
			FROM   reminder
			WHERE  user_name='$name' 
			AND reminder_Status='Processing'
			ORDER BY reminder_Date,reminder_Time;";
				
	$r = mysqli_query($con, $sql);
	
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($reminderlist_result,array(
			"reminder_ID"=>$row['reminder_ID'],
			"reminder_Title"=>$row['reminder_Title'],
			"reminder_Description"=>$row['reminder_Description'],
			"reminder_Date"=>$row['reminder_Date'],
			"reminder_Time"=>$row['reminder_Time'],
			"reminder_Status"=>$row['reminder_Status']
		));
	}
	
	$sql="SELECT *
			FROM   reminder
			WHERE  user_name='$name' 
			AND reminder_Status='Cancelled'
			ORDER BY reminder_Date,reminder_Time;";
				
	$r = mysqli_query($con, $sql);
	
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($reminderlist_result,array(
			"reminder_ID"=>$row['reminder_ID'],
			"reminder_Title"=>$row['reminder_Title'],
			"reminder_Description"=>$row['reminder_Description'],
			"reminder_Date"=>$row['reminder_Date'],
			"reminder_Time"=>$row['reminder_Time'],
			"reminder_Status"=>$row['reminder_Status']
		));
	}
	
	$sql="SELECT *
			FROM   reminder
			WHERE  user_name='$name' 
			AND reminder_Status='Completed'
			ORDER BY reminder_Date,reminder_Time;";
				
	$r = mysqli_query($con, $sql);
	
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($reminderlist_result,array(
			"reminder_ID"=>$row['reminder_ID'],
			"reminder_Title"=>$row['reminder_Title'],
			"reminder_Description"=>$row['reminder_Description'],
			"reminder_Date"=>$row['reminder_Date'],
			"reminder_Time"=>$row['reminder_Time'],
			"reminder_Status"=>$row['reminder_Status']
		));
	}
	
	mysqli_close($con);
?>