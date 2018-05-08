-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2018 a las 05:34:53
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `assign` (IN `orders` INT, IN `usu` INT, IN `estado` VARCHAR(20))  NO SQL
BEGIN 
UPDATE pedido SET pedido.ped_encargado = usu , ped_estado = estado WHERE  pedido.ped_codigo = orders ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarPermiso` (IN `rol` INT, IN `modulo` INT)  NO SQL
BEGIN 
SELECT * FROM permiso WHERE permiso.tip_usu_codigo = rol AND permiso.id_modulo = modulo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarContrasena` (IN `usu` INT, IN `pas` VARCHAR(250))  NO SQL
BEGIN 
UPDATE acceso set acceso.acc_contra = pas WHERE acceso.usu_codigo = usu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarDatosContacto` (IN `num1` INT(15), IN `num2` INT(15), IN `wpp` BIGINT(20), IN `correo` VARCHAR(150), IN `dir` VARCHAR(200), IN `inicio` TIME, IN `fin` TIME)  NO SQL
BEGIN 
UPDATE gestion_web SET gw_ct_telefono = num1 ,gw_ct_telefono_2 = num2,gw_ct_whatsapp=wpp ,gw_ct_correo=correo,gw_ct_direccion=dir , gw_hora_inicio = inicio , gw_hora_fin = fin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarEstado` (IN `orde` INT, IN `estado` VARCHAR(20))  NO SQL
BEGIN 
UPDATE pedido SET ped_estado = estado WHERE ped_codigo = orde ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarEstadoPagado` (IN `orde` INT, IN `estado` VARCHAR(20), IN `total` INT, IN `fecha` DATE)  NO SQL
BEGIN 
UPDATE pedido SET ped_estado = estado WHERE ped_codigo = orde ;
UPDATE ventas SET ventas.ven_total = total, ven_fecha = fecha WHERE ventas.ped_codigo = orde ;
UPDATE usuarioxpedido SET usuxped_total = total  WHERE ped_codigo = orde;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chats_actuales` ()  NO SQL
BEGIN
SELECT chats.chat_token,chats.usu_codigo,usuario.usu_primer_nombre,usuario.usu_primer_apellido FROM chats INNER JOIN mensajexchat ON chats.chat_token=mensajexchat.chat_token  INNER JOIN usuario ON  chats.usu_codigo  = usuario.usu_codigo WHERE chats.chat_estado = "proceso" GROUP BY chats.chat_token;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `clientesEstrellas` ()  NO SQL
BEGIN
	select usuario.*, count(*) as cantidad, ven_fecha from ventas   INNER JOIN usuario ON ventas.usu_codigo=usuario.usu_codigo group by ventas.usu_codigo order by ven_fecha desc LIMIT 5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `clientesRegistrados` ()  NO SQL
BEGIN
	SELECT COUNT(*) FROM usuario WHERE tip_usu_codigo = 3 OR tip_usu_codigo = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaClienteEmpresarial` (IN `cliente` INT(11))  BEGIN
SELECT * FROM cliente_empresarial WHERE usu_codigo = cliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaEmpresa` (IN `empresa` INT(11))  BEGIN
	SELECT * FROM empresa WHERE empresa.emp_codigo = empresa;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaLogin` (IN `documento` BIGINT)  BEGIN
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `contarPedidosCanceladasBy` (IN `usu` INT)  NO SQL
BEGIN 
SELECT COUNT(*) AS 'total' FROM  pedido WHERE ped_encargado = usu AND ped_estado="Cancelado" ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contarPedidosPendientesBy` (IN `usu` INT, IN `dat` DATE)  NO SQL
BEGIN 
SELECT COUNT(*) AS 'total' FROM  pedido WHERE ped_encargado = usu AND ped_estado="Aplazado" OR dat > ped_fecha_entrega;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contarPedidosTerminadosBy` (IN `usu` INT)  NO SQL
BEGIN 
SELECT COUNT(*) AS 'total' FROM  pedido WHERE ped_encargado = usu AND ped_estado="Terminado";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ContarRutasParaHoyPorUsuario` (IN `usu` INT, IN `dat` DATE)  NO SQL
BEGIN 
SELECT COUNT(*) AS total FROM pedido WHERE pedido.ped_fecha_entrega = dat AND ped_encargado = usu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ContarRutasPorUsuario` (IN `usu` INT)  NO SQL
BEGIN 
SELECT COUNT(*) AS total FROM pedido WHERE ped_encargado = usu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contestarCotizacion` (IN `quota` INT, IN `respon` LONGTEXT, IN `estado` VARCHAR(20), IN `pag` VARCHAR(100), IN `iva` VARCHAR(10), IN `plazo` VARCHAR(100), IN `entrega` VARCHAR(100), IN `encar` INT)  NO SQL
BEGIN 
UPDATE cotizacion SET cotizacion.cot_estado = estado, cotizacion.cot_observacion = respon, cotizacion.cot_pago = pag,cotizacion.cot_iva=iva,cotizacion.cot_plazo=plazo,cotizacion.cot_entrega=entrega,cotizacion.cot_encargado= encar WHERE cotizacion.cot_codigo = quota;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cotizacionesPendientes` ()  NO SQL
BEGIN
SELECT * FROM cotizacion INNER JOIN usuario ON cotizacion.usu_codigo = usuario.usu_codigo INNER JOIN ciudad ON cotizacion.cot_ciudad=ciudad.id_ciudad WHERE cotizacion.cot_estado = "En Recepcion";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cotizacionesRealizadasBy` (IN `usu` INT)  NO SQL
BEGIN 
SELECT * FROM cotizacion INNER JOIN ciudad ON cotizacion.cot_ciudad = ciudad.id_ciudad WHERE cotizacion.usu_codigo=usu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cotizacionesTerminadas` ()  NO SQL
BEGIN
SELECT * FROM cotizacion INNER JOIN usuario ON cotizacion.usu_codigo = usuario.usu_codigo INNER JOIN ciudad ON cotizacion.cot_ciudad=ciudad.id_ciudad WHERE cotizacion.cot_estado = "Terminado";
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearMarca` (IN `nombre` VARCHAR(50), IN `des` VARCHAR(200))  NO SQL
BEGIN 
INSERT INTO marca (mar_nombre,mar_descripcion) VALUES (nombre,des);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearReporte` (IN `orde` INT, IN `estado` VARCHAR(20), IN `obs` MEDIUMTEXT)  NO SQL
BEGIN 
UPDATE pedido SET ped_estado = estado WHERE ped_codigo = orde;
INSERT INTO reporte (ped_codigo,rep_observacion) VALUES (orde,obs);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearSede` (IN `emp_co` INT(11), IN `sed_nombre` VARCHAR(50), IN `sed_direccion` VARCHAR(200), IN `sed_telefono` INT(11))  BEGIN

