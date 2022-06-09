-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 08:48 AM
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
(12, 13, 'hi', '2022-05-13 15:30:44', 'cts'),
(12, 11, 'hi', '2022-05-13 15:31:01', 'cts'),
(12, 23, 'hi', '2022-05-13 15:31:11', 'cts'),
(12, 17, 'hello', '2022-05-13 15:31:23', 'cts'),
(12, 22, 'hi', '2022-05-13 15:31:30', 'cts'),
(12, 13, 'Rabi Daa', '2022-05-13 15:31:40', 'stc'),
(12, 13, 'ghar ake pankha thik kar', '2022-05-13 15:31:59', 'cts'),
(12, 13, 'bta kitna lega', '2022-05-13 15:32:03', 'cts'),
(12, 13, '20-25 bs', '2022-05-13 15:32:42', 'stc'),
(12, 13, 'ok', '2022-05-13 15:33:00', 'cts');

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
  `address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `cid`, `job_cat`, `job_tle`, `job_desp`, `address`) VALUES
(1, 12, 'Electrician', 'fan malfunction', 'jgjafjalj aghasljf', '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `s_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `s_type`) VALUES
(13, 'Electrician'),
(11, 'Gardener'),
(17, 'Carpenter'),
(22, 'Painter'),
(23, 'House cleaner');

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
  `address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `email`, `dob`, `pwd`, `aadhaar`, `utype`, `verification`, `pfpic`, `address`) VALUES
(11, 'Farzana parveen ', 'female', 'farzana.bhelatand@gmail.com ', '2022-04-25', 'samsher1', 123456, 'service provider', 1, './gnt_img/avatar.png', ''),
(12, 'Rabi', 'male', 'rs7691884@gmail.com', '2022-04-16', '12345', 54548848, 'customer', 1, './gnt_img/img_12.png', ''),
(13, 'Ashish Ranjan', 'male', 'ranjanashish692@gmail.com', '1998-05-03', 'Bihar@123', 2147483647, 'service provider', 1, './gnt_img/img_13.jpg', ''),
(17, 'Mota Bhai', 'male', 'sr5060il.13@gmail.com', '2022-05-26', '6as54d6a4wd6a1s5d1aw', 123, 'service provider', 1, './gnt_img/avatar.png', ''),
(21, 'magiczgreb', 'male', 's.sayeedulalam786@gmail.com', '2022-05-06', 'sayzakra1@', 12345678910, 'customer', 1, './gnt_img/avatar.png', ''),
(22, 'M A G I C Z G R E B', 'male', 's.sayeedulalam235@gmail.com', '1998-06-29', 'sayzakra1@', 1234567891234, 'service provider', 1, './gnt_img/avatar.png', ''),
(23, 'Rajnish Kumar ', 'male', 'rajnishraj6805@gmail.com', '2005-05-14', 'Asus6805@', 1232253123652365, 'service provider', 1, './gnt_img/avatar.png', '');

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
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
