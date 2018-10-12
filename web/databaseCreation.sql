CREATE TABLE characters (
	character_id serial PRIMARY KEY,
	version_id integer NOT NULL REFERENCES version (version_id),
	character_name varchar(80),
	race varchar(80),
	good text,
	bad text,
);

CREATE TABLE version (
	version_id serial PRIMARY KEY,
	version_name varchar(80),
);

CREATE TABLE player (
	player_id serial PRIMARY KEY,
	game_id integer REFERENCES game (game_id),
	user_id integer REFERENCES user (user_id),
	character_id integer REFERENCES character (character_id),
	placement integer,
);

CREATE TABLE game (
	game_id serial PRIMARY KEY,
	player_count integer NOT NULL CHECK (player_count > 1),
);

CREATE TABLE user (
	user_id serial PRIMARY KEY,
	user_name varchar(80) UNIQUE NOT NULL,
	email text UNIQUE NOT NULL,
	password varchar(80) NOT NULL,
);