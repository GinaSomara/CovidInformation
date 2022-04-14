<?php

	class insert_data
	{
		function push_data($first_name, $last_name, $email, $phoneNo, $zipcode, $connect_str)
		{

			$getRand = rand(0123456,98765432); //get a random number between two numbers
			//make two letter string form first and last last name 
			$first_Init = substr($first_name,0,1);
			$last_Init = substr($last_name, 0,1);
			$user_id = $first_Init .$last_Init .$getRand; 

			$js_code = 'console.log(' . json_encode($getRand, JSON_HEX_TAG) . ');';
			$js_code = '<script>' . $js_code . '</script>';
			echo $js_code;

			/* validate user entry */
			try
			{       ///make sure table name matches
				//checks to see if user is already in system    //email_addr should be same as in table
				$sqlstmt = "SELECT * FROM tblappointment WHERE email='$email'";
				$stmt = mysqli_query($connect_str,$sqlstmt);
				$checkresult = mysqli_num_rows($stmt);

				$js_code = 'console.log(' . json_encode('Before IF', JSON_HEX_TAG) . ');';
				$js_code = '<script>' . $js_code . '</script>';
				echo $js_code;

				if(!$stmt || $checkresult==0)   //if the user is not there OR no one is in the system (rows == 0) 
				{ 
					$current_date = date('Y-m-d H:i:s');

					$sqlstmt ="INSERT INTO tblappointment 
					VALUES ('$user_id', '$first_name', '$last_name', '$email', '$phoneNo', 12345, '$current_date');";

					mysqli_query($connect_str, $sqlstmt);
					
					header("../views/covid-testing.php?register=success"); 	
					//header("Location: ../views/covid-testing.php?register=success"); 	
				}
				else {
					header("Location: ../views/covid-testing.php?error=accountexisted");
					exit();
				}
			} catch (Exception $e) {
				echo "All fields are requiredption ('$e->getMessage()')";
			}
				
			$connect_str->close();	
		}
	}
?>