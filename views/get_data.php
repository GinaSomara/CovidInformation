<?php

	try
	{	
		// file libraries
		include "db_connection.php";
		$js_code = 'console.log(' . json_encode('DB is 100% included', JSON_HEX_TAG) . ');';
		$js_code = '<script>' . $js_code . '</script>';
		echo $js_code;

		require "insert_data.php";
		$js_code = 'console.log(' . json_encode('insert_data is 100% included', JSON_HEX_TAG) . ');';
		$js_code = '<script>' . $js_code . '</script>';
		echo $js_code;


		//initializing global variables
		$firstname= "LL";
		$lastname=null;
		$email=null;
		$phoneNo=null;
		$zipcode=null;

		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			//creating object storing 4 essentials
			$connection_obj = new connection_helper("CS406");

			// grabbing connections string
			$connection_obj_str =$connection_obj->get_connection_string();

			//to make appointment
			$push_obj = new insert_data();	
			$firstname = $_REQUEST['first-name'];
			$lastname = $_REQUEST['last-name'];
			$email = $_REQUEST['email'];
			$phoneNo = $_REQUEST['phone-no'];
			$zipcode = $_REQUEST['zipcode'];	
			//need to add location option 
			
			$js_code = 'console.log(' . json_encode('INTO push_data meow', JSON_HEX_TAG) . ');';
			$js_code = '<script>' . $js_code . '</script>';
			echo $js_code;
			$js_code = 'console.log(' . json_encode($last_name, JSON_HEX_TAG) . ');';
			$js_code = '<script>' . $js_code . '</script>';
			echo $js_code;

			$push_obj->push_data($firstname, $lastname, $email, $phoneNo, $zipcode, $connection_obj_str);

			//close connection string
			$connection_obj_str->close();

			$js_code = 'console.log(' . json_encode('connection closed', JSON_HEX_TAG) . ');';
			$js_code = '<script>' . $js_code . '</script>';
			echo $js_code;
		}
	}	
	catch (Exception $e) {

		echo "All fields are required ('{$e->getMessage()}')";
	}

	$js_code = 'console.log(' . json_encode('end of file!', JSON_HEX_TAG) . 
	');';
	$js_code = '<script>' . $js_code . '</script>';
		echo $js_code;

?>