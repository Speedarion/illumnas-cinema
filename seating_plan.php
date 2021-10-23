<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Seating Plan</title>
    <link rel="stylesheet" href="style.css">
    <style>
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

        /* Details */
        .details{
            margin: 20px 0px;
            
        }
        .img-container, .desc-container{
            display: inline-block;
        }
        .desc-container{
            vertical-align: 50px;
            margin-left: 50px;
        }
        .desc-container p{
            font-size: 18px;
        }
        /* Details */

        /* Seating  */
        .seating{
            background-color: #696969;
            height: 450px;
            display: block;
        }
        .screen{
            position: relative;
            top: 10px;
            margin: 0px 300px;
            padding: 0.5px 0px;            
            text-align: center;
            background-color: black;
        }
        .seating-plan{
            margin-top: 45px;
        }
        .seating-plan table{
            margin: auto;
            height: 260px;
            width: 750px;
            text-align: center;
            font-weight: bold;            
        }
        .seating-plan td:nth-child(11){
            width: 40px;
        }
        /* Checkbox styling - Refer https://jsfiddle.net/proticm/2wzatymr/  */
        .seating-plan input[type='checkbox']{
            width: 25px;
            height: 25px;            
            -webkit-appearance: none;
            -moz-appearance: none;
            -o-appearance: none;
            appearance: none;            
        }
        .seating-plan .occupied{
            border: 1px solid #4c4c4c;            
            outline: none;
            transition-duration: 0.3s;
            background-color: #323232;            
        }
        .seating-plan .empty{
            border: 1px solid #e5e5e5;            
            outline: none;
            transition-duration: 0.3s;
            background-color: #cccccc;
            cursor: pointer;
        }
        .seating-plan .empty:checked{
            border: 1px solid #f6cf56;   
            background-color: #f5ca44; 
        }
        .notations{
            margin-top: 45px;
            margin-left: 10px;
        }
        .notation{
            display: inline-block;
            width: 25px;
            height: 25px;
            margin: 0px 10px;
            vertical-align: bottom;
        }
        .occupied{
            background-color: #323232;
            border: 1px solid #4c4c4c; 
        }
        .available{
            background-color: #cccccc;
            border: 1px solid #e5e5e5;  
        }
        .selected{
            background-color: #f5ca44; 
            border: 1px solid #f6cf56;   
        }
        /* Seating  */

        /* Select Number of Tickets */
        .show{
            text-align: center;
            font-size: 20px;
        }
        #num-tickets{font-weight: bold;}
        .choose-block{margin-left: 490px;}        
        .choose-block p{
            display: inline-block;
            width: 50px;
            text-align: right;
            margin-right: 30px;
        }
        .choose input[type='text']{
            text-align: center;
            background-color: transparent;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border: none;
            width: 20px;
        }
        .button{
            font-size: 20px;            
            width: 30px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid white;
            background-color: #323232;
            color: white;
            cursor: pointer;
        }
        .button:hover{
            border: 1px solid #323232;
            color: #323232;
            background-color: white;
        }
        /* Select Number of Tickets */

        /* Back & Submit Button  */
        .back{
            display: inline-block;
            margin-left: 920px;         
            font-size: 22px;          
        }
        input[type='submit']{
            margin-bottom: 10px;  
            margin-left: 15px;          
            font-size: 22px;            
        }        
        .link-btn {background-image: linear-gradient(to right, #141E30 0%, #243B55  51%, #141E30  100%)}
        .link-btn { 
        width: 120px;
        height: 36px;
        cursor: pointer;
        transition: 0.5s;            
        background-size: 200% auto;
        color: white;            
        box-shadow: 0 0 6px #eee;
        border-radius: 10px;            
        }
        .link-btn:hover {
        background-position: right center; /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
        }      
         
         
         
    </style>
</head>
<body>
    <?php 
        include 'header.php'; 
        session_start();    
        if(isset($_POST['time-btn'])){
            $_SESSION['show-id'] = $_POST['show-id'];
            $_SESSION['show-date'] = $_POST['show-date'];
            $_SESSION['hall'] = $_POST['hall'];
            $_SESSION['time'] = $_POST['time-btn'];
        }
    ?>

    <div class="wrapper">
        <!-- Link to Previous Page -->
        <div class="links">
            <a  class="link" href="index.php">Home</a> / <a class="link" href="movies.php">Movies</a> / <a class="link" href="movie.php"><?php echo $_SESSION['title']; ?></a> / <strong style="text-decoration: underline;">Seating Plan</strong>
        </div>

        <div class="details">
            <div class="img-container">            
                <img src="images/poster/<?php echo $_SESSION['img']; ?>.jpg" alt="Poster" height="200px" width="140px">
            </div>
            <div class="desc-container">
                <h2 id="title"><?php echo $_SESSION['title']; ?></h2>
                <p>Date: <?php echo $_SESSION['show-date'];?></p>
                <p><?php echo $_SESSION['time'];?></p>
                <p><?php echo $_SESSION['hall'];?></p>
            </div>
        </div>

        <?php
            // get occupied seats 
            include 'dbconnect.php';
            $query = "SELECT seat FROM illumnasSeats WHERE showID = " .$_SESSION['show-id'];
            $result = mysqli_query($conn, $query);
            $occupied = array();
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $occupied[] = $row['seat'];
                }
            }
            $result -> free();

            $occupied = array('C5', 'C6', 'C7', 'E1'); // remove this when table completes!!!
            $s1 = array('A', 'B', 'C', 'D', 'E');
            $s2 = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '', '10', '11', '12', '13', '14', '15', '16', '17', '18');            
        ?>
        <form method="POST" action="pay.php">
            <div class="seating">
                <div class="screen"><h3>SCREEN</h3></div>                
                    <div class="seating-plan">
                        <table>
                            <?php                                 
                                for($i=0;$i<6;$i++){
                                    $s2_ptr = 0;
                                    echo "<tr>";
                                    for($j=0;$j<21;$j++){
                                        echo "<td>";
                                            if($i == 5 and $j!=0 and $j!=20){
                                                echo $s2[$s2_ptr];
                                                $s2_ptr++;
                                            }
                                            elseif ($i==5 and ($j==0 or $j==20)){
                                                echo "</td>";
                                                continue;
                                            }
                                            elseif (($j==0 or $j==20) and $i!=5){
                                                echo $s1[$i];
                                            }
                                            else{
                                                if($s2[$s2_ptr] == ''){
                                                    // hallway
                                                    echo "</td>";
                                                    $s2_ptr++;
                                                    continue;
                                                }
                                                $seat = $s1[$i].$s2[$s2_ptr];
                                                if(in_array($seat, $occupied)){
                                                    $class = "occupied";
                                                }
                                                else{
                                                    $class = "empty";
                                                }
                                                echo "<input type='checkbox' class='" .$class. "' name='" .$class. "[]' value='" .$seat. "'>";
                                                $s2_ptr++;
                                            }

                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                    </div>     
                <div class="notations">
                    <div class="notation available"></div> AVAILABLE
                    <div class="notation occupied"></div> OCCUPIED
                    <div class="notation selected"></div> SELECTED
                </div>
            </div>
            
            <div class="choose">
                <p class="show">You have selected <span id="num-tickets">0</span> tickets.</p>        
                <div class="choose-block adult">
                    <p>ADULT: </p>
                    <button type="button" class='button' id="minus-adult" onclick="getTickets(-1, 'adult')">-</button>
                    <input type="text" id="num-adult" name="num-adult" readonly='readonly'>
                    <button type="button" class='button' id="plus-adult" onclick="getTickets(1, 'adult')">+</button>
                </div>
                <div class="choose-block kid">
                    <p>KID: </p>
                    <button type="button" class='button' id="minus-kid" onclick="getTickets(-1, 'kid')">-</button>
                    <input type="text" id="num-kid" name='num-kid' readonly='readonly'>
                    <button type="button" class='button' id="plus-kid" onclick="getTickets(1, 'kid')">+</button>
                </div>
                    
            </div>
            
            <button type="button" class="back link-btn" onclick="location.href='http://192.168.56.2/f32ee/illumnas-cinema/movie.php'">BACK</button>
            <input class='next link-btn' type="submit" value="CONFIRM">
        </form>
    </div>

    <?php include 'footer.php'; ?>
    
    <script>
        const numEl = document.getElementById('num-tickets');
        const adultEl = document.getElementById('num-adult');
        const kidEl = document.getElementById('num-kid')
        var num = 0;
        var emptys = document.getElementsByClassName('empty');
        adultEl.value = 0;
        kidEl.value = 0;
        for (var i=0; i<emptys.length; i++){
            var empty = emptys[i];
            empty.onclick = function(){
                num = document.querySelectorAll('.empty:checked').length
                numEl.innerHTML= num;
                adultEl.value = num; //by default all the checked seats belong to adult tickets
                kidEl.value = 0;                
            }
        }

        function getTickets(n, category){
            // n: -1 or 1
            // category: adult or kid            
            numAdult = Number(adultEl.value);
            numKid = Number(kidEl.value);
            if(category=='adult'){
                if ((numAdult+n)<=num && (numAdult+n)>=0){ //between 0 and number of tickets selected
                    adultEl.value = numAdult+n;
                    kidEl.value = numKid-n;
                }
            }
            else{
                if ((numKid+n)<=num && (numKid+n)>=0){ //between 0 and number of tickets selected
                    kidEl.value = numKid+n;
                    adultEl.value = numAdult-n;
                }
            }
        }
        </script>
</body>
</html>