CREATE TABLE public.user (
        id SERIAL NOT NULL PRIMARY KEY,
        user_name varchar(80) NOT NULL UNIQUE
);
CREATE TABLE public.conf_session
(
    id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(80) NOT NULL
);


CREATE Table public.speaker (
  id SERIAL NOT NULL PRIMARY KEY,
  speaker_name varchar(80) NOT NULL
);

CREATE TABLE public.conference (
id SERIAL NOT NULL PRIMARY KEY,
year int NOT NULL,
is_spring BOOLEAN NOT NULL,
session_id int NOT NULL
);

CREATE TABLE public.talk (
  id SERIAL NOT NULL PRIMARY KEY,
  talk_name varchar(150),
  speaker_id int NOT NULL REFERENCES public.speaker(id),
  session_id int NOT NULL REFERENCES public.conf_session(id),
  conference_id int NOT NULL REFERENCES public.conference(id)
);

CREATE TABLE  public.notes (
	id	SERIAL NOT NULL PRIMARY KEY,
	user_id int NOT NULL REFERENCES public.user(id),
	speaker_id	int	NOT NULL REFERENCES public.speaker(id),
	conference_id int NOT NULL REFERENCES public.conference(id),
	talk_id int NOT NULL REFERENCES public.talk(id),
	note_text TEXT NOT NULL
	);