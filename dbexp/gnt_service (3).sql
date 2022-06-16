-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 05:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
(12, 13, 'hi', '2022-06-13 12:41:54', 'stc'),
(12, 27, 'hi', '2022-06-16 14:35:58', 'cts'),
(12, 27, 'hello', '2022-06-16 14:40:43', 'stc'),
(12, 11, 'hi', '2022-06-16 14:53:38', 'cts');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
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
(3, 24, 'Electrician', '', '', 'Durgapur ', 713212, '2022-06-16 14:28:06', 0, 0),
(4, 12, 'Gardener', 'Clean my garden', 'clean garden properly', 'Durgapur', 713212, '2022-06-16 14:46:37', 0, 0),
(5, 12, 'Plumber', 'nul kharab', 'Please ake thik kar do', 'Durgapur', 713212, '2022-06-16 14:48:53', 0, 27),
(6, 12, 'Gardener', 'Pudha lagana hai', '', 'Durgapur', 713212, '2022-06-16 14:53:29', 0, 11),
(7, 12, 'Electrician', 'Fan malfunction', 'fan not working', 'Durgapur', 713212, '2022-06-16 14:56:37', 0, 0);

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
(11, 'Gardener', 2147483647, 'SBIN0008749'),
(17, 'Carpenter', 0, ''),
(22, 'Painter', 0, ''),
(23, 'House cleaner', 2147483647, 'SBIN0006562'),
(27, 'plumber', 0, '');

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
(1, 'admin', 'male', 'admin@gntservice.com', '2022-06-08', 'admin@123', 46644944665446, 'admin', 1, './gnt_img/avatar.png', 'NA', 0),
(11, 'Farzana parveen ', 'female', 'farzana.bhelatand@gmail.com ', '2022-04-25', 'samsher1', 123456, 'service provider', 1, './gnt_img/img_11.jpeg', 'Durgapur', 713212),
(12, 'Rabi Kumar Singh', 'male', 'rs7691884@gmail.com', '2022-04-16', '12345', 54548848, 'customer', 1, './gnt_img/img_12.jpeg', 'Durgapur', 713212),
(13, 'Ashish Ranjan', 'male', 'ranjanashish692@gmail.com', '1998-05-03', 'Bihar@123', 2147483647, 'service provider', 1, './gnt_img/img_13.jpg', 'mera wala ya tera waala', 713212),
(17, 'Mota Bhai', 'male', 'sr5060il.13@gmail.com', '2022-05-26', '6as54d6a4wd6a1s5d1aw', 123, 'service provider', 1, './gnt_img/avatar.png', '', 0),
(21, 'Saeed-ul-muzaffar', 'male', 's.sayeedulalam786@gmail.com', '2022-05-06', 'sayzakra1@', 12345678910, 'customer', 1, './gnt_img/img_21.jpg', 'dhanbad', 828113),
(22, 'M A G I C Z G R E B', 'male', 's.sayeedulalam235@gmail.com', '1998-06-29', 'sayzakra1@', 1234567891234, 'service provider', 1, './gnt_img/img_22.jpeg', '', 0),
(23, 'Rajnish Kumar ', 'male', 'rajnishraj6805@gmail.com', '2005-05-14', 'Shine1375@', 1232253123652365, 'service provider', 1, './gnt_img/img_23.jpg', '', 713212),
(24, 'Rajnish Kumar ', 'male', 'rajnish6805@gmail.com', '2001-06-13', 'Shine1375@', 363696328576, 'customer', 1, './gnt_img/img_24.jpg', 'Durgapur', 713212),
(27, 'Sweta kumari verma', 'female', 'swetaverma501@gmail.com', '2001-11-04', 'createpassword', 508040296020, 'service provider', 1, './gnt_img/img_27.jpg', 'Durgapur', 713212),
(28, 'DEEPAK RAJBHAR', 'male', 'drajbhar031@gmail.com', '2002-10-02', 'Nshm@123', 12345678912, 'customer', 1, './gnt_img/avatar.png', 'jamadoba ,dhanbad', 828112);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
