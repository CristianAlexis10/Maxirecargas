-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2017 a las 23:42:35
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaClienteEmpresarial` (IN `cliente` INT(11))  BEGIN
SELECT * FROM cliente_empresarial WHERE usu_codigo = cliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEmpresa` (IN `empresa` INT(11))  BEGIN
	SELECT * FROM empresa WHERE emp_codigo = empresa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaExisteEmail` (IN `correo` VARCHAR(100))  BEGIN
  SELECT * FROM usuario INNER JOIN acceso ON(usuario.usu_codigo=acceso.usu_codigo) WHERE usuario.usu_correo = correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaExisteEmpresarial` (IN `empresarial` VARCHAR(100))  BEGIN
  SELECT * FROM empresa WHERE emp_nit = empresarial;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaExisteUsuario` (IN `documento` VARCHAR(100))  BEGIN
  SELECT * FROM usuario WHERE usu_num_documento = documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaLogin` (IN `documento` INT(11))  BEGIN
  SELECT * FROM usuario INNER JOIN acceso ON(usuario.usu_codigo=acceso.usu_codigo) WHERE usuario.usu_num_documento = documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaSede` (IN `sede` INT(11))  BEGIN
	SELECT * FROM sede WHERE sed_codigo = sede;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaSedeExistente` (IN `nombre` VARCHAR(50))  BEGIN
	SELECT * FROM sede WHERE sed_nombre = nombre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearAcceso` (IN `token` VARCHAR(250), IN `usu_codigo` INT(11), IN `acc_contra` VARCHAR(255))  BEGIN
INSERT INTO acceso (token, usu_codigo, acc_contra) VALUES (token, usu_codigo, acc_contra);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearClienteEmpresarial` (IN `usu_codigo` INT(11), IN `sed_codigo` INT(11), IN `cli_emp_cargo` VARCHAR(45))  BEGIN

INSERT INTO cliente_empresarial (usu_codigo, sed_codigo, cli_emp_cargo) VALUES (usu_codigo, sed_codigo, cli_emp_cargo);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearEmpresa` (IN `emp_nombre` VARCHAR(50), IN `emp_nit` INT(100), IN `emp_razon_social` VARCHAR(100))  BEGIN

INSERT INTO empresa (emp_nombre, emp_nit, emp_razon_social) VALUES (emp_nombre, emp_nit, emp_razon_social);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearSede` (IN `emp_codigo` INT(11), IN `sed_nombre` VARCHAR(50), IN `sed_direccion` VARCHAR(200), IN `sed_telefono` INT(11))  BEGIN

