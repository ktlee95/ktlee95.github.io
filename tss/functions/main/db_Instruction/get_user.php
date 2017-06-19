<?php
	/***********************************************************
	**********comment out because no database connected*********
	************************************************************
	require_once('../login/dbConnect.php');
	
	$sql="SELECT * FROM users WHERE  user_group='student' ;";
				
	$r = mysqli_query($con, $sql);

	
	************************************************************
	**********comment out because no database connected*********
	************************************************************/
	$userlist_result = array();
	array_push($userlist_result,array(
		"decrypt_username"=>"user",
		"decrypt_userpassword"=>"user",
		"user_email"=>"user@hotmail.com",
		"user_group"=>"student",
		"user_status"=>"Active"
	));
	
	array_push($userlist_result,array(
		"decrypt_username"=>"admin",
		"decrypt_userpassword"=>"admin",
		"user_email"=>"admin@hotmail.com",
		"user_group"=>"admin",
		"user_status"=>"Active"
	));
	/***********************************************************
	**********comment out because no database connected*********
	************************************************************
	//looping through all the records fetched
	while($row = mysqli_fetch_array($r)){
		
		//Pushing name and id in the blank array created 
		array_push($userlist_result,array(
			"decrypt_username"=>$row['decrypt_username'],
			"decrypt_userpassword"=>$row['decrypt_userpassword'],
			"user_email"=>$row['user_email'],
			"user_group"=>$row['user_group'],
			"user_status"=>$row['user_status']
	));
	}
	************************************************************
	**********comment out because no database connected*********
	************************************************************/
?>