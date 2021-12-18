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