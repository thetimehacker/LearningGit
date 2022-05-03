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
      <li><a href="add.php"> Add</a></li>
      <li class="active"><a href="remove.php">Remove</a></li>
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
						<h1 style="text-align: center;">Remove Activities</h1>
					</div>
			
					<div class="admin_tick" style="text-align: left;margin-bottom: 20px;">
						<!-- //create php  -->
						<h4 style="text-align: center;">Remove Club coordinator</h4>
						<?php
							session_start();
							
							include('connection.php');
							$check=$db->prepare('SELECT * FROM signup WHERE value="club_coordinator"');
							$check->execute();
							if($check->rowcount()==0){
								echo 'Empty Table'; //->> 0 for account does not exist
							}

							else{
								while($datarow=$check->fetch()){

						?>

						<form id="adminform" action="adminhome.php" method="post">
							<div class="form-group">
								<label><?php echo $datarow['uid']; ?></label>

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

			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">


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

	
</script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
</body>
</html>	
