<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ONTIME ! | Home </title>
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
			<?php require_once 'db_Instruction/get_user.php'; ?>
			var my_login_name = "<?php echo $_SESSION['login_name']; ?>";
			var my_login_type = "<?php echo $_SESSION['login_type']; ?>";
			var user_array = <?php echo json_encode($userlist_result); ?>;
			if(my_login_type.length == 0 ){
				window.location='../login/login.html';
			}
			if(my_login_type == 'student'){
				window.location='home.php';
			}
			function updateUserStatus(nameNum,val) {
				var tempName = "";
				for(var j = 0; j < user_array.length; j++){
					if(j == nameNum){
						tempName = user_array[j]["decrypt_username"];
					}
				}
				$.post('db_Instruction/update_userstatus.php', {changeID: tempName, changeStatus: val});
				alert("Status Changed");
				window.location='home-admin.php';
			}

		</script>
	</head>
    <!-- END HEAD -->
	
	<body>
	<div class="header-top">
		<ul>
			<li><a href="home-admin.php"> User Information </a></li>
			<li style="float:right"><a class="" href="db_Instruction/logout.php"> Logout </a></li>
			<li style="float:right"><a class="" href="about.php"> About </a></li>
		</ul>
	</div>
	<div class="container">
		<div class="content">
			<div class="row">
				<div class="col-md-12 content-title"> 
					<h1>User Information List</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-task" style="width: 100%;">
						<thead>
							<tr>
								<th>No. </th>
								<th>Username</th>
								<th>Email</th>
								<th>Password</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<script type="text/javascript">
								for(var j = 0; j < user_array.length; j++){
									var temp = j + 1;
									document.write("<tr>");
									document.write("<td>"+temp+"</td>");
									document.write("<td>"+user_array[j]["decrypt_username"]+"</td>");
									document.write("<td>"+user_array[j]["user_email"]+"</td>");
									document.write("<td>"+user_array[j]["decrypt_userpassword"]+"</td>");
									document.write("<td>");
									document.write("<select class='form-control' onchange='updateUserStatus(" + j + ",this.value)' id='userNum"+j+"' style='margin-bottom: 0px; padding: 0px;'>");
									document.write("<option>Active</option>");
									document.write("<option>Inactive</option>");
									document.write("</select>");
									document.write("</td>");
									document.write("</tr>");
								}
							</script>
						</tbody>
					</table>
				
				</div>
			</div>
			
		</div> <!-- end of content -->
	</div> <!-- end of container -->
	</body>

</html>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
	for(var j=0; j < user_array.length; j++){
		var element = document.getElementById("userNum"+j+"" );
		element.value = user_array[j]["user_status"];
	}
</script>

<script>
	var slideIndex = 1;
	showDivs(slideIndex);
	
	function plusDivs(n) {
	  showDivs(slideIndex += n);
	}

	function showDivs(n) {
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  if (n > x.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = x.length}
	  for (i = 0; i < x.length; i++) {
		 x[i].style.display = "none";  
	  }
	  x[slideIndex-1].style.display = "block";  
	}
	
	
</script>