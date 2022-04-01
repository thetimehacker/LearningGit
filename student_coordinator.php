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
					<h1 style="text-align: center;">Student Coordinator</h1>
				</div>
				<div class="add_club_coordinator" style="margin-bottom: 20px;">
					<h4 style="text-align: center;">Add New Activity</h4>
					<form id="activityform">
						<div class="form-group">
							<input type="text" id="title" placeholder="Title" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="text" placeholder="dd/mm/yyyy"id="date" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="text" id="venue" placeholder="Venue" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="text" id="eligibility" placeholder="Eligibility" class="form-control" required>
						</div>
						<div class="form-group">
							<textarea id="description" placeholder="Description" class="form-control" required rows="4"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Submit" class="btn btn-success btn-block" onclick="savedata();">
						</div>	
					</form>
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

	function savedata(){
		var title=document.getElementById('title').value;
		var date=document.getElementById('date').value;
		var venue=document.getElementById('venue').value;
		var eligibility=document.getElementById('eligibility').value;
		var description=document.getElementById('description').value;

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
