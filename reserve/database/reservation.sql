-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 08:41 AM
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
(1, 'AEP', 'AEP@gmail.com', '2024-06-25 11:13:59', '12345678', '2024-06-21 11:45:40', 'profile_pictures/photo1712557113.jpeg');

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
(1, '../assets/img/asdasd.png');

-- --------------------------------------------------------

--
-- Table structure for table `bdo_qr_images`
--

CREATE TABLE `bdo_qr_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bdo_qr_images`
--

INSERT INTO `bdo_qr_images` (`id`, `image_path`) VALUES
(1, '../assets/img/asdasd.png');

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

--
-- Dumping data for table `billiardpage`
--

INSERT INTO `billiardpage` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(50, 'phosclay', 'Billiard', '8 June 2024', '02:30:00', 0, 1, '', 'asd', 'dart.jpg', '100.00', '2024-06-14 06:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `bpi_qr_images`
--

CREATE TABLE `bpi_qr_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bpi_qr_images`
--

INSERT INTO `bpi_qr_images` (`id`, `image_path`) VALUES
(1, '../assets/img/asdasd.png');

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
-- Table structure for table `cornholepage`
--

CREATE TABLE `cornholepage` (
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

--
-- Dumping data for table `cornholepage`
--

INSERT INTO `cornholepage` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(20, 'phosclay', 'Cornhole', '21 June 2024', '09:00:00', 0, 1, '', '123', '', '100.00', '2024-06-12 08:42:56');

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
(1, '../assets/img/asdasd.png');

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

--
-- Dumping data for table `picklepage`
--

INSERT INTO `picklepage` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(15, 'phosclay', 'Pickle ball', '14 June 2024', '09:30:00', 0, 1, '', '123123', '', '100.00', '2024-06-12 08:15:23');

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
(5, 'xirdreme', 'Arnis', '1 June 2024', '8:00 AM', 'court 1', '1 hour', '', '123123', 'Screenshot 2024-05-20 153544.png', 100, '2024-06-25 05:56:17'),
(6, 'xirdreme', 'Billiard', '1 June 2024', '8:00 AM', 'Table 1', '1 hour', '', '123123', 'Screenshot 2024-05-20 155917.png', 100, '2024-06-25 05:56:37'),
(7, 'xirdreme', 'Badminton', '1 June 2024', '8:00 AM', 'Court 2', '1 hour', '', '123123', 'Screenshot 2024-05-20 160247.png', 100, '2024-06-25 06:02:09'),
(8, 'xirdreme', 'Chess', '1 June 2024', '8:00 AM', 'Chess Board 1', '1 hour', '', '12123', 'Screenshot 2024-05-20 153544.png', 100, '2024-06-25 06:04:36'),
(9, 'xirdreme', 'Dart', '1 June 2024', '8:00 AM', 'Board 1', '1 hour', '', '123123', 'Screenshot 2024-05-20 153544.png', 100, '2024-06-25 06:04:54');

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

--
-- Dumping data for table `sepaktakrawpage`
--

INSERT INTO `sepaktakrawpage` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(17, 'phosclay', 'Sepak Takraw', '7 June 2024', '03:00:00', 0, 0, '', 'asdasd', '', '400.00', '2024-06-12 08:20:05');

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

--
-- Dumping data for table `tabletennispage`
--

INSERT INTO `tabletennispage` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(19, 'phosclay', 'Table Tennis', '14 June 2024', '03:00:00', 0, 2, '', '123', '', '200.00', '2024-06-12 08:30:52');

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
  `time_out` datetime NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`, `time_in`, `time_out`, `profile_picture`) VALUES
(13, 'phosclay@gmail.com', 'phosclay', 'phosclay', '2024-05-10 04:06:07', '2024-05-10 06:52:17', '0000-00-00 00:00:00', ''),
(14, 'jared@gmail.com', 'jared', '12345678', '2024-05-10 09:24:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(15, 'baroy@gmail.com', 'baroy', '12345678', '2024-05-13 03:37:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(16, 'drixdiocton@gmail.com', 'darwinpaular', '12345678', '2024-06-14 09:37:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(17, 'a@g.com', '<script>Hello world</script>', '12345678', '2024-06-17 16:07:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(21, 'asdasd@gmail.com', 'asdasdasd', '', '2024-06-19 05:49:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(22, 'asdas@gmail.com', 'asdasdasdasd', '', '2024-06-19 05:49:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(23, 'hostz@gmail.com', 'asdasdasdasdasdasd', 'wertyuio', '2024-06-19 05:53:14', '2024-06-19 13:53:14', '0000-00-00 00:00:00', ''),
(24, 'love@gmail.com', 'localhost', '12345678', '2024-06-19 05:55:50', '2024-06-19 13:55:50', '0000-00-00 00:00:00', ''),
(25, 'love1@gmail.com', 'asdasd', '12345678', '2024-06-19 05:56:17', '2024-06-19 13:56:17', '0000-00-00 00:00:00', ''),
(26, 'hostx@gmail.com', 'asdasdasdsss', '$2y$10$aDGTL5kGE.AMZokQ1NSGruXC0Xewr/GH/Ly25d8HEiflbB9v6ZcTG', '2024-06-19 06:01:03', '2024-06-19 14:01:03', '0000-00-00 00:00:00', ''),
(27, 'xirdreme@gmail.com', 'xirdreme', '$2y$10$lROSBl.SU9LaO2KosztWveBMUKJMEkIfRzUzTGqA0yDEwtMhZAnHe', '2024-06-19 08:37:13', '2024-06-19 16:37:13', '0000-00-00 00:00:00', 'profile_pictures/Screenshot 2024-05-20 160236.png');

-- --------------------------------------------------------

--
-- Table structure for table `wholevenuepage`
--

CREATE TABLE `wholevenuepage` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `gcash_qrcode` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wholevenuepage`
--

INSERT INTO `wholevenuepage` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(1, 'xirdreme', 'Events', '1 June 2024', '08:00:00', 'Whole Venue', 24, '', '123123', 'Screenshot 2024-05-20 155917.png', '10000.00', '2024-06-25 03:12:14');

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
-- Indexes for table `bdo_qr_images`
--
ALTER TABLE `bdo_qr_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billiardpage`
--
ALTER TABLE `billiardpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bpi_qr_images`
--
ALTER TABLE `bpi_qr_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chesspage`
--
ALTER TABLE `chesspage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cornholepage`
--
ALTER TABLE `cornholepage`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `badmintonpage`
--
ALTER TABLE `badmintonpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bdo_qr_images`
--
ALTER TABLE `bdo_qr_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billiardpage`
--
ALTER TABLE `billiardpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bpi_qr_images`
--
ALTER TABLE `bpi_qr_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chesspage`
--
ALTER TABLE `chesspage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cornholepage`
--
ALTER TABLE `cornholepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `dartpage`
--
ALTER TABLE `dartpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picklepage`
--
ALTER TABLE `picklepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reservation_payments`
--
ALTER TABLE `reservation_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sepaktakrawpage`
--
ALTER TABLE `sepaktakrawpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tabletennispage`
--
ALTER TABLE `tabletennispage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `taekwondopage`
--
ALTER TABLE `taekwondopage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
