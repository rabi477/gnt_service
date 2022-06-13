-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 08:51 AM
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
(12, 13, 'ok', '2022-05-13 15:33:00', 'cts'),
(12, 13, 'Hi', '2022-06-09 09:00:21', 'cts'),
(12, 13, 'Hsb', '2022-06-09 09:00:25', 'cts'),
(12, 13, 'Jsjs', '2022-06-09 09:00:26', 'cts'),
(12, 13, 'Hshsh', '2022-06-09 09:00:27', 'cts'),
(12, 13, 'Hsh', '2022-06-09 09:00:40', 'cts'),
(12, 13, 'Hshs', '2022-06-09 09:00:40', 'cts'),
(12, 13, 'Hi', '2022-06-09 09:00:41', 'cts'),
(12, 13, 'Hi', '2022-06-09 09:00:52', 'cts'),
(12, 22, 'Hlo', '2022-06-13 05:49:54', 'stc'),
(12, 13, 'kitna doge', '2022-06-13 05:50:53', 'stc'),
(12, 22, 'Hli', '2022-06-13 05:53:39', 'stc'),
(12, 22, 'Hlo', '2022-06-13 05:53:42', 'stc'),
(12, 22, 'Hlo', '2022-06-13 05:53:48', 'stc'),
(12, 22, 'hi', '2022-06-13 05:54:48', 'cts'),
(21, 13, 'Hello brother', '2022-06-13 05:56:04', 'cts'),
(21, 13, 'I need an electrician', '2022-06-13 05:56:23', 'cts'),
(21, 13, 'bhej rahe ', '2022-06-13 06:07:30', 'stc'),
(21, 13, 'free me krega?', '2022-06-13 06:07:51', 'cts'),
(12, 13, 'hi', '2022-06-13 06:08:20', 'cts'),
(21, 13, 'phaar ke kaam karenge', '2022-06-13 06:19:57', 'stc'),
(12, 22, 'hogya kaam', '2022-06-13 06:20:13', 'stc'),
(12, 13, 'sirf hi se kaam nahi chalega', '2022-06-13 06:20:29', 'stc'),
(12, 13, 'Hi', '2022-06-13 06:34:15', 'cts'),
(12, 13, 'Kya kar rha hai', '2022-06-13 06:34:23', 'cts'),
(12, 11, 'Hi', '2022-06-13 06:48:36', 'stc'),
(12, 11, 'Hello', '2022-06-13 06:48:41', 'stc'),
(12, 11, 'hello', '2022-06-13 06:48:44', 'cts');

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
(3, 12, 'Electrician', 'Fan malfunction', 'ajgoajfj', 'Panagarh', 713149, '2022-06-13 06:20:09', 0, 13),
(4, 12, 'Painter', 'ghar paint karwna ', 'gafg', 'Panagarh', 713149, '2022-06-13 06:28:12', 0, 0),
(5, 21, 'Painter', 'nkbdsfkhdsabfensnsn', 'Vvivihwhsjjsjsj', 'Ycjnzn.bsbsns.  Anakak', 828113, '2022-06-13 06:16:45', 0, 0),
(6, 21, 'Electrician', 'fan kharab hogya', 'free me kr de bhai', 'dhanbad', 828113, '2022-06-13 06:19:29', 0, 13);

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
  `address` longtext NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `email`, `dob`, `pwd`, `aadhaar`, `utype`, `verification`, `pfpic`, `address`, `pincode`) VALUES
(11, 'Farzana parveen ', 'female', 'farzana.bhelatand@gmail.com ', '2022-04-25', 'samsher1', 123456, 'service provider', 1, './gnt_img/avatar.png', '', 0),
(12, 'Rabi', 'male', 'rs7691884@gmail.com', '2022-04-16', '12345', 54548848, 'customer', 1, './gnt_img/img_12.jpg', 'Panagarh', 713149),
(13, 'Ashish Ranjan', 'male', 'ranjanashish692@gmail.com', '1998-05-03', 'Bihar@123', 2147483647, 'service provider', 1, './gnt_img/img_13.jpg', 'mera wala ya tera waala', 696969),
(17, 'Mota Bhai', 'male', 'sr5060il.13@gmail.com', '2022-05-26', '6as54d6a4wd6a1s5d1aw', 123, 'service provider', 1, './gnt_img/avatar.png', '', 0),
(21, 'Saeed-ul-muzaffar', 'male', 's.sayeedulalam786@gmail.com', '2022-05-06', 'sayzakra1@', 12345678910, 'customer', 1, './gnt_img/img_21.jpg', 'dhanbad', 828113),
(22, 'M A G I C Z G R E B', 'male', 's.sayeedulalam235@gmail.com', '1998-06-29', 'sayzakra1@', 1234567891234, 'service provider', 1, './gnt_img/img_22.jpg', '', 0),
(23, 'Rajnish Kumar ', 'male', 'rajnishraj6805@gmail.com', '2005-05-14', 'Asus6805@', 1232253123652365, 'service provider', 1, './gnt_img/avatar.png', '', 0);

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
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
