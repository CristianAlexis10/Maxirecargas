-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2018 a las 16:49:58
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `assign` (IN `orders` INT, IN `usu` INT, IN `estado` VARCHAR(20))  NO SQL
BEGIN 
UPDATE pedido SET pedido.ped_encargado = usu , ped_estado = estado WHERE  pedido.ped_codigo = orders ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarDatosContacto` (IN `num1` INT(15), IN `num2` INT(15), IN `wpp` INT(20), IN `correo` VARCHAR(150), IN `dir` VARCHAR(200))  NO SQL
BEGIN 
UPDATE gestion_web SET gw_ct_telefono = num1 ,gw_ct_telefono_2 = num2,gw_ct_whatsapp=wpp ,gw_ct_correo=correo,gw_ct_direccion=dir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarEstado` (IN `orde` INT, IN `estado` VARCHAR(20))  NO SQL
BEGIN 
UPDATE pedido SET ped_estado = estado WHERE ped_codigo = orde ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiarEstadoPagado` (IN `orde` INT, IN `estado` VARCHAR(20), IN `total` INT)  NO SQL
BEGIN 
UPDATE pedido SET ped_estado = estado WHERE ped_codigo = orde ;
UPDATE ventas SET ventas.ven_total = total WHERE ventas.ped_codigo = orde ;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `contestarCotizacion` (IN `quota` INT, IN `respon` LONGTEXT, IN `estado` VARCHAR(20))  NO SQL
BEGIN 
UPDATE cotizacion SET cotizacion.cot_estado = estado, cotizacion.cot_respuesta=respon WHERE cotizacion.cot_codigo = quota;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearReporte` (IN `orde` INT, IN `estado` VARCHAR(20), IN `obs` MEDIUMTEXT)  NO SQL
BEGIN 
UPDATE pedido SET ped_estado = estado WHERE ped_codigo = orde;
INSERT INTO reporte (ped_codigo,rep_observacion) VALUES (orde,obs);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearSede` (IN `emp_codigo` INT(11), IN `sed_nombre` VARCHAR(50), IN `sed_direccion` VARCHAR(200), IN `sed_telefono` INT(11))  BEGIN

INSERT INTO sede (emp_codigo, sed_nombre, sed_direccion, sed_telefono) VALUES (emp_codigo, sed_nombre, sed_direccion, sed_telefono);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearUsuario` (IN `id_tipo_documento` INT(11), IN `usu_num_documento` INT(11), IN `usu_primer_nombre` VARCHAR(50), IN `usu_primer_apellido` VARCHAR(50), IN `usu_correo` VARCHAR(100), IN `usu_telefono` INT(10), IN `id_ciudad` INT(11), IN `dir` VARCHAR(200), IN `usu_sexo` VARCHAR(50), IN `tip_usu_codigo` INT(11), IN `id_estado` INT(11), IN `usu_foto` LONGTEXT, IN `usu_fechas_registro` DATE, IN `usu_ult_inicio_sesion` DATE)  BEGIN
INSERT INTO usuario  (id_tipo_documento, usu_num_documento, usu_primer_nombre, usu_primer_apellido,  usu_correo,  usu_celular, id_ciudad, usu_direccion,  usu_sexo, tip_usu_codigo, id_estado, usu_foto, usu_fechas_registro, usu_ult_inicio_sesion) VALUES (id_tipo_documento, usu_num_documento,  usu_primer_nombre, usu_primer_apellido, usu_correo, usu_telefono, id_ciudad, dir, usu_sexo, tip_usu_codigo, id_estado, usu_foto, usu_fechas_registro, usu_ult_inicio_sesion);

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
SELECT count(*) FROM tipo_producto INNER JOIN producto ON tipo_producto.tip_pro_codigo = producto.tip_pro_codigo WHERE tipo_producto.tip_pro_nombre=nombre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `readBycategoryPagination` (IN `nombre` VARCHAR(20), IN `ini` INT, IN `ele` INT)  NO SQL
BEGIN
SELECT * FROM tipo_producto INNER JOIN producto ON tipo_producto.tip_pro_codigo = producto.tip_pro_codigo WHERE tipo_producto.tip_pro_nombre=nombre LIMIT ini,ele;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `servicioInner` (IN `cod` INT)  NO SQL
BEGIN 
SELECT * FROM servicioxproducto INNER JOIN tipo_servicio ON servicioxproducto.tip_ser_cod = tipo_servicio.Tip_ser_cod WHERE servicioxproducto.pro_codigo = cod;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `ventaMensual` (IN `Mes` DATE)  NO SQL
BEGIN
SELECT SUM(ventas.ven_total) FROM ventas WHERE MONTH(ven_fecha)= Mes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verCotizacion` (IN `id` INT)  NO SQL
BEGIN 
SELECT * FROM cotizacion T1 INNER JOIN usuario T2 ON T1.usu_codigo = T2.usu_codigo  INNER JOIN ciudad T3 ON T1.cot_ciudad=T3.id_ciudad INNER JOIN prodxcot T4 ON T1.cot_codigo =T4.cot_codigo  INNER JOIN producto T6 ON T4.pro_codigo = T6.pro_codigo INNER JOIN tipo_producto T5 ON T6.tip_pro_codigo = T5.tip_pro_codigo INNER JOIN tipo_servicio T7 ON T4.tip_servicio = T7.Tip_ser_cod WHERE T1.cot_codigo = id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDetalleRuta` (IN `usu` INT, IN `dat` DATE)  NO SQL
BEGIN 
SELECT * FROM usuario t1 INNER JOIN pedido t2 ON t1.usu_codigo = t2.ped_encargado WHERE t1.usu_codigo = usu AND t2.ped_estado != "Terminado"  AND t2.ped_fecha_entrega = dat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDetalleRutaAplazada` (IN `usu` INT, IN `dat` DATE)  NO SQL
BEGIN 
SELECT t2.ped_token FROM usuario t1 INNER JOIN pedido t2 ON t1.usu_codigo = t2.ped_encargado WHERE t1.usu_codigo = usu AND t2.ped_estado = "Aplazado" or t2.ped_estado ="En Proceso" AND t2.ped_fecha_entrega < dat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDetalleRutaCancelada` (IN `usu` INT)  NO SQL
BEGIN 
SELECT t2.ped_token FROM usuario t1 INNER JOIN pedido t2 ON t1.usu_codigo = t2.ped_encargado WHERE t1.usu_codigo = usu AND t2.ped_estado = "Cancelado";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDetalleRutaFinalizadaBy` (IN `usu` INT)  NO SQL
BEGIN 
SELECT t2.ped_token FROM usuario t1 INNER JOIN pedido t2 ON t1.usu_codigo = t2.ped_encargado WHERE t1.usu_codigo = usu AND t2.ped_estado = "Terminado";
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
  `acc_contra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`token`, `usu_codigo`, `acc_contra`) VALUES
