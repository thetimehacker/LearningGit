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
					<h2>Log In</h2>
					<form id="signupform">
						<input type="text" id="username" placeholder="User Id" class="form-control" required><br>
						<input type="password" id="password" placeholder="Password" class="form-control" required><br>
						<input type="submit" value="Submit" class="btn btn-success btn-block" onclick="savedata();">
					</form> 
				</div>
				<hr>
				<div class="login_button">
					<!-- <button id="login_button" class="btn btn-lg btn-block" type="submit" value="Log In" onclick="signup();">Sign Up</button> -->
					<a href="index.php" style="
						padding: 10px 10px;
					    border: 1px solid black;
					    background: black;
					    color: white;
					    border-radius: 10px;
					    text-decoration: none;
					    display: inherit;
					    text-align: center;">

						Sign Up

					</a>
				</div>
			</div>
			
			<div class="col-sm-4"></div>
		</div>
	</section>

</script>	
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
</body>
</html>
