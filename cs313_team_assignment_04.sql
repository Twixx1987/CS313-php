--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5 (Ubuntu 10.5-1.pgdg14.04+1)
-- Dumped by pg_dump version 10.5

-- Started on 2018-10-09 20:00:51

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 199 (class 1259 OID 5215653)
-- Name: conference; Type: TABLE; Schema: public; Owner: lhrvtbcbhnzcsy
--

CREATE TABLE public.conference (
    id integer NOT NULL,
    date date
);


ALTER TABLE public.conference OWNER TO lhrvtbcbhnzcsy;

--
-- TOC entry 198 (class 1259 OID 5215651)
-- Name: conference_id_seq; Type: SEQUENCE; Schema: public; Owner: lhrvtbcbhnzcsy
--

CREATE SEQUENCE public.conference_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.conference_id_seq OWNER TO lhrvtbcbhnzcsy;

--
-- TOC entry 3726 (class 0 OID 0)
-- Dependencies: 198
-- Name: conference_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: lhrvtbcbhnzcsy
--

ALTER SEQUENCE public.conference_id_seq OWNED BY public.conference.id;


--
-- TOC entry 203 (class 1259 OID 5215675)
-- Name: notes; Type: TABLE; Schema: public; Owner: lhrvtbcbhnzcsy
--

CREATE TABLE public.notes (
    id integer NOT NULL,
    note text NOT NULL,
    user_id integer,
    confernce_id integer,
    speaker_id integer
);


ALTER TABLE public.notes OWNER TO lhrvtbcbhnzcsy;

--
-- TOC entry 202 (class 1259 OID 5215673)
-- Name: ntoes_id_seq; Type: SEQUENCE; Schema: public; Owner: lhrvtbcbhnzcsy
--

CREATE SEQUENCE public.ntoes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ntoes_id_seq OWNER TO lhrvtbcbhnzcsy;

--
-- TOC entry 3727 (class 0 OID 0)
-- Dependencies: 202
-- Name: ntoes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: lhrvtbcbhnzcsy
--

ALTER SEQUENCE public.ntoes_id_seq OWNED BY public.notes.id;


--
-- TOC entry 201 (class 1259 OID 5215664)
-- Name: speaker; Type: TABLE; Schema: public; Owner: lhrvtbcbhnzcsy
--

CREATE TABLE public.speaker (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE public.speaker OWNER TO lhrvtbcbhnzcsy;

--
-- TOC entry 200 (class 1259 OID 5215662)
-- Name: speaker_id_seq; Type: SEQUENCE; Schema: public; Owner: lhrvtbcbhnzcsy
--

CREATE SEQUENCE public.speaker_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.speaker_id_seq OWNER TO lhrvtbcbhnzcsy;

--
-- TOC entry 3728 (class 0 OID 0)
-- Dependencies: 200
-- Name: speaker_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: lhrvtbcbhnzcsy
--

ALTER SEQUENCE public.speaker_id_seq OWNED BY public.speaker.id;


--
-- TOC entry 197 (class 1259 OID 5215642)
-- Name: user; Type: TABLE; Schema: public; Owner: lhrvtbcbhnzcsy
--

CREATE TABLE public."user" (
    id integer NOT NULL,
    username character varying
);


ALTER TABLE public."user" OWNER TO lhrvtbcbhnzcsy;

--
-- TOC entry 196 (class 1259 OID 5215640)
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: lhrvtbcbhnzcsy
--

CREATE SEQUENCE public.user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO lhrvtbcbhnzcsy;

--
-- TOC entry 3729 (class 0 OID 0)
-- Dependencies: 196
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: lhrvtbcbhnzcsy
--

ALTER SEQUENCE public.user_id_seq OWNED BY public."user".id;


--
-- TOC entry 3576 (class 2604 OID 5215656)
-- Name: conference id; Type: DEFAULT; Schema: public; Owner: lhrvtbcbhnzcsy
--

ALTER TABLE ONLY public.conference ALTER COLUMN id SET DEFAULT nextval('public.conference_id_seq'::regclass);


--
-- TOC entry 3578 (class 2604 OID 5215678)
-- Name: notes id; Type: DEFAULT; Schema: public; Owner: lhrvtbcbhnzcsy
--

ALTER TABLE ONLY public.notes ALTER COLUMN id SET DEFAULT nextval('public.ntoes_id_seq'::regclass);


--
-- TOC entry 3577 (class 2604 OID 5215667)
-- Name: speaker id; Type: DEFAULT; Schema: public; Owner: lhrvtbcbhnzcsy
--

ALTER TABLE ONLY public.speaker ALTER COLUMN id SET DEFAULT nextval('public.speaker_id_seq'::regclass);


--
-- TOC entry 3575 (class 2604 OID 5215645)
-- Name: user id; Type: DEFAULT; Schema: public; Owner: lhrvtbcbhnzcsy
--

ALTER TABLE ONLY public."user" ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);


