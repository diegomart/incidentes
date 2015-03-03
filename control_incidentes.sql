-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2015 a las 23:24:28
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `control_incidentes`
--
CREATE DATABASE IF NOT EXISTS `control_incidentes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `control_incidentes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidentes`
--

CREATE TABLE IF NOT EXISTS `incidentes` (
  `idIncidente` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `TipoIncidente` varchar(45) NOT NULL,
  `Estatus` varchar(45) NOT NULL,
  `Ubicacion` varchar(45) NOT NULL,
  PRIMARY KEY (`idIncidente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jerarquias`
--

CREATE TABLE IF NOT EXISTS `jerarquias` (
  `idJerarquia` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idJerarquia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personalmantenimiento`
--

CREATE TABLE IF NOT EXISTS `personalmantenimiento` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Cargo` varchar(45) NOT NULL,
  `idJerarquia` int(11) NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `fk_PersonalMantenimiento_Jerarquias1_idx` (`idJerarquia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroincidentes`
--

CREATE TABLE IF NOT EXISTS `registroincidentes` (
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Incidentes_idIncidente` int(11) NOT NULL,
  PRIMARY KEY (`Usuarios_idUsuarios`,`Incidentes_idIncidente`),
  KEY `fk_Usuarios_has_Incidentes_Incidentes1_idx` (`Incidentes_idIncidente`),
  KEY `fk_Usuarios_has_Incidentes_Usuarios1_idx` (`Usuarios_idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registromantenimiento`
--

CREATE TABLE IF NOT EXISTS `registromantenimiento` (
  `PersonalMantenimiento_Codigo` int(11) NOT NULL,
  `Ticket_idTicket` int(11) NOT NULL,
  PRIMARY KEY (`PersonalMantenimiento_Codigo`,`Ticket_idTicket`),
  KEY `fk_PersonalMantenimiento_has_Ticket_Ticket1_idx` (`Ticket_idTicket`),
  KEY `fk_PersonalMantenimiento_has_Ticket_PersonalMantenimiento1_idx` (`PersonalMantenimiento_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `Asignado` varchar(45) NOT NULL,
  `Estatus` varchar(45) NOT NULL,
  `Inicio` date NOT NULL,
  `Fin` date NOT NULL,
  `Importancia` varchar(45) NOT NULL,
  `idIncidente` int(11) NOT NULL,
  PRIMARY KEY (`idTicket`),
  KEY `fk_Ticket_Incidentes1_idx` (`idIncidente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Carrera` varchar(45) NOT NULL,
  `Campus` varchar(45) NOT NULL,
  `Jerarquia` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personalmantenimiento`
--
ALTER TABLE `personalmantenimiento`
  ADD CONSTRAINT `fk_PersonalMantenimiento_Jerarquias1` FOREIGN KEY (`idJerarquia`) REFERENCES `jerarquias` (`idJerarquia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registroincidentes`
--
ALTER TABLE `registroincidentes`
  ADD CONSTRAINT `fk_Usuarios_has_Incidentes_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_has_Incidentes_Incidentes1` FOREIGN KEY (`Incidentes_idIncidente`) REFERENCES `incidentes` (`idIncidente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registromantenimiento`
--
ALTER TABLE `registromantenimiento`
  ADD CONSTRAINT `fk_PersonalMantenimiento_has_Ticket_PersonalMantenimiento1` FOREIGN KEY (`PersonalMantenimiento_Codigo`) REFERENCES `personalmantenimiento` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PersonalMantenimiento_has_Ticket_Ticket1` FOREIGN KEY (`Ticket_idTicket`) REFERENCES `ticket` (`idTicket`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_Ticket_Incidentes1` FOREIGN KEY (`idIncidente`) REFERENCES `incidentes` (`idIncidente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
