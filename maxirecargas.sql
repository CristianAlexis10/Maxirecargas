-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2017 a las 22:37:06
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `1374363`
--
CREATE DATABASE IF NOT EXISTS `1374363` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `1374363`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `Codigo` int(10) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`Codigo`, `Nombre`, `Correo`, `Telefono`) VALUES
(1, 'Juan', 'juan12@gmail.com', '3214897'),
(2, 'Jorge\r\n', 'jorge14@gmial.com', '5876498'),
(3, 'Sebastian', 'seb16@gmail.com\r\n', '6218542'),
(4, 'Jose', 'jose17@gmail.com', '5268741'),
(5, 'Robert', 'robert18@gmail.com', '2689854'),
(6, 'Hernan', 'hernan@gmail.com', '2598741'),
(7, 'Alfonso', 'alfonso@gmail.com', '3025874'),
(8, 'Camila', 'camil19@gmail.com', '3214897');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `codigo` int(11) NOT NULL,
  `seccion` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`codigo`, `seccion`, `titulo`, `imagen`, `hora`) VALUES
(1, 'MÃºsica', 'Â¿Y por quÃ© Paul no viene a MedellÃ­n?', 'eje1img\\imagen1.jpg', '07:54'),
(2, 'Ciclismo', 'Rigo ahora va por LombardÃ­a', 'eje1img\\imagen2.jpg', '07:56'),
(3, 'Internacional', 'Lluvias de Nate dejan al menos 23 muertos y 27 desaparecidos en CentroamÃ©rica', 'eje1img\\imagen3.jpg', '07:56'),
(4, 'Colombia', 'Hoy se definirÃ­a la legalidad del paro de Avianca', 'eje1img\\imagen4.jpg', '07:57'),
(5, 'EducaciÃ³n', 'A mÃ¡s estudios, Â¿mejor salario?', 'eje1img\\imagen5.jpg', '07:57'),
(6, 'Intenacional', 'CampaÃ±a para Abolir las Armas Nucleares gana el Nobel de Paz', 'eje1img\\imagen6.jpg', '07:58'),
(7, 'FÃºtbol', 'Ospina y Silva, las dos caras de la moneda', 'eje1img\\imagen7.jpg', '07:59'),
(85, '85', '85', 'imagen5.jpg', '17:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE `seguridad` (
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `avatar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridad`
--

INSERT INTO `seguridad` (`usuario`, `clave`, `nombre`, `avatar`) VALUES
('DG', 'd19', 'Daniel', 'img\\img1.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`codigo`);
--
-- Base de datos: `1422439`
--
CREATE DATABASE IF NOT EXISTS `1422439` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `1422439`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `EMPCED` bigint(30) NOT NULL,
  `EMPNOM` varchar(100) NOT NULL,
  `EMPAPE` varchar(100) NOT NULL,
  `EMPCEL` int(15) NOT NULL,
  `EMPDIR` varchar(100) NOT NULL,
  `EMPCOR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`EMPCED`, `EMPNOM`, `EMPAPE`, `EMPCEL`, `EMPDIR`, `EMPCOR`) VALUES
(454, 'fgdfg', 'dfgdfg', 54541, 'dfgdfg', 'sdsd@gmail.com'),
(1234, 'pepe', 'lotudo', 55555, 'robledo', 'pepe@gmail.com'),
(99100812465, 'sebastian', 'galeano', 2990801, 'robledo', 'sebas@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Usuario` varchar(100) NOT NULL,
  `Contrase` varchar(100) NOT NULL,
  `Codigo` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Usuario`, `Contrase`, `Codigo`, `Nombre`, `Imagen`) VALUES
('sebas', '1234', '1', 'sebas', 'imagen1.png'),
('lol', '12', '2', 'annie', 'imagen1.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`EMPCED`);
--
-- Base de datos: `cine`
--
CREATE DATABASE IF NOT EXISTS `cine` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cine`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_reproduccion`
--

CREATE TABLE `categoria_reproduccion` (
  `id_categoria` int(11) NOT NULL,
  `nom_categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupos`
--

CREATE TABLE `cupos` (
  `id_sala` int(11) DEFAULT NULL,
  `num_cupos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cupos`
--

INSERT INTO `cupos` (`id_sala`, `num_cupos`) VALUES
(NULL, 1),
(NULL, 0),
(NULL, 5),
(NULL, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre_gen` varchar(100) DEFAULT NULL,
  `descripcion` longtext NOT NULL,
  `imagen` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre_gen`, `descripcion`, `imagen`) VALUES
(16, 'aaasdsaadsafsd fbgrve g ', 'aa', 'd30f7f3d8f5db14e963e26fe902dbf47.jpg'),
(19, 'terror', 'este es el genero de terror', '9453c9912a7221665f272baa929b96fe.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `cod_peli` int(11) NOT NULL,
  `nombre_peli` varchar(50) DEFAULT NULL,
  `id_genero` int(11) NOT NULL,
  `poster` longtext NOT NULL,
  `duracion` int(11) NOT NULL,
  `calificacion` float NOT NULL,
  `sinopsis` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`cod_peli`, `nombre_peli`, `id_genero`, `poster`, `duracion`, `calificacion`, `sinopsis`) VALUES
(11, 'gh', 16, '51c2f1fce0eea569ff8f6cf3f451ff2f.jpg', 0, 0, 'zhgj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala_pelicula`
--

CREATE TABLE `sala_pelicula` (
  `id_sala` int(11) DEFAULT NULL,
  `cod_peli` int(11) DEFAULT NULL,
  `id_horario` int(11) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id_sala` int(11) NOT NULL,
  `num_sala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id_sala`, `num_sala`) VALUES
(0, 87),
(7, 2),
(177, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_reproduccion`
--
ALTER TABLE `categoria_reproduccion`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`cod_peli`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_genero_2` (`id_genero`);

--
-- Indices de la tabla `sala_pelicula`
--
ALTER TABLE `sala_pelicula`
  ADD KEY `id_sala` (`id_sala`),
  ADD KEY `id_horario` (`id_horario`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `cod_peli` (`cod_peli`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `cod_peli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD CONSTRAINT `cupos_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id_sala`);

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sala_pelicula`
--
ALTER TABLE `sala_pelicula`
  ADD CONSTRAINT `sala_pelicula_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id_sala`),
  ADD CONSTRAINT `sala_pelicula_ibfk_3` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`) ON DELETE CASCADE,
  ADD CONSTRAINT `sala_pelicula_ibfk_4` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_reproduccion` (`id_categoria`) ON DELETE CASCADE,
  ADD CONSTRAINT `sala_pelicula_ibfk_5` FOREIGN KEY (`cod_peli`) REFERENCES `pelicula` (`cod_peli`) ON UPDATE CASCADE;
--
-- Base de datos: `clinica`
--
CREATE DATABASE IF NOT EXISTS `clinica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clinica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `Ing_Cod` int(11) NOT NULL,
  `Ing_NHab` varchar(100) NOT NULL,
  `Ing_FIng` varchar(100) NOT NULL,
  `Paciente_Pac_Cod` int(11) NOT NULL,
  `Medico_Med_Cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `Med_Cod` int(11) NOT NULL,
  `Med_Nom` varchar(100) NOT NULL,
  `Med_Ape` varchar(100) NOT NULL,
  `Med_Tel` varchar(100) NOT NULL,
  `Med_Esp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `Pac_Cod` int(11) NOT NULL,
  `Pac_Nom` varchar(100) NOT NULL,
  `Pac_Ape` varchar(100) NOT NULL,
  `Pac_Dir` varchar(100) NOT NULL,
  `Pac_Pob` varchar(100) NOT NULL,
  `Pac_Prov` varchar(100) NOT NULL,
  `Pac_CPos` varchar(100) NOT NULL,
  `Pac_Tel` varchar(100) NOT NULL,
  `Pac_FNac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`Ing_Cod`),
  ADD KEY `Paciente_Pac_Cod` (`Paciente_Pac_Cod`),
  ADD KEY `Medico_Med_Cod` (`Medico_Med_Cod`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`Med_Cod`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`Pac_Cod`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_medico_medico_med_cod` FOREIGN KEY (`Medico_Med_Cod`) REFERENCES `medico` (`Med_Cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ingreso_paciente_paciente_pac_cod` FOREIGN KEY (`Paciente_Pac_Cod`) REFERENCES `paciente` (`Pac_Cod`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Base de datos: `concesionario`
--
CREATE DATABASE IF NOT EXISTS `concesionario` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `concesionario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cli_Cod` int(11) NOT NULL,
  `Cli_Nom` varchar(100) NOT NULL,
  `Cli_Dir` varchar(100) NOT NULL,
  `Cli_Ciu` varchar(100) NOT NULL,
  `Cli_Tel` varchar(100) NOT NULL,
  `Cli_NIF` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coc_rev`
--

CREATE TABLE `coc_rev` (
  `Cod` int(11) NOT NULL,
  `Coches_Coc_Mat` int(11) NOT NULL,
  `Revición_Rev_Cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `Coc_Mat` int(11) NOT NULL,
  `Coc_Mar` varchar(100) NOT NULL,
  `Coc_Mod` varchar(100) NOT NULL,
  `Coc_Col` varchar(100) NOT NULL,
  `Coc_PVen` int(11) NOT NULL,
  `Cliente_Cli_Cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revición`
--

CREATE TABLE `revición` (
  `Rev_Cod` int(11) NOT NULL,
  `Rev_CFil` varchar(100) NOT NULL,
  `Rev_CAce` varchar(100) NOT NULL,
  `Rev_CFre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cli_Cod`);

--
-- Indices de la tabla `coc_rev`
--
ALTER TABLE `coc_rev`
  ADD PRIMARY KEY (`Cod`),
  ADD KEY `Coches_Coc_Mat` (`Coches_Coc_Mat`),
  ADD KEY `Revición_Rev_Cod` (`Revición_Rev_Cod`);

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`Coc_Mat`),
  ADD KEY `Cliente_Cli_Cod` (`Cliente_Cli_Cod`);

--
-- Indices de la tabla `revición`
--
ALTER TABLE `revición`
  ADD PRIMARY KEY (`Rev_Cod`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coc_rev`
--
ALTER TABLE `coc_rev`
  ADD CONSTRAINT `coc_rev_coches_coches_coc_mat` FOREIGN KEY (`Coches_Coc_Mat`) REFERENCES `coches` (`Coc_Mat`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `coc_rev_revición_revición_rev_cod` FOREIGN KEY (`Revición_Rev_Cod`) REFERENCES `revición` (`Rev_Cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `coches_cliente_cliente_cli_cod` FOREIGN KEY (`Cliente_Cli_Cod`) REFERENCES `cliente` (`Cli_Cod`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Base de datos: `deporte`
--
CREATE DATABASE IF NOT EXISTS `deporte` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `deporte`;

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `CONSULTA` () RETURNS INT(11) NO SQL
    DETERMINISTIC
RETURN @COD$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `futbolista`
--

CREATE TABLE `futbolista` (
  `FUTID` int(11) NOT NULL,
  `FUTNOM1` varchar(100) NOT NULL,
  `FUTNOM2` varchar(100) NOT NULL,
  `FUTEDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `futbolista`
--

INSERT INTO `futbolista` (`FUTID`, `FUTNOM1`, `FUTNOM2`, `FUTEDAD`) VALUES
(1, 'MARIO', 'AGUDELO', 30),
(2, 'JUAN', 'PEREZ', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarfut`
--

CREATE TABLE `tarfut` (
  `TFUID` smallint(6) NOT NULL,
  `FK_FUTID` int(11) NOT NULL,
  `FK_TARCOD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarfut`
--

INSERT INTO `tarfut` (`TFUID`, `FK_FUTID`, `FK_TARCOD`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `TARCOD` int(11) NOT NULL,
  `TARNOM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`TARCOD`, `TARNOM`) VALUES
(3, 'AMARILLA'),
(4, 'ROJAS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `futbolista`
--
ALTER TABLE `futbolista`
  ADD PRIMARY KEY (`FUTID`);

--
-- Indices de la tabla `tarfut`
--
ALTER TABLE `tarfut`
  ADD PRIMARY KEY (`TFUID`),
  ADD KEY `FK_FUTID` (`FK_FUTID`),
  ADD KEY `FK_TARCOD` (`FK_TARCOD`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`TARCOD`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tarfut`
--
ALTER TABLE `tarfut`
  MODIFY `TFUID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tarfut`
--
ALTER TABLE `tarfut`
  ADD CONSTRAINT `TARFUT_FUTBOLISTA_FK_FUTID` FOREIGN KEY (`FK_FUTID`) REFERENCES `futbolista` (`FUTID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `TARFUT_TARJETAS_FK_TARCOD` FOREIGN KEY (`FK_TARCOD`) REFERENCES `tarjetas` (`TARCOD`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Base de datos: `instituto`
--
CREATE DATABASE IF NOT EXISTS `instituto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `instituto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `Alu_NExp` int(11) NOT NULL,
  `Alu_Nom` varchar(100) NOT NULL,
  `Alu_Ape` varchar(100) NOT NULL,
  `Alu_FNac` date NOT NULL,
  `Curso_Cur_Cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `Cur_Cod` int(11) NOT NULL,
  `Cur_Nom` varchar(100) NOT NULL,
  `Cur_Del` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mod_alu`
--

CREATE TABLE `mod_alu` (
  `Cod` int(11) NOT NULL,
  `Modulos_Mod_Cod` int(11) NOT NULL,
  `Alumno_Alu_NExp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `Mod_Cod` int(11) NOT NULL,
  `Mod_Nom` varchar(100) NOT NULL,
  `Profesor_Pro_DNI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `Pro_DNI` int(11) NOT NULL,
  `Pro_Nom` varchar(100) NOT NULL,
  `Pro_Dir` varchar(100) NOT NULL,
  `Pro_Tel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`Alu_NExp`),
  ADD KEY `Curso_Cur_Cod` (`Curso_Cur_Cod`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Cur_Cod`);

--
-- Indices de la tabla `mod_alu`
--
ALTER TABLE `mod_alu`
  ADD PRIMARY KEY (`Cod`),
  ADD KEY `Modulos_Mod_Cod` (`Modulos_Mod_Cod`),
  ADD KEY `Alumno_Alu_NExp` (`Alumno_Alu_NExp`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`Mod_Cod`),
  ADD KEY `Profesor_Pro_DNI` (`Profesor_Pro_DNI`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`Pro_DNI`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_curso_curso_cur_cod` FOREIGN KEY (`Curso_Cur_Cod`) REFERENCES `curso` (`Cur_Cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `mod_alu`
--
ALTER TABLE `mod_alu`
  ADD CONSTRAINT `mod_alu_alumno_alumno_alu_nexp` FOREIGN KEY (`Alumno_Alu_NExp`) REFERENCES `alumno` (`Alu_NExp`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mod_alu_modulos_modulos_mod_cod` FOREIGN KEY (`Modulos_Mod_Cod`) REFERENCES `modulos` (`Mod_Cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `modulos_profesor_profesor_pro_dni` FOREIGN KEY (`Profesor_Pro_DNI`) REFERENCES `profesor` (`Pro_DNI`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Base de datos: `maxirecargas`
--
CREATE DATABASE IF NOT EXISTS `maxirecargas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `maxirecargas`;

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
  MODIFY `tip_pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `Tip_ser_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `tip_usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
--
-- Base de datos: `practica`
--
CREATE DATABASE IF NOT EXISTS `practica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `practica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `EMPNIT` int(11) NOT NULL,
  `EMPNOM` varchar(100) DEFAULT NULL,
  `EMPDES` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `SEDCOD` int(11) NOT NULL,
  `SEDNOM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `TIPCOD` int(11) NOT NULL,
  `TIPNOM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `USUTIPDOC` int(11) NOT NULL,
  `USUNUMDOC` int(11) NOT NULL,
  `USUNOM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuemp`
--

CREATE TABLE `usuemp` (
  `USECOD` smallint(6) NOT NULL,
  `FK_EMPNIT` int(11) NOT NULL,
  `FK_SEDCOD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`EMPNIT`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`SEDCOD`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`TIPCOD`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USUTIPDOC`);

--
-- Indices de la tabla `usuemp`
--
ALTER TABLE `usuemp`
  ADD PRIMARY KEY (`USECOD`),
  ADD KEY `FK_EMPNIT` (`FK_EMPNIT`),
  ADD KEY `FK_SEDCOD` (`FK_SEDCOD`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuemp`
--
ALTER TABLE `usuemp`
  MODIFY `USECOD` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuemp`
--
ALTER TABLE `usuemp`
  ADD CONSTRAINT `USUEMP_EMPRESA_FK_EMPNIT` FOREIGN KEY (`FK_EMPNIT`) REFERENCES `empresa` (`EMPNIT`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `USUEMP_SEDE_FK_SEDCOD` FOREIGN KEY (`FK_SEDCOD`) REFERENCES `sede` (`SEDCOD`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Base de datos: `producto`
--
CREATE DATABASE IF NOT EXISTS `producto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `producto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Cli_DNI` int(11) NOT NULL,
  `Cli_Nom` varchar(100) NOT NULL,
  `Cli_Ape` varchar(100) NOT NULL,
  `Cli_Dir` varchar(100) NOT NULL,
  `Cli_FNac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `Emp_Cod` int(11) NOT NULL,
  `Emp_Nom` varchar(100) NOT NULL,
  `Emp_Dir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_cli`
--

CREATE TABLE `pro_cli` (
  `Cod` int(11) NOT NULL,
  `Clientes_Cli_DNI` int(11) NOT NULL,
  `Productos_Pro_Cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Pro_Cod` int(11) NOT NULL,
  `Pro_Nom` varchar(100) NOT NULL,
  `Pro_PUni` int(11) NOT NULL,
  `Proveedor_Pro_NIF` int(11) NOT NULL,
  `Empresa_Emp_Cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Pro_NIF` int(11) NOT NULL,
  `Pro_Nom` varchar(100) NOT NULL,
  `Pro_Dir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Cli_DNI`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Emp_Cod`);

--
-- Indices de la tabla `pro_cli`
--
ALTER TABLE `pro_cli`
  ADD PRIMARY KEY (`Cod`),
  ADD KEY `Clientes_Cli_DNI` (`Clientes_Cli_DNI`),
  ADD KEY `Productos_Pro_Cod` (`Productos_Pro_Cod`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Pro_Cod`),
  ADD KEY `Proveedor_Pro_NIF` (`Proveedor_Pro_NIF`),
  ADD KEY `Empresa_Emp_Cod` (`Empresa_Emp_Cod`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Pro_NIF`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pro_cli`
--
ALTER TABLE `pro_cli`
  ADD CONSTRAINT `pro_cli_clientes_clientes_cli_dni` FOREIGN KEY (`Clientes_Cli_DNI`) REFERENCES `clientes` (`Cli_DNI`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_cli_productos_productos_pro_cod` FOREIGN KEY (`Productos_Pro_Cod`) REFERENCES `productos` (`Pro_Cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_empresa_empresa_emp_cod` FOREIGN KEY (`Empresa_Emp_Cod`) REFERENCES `empresa` (`Emp_Cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_proveedor_proveedor_pro_nif` FOREIGN KEY (`Proveedor_Pro_NIF`) REFERENCES `proveedor` (`Pro_NIF`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Base de datos: `proyectos`
--
CREATE DATABASE IF NOT EXISTS `proyectos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyectos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cli_pro`
--

CREATE TABLE `cli_pro` (
  `cod` smallint(6) NOT NULL,
  `Clientes_cli_cod` int(11) NOT NULL,
  `proyecto_pro_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cli_cod` int(11) NOT NULL,
  `cli_des` varchar(100) NOT NULL,
  `cli_fini` varchar(100) NOT NULL,
  `cli_ffin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE `colaboradores` (
  `col_NIF` int(11) NOT NULL,
  `col_nom` varchar(100) NOT NULL,
  `col_dom` varchar(100) NOT NULL,
  `col_ban` varchar(100) NOT NULL,
  `col_cue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tip`
--

CREATE TABLE `pag_tip` (
  `cod` smallint(6) NOT NULL,
  `tipos_tip_cod` int(11) NOT NULL,
  `pagos_cod` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `cod` smallint(6) NOT NULL,
  `colaboradores_col_NIF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_col`
--

CREATE TABLE `pro_col` (
  `cod` smallint(6) NOT NULL,
  `proyecto_pro_cod` int(11) NOT NULL,
  `colaboradores_col_NIF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `pro_cod` int(11) NOT NULL,
  `pro_tel` varchar(100) NOT NULL,
  `pro_dom` varchar(100) NOT NULL,
  `pro_raso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `tip_cod` int(11) NOT NULL,
  `tip_des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cli_pro`
--
ALTER TABLE `cli_pro`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `Clientes_cli_cod` (`Clientes_cli_cod`),
  ADD KEY `proyecto_pro_cod` (`proyecto_pro_cod`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_cod`);

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`col_NIF`);

--
-- Indices de la tabla `pag_tip`
--
ALTER TABLE `pag_tip`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `tipos_tip_cod` (`tipos_tip_cod`),
  ADD KEY `pagos_cod` (`pagos_cod`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `colaboradores_col_NIF` (`colaboradores_col_NIF`);

--
-- Indices de la tabla `pro_col`
--
ALTER TABLE `pro_col`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `proyecto_pro_cod` (`proyecto_pro_cod`),
  ADD KEY `colaboradores_col_NIF` (`colaboradores_col_NIF`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`pro_cod`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`tip_cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cli_pro`
--
ALTER TABLE `cli_pro`
  MODIFY `cod` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_tip`
--
ALTER TABLE `pag_tip`
  MODIFY `cod` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `cod` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pro_col`
--
ALTER TABLE `pro_col`
  MODIFY `cod` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cli_pro`
--
ALTER TABLE `cli_pro`
  ADD CONSTRAINT `cli_pro_clientes_clientes_cli_cod` FOREIGN KEY (`Clientes_cli_cod`) REFERENCES `clientes` (`cli_cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cli_pro_proyecto_proyecto_pro_cod` FOREIGN KEY (`proyecto_pro_cod`) REFERENCES `proyecto` (`pro_cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pag_tip`
--
ALTER TABLE `pag_tip`
  ADD CONSTRAINT `pag_tip_pagos_pagos_cod` FOREIGN KEY (`pagos_cod`) REFERENCES `pagos` (`cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pag_tip_tipos_tipos_tip_cod` FOREIGN KEY (`tipos_tip_cod`) REFERENCES `tipos` (`tip_cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_colaboradores_colaboradores_col_nif` FOREIGN KEY (`colaboradores_col_NIF`) REFERENCES `colaboradores` (`col_NIF`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pro_col`
--
ALTER TABLE `pro_col`
  ADD CONSTRAINT `pro_col_colaboradores_colaboradores_col_nif` FOREIGN KEY (`colaboradores_col_NIF`) REFERENCES `colaboradores` (`col_NIF`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_col_proyecto_proyecto_pro_cod` FOREIGN KEY (`proyecto_pro_cod`) REFERENCES `proyecto` (`pro_cod`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Base de datos: `prueba`
--
CREATE DATABASE IF NOT EXISTS `prueba` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prueba`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`codigo`, `nombre`, `valor`, `cantidad`) VALUES
(1, 'e', 2, 4),
(1, 'e', 2, 3),
(1, 'e', 2, 3),
(1, 'e', 2, 3),
(4, 'J', 100, 13);
--
-- Base de datos: `regis`
--
CREATE DATABASE IF NOT EXISTS `regis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `regis`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `Nombre` varchar(100) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`Nombre`, `Usuario`, `Correo`, `Contrasena`) VALUES
('sebas', 'sd', 'df8@gg.com', 'ddd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`Contrasena`);
--
-- Base de datos: `transporte`
--
CREATE DATABASE IF NOT EXISTS `transporte` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `transporte`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cam_cam`
--

CREATE TABLE `cam_cam` (
  `Cod` int(11) NOT NULL,
  `Camioneros_Cam_DNI` int(11) NOT NULL,
  `Camiones_Cam_Mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camioneros`
--

CREATE TABLE `camioneros` (
  `Cam_DNI` int(11) NOT NULL,
  `Cam_Nom` varchar(100) NOT NULL,
  `Cam_Tel` varchar(100) NOT NULL,
  `Cam_Dir` varchar(100) NOT NULL,
  `Cam_Sal` int(11) NOT NULL,
  `Cam_Pob` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones`
--

CREATE TABLE `camiones` (
  `Cam_Mat` int(11) NOT NULL,
  `Cam_Mod` varchar(100) NOT NULL,
  `Cam_Tip` varchar(100) NOT NULL,
  `Cam_Pot` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `Paq_Cod` int(11) NOT NULL,
  `Paq_Des` varchar(100) NOT NULL,
  `Paq_DeTin` varchar(100) NOT NULL,
  `Paq_DiDes` varchar(100) NOT NULL,
  `Camioneros_Cam_DNI` int(11) NOT NULL,
  `Provincias_Pro_Cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `Pro_Cod` int(11) NOT NULL,
  `Pro_Nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cam_cam`
--
ALTER TABLE `cam_cam`
  ADD PRIMARY KEY (`Cod`),
  ADD KEY `Camioneros_Cam_DNI` (`Camioneros_Cam_DNI`),
  ADD KEY `Camiones_Cam_Mat` (`Camiones_Cam_Mat`);

--
-- Indices de la tabla `camioneros`
--
ALTER TABLE `camioneros`
  ADD PRIMARY KEY (`Cam_DNI`);

--
-- Indices de la tabla `camiones`
--
ALTER TABLE `camiones`
  ADD PRIMARY KEY (`Cam_Mat`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`Paq_Cod`),
  ADD KEY `Camioneros_Cam_DNI` (`Camioneros_Cam_DNI`),
  ADD KEY `Provincias_Pro_Cod` (`Provincias_Pro_Cod`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`Pro_Cod`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cam_cam`
--
ALTER TABLE `cam_cam`
  ADD CONSTRAINT `cam_cam_camioneros_camioneros_cam_dni` FOREIGN KEY (`Camioneros_Cam_DNI`) REFERENCES `camioneros` (`Cam_DNI`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cam_cam_camiones_camiones_cam_mat` FOREIGN KEY (`Camiones_Cam_Mat`) REFERENCES `camiones` (`Cam_Mat`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD CONSTRAINT `paquetes_camioneros_camioneros_cam_dni` FOREIGN KEY (`Camioneros_Cam_DNI`) REFERENCES `camioneros` (`Cam_DNI`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `paquetes_provincias_provincias_pro_cod` FOREIGN KEY (`Provincias_Pro_Cod`) REFERENCES `provincias` (`Pro_Cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
