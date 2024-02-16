-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 10:27 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vtiger`
--

-- --------------------------------------------------------

--
-- Table structure for table `vtiger_whatsappcf`
--

CREATE TABLE `vtiger_whatsappcf` (
  `modcommentsid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vtiger_whatsappcf`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `vtiger_modcommentswhatsappcf`
--
ALTER TABLE `vtiger_whatsappcf`
  ADD PRIMARY KEY (`modcommentsid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vtiger_modcommentswhatsappcf`
--
ALTER TABLE `vtiger_whatsappcf`
  ADD CONSTRAINT `fk_modcommentsid_vtiger_whatsappcf` FOREIGN KEY (`modcommentsid`) REFERENCES `vtiger_whatsapp` (`modcommentsid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
