<?php

	include('../connection.php');

	$username = $_POST['username'];

		
	$check=$db->prepare('DELETE FROM activity WHERE aname= ?');
	$data=array($username);
	
	if($check->execute($data)){
		echo 1; //user removed
	}
	else{
		echo 2;
	}

?>