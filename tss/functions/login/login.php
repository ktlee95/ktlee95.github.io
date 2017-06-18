<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$user_name = $_POST['username'];
		$user_password = $_POST['password'];
		
		<?php
	//Defining the varible to connect the database
	define('HOST','http://www.phpmyadmin.co');
	define('USER','sql12180864');
	define('PASS','MUuJ4pzGYS');
	define('DB','sql12180864');
	
	//connect the database, if failed, output unable to connect
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect Database');
?>
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
		
		if (count($result)!=1) { 
			echo "<script language=\"JavaScript\">\n";
			echo "alert('Invalid login ID or PW!');\n";
			echo "window.location='login.html'";
			echo "</script>";
		}
		else {
			if($result[0]['user_status'] == 'Active'){
				session_start();
				$_SESSION['login_name'] = '';
				$_SESSION['login_type'] = '';
				
				$_SESSION['login_email'] = '';
				$_SESSION['login_fullname'] = '';
				$_SESSION['login_gender'] = '';
				$_SESSION['login_phone'] = '';
				$_SESSION['login_college'] = '';
				$_SESSION['login_state'] = '';
				$_SESSION['login_country'] = '';
				if ($result[0]['user_group']=="student") {
					$_SESSION['login_name'] = "$user_name";
					$_SESSION['login_type'] = 'student';
					
					$_SESSION['login_email'] = $result[0]['user_email'];
					$_SESSION['login_fullname'] = $result[0]['user_fullname'];
					$_SESSION['login_gender'] = $result[0]['user_gender'];
					$_SESSION['login_phone'] = $result[0]['user_phone'];
					$_SESSION['login_college'] = $result[0]['user_college'];
					$_SESSION['login_state'] = $result[0]['user_state'];
					$_SESSION['login_country'] = $result[0]['user_country'];
					echo "<script language=\"JavaScript\">\n";
					echo "window.location='../main/home.php";
					echo "'";
					echo "</script>";
				}
				else if ($result[0]['user_group']=="admin") {
					$_SESSION['login_name'] = "$user_name";
					$_SESSION['login_type'] = 'admin';
					
					$_SESSION['login_email'] = $result[0]['user_email'];
					$_SESSION['login_fullname'] = $result[0]['user_fullname'];
					$_SESSION['login_gender'] = $result[0]['user_gender'];
					$_SESSION['login_phone'] = $result[0]['user_phone'];
					$_SESSION['login_college'] = $result[0]['user_college'];
					$_SESSION['login_state'] = $result[0]['user_state'];
					$_SESSION['login_country'] = $result[0]['user_country'];
					echo "<script language=\"JavaScript\">\n";
					echo "window.location='../main/home-admin.php";
					echo "'";
					echo "</script>";
				}
				else {
					echo "<script language=\"JavaScript\">\n";
					echo "alert('Your account user group cannot be determined. \\n\\nPlease contact administrator.\\n');\n";
					echo "window.location='login.html'";
					echo "</script>";
				
				}
			}else{
				echo "<script language=\"JavaScript\">\n";
					echo "alert('Your account is not active. \\n\\nPlease contact administrator.\\n');\n";
					echo "window.location='login.html'";
					echo "</script>";
			}
		}
		mysqli_close($con);
	}
?>