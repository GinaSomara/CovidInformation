<?php
class insert_data
{
	//dclare properties
	//declare sign-up function 
	function push_data($location,$dt,$fname,$mname,$lname,$address, $city, $state, $zip, $email_addr,$h_phone, $m_phone,$c_email,$conn_str)
	{
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
				$current_date = date('Y-m-d H:i:s');
				//insert record to "tblappointment" table
				if($c_email!=$email_addr || $appt_date==null || $location==null ||fname==null || $lname ==null )
				{

					header("Location: ../pages/appointment.php?$c_email=emails mismatched or date error"); 
				}
				else
				{
					$sqlstmt ="INSERT INTO tbl_appointment(service_location, appt_date, appt_time,fname,mname,lname,address,city,state,zip_code,email,home,mobile,appt_id,appt_made_on)
						VALUES('$location','$appt_date','$appt_time','$fname','$mname','$lname','$address','$city','$state','$zip', '$email_addr','$h_phone','$m_phone','$appt_id','$current_date');";
					mysqli_query($conn_str, $sqlstmt);	//run the sql statement
					header("Location: ../index.php?$location=success"); 	
				}
			}
		}
		catch (Exception $e)
			{
				echo $e->getMessage();
			}
			
		$conn_str->close();	
	}
}
?>
	