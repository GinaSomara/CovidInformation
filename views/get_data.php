<?php
try
{	//files library
	include "db_connection.php";
	include "insert_data.php";
	//initializing globall variable
	$firstname= null;
	$lastname=null;
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$connection_obj = new connection_helper("db_cs406");
		$connection_obj_str =$connection_obj->get_connection_string();
		//to make appointment
		$push_patient = new appointment_obj();	
		$firstname=$_POST['first-name'];
		$lastname=$_POST['last-name'];
		$username=$_POST[''];
		$emailaddress=$_POST[''];
		$passwd= $_POST[''];						
		$push_patient->mk_appointment($firstname,$lastname,);
		//close connection string
		$connect_obj_str->close();
	}
}	
catch (Exception $e)
{
echo "All fields are required ('{$e->getMessage()}')";
}
?>