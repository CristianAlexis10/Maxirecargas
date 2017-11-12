-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2017 a las 21:53:02
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `maxirecargas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `token` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `acc_contra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`token`, `usu_codigo`, `acc_contra`) VALUES
(1459, 2, '$2y$10$B0oW6VvOir/2csaOVnSKzOsPZU2qvMoS19l96ZXu4Xi3R7Ek4JLU6'),
(2545, 1, '$2y$10$wmvbdt6FIosmu7p5rVySbu02cetXQq.u/KroYXcskpAFHE96FbpWG'),
(2546, 3, '$2y$10$N6XWbuyHfxyYfC1lRUMMD.L0FMTxzeoNGm4.3kXVCbO1kwBqPqGeW'),
(2553, 16, '$2y$10$Kh8pl8II4xfUETvZcWRO4.3oaGqLEA7Fxrlhn1lJe2SMD8/JGxxdy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `ciu_nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `id_departamento`, `ciu_nombre`) VALUES
(1, 1, 'Medellin'),
(2, 2, 'Bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_empresarial`
--

CREATE TABLE `cliente_empresarial` (
  `id_cliente_empresarial` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `sed_codigo` int(11) NOT NULL,
  `cli_emp_cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente_empresarial`
--

INSERT INTO `cliente_empresarial` (`id_cliente_empresarial`, `usu_codigo`, `sed_codigo`, `cli_emp_cargo`) VALUES
(1, 1, 1, 'Supervisor'),
(2, 2, 2, 'Supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `cot_codigo` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `mar_codigo` int(50) NOT NULL,
  `cot_tipo_solicitud` varchar(500) NOT NULL,
  `cot_cantidad` int(11) NOT NULL,
  `cot_referencia` varchar(100) NOT NULL,
  `cot_telefono` int(11) NOT NULL,
  `cot_correo` varchar(100) NOT NULL,
  `cot_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`cot_codigo`, `usu_codigo`, `mar_codigo`, `cot_tipo_solicitud`, `cot_cantidad`, `cot_referencia`, `cot_telefono`, `cot_correo`, `cot_fecha`) VALUES
(1, 1, 1, 'Recargas', 12, 'Impresora', 2114548, 'hola@gmail.com', '2017-11-06'),
(2, 2, 2, 'Remanufactura', 5, 'Toner', 4502145, 'nada@gmail.com', '2017-11-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `dep_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `id_pais`, `dep_nombre`) VALUES
(1, 1, 'Antioquia'),
(2, 1, 'Cundinamarca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `emp_codigo` int(11) NOT NULL,
  `sed_codigo` int(11) NOT NULL,
  `emp_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`emp_codigo`, `sed_codigo`, `emp_nombre`) VALUES
(1, 1, 'Bancolombia'),
(2, 2, 'Exito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `est_estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `est_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `ite_codigo` int(11) NOT NULL,
  `mar_codigo` int(11) NOT NULL,
  `ser_codigo` int(11) NOT NULL,
  `ite_tip_item` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`ite_codigo`, `mar_codigo`, `ser_codigo`, `ite_tip_item`) VALUES
(1, 1, 1, NULL),
(2, 2, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `mar_codigo` int(11) NOT NULL,
  `mar_nombre` varchar(50) NOT NULL,
  `mar_descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`mar_codigo`, `mar_nombre`, `mar_descripcion`) VALUES
(1, 'HP', 'sad'),
(2, 'Epson', 'epson des');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `mod_nombre` varchar(45) DEFAULT NULL,
  `enlace` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `mod_nombre`, `enlace`, `icon`) VALUES
(1, 'clientes', 'clientes', '<i class="fa fa-users" aria-hidden="true"></i>'),
(2, 'productos', 'productos', '<i class="fa fa-shopping-cart" aria-hidden="true"></i>'),
(3, 'Pedidos', 'pedidos', '<i class="fa fa-bullhorn" aria-hidden="true"></i>'),
(4, 'cotizacion', 'cotizacion', '<i class="fa fa-wrench" aria-hidden="true"></i>'),
(5, 'Rutas', 'rutas', '<i class="fa fa-motorcycle" aria-hidden="true"></i>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `pai_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `pai_nombre`) VALUES
(1, 'Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ped_codigo` int(11) NOT NULL,
  `ped_direccion` varchar(200) NOT NULL,
  `ped_correo` varchar(100) NOT NULL,
  `ped_fecha` date NOT NULL,
  `emp_codigo` int(11) DEFAULT NULL,
  `tip_ped_codigo` int(11) DEFAULT NULL,
  `ped_estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ped_codigo`, `ped_direccion`, `ped_correo`, `ped_fecha`, `emp_codigo`, `tip_ped_codigo`, `ped_estado`) VALUES
(1, 'Calle 45', 'nada@gmail.com', '2017-08-14', 1, 1, 'En camino'),
(2, 'Carrera 56', 'hola@gmail.com', '2017-10-23', 2, 1, 'En espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoxproducto`
--

CREATE TABLE `pedidoxproducto` (
  `ped_codigo` int(11) NOT NULL,
  `ite_codigo` int(11) NOT NULL,
  `pedxpro_cantidad` int(11) NOT NULL,
  `pedxpro_valor_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidoxproducto`
--

INSERT INTO `pedidoxproducto` (`ped_codigo`, `ite_codigo`, `pedxpro_cantidad`, `pedxpro_valor_total`) VALUES
(1, 1, 5, 100000),
(2, 2, 3, 50000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `tip_usu_codigo` int(11) NOT NULL,
  `per_crear` int(1) NOT NULL,
  `per_modificar` int(1) NOT NULL,
  `per_eliminar` int(1) NOT NULL,
  `per_buscar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `id_modulo`, `tip_usu_codigo`, `per_crear`, `per_modificar`, `per_eliminar`, `per_buscar`) VALUES
(1, 1, 2, 1, 1, 1, 1),
(2, 2, 2, 1, 1, 1, 1),
(3, 3, 2, 1, 1, 1, 1),
(4, 4, 2, 1, 1, 1, 1),
(6, 5, 2, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ite_codigo` int(11) NOT NULL,
  `tip_pro_codigo` int(11) NOT NULL,
  `pro_referencia` varchar(100) DEFAULT NULL,
  `pro_descripcion` varchar(100) DEFAULT NULL,
  `pro_imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ite_codigo`, `tip_pro_codigo`, `pro_referencia`, `pro_descripcion`, `pro_imagen`) VALUES
(1, 2, 'gst234', 'Lorem Ipsum', 'nada.png'),
(2, 1, 'dye746', 'Lorem Ipsum', 'gsydgs.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prodxcot`
--

CREATE TABLE `prodxcot` (
  `ite_codigo` int(11) NOT NULL,
  `cot_codigo` int(11) NOT NULL,
  `proxcot_cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prodxcot`
--

INSERT INTO `prodxcot` (`ite_codigo`, `cot_codigo`, `proxcot_cantidad`) VALUES
(1, 1, 10),
(2, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `rep_codigo` int(11) NOT NULL,
  `ped_codigo` int(11) NOT NULL,
  `rep_observacion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`rep_codigo`, `ped_codigo`, `rep_observacion`) VALUES
(1, 1, 'No han cumplido con lo pedido'),
(2, 2, 'Se han tardado mucho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `rut_codigo` int(11) NOT NULL,
  `rut_direccion` varchar(200) NOT NULL,
  `rut_fecha` date NOT NULL,
  `rut_observaciones` varchar(100) NOT NULL,
  `rut_estado` varchar(100) NOT NULL,
  `usu_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`rut_codigo`, `rut_direccion`, `rut_fecha`, `rut_observaciones`, `rut_estado`, `usu_codigo`) VALUES
(1, 'Calle 45', '2017-09-08', 'Necesita un mantenimiento para impresora', 'En espera', 3),
(2, 'Carrera 65', '2017-09-18', 'Productos Toner', 'En camino', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `sed_codigo` int(11) NOT NULL,
  `sed_nombre` varchar(50) NOT NULL,
  `sed_direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`sed_codigo`, `sed_nombre`, `sed_direccion`) VALUES
(1, 'Mayorca', 'Calle 45'),
(2, 'Alpujarra', 'Carrera 56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `ser_codigo` int(11) NOT NULL,
  `item_codigo` int(11) NOT NULL,
  `Tip_ser_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`ser_codigo`, `item_codigo`, `Tip_ser_cod`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `sto_codigo` int(11) NOT NULL,
  `sto_cantidad` int(100) NOT NULL,
  `sto_valor_compra` int(255) NOT NULL,
  `sto_valor_venta` int(255) NOT NULL,
  `ite_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`sto_codigo`, `sto_cantidad`, `sto_valor_compra`, `sto_valor_venta`, `ite_codigo`) VALUES
(1, 100, 250000, 100000, 1),
(2, 50, 200000, 120000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `tip_doc_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo_documento`, `tip_doc_nombre`) VALUES
(1, 'Cedula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pedido`
--

CREATE TABLE `tipo_pedido` (
  `tip_ped_codigo` int(11) NOT NULL,
  `tip_ped_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_pedido`
--

INSERT INTO `tipo_pedido` (`tip_ped_codigo`, `tip_ped_nombre`) VALUES
(1, 'Recarga'),
(2, 'Toner');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `tip_pro_codigo` int(11) NOT NULL,
  `tip_pro_nombre` varchar(20) NOT NULL,
  `tip_pro_descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`tip_pro_codigo`, `tip_pro_nombre`, `tip_pro_descripcion`) VALUES
(1, 'Computador HP', 'desp\r\n'),
(2, 'Impresora HP', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `Tip_ser_cod` int(11) NOT NULL,
  `tip_ser_nombre` varchar(50) NOT NULL,
  `tip_ser_descripcion` longtext NOT NULL,
  `tip_ser_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`Tip_ser_cod`, `tip_ser_nombre`, `tip_ser_descripcion`, `tip_ser_registro`) VALUES
(1, 'Recargas', 'sad', '2017-11-04'),
(2, 'Mantenimiento', 'sad', '2017-11-04'),
(7, 'dssad', 'dsa', '2017-11-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `tip_usu_codigo` int(11) NOT NULL,
  `tip_usu_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`tip_usu_codigo`, `tip_usu_rol`) VALUES
(1, 'Usuario'),
(2, 'Administrador'),
(3, 'Cliente empresarial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_codigo` int(11) NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `usu_num_documento` int(11) NOT NULL,
  `usu_primer_nombre` varchar(50) NOT NULL,
  `usu_segundo_nombre` varchar(50) NOT NULL,
  `usu_primer_apellido` varchar(50) NOT NULL,
  `usu_segundo_apellido` varchar(50) NOT NULL,
  `usu_correo` varchar(100) NOT NULL,
  `usu_telefono` int(10) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `usu_direccion` varchar(200) NOT NULL,
  `usu_celular` int(20) NOT NULL,
  `usu_fecha_nacimiento` date NOT NULL,
  `usu_sexo` varchar(50) NOT NULL,
  `tip_usu_codigo` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `usu_foto` longtext NOT NULL,
  `usu_fechas_registro` date NOT NULL,
  `usu_ult_inicio_sesion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `id_tipo_documento`, `usu_num_documento`, `usu_primer_nombre`, `usu_segundo_nombre`, `usu_primer_apellido`, `usu_segundo_apellido`, `usu_correo`, `usu_telefono`, `id_ciudad`, `usu_direccion`, `usu_celular`, `usu_fecha_nacimiento`, `usu_sexo`, `tip_usu_codigo`, `id_estado`, `usu_foto`, `usu_fechas_registro`, `usu_ult_inicio_sesion`) VALUES
(1, 1, 1214, 'Cristian', 'Alexis', 'Lopera', 'Bedoya', 'sfsaf', 34324, 1, '34324', 324324, '2017-11-22', 'masculino', 3, 1, '', '2017-11-05', '0000-00-00'),
(2, 1, 1234, 'Yulieth ', 'Evelin', 'Zapata', 'Herrera', 'das', 659, 1, 'dssd', 6596, '2017-11-01', 'femenino', 2, 1, '', '2017-11-02', '0000-00-00'),
(3, 1, 1026, 'Estefania', '', 'Tapias', 'Isaza', 'asdsadsdas', 2132, 1, '21323', 213213, '2017-11-09', 'femenino', 2, 1, '', '2017-11-02', '2017-11-01'),
(16, 1, 990420, 'Cristian', '', 'Lopera', '', 'aa@dd', 888, 1, '', 0, '2017-11-11', 'femenino', 2, 1, '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioxpedido`
--

CREATE TABLE `usuarioxpedido` (
  `usu_codigo` int(11) NOT NULL,
  `ped_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarioxpedido`
--

INSERT INTO `usuarioxpedido` (`usu_codigo`, `ped_codigo`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuxemp`
--

CREATE TABLE `usuxemp` (
  `usu_codigo` int(11) NOT NULL,
  `emp_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuxemp`
--

INSERT INTO `usuxemp` (`usu_codigo`, `emp_codigo`) VALUES
(1, 2),
(3, 1),
(1, 2),
(3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`token`),
  ADD KEY `fk_acceso_usuario1_idx` (`usu_codigo`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `fk_ciudad_departamento1_idx` (`id_departamento`);

--
-- Indices de la tabla `cliente_empresarial`
--
ALTER TABLE `cliente_empresarial`
  ADD PRIMARY KEY (`id_cliente_empresarial`),
  ADD KEY `fk_cliente_empresarial_usuario1_idx` (`usu_codigo`),
  ADD KEY `fk_cliente_empresarial_sede1_idx` (`sed_codigo`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`cot_codigo`),
  ADD KEY `usu_id` (`usu_codigo`),
  ADD KEY `mar_codigo` (`mar_codigo`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `fk_departamento_pais1_idx` (`id_pais`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`emp_codigo`),
  ADD KEY `sed_id` (`sed_codigo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ite_codigo`,`ser_codigo`),
  ADD KEY `mar_codigo` (`mar_codigo`),
  ADD KEY `fk_item_servicio1_idx` (`ser_codigo`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`mar_codigo`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ped_codigo`),
  ADD KEY `emp_id` (`emp_codigo`),
  ADD KEY `tip_id` (`tip_ped_codigo`),
  ADD KEY `tip_ped_codigo` (`tip_ped_codigo`);

--
-- Indices de la tabla `pedidoxproducto`
--
ALTER TABLE `pedidoxproducto`
  ADD PRIMARY KEY (`ped_codigo`,`ite_codigo`),
  ADD KEY `pro_id` (`ite_codigo`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `fk_permiso_modulos1_idx` (`id_modulo`),
  ADD KEY `fk_permiso_tipo_usuario1_idx` (`tip_usu_codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ite_codigo`),
  ADD KEY `fk_producto_tipo_producto1_idx` (`tip_pro_codigo`);

--
-- Indices de la tabla `prodxcot`
--
ALTER TABLE `prodxcot`
  ADD KEY `pro_codigo` (`ite_codigo`),
  ADD KEY `cot_codigo` (`cot_codigo`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`rep_codigo`),
  ADD KEY `ped_id` (`ped_codigo`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`rut_codigo`),
  ADD KEY `fk_ruta_usuario1_idx` (`usu_codigo`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`sed_codigo`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`ser_codigo`),
  ADD KEY `item_codigo` (`item_codigo`),
  ADD KEY `fk_servicio_Tipo_servicio1_idx` (`Tip_ser_cod`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`sto_codigo`),
  ADD KEY `fk_stock_item1_idx` (`ite_codigo`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `tipo_pedido`
--
ALTER TABLE `tipo_pedido`
  ADD PRIMARY KEY (`tip_ped_codigo`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`tip_pro_codigo`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`Tip_ser_cod`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`tip_usu_codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD KEY `tip_usu` (`tip_usu_codigo`),
  ADD KEY `fk_usuario_ciudad1_idx` (`id_ciudad`),
  ADD KEY `fk_usuario_estado1_idx` (`id_estado`),
  ADD KEY `fk_usuario_tipo_documento1_idx` (`id_tipo_documento`);

--
-- Indices de la tabla `usuarioxpedido`
--
ALTER TABLE `usuarioxpedido`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD KEY `ped_codigo` (`ped_codigo`);

--
-- Indices de la tabla `usuxemp`
--
ALTER TABLE `usuxemp`
  ADD KEY `usu_codigo` (`usu_codigo`),
  ADD KEY `emp_codigo` (`emp_codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2554;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cliente_empresarial`
--
ALTER TABLE `cliente_empresarial`
  MODIFY `id_cliente_empresarial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `cot_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `emp_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `ite_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `mar_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ped_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pedidoxproducto`
--
ALTER TABLE `pedidoxproducto`
  MODIFY `ped_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ite_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `prodxcot`
--
ALTER TABLE `prodxcot`
  MODIFY `ite_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `rep_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `rut_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `sed_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `ser_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `sto_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_pedido`
--
ALTER TABLE `tipo_pedido`
  MODIFY `tip_ped_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `tip_pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `Tip_ser_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `tip_usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_ciudad_departamento1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente_empresarial`
--
ALTER TABLE `cliente_empresarial`
  ADD CONSTRAINT `fk_cliente_empresarial_sede1` FOREIGN KEY (`sed_codigo`) REFERENCES `sede` (`sed_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_empresarial_usuario1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`mar_codigo`) REFERENCES `marca` (`mar_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_pais1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`sed_codigo`) REFERENCES `sede` (`sed_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_servicio1` FOREIGN KEY (`ser_codigo`) REFERENCES `servicio` (`ser_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`mar_codigo`) REFERENCES `marca` (`mar_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`tip_ped_codigo`) REFERENCES `tipo_pedido` (`tip_ped_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_5` FOREIGN KEY (`emp_codigo`) REFERENCES `empresa` (`emp_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidoxproducto`
--
ALTER TABLE `pedidoxproducto`
  ADD CONSTRAINT `pedidoxproducto_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidoxproducto_ibfk_2` FOREIGN KEY (`ite_codigo`) REFERENCES `item` (`ite_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `fk_permiso_modulos1` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permiso_tipo_usuario1` FOREIGN KEY (`tip_usu_codigo`) REFERENCES `tipo_usuario` (`tip_usu_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_item1` FOREIGN KEY (`ite_codigo`) REFERENCES `item` (`ite_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_tipo_producto1` FOREIGN KEY (`tip_pro_codigo`) REFERENCES `tipo_producto` (`tip_pro_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prodxcot`
--
ALTER TABLE `prodxcot`
  ADD CONSTRAINT `prodxcot_ibfk_1` FOREIGN KEY (`ite_codigo`) REFERENCES `item` (`ite_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prodxcot_ibfk_2` FOREIGN KEY (`cot_codigo`) REFERENCES `cotizacion` (`cot_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `fk_ruta_usuario1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `fk_servicio_Tipo_servicio1` FOREIGN KEY (`Tip_ser_cod`) REFERENCES `tipo_servicio` (`Tip_ser_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_item1` FOREIGN KEY (`ite_codigo`) REFERENCES `item` (`ite_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_ciudad1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipo_documento1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tip_usu_codigo`) REFERENCES `tipo_usuario` (`tip_usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarioxpedido`
--
ALTER TABLE `usuarioxpedido`
  ADD CONSTRAINT `usuarioxpedido_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioxpedido_ibfk_2` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuxemp`
--
ALTER TABLE `usuxemp`
  ADD CONSTRAINT `usuxemp_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuxemp_ibfk_2` FOREIGN KEY (`emp_codigo`) REFERENCES `empresa` (`emp_codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;