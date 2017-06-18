<?php
	require_once('../../login/dbConnect.php');
	
	session_start();
	
	$tasktype = $_POST['tasktypeInput'];
	$date = $_POST['date'];
	$hour = $_POST['hourInput'];
	$minute = $_POST['minuteInput'];
	$title = $_POST['titleInput'];
	$description = $_POST['descriptionInput'];
	$status = "Processing";
	
	list($month,$day,$year) = split("/",$date,3);
	$datetime = mktime($hour,$minute, 00, $month, $day, $year);
	
	$name = $_SESSION['login_name'];
	
	if($tasktype == "Reminder"){
		$sql = "INSERT INTO reminder(user_name, reminder_Title, 
				reminder_Description, reminder_Date, reminder_Time,
				reminder_Status) VALUES ('$name', '$title', '$description',
				'".date("Y-m-d",$datetime)."', '".date("G:i:sa",$datetime)."', '$status');";
	}else{
		$sql = "INSERT INTO todolist(user_name, todo_Title, 
				todo_Description, todo_Date, todo_Time,
				todo_Status) VALUES ('$name', '$title', '$description',
				'".date("Y-m-d",$datetime)."', '".date("G:i:sa",$datetime)."', '$status');";
	}
				
	if(mysqli_query($con,$sql)){
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Task has successfully created!');\n";
		echo "window.location='../addtask.php'";
		echo "</script>";
	}else{
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Task cannot be created');\n";
		echo "window.location='../addtask.php'";
		echo "</script>";
	}

	mysqli_close($con);
?>