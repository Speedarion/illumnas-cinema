<!-- $_POST['num-adult']: number of adult tickets
$_POST['num-kid']: number of kid tickets
$_POST['empty']: array of selected seats -->
<?php
$_SESSION['num-adult'] = $_POST['num-adult'];
$_SESSION['num-kid'] = $_POST['num-kid'] ;
$_SESSION['empty'] = $_POST['empty'];
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
        color: white;}

    /* Details */
    .details{
            margin-top: 25px ;
            margin-bottom:25px;
            
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
    table#confirmTable{
        background-color: #696969;
        border : 2px solid black;
        border-collapse: collapse;

    }
    table#confirmTable tr{
        border : 2px solid black;
    }

    table#confirmTable td{
        width:1000px;
    }
    .seatlabel{
        margin:10px;
        margin-left:50px;
        display:inline-block;
    }
    .tickettype{
        margin:10px;
        vertical-align: top;
        margin-left:100px;
        display:inline-block;
    }
    #label{
        font-weight: bold;
    }
    .ticketqty{
        margin:10px;
        vertical-align: top;
        margin-left:200px;
        display:inline-block;
    }
    .ticketprice{
        margin:10px;
        vertical-align: top;
        margin-left:200px;
        display:inline-block;
    }
    .paymentlabel{
        margin:10px;
        margin-left:50px;
        display:inline-block;
    }
    .grandtotal{
        margin:10px;
        vertical-align: middle;
        margin-left:540px;
        display:inline-block;
    }
    .entry{margin:50px;
    }
    .form{
        width:850px;
        height:300px;
        background-color: #696969;
        border : 2px solid black;
    }
    .form label{
		display:inline-block;
		text-align:left;
		width:160px;
		vertical-align:top;
		margin-right:20px;
        font-size:16pt;
	}

    .form input{
        font-size:16pt;
    }

         
    .link-btn {background-image: linear-gradient(to right, #D31027 0%, #EA384D  51%, #D31027  100%)}
    .link-btn { 
    width: 120px;
    height: 36px;
    font-size:16pt;
    cursor: pointer;
    transition: 0.5s;            
    background-size: 200% auto;
    color: white;            
    border-radius: 10px;            
    }
    .link-btn:hover {
    background-position: right center; /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
    }  
    .buttons{
        margin-left : 400px;
    } 
    #submit{
        width :200px;
    }


/* Details */
</style>
</head>
<body>
  
    <?php 
        include "header.php" ;
        session_start();
    ?>
    <!-- https://www.w3schools.com/howto/howto_js_topnav.asp -->
    <!-- header -->
    <div class="wrapper">
        <section class="confirmation">
            <div class="container">
                <div class="links">
                    <a  class="link" href="index.php">Home</a> / <a class="link" href="movies.php">Movies</a> / <a class="link" href="movie.php"><?php echo $_SESSION['title']; ?></a> / <a class="link" href="seating_plan.php">Seating Plan</a> / <strong style="text-decoration: underline;">Payment</strong>
                </div>
                <br>
                <h1>BOOKING CONFIRMATION</h1>
                <table id='confirmTable'>
                    <tr>
                        <td>
                            <div class="details">
                                <div class="img-container">            
                                    <img src="images/poster/<?php echo $_SESSION['img']; ?>.jpg" alt="Poster" height="300px" width="200px">
                                </div>
                                <div class="desc-container">
                                    <h2 id="title"><?php echo $_SESSION['title']; ?></h2>
                                    <p><?php echo $_SESSION['hall'];?></p>
                                    <p>Date: <?php echo $_SESSION['show-date'];?></p>
                                    <p><?php echo $_SESSION['time'];?></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="seats">
                                <div class="seatlabel">
                                    <h1><bold><strong>SEATS</strong></bold></h1>    
                                </div>
                                <div class="tickettype">
                                    <?php
                                        function get_values($result){
                                            $type = array();
                                            $price = array();
                                   
                                            if (mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $type[] = $row['ticketType'];
                                                    $price[] = $row['ticketPrice'];    
                                                }
                                            }
                                            $result->free();
                                            return array($type,$price);
                                        }
                                        include "dbconnect.php";
                                        $query = "SELECT ticketType,ticketPrice  FROM illumnasPrice";
                                        $result = mysqli_query($conn, $query);
                                        $ticketData = get_values($result);
                                        $ticketType = $ticketData[0];
                                        $ticketPrice = $ticketData[1];
                                        echo "<span id='label'>TYPE</span><br>";
                                        if ($_POST['num-adult']>0){
                                            echo "Adult";
                                            echo "<br>";
                                        }
                                        if ($_POST['num-adult']>0 and $_POST['num-kid']>0){
                                            echo "<br>";
                                        }
                                        if ($_POST['num-kid']>0){
                                            echo "Child";
                                            echo "<br>";
                                        }
                                        echo "<br>";
                                        $seats = array();
                                        foreach($_POST['empty'] as $arr){
                                            array_push($seats,$arr);
                                            }
                                        echo join(",",$seats);

                                        
                                        
                                    ?>
                                </div>
                                <div class="ticketqty">
                                    <?php
                                    echo "<span id='label'>QUANTITY</span><br>";
                                        if ($_POST['num-adult']>0){
                                            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$_POST['num-adult']."";
                                            echo "<br>";
                                        }
                                        if ($_POST['num-adult']>0 and $_POST['num-kid']>0){
                                            echo "<br>";
                                        }
                                        if ($_POST['num-kid']>0){
                                            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$_POST['num-kid']."";
                                            echo "<br>";
                                        }
                                    ?>

                                </div>
                                <div class="ticketprice">
                                    <?php
                                        echo "<span id='label'>AMOUNT</span><br>";
                                        if ($_POST['num-adult']>0){
                                            $price = $ticketPrice[0];
                                            $totaladultprice = number_format(($_POST['num-adult']*$price),2);
                                            echo "&nbsp&nbsp $".$totaladultprice."";
                                            echo "<br>";
                                        }
                                        if ($_POST['num-adult']>0 and $_POST['num-kid']>0){
                                            echo "<br>";
                                        }
                                        if ($_POST['num-kid']>0){
                                            $price = $ticketPrice[1];
                                            $totalchildprice = number_format(($_POST['num-kid']*$price),2);
                                            echo "&nbsp&nbsp $".$totalchildprice."";
                                            echo "<br>";
                                        }
                                    ?>

                                </div>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="paymentlabel">
                                <h1><bold><strong>PAYMENT</strong></bold></h1>    
                            </div>
                            <div class="grandtotal">
                                <?php
                                    echo "<span id='label'>Grand Total : $</span>";
                                    echo number_format($totaladultprice+$totalchildprice,2);
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
                <h1>CUSTOMER DETAILS</h1>
                <div class="form">
                    <div class="entry">
                        <form method="post" action="pay_status.php">
                            <label for="name">*Name: </label>
                            <input type="text" name="name" id="name" placeholder="Enter your name here" required><br><br>
                            <label for="name">*E-mail: </label>
                            <input type="email" name="email" id="email" placeholder="Enter your Email-ID here" required><br><br>
                            <label for="name">*Mobile No: </label>
                            <input type="tel" name="mobilenum" id="mobilenum" placeholder="Enter your mobile number"><br><br>
                            <label for="name" id="payment">*Payment Type: </label>
                            <input type="radio" id="creditcard" name="payment" value="credit" required>
                            <label for="cc">Credit Card</label>
                            <input type="radio" id="online" name="payment" value="online" required>
                            <label for="ob">Online Banking</label><br>
                            <br><br>
                            <div class="buttons";>
                            <button id='button' type="button" class="link-btn" onclick="location.href='http://192.168.56.2/f32ee/illumnas-cinema/seating_plan.php'">BACK</button>
					        <input type="submit" id='submit' name='submit' class="link-btn" value="MAKE PAYMENT"><br><br>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
    </section>
    </div>
    <br>
    <br>
    <?php include "footer.php" ?>

</body>
</html


