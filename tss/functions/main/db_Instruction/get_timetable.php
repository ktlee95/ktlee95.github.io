<?php
	/***********************************************************
	**********comment out because no database connected*********
	************************************************************
	require_once('../login/dbConnect.php');
	
	$name = "";
	
	$name = $_SESSION['login_name'];
	
	$sql="SELECT *
			FROM   timetable
			WHERE  user_name='$name' ;";
				
	$r = mysqli_query($con, $sql);

	************************************************************
	**********comment out because no database connected*********
	************************************************************/
	
	$timetable_result = array();
	
	array_push($timetable_result,array(
		"timetable_ID"=>"4",
		"timetable_Day"=>"wednesday",
		"timetable_Time"=>"16:00:00",
		"timetable_Class"=>"3D Game Programming",
		"timetable_Venue"=>"AR1007",
		"timetable_Session"=>"TC01"
	));
	
	array_push($timetable_result,array(
		"timetable_ID"=>"5",
		"timetable_Day"=>"monday",
		"timetable_Time"=>"11:00:00",
		"timetable_Class"=>"Game Physics",
		"timetable_Venue"=>"AR2004",
		"timetable_Session"=>"TC01"
	));
	
	array_push($timetable_result,array(
		"timetable_ID"=>"12",
		"timetable_Day"=>"tuesday",
		"timetable_Time"=>"10:00:00",
		"timetable_Class"=>"FYP",
		"timetable_Venue"=>"AR4004",
		"timetable_Session"=>"TC01"
	));
	
	/***********************************************************
	**********comment out because no database connected*********
	************************************************************
	
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
	
	************************************************************
	**********comment out because no database connected*********
	************************************************************/
?>