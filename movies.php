<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Homepage</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .image{float:left;}
        .image img{height:350px;
        width:250px;}

        .status{
            color: white;
            font-weight: bold;
            font-size: 30px;
            border-color: black;            
            background-color: #2e2e2e;
            margin-right: 740px;
            padding: 10px 5px;
        }

        .status-button{
            cursor: pointer;
            border: none;
            background-color: transparent; 
            color: white;
            font-weight: bold;
            font-size: 30px;           
        }

        section {width:80%;margin:auto}        
        .movieblock {margin-bottom:250px}
        .moviedetails {margin-left: 300px;}
        .movie-button{
            cursor: pointer;
            width: 110px;
            height: 40px;
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.5s;
            background-image: linear-gradient(to right, #000428 0%, #004e92  51%, #000428  100%);
            background-size: 200% auto;
            color: white;       
            border-radius: 10px;
            border: none;
            display: block;
        }
        
        .movie-button:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
    </style>
</head>
<body>
    <!-- https://www.w3schools.com/howto/howto_js_topnav.asp -->
    <!-- header -->
    <div class="topbar">
        <div class="container">
            <div class="logo">
                <a class="logoimg" href="index.php"><img src="images/logo.png" width=300 height=100></a>
            </div>
            <div class="navbar">
                <a href="about.html">ABOUT</a> 
                <a href="booking.html">CHECK BOOKING</a>
                <a href="showtimes.html">SHOWTIMES</a>
                <a href="movies.html">MOVIES</a>
            </div>
        </div>
    </div>
    <br>

    <section class="movielist">
        <div class="container">
            <div class = "sitedir">
                <h4>HOME / <b>MOVIES</b></h4>
            </div>
            <br>
            <div class="status">
                    <input type="submit" class="status-button" name="now-showing" value="Now Showing" onclick="showThis(this)">
                    <span id="divider">|</span>
                    <input type="submit" class="status-button" name="coming-soon" value="Coming Soon" onclick="showThis(this)">                    
                </div>
            <div id="now-showing">
                <div class="movieblock">
                    <div class="image">
                        <a href="movie_details.html"><img src="images/poster/Dune.jpg" alt="Dune"></a>
                    </div>
                    <div class="moviedetails">
                        <h1><b>Dune</b><img src="images/pg13.png" width=30 height=30></h1>
                        <h3><b>Adventure/Sci-Fi | 2 Hr 35 Mins |  English (Subtitles : Chinese)</b></h3>
                        <p>
                            A mythic and emotionally charged hero’s journey, “Dune” tells the story of Paul Atreides,
                            a brilliant and gifted young man born into a great destiny beyond his understanding,
                            who must travel to the most dangerous planet in the universe to ensure...
                        </p>
                        <a href="movie_details.html"><i>Details..</i></a>
                        <br><br>
                        <form action="movie.php" method="POST">
                            <input type="submit" class='movie-button' name="movie-button" value="Buy Ticket">
                        </form>

                    </div>
                </div>
                <div class="movieblock">
                    <div class="image">
                        <a href="movie_details.html"><img src="images/poster/Free-Guy.jpg" alt="Free Guy"></a>
                    </div>
                    <div class="moviedetails">
                        <h1><b>Free Guy</b><img src="images/pg13.png" width=30 height=30></h1>
                        <h3><b>Action/Comedy | 1 Hr 55 Mins |  English (Subtitles : Chinese)</b></h3>
                        <p>
                            In "Free Guy", a bank teller who discovers he is actually a background player in an open-world video game,
                            decides to become the hero of his own story- one he rewrites himself.
                            Now in a world where there are no limits,...
                        </p>
                        <a href="movie_details.html"><i>Details..</i></a>
                        <br><br>
                        <form action="movie.php" method="POST">
                            <input type="submit" class='movie-button' name="movie-button" value="Buy Ticket">
                        </form>

                    </div>
                </div>
                <div class="movieblock">
                    <div class="image">
                        <a href="movie_details.html"><img src="images/poster/No-Time-To-Die.jpg" alt="No Time To Die"></a>
                    </div>
                    <div class="moviedetails">
                        <h1><b>No Time To Die</b><img src="images/pg13.png" width=30 height=30></h1>
                        <h3><b>Action/Adventure | 2 Hr 43 Mins |  English (Subtitles : Chinese)</b></h3>
                        <p>
                            In No Time To Die, Bond has left active service and is enjoying a tranquil life in Jamaica.
                            His peace is short-lived when his old friend Felix Leiter from the CIA turns up asking for help.
                            The mission to rescue a kidnapped scientist turns out to......
                        </p>
                        <a href="movie_details.html"><i>Details..</i></a>
                        <br><br>
                        <form action="movie.php" method="POST">
                            <input type="submit" class='movie-button' name="movie-button" value="Buy Ticket">
                        </form>

                    </div>
                </div>
                <div class="movieblock">
                    <div class="image">
                        <a href="movie_details.html"><img src="images/poster/Shang-Chi.jpg" alt="Shangchi"></a>
                    </div>
                    <div class="moviedetails">
                        <h1><b>Marvel Studios' Shang-Chi And The Legend Of The Ten Rings</b><img src="images/pg.png" width=30 height=30></h1>
                        <h3><b>Action/Adventure/Fantasy | 2 Hr 12 Mins |  English (Subtitles : Chinese)</b></h3>
                        <p>
                            Shang-Chi and the Legend of the Ten Rings is the origin story of the newest superhero to the Marvel Cinematic Universe.
                            Shang-Chi is forced to confront the past he thought he left behind and uncover the mysterious Legend of the Ten Rings that......
                        </p>
                        <a href="movie_details.html"><i>Details..</i></a>
                        <br><br>
                        <form action="movie.php" method="POST">
                            <input type="submit" class='movie-button' name="movie-button" value="Buy Ticket">
                        </form>

                    </div>
                </div>
                <div class="movieblock">
                    <div class="image">
                        <a href="movie_details.html"><img src="images/poster/The-Suicide-Squad.jpg" alt="Suicide Squad"></a>
                    </div>
                    <div class="moviedetails">
                        <h1><b>The Suicide Squad  </b><img src="images/SG_IMDA_M18.png" width=50 height=30></h1>
                        <h3><b>Action/Adventure/Comedy | 2 Hr 12 Mins |  English (Subtitles : Chinese)</b></h3>
                        <p>
                            The government sends the most dangerous supervillains in the world -- Bloodsport, Peacemaker, King Shark,
                            Harley Quinn and others -- to the remote, enemy-infused island of Corto Maltese.
                            Armed with high-tech weapons, they....
                        </p>
                        <a href="movie_details.html"><i>Details..</i></a>
                        <br><br>
                        <form action="movie.php" method="POST">
                            <input type="submit" class='movie-button' name="movie-button" value="Buy Ticket">
                        </form>

                    </div>
                </div>
                <div class="movieblock">
                    <div class="image">
                        <a href="movie_details.html"><img src="images/poster/Venom-Let-There-Be-Carnage.jpg" alt="Venom"></a>
                    </div>
                    <div class="moviedetails">
                        <h1><b>Venom: Let There Be Carnage</b><img src="images/pg13.png" width=30 height=30></h1>
                        <h3><b>Action/Adventure | 1 Hr 37 Mins |  English (Subtitles : Chinese)</b></h3>
                        <p>
                            Eddie Brock struggles to adjust to his new life as the host of the alien symbiote Venom,
                            which grants him super-human abilities in order to be a lethal vigilante.
                            Brock attempts to ...
                        </p>
                        <a href="movie_details.html"><i>Details..</i></a>
                        <br><br>
                        <form action="movie.php" method="POST">
                            <input type="submit" class='movie-button' name="movie-button" value="Buy Ticket">
                        </form>

                    </div>
                </div>
            </div>
            <div id="coming-soon">
                <div class="movieblock">
                    <div class="image">
                        <a href="movie_details.html"><img src="images/poster/Matrix-Resurrections.jpg" alt="Matrix"></a>
                    </div>
                    <div class="moviedetails">
                        <h1><b>The Matrix Resurrections</b></h1>
                        <h3><b>Action/Adventure | 2 Hr |  English (Subtitles : Chinese)</b></h3>
                        <p>
                        The long awaited and as yet untitled fourth film in the 'Matrix' universe,
                         the groundbreaking franchise that redefined a genre. It reunites ..
                        </p>
                        <a href="movie_details.html"><i>Details..</i></a>
                        <br><br>
                        <form action="movie.php" method="POST">
                            <input type="submit" name="movie-button" value="Buy Ticket">
                        </form>

                    </div>
                </div>
                <div class="movieblock">
                    <div class="image">
                        <a href="movie_details.html"><img src="images/poster/Spider-Man-No-Way-Home.jpg" alt="Spiderman"></a>
                    </div>
                    <div class="moviedetails">
                        <h1><b>Spider-Man: No Way Home</b></h1>
                        <h3><b>Action/Adventure | 150 Mins |  English (Subtitles : Chinese)</b></h3>
                        <p>
                        For the first time in the cinematic history of Spider-Man, our friendly neighborhood hero is unmasked
                        and no longer able to separate his normal life from the high-stakes of being a Super Hero. When ...
                        </p>
                        <a href="movie_details.html"><i>Details..</i></a>
                        <br><br>
                        <form action="movie.php" method="POST">
                            <input type="submit" name="movie-button" value="Buy Ticket">
                        </form>

                    </div>
                </div>
                <div class="movieblock">
                    <div class="image">
                        <a href="movie_details.html"><img src="images/poster/The-Kings-Man.jpg"  alt="King's Man"></a>
                    </div>
                    <div class="moviedetails">
                        <h1><b>The King's Man</b></h1>
                        <h3><b>Action/Adventure/Comedy | 131 Mins |  English (Subtitles : Chinese)</b></h3>
                        <p>
                        In the early years of the 20th century, the Kingsman agency is formed to stand against
                        a cabal plotting a war to wipe out millions.
                        </p>
                        <a href="movie_details.html"><i>Details..</i></a>
                        <br><br>
                        <form action="movie.php" method="POST">
                            <input type="submit" name="movie-button" value="Buy Ticket">
                        </form>

                    </div>
                </div>
                <div class="movieblock">
                    <div class="image">
                        <a href="movie_details.html"><img src="images/poster/Doctor-Strange-in-the-Multiverse-of-Madness.jpg" alt="Dr Strange"></a>
                    </div>
                    <div class="moviedetails">
                        <h1><b>Doctor Strange in the Multiverse of Madness</b></h1>
                        <h3><b>Action/Adventure/Fantasy | NULL |  English (Subtitles : Chinese)</b></h3>
                        <p>
                            After the events of Avengers: Endgame, Dr. Stephen Strange continues his research on the Time Stone.
                            But an old friend turned enemy seeks to ..
                        </p>
                        <a href="movie_details.html"><i>Details..</i></a>
                        <br><br>
                        <form action="movie.php" method="POST">
                            <input type="submit" name="movie-button" value="Buy Ticket">
                        </form>

                    </div>
            </div>
        </div>

    </section>

    </div>
    <?php include "footer.php" ?>
    <script>
    // Movies Block
        const nowShowing = document.getElementById("now-showing");
        const comingSoon = document.getElementById("coming-soon");
        nowShowing.style.display = "block";
        comingSoon.style.display = "none";
        function showThis(elmnt){            
            if (elmnt.name == "now-showing"){                
                nowShowing.style.display = 'block';
                comingSoon.style.display = 'none';
            }
            else{                
                nowShowing.style.display = 'none';
                comingSoon.style.display = 'block';
            }
        }
        // Movies Block
    </script>
</body>
</html>
