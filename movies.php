<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Movies</title>
    <link rel="stylesheet" href="style.css">
    <style>
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

        .status{
            color: white;
            font-weight: bold;
            font-size: 30px;
            border-color: black;            
            background-color: #2e2e2e;
            margin-right: 740px;
            padding: 10px 5px;
            border:solid 1px yellow;
        }

        .status-button{
            cursor: pointer;
            border: none;
            background-color: transparent; 
            color: white;
            font-weight: bold;
            font-size: 30px;           
        }
        .status-button:hover{
            background-color: #ddd;
            color: black;
        }
        .wrapper{
        width: 80%;    
        margin: auto; /*top and bottom 5px , left and right 150px*/
    
}
        .movieblock {margin-bottom:250px}
        .moviedetails {margin-left: 300px;}
        

        .dtls-btn {
            background-image: linear-gradient(to right, #D31027 0%, #EA384D  51%, #D31027  100%);
            cursor: pointer;
            width: 110px;
            height: 40px;
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            border-radius: 10px;
            border:none;
            display: block;
          }

        .dtls-btn:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         
         
        .movie-button{
            cursor: pointer;
            width: 110px;
            height: 40px;
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
    <!-- header         section {width:80%;margin:auto}        
-->
    <div class="wrapper">
        <section class="movielist">
            <div class="container">
                <div class="links">
                    <a  class="link" href="index.php">Home</a> / <strong style="text-decoration: underline;">Movies</strong></a>
                </div>
                <br>
                <h1>Movies</h1>
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
                        $genre = array();
                        $duration = array();
                        $lang = array();
                        $subs = array();
                        $desc = array();
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
                                $desc[] = $row['description'];
                                $rating[] = $row['rating'];
                                $id[] = $row['movieID'];
                                
                            }
                        }
                        $result->free();
                        $imgs = format_string($title);
                        return array($title,$genre,$duration,$lang,$subs,$desc, $rating, $id, $imgs);
                    }

                    include "dbconnect.php";
                    $nowQuery = "SELECT title,genre,runningTime,language,subtitles,description, rating, movieID FROM illumnasMovies WHERE releaseDate <= NOW() ORDER BY releaseDate";
                    $csQuery = "SELECT title,genre,runningTime,language,subtitles,description, rating, movieID FROM illumnasMovies WHERE releaseDate > NOW() ORDER BY releaseDate";
                    
                    // Now Showing
                    $nowResult = mysqli_query($conn, $nowQuery);
                    $nowData = get_values($nowResult);
                    $nowTitle = $nowData[0];
                    $nowGenre = $nowData[1];
                    $nowDuration = $nowData[2];
                    $nowLang = $nowData[3];
                    $nowSubs = $nowData[4];
                    $nowDesc = $nowData[5];
                    $nowRating = $nowData[6];
                    $nowID = $nowData[7];
                    $nowImgs = $nowData[8];                    
                    // Coming Soon
                    $csResult = mysqli_query($conn, $csQuery);
                    $csData = get_values($csResult);
                    $csTitle = $csData[0];
                    $csGenre = $csData[1];
                    $csDuration = $csData[2];
                    $csLang = $csData[3];
                    $csSubs = $csData[4];
                    $csDesc = $csData[5];
                    $csRating = $csData[6];
                    $csID = $csData[7];
                    $csImgs = $csData[8];  
                    
                    $conn->close();
                ?>
                <div id="now-showing">
                    <?php
                        for($i=0;$i<count($nowTitle);$i++){
                            echo "<div class='movieblock'>";
                            echo "<div>";
                            echo "<form action = 'movie.php' method ='POST'>";
                            echo "<input type='hidden' name='movie-id' value='".$nowID[$i]."'>";
                            echo "<input type='image' class='image' src='images/poster/" .$nowImgs[$i]. ".jpg' alt='" .$nowTitle[$i]. "'>";
                            echo "</form>";
                            echo "</div>";
                            echo "<div class='moviedetails'>" ;
                            echo "<h1><b>".$nowTitle[$i]."</b><img src='images/" .$nowRating[$i]. ".webp' width=40 height=30></h1>";
                            echo "<h3><b>".$nowGenre[$i]." | ".$nowDuration[$i]. " Mins | " .$nowLang[$i]." (Subtitles : ".$nowSubs[$i].")</b></h3>";
                            echo "<p>".$nowDesc[$i]."</p>";
                            echo "<form action='movie.php' method='POST'>";
                            echo "<input type='hidden' name='movie-id' value='".$nowID[$i]."'>";
                            echo "<input type='submit' class='movie-button' name='movie-button' value='Buy Ticket'> ";
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
                <div id="coming-soon">
                    <?php
                        for($i=0;$i<count($csTitle);$i++){
                            echo "<div class='movieblock'>";
                            echo "<div>";
                            echo "<form action = 'movie.php' method ='POST'>";
                            echo "<input type='hidden' name='movie-id' value='".$csID[$i]."'>";
                            echo "<input type='image' class='image' src='images/poster/" .$csImgs[$i]. ".jpg' alt='" .$csTitle[$i]. "'>";
                            echo "</form>";
                            echo "</div>";
                            echo "<div class='moviedetails'>" ;
                            echo "<h1><b>".$csTitle[$i]."</b></h1>";
                            echo "<h3><b>".$csGenre[$i]." | " .$csLang[$i]." (Subtitles : ".$csSubs[$i].")</b></h3>";
                            echo "<p>".$csDesc[$i]."</p>";
                            echo "<form action='movie.php' method='POST'>";
                            echo "<input type='hidden' name='movie-id' value='".$csID[$i]."'>";
                            echo "<input type='submit' class='dtls-btn' name='dtls-btn' value='Details'>";
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
    // Movies Block
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

