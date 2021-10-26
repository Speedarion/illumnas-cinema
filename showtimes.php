<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Showtimes</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .wrapper{
        width: 80%;    
        margin: auto; /*top and bottom 5px , left and right 150px*/
        }
        .links{
            margin-top: 10px;
        }
        .links a{
            text-decoration: none;
            color: #edeade;
        }

        .links a:hover{
            font-size: larger;
            color: white;
        }
        .image{float:left;height:350px;
        width:250px;}

        .datebox {
            display: inline-block;
            border: 2px ;
            border-style:solid;
            background-color: #343a2d;
            height:75px;
            width:150px;
            cursor:pointer;
            text-align: center;
            color: white ;
            text-decoration: none;
            font-size: 17px;
            }

        .datebox:hover {
            background-color: #ddd;
            color: black;
        }
        .datebox:active{
            background-color: #ddd;
        }
        .movieblock {margin-top:50px;margin-bottom:100px}
        .movieposter {display: inline-block;vertical-align:top;}
        .moviedetails {margin-left: 50px;
            display: inline-block;
            vertical-align:top;}
        .movie-rate{
        height: 30px;
        width: 40px;
        vertical-align: sub; 
        }
            
  
  
                 
        .time-btn{
            background-image: linear-gradient(to right, #000428 0%, #004e92  51%, #000428  100%);
            box-shadow: 0 4px 10px 0 rgba(45, 54, 65, 0.75);
            cursor: pointer;
            text-align: center;
            color: white;
            width: 75px;
            height: 40px;          
            font-size: 20px;
            font-weight: 600;        
            border: none;
            background-size: 300% 100%;
            border-radius: 20px;            
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
            margin-right:25px;
        }
        .time-btn:hover{
            background-position: 100% 0;        
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }
        
        #scrollToTopBtn {
        background-color: #696969;
        width:200px;
        border: solid 3px black;
        color: white;
        cursor: pointer;
        font-size: 18px;
        line-height: 40px;
        position:relative;
        bottom: 100px;
        right:-1000px; 
        }
    </style>

