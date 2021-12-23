CREATE TABLE personajes (
    per_act_id INT NOT NULL,
    per_peli_id INT NOT NULL,
    per_nombre VARCHAR(100) NOT NULL
)

INSERT INTO personajes (per_act_id, per_peli_id, per_nombre) VALUES
    (1, 1, 'Spiderman'),
    (2, 1, 'MJ'),
    (3, 2, 'Neo'),
    (4, 2, 'Trinity'),
    (5, 4, 'Rose'),
    (6, 4, 'Jack'),
    (7, 3, 'Alan Turing'),
    (8, 3, 'Joan Clarke'),
    (9, 5, 'Joseph Cooper'),
    (10, 5, 'Amalia Brand'),
    (11, 7, 'Jake Zully')

INSERT INTO personajes (per_act_id, per_peli_id, per_nombre) VALUES
    (12, 7, 'Neytiri')

-- ⚡⚡ RELACIONES
-- 2 TABLAS
-- PELICULAS - PERSONAJES | PERSONAJES - ACTORES

SELECT *
    FROM peliculas, personajes
    WHERE peliculas.peli_id = personajes.per_peli_id

SELECT *
    FROM personajes, actores
    WHERE personajes.per_act_id = actores.act_id

-- NOMBRE PELICULA, NOMBRE DEL PERSONAJE, FECHA DE ESTRENO, LIMITE PG-13
SELECT 
    peli_nombre, per_nombre, peli_estreno
    FROM peliculas, personajes
    WHERE peliculas.peli_id = personajes.per_peli_id
        AND peli_restricciones = 'pg-13'

-- 3 TABLAS
SELECT *
    FROM peliculas, personajes, actores
        WHERE peliculas.peli_id = personajes.per_peli_id 
            AND personajes.per_act_id = actores.act_id

-- (NOMBRES Y APELLIDOS DEL ACTOR), PERSONAJE, PELICULA, FECHA DE ESTRENO, LIMITE PELICULAS ORDENADAS POR FECHA DE ESTRENO DE FORMA DESCENDENTE

SELECT 
    CONCAT(act_nombres, ' ', act_apellidos) as actor,
    per_nombre,
    peli_nombre,
    peli_estreno
    FROM peliculas, personajes, actores
        WHERE peliculas.peli_id = personajes.per_peli_id 
            AND personajes.per_act_id = actores.act_id
            ORDER BY peli_estreno DESC

CREATE TABLE directores (
    dire_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    dire_nombres VARCHAR(50) NOT NULL,
    dire_apellidos VARCHAR(50) NOT NULL
)

INSERT INTO DIRECTORES (dire_nombres, dire_apellidos) VALUES
    ('Jon', 'Watts'),
    ('Lana', 'Wachowski'),
    ('James', 'Cameron'),
    ('Morten', 'Tyldum'),
    ('Christopher', 'Nolan'),
    ('John', 'McTiernan'),
    ('Stanley', 'Kubrick'),
    ('Ridley', 'Scott')

ALTER TABLE peliculas ADD COLUMN peli_dire_id INT

UPDATE peliculas SET peli_dire_id = 1 WHERE peli_id = 1
UPDATE peliculas SET peli_dire_id = 4 WHERE peli_id = 3
UPDATE peliculas SET peli_dire_id = 5 WHERE peli_id = 5
UPDATE peliculas SET peli_dire_id = 3 WHERE peli_id = 4
UPDATE peliculas SET peli_dire_id = 3 WHERE peli_id = 7
UPDATE peliculas SET peli_dire_id = 8 WHERE peli_id = 9

-- NOMBRE DE PELICULA, GENERO, Y (APELLIDOS Y NOMBRES DEL DIRECTOR)
SELECT 
    peli_nombre, 
    peli_genero, 
    CONCAT(dire_apellidos," ",dire_nombres) AS DIRECTOR 
        FROM peliculas, directores 
            WHERE peli_dire_id = dire_id

SELECT 
    peliculas.peli_nombre, 
    peliculas.peli_genero, 
    CONCAT(directores.dire_apellidos," ",directores.dire_nombres) AS DIRECTOR 
        FROM peliculas, directores 
            WHERE peliculas.peli_dire_id = directores.dire_id

-- 4 TABLAS
SELECT peli_nombre
    FROM peliculas, personajes, actores, directores
        WHERE peliculas.peli_id = personajes.per_peli_id
            AND personajes.per_act_id = actores.act_id
            AND peliculas.peli_dire_id = directores.dire_id