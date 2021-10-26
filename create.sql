CREATE TABLE illumnasMovies
(
    movieID int unsigned not null auto_increment primary key,
    title varchar(50) not null,
    description text not null,
    cast varchar(100) not null,
    director varchar(50) not null,
    distributor varchar(10) not null,
    releaseDate date not null,
    runningTime int unsigned,
    language varchar(50),
    subtitles varchar(50),
    genre varchar(50),
    rating varchar(10),
    video varchar(20)  
);

CREATE TABLE illumnasHalls
(
    hallID int unsigned not null auto_increment primary key,
    hallName varchar(50) not null
);

CREATE TABLE illumnasShowtimes
(
    showID int unsigned not null auto_increment primary key,
    movieID int unsigned not null,
    hallID int unsigned not null,
    showDate date ,
    startTime TIME
);

CREATE TABLE illumnasSeats
(
    seatID int unsigned not null auto_increment primary key,
    hallID int unsigned not null,
    showID int unsigned not null,
    bookingID varchar(10)  not null,
    seat varchar(10)
);


CREATE TABLE illumnasPrice
(
    ticketType varchar(10) not null primary key,
    ticketPrice int unsigned not null
);

CREATE TABLE illumnasBooking
(
    bookingID varchar(10) not null primary key,
    showID int unsigned not null,
    numSeats int unsigned not null,
    bookingTime timestamp not null default current_timestamp on update current_timestamp
);

CREATE TABLE illumnasPayment
(
    paymentID int unsigned not null auto_increment primary key,
    bookingID varchar(10) not null,
    amountPaid float unsigned not null,
    customerName varchar(100) not null,
    customerEmail varchar(100) not null,
    customerPhone int unsigned not null,
    paymentType varchar(16) not null
);