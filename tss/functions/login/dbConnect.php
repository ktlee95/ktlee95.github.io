<?php
	//Defining the varible to connect the database
	define('HOST','localhost');
	define('USER','root');
	define('PASS','');
	define('DB','tss');
	
	//connect the database, if failed, output unable to connect
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect Database');
?>