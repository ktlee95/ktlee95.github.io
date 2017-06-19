<?php
	/***********************************************************
	**********comment out because no database connected*********
	************************************************************
	require_once('../login/dbConnect.php');
	
	$name = "";
	
	$name = $_SESSION['login_name'];
	
	$sql="SELECT *
			FROM   todolist
			WHERE  user_name='$name' 
			AND todo_Status='Overdue'
			ORDER BY todo_Date, todo_Time;";
				
	$r = mysqli_query($con, $sql);

	************************************************************
	**********comment out because no database connected*********
	************************************************************/
	
	$todolist_result = array();
	
	array_push($todolist_result,array(
		"todo_ID"=>"19",
		"todo_Title"=>"Web App Assignment",
		"todo_Description"=>"Submission Due Date",
		"todo_Date"=>"2017-06-13",
		"todo_Time"=>"17:00:00",
		"todo_Status"=>"Overdue"
	));
	
	array_push($todolist_result,array(
		"todo_ID"=>"22",
		"todo_Title"=>"Software Design Assignment",
		"todo_Description"=>"Submission Due Date",
		"todo_Date"=>"2017-07-10",
		"todo_Time"=>"15:00:00",
		"todo_Status"=>"Processing"
	));
	
	array_push($todolist_result,array(
		"todo_ID"=>"26",
		"todo_Title"=>"FYP submission",
		"todo_Description"=>"Submission Due Date",
		"todo_Date"=>"2017-08-13",
		"todo_Time"=>"10:00:00",
		"todo_Status"=>"Processing"
	));
	
	/***********************************************************
	**********comment out because no database connected*********
	************************************************************
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
	************************************************************
	**********comment out because no database connected*********
	************************************************************/
?>