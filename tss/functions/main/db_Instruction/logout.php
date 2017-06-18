<?php
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
	
	echo "<script language=\"JavaScript\">\n";
	echo "alert('Logout successsful');\n";
	echo "window.location='../../login/login.html'";
	echo "</script>";
?>