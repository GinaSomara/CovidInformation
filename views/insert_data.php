<?php

$js_code = 'console.log(' . json_encode('in insert data', JSON_HEX_TAG) . ');';
$js_code = '<script>' . $js_code . '</script>';

class insert_data
{

	//declare properties
	//declare sign-up function 
	function push_data($location, $dt, $fname, $mname, $lname, $address, $city, $state, $zip, $email_addr, $c_email, $h_phone, $m_phone, $conn_str)
	{
		$js_code = 'console.log(' . json_encode('Pushing Data', JSON_HEX_TAG) . ');';
		$js_code = '<script>' . $js_code . '</script>';

		$getRand = rand(0123456,98765432); //get a random number between two numbers
		//make two letter string form first and last last name 
		$first_Init = substr($fname,0,1);
		$last_Init = substr($lname, 0,1);
		$appt_id = $first_Init .$last_Init .$getRand;
		$appt_date=substr($dt,0,10);
		$appt_time=substr($dt,11,16);
		/* validate user entry */

		try
		{
			$sqlstmt = "SELECT * FROM tbl_appointment WHERE email='$email_addr'";
			$stmt = mysqli_query($conn_str,$sqlstmt);
			$checkresult = mysqli_num_rows($stmt);
			if(!$stmt || $checkresult==0)
			{ 
				$js_code = 'console.log(' . json_encode('Here in insert Data, about to check out the null values.', JSON_HEX_TAG) . ');';
				$js_code = '<script>' . $js_code . '</script>';
				echo $js_code;

				$current_date = date('Y-m-d H:i:s');
				//insert record to "tblappointment" table
				if($c_email!=$email_addr || $appt_date==null || $location==null || $fname==null || $lname ==null )
				{
					header("Location: appointment_list.php?$c_email=emails mismatched or date error"); 

					//JS alert pop-up box - Failure
					// echo ("<script LANGUAGE='JavaScript'>
					// window.alert('Failure - Double check for email mismatch!  Please try again.');
					// window.location.href='../covid-testing.php';
					// </script>");
				}
				else
				{
					$sqlstmt ="INSERT INTO tbl_appointment(service_location, appt_date, appt_time,fname,mname,lname,address,city,state,zip_code,email,home,mobile,appt_id,appt_made_on)
						VALUES('$location','$appt_date','$appt_time','$fname','$mname','$lname','$address','$city','$state','$zip', '$email_addr','$h_phone','$m_phone','$appt_id','$current_date');";
					mysqli_query($conn_str, $sqlstmt);	//run the sql statement

					//JS alert pop-up box - Success
					// echo ("<script LANGUAGE='JavaScript'>
					// window.alert('Success! Appointment Registered.');
					// </script>");

					// reload to main
					header("Location: ../index.php?$location=success"); 	
				}
			}
		}
		catch (Exception $e)
			{
				echo $e->getMessage();
			}
			
		// $conn_str->close();	closed in get_data.php
	}
}
?>
	