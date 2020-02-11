-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 12:59 PM
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
-- Database: `homework_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) COLLATE utf16_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `id` int(11) NOT NULL,
  `tekst_komentara` varchar(45) COLLATE utf16_slovenian_ci DEFAULT NULL,
  `objave_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(45) COLLATE utf16_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `objave`
--

CREATE TABLE `objave` (
  `id` int(11) NOT NULL,
  `naslov_objave` varchar(45) COLLATE utf16_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `objave_has_kategorije`
--

CREATE TABLE `objave_has_kategorije` (
  `id` int(11) NOT NULL,
  `kategorije_id` int(11) NOT NULL,
  `objave_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profili`
--

CREATE TABLE `profili` (
  `id` int(11) NOT NULL,
  `adresa` varchar(45) COLLATE utf16_slovenian_ci DEFAULT NULL,
  `korisnici_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`id`),
  ADD KEY `objave_id` (`objave_id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objave`
--
ALTER TABLE `objave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objave_has_kategorije`
--
ALTER TABLE `objave_has_kategorije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorije_id` (`kategorije_id`),
  ADD KEY `objave_id` (`objave_id`);

--
-- Indexes for table `profili`
--
ALTER TABLE `profili`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnici_id` (`korisnici_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`objave_id`) REFERENCES `objave` (`id`);

--
-- Constraints for table `objave_has_kategorije`
--
ALTER TABLE `objave_has_kategorije`
  ADD CONSTRAINT `objave_has_kategorije_ibfk_1` FOREIGN KEY (`kategorije_id`) REFERENCES `kategorije` (`id`),
  ADD CONSTRAINT `objave_has_kategorije_ibfk_2` FOREIGN KEY (`objave_id`) REFERENCES `objave` (`id`);

--
-- Constraints for table `profili`
--
ALTER TABLE `profili`
  ADD CONSTRAINT `profili_ibfk_1` FOREIGN KEY (`korisnici_id`) REFERENCES `korisnici` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
