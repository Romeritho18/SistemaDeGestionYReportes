-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2022 a las 14:14:16
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sistema_gestion_y_reportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `descripcion`) VALUES
(11, 'adsadsad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `especialidad` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `especialidad`) VALUES
(1, 'Neurocirujano'),
(2, 'Anesteciologo'),
(3, 'Enfermero obstetrico'),
(4, 'Enfermero Pediatrico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Desocupado'),
(2, 'Ocupado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_enfermeros`
--

CREATE TABLE `medico_enfermeros` (
  `id_medico_enfermero` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_tipo_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico_enfermeros`
--

INSERT INTO `medico_enfermeros` (`id_medico_enfermero`, `id_persona`, `id_especialidad`, `id_estado`, `id_area`, `id_tipo_categoria`) VALUES
(1, 1, 2, 1, 0, 1),
(2, 2, 4, 1, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `personaId` int(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `fecha_nac` date NOT NULL,
  `telefono` int(15) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `domicilio` varchar(60) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `DNI` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`personaId`, `nombre`, `apellido`, `fecha_nac`, `telefono`, `correo_electronico`, `domicilio`, `sexo`, `DNI`) VALUES
(11, 'Ezequiel Carlos', 'Romero', '2003-11-27', 37043222, 'ezequielromero3039@gmail.com', 'mz 32 cs 12', 'Masculino', '4538113'),
(14, 'Oscar', 'Schneider', '1993-11-11', 6965455, 'oscar@gmail.com', 'mz 54 cs 23', 'Masculino', '4532162'),
(15, 'Esteban', 'Salinas', '2002-11-14', 0, 'esteban@gmail.com', 'mz23 cs45', 'Masculino', '45879815'),
(16, 'Melanie', 'Acuña', '2002-11-15', 321654, 'melanie@gmail.com', 'mz 25 cs98', 'Femenino', '659874');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `tipoUsuarioId` int(10) NOT NULL,
  `descripcionTipoUsuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`tipoUsuarioId`, `descripcionTipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Genérico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarioId` int(10) NOT NULL,
  `nombreUsuario` varchar(15) NOT NULL,
  `contraseña` varchar(10) NOT NULL,
  `idPersona` int(10) NOT NULL,
  `idTipoUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarioId`, `nombreUsuario`, `contraseña`, `idPersona`, `idTipoUsuario`) VALUES
(13, 'Ezequiel', '271103', 11, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `medico_enfermeros`
--
ALTER TABLE `medico_enfermeros`
  ADD PRIMARY KEY (`id_medico_enfermero`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`personaId`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`tipoUsuarioId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarioId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `medico_enfermeros`
--
ALTER TABLE `medico_enfermeros`
  MODIFY `id_medico_enfermero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `personaId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `tipoUsuarioId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarioId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
