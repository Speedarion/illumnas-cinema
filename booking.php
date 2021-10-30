<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Check Booking</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .wrapper{
            height: 650px;
        }
        h2.subtitle{
            text-transform: uppercase;
            text-align: center;
            margin: 30px 0;
        }
        .check{
            text-align: center;
            font-size: 20px;
            margin: 0px 200px;
            margin-bottom: 20px;
            background-color: #696969;
            padding: 20px;
        }
        #booking-id{
            height: 20px;
            vertical-align: bottom;
        }
        #submit{
            cursor: pointer;
            color: white;
            background-color: #2e2e2e;
            border-color: transparent;
            height: 50px;
            width: 80px;
            font-weight: bold;            
        }
        #submit:hover{
            font-size: 15px;
        }
        .result{
            border : 2px solid black;            
            background-color: #696969;
            height: 400px;
            width: 900px;
            margin-left: 148px;
        }
        .no-result{
            text-align: center;
            font-size: 20px;
        }
        .img-container, .desc-container{
            display: inline-block;
            margin-left: 190px;
        }
        .desc-container{
            vertical-align: top;
            margin-left: 30px;
        }
    </style>
</head>
<body>
    <?php 
        include "header.php";
        function format_string($title){
            $imgs = str_replace(": ", "-", $title);
            $imgs = str_replace(" ", "-", $imgs);                        
            $imgs = str_replace("'", "", $imgs);
            return $imgs;
        }
    ?>

    <div class="wrapper">
        <h2 class="subtitle">Check Booking Details</h2>
        <div class="check">
            <form action="booking.php" method="POST">
                <label for="booking-id"><strong>Booking ID:</strong></label>
                <input type="text" name="booking-id" id="booking-id" maxlength="6" required placeholder="ABCDEF">
                <br><br>
                <input type="submit" name="submit" id="submit" value="CHECK">
            </form>
        </div>

        <!-- Retrieve booking details from database -->
        <?php 
        if(isset($_POST['submit'])){
        ?>
            <div class="result">
                <h2 class="subtitle">Booking Details</h2>
                <?php 
                    include 'dbconnect.php';
                    $bookingID = trim($_POST['booking-id']);
                    // check whether bookingID exists
                    $bQuery = "SELECT * FROM illumnasBooking where bookingID = '" .$bookingID. "'";
                    $bResult = mysqli_query($conn, $bQuery);

                    if(mysqli_num_rows($bResult)>0){
                        while($row = mysqli_fetch_assoc($bResult)){
                            $showID = $row['showID'];
                            $bookingTime = $row['bookingTime'];
                        }
                        // get booking details
                        // movie title, date of the show, startTime, hall, seats
                        $dQuery = "SELECT illumnasMovies.title, illumnasShowtimes.showDate, illumnasShowtimes.startTime, illumnasHalls.hallName, illumnasSeats.seat FROM illumnasMovies, illumnasShowtimes, illumnasHalls, illumnasSeats WHERE illumnasSeats.hallID=illumnasHalls.hallID AND illumnasSeats.showID=illumnasShowtimes.showID AND illumnasShowtimes.movieID=illumnasMovies.movieID and illumnasSeats.bookingID = '" .$bookingID. "'";
                        $dResult = mysqli_query($conn, $dQuery);
                        if (mysqli_num_rows($dResult)>0){
                            $seats = array();
                            while($row=mysqli_fetch_assoc($dResult)){
                                $title = $row['title'];
                                $showDate = $row['showDate'];
                                $startTime = $row['startTime'];
                                $hall = $row['hallName'];
                                $seats[] = $row['seat']; 
                            }                    
                        }
                        $img = format_string($title);
                        
                        echo "<div class='img-container'>";            
                            echo "<img src='images/poster/".$img.".jpg' alt='Poster' height='250px' width='200px'>";
                        echo "</div>";
                        echo "<div class='desc-container'>";
                            echo "<p><bold> BOOKING ID : ".$bookingID."</bold></p>";
                            echo "<p>Movie : ". $title."</h2>";
                            echo "<p>".$hall."</p>";
                            $date = date('D, j M Y', strtotime($showDate));
                            echo "<p>Date : ".$date."</p>";
                            $time = date('H:i', strtotime($startTime));
                            echo "<p>Time : ".$time."</p>";
                            $seatsList = join(", ", $seats);
                            echo "<p>Seats : ".$seatsList."</p>";
                        echo "</div>";
                        
                    }
                    else{
                        echo "<p class='no-result'> Booking ID <strong><i>$bookingID</i></strong> is not found. <br>Please check your input.</p>";
                    }
                ?>
            </div>
        <?php    
        }
        ?>
    </div>    

    <?php include "footer.php";?>
    
</body>
</html>