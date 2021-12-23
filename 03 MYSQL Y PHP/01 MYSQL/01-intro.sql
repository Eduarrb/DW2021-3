-- mysql -u root --> CONSOLA SERVIDOR DE MYSQL
-- mysql -u root -p -> 💡💡 pasemos la contraseña del usuario

-- ⚡⚡ COMANDOS INICIALES
-- mysql no es key sensitive

show databases;
SHOW DATABASES;

CREATE DATABASE dw2021_3

DROP DATABASE dw2021_3 -- 💥💥💥💥💥💥

USE dw2021_3

-- ⚡⚡ CREACION DE TABLAS;

CREATE TABLE persona (
    per_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    per_nombres VARCHAR(50) NOT NULL,
    per_apellidos VARCHAR(100) NOT NULL,
    per_direccion VARCHAR(255) NOT NULL,
    per_fecha_nac DATE,
    per_dni CHAR(8) UNIQUE NOT NULL
)
-- DATE -> 2021-12-17
-- DATETIME -> 2021-12-17 17:15:00
SHOW TABLES;
DESC persona

ALTER TABLE persona ADD COLUMN per_genero VARCHAR(25)

ALTER TABLE persona CHANGE COLUMN per_genero per_genero CHAR(1) NOT NULL

ALTER TABLE persona ADD COLUMN per_fecha_registro DATETIME NOT NULL AFTER per_direccion

ALTER TABLE persona DROP COLUMN per_fecha_registro

-- ⚡⚡ INSERTAR DATOS
INSERT INTO persona (per_nombres, per_apellidos, per_direccion, per_fecha_nac, per_dni, per_genero) VALUES 
    ('Ricardo', 'Jimenez', 'Las 7 apuñaladas N° 666', '1970-10-10', '12345678', 'M')

SELECT per_nombres, per_apellidos FROM persona

SELECT * FROM persona

INSERT INTO persona (per_nombres, per_apellidos, per_direccion, per_fecha_nac, per_dni, per_genero) VALUES
    ("Sofia", "Rodriguez", "Av. Los Proceres 456", '2000-12-24', '12345679', 'F')

INSERT INTO persona (per_nombres, per_apellidos, per_direccion, per_fecha_nac, per_dni, per_genero) VALUES
    ("José", "Tapia", "Av. Los Proceres 455", '2000-10-25', '12345676', 'M'),
    ("Malena", "Ruiz", "Jr. Los Tulipanes 1086", '1997-01-01', '12345675', 'F')

-- 💥💥💥💥💥😨
DELETE FROM persona WHERE per_id = 5

INSERT INTO persona (per_nombres, per_apellidos, per_direccion, per_fecha_nac, per_dni, per_genero) VALUES
    ("Malena", "Ruiz", "Jr. Los Tulipanes 1006", '1997-01-01', '12345675', 'F')

DROP TABLE persona;

INSERT INTO persona (per_nombres, per_apellidos, per_direccion, per_fecha_nac, per_dni, per_genero) VALUES 
    ('Ricardo', 'Jimenez', 'Las 7 apuñaladas N° 666', '1970-10-10', '12345678', 'M'),
    ("Sofia", "Rodriguez", "Av. Los Proceres 456", '2000-12-24', '12345679', 'F'),
    ("José", "Tapia", "Av. Los Proceres 455", '2000-10-25', '12345676', 'M'),
    ("Malena", "Ruiz", "Jr. Los Tulipanes 1086", '1997-01-01', '12345675', 'F')

TRUNCATE persona;
--------------------------------------------------------------
CREATE TABLE peliculas (
    peli_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    peli_nombre VARCHAR(255) NOT NULL,
    peli_genero VARCHAR(100) NOT NULL,
    peli_estreno DATE NOT NULL,
    peli_restricciones VARCHAR(10)
)

INSERT INTO peliculas (peli_nombre, peli_genero, peli_estreno, peli_restricciones) VALUES
    ("Spiderman: No way home", "acción", "2021-12-15", "PG-13"),
    ('Matrix', "ciencia ficción", '1999-12-24', 'PG-13'),
    ('El código enigma', 'Bélica', '2017-08-29', 'PG-16'),
    ('Titanic', 'Drama Romantico', '1997-07-07', 'PG-13'),
    ('Interestellar', 'Ciencia ficción', '2014-10-18', 'PG-13'),
    ('Depredador', 'ciencia ficción', '1987-12-24', 'PG-16'),
    ('Avatar', 'ciencia ficción', '2009-10-18', 'PG'),
    ('El resplandor', 'terror', '1980-10-09', 'PG-13'),
    ('Alien: El octavo pasajero', 'ciencia ficcion', '1980-01-24', 'PG-18')

