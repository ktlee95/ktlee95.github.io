<?php
	require_once('../login/dbConnect.php');
	
	$name = "";
	
	$name = $_SESSION['login_name'];
	
	$sql="SELECT *
			FROM   todolist
			WHERE  user_name='$name' 
			AND todo_Status='Overdue'
			ORDER BY todo_Date, todo_Time;";
				
	$r = mysqli_query($con, $sql);

	
	$todolist_result = array();
	
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($todolist_result,array(
			"todo_ID"=>$row['todo_ID'],
			"todo_Title"=>$row['todo_Title'],
			"todo_Description"=>$row['todo_Description'],
			"todo_Date"=>$row['todo_Date'],
			"todo_Time"=>$row['todo_Time'],
			"todo_Status"=>$row['todo_Status']
		));
	}
	
	$sql="SELECT *
			FROM   todolist
			WHERE  user_name='$name' 
			AND todo_Status='Processing'
			ORDER BY todo_Date, todo_Time;";
				
	$r = mysqli_query($con, $sql);
	
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($todolist_result,array(
			"todo_ID"=>$row['todo_ID'],
			"todo_Title"=>$row['todo_Title'],
			"todo_Description"=>$row['todo_Description'],
			"todo_Date"=>$row['todo_Date'],
			"todo_Time"=>$row['todo_Time'],
			"todo_Status"=>$row['todo_Status']
		));
	}
	
	$sql="SELECT *
			FROM   todolist
			WHERE  user_name='$name' 
			AND todo_Status='Cancelled'
			ORDER BY todo_Date, todo_Time;";
				
	$r = mysqli_query($con, $sql);
	
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($todolist_result,array(
			"todo_ID"=>$row['todo_ID'],
			"todo_Title"=>$row['todo_Title'],
			"todo_Description"=>$row['todo_Description'],
			"todo_Date"=>$row['todo_Date'],
			"todo_Time"=>$row['todo_Time'],
			"todo_Status"=>$row['todo_Status']
		));
	}
	
	$sql="SELECT *
			FROM   todolist
			WHERE  user_name='$name' 
			AND todo_Status='Completed'
			ORDER BY todo_Date, todo_Time;";
				
	$r = mysqli_query($con, $sql);
	
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($todolist_result,array(
			"todo_ID"=>$row['todo_ID'],
			"todo_Title"=>$row['todo_Title'],
			"todo_Description"=>$row['todo_Description'],
			"todo_Date"=>$row['todo_Date'],
			"todo_Time"=>$row['todo_Time'],
			"todo_Status"=>$row['todo_Status']
		));
	}
?>