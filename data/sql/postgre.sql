--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.22
-- Dumped by pg_dump version 9.6.22

-- Started on 2021-08-13 22:03:23

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2141 (class 1262 OID 16394)
-- Name: softexpert; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE softexpert WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';


ALTER DATABASE softexpert OWNER TO postgres;

\connect softexpert

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12387)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2143 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 186 (class 1259 OID 16397)
-- Name: products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    type integer NOT NULL,
    price numeric NOT NULL
);


ALTER TABLE public.products OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 16395)
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO postgres;

--
-- TOC entry 2144 (class 0 OID 0)
-- Dependencies: 185
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;


--
-- TOC entry 188 (class 1259 OID 16408)
-- Name: typeproducts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.typeproducts (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    price numeric NOT NULL
);


ALTER TABLE public.typeproducts OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 16406)
-- Name: typeproducts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.typeproducts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.typeproducts_id_seq OWNER TO postgres;

--
-- TOC entry 2145 (class 0 OID 0)
-- Dependencies: 187
-- Name: typeproducts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.typeproducts_id_seq OWNED BY public.typeproducts.id;


--
-- TOC entry 2009 (class 2604 OID 16400)
-- Name: products id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);


--
-- TOC entry 2010 (class 2604 OID 16411)
-- Name: typeproducts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.typeproducts ALTER COLUMN id SET DEFAULT nextval('public.typeproducts_id_seq'::regclass);


--
-- TOC entry 2133 (class 0 OID 16397)
-- Dependencies: 186
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.products (id, name, type, price) VALUES (11, 'Achocolatado em Pó Nescau 1,2kg', 5, 19.50);
INSERT INTO public.products (id, name, type, price) VALUES (12, 'Biscoito OREO Recheado Chocolate 270g', 4, 9.55);


--
-- TOC entry 2146 (class 0 OID 0)
-- Dependencies: 185
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_id_seq', 12, true);


--
-- TOC entry 2135 (class 0 OID 16408)
-- Dependencies: 188
-- Data for Name: typeproducts; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.typeproducts (id, name, price) VALUES (1, 'Bijuteria', 43.36);
INSERT INTO public.typeproducts (id, name, price) VALUES (2, 'Chocolate', 39.61);
INSERT INTO public.typeproducts (id, name, price) VALUES (3, 'Frutas', 11.78);
INSERT INTO public.typeproducts (id, name, price) VALUES (4, 'Biscoito', 37.30);
INSERT INTO public.typeproducts (id, name, price) VALUES (5, 'Achocolatado', 38.06);


--
-- TOC entry 2147 (class 0 OID 0)
-- Dependencies: 187
-- Name: typeproducts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.typeproducts_id_seq', 5, true);


--
-- TOC entry 2012 (class 2606 OID 16405)
-- Name: products products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


--
-- TOC entry 2014 (class 2606 OID 16416)
-- Name: typeproducts typeproducts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.typeproducts
    ADD CONSTRAINT typeproducts_pkey PRIMARY KEY (id);


-- Completed on 2021-08-13 22:03:23

--
-- PostgreSQL database dump complete
--

