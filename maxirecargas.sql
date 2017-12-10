-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2017 a las 19:17:36
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `activar` (IN `activar` VARCHAR(250))  BEGIN

SELECT * FROM acceso INNER JOIN usuario ON(acceso.usu_codigo = usuario.usu_codigo) WHERE acceso.token = activar;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `clientesEstrellas` ()  NO SQL
BEGIN
	select usu_codigo, count(*) as cantidad, ven_fecha from ventas group by usu_codigo order by ven_fecha desc LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `clientesRegistrados` ()  NO SQL
BEGIN
	SELECT COUNT(*) FROM usuario WHERE tip_usu_codigo = 3 OR tip_usu_codigo = 1;
END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaUsuariosRegistrados` ()  BEGIN
  SELECT count(*) FROM usuario WHERE id_estado = 1;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearUsuario` (IN `id_tipo_documento` INT(11), IN `usu_num_documento` INT(11), IN `usu_primer_nombre` VARCHAR(50), IN `usu_primer_apellido` VARCHAR(50), IN `usu_correo` VARCHAR(100), IN `usu_telefono` INT(10), IN `id_ciudad` INT(11), IN `dir` VARCHAR(200), IN `usu_sexo` VARCHAR(50), IN `tip_usu_codigo` INT(11), IN `id_estado` INT(11), IN `usu_foto` LONGTEXT, IN `usu_fechas_registro` DATE, IN `usu_ult_inicio_sesion` DATE)  BEGIN
INSERT INTO usuario  (id_tipo_documento, usu_num_documento, usu_primer_nombre, usu_primer_apellido,  usu_correo,  usu_telefono, id_ciudad, usu_direccion,  usu_sexo, tip_usu_codigo, id_estado, usu_foto, usu_fechas_registro, usu_ult_inicio_sesion) VALUES (id_tipo_documento, usu_num_documento,  usu_primer_nombre, usu_primer_apellido, usu_correo, usu_telefono, id_ciudad, dir, usu_sexo, tip_usu_codigo, id_estado, usu_foto, usu_fechas_registro, usu_ult_inicio_sesion);

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `innerJoinProducto` (IN `codigo` INT(11))  BEGIN
SELECT * FROM producto t1
INNER JOIN tipo_producto t2 on t1.tip_pro_codigo=t2.tip_pro_codigo
INNER JOIN marca t3 on t1.mar_codigo=t3.mar_codigo
WHERE t1.pro_codigo=codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `innerJoinUsuario` (IN `codigo` INT(11))  BEGIN
SELECT * FROM usuario T1
INNER JOIN tipo_documento T2 on T1.id_tipo_documento=T2.id_tipo_documento
INNER JOIN ciudad T3 on T1.id_ciudad=T3.id_ciudad
INNER JOIN tipo_usuario T4 on T1.tip_usu_codigo=T4.tip_usu_codigo
INNER JOIN estado T5 on T1.id_estado=T5.id_estado

 where T1.usu_codigo=codigo;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listaVisitas` (IN `user` INT)  NO SQL
BEGIN 
SELECT * FROM pedido WHERE ped_encargado = user;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `porcentajeMensual` (IN `Mes` INT)  NO SQL
BEGIN
	select usu_codigo, count(*) as cantidad, ven_fecha from ventas  WHERE MONTH(ven_fecha)= Mes group by usu_codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `porcentajeVentas` (IN `Mes` DATE)  NO SQL
BEGIN
	DECLARE total INTEGER;
    
    SELECT COUNT(*) INTO total FROM usuario WHERE tip_usu_codigo = 3 OR tip_usu_codigo = 1;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `productoMasVendido` (IN `Mes1` INT, IN `Mes2` INT, IN `Mes3` INT)  NO SQL
BEGIN
SELECT pro_codigo,SUM(his_pro_cantidad) FROM historial_productos WHERE MONTH(his_pro_fecha) = Mes1 OR MONTH(his_pro_fecha) = Mes2 OR MONTH(his_pro_fecha) = Mes3 LIMIT 5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `productosAgotarse` ()  NO SQL
BEGIN 
SELECT * FROM stock WHERE stock.sto_cantidad <= 5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ventaDiaria` (IN `fecha` DATE)  NO SQL
BEGIN
SELECT SUM(ventas.ven_total) FROM ventas WHERE ven_fecha = fecha;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ventaMensual` (IN `Mes` DATE)  NO SQL
BEGIN
SELECT SUM(ventas.ven_total) FROM ventas WHERE MONTH(ven_fecha)= Mes;
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
('1459', 2, '$2y$10$B0oW6VvOir/2csaOVnSKzOsPZU2qvMoS19l96ZXu4Xi3R7Ek4JLU6'),
('1e3ca150b867bcdd2829cf7635b7028a', 4, '$2y$10$BmvFxqFFoLw2VFgUJOFDAOpWvENIWGalWjAJ/09tIMIxtdcrtRf1a'),
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

--
-- Volcado de datos para la tabla `cliente_empresarial`
--

INSERT INTO `cliente_empresarial` (`id_cliente_empresarial`, `usu_codigo`, `sed_codigo`, `cli_emp_cargo`) VALUES
(1, 4, 1, '3242'),
(2, 4, 1, '3242');

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
  `emp_nit` varchar(100) NOT NULL,
  `emp_razon_social` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`emp_codigo`, `emp_nombre`, `emp_nit`, `emp_razon_social`) VALUES
(1, 'ACUATUBOS S.A', '800226360-1', 'ACUATUBOS S.A'),
(2, 'AGENCIAUTO S.A', '890900016-9', 'AGENCIAUTO S.A'),
(3, 'ANDINA DE MATERIALES INDUSTRIALES S.A', '811030946-2', 'ANDINA DE MATERIALES INDUSTRIALES S.A'),
(4, '234', '324324', '34234324'),
(5, '234', '324324', '34234324');

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
-- Estructura de tabla para la tabla `estiloxusuario`
--

CREATE TABLE `estiloxusuario` (
  `usu_codigo` int(11) NOT NULL,
  `est_usu_menu` varchar(30) NOT NULL,
  `est_usu_navigator` varchar(30) NOT NULL,
  `est_usu_menu_top` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estiloxusuario`
