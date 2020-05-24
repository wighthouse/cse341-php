SELECT participant_first_name, event_name  FROM participant p JOIN event e ON p.event_id=e.id WHERE e.event_name='5k';

SELECT participant_first_name, event_name  FROM participant p JOIN event e ON p.event_id=e.id WHERE e.id=2;

SELECT participant_first_name, participant_last_name,  event_name  FROM participant p JOIN event e ON p.event_id=e.id WHERE e.event_name='5k';

SELECT * FROM participant p JOIN event e ON p.event_id=e.id WHERE e.event_name='5k';

SELECT * FROM participant p JOIN event e ON p.event_id=e.id;

SELECT participant_first_name, participant_last_name, size, event_name  FROM participant p JOIN shirt_size s ON p.shirt_size_id=s.id JOIN event e ON p.event_id=e.id;

SELECT participant_first_name, participant_last_name, size, event_name FROM participant p 
    JOIN shirt_size s ON p.shirt_size_id=s.id 
    JOIN event e ON p.event_id=e.id
    WHERE e.event_name='5k';

    SELECT participant_first_name, participant_last_name, size, event_name FROM participant p 
    JOIN shirt_size s ON p.shirt_size_id=s.id 
    JOIN event e ON p.event_id=e.id
    WHERE e.event_name='1K';

SELECT * FROM participant p JOIN shirt_size s ON p.shirt_size_id=s.id JOIN event e ON p.event_id=e.id;