# Illumnas Cinema
EE4717 web design project to create a movie ticket booking system.

## Task List
- [x] Homepage
- [ ] Movies
- [ ] Showtimes
- [ ] Movie Details
- [ ] Seating Plan
- [ ] F&B (?)
- [ ] Payment Page
- [ ] Payment Success/Error
- [ ] Check Booking
- [ ] About Us

## Updates
* Naming convention of the movie image: Example movie No Time To Die -> No-Time-To-Die.jpg
* Naming convention of the movie rating logo: Example PG13 -> PG13.webp (follow the name of the rating column on SQL)
* Currently the width of the wrapper is set to be 1200px
* The navbar color is set to #2e2e2e
* Movie details page requires $_POST['movie-id'] to retrieve movie information from database
* Movie detail store 3 session variables, $_SESSION['movie-id'], $_SESSION['title'], $_SESSION['img']

## SQL Schemas
* Movies(<ins>MovieID</ins>, Title, Description, Cast, Director, Distributor, ReleaseDate, RunningTime, Language, Subtitles, Genre， Rating)
* Showtimes(<ins>ShowID</ins>, *MovieID*, *HallID*, Date, StartTime, EndTime)
* Halls(<ins>HallID</ins>, Name, TotalSeats)
* HallSeats(<ins>HallSeatID</ins>, *HallID*, SeatNumber)
* ShowSeats(<ins>ShowSeatID</ins>, *HallSeatID*, *ShowID*, *BookingID*, Status)
* Booking(<ins>BookingID</ins>, *ShowID*, NumberOfSeats, Timestamp)
* Payment(<ins>PaymentID</ins>, *BookingID*, Amount, Name, Email, Phone, PaymentMethod)