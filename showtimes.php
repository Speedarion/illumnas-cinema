<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Homepage</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .datebox {
            display: inline-block;
            border: 2px ;
            border-style:solid;
            background-color: #343a2d;
            height:75px;
            width:150px;
            cursor:pointer;
            text-align: center;
            color: white ;
            text-decoration: none;
            font-size: 17px;
            }

        .datebox:hover {
            background-color: #ddd;
            color: black;
        }
    </style>

</head>
<body>
    <?php include "header.php" ?>
    <!-- https://www.w3schools.com/howto/howto_js_topnav.asp -->
    <!-- header -->
    <div class="wrapper">
        <section class="showtimes">
            <div class="container">
                <div class = "sitedir">
                    <h4>HOME / <b>SHOWTIMES</b></h4>
                </div>
                <br>
                <h1>Showtimes</h1>
                <div class="datebar">
                    <table>
                        <tr>
                            <th><input type="submit" class="datebox" name="day" value="TODAY" ></th>
                            <th><input type="submit" class="datebox" name="day" value="MON" ></th>
                            <th><input type="submit" class="datebox" name="day" value="TUE" ></th>
                            <th><input type="submit" class="datebox" name="day" value="WED"></th>
                            <th><input type="submit" class="datebox" name="day" value="THU" ></th>
                        </tr>  
                    </table>                      
                </div>

    </div>
    <?php include "footer.php" ?>
    <script>
        function setDate(){
            var month = new Array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEPT", "OCT", "NOV", "DEC");
            var days = new Array("SUN","MON","TUE","WED","THU","FRI","SAT")
            var today = new Date();
            var dayoftheweek;
            var mm ;
            var yyyy ;
            var elements = document.getElementsByClassName('datebox');
            for (var i=0; i<elements.length; i++) {
                today = new Date(new Date().getTime() + i*(24 * 60 * 60 * 1000));
                today = today.toDateString();
                date = today ;
                document.write(today);
                elements[i].value=date;
            }
        }
        window.onload = setDate();
    </script>

</body>
</html>