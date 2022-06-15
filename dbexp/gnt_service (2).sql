-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 08:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gnt_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `msg` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `direction` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`cid`, `sid`, `msg`, `time`, `direction`) VALUES
(12, 13, 'hi', '2022-06-13 12:38:36', 'stc'),
(12, 13, 'hi', '2022-06-13 12:41:47', 'stc'),
(12, 13, 'hi', '2022-06-13 12:41:54', 'stc');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `job_cat` varchar(30) NOT NULL,
  `job_tle` varchar(30) NOT NULL,
  `job_desp` longtext NOT NULL,
  `address` longtext NOT NULL,
  `pincode` int(6) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `work_done` int(1) NOT NULL DEFAULT 0,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `cid`, `job_cat`, `job_tle`, `job_desp`, `address`, `pincode`, `time`, `work_done`, `sid`) VALUES
(1, 12, 'Electrician', 'Moter malfunction', 'asdfadsfasdads', 'Panagarh', 713149, '2022-06-14 10:24:24', 0, 13),
(2, 12, 'Gardener', 'ake garden saaf kar de saiufhu', 'nali bhi saaf kar dena', 'Panagarh', 713149, '2022-06-14 10:45:59', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `s_type` varchar(30) NOT NULL,
  `bank_acc` int(18) NOT NULL,
  `ifsc_code` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `s_type`, `bank_acc`, `ifsc_code`) VALUES
(13, 'Electrician', 0, ''),
(11, 'Gardener', 0, ''),
(17, 'Carpenter', 0, ''),
(22, 'Painter', 0, ''),
(23, 'House cleaner', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `pwd` varchar(20) NOT NULL,
  `aadhaar` bigint(12) NOT NULL,
  `utype` varchar(20) NOT NULL,
  `verification` int(11) NOT NULL DEFAULT 0,
  `pfpic` varchar(30) NOT NULL DEFAULT './gnt_img/avatar.png',
  `address` longtext NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `email`, `dob`, `pwd`, `aadhaar`, `utype`, `verification`, `pfpic`, `address`, `pincode`) VALUES
(11, 'Farzana parveen ', 'female', 'farzana.bhelatand@gmail.com ', '2022-04-25', 'samsher1', 123456, 'service provider', 1, './gnt_img/avatar.png', '', 0),
(12, 'Rabi', 'male', 'rs7691884@gmail.com', '2022-04-16', '12345', 54548848, 'customer', 1, './gnt_img/img_12.png', 'Panagarh', 713149),
(13, 'Ashish Ranjan', 'male', 'ranjanashish692@gmail.com', '1998-05-03', 'Bihar@123', 2147483647, 'service provider', 1, './gnt_img/img_13.jpg', 'mera wala ya tera waala', 696969),
(17, 'Mota Bhai', 'male', 'sr5060il.13@gmail.com', '2022-05-26', '6as54d6a4wd6a1s5d1aw', 123, 'service provider', 1, './gnt_img/avatar.png', '', 0),
(21, 'Saeed-ul-muzaffar', 'male', 's.sayeedulalam786@gmail.com', '2022-05-06', 'sayzakra1@', 12345678910, 'customer', 1, './gnt_img/img_21.jpg', 'dhanbad', 828113),
(22, 'M A G I C Z G R E B', 'male', 's.sayeedulalam235@gmail.com', '1998-06-29', 'sayzakra1@', 1234567891234, 'service provider', 1, './gnt_img/img_22.jpg', '', 0),
(23, 'Rajnish Kumar ', 'male', 'rajnishraj6805@gmail.com', '2005-05-14', '8228894984', 1232253123652365, 'service provider', 1, './gnt_img/img_23.png', '', 0),
(24, 'Rajnish Kumar ', 'male', 'rajnish6805@gmail.com', '2001-06-13', '8228894984', 363696328576, 'customer', 1, './gnt_img/avatar.png', 'Durgapur ', 713212),
(27, 'Sweta kumari verma', 'female', 'swetaverma501@gmail.com', '2001-11-04', 'createpassword', 508040296020, 'service provider', 1, './gnt_img/avatar.png', 'bhelatand colony block v qtr no v -6', 828103);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD KEY `cid` (`cid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `id` (`cid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `aadhaar` (`aadhaar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `user` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `user` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
