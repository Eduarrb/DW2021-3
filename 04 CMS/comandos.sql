CREATE DATABASE cms_2021_3

USE cms_2021_3

CREATE TABLE categorias(
    cat_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cat_nombre VARCHAR(25) NOT NULL
)

INSERT INTO categorias (cat_nombre) VALUES
    ("PHP"),
    ("HTML5"),
    ("Python"),
    ("MYSQL")

-- fecha de registro
-- usuario que registro
-- usuario que edito
-- fecha de edicion
-- ip equipo
-- navegador

CREATE TABLE noticias (
    noti_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    noti_cat_id INT NOT NULL,
    noti_titulo VARCHAR(255) NOT NULL,
    noti_resumen TEXT NOT NULL,
    noti_contenido TEXT NOT NULL,
    noti_fecha DATE NOT NULL,
    noti_img TEXT NOT NULL,
    noti_autor VARCHAR(50) NOT NULL,
    noti_vistas INT DEFAULT 0,
    noti_status VARCHAR(20) NOT NULL
)
INSERT INTO noticias (noti_cat_id, noti_titulo, noti_resumen, noti_contenido, noti_fecha, noti_img, noti_autor, noti_status) VALUES 
(1, "Curso profesional de PHP", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.", "2022-01-10", "01.png", "John Smith", "publicado"),
(12, "Curso profesional de Javascript", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.", "2022-01-10", "02.png", "Eduardo Arroyo", "publicado")

SELECT noti_id, noti_img, noti_fecha, noti_titulo, noti_resumen FROM noticias WHERE noti_status = 'publicado' ORDER BY noti_id DESC LIMIT 1

SELECT noti_id, noti_img, noti_fecha, noti_titulo, noti_resumen FROM noticias WHERE noti_id != 2 ORDER BY noti_id DESC

SELECT DAY(noti_fecha) as dia, MONTH(noti_fecha) as mes, YEAR(noti_fecha) as anio FROM noticias

SELECT * FROM noticias a INNER JOIN categorias b ON a.noti_cat_id = b.cat_id ORDER BY a.noti_id DESC

CREATE TABLE comentarios(
    com_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    com_noti_id INT NOT NULL,
    com_nombre VARCHAR(100) NOT NULL,
    com_email VARCHAR(100) NOT NULL,
    com_mensaje TEXT NOT NULL,
    com_status VARCHAR(25),
    com_fecha DATETIME NOT NULL
)

SELECT 
    b.noti_titulo,
    CONCAT(c.user_nombres, ' ', c.user_apellidos) AS usuario,
    a.com_mensaje,
    a.com_fecha,
    a.com_status
    FROM comentarios a
        INNER JOIN noticias b ON a.com_noti_id = b.noti_id
        INNER JOIN usuarios c ON a.com_user_id = c.user_id
        WHERE a.com_status = 'pendiente' ORDER BY a.com_id DESC

CREATE TABLE usuarios (
    user_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_nombres VARCHAR(255) NOT NULL,
    user_apellidos VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_img TEXT, 
    user_pass VARCHAR(255) NOT NULL,
    user_token TEXT,
    user_status TINYINT DEFAULT 0,
    user_rol VARCHAR(100) NOT NULL
)

INSERT INTO usuarios (user_nombres, user_apellidos, user_email, user_pass, user_rol) VALUES ('Eduardo', 'Arroyo', 'eduardo@gmail.com', '123', 'admin')

SELECT 
    COUNT(*) AS cantidad,
    MONTH(noti_fecha) as mes
    FROM noticias
        GROUP BY MONTH(noti_fecha)