<?php

$js_code = 'console.log(' . json_encode('BEGINING -- inseretion!', JSON_HEX_TAG) . 
');';
$js_code = '<script>' . $js_code . '</script>';
    echo $js_code;

    class insert_data
	{
        function push_data($first_name, $last_name, $connect_str)
		{

			/* validate user entry */
			try
			{       ///make sure table name matches
				//checks to see if user is already in system    //email_addr should be same as in table
				$sqlstmt = "SELECT * FROM tblappointment WHERE email='$email'";
				$stmt = mysqli_query($connect_str,$sqlstmt);
				$checkresult = mysqli_num_rows($stmt);

				if(!$stmt || $checkresult==0)   //if the user is not there OR no one is in the system (rows == 0) 
				{ 
					$current_date = date('Y-m-d H:i:s');
					$sqlstmt = "INSERT INTO tblappointment VALUES ('$user_id', '$first_name', '$last_name', '$email', '$phoneNo', 12345);"
					// mysqli_query($connect_str, 'CREATE TABLE Hello (num INT)');
					// header("../views/covid-testing.php?register=success"); 	
					//header("Location: ../views/covid-testing.php?register=success"); 	
				}
				else {
					header("../views/covid-testing.php?error=accountexisted");
					// header("Location: ../views/covid-testing.php?error=accountexisted");
					exit();
				}
			} catch (Exception $e) {
				echo "All fields are requiredption ('$e->getMessage()')";
			}
				
			$connect_str->close();	
		}
	}

    $js_code = 'console.log(' . json_encode('END -- inseretion!', JSON_HEX_TAG) . 
');';
$js_code = '<script>' . $js_code . '</script>';
    echo $js_code;

?>