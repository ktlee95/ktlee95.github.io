<?php
	/***********************************************************
	**********comment out because no database connected*********
	************************************************************
	require_once('../login/dbConnect.php');
	
	$name = "";
	
	$name = $_SESSION['login_name'];
	
	$sql="SELECT *
			FROM   reminder
			WHERE  user_name='$name' 
			AND reminder_Status='Overdue'
			ORDER BY reminder_Date,reminder_Time;";
				
	$r = mysqli_query($con, $sql);

	************************************************************
	**********comment out because no database connected*********
	************************************************************/
	$reminderlist_result = array();
	
	array_push($reminderlist_result,array(
		"reminder_ID"=>"1",
		"reminder_Title"=>"TOC Quiz",
		"reminder_Description"=>"Chap 5-6",
		"reminder_Date"=>"2017-05-30",
		"reminder_Time"=>"13:00:00",
		"reminder_Status"=>"Overdue"
	));
	
	array_push($reminderlist_result,array(
		"reminder_ID"=>"4",
		"reminder_Title"=>"Web App Lab Test",
		"reminder_Description"=>"Chap 1 to 8",
		"reminder_Date"=>"2017-06-28",
		"reminder_Time"=>"12:00:00",
		"reminder_Status"=>"Processing"
	));
	
	array_push($reminderlist_result,array(
		"reminder_ID"=>"5",
		"reminder_Title"=>"Web App Lab Test 2",
		"reminder_Description"=>"Chap 9 - 12",
		"reminder_Date"=>"2017-07-11",
		"reminder_Time"=>"18:00:00",
		"reminder_Status"=>"Processing"
	));
	
	/***********************************************************
	**********comment out because no database connected*********
	************************************************************
	
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
	************************************************************
	**********comment out because no database connected*********
	************************************************************/
?>