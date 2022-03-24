<?php

	include('../connection.php');

	//-->> trim all the data using a trim function
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	// echo $uname.' '.$pass.' ';

	//-->> validate email and username 



	if(validate()){

		//preparing a query
		$check=$db->prepare('SELECT * FROM Signup_form_data WHERE user_name = ?');

		$data=array($uname);
		//execute the query by combining data in the check table
		$check->execute($data);
		if($check->rowcount()==0){ //count will always be 0 or 1
			echo 0; //->> 0 for account does not exist
		}
		else{
			
			//fetch the data from database
			$datarow=$check->fetch();

			if($pass==$datarow['password']){
				//valid details
				if($datarow['c_value']=="admin"){
					echo 11;
				}
				else if($datarow['c_value']=="club_coordinator"){
					echo 12;
				}
				else if($datarow['c_value']=="student_coordinator"){
					echo 13;
				}
				else{
					echo 14;
				}
			}
			else {
				echo 2; //invalid details
			}

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