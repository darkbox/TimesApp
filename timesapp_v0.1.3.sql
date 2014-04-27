-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2014 at 11:15 AM
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
(1, 'NoTime S.L', 'contact@notime.es', 'Rafael García', 'C. inventada nº13', 'Córdoba', 14000, 'España', 'Andalucía', '555 67 89 53', '659 89 54 63', 6, 'Spanish', 'VAT NUMBER', 1, '2014-04-08 17:10:05', '2014-04-08 17:10:05'),
(2, 'Darkbox Studios', 'contact@dbs.com', 'Rafael García', 'Somewhere on the third planet spinning around the sun', 'Córdoba', 14720, 'España', 'Andalucía', '957 65 89 12', '659 54 21 45', 6, 'Spanish', 'VAT NUMBER', 1, '2014-04-08 17:16:07', '2014-04-08 17:16:07'),
(3, 'Internal', 'rgtresd@gmail.com', 'Internal', '', '', NULL, '', '', '', '', NULL, '', '', 1, '2014-04-09 18:42:13', '2014-04-09 18:42:13'),
(4, 'Paco ', 'pacovalmisa@gmail.com', 'Paco', '', '', NULL, '', '', '', '', NULL, '', '', 0, '2014-04-13 12:25:16', '2014-04-13 12:25:16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`id`, `project_id`, `service_id`, `user_id`, `hours`, `billed`, `note`, `created`, `modified`) VALUES
(2, 4, 1, 1, '5.30', 0, 'this is a test note.', '2014-04-13 15:01:20', '2014-04-13 15:01:20'),
(3, 4, 1, 1, '3.00', 0, 'This is another test note.', '2014-04-13 15:03:15', '2014-04-13 15:03:15'),
(4, 4, 1, 1, '3.00', 0, 'This is another test note.', '2014-04-13 15:04:01', '2014-04-13 15:04:01'),
(5, 4, 1, 1, '2.00', 0, 'The test note strikes again.', '2014-04-13 15:05:45', '2014-04-13 15:05:45'),
(6, 4, 1, 1, '1.23', 0, 'I hope this will be the last test note cause it''s driving me crazy.', '2014-04-13 15:09:15', '2014-04-13 15:09:15'),
(7, 2, 1, 1, '11.56', 1, 'Doing some stuff.', '2014-04-13 15:19:13', '2014-04-13 15:19:13'),
(8, 3, 1, 1, '6.00', 1, 'Haciendo pruebas', '2014-04-15 16:13:03', '2014-04-15 16:13:03'),
(10, 2, 1, 1, '2.00', 0, 'Creado el formulario para añadir horas', '2014-04-15 16:31:41', '2014-04-15 16:31:41'),
(11, 1, 1, 1, '60.00', 1, 'Comprobando las horas', '2014-04-16 12:32:02', '2014-04-16 12:32:02'),
(14, 1, 1, 1, '0.02', 1, 'Comprobando el timer.', '2014-04-17 11:51:40', '2014-04-17 11:51:40'),
(15, 1, 1, 1, '1.67', 1, 'Continuo con las pruebas en el timer.', '2014-04-17 11:59:18', '2014-04-17 11:59:18'),
(17, 1, 1, 1, '0.02', 1, 'Comprobado, el timer funciona correctamente.', '2014-04-17 12:27:17', '2014-04-17 12:27:17');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `project_id`, `client_id`, `title`, `status`, `due`, `currency_symbol`, `currency_code`, `discount`, `terms`, `note`, `invoice_date`, `due_date`, `display_country`, `created`, `modified`) VALUES
(1, 3, 0, 'Whatever', 3, 500, '', '', 0, '', '', NULL, NULL, 0, '2014-04-20 18:12:38', '2014-04-20 18:13:50'),
(2, 3, 0, 'Whatever', 4, 500, '', '', 0, '', '', NULL, NULL, 0, '2014-04-20 18:12:38', '2014-04-23 16:00:45'),
(8, NULL, 3, 'Probando facturas', 0, 0, '$', 'USD', 0, 'No hay términos.', 'Esto es una prueba.', '2014-04-27', '2014-04-30', 1, '2014-04-27 10:42:45', '2014-04-27 10:42:45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`id`, `invoice_id`, `tax_id`, `type`, `code`, `description`, `rate`, `amount_hours`, `created`, `modified`) VALUES
(8, 8, 6, 1, 'Mantenimiento del sistema', 'Mantenimiento integral del sistema TimesApp', 10, 40, '2014-04-27 10:42:45', '2014-04-27 10:42:45'),
(9, 8, 6, 1, 'Standard modeling', 'A standard modeling hour.', 10, 30, '2014-04-27 10:42:45', '2014-04-27 10:42:45'),
(10, 8, 5, 1, 'Texturing', 'Texturing proccess', 18, 25, '2014-04-27 10:42:45', '2014-04-27 10:42:45'),
(11, 8, 6, 2, 'USB stick', 'Usb stick 1Gb storage', 15, 1, '2014-04-27 10:42:45', '2014-04-27 10:42:45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `status`, `description`, `unit_price`, `tax_id`, `created`, `modified`) VALUES
(1, 'USB stick', 1, 'Usb stick 1Gb storage', 15, 6, '2014-04-15 12:51:26', '2014-04-15 12:51:26'),
(3, 'USB stick 0001', 1, 'Usb stick 4Gb storage', 25, 6, '2014-04-15 12:54:02', '2014-04-15 12:54:02'),
(4, '012873', 1, 'Maintenance pack - Standard', 19.99, 6, '2014-04-15 12:55:40', '2014-04-15 12:55:40'),
(5, 'ASD8689577', 1, 'Maintenance pack - Pro', 39.99, 6, '2014-04-15 12:56:21', '2014-04-15 12:56:21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `code`, `status`, `description`, `client_id`, `init_date`, `deadline`, `estimate_time`, `estimate_price`, `billable`, `created`, `modified`) VALUES
(1, 'Mi primer proyecto', 0, 'Este proyecto es de prueba.', 1, NULL, NULL, '01:00:00', NULL, 1, '2014-04-09 19:09:47', '2014-04-09 19:09:47'),
(2, 'TimesApp', 1, 'Una aplicación para ayudar a controlar el tiempo de tus proyectos y facturar mejor.', 1, '2014-03-19', '2014-06-09', '00:00:00', 3000, 0, '2014-04-12 15:17:36', '2014-04-12 15:17:36'),
(3, 'Blog projectTimesApp', 2, '', 1, NULL, NULL, '15:38:00', NULL, 0, '2014-04-12 15:18:55', '2014-04-12 15:39:03'),
(4, 'Proyecto con Node js', 3, 'Proyecto realizado en Node js y MongoBD', 3, NULL, NULL, '15:39:00', NULL, 1, '2014-04-12 15:19:17', '2014-04-13 14:29:04'),
(5, 'Encuestas & informes', 2, '', 3, NULL, NULL, NULL, 3000, 0, '2014-04-12 15:40:43', '2014-04-12 15:40:43');

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

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `code`, `status`, `description`, `rate`, `tax_id`, `created`, `modified`) VALUES
(1, 'Mantenimiento del sistema', 1, 'Mantenimiento integral del sistema TimesApp', 10, 6, '2014-04-15 12:38:19', '2014-04-15 12:41:43'),
(2, 'Standard modeling', 1, 'A standard modeling hour.', 10, 6, '2014-04-15 12:42:33', '2014-04-15 12:42:33'),
(3, 'Texturing', 1, 'Texturing proccess', 18, 5, '2014-04-15 12:43:50', '2014-04-15 12:43:50'),
(4, 'Deprecated', 0, 'Useless', 0, 7, '2014-04-17 15:55:54', '2014-04-17 15:55:54');

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

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `description`, `status`, `rate`, `created`, `modified`) VALUES
(5, 'IVA 20%', 0, 20, '2014-04-01 19:46:04', '2014-04-02 18:57:19'),
(6, 'IVA 21%', 1, 21, '2014-04-01 19:46:19', '2014-04-02 18:53:03'),
(7, 'IVA 18%', 0, 18, '2014-04-02 19:15:45', '2014-04-02 19:15:45'),
(8, 'IVA 4%', 0, 4, '2014-04-02 19:26:31', '2014-04-02 19:26:31'),
(10, 'IVA 30%', 1, 30, '2014-04-04 21:09:32', '2014-04-04 21:09:32'),
(11, 'TAX 4.5%', 1, 4.5, '2014-04-05 11:19:59', '2014-04-05 11:20:22'),
(12, 'TAX 2.5%', 0, 2.5, '2014-04-17 17:19:21', '2014-04-17 17:19:21'),
(13, 'TAX 8%', 0, 8, '2014-04-17 17:19:40', '2014-04-17 17:19:40'),
(14, 'TVA 20%', 1, 20, '2014-04-17 17:21:46', '2014-04-17 17:21:57'),
(15, 'Tasa normal - Alemania', 1, 19, '2014-04-17 17:25:06', '2014-04-17 17:25:06'),
(16, 'Tasa normal - Italia', 1, 23, '2014-04-17 17:26:16', '2014-04-17 17:26:16'),
(17, 'Tasa normal - Luxemburgo', 1, 15, '2014-04-17 17:26:48', '2014-04-17 17:26:48'),
(18, 'Tasa normal - Malta', 1, 18, '2014-04-17 17:27:04', '2014-04-17 17:27:04'),
(19, 'Tasa normal - Reino Unido', 1, 20, '2014-04-17 17:27:33', '2014-04-17 17:27:33'),
(20, 'Tasa normal - Portugal', 1, 23, '2014-04-17 17:27:51', '2014-04-17 17:28:03'),
(21, 'Tasa normal - Suecia', 1, 25, '2014-04-17 17:28:50', '2014-04-17 17:28:50'),
(22, 'Tasa normal - Rumanía', 1, 24, '2014-04-17 17:29:13', '2014-04-17 17:29:13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `created`, `modified`) VALUES
(1, 'Dexter', 'rgtresd@gmail.com', '7afc1acca61202fb3215ed44dd0470cdbd1e142c', 'overlord', 1, '2014-04-03 16:16:52', '2014-04-20 11:00:48'),
(2, 'Jose', 'souanyirer@gmail.com', '4e05c61fa71454de69a7d59d1a43f92477169877', 'overlord', 1, '2014-04-05 14:15:39', '2014-04-20 11:12:31'),
(3, 'Paco', 'pacovalmisa@gmail.com', '27a40e13da83533c08c1524b6a4787a8e11143f3', 'minion', 1, '2014-04-05 15:26:31', '2014-04-10 15:59:29'),
(4, 'Jimmy', 'jimmy@timesapp.com', 'b2000b9e57ea0cf455bab4958e3aa3b3b671b858', 'minion', 0, '2014-04-08 16:46:46', '2014-04-26 16:30:56'),
(9, 'Peito', 'pepito@gmail.com', 'd3616137c6db93c288b8d127aa11b69272a9fe59', 'minion', 0, '2014-04-26 16:31:24', '2014-04-26 16:31:58'),
(10, 'Jhonny', 'lol@gmail.com', 'fa5dcc789967c146828a3c557306f3dee3a4bf48', 'minion', 0, '2014-04-26 16:55:17', '2014-04-26 16:55:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
