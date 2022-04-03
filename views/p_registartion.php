<?php
require "../main-page/main-header.php";
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name=viewport content="width=device-width user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minmum-scale=1.0">
	<meta http-equiv="X-AU-compatible" content="ie=edge">
		<title>Regiter for COVID-19 Test</title>
		<link rel="stylesheet" type="text/css" href="../styles/header-style.css">
		<link rel="stylesheet" type="text/css" href="../styles/new-sign-up.css">	
</head>
<body>
		<div class="reg_page">
			<div class="left_message">
				<h3 id="read_first">Read this message before registering</h3></br></br>
				<p>Ctrate a message about parking</p
			</div>
			<div class="frm_reg" name="createacct">
				<div class="frm_section"> <h3>Get tested at any location in Miami Dade or Broward county</h3></div>
				<section class="frm_section-container">	
					<form class="frmsign-up" action="../library/register.php" method="POST">
						<label for="usr-first-name" id="frm_lblfields"><span>*</span>First Name:</label>
						<input type "text" id="frm_txtfields" name="usr-first-name" required><br/>	<br/>				
						<label for="ul-email" id="frm_lblfields"><span>*</span>Last Name:</label>
						<input type="text" id="frm_txtfields" name="usr-last-name" required><br/>	<br/>				
						<label for="uname" id="frm_lblfields"><span>*</span>User Name:</label>
						<input type "text" id="frm_txtfields" name="usr-name" required><br/><br/>	
						<label for="l-email" id="frm_lblfields"><span>*</span>Email Address:</label>
						<input type="text" id="frm_txtfields" name="usr-email" required><br/><br/>	
						<label for="l-address" id="frm_lblfields"><span>*</span>Address:</label>
						<input type="text" id="frm_txtfields" name="usr-email-confirm" required><br/><br/>	
						<input type="submit" id ="p_register" name="p_register" value="Register">		
					</form>
				</section>	
				<div id="user_exist"> <label name="lbl_exists" value="Already register!"/></div>
			</div>
			<div class="right_message">
		</div>	
		</div>
	</body>
 </html>
<?php
require "../main-page/main-footer.php";
?>
	
	