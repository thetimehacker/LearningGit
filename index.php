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
	<section id="signupform" class="section_class">
		<div class="col-sm-12">
			<div class="col-sm-4"></div>
			
			<div class="col-sm-4">
				<div class="contain_form">
					<div class="Heading">
						<h2 style="margin-bottom: 20px;">Sign Up</h2>
					</div>
					<form id="signupform">
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


						<!-- Radio button for selection of CLUB AND STUDENT COORDINATOR -->
						<!-- Name attribute is important to make a group - and each group in a radio button can have a single selection --- if not given then it will act like a checkbox with multiple selections -->
						<div class="radio_selection form-group">
							<input type="radio" id="none" name="coordinator_selection" value="none" checked>
							<label for="none">None</label>

							<input type="radio" id="club_coordinator" name="coordinator_selection" value="club_coordinator">
							<label for="club_coordinator">Club Coordinator</label>

							<input type="radio" id="student_coordinator" name="coordinator_selection" value="student_coordinator">
							<label for="student_coordinator">Student Coordinator</label>
						</div>

						<!-- Submit Button -->
						<div class="form-group">
							<input type="submit" value="Submit" class="btn btn-success btn-block" onclick="savedata();">
						</div>	

					</form> 
				</div>
				<div class="horizontal_line">
					<hr>
				</div>
				<div class="login_button">
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
					    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

						Log In

					</a>
				</div>
			</div>
			
			<div class="col-sm-4"></div>
		</div>
	</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	function savedata(){
		var username=document.getElementById('username').value;
		var pass1=document.getElementById('password1').value;
		var pass2=document.getElementById('password2').value;
		var email=document.getElementById('email').value;

		
		var coordinator = document.getElementsByName('coordinator_selection');
		var c_value="";
		for(var i = 0; i < coordinator.length; i++){
		    if(coordinator[i].checked){
		        c_value = coordinator[i].value;
		    }
		}

		// alert(username);
		if(username!="" && pass1!="" && pass1==pass2 && c_value!="" && email!=""){
			
			//sending data to backend
			//using ajax post
			alert('sending data');
			$.ajax(
			{
				type:"POST",
				url:"ajax/signup.php",
				data:{username:username,password:pass1,c_value:c_value,email:email},
				success:function(data){
					//we are getting the result in form of data from the signup php
					if(data == 0){
						alert('User already exists!');
					}
					else if(data == 1){
						//account created
						alert('Successfully created account!!!');

						//--->to go to login page
						//Approach 1 -- opens in same window
						// window.location.href = "login.php";

						//Approach 2 -- opens in a new window
						// open("login.php");

						//solution to Approach 2
						open("login.php","_self");

					}
					else if(data == 2){
						alert('Some problem encountered!');
					}
					else if(data == 3){
						alert('Inside validation');
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
