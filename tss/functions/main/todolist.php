<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ONTIME ! | Task </title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="bootstrap.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<script type = "text/javascript">
			<?php session_start(); ?>
			<?php require_once 'db_Instruction/get_todolist.php'; ?>
			<?php require_once 'db_Instruction/get_reminder.php'; ?>
			var my_login_name = "<?php echo $_SESSION['login_name']; ?>";
			var my_login_type = "<?php echo $_SESSION['login_type']; ?>";
			var todo_array = <?php echo json_encode($todolist_result); ?>;
			var reminder_array = <?php echo json_encode($reminderlist_result); ?>;
			if(my_login_type.length == 0 ){
				window.location='../login/login.html';
			}
			
			function updateTodo(idnum,val) {
				if(val != "Completed" && val != "Cancelled"){
					$.post('db_Instruction/update_todolist.php', {changeID: idnum, changeStatus: val});
					alert("Status Changed");
					window.location='todolist.php';
				}else{
					$.post('db_Instruction/delete_todo.php', {changeID: idnum});
					alert("To-do deleted");
					window.location='todolist.php';
				}
				
			}
			
			function updateReminder(idnum,val) {
				if(val != "Completed" && val != "Cancelled"){
					$.post('db_Instruction/update_reminder.php', {changeID: idnum, changeStatus: val});
					alert("Status Changed");
					window.location='todolist.php';
				}else{
					$.post('db_Instruction/delete_reminder.php', {changeID: idnum});
					alert("Reminder deleted");
					window.location='todolist.php';
				}
				
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
					<h1>Task</h1>
				</div>
			</div>
		  <div class="row-fluid">
			<div class="col-lg-3">	
				<div class="box-panel short-div">
					<div class="box-panel-title" >
						To-do List
						<a href="addtask.php" class="btn-add" style="padding-bottom: 7px;"> + </a>
					</div>
					<hr>
					<ul>
						<script type = "text/javascript">
							for(var j=0; j < todo_array.length; j++){
								if(todo_array[j]["todo_Status"] != "Cancelled" &&
									todo_array[j]["todo_Status"] != "Completed"){
									var datelist = todo_array[j]["todo_Date"].split("-");
									datelist[0] = datelist[0][2] + datelist[0][3];
									
									var time = todo_array[j]["todo_Time"].split(":");
									var period = "am";
									if(time[0] >= 12)
										period = "pm";
									if(time[0] > 12){
										time[0] = time[0] - 12;
									}

									document.write("<li>");
									document.write("<a style='font-size: 100%; color: green;' href='todolist.php'>" + todo_array[j]["todo_Title"] + "</a>");
									document.write(" "+ datelist[2] + "/" + datelist[1] + "/" + datelist[0] + " - <strong>" + time[0] + period + "</strong>");
									document.write("</li>");
								}
							}
						</script>
					</ul>
				</div>
				
				<div class="box-panel short-div">
					<div class="box-panel-title">
						Reminder
						<a href="addreminder.php" class="btn-add" style="padding-bottom: 7px;"> + </a>
					</div>
					<hr>
					<ul>
						<script type = "text/javascript">
							for(var j=0; j < reminder_array.length; j++){
								if(reminder_array[j]["reminder_Status"] != "Cancelled" &&
									reminder_array[j]["reminder_Status"] != "Completed"){
									var datelist = reminder_array[j]["reminder_Date"].split("-");
									datelist[0] = datelist[0][2] + datelist[0][3];
									
									var time = reminder_array[j]["reminder_Time"].split(":");
									var period = "am";
									if(time[0] >= 12)
										period = "pm";
									if(time[0] > 12){
										time[0] = time[0] - 12;
									}
									document.write("<li><a style='font-size: 100%; color: blue;' href='todolist.php'>" + reminder_array[j]["reminder_Title"] + "</a> " + datelist[2] + "/" + datelist[1] + "/" + datelist[0] + 
									" - <strong>" + time[0] + period + "</strong></li>");
								}
							}
						</script>
					</ul>
				</div>
				
			</div>
			<div class="col-md-1"></div>
			<div class="box-panel col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<div class="box-panel-title">
						All Task
						<a class="btn-update" href="addtask.php">Add Task</a>
					</div>
					<hr>
					<table class="table " style="width: 90%; margin-left:5%;">
						<thead>
							<tr>
								<th>Date</th>
								<th>Task Title</th>
								<th>Task Description</th>
								<th>Time</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<script type = "text/javascript">
								for(var j=0; j < todo_array.length; j++){
									document.write("<tr>");
									document.write("<td>" + todo_array[j]["todo_Date"] + "</td>");
									document.write("<td>" + todo_array[j]["todo_Title"] + "</td>");
									document.write("<td>" + todo_array[j]["todo_Description"] + "</td>");
									document.write("<td>" + todo_array[j]["todo_Time"] + "</td>");
									document.write("<td><select class='form-control' onchange='updateTodo(" + todo_array[j]["todo_ID"] + ",this.value)' id='todoNum"+j+"' style='margin-bottom: 0px; padding: 0px;'>");
									document.write("<option>Processing</option>");
									document.write("<option>Completed</option>");
									document.write("<option>Overdue</option>");
									document.write("<option>Cancelled</option>");
									document.write("</select></td>");
								}
								for(var j=0; j < reminder_array.length; j++){
									document.write("<tr>");
									document.write("<td>" + reminder_array[j]["reminder_Date"] + "</td>");
									document.write("<td>*" + reminder_array[j]["reminder_Title"] + "</td>");
									document.write("<td>" + reminder_array[j]["reminder_Description"] + "</td>");
									document.write("<td>" + reminder_array[j]["reminder_Time"] + "</td>");
									document.write("<td><select class='form-control' onchange='updateReminder(" + reminder_array[j]["reminder_ID"] + ",this.value)' id='reminderNum"+j+"' style='margin-bottom: 0px; padding: 0px;'>");
									document.write("<option>Processing</option>");
									document.write("<option>Completed</option>");
									document.write("<option>Overdue</option>");
									document.write("<option>Cancelled</option>");
									document.write("</select></td>");
								}
							</script>
							
						</tbody>
					</table>
					<p style="padding-left:3em"><strong>* symbol indicate that the task is a reminder</strong></p>
				</div>	
		  </div>
		</div> <!-- end of content -->
	</div> <!-- end of container -->
	</body>

</html>
<script>
	for(var j=0; j < todo_array.length; j++){
		var element = document.getElementById("todoNum"+j+"" );
		element.value = todo_array[j]["todo_Status"];
	}
	
	for(var j=0; j < reminder_array.length; j++){
		var element = document.getElementById("reminderNum"+j+"" );
		element.value = reminder_array[j]["reminder_Status"];
	}

</script>