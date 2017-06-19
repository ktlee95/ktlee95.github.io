<?php
	if($_SERVER['REQUEST_METHOD']=='GET'){
		$user_name = $_GET['username'];
		$user_password = $_GET['password'];
		
		/***********************************************************
		**********comment out because no database connected*********
		************************************************************
		require_once('dbConnect.php');
		require_once('encrypt_decrypt.php');
		
		define("ENCRYPTION_KEY", "ThErE_ARe_No_ENCrypTIon_KeY");
		
		$encrypt_username = encrypt($user_name, ENCRYPTION_KEY);
		$encrypt_userpassword = encrypt($user_password, ENCRYPTION_KEY);
		
		$sql="SELECT *
				FROM   users
				WHERE  user_name='$encrypt_username'
				AND    user_password='$encrypt_userpassword' ;";
				
		$r = mysqli_query($con, $sql);
		$result = array();
		while($row = mysqli_fetch_array($r)){
			
			//Pushing name and id in the blank array created 
			array_push($result,array(
				"user_group"=>$row['user_group'],
				"user_status"=>$row['user_status'],
				
				"user_email"=>$row['user_email'],
				"user_fullname"=>$row['user_fullname'],
				"user_gender"=>$row['user_gender'],
				"user_phone"=>$row['user_phone'],
				"user_college"=>$row['user_college'],
				"user_state"=>$row['user_state'],
				"user_country"=>$row['user_country']
		));
		}
		************************************************************
		**********comment out because no database connected*********
		************************************************************/
		
	}
?>