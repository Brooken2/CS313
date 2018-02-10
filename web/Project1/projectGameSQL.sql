
CREATE DATABASE userGame;

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

INSERT INTO participant(username, password, display_name, email)
		VALUES
		('Brooken2', '220546Bn', 'Brooke Nelson', 'brookenelson220546@gmail.com');

INSERT INTO participant(username, password, display_name, email)
		VALUES
		('John', 'doe', 'John Doe', 'johnnyDoe@gmail.com');

INSERT INTO game(name) VALUES ('Rock, Paper, Sissors');

INSERT INTO gameParticipants(participantId, gameId, totalGames, wins)
VALUES (1, 1, 10, 5);
		
connections
INSERT INTO gameParticipants(participantId, gameId, totalGames, wins)
		VALUES
		(SELECT id FROM participant WHERE username = 'Brooken2')