--

INSERT INTO `estiloxusuario` (`usu_codigo`, `est_usu_menu`, `est_usu_navigator`, `est_usu_menu_top`) VALUES
(1, 'h', 'jjh', ''),
(2, 'main--navdark ', 'navigatordark', 'menu--toposcuro');

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
-- Estructura de tabla para la tabla `historial_productos`
--

CREATE TABLE `historial_productos` (
  `id_his_pro` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `his_pro_fecha` date NOT NULL,
  `his_pro_cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_productos`
--

INSERT INTO `historial_productos` (`id_his_pro`, `pro_codigo`, `his_pro_fecha`, `his_pro_cantidad`) VALUES
(1, 1, '2017-11-05', 2),
(2, 1, '2017-12-07', 5);

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
  `ped_estado` varchar(100) NOT NULL,
  `ped_encargado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ped_codigo`, `ped_direccion`, `ped_correo`, `ped_fecha`, `emp_codigo`, `tip_ped_codigo`, `rut_codigo`, `ped_estado`, `ped_encargado`) VALUES
(1, 'Calle 45', 'nada@gmail.com', '2017-08-14', 1, 1, 1, 'En camino', 1),
(2, 'Carrera 56', 'hola@gmail.com', '2017-10-23', 2, 1, 2, 'En espera', 2),
(3, '435', '45', '2017-12-09', 43, 45, 34, '43', 1),
(88, '4354', '435', '2017-12-08', 435, 435, 453, '345', 1);

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