INSERT INTO sede (emp_codigo, sed_nombre, sed_direccion, sed_telefono) VALUES (emp_co, sed_nombre, sed_direccion, sed_telefono);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearTokenRecuperacion` (IN `usu` INT, IN `token` VARCHAR(15))  NO SQL
BEGIN
UPDATE acceso SET acceso.codigo_recuperacion = token WHERE acceso.usu_codigo = usu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearUsuario` (IN `id_tipo_documento` INT(11), IN `usu_num_documento` BIGINT, IN `usu_primer_nombre` VARCHAR(50), IN `usu_primer_apellido` VARCHAR(50), IN `usu_correo` VARCHAR(100), IN `usu_telefono` BIGINT(10), IN `id_ciudad` INT(11), IN `dir` VARCHAR(200), IN `usu_sexo` VARCHAR(50), IN `tip_usu_codigo` INT(11), IN `id_estado` INT(11), IN `usu_foto` LONGTEXT, IN `usu_fechas_registro` DATE, IN `usu_ult_inicio_sesion` DATE)  BEGIN
INSERT INTO usuario  (id_tipo_documento, usu_num_documento, usu_primer_nombre, usu_primer_apellido,  usu_correo,  usu_telefono, id_ciudad, usu_direccion,  usu_sexo, tip_usu_codigo, id_estado, usu_foto, usu_fechas_registro, usu_ult_inicio_sesion) VALUES (id_tipo_documento, usu_num_documento,  usu_primer_nombre, usu_primer_apellido, usu_correo, usu_telefono, id_ciudad, dir, usu_sexo, tip_usu_codigo, id_estado, usu_foto, usu_fechas_registro, usu_ult_inicio_sesion);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datosCotizacion` (IN `cod` INT)  NO SQL
BEGIN 
SELECT cot.cot_codigo,cot.cot_token,cot.cot_encargado,cot.cot_estado,usu.usu_primer_nombre,usu.usu_primer_apellido,proco.proxcot_cantidad,pro.pro_referencia,ser.tip_ser_nombre,ser.Tip_ser_cod,proco.proxcod_observacion,cot.cot_pago,cot.cot_iva,cot.cot_plazo,cot.cot_entrega, proco.proxcod_res,cot.cot_observacion FROM cotizacion cot INNER JOIN usuario usu ON usu.usu_codigo=cot.usu_codigo INNER JOIN prodxcot  proco ON proco.cot_codigo = cot.cot_codigo INNER JOIN producto pro ON proco.pro_codigo=pro.pro_codigo INNER JOIN tipo_servicio ser ON proco.tip_servicio = ser.Tip_ser_cod WHERE cot.cot_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `direccionDeCotizacion` (IN `id` INT)  NO SQL
BEGIN 
SELECT pais.pai_nombre,departamento.dep_nombre,ciudad.ciu_nombre,cotizacion.cot_dir FROM cotizacion INNER JOIN ciudad ON cotizacion.cot_ciudad=ciudad.id_ciudad INNER JOIN departamento ON ciudad.id_departamento=departamento.id_departamento INNER JOIN pais ON departamento.id_pais = pais.id_pais WHERE cotizacion.cot_codigo = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `direccionDePedido` (IN `token` VARCHAR(13))  NO SQL
BEGIN 
SELECT pais.pai_nombre,departamento.dep_nombre,ciudad.ciu_nombre,pedido.ped_direccion FROM pedido INNER JOIN ciudad ON pedido.ped_ciudad=ciudad.id_ciudad INNER JOIN departamento ON ciudad.id_departamento=departamento.id_departamento INNER JOIN pais ON departamento.id_pais = pais.id_pais WHERE pedido.ped_token = token;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarPermiso` (IN `rol` INT, IN `modulo` INT)  NO SQL
BEGIN 
DELETE FROM permiso WHERE permiso.id_modulo = modulo AND permiso.tip_usu_codigo = rol;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `filterCount` (IN `cat` VARCHAR(30), IN `vall` VARCHAR(60))  NO SQL
BEGIN 
SELECT COUNT(*) FROM producto INNER JOIN tipo_producto ON  tipo_producto.tip_pro_codigo=producto.tip_pro_codigo WHERE ( (producto.pro_referencia LIKE CONCAT("%",vall,"%") OR producto.mar_codigo LIKE CONCAT("%",vall,"%") OR producto.pro_descripcion LIKE CONCAT("%",vall,"%")) ) AND tipo_producto.tip_pro_nombre=cat AND producto.pro_codigo= 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filterProducts` (IN `cat` VARCHAR(30), IN `vall` VARCHAR(60), IN `ini` INT, IN `fin` INT)  NO SQL
BEGIN 
SELECT * FROM producto INNER JOIN tipo_producto ON  tipo_producto.tip_pro_codigo=producto.tip_pro_codigo WHERE ( (producto.pro_referencia LIKE CONCAT("%",vall,"%") OR producto.mar_codigo LIKE CONCAT("%",vall,"%") OR producto.pro_descripcion LIKE CONCAT("%",vall,"%"))) AND tipo_producto.tip_pro_nombre=cat AND producto.pro_estado = 1 LIMIT ini,fin ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `finalizarChat` (IN `fecha` DATE, IN `hora` TIME, IN `token` VARCHAR(20), IN `estado` VARCHAR(20))  NO SQL
BEGIN 
UPDATE chats SET fecha_fin = fecha , hora_fin = hora , chat_estado = estado WHERE chat_token = token ;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `innerJoinDireccion` ()  NO SQL
BEGIN
SELECT t1.usu_direccion, t1.usu_primer_nombre,t2.ciu_nombre, t4.dep_nombre, t3.pai_nombre FROM usuario t1
INNER JOIN ciudad t2 on t1.id_ciudad=t2.id_ciudad
INNER JOIN departamento t4 on t2.id_departamento= t4.id_departamento
INNER JOIN pais t3 on t4.id_pais=t3.id_pais
WHERE t1.tip_usu_codigo=1 OR t1.tip_usu_codigo=3 LIMIT 20;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `innerJoinLocalizacion` (IN `ciu` INT)  NO SQL
BEGIN 
SELECT ciudad.ciu_nombre,departamento.dep_nombre,pais.pai_nombre FROM ciudad INNER JOIN departamento on ciudad.id_departamento=departamento.id_departamento INNER JOIN pais ON departamento.id_pais = pais.id_pais WHERE ciudad.id_ciudad = ciu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `innerJoinProducto` (IN `codigo` INT(11))  BEGIN
SELECT * FROM producto t1
INNER JOIN tipo_producto t2 on t1.tip_pro_codigo=t2.tip_pro_codigo
INNER JOIN marca t3 on t1.mar_codigo=t3.mar_codigo INNER JOIN servicioxproducto serpro ON t1.pro_codigo = serpro.pro_codigo INNER JOIN tipo_servicio tip ON serpro.tip_ser_cod = tip.Tip_ser_cod
WHERE t1.pro_codigo=codigo ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `innerJoinUsuario` (IN `codigo` INT(11))  BEGIN
SELECT * FROM usuario T1
INNER JOIN tipo_documento T2 on T1.id_tipo_documento=T2.id_tipo_documento
INNER JOIN ciudad T3 on T1.id_ciudad=T3.id_ciudad
INNER JOIN tipo_usuario T4 on T1.tip_usu_codigo=T4.tip_usu_codigo
INNER JOIN estado T5 on T1.id_estado=T5.id_estado

 where T1.usu_codigo=codigo;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `leerConversacion` (IN `token` VARCHAR(20))  NO SQL
BEGIN
SELECT chats.*,mensajexchat.*,usuario.usu_primer_nombre,usuario.usu_primer_apellido FROM chats INNER JOIN mensajexchat ON chats.chat_token=mensajexchat.chat_token INNER JOIN usuario ON chats.usu_codigo = usuario.usu_codigo WHERE chats.chat_token = token;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarCotxPro` (IN `pro` INT, IN `cantidad` INT, IN `servicio` INT, IN `cot` INT, IN `total` INT)  NO SQL
BEGIN 
UPDATE prodxcot SET prodxcot.proxcod_res = total WHERE prodxcot.cot_codigo = cot AND prodxcot.pro_codigo = pro AND prodxcot.proxcot_cantidad = cantidad AND prodxcot.tip_servicio = servicio;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarDatosMaxi` (IN `micro` LONGTEXT, IN `mision` LONGTEXT, IN `vision` LONGTEXT, IN `poli` LONGTEXT)  NO SQL
BEGIN 
UPDATE gestion_web  SET gw_micro_des =  micro , gw_mision = mision , 	gw_vision = vision , gw_politicas = poli  ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarEmpresa` (IN `codigo` INT(11), IN `nombre` VARCHAR(50), IN `nit` INT(11), IN `razon_social` VARCHAR(100))  BEGIN

