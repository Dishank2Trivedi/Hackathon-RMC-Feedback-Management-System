-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2017 at 05:48 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `complain` varchar(500) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `complain`, `cdate`) VALUES
(1, 'testtest', '2017-07-27 19:54:06'),
(2, 'test test', '2017-07-27 19:54:50'),
(3, 'test test', '2017-07-27 19:55:34'),
(4, 'test test', '2017-07-27 19:55:53'),
(5, 'testtest', '2017-07-27 18:39:20'),
(6, 'Bxbdbd', '2017-07-27 19:05:44'),
(7, 'fgdfgdf', '2017-07-28 07:02:31'),
(8, 'bhj', '2017-07-28 18:46:27'),
(9, 'test test test', '2017-07-28 19:17:58'),
(10, 'test', '2017-07-28 20:21:15'),
(11, 'test', '2017-07-28 20:22:24'),
(12, 'test', '2017-07-28 20:22:40'),
(13, 'test', '2017-07-28 20:23:08'),
(14, 'fsdfd', '2017-07-29 08:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `complain_id` int(11) NOT NULL,
  `complain` text NOT NULL,
  `feedback_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `service_id`, `name`, `email`, `phone`, `rating`, `comment`, `complain_id`, `complain`, `feedback_date`) VALUES
(3, 2, 'test', 'test', '9999999999', 4, 'test', 1, 'test test test', '2017-07-28 19:17:58'),
(4, 1, 'test', 'test test', '9999999999', 3, 'test', 23, 'test', '2017-07-28 20:21:15'),
(5, 1, 'test', 'test test', '9999999999', 3, 'test', 23, 'test', '2017-07-28 20:22:24'),
(6, 1, 'test', 'test test', '9999999999', 3, 'test', 23, 'test', '2017-07-28 20:22:40'),
(7, 1, 'test', 'test test', '9999999999', 3, 'test', 23, 'test', '2017-07-28 20:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `phonedir`
--

CREATE TABLE `phonedir` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `numbers` bigint(10) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonedir`
--

INSERT INTO `phonedir` (`id`, `user_name`, `numbers`, `otp`) VALUES
(1, 'Mr.Sirja', 9999999999, )

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `auth_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `auth_email`) VALUES
(1, 'Property Tax', 'email@service.com'),
(2, 'Profession Tax', 'email@service.com'),
(3, 'Community Hall Booking', 'email@service.com'),
(4, 'Sports Registation', 'email@service.com'),
(5, 'Water Charge', 'email@service.com'),
(6, 'Solid Waste Management', 'email@service.com'),
(7, 'Right To Information Act', 'email@service.com'),
(8, 'Shop and Establishment', 'email@service.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_service`
--

CREATE TABLE `user_service` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_service`
--

INSERT INTO `user_service` (`id`, `user_id`, `service_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 5, 1),
(5, 5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phonedir`
--
ALTER TABLE `phonedir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_service`
--
ALTER TABLE `user_service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phonedir`
--
ALTER TABLE `phonedir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_service`
--
ALTER TABLE `user_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
