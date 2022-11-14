-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 19:56:36
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_usuario` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido_paterno` varchar(40) NOT NULL,
  `apellido_materno` varchar(40) NOT NULL,
  `sexo` int(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `imc` float NOT NULL,
  `domicilio` int(40) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `tipo_suscripcion` varchar(20) NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(5) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido_paterno` varchar(40) NOT NULL,
  `apellido_materno` varchar(40) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `domicilio` varchar(40) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id_ingreso` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(6) NOT NULL,
  `fecha_venta` date NOT NULL,
  `ingreso_venta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id_ingreso`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
