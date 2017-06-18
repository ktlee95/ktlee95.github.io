<?php
	require_once('../../login/dbConnect.php');
	require_once('../../login/encrypt_decrypt.php');
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//Getting values
		$username = $_POST['username_update'];
		
		
		$fullname = $_POST['fullname_update'];
		$password = $_POST['password_update'];
		$gender = $_POST['gender_update'];
		$phone = $_POST['phone_update'];
		$college = $_POST['college_update'];
		$state = $_POST['state_update'];
		$country = $_POST['country_update'];
		
		//importing database connection script
		//Creating sql query 
		$sql = "UPDATE users SET user_fullname = '$fullname' WHERE decrypt_username = '$username';";
		
		if("" != trim($fullname)){
			$sql = "UPDATE users SET user_fullname = '$fullname' WHERE decrypt_username = '$username';";
			if(mysqli_query($con,$sql)){

			}
		}
		
		if("" != trim($password)){
			$sql = "UPDATE users SET decrypt_userpassword = '$password' WHERE decrypt_username = '$username';";
			if(mysqli_query($con,$sql)){
				$encryptedpw = encrypt($password,"ThErE_ARe_No_ENCrypTIon_KeY");
				$sql = "UPDATE users SET user_password = '$encryptedpw' WHERE decrypt_username = '$username';";
				if(mysqli_query($con,$sql)){

				}
			}
		}
		
		if("" != trim($gender)){
			$sql = "UPDATE users SET user_gender = '$gender' WHERE decrypt_username = '$username';";
			if(mysqli_query($con,$sql)){

			}
		}
		
		if("" != trim($phone)){
			$sql = "UPDATE users SET user_phone = '$phone' WHERE decrypt_username = '$username';";
			if(mysqli_query($con,$sql)){

			}
		}
		
		if("" != trim($college)){
			$sql = "UPDATE users SET user_college = '$college' WHERE decrypt_username = '$username';";
			if(mysqli_query($con,$sql)){

			}
		}
		
		if("" != trim($state)){
			$sql = "UPDATE users SET user_state = '$state' WHERE decrypt_username = '$username';";
			if(mysqli_query($con,$sql)){
			}
		}
		
		if("" != trim($country)){
			$sql = "UPDATE users SET user_country = '$country' WHERE decrypt_username = '$username';";
			if(mysqli_query($con,$sql)){
			}
		}
		
		$sql="SELECT *
				FROM   users
				WHERE  decrypt_username='$username' ;";
				
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
		session_start();
		$_SESSION['login_type'] = '';
		
		$_SESSION['login_fullname'] = '';
		$_SESSION['login_gender'] = '';
		$_SESSION['login_phone'] = '';
		$_SESSION['login_college'] = '';
		$_SESSION['login_state'] = '';
		$_SESSION['login_country'] = '';
		
		$_SESSION['login_type'] = 'student';
		
		$_SESSION['login_fullname'] = $result[0]['user_fullname'];
		$_SESSION['login_gender'] = $result[0]['user_gender'];
		$_SESSION['login_phone'] = $result[0]['user_phone'];
		$_SESSION['login_college'] = $result[0]['user_college'];
		$_SESSION['login_state'] = $result[0]['user_state'];
		$_SESSION['login_country'] = $result[0]['user_country'];
				
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Profile updated');\n";
		echo "window.location='../profile.php'";
		echo "</script>";
		
		
		//closing connection 
		mysqli_close($con);
	}
?>