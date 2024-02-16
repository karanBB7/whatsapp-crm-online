-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 11:55 AM
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
-- Table structure for table `received_whatsapp_messagebot`
--

CREATE TABLE `received_whatsapp_messagebot` (
  `id` int(11) NOT NULL,
  `fromNumber` varchar(255) NOT NULL,
  `messages` longtext DEFAULT NULL,
  `buttonText` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `listid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `received_whatsapp_messagebot`
--

INSERT INTO `received_whatsapp_messagebot` (`id`, `fromNumber`, `messages`, `buttonText`, `status`, `listid`, `title`, `description`, `createdAt`, `updatedAt`) VALUES
(273, '918219482194', NULL, NULL, '0', NULL, NULL, NULL, '2023-11-22 13:19:42', '2023-11-22 07:49:42.569551'),
(274, '919964642973', NULL, NULL, '1', '4', 'NO INTERNET', NULL, '2023-11-22 13:28:34', '2023-11-22 07:58:34.472001'),
(275, '919964642973', 'hi', NULL, '1', NULL, NULL, NULL, '2023-11-22 13:29:20', '2023-11-22 07:59:20.138294'),
(276, '919964642973', NULL, NULL, '1', '1', 'Raise Complaint', 'Can Raise Complaint', '2023-11-22 13:29:47', '2023-11-22 07:59:47.416526'),
(277, '919964642973', NULL, NULL, '1', '5', 'SLOW INTERNET', NULL, '2023-11-22 13:29:57', '2023-11-22 07:59:57.929619'),
(278, '919964642973', 'hi', NULL, '1', NULL, NULL, NULL, '2023-11-22 13:45:34', '2023-11-22 08:15:34.745297'),
(279, '919964642973', NULL, NULL, '1', '1', 'Raise Complaint', 'Can Raise Complaint', '2023-11-22 13:46:17', '2023-11-22 08:16:17.685679'),
(280, '919964642973', NULL, NULL, '1', '4', 'NO INTERNET', NULL, '2023-11-22 13:46:27', '2023-11-22 08:16:27.763822'),
(281, '918089851872', 'Hi', NULL, '1', NULL, NULL, NULL, '2023-11-22 14:52:45', '2023-11-22 09:22:45.710930'),
(282, '918089851872', NULL, NULL, '1', '1', 'Raise Complaint', 'Can Raise Complaint', '2023-11-22 14:53:42', '2023-11-22 09:23:42.122749'),
(283, '918089851872', NULL, NULL, '1', '4', 'NO INTERNET', NULL, '2023-11-22 14:53:55', '2023-11-22 09:23:55.461029'),
(284, '919964642973', NULL, NULL, '1', '5', 'SLOW INTERNET', NULL, '2023-11-22 14:55:47', '2023-11-22 09:25:47.325133'),
(285, '919964642973', 'hii', NULL, '1', NULL, NULL, NULL, '2023-11-22 15:25:01', '2023-11-22 09:55:01.059199'),
(286, '919964642973', 'hi', NULL, '1', NULL, NULL, NULL, '2023-11-22 15:25:41', '2023-11-22 09:55:41.943111'),
(287, '919964642973', 'hii', NULL, '1', NULL, NULL, NULL, '2023-11-22 15:25:59', '2023-11-22 09:55:59.663926'),
(288, '919964642973', NULL, NULL, '1', '1', 'Raise Complaint', 'Can Raise Complaint', '2023-11-22 15:26:10', '2023-11-22 09:56:10.695763'),
(289, '919964642973', NULL, NULL, '1', '5', 'SLOW INTERNET', NULL, '2023-11-22 15:26:21', '2023-11-22 09:56:21.772400'),
(290, '919964642973', NULL, NULL, '0', '2', 'test 2', 'testtt', '2023-11-22 15:29:59', '2023-11-22 09:59:59.115893'),
(291, '919964642973', NULL, NULL, '1', '1', 'test 1>', 'testt', '2023-11-22 15:56:00', '2023-11-22 10:26:00.702800'),
(292, '919964642973', 'noo', NULL, '1', NULL, NULL, NULL, '2023-11-22 15:56:16', '2023-11-22 10:26:16.794175'),
(293, '919964642973', 'ok', NULL, '0', NULL, NULL, NULL, '2023-11-22 15:56:22', '2023-11-22 10:26:22.883764'),
(294, '919964642973', 'ok', NULL, '0', NULL, NULL, NULL, '2023-11-22 15:57:28', '2023-11-22 10:27:28.239527'),
(295, '919964642973', 'no', NULL, '0', NULL, NULL, NULL, '2023-11-22 15:57:52', '2023-11-22 10:27:52.491890'),
(296, '919964642973', 'noo', NULL, '1', NULL, NULL, NULL, '2023-11-22 15:59:28', '2023-11-22 10:29:28.465544'),
(297, '919964642973', 'There is problem', NULL, '1', NULL, NULL, NULL, '2023-11-22 16:03:26', '2023-11-22 10:33:26.326196'),
(298, '919964642973', NULL, NULL, '1', '1', 'test 1>', 'testt', '2023-11-22 16:15:13', '2023-11-22 10:45:13.327907'),
(299, '919964642973', 'noo', NULL, '1', NULL, NULL, NULL, '2023-11-22 16:18:56', '2023-11-22 10:48:56.876634'),
(300, '919964642973', 'noo', NULL, '1', NULL, NULL, NULL, '2023-11-22 16:21:15', '2023-11-22 10:51:15.326460'),
(301, '919964642973', 'support', NULL, '1', NULL, NULL, NULL, '2023-11-22 16:22:05', '2023-11-22 10:52:05.860574'),
(302, '919964642973', 'hi', NULL, '1', NULL, NULL, NULL, '2023-11-22 16:22:23', '2023-11-22 10:52:23.030147');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `received_whatsapp_messagebot`
--
ALTER TABLE `received_whatsapp_messagebot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `received_whatsapp_messagebot`
--
ALTER TABLE `received_whatsapp_messagebot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