--
-- TOC entry 3714 (class 0 OID 5215653)
-- Dependencies: 199
-- Data for Name: conference; Type: TABLE DATA; Schema: public; Owner: lhrvtbcbhnzcsy
--

INSERT INTO public.conference (id, date) VALUES (1, '2018-10-06');
INSERT INTO public.conference (id, date) VALUES (2, '2018-10-07');
INSERT INTO public.conference (id, date) VALUES (3, '2017-10-07');
INSERT INTO public.conference (id, date) VALUES (4, '2017-10-08');
INSERT INTO public.conference (id, date) VALUES (5, '2018-04-01');
INSERT INTO public.conference (id, date) VALUES (6, '2018-03-31');


--
-- TOC entry 3718 (class 0 OID 5215675)
-- Dependencies: 203
-- Data for Name: notes; Type: TABLE DATA; Schema: public; Owner: lhrvtbcbhnzcsy
--

INSERT INTO public.notes (id, note, user_id, confernce_id, speaker_id) VALUES (1, 'This is someones note', 1, 1, 1);
INSERT INTO public.notes (id, note, user_id, confernce_id, speaker_id) VALUES (2, 'Shuan''s note', 3, 3, 2);
INSERT INTO public.notes (id, note, user_id, confernce_id, speaker_id) VALUES (3, 'Paul''s note', 4, 5, 1);
INSERT INTO public.notes (id, note, user_id, confernce_id, speaker_id) VALUES (4, 'Taylor''s note', 2, 4, 3);


--
-- TOC entry 3716 (class 0 OID 5215664)
-- Dependencies: 201
-- Data for Name: speaker; Type: TABLE DATA; Schema: public; Owner: lhrvtbcbhnzcsy
--

INSERT INTO public.speaker (id, name) VALUES (1, 'Elder Neilson');
INSERT INTO public.speaker (id, name) VALUES (2, 'Elder Cook');
INSERT INTO public.speaker (id, name) VALUES (3, 'Elder Holland');


--
-- TOC entry 3712 (class 0 OID 5215642)
-- Dependencies: 197
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: lhrvtbcbhnzcsy
--

INSERT INTO public."user" (id, username) VALUES (1, 'solsen');
INSERT INTO public."user" (id, username) VALUES (2, 'tpeterson');
INSERT INTO public."user" (id, username) VALUES (3, 'sdensley');
INSERT INTO public."user" (id, username) VALUES (4, 'pnielsen');


--
-- TOC entry 3730 (class 0 OID 0)
-- Dependencies: 198
-- Name: conference_id_seq; Type: SEQUENCE SET; Schema: public; Owner: lhrvtbcbhnzcsy
--

SELECT pg_catalog.setval('public.conference_id_seq', 6, true);


--
-- TOC entry 3731 (class 0 OID 0)
-- Dependencies: 202
-- Name: ntoes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: lhrvtbcbhnzcsy
--

SELECT pg_catalog.setval('public.ntoes_id_seq', 4, true);


--
-- TOC entry 3732 (class 0 OID 0)
-- Dependencies: 200
-- Name: speaker_id_seq; Type: SEQUENCE SET; Schema: public; Owner: lhrvtbcbhnzcsy
--

SELECT pg_catalog.setval('public.speaker_id_seq', 3, true);


--
-- TOC entry 3733 (class 0 OID 0)
-- Dependencies: 196
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: lhrvtbcbhnzcsy
--

SELECT pg_catalog.setval('public.user_id_seq', 4, true);


--
-- TOC entry 3725 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: lhrvtbcbhnzcsy
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO lhrvtbcbhnzcsy;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2018-10-09 20:00:59

--
-- PostgreSQL database dump complete
--

