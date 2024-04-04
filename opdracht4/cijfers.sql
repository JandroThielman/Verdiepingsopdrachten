-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 03:38 PM
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
-- Database: `cijfers`
--

-- --------------------------------------------------------

--
-- Table structure for table `cijfers`
--

CREATE TABLE `cijfers` (
  `id` int(9) NOT NULL,
  `leerlingen` varchar(255) NOT NULL,
  `cijfers` float NOT NULL,
  `Vakken` varchar(255) NOT NULL,
  `Docenten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cijfers`
--

INSERT INTO `cijfers` (`id`, `leerlingen`, `cijfers`, `Vakken`, `Docenten`) VALUES
(1, 'Jandro', 9.5, 'PHP', 'Meneer Koek '),
(2, 'Dean', 8.1, 'HTML', 'Meneer Loep'),
(3, 'Jan', 1, 'CSS', 'Meneer Goud'),
(4, 'Luke', 3.5, 'JavaScript', 'Meneer Fluff'),
(5, 'Junior', 8.1, 'Python', 'Meneer Woep'),
(6, 'Jean', 5.3, 'C++', 'Meneer Soep'),
(7, 'Smolly', 6, 'C#', 'Meneer Transparent'),
(8, 'Lia', 7.4, 'Binary', 'Meneer Smidgen'),
(9, 'Greep', 3.7, 'SQL', 'Mevrouw Loes'),
(10, 'Tweep', 1.5, 'Game Development', 'Mevrouw Helena');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cijfers`
--
ALTER TABLE `cijfers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cijfers`
--
ALTER TABLE `cijfers`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
