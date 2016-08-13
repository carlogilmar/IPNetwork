-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2016 at 09:19 a.m.
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `archivo`
--

CREATE TABLE `archivo` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(30) NOT NULL,
  `CUERPO` text NOT NULL,
  `FECHA` varchar(10) NOT NULL,
  `AUTOR` varchar(20) NOT NULL,
  `VOTACION` int(11) NOT NULL,
  `MATERIA` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archivo`
--

INSERT INTO `archivo` (`ID`, `TITULO`, `CUERPO`, `FECHA`, `AUTOR`, `VOTACION`, `MATERIA`) VALUES
(2, 'MI PRIMER TITULO', 'QUIERO AMAR MUCHO', '20-05-2016', 'carlo', 0, 'seg-sw'),
(3, 'MI SEGUNDO TITULO', 'PARA ESTA VES USARE LA DE EMBEBIDOS', '20-05-2016', 'carlo', 0, 'sist-emb'),
(4, '', '', '20-05-2016', 'carlo', 0, 'solaris'),
(5, 'mi tercer titulo', 'HOLIIIISSSS', '20-05-2016', 'carlo', 0, 'net'),
(6, 'MI PRUBEA', 'OTRA PRUEBA DE ESTE SHOW', '20-05-2016', 'GILMAR', 0, 'solaris');

-- --------------------------------------------------------

--
-- Table structure for table `art_u`
--

CREATE TABLE `art_u` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(30) NOT NULL,
  `CUERPO` text NOT NULL,
  `AUTOR` varchar(30) NOT NULL,
  `DAT` date NOT NULL,
  `CLAVE` varchar(10) NOT NULL,
  `CLAVEO` varchar(10) NOT NULL,
  `CLAVET` varchar(10) NOT NULL,
  `id_OU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art_u`
--

INSERT INTO `art_u` (`ID`, `TITULO`, `CUERPO`, `AUTOR`, `DAT`, `CLAVE`, `CLAVEO`, `CLAVET`, `id_OU`) VALUES
(7, 'CREER SOÑANDO', 'CREO EN LIVIA Y CREO EN PALESTINA Y TE PRODUCE MORBO VER COMO MUEREN DESDE AHI ARRIBA, LA PROMAVERA SE QUEDA TAN LEJOS, NUNCA LLEGAN A CASA SUS VIEJOS', 'SUSO SUDON', '2016-04-11', 'CREER', 'SONIAR', 'ARMAS', 2),
(8, 'QUEDATE', 'QUE ME IMPORTA LO QUE VIVI HAY NO ME DIGAS NO SI ESCONDES ALGO NO PORQUE LLEGO LA HORA DE ESTAR CONMIGO EL DESRINO ASI LO ESCRIBIO', 'FRAN MARISCAL', '2016-04-11', 'mejor', 'mejor', 'mejor', 4),
(9, 'EMPAPADO EL CORAZON', 'ENSEÑANDOME AMOR MIO COMO EL CIELO SE DESTROZA ARRIESGANTODE AL VACIO QUE MIS MANOS TE PROVOCAN, ENSEÑANADO COMO EL CIELO SE DESASTE', 'MIGUEL CARRERIRA', '2016-04-11', 'DUNAS', 'TORMENTA', 'FALDA', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `ID_COMENTARIO` int(11) NOT NULL,
  `ASUNTO` varchar(100) NOT NULL,
  `CUERPO` text NOT NULL,
  `ID_AUTOR` int(11) NOT NULL,
  `FECHA` varchar(15) NOT NULL,
  `ID_ARCHIVO` int(11) NOT NULL,
  `AUTOR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`ID_COMENTARIO`, `ASUNTO`, `CUERPO`, `ID_AUTOR`, `FECHA`, `ID_ARCHIVO`, `AUTOR`) VALUES
