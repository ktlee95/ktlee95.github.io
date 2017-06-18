<?php
	require_once('../../login/dbConnect.php');
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//Getting values 
		$id = $_POST['changeID'];

		//importing database connection script
		
		//Creating sql query 
		$sql = "DELETE FROM todolist WHERE todo_ID = '$id';";
		
		//Updating database table 
		if(mysqli_query($con,$sql)){
			echo "<script language=\"JavaScript\">\n";
			echo "alert('Status has been changed');\n";
			echo "window.location='../todolist.php'";
			echo "</script>";
		}else{
			echo "<script language=\"JavaScript\">\n";
			echo "alert('Error');\n";
			echo "window.location='../todolist.php'";
			echo "</script>";
		}
		
		
		//closing connection 
		mysqli_close($con);
	}
?>