<?php
	//Defining the varible to connect the database
	define('HOST','sql12.freemysqlhosting.net:3306');
	define('USER','sql12180864');
	define('PASS','MUuJ4pzGYS');
	define('DB','sql12180864');
	
	//connect the database, if failed, output unable to connect
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect Database');
?>