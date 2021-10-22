<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Homepage</title>
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
        .movieblock {margin-bottom:250px}
        .moviedetails {margin-left: 300px;}
        
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
                <h1>Showtimes</h1>
                <div class="datebar">
                    <table>
                        <tr>
                            <th><input type="submit" class="datebox" name="day" value="TODAY" ></th>
                            <th><input type="submit" class="datebox" name="day" value="MON" ></th>
                            <th><input type="submit" class="datebox" name="day" value="TUE" ></th>
                            <th><input type="submit" class="datebox" name="day" value="WED"></th>
                            <th><input type="submit" class="datebox" name="day" value="THU" ></th>
                        </tr>  
                    </table>                      
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
                <div id='showtimelist'>
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
                            echo "<h1><b>".$nowTitle[$i]."</b><img src='images/" .$nowRating[$i]. ".webp' width=30 height=30></h1>";
                            echo "<h3><b>".$nowGenre[$i]." | ".$nowDuration[$i]. " Mins | " .$nowLang[$i]." (Subtitles : ".$nowSubs[$i].")</b></h3>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
        </section>
    </div>


    <?php include "footer.php" ?>
    <script>
        function setDate(){
            var month = new Array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEPT", "OCT", "NOV", "DEC");
            var days = new Array("SUN","MON","TUE","WED","THU","FRI","SAT")
            var today = new Date();
            var dayoftheweek;
            var mm ;
            var yyyy ;
            var elements = document.getElementsByClassName('datebox');
            for (var i=0; i<elements.length; i++) {
                today = new Date(new Date().getTime() + i*(24 * 60 * 60 * 1000));
                today = today.toDateString();
                date = today ;
                document.write(today);
                elements[i].value=date;
            }
        }
        window.onload = setDate();
    </script>

</body>
</html>