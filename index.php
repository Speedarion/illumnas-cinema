<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illumnas Cinema - Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>    
    <?php include "header.php" ?>
    <div class="wrapper">
        <!-- Can use PHP's Session method to get the movie name that users click on -->

        <!-- Banner Section with Full Width Images -->
        <!-- Refer https://www.w3schools.com/howto/howto_js_slideshow_gallery.asp -->
        <section class="banner-section">
            <div class="container">

                <div class="mySlides">
                    <img src="images/banner/Dune.jpg" alt="Dune Poster" height="700" width="1400">
                    <form action="movie.php" method="POST">
                        <input type="hidden" name="movie-name" value="Dune">
                        <input type="submit" name="movie-button" value="Dune">
                    </form>
                </div>
                <div class="mySlides">
                    <img src="images/banner/Free-Guy.jpg" alt="Free Guy Poster" height="700" width="1400">
                    <form action="movie.php" method="POST">
                        <input type="hidden" name="movie-name" value="Free Guy">
                        <input type="submit" name="movie-button" value="Free Guy">
                    </form>
                </div>
                <div class="mySlides">
                    <img src="images/banner/No-Time-To-Die.jpg" alt="No Time To Die Poster" height="700" width="1400">
                    <form action="movie.php" method="POST">
                        <input type="hidden" name="movie-name" value="No Time To Die">
                        <input type="submit" name="movie-button" value="No Time To Die">
                    </form>
                </div>
                <div class="mySlides">
                    <img src="images/banner/Shang-Chi.jpg" alt="Shang Chi Poster" height="700" width="1400">
                    <form action="movie.php" method="POST">
                        <input type="hidden" name="movie-name" value="Shang Chi">
                        <input type="submit" name="movie-button" value="Shang Chi">
                    </form>
                </div>
                <div class="mySlides">
                    <img src="images/banner/The-Suicide-Squad.jpg" alt="The Suicide Squad Poster" height="700" width="1400">
                    <form action="movie.php" method="POST">
                        <input type="hidden" name="movie-name" value="The Suicide Squad">
                        <input type="submit" name="movie-button" value="The Suicide Squad">
                    </form>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                
            </div>
        </section>

        <!-- Now Showing and Coming Soon Movies - Show 4 Movies -->
        <section class="movies">        
            <div class="container">
                <!-- Refer https://www.geeksforgeeks.org/how-to-call-php-function-on-the-click-of-a-button/ -->
                <form method="POST">
                    <input type="submit" name="button1" value="now-showing">
                    <input type="submit" name="button2" value="coming-soon">
                </form>

                <div class="now-showing">
                    <ul>
                        <li>
                            <form action="movie.php" method="POST"></form>
                                <input type="hidden" name="movie-name" value="Dune">
                                <input type="image" src="images/poster/Dune.jpg" alt="Dune" height="450" width="300"><br>                         
                                <p>Dune</p>                       
                                <input type="submit" name="movie-button" value="Buy Ticket">
                            </form>
                        </li>
                        <li>                        
                            <form action="movie.php" method="POST">
                                <input type="hidden" name="movie-name" value="Free Guy">
                                <input type="image" src="images/poster/Free-Guy.jpg" alt="Free Guy" height="450" width="300"><br>          
                                <p>Free Guy</p>                            
                                <input type="submit" name="movie-button" value="Buy Ticket">
                            </form>
                        </li>
                        <li>
                            <form action="movie.php" method="POST">
                                <input type="hidden" name="movie-name" value="No Time To Die">
                                <input type="image" src="images/poster/No-Time-To-Die.jpg" alt="No Time To Die" height="450" width="300"><br>
                                <p>No Time To Die</p>                        
                                <input type="submit" name="movie-button" value="Buy Ticket">
                            </form>
                        </li>
                        <li>
                            <form action="movie.php" method="POST">
                                <input type="hidden" name="movie-name" value="Shang Chi">                        
                                <input type="image" src="images/poster/Shang-Chi.jpg" alt="Shang-Chi" height="450" width="300"><br>                                            
                                <p>Shang-Chi</p>                        
                                <input type="submit" name="movie-button" value="Buy Ticket">
                            </form>
                        </li>                    
                    </ul>
                </div>

                <div class="coming-soon">
                    <ul>
                        <li>
                            <form action="movie.php" method="POST"></form>
                                <input type="hidden" name="movie-name" value="Dune">
                                <input type="image" src="images/poster/Dune.jpg" alt="Dune" height="450" width="300"><br>                         
                                <p>Dune</p>                       
                                <input type="submit" name="movie-button" value="Buy Ticket">
                            </form>
                        </li>
                        <li>                        
                            <form action="movie.php" method="POST">
                                <input type="hidden" name="movie-name" value="Free Guy">
                                <input type="image" src="images/poster/Free-Guy.jpg" alt="Free Guy" height="450" width="300"><br>          
                                <p>Free Guy</p>                            
                                <input type="submit" name="movie-button" value="Buy Ticket">
                            </form>
                        </li>
                        <li>
                            <form action="movie.php" method="POST">
                                <input type="hidden" name="movie-name" value="No Time To Die">
                                <input type="image" src="images/poster/No-Time-To-Die.jpg" alt="No Time To Die" height="450" width="300"><br>
                                <p>No Time To Die</p>                        
                                <input type="submit" name="movie-button" value="Buy Ticket">
                            </form>
                        </li>
                        <li>
                            <form action="movie.php" method="POST">
                                <input type="hidden" name="movie-name" value="Shang Chi">                        
                                <input type="image" src="images/poster/Shang-Chi.jpg" alt="Shang-Chi" height="450" width="300"><br>                                            
                                <p>Shang-Chi</p>                        
                                <input type="submit" name="movie-button" value="Buy Ticket">
                            </form>
                        </li>              
                    </ul>
                </div>           

                <a href="#">View All Movies &#9755;</a>
            </div>
        </section>
    </div>    

    <?php include "footer.php" ?>
</body>
</html>