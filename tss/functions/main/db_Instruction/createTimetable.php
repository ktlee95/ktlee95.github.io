<?php
	require_once('../../login/dbConnect.php');
	
	session_start();
	
	$name = $_SESSION['login_name'];
	
	$day = $_POST['dayselected'];
	$hour = $_POST['hourInput'];
	$minute = $_POST['minuteInput'];
	$class = $_POST['classInput'];
	$venue = $_POST['venueInput'];
	$session = $_POST['sessionInput'];
	
	$weekday = "monday";
	
	$datetime = mktime($hour,$minute, 00, 01, 01, 2000);
	
	
	
	switch($day){
	case 1:
		$weekday = "monday";
		break;
	case 2:
		$weekday = "tuesday";
		break;
	case 3:
		$weekday = "wednesday";
		break;
	case 4:
		$weekday = "thursday";
		break;
	case 5:
		$weekday = "friday";
		break;
	}
	
	
	
	$sql = "INSERT INTO timetable(user_name, timetable_Day, 
			timetable_Time, timetable_Class, timetable_Venue, timetable_Session) VALUES ('$name',
			'$weekday', '".date("G:i:sa",$datetime)."', '$class', '$venue', '$session');";
	
	if(mysqli_query($con,$sql)){
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Timetable has successfully created!');\n";
		echo "window.location='../classSchedule.php'";
		echo "</script>";
	}else{
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Timetable cannot be created');\n";
		echo "window.location='../classSchedule.php'";
		echo "</script>";
	}
	
	mysqli_close($con);
?>