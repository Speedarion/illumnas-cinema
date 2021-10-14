use f32ee;

-- CREATE TABLE illumnasMovies
-- (
--     movieID int unsigned not null auto_increment primary key,
--     title varchar(50) not null,
--     description text not null,
--     cast varchar(100) not null,
--     director varchar(50) not null,
--     distributor varchar(50) not null,
--     releaseDate date not null,
--     runningTime int unsigned,
--     language varchar(50),
--     subtitles varchar(50),
--     genre varchar(50),
--     rating varchar(50)  
-- );

INSERT INTO illumnasMovies VALUES
-- Now Showing
(NULL, "Dune", "A mythic and emotionally charged hero's journey, 'Dune' tells the story of Paul Atreides, a brilliant and gifted young man born into a great destiny beyond his understanding, must travel to the most dangerous planet in the universe to ensure the future of his family and his people. As malevolent forces explode into conflict over the planet's exclusive supply of the most precious resource in existence-a commodity capable of unlocking humanity's greatest potential-only those who can conquer their fear will survive.", "Timothée Chalamet, Rebecca Ferguson, Zendaya", "Denis Villeneuve", "WB", "2021-09-16", 156, "English", "Chinese", "Action/Adventure", "PG13"),
(NULL, "No Time To Die", "In No Time To Die, Bond has left active service and is enjoying a tranquil life in Jamaica. His peace is short-lived when his old friend Felix Leiter from the CIA turns up asking for help. The mission to rescue a kidnapped scientist turns out to be far more treacherous than expected, leading Bond onto the trail of a mysterious villain armed with dangerous new technology.", "Daniel Craig, Rami Malek, Léa Seydoux", "Cary Joji Fukunaga", "UNI", "2021-09-30", 163, "English", "Chinese", "Action/Adventure", "PG13"),
(NULL, "Free Guy", "In 'Free Guy', a bank teller who discovers he is actually a background player in an open-world video game, decides to become the hero of his own story- one he rewrites himself. Now in a world where there are no limits, he is determined to be the guy who saves his world his way- before it is too late.", "Ryan Reynolds, Jodie Comer, Joe Keery, Lil Rel Howery, Utkarsh Ambudkar, Taika Waititi", "Shawn Levy", "WDS", "2021-08-12", 115, "English", "Chinese", "Action/Comedy", "PG13"),
(NULL, "The Suicide Squad", "Supervillains Harley Quinn, Bloodsport, Peacemaker and a collection of nutty cons at Belle Reve prison join the super-secret, super-shady Task Force X as they are dropped off at the remote, enemy-infused island of Corto Maltese.", "Margot Robbie, Idris Elba, John Cena", "James Gunn", "WB", "2021-08-05", 132, "English", "Chinese", "Action/Adventure", "M18"),
(NULL, "Shang-Chi and the Legend of the Ten Rings", "Shang-Chi, the master of weaponry-based Kung Fu, is forced to confront his past after being drawn into the Ten Rings organization.", "Simu Liu, Tony Leung, Awkwafina, Michelle Yeoh, Fala Chen", "Destin Daniel Cretton", "WDS", "2021-09-01", 132, "English", "Chinese", "Action/Adventure", "PG"),
(Null, "Venom: Let There Be Carnage", "Eddie Brock struggles to adjust to his new life as the host of the alien symbiote Venom, which grants him super-human abilities in order to be a lethal vigilante. Brock attempts to reignite his career by interviewing serial killer Cletus Kasady, who becomes the host of the symbiote Carnage and escapes prison after a failed execution.", "Tom Hardy, Michelle Williams, Naomi Harris, Reid Scott, Woody Harrison", "Andy Serkis", "SPR", "2021-10-14", 98, "English", "Chinese", "Action/Adventure","PG13"), 
-- Coming Soon
(NULL, "Spider-Man: No Way Home", "For the first time in the cinematic history of Spider-Man, our friendly neighborhood hero is unmasked and no longer able to separate his normal life from the high-stakes of being a Super Hero. When he asks for help from Doctor Strange, the stakes become even more dangerous, forcing him to discover what it truly means to be Spider-Man.", "Tom Holland, Benedict Cumberbatch, Zendaya, Paula Newsome", "Jon Watts", "WDS", "2021-12-23", 150, "English", "Chinese", "Action/Adventure", "TBA"),
(NULL, "The King's Man", "In the early years of the 20th century, the Kingsman agency is formed to stand against a cabal plotting a war to wipe out millions.", "Ralph Fiennes, Gemma Arterton, Harris Dickinson", "Matthew Vaughn", "WDS", "2021-12-30", 131, "English", "Chinese", "Action/Adventure/Comedy", "TBA"),
(NULL, "Doctor Strange in the Multiverse of Madness", "After the events of Avengers: Endgame, Dr. Stephen Strange continues his research on the Time Stone. But an old friend turned enemy seeks to destroy every sorcerer on Earth, messing with Strange's plan and also causing him to unleash an unspeakable evil.", "Benedict Cumberbatch, Elizabeth Olsen, Rachel McAdams, Benedict Wong", "Sam Raimi", "WDS", "2022-03-25", NULL, "English", "Chinese", "Action/Adventure/Fantasy", "TBA"),
(NULL, "Matrix Resurrections", "The long awaited and as yet untitled fourth film in the 'Matrix' universe, the groundbreaking franchise that redefined a genre. It reunites original stars Keanu Reeves and Carrie Anne Moss as Neo and Trinity, the iconic roles they made famous in 'The Matrix'.", "Keanu Reeves, Carrie Anne Moss", "Lana Wachowski", "WB", "2021-12-22", 120, "English", "Chinese", "Action/Adventure", "TBA")