# Illumnas Cinema
EE4717 web design project to create a movie ticket booking system.

## Task List
- [ ] HTML codes for webpages
- [ ] CSS styling
- [ ] Create SQL database
- [ ] PHP & JavaScript Implementation
- [ ] ...

## Updates
* Naming convention of the movie image: Example movie No Time To Die -> No-Time-To-Die.jpg
* Naming convention of the movie rating logo: Example PG13 -> PG13.webp (follow the name of the rating column on SQL)
* Currently the width of the wrapper is set to be 1200px
* The navbar color is set to #2e2e2e

## SQL Schemas
* Movies(<ins>MovieID</ins>, Title, Description, Cast, Director, Distributor, ReleaseDate, RunningTime, Language, Subtitles, Genre， Rating)
* Showtimes(<ins>ShowID</ins>, *MovieID*, *HallID*, Date, StartTime, EndTime)
* Halls(<ins>HallID</ins>, Name, TotalSeats)
* HallSeats(<ins>HallSeatID</ins>, *HallID*, SeatNumber)
* ShowSeats(<ins>ShowSeatID</ins>, *HallSeatID*, *ShowID*, *BookingID*, Status)
* Booking(<ins>BookingID</ins>, *ShowID*, NumberOfSeats, Timestamp)
* Payment(<ins>PaymentID</ins>, *BookingID*, Amount, Name, Email, Phone, PaymentMethod)