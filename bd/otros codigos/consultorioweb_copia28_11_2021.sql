-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-11-2021 a las 05:15:24
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorioweb`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `ActualizarMedico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarMedico` (IN `PNombreIN` VARCHAR(45), IN `SNombreIN` VARCHAR(45), IN `PApellidoIN` VARCHAR(45), IN `SApellidoIN` VARCHAR(45), IN `GeneroIN` VARCHAR(45), IN `FNacimientoIN` DATE, IN `DireccionIN` VARCHAR(45), IN `TelefonoIN` INT, IN `EspecialidadIN` VARCHAR(45), IN `CorreoIN` VARCHAR(45), IN `ContraseñaIN` VARCHAR(255), IN `TipoUsuarioIN` INT, IN `idMedicoIN` INT)  begin
UPDATE Medico SET 
PNombre = PNombreIN, 
SNombre = SNombreIN, 
PApellido = PApellidoIN, 
SApellido = SApellidoIN, 
Genero = GeneroIN, 
FNacimiento = FNacimientoIN, 
Direccion = DireccionIN, 
Telefono = TelefonoIN, 
NombreEspecialidad = EspecialidadIN
WHERE (`idMedico` = idMedicoIN);


UPDATE inicio_sesion2 SET 
Correo = CorreoIN, 
Contraseña = ContraseñaIN, 
TipoUsuario = TipoUsuarioIN,
Medico_idMedico = Medico_idMedicoIN
WHERE (Medico_idMedico = idMedicoIN);
end$$

DROP PROCEDURE IF EXISTS `ActualizarPaciente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarPaciente` (IN `PNombreIN` VARCHAR(45), IN `SNombreIN` VARCHAR(45), IN `PApellidoIN` VARCHAR(45), IN `SApellidoIN` VARCHAR(45), IN `GeneroIN` VARCHAR(45), IN `FNacimientoIN` DATE, IN `DireccionIN` VARCHAR(45), IN `TelefonoIN` INT, IN `ReligionIN` VARCHAR(45), IN `CorreoIN` VARCHAR(45), IN `ContraseñaIN` VARCHAR(255), IN `TipoUsuarioIN` INT, IN `Medico_idMedicoIN` INT, IN `idPacienteIN` INT)  begin
UPDATE paciente SET 
PNombre = PNombreIN, 
SNombre = SNombreIN, 
PApellido = PApellidoIN, 
SApellido = SApellidoIN, 
Genero = GeneroIN, 
FNacimiento = FNacimientoIN, 
Direccion = DireccionIN, 
Telefono = TelefonoIN, 
Religion = ReligionIN 
WHERE (`idPaciente` = idPacienteIN);


UPDATE inicio_sesión SET 
Correo = CorreoIN, 
Contraseña = ContraseñaIN, 
TipoUsuario = TipoUsuarioIN,
Medico_idMedico = Medico_idMedicoIN
WHERE (Paciente_idPaciente = idPacienteIN);
end$$

DROP PROCEDURE IF EXISTS `AgregarConsulta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AgregarConsulta` (IN `ClasificacionIN` VARCHAR(45), IN `DescripcionIN` VARCHAR(45), IN `FechaIN` VARCHAR(45), IN `HoraIN` VARCHAR(45), IN `IdDestinoIN` VARCHAR(45))  BEGIN

insert into consulta(ClasificacionConsulta,DescripcionConsulta,Fecha,Hora,Paciente_idPaciente,Medico_idMedico)
Values (ClasificacionIN,DescripcionIN,FechaIN,HoraIN,IdDestinoIN,1);
END$$

DROP PROCEDURE IF EXISTS `AgregarMedico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AgregarMedico` (IN `PNombreIN` VARCHAR(45), IN `SNombreIN` VARCHAR(45), IN `PApellidoIN` VARCHAR(45), IN `SApellidoIN` VARCHAR(45), IN `GeneroIN` VARCHAR(45), IN `CorreoIN` VARCHAR(45), IN `ContraseñaIN` VARCHAR(255), IN `FNacimientoIN` DATE, IN `DireccionIN` VARCHAR(45), IN `TelefonoIN` INT, IN `NombreEspecialidadIN` VARCHAR(45))  BEGIN

insert into medico(PNombre,SNombre,PApellido,SApellido,Genero,FNacimiento,Direccion,Telefono,NombreEspecialidad)
Values (PNombreIN,SNombreIN,PApellidoIN,SApellidoIN,GeneroIN,FNacimientoIN,DireccionIN,TelefonoIN,NombreEspecialidadIN);

insert into inicio_sesion2(Correo,Contraseña,TipoUsuario,Medico_idMedico)
values (CorreoIN,ContraseñaIN,1,last_insert_id());
END$$

DROP PROCEDURE IF EXISTS `AgregarUsurio`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AgregarUsurio` (IN `PNombreIN` VARCHAR(45), IN `SNombreIN` VARCHAR(45), IN `PApellidoIN` VARCHAR(45), IN `SApellidoIN` VARCHAR(45), IN `GeneroIN` VARCHAR(45), IN `CorreoIN` VARCHAR(45), IN `ContraseñaIN` VARCHAR(255), IN `FNacimientoIN` DATE, IN `DireccionIN` VARCHAR(45), IN `TelefonoIN` INT, IN `ReligionIN` VARCHAR(45))  BEGIN

