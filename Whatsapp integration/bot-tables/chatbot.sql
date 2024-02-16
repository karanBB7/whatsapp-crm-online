-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 01:59 PM
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
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` text NOT NULL,
  `replies` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'have a query', 'ok'),
(2, '1', 'our services list'),
(3, '2', 'product list'),
(4, '3', 'do something'),
(5, '4', 'do nothing'),
(6, 'thankyou', 'Bye..'),
(7, 'hello_world', 'Hello! We\'re thrilled to share some exciting news with you:\n\n🚀 Introducing Our Latest Feature: midware-beta!\nDiscover how our new feature can enhance your business processes and streamline your operations.\n\n🎉 Special Announcement: Join our upcoming webinar on 19th august 2023 to learn more about maximizing the benefits of Biz-Middleware for your business.\n\nStay tuned for more updates and innovations designed to help you succeed.'),
(8, 'support', 'for support you can contact 91 1234567890'),
(9, 'noo', '😕☹️🤔'),
(10, 'test', 'test success'),
(11, 'There is problem', 'Thank You Your Service Request Is Created, It will be resolved Soon'),
(12, 'there is damm issue', 'who cares');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
