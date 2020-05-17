CREATE TABLE public.event (
    id INT NOT NULL PRIMARY KEY,
    event_name VARCHAR (100) NOT NULL,
    age_division VARCHAR (100) NOT NULL,
    gender VARCHAR (10)
);

CREATE TABLE public.shirt (
    id INT NOT NULL PRIMARY KEY,
    style VARCHAR (100),
    size VARCHAR (10),
    price MONEY NOT NULL

);

CREATE TABLE public.address (
    id SERIAL PRIMARY KEY,
    add_street1 VARCHAR (100) NOT NULL,
    add_street2 VARCHAR (100) NOT NULL,
    add_city VARCHAR (100) NOT NULL,
    add_state VARCHAR (100) NOT NULL,
    add_zip VARCHAR (15) NOT NULL

);

CREATE TABLE public.participant (
    id SERIAL PRIMARY KEY,
    participant_first_name VARCHAR (80) NOT NULL,
    participant_last_name VARCHAR (80) NOT NULL,
    address_id INT NOT NULL NOT NULL REFERENCES public.address(id),
    registration_date DATE NOT NULL DEFAULT CURRENT_DATE,
    shirt_id INT REFERENCES public.shirt(id),
    event_id INT NOT NULL REFERENCES public.event(id

);
--Add these later when I figure out how to add multiple participants to a registration and transaction.
-- ALTER TABLE child_table 
-- ADD CONSTRAINT constraint_name FOREIGN KEY (c1) REFERENCES parent_table (p1);



-- CREATE TABLE public.registration (
--     id SERIAL PRIMARY KEY,

-- );

-- CREATE TABLE public.transaction (
--     id SERIAL PRIMARY KEY,

-- );




