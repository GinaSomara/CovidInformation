<?php

	include_once "db_connection.php";

	$conn = new connection_helper("cs340db");
	$conn_str = $conn->get_connection_string();
	
	$qrylocation=mysqli_query($conn_str,"SELECT * from tbl_appointment");	

	if($qrylocation->num_rows>0)
	{
		$delimeter =",";
		$file_name="appt-list-".date('Y-m-d').".csv";
		$file_pointer = fopen('php://memory', 'w');
		$record_fields = array('Location', 'Appt Date', 'Appt Time','First Name', 'Middle Name', 'Last Name', 'Address', 'City', 'State', 'Zip Code','Email', 'Home Phone', 'Mobile Phone', 'Appt ID','Appt Made On');
		fputcsv($file_pointer, $record_fields, $delimeter);
		while($r = mysqli_fetch_array($qrylocation))
		{
			$data =array($r['service_location'],$r['appt_date'],$r['appt_time'],$r['fname'],$r['mname'],$r['lname'],$r['address'],
				$r['city'],$r['state'],$r['zip_code'],$r['email'],$r['home'],$r['mobile'],$r['appt_id'],$r['appt_made_on']);
			fputcsv($file_pointer, $data, $delimeter);
		}
		fseek($file_pointer, 0);

		//set for download, not to display
		header('content-type: txt/csv');
		header('content-Disposition: attachment; filename="' .$file_name .'";');
		fpassthru($file_pointer);
	}

	// $conn_str->close();
	
	exit;
?>