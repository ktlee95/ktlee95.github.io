<?php
	require_once('../login/dbConnect.php');
	
	$sql="SELECT * FROM users WHERE  user_group='student' ;";
				
	$r = mysqli_query($con, $sql);

	
	
	$userlist_result = array();
	
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

?>