-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2014 at 10:05 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `contact_name`, `address`, `city`, `zip_code`, `country`, `state`, `phone_number`, `mobile_number`, `tax_id`, `language`, `vat_number`, `status`, `created`, `modified`) VALUES
(1, 'Internal', 'internal@timesapp.com', '', '', '', NULL, 'Spain', '', '', '', 1, 'spanish', '000000000000', 1, '2014-06-07 07:31:24', '2014-06-07 07:31:24'),
(2, 'Jhon Doe', 'swagsura@gmail.com', 'Jhon Doe', 'Harbor Fwy', 'Los Angeles', 90003, 'United States', 'California', '+1 (555) 45 78 23', '+1(666)67 72 87', 1, 'english', '', 1, '2014-06-14 08:35:57', '2014-06-14 08:35:57'),
(3, 'IES Gran Capitán', 'informatica@iesgrancapitan.org', 'Lourdes', 'Arcos de la Frontera, s/n', 'Córdoba', 14014, 'Spain', 'Andalucía', '9577379710', '', 1, 'spanish', 'F4951105H', 1, '2014-06-14 08:47:53', '2014-06-14 08:47:53'),
(4, 'Jane Doe', 'swagsura@gmail.com', 'Jane Doe', '1951 Clinton Ave, Bronx', 'New York', 10457, 'United States', 'New York', '+1(555) 78 72 90', '+1(666) 90 23 12', 1, 'english', 'R7521590E', 0, '2014-06-14 08:52:09', '2014-06-14 08:52:09');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `due` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `project_id`, `client_id`, `title`, `status`, `due`, `amount`, `currency_symbol`, `currency_code`, `discount`, `terms`, `note`, `invoice_date`, `due_date`, `display_country`, `created`, `modified`) VALUES
(1, NULL, 1, '0000001', 0, '0.00', '223.00', '€', 'EUR', 0, 'Please, pay me, I''m begging you!', 'Thank you Man!', '2014-06-07', '2014-06-30', 1, '2014-06-07 08:36:00', '2014-06-07 09:42:58');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`id`, `invoice_id`, `tax_id`, `type`, `code`, `description`, `rate`, `amount_hours`, `created`, `modified`) VALUES
(15, 1, 1, 1, 'Programción Node js', 'Node js, Mongo DB', 9.5, 10, '2014-06-07 09:42:58', '2014-06-07 09:42:58'),
(16, 1, 1, 2, 'Hosting pack - Basic', 'Dominio y hohsting web básico', 89, 1, '2014-06-07 09:42:58', '2014-06-07 09:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `status`, `description`, `unit_price`, `tax_id`, `created`, `modified`) VALUES
(1, 'Hosting pack - Basic', 1, 'Dominio y hohsting web básico', 89, 1, '2014-06-02 16:40:10', '2014-06-07 10:05:25'),
(2, 'Toshiba Transmemory Hayabusa 16GB USB', 1, 'Llave/Memoria ', 6.57, 1, '2014-06-02 16:43:12', '2014-06-02 16:43:12'),
(3, 'Toshiba Transmemory Hayabusa 8GB USB', 1, 'Llave/Memoria ', 4.09, 1, '2014-06-02 16:44:13', '2014-06-02 16:44:13'),
(4, 'Hosting pack - Premium', 1, '5 Dominios y hosting dedicado', 235.95, 1, '2014-06-02 16:45:16', '2014-06-02 16:45:16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `code`, `status`, `description`, `client_id`, `init_date`, `deadline`, `estimate_time`, `estimate_price`, `billable`, `created`, `modified`) VALUES
(1, 'TimesApp', 2, 'A free and open source web application for tracking your time while working.', 1, '2014-06-07', '2014-06-13', NULL, NULL, 0, '2014-06-07 07:34:36', '2014-06-07 07:34:36');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `code`, `status`, `description`, `rate`, `tax_id`, `created`, `modified`) VALUES
(1, 'Mantenimiento del sistema', 1, 'Mantenimiento integral del sistema', 9.99, 1, '2014-06-02 16:46:53', '2014-06-07 10:01:06'),
(2, 'Modelado en CAD', 1, 'Autodesk Inventor, Solidwork', 15, 1, '2014-06-07 07:23:04', '2014-06-07 07:23:04'),
(3, 'Modelado 3d', 1, '3ds Max, Modo', 10, 1, '2014-06-07 07:24:19', '2014-06-07 07:24:19'),
(4, 'Modelado orgánico', 1, 'Mudbox, zbrush', 11, 1, '2014-06-07 07:24:54', '2014-06-07 07:24:54'),
(5, 'Programación "back-end"', 1, 'PHP', 8.5, 1, '2014-06-07 07:26:03', '2014-06-07 07:27:17'),
(6, 'Programación "front-end"', 1, 'HTML5, CSS3, Javascript', 8, 1, '2014-06-07 07:27:06', '2014-06-07 07:27:06'),
(8, 'Programción Node js', 1, 'Node js, Mongo DB', 9.5, 1, '2014-06-07 07:28:58', '2014-06-07 07:28:58');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `description`, `status`, `rate`, `created`, `modified`) VALUES
(1, 'IVA 21%', 1, 21, '2014-06-02 16:38:56', '2014-06-07 09:54:29');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `tokenhash`, `created`, `modified`) VALUES
(11, 'Administrator', 'admin@timesapp.com', '951615e7643665a64a48aa9c11db92321c5e9171', 'overlord', 1, '', '2014-05-29 18:08:27', '2014-05-29 18:11:34'),
(12, 'Lourdes', 'lmagarin@gmail.com', 'fa24b46bd7ac5d0f839dd653072ec62a87cd11bb', 'overlord', 1, '', '2014-06-02 16:16:51', '2014-06-02 16:16:51'),
(13, 'Jaime', 'jaimeeducacion@gmail.com', 'b472b69902a27cff56280e5074e6f35b82bbeb37', 'overlord', 1, '', '2014-06-02 16:20:18', '2014-06-02 16:20:18'),
(14, 'José Aguilera', 'fjagui@gmail.com', '87c2a24b24a5903e0acd09d9d6351f08fbb2f698', 'overlord', 1, '', '2014-06-02 16:21:18', '2014-06-02 16:21:18'),
(15, 'Rafa del Castillo', 'rcastillo@uco.es', '746a79d55e43d1db000ca5d03b55dabec1fc6eda', 'overlord', 1, '', '2014-06-02 16:22:50', '2014-06-02 16:22:50'),
(16, 'Amelia', 'apeflo@gmail.com', 'a10596218acece99cb4844ddf8613adac7c0e4e8', 'overlord', 1, '', '2014-06-02 16:23:56', '2014-06-02 16:23:56'),
(17, 'Maricarmen', 'mctripiana@iesgrancapitan.org', '1c3d629bf007b58ba1ffe98a948a330025de3ac6', 'overlord', 1, '', '2014-06-02 16:24:58', '2014-06-02 16:24:58'),
(18, 'Dexter', 'rgtresd@gmail.com', '6d7f8694a3df646b8292c63adef0fe2b3d7669e6', 'overlord', 1, '', '2014-06-07 07:29:50', '2014-06-07 07:29:50');

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Check_due_invoices` ON SCHEDULE EVERY 1 DAY STARTS '2014-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `invoices` SET `status` = 5 WHERE `status` < 3 AND `due_date` > CURDATE()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