--
-- Volcado de datos para la tabla `pedidoxproducto`
--

INSERT INTO `pedidoxproducto` (`ped_codigo`, `pro_codigo`, `pedxpro_cantidad`, `pedxpro_valor_total`) VALUES
(1, 1, 5, 500);

--
-- Disparadores `pedidoxproducto`
--
DELIMITER $$
CREATE TRIGGER `productoMaquina` AFTER INSERT ON `pedidoxproducto` FOR EACH ROW INSERT INTO `historial_productos` (`id_his_pro`, `pro_codigo`, `his_pro_fecha`, `his_pro_cantidad`) VALUES (NULL, NEW.pro_codigo,NOW(),NEW.pedxpro_cantidad)
$$
DELIMITER ;

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
(6, 5, 2, 1, 1, 1, 1),
(7, 1, 6, 0, 1, 1, 0);

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
  `pro_imagen` varchar(200) DEFAULT NULL,
  `pro_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_codigo`, `mar_codigo`, `tip_pro_codigo`, `pro_referencia`, `pro_descripcion`, `pro_imagen`, `pro_estado`) VALUES
(1, 1, 1, 'hfg', 'fgjf', 'fgj', 0),
(2, 1, 1, 'dfs', 'sdf', '1512413244.png', 1),
(3, 1, 1, '234', '32324', 'icn-maxi.png', 1),
(4, 1, 1, '234', '32324', 'icn-maxi.png', 1),
(5, 1, 1, '3254325', '324', 'icn-maxi.png', 1),
(6, 1, 1, '234546', '435', 'icn-maxi.png', 1);

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

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`sed_codigo`, `emp_codigo`, `sed_nombre`, `sed_direccion`, `sed_telefono`) VALUES
(1, 4, '32423', '234324', 234),
(2, 4, '32423', '234324', 234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicioxproducto`
--

CREATE TABLE `servicioxproducto` (
  `tip_ser_cod` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicioxproducto`
--

INSERT INTO `servicioxproducto` (`tip_ser_cod`, `pro_codigo`) VALUES
(4, 0),
(4, 0),
(4, 0),
(4, 0),
(4, 0),
(4, 0),
(4, 2),
(4, 3),
(4, 3),
(4, 5),
(4, 6);

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

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`sto_codigo`, `pro_codigo`, `sto_cantidad`, `sto_valor_compra`, `sto_valor_venta`) VALUES
(1, 1, 4, 5445, 546),
(2, 2, 5, 54645, 56456),
(3, 6, 1, 1000, 1200);

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
(3, '66', '66', '2017-12-01'),
(4, 'recarga', 'sadsa', '2017-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `tip_usu_codigo` int(11) NOT NULL,
  `tip_usu_rol` varchar(50) NOT NULL,
  `tip_usu_maxi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`tip_usu_codigo`, `tip_usu_rol`, `tip_usu_maxi`) VALUES
(1, 'Persona Natural', ''),
(2, 'Administrador', ''),
(3, 'Persona Juridica', ''),
(5, 'Empleado', ''),
(6, 'Secretaria', 'true');

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
(1, 1, 1214, 'Cristian', 'Alexis', 'Lopera', 'Bedoya', 'sfsaf', 34324, 1, '34324', 324324, '2017-11-22', 'masculino', 1, 1, 'default.jpg', '2017-11-05', '0000-00-00'),
(2, 1, 1234, 'Yulieth ', 'Evelin', 'Zapata', 'Herrera', 'das', 659, 1, 'dssd', 6596, '2017-11-01', 'femenino', 2, 1, 'default.jpg', '2017-11-02', '0000-00-00'),
(3, 1, 111, 'quien', '', 'esta', 'Isaza', 'aqui', 587458, 1, '21323', 213213, '2000-05-02', 'no se sabe', 2, 2, 'kojada', '2017-11-02', '2017-11-01'),
(4, 1, 32423, '34234', '', '32423', '', 'yonos', 32423, 1, '', 0, '2017-12-04', 'null', 3, 1, 'defaul.jpg', '2017-12-04', '2017-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioxpedido`
--

CREATE TABLE `usuarioxpedido` (
  `usu_codigo` int(11) NOT NULL,
  `ped_codigo` int(11) NOT NULL,
  `usuxped_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarioxpedido`
--

INSERT INTO `usuarioxpedido` (`usu_codigo`, `ped_codigo`, `usuxped_total`) VALUES
(1, 1, 500),
(1, 3, 700);

--
-- Disparadores `usuarioxpedido`
--
DELIMITER $$
CREATE TRIGGER `ventas` AFTER INSERT ON `usuarioxpedido` FOR EACH ROW INSERT INTO `ventas` (`id_venta`, `usu_codigo`,`ven_total`, `ped_codigo`, `ven_fecha`) VALUES (NULL, NEW.usu_codigo, NEW.usuxped_total, NEW.ped_codigo, NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `usu_codigo` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `ven_total` float NOT NULL,
  `ped_codigo` int(11) NOT NULL,
  `ven_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`usu_codigo`, `id_venta`, `ven_total`, `ped_codigo`, `ven_fecha`) VALUES
(0, 2, 600, 1, '2017-12-08'),
(2, 4, 400, 88, '2017-12-08'),
(2, 6, 500, 1, '2017-12-07'),
(0, 7, 100, 1, '2017-12-07'),
(1, 9, 500, 1, '2017-12-07'),
(1, 10, 700, 3, '2017-12-07');

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
-- Indices de la tabla `estiloxusuario`
--
ALTER TABLE `estiloxusuario`
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `gestion_web`
--
ALTER TABLE `gestion_web`
  ADD PRIMARY KEY (`gw_codigo`),
  ADD UNIQUE KEY `gw_codigo` (`gw_codigo`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `historial_productos`
--
ALTER TABLE `historial_productos`
  ADD PRIMARY KEY (`id_his_pro`),
  ADD KEY `pro_codigo` (`pro_codigo`);

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
  ADD KEY `rut_codigo` (`rut_codigo`),
  ADD KEY `ped_encargado` (`ped_encargado`);

--
-- Indices de la tabla `pedidoxproducto`
--
ALTER TABLE `pedidoxproducto`
  ADD KEY `pro_codigo` (`pro_codigo`),
  ADD KEY `pro_codigo_2` (`pro_codigo`),
  ADD KEY `ped_codigo` (`ped_codigo`),
  ADD KEY `ped_codigo_2` (`ped_codigo`);

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
  ADD KEY `ped_codigo` (`ped_codigo`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `ped_codigo` (`ped_codigo`),
  ADD KEY `usu_codigo` (`usu_codigo`);

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
  MODIFY `emp_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT de la tabla `historial_productos`
--
ALTER TABLE `historial_productos`
  MODIFY `id_his_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `mar_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `ped_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `sed_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `sto_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `Tip_ser_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `tip_usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
-- Filtros para la tabla `estiloxusuario`
--
ALTER TABLE `estiloxusuario`
  ADD CONSTRAINT `estiloxusuario_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gestion_web`
--
ALTER TABLE `gestion_web`
  ADD CONSTRAINT `gestion_web_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_productos`
--
ALTER TABLE `historial_productos`
  ADD CONSTRAINT `historial_productos_ibfk_1` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`ped_encargado`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidoxproducto`
--
ALTER TABLE `pedidoxproducto`
  ADD CONSTRAINT `pedidoxproducto_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidoxproducto_ibfk_2` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`tip_usu_codigo`) REFERENCES `tipo_usuario` (`tip_usu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarioxpedido`
--
ALTER TABLE `usuarioxpedido`
  ADD CONSTRAINT `usuarioxpedido_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioxpedido_ibfk_2` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
