<?php

	include('../connection.php');

	$username = $_POST['username'];

		
	$check=$db->prepare('DELETE FROM Signup_form_data WHERE user_name = ?');
	$data=array($username);
	
	if($check->execute($data);){
		echo 1; //user removed
	}
	else{
		echo 2;
	}




?>