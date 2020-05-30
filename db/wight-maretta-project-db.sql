--Database Project - Maretta Wight - Event Registration

--clean up
DROP TABLE IF EXISTS public.event CASCADE;
DROP TABLE IF EXISTS public.shirt_price CASCADE;
DROP TABLE IF EXISTS public.shirt_size CASCADE;
DROP TABLE IF EXISTS public.address CASCADE;
DROP TABLE IF EXISTS public.participant CASCADE;


CREATE TABLE public.event (
    id SERIAL PRIMARY KEY,
    event_name VARCHAR (100) NOT NULL
);

CREATE TABLE public.shirt_price (
    id INT NOT NULL PRIMARY KEY,
    price MONEY NOT NULL
);

CREATE TABLE public.shirt_size (
    id SERIAL PRIMARY KEY,
    size VARCHAR (20) NOT NULL   
);

CREATE TABLE public.participant (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR (80) NOT NULL,
    last_name VARCHAR (80) NOT NULL,
    email 
    registration_date DATE NOT NULL DEFAULT CURRENT_DATE,
    shirt_size_id INT REFERENCES public.shirt_size(id),
    event_id INT NOT NULL REFERENCES public.event(id),
    confirmation_id VARCHAR (10) NOT NUll

);

INSERT INTO public.shirt_price  VALUES (
    1, 8.00),
    (2, 10.00),
    (3, 12.00);


INSERT INTO public.shirt_size (size) VALUES (
    'Adult XXL'),
    ('Adult XL'),
    ('Adult L'),
    ('Adult M'),
    ('Adult S'),
    ('Youth L'),
    ('Youth M'),
    ('Youth S');


INSERT INTO public.event (event_name) VALUES
    ('1k'),
    ('5k'),
    ('10k');

INSERT INTO public.participant (first_name, last_name, shirt_size_id, event_id, confirmation_id)
   VALUES 
   ('Charlie', 'Brown', 3, 2,(SELECT array_to_string(array((
   SELECT SUBSTRING('ABCDEFGHJKLMNPQRSTUVWXYZ23456789'
                    FROM mod((random()*32)::int, 32)+1 FOR 1)
   FROM generate_series(1,8))),''))),
--    ('Sally', 'Brown', 4, 2),  
--    ('Peppermint', 'Patty', 4, 1),
--    ('Linus', 'van Pelt', 3, 1),
--    ('Lucy', 'van Pelt', 5, 1)

;

    
--Add these later when I figure out how to add multiple participants to a registration and transaction.
-- ALTER TABLE child_table 
-- ADD CONSTRAINT constraint_name FOREIGN KEY (c1) REFERENCES parent_table (p1);

--CREATE TABLE age_division (
 --   id SERIAL PRIMARY KEY,
 --   age_div VARCHAR (100) NOT NULL);

-- CREATE TABLE public.gender (
--     id INT PRIMARY KEY
--     gender VARCHAR (10)

-- CREATE TABLE public.registration (
--     id SERIAL PRIMARY KEY,

-- );

-- CREATE TABLE public.transaction (
--     id SERIAL PRIMARY KEY,

-- );
-- CREATE TABLE public.address (
--     id SERIAL PRIMARY KEY,
--     add_street1 VARCHAR (100) NOT NULL,
--     add_street2 VARCHAR (100) NOT NULL,
--     add_city VARCHAR (100) NOT NULL,
--     add_state VARCHAR (100) NOT NULL,
--     add_zip VARCHAR (15) NOT NULL

-- );