('112daaf62d419900664134a51308b48c', 5, '$2y$10$ig2pPXL49V6HmRG7PPiEm.bWBMr4cqyv/BXhJAak5PzygxZ.uIP9q'),
('6ca9e3d254f89dd36920fff1d379e39d', 4, '$2y$10$5noEbhHlhUrLlxso33tKxOyySfuWy8D3n2UwXebmfyZXtJtnCxDXW'),
('a37eeba50c06a5a44cc399ade0ebe013', 6, '$2y$10$sHmxI46syWozaM2xr15NY..ixWEkud/IHycU2X6sIG.BZaTtkvFou'),
('bd738f17da325a7fd25cfbfd9d378c1e', 1, '$2y$10$6wECK2ItNCoZZijFta7e3uVoqb0zDbz2nOiSLsG8GpMxdM21J1JzW'),
('cfc3146525e6edeb020fed1428f29d36', 2, '$2y$10$71RniIRoncNKrE8TRZtFve5FZqF7op.vr9lEnQa/YxRgunLDTDNvy'),
('fa82f50683e23221b609ff3445ec133c', 3, '$2y$10$ihq75QwdpNDOla.z74W97OC.uy/CKGcvQZxFBbbEPwr7kInr62aIm');

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
(1, 1, 10, 'Admin');

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
  `cot_respuesta` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`cot_codigo`, `usu_codigo`, `cot_ciudad`, `cot_dir`, `cot_token`, `cot_estado`, `cot_fecha`, `cot_respuesta`) VALUES
