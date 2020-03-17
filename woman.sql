-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2017 a las 17:34:40
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `woman`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id_banco` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_banco`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id_banco`, `descripcion`) VALUES
(1, ' Banco Central de Venezuela'),
(2, 'Banco Industrial de Venezuela, C.A. Banco Universa'),
(3, ' Banco de Venezuela S.A.C.A. Banco Universal'),
(4, 'Venezolano de Crédito, S.A. Banco Universal'),
(5, 'Banco Mercantil, C.A S.A.C.A. Banco Universal'),
(6, 'Banco Provincial, S.A. Banco Universal'),
(7, 'Bancaribe C.A. Banco Universal'),
(8, 'Banco Exterior C.A. Banco Universal'),
(9, 'Banco Occidental de Descuento, Banco Universal C.A'),
(10, 'Banco Caroní C.A. Banco Universal'),
(11, 'Banesco Banco Universal S.A.C.A.'),
(12, 'Banco Sofitasa Banco Universal'),
(13, 'Banco Plaza Banco Universal'),
(14, 'Banco de la Gente Emprendedora C.A.'),
(15, 'Banco del Pueblo Soberano, C.A. Banco de Desarroll'),
(16, 'BFC Banco Fondo Común C.A Banco Universal'),
(17, '100% Banco, Banco Universal C.A.'),
(18, 'DelSur Banco Universal, C.A.'),
(19, 'Banco del Tesoro, C.A. Banco Universal'),
(20, 'Banco Agrícola de Venezuela, C.A. Banco Universal'),
(21, 'Bancrecer, S.A. Banco Microfinanciero'),
(22, 'Mi Banco Banco Microfinanciero C.A.'),
(23, 'Banco Activo, C.A. Banco Universal'),
(24, 'Bancamiga Banco Microfinanciero C.A.'),
(25, 'Banco Internacional de Desarrollo, C.A. Banco Univ'),
(26, 'Banplus Banco Universal, C.A.'),
(27, 'Banco Bicentenario Banco Universal C.A.'),
(28, 'Banco Espirito Santo, S.A. Sucursal Venezuela B.U.'),
(29, 'Banco de la Fuerza Armada Nacional Bolivariana, B.'),
(30, 'Banco Nacional de Crédito, C.A. Banco Universal'),
(31, 'Instituto Municipal de Crédito Popular'),
(32, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque_horas`
--