insert into paciente(PNombre,SNombre,PApellido,SApellido,Genero,FNacimiento,Direccion,Telefono,Religion)
Values (PNombreIN,SNombreIN,PApellidoIN,SApellidoIN,GeneroIN,FNacimientoIN,DireccionIN,TelefonoIN,ReligionIN);

insert into inicio_sesión(Correo,Contraseña,TipoUsuario,Paciente_idPaciente,Medico_idMedico)
values (CorreoIN,ContraseñaIN,0,last_insert_id(),1);
END$$

DROP PROCEDURE IF EXISTS `EnviarReceta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EnviarReceta` (IN `TratamientoIN` VARCHAR(45), IN `CostoIN` INT, IN `IdMedico` INT, IN `idConsulta` INT, IN `idPaciente` INT)  BEGIN

insert into receta(Tratamiento,Costo,Medico_idMedico,Consulta_idConsulta,Paciente_idPaciente)
Values (TratamientoIN,CostoIN,IdMedico,idConsulta,idPaciente);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `idConsulta` int NOT NULL AUTO_INCREMENT,
  `ClasificacionConsulta` varchar(45) DEFAULT NULL,
  `DescripcionConsulta` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` varchar(45) DEFAULT NULL,
  `Paciente_idPaciente` int NOT NULL,
  `Medico_idMedico` int NOT NULL,
  PRIMARY KEY (`idConsulta`),
  KEY `fk_Consulta_Paciente1_idx` (`Paciente_idPaciente`),
  KEY `fk_Consulta_Medico1_idx` (`Medico_idMedico`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`idConsulta`, `ClasificacionConsulta`, `DescripcionConsulta`, `Fecha`, `Hora`, `Paciente_idPaciente`, `Medico_idMedico`) VALUES
(1, 'Mujer', 'Calentura', '2021-10-11', '12:50', 1, 1),
(2, 'Hombre', 'Tos y Gripe', '2021-10-05', '10:15', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio_sesion2`
--

