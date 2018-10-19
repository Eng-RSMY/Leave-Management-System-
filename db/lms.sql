-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2017 at 03:23 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(110) NOT NULL,
  `password` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`, `email`) VALUES
('bob', '123', 'bob@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `eaf`
--

CREATE TABLE IF NOT EXISTS `eaf` (
  `e_id` varchar(100) NOT NULL,
  `s_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL,
  `l_s` varchar(100) NOT NULL,
  `fdate` date NOT NULL,
  `todate` date NOT NULL,
  `total` int(5) NOT NULL DEFAULT '5',
  `reqday` int(5) NOT NULL DEFAULT '5',
  `rem` int(5) NOT NULL DEFAULT '5',
  `flag` int(5) NOT NULL DEFAULT '1',
  `Status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `e_id` varchar(110) NOT NULL,
  `s_id` varchar(110) NOT NULL,
  `ename` varchar(110) NOT NULL,
  `designation` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`e_id`, `s_id`, `ename`, `designation`) VALUES
('1', '1', 'b', 'SE'),
('2', '2', 'Bob', 'SE'),
('3', '3', 'aa', 'CE');

-- --------------------------------------------------------

--
-- Table structure for table `es`
--

CREATE TABLE IF NOT EXISTS `es` (
  `e_id` varchar(100) NOT NULL,
  `s_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `l_s` varchar(100) NOT NULL,
  `f_da` date NOT NULL,
  `td` date NOT NULL,
  `reqday` int(5) NOT NULL,
  `rem` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `es`
--

INSERT INTO `es` (`e_id`, `s_id`, `name`, `l_s`, `f_da`, `td`, `reqday`, `rem`) VALUES
('1', '1', 'Bob', 'fullday', '2017-07-02', '2017-07-04', 2, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
