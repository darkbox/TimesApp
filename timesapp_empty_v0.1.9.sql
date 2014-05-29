-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2014 at 06:12 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timesapp`
--
CREATE DATABASE IF NOT EXISTS `timesapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `timesapp`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `contact_name` varchar(80) DEFAULT NULL,
  `address` text,
  `city` varchar(30) DEFAULT NULL,
  `zip_code` int(9) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `vat_number` varchar(20) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE IF NOT EXISTS `hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hours` decimal(10,2) NOT NULL,
  `billed` tinyint(1) NOT NULL DEFAULT '0',
  `note` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT '0',
  `client_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `status` int(2) NOT NULL,
  `due` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL DEFAULT '0',
  `currency_symbol` varchar(5) DEFAULT NULL,
  `currency_code` varchar(3) DEFAULT NULL,
  `discount` double DEFAULT '0',
  `terms` text,
  `note` text,
  `invoice_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `display_country` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `lines`
--

CREATE TABLE IF NOT EXISTS `lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `type` int(2) NOT NULL,
  `code` varchar(60) NOT NULL,
  `description` text,
  `rate` double NOT NULL,
  `amount_hours` float DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(60) NOT NULL,
  `status` int(1) NOT NULL,
  `description` text NOT NULL,
  `unit_price` double NOT NULL,
  `tax_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(120) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `description` text,
  `client_id` int(11) NOT NULL,
  `init_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `estimate_time` time DEFAULT NULL,
  `estimate_price` double DEFAULT NULL,
  `billable` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(60) NOT NULL,
  `status` int(1) NOT NULL,
  `description` text NOT NULL,
  `rate` double NOT NULL,
  `tax_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE IF NOT EXISTS `taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(120) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `rate` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `role` enum('overlord','minion') NOT NULL,
  `status` int(1) NOT NULL,
  `tokenhash` varchar(300) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `tokenhash`, `created`, `modified`) VALUES
(11, 'Administrator', 'admin@timesapp.com', '951615e7643665a64a48aa9c11db92321c5e9171', 'overlord', 1, '', '2014-05-29 18:08:27', '2014-05-29 18:11:34');

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Check_due_invoices` ON SCHEDULE EVERY 1 DAY STARTS '2014-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `invoices` SET `status` = 5 WHERE `status` < 3 AND `due_date` > CURDATE()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET GLOBAL event_scheduler = ON;
