-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 21, 2020 at 04:19 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divergent_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_Name` varchar(20) NOT NULL,
  `last_Name` varchar(20) NOT NULL,
  `mobile_Num` varchar(10) NOT NULL,
  `it_Num` varchar(10) NOT NULL,
  `degree_Type` varchar(100) NOT NULL,
  `year` varchar(15) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `verification_status` int(11) NOT NULL,
  `verification_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `filepath` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_Name`, `last_Name`, `mobile_Num`, `it_Num`, `degree_Type`, `year`, `semester`, `email`, `password`, `verification_status`, `verification_id`, `otp`, `filepath`) VALUES
(18, 'kamal', 'perera', '0713428912', 'it19776774', 'kavinda', '2019', 'semester1', 'kavindaperera111@gmail.com', '12345678', 1, 1, 0, 'images/xo.png'),
(19, 'romal', 'j28', '0713428912', 'it19776774', 'noDegree', '2020', 'jan', 'kamalperera123@gmail.com', '12345678', 1, 0, 1, '0'),
(20, 'ahmed', 'yusuf', '0713428111', 'it19776774', 'no degree', 'no year', 'no sem', 'noemail', '12345678', 1, 1, 0, 'images/xo.png'),
(16, 'kavi', 'perera', '0713428912', 'it19776774', 'no deg', 'year 1', ' sem 1', 'kavindaperera525@gmail.com', '12345678', 1, 2323, 0, 'images/xo.png'),
(17, 'ravi', 'sz', '0713428912', 'it19776775', 'a', 'year 3', ' sem2 ', 'kavindaperera25@gmail.com', '12345678', 1, 2323, 0, 'images/xo.png'),
(21, 'Ahmed', 'test1', '0779867567', 'IT20675467', 'B.Sc. (Hons) Computer Networking (UOB)', 'Year 02', 'Semster 02', 'kavindaperera500@gmail.com', '12345678', 1, 491953597, 0, 'images/user.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