(15, 1, 1, 'calle 95', 'tTNgX-Mprjx', 'Terminado', '2018-01-11', 'ya respondi'),
(16, 1, 1, 'Calle 95 #44-35', 'zt1yE-VhGPd', 'En Recepcion', '2018-01-22', ''),
(17, 1, 1, 'Calle 95 #44-35', 'rjD5Z-qHl44', 'En Recepcion', '2018-02-01', '');

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
(13, 'SystemOn', '1234567', 'no se ');

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
(2, 'main--navdark ', 'navigatordark', 'menu--toposcuro'),
(21, ' ', ' ', ' '),
(22, ' ', ' ', ' '),
(25, ' ', ' ', ' '),
(26, ' ', ' ', ' '),
(27, ' ', ' ', ' '),
(28, ' ', ' ', ' '),
(29, ' ', ' ', ' '),
(1, ' ', ' ', ' '),
(2, 'main--navdark ', 'navigatordark', 'menu--toposcuro'),
(3, ' ', ' ', ' '),
(3, ' ', ' ', ' '),
(4, ' ', ' ', ' '),
(5, ' ', ' ', ' '),
(6, ' ', ' ', ' '),
(7, ' ', ' ', ' '),
(8, ' ', ' ', ' '),
(5, ' ', ' ', ' '),
(6, ' ', ' ', ' ');

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
  `gw_ct_telefono` int(15) NOT NULL,
  `gw_ct_telefono_2` int(15) NOT NULL,
  `gw_ct_whatsapp` int(20) NOT NULL,
  `gw_ct_correo` varchar(150) NOT NULL,
  `gw_ct_direccion` varchar(200) NOT NULL,
  `usu_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gestion_web`
--

