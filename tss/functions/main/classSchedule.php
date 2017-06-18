<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ONTIME ! | Class Schedule </title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="bootstrap.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<script type = "text/javascript">
			<?php session_start(); ?>
			<?php require_once 'db_Instruction/get_timetable.php'; ?>
			<?php require_once 'db_Instruction/get_todolist.php'; ?>
			<?php require_once 'db_Instruction/get_reminder.php'; ?>
			var my_login_name = "<?php echo $_SESSION['login_name']; ?>"
			var my_login_type = "<?php echo $_SESSION['login_type']; ?>"
			var timetable_array = <?php echo json_encode($timetable_result); ?>;
			var todo_array = <?php echo json_encode($todolist_result); ?>;
			var reminder_array = <?php echo json_encode($reminderlist_result); ?>;
			if(my_login_type.length == 0 ){
				window.location='../login/login.html';
			}
			
			function deleteTimetable(idnum) {
				$.post('db_Instruction/delete_timetable.php', {changeID: idnum});
				alert("Timetable deleted!");
				window.location='classSchedule.php';
			}
		</script>
		<style type = "text/css">
		button .comment { display: none; }
		button:hover .replies { display: none; }
		button:hover .comment { display: inline; }
		</style>
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
					<h1>Class Schedule</h1>
				</div>
			</div>
			<div class="row">	
			<div class="row-fluid">
				<div class="col-lg-3">
					<div class="box-panel short-div">
						<div class="box-panel-title" >
							To-do List
							<a href="addtask.php" class="btn-add glyphicon"> + </a>
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
							<a href="addreminder.php" class="btn-add glyphicon"> + </a>
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
						Timetable
						<a class="btn-update" href="modifyschedule.php"> Update </a>
					</div>
					<hr>
					<table class="table table-timetable" style="width: 90%; margin-left:5%;">
						<thead>
							<tr>
								<th >     </th>
								<th style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'>MON</th>
								<th style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'>TUE</th>
								<th style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'>WED</th>
								<th style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'>THU</th>
								<th style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'>FRI</th>
							</tr>
						<thead>
						<tbody>
						<script type = "text/javascript">
							for(var i = 8; i < 18; i++){
								document.write("<tr>");
								var freetime = true;
								var tempT = i;
								if(tempT>=12){
									if(tempT>12)
										tempT = tempT -12;
									document.write("<th>"+ tempT +"pm</th>");
								}else{
									document.write("<th>"+ tempT +"am</th>");
								}
								<!--monday-->
								for(var j=0; j < timetable_array.length; j++){
									if(timetable_array[j]["timetable_Day"] == "monday" &&
									timetable_array[j]["timetable_Time"].slice(0,-6) == i){
										document.write("<td style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'><button onclick='deleteTimetable(" + timetable_array[j]["timetable_ID"] + ")' type='button' style='min-width:115px;max-width:115px;min-height:70px;width:auto;height:auto;'><span style='text-transform: uppercase;' class='replies'>");
										document.write("<strong>"+ timetable_array[j]["timetable_Class"] + "</strong><br>" + timetable_array[j]["timetable_Venue"] + "</span>");
										document.write("<span class='comment'>Delete</span></button></td>");

										//document.write("<td><strong>"+ timetable_array[j]["timetable_Class"]+"</strong><br>"+timetable_array[j]["timetable_Venue"]+"</td>");
										freetime = false;
										break;
									}
								}
								if(freetime)
									document.write("<td style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'></td>");
								
								<!--tuesday-->
								freetime = true;
								for(var j=0; j < timetable_array.length; j++){
									if(timetable_array[j]["timetable_Day"] == "tuesday" &&
									timetable_array[j]["timetable_Time"].slice(0,-6) == i){
										document.write("<td style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'><button onclick='deleteTimetable(" + timetable_array[j]["timetable_ID"] + ")' type='button' style='max-width:115px;min-width:115px;min-height:70px;width:auto;height:auto;'><span style='text-transform: uppercase;' class='replies'>");
										document.write("<strong>"+ timetable_array[j]["timetable_Class"] + "</strong><br>" + timetable_array[j]["timetable_Venue"] + "</span>");
										document.write("<span class='comment'>Delete</span></button></td>");

										//document.write("<td><strong>"+ timetable_array[j]["timetable_Class"]+"</strong><br>"+timetable_array[j]["timetable_Venue"]+"</td>");
										freetime = false;
										break;
									}
								}
								if(freetime)
									document.write("<td style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'></td>");
								
								<!--wednesday-->
								freetime = true;
								for(var j=0; j < timetable_array.length; j++){
									if(timetable_array[j]["timetable_Day"] == "wednesday" &&
									timetable_array[j]["timetable_Time"].slice(0,-6) == i){
										document.write("<td style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'><button onclick='deleteTimetable(" + timetable_array[j]["timetable_ID"] + ")' type='button' style='max-width:115px;min-width:115px;min-height:70px;width:auto;height:auto;'><span style='text-transform: uppercase;' class='replies'>");
										document.write("<strong>"+ timetable_array[j]["timetable_Class"] + "</strong><br>" + timetable_array[j]["timetable_Venue"] + "</span>");
										document.write("<span class='comment'>Delete</span></button></td>");

										//document.write("<td><strong>"+ timetable_array[j]["timetable_Class"]+"</strong><br>"+timetable_array[j]["timetable_Venue"]+"</td>");
										freetime = false;
										break;
									}
								}
								if(freetime)
									document.write("<td style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'></td>");
								
								<!--thursday-->
								freetime = true;
								for(var j=0; j < timetable_array.length; j++){
									if(timetable_array[j]["timetable_Day"] == "thursday" &&
									timetable_array[j]["timetable_Time"].slice(0,-6) == i){
										document.write("<td style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'><button onclick='deleteTimetable(" + timetable_array[j]["timetable_ID"] + ")' type='button' style='max-width:115px;min-width:115px;min-height:70px;width:auto;height:auto;'><span style='text-transform: uppercase;' class='replies'>");
										document.write("<strong>"+ timetable_array[j]["timetable_Class"] + "</strong><br>" + timetable_array[j]["timetable_Venue"] + "</span>");
										document.write("<span class='comment'>Delete</span></button></td>");

										//document.write("<td><strong>"+ timetable_array[j]["timetable_Class"]+"</strong><br>"+timetable_array[j]["timetable_Venue"]+"</td>");
										freetime = false;
										break;
									}
								}
								if(freetime)
									document.write("<td style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'></td>");
								
								<!--friday-->
								freetime = true;
								for(var j=0; j < timetable_array.length; j++){
									if(timetable_array[j]["timetable_Day"] == "friday" &&
									timetable_array[j]["timetable_Time"].slice(0,-6) == i){
										document.write("<td style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'><button onclick='deleteTimetable(" + timetable_array[j]["timetable_ID"] + ")' type='button' style='max-width:115px;min-width:115px;min-height:70px;width:auto;height:auto;'><span style='text-transform: uppercase;' class='replies'>");
										document.write("<strong>"+ timetable_array[j]["timetable_Class"] + "</strong><br>" + timetable_array[j]["timetable_Venue"] + "</span>");
										document.write("<span class='comment'>Delete</span></button></td>");

										//document.write("<td><strong>"+ timetable_array[j]["timetable_Class"]+"</strong><br>"+timetable_array[j]["timetable_Venue"]+"</td>");
										freetime = false;
										break;
									}
								}
								if(freetime)
									document.write("<td style='min-width:125px;max-width:130px;min-height:50px;width:auto;height:auto;width: 100%;'></td>");
								
								document.write("</tr>");
							}
						</script>
					</tbody>
				</table>	
				</div>
				
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
</script>