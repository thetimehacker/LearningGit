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
				<div class="loginform">
					<div class="contain_login_form">
						<div class="Heading">
							<h2 style="margin-bottom: 20px;">Log In</h2>
						</div>
						<form id="loginform">
							<div class="form-group">
								<input type="text" id="username" placeholder="Uid / Email" class="form-control" required>
							</div>
							<div class="form-group">
								<input type="password" id="password" placeholder="Password" class="form-control" required>
							</div>

							<!-- Submit Button -->
							<div class="form-group">
								<input type="submit" value="Submit" class="btn btn-success btn-block" onclick="savelogindata();">
							</div>	

						</form> 
					</div>
					<div class="horizontal_line">
						<hr>
					</div>
					<div class="signup_button">
						<a href="index.php" style="
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

							Create Account

						</a>
					</div>
				</div>
			</div>
			
			<div class="col-sm-4"></div>
		</div>
	</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	
	
</script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
</body>
</html>
