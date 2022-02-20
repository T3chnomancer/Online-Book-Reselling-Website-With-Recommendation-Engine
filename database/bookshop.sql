-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2021 at 08:13 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Aid` int(5) NOT NULL AUTO_INCREMENT,
  `Aname` varchar(50) NOT NULL,
  `Aemail` varchar(50) NOT NULL,
  `Apwd` varchar(15) NOT NULL,
  `Amob` varchar(15) NOT NULL,
  PRIMARY KEY (`Aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `Aname`, `Aemail`, `Apwd`, `Amob`) VALUES
(4, 'aaa', 'aaa@aaa.in', 'aaa', 'aaa'),
(12, 'asdasd', 'asdsa@asdf.in', 'aaaaa', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `bookcart`
--

CREATE TABLE IF NOT EXISTS `bookcart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `cdatetime` datetime NOT NULL,
  `border` varchar(20) NOT NULL,
  `Shipinginfo` text NOT NULL,
  `Shipingdt` varchar(30) NOT NULL,
  `ordercomplit` varchar(5) NOT NULL,
  `orderdt` varchar(30) NOT NULL,
  `OrderEnd` varchar(5) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `bookcart`
--

INSERT INTO `bookcart` (`cid`, `uid`, `bid`, `cdatetime`, `border`, `Shipinginfo`, `Shipingdt`, `ordercomplit`, `orderdt`, `OrderEnd`) VALUES
(24, 7, 5, '2020-04-24 23:31:57', '71587877380', 'ad sf', '29/04/2020, 10:15:00', 'y', '28-Apr-2020 09:57:59', 'y'),
(25, 7, 6, '2020-04-24 23:33:19', '71587877380', 'sd fds sdf', '28-Apr-2020 09:54:52', 'y', '28-Apr-2020 09:58:00', 'y'),
(26, 7, 7, '2020-04-24 23:33:38', '71587877380', '', '', '', '', ''),
(27, 7, 6, '2020-04-24 23:36:56', '71587877382', '', '', '', '', ''),
(28, 7, 5, '2020-04-24 23:37:41', '71587877382', '', '29/04/2020, 10:14:38', 'y', '', ''),
(29, 7, 5, '2020-05-02 20:29:17', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bookinfo`
--

CREATE TABLE IF NOT EXISTS `bookinfo` (
  `Bid` int(10) NOT NULL AUTO_INCREMENT,
  `Uid` int(10) NOT NULL,
  `BName` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Publishers` varchar(50) NOT NULL,
  `Btype` varchar(50) NOT NULL,
  `APrice` int(10) NOT NULL,
  `SPrice` int(10) NOT NULL,
  `Information` text NOT NULL,
  `imgpath` text NOT NULL,
  `vcount` int(10) NOT NULL,
  PRIMARY KEY (`Bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bookinfo`
--

INSERT INTO `bookinfo` (`Bid`, `Uid`, `BName`, `Author`, `Publishers`, `Btype`, `APrice`, `SPrice`, `Information`, `imgpath`, `vcount`) VALUES
(5, 7, 'f sdf', 'sdfsdf', 'sdfdsf', 'Horror', 500, 500, 'sdf sdf', '2020_02_29_16_55_33_logo.png', 0),
(6, 7, 'asdas', 'asfas', 'asf', 'History', 500, 260, 'asfasf', '2020_02_29_16_58_37_logo.png', 0),
(7, 9, 'abcd', 'pqr', 'pqr', 'Horror', 500, 400, 'sada asd', '2020_03_01_14_44_59_sp.PNG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE IF NOT EXISTS `user_reg` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`uid`, `Name`, `Email`, `Mobile`, `Gender`, `Password`, `Address`) VALUES
(7, 'rohan', 'rohan@gmail.com', '7412589630', 'M', 'aaa', 'asd asd '),
(8, 'rohan', 'rohan142@gmail.com', '7845123690', 'F', 'aaa', 'asd asd '),
(13, 'asfas sdf', 'rohan1@gmail.com', '7896541230', 'M', 'aaa', 'asdsad');
