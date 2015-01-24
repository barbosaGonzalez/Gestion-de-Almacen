-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2014 a las 03:43:09
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_producto`
--

CREATE TABLE IF NOT EXISTS `almacen_producto` (
  `codigo_producto` int(7) NOT NULL COMMENT 'codigo de identificacion del producto.',
  `detalle_prod` varchar(50) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'caracteristicas referidas al producto. ',
  `fec_elab` date NOT NULL COMMENT 'fecha de elaboracion del producto',
  `fec_vec` date NOT NULL COMMENT 'fecha del vencimiento del producto.',
  `ubicacion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Ubicacion fisica del producto',
  `precio_costo` float NOT NULL COMMENT 'Precio costo del producto',
  `marca` varchar(20) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'marca del producto',
  `code_provedor` int(7) NOT NULL COMMENT 'provedor de mercaderias',
  `precio_venta` float NOT NULL COMMENT 'precio de venta al publico',
  `stock` int(7) NOT NULL,
  `minimo` int(7) NOT NULL,
  PRIMARY KEY (`codigo_producto`),
  KEY `detalle_prod` (`detalle_prod`,`fec_elab`,`fec_vec`),
  KEY `ubicacion` (`ubicacion`),
  KEY `precio_unit` (`precio_costo`),
  KEY `marca` (`marca`),
  KEY `provedor` (`code_provedor`),
  KEY `precio_venta` (`precio_venta`),
  KEY `stock` (`stock`),
  KEY `minimo` (`minimo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `almacen_producto`
--

INSERT INTO `almacen_producto` (`codigo_producto`, `detalle_prod`, `fec_elab`, `fec_vec`, `ubicacion`, `precio_costo`, `marca`, `code_provedor`, `precio_venta`, `stock`, `minimo`) VALUES
(1, 'Vino Tinto', '2014-08-04', '2015-01-14', 'Deposito 5', 15, 'Misionero', 3, 20, 30, 10),
(2, 'Amargo', '2014-02-04', '2015-04-13', 'Deposito 5', 9, 'Terma', 2, 20, 20, 10),
(3, 'Arroz', '2014-09-02', '2016-07-30', 'Almacen', 6, 'Gallo', 1, 12, 22, 10),
(4, 'Papel higienico', '2014-05-15', '2016-07-15', 'deposito 10', 9, 'higienol', 4, 12, 15, 10),
(5, 'Fideos Lucheti', '2014-09-01', '2015-01-01', 'Deposito 4', 10, 'Lucheti', 3, 15, 35, 10),
(6, 'Jugos', '2014-02-02', '2015-08-13', 'deposito 3', 2, 'Tang', 2, 3, 20, 10),
(7, 'Jabon Matic', '2014-09-01', '2014-11-29', 'Almacen', 22, 'Ala', 2, 26, 15, 10),
(10, 'Bebida energizante', '2014-06-16', '2015-06-04', 'Deposito 4', 9, 'Gatorade', 4, 15, 7, 10),
(11, 'Maquina de afeitar', '2014-05-13', '2016-08-12', 'Deposito 5', 4, 'Minora', 4, 7, 40, 10),
(13, 'Sobrecito de shampo', '2014-08-11', '2015-07-17', 'Deposito 5', 1, 'Sedal', 5, 3, 30, 10),
(14, 'Sobrecito de enjuage', '2014-08-11', '2015-07-17', 'Deposito 5', 1, 'Sedal', 5, 3, 30, 10),
(20, 'Harina 0000', '0002-05-12', '0003-07-14', 'Deposito 4', 5, 'Pureza', 4, 7, 35, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extraccion`
--

CREATE TABLE IF NOT EXISTS `extraccion` (
  `num_ext` int(7) NOT NULL,
  `codigo_producto` int(7) NOT NULL,
  `fecha_ext` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cantidad_ext` int(7) NOT NULL,
  PRIMARY KEY (`num_ext`),
  KEY `resposable` (`codigo_producto`,`fecha_ext`,`cantidad_ext`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `extraccion`
--

INSERT INTO `extraccion` (`num_ext`, `codigo_producto`, `fecha_ext`, `cantidad_ext`) VALUES
(1, 1, '2014-11-01 00:41:05', 20),
(2, 3, '2014-11-01 00:41:34', 2),
(3, 10, '2014-11-01 00:42:48', 25),
(4, 20, '2014-11-01 05:11:34', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_de_compra`
--

CREATE TABLE IF NOT EXISTS `orden_de_compra` (
  `cod_orden` int(6) NOT NULL AUTO_INCREMENT,
  `code_provedor` int(7) NOT NULL,
  `fecha_orden` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_orden`),
  KEY `codigo_producto` (`code_provedor`,`fecha_orden`),
  KEY `code_provedor` (`code_provedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `orden_de_compra`
--

INSERT INTO `orden_de_compra` (`cod_orden`, `code_provedor`, `fecha_orden`) VALUES
(45, 1, '2014-10-31 21:21:16'),
(44, 2, '2014-10-31 15:06:08'),
(46, 3, '2014-11-01 03:02:36'),
(47, 3, '2014-11-01 03:02:50'),
(48, 3, '2014-11-01 03:05:53'),
(49, 4, '2014-11-01 03:23:59'),
(50, 4, '2014-11-01 03:26:12'),
(51, 4, '2014-11-01 03:27:55'),
(52, 4, '2014-11-01 03:29:33'),
(53, 4, '2014-11-01 03:33:42'),
(55, 4, '2014-11-01 05:11:15'),
(54, 5, '2014-11-01 03:34:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_de_devolucion`
--

CREATE TABLE IF NOT EXISTS `orden_de_devolucion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_remito` int(7) NOT NULL COMMENT 'número de factura',
  `cantidad_rechazada` int(11) NOT NULL,
  `motivo_de_rechazo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_de_devolucion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha de devolucion del producto',
  PRIMARY KEY (`id`),
  KEY `fecha_entr` (`num_remito`),
  KEY `cantidad_rechazada` (`cantidad_rechazada`),
  KEY `motivo_de_rechazo` (`motivo_de_rechazo`),
  KEY `fecha_de_devolucion` (`fecha_de_devolucion`),
  KEY `num_factura` (`num_remito`),
  KEY `motivo_de_rechazo_2` (`motivo_de_rechazo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `orden_de_devolucion`
--

INSERT INTO `orden_de_devolucion` (`id`, `num_remito`, `cantidad_rechazada`, `motivo_de_rechazo`, `fecha_de_devolucion`) VALUES
(5, 9, 3, 'asdsads', '2014-10-31 22:13:22'),
(6, 9, 2, '2', '2014-10-31 22:16:59'),
(7, 9, 2, '2', '2014-10-31 22:17:44'),
(8, 9, 2, '2', '2014-10-31 22:19:20'),
(9, 9, 4, '2', '2014-10-31 22:19:51'),
(10, 9, 4, '2', '2014-10-31 22:19:56'),
(11, 9, 1, 'fadfdfasdf', '2014-10-31 22:20:46'),
(12, 9, 3, 'fasadas', '2014-10-31 22:22:04'),
(13, 9, 2, '12', '2014-10-31 22:22:56'),
(14, 9, 7, '1', '2014-10-31 22:23:04'),
(15, 10, 2, '12', '2014-10-31 22:23:52'),
(16, 10, 5, 'qrw', '2014-10-31 22:25:49'),
(17, 11, 4, 'sdfhgjbkn', '2014-10-31 22:29:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_producto`
--

CREATE TABLE IF NOT EXISTS `orden_producto` (
  `id_orden_producto` int(7) NOT NULL AUTO_INCREMENT,
  `cod_orden` int(7) NOT NULL,
  `cantidad` int(7) NOT NULL,
  `detalle` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_producto` int(7) NOT NULL,
  PRIMARY KEY (`id_orden_producto`),
  KEY `code_provedor` (`cantidad`,`detalle`),
  KEY `codigo_producto` (`codigo_producto`),
  KEY `cod_orden` (`cod_orden`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=81 ;

--
-- Volcado de datos para la tabla `orden_producto`
--

INSERT INTO `orden_producto` (`id_orden_producto`, `cod_orden`, `cantidad`, `detalle`, `codigo_producto`) VALUES
(45, 46, 5, '', 1),
(46, 47, 10, '', 1),
(47, 48, 5, '', 1),
(48, 48, 10, '', 1),
(49, 49, 2, '', 2),
(50, 49, 2, '', 2),
(51, 49, 2, '', 2),
(52, 49, 2, '', 2),
(53, 49, 1, '', 1),
(54, 50, 2, '', 2),
(55, 50, 2, '', 2),
(56, 50, 2, '', 2),
(57, 50, 2, '', 1),
(58, 50, 2, '', 3),
(59, 50, 2, '', 2),
(60, 51, 2, '', 1),
(61, 51, 2, '', 1),
(62, 51, 2, '', 1),
(63, 51, 2, '', 1),
(64, 51, 2, '', 1),
(65, 51, 2, '', 1),
(66, 51, 2, '', 2),
(67, 52, 2, '', 1),
(68, 52, 2, '', 2),
(69, 52, 2, '', 1),
(70, 52, 2, '', 3),
(71, 52, 2, '', 3),
(72, 52, 2, '', 1),
(73, 52, 2, '', 4),
(74, 52, 4, '', 4),
(75, 52, 2, '', 10),
(76, 53, 2, '', 10),
(77, 53, 3, '', 4),
(78, 53, 2, '', 11),
(79, 54, 2, '', 14),
(80, 55, 10, '', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE IF NOT EXISTS `provedores` (
  `code_provedor` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(30) NOT NULL,
  `correo_electronico` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `marca_prov` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`code_provedor`),
  KEY `nombre` (`nombre`,`telefono`,`correo_electronico`,`direccion`,`marca_prov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`code_provedor`, `nombre`, `telefono`, `correo_electronico`, `direccion`, `marca_prov`) VALUES
(3, 'Andres Castillo', 154789620, 'andres17@hotmail.com', 'Pampa 740', 'Hellman'),
(4, 'Juan Jose', 15458979, 'juancho@yahoo.com.ar', 'Real del padre', 'Taragui'),
(5, 'Nestor', 154781236, 'nestor@hotmail.com', 'San luis 720', 'Lumilagro'),
(1, 'Oracio', 2147483647, 'oracio19@gmail.com', 'emilio mitre', 'ledesma'),
(2, 'San Martin', 787987985, 'Sanmartin@hotmail.com', 'los andes', 'La andalusia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remito`
--

CREATE TABLE IF NOT EXISTS `remito` (
  `num_remito` int(7) NOT NULL COMMENT 'número de factura',
  `fecha_entr` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de entrada del producto',
  `codigo_producto` int(7) NOT NULL COMMENT 'Código de identificación del producto',
  `cant_ingr` int(5) NOT NULL COMMENT 'Cantidad que ingresa',
  `estado` varchar(30) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'pendiente',
  PRIMARY KEY (`num_remito`),
  KEY `fecha_entr` (`fecha_entr`,`codigo_producto`,`cant_ingr`),
  KEY `codigo_producto` (`codigo_producto`),
  KEY `estado` (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `remito`
--

INSERT INTO `remito` (`num_remito`, `fecha_entr`, `codigo_producto`, `cant_ingr`, `estado`) VALUES
(5, '2014-10-31 21:48:41', 1, 21, 'ingresado'),
(6, '2014-10-31 21:49:57', 3, 12, 'ingresado'),
(7, '2014-10-31 21:50:38', 5, 12, 'ingresado'),
(8, '2014-10-31 21:54:55', 1, 2, 'ingresado'),
(9, '2014-10-31 21:55:48', 3, 0, 'ingresado'),
(10, '2014-10-31 22:23:37', 2, 5, 'devolucion'),
(11, '2014-10-31 22:28:53', 5, 8, 'devolucion'),
(12, '2014-10-31 22:35:50', 1, 123, 'ingresado'),
(13, '2014-10-31 23:12:50', 2, 20, 'ingresado'),
(14, '2014-10-31 23:13:12', 2, 20, 'ingresado'),
(15, '2014-11-01 20:22:11', 20, 15, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`usuario`),
  UNIQUE KEY `id` (`id`),
  KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nombre`, `usuario`, `pass`, `correo`) VALUES
(16, 'Adrina', 'adrina', '123', 'a@yahoo.com'),
(10, 'Anonimo', 'anonimo', 'qwerty', 'a.a@yahoo.com'),
(2, 'Gabriel', 'Gabriel', 'Caceres', 'gabi@hotmail.com'),
(17, 'Leonel Ortega', 'leo', '123456', 'leonelorteega@gmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen_producto`
--
ALTER TABLE `almacen_producto`
  ADD CONSTRAINT `almacen_producto_ibfk_1` FOREIGN KEY (`code_provedor`) REFERENCES `provedores` (`code_provedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `extraccion`
--
ALTER TABLE `extraccion`
  ADD CONSTRAINT `extraccion_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `almacen_producto` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_de_compra`
--
ALTER TABLE `orden_de_compra`
  ADD CONSTRAINT `orden_de_compra_ibfk_1` FOREIGN KEY (`code_provedor`) REFERENCES `almacen_producto` (`code_provedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_de_devolucion`
--
ALTER TABLE `orden_de_devolucion`
  ADD CONSTRAINT `orden_de_devolucion_ibfk_1` FOREIGN KEY (`num_remito`) REFERENCES `remito` (`num_remito`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  ADD CONSTRAINT `orden_producto_ibfk_3` FOREIGN KEY (`codigo_producto`) REFERENCES `almacen_producto` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_producto_ibfk_4` FOREIGN KEY (`cod_orden`) REFERENCES `orden_de_compra` (`cod_orden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `remito`
--
ALTER TABLE `remito`
  ADD CONSTRAINT `remito_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `almacen_producto` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
