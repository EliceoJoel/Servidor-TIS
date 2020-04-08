PGDMP                         x            tis    11.2    11.2     	           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            
           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false                       1262    25702    tis    DATABASE     �   CREATE DATABASE tis WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Spain.1252' LC_CTYPE = 'Spanish_Spain.1252';
    DROP DATABASE tis;
             postgres    false            �            1259    25705 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false            �            1259    25703    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public       postgres    false    197                       0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
            public       postgres    false    196            �            1259    25763 	   postulant    TABLE        CREATE TABLE public.postulant (
    id integer NOT NULL,
    names character varying(30) NOT NULL,
    first_surname character varying(30) NOT NULL,
    second_surname character varying(30) NOT NULL,
    direction character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    phone character varying(8) NOT NULL,
    ci character varying(8) NOT NULL,
    auxiliary character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.postulant;
       public         postgres    false            �            1259    25761    postulant_id_seq    SEQUENCE     �   CREATE SEQUENCE public.postulant_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.postulant_id_seq;
       public       postgres    false    199                       0    0    postulant_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.postulant_id_seq OWNED BY public.postulant.id;
            public       postgres    false    198            �
           2604    25708    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    197    196    197            �
           2604    25766    postulant id    DEFAULT     l   ALTER TABLE ONLY public.postulant ALTER COLUMN id SET DEFAULT nextval('public.postulant_id_seq'::regclass);
 ;   ALTER TABLE public.postulant ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    199    198    199                      0    25705 
   migrations 
   TABLE DATA               :   COPY public.migrations (id, migration, batch) FROM stdin;
    public       postgres    false    197   x                 0    25763 	   postulant 
   TABLE DATA               �   COPY public.postulant (id, names, first_surname, second_surname, direction, email, phone, ci, auxiliary, created_at, updated_at) FROM stdin;
    public       postgres    false    199   �                  0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 6, true);
            public       postgres    false    196                       0    0    postulant_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.postulant_id_seq', 23, true);
            public       postgres    false    198            �
           2606    25710    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public         postgres    false    197            �
           2606    25771    postulant postulant_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.postulant
    ADD CONSTRAINT postulant_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.postulant DROP CONSTRAINT postulant_pkey;
       public         postgres    false    199               :   x�3�4202�70�70�700511�O.JM,I�/�/.)�I�+�/IL�I�4����� ir�            x������ � �     