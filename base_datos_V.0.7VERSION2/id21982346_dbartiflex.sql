-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-03-2024 a las 13:28:32
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21982346_dbartiflex`
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
(22, 'pedro jorge', 'lopez', 'Esguince de ligamentos', '2024-03-31 13:16:12'),
(23, 'jorge luis', 'Martínez suarez', 'menisco', '2024-03-31 13:23:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `edad` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `pregunta` varchar(255) DEFAULT NULL,
  `tratamiento` varchar(255) DEFAULT NULL,
  `observacion` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `min_rodilla` int(11) DEFAULT 0,
  `max_rodilla` int(11) DEFAULT 0,
  `repeticiones_rodilla` int(11) DEFAULT 0,
  `min_tobillo` int(11) DEFAULT 0,
  `max_tobillo` int(11) DEFAULT 0,
  `repeticion_tobillo` int(11) DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `persona_id`, `ocupacion`, `edad`, `genero`, `pregunta`, `tratamiento`, `observacion`, `telefono`, `min_rodilla`, `max_rodilla`, `repeticiones_rodilla`, `min_tobillo`, `max_tobillo`, `repeticion_tobillo`, `fecha`) VALUES
(27, 22, 'DJ', '20', 'hombre', 'NO', 'n/a', 'primera vez en rehabilitación ', '809-666-7774', 0, 0, 0, 0, 0, 0, '2024-03-31 13:16:12'),
(28, 22, NULL, NULL, NULL, NULL, NULL, 'primera cita del paciente', NULL, 10, 34, 6, 9, 20, 5, '2024-03-31 13:16:50'),
(29, 22, NULL, NULL, NULL, NULL, NULL, 'segunda cita del paciente noto un gran progreso en su pierna', NULL, 0, 90, 6, 0, 45, 9, '2024-03-31 13:19:27'),
(30, 22, NULL, NULL, NULL, NULL, NULL, 'tercera cita del paciente y ultima', NULL, 0, 90, 30, 0, 45, 20, '2024-03-31 13:20:03'),
(31, 23, 'software developer', '23', 'hombre', 'no', 'n/a', 'primera vez en artiflex', '+1849-506-9874', 0, 0, 0, 0, 0, 0, '2024-03-31 13:23:01'),
(32, 23, NULL, NULL, NULL, NULL, NULL, 'primer trtamiento de jorge , puedo observar que jorge no puede mover mas del 20% de su rodilla y el tobillo.', NULL, 0, 20, 5, 0, 10, 6, '2024-03-31 13:26:57');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
