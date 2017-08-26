-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2016 at 09:57 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `abc`(out pp INT)
BEGIN
	select count(*) into pp
    from userr;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p2`(inout ppl INT)
begin
	if(ppl<0)
    then set ppl= (-1)*ppl;
	end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pbms`(inout param1 int)
begin
   if(param1<1.5 && param1>.9) then
      update car
      set hourlyRate=hourlyRate*param1;
   end if;   
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc`(out `p1` INT(11) UNSIGNED)
    NO SQL
select count(*) INTO p1
from userr$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `sNo` int(32) NOT NULL DEFAULT '0',
  `auxCable` int(32) DEFAULT NULL,
  `umFlag` int(32) DEFAULT NULL,
  `modelName` varchar(45) DEFAULT NULL,
  `cType` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `hourlyRate` float DEFAULT NULL,
  `dailyRate` float DEFAULT NULL,
  `seatingCap` int(32) DEFAULT NULL,
  `transType` varchar(45) DEFAULT NULL,
  `loName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sNo`),
  KEY `loName` (`loName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`sNo`, `auxCable`, `umFlag`, `modelName`, `cType`, `color`, `hourlyRate`, `dailyRate`, `seatingCap`, `transType`, `loName`) VALUES
(1, 1, 0, 'Civic', 'Sedan', 'white', 5, 100, 5, 'Manual', 'Main Block'),
(2, 0, 1, 'Audi A5', 'Convertible', 'black', 20, 400, 4, 'Auto', 'Electrical Department'),
(3, 1, 0, 'Toyota APV', 'SUV', 'Silver', 8, 150, 8, 'Manual', 'Electrical Department'),
(4, 1, 0, 'Toyota Prius', 'Hybrid', 'Maron', 5, 100, 5, 'Auto', 'Car Parking'),
(5, 1, 0, 'Mercedes Benz', 'Sedan', 'Black', 15, 300, 4, 'Auto', 'Hostel'),
(6, 1, 1, 'Suzuki Cultus', 'Sedan', 'Silver', 3, 60, 5, 'Manual', 'Hostel'),
(7, 1, 0, 'Toyota Grande', 'Sedan', 'Black', 5, 100, 5, 'Manual', 'Electrical Department'),
(8, 0, 0, 'High roof Euro  ', 'SUV', 'White', 10, 200, 16, 'Manual', 'Bus Stand'),
(9, 0, 1, 'Mazda RX-8', 'Sports', 'Black', 25, 500, 4, 'Auto', 'Electrical Department'),
(10, 1, 0, 'BMW M3', 'sports', 'Blue', 25, 500, 2, 'Auto', 'Hostel'),
(11, 1, 0, 'RV Lemon Law', 'SUV', 'Choclate', 50, 1000, 5, 'Manual', 'Main Block'),
(12, 1, 0, 'Audi A5', 'Sedan', 'Black', 40, 800, 4, 'Auto', 'Car Parking');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE IF NOT EXISTS `credit_card` (
  `cardNo` int(45) NOT NULL,
  `NameOnCard` varchar(45) DEFAULT NULL,
  `CVV` int(32) DEFAULT NULL,
  `expiryDate` datetime DEFAULT NULL,
  `billingAddress` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cardNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`cardNo`, `NameOnCard`, `CVV`, `expiryDate`, `billingAddress`) VALUES
(0, '		', 0, '0000-00-00 00:00:00', '		'),
(123, '	Emad			', 1223, '2015-12-03 00:00:00', '				'),
(12345, 'Usman Nigh', 98765, '2018-12-23 00:00:00', 'abc'),
(24234, '	saqib	', 35456456, '2016-12-13 00:00:00', '		raasfa'),
(123421, '		afs', 0, '0000-00-00 00:00:00', 'sg');

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

-- --------------------------------------------------------

--
-- Table structure for table `ex_time`
--

CREATE TABLE IF NOT EXISTS `ex_time` (
  `username` varchar(45) NOT NULL DEFAULT '',
  `pickDateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `retDateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `extTime` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`username`,`pickDateTime`,`retDateTime`,`extTime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `loName` varchar(45) NOT NULL DEFAULT '',
  `capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`loName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loName`, `capacity`) VALUES
('Bus Stand', 8),
('Car Parking', 10),
('Electrical Department', 4),
('Hostel', 14),
('Main Block', 5);

-- --------------------------------------------------------

--
-- Table structure for table `man_req`
--

