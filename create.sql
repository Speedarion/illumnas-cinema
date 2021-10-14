CREATE TABLE illumnasMovies
(
    movieID int unsigned not null auto_increment primary key,
    title varchar(50) not null,
    description text not null,
    cast varchar(100) not null,
    director varchar(50) not null,
    distributor varchar(50) not null,
    releaseDate date not null,
    runningTime int unsigned,
    language varchar(50),
    subtitles varchar(50),
    genre varchar(50),
    rating varchar(50)  
);