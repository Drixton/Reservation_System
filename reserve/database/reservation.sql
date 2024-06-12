-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 11:51 AM
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
(1, 'AEP', 'AEP@gmail.com', '2024-06-11 14:37:50', '12345678', '2024-06-10 13:04:05', 'profile_pictures/photo1712557113.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `arnispage`
--

CREATE TABLE `arnispage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arnispage`
--

INSERT INTO `arnispage` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(1, 'phosclay', 'Arnis', 'Thu, Jun 13, 2024', '02:00:00', 'court 5', 1, '', '676665', 'OIP.jpg', '100.00', '2024-06-10 10:55:26'),
(29, 'phosclay', 'Arnis', '0000-00-00', '03:00:00', 'court 5', 3, '', 'asd', 'arnis.jpg', '300.00', '2024-06-10 06:19:48'),
(31, 'phosclay', 'Arnis', '0000-00-00', '10:00:00', 'court 5', 2, '', '12', '', '200.00', '2024-06-10 07:53:28'),
(33, 'phosclay', 'Arnis', '0000-00-00', '10:30:00', 'court 5', 2, '', '123', '', '200.00', '2024-06-10 08:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `badmintonpage`
--

CREATE TABLE `badmintonpage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_qr_images`
--

CREATE TABLE `bank_qr_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_qr_images`
--

INSERT INTO `bank_qr_images` (`id`, `image_path`) VALUES
(1, '../assets/img/qrsample.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `billiardpage`
--

CREATE TABLE `billiardpage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chesspage`
--

CREATE TABLE `chesspage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dartpage`
--

CREATE TABLE `dartpage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gcash_qr_images`
--

CREATE TABLE `gcash_qr_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gcash_qr_images`
--

INSERT INTO `gcash_qr_images` (`id`, `image_path`) VALUES
(1, '../assets/img/qrsample.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `picklepage`
--

CREATE TABLE `picklepage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_payments`
--

CREATE TABLE `reservation_payments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `court_number` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_payments`
--

INSERT INTO `reservation_payments` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(1, 'phosclay', 'Arnis', 'Thu, Jun 20, 2024', '11:00 AM', '', '2 hours', '', '233', '', 200, '2024-06-11 09:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `sepaktakrawpage`
--

CREATE TABLE `sepaktakrawpage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabletennispage`
--

CREATE TABLE `tabletennispage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taekwondopage`
--

CREATE TABLE `taekwondopage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `arnispage`
--
ALTER TABLE `arnispage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badmintonpage`
--
ALTER TABLE `badmintonpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_qr_images`
--
ALTER TABLE `bank_qr_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billiardpage`
--
ALTER TABLE `billiardpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chesspage`
--
ALTER TABLE `chesspage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dartpage`
--
ALTER TABLE `dartpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gcash_qr_images`
--
ALTER TABLE `gcash_qr_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picklepage`
--
ALTER TABLE `picklepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_payments`
--
ALTER TABLE `reservation_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sepaktakrawpage`
--
ALTER TABLE `sepaktakrawpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabletennispage`
--
ALTER TABLE `tabletennispage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taekwondopage`
--
ALTER TABLE `taekwondopage`
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
-- AUTO_INCREMENT for table `arnispage`
--
ALTER TABLE `arnispage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `badmintonpage`
--
ALTER TABLE `badmintonpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billiardpage`
--
ALTER TABLE `billiardpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chesspage`
--
ALTER TABLE `chesspage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dartpage`
--
ALTER TABLE `dartpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picklepage`
--
ALTER TABLE `picklepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_payments`
--
ALTER TABLE `reservation_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sepaktakrawpage`
--
ALTER TABLE `sepaktakrawpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabletennispage`
--
ALTER TABLE `tabletennispage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taekwondopage`
--
ALTER TABLE `taekwondopage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
