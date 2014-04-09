-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2014 at 05:35 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `contact_name`, `address`, `city`, `zip_code`, `country`, `state`, `phone_number`, `mobile_number`, `tax_id`, `language`, `vat_number`, `status`, `created`, `modified`) VALUES
(1, 'NoTime S.L', 'contact@notime.es', 'Rafael García', 'C. inventada nº13', 'Córdoba', 14000, 'España', 'Andalucía', '555 67 89 53', '659 89 54 63', 6, 'Spanish', 'VAT NUMBER', 1, '2014-04-08 17:10:05', '2014-04-08 17:10:05'),
(2, 'Darkbox Studios', 'contact@dbs.com', 'Rafael García', 'Somewhere on the third planet spinning around the sun', 'Córdoba', 14720, 'España', 'Andalucía', '957 65 89 12', '659 54 21 45', 6, 'Spanish', 'VAT NUMBER', 1, '2014-04-08 17:16:07', '2014-04-08 17:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE IF NOT EXISTS `hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hours` time NOT NULL,
  `billed` tinyint(1) NOT NULL DEFAULT '0',
  `note` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `status` int(2) NOT NULL,
  `due` int(11) NOT NULL,
  `currency_symbol` varchar(5) DEFAULT NULL,
  `currency_code` varchar(3) DEFAULT NULL,
  `discount` double DEFAULT '0',
  `terms` text,
  `note` text,
  `name` varchar(60) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `address` text,
  `phone` varchar(60) DEFAULT NULL,
  `mobile` varchar(60) DEFAULT NULL,
  `contact_name` varchar(60) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(120) NOT NULL,
  `status` enum('Planned','In progress','Completed','Canceled') NOT NULL DEFAULT 'Planned',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `description`, `status`, `rate`, `created`, `modified`) VALUES
(5, 'IVA 20%', 0, 20, '2014-04-01 19:46:04', '2014-04-02 18:57:19'),
(6, 'IVA 21%', 1, 21, '2014-04-01 19:46:19', '2014-04-02 18:53:03'),
(7, 'IVA 18%', 0, 18, '2014-04-02 19:15:45', '2014-04-02 19:15:45'),
(8, 'IVA 4%', 0, 4, '2014-04-02 19:26:31', '2014-04-02 19:26:31'),
(10, 'IVA 30%', 1, 30, '2014-04-04 21:09:32', '2014-04-04 21:09:32'),
(11, 'TAX 4.5%', 1, 4.5, '2014-04-05 11:19:59', '2014-04-05 11:20:22');

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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `created`, `modified`) VALUES
(1, 'Dexter', 'rgtresd@gmail.com', '7afc1acca61202fb3215ed44dd0470cdbd1e142c', 'overlord', 1, '2014-04-03 16:16:52', '2014-04-05 16:52:43'),
(2, 'Jose', 'souanyirer@gmail.com', '811d4dc81ea67469ab1e4e8d048c7c1e5575da05', 'overlord', 1, '2014-04-05 14:15:39', '2014-04-05 16:36:33'),
(3, 'Paco', 'pacovalmisa@gmail.com', '811d4dc81ea67469ab1e4e8d048c7c1e5575da05', 'minion', 1, '2014-04-05 15:26:31', '2014-04-05 16:36:41'),
(4, 'Jimmy', 'jimmy@timesapp.com', 'c67ae96c43ed863618c76ae02fc1f328d0120e07', 'minion', 0, '2014-04-08 16:46:46', '2014-04-08 16:49:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
