-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 12:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carhorizontal`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `podaci_auta` ()   BEGIN
            SELECT * FROM automobil;
        END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `automobil`
--

CREATE TABLE `automobil` (
  `brSasije` varchar(10) NOT NULL,
  `model` varchar(100) NOT NULL,
  `godiste` year(4) NOT NULL,
  `kilometraza` mediumint(7) UNSIGNED NOT NULL,
  `vlasnik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `automobil`
--

INSERT INTO `automobil` (`brSasije`, `model`, `godiste`, `kilometraza`, `vlasnik`) VALUES
('AU9865', 'Audi Q8', 2017, 185263, 'Lana'),
('BM578643', 'BMW M8', 2021, 12348, 'Lazar'),
('MB865', 'GLE', 2022, 98654, 'Milica'),
('PS172907', 'Prosche 911 Turbo S', 2015, 35856, 'Milan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automobil`
--
ALTER TABLE `automobil`
  ADD PRIMARY KEY (`brSasije`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
