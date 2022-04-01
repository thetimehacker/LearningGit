<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> -->

	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<!-- shubham kumar rawat -->
	<section id="adminform" class="section_class">
		<div class="col-sm-12">
			<div class="col-sm-4"></div>
			
			<div class="col-sm-4">
				<div class="admin_heading">
					<h1 style="text-align: center;">Administrator</h1>
				</div>
				<div class="add_club_coordinator" style="margin-bottom: 20px;">
					<h4 style="text-align: center;">New Club coordinator</h4>
					<form id="adminform">
						<div class="form-group">
							<input type="text" id="username" placeholder="User Id" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="text" id="email" placeholder="Email" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="password" id="password1" placeholder="Password" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="password" id="password2" placeholder="Confirm Password" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="submit" value="Submit" class="btn btn-success btn-block" onclick="savedata();">
						</div>	
					</form>
				</div>

				<div class="admin_tick" style="text-align: left;margin-bottom: 20px;">
					<!-- //create php  -->
					<h4 style="text-align: center;">Remove Club coordinator</h4>
					<?php
						session_start();
						
						include('connection.php');
						$check=$db->prepare('SELECT * FROM Signup_form_data WHERE c_value="club_coordinator"');
						$check->execute();
						if($check->rowcount()==0){
							echo 'Empty Table'; //->> 0 for account does not exist
						}

						else{
							while($datarow=$check->fetch()){

					?>

					<form id="adminform" action="adminhome.php" method="post">
						<div class="form-group">
							<label><?php echo $datarow['user_name']; ?></label>

						    <input type="hidden" id="user_label2" value=<?php echo $datarow['email'];?> >

							<input type="submit" value="Remove" onclick="remove();" 
								style="text-decoration:none;
								background: red;
								border: none;
								border-radius: 5px;
								padding: 5px;
								color: white;
								margin-left: 10px;">

						</div>
						
					</form> 

					<?php
							}
						}
					?>

				</div>

				<div class="approve_activities" style="text-align: left;margin-bottom: 20px;">
					<!-- //create php  -->
					<h4 style="text-align: center;">Approve Activities</h4>
					<?php

						include('connection.php');
						$check=$db->prepare('SELECT * FROM student_coordinator WHERE flag=0');
						$check->execute();
						if($check->rowcount()==0){
							echo 'Empty Table'; //->> 0 for account does not exist
						}

						else{
							while($datarow=$check->fetch()){

					?>

					<form id="adminform">
						<div class="form-group">
							<label ><?php echo $datarow['title']; ?></label>
							<input type="hidden" id="activity_title" value=<?php echo $datarow['title']; ?> >
							<input type="submit" value="Approve" onclick="approve();" style="text-decoration:none;
								background:green;
								border: none;
								border-radius: 5px;
								padding: 5px;
								color: white;
								margin-left: 10px;">

						</div>
						
					</form> 

					<?php
							}
						}
					?>

				</div>

				<div class="sign_out">
					<a href="login.php" style="
						padding: 10px 10px;
					    border: 1px solid black;
					    background: black;
					    color: white;
					    border-radius: 10px;
					    text-decoration: none;
					    display: inherit;
					    text-align: center;
					    text-decoration: none;
					    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
					    margin-bottom: 30px;">

						Sign Out

					</a>
				</div>




			</div>

			<div class="col-sm-4"></div>
		</div>
	</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

	function approve(){
		var title=document.getElementById('activity_title').value;
		$.ajax(
			{
				type:"POST",
				url:"ajax/admin_approve.php",
				data:{title:title},
				success:function(data){
					
					if(data == 1){
						//activity approved
						alert('Activity Approved');
						open("adminhome.php","_self"); //refresh the page

					}
					else{
						alert('Some problem encountered!');
					}
				}
			}
			);
	}

	function remove(){
		var username=document.getElementById('user_label2').value;
		// var username=x;
		$.ajax(
			{
				type:"POST",
				url:"ajax/admin_remove_club_coordinator.php",
				data:{username:username},
				success:function(data){
					
					if(data == 1){
						//user removed
						alert('Successfully removed club coordinator!!!');
						open("adminhome.php","_self"); //refresh the page

					}
					else{
						alert('Some problem encountered!');
					}
				}
			}
			);
	}

	function savedata(){
		var username=document.getElementById('username').value;
		var pass1=document.getElementById('password1').value;
		var pass2=document.getElementById('password2').value;
		var email=document.getElementById('email').value;

		if(username!="" && pass1!="" && pass1==pass2 && email!=""){
			
			//sending data to backend
			//using ajax post
			// alert('sending data');
			$.ajax(
			{
				type:"POST",
				url:"ajax/admin.php",
				data:{username:username,password:pass1,email:email}, //cvalue will be passed in ajax
				success:function(data){
					//we are getting the result in form of data from the signup php
					if(data == 0){
						alert('User already exists!');
					}
					else if(data == 1){
						//account created
						alert('Successfully created club coordinator!!!');
						open("adminhome.php","_self"); //refresh the page

					}
					else if(data == 2){
						alert('Some problem encountered!');
					}
					else{
						alert(data);
					}
				}
			}
			);

		}
		else 
		{
			alert("Invalid Input!");
		}
		
	}
	
</script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
</body>
</html>	