INSERT INTO `gestion_web` (`gw_codigo`, `gw_tl_section1`, `gw_st_section1`, `gw_tl_section2`, `gw_st_section2-1`, `gw_st_section2-2`, `gw_ct_telefono`, `gw_ct_telefono_2`, `gw_ct_whatsapp`, `gw_ct_correo`, `gw_ct_direccion`, `usu_codigo`) VALUES
(1, '', '', '', '', '', 5774223, 2557575, 2147483647, 'maxirecargas2009@hotmail.com', 'Calle 6 c sur # 83a45', NULL);

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
(1, 1, '2018-01-07', 1),
(2, 2, '2018-01-07', 3),
(3, 1, '2018-01-07', 1),
(4, 1, '2018-01-08', 1),
(5, 1, '2018-01-08', 1),
(6, 1, '2018-01-08', 1),
(7, 1, '2018-01-08', 1),
(8, 2, '2018-01-08', 2),
(9, 1, '2018-01-09', 7),
(10, 2, '2018-01-09', 9),
(11, 1, '2018-01-09', 9),
(12, 1, '2018-01-10', 1),
(13, 1, '2018-01-10', 1),
(14, 1, '2018-01-17', 856),
(15, 1, '2018-01-22', 1),
(16, 1, '2018-01-22', 1),
(17, 1, '2018-02-02', 2);

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
(2, 'Epson', 'epson des'),
(3, 'cosiaco', '435');

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
(32, 3, 1, 'Calle 95 #40-35', 'En Bodega', 'KKl8p-v3X2V', '2018-01-17', '2018-01-17', '13:00:00'),
(33, 3, 1, 'Calle 95 #44-35', 'Terminado', '7UWJh-jQAGV', '2018-01-08', '0000-00-00', '00:00:00'),
(34, 3, 1, 'Calle 95 #47-35', 'En Proceso', 'kNEXi-zFwYC', '2018-01-10', '2018-01-18', '00:00:00'),
(35, 3, 1, 'Calle 95 #44-35', 'En Proceso', 'eOCDt-tZsph', '2018-01-15', '2018-01-18', '00:00:00'),
(36, NULL, 1, 'Calle 95 #44-35', 'En Bodega', '2NfEP-94dKU', '2018-01-15', '0000-00-00', '00:00:00'),
(37, 4, 1, 'Calle 95 #44-35', 'En Proceso', 'H2pL4-54RFU', '2018-01-18', '2018-01-23', '00:00:00'),
(38, NULL, 1, 'Calle 95 #44-35', 'En Bodega', 'effWZ-Imgs2', '2018-01-22', '2018-01-26', '12:01:00'),
(39, NULL, 1, 'Calle 95 #44-35', 'En Bodega', 'LPRec-1sHp0', '2018-01-22', '2018-01-26', '12:01:00'),
(40, NULL, 1, 'Calle 95 #44-35', 'En Bodega', 'FhXLB-yD1fN', '2018-02-02', '2018-02-02', '00:00:00');

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
(32, 1, 5, 1, 'Ninguna'),
(33, 1, 4, 1, 'Ninguna'),
(33, 2, 9, 2, 'Ninguna'),
(34, 1, 5, 7, 'ninguna'),
(34, 2, 9, 9, 'nada'),
(34, 1, 4, 9, 'nada'),
(35, 1, 4, 1, '1'),
(36, 1, 4, 1, '1'),
(37, 1, 4, 856, '56757'),
(38, 1, 4, 1, 'lkhkk'),
(39, 1, 4, 1, 'lkhkk'),
(40, 1, 4, 2, '');

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
(7, 1, 6, 0, 1, 1, 0),
(8, 5, 5, 0, 0, 1, 1);

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
(1, 1, 1, 'hola', 'carac															', '1518554159.png', 1),
(2, 1, 1, 'hola2', 'hoa', '1518554159.png', 1),
(3, 1, 1, 'We-gs62', '', '1518554159.png', 1),
(4, 1, 1, 'QW-34se', '', '1518554159.png', 1),
(5, 1, 1, 'RR2-ds4', '', '1518554159.png', 1),
(6, 1, 1, 'PAQ-034', '', '1518554159.png', 1),
(7, 1, 1, 'MAS-mier32', '', '1518554159.png', 1),
(8, 1, 1, 'COM-3p4', '', '1518554159.png', 1),
(9, 1, 1, 'XEM-w4w5', '', '1518554159.png', 1),
(10, 1, 1, 'VEN-p4c4', '', '1518554159.png', 1),
(11, 1, 1, 'DEF-30j', '', '1518554159.png', 1),
(12, 1, 1, 'ESE-3254s', '', '1518554159.png', 1),
(13, 1, 1, 'POI-234', '', '1518554159.png', 1),
(14, 1, 1, 'HIK-2s2', '', '1518554159.png', 1),
(15, 1, 1, 'LOL-32wq', '', '1518554159.png', 1),
(16, 1, 1, 'ASW-12rd', '			', '1518554159.png', 1),
(17, 1, 1, 'QWP-xi3', '', '1518554159.png', 1),
(18, 1, 1, 'PAE-23m', '', '1518554159.png', 1),
(19, 1, 1, 'AABBNN', 'klvjh', '1518556491.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prodxcot`
--

CREATE TABLE `prodxcot` (
  `cot_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `proxcot_cantidad` int(11) NOT NULL,
  `tip_servicio` int(11) NOT NULL,
  `proxcod_observacion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prodxcot`
--

INSERT INTO `prodxcot` (`cot_codigo`, `pro_codigo`, `proxcot_cantidad`, `tip_servicio`, `proxcod_observacion`) VALUES
(15, 1, 11, 4, 'nada'),
(16, 1, 9878, 4, '8789'),
(17, 1, 2, 4, '22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `rep_codigo` int(11) NOT NULL,
  `ped_codigo` int(11) NOT NULL,
  `rep_observacion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(10, 13, 'DECYE', 'calle 95 #33-35', 5212067);

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
(3, 2),
(9, 2),
(4, 1),
(5, 1),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(9, 8),
(7, 9),
(7, 10),
(9, 10),
(7, 11),
(7, 12),
(3, 13),
(9, 14),
(7, 15),
(7, 17),
(3, 18),
(9, 16),
(4, 19),
(5, 19);

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
(1, 1, 21, 22, 22),
(2, 2, 33, 3456, 456),
(3, 3, 4, 750000, 920000),
(4, 4, 9, 430000, 830000),
(5, 5, 32, 250000, 400000),
(6, 6, 15, 320000, 601000),
(7, 7, 12, 120000, 210000),
(8, 8, 32, 540000, 700000),
(9, 9, 20, 200000, 300000),
(10, 10, 13, 123000, 321000),
(11, 11, 5, 430000, 540000),
(12, 12, 3, 20000, 100000),
(13, 13, 23, 550000, 1200000),
(14, 14, 16, 280000, 430000),
(15, 15, 4, 320000, 540000),
(16, 16, 3, 244000, 500000),
(17, 17, 1, 432000, 532000),
(18, 18, 2, 800000, 980000),
(19, 19, 32, 2300, 3242);

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
(4, 'recarga', 'sadsa', '2017-12-04'),
(5, 'remanufactura', '', '2017-12-13'),
(7, 'Domicilio', '', '2017-12-13'),
(8, 'Recargas', '', '2017-12-13'),
(9, 'Domicilio4', '', '2017-12-13');

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
(5, 'Mensajero', 'true'),
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
(1, 1, 1214, 'Cristian', '', 'Lopera', '', 'yonosoybond@gmail.com', 43, 1, 'Calle 95 #44-35', 32356789, '2018-01-17', 'null', 3, 1, 'default.jpg', '2018-01-07', '2018-01-07'),
(2, 1, 9904, 'Cristian', 'Lopera', 'Lopera', 'Bedoya', 'cristian1020011@gmail.com', 123, 1, 'Calle 95', 3157890, '2018-01-12', 'masculino', 2, 1, 'default.jpg', '2018-01-07', '2018-01-07'),
(3, 1, 123, 'Andres', '', 'Lopez', '', 'calopera18@misena.edu.co', 234567, 1, 'calle 90 ', 32256789, '0000-00-00', 'masculino', 5, 1, 'default.jpg', '2018-01-10', '2018-01-10'),
(4, 1, 1234, 'Carlos', '', 'gaviria', '', 'calopera18@misena.edu.co', 0, 2, 'calle 6 sur', 323355, '0000-00-00', 'masculino', 5, 1, 'default.jpg', '2018-01-15', '2018-01-15'),
(5, 1, 8888, 'evelin', '', 'herrera', '', 'yonosoybond@gmail.com', 77, 1, 'calle 6 sur ', 521, '2018-01-20', 'femenino', 1, 1, 'default.jpg', '2018-01-20', '2018-01-20'),
(6, 1, 1214746, 'Javier', '', 'nose', '', 'yonosoybond@gmail.com', 0, 1, 'calle 7 sur', 2147483647, '0000-00-00', 'masculino', 5, 2, 'default.jpg', '2018-01-20', '2018-01-20');

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
(1, 32, 0),
(1, 33, 0),
(1, 34, 0),
(1, 35, 0),
(1, 36, 0),
(1, 37, 0),
(1, 38, 0),
(1, 39, 0),
(1, 40, 0);

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
(1, 23, 0, 32, '2018-01-08'),
(1, 24, 5678, 33, '2018-01-08'),
(1, 25, 0, 34, '2018-01-09'),
(1, 26, 0, 35, '2018-01-10'),
(1, 27, 0, 36, '2018-01-10'),
(1, 28, 0, 37, '2018-01-17'),
(1, 29, 0, 38, '2018-01-22'),
(1, 30, 0, 39, '2018-01-22'),
(1, 31, 0, 40, '2018-02-02');

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
  MODIFY `id_cliente_empresarial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `cot_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `emp_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `gw_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `historial_productos`
--
ALTER TABLE `historial_productos`
  MODIFY `id_his_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
  MODIFY `ped_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `rep_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `rut_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `sed_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `sto_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
  MODIFY `Tip_ser_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `tip_usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
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
-- Filtros para la tabla `historial_productos`
--
ALTER TABLE `historial_productos`
  ADD CONSTRAINT `historial_productos_ibfk_1` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

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
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`tip_usu_codigo`) REFERENCES `tipo_usuario` (`tip_usu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`tip_pro_codigo`) REFERENCES `tipo_producto` (`tip_pro_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`mar_codigo`) REFERENCES `marca` (`mar_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `prodxcot`
--
ALTER TABLE `prodxcot`
  ADD CONSTRAINT `prodxcot_ibfk_2` FOREIGN KEY (`tip_servicio`) REFERENCES `tipo_servicio` (`Tip_ser_cod`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prodxcot_ibfk_3` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prodxcot_ibfk_4` FOREIGN KEY (`cot_codigo`) REFERENCES `cotizacion` (`cot_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`emp_codigo`) REFERENCES `empresa` (`emp_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicioxproducto`
--
ALTER TABLE `servicioxproducto`
  ADD CONSTRAINT `servicioxproducto_ibfk_2` FOREIGN KEY (`tip_ser_cod`) REFERENCES `tipo_servicio` (`Tip_ser_cod`) ON UPDATE CASCADE,
  ADD CONSTRAINT `servicioxproducto_ibfk_3` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`tip_usu_codigo`) REFERENCES `tipo_usuario` (`tip_usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarioxpedido`
--
ALTER TABLE `usuarioxpedido`
  ADD CONSTRAINT `usuarioxpedido_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioxpedido_ibfk_2` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
