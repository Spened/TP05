-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 27, 2019 at 03:42 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `td05`
--

-- --------------------------------------------------------

--
-- Table structure for table `ligne_vente`
--

CREATE TABLE `ligne_vente` (
  `id_vente` int(11) NOT NULL DEFAULT '0',
  `id_produit` int(11) NOT NULL DEFAULT '0',
  `qte_lv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ligne_vente`
--

INSERT INTO `ligne_vente` (`id_vente`, `id_produit`, `qte_lv`) VALUES
(1, 1, 100),
(1, 2, 124),
(2, 1, 555),
(2, 6, 555),
(3, 1, 44),
(3, 2, 9756),
(4, 1, 126),
(4, 10, 555),
(5, 2, 257),
(5, 3, 44),
(6, 3, 666),
(6, 4, 44),
(7, 4, 54),
(7, 5, 666),
(8, 6, 44),
(8, 7, 666),
(9, 4, 45),
(9, 8, 646),
(10, 7, 666),
(10, 12, 6689),
(11, 2, 441),
(11, 9, 666),
(12, 1, 440),
(12, 9, 666),
(13, 9, 442),
(13, 10, 443),
(14, 5, 58),
(14, 10, 205),
(15, 9, 85),
(15, 18, 61),
(16, 15, 56),
(16, 17, 57),
(17, 11, 16),
(17, 12, 10),
(18, 13, 18),
(18, 17, 50),
(19, 13, 56),
(19, 22, 56),
(20, 16, 57),
(20, 21, 42),
(21, 2, 44),
(21, 18, 75),
(22, 1, 44),
(22, 5, 44),
(23, 8, 44),
(23, 10, 44),
(24, 12, 44),
(24, 15, 44),
(25, 3, 44),
(25, 18, 44),
(26, 7, 44),
(26, 8, 44),
(27, 20, 44),
(27, 21, 44),
(28, 21, 44),
(28, 22, 44),
(29, 8, 44),
(29, 9, 44),
(30, 5, 44),
(30, 6, 44),
(31, 7, 44),
(31, 13, 44),
(32, 16, 44),
(32, 17, 44),
(33, 2, 44),
(33, 15, 44),
(34, 1, 44),
(34, 8, 44),
(35, 1, 44),
(35, 6, 44),
(36, 6, 44),
(36, 8, 44),
(37, 6, 44),
(37, 8, 44),
(38, 6, 44),
(38, 9, 44),
(39, 20, 44),
(39, 22, 44),
(40, 21, 44),
(40, 22, 44),
(41, 21, 44),
(41, 23, 44),
(42, 1, 44),
(42, 6, 44),
(43, 8, 44),
(43, 9, 44),
(44, 2, 44),
(44, 9, 44),
(45, 2, 44),
(45, 10, 44),
(46, 1, 44),
(46, 2, 44),
(47, 1, 44),
(47, 3, 44),
(48, 5, 44),
(48, 6, 44),
(49, 7, 44),
(49, 9, 44),
(50, 9, 44),
(50, 19, 44),
(51, 6, 44),
(51, 8, 44),
(52, 12, 44),
(52, 22, 44),
(53, 21, 44),
(53, 23, 44),
(54, 10, 44),
(54, 12, 44),
(55, 10, 44),
(55, 15, 44),
(56, 16, 44),
(56, 18, 44),
(57, 12, 44),
(57, 15, 44),
(58, 16, 41);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `puttc_produit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `puttc_produit`) VALUES
(1, 10),
(2, 11.1),
(3, 12.2),
(4, 13.3),
(5, 14.4),
(6, 15.5),
(7, 16.6),
(8, 17.7),
(9, 18.8),
(10, 19.9),
(11, 20.1),
(12, 21.1),
(13, 22.2),
(14, 23.3),
(15, 24.4),
(16, 25.5),
(17, 26.6),
(18, 27.7),
(19, 28.8),
(20, 29.9),
(21, 30.1),
(22, 31.1),
(23, 32.2);

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `id_vente` int(11) NOT NULL,
  `date_vente` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vente`
--

INSERT INTO `vente` (`id_vente`, `date_vente`) VALUES
(1, '2016-01-01'),
(2, '2016-01-08'),
(3, '2016-01-15'),
(4, '2016-01-22'),
(5, '2016-01-29'),
(6, '2016-02-01'),
(7, '2016-02-08'),
(8, '2016-02-15'),
(9, '2016-02-22'),
(10, '2016-02-29'),
(11, '2016-03-01'),
(12, '2016-03-08'),
(13, '2016-03-15'),
(14, '2016-03-22'),
(15, '2016-03-29'),
(16, '2016-04-01'),
(17, '2016-04-08'),
(18, '2016-04-15'),
(19, '2016-04-22'),
(20, '2016-04-29'),
(21, '2016-05-01'),
(22, '2016-05-08'),
(23, '2016-05-15'),
(24, '2016-05-22'),
(25, '2016-05-29'),
(26, '2016-06-01'),
(27, '2016-06-08'),
(28, '2016-06-15'),
(29, '2016-06-22'),
(30, '2016-06-29'),
(31, '2016-07-01'),
(32, '2016-07-08'),
(33, '2016-07-15'),
(34, '2016-07-22'),
(35, '2016-07-29'),
(36, '2016-08-01'),
(37, '2016-08-08'),
(38, '2016-08-15'),
(39, '2016-08-22'),
(40, '2016-08-29'),
(41, '2016-09-01'),
(42, '2016-09-08'),
(43, '2016-09-15'),
(44, '2016-09-22'),
(45, '2016-09-29'),
(46, '2016-10-01'),
(47, '2016-10-08'),
(48, '2016-10-15'),
(49, '2016-10-22'),
(50, '2016-10-29'),
(51, '2016-11-01'),
(52, '2016-11-08'),
(53, '2016-11-15'),
(54, '2016-11-22'),
(55, '2016-11-29'),
(56, '2016-12-01'),
(57, '2016-12-08'),
(58, '2016-12-15'),
(59, '2016-12-22'),
(60, '2016-12-29'),
(61, '2017-01-08'),
(62, '2017-01-15'),
(63, '2017-01-22'),
(64, '2017-01-29'),
(65, '2017-02-01'),
(66, '2017-02-08'),
(67, '2017-02-15'),
(68, '2017-02-22'),
(69, '0000-00-00'),
(70, '2017-03-01'),
(71, '2017-03-08'),
(72, '2017-03-15'),
(73, '2017-03-22'),
(74, '2017-03-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ligne_vente`
--
ALTER TABLE `ligne_vente`
  ADD PRIMARY KEY (`id_vente`,`id_produit`),
  ADD KEY `LIGNE_VENTE_FK_P` (`id_produit`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id_vente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `id_vente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ligne_vente`
--
ALTER TABLE `ligne_vente`
  ADD CONSTRAINT `LIGNE_VENTE_FK_P` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `LIGNE_VENTE_FK_V` FOREIGN KEY (`id_vente`) REFERENCES `vente` (`id_vente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
