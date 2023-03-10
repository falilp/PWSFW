-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2023 a las 11:40:43
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kmb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `codPista` int(11) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  `fecha_alquiler` datetime NOT NULL,
  `fecha_reserva` date NOT NULL,
  `precio` int(11) NOT NULL,
  `Descuento` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`codPista`, `codUsuario`, `fecha_alquiler`, `fecha_reserva`, `precio`, `Descuento`) VALUES
(1, 1, '2023-03-22 11:40:13', '2023-03-15', 29, 30),
(1, 1, '2023-04-06 11:40:13', '2023-03-12', 27, 23),
(2, 9, '2023-03-22 11:40:13', '2023-03-14', 13, 66),
(3, 1, '2023-04-05 11:40:13', '2023-03-12', 12, 34),
(4, 1, '2023-03-16 11:40:13', '2023-03-15', 11, 5),
(4, 1, '2023-03-24 11:40:13', '2023-03-10', 29, 55),
(4, 3, '2023-03-14 11:40:13', '2023-03-10', 26, 69),
(5, 5, '2023-03-19 11:40:13', '2023-03-11', 18, 30),
(5, 6, '2023-03-17 11:40:13', '2023-03-14', 19, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `codEvento` int(11) NOT NULL,
  `FechaEvento` datetime NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `codPista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`codEvento`, `FechaEvento`, `Descripcion`, `codPista`) VALUES
(1, '2023-04-02 11:31:19', 'Partido de fútbol', 1),
(2, '2023-04-08 11:31:19', 'Torneo de tenis', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pista`
--

CREATE TABLE `pista` (
  `codPista` int(11) NOT NULL COMMENT 'ID pista',
  `tipoPista` varchar(3) NOT NULL COMMENT 'Tipo de Pista',
  `precioHora` int(11) NOT NULL COMMENT 'precio por hora de alquiler',
  `disponible` tinyint(1) NOT NULL COMMENT 'muestra si esta disponible',
  `mensaje` varchar(100) NOT NULL COMMENT 'Informacion sobre pista',
  `valoracion` float NOT NULL COMMENT 'Valoracion de la pista'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Almacena las pistas del complejo deportivo';

--
-- Volcado de datos para la tabla `pista`
--

INSERT INTO `pista` (`codPista`, `tipoPista`, `precioHora`, `disponible`, `mensaje`, `valoracion`) VALUES
(1, '1', 9, 0, 'Pista de fútbol', 4),
(2, '2', 11, 0, 'Pista de tenis', 1),
(3, '4', 5, 0, 'Pista de baloncesto', 5),
(4, '5', 18, 0, 'Pista de voleibol', 3),
(5, '3', 9, 0, 'Pista de pádel', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codUsuario` int(11) NOT NULL COMMENT 'Id usuario',
  `nombre` varchar(15) NOT NULL COMMENT 'Nombre del Usuario',
  `apellidos` varchar(20) DEFAULT NULL COMMENT 'Apellidos del Usuario',
  `email` varchar(50) NOT NULL COMMENT 'Email del usuario',
  `pass` varchar(100) NOT NULL COMMENT 'Contraseña usuario',
  `telefono` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Tabla que almacena los datos de los usuarios registrados ';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codUsuario`, `nombre`, `apellidos`, `email`, `pass`, `telefono`) VALUES
(1, 'Juan', 'Pérez', 'juan.perez@example.com', '123456', 555),
(2, 'María', 'González', 'maria.gonzalez@example.com', '234567', 555),
(3, 'Carlos', 'Martínez', 'carlos.martinez@example.com', '345678', 555),
(4, 'Laura', 'Sánchez', 'laura.sanchez@example.com', '456789', 555),
(5, 'Pedro', 'Ramírez', 'pedro.ramirez@example.com', '567890', 555),
(6, 'Ana', 'Fernández', 'ana.fernandez@example.com', '678901', 555),
(7, 'Sofía', 'López', 'sofia.lopez@example.com', '789012', 555),
(8, 'Daniel', 'García', 'daniel.garcia@example.com', '890123', 555),
(9, 'Marta', 'Ortiz', 'marta.ortiz@example.com', '901234', 555),
(10, 'Alejandro', 'Díaz', 'alejandro.diaz@example.com', '012345', 555);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`codPista`,`codUsuario`,`fecha_alquiler`),
  ADD KEY `codUsuario` (`codUsuario`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`codEvento`,`codPista`),
  ADD KEY `codPista` (`codPista`);

--
-- Indices de la tabla `pista`
--
ALTER TABLE `pista`
  ADD PRIMARY KEY (`codPista`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsuario`),
  ADD UNIQUE KEY `indice_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `codEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pista`
--
ALTER TABLE `pista`
  MODIFY `codPista` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID pista', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id usuario', AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`codUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alquiler_ibfk_2` FOREIGN KEY (`codPista`) REFERENCES `pista` (`codPista`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`codPista`) REFERENCES `pista` (`codPista`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
