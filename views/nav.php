<!-- NOTE: Nav is read from index ~ (which includes main) and also from other php views ~ (all contained within the views folder).
           The routing to each link will be different depenedent upon wether current page is main or another page. Therefore different links will be needed for the correct corresponding page. 
-->

<div class="header-logo">

    <?php
        //to find where we are at in directory
        $currentFile = $_SERVER['PHP_SELF'];
        if ($currentFile=="/covid/index.php") {
            echo '<img src="images/covid-logo-2.png" alt="">';
        } else {
            echo '<img src="../images/covid-logo-2.png" alt="">';
        }
    ?>
    <!-- gradient section -->
    <section></section>
</div>

<ul>
    <?php
        //to find where we are at in directory
        $currentFile = $_SERVER['PHP_SELF'];


        if($currentFile=="/covid/index.php") {

            echo '    
                <li><a href="#">Contact Us</a></li>

                <li><a href="#">About Us</a></li>

                <li><a href="views/covid-testing.php">Testing Centers</a></li>

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
                    </div>
                </li>

                <li><a href="#">Home</a></li>

                <li><img src="images/global.png" alt="" class="nav-img"></li>';
    } else {

        echo '    
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About Us</a></li>

                <li><a href="covid-testing.php">Testing Centers</a></li>

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
                    </div>
                </li>

                <li><a href="../index.php">Home</a></li>
                
                <li><img src="../images/global.png" alt="" class="nav-img"></li> ';
    }
    ?>


</ul>





