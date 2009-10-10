-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2009 at 09:58 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lorb`
--

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `com_id` int(11) NOT NULL auto_increment,
  `com_name` varchar(40) NOT NULL,
  PRIMARY KEY  (`com_id`),
  UNIQUE KEY `com_name` (`com_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`com_id`, `com_name`) VALUES
(1, 'blog'),
(2, 'error404');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_id` int(11) NOT NULL auto_increment,
  `com_id` int(11) NOT NULL,
  `pattern` varchar(50) NOT NULL,
  PRIMARY KEY  (`route_id`),
  UNIQUE KEY `pattern` (`pattern`),
  KEY `FK_routes_com_id` (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`route_id`, `com_id`, `pattern`) VALUES
(1, 1, '/^(?P<comp>\\w+)\\/(?P<id>\\d+)\\/(?P<action>\\w+)$/'),
(2, 1, '/^blog\\/(?P<view>\\d+)$/');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `FK_routes_com_id` FOREIGN KEY (`com_id`) REFERENCES `components` (`com_id`);
