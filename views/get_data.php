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
		$firstname= null;
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
			$firstname =  $_REQUEST['first-name'];
			$lastname  =  $_REQUEST['last-name'];
			$email     =  $_REQUEST['email'];
			$phoneNo   =  $_REQUEST['phone-no'];
			$zipcode   =  $_REQUEST['zipcode'];	
			//need to add location option 

			$push_obj->push_data($firstname, $lastname, $email, $phoneNo, $zipcode, $connection_obj_str);

			//close connection string
			$connection_obj_str->close();
		}
	}	
	catch (Exception $e) {

		echo "All fields are required ('{$e->getMessage()}')";
	}
?>