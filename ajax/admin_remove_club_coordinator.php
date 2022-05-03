<?php

	include('../connection.php');

	$username = $_POST['username'];

		
	$check=$db->prepare('DELETE FROM signup WHERE sid= ?');
	$data=array($username);
	
	if($check->execute($data)){
		echo 1; //user removed
	}
	else{
		echo 2;
	}

?>