CREATE TABLE IF NOT EXISTS `bloque_horas` (
  `id_bloque` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  PRIMARY KEY (`id_bloque`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bloque_horas`
--

INSERT INTO `bloque_horas` (`id_bloque`, `hora_inicio`, `hora_fin`) VALUES
(001, '08:00:00', '12:00:00'),
(002, '02:00:00', '04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citados`
--

CREATE TABLE IF NOT EXISTS `citados` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_cursos_servicios` int(5) unsigned zerofill NOT NULL,
  `id_estudiantes` int(3) NOT NULL,
  `fecha_cita` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `citados`
--

INSERT INTO `citados` (`id`, `id_cursos_servicios`, `id_estudiantes`, `fecha_cita`) VALUES
(6, 00003, 1, '2016-10-30'),
(5, 00002, 1, '2016-10-30'),
(7, 00009, 1, '2016-10-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronograma_cursos`
--

CREATE TABLE IF NOT EXISTS `cronograma_cursos` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_cursos_servicios` int(5) unsigned zerofill NOT NULL,
  `id_bloque_horas` int(3) unsigned zerofill NOT NULL,
  `duracion` varchar(50) NOT NULL,
  `disponibilidad` int(3) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cronograma_cursos`
--

INSERT INTO `cronograma_cursos` (`id`, `fecha_inicio`, `fecha_fin`, `id_cursos_servicios`, `id_bloque_horas`, `duracion`, `disponibilidad`, `status`) VALUES
(00001, '2016-10-30', '2016-09-30', 00002, 001, '20 horas', 11, 1),
(00002, '2016-10-30', '2016-09-30', 00002, 002, '20 horas', 98, 1),
(00003, '2016-10-30', '2016-09-30', 00011, 001, '20 horas', 98, 1),
(00004, '2016-10-30', '2016-10-31', 00003, 001, '30 horas', 11, 1),
(00005, '2016-10-30', '2016-10-31', 00009, 002, '30 horas', 98, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_cabecera`
--

CREATE TABLE IF NOT EXISTS `cursos_cabecera` (
  `id` int(3) NOT NULL,
  `cedula` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `status` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos_cabecera`
--

INSERT INTO `cursos_cabecera` (`id`, `cedula`, `fecha`, `total`, `status`) VALUES
(1, 18137464, '2016-10-12', '1700.00', 'Abonar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_detalles`
--

CREATE TABLE IF NOT EXISTS `cursos_detalles` (
  `id_detalles` int(3) NOT NULL,
  `id_cursos_cabecera` int(3) NOT NULL,
  `id_cursos_servicios` int(5) unsigned zerofill NOT NULL,
  `id_cronograma` int(5) unsigned zerofill NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `status_pago` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_detalles`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos_detalles`
--

INSERT INTO `cursos_detalles` (`id_detalles`, `id_cursos_cabecera`, `id_cursos_servicios`, `id_cronograma`, `precio`, `status_pago`) VALUES
(2, 1, 00003, 00004, '800.00', 'Abonar'),
(1, 1, 00002, 00001, '700.00', 'Abonar'),
(3, 1, 00009, 00005, '200.00', 'Abonar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_servicios`
--

CREATE TABLE IF NOT EXISTS `cursos_servicios` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `cursos_servicios`
--

INSERT INTO `cursos_servicios` (`id`, `descripcion`, `codigo`, `precio`, `status`) VALUES
(00001, 'Seleccione', '0', '0.00', 1),
(00002, 'Cejas y Pestañas', '1', '700.00', 1),
(00003, 'Pigmentación De Cejas', '1', '800.00', 1),
(00004, 'Cejas Naturales', '2', '200.00', 1),
(00005, 'Cejas Semipermanentes', '2', '200.00', 1),
(00006, 'Pestañas Postizas', '2', '200.00', 1),
(00007, 'Depilación Corporal Bozo (Mujeres/Hombres)', '2', '200.00', 1),
(00008, 'Depilación Corporal Axilas (Mujeres/Hombres)', '2', '200.00', 1),
(00009, 'Depilación Corporal Ombligo (Mujeres)', '2', '200.00', 1),
(00010, 'Depilación Corporal Medias Piernas (Mujeres/hombres)', '2', '200.00', 1),
(00011, 'Depilación Corporal Brazos (Mujeres/Hombres)', '2', '800.00', 1),
(00012, 'Depilación Corporal Piernas Completas (Mujeres/Hombres)', '2', '200.00', 1),
(00013, 'Depilación Corporal Pecho (Hombres)', '2', '200.00', 1),
(00014, 'Depilación Corporal Abdomen (Hombres)', '2', '200.00', 1),
(00015, 'Depilación Corporal Espalda (Hombres)', '2', '200.00', 1),
(00016, 'Sesión de Microdermoabrasión', '2', '200.00', 1),
(00017, 'Sesión de Radiofrecuencia', '2', '200.00', 1),
(00018, 'Limpieza Profunda', '2', '200.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `cedula`, `apellidos`, `nombres`, `telefono`, `direccion`, `correo`) VALUES
(1, '18137464', 'Alvarez', 'Maria Magdalena', '04145762817', 'santa rosalia', 'marialva1705@hotmail.com'),
(2, '178955555', 'nmnmnmn', 'mnmnmnmmm', '874444', 'jjjjjjj', 'marialva1705@hotmail.com'),
(3, '147895877', 'Alvarez Balbuena', 'LLLL', '444444', 'Santa Rosalia', 'dkdkkdkd@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `vinculo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_usuario` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `descripcion`, `vinculo`, `nivel_usuario`) VALUES
(1, 'Formalizar Inscripción', 'http://localhost/woman/#/estudiantes', 2),
(2, 'Reservar cupos para Servicios', 'http://localhost/woman/#/reservaciones', 2),
(3, 'Descargar Clases', 'http://localhost/woman/', 2),
(4, 'Cursos y Servicios', 'http://localhost/woman/', 1),
(5, 'Cronograma de Cursos', 'http://localhost/woman/', 1),
(6, 'Listado de Cursos', 'http://localhost/woman/', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `menu_users`
--
CREATE TABLE IF NOT EXISTS `menu_users` (
`email` varchar(100)
,`descripcion` varchar(100)
,`vinculo` varchar(150)
,`nivel` int(1)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `menu_usuarios`
--
CREATE TABLE IF NOT EXISTS `menu_usuarios` (
`email` varchar(100)
,`descripcion` varchar(100)
,`vinculo` varchar(150)
,`nivel` int(1)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE IF NOT EXISTS `prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `entidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `localizacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_entidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`id`, `nombres`, `apellidos`, `entidad`, `localizacion`, `direccion`, `tipo_entidad`, `especialidad`, `telefono`) VALUES
(30, 'mmm', 'mmmm', 'mmmm', '1', 'mmmmm', '1', 'mmmmm', '888');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_pagos`
--

CREATE TABLE IF NOT EXISTS `registros_pagos` (
  `id_registros_pagos` int(3) NOT NULL AUTO_INCREMENT,
  `id_bancos` int(3) NOT NULL,
  `n_referencia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_cursos_detalles` int(3) NOT NULL,
  `monto` decimal(8,2) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_registros_pagos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `registros_pagos`
--

INSERT INTO `registros_pagos` (`id_registros_pagos`, `id_bancos`, `n_referencia`, `descripcion`, `id_cursos_detalles`, `monto`, `fecha`) VALUES
(17, 16, '88888', 'Transferencia', 3, '60.00', '2016-10-14'),
(16, 13, '88888', 'Transferencia', 2, '240.00', '2016-10-13'),
(15, 19, '7777', 'Transferencia', 1, '210.00', '2016-10-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '2',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nivel`, `created_at`) VALUES
(1, 'mmab1705@hotmail.com', '123456', 1, '2016-03-14 15:53:32'),
(2, 'marialva1705@gmail.com', '170586', 2, '2016-03-14 22:04:02'),
(3, 'mmab1705@hotmail.com', '1234567', 2, '2016-03-15 22:46:59');

-- --------------------------------------------------------

--
-- Estructura para la vista `menu_users`
--
DROP TABLE IF EXISTS `menu_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u804920679_woman`@`localhost` SQL SECURITY DEFINER VIEW `menu_users` AS select `users`.`email` AS `email`,`menus`.`descripcion` AS `descripcion`,`menus`.`vinculo` AS `vinculo`,`menus`.`nivel_usuario` AS `nivel` from (`users` join `menus` on((`users`.`nivel` = `menus`.`nivel_usuario`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `menu_usuarios`
--
DROP TABLE IF EXISTS `menu_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `menu_usuarios` AS select `users`.`email` AS `email`,`menus`.`descripcion` AS `descripcion`,`menus`.`vinculo` AS `vinculo`,`menus`.`nivel_usuario` AS `nivel` from (`users` join `menus` on((`menus`.`nivel_usuario` = `users`.`nivel`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