(0, 'efrfr', 'sdfds', 5, 'efrewrf', 8, ''),
(1, 'EXCELENTE PUBLICACION', 'ME AYUDASTE A RESOLVER ALGUNAS DUDAS QUE TENIA GRACIAS', 3, '2016-05-03', 8, ''),
(2, 'SUGERENCIAS DE CODIGO', 'ME PARECE QUE PODRIAS AÑADIR ...', 2, '2016-05-18', 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `entradas`
--

CREATE TABLE `entradas` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `DATE` date NOT NULL,
  `BODY` text NOT NULL,
  `KEY` varchar(10) NOT NULL,
  `KEY1` varchar(10) NOT NULL,
  `KEY2` varchar(10) NOT NULL,
  `AUT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estudiante`
--

CREATE TABLE `estudiante` (
  `BOLETA` int(10) NOT NULL,
  `USER` varchar(10) NOT NULL,
  `PASS` varchar(10) NOT NULL,
  `NOMBRE` varchar(25) NOT NULL,
  `APELLIDO` varchar(25) NOT NULL,
  `CARRERA` varchar(30) NOT NULL,
  `LINEA` varchar(30) NOT NULL,
  `FOTO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estudiante`
--

INSERT INTO `estudiante` (`BOLETA`, `USER`, `PASS`, `NOMBRE`, `APELLIDO`, `CARRERA`, `LINEA`, `FOTO`) VALUES
(2010100624, 'GILMAR', 'FILMAR', 'GILMAR', 'PADILLA SANTANA', 'INGENIERIAINFORMATICA', 'certi', ''),
(2013350310, 'carlo', 'carlo', 'carlo', 'padilla santana', 'INGENIERIAINFORMATICA', 'certi', '');

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(15) NOT NULL,
  `HM` tinyint(1) NOT NULL,
  `HV` tinyint(1) NOT NULL,
  `ACADEMIA` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`ID`, `NOMBRE`, `HM`, `HV`, `ACADEMIA`) VALUES
(1, 'SOLARIS', 1, 0, 'COMPUTACION'),
(2, 'JAVA', 0, 0, 'INFORMATICA');

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `RFC` varchar(10) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `ACADEMIA` varchar(50) NOT NULL,
  `TITULO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`RFC`, `NOMBRE`, `ACADEMIA`, `TITULO`) VALUES
('LUPE998877', 'SANTELIS RODRIGUEZ ITZEL ALEJANDRINA', 'INFORMATICA', 'LIC. EN ADMON INDUSTRIAL'),
('PASC940612', 'PADILLA SANTANA CARLO GILMAR', 'COMPUTACION', 'LIC. EN SOCIOLOGIA');

-- --------------------------------------------------------

--
-- Table structure for table `prueba`
--

CREATE TABLE `prueba` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `APELLIDO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prueba`
--

INSERT INTO `prueba` (`ID`, `NOMBRE`, `APELLIDO`) VALUES
(2, 'pablo', 'picasso'),
(3, 'pablo', 'neruda'),
(4, 'julio', 'bracho');

-- --------------------------------------------------------

--
-- Table structure for table `prue_u`
--

CREATE TABLE `prue_u` (
  `ID` int(11) NOT NULL,
  `USER` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prue_u`
--

INSERT INTO `prue_u` (`ID`, `USER`) VALUES
(1, 'agilepadawan');

-- --------------------------------------------------------

--
-- Table structure for table `sprint1`
--

CREATE TABLE `sprint1` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `APELLIDO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(10) NOT NULL,
  `PW` varchar(10) NOT NULL,
  `NOM` varchar(10) NOT NULL,
  `APE` varchar(20) NOT NULL,
  `CARR` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID`, `USUARIO`, `PW`, `NOM`, `APE`, `CARR`) VALUES
(1, '', 'CARLOGILMA', 'CARLO', 'PADILLA SANTANA', 'ing-info'),
(2, 'CARLOGILMA', 'carlogilma', 'CARLO', 'PADILLA SANTANA', 'ing-info'),
(3, 'carlo', 'carlo', 'CARLO', 'PADILLA SANTANA', 'ing-info'),
(4, 'giak', '1234', 'mario', 'ocampo', 'ing-info'),
(5, 'ISABM', 'ISAB', 'ISAB ', 'MAYO', 'admi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `art_u`
--
ALTER TABLE `art_u`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_OU` (`id_OU`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`ID_COMENTARIO`),
  ADD KEY `ID_AUTOR` (`ID_AUTOR`),
  ADD KEY `ID_ARCHIVO` (`ID_ARCHIVO`);

--
-- Indexes for table `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`BOLETA`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`RFC`);

--
-- Indexes for table `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prue_u`
--
ALTER TABLE `prue_u`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sprint1`
--
ALTER TABLE `sprint1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archivo`
--
ALTER TABLE `archivo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `art_u`
--
ALTER TABLE `art_u`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `entradas`
--
ALTER TABLE `entradas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prueba`
--
ALTER TABLE `prueba`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prue_u`
--
ALTER TABLE `prue_u`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sprint1`
--
ALTER TABLE `sprint1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `art_u`
--
ALTER TABLE `art_u`
  ADD CONSTRAINT `art_u_ibfk_1` FOREIGN KEY (`id_OU`) REFERENCES `usuarios` (`ID`);

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`ID_AUTOR`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`ID_ARCHIVO`) REFERENCES `art_u` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
