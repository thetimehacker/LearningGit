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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="adminhome.php">Admin</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="adminhome.php">Home</a></li>
      <li class="active"><a href="add.php"> Add</a></li>
      <li><a href="remove.php">Remove</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="fa fa-sign-out "></span>Logout</a></li>
    </ul>
  </div>
</nav>

	<!-- shubham kumar rawat -->
	<section id="adminform" class="section_class">
		<div class="col-sm-12">
			<div class="col-sm-4">
			</div>
			
			<div class="col-sm-4">
				<div class="admin_heading">
						<h1 style="text-align: center;">Add Club Coordinator</h1>
					</div>
					<div class="add_club_coordinator" style="margin-bottom: 20px;margin-top: 20px;">
						<form id="adminform">
							<div class="form-group">
								<input type="text" id="uid" placeholder="User Id" class="form-control" required>
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
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	function savedata(){
		var uid=document.getElementById('uid').value;
		var pass1=document.getElementById('password1').value;
		var pass2=document.getElementById('password2').value;
		var email=document.getElementById('email').value;

		if(uid!="" && pass1!="" && pass1==pass2 && email!=""){
			
			//sending data to backend
			//using ajax post
			// alert('sending data');
			$.ajax(
			{
				type:"POST",
				url:"ajax/admin.php",
				data:{uid:uid,password:pass1,email:email}, //cvalue will be passed in ajax
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
<!-- <script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script> -->
</body>
</html>	