UPDATE empresa
SET  emp_nombre = nombre,
	 emp_nit = nit,
     emp_razon_social = razon_social
     
WHERE emp_codigo = codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarNombreRol` (IN `rol` INT, IN `nombre` VARCHAR(50), IN `maxi` VARCHAR(50))  NO SQL
BEGIN
UPDATE tipo_usuario SET tipo_usuario.tip_usu_rol = nombre , tipo_usuario.tip_usu_maxi = maxi WHERE tipo_usuario.tip_usu_codigo = rol;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarPermiso` (IN `c` INT, IN `m` INT, IN `e` INT, IN `b` INT, IN `rol` INT, IN `modu` INT)  NO SQL
BEGIN 
UPDATE permiso SET permiso.per_crear = c , permiso.per_modificar = m , permiso.per_eliminar=e , permiso.per_buscar = b WHERE permiso.tip_usu_codigo = rol AND permiso.id_modulo = modu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarSede` (IN `codigo` INT(11), IN `nombre` VARCHAR(50), IN `dir` VARCHAR(200), IN `tel` INT(11))  NO SQL
BEGIN 
update sede SET
sed_nombre = nombre,
sed_direccion= dir,
sed_telefono = tel
WHERE sed_codigo = codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarUsuario` (IN `codigo` INT(11), IN `tipo_documento` INT(11), IN `documento` BIGINT, IN `nombre` VARCHAR(50), IN `apellido` VARCHAR(50), IN `correo` VARCHAR(100), IN `telefono` INT(10), IN `ciudad` INT(11), IN `nacimiento` DATE, IN `sexo` VARCHAR(50), IN `dir` VARCHAR(50), IN `celular` BIGINT, IN `estado` INT)  BEGIN

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
     usu_direccion = dir,
     usu_celular = celular,
     id_estado = estado
     
WHERE usu_codigo = codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `opcionesBusqueda` (IN `cod` INT, IN `opciones` MEDIUMTEXT)  NO SQL
BEGIN
INSERT INTO opciones_busqueda (pro_codigo,opc_bus_tags) VALUES (cod,opciones);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pedidosAplazados` ()  NO SQL
BEGIN 
SELECT T3.usu_primer_nombre,T3.usu_primer_apellido,T1.ped_codigo,T4.ciu_nombre,T1.ped_direccion,T1.ped_fecha,T1.ped_fecha_entrega,T1.ped_hora_entrega,T1.ped_token, T5.rep_observacion FROM pedido T1 INNER JOIN usuarioxpedido T2 ON T1.ped_codigo=T2.ped_codigo INNER JOIN usuario T3 ON T2.usu_codigo = T3.usu_codigo  INNER JOIN ciudad T4 ON T1.ped_ciudad =T4.id_ciudad INNER JOIN reporte T5 ON T1.ped_codigo = T5.ped_codigo WHERE T1.ped_estado ="Aplazado";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pedidosAsignados` ()  NO SQL
BEGIN 
SELECT T3.usu_primer_nombre,T3.usu_primer_apellido,T1.ped_codigo,T4.ciu_nombre,T1.ped_direccion,T1.ped_fecha,T1.ped_fecha_entrega,T1.ped_hora_entrega,T1.ped_token, T1.ped_encargado FROM pedido T1 INNER JOIN usuarioxpedido T2 ON T1.ped_codigo=T2.ped_codigo INNER JOIN usuario T3 ON T2.usu_codigo = T3.usu_codigo  INNER JOIN ciudad T4 ON T1.ped_ciudad =T4.id_ciudad WHERE T1.ped_encargado is not null AND T1.ped_estado="En Proceso";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pedidosCancelados` ()  NO SQL
BEGIN 
SELECT T3.usu_primer_nombre,T3.usu_primer_apellido,T1.ped_codigo,T4.ciu_nombre,T1.ped_direccion,T1.ped_fecha,T1.ped_token,T1.ped_fecha_entrega,T1.ped_hora_entrega, T5.rep_observacion FROM pedido T1 INNER JOIN usuarioxpedido T2 ON T1.ped_codigo=T2.ped_codigo INNER JOIN usuario T3 ON T2.usu_codigo = T3.usu_codigo  INNER JOIN ciudad T4 ON T1.ped_ciudad =T4.id_ciudad INNER JOIN reporte T5 ON T1.ped_codigo = T5.ped_codigo WHERE T1.ped_estado ="Cancelado";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pedidosDelDia` (IN `fecha` DATE)  NO SQL
BEGIN
SELECT COUNT(*) FROM pedido WHERE ped_fecha = fecha;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pedidosFinalizados` ()  NO SQL
BEGIN 
SELECT T3.usu_primer_nombre,T3.usu_primer_apellido,T1.ped_codigo,T4.ciu_nombre,T1.ped_direccion,T1.ped_fecha,T1.ped_fecha_entrega,T1.ped_hora_entrega,T1.ped_token FROM pedido T1 INNER JOIN usuarioxpedido T2 ON T1.ped_codigo=T2.ped_codigo INNER JOIN usuario T3 ON T2.usu_codigo = T3.usu_codigo  INNER JOIN ciudad T4 ON T1.ped_ciudad =T4.id_ciudad WHERE T1.ped_estado ="Terminado";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pedidosPendientes` ()  NO SQL
BEGIN 
SELECT T3.usu_primer_nombre,T3.usu_primer_apellido,T1.ped_codigo,T4.ciu_nombre,T1.ped_direccion,T1.ped_fecha,T1.ped_fecha_entrega,T1.ped_hora_entrega,T1.ped_token FROM pedido T1 INNER JOIN usuarioxpedido T2 ON T1.ped_codigo=T2.ped_codigo INNER JOIN usuario T3 ON T2.usu_codigo = T3.usu_codigo  INNER JOIN ciudad T4 ON T1.ped_ciudad =T4.id_ciudad WHERE T1.ped_estado="En Bodega";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pedidosRealizadosBy` (IN `usu` INT)  NO SQL
BEGIN
SELECT * FROM usuarioxpedido t1 INNER JOIN pedido t2 ON t1.ped_codigo = t2.ped_codigo INNER JOIN usuario t3 ON t1.usu_codigo = t3.usu_codigo INNER JOIN ciudad t4 ON t2.ped_ciudad = t4.id_ciudad WHERE t1.usu_codigo = usu;
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
SELECT producto.*, SUM(his_pro_cantidad) FROM historial_productos INNER JOIN producto ON historial_productos.pro_codigo = producto.pro_codigo WHERE MONTH(his_pro_fecha) = Mes1 OR MONTH(his_pro_fecha) = Mes2 OR MONTH(his_pro_fecha) = Mes3 GROUP BY historial_productos.pro_codigo ORDER BY SUM(historial_productos.his_pro_cantidad) DESC LIMIT 5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `productosAgotarse` ()  NO SQL
BEGIN 
SELECT * FROM stock WHERE stock.sto_cantidad <= 5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `readByCategory` (IN `nombre` VARCHAR(20))  NO SQL
BEGIN
SELECT count(*) FROM tipo_producto INNER JOIN producto ON tipo_producto.tip_pro_codigo = producto.tip_pro_codigo WHERE tipo_producto.tip_pro_nombre=nombre AND producto.pro_estado =1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `readBycategoryPagination` (IN `nombre` VARCHAR(20), IN `ini` INT, IN `ele` INT)  NO SQL
BEGIN
SELECT * FROM tipo_producto INNER JOIN producto ON tipo_producto.tip_pro_codigo = producto.tip_pro_codigo WHERE tipo_producto.tip_pro_nombre=nombre AND producto.pro_estado = 1 LIMIT ini,ele;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `readOptionSearch` (IN `buscar` VARCHAR(40))  NO SQL
BEGIN 
SELECT pro.pro_referencia,pro.pro_descripcion,opc.opc_bus_tags,mar.mar_nombre,tipro.tip_pro_nombre   FROM producto pro INNER JOIN opciones_busqueda opc ON pro.pro_codigo=opc.pro_codigo INNER JOIN marca mar ON pro.mar_codigo=mar.mar_codigo  INNER JOIN tipo_producto tipro ON pro.tip_pro_codigo=tipro.tip_pro_codigo  WHERE ( opc.opc_bus_tags LIKE CONCAT("%",buscar,"%") OR mar.mar_nombre LIKE CONCAT("%",buscar,"%")  OR tipro.tip_pro_nombre LIKE CONCAT("%",buscar,"%") OR pro.pro_referencia LIKE CONCAT("%",buscar,"%")) AND pro.pro_estado = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `readRefer` ()  NO SQL
BEGIN 
SELECT producto.pro_referencia FROM producto WHERE producto.pro_estado = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `servicioInner` (IN `cod` INT)  NO SQL
BEGIN 
SELECT * FROM servicioxproducto INNER JOIN tipo_servicio ON servicioxproducto.tip_ser_cod = tipo_servicio.Tip_ser_cod WHERE servicioxproducto.pro_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `todosLosUsuario` ()  NO SQL
BEGIN
SELECT usuario.* FROM usuario WHERE  usuario.tip_usu_codigo != 1 AND usuario.tip_usu_codigo != 3 ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `totalCotizaciones` ()  NO SQL
BEGIN
    SELECT COUNT(*) FROM cotizacion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `totalPedidos` ()  NO SQL
BEGIN
	SELECT COUNT(*) FROM pedido;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `totalPersonasJuridicas` ()  NO SQL
BEGIN
	SELECT COUNT(*) FROM usuario WHERE tip_usu_codigo = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `totalPersonasNaturales` ()  NO SQL
BEGIN
	SELECT COUNT(*) FROM usuario WHERE tip_usu_codigo = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ventaDiaria` (IN `fecha` DATE)  NO SQL
