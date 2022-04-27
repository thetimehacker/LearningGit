<?php

	include('../connection.php');

	//-->> trim all the data using a trim function
	$title= $_POST['title'];
	$date= $_POST['date'];
	// $venue= $_POST['venue'];
	// $eligibility= $_POST['eligibility'];
	$description= $_POST['description'];

	

	//-->> validate email and username 



	if(validate()){

		
		$check=$db->prepare('SELECT * FROM activity WHERE  aname = ?');
		$data=array($title); 

		$check->execute($data);
		if($check->rowcount()==1){
			echo 0; //already exist
		}
		else{
			

			//creating a new query
			$query=$db->prepare("INSERT INTO activity(sid,aname, date, description) VALUES (?,?,?,?)");
			$data=array(5,$title,$date,$description);

			//execute 
			if($query->execute($data)){
				echo 1;
			}
			else echo 2;


		}

	}

	//trim function
	function trim_data(){
		//-->> to complete this function
	}

	function validate(){
		//-->> to complete this function
		return true;
	}

?>