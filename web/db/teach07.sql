CREATE TABLE week07user (
	user_id serial PRIMARY KEY,
	user_name varchar(80) UNIQUE NOT NULL,
	password varchar(255) NOT NULL
);