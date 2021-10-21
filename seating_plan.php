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
            height: 400px;
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

        <div class="seating">
            <div class="screen"><h3>SCREEN</h3></div>
            
        </div>
    </div>

    <?php include 'footer.php'; ?>
    
</body>
</html>