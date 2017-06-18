<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ONTIME ! | Profile </title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="bootstrap.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<script type = "text/javascript">
			<?php session_start(); ?>;
			var my_login_name = "<?php echo $_SESSION['login_name']; ?>";
			var my_login_type = "<?php echo $_SESSION['login_type']; ?>";
			
			var my_login_email = "<?php echo $_SESSION['login_email']; ?>";
			var my_login_fullname = "<?php echo $_SESSION['login_fullname']; ?>";
			var my_login_gender = "<?php echo $_SESSION['login_gender']; ?>";
			var my_login_phone = "<?php echo $_SESSION['login_phone']; ?>";
			var my_login_college = "<?php echo $_SESSION['login_college']; ?>";
			var my_login_state = "<?php echo $_SESSION['login_state']; ?>";
			var my_login_country = "<?php echo $_SESSION['login_country']; ?>";
			if(my_login_type.length == 0 ){
				window.location='../login/login.html';
			}
		</script>
	</head>
    <!-- END HEAD -->
	
	<body>
	<div class="header-top">
		<ul>
			
			<li><a href="home.php"> Home </a></li>
			<li><a href="classSchedule.php"> Class Schedule </a></li>
			<li><a href="todolist.php" type="active"> Task </a></li>
			
			<li style="float:right"><a class="" href="db_Instruction/logout.php"> Logout </a></li>
			
			<li style="float:right"><a class="" href="about.php"> About </a></li>
			<script type = "text/javascript">
				document.write("<li style='float:right'><a class='active' href='profile.php'>Hi," + my_login_name + "</a></li>");
			</script>
		</ul>
	</div>
	<div class="container">
		<div class="content">
			<div class="row">
				<div class="col-md-12 content-title"> 
					<h1>My Profile</h1>
				</div>
			</div>
			<div class="col-md-2"> </div>
			
				<div class="box-panel col-md-8">
					<div class="box-panel-title">
						Edit Profile
					</div>
					<hr>
					<div class="row">
						<section class="col col-md-12">
							<div class="form-group">
								<form class="form-group" action="db_Instruction/update_profile.php" method="post">
								
								<label class="form-label"> Username: </label>
									<script type="text/javascript">
										document.write("<input id='usernameUpdate' name='username_update' class='form-control' value='" + my_login_name + "' readonly style='width: 50%;'> </input>");
									</script>
									
								<label class="form-label"> Full Name: </label>	
									<script type="text/javascript">
										document.write("<input id='fullnameUpdate' name='fullname_update' class='form-control' placeholder='Unknown' style='width: 50%;'> </input>");
									</script>
									
								
								<label class="form-label"> E-mail: </label>
									<script type="text/javascript">
										document.write("<input id='emailUpdate' name='email_update' class='form-control' type='email' value='" + my_login_email + "' readonly style='width: 50%;'> </input>");
									</script>
								
								<label class="form-label"> Password: </label>
									<!--<button type="button" class="btn btn-default btn-sm" style="margin-bottom: 8px;">
									  <span class="glyphicon gly-rotate-45 glyphicon-pencil"></span> Edit
									</button>-->							
									<script type = "text/javascript">
										document.write("<input id='passwordUpdate' name='password_update' type='password' class='form-control' placeholder='&YGF$E21gsq' style='width: 50%;'> </input>");
									</script>
									
								<label class="form-label"> Gender: </label>
									<script type="text/javascript">
										document.write("<select id='genderUpdate' name='gender_update' class='form-control form-option' style='width: 20%;' style='display: inline;'>");
										document.write("<option>Unknown</option>");
										document.write("<option>Male</option>");
										document.write("<option>Female</option>");
										document.write("</select>");
									</script>
									
								<label class="form-label"> Phone Number (XXX-XXXXXXX): </label>	
									<input id='phoneUpdate' name='phone_update' class='form-control' type='tel' style='width: 40%;' pattern='\d{3}-\d{7}' placeholder='Unknown' />
									
								<label class="form-label"> College Name: </label>	
									<script type="text/javascript">
										document.write("<input id='collegeUpdate' name='college_update' class='form-control' type='text' placeholder='Unknown' />");
									</script>
									
								<label class="form-label"> State: </label>	
									<script type="text/javascript">
										document.write("<input id='stateUpdate' name='state_update' class='form-control' type='text' placeholder='Unknown' />");
									</script>
									
								<label class="form-label"> Country: </label>	
									<script type="text/javascript">
										document.write("<input id='countryUpdate' name='country_update' class='form-control' type='text' placeholder='Unknown' />");
									</script>
									
								
								
								<input class="btn-submit" type="submit" style="cursor: pointer;padding-top: 3px;" value = "Save">
								<input type ="hidden" name = "tasktypeInput" value = "To-do List">
								</form>
							</div>
						</section>
					</div>
				</div>
			
		</div> <!-- end of content -->
	</div> <!-- end of container -->
	</body>

</html>
<script>
	if(my_login_fullname!= ""){
		var fullname_id = document.getElementById("fullnameUpdate" );
		fullname_id.placeholder = my_login_fullname;
	}
	
	if(my_login_gender!= ""){
		var gender_id = document.getElementById("genderUpdate" );
		gender_id.value = my_login_gender;
	}
	
	if(my_login_phone!= ""){
		
		var phone_id = document.getElementById("phoneUpdate" );
		phone_id.placeholder = my_login_phone;
	}
	
	if(my_login_college!= ""){
		var college_id = document.getElementById("collegeUpdate" );
		college_id.placeholder = my_login_college;
	}
	
	if(my_login_state!= ""){
		var state_id = document.getElementById("stateUpdate" );
		state_id.placeholder = my_login_state;
	}
	
	if(my_login_country!= ""){
		var country_id = document.getElementById("countryUpdate" );
		country_id.placeholder = my_login_country;
	}


</script>