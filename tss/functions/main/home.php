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
			<?php require_once 'db_Instruction/get_todolist.php'; ?>
			<?php require_once 'db_Instruction/get_reminder.php'; ?>
			var my_login_name = "<?php echo $_SESSION['login_name']; ?>"
			var my_login_type = "<?php echo $_SESSION['login_type']; ?>"
			var todo_array = <?php echo json_encode($todolist_result); ?>;
			var reminder_array = <?php echo json_encode($reminderlist_result); ?>;
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
					<h1>Home</h1>
				</div>
			</div>
			<div class="row">	
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
							<a href="addreminder.php" class="btn-add" > + </a>
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
						News
					</div>
					<hr>
					
					<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img5.jpg" alt="CLS" width="460" height="345">
      </div>

      <div class="item">
        <img src="img6.jpg" alt="Short Film Screening" width="460" height="345">
      </div>
    
      <div class="item">
        <img src="img7.jpg" alt="Korean Food Fair" width="460" height="345">
      </div>

      <div class="item">
        <img src="img8.jpg" alt="Transformer" width="460" height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
					
				</div>
				<div class="col-md-1"></div>
				<div class="box-panel col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<div class="box-panel-title">
						Notifications
					</div>
					<hr>
					<div class="container">
					  <br>
					  <script type="text/javascript">
						var today = new Date();
						var dd = today.getDate();
						var mm = today.getMonth()+1; //January is 0!
						var yyyy = today.getFullYear();

						if(dd<10) {
							dd='0'+dd
						} 

						if(mm<10) {
							mm='0'+mm
						} 
						for(var j=0; j < todo_array.length; j++){
							if(todo_array[j]["todo_Status"] != "Cancelled" &&
								todo_array[j]["todo_Status"] != "Completed"){
								
								todolist_date = new Date( todo_array[j]["todo_Date"]);
								var today_date = new Date();
								var timeDiff = today_date.getTime() - todolist_date.getTime();
								var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
								//var datelist = dayDiff.split("-");
								//datelist[0] = datelist[0][2] + datelist[0][3];
								
								if(todo_array[j]["todo_Status"] == "Overdue"){
									document.write("<div class='alert alert-danger fade in alert-dismissable'>");
									document.write("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>");
									document.write("<strong>Overdue!</strong> Your &quot" + todo_array[j]["todo_Title"] + "&quot is Overdue!");
									document.write("</div>");
								}else{
									if(diffDays > 0){
										document.write("<div class='alert alert-danger fade in alert-dismissable'>");
										document.write("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>");
										document.write("<strong>Overdue!</strong> Your &quot" + todo_array[j]["todo_Title"] + "&quot is Overdue! *Please change status to overdue");
										document.write("</div>");
									}else{
										diffDays = Math.abs(diffDays);
										if(diffDays < 3){
											document.write("<div class='alert alert-warning fade in alert-dismissable'>");
											document.write("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>");
											if(diffDays > 1)
												document.write("<strong>" + diffDays +" days left!</strong> Your &quot" + todo_array[j]["todo_Title"] + "&quot is " + diffDays + " days away from due date!");
											else
												document.write("<strong>" + diffDays +" day left!</strong> Your &quot" + todo_array[j]["todo_Title"] + "&quot is " + diffDays + " day away from due date!");
											document.write("</div>");
										}else if(diffDays < 7){
											document.write("<div class='alert alert-info fade in alert-dismissable'>");
											document.write("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>");
											document.write("<strong>" + diffDays +" days left!</strong> Your &quot" + todo_array[j]["todo_Title"] + "&quot is " + diffDays + " days away from due date!");
											document.write("</div>");
										}else if(diffDays < 14){
											document.write("<div class='alert alert-info fade in alert-dismissable'>");
											document.write("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>");
											document.write("<strong>1 week left!</strong> Your &quot" + todo_array[j]["todo_Title"] + "&quot is 1 week away from due date!");
											document.write("</div>");
										}
									}
								}
								//document.write("<a style='font-size: 100%; color: green;' href='todolist.php'>" + todo_array[j]["todo_Title"] + "</a>");
								//document.write(" "+ datelist[2] + "/" + datelist[1] + "/" + datelist[0] + " - <strong>" + time[0] + period + "</strong>");
								//document.write("</li>");
							}
						}
						</script>
					</div>
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