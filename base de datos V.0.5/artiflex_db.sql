-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2024 a las 19:59:18
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
-- Base de datos: `artiflex_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `pacientes` varchar(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `edad` varchar(255) NOT NULL,
  `tratamiento` varchar(255) NOT NULL,
  `min_rodilla` varchar(255) NOT NULL,
  `max_rodilla` varchar(255) NOT NULL,
  `repeticion_rodilla` varchar(255) NOT NULL,
  `min_tobillo` varchar(255) NOT NULL,
  `max_tobillo` varchar(255) NOT NULL,
  `repeticion_tobillo` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `pacientes`, `nombre`, `apellido`, `edad`, `tratamiento`, `min_rodilla`, `max_rodilla`, `repeticion_rodilla`, `min_tobillo`, `max_tobillo`, `repeticion_tobillo`, `fecha`) VALUES
(2, '0', 'mario', 'martione', '33', 'menisco', '9', '9', '6', '80', '6', '10', '2024-03-15 15:59:04'),
(3, '0', 'jorge luis', 'Martínez suarez', '23', 'ok', '0', '20', '10', '0', '90', '10', '2024-03-15 16:16:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `Nombre`, `apellido`, `especialidad`, `fecha`) VALUES
(9, 'admin', 'admin', 'n/a', '13/3/2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `cita` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `ocupacion` varchar(255) NOT NULL,
  `lesion` varchar(255) NOT NULL,
  `antecedentes` varchar(255) NOT NULL,
  `entorno` varchar(255) NOT NULL,
  `tratamiento` varchar(255) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `edad` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `min_rodilla` varchar(255) NOT NULL,
  `max_rodilla` varchar(255) NOT NULL,
  `repeticion_rodilla` varchar(255) NOT NULL,
  `min_tobillo` varchar(255) NOT NULL,
  `max_tobillo` varchar(255) NOT NULL,
  `repeticion_tobillo` varchar(255) NOT NULL,
  `fecha_cita` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `cita`, `nombre`, `apellido`, `ocupacion`, `lesion`, `antecedentes`, `entorno`, `tratamiento`, `pregunta`, `edad`, `genero`, `observacion`, `min_rodilla`, `max_rodilla`, `repeticion_rodilla`, `min_tobillo`, `max_tobillo`, `repeticion_tobillo`, `fecha_cita`, `fecha`) VALUES
(23, '2', 'Jorge Luis', 'Martínez suarez', 'software developer', 'menisco', '', 'N/A', 'movimiento controlados', 'no', '23', 'hombre', 'el paciente debe tomar clindamicina para sus tendones y debe al menos llevar 3sesiones de terapia', '5', '45', '7', '0', '44', '8', '2024-03-15 19:22:07', '2024-03-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `contrasena`) VALUES
(1, 'admin', 'admin'),
(2, 'jorge', 'jorge'),
(3, 'administrador', '123456789');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
