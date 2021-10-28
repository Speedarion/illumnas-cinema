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
.statusbox{
    padding:25px;
    width:500px;
    height:200px;
    background-color: #696969;
    border : 2px solid black;
    margin:auto;
}
.statusbox input#status{
    margin-left:80px;

}

.successbutton {background-image: linear-gradient(to right, #DCE35B 0%, #45B649  51%, #DCE35B  100%)}
.successbutton {
    cursor :pointer;
    margin: 10px;
    font-weight: 300;
    padding: 15px 45px;
    font-size: 16px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;            
    border-radius: 10px;
    display: inline-block;
}

.successbutton:hover {
    background-position: right center; /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
}

.errorbutton {background-image: linear-gradient(to right, #F00000 0%, #DC281E  51%, #F00000  100%)}
.errorbutton {
    font-weight:300;
    cursor: pointer;
    margin: 10px;
    font-size:16px;
    padding: 15px 45px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;            
    border-radius: 10px;
    display: inline-block;
}

.errorbutton:hover {
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
        <section class="status">
            <div class="statusbox">
                <?php
                    $_SESSION['name'] = $_POST['name'];
                    $_SESSION['email']  = $_POST['email'];
                    $_SESSION['mobilenum']  = $_POST['mobilenum'];
                    $_SESSION['payment'] = $_POST['payment'];
                    $_SESSION['totalAmountPaid']=(float)$_POST['totalAmountPaid'];

                ?>
                <h1><bold>SELECT PAYMENT STATUS TO PROCEED : </bold></H1>
                <form method="post" action="finalupdate.php">
                    <input type="submit" id='status' name='status' class='successbutton' value="SUCCESS">
                    <input type="submit" name='status' class='errorbutton' value="ERROR"><br><br>
                </form>


            </div>
        <section>
    </div>


<?php include "footer.php" ?>

</body>
</html