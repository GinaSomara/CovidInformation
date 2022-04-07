<?php
/* create database connection*/
class connection_helper{
	/* connection credential*/
	private $server_name; // = "localhost";
	private $server_user_name; // = "root";
	private $server_password;
	private $db_name;
	//construct class properties
	function __construct($dbname)
	//A class constructor is a special member function of a class that
//	is executed whenever we create new objects of that class
	{
		$this->server_name = "localhost";
		$this->server_user_name = "root";
		$this->server_password = "";
		$this->db_name = $dbname;
	}
	//making connection
	function get_connection_string()
	{
		$conn = mysqli_connect($this->server_name,$this->server_user_name,$this->server_password,$this->db_name);
		if(	$conn->connect_error)
		{
			die('Unable to connect to the database... '.$conn_emp->connect_error);
		}
		return $conn;
	}
}
?>