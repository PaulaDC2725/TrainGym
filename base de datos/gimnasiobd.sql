-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2021 a las 16:13:50
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasiobd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `idAsistencia` int(12) NOT NULL,
  `fechaHoraIngreso` datetime NOT NULL,
  `fechaHoraSalida` datetime NOT NULL,
  `idProgramacionFK` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`idAsistencia`, `fechaHoraIngreso`, `fechaHoraSalida`, `idProgramacionFK`) VALUES
(1, '2021-06-28 08:00:00', '2021-06-28 09:10:00', 1),
(2, '2021-09-05 14:00:00', '2021-09-05 15:00:00', 2),
(3, '2021-09-30 12:30:00', '2021-09-30 13:50:00', 3),
(4, '2021-10-05 10:45:00', '2021-10-05 13:00:00', 4),
(5, '2021-09-29 11:45:50', '2021-09-29 13:10:00', 5),
(6, '2021-06-29 08:30:40', '2021-06-29 09:15:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(12) NOT NULL,
  `nombreCliente` varchar(35) NOT NULL,
  `apellidoCliente` varchar(35) NOT NULL,
  `fechaNacimientoCliente` date NOT NULL,
  `correoCliente` varchar(100) NOT NULL,
  `telefonoCliente` varchar(11) NOT NULL,
  `estadoCliente` int(11) NOT NULL,
  `idUsuarioFK` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombreCliente`, `apellidoCliente`, `fechaNacimientoCliente`, `correoCliente`, `telefonoCliente`, `estadoCliente`, `idUsuarioFK`) VALUES
(1, 'Maria', 'Castillo', '2002-05-12', 'mariacastillo@hotmail.com', '302455687', 1, 4),
(2, 'Paula Catalina', 'Delgado', '2002-10-27', 'kimikta45@gmail.com', '3123617109', 1, 5),
(3, 'Valentina', 'Prueba', '2000-02-25', 'prueba@hotmail.com', '300230005', 1, 6),
(4, 'Daniela', 'Mora', '2002-12-10', 'danielamora20022@gmail.com', '3053714069', 1, 7);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarasistenciacliente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarasistenciacliente` (
`numeroIdentificacion` varchar(12)
,`Nombre Completo` varchar(71)
,`fechaHoraIngreso` datetime
,`fechaHoraSalida` datetime
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultarmetodologia`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultarmetodologia` (
`NumeroIdentificacion` varchar(12)
,`nombreCliente` varchar(35)
,`apellidoCliente` varchar(35)
,`correoCliente` varchar(100)
,`telefonoCliente` varchar(11)
,`nombreMetodologia` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `idEjercicio` int(12) NOT NULL,
  `idParteDelCuerpoFK` int(12) NOT NULL,
  `nombreEjercicio` varchar(50) NOT NULL,
  `urlImagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`idEjercicio`, `idParteDelCuerpoFK`, `nombreEjercicio`, `urlImagen`) VALUES
(1, 1, 'Movimientos circulares', ''),
(2, 2, 'Press', ''),
(3, 3, 'Curl con mancuernas', ''),
(4, 4, 'Lagartijas', ''),
(5, 5, 'Sentadilla', ''),
(7, 7, 'Curl de un solo brazo dr', ''),
(8, 8, 'Curl de un solo brazo izq', ''),
(9, 9, 'Press a una pierna dr', ''),
(10, 10, 'Press a una pierna dr', ''),
(11, 11, 'Low plank', ''),
(12, 12, 'Press de hombro dr', ''),
(13, 13, 'Press de hombros dr', ''),
(14, 14, 'Inchworms', ''),
(15, 15, 'Pesas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_antropometrica`
--

CREATE TABLE `ficha_antropometrica` (
  `idFicha` int(12) NOT NULL,
  `fechaFicha` date NOT NULL,
  `EstaturaCliente` float NOT NULL,
  `pesoCliente` float NOT NULL,
  `descripcionFicha` varchar(200) NOT NULL,
  `idSuscripcionFK` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ficha_antropometrica`
--

INSERT INTO `ficha_antropometrica` (`idFicha`, `fechaFicha`, `EstaturaCliente`, `pesoCliente`, `descripcionFicha`, `idSuscripcionFK`) VALUES
(1, '2021-09-29', 1.65, 56, 'Sin novedad', 1),
(2, '2021-09-28', 1.81, 74.3, 'Tiene lesion rodilla derecha', 2),
(3, '2021-07-10', 1.54, 55, 'Sin novedad', 3),
(4, '2021-09-05', 1.79, 85, 'Sin novedad', 4),
(5, '2021-09-10', 1.54, 52, 'A disminuido su grasa corporal en comparacion con su ultima ficha', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores`
--

CREATE TABLE `instructores` (
  `idInstructor` int(12) NOT NULL,
  `nombreInstructor` varchar(35) NOT NULL,
  `apellidoInstructor` varchar(35) NOT NULL,
  `correoInstructor` varchar(100) NOT NULL,
  `telefonoInstructor` varchar(11) NOT NULL,
  `estadoInstructor` int(11) NOT NULL,
  `idUsuarioFK` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `instructores`
--

INSERT INTO `instructores` (`idInstructor`, `nombreInstructor`, `apellidoInstructor`, `correoInstructor`, `telefonoInstructor`, `estadoInstructor`, `idUsuarioFK`) VALUES
(1, 'Andrea', 'Sastoque', 'andreas@gmail.com', '321348028', 1, 2),
(2, 'Ana Maria', 'Valencia', 'anaMaria@gmail.com', '300535096', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodologia`
--

CREATE TABLE `metodologia` (
  `idMetodologia` int(12) NOT NULL,
  `nombreMetodologia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metodologia`
--

INSERT INTO `metodologia` (`idMetodologia`, `nombreMetodologia`) VALUES
(1, 'Disminuir de peso'),
(2, 'Aumentar masa muscular'),
(3, '2X1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idPago` int(12) NOT NULL,
  `fechaPago` date NOT NULL,
  `valorPago` float NOT NULL,
  `descripcionPago` varchar(200) NOT NULL,
  `urlSoportePago` varchar(500) NOT NULL,
  `idSuscripcionFK` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idPago`, `fechaPago`, `valorPago`, `descripcionPago`, `urlSoportePago`, `idSuscripcionFK`) VALUES
(1, '2021-09-29', 200000, 'Pago la mitad de su suscripcion, debe $19.950', 'Pago 1.jpeg', 1),
(2, '2021-09-28', 180000, 'Pago por dos meses (septiembre y octubre)', 'Pago 2.jpeg', 2),
(3, '2021-09-05', 250000, 'Pago por un mes (septiembre)', 'Pago 3.jpeg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parte_cuerpo_ejercicio`
--

CREATE TABLE `parte_cuerpo_ejercicio` (
  `idFichaFK` int(12) NOT NULL,
  `idParteDelCuerpoFK` int(12) NOT NULL,
  `medida` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parte_cuerpo_ejercicio`
--

INSERT INTO `parte_cuerpo_ejercicio` (`idFichaFK`, `idParteDelCuerpoFK`, `medida`) VALUES
(1, 1, 65.2),
(1, 2, 65.5),
(1, 3, 65),
(1, 4, 40),
(1, 5, 74.6),
(1, 6, 26.2),
(1, 7, 85.2),
(1, 8, 65),
(1, 9, 66),
(1, 10, 65.2),
(3, 1, 65.2),
(3, 2, 65.5),
(3, 3, 65),
(3, 4, 40),
(3, 5, 74.6),
(3, 6, 26.2),
(3, 7, 85.2),
(3, 8, 65),
(3, 9, 66),
(3, 10, 65.2),
(4, 1, 14),
(5, 1, 65.2),
(5, 2, 65.5),
(5, 3, 65),
(5, 4, 40),
(5, 5, 74.6),
(5, 6, 26.2),
(5, 7, 85.2),
(5, 8, 65),
(5, 9, 66),
(5, 10, 65.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parte_del_cuerpo`
--

CREATE TABLE `parte_del_cuerpo` (
  `idParteDelCuerpo` int(12) NOT NULL,
  `nombreParteCuerpo` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parte_del_cuerpo`
--

INSERT INTO `parte_del_cuerpo` (`idParteDelCuerpo`, `nombreParteCuerpo`) VALUES
(1, 'Craneo'),
(2, 'Bicep Derecho'),
(3, 'Bicep Izquierdo'),
(4, 'Muslo Derecho'),
(5, 'Muslo Izquierdo'),
(6, 'Cintura'),
(7, 'Brazo Derecho'),
(8, 'Brazo Izquierdo'),
(9, 'Pierna Derecha'),
(10, 'Pierna Izquierda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion`
--

CREATE TABLE `programacion` (
  `idProgramacion` int(12) NOT NULL,
  `fechaInicioPro` date NOT NULL,
  `fechaFinPro` date NOT NULL,
  `idUsuarioFK` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programacion`
--

INSERT INTO `programacion` (`idProgramacion`, `fechaInicioPro`, `fechaFinPro`, `idUsuarioFK`) VALUES
(1, '2021-06-28', '2021-07-28', 2),
(2, '2021-09-05', '2021-10-05', 3),
(3, '2021-09-21', '2021-10-21', 4),
(4, '2021-09-16', '2021-10-16', 5),
(5, '2021-09-09', '2021-10-09', 6),
(6, '2021-09-27', '2021-10-27', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(12) NOT NULL,
  `nombreRol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
(1, 'Recepcionista'),
(2, 'Instructor'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie_de_ejercicio`
--

CREATE TABLE `serie_de_ejercicio` (
  `idSerie` int(12) NOT NULL,
  `nombreSerieEjercicio` varchar(50) NOT NULL,
  `descripcionSerieEjercicio` varchar(300) NOT NULL,
  `repeticionEjercicio` int(11) NOT NULL,
  `secuenciaEjercicio` int(11) NOT NULL,
  `urlImagen` varchar(500) NOT NULL,
  `idMetodologiaFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `serie_de_ejercicio`
--

INSERT INTO `serie_de_ejercicio` (`idSerie`, `nombreSerieEjercicio`, `descripcionSerieEjercicio`, `repeticionEjercicio`, `secuenciaEjercicio`, `urlImagen`, `idMetodologiaFK`) VALUES
(1, 'Disminuir de peso principiante', 'Realizar los ejercicios propuestos', 4, 12, 'Ejercicio 1.jpeg', 1),
(2, 'Disminuir de peso intermedio', 'Realizar los ejercicios propuestos', 5, 10, 'Ejercicio 2.jpeg', 1),
(3, 'Aumentar masa muscular principante', 'Realizar los ejercicios propuestos', 4, 15, 'Ejercicio 3.jpeg', 2),
(4, 'Dos objetivos', 'Realizar los ejercicios propuestos', 6, 8, 'Ejercicio 4.jpeg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripciones`
--

CREATE TABLE `suscripciones` (
  `idSuscripcion` int(12) NOT NULL,
  `valorSuscripcion` float NOT NULL,
  `fechaSuscripcion` date NOT NULL,
  `estadoSuscripcion` int(11) NOT NULL,
  `descripcionNovedad` varchar(500) DEFAULT NULL,
  `idClienteFK` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `suscripciones`
--

INSERT INTO `suscripciones` (`idSuscripcion`, `valorSuscripcion`, `fechaSuscripcion`, `estadoSuscripcion`, `descripcionNovedad`, `idClienteFK`) VALUES
(1, 39900, '2021-09-29', 1, 'Ninguna', 3),
(2, 79800, '2021-09-28', 1, 'Ninguna', 2),
(3, 39900, '2021-07-10', 1, 'Ninguna', 1),
(4, 39900, '2021-09-05', 1, 'Ninguna', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion_metodologia`
--

CREATE TABLE `suscripcion_metodologia` (
  `idSuscripcionFK` int(12) NOT NULL,
  `idMetodologiaFK` int(12) NOT NULL,
  `fechaMetodologiaInicio` date NOT NULL,
  `fechaMetodologiaFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `suscripcion_metodologia`
--

INSERT INTO `suscripcion_metodologia` (`idSuscripcionFK`, `idMetodologiaFK`, `fechaMetodologiaInicio`, `fechaMetodologiaFin`) VALUES
(2, 1, '2021-09-28', '2021-10-28'),
(3, 2, '2021-07-10', '2021-09-30'),
(1, 3, '2021-09-29', '2021-10-29'),
(4, 3, '2021-09-05', '2021-10-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_series_ejercicios`
--

CREATE TABLE `tb_series_ejercicios` (
  `idEjercicioFK` int(12) NOT NULL,
  `idSerieFK` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_series_ejercicios`
--

INSERT INTO `tb_series_ejercicios` (`idEjercicioFK`, `idSerieFK`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(1, 2),
(3, 2),
(4, 2),
(5, 2),
(7, 3),
(9, 3),
(10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identificacion`
--

CREATE TABLE `tipo_identificacion` (
  `idTipoDocumento` int(12) NOT NULL,
  `nombreDocumento` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_identificacion`
--

INSERT INTO `tipo_identificacion` (`idTipoDocumento`, `nombreDocumento`) VALUES
(1, 'Cedula de cuidadania'),
(2, 'Tarjeta de identidad'),
(3, 'Cedula extranjera'),
(4, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(12) NOT NULL,
  `NumeroIdentificacion` varchar(12) NOT NULL,
  `passwordUsuario` varchar(20) NOT NULL,
  `estadoUsuario` int(11) NOT NULL,
  `idRolFK` int(12) NOT NULL,
  `idTipoDocumentoFK` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `NumeroIdentificacion`, `passwordUsuario`, `estadoUsuario`, `idRolFK`, `idTipoDocumentoFK`) VALUES
(1, '1032480756', '1345ElmejorGrupo', 1, 1, 1),
(2, '1000713178', 'andrea12334', 1, 2, 1),
(3, '1004529469', 'anaMaria890', 1, 2, 2),
(4, '1000213057', 'Mariaaa789', 1, 3, 2),
(5, '1001299203', '260421Paulita', 1, 3, 1),
(6, '1028481864', 'pruebaValentina234', 1, 3, 4),
(7, '1000216054', 'danielamora1', 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarasistenciacliente`
--
DROP TABLE IF EXISTS `consultarasistenciacliente`;

CREATE VIEW `consultarasistenciacliente`  AS SELECT `u`.`NumeroIdentificacion` AS `numeroIdentificacion`, concat(`c`.`nombreCliente`,' ',`c`.`apellidoCliente`) AS `Nombre Completo`, `a`.`fechaHoraIngreso` AS `fechaHoraIngreso`, `a`.`fechaHoraSalida` AS `fechaHoraSalida` FROM (((`asistencias` `a` join `programacion` `p`) join `usuarios` `u`) join `clientes` `c` on(`p`.`idProgramacion` = `a`.`idProgramacionFK` and `u`.`idUsuario` = `p`.`idUsuarioFK` and `u`.`idUsuario` = `c`.`idUsuarioFK`)) WHERE `c`.`idUsuarioFK` = `p`.`idUsuarioFK` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultarmetodologia`
--
DROP TABLE IF EXISTS `consultarmetodologia`;

CREATE VIEW `consultarmetodologia`  AS SELECT `u`.`NumeroIdentificacion` AS `NumeroIdentificacion`, `c`.`nombreCliente` AS `nombreCliente`, `c`.`apellidoCliente` AS `apellidoCliente`, `c`.`correoCliente` AS `correoCliente`, `c`.`telefonoCliente` AS `telefonoCliente`, `m`.`nombreMetodologia` AS `nombreMetodologia` FROM ((((`clientes` `c` join `usuarios` `u`) join `metodologia` `m`) join `suscripcion_metodologia` `sm`) join `suscripciones` `s` on(`c`.`idUsuarioFK` = `u`.`idUsuario` and `s`.`idClienteFK` = `c`.`idCliente` and `sm`.`idMetodologiaFK` = `m`.`idMetodologia` and `sm`.`idSuscripcionFK` = `s`.`idSuscripcion`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`idAsistencia`),
  ADD KEY `FK_idProgramacionFK_asistencias_idx` (`idProgramacionFK`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `IND_correoCliente` (`correoCliente`),
  ADD UNIQUE KEY `IND_telefonoCliente` (`telefonoCliente`),
  ADD UNIQUE KEY `IND_idCliente` (`idCliente`),
  ADD UNIQUE KEY `IND_idUsuarioFK` (`idUsuarioFK`),
  ADD KEY `FK_idUsuarioFK_clientes_idx` (`idUsuarioFK`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`idEjercicio`);

--
-- Indices de la tabla `ficha_antropometrica`
--
ALTER TABLE `ficha_antropometrica`
  ADD PRIMARY KEY (`idFicha`),
  ADD KEY `FK_idSuscripcionFK_ficha_antropometrica_idx` (`idSuscripcionFK`);

--
-- Indices de la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD PRIMARY KEY (`idInstructor`),
  ADD UNIQUE KEY `IND_correoInstructor` (`correoInstructor`),
  ADD UNIQUE KEY `IND_telefonoInstructor` (`telefonoInstructor`),
  ADD UNIQUE KEY `IND_idInstructor` (`idInstructor`),
  ADD UNIQUE KEY `IND_idUsuarioFK` (`idUsuarioFK`),
  ADD KEY `FK_idUsuarioFK_instructores_idx` (`idUsuarioFK`);

--
-- Indices de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  ADD PRIMARY KEY (`idMetodologia`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `FK_idSuscripcionFK_pagos_idx` (`idSuscripcionFK`);

--
-- Indices de la tabla `parte_cuerpo_ejercicio`
--
ALTER TABLE `parte_cuerpo_ejercicio`
  ADD PRIMARY KEY (`idFichaFK`,`idParteDelCuerpoFK`),
  ADD KEY `FK_idFichaFK_parte_cuerpo_ejercicio_idx` (`idFichaFK`),
  ADD KEY `FK_idParteDelCuerpoFK_parte_cuerpo_ejercicio_idx` (`idParteDelCuerpoFK`);

--
-- Indices de la tabla `parte_del_cuerpo`
--
ALTER TABLE `parte_del_cuerpo`
  ADD PRIMARY KEY (`idParteDelCuerpo`);

--
-- Indices de la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD PRIMARY KEY (`idProgramacion`),
  ADD KEY `FK_idUsuarioFK_programacion_idx` (`idUsuarioFK`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `serie_de_ejercicio`
--
ALTER TABLE `serie_de_ejercicio`
  ADD PRIMARY KEY (`idSerie`),
  ADD KEY `FK_idMetodologiaFK_serie_de_ejercicio_idx` (`idMetodologiaFK`);

--
-- Indices de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD PRIMARY KEY (`idSuscripcion`),
  ADD KEY `FK_idClienteFK_suscripciones_idx` (`idClienteFK`);

--
-- Indices de la tabla `suscripcion_metodologia`
--
ALTER TABLE `suscripcion_metodologia`
  ADD PRIMARY KEY (`idMetodologiaFK`,`idSuscripcionFK`),
  ADD KEY `FK_idMetodologiaFK_suscripcion_metodologia_idx` (`idMetodologiaFK`),
  ADD KEY `FK_idSuscripcionFK_suscripcion_metodologia_idx` (`idSuscripcionFK`);

--
-- Indices de la tabla `tb_series_ejercicios`
--
ALTER TABLE `tb_series_ejercicios`
  ADD PRIMARY KEY (`idSerieFK`,`idEjercicioFK`),
  ADD KEY `FK_idSerieFK_tb_series_ejercicios_idx` (`idSerieFK`),
  ADD KEY `FK_idEjercicioFK_tb_series_ejercicios_idx` (`idEjercicioFK`);

--
-- Indices de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `IND_NumeroIdentificacion` (`NumeroIdentificacion`),
  ADD KEY `FK_idTipoDocumentoFK_usuarios_idx` (`idTipoDocumentoFK`),
  ADD KEY `FK_idRolFK_usuarios_idx` (`idRolFK`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `FK_idProgramacionFK_asistencias` FOREIGN KEY (`idProgramacionFK`) REFERENCES `programacion` (`idProgramacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_idUsuarioFK_clientes` FOREIGN KEY (`idUsuarioFK`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ficha_antropometrica`
--
ALTER TABLE `ficha_antropometrica`
  ADD CONSTRAINT `FK_idSuscripcionFK_ficha_antropometrica` FOREIGN KEY (`idSuscripcionFK`) REFERENCES `suscripciones` (`idSuscripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD CONSTRAINT `FK_idUsuarioFK_instructores` FOREIGN KEY (`idUsuarioFK`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `FK_idSuscripcionFK_pagos` FOREIGN KEY (`idSuscripcionFK`) REFERENCES `suscripciones` (`idSuscripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parte_cuerpo_ejercicio`
--
ALTER TABLE `parte_cuerpo_ejercicio`
  ADD CONSTRAINT `FK_idFichaFK_parte_cuerpo_ejercicio` FOREIGN KEY (`idFichaFK`) REFERENCES `ficha_antropometrica` (`idFicha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_idParteDelCuerpoFK_parte_cuerpo_ejercicio` FOREIGN KEY (`idParteDelCuerpoFK`) REFERENCES `parte_del_cuerpo` (`idParteDelCuerpo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD CONSTRAINT `FK_idUsuarioFK_programacion` FOREIGN KEY (`idUsuarioFK`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `serie_de_ejercicio`
--
ALTER TABLE `serie_de_ejercicio`
  ADD CONSTRAINT `FK_idMetodologiaFK_serie_de_ejercicio` FOREIGN KEY (`idMetodologiaFK`) REFERENCES `metodologia` (`idMetodologia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD CONSTRAINT `FK_idClienteFK_suscripciones` FOREIGN KEY (`idClienteFK`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `suscripcion_metodologia`
--
ALTER TABLE `suscripcion_metodologia`
  ADD CONSTRAINT `FK_idMetodologiaFK_suscripcion_metodologia` FOREIGN KEY (`idMetodologiaFK`) REFERENCES `metodologia` (`idMetodologia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_idSuscripcionFK_suscripcion_metodologia` FOREIGN KEY (`idSuscripcionFK`) REFERENCES `suscripciones` (`idSuscripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_series_ejercicios`
--
ALTER TABLE `tb_series_ejercicios`
  ADD CONSTRAINT `FK_idEjercicioFK_tb_series_ejercicios` FOREIGN KEY (`idEjercicioFK`) REFERENCES `ejercicios` (`idEjercicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_idSerieFK_tb_series_ejercicios` FOREIGN KEY (`idSerieFK`) REFERENCES `serie_de_ejercicio` (`idSerie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_idRolFK_usuarios` FOREIGN KEY (`idRolFK`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_idTipoDocumentoFK_usuarios` FOREIGN KEY (`idTipoDocumentoFK`) REFERENCES `tipo_identificacion` (`idTipoDocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

DELIMITER $$
--
-- Procedimientos
--
CREATE PROCEDURE `actualizarCliente` (IN `id` INT(10), IN `correo` VARCHAR(50), IN `tel` VARCHAR(12))  BEGIN
	UPDATE clientes 
	SET correoCliente=correo , telefonoCliente = tel 
	WHERE idCliente = id;  
END$$

CREATE PROCEDURE `actualizarInstructor` (IN `id` INT(10), IN `correo` VARCHAR(50), IN `tel` VARCHAR(12))  BEGIN
	UPDATE instructores 
	SET correoInstructor=correo , telefonoInstructor = tel
	WHERE idInstructor = id;  
END$$

CREATE PROCEDURE `consultarAsistenciaCliente` ()  BEGIN
	SELECT u.numeroIdentificacion, CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo', a.fechaHoraIngreso, a.fechaHoraSalida 
	FROM asistencias AS a
    JOIN programacion AS p
	JOIN usuarios AS  u 
	JOIN clientes AS c 
	ON  p.idProgramacion=a.idProgramacionFK
    AND u.idUsuario=p.idUsuarioFK 
	AND u.idUsuario=c.idUsuarioFK 
    WHERE c.idUsuarioFK=p.idUsuarioFK;
END$$

CREATE PROCEDURE `consultarAsistenciaInstructor` ()  BEGIN
	SELECT u.numeroIdentificacion, CONCAT(i.nombreInstructor ,' ', i.apellidoInstructor) AS 'Nombre Completo', a.fechaHoraIngreso, a.fechaHoraSalida 
	FROM asistencias AS a
    JOIN programacion AS p
	JOIN usuarios AS  u 
	JOIN instructores AS i
	ON  p.idProgramacion=a.idProgramacionFK
    AND u.idUsuario=p.idUsuarioFK 
	AND u.idUsuario=i.idUsuarioFK 
    WHERE i.idUsuarioFK=p.idUsuarioFK;
END$$

CREATE PROCEDURE `consultarInstructor` ()  BEGIN
	SELECT I.idInstructor,U.NumeroIdentificacion,I.nombreInstructor,I.apellidoInstructor,I.correoInstructor,I.telefonoInstructor 
	FROM usuarios AS U 
	JOIN instructores AS I 
	ON U.idUsuario=I.idUsuarioFK 
    WHERE U.estadoUsuario='1';
END$$

CREATE PROCEDURE `consultarSuscripcion` (IN `NumiD` VARCHAR(15))  BEGIN
	SELECT c.nombreCliente, m.nombreMetodologia, s.valorSuscripcion, s.fechaSuscripcion 
	FROM  suscripciones AS s
    JOIN suscripcion_metodologia AS sm
    ON s.idSuscripcion=sm.idSuscripcionFK
	JOIN metodologia AS m 
	ON sm.idMetodologiaFK=m.idMetodologia
	JOIN usuarios AS u 
	JOIN clientes AS c 
	ON u.idUsuario=c.idUsuarioFK 
	AND s.idClienteFK=c.idCliente
	WHERE u.numeroIdentificacion=NumiD;
END$$

CREATE PROCEDURE `consultarUsuario` ()  BEGIN
	SELECT MAX(idUsuario) AS idUsuario 
	FROM usuarios;
END$$

CREATE PROCEDURE `registrarAsistencia` (IN `idAsis` INT, IN `idPro` INT, IN `fechaHoraIngreso` DATETIME, IN `fechaHoraSalida` DATETIME)  BEGIN
	INSERT INTO asistencias(idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK) 
    values (idAsis,fechaHoraIngreso,fechaHoraSalida,idPro);
END$$

CREATE PROCEDURE `registrarCliente` (IN `nombrec` VARCHAR(35), IN `apellidoc` VARCHAR(35), IN `fnacimientoc` DATE, IN `correoc` VARCHAR(100), IN `telefonoc` VARCHAR(11), IN `estadoc` INT)  BEGIN
	INSERT INTO clientes
	SELECT MAX(idCliente) + 1,nombrec,apellidoc,fnacimientoc,correoc,telefonoc,estadoc,(SELECT MAX(idUsuario)FROM usuarios)
	FROM clientes;
END$$

CREATE PROCEDURE `registrarInstructor` (IN `nombrei` VARCHAR(35), IN `appellidoi` VARCHAR(35), IN `correoi` VARCHAR(100), IN `telefonoi` VARCHAR(11), IN `estadoi` INT)  BEGIN
	INSERT INTO instructores 
	SELECT MAX(idInstructor) + 1,nombrei,appellidoi,correoi,telefonoi,estadoi,(SELECT MAX(idUsuario)FROM usuarios)
	FROM instructores;
END$$

CREATE PROCEDURE `registrarPagos` (IN `fechaPago` DATETIME, IN `ValorPago` FLOAT, IN `descripcionPago` VARCHAR(200), IN `urlSoportePago` VARCHAR(500), IN `idSuscripcion` INT(100))  BEGIN
	INSERT INTO pagos 
    SELECT MAX(idPago) + 1,fechaPago,ValorPago,descripcionPago,urlSoportePago,idSuscripcion
    FROM pagos;
END$$

CREATE PROCEDURE `registrarProgramacion` (IN `fechaInicioPro` DATE, IN `fechaFinPro` DATE, IN `numid` VARCHAR(25))  BEGIN
	INSERT INTO programacion 
    SELECT MAX(idProgramacion) + 1 ,fechaInicioPro,fechaFinPro, 
    (SELECT idUsuario FROM usuarios WHERE numeroIdentificacion=numid) 
    FROM programacion;
END$$

CREATE PROCEDURE `registrarSerie` (IN `nombreSerieEjercicio` VARCHAR(60), IN `descripcionSerieEjercicio` TEXT, IN `repeticionEjercicio` INT, IN `secuenciaEjercicio` INT, IN `idMetodologiaFK` INT)  BEGIN
	INSERT INTO serie_de_ejercicio 
	SELECT MAX(idSerie) + 1,nombreSerieEjercicio,descripcionSerieEjercicio, repeticionEjercicio, secuenciaEjercicio, idMetodologiaFK 
	FROM serie_de_ejercicio;
END$$

CREATE PROCEDURE `registrarUsuario` (IN `numeroiu` VARCHAR(35), IN `passwordu` VARCHAR(35), IN `estadou` INT(1), IN `rolu` INT(1), IN `iddocu` INT(1))  BEGIN
	INSERT INTO usuarios
	SELECT MAX(idUsuario) + 1,numeroiu,passwordu,estadou,rolu,iddocu 
	FROM usuarios;
END$$

CREATE PROCEDURE `validar_login` (IN `usuario` INT(12), IN `password` VARCHAR(25), IN `rol` INT(12), IN `estado` INT(1))  BEGIN
	SELECT COUNT(*) AS RESULTADO 
	FROM usuarios 
	WHERE NumeroIdentificacion=usuario 
	AND passwordUsuario=password 
	AND idRolFK=rol 
	AND estadoUsuario=estado;
END$$

CREATE PROCEDURE `validar_login2` (IN `NumiD` VARCHAR(15))  BEGIN
	SELECT idRolFK 
	FROM usuarios
	WHERE NumeroIdentificacion=Numid;
END$$

--
-- Funciones
--
CREATE FUNCTION `cantidadPagosCliente` () RETURNS TINYINT(4) BEGIN 
DECLARE cantidadClientes int; 
set @cantidadClientes= (SELECT COUNT(DISTINCT idSuscripcionFK) From pagos); 
/*Select @cantidadClientes;*/
RETURN @cantidadClientes; 
END$$

CREATE FUNCTION `porcentajePagosCliente` () RETURNS FLOAT BEGIN 
DECLARE cantidadClientes int; 
set @cantidadClientes= (SELECT COUNT(DISTINCT idSuscripcionFK) From pagos); 
set @Porcentaje=(@cantidadClientes*100/(Select count(*) From clientes));
/*Select @Porcentaje;*/
/*Select @cantidadClientes;*/
RETURN @Porcentaje; 
END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
