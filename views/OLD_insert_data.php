<?php

	class insert_data
	{
		//($location, $datetime_appt, $first_name, $middlename, $lastname, $email, $confirm_email, $home_phoneNo, $mobile_phoneNo, $state, $address, $city, $zipcode)
		function push_data($last_name, $email, $phoneNo, $zipcode, $connect_str)
		{

			$getRand = rand(0123456,98765432); //get a random number between two numbers
			//make two letter string form first and last last name 
			$first_Init = substr($first_name,0,1);
			$last_Init = substr($last_name, 0,1);
			$user_id = $first_Init .$last_Init .$getRand; 

			/* validate user entry */
			try
			{       
				//checks to see if user is already in system 
				$sqlstmt = "SELECT * FROM tbl_appointment WHERE email='$email'";
				$stmt = mysqli_query($connect_str,$sqlstmt);
				$checkresult = mysqli_num_rows($stmt);

				if(!$stmt || $checkresult==0)   //if the user is not there OR no one is in the system (rows == 0) 
				{ 
					$current_date = date('Y-m-d H:i:s');

					$sqlstmt ="INSERT INTO tbl_appointment 
					VALUES ('$user_id', '$first_name', '$last_name', '$email', '$phoneNo', $zipcode, '$current_date');";

					mysqli_query($connect_str, $sqlstmt);

					//alert pop-up box - Sucess
					echo ("<script LANGUAGE='JavaScript'>
					window.alert('Appointment Registered Successfully!');
					window.location.href='../index.php';
					</script>");

					//header("Location: ../views/covid-testing.php?register=success"); 	
				}	
				else {
					//alert pop-up box - Failed
					echo ("<script LANGUAGE='JavaScript'>
					window.alert('Appointment Registration Failed. A scheduled appointment w/ provided email is already in the system.');
					window.location.href='../index.php';
					</script>");
					exit();
				}

				//header("Location: ../views/covid-testing.php?register=success");

			} catch (Exception $e) {
				echo "All fields are requiredption ('$e->getMessage()')";
			}
				
			// $connect_str->close();closed in get_data
		}
	}
?>