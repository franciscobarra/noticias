-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2014 a las 01:21:53
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `elcaudal`
--

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `contacto` int(12) NOT NULL
  `cuerpo` text COLLATE utf8_bin,
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `codigo` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `codigo`) VALUES
(1, 'chile', '1234');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `codigo` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `codigo`) VALUES
(1, 'admin', '1234');

-- -------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `apellido_pat` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `apellido_mat` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `rut` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `id_roles` int(10) DEFAULT NULL,
  `id_pais` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_roles`),
  KEY `id_pais` (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido_pat`, `apellido_mat`, `fecha_nacimiento`, `rut`, `username`, `password`, `fecha_ingreso`, `id_roles`, `id_pais`) VALUES
(1, 'francisco', 'barra', 'sepulveda', '2014-10-15', '180701370', 'admin', '1234567', '2014-10-15 00:00:00', 1, 1);



-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
