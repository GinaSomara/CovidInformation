
<hr>				
<div id="appt_list_col">
<h4>Appointment List</h4></br>
<div class="row">					
	<div class="col-md-12 head">
		<div class="float-right">
			<a href="../library/appt_list.php" class="btn success"><i class="dwn"></i> Export</a>
		</div>
	</div>
	
</div>
<table class = "tbl_appt_list">
	<thead class="appt_col_list">
		<tr>
			<th>Service Location</th>
			<th>appt_date</th>
			<th>Appt Time</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Last Name</th>
			<th>Address</th>								
			<th>City</th>
			<th>State</th>
			<th>Zip Code</th>
			<th>Email</th>
			<th>Home Phone</th>
			<th>Mobile Phone</th>
			<th>Appt ID</th>
			<th>Made On</th>							
		</tr>
	</thead>
<tbody>
<?php
	$conn = new connection_helper("cs340db");
	$conn_str = $conn->get_connection_string();
	$qrylocation=mysqli_query($conn_str,"SELECT * from tbl_appointment");
	$checkresult = mysqli_num_rows($qrylocation);
	if($checkresult>0)
	{
		while($rows=$qrylocation->fetch_assoc())
		{
			?>
			<tr>
				<td><?php echo $rows['service_location'];?></td>
				<td><?php echo $rows['appt_date'];?></td>
				<td><?php echo $rows['appt_time'];?></td>
				<td><?php echo $rows['fname'];?></td>
				<td><?php echo $rows['mname'];?></td>
				<td><?php echo $rows['lname'];?></td>
				<td><?php echo $rows['address'];?></td>
				<td><?php echo $rows['city'];?></td>
				<td><?php echo $rows['state'];?></td>
				<td><?php echo $rows['zip_code'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['home'];?></td>
				<td><?php echo $rows['mobile'];?></td>
				<td><?php echo $rows['appt_id'];?></td>
				<td><?php echo $rows['appt_made_on'];?></td>
			</tr>
			<?php
		}
	}
	else
	{
		?>
		<tr><td colspan="7">No appointments found</td></tr>
	<?php
	}
	?>
</tbody>
</table>

	
	