BEGIN
SELECT SUM(ventas.ven_total) FROM ventas WHERE ven_fecha = fecha;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ventaMensual` (IN `Mes` INT)  NO SQL
BEGIN
SELECT SUM(ventas.ven_total) FROM ventas WHERE MONTH(ven_fecha)= Mes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verCotizacion` (IN `id` INT)  NO SQL
BEGIN 
SELECT * FROM cotizacion T1 INNER JOIN usuario T2 ON T1.usu_codigo = T2.usu_codigo  INNER JOIN ciudad T3 ON T1.cot_ciudad=T3.id_ciudad INNER JOIN prodxcot T4 ON T1.cot_codigo =T4.cot_codigo  INNER JOIN producto T6 ON T4.pro_codigo = T6.pro_codigo INNER JOIN tipo_producto T5 ON T6.tip_pro_codigo = T5.tip_pro_codigo INNER JOIN tipo_servicio T7 ON T4.tip_servicio = T7.Tip_ser_cod WHERE T1.cot_codigo = id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDetalleRuta` (IN `usu` INT, IN `dat` DATE)  NO SQL
BEGIN 
SELECT t1.usu_primer_nombre,t1.usu_primer_apellido,t1.usu_correo,t1.usu_celular,t2.ped_token, t2.ped_direccion ,t2.ped_hora_entrega,t2.ped_ciudad, usuped.usu_codigo,t2.ped_estado FROM usuario t1 INNER JOIN pedido t2 ON t1.usu_codigo = t2.ped_encargado INNER JOIN usuarioxpedido usuped ON t2.ped_codigo = usuped.ped_codigo WHERE t1.usu_codigo = usu   AND t2.ped_fecha_entrega = dat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDetalleRutaAplazada` (IN `usu` INT, IN `dat` DATE)  NO SQL
BEGIN 
SELECT t2.ped_token,t2.ped_codigo,t2.ped_direccion,t2.ped_fecha_entrega,t2.ped_hora_entrega,t2.ped_estado FROM usuario t1 INNER JOIN pedido t2 ON t1.usu_codigo = t2.ped_encargado WHERE t1.usu_codigo = usu AND t2.ped_estado = "Aplazado" or t2.ped_estado ="En Proceso" AND t2.ped_fecha_entrega < dat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDetalleRutaCancelada` (IN `usu` INT)  NO SQL
BEGIN 
SELECT t2.ped_token,t2.ped_codigo,t2.ped_direccion,t2.ped_fecha_entrega,t2.ped_hora_entrega,t2.ped_estado FROM usuario t1 INNER JOIN pedido t2 ON t1.usu_codigo = t2.ped_encargado WHERE t1.usu_codigo = usu AND t2.ped_estado = "Cancelado";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDetalleRutaFinalizadaBy` (IN `usu` INT)  NO SQL
BEGIN 
SELECT t2.ped_token,t2.ped_codigo,t2.ped_direccion,t2.ped_fecha_entrega,t2.ped_hora_entrega,t2.ped_estado FROM usuario t1 INNER JOIN pedido t2 ON t1.usu_codigo = t2.ped_encargado WHERE t1.usu_codigo = usu AND t2.ped_estado = "Terminado";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDetalleRutaFutura` (IN `usu` INT, IN `dat` DATE)  NO SQL
BEGIN 
SELECT * FROM usuario t1 INNER JOIN pedido t2 ON t1.usu_codigo = t2.ped_encargado WHERE t1.usu_codigo = usu AND t2.ped_estado != "Terminado"  AND t2.ped_estado != "Cancelado" AND t2.ped_fecha_entrega > dat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verPedido` (IN `token` VARCHAR(15))  NO SQL
BEGIN 
SELECT
usuario.usu_codigo,usuario.usu_primer_nombre,usuario.usu_primer_apellido,usuario.usu_telefono,pedido.ped_codigo,pedido.ped_encargado,ciudad.ciu_nombre,pedido.ped_direccion,pedido.ped_estado,pedido.ped_token,pedido.ped_fecha,tipo_producto.tip_pro_nombre,producto.pro_referencia,tipo_servicio.tip_ser_nombre,pedidoxproducto.pedxpro_cantidad,pedidoxproducto.pedxpro_observacion,pedido.ped_fecha_entrega,pedido.ped_hora_entrega  
FROM pedido INNER JOIN pedidoxproducto ON pedido.ped_codigo=pedidoxproducto.ped_codigo INNER JOIN producto ON pedidoxproducto.pro_codigo = producto.pro_codigo  INNER JOIN tipo_servicio ON tipo_servicio.Tip_ser_cod=pedidoxproducto.tip_ser_codigo
INNER JOIN ciudad ON pedido.ped_ciudad=ciudad.id_ciudad INNER JOIN tipo_producto ON producto.tip_pro_codigo = tipo_producto.tip_pro_codigo INNER JOIN usuarioxpedido ON pedido.ped_codigo = usuarioxpedido.ped_codigo INNER JOIN usuario ON usuarioxpedido.usu_codigo=usuario.usu_codigo WHERE pedido.ped_token = token;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verRutas` ()  NO SQL
BEGIN
SELECT usuario.usu_codigo,usuario.usu_primer_nombre,usuario.usu_primer_apellido,usuario.usu_celular,ciudad.ciu_nombre,usuario.usu_direccion,usuario.usu_correo FROM usuario INNER JOIN ciudad ON usuario.id_ciudad=ciudad.id_ciudad  WHERE usuario.tip_usu_codigo = 5 ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verRutasBy` (IN `usu` INT)  NO SQL
BEGIN
SELECT usuario.usu_codigo,usuario.usu_primer_nombre,usuario.usu_primer_apellido,usuario.usu_celular,ciudad.ciu_nombre,usuario.usu_direccion,usuario.usu_correo FROM usuario INNER JOIN ciudad ON usuario.id_ciudad=ciudad.id_ciudad  WHERE usuario.usu_codigo = usu ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `token` varchar(250) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `acc_contra` varchar(255) DEFAULT NULL,
  `codigo_recuperacion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`token`, `usu_codigo`, `acc_contra`, `codigo_recuperacion`) VALUES
('01ba73b74a0ce43200a70d47ed49462b', 32, '$2y$10$qTD5VQmm/NYFKA6TeP0Yi.NCqBKGpXCCEFmr8hQcWSNHx.KBUaUie', ''),
('26126ca9a7fff5907298bcabc89f7b74', 21, '$2y$10$1p/zevC/IowUP4T28R4utu0fEwsCGBrpbqhuPXPpCuj6ABjzm835.', ''),
('29d5adcad12561baa680e134816dd147', 28, '$2y$10$rkG1ctpusMyAUz.bR.R1juz/zGpkLMLYNg9t7SmVLdRDi/4LANH3W', ''),
('671030f91ef4820a38ea1e3731ad2be8', 24, '$2y$10$dntvRt5Kc9w8sNHfqmCZ4uUgR/ESD277KrIKvWrnKtvygkYUWqFB6', '3130-5400'),
('7daa8868e2ff6d30764b8302cc4b9452', 26, '$2y$10$r4wav4dUPOenSzXhK9yocuac/1krhmsTuUvelCMpDRJfafSrSaKzK', ''),
('80a428ff61b0a746cfa3f1d30ec93ea2', 27, '$2y$10$wpalXqSEAzk7P3zHCq52CeTiUDL7fPXIjiglAne787XMrxN/zFP2S', ''),
('cb6e1e74239543a5be4578f05916988e', 36, '$2y$10$1sV94DO.8tgs2ZavpVOrZ.N/bWlLsVjAHaSe8zQz8.xc0jqdLAUui', ''),
('ec77b2af2cb5f9cd227ac2c551c50e83', 25, '$2y$10$MXcWTV2/YVF2ep8N8RcIiOVF4jdJyTPvxGMd1qXMPeFlc9i0Dn1ZO', ''),
('f37a43902966fbd56968034d9781f0f9', 22, '$2y$10$JfBsA4Q8Qw5KMAwqWxcxweQGWFJICtrN6Dc1WAOlI.4NqlJ7sUF/C', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `chat_token` varchar(20) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `chat_asistente` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_fin` time NOT NULL,
  `chat_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 2, 'Bogota'),
(3, 3, 'Manizales'),
(4, 4, 'Valledupar'),
(5, 5, 'Cali');

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
(1, 27, 1, 'Supervisor'),
(2, 28, 1, 'Supervisor'),
(4, 32, 4, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `cot_codigo` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `cot_ciudad` int(11) NOT NULL,
  `cot_dir` varchar(60) NOT NULL,
  `cot_token` varchar(12) NOT NULL,
  `cot_estado` varchar(20) NOT NULL,
  `cot_fecha` date NOT NULL,
  `cot_observacion` longtext NOT NULL,
  `cot_pago` varchar(100) NOT NULL,
  `cot_iva` varchar(10) NOT NULL,
  `cot_plazo` varchar(100) NOT NULL,
  `cot_entrega` varchar(100) NOT NULL,
  `cot_encargado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`cot_codigo`, `usu_codigo`, `cot_ciudad`, `cot_dir`, `cot_token`, `cot_estado`, `cot_fecha`, `cot_observacion`, `cot_pago`, `cot_iva`, `cot_plazo`, `cot_entrega`, `cot_encargado`) VALUES
