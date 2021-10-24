
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
    height:250px;
    background-color: #696969;
    border : 2px solid black;
    margin:auto;
}
.statusbox input#status{
    margin-left:150px;

}
</style>
</head>
<body>

    <?php 
        include "header.php" ;
        session_start();
        var_dump($_POST);
    ?>
    <div class="wrapper">
        <section class="status">
            <div class="statusbox">
                <?php
                    $_SESSION['name'] = $_POST['name'];
                    $_SESSION['email']  = $_POST['email'];
                    $_SESSION['mobilenum']  = $_POST['mobilenum'];
                    $_SESSION['payment'] = $_POST['payment'];
                ?>
                <h1><bold>SELECT PAYMENT STATUS TO PROCEED : </bold></H1>
                <form method="post" action="finalpage.php">
                    <input type="submit" id='status' name='status' value="SUCCESS">
                    <input type="submit" name='status' value="ERROR"><br><br>
                </form>


            </div>
        <section>
    </div>


<?php include "footer.php" ?>

</body>
</html