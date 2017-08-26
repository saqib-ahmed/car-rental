-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2015 at 12:33 PM
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
-- Table structure for table `userr`
--

CREATE TABLE IF NOT EXISTS `userr` (
  `username` varchar(45) NOT NULL DEFAULT '',
  `pasword` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `midInit` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `phone` int(40) DEFAULT NULL,
  `Uflag` int(40) DEFAULT NULL,
  `pType` varchar(10) DEFAULT NULL,
  `cardNo` int(40) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `pType` (`pType`),
  KEY `cardNo` (`cardNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`username`, `pasword`, `email`, `address`, `firstName`, `midInit`, `lastName`, `phone`, `Uflag`, `pType`, `cardNo`) VALUES
('abbas', 'abbas', 'abbas@gmai', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
('abubakar', 'abubakar', 'abubakar@g', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
('ali', 'ali', 'ali@gmail', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
('asad', 'asad', 'asad@gmail', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
('fatima', 'fatima', 'fatima@gma', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
('hassan', 'hassan', 'hassan@gma', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
('khawaja', 'khawaja', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
('nasir', 'nasir', 'nasir@gmai', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
('umar', 'umar', 'umar@gmail', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
('usman', 'usman', 'usn@gmail', 'abc', 'Usman', 'Nigham', 'Rana', 2147483647, 3, 'dd', 12345),
('zara', 'zara', 'zara@gmail', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userr`
--
ALTER TABLE `userr`
  ADD CONSTRAINT `userr_ibfk_1` FOREIGN KEY (`pType`) REFERENCES `driving_plan` (`pType`),
  ADD CONSTRAINT `userr_ibfk_2` FOREIGN KEY (`cardNo`) REFERENCES `credit_card` (`cardNo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
