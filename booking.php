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
            height: 550px;
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
            margin-bottom: 50px;
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
    </style>
</head>
<body>
    <?php include "header.php";?>

    <div class="wrapper">
        <h2 class="subtitle">Check Booking Details</h2>
        <div class="check">
            <form action="booking.php" method="$_POST">
                <label for="booking-id"><strong>Booking ID:</strong></label>
                <input type="text" name="booking-id" id="booking-id" required placeholder="ABCDEF">
                <br><br>
                <input type="submit" name="submit" id="submit" value="CHECK">
            </form>
        </div>

        <!-- To-Do: Retrieve booking details from database -->
    </div>    

    <?php include "footer.php";?>
    
</body>
</html>