(1, 24, 1, 'calle 95 b', 'dpDIB-tjH1B', 'Terminado', '2018-04-09', 'Hola', '', '', '', '', 0),
(2, 24, 1, 'calle 95 b', 'ZwEQl-4nwMU', 'Terminado', '2018-05-07', '', 'sajdkas', '21321', 'sd', 'das', 21);

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
(2, 1, 'Cundinamarca'),
(3, 1, 'Caldas'),
(4, 1, 'Cesar'),
(5, 1, 'Valle del Cauca');

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
(1, 'Bancolombia', '982837253', 'Bancolombia SAS'),
(2, 'Servienterga', '9879876', 'servientrega SAS'),
(6, 'EPM', '9823240', 'Empresa Publicas de Medellin');

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
(27, ' ', ' ', ' '),
(28, ' ', ' ', ' '),
(32, ' ', ' ', ' '),
(21, 'main--navdark ', 'navigatordark', 'menu--toposcuro'),
(22, '', '', ''),
(24, '', '', ''),
(25, '', '', ''),
(36, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_web`
--

CREATE TABLE `gestion_web` (
  `gw_codigo` int(11) NOT NULL,
  `gw_micro_des` varchar(100) NOT NULL,
  `gw_mision` longtext NOT NULL,
  `gw_vision` longtext CHARACTER SET utf8 NOT NULL,
  `gw_politicas` longtext NOT NULL,
  `gw_st_section2-2` varchar(100) NOT NULL,
  `gw_ct_telefono` int(15) NOT NULL,
  `gw_ct_telefono_2` int(15) NOT NULL,
  `gw_ct_whatsapp` bigint(20) NOT NULL,
  `gw_ct_correo` varchar(150) NOT NULL,
  `gw_ct_direccion` varchar(200) NOT NULL,
  `gw_logo` varchar(150) NOT NULL,
  `usu_codigo` int(11) DEFAULT NULL,
  `gw_hora_inicio` time NOT NULL,
  `gw_hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gestion_web`
--

INSERT INTO `gestion_web` (`gw_codigo`, `gw_micro_des`, `gw_mision`, `gw_vision`, `gw_politicas`, `gw_st_section2-2`, `gw_ct_telefono`, `gw_ct_telefono_2`, `gw_ct_whatsapp`, `gw_ct_correo`, `gw_ct_direccion`, `gw_logo`, `usu_codigo`, `gw_hora_inicio`, `gw_hora_fin`) VALUES
(1, 'Para tus Recargas, Remanuractura y Venta de Toner y Cartuchos comunicate con Nosotros', 'Nuestra empresa brinda los mÃ¡s altos estÃ¡ndares de calidad y agilidad, con personal idÃ³neo en cada Ã¡rea de trabajo, para optimizar los resultados de nuestros clientes, quienes son nuestra razÃ³n de ser, estamos comprometidos con nuestro servicio al crecimiento del empresario antioqueÃ±o.\n', 'En el aÃ±o 2020 Maxirecargas S.A.S TÃ³ner y Cartuchos, serÃ¡ la compaÃ±Ã­a lÃ­der de la regiÃ³n del valle del aburra en la prestaciÃ³n del servicio y distribuciÃ³n de insumos de impresiÃ³n a pequeÃ±as y medianas empresas tanto del sector pÃºblico como privado. Estableceremos relaciones internacionales para tener productos Ãºnicos de importaciÃ³n.\n', 'maxirecargas s.a.s coprometido con el medio ambiente trabaja de la mano de empresas con el conocimiento en el manejo de los desechos que se producen dia a dia en su labor para general menos contaminantes en nuestro planeta.', '', 5774223, 2557575, 3233557660, 'yonosoybond@gmail.com', 'Calle 6 c sur # 83a45', 'logo.png', NULL, '08:16:00', '19:16:00');

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
(1, 35, '2018-04-06', 3),
(2, 35, '2018-04-06', 3),
(3, 31, '2018-04-06', 8),
(4, 27, '2018-04-06', 98),
(5, 33, '2018-04-12', 8),
(6, 32, '2018-04-13', 1),
(7, 26, '2018-05-06', 1),
(8, 26, '2018-05-06', 1),
(9, 27, '2018-05-06', 1),
(10, 26, '2018-05-06', 1);

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
(53, ' Epson', 'Seiko Epson Corporation.'),
(54, ' LG', 'LG Electronic.'),
(56, ' Lenovo', ' Lenovo.'),
(57, ' Apple', ' Apple Inc.'),
(58, 'HP', 'Hewlett-Packard, mÃ¡s conocida como HP.'),
(59, 'Samsung', 'Samsung Group.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_personalizados`
--

CREATE TABLE `mensajes_personalizados` (
  `id_mensaje` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `mensaje` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes_personalizados`
--

INSERT INTO `mensajes_personalizados` (`id_mensaje`, `usu_codigo`, `mensaje`) VALUES
(1, 21, 'Hola!. Bienvenido a la asistencia virtual Maxirecarga.'),
(2, 21, 'Â¿En que te podemos ayudar?'),
(3, 21, 'No pienses que te hemos abandonado. Dame un momento.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajexchat`
--

CREATE TABLE `mensajexchat` (
  `chat_token` varchar(20) NOT NULL,
  `chat_asistente` varchar(50) NOT NULL,
  `mensaje` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'usuarios', 'clientes', '<i class=\"fa fa-users\" aria-hidden=\"true\"></i>'),
(2, 'productos', 'productos', '<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i>'),
(3, 'Pedidos', 'pedidos', '<i class=\"fa fa-bullhorn\" aria-hidden=\"true\"></i>'),
(4, 'cotizacion', 'cotizacion', '<i class=\"fa fa-wrench\" aria-hidden=\"true\"></i>'),
(5, 'Rutas', 'rutas', '<i class=\"fa fa-motorcycle\" aria-hidden=\"true\"></i>'),
(6, 'Asistente Virtual', 'asistencia_virtual', '<i class=\"fa fa-comments\"></i>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_busqueda`
--

CREATE TABLE `opciones_busqueda` (
  `opc_bus_id` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `opc_bus_tags` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opciones_busqueda`
--

INSERT INTO `opciones_busqueda` (`opc_bus_id`, `pro_codigo`, `opc_bus_tags`) VALUES
(15, 25, 'HP, TONER, CB435A, GENERICO, ORIGINAL'),
(16, 26, 'HP, TONER, CE255A, GENERICO, ORIGINAL'),
(17, 27, 'HP, TONER, CE278A, GENERICO, ORIGINAL'),
(18, 28, 'HP, TONER, CF226A, GENERICO, ORIGINAL'),
(19, 29, 'HP, TONER, CF280X, GENERICO, ORIGINAL'),
(20, 30, 'PC, COMPUTADOR, MAC, IOS, APPLE, EAPLMQ2Y2E/A'),
(21, 31, 'HP, LaserJet, Enterprise, P3015d, impresora'),
(22, 32, 'HP, LaserJet, P1005, impresora'),
(23, 33, 'Hp, LaserJet, Pro 400, M401n, impresora'),
(24, 34, 'Hp, cartucho, hp-662'),
(25, 35, 'dragon ball z,juan,37');

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
  `ped_encargado` int(11) DEFAULT NULL,
  `ped_ciudad` int(11) NOT NULL,
  `ped_direccion` varchar(200) NOT NULL,
  `ped_estado` varchar(100) NOT NULL,
  `ped_token` varchar(13) NOT NULL,
  `ped_fecha` date NOT NULL,
  `ped_fecha_entrega` date NOT NULL,
  `ped_hora_entrega` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ped_codigo`, `ped_encargado`, `ped_ciudad`, `ped_direccion`, `ped_estado`, `ped_token`, `ped_fecha`, `ped_fecha_entrega`, `ped_hora_entrega`) VALUES
(1, NULL, 1, 'calle 95 b', 'En Bodega', 'L4o17-10tdX', '2018-04-06', '2018-04-06', '18:00:00'),
(2, 26, 1, 'calle 95 b', 'Terminado', 'AkrFI-FqV9I', '2018-04-06', '2018-04-06', '18:00:00'),
(3, NULL, 1, 'calle 95 b', 'En Bodega', 'PNva1-MRgPO', '2018-04-06', '2018-04-06', '18:00:00'),
(4, 26, 1, 'calle 95 b', 'Cancelado', 'azygw-4K7Is', '2018-04-06', '2018-04-07', '10:00:00'),
(5, 26, 1, 'calle 95 b', 'En Proceso', 'UQaSv-7bo3e', '2018-04-12', '2018-04-14', '14:00:00'),
(6, NULL, 1, 'calle 43', 'recepcion', 'vTzQC-6vzIW', '2018-04-13', '2018-04-14', '14:00:00'),
(7, NULL, 1, 'calle 95 b', 'En Bodega', 'mpxF8-5JiCb', '2018-05-07', '2018-05-23', '12:01:00'),
(8, NULL, 1, 'calle 95 b', 'En Bodega', 'yPv4s-n3yqv', '2018-05-07', '2018-05-23', '12:01:00'),
(9, NULL, 1, 'calle 95 b', 'En Bodega', 'WZVlp-fVtbD', '2018-05-07', '2018-05-23', '12:01:00'),
(10, NULL, 1, 'calle 95 b', 'En Bodega', 'SYs1M-sYK50', '2018-05-07', '2018-05-23', '12:01:00'),
(11, NULL, 1, 'calle 95 b', 'En Bodega', 'VELd3-4hbAQ', '2018-05-07', '2018-05-23', '12:01:00'),
(12, NULL, 1, 'calle 95 b', 'En Bodega', 'Q9hdT-GH9hU', '2018-05-07', '2018-05-18', '12:01:00'),
(13, NULL, 1, 'calle 95 b', 'En Bodega', 'r4Cr4-08Qvr', '2018-05-07', '2018-05-18', '12:01:00'),
(14, NULL, 1, 'calle 95 b', 'En Bodega', 'wY0cS-uI0u1', '2018-05-07', '2018-05-18', '12:01:00'),
(15, NULL, 1, 'calle 95 b', 'En Bodega', 'Bucld-fao42', '2018-05-07', '2018-05-24', '12:01:00'),
(16, NULL, 1, 'calle 95 b', 'En Bodega', 'yIyya-nRQp6', '2018-05-07', '2018-05-24', '12:01:00'),
(17, NULL, 1, 'calle 95 b', 'En Bodega', 'sHOHt-7O6sD', '2018-05-07', '2018-05-30', '13:11:00'),
(18, NULL, 1, 'calle 95 b', 'En Bodega', 'akDYq-1TCFM', '2018-05-07', '2018-05-09', '13:01:00'),
(19, NULL, 1, 'calle 95 b', 'En Bodega', '11ZLF-5yHrI', '2018-05-07', '2018-05-24', '13:02:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoxproducto`
--

CREATE TABLE `pedidoxproducto` (
  `ped_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `tip_ser_codigo` int(11) NOT NULL,
  `pedxpro_cantidad` int(11) NOT NULL,
  `pedxpro_observacion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidoxproducto`
--

INSERT INTO `pedidoxproducto` (`ped_codigo`, `pro_codigo`, `tip_ser_codigo`, `pedxpro_cantidad`, `pedxpro_observacion`) VALUES
(1, 35, 11, 3, 'Ya'),
(2, 35, 11, 3, 'Ya'),
(3, 31, 13, 8, 'HOLA'),
(4, 27, 11, 98, '89798'),
(5, 33, 13, 8, '8'),
(6, 32, 13, 1, ''),
(12, 26, 11, 1, ''),
(13, 26, 11, 1, ''),
(14, 27, 11, 1, ''),
(19, 26, 11, 1, '');

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
(27, 6, 7, 1, 1, 1, 1),
(39, 2, 2, 1, 1, 1, 1),
(41, 3, 2, 1, 1, 1, 1),
(42, 4, 2, 1, 1, 1, 1),
(43, 5, 2, 1, 1, 1, 1),
(45, 1, 2, 1, 1, 1, 1),
(46, 6, 2, 1, 1, 1, 1),
(48, 5, 5, 0, 1, 0, 1);

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
(25, 58, 3, 'CB435A', '', '1522966526.png', 1),
(26, 58, 3, 'CE255A', '', '1522966644.png', 1),
(27, 58, 3, 'CE278A', '', '1522966706.png', 1),
(28, 58, 3, 'CF226A', '', '1522966741.png', 1),
(29, 58, 3, 'CF280X', '', '1522967199.png', 1),
(30, 57, 1, 'EAPLMQ2Y2E/A', '', '1522967254.png', 1),
(31, 58, 2, 'Hp LaserJet Enterprice P3015d', '', '1522967419.png', 1),
(32, 58, 2, 'Hp LaserJet P1005', '', '1522967497.png', 1),
(33, 58, 2, 'Hp LaserJet Pro 400 M401n', '', '1522967640.png', 1),
(34, 58, 4, 'Hp-662', '', '1522967704.png', 1),
(35, 59, 2, 'NJ2', 'Inrompible', '1523039691.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prodxcot`
--

CREATE TABLE `prodxcot` (
  `cot_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `proxcot_cantidad` int(11) NOT NULL,
  `tip_servicio` int(11) NOT NULL,
  `proxcod_observacion` longtext NOT NULL,
  `proxcod_res` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prodxcot`
--

INSERT INTO `prodxcot` (`cot_codigo`, `pro_codigo`, `proxcot_cantidad`, `tip_servicio`, `proxcod_observacion`, `proxcod_res`) VALUES
(1, 32, 2, 13, '', 25000),
(2, 26, 1, 11, '', 213);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `rep_codigo` int(11) NOT NULL,
  `ped_codigo` int(11) NOT NULL,
  `rep_observacion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`rep_codigo`, `ped_codigo`, `rep_observacion`) VALUES
(1, 4, 'loij');

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
(1, 1, 'Calatrava', 'calle 98', 3235467),
(2, 2, 'Calatrava', 'calle 78', 3234354),
(4, 6, 'Sede sur', 'calle 4 sur', 3234365);

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
(11, 25),
(12, 25),
(14, 25),
(15, 25),
(11, 26),
(12, 26),
(14, 26),
(15, 26),
(11, 27),
(12, 27),
(14, 27),
(15, 27),
(11, 28),
(12, 28),
(14, 28),
(15, 28),
(11, 29),
(12, 29),
(14, 29),
(15, 29),
(13, 30),
(13, 31),
(13, 32),
(13, 33),
(11, 34),
(14, 34),
(15, 34),
(11, 35),
(12, 35);

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
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `tip_pro_codigo` int(11) NOT NULL,
  `tip_pro_nombre` varchar(20) NOT NULL,
  `tip_pro_descripcion` varchar(200) NOT NULL,
  `tip_pro_imagen` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`tip_pro_codigo`, `tip_pro_nombre`, `tip_pro_descripcion`, `tip_pro_imagen`) VALUES
(1, 'Computador', 'desp\r\n', 'computador.png'),
(2, 'Impresora', '', 'impresora.png'),
(3, 'Toner', '', 'toner.png'),
(4, 'Cartucho', '', 'cartuchos.png');

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
(11, 'Recarga', '', '2018-04-05'),
(12, 'Remanufactura', '', '2018-04-05'),
(13, 'Venta', '', '2018-04-05'),
(14, 'Venta Original', '', '2018-04-05'),
(15, 'Venta Generica', '', '2018-04-05');

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
(1, 'Persona Natural', 'false'),
(2, 'Administrador', 'true'),
(3, 'Persona Juridica', 'false'),
(5, 'Mensajero', 'true'),
(8, 'Profe', 'true');

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
  `usu_telefono` bigint(10) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `usu_direccion` varchar(200) NOT NULL,
  `usu_celular` bigint(20) NOT NULL,
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
(21, 1, 9904, 'Cristian', 'Alexis', 'Lopera', 'Lopera', 'yonosoybond@gmail.com', 4887088, 1, 'calle 95', 3233557660, '2018-04-04', 'masculino', 2, 1, '1523237236.png', '2018-04-05', '2018-04-05'),
(22, 1, 1234, 'Carlos', '', 'Gaviria', '', 'calopera@misena.edu.co', 3809897, 1, 'calle 6 sur', 3234322423, '1966-11-11', 'masculino', 5, 1, 'default.jpg', '2018-04-05', '2018-04-05'),
(24, 1, 1214, 'Cristian', 'hola', 'Lopera', '89789', 'caloper@misena.edu.co', 78, 1, 'calle 95 b', 67587, '2018-04-03', 'masculino', 1, 1, '1523246269.png', '2018-04-05', '2018-04-05'),
(25, 1, 9898, 'Andres', '', 'Salazar', '', 'andressal@gmail.com', 3234567, 1, 'calle 6 sur', 2147483647, '1985-01-16', 'masculino', 5, 1, 'default.jpg', '2018-04-06', '2018-04-06'),
(26, 1, 6767, 'Marlon', '', 'Morenos', '', 'mm@gmail.com', 3453212, 1, 'calle 50 ', 0, '0000-00-00', 'masculino', 5, 1, 'default.jpg', '2018-04-06', '2018-04-06'),
(27, 1, 990, 'Javier', '', 'Perez', '', 'javi@gmail.com', 3234567, 1, 'calle 98', 3115431232, '1994-07-14', 'otro', 3, 1, 'defaul.jpg', '2018-04-06', '2018-04-06'),
(28, 1, 746440, 'Jaime', '', 'Cordoba', '', 'jaime@maxirecargas.com', 103, 1, 'calle 78', 0, '0000-00-00', 'null', 3, 2, 'defaul.jpg', '2018-04-06', '2018-04-06'),
(32, 1, 5050, 'Alfonso', '', 'Bedoya', '', 'ab@gmail.com', 3, 1, 'calle 4 sur', 0, '0000-00-00', 'null', 3, 2, 'defaul.jpg', '2018-04-06', '2018-04-06'),
(36, 1, 909090909, 'luis', '', 'becerra', '', 'becerra@gmail.com', 213214, 2, 'calle 95 b', 0, '0000-00-00', 'masculino', 8, 1, 'default.jpg', '2018-04-06', '2018-04-06');

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
(24, 1, 0),
(24, 2, 20000),
(24, 3, 0),
(24, 4, 0),
(24, 5, 0),
(24, 6, 0),
(24, 7, 0),
(24, 8, 0),
(24, 9, 0),
(24, 10, 0),
(24, 11, 0),
(24, 12, 0),
(24, 13, 0),
(24, 14, 0),
(24, 15, 0),
(24, 16, 0),
(24, 17, 0),
(24, 18, 0),
(24, 19, 0);

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
(24, 1, 0, 1, '2018-04-06'),
(24, 2, 20000, 2, '2018-04-06'),
(24, 3, 0, 3, '2018-04-06'),
(24, 4, 0, 4, '2018-04-06'),
(24, 5, 0, 5, '2018-04-12'),
(24, 6, 0, 6, '2018-04-13'),
(24, 7, 0, 7, '2018-05-06'),
(24, 8, 0, 8, '2018-05-06'),
(24, 9, 0, 9, '2018-05-06'),
(24, 10, 0, 10, '2018-05-06'),
(24, 11, 0, 11, '2018-05-06'),
(24, 12, 0, 12, '2018-05-06'),
(24, 13, 0, 13, '2018-05-06'),
(24, 14, 0, 14, '2018-05-06'),
(24, 15, 0, 15, '2018-05-06'),
(24, 16, 0, 16, '2018-05-06'),
(24, 17, 0, 17, '2018-05-06'),
(24, 18, 0, 18, '2018-05-06'),
(24, 19, 0, 19, '2018-05-06');

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
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_token`),
  ADD KEY `usu_codigo` (`usu_codigo`);

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
  ADD KEY `cot_ciudad` (`cot_ciudad`);

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
  ADD PRIMARY KEY (`mar_codigo`),
  ADD UNIQUE KEY `mar_nombre` (`mar_nombre`);

--
-- Indices de la tabla `mensajes_personalizados`
--
ALTER TABLE `mensajes_personalizados`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `mensajexchat`
--
ALTER TABLE `mensajexchat`
  ADD KEY `chat_token` (`chat_token`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `opciones_busqueda`
--
ALTER TABLE `opciones_busqueda`
  ADD PRIMARY KEY (`opc_bus_id`),
  ADD KEY `pro_codigo` (`pro_codigo`);

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
  ADD KEY `ped_encargado` (`ped_encargado`),
  ADD KEY `ped_ciudad` (`ped_ciudad`);

--
-- Indices de la tabla `pedidoxproducto`
--
ALTER TABLE `pedidoxproducto`
  ADD KEY `pro_codigo` (`pro_codigo`),
  ADD KEY `pro_codigo_2` (`pro_codigo`),
  ADD KEY `ped_codigo` (`ped_codigo`),
  ADD KEY `ped_codigo_2` (`ped_codigo`),
  ADD KEY `tip_ser_codigo` (`tip_ser_codigo`);

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
  ADD UNIQUE KEY `pro_referencia` (`pro_referencia`),
  ADD KEY `tip_pro_codigo` (`tip_pro_codigo`),
  ADD KEY `mar_codigo` (`mar_codigo`);

--
-- Indices de la tabla `prodxcot`
--
ALTER TABLE `prodxcot`
  ADD KEY `pro_codigo` (`pro_codigo`),
  ADD KEY `cot_codigo` (`cot_codigo`),
  ADD KEY `proxcot_service` (`tip_servicio`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`rep_codigo`),
  ADD KEY `ped_id` (`ped_codigo`);

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
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`tip_pro_codigo`),
  ADD UNIQUE KEY `tip_pro_nombre` (`tip_pro_nombre`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`Tip_ser_cod`),
  ADD UNIQUE KEY `tip_ser_nombre` (`tip_ser_nombre`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`tip_usu_codigo`),
  ADD UNIQUE KEY `tip_usu_rol` (`tip_usu_rol`);

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
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cliente_empresarial`
--
ALTER TABLE `cliente_empresarial`
  MODIFY `id_cliente_empresarial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `cot_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `emp_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `gestion_web`
--
ALTER TABLE `gestion_web`
  MODIFY `gw_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `historial_productos`
--
ALTER TABLE `historial_productos`
  MODIFY `id_his_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `mar_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `mensajes_personalizados`
--
ALTER TABLE `mensajes_personalizados`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `opciones_busqueda`
--
ALTER TABLE `opciones_busqueda`
  MODIFY `opc_bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ped_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `rep_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `sed_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `tip_pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `Tip_ser_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `tip_usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_empresarial`
--
ALTER TABLE `cliente_empresarial`
  ADD CONSTRAINT `cliente_empresarial_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_empresarial_ibfk_2` FOREIGN KEY (`sed_codigo`) REFERENCES `sede` (`sed_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`cot_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON UPDATE CASCADE;

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
-- Filtros para la tabla `mensajes_personalizados`
--
ALTER TABLE `mensajes_personalizados`
  ADD CONSTRAINT `mensajes_personalizados_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajexchat`
--
ALTER TABLE `mensajexchat`
  ADD CONSTRAINT `mensajexchat_ibfk_1` FOREIGN KEY (`chat_token`) REFERENCES `chats` (`chat_token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opciones_busqueda`
--
ALTER TABLE `opciones_busqueda`
  ADD CONSTRAINT `opciones_busqueda_ibfk_1` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`ped_encargado`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`ped_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidoxproducto`
--
ALTER TABLE `pedidoxproducto`
  ADD CONSTRAINT `pedidoxproducto_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidoxproducto_ibfk_2` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidoxproducto_ibfk_3` FOREIGN KEY (`tip_ser_codigo`) REFERENCES `tipo_servicio` (`Tip_ser_cod`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`tip_pro_codigo`) REFERENCES `tipo_producto` (`tip_pro_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`mar_codigo`) REFERENCES `marca` (`mar_codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
