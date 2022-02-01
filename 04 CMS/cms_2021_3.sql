-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2022 a las 11:25:14
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cms_2021_3`
--
CREATE DATABASE IF NOT EXISTS `cms_2021_3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cms_2021_3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nombre`) VALUES
(1, 'PHP'),
(2, 'HTML5'),
(4, 'Mysql'),
(9, 'CSS'),
(12, 'JavaScript');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `com_id` int(10) UNSIGNED NOT NULL,
  `com_noti_id` int(11) NOT NULL,
  `com_nombre` varchar(100) NOT NULL,
  `com_email` varchar(100) NOT NULL,
  `com_mensaje` text NOT NULL,
  `com_status` varchar(25) DEFAULT NULL,
  `com_fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`com_id`, `com_noti_id`, `com_nombre`, `com_email`, `com_mensaje`, `com_status`, `com_fecha`) VALUES
(1, 2, 'Jaimito', 'jaimito@gmail.com', 'Este es el mensaje de Jaimito', 'aprobado', '2022-01-16 11:19:08'),
(3, 4, 'Carmen', 'carmen@gmail.com', 'este es el mensaje de carmen', 'aprobado', '2022-01-22 09:09:31'),
(4, 2, 'Eduardo', 'eduardo@gmail.com', 'Este curso esta que arde 🔥🔥🔥', 'aprobado', '2022-01-22 11:15:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `noti_id` int(10) UNSIGNED NOT NULL,
  `noti_cat_id` int(11) NOT NULL,
  `noti_titulo` varchar(255) NOT NULL,
  `noti_resumen` text NOT NULL,
  `noti_contenido` text NOT NULL,
  `noti_fecha` date NOT NULL,
  `noti_img` text NOT NULL,
  `noti_autor` varchar(50) NOT NULL,
  `noti_vistas` int(11) DEFAULT 0,
  `noti_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`noti_id`, `noti_cat_id`, `noti_titulo`, `noti_resumen`, `noti_contenido`, `noti_fecha`, `noti_img`, `noti_autor`, `noti_vistas`, `noti_status`) VALUES
(1, 1, 'Curso profesional de PHP', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.</p>', '2022-01-10', '933b6052d3938dd07e776c78a920e4f6.png', 'John Smith', 3, 'publicado'),
(2, 12, 'Curso profesional de Javascript', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.', '2022-01-10', '02.png', 'Eduardo Arroyo', 25, 'publicado'),
(3, 2, 'Curso Profesional de HTML5', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa laboriosam sit est nulla consectetur a deleniti commodi? Quia, officia explicabo?</p>', '<p style=\"text-align: center;\"><span style=\"color: #35afe2;\">HTML5</span></p>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa laboriosam sit est nulla consectetur a deleniti commodi? Quia, officia explicabo?</p>', '2022-01-15', '6155006bb57fb9b9609579f31abc3010.png', 'Eduardo Arroyo', 2, 'publicado'),
(4, 4, 'Curso de Mysql', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa laboriosam sit est nulla consectetur a deleniti commodi? Quia, officia explicabo?</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa laboriosam sit est nulla consectetur a deleniti commodi? Quia, officia explicabo?</p>', '2022-01-15', '9f7c1d04cab47dd2782003b8a7c32fc6.png', 'John Smith', 18, 'publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_nombres` varchar(255) NOT NULL,
  `user_apellidos` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_img` text DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_token` text DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT 0,
  `user_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_nombres`, `user_apellidos`, `user_email`, `user_img`, `user_pass`, `user_token`, `user_status`, `user_rol`) VALUES
(4, 'Eduardo', 'Arroyo', 'eduardo@gmail.com', NULL, '$2y$12$gu25v88WZ4OZdQyod/9YhekCR08Pe2TyUQX166gASbXtQ30EB5ewS', '', 1, 'admin'),
(6, 'Sofía', 'Cardenas', 'sofia@gmail.com', NULL, '$2y$12$lEH/s2qzBpEn5njvQRR9nO6BGJTuO5fhcPqonBQOh9DAQvC2QeRvm', '', 1, 'suscriptor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`com_id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `com_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `noti_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
