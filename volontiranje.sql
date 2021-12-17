-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 10:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volontiranje`
--

-- --------------------------------------------------------

--
-- Table structure for table `prijavazavolontiranje`
--

CREATE TABLE `prijavazavolontiranje` (
  `idPrijava` int(11) NOT NULL,
  `izvodjac` varchar(30) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `mesto` varchar(30) NOT NULL,
  `idVolonter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prijavazavolontiranje`
--

INSERT INTO `prijavazavolontiranje` (`idPrijava`, `izvodjac`, `datum`, `mesto`, `idVolonter`) VALUES
(1, 'Marija Serifovic', '2021-12-27', 'Stark Arena', 1),
(2, 'Sergej Cetkovic', '2021-12-18', 'Stark Arena', 1),
(3, 'Zeljko Samardzic', '2022-03-08', 'Sava Centar', 1),
(4, 'Dzenan Loncarevic', '2022-01-14', 'Kasina by Community', 1),
(5, 'Lexington band', '2022-02-16', 'Tasmajdan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `volonter`
--

CREATE TABLE `volonter` (
  `idVolonter` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volonter`
--

INSERT INTO `volonter` (`idVolonter`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prijavazavolontiranje`
--
ALTER TABLE `prijavazavolontiranje`
  ADD PRIMARY KEY (`idPrijava`),
  ADD KEY `idVolonter` (`idVolonter`);

--
-- Indexes for table `volonter`
--
ALTER TABLE `volonter`
  ADD PRIMARY KEY (`idVolonter`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prijavazavolontiranje`
--
ALTER TABLE `prijavazavolontiranje`
  ADD CONSTRAINT `prijavazavolontiranje_ibfk_1` FOREIGN KEY (`idVolonter`) REFERENCES `volonter` (`idVolonter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