INSERT INTO sede (emp_codigo, sed_nombre, sed_direccion, sed_telefono) VALUES (emp_codigo, sed_nombre, sed_direccion, sed_telefono);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearUsuario` (`id_tipo_documento` INT(11), `usu_num_documento` INT(11), `usu_primer_nombre` VARCHAR(50), `usu_primer_apellido` VARCHAR(50), `usu_correo` VARCHAR(100), `usu_telefono` INT(10), `id_ciudad` INT(11), `usu_fecha_nacimiento` DATE, `usu_sexo` VARCHAR(50), `tip_usu_codigo` INT(11), `id_estado` INT(11), `usu_foto` LONGTEXT, `usu_fechas_registro` DATE, `usu_ult_inicio_sesion` DATE)  BEGIN
INSERT INTO usuario  (id_tipo_documento, usu_num_documento, usu_primer_nombre, usu_primer_apellido,  usu_correo,  usu_telefono, id_ciudad, usu_fecha_nacimiento,  usu_sexo, tip_usu_codigo, id_estado, usu_foto, usu_fechas_registro, usu_ult_inicio_sesion) VALUES (id_tipo_documento, usu_num_documento,  usu_primer_nombre, usu_primer_apellido, usu_correo, usu_telefono, id_ciudad, usu_fecha_nacimiento, usu_sexo, tip_usu_codigo, id_estado, usu_foto, usu_fechas_registro, usu_ult_inicio_sesion);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarClienteEmpresarial` (IN `codigo` INT(11))  BEGIN
IF EXISTS (SELECT id_cliente_empresarial FROM cliente_empresarial WHERE id_cliente_empresarial = codigo) 
THEN 
DELETE FROM cliente_empresarial WHERE id_cliente_empresarial = codigo;
END if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarEmpresa` (IN `codigo` INT(11))  BEGIN
IF EXISTS (SELECT emp_codigo FROM empresa WHERE emp_codigo = codigo) 
THEN 
DELETE FROM empresa WHERE emp_codigo = codigo;
END if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarSede` (IN `codigo` INT(11))  BEGIN
IF EXISTS (SELECT sed_codigo FROM sede WHERE sed_codigo = codigo) 
THEN 
DELETE FROM sede WHERE sed_codigo = codigo;
END if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarUsuario` (IN `codigo` INT(11))  BEGIN
IF EXISTS (SELECT usu_codigo FROM usuario WHERE usu_codigo = codigo) 
THEN 
DELETE FROM usuario WHERE usu_codigo = codigo;
END if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarUsuarioyClienteEmpresarial` (IN `codigo` INT(11))  BEGIN
DELETE FROM cliente_empresarial WHERE usu_codigo = codigo;
DELETE FROM usuario WHERE usu_codigo = codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inactivar` (IN `estado` INT(11), IN `codigo` INT(11))  BEGIN

UPDATE usuario 
SET id_estado = estado
WHERE usu_codigo = codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `innerJoinClienteEmpresarial` (IN `codigo` INT(11))  BEGIN
SELECT * FROM usuario t1
INNER JOIN cliente_empresarial t2 on t1.usu_codigo=t2.usu_codigo
INNER JOIN sede t3 on t2.sed_codigo=t3.sed_codigo
INNER JOIN empresa t4 on t3.emp_codigo=t4.emp_codigo
WHERE t1.usu_codigo=codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `innerJoinClienteySede` (IN `codigo` INT(11))  BEGIN
SELECT * FROM cliente_empresarial C1
INNER JOIN sede C2 ON C1.sed_codigo = C2.sed_codigo
INNER JOIN empresa C3 ON C2.emp_codigo = C3.emp_codigo
WHERE C1.usu_codigo=codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `innerJoinUsuario` (IN `codigo` INT(11))  BEGIN
SELECT * FROM usuario T1
INNER JOIN tipo_documento T2 on T1.id_tipo_documento=T2.id_tipo_documento
INNER JOIN ciudad T3 on T1.id_ciudad=T3.id_ciudad
INNER JOIN tipo_usuario T4 on T1.tip_usu_codigo=T4.tip_usu_codigo
INNER JOIN estado T5 on T1.id_estado=T5.id_estado

 where T1.usu_codigo=codigo;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarClienteEmpresarial` (IN `cargo` VARCHAR(45), IN `codigo` INT(11))  NO SQL
BEGIN
UPDATE cliente_empresarial
SET  
     cli_emp_cargo = cargo
     
WHERE id_cliente_empresarial = codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarEmpresa` (IN `codigo` INT(11), IN `nombre` VARCHAR(50), IN `nit` INT(11), IN `razon_social` VARCHAR(100))  BEGIN

UPDATE empresa
SET  emp_nombre = nombre,
	 emp_nit = nit,
     emp_razon_social = razon_social
     
WHERE emp_codigo = codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarSede` (IN `codigo` INT(11), IN `nombre` VARCHAR(50), IN `dir` VARCHAR(200), IN `tel` INT(11))  NO SQL
BEGIN 
update sede SET
sed_nombre = nombre,
sed_direccion= dir,
sed_telefono = tel
WHERE sed_codigo = codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarUsuario` (IN `codigo` INT(11), IN `tipo_documento` INT(11), IN `documento` INT(11), IN `nombre` VARCHAR(50), IN `apellido` VARCHAR(50), IN `correo` VARCHAR(100), IN `telefono` INT(10), IN `ciudad` INT(11), IN `nacimiento` DATE, IN `sexo` VARCHAR(50), IN `tipo_codigo` INT(11), IN `estado` INT(11), IN `foto` LONGTEXT)  BEGIN

UPDATE usuario 
SET  id_tipo_documento = tipo_documento,
	 usu_num_documento = documento,
     usu_primer_nombre = nombre,
     usu_primer_apellido = apellido,
     usu_correo = correo,
     usu_telefono = telefono,
     id_ciudad = ciudad,
     usu_fecha_nacimiento = nacimiento,
     usu_sexo = sexo,
     tip_usu_codigo = tipo_codigo,
     id_estado = estado,
     usu_foto = foto
     
WHERE usu_codigo = codigo;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `token` varchar(250) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `acc_contra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`token`, `usu_codigo`, `acc_contra`) VALUES
('$2y$10$TnW63efPw1lmVeDpAdP.gu/76sxEItBF4AGJS2jo.hmktfuF0Q34m', 28, '$2y$10$G/yVDnSpze4qwD33o1PV9O9mw9CkhRZm8eBzNjf3D45Z6IPr/zNl2'),
('$2y$10$y/sf6/q2J1mdkwlurARcJe1hsvSeRKQj7I42Cj0LrTfas2VEWDvu6', 29, '$2y$10$Rlz9sCNabvxsQhpZLmrCA.EMLZCr2xUQElxmkFabyz9PpseY0iQJC'),
('1459', 2, '$2y$10$B0oW6VvOir/2csaOVnSKzOsPZU2qvMoS19l96ZXu4Xi3R7Ek4JLU6'),
('2545', 1, '$2y$10$wmvbdt6FIosmu7p5rVySbu02cetXQq.u/KroYXcskpAFHE96FbpWG'),
('2546', 3, '$2y$10$N6XWbuyHfxyYfC1lRUMMD.L0FMTxzeoNGm4.3kXVCbO1kwBqPqGeW');

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
  `emp_nombre` varchar(50) NOT NULL,
  `emp_nit` int(100) NOT NULL,
  `emp_razon_social` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `estiloxcliente`
