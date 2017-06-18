<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$user_name = $_POST['username'];
		$user_password = $_POST['password'];
		$user_email = $_POST['email'];
		
		require_once('dbConnect.php');
		require_once('encrypt_decrypt.php');
		
		define("ENCRYPTION_KEY", "ThErE_ARe_No_ENCrypTIon_KeY");
		
		$encrypt_username = encrypt($user_name, ENCRYPTION_KEY);
		$encrypt_userpassword = encrypt($user_password, ENCRYPTION_KEY);
		
		$sql = "INSERT INTO users (user_name, user_password, decrypt_username, 
		decrypt_userpassword, user_email,user_group, user_status,user_fullname) VALUES ('$encrypt_username', 
		'$encrypt_userpassword', '$user_name', '$user_password', '$user_email',
		'student', 'Active', '$user_name');";
		
		if(mysqli_query($con,$sql)){
			echo "<script language=\"JavaScript\">\n";
			echo "alert('Account has successfully created!');\n";
			echo "window.location='login.html'";
			echo "</script>";
		}else{
			echo "<script language=\"JavaScript\">\n";
			echo "alert('Username or Email is already taken');\n";
			echo "window.location='signup.html'";
			echo "</script>";
		}
		mysqli_close($con);
	}
?>