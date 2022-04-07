<!-- <link rel="stylesheet" href="css/nav.css"> -->



<div class="header-logo"  >
    <img src="images/covid-logo-2.png" alt="">
    <!-- gradient section -->
    <section></section>
</div>

<ul>
    <li><a href="#">Contact Us</a></li>
    <li><a href="#">About Us</a></li>
    <li><?php echo'<a href="views/covid-testing.php">Testing Centers</a>';?></li>
    <li class="dropdown">
        <a class="dropbtn">Health & Life</a>
        <div class="dropdown-content">
        <a href="#">Vaccines</a>
        <hr>
        <a href="#">Proactive Prevention</a>
        <a href="#">Overcoming Covid</a>
        </div>
    </li>
    <li class="dropdown">
        <a class="dropbtn">Cases</a>
        <div class="dropdown-content">
            <a href="#">United States</a>
            <a href="#">US Vs Florida</a>
            <hr>
        </div>
        </li>
    <li><?php echo'<a href="../index.php">Home</a>';?></li>

    <li><img src="images/global.png" alt="" class="nav-img"></li>
</ul>