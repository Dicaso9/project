-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 03:59 AM
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
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `almacen`
--

CREATE TABLE `almacen` (
  `idAlmacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `almacen`
--

INSERT INTO `almacen` (`idAlmacen`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9);

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
('SBM3892'),
('SGG8734'),
('STP9238'),
('STP9812');

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
(1, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lote`
--

CREATE TABLE `lote` (
  `idLote` int(11) NOT NULL,
  `deCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lote`
--

INSERT INTO `lote` (`idLote`, `deCliente`) VALUES
(1, 0),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movimiento`
--

CREATE TABLE `movimiento` (
  `idMovimiento` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `idAlmacen` int(11) NOT NULL,
  `idRuta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movimiento`
--

INSERT INTO `movimiento` (`idMovimiento`, `orden`, `idAlmacen`, `idRuta`) VALUES
(1, 1, 2, 1),
(2, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mueve`
--

CREATE TABLE `mueve` (
  `idTransporte` int(11) NOT NULL,
  `idLote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mueve`
--

INSERT INTO `mueve` (`idTransporte`, `idLote`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paquete`
--

CREATE TABLE `paquete` (
  `idPaquete` int(11) NOT NULL,
  `matricula` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paquete`
--

INSERT INTO `paquete` (`idPaquete`, `matricula`) VALUES
(1, NULL),
(4, NULL),
(5, NULL),
(2, 'SBM3892'),
(3, 'SBM3892');

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
('SBM3892'),
('STP4059');

-- --------------------------------------------------------

--
-- Table structure for table `ruta`
--

CREATE TABLE `ruta` (
  `idRuta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruta`
--

INSERT INTO `ruta` (`idRuta`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `transporte`
--

CREATE TABLE `transporte` (
  `idTransporte` int(11) NOT NULL,
  `estado` enum('salida','transito','destino') NOT NULL,
  `idMovimiento` int(11) NOT NULL,
  `matricula` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transporte`
--

INSERT INTO `transporte` (`idTransporte`, `estado`, `idMovimiento`, `matricula`) VALUES
(1, 'salida', 1, 'STP9238');

-- --------------------------------------------------------

--
-- Table structure for table `vehiculo`
--

CREATE TABLE `vehiculo` (
  `matricula` varchar(7) NOT NULL,
  `idAlmacen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `idAlmacen`) VALUES
('STP4059', NULL),
('SGG8734', 1),
('STP9812', 1),
('STP9238', 3),
('SQV1028', 4),
('SBM3892', 6);

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
-- Indexes for table `compone`
--
ALTER TABLE `compone`
  ADD PRIMARY KEY (`idLote`,`idPaquete`),
  ADD KEY `idPaquete` (`idPaquete`);

--
-- Indexes for table `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`idLote`);

--
-- Indexes for table `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idMovimiento`),
  ADD KEY `idAlmacen` (`idAlmacen`),
  ADD KEY `idRuta` (`idRuta`);

--
-- Indexes for table `mueve`
--
ALTER TABLE `mueve`
  ADD PRIMARY KEY (`idTransporte`,`idLote`),
  ADD KEY `idLote` (`idLote`);

--
-- Indexes for table `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`idPaquete`),
  ADD KEY `matricula` (`matricula`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`idRuta`);

--
-- Indexes for table `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`idTransporte`,`idMovimiento`,`matricula`),
  ADD KEY `idMovimiento` (`idMovimiento`),
  ADD KEY `matricula` (`matricula`);

--
-- Indexes for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `idAlmacen` (`idAlmacen`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `camion`
--
ALTER TABLE `camion`
  ADD CONSTRAINT `camion_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`);

--
-- Constraints for table `compone`
--
ALTER TABLE `compone`
  ADD CONSTRAINT `compone_ibfk_1` FOREIGN KEY (`idLote`) REFERENCES `lote` (`idLote`),
  ADD CONSTRAINT `compone_ibfk_2` FOREIGN KEY (`idPaquete`) REFERENCES `paquete` (`idPaquete`);

--
-- Constraints for table `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`idAlmacen`) REFERENCES `almacen` (`idAlmacen`),
  ADD CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`idRuta`) REFERENCES `ruta` (`idRuta`);

--
-- Constraints for table `mueve`
--
ALTER TABLE `mueve`
  ADD CONSTRAINT `mueve_ibfk_1` FOREIGN KEY (`idTransporte`) REFERENCES `transporte` (`idTransporte`),
  ADD CONSTRAINT `mueve_ibfk_2` FOREIGN KEY (`idLote`) REFERENCES `lote` (`idLote`);

--
-- Constraints for table `paquete`
--
ALTER TABLE `paquete`
  ADD CONSTRAINT `paquete_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `pickup` (`matricula`);

--
-- Constraints for table `pickup`
--
ALTER TABLE `pickup`
  ADD CONSTRAINT `pickup_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`);

--
-- Constraints for table `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `transporte_ibfk_1` FOREIGN KEY (`idMovimiento`) REFERENCES `movimiento` (`idMovimiento`),
  ADD CONSTRAINT `transporte_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `camion` (`matricula`);

--
-- Constraints for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`idAlmacen`) REFERENCES `almacen` (`idAlmacen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
