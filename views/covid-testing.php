<?php 
    require "nav.php"; 
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


        <title>COVID-19 Testing</title>	
    </head>

    <body>

        <div class="parking-message">
            <h3><strong>NOTE:</strong> Please read before registering! </h3>
            <p>Depending upon testing location, parking may be on/off site. If off site, parking fees may be required varying in rates. Please check local areas for parking information before departing. </p>
        </div>

        <div class="register-form">
            <form class="frm-sign-up" action="../library/register.php" method="POST">
                <div class="table-row">
                    <label for="usr-first-name" id="frm_lblfields"><span>*</span>First Name:</label>
                    <input type ="text" id="frm_txtfields" name="usr-first-name" required><br/>	<br/>	
                </div>	
                <div class="table-row">
                    <label for="ul-email" id="frm_lblfields"><span>*</span>Last Name:</label>
                    <input type="text" id="frm_txtfields" name="usr-last-name" required><br/>	<br/>	
                </div>
                <div class="table-row">
                    <label for="ul-email" id="frm_lblfields"><span>*</span>User Name:</label>
                    <input type="text" id="frm_txtfields" name="usr-last-name" required><br/>	<br/>	
                </div>
                <div class="table-row">
                    <label for="l-email" id="frm_lblfields"><span>*</span>Email:</label>
                    <input type="text" id="frm_txtfields" name="usr-email" required><br/><br/>	
                </div>
                <div class="table-row">
                    <label for="l-email" id="frm_lblfields"><span>*</span>Phone No:</label>
                    <input type="text" id="frm_txtfields" name="usr-email" required><br/><br/>	
                </div>
                <!-- <div class="table-row">
                    <label for="l-address" id="frm_lblfields"><span>*</span>Address:</label>
                    <input type="text" id="frm_txtfields" name="usr-email-confirm" required><br/><br/>	
                </div>	 -->
                <button type="submit">Register</button>
		    </form>
        </div>

        <hr>
        <br>

	</body>
</html>

<?php
    require "footer.php";
?>