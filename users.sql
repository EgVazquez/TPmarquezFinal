-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2022 a las 07:29:26
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SURNAME` varchar(200) NOT NULL,
  `USER` varchar(45) NOT NULL,
  `PASSWORD` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `NAME`, `SURNAME`, `USER`, `PASSWORD`) VALUES
(1, 'Manuel', 'Navarro', 'Manu123', '$2y$10$T7Zd1T2LF6e46EIUVN4t/.CT/vYi9cfyhVqqQuPpbc3FPptDTq016'),
(2, 'Matias', 'Rodes', 'Mati456', '$2y$10$AOcdqw1unLnM.izwSCZyUuHlO6iSThqGqQ3NSo0XHOGZTP89Wqg3i'),
(3, 'Esteban', 'Vazquez', 'Kyto789', '$2y$10$dJp6LsIqC1FKPDLp.iqg9OYlliCAFOjKoM7.l041y8LHn22iFbY7y'),
(4, 'Fulano', 'De Tal', 'ejemplo', '$2y$10$cuQiUk3Zc1SguVzeDRlPBOHTOrrCtW3im2ZWYxE2h3kwsnG/Qd2em'),
(5, 'Nehuen', 'Giacone', 'nee', '$2y$10$6NtwSvqXCOntYIIdUUdVVeuvFx5nNIV8HW0PyXKqbO56OlpAoph/W'),
(6, 'Ana', 'Thompson', 'Ana', '$2y$10$6zB2lr8./OCGYaYRNEUK5OizZxyZrRyrilTCoJ/jQo4vypBG2awIi'),
(7, 'Esteban gabriel', 'Vazquez', 'kyto', '$2y$10$DiKa0Bt6ZVSLAt17BdE9q.UIw8fEHl8fMfAcoGOR.QMZjzUkRNske');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
