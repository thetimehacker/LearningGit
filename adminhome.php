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
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 20px;
text-align: left;
}
th {
/*background-color: #588c7e;*/
/*color: white;*/
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
  <style>
    *{
        list-style: none;
        text-decoration: none;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Open Sans', sans-serif;
    }

    body{
        background: #f5f6fa;
    }

    .wrapper .sidebar{
        background: rgb(5, 68, 104);
        position: fixed;
        top: 0;
        left: 0;
        width: 225px;
        height: 100%;
        padding: 20px 0;
        transition: all 0.5s ease;
    } 
    .wrapper .sidebar ul li a{
        display: block;
        padding: 13px 30px;
        border-bottom: 1px solid #10558d;
        color: rgb(241, 237, 237);
        font-size: 16px;
        position: relative;
    }

    .wrapper .sidebar ul li a .icon{
        color: #dee4ec;
        width: 30px;
        display: inline-block;
    }
    .wrapper .sidebar ul li a:hover,
    .wrapper .sidebar ul li a.active{
        color: #0c7db1;

        background:white;
        border-right: 2px solid rgb(5, 68, 104);
    }

    .wrapper .sidebar ul li a:hover .icon,
    .wrapper .sidebar ul li a.active .icon{
        color: #0c7db1;
    }

    .wrapper .sidebar ul li a:hover:before,
    .wrapper .sidebar ul li a.active:before{
        display: block;
    }

    .split {
    height: 100%;
  
    position: fixed;
    z-index: 1;
    top: 0;
    overflow-x: hidden;
    padding-top: 20px;
  }

  /* Control the left side */
  .left {
    left: 0;
      width: 14%;
    background-color: #111;
  }

  /* Control the right side */
  .right {
    right: 0;
    width: 86%;
    background-color: white;
  }

  /* If you want the content centered horizontally and vertically */
  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
  }

  /* Style the image inside the centered container, if needed */
  .centered img {
    width: 150px;
    border-radius: 50%;
  }
  </style>

</head>

<body> 
   <div class="split left">
    <div class="wrapper">
        <!--Top menu -->

        <div class="sidebar">
           <ul>
                <li>
                    <a href="main.php"  class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="add_club.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">New Club</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Events</span>
                    </a>
                </li>
                <li>
                    <a href="addCoordinator.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Coordinator</span>
                    </a>
                </li>
               
            </ul>
        </div>

  </div>
  </div>
    <div class="split right">
    	<section id="adminform" class="section_class">
		<div class="col-sm-12">
			
			<div class="col-sm-6">
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
			<div class="col-sm-6">
					<div class="admin_heading">
						<h1 style="text-align: center;">Remove Club Coordinator</h1>
					</div>
			
					<div class="admin_tick" style="text-align: left;margin-bottom: 20px;">
						<!-- //create php  -->
						<!-- <h4 style="text-align: center;">Remove Club coordinator</h4> -->
						<table>
							<tr>
							<th>Id</th>
							<th>Username</th>
							<th>Password</th>
							</tr>
						<!-- </table> -->
						<?php
							session_start();
							
							include('connection.php');
							$check=$db->prepare('SELECT * FROM signup where value="');
							$check->execute();
							if($check->rowcount()==0){
								echo 'Empty Table'; //->> 0 for account does not exist
							}

							else{
								while($datarow=$check->fetch()){
									echo "<tr><td>" . $datarow["sid"]. "</td><td>" . $datarow["uid"] . "</td><td>". $datarow["email"]. "</td></tr>";
								}
								echo "</table>";
								
							}

						?>

					</div>
			</div>
		</div>
	</section>
    </div>


</body>
</html>