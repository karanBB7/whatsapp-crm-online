-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 10:26 AM
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
-- Table structure for table `vtiger_whatsapp`
--

CREATE TABLE `vtiger_whatsapp` (
  `modcommentsid` int(11) NOT NULL,
  `commentcontent` text DEFAULT NULL,
  `related_to` int(19) DEFAULT NULL,
  `parent_comments` int(19) DEFAULT NULL,
  `customer` int(19) DEFAULT NULL,
  `userid` int(19) DEFAULT NULL,
  `reasontoedit` varchar(100) DEFAULT NULL,
  `is_private` int(1) DEFAULT 0,
  `filename` varchar(255) DEFAULT NULL,
  `related_email_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vtiger_whatsapp`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `vtiger_whatsapp`
--
ALTER TABLE `vtiger_whatsapp`
  ADD KEY `relatedto_idx` (`related_to`),
  ADD KEY `fk_crmid_vtiger_whatsapp` (`modcommentsid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vtiger_whatsapp`
--
ALTER TABLE `vtiger_whatsapp`
  ADD CONSTRAINT `fk_crmid_vtiger_whatsapp` FOREIGN KEY (`modcommentsid`) REFERENCES `vtiger_crmentity` (`crmid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
