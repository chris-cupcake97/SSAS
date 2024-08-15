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
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `postId` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `year` varchar(15) NOT NULL,
  `sem` varchar(15) NOT NULL,
  `dateTime` varchar(35) NOT NULL,
  `imagePath` varchar(500) NOT NULL,
  `videoPath` varchar(500) NOT NULL,
  PRIMARY KEY (`postId`)
) ENGINE=MyISAM AUTO_INCREMENT=255 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `title`, `email`, `year`, `sem`, `dateTime`, `imagePath`, `videoPath`) VALUES
(252, 'Post', 'kavindaperera525@gmail.com', 'Year 01', 'Semster 01', '2020-09-21 10:31:03am', 'uploads/Arrival3.jpeg', '0'),
(253, 'Post 2', 'kavindaperera525@gmail.com', 'Year 02', 'Semster 02', '2020-09-21 10:31:22am', 'uploads/Arrival5.jpeg', '0'),
(254, 'kamal', 'kavindaperera111@gmail.com', 'Year 02', 'Semster 02', '2020-09-21 11:17:08am', 'uploads/Accessories1.jpg', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
