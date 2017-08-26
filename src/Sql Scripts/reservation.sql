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
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `username` varchar(45) NOT NULL DEFAULT '',
  `lateFee` float DEFAULT NULL,
  `loName` varchar(45) DEFAULT NULL,
  `pickDateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `retDateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estCost` float DEFAULT NULL,
  `lateBy` time DEFAULT NULL,
  `retStatus` int(32) DEFAULT NULL,
  `sNo` int(32) DEFAULT NULL,
  PRIMARY KEY (`username`,`pickDateTime`,`retDateTime`),
  KEY `loName` (`loName`),
  KEY `sNo` (`sNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`username`, `lateFee`, `loName`, `pickDateTime`, `retDateTime`, `estCost`, `lateBy`, `retStatus`, `sNo`) VALUES
('abbas', NULL, 'Main Block', '2015-01-09 00:00:00', '2015-01-11 00:00:00', 200, NULL, 1, 1),
('abbas', NULL, 'Electrical Department', '2015-04-29 00:00:00', '2015-05-01 00:00:00', 300, NULL, 1, 3),
('ali', NULL, 'Car Parking', '2015-03-01 00:00:00', '2015-03-03 00:00:00', 1000, NULL, 1, 10),
('ali', NULL, 'Main Block', '2015-03-03 00:00:00', '2015-03-05 00:00:00', 2000, NULL, 1, 11),
('hassan', NULL, 'Car Parking', '2015-03-19 00:00:00', '2015-03-20 00:00:00', 100, NULL, 1, 7),
('hassan', NULL, 'Boy''s Hostel', '2015-05-10 00:00:00', '2015-05-12 00:00:00', 120, NULL, 1, 6),
('nasir', 0, 'Electrical Department', '2015-01-03 12:30:00', '2015-01-04 12:30:00', 400, NULL, 1, 2),
('nasir', NULL, 'Boy''s Hostel', '2015-01-06 01:00:00', '2015-01-07 05:00:00', 360, NULL, 1, 5),
('umar', NULL, 'Main Block', '2015-01-03 00:00:00', '2015-01-04 00:00:00', 100, NULL, 1, 1),
('umar', NULL, 'Boy''s Hostel', '2015-03-09 00:00:00', '2015-03-10 00:00:00', 300, NULL, 1, 5),
('usman', NULL, 'Electrical Department', '2015-02-02 15:00:00', '2015-02-03 15:00:00', 500, NULL, 1, 9),
('usman', NULL, 'Electrical Department', '2015-02-11 00:00:00', '2015-02-12 00:00:00', 400, NULL, 1, 2),
('zara', NULL, 'Electrical Department', '2015-01-02 00:00:00', '2015-01-03 00:00:00', 150, NULL, 1, 3),
('zara', NULL, 'Main Block', '2015-01-03 00:00:00', '2015-01-05 00:00:00', 2000, NULL, 1, 11);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`loName`) REFERENCES `location` (`loName`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`sNo`) REFERENCES `car` (`sNo`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`username`) REFERENCES `userr` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
