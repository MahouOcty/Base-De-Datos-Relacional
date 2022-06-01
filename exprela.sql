-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-06-2022 a las 23:10:01
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `exprela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experimentador`
--

DROP TABLE IF EXISTS `experimentador`;
CREATE TABLE IF NOT EXISTS `experimentador` (
  `IdExperimentador` int(30) NOT NULL AUTO_INCREMENT,
  `NExperimentador` varchar(50) NOT NULL,
  `IdGenero` int(2) NOT NULL,
  PRIMARY KEY (`IdExperimentador`),
  KEY `FK_ExperimentadorGenero` (`IdGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `experimentador`
--

INSERT INTO `experimentador` (`IdExperimentador`, `NExperimentador`, `IdGenero`) VALUES
(4, 'Diego Urbano', 1),
(5, 'Laura Valentina Londoño', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experimento`
--

DROP TABLE IF EXISTS `experimento`;
CREATE TABLE IF NOT EXISTS `experimento` (
  `IdExperimento` int(30) NOT NULL AUTO_INCREMENT,
  `IdExperimentador` int(30) NOT NULL,
  `IdResultado` int(11) NOT NULL,
  `idLugar` int(30) NOT NULL,
  `IdGenero` int(2) NOT NULL,
  `Fecha` date NOT NULL,
  `Video` longblob NOT NULL,
  `ObsAudio` longblob NOT NULL,
  PRIMARY KEY (`IdExperimento`),
  KEY `FK_LUGAR` (`idLugar`),
  KEY `FK_EXPERIMENTADOR` (`IdExperimentador`) USING BTREE,
  KEY `IdGenero` (`IdGenero`),
  KEY `IdResultado` (`IdResultado`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `IdGenero` int(2) NOT NULL AUTO_INCREMENT,
  `Genero` varchar(10) NOT NULL,
  PRIMARY KEY (`IdGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`IdGenero`, `Genero`) VALUES
(1, 'Hombre'),
(2, 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

DROP TABLE IF EXISTS `lugar`;
CREATE TABLE IF NOT EXISTS `lugar` (
  `idLugar` int(30) NOT NULL AUTO_INCREMENT,
  `NombreLugar` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`idLugar`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`idLugar`, `NombreLugar`, `Direccion`) VALUES
(1, 'Barrio Melendez', 'Cra. 92, Cali, Valle del Cauca'),
(2, 'Universidad San Buenaventura', 'Cra. 122 #6-65, Cali, Valle del Cauca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

DROP TABLE IF EXISTS `resultado`;
CREATE TABLE IF NOT EXISTS `resultado` (
  `IdResultado` int(11) NOT NULL AUTO_INCREMENT,
  `Resultado` varchar(30) NOT NULL,
  PRIMARY KEY (`IdResultado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`IdResultado`, `Resultado`) VALUES
(1, 'Ayudo'),
(2, 'No ayudo');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `experimentador`
--
ALTER TABLE `experimentador`
  ADD CONSTRAINT `FK_ExperimentadorGenero` FOREIGN KEY (`IdGenero`) REFERENCES `genero` (`IdGenero`);

--
-- Filtros para la tabla `experimento`
--
ALTER TABLE `experimento`
  ADD CONSTRAINT `experimento_ibfk_1` FOREIGN KEY (`IdExperimentador`) REFERENCES `experimentador` (`IdExperimentador`),
  ADD CONSTRAINT `experimento_ibfk_2` FOREIGN KEY (`idLugar`) REFERENCES `lugar` (`idLugar`),
  ADD CONSTRAINT `experimento_ibfk_3` FOREIGN KEY (`IdGenero`) REFERENCES `genero` (`IdGenero`),
  ADD CONSTRAINT `experimento_ibfk_4` FOREIGN KEY (`IdResultado`) REFERENCES `resultado` (`IdResultado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
