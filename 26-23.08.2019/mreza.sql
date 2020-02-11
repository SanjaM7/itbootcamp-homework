-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2019 at 02:52 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mreza`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(60) COLLATE utf16_slovenian_ci NOT NULL,
  `pass` varchar(255) COLLATE utf16_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `pass`) VALUES
(1, 'milka', 'milka'),
(2, 'pera', 'pera'),
(3, 'zika', 'zika'),
(4, 'sanja', 'sanja'),
(5, 'ena', 'ena'),
(6, 'jelena', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `prijatelji`
--

CREATE TABLE `prijatelji` (
  `id` int(10) UNSIGNED NOT NULL,
  `korisnik_id` int(10) UNSIGNED NOT NULL,
  `prijatelj_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `prijatelji`
--

INSERT INTO `prijatelji` (`id`, `korisnik_id`, `prijatelj_id`) VALUES
(4, 5, 4),
(6, 2, 5),
(8, 2, 4),
(48, 4, 1),
(50, 4, 5),
(51, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `profili`
--

CREATE TABLE `profili` (
  `id` int(10) UNSIGNED NOT NULL,
  `korisnik_id` int(10) UNSIGNED DEFAULT NULL,
  `ime` varchar(150) COLLATE utf16_slovenian_ci NOT NULL,
  `prezime` varchar(200) COLLATE utf16_slovenian_ci DEFAULT NULL,
  `pol` char(1) COLLATE utf16_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `profili`
--

INSERT INTO `profili` (`id`, `korisnik_id`, `ime`, `prezime`, `pol`) VALUES
(1, 1, 'Milka', 'Canic', 'Z'),
(2, 2, 'Perica', 'Vasic', 'M'),
(3, 3, 'Zikica', 'Tomic', 'M'),
(4, 4, 'Sanja', 'Mitrovic', 'Z'),
(5, 5, 'Ena', 'Momcilovic', 'Z'),
(9, 6, 'Jelena', 'Matejic', 'Z');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `prijatelji`
--
ALTER TABLE `prijatelji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `prijatelj_id` (`prijatelj_id`);

--
-- Indexes for table `profili`
--
ALTER TABLE `profili`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnik_id` (`korisnik_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prijatelji`
--
ALTER TABLE `prijatelji`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `profili`
--
ALTER TABLE `profili`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prijatelji`
--
ALTER TABLE `prijatelji`
  ADD CONSTRAINT `prijatelji_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `prijatelji_ibfk_2` FOREIGN KEY (`prijatelj_id`) REFERENCES `korisnici` (`id`);

--
-- Constraints for table `profili`
--
ALTER TABLE `profili`
  ADD CONSTRAINT `profili_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
