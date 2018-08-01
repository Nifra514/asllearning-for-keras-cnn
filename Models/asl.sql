-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2018 at 04:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asl`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_details`
--

CREATE TABLE `log_details` (
  `l_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `data` varchar(1000) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `risk` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `tp_no` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`u_id`, `u_name`, `email_id`, `tp_no`, `username`, `password`, `user_type`, `token`, `date`) VALUES
(0, 'System', NULL, NULL, 'System', NULL, 'system', NULL, NULL),
(1, 'Mohamed Nifras', 'nifras.ict@gmail.com', 777203595, 'qweqwe', 'cbce932a80afe0b858a6b72320a00ccd', 'admin', '3415547191b28d4d71e69dcc4530f4e60f9b0d85', '2018-03-18 12:27:08'),
(2, 'Pathum', 'Pathum@gmail.com', 1234567009, 'asdasd', 'a8f5f167f44f4964e6c998dee827110c', 'user', 'a56d10d5da923872fd85234bbbf802500ffff361', '2018-04-02 00:02:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_details`
--
ALTER TABLE `log_details`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `u_id_idx` (`u_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_details`
--
ALTER TABLE `log_details`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_details`
--
ALTER TABLE `log_details`
  ADD CONSTRAINT `u_id` FOREIGN KEY (`u_id`) REFERENCES `user_details` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
