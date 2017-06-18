<?php
	require_once('../login/dbConnect.php');
	
	$name = "";
	
	$name = $_SESSION['login_name'];
	
	$sql="SELECT *
			FROM   timetable
			WHERE  user_name='$name' ;";
				
	$r = mysqli_query($con, $sql);

	
	$timetable_result = array();
	
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($timetable_result,array(
			"timetable_ID"=>$row['timetable_ID'],
			"timetable_Day"=>$row['timetable_Day'],
			"timetable_Time"=>$row['timetable_Time'],
			"timetable_Class"=>$row['timetable_Class'],
			"timetable_Venue"=>$row['timetable_Venue'],
			"timetable_Session"=>$row['timetable_Session']
		));
	}
?>