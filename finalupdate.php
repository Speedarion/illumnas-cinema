<?php
    session_start();
    var_dump($_POST);
    var_dump($_SESSION);
//function to generate bookingID
    $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    function generate_string($input, $len) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $len; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
    }
    //create SUCCESS variable to flag when there error occurs on this page
    $SUCCESS = false;
    $databaseError = false;
    if ($_POST['status']=='SUCCESS'){
        //calculate total number of tix
        $totalTickets = $_SESSION['num-adult']+ $_SESSION['num-kid'];
        //generate bookingID and store in session variable for next page use
        $_SESSION['bookingID'] = generate_string($permitted_chars, 6);
        //prepare string of seat numbers
        $seats = array();
        foreach($_SESSION['empty'] as $arr){
            array_push($seats,$arr);
            }
        $_SESSION['seatsList'] = join(", ",$seats);
        $date = date('D, j M Y', strtotime($_SESSION['show-date']));
        //insert details into illumnasSeats
        //get corresponding hallID (using showID) first since it is not passed as session variables
        include 'dbconnect.php';
        $query = "SELECT hallID FROM illumnasShowtimes WHERE showID = ".$_SESSION['show-id'];
        $result = mysqli_query($conn, $query);
        if (!$result){
            $databaseError = true;
        }
    
        $hallID = array();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $hallID[] = $row['hallID'];
            }
        }
        //insert into illumnasSeats
        foreach($_SESSION['empty'] as $seat) {
            $query = "INSERT INTO illumnasSeats( hallID,showID,bookingID,seat) VALUES ('$hallID[0]','{$_SESSION['show-id']}','{$_SESSION['bookingID']}','$seat')";
            $result = mysqli_query($conn, $query);
            if (!$result){
                $databaseError = true;
            }
        }
        //insert into illumnasBooking
        echo "".$_SESSION['bookingID']."<br>";
        echo "".$_SESSION['show-id']."<br>";
        echo $totalTickets;
        $query = "INSERT INTO  illumnasBooking (bookingID,showID,numSeats) VALUES ('{$_SESSION['bookingID']}','{$_SESSION['show-id']}','$totalTickets')";
        $result = mysqli_query($conn, $query);
        if (!$result){
            $databaseError = true;
        }

        //insert into illumnasPayment
        $query = "INSERT INTO  illumnasPayment (bookingID,amountPaid,customerName,customerEmail,customerPhone,paymentType) VALUES ('{$_SESSION['bookingID']}',
        '{$_SESSION['totalAmountPaid']}','{$_SESSION['name']}',
        '{$_SESSION['email']}','{$_SESSION['mobilenum']}',
        '{$_SESSION['payment']}')";
        $result = mysqli_query($conn, $query);
        if (!$result){
            $databaseError = true;
        }
        //send email
        $to = 'f32ee@localhost';
        $subject = 'Movie Ticket Booking Confirmation';
        $message = "
        Dear Customer ,
        Your ticket booking has been confirmed . The booking details
        are as stated below :
        BOOKING ID : ".$_SESSION['bookingID']."
        Movie : ". $_SESSION['title']."
        ".$_SESSION['hall']."
        Date : ".$date."
        Time : ".$_SESSION['time']."
        Seats : ".$_SESSION['seatsList']."
        
        Thank you for patronising Illumnas Cinema .
        
        Yours sincerely , 
        Illumnas Cinema";
        $headers = 'From:illumnascinema@org.com';
        mail($to,$subject,$message, $headers,'-f32ee@localhost');

        $SUCCESS = true;
        $_SESSION['status'] = $_POST['status'];
        mysqli_close($conn);

    }
    else{//If payment error 
        $_SESSION['status'] = $_POST['status'];
        $SUCCESS = true;

    }
    if (($SUCCESS === true)&($databaseError === false)){        
        // redirect to page final.php if no error
        header("Location: finalpage.php");
        exit();
    }
    else{
        //if there is error inserting into database,  $databaseError = true ,   enter here and show error page
        $_SESSION['status'] = "ERROR";
        header("Location: finalpage.php");
        exit();
    }
?>