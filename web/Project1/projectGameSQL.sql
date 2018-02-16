
CREATE DATABASE userGame;
\c userGame
\dt - list the tables

CREATE TABLE public.participant
(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL,
	email VARCHAR(200) NOT NULL
);

CREATE TABLE public.game
(
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(100) NOT NULL
	
);

CREATE TABLE public.gameParticipants
(
	participantId INT NOT NULL REFERENCES public.participant(Id),
	gameId INT NOT NULL REFERENCES public.game(Id),
	totalGames INT NOT NULL,
	wins INT NOT NULL,
	tiedgames INT,
	losses INT
);

INSERT INTO participant(username, password, display_name, email) VALUES ('Jacob', 'jacob', 'Jacob2', 'jacob2@gmail.com');
INSERT INTO gameParticipants(participantId, gameId, totalGames, wins) VALUES(1, 1, 10, 10);
SELECT * FROM gameparticipants;
ALTER TABLE gameparticipants ADD COLUMN tiedGames INT NOT NULL;
UPDATE gameparticipants SET totalGames = totalGames + 1,  wins = wins +1 WHERE participantId = 2;
 ALTER TABLE gameparticipants ALTER losses SET DEFAULT 0;