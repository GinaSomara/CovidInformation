<?php
	try
	{	
		// file libraries + include console logging message
		include "db_connection.php";
		$js_code = 'console.log(' . json_encode('DB is 100% included', JSON_HEX_TAG) . ');';
		$js_code = '<script>' . $js_code . '</script>';
		echo $js_code;

		include "insert_data.php";
		$js_code = 'console.log(' . json_encode('insert_data is 100% included', JSON_HEX_TAG) . ');';
		$js_code = '<script>' . $js_code . '</script>';
		echo $js_code;

		//global variables
		$location=null;
		$datetime_appt = null;
		$firstname= null;
		$middlename=null;
		$lastname=null;
		$email=null;
		$confirm_email=null;
		$home_phoneNo=null;
		$mobile_phoneNo=null;
		$state = null;	
		$address=null;
		$city =null;
		$zipcode=null;

		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			//creating object to connect to db
			$connection_obj = new connection_helper("cs340db");

			// grabbing connections string
			$connection_obj_str = $connection_obj->get_connection_string();

			// making object to push the data to db 
			$push_obj = new insert_data();	

			if(isset($_POST['submitdata']))
			{
				$location = $_POST['location_selected'];	
				$datetime_appt = $_POST['txt_date_time_appt'];	
				$state = $_POST['state'];						
			}
			$firstname =      $_REQUEST['first-name'];
			$middlename =     $_REQUEST['middle-name'];
			$lastname =       $_REQUEST['last-name'];
			$email =          $_REQUEST['email'];
			$confirm_email =  $_REQUEST['confirm-email'];
			$home_phoneNo =   $_REQUEST['home-phone'];
			$mobile_phoneNo = $_REQUEST['mobile-phone'];
			$address =        $_REQUEST['street-address'];
			$city =           $_REQUEST['city'];
			$zipcode =        $_REQUEST['zipcode'];

			$push_obj->push_data($location, $datetime_appt, $firstname, $middlename, $lastname, $address, $city, $state, $zipcode, $email, $confirm_email, $home_phoneNo, $mobile_phoneNo, $connection_obj_str );

			//close connection string
			$connection_obj_str->close();
		}
	}	
	catch (Exception $e) {

		echo "All fields are required ('{$e->getMessage()}')";
	}
?>