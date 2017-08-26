-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2015 at 12:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cre`
--

-- --------------------------------------------------------

--
-- Table structure for table `driving_plan`
--

CREATE TABLE IF NOT EXISTS `driving_plan` (
  `pType` varchar(45) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `annual_fee` float DEFAULT NULL,
  `Monthly_payment` float DEFAULT NULL,
  PRIMARY KEY (`pType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driving_plan`
--

INSERT INTO `driving_plan` (`pType`, `discount`, `annual_fee`, `Monthly_payment`) VALUES
('dd', 15, NULL, 100),
('fd', 10, NULL, 60),
('od', NULL, 50, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
