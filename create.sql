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