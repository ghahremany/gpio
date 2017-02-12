-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2017 at 11:08 AM
-- Server version: 5.5.50-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `raspberry`
--

-- --------------------------------------------------------

--
-- Table structure for table `gpio`
--

CREATE TABLE IF NOT EXISTS `gpio` (
  `gpio_number` int(11) NOT NULL,
  `gpio_status` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gpio`
--

INSERT INTO `gpio` (`gpio_number`, `gpio_status`, `status`) VALUES
(5, 0, 'output'),
(3, 0, 'output'),
(7, 0, 'output'),
(8, 0, 'output'),
(10, 0, 'output'),
(11, 0, 'output'),
(12, 0, 'output'),
(13, 0, 'output'),
(15, 0, 'output'),
(16, 0, 'output'),
(18, 0, 'output'),
(19, 0, 'output'),
(21, 0, 'output'),
(22, 0, 'output'),
(23, 1, 'output'),
(24, 0, 'output'),
(26, 0, 'output'),
(27, 0, 'output'),
(28, 0, 'output'),
(29, 0, 'output'),
(31, 0, 'output'),
(32, 0, 'output'),
(33, 0, 'output'),
(35, 0, 'output'),
(36, 0, 'output'),
(37, 0, 'output'),
(38, 0, 'output'),
(40, 0, 'output');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gpio`
--
ALTER TABLE `gpio`
 ADD UNIQUE KEY `gpio_number` (`gpio_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
