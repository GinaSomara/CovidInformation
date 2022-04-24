<?php 
    require "nav.php"; 
?>

<!-- <!DOCTYPE html> declaration to the webpage about type of document to expect * NOT a html <tag> -->
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="revised" content="programming for the web">
        <meta name="keywords" content="">
        <!--refresh after X seconds
        <meta http-equiv="refresh" content="20"> -->

        <!--CSS/JS link-->
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/index-flexbox.css">
        <link rel="stylesheet" href="css/math.css">
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/footer.css">
        <script src="js/mathForm.js"></script>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle -- Nav Bar -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Font Awesome -- Footer Logo -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer">

        <title>Covid19 Website</title>
    </head>

    <body>

        <header>
            <div class="home-title">
                <h1><strong>~ Welcome To Covid Info ~</strong></h1>
                <br><br>
                <h3>We are dedicated to keeping you up to date on both sides of the story. From vaccine information to testing centers, to natural home remdies you can implement to protect yourself and family from any nonsense.</h3>
            </div>     
        </header>

        <!--Mid boxes Section w/ image changings -->
        <div class="mid-boxes-flex">

            <a class="flex-box" id="one" href="views/covid-testing.php">
                <h3><u>Testing Centers</u></h3>
                <span> Find a testing location near you</span>
                <!-- Image change -->
                <img class="bottom-img" src="images/testing-1.png" alt="testing image">
                <img class="top-img" id="testing-img" src="images/testing-2.png" alt="testing image 2">
            </a>

            <a class="flex-box" id="two" href="#">
                <h3><u>Health</u></h3>
                <span>What you can do to stay healthy</span>
                <!-- Image change -->
                <img class="bottom-img" src="images/health-1.png" alt="health image">
                <img class="top-img" id="health-img" src="images/health-2.png" alt="health image 2">
            </a>

            <a class="flex-box" id="three"  href="#">
                <h3><u>Science & Data</u></h3>
                <span>Read some of the latest information</span>
                <!-- Image change -->
                <img class="bottom-img" src="images/science-1.png" alt="covid image">
                <img class="top-img" id="science-img" src="images/science-2.png" alt="covid image">
            </a>

        </div>

        <br><br>
        <hr>

        <div class="mid-flexbox">
            <div class="covid-map">
                <iframe src="https://ourworldindata.org/grapher/total-cases-covid-19?tab=map" width="100%" height="600px"></iframe>
            </div>

            <div class="math-section" onload="">
                    <h2><u>Take a Math Break</u></h2>

                    <h5 >Select a Shape to Calculate the Area :</h5>
                    <select class="math-dropdown" id="shape-selector">
                        <option value="select">Select a Shape</option>
                        <option value="square">Square</option>
                        <option value="rectangle">Rectangle</option>
                        <option value="parallelogram">Parallelogram</option>
                        <option value="circle">Circle</option>
                        <option value="acute-obtuse">Acute/Obtuse Triangle </option>
                        <option value="right">Right Triangle</option>
                        <option value="trapezoid">Trapezoid</option>
                        <option value="sphere">Sphere</option>
                        <option value="cylinder">Cylinder</option>
                        <option value="cone">Cone</option>
                    </select>                 
                    <button type="submit" id="math-button" onclick="clicked()">Let's Go!</button>

                    <!-- Javascript Value Prompts -->
                    <h4 class="shape-title" id="shape-title"></h4>

                    <input type="number" class="input" placeholder="" id="input-1" min="1" max="20" autocomplete="off">
                    <input type="number" class="input" placeholder="" id="input-2" min="1" max="20" autocomplete="off"><br>
                    <input type="number" class="input" placeholder="" id="input-3" min="1" max="20" autocomplete="off"><br>
                    <button type="submit" id="calculate-button" onclick="calcArea()">Calculate</button>

                    <h5 class="shape-title" id="areaORerror-display"></h5>
                    <h5 class="shape-title" id="perimeterORvolume-display"></h5>

                    <!-- Javascript Shapes -->
                    <div class="shapes" id="display-shapes"></div>
            </div>
        </div>    

        <br>
        <hr>
    </body>

</html>

<?php
    require "footer.php";
?>