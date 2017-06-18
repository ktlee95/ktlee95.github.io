<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ONTIME ! | About </title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="bootstrap.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type = "text/javascript">
			<?php session_start(); ?>
			var my_login_name = "<?php echo $_SESSION['login_name']; ?>"
			var my_login_type = "<?php echo $_SESSION['login_type']; ?>"
			if(my_login_type.length == 0 ){
				window.location='../login/login.html';
			}
		</script>
	</head>
    <!-- END HEAD -->
	
	<body>
	<div class="header-top">
		<ul>
			<script type="text/javascript">
				if(my_login_type == 'student'){
					document.write("<li><a href='home.php'> Home </a></li>");
					document.write("<li><a href='classSchedule.php'> Class Schedule </a></li>");
					document.write("<li><a href='todolist.php' type='active'> Task </a></li>");
				}else{
					document.write("<li><a href='home-admin.php'> User Information </a></li>");
				}
			</script>
			
			
			<li style="float:right"><a class="" href="db_Instruction/logout.php"> Logout </a></li>
			<li style="float:right"><a class="" href="about.php"> About </a></li>
			<script type = "text/javascript">
				if(my_login_type == 'student'){
					document.write("<li style='float:right'><a class='active' href='profile.php'>Hi," + my_login_name + "</a></li>");
				}
			</script>
		</ul>
	</div>
	<div class="container">
		<div class="content">
			<div class="row">
				<div class="col-md-12 content-title"> 
					<h1>About</h1>
				</div>
			</div>
			<div class="col-md-2"> </div>
			
				<div class="box-panel col-md-8">
					<div class="box-panel-title">
						ONTIME! Personal Daily Task Scheduling System
					</div>
					<hr>
					<div class="row">
						<section class="col col-md-12">
						<p style="margin: 0px 25px;">
						ONTIME! is a web application that can help to manage the daily routine or tasks for Multimedia University student.
						This personal daily task scheduling system can help student to complete their daily task more efficiently. 
						ONTIME! is developed with several functionalities for multiple users to access this system.
						</p><br>
						<p style="margin: 0px 25px;">
							This system provided 5 functionality as below:
						</p>
						<p>
							<ul class="about" style="margin: 0px 25px;">
								<li>User Management</li>
								<li>Timetable Scheduling</li>
								<li>Task Management</li>
								<li>User Registration & Login</li>
								<li>Notification</li>
							</ul>
						</p>
						</section>
					</div>
				</div>
			
		</div> <!-- end of content -->
	</div> <!-- end of container -->
	</body>

</html>