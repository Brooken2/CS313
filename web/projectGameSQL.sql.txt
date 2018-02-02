
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
	wins INT NOT NULL
);