DROP TABLE IF EXISTS `inicio_sesion2`;
CREATE TABLE IF NOT EXISTS `inicio_sesion2` (
  `idinicio_sesion2` int NOT NULL AUTO_INCREMENT,
  `Correo` varchar(45) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `TipoUsuario` int NOT NULL,
  `Medico_idMedico` int NOT NULL,
  PRIMARY KEY (`idinicio_sesion2`),
  UNIQUE KEY `Correo_UNIQUE` (`Correo`),
  UNIQUE KEY `idinicio_sesion2_UNIQUE` (`idinicio_sesion2`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inicio_sesion2`
--

INSERT INTO `inicio_sesion2` (`idinicio_sesion2`, `Correo`, `Contraseña`, `TipoUsuario`, `Medico_idMedico`) VALUES
(1, 'juana123', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio_sesión`
--

DROP TABLE IF EXISTS `inicio_sesión`;
CREATE TABLE IF NOT EXISTS `inicio_sesión` (
  `idInicio_sesión` int NOT NULL AUTO_INCREMENT,
  `Correo` varchar(45) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `TipoUsuario` int NOT NULL,
  `Paciente_idPaciente` int NOT NULL,
  `Medico_idMedico` int NOT NULL,
  PRIMARY KEY (`idInicio_sesión`),
  UNIQUE KEY `Correo_UNIQUE` (`Correo`),
  UNIQUE KEY `idInicio_sesión_UNIQUE` (`idInicio_sesión`),
  KEY `fk_Inicio_sesión_Paciente_idx` (`Paciente_idPaciente`),
  KEY `fk_Inicio_sesión_Medico1_idx` (`Medico_idMedico`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inicio_sesión`
--

INSERT INTO `inicio_sesión` (`idInicio_sesión`, `Correo`, `Contraseña`, `TipoUsuario`, `Paciente_idPaciente`, `Medico_idMedico`) VALUES
(1, 'ana123', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, 1),
(2, 'juan123', '81dc9bdb52d04dc20036dbd8313ed055', 0, 2, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `listaconsulta`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `listaconsulta`;
CREATE TABLE IF NOT EXISTS `listaconsulta` (
`ClasificacionConsulta` varchar(45)
,`DescripcionConsulta` varchar(45)
,`Fecha` date
,`Hora` varchar(45)
,`nombre` varchar(91)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `login`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
`Contraseña` varchar(255)
,`Correo` varchar(45)
,`idPaciente` int
,`Nombres` varchar(91)
,`TipoUsuario` int
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `login2`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `login2`;
CREATE TABLE IF NOT EXISTS `login2` (
`Contraseña` varchar(255)
,`Correo` varchar(45)
,`idMedico` int
,`Nombres` varchar(91)
,`TipoUsuario` int
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `idMedico` int NOT NULL AUTO_INCREMENT,
  `PNombre` varchar(45) DEFAULT NULL,
  `SNombre` varchar(45) DEFAULT NULL,
  `PApellido` varchar(45) DEFAULT NULL,
  `SApellido` varchar(45) DEFAULT NULL,
  `Genero` varchar(45) DEFAULT NULL,
  `FNacimiento` date DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` int DEFAULT NULL,
  `NombreEspecialidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMedico`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`idMedico`, `PNombre`, `SNombre`, `PApellido`, `SApellido`, `Genero`, `FNacimiento`, `Direccion`, `Telefono`, `NombreEspecialidad`) VALUES
(1, 'Juana', 'Andrea', 'Lopez', 'Vega', 'Mujer', '1993-06-05', 'Managua', 88888888, 'Medicina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `idPaciente` int NOT NULL AUTO_INCREMENT,
  `PNombre` varchar(45) DEFAULT NULL,
  `SNombre` varchar(45) DEFAULT NULL,
  `PApellido` varchar(45) DEFAULT NULL,
  `SApellido` varchar(45) DEFAULT NULL,
  `Genero` varchar(45) DEFAULT NULL,
  `FNacimiento` date DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` int DEFAULT NULL,
  `Religion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `PNombre`, `SNombre`, `PApellido`, `SApellido`, `Genero`, `FNacimiento`, `Direccion`, `Telefono`, `Religion`) VALUES
(1, 'Ana', 'Gabriela', 'Zamora', 'Jarquín', 'Mujer', '1999-05-15', 'Managua, Miguel Bonilla', 88888888, 'hij'),
(2, 'Juan', 'Antonio', 'Riveras', 'Montolla', 'Hombre', '1998-10-18', 'Managua,Laureles', 77777777, 'dfg');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `perfilmedico`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `perfilmedico`;
CREATE TABLE IF NOT EXISTS `perfilmedico` (
`Contraseña` varchar(255)
,`Correo` varchar(45)
,`Direccion` varchar(45)
,`FNacimiento` date
,`Genero` varchar(45)
,`idinicio_sesion2` int
,`idMedico` int
,`Medico_idMedico` int
,`NombreEspecialidad` varchar(45)
,`PApellido` varchar(45)
,`PNombre` varchar(45)
,`SApellido` varchar(45)
,`SNombre` varchar(45)
,`Telefono` int
,`TipoUsuario` int
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `perfilpaciente`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `perfilpaciente`;
CREATE TABLE IF NOT EXISTS `perfilpaciente` (
`Contraseña` varchar(255)
,`Correo` varchar(45)
,`Direccion` varchar(45)
,`FNacimiento` date
,`Genero` varchar(45)
,`idInicio_sesión` int
,`idPaciente` int
,`Medico_idMedico` int
,`Paciente_idPaciente` int
,`PApellido` varchar(45)
,`PNombre` varchar(45)
,`Religion` varchar(45)
,`SApellido` varchar(45)
,`SNombre` varchar(45)
,`Telefono` int
,`TipoUsuario` int
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `perfil_paciente`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `perfil_paciente`;
CREATE TABLE IF NOT EXISTS `perfil_paciente` (
`Direccion` varchar(45)
,`FNacimiento` date
,`Genero` varchar(45)
,`idPaciente` int
,`PApellido` varchar(45)
,`PNombre` varchar(45)
,`Religion` varchar(45)
,`SApellido` varchar(45)
,`SNombre` varchar(45)
,`Telefono` int
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

DROP TABLE IF EXISTS `receta`;
CREATE TABLE IF NOT EXISTS `receta` (
  `idReceta` int NOT NULL AUTO_INCREMENT,
  `Tratamiento` varchar(45) DEFAULT NULL,
  `Costo` int DEFAULT NULL,
  `Medico_idMedico` int NOT NULL,
  `Consulta_idConsulta` int NOT NULL,
  `Paciente_idPaciente` int NOT NULL,
  PRIMARY KEY (`idReceta`),
  KEY `fk_Receta_Medico1_idx` (`Medico_idMedico`),
  KEY `fk_Receta_Consulta1_idx` (`Consulta_idConsulta`),
  KEY `fk_Receta_Paciente1_idx` (`Paciente_idPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`idReceta`, `Tratamiento`, `Costo`, `Medico_idMedico`, `Consulta_idConsulta`, `Paciente_idPaciente`) VALUES
(1, 'Acetaminofen, 1 tableta por 12 horas', 150, 1, 1, 1),
(2, 'Antigripal, 1 tableta por cada 6 horas', 150, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura para la vista `listaconsulta`
--
DROP TABLE IF EXISTS `listaconsulta`;

DROP VIEW IF EXISTS `listaconsulta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listaconsulta`  AS  select concat(`p`.`PNombre`,' ',`p`.`PApellido`) AS `nombre`,`c`.`ClasificacionConsulta` AS `ClasificacionConsulta`,`c`.`DescripcionConsulta` AS `DescripcionConsulta`,`c`.`Fecha` AS `Fecha`,`c`.`Hora` AS `Hora` from (`consulta` `c` join `paciente` `p` on((`p`.`idPaciente` = `c`.`Paciente_idPaciente`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `login`
--
DROP TABLE IF EXISTS `login`;

DROP VIEW IF EXISTS `login`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login`  AS  select `p`.`idPaciente` AS `idPaciente`,`i`.`Correo` AS `Correo`,concat(`p`.`PNombre`,' ',`p`.`PApellido`) AS `Nombres`,`i`.`Contraseña` AS `Contraseña`,`i`.`TipoUsuario` AS `TipoUsuario` from (`paciente` `p` join `inicio_sesión` `i` on((`p`.`idPaciente` = `i`.`Paciente_idPaciente`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `login2`
--
DROP TABLE IF EXISTS `login2`;

DROP VIEW IF EXISTS `login2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login2`  AS  select `m`.`idMedico` AS `idMedico`,`i`.`Correo` AS `Correo`,concat(`m`.`PNombre`,' ',`m`.`PApellido`) AS `Nombres`,`i`.`Contraseña` AS `Contraseña`,`i`.`TipoUsuario` AS `TipoUsuario` from (`medico` `m` join `inicio_sesion2` `i` on((`m`.`idMedico` = `i`.`Medico_idMedico`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `perfilmedico`
--
DROP TABLE IF EXISTS `perfilmedico`;

DROP VIEW IF EXISTS `perfilmedico`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `perfilmedico`  AS  select `m`.`idMedico` AS `idMedico`,`m`.`PNombre` AS `PNombre`,`m`.`SNombre` AS `SNombre`,`m`.`PApellido` AS `PApellido`,`m`.`SApellido` AS `SApellido`,`m`.`Genero` AS `Genero`,`m`.`FNacimiento` AS `FNacimiento`,`m`.`Direccion` AS `Direccion`,`m`.`Telefono` AS `Telefono`,`m`.`NombreEspecialidad` AS `NombreEspecialidad`,`i`.`idinicio_sesion2` AS `idinicio_sesion2`,`i`.`Correo` AS `Correo`,`i`.`Contraseña` AS `Contraseña`,`i`.`TipoUsuario` AS `TipoUsuario`,`i`.`Medico_idMedico` AS `Medico_idMedico` from (`medico` `m` join `inicio_sesion2` `i` on((`m`.`idMedico` = `i`.`Medico_idMedico`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `perfilpaciente`
--
DROP TABLE IF EXISTS `perfilpaciente`;

DROP VIEW IF EXISTS `perfilpaciente`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `perfilpaciente`  AS  select `p`.`idPaciente` AS `idPaciente`,`p`.`PNombre` AS `PNombre`,`p`.`SNombre` AS `SNombre`,`p`.`PApellido` AS `PApellido`,`p`.`SApellido` AS `SApellido`,`p`.`Genero` AS `Genero`,`p`.`FNacimiento` AS `FNacimiento`,`p`.`Direccion` AS `Direccion`,`p`.`Telefono` AS `Telefono`,`p`.`Religion` AS `Religion`,`i`.`idInicio_sesión` AS `idInicio_sesión`,`i`.`Correo` AS `Correo`,`i`.`Contraseña` AS `Contraseña`,`i`.`TipoUsuario` AS `TipoUsuario`,`i`.`Paciente_idPaciente` AS `Paciente_idPaciente`,`i`.`Medico_idMedico` AS `Medico_idMedico` from (`paciente` `p` join `inicio_sesión` `i` on((`p`.`idPaciente` = `i`.`Paciente_idPaciente`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `perfil_paciente`
--
DROP TABLE IF EXISTS `perfil_paciente`;

DROP VIEW IF EXISTS `perfil_paciente`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `perfil_paciente`  AS  select `paciente`.`idPaciente` AS `idPaciente`,`paciente`.`PNombre` AS `PNombre`,`paciente`.`SNombre` AS `SNombre`,`paciente`.`PApellido` AS `PApellido`,`paciente`.`SApellido` AS `SApellido`,`paciente`.`Genero` AS `Genero`,`paciente`.`FNacimiento` AS `FNacimiento`,`paciente`.`Direccion` AS `Direccion`,`paciente`.`Telefono` AS `Telefono`,`paciente`.`Religion` AS `Religion` from `paciente` ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_Consulta_Medico1` FOREIGN KEY (`Medico_idMedico`) REFERENCES `medico` (`idMedico`),
  ADD CONSTRAINT `fk_Consulta_Paciente1` FOREIGN KEY (`Paciente_idPaciente`) REFERENCES `paciente` (`idPaciente`);

--
-- Filtros para la tabla `inicio_sesión`
--
ALTER TABLE `inicio_sesión`
  ADD CONSTRAINT `fk_Inicio_sesión_Medico1` FOREIGN KEY (`Medico_idMedico`) REFERENCES `medico` (`idMedico`),
  ADD CONSTRAINT `fk_Inicio_sesión_Paciente` FOREIGN KEY (`Paciente_idPaciente`) REFERENCES `paciente` (`idPaciente`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `fk_Receta_Consulta1` FOREIGN KEY (`Consulta_idConsulta`) REFERENCES `consulta` (`idConsulta`),
  ADD CONSTRAINT `fk_Receta_Medico1` FOREIGN KEY (`Medico_idMedico`) REFERENCES `medico` (`idMedico`),
  ADD CONSTRAINT `fk_Receta_Paciente1` FOREIGN KEY (`Paciente_idPaciente`) REFERENCES `paciente` (`idPaciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
