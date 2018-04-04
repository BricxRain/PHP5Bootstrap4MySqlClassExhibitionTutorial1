-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2018 at 07:16 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `lib_city`
--

DROP TABLE IF EXISTS `lib_city`;
CREATE TABLE IF NOT EXISTS `lib_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `city_code` varchar(255) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_city`
--

INSERT INTO `lib_city` (`id`, `province_id`, `city_id`, `city_code`, `city_name`) VALUES
(1, 1, 1, 'PAGSANJAN', 'PAGSANJAN'),
(2, 1, 2, 'STA CRUZ', 'STA CRUZ'),
(3, 1, 3, 'BAY', 'BAY'),
(4, 3, 4, 'LIPA', 'LIPA'),
(5, 3, 5, 'NASUGBU', 'NASUGBU'),
(6, 3, 6, 'TALISAY', 'TALISAY'),
(7, 2, 7, 'TANZA', 'TANZA'),
(8, 2, 8, 'SILANG', 'SILANG'),
(9, 2, 9, 'KAWIT', 'KAWIT');

-- --------------------------------------------------------

--
-- Table structure for table `lib_province`
--

DROP TABLE IF EXISTS `lib_province`;
CREATE TABLE IF NOT EXISTS `lib_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) DEFAULT NULL,
  `province_code` varchar(255) DEFAULT NULL,
  `province_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_province`
--

INSERT INTO `lib_province` (`id`, `province_id`, `province_code`, `province_name`) VALUES
(1, 1, 'LAGUNA', 'LAGUNA'),
(2, 2, 'CAVITE', 'CAVITE'),
(3, 3, 'BATANGAS', 'BATANGAS');

-- --------------------------------------------------------

--
-- Table structure for table `lib_users`
--

DROP TABLE IF EXISTS `lib_users`;
CREATE TABLE IF NOT EXISTS `lib_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `province_id` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_users`
--

INSERT INTO `lib_users` (`id`, `user_id`, `username`, `password`, `firstname`, `lastname`, `gender`, `address`, `province_id`, `city_id`) VALUES
(3, 3, 'bricx', '123456', 'Bricx', 'Carasco', '0', 'Pagsanjan Laguna', '1', '1'),
(5, NULL, 'rain', '123456', 'Rain', 'Han', '0', 'Maulwain', '1', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
