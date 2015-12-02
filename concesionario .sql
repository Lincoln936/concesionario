-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-12-2015 a las 09:33:04
-- Versión del servidor: 5.6.27
-- Versión de PHP: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concesionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `ID` int(12) NOT NULL,
  `Nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Dirección` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Dni` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`ID`, `Nombre`, `Correo`, `Dirección`, `Dni`) VALUES
(1, 'Francisco', 'francisco@gmail.com', 'Lirios 3 Granada 2000', 1234567),
(2, 'Lucas', 'lucas@gmail.com', 'Primavera 8 Granada 2000', 7654321),
(3, 'Luis Gómez', 'luisgomez@gmail.com', 'Fontiveros 3 2000 Granada', 875124),
(4, 'Concesionario', 'concesionario@gmail.com', 'Poligono Industrial Armilla', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turismos`
--

CREATE TABLE `turismos` (
  `ID` int(12) NOT NULL,
  `Tipo` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `Modelo` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `Motor` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `Nuevo` tinyint(1) NOT NULL,
  `Usado` tinyint(1) NOT NULL,
  `Kilometros` int(120) NOT NULL,
  `Precio` float NOT NULL,
  `Url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Dni` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `turismos`
--

INSERT INTO `turismos` (`ID`, `Tipo`, `Modelo`, `Motor`, `Nuevo`, `Usado`, `Kilometros`, `Precio`, `Url`, `Dni`) VALUES
(1, 'Turismo', 'Audi A3', 'Gasoil', 1, 0, 0, 23000, '13.jpg', '1234567'),
(2, 'Motocicleta', 'Kawasaki Ninja', 'Gasoil', 1, 0, 0, 6000, '5.jpg', '7654321'),
(3, 'Turismo', 'Mercedes', 'Diesel', 0, 1, 25000, 15000, '15.jpg', '875124'),
(13, 'Motocicleta', 'Honda', 'Diesel', 0, 1, 20000, 11000, '1.jpg', '000000'),
(14, 'Motocicleta', 'Yamaha', 'Gasoil', 1, 0, 0, 10000, '2.jpg', '000000'),
(15, 'Motocicleta', 'Suzuki', 'Gasoil', 0, 1, 10000, 8000, '3.jpg', '000000'),
(16, 'Motocicleta', 'Kawasaki', 'Diesel', 0, 1, 12000, 17000, '4.jpg', '000000'),
(17, 'Motocicleta', 'Honda', 'Diesel', 1, 0, 0, 13000, '5.jpg', '000000'),
(18, 'Turismo', 'Audi', 'Diesel', 0, 1, 25000, 15000, '10.jpg', '000000'),
(19, 'Turismo', 'Renault', 'Diesel', 0, 1, 125000, 12000, '11.jpg', '000000'),
(20, 'Turismo', 'Subaru', 'Gasoil', 1, 0, 0, 11000, '12.jpg', '000000'),
(21, 'Turismo', 'Bmw', 'Gasoil', 1, 0, 0, 17000, '13.jpg', '000000'),
(22, 'Turismo', 'Volkswagen', 'Gasoil', 1, 0, 0, 25000, '14.jpg', '000000'),
(23, 'Turismo', 'Kya', 'Diesel', 0, 1, 10000, 35000, '15.jpg', '000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(12) NOT NULL,
  `Usuario` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Usuario`, `Nombre`, `Password`, `Email`) VALUES
(1, 'Juan', 'Juan Perez', 'abc', 'juanico@gmail.com'),
(2, 'Pepe', 'Pepe Garcia', 'abcd', 'pepe@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `turismos`
--
ALTER TABLE `turismos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `turismos`
--
ALTER TABLE `turismos`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
