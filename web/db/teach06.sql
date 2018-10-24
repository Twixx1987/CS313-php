CREATE TABLE topic (
	id serial PRIMARY KEY,
	name varchar(80)
);

CREATE TABLE scripture_topic (
	scriptures_id integer REFERENCES scriptures (id),
	topic_id integer REFERENCES topic (id)
);

INSERT INTO topic (name) VALUES ('Love');
INSERT INTO topic (name) VALUES ('Hope');
INSERT INTO topic (name) VALUES ('Christ');
INSERT INTO topic (name) VALUES ('Faith');
INSERT INTO topic (name) VALUES ('The Plan of Salvation');
INSERT INTO topic (name) VALUES ('The Atonement of Jesus Christ');