-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2024 at 10:15 AM
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
(4, 'DUMDUM', 'dumdum@gmail.com', '0000-00-00 00:00:00', '$2y$10$iMLoTIfG6XN5ahJy30nlU.uHA.N/jLEY20Ij9Yd9HmdYL5jtCzztu', '2024-07-03 05:25:27', 'profile_pictures/Screenshot 2024-05-20 160236.png'),
(5, 'AEP', 'aep@gmail.com', '0000-00-00 00:00:00', '$2y$10$hMG2ZeJGiioJHT8ds..aheC369eWFwfIhWchQo23dAgjv3XJxsOR.', '2024-07-12 18:14:19', 'profile_pictures/photo1713252020.jpeg');

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
  `duration` varchar(255) NOT NULL,
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
(38, 'xirdreme', 'Arnis', '25 July 2024', '08:00:00', 'Court 2', '2 hours', '', '123-123-123', '450407210_1645378882669231_2215419038953784770_n.jpg', '100.00', '2024-07-12 08:02:50');

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
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badmintonpage`
--

INSERT INTO `badmintonpage` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(40, 'xirdreme', 'Badminton', '2 July 2024', '09:00:00', 'Court 1', '2 hours', '', '567-987', '450407210_1645378882669231_2215419038953784770_n.jpg', '250.00', '2024-07-12 08:07:37');

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
-- Table structure for table `basketballpage`
--

CREATE TABLE `basketballpage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `gcash_qrcode` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
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
(39, 'xirdreme', 'Billiard', '6 July 2024', '08:00:00', 'Billiard Table 2', '2 hours', '', '456-456', '450407210_1645378882669231_2215419038953784770_n.jpg', '100.00', '2024-07-12 08:05:40');

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
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
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
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
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
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
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
-- Table structure for table `judopage`
--

CREATE TABLE `judopage` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `gcash_qrcode` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `maya_qr_images`
--

CREATE TABLE `maya_qr_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maya_qr_images`
--

INSERT INTO `maya_qr_images` (`id`, `image_path`) VALUES
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
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
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
(42, 'xirdreme', 'Sepak Takraw', '25 July 2024', '4:30 PM', 'Court 1', '1 hour', '', '12313', '450407210_1645378882669231_2215419038953784770_n.jpg', 50, '2024-07-12 08:25:43');

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
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
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
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
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
  `court_number` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `gcash_qrcode` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taekwondopage`
--

INSERT INTO `taekwondopage` (`id`, `username`, `sports`, `date`, `time`, `court_number`, `duration`, `promo_code`, `reference_no`, `gcash_qrcode`, `total`, `created_at`) VALUES
(41, 'xirdreme', 'Taekwondo', '10 July 2024', '09:00:00', 'Court 1', '1 hour', '', '1223123', '450407210_1645378882669231_2215419038953784770_n.jpg', '50.00', '2024-07-12 08:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `union_qr_images`
--

CREATE TABLE `union_qr_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `union_qr_images`
--

INSERT INTO `union_qr_images` (`id`, `image_path`) VALUES
(1, '../assets/img/asdasd.png');

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
  `duration` varchar(255) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `gcash_qrcode` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `judopage`
--
ALTER TABLE `judopage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maya_qr_images`
--
ALTER TABLE `maya_qr_images`
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
-- Indexes for table `union_qr_images`
--
ALTER TABLE `union_qr_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wholevenuepage`
--
ALTER TABLE `wholevenuepage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogs`
--
ALTER TABLE `adminlogs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `arnispage`
--
ALTER TABLE `arnispage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `badmintonpage`
--
ALTER TABLE `badmintonpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `billiardpage`
--
ALTER TABLE `billiardpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `chesspage`
--
ALTER TABLE `chesspage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cornholepage`
--
ALTER TABLE `cornholepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dartpage`
--
ALTER TABLE `dartpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maya_qr_images`
--
ALTER TABLE `maya_qr_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `picklepage`
--
ALTER TABLE `picklepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_payments`
--
ALTER TABLE `reservation_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `union_qr_images`
--
ALTER TABLE `union_qr_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
