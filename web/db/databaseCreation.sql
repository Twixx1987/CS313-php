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
	player_count integer NOT NULL CHECK (player_count > 1),
  game_open boolean DEFAULT true,
  game_complete boolean DEFAULT false,
  host_user integer NOT NULL REFERENCES rdi_user (user_id),
);

CREATE TABLE rdi_user (
	user_id serial PRIMARY KEY,
	user_name varchar(80) UNIQUE NOT NULL,
	password varchar(255) NOT NULL
);

CREATE TABLE rdi_player (
	player_id serial PRIMARY KEY,
	game_id integer REFERENCES rdi_game (game_id),
	user_id integer REFERENCES rdi_user (user_id),
	character_id integer REFERENCES rdi_characters (character_id),
	placement integer
);

CREATE TABLE rdi_game_characters (
    game_characters_id serial NOT NULL PRIMARY KEY,
    game_id integer NOT NULL REFERENCES rdi_game (game_id),
    user_id integer NOT NULL REFERENCES rdi_user (user_id),
    character_id integer NOT NULL REFERENCES rdi_characters (character_id),
    CONSTRAINT rdi_player_game_id_character_id_key UNIQUE (game_id, character_id),
    CONSTRAINT rdi_player_game_id_user_id_key UNIQUE (game_id, user_id)
);