--

CREATE TABLE `estiloxcliente` (
  `ec_codigo` int(11) NOT NULL,
  `ec_nombre_color` varchar(100) NOT NULL,
  `ec_hexadecimal` varchar(100) NOT NULL,
  `usu_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_web`
--

CREATE TABLE `gestion_web` (
  `gw_codigo` int(11) NOT NULL,
  `gw_tl_section1` varchar(100) NOT NULL,
  `gw_st_section1` varchar(100) NOT NULL,
  `gw_tl_section2` varchar(100) NOT NULL,
  `gw_st_section2-1` varchar(100) NOT NULL,
  `gw_st_section2-2` varchar(100) NOT NULL,
  `gw_ct_telefono` int(7) NOT NULL,
  `gw_ct_whatsapp` int(10) NOT NULL,
  `gw_ct_correo` varchar(255) NOT NULL,
  `gw_ct_direccion` varchar(200) NOT NULL,
  `usu_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `mar_codigo` int(11) NOT NULL,
  `mar_nombre` varchar(50) NOT NULL,
  `mar_descripcion` varchar(200) NOT NULL,
  `mar_foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`mar_codigo`, `mar_nombre`, `mar_descripcion`, `mar_foto`) VALUES
(1, 'HP', 'sad', ''),
(2, 'Epson', 'epson des', ''),
(8, '34', '324', '');

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
(1, 'usuarios', 'clientes', '<i class="fa fa-users" aria-hidden="true"></i>'),
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
  `rut_codigo` int(11) NOT NULL,
  `ped_estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ped_codigo`, `ped_direccion`, `ped_correo`, `ped_fecha`, `emp_codigo`, `tip_ped_codigo`, `rut_codigo`, `ped_estado`) VALUES
