<!-- To-Do: Implement PHP's Session to get the movie information -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Dune</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* The Modal (background) */
        /* .wrapper{
            width: 80%;
            margin: auto;
        } */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 50px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        
        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        /* The Modal (background) */

        /* Image Overlay Fade */
        /* Refer https://www.w3schools.com/howto/howto_css_image_overlay.asp */
        .container{
            display: inline-block;
            position: relative;            
        }
        .middle {
        cursor: pointer;
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
        }
        .container:hover input[type="image"] {
        opacity: 0.3;
        }
        .container:hover .middle {
        opacity: 1;
        }
        .text {
        background-color: #2e2e2e;
        color: white;
        font-weight: bold;
        font-size: 16px;
        padding: 16px 32px;
        }


        /* Links to Previous Pages */
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
        /* Links to Previous Pages */

        /* Description */
        /* .desc input[type="image"]{
            display: inline-block;
        } */

        .movie-rate{
            height: 30px;
            width: 40px;
            vertical-align: -2px;
        }

        .details{
            display: inline-block;
            vertical-align: top;
            margin-top: 0px;
            margin-left: 35px;
        }
        
        .details table{
            table-layout: fixed;
            width: 750px;   
            border-spacing: 0 20px;     
        }    

        .details td:nth-child(1){
            text-align: left;
            width: 120px;
            vertical-align: top;
        }

        .details td:nth-child(3){
            text-align: left;
            width: 150px;
            vertical-align: top;
            padding-left: 40px;
        }

        .details td:nth-child(even){
            text-align: left;
            width: 200px;
            vertical-align: top;
        }

        .summary{
            display: block;
            margin-bottom: 20px;
            background-color: #696969;
            height: 100px;
        }

        .summary p{
            padding: 11px 15px;
            text-align: justify;
            font-style: italic;
        }
        /* Description */
    </style>
    
</head>
<body>
    <?php 
        function format_string($title){
            $imgs = str_replace(": ", "-", $title);
            $imgs = str_replace(" ", "-", $imgs);                        
            $imgs = str_replace("'", "", $imgs);
            return $imgs;
        }

        function format_time($runningTime){
            $hr = floor($runningTime/60);
            $min = $runningTime%60;            
            if($hr==0 and $min==0){
                $res = "NA";
            }
            else{
                $res = "$hr Hr $min Mins";
            }
            return $res;
        }

        include "header.php"; 
        include "dbconnect.php";
        session_start();
        $_SESSION['movie-id'] = $_POST['movie-id'];
        $query = "SELECT * FROM illumnasMovies WHERE movieID=" .$_SESSION['movie-id'];
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $_SESSION['title'] = $row['title'];
                $_SESSION['img'] = format_string($row['title']);
                $desc = $row['description'];
                $cast = $row['cast'];
                $director = $row['director'];
                $distributor = $row['distributor'];
                $releaseDate = $row['releaseDate'];
                $runningTime = format_time($row['runningTime']);
                $language = $row['language'];
                $subtitles = $row['subtitles'];
                $genre = $row['genre'];
                $rating = $row['rating'];

            }
        }
        $result->free();
        $conn->close();
    ?>      

    <div class="wrapper">
        <!-- Link to Previous Page -->
        <div class="links">
            <a  class="link" href="index.php">Home</a> / <a class="link" href="movies.php">Movies</a> / <strong style="text-decoration: underline;"><?php echo $_SESSION['title']; ?></strong>
        </div>

        <div class="desc">
            <h1 id="title">
                <?php 
                    echo $_SESSION['title']; 
                    if ($rating != "TBA"){
                        echo "<img class='movie-rate' src='images/" .$rating. ".webp' alt='" .$rating. "'>";
                    }
                ?>               
            </h1>

            <!-- Refer https://www.w3schools.com/howto/howto_css_modals.asp -->
            <!-- Trigger/Open The Modal -->
            <div class="container">
                <input type="image" id="myBtn" src="images/poster/<?php echo $_SESSION['img']; ?>.jpg" height="300" width="220">
                <div class="middle">
                    <div class="text">TRAILER</div>
                </div>
            </div>
            

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <!-- To Fix: Closing the modal won't stop the video -->
                    <iframe width="1080" height="600" src="https://www.youtube.com/embed/8g18jFHCLXk" id="video"></iframe>
                </div>
            </div>

            <div class="details">
                <h2 id="details">DETAILS</h2>

                <table>
                    <tr>
                        <td rowspan="2">CAST:</td>
                        <td rowspan="2"><?php echo $cast; ?></td>
                        <td>RELEASE DATE:</td>
                        <td><?php echo $releaseDate; ?></td>
                    </tr>
                    <tr>                        
                        <td style="padding-left: 40px;">RUNNING TIME:</td>
                        <td><?php echo $runningTime; ?></td>
                    </tr>
                    <tr>
                        <td>DIRECTOR:</td>
                        <td><?php echo $director; ?></td>
                        <td>LANGUAGE:</td>
                        <td><?php echo $language; ?> (Subtitles: <?php echo $subtitles; ?>)</td>
                    </tr>
                    <tr>
                        <td>DISTRIBUTOR:</td>
                        <td><?php echo $distributor; ?></td>
                        <td>GENRE:</td>
                        <td><?php echo $genre; ?></td>
                    </tr>
                </table>
                
            </div>      
        </div>

        <div class="summary">
            <p><?php echo $desc; ?></p>
        </div>

        <!-- <div class="showtimes">
            <h1 id="showtimes">SHOWTIMES</h1>

            <table id="showtimes-table">
                <tr>
                    <th>DATE</th>
                    <th>TIMING</th>
                </tr>
                <tr>
                    <td>TODAY <br> 8-10-2021</td>
                    <td>
                        <form action="seating_plan.php">
                            <input type="hidden" name="time" value="11:50">
                            <input type="submit" name="time-btn" value="11:50">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>SAT <br> 9-10-2021</td>
                    <td>
                        <form action="seating_plan.php">
                            <input type="hidden" name="time" value="11:50">
                            <input type="submit" name="time-btn" value="11:50">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>SUN <br> 10-10-2021</td>
                    <td>
                        <form action="seating_plan.php">
                            <input type="hidden" name="time" value="11:50">
                            <input type="submit" name="time-btn" value="11:50">
                        </form>
                    </td>
                </tr>
            </table>
        </div> -->
    </div>
    

    <?php include "footer.php"; ?>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        var textBtn = document.getElementsByClassName('text');
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        textBtn[0].onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        var video = document.getElementById('video');
        span.onclick = function() {
          // pause the video
          var src = video.getAttribute("src");
          video.setAttribute("src", "");
          video.setAttribute("src", src);
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>   
     
</body>
</html>