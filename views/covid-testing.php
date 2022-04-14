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
            <form class="frm-sign-up" action="get_data.php" method="POST">

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