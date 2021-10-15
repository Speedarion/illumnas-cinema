<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Homepage</title>
    <link rel="stylesheet" href="style.css">
    <style>
        section.banner-section {
        box-sizing: border-box;
        margin-top: 0px;
        }

        .mySlides img {
        vertical-align: middle;
        height: 600px;
        width: 1200px;
        }

        /* Position the image container (needed to position the left and right arrows) */
        section.banner-section .container {
        position: relative;
        }

        /* Hide the images by default */
        .mySlides {
        display: none;
        }

        /* ==== Banner Movie Button ====  */
        section.banner-section .button {
            cursor: pointer;
            position: absolute;
            top: 95%;
            width: auto;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 5px 16px;
            margin: 0;
            font-size: 20px;
            font-weight: bold;                 
            background-image: linear-gradient(to right, #232526 0%, #414345  51%, #232526  100%); 
            background-size: 200% auto;
            box-shadow: 0 0 20px #eee;     
            border-radius: 10px;
            color: white;
            transition: 0.5s;
            display: block;
        }

        section.banner-section .button:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
        }             
        /* ==== Banner Movie Button ====  */ 

        /* Next & previous buttons */
        .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -20px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
        }

        /* ==== Now Showing & Coming Soon ==== */
        section.movies{
            margin-top: 25px;
            margin-bottom: 10px;
        }
        
        .status{
            color: white;
            font-weight: bold;
            font-size: 30px;
            border-color: black;            
            background-color: #2e2e2e;
            margin-right: 740px;
            padding: 10px 5px;
        }

        .status-button{
            cursor: pointer;
            border: none;
            background-color: transparent; 
            color: white;
            font-weight: bold;
            font-size: 30px;           
        }

        .movie-blocks{
            display: block;
        }
        .movie-blocks ul{
            list-style-type: none;
            margin-left: 40px;
            
        }

        .movie-blocks li{
            display: inline-block;
            margin: 5px 15px 5px 15px;
        }

        .movie-blocks input[type="image"]{
            height: 350px;
            width: 230px;
        }

        .movie-rate{
            height: 30px;
            width: 40px;
            /* float: right; */
            vertical-align: sub;
            
        }

        .movie-block{
            width: 230px;
        }

        .movie-block p{
            height: 35px;
            text-align: center;
            font-weight: bold;
            margin: 5px 0 15px 0;
        }

        .movie-button{
            cursor: pointer;
            width: 110px;
            height: 40px;
            margin-left: 60px;
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.5s;
            background-image: linear-gradient(to right, #000428 0%, #004e92  51%, #000428  100%);
            background-size: 200% auto;
            color: white;       
            border-radius: 10px;
            border: none;
            display: block;
        }
        
        .movie-button:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         

        footer{
            clear: left;
        }

        .view-all{
            margin-bottom: 10px;            
            padding-right: 0;
        }

        .view-all a{
            color: white;
            font-weight: bold;
            margin-left: 1050px;
        }
        
        /* #view-all {
            position: absolute;
            color: white;
            font-weight: bold;
            top: 170%;
            right: 11%;
            transform: translateX(-430%);
        }        */

    </style>
</head>
<body>    
    <?php include "header.php" ?>
    <div class="wrapper">
        <!-- Can use PHP's Session method to get the movie name that users click on -->

        <!-- Banner Section with Full Width Images -->
        <!-- Refer https://www.w3schools.com/howto/howto_js_slideshow_gallery.asp -->
        <section class="banner-section">
            <div class="container">

                <div class="mySlides">
                    <img src="images/banner/Dune.jpg" alt="Dune Poster">
                    <form action="movie.php" method="POST">
                        <input type="hidden" name="movie-name" value="Dune">
                        <input type="submit" class="button" name="movie-button" value="Dune">
                    </form>
                </div>
                <div class="mySlides">
                    <img src="images/banner/Free-Guy.jpg" alt="Free-Guy Poster">
                    <form action="movie.php" method="POST">
                        <input type="hidden" name="movie-name" value="Free-Guy">
                        <input type="submit" class="button" name="movie-button" value="Free Guy">
                    </form>
                </div>
                <div class="mySlides">
                    <img src="images/banner/No-Time-To-Die.jpg" alt="No Time To Die Poster">
                    <form action="movie.php" method="POST">
                        <input type="hidden" name="movie-name" value="No-Time-To-Die">
                        <input type="submit" class="button" name="movie-button" value="No Time To Die">
                    </form>
                </div>
                <div class="mySlides">
                    <img src="images/banner/Shang-Chi.jpg" alt="Shang Chi Poster">
                    <form action="movie.php" method="POST">
                        <input type="hidden" name="movie-name" value="Shang-Chi-and-the-Legend-of-the-Ten-Rings">
                        <input type="submit" class="button" name="movie-button" value="Shang Chi">
                    </form>
                </div>
                <div class="mySlides">
                    <img src="images/banner/The-Suicide-Squad.jpg" alt="The Suicide Squad Poster">
                    <form action="movie.php" method="POST">
                        <input type="hidden" name="movie-name" value="The-Suicide-Squad">
                        <input type="submit" class="button" name="movie-button" value="The Suicide Squad">
                    </form>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                
            </div>
        </section>

        <!-- Now Showing and Coming Soon Movies - Show 4 Movies -->
        <section class="movies">        
            <div class="container">
                <!-- Refer https://www.geeksforgeeks.org/how-to-call-php-function-on-the-click-of-a-button/ -->
                <div class="status">
                    <input type="submit" class="status-button" name="now-showing" value="Now Showing" onclick="showThis(this)">
                    <span id="divider">|</span>
                    <input type="submit" class="status-button" name="coming-soon" value="Coming Soon" onclick="showThis(this)">                    
                </div>    
                
                <?php 
                    function format_string($title){
                        $imgs = str_replace(": ", "-", $title);
                        $imgs = str_replace(" ", "-", $imgs);                        
                        $imgs = str_replace("'", "", $imgs);
                        return $imgs;
                    }

                    function get_values($result){
                        $title = array();
                        $rating = array();
                        $id = array();
                        $imgs = array();
                        if (mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                $title[] = $row['title'];
                                $rating[] = $row['rating'];
                                $id[] = $row['movieID'];
                            }
                        }
                        $result->free();
                        $imgs = format_string($title);
                        return array($title, $rating, $id, $imgs);
                    }

                    include "dbconnect.php";
                    $nowQuery = "SELECT title, rating, movieID FROM illumnasMovies WHERE releaseDate <= NOW() ORDER BY releaseDate DESC LIMIT 4";
                    $csQuery = "SELECT title, rating, movieID FROM illumnasMovies WHERE releaseDate > NOW() ORDER BY releaseDate LIMIT 4";
                    
                    // Now Showing
                    $nowResult = mysqli_query($conn, $nowQuery);
                    $nowData = get_values($nowResult);
                    $nowTitle = $nowData[0];
                    $nowRating = $nowData[1];
                    $nowID = $nowData[2];
                    $nowImgs = $nowData[3];                    
                    // Coming Soon
                    $csResult = mysqli_query($conn, $csQuery);
                    $csData = get_values($csResult);
                    $csTitle = $csData[0];
                    $csRating = $csData[1];
                    $csID = $csData[2];
                    $csImgs = $csData[3];  
                    
                    $conn->close();
                ?>

                <div id="now-showing">
                    <div class="movie-blocks">
                        <ul>
                            <!-- <li>
                                <div class="movie-block">
                                    <form action="movie.php" method="POST"></form>
                                        <input type="hidden" name="movie-name" value="Dune">
                                        <input type="image" class="poster" src="images/poster/Dune.jpg" alt="Dune"><br>                         
                                        <p>Dune <img src="images/PG13.webp" alt="PG13" class="movie-rate"></p>                       
                                        
                                        <input type="submit" class="movie-button" name="movie-button" value="Buy Ticket">
                                    </form>
                                </div>                                
                            </li>
                            <li>
                                <div class="movie-block">
                                    <form action="movie.php" method="POST">
                                        <input type="hidden" name="movie-name" value="Free Guy">
                                        <input type="image" class="poster" src="images/poster/Free-Guy.jpg" alt="Free Guy"><br>          
                                        <p>Free Guy <img src="images/PG13.webp" alt="PG13" class="movie-rate"></p>        
                                                            
                                        <input type="submit" class="movie-button" name="movie-button" value="Buy Ticket">
                                    </form>
                                </div>                      
                            </li>
                            <li>
                                <div class="movie-block">
                                    <form action="movie.php" method="POST">
                                        <input type="hidden" name="movie-name" value="No Time To Die">
                                        <input type="image" class="poster" src="images/poster/No-Time-To-Die.jpg" alt="No Time To Die"><br>
                                        <p>No Time To Die <img src="images/PG13.webp" alt="PG13" class="movie-rate"></p>     
                                                         
                                        <input type="submit" class="movie-button" name="movie-button" value="Buy Ticket">
                                    </form>
                                </div>                                
                            </li>
                            <li>
                                <div class="movie-block">
                                    <form action="movie.php" method="POST">
                                        <input type="hidden" name="movie-name" value="Shang-Chi">                        
                                        <input type="image" class="poster" src="images/poster/Shang-Chi.jpg" alt="Shang-Chi"><br>                                            
                                        <p>Shang-Chi And The Legend Of The Ten Rings <img src="images/PG13.webp" alt="PG13" class="movie-rate"> </p>    
                                                           
                                        <input type="submit" class="movie-button" name="movie-button" value="Buy Ticket">
                                    </form>
                                </div>                                
                            </li>                     -->
                            <?php
                                for($i=0;$i<count($nowTitle);$i++){
                                    echo "<li>";
                                    echo "<div class='movie-block'>";
                                    echo "<form action='movie.php' method='POST'>";
                                    echo "<input type='hidden' name='movie-id' value='".$nowID[$i]."'>";
                                    echo "<input type='image' class='poster' src='images/poster/" .$nowImgs[$i]. ".jpg' alt='" .$nowTitle[$i]. "'><br>";
                                    echo "<p>" .$nowTitle[$i]. "<img src='images/" .$nowRating[$i]. ".webp' alt=" .$nowRating[$i]. "' class='movie-rate'> </p>";
                                    echo "<input type='submit' class='movie-button' name='movie-button' value='Buy Ticket'>";
                                    echo "</form>";
                                    echo "</div>";
                                    echo "</li>";
                                }
                            ?>
                        </ul>
                    </div>                    
                </div>

                <div id="coming-soon">
                    <div class="movie-blocks">
                        <ul>
                            <!-- <li>                                
                                <form action="movie.php" method="POST"></form>
                                    <input type="hidden" name="movie-name" value="Dune">
                                    <input type="image" src="images/poster/Dune.jpg" alt="Dune" height="450" width="300"><br>                         
                                    <p>Dune</p>       
                                    <img src="images/M18.webp" alt="PG13" class="movie-rate">                
                                    <input type="submit" class="button" name="movie-button" value="Buy Ticket">
                                </form>
                            </li>
                            <li>                        
                                <form action="movie.php" method="POST">
                                    <input type="hidden" name="movie-name" value="Free Guy">
                                    <input type="image" src="images/poster/Free-Guy.jpg" alt="Free Guy" height="450" width="300"><br>          
                                    <p>Free Guy</p>     
                                    <img src="images/M18.webp" alt="PG13" class="movie-rate">                       
                                    <input type="submit" class="button" name="movie-button" value="Buy Ticket">
                                </form>
                            </li>
                            <li>
                                <form action="movie.php" method="POST">
                                    <input type="hidden" name="movie-name" value="No Time To Die">
                                    <input type="image" src="images/poster/No-Time-To-Die.jpg" alt="No Time To Die" height="450" width="300"><br>
                                    <p>No Time To Die</p> 
                                    <img src="images/M18.webp" alt="PG13" class="movie-rate">                       
                                    <input type="submit" class="button" name="movie-button" value="Buy Ticket">
                                </form>
                            </li>
                            <li>
                                <form action="movie.php" method="POST">
                                    <input type="hidden" name="movie-name" value="Shang Chi">                        
                                    <input type="image" src="images/poster/Shang-Chi.jpg" alt="Shang-Chi" height="450" width="300"><br>                                            
                                    <p>Shang-Chi</p>         
                                    <img src="images/M18.webp" alt="PG13" class="movie-rate">               
                                    <input type="submit" class="button" name="movie-button" value="Buy Ticket">
                                </form>
                            </li>               -->
                            <?php
                                for($i=0;$i<count($csTitle);$i++){
                                    echo "<li>";
                                    echo "<div class='movie-block'>";
                                    echo "<form action='movie.php' method='POST'>";
                                    echo "<input type='hidden' name='movie-id' value='".$csID[$i]."'>";
                                    echo "<input type='image' class='poster' src='images/poster/" .$csImgs[$i]. ".jpg' alt='" .$csTitle[$i]. "'><br>";
                                    if ($csRating[$i] == "TBA"){
                                        echo "<p>" .$csTitle[$i]. "</p>";
                                    }
                                    else{
                                        echo "<p>" .$csTitle[$i]. "<img src='images/" .$csRating[$i]. ".webp' alt=" .$csRating[$i]. "' class='movie-rate'> </p>";
                                    }                                    
                                    echo "<input type='submit' class='movie-button' name='movie-button' value='Details'>";
                                    echo "</form>";
                                    echo "</div>";
                                    echo "</li>";
                                }
                            ?>
                        </ul>
                    </div>                    
                </div>   
            </div>
        </section>

        <div class="view-all">
            <a href="movies.php" id="view-all">View All Movies &#9755;</a>
        </div>
        
    </div>    

    <?php include "footer.php" ?>

    <script>
        // Banner Section
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");        
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }        
        slides[slideIndex-1].style.display = "block";        
        }
        // Banner Section

        // Movies Block
        const nowShowing = document.getElementById("now-showing");
        const comingSoon = document.getElementById("coming-soon");
        nowShowing.style.display = "block";
        comingSoon.style.display = "none";
        function showThis(elmnt){            
            if (elmnt.name == "now-showing"){                
                nowShowing.style.display = 'block';
                comingSoon.style.display = 'none';
            }
            else{                
                nowShowing.style.display = 'none';
                comingSoon.style.display = 'block';
            }
        }
        // Movies Block
        
    </script>
</body>
</html>