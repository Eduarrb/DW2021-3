-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2022 a las 01:41:36
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
(1, 1, 'Curso profesional de PHP', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.', '2022-01-10', '01.png', 'John Smith', 0, 'publicado'),
(2, 12, 'Curso profesional de Javascript', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam enim reprehenderit optio porro quam impedit est deleniti natus, quasi dolor.', '2022-01-10', '02.png', 'Eduardo Arroyo', 0, 'publicado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`noti_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `noti_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
