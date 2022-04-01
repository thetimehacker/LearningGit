<?php

	include('../connection.php');

	$title =$_POST['title'];

		
	$check=$db->prepare('UPDATE student_coordinator SET flag = ? WHERE title = ?');
	$data=array(1,$title);
	
	if($check->execute($data)){
		echo 1; //user removed
	}
	else{
		echo 2;
	}

?>