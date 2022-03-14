<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
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
					<h2>Sign Up</h2>
					<form id="signupform">
						<input type="text" id="username" placeholder="User Id" class="form-control" required><br>
						<input type="password" id="password1" placeholder="Password" class="form-control" required><br>
						<input type="password" id="password2" placeholder="Confirm Password" class="form-control" required><br>
						<input type="submit" value="Submit" class="form-control" onclick="savedata();">
					</form> 
				</div>
			</div>
			
			<div class="col-sm-4"></div>
		</div>
	</section>
				
<script type="text/javascript">
	
	function savedata(){
		var username=document.getElementById('username').value;
		var pass1=document.getElementById('password1').value;
		var pass2=document.getElementById('password2').value;
		// alert(username);
		if(username!="" && pass1!="" && pass1==pass2){
			
			//sending data to backend
			//using ajax post
			
			$.ajax(
			{
				type:"POST",
				url:"data.php",
				data:{username:username,password:pass1},
				success:function(data){
					alert(data);
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