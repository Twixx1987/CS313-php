CREATE TABLE rdi_version (
	version_id serial PRIMARY KEY,
	version_name varchar(80)
);

CREATE TABLE rdi_characters (
	character_id serial PRIMARY KEY,
	version_id integer NOT NULL REFERENCES rdi_version (version_id),
	character_name varchar(80),
	race varchar(80),
	class varchar(80),
	good text,
	bad text,
	worse text
);

CREATE TABLE rdi_game (
	game_id serial PRIMARY KEY,
	player_count integer NOT NULL CHECK (player_count > 1)
);

CREATE TABLE rdi_user (
	user_id serial PRIMARY KEY,
	user_name varchar(80) UNIQUE NOT NULL,
	email text UNIQUE NOT NULL,
	password varchar(80) NOT NULL
);

CREATE TABLE rdi_player (
	player_id serial PRIMARY KEY,
	game_id integer REFERENCES rdi_game (game_id),
	user_id integer REFERENCES rdi_user (user_id),
	character_id integer REFERENCES rdi_characters (character_id),
	placement integer
);