SELECT * FROM peliculas

-- ⚡⚡ WHERE
SELECT * FROM peliculas WHERE peli_id = 5

SELECT * FROM peliculas WHERE peli_nombre = 'interestellar'

SELECT * FROM peliculas WHERE peli_genero = 'ciencia ficción'

SELECT * FROM peliculas WHERE peli_restricciones = 'pg'

-- ⚡⚡ ORDER BY
SELECT * FROM peliculas ORDER BY peli_id DESC

SELECT * FROM peliculas ORDER BY peli_nombre

SELECT * FROM peliculas WHERE peli_restricciones = 'pg-13' ORDER BY peli_estreno

SELECT * FROM peliculas WHERE peli_restricciones = 'pg-16' ORDER BY peli_genero DESC

-------------------------------------------
CREATE TABLE actores (
    act_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    act_nombres VARCHAR(100) NOT NULL,
    act_apellidos VARCHAR(100) NOT NULL
)

INSERT INTO actores (act_nombres, act_apellidos) VALUES
    ('Tom', 'Holland'),
    ('Zendaya', 'Coleman'),
    ('Keanu', 'Reeves'),
    ('Carrie-Anne', 'Moss'),
    ('Kate', 'Winlet'),
    ('Leonardo', 'DiCaprio'),
    ('Benedict', 'Cumberbath'),
    ('Keira', 'Knigthley'),
    ('Matthew', 'McConaughey'),
    ('Anne', 'Hathaway'),
    ('Sam', 'Worthington'),
    ('Zoe', 'Saldana'),
    ('Jack', 'Nicholson'),
    ('Shelley', 'Duvall')

-- HAS UNA CONSULTA QUE MUESTRE EL NOMBRE Y APELLIDO DEL ACTOR EN UNA SOLA COLUMNA - PERO BIEN ORDENADO Y BONITO

SELECT * FROM actores

SELECT CONCAT(act_nombres, act_apellidos) FROM actores

SELECT CONCAT(act_nombres, ' ', act_apellidos) FROM actores

-- ORDENADO POR APELLIDO O POR NOMBRE?
SELECT CONCAT(act_nombres, ' ', act_apellidos) FROM actores ORDER BY act_nombres

-- Y QUE EL NOMBRE DEL CAMPO NO SEA TAN COMPLEJO ⚡⚡ ALIAS
SELECT CONCAT(act_nombres, ' ', act_apellidos) AS actor FROM actores ORDER BY act_nombres

SELECT CONCAT(act_nombres, ' ', act_apellidos) AS "actor de reparto" FROM actores ORDER BY act_nombres

-- MOSTRAR EL RESULTADO DE SU POSIBLE CORREO COORPORATIVO
-- Eduardo Arroyo -> earroyo@continental.edu.pe
-- Nombres y apellidos en un solo campo, el correo corporativo
SELECT SUBSTRING(act_nombres, 1, 3) FROM actores

SELECT
    CONCAT(act_nombres, ' ', act_apellidos) AS actor,
    LOWER(CONCAT(SUBSTRING(act_nombres, 1, 1), act_apellidos, '@continental.edu.pe')) AS correo
    FROM actores

-- ⚡⚡ GROUP BY
SELECT COUNT(*) AS cantidad, peli_genero FROM peliculas GROUP BY peli_genero

SELECT COUNT(*) AS cantidad, peli_genero FROM peliculas WHERE peli_genero = 'accion' GROUP BY peli_genero

SELECT COUNT(*) AS cantidad, peli_restricciones FROM peliculas GROUP BY peli_restricciones

-- ⚡⚡ COMODINES
SELECT * FROM peliculas WHERE peli_nombre LIKE "A%"

SELECT * FROM peliculas WHERE peli_nombre LIKE "%r"

SELECT * FROM peliculas WHERE peli_nombre LIKE "%ma%"

SELECT * FROM peliculas WHERE peli_nombre LIKE "_l%"

-- ⚡⚡ BETWEEN
-- MOSTRAR PELICULAS ENTRE 1987 HASTA 2017

SELECT * FROM peliculas ORDER BY peli_estreno

SELECT * FROM peliculas WHERE peli_estreno BETWEEN "1987-01-01" AND "2017-12-31"

SELECT * FROM peliculas WHERE peli_estreno BETWEEN "1987-01-01" AND "2017-12-31" ORDER BY peli_estreno

SELECT * FROM peliculas WHERE peli_estreno BETWEEN "1987-01-01" AND "2017-12-31" AND peli_nombre LIKE "M%" ORDER BY peli_nombre


