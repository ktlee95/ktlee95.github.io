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
					<h1>Task</h1>
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
						Add Reminder
					</div>
					<hr>
					<div class="row">
						<section class="col col-md-12">
							<div class="form-group">
							<form class="form-group" action="db_Instruction/createTask.php" method="post">
								<label class="form-label"> Due date: </label>	
									<input required class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/ style="width: 30%;"> </input>
								<label class="form-label"> Time: </label>
								<div>
									<select name="hourInput" class="form-option" style="width: 13%;" placeholder="hh" style="display: inline;">
											<option>08</option>
											<option>09</option>
											<option>10</option>
											<option>11</option>
											<option>12</option>
											<option>13</option>
											<option>14</option>
											<option>15</option>
											<option>16</option>
											<option>17</option>
										</select>
									<select name = "minuteInput" class="form-option" style="width: 13%;" placeholder="mm">
											<option>00</option>
											<option>01</option>
											<option>02</option>
											<option>03</option>
											<option>04</option>
											<option>05</option>
											<option>06</option>
											<option>07</option>
											<option>08</option>
											<option>09</option>
											<option>10</option>
											<option>11</option>
											<option>12</option>
											<option>13</option>
											<option>14</option>
											<option>15</option>
											<option>16</option>
											<option>17</option>
											<option>18</option>
											<option>19</option>
											<option>20</option>
											<option>21</option>
											<option>22</option>
											<option>23</option>
											<option>24</option>
											<option>25</option>
											<option>26</option>
											<option>27</option>
											<option>28</option>
											<option>29</option>
											<option>30</option>
											<option>31</option>
											<option>32</option>
											<option>33</option>
											<option>34</option>
											<option>35</option>
											<option>36</option>
											<option>37</option>
											<option>38</option>
											<option>39</option>
											<option>40</option>
											<option>41</option>
											<option>42</option>
											<option>43</option>
											<option>44</option>
											<option>45</option>
											<option>46</option>
											<option>47</option>
											<option>48</option>
											<option>49</option>
											<option>50</option>
											<option>51</option>
											<option>52</option>
											<option>53</option>
											<option>54</option>
											<option>55</option>
											<option>56</option>
											<option>57</option>
											<option>58</option>
											<option>59</option>
										</select>
								</div>
								<label class="form-label"> Title: </label>	
									<input required name = "titleInput" class="form-control" placeholder="Web App Lab Test"></input>
								<label class="form-label"> Description: </label>
									<textarea name = "descriptionInput" class="form-control" placeholder="Chapter 1 to 8" rows="5"></textarea>
								<input type ="hidden" name = "tasktypeInput" value = "Reminder">
								<input class="btn-submit" type="submit" style="cursor: pointer;padding-top: 3px;" value = "Add">
							</form>
							</div>
						</section>
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