-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 12:03 AM
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
-- Database: `ambulanta`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `idealan`
-- (See below for the actual view)
--
CREATE TABLE `idealan` (
`id` int(11)
,`ime` varchar(50)
,`prezime` varchar(150)
,`visina` int(11)
,`tezina` float
,`god_rodjenja` year(4)
,`bmi` double(19,2)
,`kategorija` varchar(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `izuzetno_visok`
-- (See below for the actual view)
--
CREATE TABLE `izuzetno_visok` (
`id` int(11)
,`ime` varchar(50)
,`prezime` varchar(150)
,`visina` int(11)
,`tezina` float
,`god_rodjenja` year(4)
,`bmi` double(19,2)
,`kategorija` varchar(14)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nizak`
-- (See below for the actual view)
--
CREATE TABLE `nizak` (
`id` int(11)
,`ime` varchar(50)
,`prezime` varchar(150)
,`visina` int(11)
,`tezina` float
,`god_rodjenja` year(4)
,`bmi` double(19,2)
,`kategorija` varchar(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `pacijenti`
--

CREATE TABLE `pacijenti` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf16_slovenian_ci NOT NULL,
  `prezime` varchar(150) COLLATE utf16_slovenian_ci NOT NULL,
  `visina` int(11) DEFAULT NULL,
  `tezina` float DEFAULT NULL,
  `god_rodjenja` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `pacijenti`
--

INSERT INTO `pacijenti` (`id`, `ime`, `prezime`, `visina`, `tezina`, `god_rodjenja`) VALUES
(1, 'Marija', 'Markovic', 168, 68, 1973),
(2, 'Jelena', 'Petrovic', 170, 80, 1987),
(3, 'Milan', 'Milic', 190, 90, 1987),
(5, 'Petra', 'Peric', 165, 150, 2003),
(6, 'Marija', 'Peric', 165, 150, 1965),
(7, 'Anamarija', 'Peric', 187, 77, 1997),
(8, 'Pera', 'Peric', 189, 88, 1983),
(9, 'Marica', 'Mikic', 166, 55, 1989),
(10, 'Perica', 'Antic', 169, 75, 2001);

-- --------------------------------------------------------

--
-- Stand-in structure for view `visok`
-- (See below for the actual view)
--
CREATE TABLE `visok` (
`id` int(11)
,`ime` varchar(50)
,`prezime` varchar(150)
,`visina` int(11)
,`tezina` float
,`god_rodjenja` year(4)
,`bmi` double(19,2)
,`kategorija` varchar(5)
);

-- --------------------------------------------------------

--
-- Structure for view `idealan`
--
DROP TABLE IF EXISTS `idealan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `idealan`  AS  select `pacijenti`.`id` AS `id`,`pacijenti`.`ime` AS `ime`,`pacijenti`.`prezime` AS `prezime`,`pacijenti`.`visina` AS `visina`,`pacijenti`.`tezina` AS `tezina`,`pacijenti`.`god_rodjenja` AS `god_rodjenja`,round(`pacijenti`.`tezina` / (`pacijenti`.`visina` * `pacijenti`.`visina`) * 10000,2) AS `bmi`,'idealan' AS `kategorija` from `pacijenti` where `pacijenti`.`tezina` / (`pacijenti`.`visina` * `pacijenti`.`visina`) * 10000 between 20 and 26.5 order by `pacijenti`.`ime` ;

-- --------------------------------------------------------

--
-- Structure for view `izuzetno_visok`
--
DROP TABLE IF EXISTS `izuzetno_visok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `izuzetno_visok`  AS  select `pacijenti`.`id` AS `id`,`pacijenti`.`ime` AS `ime`,`pacijenti`.`prezime` AS `prezime`,`pacijenti`.`visina` AS `visina`,`pacijenti`.`tezina` AS `tezina`,`pacijenti`.`god_rodjenja` AS `god_rodjenja`,round(`pacijenti`.`tezina` / (`pacijenti`.`visina` * `pacijenti`.`visina`) * 10000,2) AS `bmi`,'izuzetno_visok' AS `kategorija` from `pacijenti` where `pacijenti`.`tezina` / (`pacijenti`.`visina` * `pacijenti`.`visina`) * 10000 > 31 order by `pacijenti`.`ime` ;

-- --------------------------------------------------------

--
-- Structure for view `nizak`
--
DROP TABLE IF EXISTS `nizak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nizak`  AS  select `pacijenti`.`id` AS `id`,`pacijenti`.`ime` AS `ime`,`pacijenti`.`prezime` AS `prezime`,`pacijenti`.`visina` AS `visina`,`pacijenti`.`tezina` AS `tezina`,`pacijenti`.`god_rodjenja` AS `god_rodjenja`,round(`pacijenti`.`tezina` / (`pacijenti`.`visina` * `pacijenti`.`visina`) * 10000,2) AS `bmi`,'nizak' AS `kategorija` from `pacijenti` where `pacijenti`.`tezina` / (`pacijenti`.`visina` * `pacijenti`.`visina`) * 10000 < 20 order by `pacijenti`.`ime` ;

-- --------------------------------------------------------

--
-- Structure for view `visok`
--
DROP TABLE IF EXISTS `visok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visok`  AS  select `pacijenti`.`id` AS `id`,`pacijenti`.`ime` AS `ime`,`pacijenti`.`prezime` AS `prezime`,`pacijenti`.`visina` AS `visina`,`pacijenti`.`tezina` AS `tezina`,`pacijenti`.`god_rodjenja` AS `god_rodjenja`,round(`pacijenti`.`tezina` / (`pacijenti`.`visina` * `pacijenti`.`visina`) * 10000,2) AS `bmi`,'visok' AS `kategorija` from `pacijenti` where `pacijenti`.`tezina` / (`pacijenti`.`visina` * `pacijenti`.`visina`) * 10000 between 26.5 and 31 order by `pacijenti`.`ime` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pacijenti`
--
ALTER TABLE `pacijenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
