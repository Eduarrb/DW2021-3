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


