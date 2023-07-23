-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2023 at 07:28 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `entry_time` datetime NOT NULL,
  `exit_time` datetime NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `parkingslot_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`entry_time`, `exit_time`, `vehicle_id`, `parkingslot_id`) VALUES
('2023-06-14 01:54:00', '2023-06-14 02:54:00', 28, 57),
('2023-06-14 12:38:00', '2023-06-14 13:38:00', 29, 58),
('2023-06-19 14:35:00', '2023-06-19 16:36:00', 27, 64),
('2023-06-20 18:21:00', '2023-06-20 19:21:00', 34, 65),
('2023-06-23 14:21:00', '2023-06-23 15:21:00', 35, 70),
('2023-07-08 14:31:00', '2023-07-08 15:31:00', 36, 71),
('2023-07-09 11:12:00', '2023-07-09 01:13:00', 37, 72),
('2023-07-09 11:13:00', '2023-07-09 00:13:00', 38, 73),
('2023-07-09 11:18:00', '2023-07-09 00:18:00', 39, 74),
('2023-07-05 12:24:00', '2023-07-05 12:24:00', 40, 76),
('2023-07-13 12:26:00', '2023-07-11 12:26:00', 40, 79),
('2023-07-12 12:29:00', '2023-07-13 12:29:00', 41, 75),
('2023-07-09 16:34:00', '2023-07-09 16:34:00', 39, 74),
('2023-07-10 20:43:00', '2023-07-10 21:43:00', 42, 98),
('2023-07-13 13:36:00', '2023-07-13 14:36:00', 42, 98),
('2023-07-11 14:20:00', '2023-07-11 14:20:00', 42, 98),
('2023-07-11 14:20:00', '2023-07-11 14:20:00', 42, 98),
('2023-07-11 14:20:00', '2023-07-11 14:20:00', 42, 98),
('2023-07-11 14:20:00', '2023-07-11 14:20:00', 42, 98),
('2023-07-13 14:27:00', '2023-07-15 14:28:00', 42, 98),
('2023-07-15 23:26:00', '2023-07-15 12:26:00', 48, 52),
('2023-07-15 23:39:00', '2023-07-15 13:39:00', 49, 53),
('2023-07-17 16:12:00', '2023-07-17 17:12:00', 49, 53),
('2023-07-18 00:37:00', '2023-07-18 02:37:00', 53, 60),
('2023-07-19 13:03:00', '2023-07-19 14:03:00', 54, 55),
('2023-07-22 23:17:00', '2023-07-22 12:17:00', 56, 99),
('2023-07-22 23:34:00', '2023-07-22 13:34:00', 57, 109),
('2023-07-22 23:34:00', '2023-07-22 13:35:00', 58, 110),
('2023-07-22 23:50:00', '2023-07-22 12:50:00', 59, 113),
('2023-07-23 10:59:00', '2023-07-23 11:59:00', 60, 106),
('2023-07-23 11:04:00', '2023-07-23 01:04:00', 61, 114);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `join_date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `firstname`, `lastname`, `username`, `phone`, `email`, `join_date`, `user_id`) VALUES
(1, 'rajesh', 'bhandari', 'rajesh', '9847898478', 'rajesh@gmail.com', '2023-07-15', 35),
(2, 'sanjeev', 'shrestha', 'sanjeev', '9810556010', 'sanjeev@gmail.com', '2023-07-16', 39);

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `id` int(11) NOT NULL,
  `parkingslot_number` int(10) UNSIGNED NOT NULL,
  `parking_status` varchar(100) NOT NULL DEFAULT 'free',
  `vehicle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`id`, `parkingslot_number`, `parking_status`, `vehicle_id`) VALUES
(52, 1004, 'occupied', 48),
(53, 1005, 'occupied', 49),
(54, 1006, 'occupied', 50),
(55, 1007, 'occupied', 54),
(56, 1008, 'occupied', 27),
(57, 1009, 'occupied', 28),
(58, 1010, 'occupied', 29),
(60, 1012, 'occupied', 53),
(63, 1015, 'occupied', NULL),
(64, 1016, 'occupied', 27),
(65, 1017, 'occupied', 33),
(66, 1018, 'occupied', 34),
(70, 1019, 'occupied', 35),
(71, 1020, 'occupied', 36),
(72, 1021, 'occupied', 37),
(73, 1022, 'occupied', 38),
(74, 1023, 'occupied', 39),
(75, 1024, 'occupied', 41),
(76, 1025, 'occupied', 40),
(78, 1027, 'occupied', 41),
(79, 1028, 'occupied', 40),
(98, 1029, 'occupied', 42),
(99, 1030, 'occupied', 56),
(100, 1031, 'occupied', NULL),
(103, 1033, 'free', NULL),
(106, 1036, 'occupied', 60),
(107, 1037, 'occupied', 46),
(108, 1038, 'free', NULL),
(109, 1039, 'occupied', 57),
(110, 1040, 'occupied', 58),
(111, 1041, 'occupied', 59),
(112, 1041, 'occupied', 59),
(113, 1041, 'occupied', 59),
(114, 1042, 'occupied', 61);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `ticket_number` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'free',
  `vehicle_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `ticket_number`, `status`, `vehicle_id`, `amount`) VALUES
