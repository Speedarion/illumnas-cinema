# Illumnas Cinema
EE4717 web design project to create a movie ticket booking system.

## Task List
- [x] Homepage
- [x] Movies
- [x] Showtimes
- [x] Movie Details
- [x] Seating Plan
- [x] Payment Page
- [x] Payment Success/Error
- [x] Check Booking
- [x] About Us

## Updates
* Naming convention of the movie image: Example movie No Time To Die -> No-Time-To-Die.jpg
* Naming convention of the movie rating logo: Example PG13 -> PG13.webp (follow the name of the rating column on SQL)
* Currently the width of the wrapper is set to be 1200px
* The navbar color is set to #2e2e2e
* Movie details page requires $_POST['movie-id'] to retrieve movie information from database
* Movie detail store 3 session variables, $_SESSION['movie-id'], $_SESSION['title'], $_SESSION['img']
* seating_plan.php requires $_POST['show-id'], $_POST['show-date'], $_POST['hall'], $_POST['time-btn'] (store showtime i.e. 09:00)

## SQL Schemas
* Movies(<ins>movieID</ins>, title, description, cast, director, distributor, releaseDate, runningTime, language, subtitles, genre，rating)
* Showtimes(<ins>showID</ins>, *movieID*, *hallID*, showDate, startTime)
* Halls(<ins>HallID</ins>, hallName)
* Seats(<ins>seatID</ins>, *hallID*, *showID*, *bookingID*, seat) //for occupied seats
* Booking(<ins>bookingID</ins>, *showID*, numSeats, bookingTime)
* Payment(<ins>paymentID</ins>, *bookingID*, amountPaid, customerName, customerEmail, customerPhone, paymentType)
* Price(ticketType, ticketPrice)