CREATE TABLE IF NOT EXISTS `man_req` (
  `username` varchar(45) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sNo` int(32) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sNo`,`date_time`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `man_req`
--

INSERT INTO `man_req` (`username`, `date_time`, `sNo`) VALUES
('abbas', '2015-04-13 04:24:13', 3),
('hassan', '2015-02-01 09:05:33', 6),
('hassan', '2015-03-31 19:00:21', 9),
('nasir', '2015-03-09 04:34:14', 2),
('nasir', '2015-05-18 12:34:19', 4),
('nasir', '2015-05-18 12:34:27', 4),
('zara', '2015-05-03 05:14:31', 2),
('zara', '2015-04-13 04:09:14', 6),
('zara', '2015-02-23 00:00:00', 9);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ml`
--
CREATE TABLE IF NOT EXISTS `ml` (
`username` varchar(45)
,`lateFee` float
,`loName` varchar(45)
,`pickDateTime` datetime
,`retDateTime` datetime
,`estCost` float
,`lateBy` time
,`retStatus` int(32)
,`sNo` int(32)
,`a` bigint(21)
,`monthname(pickDateTime)` varchar(9)
);
-- --------------------------------------------------------

--
-- Table structure for table `prob`
--

CREATE TABLE IF NOT EXISTS `prob` (
  `sNo` int(32) NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `problem` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`sNo`,`date_time`,`problem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prob`
--

INSERT INTO `prob` (`sNo`, `date_time`, `problem`) VALUES
(2, '2015-03-09 04:34:14', 'Crank shaft is cracked.'),
(2, '2015-05-03 05:14:31', 'Gears need replacement. Fuel injector''s controller burnt down.'),
(3, '2015-04-13 04:24:13', 'All tyres need repair. Break leathers are out dated.'),
(4, '2015-05-18 12:34:19', '  asfd'),
(4, '2015-05-18 12:34:27', '  sdfasd'),
(6, '2015-02-01 09:05:33', 'Met a severe Accident. Complete body transform required.'),
(6, '2015-04-13 04:09:14', 'Door glass broken at back left.'),
(9, '2015-02-23 00:00:00', 'Fuel tank leaks.'),
(9, '2015-03-31 19:00:21', 'Gear box is out of order. ');

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
('abbas', NULL, 'Main Block', '2015-01-09 00:00:00', '2015-01-11 00:00:00', 200, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE IF NOT EXISTS `table1` (
  `idtable1` int(11) NOT NULL,
  PRIMARY KEY (`idtable1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('abbas', 'abbas', 'abbas@gmai', NULL, NULL, NULL, NULL, NULL, 2, 'fd', NULL),
('abubakar', 'abubakar', 'abubakar@g', NULL, NULL, NULL, NULL, NULL, 3, 'od', NULL),
('ali', 'ali', 'ali@gmail', NULL, NULL, NULL, NULL, NULL, 3, 'od', NULL),
('asad', 'asad', 'asad@gmail', NULL, NULL, NULL, NULL, NULL, 1, 'fd', NULL),
('asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
('fatima', 'fatima', 'fatima@gma', NULL, NULL, NULL, NULL, NULL, 1, 'fd', NULL),
('haris', 'haris', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
('hassan', 'hassan', 'hassan@gma', NULL, NULL, NULL, NULL, NULL, 2, 'od', NULL),
('ifrah', 'abc', 'dsagadd', 'safs', '		ifrah', '	sadf', 'saf', 0, 3, 'od', 123421),
('james', 'james', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
('kamran', 'kamran', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
('khawaja', 'khawaja', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'fd', NULL),
('nasir', 'nasir', 'nasir@gmai', NULL, NULL, NULL, NULL, NULL, 2, 'od', NULL),
('saqib', 'saqib', '		saqibahmed515@gmail.com', '		', '	Saqib	', '		', 'Ahmed', 2147483647, 3, 'fd', 24234),
('umar', 'umar', 'umar@gmail', NULL, NULL, NULL, NULL, NULL, 3, 'dd', NULL),
('usman', 'usman', 'usn@gmail', 'abc', 'Usman', 'Nigham', 'Rana', 2147483647, 3, 'dd', 12345),
('zara', 'zara', 'zara@gmail', NULL, NULL, NULL, NULL, NULL, 2, 'fd', NULL);

-- --------------------------------------------------------

--
-- Structure for view `ml`
--
DROP TABLE IF EXISTS `ml`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ml` AS select `reservation`.`username` AS `username`,`reservation`.`lateFee` AS `lateFee`,`reservation`.`loName` AS `loName`,`reservation`.`pickDateTime` AS `pickDateTime`,`reservation`.`retDateTime` AS `retDateTime`,`reservation`.`estCost` AS `estCost`,`reservation`.`lateBy` AS `lateBy`,`reservation`.`retStatus` AS `retStatus`,`reservation`.`sNo` AS `sNo`,count(0) AS `a`,monthname(`reservation`.`pickDateTime`) AS `monthname(pickDateTime)` from `reservation` group by monthname(`reservation`.`pickDateTime`),`reservation`.`loName`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`loName`) REFERENCES `location` (`loName`);

--
-- Constraints for table `ex_time`
--
ALTER TABLE `ex_time`
  ADD CONSTRAINT `ex_time_ibfk_1` FOREIGN KEY (`username`, `pickDateTime`, `retDateTime`) REFERENCES `reservation` (`username`, `pickDateTime`, `retDateTime`);

--
-- Constraints for table `man_req`
--
ALTER TABLE `man_req`
  ADD CONSTRAINT `man_req_ibfk_1` FOREIGN KEY (`username`) REFERENCES `userr` (`username`),
  ADD CONSTRAINT `man_req_ibfk_2` FOREIGN KEY (`sNo`) REFERENCES `car` (`sNo`);

--
-- Constraints for table `prob`
--
ALTER TABLE `prob`
  ADD CONSTRAINT `prob_ibfk_1` FOREIGN KEY (`sNo`, `date_time`) REFERENCES `man_req` (`sNo`, `date_time`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`loName`) REFERENCES `location` (`loName`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`sNo`) REFERENCES `car` (`sNo`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`username`) REFERENCES `userr` (`username`);

--
-- Constraints for table `userr`
--
ALTER TABLE `userr`
  ADD CONSTRAINT `userr_ibfk_1` FOREIGN KEY (`pType`) REFERENCES `driving_plan` (`pType`),
  ADD CONSTRAINT `userr_ibfk_2` FOREIGN KEY (`cardNo`) REFERENCES `credit_card` (`cardNo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
