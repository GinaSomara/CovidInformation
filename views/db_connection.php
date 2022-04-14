<?php
	/* create database connection*/

	class connection_helper
	{

		/* connection credential*/
		private $server_name;      // = "localhost";
		private $server_user_name; // = "root";
		private $server_password;  // did not set one with xampp
		private $db_name;    

		function __construct($dbname)
		{
			$this->server_name = "localhost";
			$this->server_user_name = "root";
			$this->server_password = "";
			$this->db_name = $dbname;
		}

		// making connection 
		function get_connection_string()
		{
			$conn = mysqli_connect(
			$this->server_name,$this->server_user_name,$this->server_password,
			$this->db_name);

			if($conn->connect_error)
			{
				die('Unable to connect to the database... '.$conn_emp->connect_error);
			}

			return $conn;
		}
	}
?>