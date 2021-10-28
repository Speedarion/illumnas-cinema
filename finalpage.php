<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Showtimes</title>
    <link rel="stylesheet" href="style.css">

<style>
.errorbox{
    padding:25px;
    width:550px;
    height:100px;
    background-color: #696969;
    border : 2px solid black;
    margin:auto;
}
.successbox{
    padding:25px;
    width:750px;
    height:400px;
    background-color: #696969;
    border : 2px solid black;
    margin:auto;
    display:block;
}
.successbox h1{
    text-align: center;
}
.img-container, .desc-container{
        margin-left : 50px;
        display:inline-block;

    }
.desc-container{
    vertical-align: top;
    margin-left: 50px;
}
.desc-container p{
    font-size: 18px;
}
.homebutton {
    padding:25px;
    width:550px;
    height:100px;
    margin:auto;

}
.backtohome {background-image: linear-gradient(to right, #D31027 0%, #EA384D  51%, #D31027  100%)}
.backtohome {
    margin:25px 120px;
    cursor:pointer;
    font-size:20px;
    font-weight: 900;
    width :300px;
    padding:5px 10px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;            
    border-radius: 10px;
    display: block;
}

.backtohome:hover {
background-position: right center; /* change the direction of the change here */
color: #fff;
text-decoration: none;
}
         
</style>
</head>
<body>

    <?php 
        include "header.php" ;
    ?>
    <div class="wrapper">
        <section>
            <?php
            if ($_SESSION['status']=='SUCCESS'){
                echo "<div class='container'>";
                    echo "<div class='successbox'>";
                        echo "<h1><bold>PAYMENT SUCCESSFUL</bold></h1>";
                        echo "<div class='img-container'>";            
                            echo "<img src='images/poster/".$_SESSION['img'].".jpg' alt='Poster' height='250px' width='200px'>";
                        echo "</div>";
                        echo "<div class='desc-container'>";
                            echo "<p><bold> BOOKING ID : ".$_SESSION['bookingID']."</bold></p>";
                            echo "<p>Movie : ". $_SESSION['title']."</h2>";
                            echo "<p>".$_SESSION['hall']."</p>";
                            echo "<p>Date : ".$_SESSION['show-date']."</p>";
                            echo "<p>Time : ".$_SESSION['time']."</p>";
                            echo "<p>Seats : ".$_SESSION['seatsList']."</p>";
                        echo "</div>";
                        echo "<p> Your ticket booking has been confirmed . An email acknowledgment have been sent to your registered email .Thank you for patronising Illumnas Cinema.</p>";

                    echo "</div>";
                    echo "<div class='homebutton'>";
                        echo "<button id='home' type='button' class='backtohome' onclick=\"location.href='http://192.168.56.2/f32ee/illumnas-cinema/index.php'\">BACK TO HOME</button>";
                    echo "</div>";
                echo "</div>";
                

            }
            else{
                //if payment status = ERROR
                echo "<div class='container'>";
                    echo "<div class='errorbox'>";
                        echo "<h1><bold>PAYMENT UNSUCCESSFUL</bold></h1>";
                        echo "<p> The payment process is unsuccessful . Please re-attempt booking . </p>";
                    echo "</div>";
                    echo "<div class='homebutton'>";
                        echo "<button id='home' type='button' class='backtohome' onclick=\"location.href='http://192.168.56.2/f32ee/illumnas-cinema/index.php'\">BACK TO HOME</button>";
                    echo "</div>";
                echo "</div>";

            }

            ?>
        </section>
    </div>


<?php include "footer.php" ?>

</body>
</html