</head>
<body>
    <?php include "header.php" ?>
    <!-- https://www.w3schools.com/howto/howto_js_topnav.asp -->
    <!-- header -->
    <div class="wrapper">
        <section class="showtimes">
            <div class="container">
                <div class="links">
                    <a  class="link" href="index.php">Home</a> / <strong style="text-decoration: underline;">Showtimes</strong></a>
                </div>
                <br>
                <?php 
                    function format_string($title){
                        $imgs = str_replace(": ", "-", $title);
                        $imgs = str_replace(" ", "-", $imgs);                        
                        $imgs = str_replace("'", "", $imgs);
                        return $imgs;
                    }

                    function get_values($result){
                        $title = array();
                        $genre = array();
                        $duration = array();
                        $lang = array();
                        $subs = array();
                        $rating = array();
                        $id = array();
                        $imgs = array();
                        if (mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                $title[] = $row['title'];
                                $genre[] = $row['genre'];
                                $duration[] = $row['runningTime'];
                                $lang[] = $row['language'];
                                $subs[] = $row['subtitles'];
                                $rating[] = $row['rating'];
                                $id[] = $row['movieID'];
                                
                            }
                        }
                        $result->free();
                        $imgs = format_string($title);
                        return array($title,$genre,$duration,$lang,$subs, $rating, $id, $imgs);
                    }

                    include "dbconnect.php";
                    $nowQuery = "SELECT title,genre,runningTime,language,subtitles, rating, movieID FROM illumnasMovies WHERE releaseDate <= NOW() ORDER BY releaseDate";
                    
                    // Now Showing
                    $nowResult = mysqli_query($conn, $nowQuery);
                    $nowData = get_values($nowResult);
                    $nowTitle = $nowData[0];
                    $nowGenre = $nowData[1];
                    $nowDuration = $nowData[2];
                    $nowLang = $nowData[3];
                    $nowSubs = $nowData[4];
                    $nowRating = $nowData[5];
                    $nowID = $nowData[6];
                    $nowImgs = $nowData[7];                    

                    $conn->close();
                ?>
                <h1>Showtimes</h1>
                <div class="datebar">
                    <?php
                        function getuniquedate($result){
                            $date = array();
                            if (mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $date[] = $row['showDate'];
                                    //echo $date[0];
                                }
                            }
                            $result->free();
                            return array($date);
                        }
                        function showtime_values($result){
                            $showid = array();
                            $movieid = array();
                            $starttime = array();
                            $hallname = array();
                            $date = array();
                            if (mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $showid[] = $row['showID'];
                                    $movieid[] = $row['movieID'];
                                    $starttime[] = $row['startTime'];
                                    $hallname[] = $row['hallName'];
                                    $date[] = $row['showDate'];
                                }
                            }
                            $result->free();
                            return array($showid,$movieid,$starttime,$hallname,$date);
                        }
                        include "dbconnect.php";
                        if(empty($_POST['selectedDate'])){
                            //BY DEFAULT DISPLAY EARLIEST DATE IN DATABASE
                            $query = "SELECT showDate FROM illumnasShowtimes order by showDate ASC limit 1";
                            $result = mysqli_query($conn, $query);
                            $uniqueDate = getuniquedate($result);
                            $defaultDate = $uniqueDate[0];
                            $_POST['selectedDate']=$defaultDate[0];
                            }
                         
                        
                        include "dbconnect.php";
                        $query = "SELECT illumnasShowtimes.showDate FROM illumnasShowtimes";
                        $result = mysqli_query($conn, $query);
                        $showdates = getuniquedate($result);
                        $startTime = $showdates[0];
                        //array_unique creates an array of unique values from the given array.i.e duplicates removed
                        $uniqueDate = array_unique($startTime);
                        echo "<table>";
                            echo "<tr>";
                            foreach ($uniqueDate as $arr){
                                $timestamp = strtotime($arr);
                                $day = date('D',$timestamp);
                                echo "<td>";?>
                                <form method='POST' action="<?php echo $_SERVER["PHP_SELF"];?>">
                                <?php
                                echo "<input type='hidden' name='selectedDate' value='".$arr."'>";
                                echo "<input type='submit' id='datebox' class='datebox' name='day' value='".$day." ".$arr."' >";
                                echo "</form>";
                                echo "</td>";
                            }
                            echo "</tr>";
                        echo "</table>";
                    ?>                  
                </div>
                <div id='showtimelist'>
                    <?php

                        for($i=0;$i<count($nowTitle);$i++){
                            echo "<div class='movieblock'>";
                            echo "<div class='movieposter'>";
                            echo "<form action = 'movie.php' method ='POST'>";
                            echo "<input type='hidden' name='movie-id' value='".$nowID[$i]."'>";
                            echo "<input type='image' class='image' src='images/poster/" .$nowImgs[$i]. ".jpg' alt='" .$nowTitle[$i]. "'>";
                            echo "</form>";
                            echo "</div>";
                            echo "<div class='moviedetails'>" ;
                            echo "<h1><b>".$nowTitle[$i]."</b><img src='images/" .$nowRating[$i]. ".webp' class='movie-rate'></h1>";
                            echo "<h3><b>".$nowGenre[$i]." | ".$nowDuration[$i]. " Mins | " .$nowLang[$i]." (Subtitles : ".$nowSubs[$i].")</b></h3>";
                            $query = "SELECT illumnasShowtimes.showID,illumnasShowtimes.movieID, illumnasShowtimes.startTime, illumnasHalls.hallName, illumnasShowtimes.showDate FROM illumnasShowtimes, illumnasHalls where illumnasShowtimes.hallID=illumnasHalls.hallID AND illumnasShowtimes.movieID=".$nowID[$i]." AND illumnasShowtimes.showDate='".$_POST['selectedDate']."'ORDER BY illumnasShowtimes.startTime ASC";
                            $result = mysqli_query($conn, $query);
                            $showtimeData = showtime_values($result);
                            $showID = $showtimeData[0];
                            $movieID = $showtimeData[1];
                            $startTime = $showtimeData[2];
                            $hallName = $showtimeData[3];
                            $showDate = $showtimeData[4];
                            echo "<form action='seating_plan.php' method='POST'>";
                            for($j=0;$j<count($startTime);$j++){
                                    echo "<input type='hidden' name='show-id' value='" .$showID[$i]. "'>";  
                                    echo "<input type='hidden' name='movie-id' value='" .$nowID[$i]. "'>";                          
                                    echo "<input type='hidden' name='show-date' value='" .$showDate[$i]. "'>";
                                    echo "<input type='hidden' name='hall' value='" .$hallName[$i]. "'>";
                                    $time = date('H:i', strtotime($startTime[$j]));
                                    //if more than 5 showtimes , print buttons on a new line
                                    if ($j%5==0){
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<input type='submit' class='time-btn' name='time-btn' value='" .$time. "'>";    
                                    }
                                    else{
                                        echo "<input type='submit' class='time-btn' name='time-btn' value='" .$time. "'>";    
                                    }
                            }                    
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
        </section>
        <div>
            <button id="scrollToTopBtn">Back to Top ☝️</button>
        </div>
    </div>


    <?php include "footer.php" ?>
    <script>
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");
        var rootElement = document.documentElement;

        function scrollToTop() {
        // Scroll to top logic
        rootElement.scrollTo({
            top: 0,
            behavior: "smooth"
        });
        }
        scrollToTopBtn.addEventListener("click", scrollToTop);
        function setactive(element){
            var datebox = document.getElementById(element)
            datebox.style.backgroundColor = 'white';
            /*const datebox = document.getElementByClass("datebox");
            var elements = document.getElementsByClassName('datebox');
            for (var i=0; i<elements.length; i++) {
                today = new Date(new Date().getTime() + i*(24 * 60 * 60 * 1000));
                today = today.toDateString();
                date = today ;
                document.write(today);
                elements[i].value=date;
            }*/
            
        }
        //window.reload = setactive();
    </script>

</body>
</html>