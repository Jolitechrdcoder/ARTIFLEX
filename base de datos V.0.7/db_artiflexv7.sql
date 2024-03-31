-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2024 a las 07:50:42
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebita2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `fechas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `nombre`, `apellido`, `fechas`) VALUES
(1, 'admin', 'admin', '31/02/2024'),
(2, 'jorge', 'martinez', '1/4/2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) NOT NULL,
  `lesion` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `lesion`, `fecha_registro`) VALUES
(1, 'jorge', '', '', '2024-03-31 01:17:36'),
(2, 'mario', '', '', '2024-03-31 01:21:52'),
(8, 'hailie', 'nicole', 'menisco', '2024-03-31 04:37:59'),
(9, 'esther', 'suarez', 'menisco', '2024-03-31 04:51:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `ocupacion` varchar(255) NOT NULL,
  `edad` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `tratamiento` varchar(255) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `min_rodilla` varchar(255) NOT NULL,
  `max_rodilla` varchar(255) NOT NULL,
  `repeticiones_rodilla` varchar(255) NOT NULL,
  `min_tobillo` varchar(255) NOT NULL,
  `max_tobillo` varchar(255) NOT NULL,
  `repeticion_tobillo` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `persona_id`, `ocupacion`, `edad`, `genero`, `pregunta`, `tratamiento`, `observacion`, `telefono`, `min_rodilla`, `max_rodilla`, `repeticiones_rodilla`, `min_tobillo`, `max_tobillo`, `repeticion_tobillo`, `fecha`) VALUES
(9, 2, '', '', '', '', '', 'fff', '', '4', '22', '23', '23', '23', '23', '2024-03-31 04:25:45'),
(10, 1, '', '', '', '', '', '22', '', '33', '33', '12', '56', '789', '7', '2024-03-31 04:26:17'),
(11, 1, '', '', '', '', '', '898', '', 'ddddd', 'ddddd', 'ddddd', '22312', '1212', '121212', '2024-03-31 04:26:36'),
(12, 1, '', '', '', '', '', 'el paciente esta buenisimo', '', '22', '23', '11', '23', '23', '2', '2024-03-31 04:28:09'),
(13, 1, '', '', '', '', '', '34', '', '33', '33', '33', '33', '33', '33', '2024-03-31 04:28:55'),
(14, 2, '', '', '', '', '', '23', '', '22', '22', '22', '22', '22', '22', '2024-03-31 04:31:18'),
(15, 1, '', '', '', '', '', '', '', 'sd', 'sd', 'sd', 'sd', 'sd', 'sd', '2024-03-31 04:31:45'),
(16, 2, '', '', '', '', '', '33', '', '33', '33', '33', '33', '33', '33', '2024-03-31 04:32:40'),
(17, 2, '', '', '', '', '', '22', '', '22', '22', '22', '22', '22', '22', '2024-03-31 04:35:55'),
(18, 1, '', '', '', '', '', '2', '', '2', '2', '2', '2', '2', '2', '2024-03-31 04:36:41'),
(19, 8, 'mecatronica', '22', 'mujer', 'no', 'artiflex', 'requiere tratamiento inmediato', '8093316055', '', '', '', '', '', '', '2024-03-31 04:37:59'),
(20, 8, '', '', '', '', '', 'nueva cita hailie', '', '33', '45', '8', '90', '33', '12', '2024-03-31 04:38:39'),
(21, 9, 'contador', '33', 'mujer', 'no', 'artiflex', 'ok', '8093342323', '', '', '', '', '', '', '2024-03-31 04:51:49'),
(22, 9, '', '', '', '', '', 'tiene buena actitud', '', '10', '78', '3', '90', '5', '8', '2024-03-31 04:52:13'),
(23, 9, '', '', '', '', '', 'ok', '', '11', '11', '11', '11', '11', '121', '2024-03-31 04:54:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
