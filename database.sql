-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 03:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `almacen`
--

CREATE TABLE `almacen` (
  `idAlmacen` int(11) NOT NULL,
  `ubicacion` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `almacen`
--

INSERT INTO `almacen` (`idAlmacen`, `ubicacion`) VALUES
(1, ' Guayabos 4098'),
(2, 'Sarandí 5993');

-- --------------------------------------------------------

--
-- Table structure for table `camion`
--

CREATE TABLE `camion` (
  `matricula` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camion`
--

INSERT INTO `camion` (`matricula`) VALUES
('ATP2349'),
('STP5789');

-- --------------------------------------------------------

--
-- Table structure for table `camionero`
--

CREATE TABLE `camionero` (
  `ci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camionero`
--

INSERT INTO `camionero` (`ci`) VALUES
(59102738);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `ci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`ci`) VALUES
(59175823);

-- --------------------------------------------------------

--
-- Table structure for table `compone`
--

CREATE TABLE `compone` (
  `idLote` int(11) NOT NULL,
  `idPaquete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compone`
--

INSERT INTO `compone` (`idLote`, `idPaquete`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `conduce`
--

CREATE TABLE `conduce` (
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `ci` int(11) NOT NULL,
  `matricula` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conduce`
--

INSERT INTO `conduce` (`fechaInicio`, `fechaFin`, `ci`, `matricula`) VALUES
('2023-11-16 03:28:19', '2023-11-16 03:28:19', 59102738, 'SBM8723');

-- --------------------------------------------------------

--
-- Table structure for table `entrega`
--

CREATE TABLE `entrega` (
  `estado` int(11) NOT NULL,
  `idPaquete` int(11) NOT NULL,
  `matricula` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entrega`
--

INSERT INTO `entrega` (`estado`, `idPaquete`, `matricula`) VALUES
(1, 1, 'SBM8723');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `ci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`ci`) VALUES
(55555555);

-- --------------------------------------------------------

--
-- Table structure for table `lote`
--

CREATE TABLE `lote` (
  `idLote` int(11) NOT NULL,
  `deCliente` int(11) NOT NULL,
  `idAlmacen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lote`
--

INSERT INTO `lote` (`idLote`, `deCliente`, `idAlmacen`) VALUES
(1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `opera`
--

CREATE TABLE `opera` (
  `ci` int(11) NOT NULL,
  `idAlmacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opera`
--

INSERT INTO `opera` (`ci`, `idAlmacen`) VALUES
(55555555, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paquete`
--

CREATE TABLE `paquete` (
  `idPaquete` int(11) NOT NULL,
  `destino` varchar(30) NOT NULL,
  `peso` int(11) NOT NULL,
  `contactoDestino` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `ci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paquete`
--

INSERT INTO `paquete` (`idPaquete`, `destino`, `peso`, `contactoDestino`, `estado`, `ci`) VALUES
(1, 'arq horacia acosta y lara 6918', 100, 27829348, 0, 59175823),
(2, 'asuncion 2983', 200, 28193256, 0, 59175823);

-- --------------------------------------------------------

--
-- Table structure for table `pertenece`
--

CREATE TABLE `pertenece` (
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `matricula` varchar(7) NOT NULL,
  `idAlmacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertenece`
--

INSERT INTO `pertenece` (`fechaInicio`, `fechaFin`, `matricula`, `idAlmacen`) VALUES
('2023-11-16 10:26:41', '2023-11-16 03:26:41', 'SBM8723', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `matricula` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickup`
--

INSERT INTO `pickup` (`matricula`) VALUES
('SBM8723');

-- --------------------------------------------------------

--
-- Table structure for table `segmento`
--

CREATE TABLE `segmento` (
  `orden` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `idTrayecto` int(11) NOT NULL,
  `idAlmacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `segmento`
--

INSERT INTO `segmento` (`orden`, `tiempo`, `idTrayecto`, `idAlmacen`) VALUES
(1, 25, 1, 1),
(2, 30, 1, 2),
(2, 30, 2, 1),
(1, 15, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transporte`
--

CREATE TABLE `transporte` (
  `idTrayecto` int(11) NOT NULL,
  `idAlmacen` int(11) NOT NULL,
  `idLote` int(11) NOT NULL,
  `matricula` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transporte`
--

INSERT INTO `transporte` (`idTrayecto`, `idAlmacen`, `idLote`, `matricula`) VALUES
(1, 1, 1, 'ATP2349');

-- --------------------------------------------------------

--
-- Table structure for table `trayecto`
--

CREATE TABLE `trayecto` (
  `idTrayecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trayecto`
--

INSERT INTO `trayecto` (`idTrayecto`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `telefono` int(11) NOT NULL,
  `passwd` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`ci`, `nombre`, `apellido`, `mail`, `telefono`, `passwd`) VALUES
(55555555, 'juan', 'pepe', 'jupppeepe@gmail.com', 97482902, '$2y$10$aD6CXZtvoGmk9cSIDPjrsu2Esp4spU57CWBzrlhjGW41DKbSty7lS'),
(59102738, 'guzman', 'gonzales', 'sadkhkdsa@gmail.com', 912384, '$2y$10$7iuglVevqMRar27c1FohH.tRkBs7sLW65MaNpcHBPBRvZBmLEcqNO'),
(59175823, 'manuel', 'emanuel', 'mamamannunun@gmail.com', 92859022, '$2y$10$8F/R/JfXyvuYLENf3q3iL.rRwGaFselvQtviueX273rkf3zg63X0a');

-- --------------------------------------------------------

--
-- Table structure for table `vehiculo`
--

CREATE TABLE `vehiculo` (
  `matricula` varchar(7) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `modelo`, `estado`) VALUES
('ATP2349', 'Toyota Transport 1.1', 'funcionamiento'),
('SBM8723', 'Foton midi', 'mantenimiento'),
('STP5789', 'Toyota Transport 1', 'funcionamiento');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`idAlmacen`);

--
-- Indexes for table `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `camionero`
--
ALTER TABLE `camionero`
  ADD PRIMARY KEY (`ci`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ci`);

--
-- Indexes for table `compone`
--
ALTER TABLE `compone`
  ADD PRIMARY KEY (`idLote`,`idPaquete`),
  ADD KEY `idPaquete` (`idPaquete`);

--
-- Indexes for table `conduce`
--
ALTER TABLE `conduce`
  ADD PRIMARY KEY (`ci`,`matricula`),
  ADD KEY `matricula` (`matricula`);

--
-- Indexes for table `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`idPaquete`,`matricula`),
  ADD KEY `matricula` (`matricula`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`ci`);

--
-- Indexes for table `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`idLote`),
  ADD KEY `idAlmacen` (`idAlmacen`);

--
-- Indexes for table `opera`
--
ALTER TABLE `opera`
  ADD PRIMARY KEY (`ci`,`idAlmacen`),
  ADD KEY `idAlmacen` (`idAlmacen`);

--
-- Indexes for table `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`idPaquete`),
  ADD KEY `ci` (`ci`);

--
-- Indexes for table `pertenece`
--
ALTER TABLE `pertenece`
  ADD PRIMARY KEY (`matricula`,`idAlmacen`),
  ADD KEY `idAlmacen` (`idAlmacen`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `segmento`
--
ALTER TABLE `segmento`
  ADD PRIMARY KEY (`idTrayecto`,`idAlmacen`),
  ADD KEY `idAlmacen` (`idAlmacen`);

--
-- Indexes for table `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`idTrayecto`,`idAlmacen`,`idLote`,`matricula`),
  ADD KEY `idLote` (`idLote`),
  ADD KEY `matricula` (`matricula`);

--
-- Indexes for table `trayecto`
--
ALTER TABLE `trayecto`
  ADD PRIMARY KEY (`idTrayecto`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ci`);

--
-- Indexes for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`matricula`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `camion`
--
ALTER TABLE `camion`
  ADD CONSTRAINT `camion_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`);

--
-- Constraints for table `camionero`
--
ALTER TABLE `camionero`
  ADD CONSTRAINT `camionero_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `usuario` (`ci`);

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `usuario` (`ci`);

--
-- Constraints for table `compone`
--
ALTER TABLE `compone`
  ADD CONSTRAINT `compone_ibfk_1` FOREIGN KEY (`idLote`) REFERENCES `lote` (`idLote`),
  ADD CONSTRAINT `compone_ibfk_2` FOREIGN KEY (`idPaquete`) REFERENCES `paquete` (`idPaquete`);

--
-- Constraints for table `conduce`
--
ALTER TABLE `conduce`
  ADD CONSTRAINT `conduce_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `camionero` (`ci`),
  ADD CONSTRAINT `conduce_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`);

--
-- Constraints for table `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`idPaquete`) REFERENCES `paquete` (`idPaquete`),
  ADD CONSTRAINT `entrega_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `pickup` (`matricula`);

--
-- Constraints for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `usuario` (`ci`);

--
-- Constraints for table `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`idAlmacen`) REFERENCES `almacen` (`idAlmacen`);

--
-- Constraints for table `opera`
--
ALTER TABLE `opera`
  ADD CONSTRAINT `opera_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `funcionario` (`ci`),
  ADD CONSTRAINT `opera_ibfk_2` FOREIGN KEY (`idAlmacen`) REFERENCES `almacen` (`idAlmacen`);

--
-- Constraints for table `paquete`
--
ALTER TABLE `paquete`
  ADD CONSTRAINT `paquete_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `cliente` (`ci`);

--
-- Constraints for table `pertenece`
--
ALTER TABLE `pertenece`
  ADD CONSTRAINT `pertenece_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `pickup` (`matricula`),
  ADD CONSTRAINT `pertenece_ibfk_2` FOREIGN KEY (`idAlmacen`) REFERENCES `almacen` (`idAlmacen`);

--
-- Constraints for table `pickup`
--
ALTER TABLE `pickup`
  ADD CONSTRAINT `pickup_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`);

--
-- Constraints for table `segmento`
--
ALTER TABLE `segmento`
  ADD CONSTRAINT `segmento_ibfk_1` FOREIGN KEY (`idTrayecto`) REFERENCES `trayecto` (`idTrayecto`),
  ADD CONSTRAINT `segmento_ibfk_2` FOREIGN KEY (`idAlmacen`) REFERENCES `almacen` (`idAlmacen`);

--
-- Constraints for table `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `transporte_ibfk_1` FOREIGN KEY (`idTrayecto`,`idAlmacen`) REFERENCES `segmento` (`idTrayecto`, `idAlmacen`),
  ADD CONSTRAINT `transporte_ibfk_2` FOREIGN KEY (`idLote`) REFERENCES `lote` (`idLote`),
  ADD CONSTRAINT `transporte_ibfk_3` FOREIGN KEY (`matricula`) REFERENCES `camion` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
