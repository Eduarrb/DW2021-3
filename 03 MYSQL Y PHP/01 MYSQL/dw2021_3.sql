-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2021 a las 01:50:45
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
-- Base de datos: `dw2021_3`
--
CREATE DATABASE IF NOT EXISTS `dw2021_3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dw2021_3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

DROP TABLE IF EXISTS `actores`;
CREATE TABLE `actores` (
  `act_id` int(10) UNSIGNED NOT NULL,
  `act_nombres` varchar(100) NOT NULL,
  `act_apellidos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`act_id`, `act_nombres`, `act_apellidos`) VALUES
(1, 'Tom', 'Holland'),
(2, 'Zendaya', 'Coleman'),
(3, 'Keanu', 'Reeves'),
(4, 'Carrie-Anne', 'Moss'),
(5, 'Kate', 'Winlet'),
(6, 'Leonardo', 'DiCaprio'),
(7, 'Benedict', 'Cumberbath'),
(8, 'Keira', 'Knigthley'),
(9, 'Matthew', 'McConaughey'),
(10, 'Anne', 'Hathaway'),
(11, 'Sam', 'Worthington'),
(12, 'Zoe', 'Saldana'),
(13, 'Jack', 'Nicholson'),
(14, 'Shelley', 'Duvall');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

DROP TABLE IF EXISTS `directores`;
CREATE TABLE `directores` (
  `dire_id` int(10) UNSIGNED NOT NULL,
  `dire_nombres` varchar(50) NOT NULL,
  `dire_apellidos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`dire_id`, `dire_nombres`, `dire_apellidos`) VALUES
(1, 'Jon', 'Watts'),
(2, 'Lana', 'Wachowski'),
(3, 'James', 'Cameron'),
(4, 'Morten', 'Tyldum'),
(5, 'Christopher', 'Nolan'),
(6, 'John', 'McTiernan'),
(7, 'Stanley', 'Kubrick'),
(8, 'Ridley', 'Scott');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE `peliculas` (
  `peli_id` int(10) UNSIGNED NOT NULL,
  `peli_nombre` varchar(255) NOT NULL,
  `peli_genero` varchar(100) NOT NULL,
  `peli_estreno` date NOT NULL,
  `peli_restricciones` varchar(10) DEFAULT NULL,
  `peli_dire_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`peli_id`, `peli_nombre`, `peli_genero`, `peli_estreno`, `peli_restricciones`, `peli_dire_id`) VALUES
(1, 'Spiderman: No way home', 'acción', '2021-12-15', 'PG-13', 1),
(2, 'Matrix', 'ciencia ficción', '1999-12-24', 'PG', NULL),
(3, 'El código enigma', 'Bélica', '2017-08-29', 'PG-16', 4),
(4, 'Titanic', 'Drama Romantico', '1997-07-07', 'PG', 3),
(5, 'Interestellar', 'Ciencia ficción', '2014-10-18', 'PG-13', 5),
(6, 'Depredador', 'ciencia ficción', '1987-12-24', 'PG-16', NULL),
(7, 'Avatar', 'ciencia ficción', '2009-10-18', 'PG', 3),
(8, 'El resplandor', 'terror', '1980-10-09', 'PG-13', NULL),
(9, 'Alien: El octavo pasajero', 'ciencia ficcion', '1980-01-24', 'PG-18', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `per_id` int(10) UNSIGNED NOT NULL,
  `per_nombres` varchar(50) NOT NULL,
  `per_apellidos` varchar(100) NOT NULL,
  `per_direccion` varchar(255) NOT NULL,
  `per_fecha_nac` date DEFAULT NULL,
  `per_dni` char(8) NOT NULL,
  `per_genero` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`per_id`, `per_nombres`, `per_apellidos`, `per_direccion`, `per_fecha_nac`, `per_dni`, `per_genero`) VALUES
(1, 'Ricardo', 'Jimenez', 'Las 7 apuñaladas N° 666', '1970-10-10', '12345678', 'M'),
(2, 'Sofia', 'Rodriguez', 'Av. Los Proceres 456', '2000-12-24', '12345679', 'F'),
(3, 'José', 'Tapia', 'Av. Los Proceres 455', '2000-10-25', '12345676', 'M'),
(4, 'Malena', 'Ruiz', 'Jr. Los Tulipanes 1086', '1997-01-01', '12345675', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

DROP TABLE IF EXISTS `personajes`;
CREATE TABLE `personajes` (
  `per_act_id` int(11) NOT NULL,
  `per_peli_id` int(11) NOT NULL,
  `per_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`per_act_id`, `per_peli_id`, `per_nombre`) VALUES
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
(11, 7, 'Jake Zully'),
(12, 7, 'Neytiri');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`act_id`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`dire_id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`peli_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`per_id`),
  ADD UNIQUE KEY `per_dni` (`per_dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `act_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `dire_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `peli_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `per_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
