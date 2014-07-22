-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2014 a las 16:38:57
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aerolineas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE IF NOT EXISTS `avion` (
  `matricula` varchar(45) NOT NULL,
  `nro_tipo` int(11) NOT NULL,
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `nro tipo` (`nro_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `avion`
--

INSERT INTO `avion` (`matricula`, `nro_tipo`) VALUES
('AB1234', 1),
('BC1234', 2),
('FG12345', 3),
('HI34567', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boarding_pass`
--

CREATE TABLE IF NOT EXISTS `boarding_pass` (
  `dni` int(8) NOT NULL,
  `nro_vuelo` int(11) NOT NULL,
  `codigo_reserva` int(11) NOT NULL,
  KEY `dni_idx` (`dni`),
  KEY `nro vuelo_idx` (`nro_vuelo`),
  KEY `codigo reserva_idx` (`codigo_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boarding_pass`
--

INSERT INTO `boarding_pass` (`dni`, `nro_vuelo`, `codigo_reserva`) VALUES
(55566644, 1234, 136),
(23212324, 9876, 288),
(33553355, 1234, 407),
(93641758, 1234, 488),
(93641757, 1234, 448),
(56568946, 4567, 402),
(99999998, 1234, 516),
(15008009, 4567, 301),
(15008001, 9876, 883),
(12800001, 1234, 36),
(12800001, 5555, 802),
(33222222, 8967, 184),
(99999997, 8888, 721),
(76767676, 8888, 699),
(23456765, 1234, 256),
(55887744, 2222, 103),
(55887744, 8888, 904);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_semana`
--

CREATE TABLE IF NOT EXISTS `dias_semana` (
  `codigo_dia` int(11) NOT NULL AUTO_INCREMENT,
  `dia_semana` varchar(11) NOT NULL,
  PRIMARY KEY (`codigo_dia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `dias_semana`
--

INSERT INTO `dias_semana` (`codigo_dia`, `dia_semana`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sabado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE IF NOT EXISTS `pasajero` (
  `dni` int(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pasajero`
--

INSERT INTO `pasajero` (`dni`, `nombre`, `apellido`, `fecha_nacimiento`, `email`, `telefono`) VALUES
(0, '', '', '0000-00-00', '', 0),
(12800001, 'Marcos', 'Scalzotto', '1911-11-11', 'ansyhausmab@yahoo.com.ar', 1234567322),
(15008001, 'yayo', 'pelado', '1990-02-10', 'fary@yahoo.com.ar', 1234567844),
(15008009, 'Lucisa', 'Perez', '1991-01-23', 'lucisa@yahoo.com.ar', 1234567322),
(23212324, 'Erza', 'Scarlet', '1991-11-15', 'fairy@yahoo.com.ar', 1556568946),
(23232311, 'Astrada', 'barbieri', '2014-07-10', 'andres_sav@hotmail.com', 0),
(23232332, 'Astrada', 'Acosta', '2014-07-08', 'indestructibles@yahoo.com.ar', 0),
(23456765, 'Alex', 'Rusti', '1970-09-15', 'ale@pepe.com', 2147483647),
(33222222, 'Fernando', 'Niagara', '1999-12-10', 'vicentebarbieri@yahoo.com.ar', 1556568943),
(33553355, 'Natsu', 'Dragneel', '1966-04-15', 'fairy@hotmail.com', 1533211567),
(55566644, 'Luffy', 'barbosa', '1907-12-15', 'asdsad@hotmail.com', 2147483647),
(55887744, 'Diego', 'Acosta', '1999-11-11', 'andres_sav@hotmail.com', 1234567802),
(56568946, 'Rambas', 'Silvio', '1989-03-01', 'asdsada@hotmail.com', 1556568894),
(76767676, 'sdsdafsdaf', 'sdfsfsf', '1990-02-10', 'andres_sav@hotmail.com', 1234567844),
(93641757, 'Luffy', 'Carlitos', '2000-11-15', 'astrrad@yahoo.com.ar', 1556568954),
(93641758, 'leonel', 'messi', '1997-07-15', 'leo@yahoo.com.ar', 1556568947),
(93641759, 'Diego', 'Acosta', '2014-07-08', 'vicentebarbieri@yahoo.com.ar', 0),
(99999997, 'Arnold', 'Swacheneger', '1991-11-10', 'fary@yahoo.com.ar', 1234567322),
(99999998, 'Ricardo', 'Moreno', '1993-02-10', 'rambo@hotmail.com', 1545458945);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`codigo`, `nombre`) VALUES
(1, 'Cordoba'),
(2, 'Buenos Aires'),
(3, 'Misiones'),
(4, 'Entre Ríos'),
(5, 'Corrientes'),
(6, 'Santa Fe'),
(7, 'Chaco'),
(8, 'Formosa'),
(9, 'Santiago del Estero'),
(10, 'La Pampa'),
(11, 'Río Negro'),
(12, 'Chubut'),
(13, 'Santa Cruz'),
(14, 'Tierra Del Fuego'),
(15, 'Neuquén'),
(16, 'Mendoza'),
(17, 'San Juan'),
(18, 'San Luis'),
(19, 'La Rioja'),
(20, 'Catamarca'),
(21, 'Tucumán'),
(22, 'Salta'),
(23, 'Jujuy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `codigo_reserva` int(11) NOT NULL,
  `clase` varchar(45) NOT NULL,
  `asiento` varchar(45) DEFAULT NULL,
  `fila` varchar(10) DEFAULT NULL,
  `estado_pasaje` varchar(45) NOT NULL,
  `tipo_viaje` int(11) NOT NULL,
  `nro_vuelo` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  PRIMARY KEY (`codigo_reserva`),
  KEY `nro_vuelo` (`nro_vuelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`codigo_reserva`, `clase`, `asiento`, `fila`, `estado_pasaje`, `tipo_viaje`, `nro_vuelo`, `fecha_reserva`) VALUES
(10, 'Economica', 'A', '2', 'Pago', 1, 1234, '2014-07-08'),
(11, 'Economica', 'C', '4', 'Reserva', 1, 1234, '2014-07-08'),
(12, 'Economica', 'B', '9', 'Pago', 2, 4567, '2014-07-10'),
(13, 'Economica', '', '', 'Pago', 2, 5555, '2014-07-13'),
(15, 'Economica', NULL, NULL, 'Pago', 2, 4567, '2014-07-09'),
(36, 'Economica', 'B', '6', 'Pago', 1, 1234, '2014-07-23'),
(103, 'Economica', '', '', 'Reserva', 4, 2222, '2014-08-26'),
(136, 'Economica', 'B', '2', 'Pago', 1, 1234, '2014-07-14'),
(184, 'Primera', '', '', 'Pago', 2, 8967, '2014-07-22'),
(256, 'Economica', 'B', '5', 'Pago', 1, 1234, '2014-07-29'),
(288, 'Primera', 'A', '5', 'Pago', 4, 9876, '2014-07-15'),
(301, 'Economica', 'B', '10', 'Pago', 2, 4567, '2014-07-24'),
(402, 'Primera', 'B', '4', 'Pago', 2, 4567, '2014-07-17'),
(407, 'Economica', 'C', '6', 'Pago', 1, 1234, '2014-07-22'),
(448, 'Economica', 'B', '4', 'Pago', 1, 1234, '2014-07-16'),
(488, 'Economica', '', '', 'Pago', 1, 1234, '2014-07-14'),
(516, 'Economica', 'A', '4', 'Pago', 1, 1234, '2014-07-22'),
(699, 'Economica', '', '', 'Pago', 3, 8888, '2014-07-25'),
(721, 'Primera', '', '', 'Pago', 3, 8888, '2014-07-25'),
(802, 'Economica', '', '', 'Pago', 2, 5555, '2014-07-27'),
(883, 'Economica', 'C', '12', 'Pago', 4, 9876, '2014-07-22'),
(904, 'Economica', '', '', 'Reserva', 3, 8888, '2014-08-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoavion`
--

CREATE TABLE IF NOT EXISTS `tipoavion` (
  `nro_tipo` int(2) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `cantidad_economica` int(11) NOT NULL,
  `cantidad_primera` int(11) NOT NULL,
  `marca` varchar(11) NOT NULL,
  `modelo` varchar(11) NOT NULL,
  PRIMARY KEY (`nro_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoavion`
--

INSERT INTO `tipoavion` (`nro_tipo`, `capacidad`, `cantidad_economica`, `cantidad_primera`, `marca`, `modelo`) VALUES
(1, 30, 30, 0, 'Embraer', 'EMB-120'),
(2, 80, 70, 10, 'Embraer', 'ER-145'),
(3, 125, 105, 20, 'Embraer', 'ER-145'),
(4, 150, 120, 30, 'Embraer', 'ER-170');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE IF NOT EXISTS `vuelo` (
  `nro_vuelo` int(11) NOT NULL,
  `lugar_partida` varchar(45) NOT NULL,
  `lugar_llegada` varchar(45) NOT NULL,
  `matricula_avion` varchar(45) NOT NULL,
  `horario_partida` time NOT NULL,
  `horario_llegada` time NOT NULL,
  `precio_primera` float NOT NULL,
  `precio_economica` float NOT NULL,
  PRIMARY KEY (`nro_vuelo`),
  UNIQUE KEY `nro vuelo` (`nro_vuelo`),
  KEY `matricula avion_idx` (`matricula_avion`),
  KEY `nro vuelo_2` (`nro_vuelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`nro_vuelo`, `lugar_partida`, `lugar_llegada`, `matricula_avion`, `horario_partida`, `horario_llegada`, `precio_primera`, `precio_economica`) VALUES
(1234, 'Buenos Aires', 'Cordoba', 'AB1234', '08:00:00', '10:00:00', 0, 3000),
(2222, 'Salta', 'Buenos Aires', 'HI34567', '23:00:00', '06:00:00', 7500, 5000),
(4567, 'Buenos Aires', 'Cordoba', 'BC1234', '11:00:00', '13:00:00', 5000, 3000),
(5555, 'Cordoba', 'Buenos Aires', 'BC1234', '04:00:00', '06:00:00', 5000, 3000),
(6789, 'Buenos Aires', 'Cordoba', 'FG12345', '07:00:00', '09:00:00', 5000, 3000),
(8888, 'Buenos Aires', 'Salta', 'FG12345', '11:00:00', '19:00:00', 7500, 5000),
(8967, 'Buenos Aires', 'Cordoba', 'BC1234', '21:00:00', '23:00:00', 5000, 3000),
(9876, 'Buenos Aires', 'Cordoba', 'HI34567', '13:00:00', '15:00:00', 5000, 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos_dias`
--

CREATE TABLE IF NOT EXISTS `vuelos_dias` (
  `nro_vuelo` int(11) NOT NULL,
  `dias_semana` int(11) NOT NULL,
  KEY `nro_vuelo` (`nro_vuelo`),
  KEY `dias_semana` (`dias_semana`),
  KEY `dias_semana_2` (`dias_semana`),
  KEY `dias_semana_3` (`dias_semana`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vuelos_dias`
--

INSERT INTO `vuelos_dias` (`nro_vuelo`, `dias_semana`) VALUES
(1234, 1),
(1234, 2),
(1234, 3),
(4567, 4),
(9876, 2),
(8967, 2),
(5555, 7),
(2222, 2),
(8888, 5);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avion`
--
ALTER TABLE `avion`
  ADD CONSTRAINT `avion_ibfk_1` FOREIGN KEY (`nro_tipo`) REFERENCES `tipoavion` (`nro_tipo`);

--
-- Filtros para la tabla `boarding_pass`
--
ALTER TABLE `boarding_pass`
  ADD CONSTRAINT `boarding_pass_ibfk_1` FOREIGN KEY (`codigo_reserva`) REFERENCES `reserva` (`codigo_reserva`),
  ADD CONSTRAINT `dni` FOREIGN KEY (`dni`) REFERENCES `pasajero` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nro vuelo` FOREIGN KEY (`nro_vuelo`) REFERENCES `vuelo` (`nro_vuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`nro_vuelo`) REFERENCES `vuelo` (`nro_vuelo`);

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `matricula avion` FOREIGN KEY (`matricula_avion`) REFERENCES `avion` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vuelos_dias`
--
ALTER TABLE `vuelos_dias`
  ADD CONSTRAINT `vuelos_dias_ibfk_1` FOREIGN KEY (`nro_vuelo`) REFERENCES `vuelo` (`nro_vuelo`),
  ADD CONSTRAINT `vuelos_dias_ibfk_3` FOREIGN KEY (`dias_semana`) REFERENCES `dias_semana` (`codigo_dia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
