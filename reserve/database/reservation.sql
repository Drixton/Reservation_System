-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 10:23 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogs`
--

CREATE TABLE `adminlogs` (
  `id` int(30) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time_in` datetime NOT NULL,
  `password` varchar(255) NOT NULL,
  `time_out` datetime NOT NULL,
  `profile_pictures` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogs`
--

INSERT INTO `adminlogs` (`id`, `full_name`, `email`, `time_in`, `password`, `time_out`, `profile_pictures`) VALUES
(1, 'AEP', 'AEP@gmail.com', '2024-05-23 16:06:27', '12345678', '2024-05-23 10:12:37', 'profile_pictures/photo1712557113.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_payments`
--

CREATE TABLE `reservation_payments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `court_number` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_payments`
--

INSERT INTO `reservation_payments` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(37, 'phosclay', 'badminton', 'Thu, May 9, 2024', '08:00:00', 'court 3', '0', '123', '123', 'Screenshot 2024-05-20 160341.png', '23.00', '2024-05-23 07:06:25'),
(38, 'phosclay', 'badminton', 'Thu, May 9, 2024', '08:00:00', 'court 3', '0', '123', '123', 'Screenshot 2024-05-20 160341.png', '23.00', '2024-05-23 07:07:44'),
(39, 'phosclay', 'badminton', 'Thu, May 9, 2024', '08:00:00', 'court 3', '0', '123', '123', 'Screenshot 2024-05-20 160341.png', '23.00', '2024-05-23 07:09:23'),
(40, 'phosclay', 'badminton', 'Fri, May 24, 2024', '02:30:00', 'court 4', '2', '23', '23', 'Screenshot 2024-05-20 160341.png', '23.00', '2024-05-23 07:09:49'),
(41, 'phosclay', 'badminton', 'Fri, May 24, 2024', '02:30:00', 'court 4', '2 hours', '23', '23', 'Screenshot 2024-05-20 160341.png', '23.00', '2024-05-23 07:14:47'),
(42, 'phosclay', 'badminton', 'Fri, May 24, 2024', '02:30:00', 'court 4', '2 hours', '23', '23', 'Screenshot 2024-05-20 160341.png', '23.00', '2024-05-23 07:16:07'),
(43, 'phosclay', 'badminton', 'Fri, May 10, 2024', '01:30:00', 'court 2', '2 hours', '', '', '', '0.00', '2024-05-23 07:20:49'),
(44, 'phosclay', 'badminton', 'Thu, May 9, 2024', '02:30:00', 'court 3', '2 hours', 'asd', 'asd', '', '0.00', '2024-05-23 07:21:20'),
(45, 'phosclay', 'badminton', 'Thu, May 9, 2024', '02:30:00', 'court 3', '2 hours', 'asd', 'asd', 'Screenshot 2024-05-21 155058.png', '0.00', '2024-05-23 07:21:34'),
(46, 'phosclay', 'badminton', 'Thu, May 9, 2024', '02:30:00', 'court 3', '2 hours', 'asd', 'asd', 'Screenshot 2024-05-21 123752.png', '0.00', '2024-05-23 07:21:45'),
(47, 'phosclay', 'badminton', 'Fri, May 17, 2024', '08:00:00', 'court 2', '2 hours', '2343', '2323333', 'Screenshot 2024-05-20 160145.png', '23455.00', '2024-05-23 07:23:05'),
(48, 'phosclay', 'Arnis', 'Thu, May 2, 2024', '08:00:00', 'court 4', '2 hours', '', '', '', '0.00', '2024-05-23 07:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time_in` datetime NOT NULL,
  `password` int(255) NOT NULL,
  `time_out` datetime NOT NULL,
  `profile_pictures` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `time_in`, `password`, `time_out`, `profile_pictures`) VALUES
(0, 'aep', 'aep@gmail.com', '2024-05-10 13:20:39', 12345678, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`, `time_in`, `time_out`) VALUES
(13, 'phosclay@gmail.com', 'phosclay', 'phosclay', '2024-05-10 04:06:07', '2024-05-10 06:52:17', '0000-00-00 00:00:00'),
(14, 'jared@gmail.com', 'jared', '12345678', '2024-05-10 09:24:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'baroy@gmail.com', 'baroy', '12345678', '2024-05-13 03:37:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogs`
--
ALTER TABLE `adminlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_payments`
--
ALTER TABLE `reservation_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogs`
--
ALTER TABLE `adminlogs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation_payments`
--
ALTER TABLE `reservation_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