(1, 1011, 'occupied', 56, 275),
(2, 1012, 'occupied', 59, 275),
(3, 1013, 'occupied', 60, 25),
(4, 1014, 'occupied', 61, 500),
(5, 1015, 'occupied', 58, 225),
(6, 1016, 'free', NULL, NULL),
(7, 1017, 'free', NULL, NULL),
(8, 1018, 'free', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `contact`, `email`, `username`, `password`, `role`) VALUES
(11, 'gaurav', 'taneja', '9781123456', 'gaurav@gmail.com', 'gaurav', '$2y$10$cNgvZpIo2jcFj1hGkqeMjubyxmYXEmJP2vYeF8VVgbyD3LpNq8P3S', 0),
(12, 'elliot', 'alderson', '9841567890', 'elliot@gmail.com', 'elliot', '$2y$10$1FomUzo0Mct79idN1faUDe/XzAo1AwndntLFqIFvoVhhNgIunezq2', 0),
(14, 'ayush', 'limbu', '9812345768', 'ayush@gmail.com', 'ayush', '$2y$10$kBMMERosTDywjz3SlRrtxONv8nmGAE.JNDgm0kcN3ipMhpIL7Gqru', 1),
(16, 'shashank', 'b', '9812828123', 'shashank@gmail.com', 'shashank', '$2y$10$ZsvR5MjSBCZjQR2Vg3R9YuMjFqNVKYzBjrpYC90aNc.eM8sr.23Du', 0),
(17, 'rajkumar', 'rao', '9812382880', 'bhunte@gmail.com', 'Bhunte', '$2y$10$EUZjv4Wf87qpE9w0dKSe/.UBtsirBRrIfplQ/dgiuke57liMOmxxa', 0),
(18, 'ram', 'tiwari', '9801234678', 'ramt@gmail.com', 'ramtiwari', '$2y$10$vwgiw9YmypXNU5.E9qUK7.1uq25udCpP.yUaH8OBMCBjiBxXEUcqm', 0),
(19, 'hari', 'sharma', '9819293949', 'hari@gmail.com', 'hari', '$2y$10$8x1fj65QW5xzrEuX0l8Cs.UacladpLftDsgn.F5Rx2cXS3DAo4eyi', 0),
(23, 'oham', 'shakya', '9865583801', 'ohamshakya40@gmail.com', 'oham', '$2y$10$V99f7yJkH0uMOImw4tWFuefzu7VuLyH/2uRZGiznAWz1eS2dtaNcq', 1),
(25, 'aayush', 'sapkota', '9810929938', 'aayush@gmail.com', 'aayush', '$2y$10$kr7/gfg089dEoJ.I/.1Qee229/FQWYDW0.2OvNvhcbxRzjYb7iRda', 0),
(35, 'rajesh', 'bhandari', '9847898478', 'rajesh@gmail.com', 'rajesh', '$2y$10$fbFZmEDYcXHYNUq3GxWFHecA4cYev/BCWnxJlTbLIHYnbMEYD.mim', 0),
(37, 'harry', 'khan', '9810405010', 'harry@gmail.com', 'harry', '$2y$10$zOI27tizS81OYiAXqxS9/u1csJ6Abuzww9MS75B8JJ8qEphmrtJmC', 0),
(38, 'sushant', 'kc', '9840509010', 'sushant@gmail.com', 'sushant', '$2y$10$wgoynq6ha/aEYHvqFORzM.F5esMobogcsNgFN2.HiW1gKvy.j6kRW', 0),
(39, 'sanjeev', 'shrestha', '9810556010', 'sanjeev@gmail.com', 'sanjeev', '$2y$10$1oF6rIDrvjqs5nz8zV6v8ec/HHaRdbdMKAclvJP/BhRNLQLPrleAS', 0),
(40, 'kapil', 'sharma', '9810503000', 'kapil@gmail.com', 'kapil_1', '$2y$10$t5BbN7AItGHaG6quZ/k73.yk.GGzjv60Cp1988sIXcfDOLx7KfBA.', 0),
(42, 'sujan', 'chand', '9810000999', 'sujan@gmail.com', 'sujan', '$2y$10$35le99TPBW29ByMwdrw2c.GHV8YBzDMdkxMnVxy7pjt3pMIfbyqzS', 0),
(43, 'shikha', 'sharma', '9812378945', 'shikha@gmail.com', 'shikha', '$2y$10$QZcoFTNA571HliCDRhBIxOG7QlwR0JLyVp5PUnTzBcvhUU9rile2e', 0),
(44, 'aayush', 'karki', '9812345670', 'aayush11@gmail.com', 'aayush@1', '$2y$10$1iuv8dt.Nhf/YINanbBJSe39N3fJbs1e5pe9IWiqxP49wWXYUsKwO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `vehicle_platenumber` int(10) UNSIGNED NOT NULL,
  `vehicle_category` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vehicle_platenumber`, `vehicle_category`, `vehicle_type`, `user_id`) VALUES
(27, 1020, 'two_wheeler', 'fz', 11),
(28, 2010, 'two_wheeler', 'mt', 19),
(29, 2455, 'two_wheeler', 'dio', 38),
(33, 5020, 'two_wheeler', 'ns', 39),
(34, 5010, 'two_wheeler', 'fz', 35),
(35, 4014, 'two_wheeler', 'shine', 35),
(36, 9080, 'four_wheeler', 'range rover', 40),
(37, 9999, 'two_wheeler', 'fz', 42),
(38, 1010, 'two_wheeler', 'ns', 42),
(39, 1111, 'four_wheeler', 'audi', 35),
(40, 10101, 'two_wheeler', 'car', 43),
(41, 1234, 'two_wheeler', 'bike', 43),
(42, 2020, 'two_wheeler', 'fz', 43),
(43, 4040, 'four_wheeler', 'range rover', 35),
(44, 5050, 'four_wheeler', 'audi', 35),
(45, 1122, 'two_wheeler', 'ns', 35),
(46, 1011, 'two_wheeler', 'bike', 35),
(48, 9911, 'two_wheeler', 'ns', 39),
(49, 1199, 'four_wheeler', 'polo', 39),
(50, 7755, 'two_wheeler', 'ns', 16),
(52, 9922, 'four_wheeler', 'alto', 38),
(53, 5524, 'four_wheeler', 'alto', 38),
(54, 4002, 'two_wheeler', 'ns', 39),
(55, 4004, 'four_wheeler', 'volkswagen', 39),
(56, 11, 'two_wheeler', 'ns', 35),
(57, 44, 'two_wheeler', 'bullet', 35),
(58, 55, 'two_wheeler', 'honda', 35),
(59, 66, 'two_wheeler', 'bike', 35),
(60, 1155, 'two_wheeler', 'fz', 35),
(61, 9112, 'four_wheeler', 'Supra', 44);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `parkingslot_id` (`parkingslot_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `lastname` (`lastname`) USING BTREE,
  ADD KEY `firstname` (`firstname`) USING BTREE;

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_platenumber` (`vehicle_platenumber`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parking`
--
ALTER TABLE `parking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `duration`
--
ALTER TABLE `duration`
  ADD CONSTRAINT `duration_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `duration_ibfk_2` FOREIGN KEY (`parkingslot_id`) REFERENCES `parking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `parking_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