(1, 'Calle 45', 'nada@gmail.com', '2017-08-14', 1, 1, 1, 'En camino'),
(2, 'Carrera 56', 'hola@gmail.com', '2017-10-23', 2, 1, 2, 'En espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoxproducto`
--

CREATE TABLE `pedidoxproducto` (
  `ped_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `pedxpro_cantidad` int(11) NOT NULL,
  `pedxpro_valor_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `pro_codigo` int(11) NOT NULL,
  `mar_codigo` int(11) NOT NULL,
  `tip_pro_codigo` int(11) NOT NULL,
  `pro_referencia` varchar(100) DEFAULT NULL,
  `pro_descripcion` varchar(100) DEFAULT NULL,
  `pro_imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_codigo`, `mar_codigo`, `tip_pro_codigo`, `pro_referencia`, `pro_descripcion`, `pro_imagen`) VALUES
(1, 1, 1, 'hfg', 'fgjf', 'fgj'),
(2, 2, 2, 'fgh', 'ghf', 'fjhg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prodxcot`
--

CREATE TABLE `prodxcot` (
  `pro_codigo` int(11) NOT NULL,
  `cot_codigo` int(11) NOT NULL,
  `proxcot_cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prodxcot`
--

INSERT INTO `prodxcot` (`pro_codigo`, `cot_codigo`, `proxcot_cantidad`) VALUES
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
  `emp_codigo` int(11) DEFAULT NULL,
  `sed_nombre` varchar(50) NOT NULL,
  `sed_direccion` varchar(200) NOT NULL,
  `sed_telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicioxproducto`
--

CREATE TABLE `servicioxproducto` (
  `tip_ser_cod` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `sto_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `sto_cantidad` int(100) NOT NULL,
  `sto_valor_compra` int(255) NOT NULL,
  `sto_valor_venta` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Cedula'),
(2, 'Tarjeta de identidad');

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
(1, 'Computador', 'desp\r\n'),
(2, 'Impresora', ''),
(3, 'toner', ''),
(4, 'cartucho', '');

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
(2, 'Mantenimiento', 'sad', '2017-11-04');

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
(1, 'Persona Natural'),
(2, 'Administrador'),
(3, 'Persona Juridica'),
(5, 'Empleado');

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
(1, 1, 1214, 'Cristian', 'Alexis', 'Lopera', 'Bedoya', 'sfsaf', 34324, 1, '34324', 324324, '2017-11-22', 'masculino', 2, 1, 'default.jpg', '2017-11-05', '0000-00-00'),
(2, 1, 1234, 'Yulieth ', 'Evelin', 'Zapata', 'Herrera', 'das', 659, 1, 'dssd', 6596, '2017-11-01', 'femenino', 2, 1, 'default.jpg', '2017-11-02', '0000-00-00'),
(3, 1, 111, 'quien', '', 'esta', 'Isaza', 'aqui', 587458, 1, '21323', 213213, '2000-05-02', 'no se sabe', 2, 1, 'kojada', '2017-11-02', '2017-11-01'),
(28, 1, 123, 'weqwe', '', 'qwe', '', 'sad@ds.c', 23, 1, '', 0, '2004-12-30', 'femenino', 1, 1, 'default.jpg', '2017-11-23', '2017-11-23'),
(29, 1, 546, 'fgfd', '', 'sgd', '', 'udsu@gmail.c', 156842, 1, '', 0, '2004-12-28', 'femenino', 1, 2, 'default.jpg', '2017-11-23', '2017-11-23');

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
  ADD PRIMARY KEY (`emp_codigo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estiloxcliente`
--
ALTER TABLE `estiloxcliente`
  ADD PRIMARY KEY (`ec_codigo`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `gestion_web`
--
ALTER TABLE `gestion_web`
  ADD PRIMARY KEY (`gw_codigo`),
  ADD UNIQUE KEY `gw_codigo` (`gw_codigo`),
  ADD KEY `usu_codigo` (`usu_codigo`);

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
  ADD KEY `tip_ped_codigo` (`tip_ped_codigo`),
  ADD KEY `rut_codigo` (`rut_codigo`);

--
-- Indices de la tabla `pedidoxproducto`
--
ALTER TABLE `pedidoxproducto`
  ADD PRIMARY KEY (`ped_codigo`),
  ADD KEY `pro_codigo` (`pro_codigo`),
  ADD KEY `pro_codigo_2` (`pro_codigo`);

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
  ADD PRIMARY KEY (`pro_codigo`),
  ADD KEY `tip_pro_codigo` (`tip_pro_codigo`),
  ADD KEY `mar_codigo` (`mar_codigo`);

--
-- Indices de la tabla `prodxcot`
--
ALTER TABLE `prodxcot`
  ADD KEY `pro_codigo` (`pro_codigo`),
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
  ADD PRIMARY KEY (`sed_codigo`),
  ADD KEY `emp_codigo` (`emp_codigo`);

--
-- Indices de la tabla `servicioxproducto`
--
ALTER TABLE `servicioxproducto`
  ADD KEY `tip_ser_cod` (`tip_ser_cod`),
  ADD KEY `pro_codigo` (`pro_codigo`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`sto_codigo`),
  ADD KEY `pro_codigo` (`pro_codigo`);

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
  ADD UNIQUE KEY `usu_num_documento` (`usu_num_documento`),
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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cliente_empresarial`
--
ALTER TABLE `cliente_empresarial`
  MODIFY `id_cliente_empresarial` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `emp_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estiloxcliente`
--
ALTER TABLE `estiloxcliente`
  MODIFY `ec_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `gestion_web`
--
ALTER TABLE `gestion_web`
  MODIFY `gw_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `mar_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `ped_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `prodxcot`
--
ALTER TABLE `prodxcot`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `sed_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `sto_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_pedido`
--
ALTER TABLE `tipo_pedido`
  MODIFY `tip_ped_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `tip_pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `Tip_ser_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `tip_usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
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
-- Filtros para la tabla `estiloxcliente`
--
ALTER TABLE `estiloxcliente`
  ADD CONSTRAINT `estiloxcliente_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestion_web`
--
ALTER TABLE `gestion_web`
  ADD CONSTRAINT `gestion_web_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
