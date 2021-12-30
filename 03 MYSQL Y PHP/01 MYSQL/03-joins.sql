-- ⚡⚡ JOINS ⚡⚡

SELECT *
    FROM peliculas a, personajes b
        WHERE a.peli_id = b.per_peli_id
---------------------------------------------------------
SELECT *
    FROM  peliculas a
        INNER JOIN personajes b
            ON a.peli_id = b.per_peli_id

SELECT *
    FROM directores a
        INNER JOIN peliculas b
            ON a.dire_id = b.peli_dire_id

-- ⚡⚡ LEFT
SELECT *
    FROM peliculas a
        LEFT JOIN directores b
            ON a.peli_dire_id = b.dire_id

SELECT *
    FROM directores a
        LEFT JOIN peliculas b
            ON a.dire_id = b.peli_dire_id

-- ⚡⚡ RIGHT

SELECT *
    FROM peliculas a
        RIGHT JOIN directores b
            ON a.peli_dire_id = b.dire_id

-- ⚡⚡ 3 TABLAS
INSERT INTO personajes (per_nombre) VALUES
    ('Batman'),
    ('Superman'),
    ('Iron Man'),
    ('Indiana Jones')

SELECT *
    FROM peliculas a
        INNER JOIN personajes b ON a.peli_id = b.per_peli_id 
        INNER JOIN actores c ON b.per_act_id = c.act_id 

SELECT *
    FROM directores a
        INNER JOIN peliculas b ON a.dire_id = b.peli_dire_id 
        INNER JOIN personajes c ON b.peli_id = c.per_peli_id 

-----------------------------------------------------------------------
SELECT *
    FROM peliculas a
        LEFT JOIN personajes b ON a.peli_id = b.per_peli_id
        INNER JOIN actores c ON b.per_act_id = c.act_id 

SELECT *
    FROM peliculas a
        LEFT JOIN personajes b ON a.peli_id = b.per_peli_id
        LEFT JOIN actores c ON b.per_act_id = c.act_id

SELECT *
    FROM peliculas a
        INNER JOIN personajes b ON a.peli_id = b.per_peli_id -- A
        RIGHT JOIN actores c ON b.per_act_id = c.act_id      -- B