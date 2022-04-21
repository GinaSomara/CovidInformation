<?php 
    require "nav.php"; 
    include_once "db_connection.php";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name=viewport content="width=device-width user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minmum-scale=1.0">
        <!-- <meta http-equiv="X-AU-compatible" content="ie=edge"> -->

        <link rel="stylesheet" href="../css/covid-testing.css">	
        <link rel="stylesheet" href="../css/nav.css">
        <link rel="stylesheet" href="../css/footer.css">
        <!-- Font Awesome -- Footer Logo -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer">

        <title>COVID-19 Testing Registration</title>	
    </head>

    <body>
        <div class="main-body">

            <div class="parking-message">
                <h3><strong>NOTE:</strong> Please read before registering! </h3>
                <p>Depending upon testing location, parking may be on/off site. If off site, parking fees may be required varying in rates. Please check local areas for parking information before departing.</p>
            </div>

            <div class="flex-box"> 
	
                <table class="register-form" id="left-box">

                    <tr><h3 id="h3_Appointment">Make a COVID-19Appointment Test</h3></tr>

                    <form class="frm-sign-up" action="get_data.php" method="POST">

                        <!-- ROW 1: Location / Appt Date -->
                        <tr>
                            <th>
                                <label><span>*</span>Select a Location:</label>
                                <?php
                                    $conn = new connection_helper("cs340db");
                                    $conn_str = $conn->get_connection_string();
                                    $qrylocation=mysqli_query($conn_str,"SELECT * from tbllocation_list");
                                ?>
                                <select id="lblFields" name="location_selected">
                                    <option></option>
                                    <?php
                                        while($q_rows = mysqli_fetch_array($qrylocation))
                                        {
                                    ?>
                                    <option id="txtfields"><?php echo $q_rows['location_name'].": ".$q_rows['Address'];?></option>	
                                    <?php
                                        }
                                    ?>
                                </select>
                            </th>

                            <th>
                                <label><span>*</span>Date of Appointment:</label> 
                                <?php
                                    $current_date = date('Y-m-d H:i:s');							
                                ?>
                                <input type="datetime-local" name="txt_date_time_appt"><br>
                            </th>
                        </tr>

		                <!-- ROW 2: First Middle Last -->
                        <tr>
                            <th>
                                <label id="lblFields"><span>*</span>First Name:</label>
                                <input type="text"name="first-name" required>
                            </th>

                            <th>
                                <label ><span>*</span>Middle Name:</label>
                                <input type="text" name="middle-name">
                            </th>

                            <th>
                                <label><span>*</span>Last Name:</label>
                                <input type="text" name="last-name" required>  
                            </th>

                        </tr>
					
                        <!-- ROW 3: Street and City -->
                        <tr>
                            <th>
                                <label><span>*</span>Street Address:</label>
                                <input type="text" name="street-address" required>
                            </th>

                            <th>
                                <label><span>*</span>City:</label>
                                <input type="text" name="city" required> 
                            </th>
                        </tr>

                        <!-- ROW 4: State and Zipcode -->
                        <tr>
                            <th>
                                <label><span>*</span>State:</label>
                                <select name="state">
                                    <option value="Florida">Florida</option>
                                    <option value="Georgia">Georgia</option>
                                </select>
                            </th>

                            <th>
                                <label><span>*</span>Zip Code:</label>
                                <input type="text" name="zipcode" required>  
                            </th>
                        </tr>

                        <!-- ROW 5: State and Zipcode -->
                        <tr>
                            <th>
                                <label><span>*</span>Email Address:</label>
                                <input type="email" name="email" required>
                            </th>

                            <th>      
                                <label><span>*</span>Confirm Email:</label>
                                <input type="email" name="confirm-email" required>
                            </th>
                        </tr>

                        <!-- ROW 6: Mobile and Home Phone No. -->
                        <tr>
                            <th>
                                <label><span>*</span>Home Number:</label>
                                <input type="text" name="home-phone" required>
                            </th>

                            <th>
                                <label><span>*</span>Mobile Number:</label>						
                                <input type="text" name="mobile-phone" required>	
                            </th>
                        </tr>

                        <tr>
                            <button type="submit">Register</button> 
                        </tr>

                        <!-- 
                        <div class="table-row">
                            <label for="first-name"><span>*</span>First Name</label>
                            <input type ="text" name="first-name"  required><br/>	<br/>	
                        </div>	
                        <div class="table-row">
                            <label for="last-name"><span>*</span>Last Name</label>
                            <input type="text" name="last-name" required><br/>	<br/>	
                        </div>
                        <div class="table-row">
                            <label for="email"><span>*</span>Email</label>
                            <input type="text" name="email" required><br/><br/>	
                        </div>
                        <div class="table-row">
                            <label for="phone-no"><span>*</span>Phone No</label>
                            <input type="text" name="phone-no" required><br/><br/>	
                        </div>
                        <div class="table-row">
                            <label for="zipcode"><span>*</span>Zip Code</label>
                            <input type="number" name="zipcode" min="10000" required><br/>	<br/>	
                        </div> 
                        -->
                    </form>
                </table>
                

                <!-- PULLING FROM DB, DISPLAYED in table -->
                <div>
                    <hr>				
                    <h4>Appointment List</h4></br>
                    <a href="../library/appt_list.php" class="btn success"><i class="dwn"></i> Export</a>
                        
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
                            } else {
                        ?>
                                <tr><td colspan="7">No appointments found</td></tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>  

            </div>
        </div>    
	</body>
</html>



<?php
    require "footer.php";
?>