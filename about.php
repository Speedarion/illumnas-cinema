<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - About Us</title>
    <link rel='stylesheet' href="style.css">
    <style>
        #cinema{
            margin-left: 200px;
        }
        #about{
            font-style: italic;
            text-align: justify;
            margin: 10px 10px;
        }
        .features{
            margin: 10px 10px;
        }
        .features ul{
            list-style-type: none;
            padding-left: 5px;
        }
        .features li{
            margin-bottom: 5px;
        }
        .features li:before{
            content: "";
            display: inline-block;
            width: 20px;
            height: 20px;
            background-size: 20px;
            background-image: url('images/movie-vector.svg');
            background-repeat: no-repeat;
            margin-right: 5px;
            margin-left: 0;
            vertical-align: -2px;
        }
        .contact{
            margin: 20px 0px;
        }
        table{
            border-spacing: 10px;
        }
    </style>
</head>
<body>
    <?php include "header.php";?>

    <div class="wrapper">
        <div class="about">
            <h2>ABOUT</h2>
            <img src="images/cinema.jpg" id="cinema" alt="cinema" height="540" width="800">
            <p id="about">
                Since first opening our doors in 1998, we've entertained countless moviegoers with memories of a special day out.<br><br>
                From the latest blockbusters to intimate dramas, with a dash of documentaries, sports and culture also in the mix, Illumnas Cinema’s diverse range of entertainment means there’s something for everyone. <br><br>
                Why not bring your kids for some Family Friendly fun, or treat your eyes to the astonishing clarity of the world's largest cinema LED screen, Samsung ONYX. To top it all off, dive into the most immersive movie experience on Earth - IMAX®. The choice is yours! <br><br>
                At Illumnas Cinema, it's not just about movies - it's a total entertainment experience.
            </p>
            <div class="features">
                <p><strong>Illumnas Cinema features the following:</sstrong></p>
                <ul>
                    <li>6 cinema screens</li>
                    <li>Digital Projectors</li>
                    <li>Dolby Digital Sound</li>
                    <li>Stadium seating for unobstructed views</li>
                    <li>Wall to wall screens</li>
                    <li>Comfortable high back Seating</li>
                </ul>
            </div>
        </div>

        <div class="contact">
            <h2>CONTACT US</h2>
            <table>
                <tr>
                    <td>Tel:</td>
                    <td>1234-5678</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>illumnascinema@mail.com</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>Illumnas Cinema, Level 6, City Square, 666666 Singapore</td>
                </tr>
            </table>
        </div>
    </div>

    <?php include "footer.php";?>
    
</body>
</html>