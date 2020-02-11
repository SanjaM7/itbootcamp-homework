-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 08:06 PM
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
-- Database: `itbootcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf16_slovenian_ci NOT NULL,
  `prezime` varchar(80) COLLATE utf16_slovenian_ci NOT NULL,
  `godine` int(3) NOT NULL,
  `prosecnaOcena` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`id`, `ime`, `prezime`, `godine`, `prosecnaOcena`) VALUES
(1, 'Jelena', 'Jankovic', 20, '7.80'),
(2, 'Marko', 'Markovic', 25, '9.30'),
(4, 'Petar', 'Petrovic', 28, '8.80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studenti`
--
ALTER TABLE `studenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
