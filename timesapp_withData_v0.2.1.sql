-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2014 at 09:39 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `contact_name`, `address`, `city`, `zip_code`, `country`, `state`, `phone_number`, `mobile_number`, `tax_id`, `language`, `vat_number`, `status`, `created`, `modified`) VALUES
(1, 'Internal', 'internal@timesapp.com', '', '', '', NULL, 'Spain', '', '', '', 1, 'spanish', '000000000000', 1, '2014-06-07 07:31:24', '2014-06-07 07:31:24'),
(2, 'Jhon Doe', 'swagsura@gmail.com', 'Jhon Doe', 'Harbor Fwy', 'Los Angeles', 90003, 'United States', 'California', '+1 (555) 45 78 23', '+1(666)67 72 87', 1, 'english', '', 1, '2014-06-14 08:35:57', '2014-06-14 08:35:57'),
(3, 'IES Gran Capitán', 'informatica@iesgrancapitan.org', 'Lourdes', 'Arcos de la Frontera, s/n', 'Córdoba', 14014, 'Spain', 'Andalucía', '9577379710', '', 1, 'spanish', 'F4951105H', 1, '2014-06-14 08:47:53', '2014-06-14 08:47:53'),
(4, 'Jane Doe', 'swagsura@gmail.com', 'Jane Doe', '1951 Clinton Ave, Bronx', 'New York', 10457, 'United States', 'New York', '+1(555) 78 72 90', '+1(666) 90 23 12', 1, 'english', 'R7521590E', 0, '2014-06-14 08:52:09', '2014-06-14 08:52:09'),
(5, 'Enrique Palacios', 'enrique@palacios.es', 'Enrique', 'Calle José Cruz Conde, 17', 'Córdoba', 14001, 'Spain', 'Andalucía', '', '', 27, 'spanish', 'V89436810', 1, '2014-06-14 14:50:27', '2014-06-15 08:58:02'),
(6, 'NoTime S.L', 'souanyirer@gmail.com', 'Jose', 'Calle Salvador Allende, 22', 'Córdoba', 14014, 'Spain', 'Andalucía', '', '', 27, 'spanish', 'M85480069', 1, '2014-06-15 07:50:26', '2014-06-15 07:50:26'),
(7, 'Paco Valmisa', 'pacovalmisa@gmail.com', 'Paco ', '', 'Córdoba', NULL, 'Spain', '', '', '', 27, 'spanish', '', 0, '2014-06-15 08:43:54', '2014-06-15 08:43:54'),
(8, 'Facebook', 'swagsura@gmail.com', 'Mark Zuckerberg', 'Menlo Park', 'San Mateo', 94025, 'United States', 'California', '', '', 30, 'english', '', 1, '2014-06-15 08:48:11', '2014-06-15 08:48:11'),
(9, 'Google Inc.', 'swagsura@gmail.com', 'Larry Page', 'Googleplex', 'Mountain View', 94035, 'United States', 'California', '+1(666) 66 66 66', '+1(666) 66 66 66', 30, 'english', '', 1, '2014-06-15 08:50:48', '2014-06-15 08:50:48'),
(10, 'Apple Inc.', 'swagsura@gmail.com', 'Tim Cook', 'Apple Campus, 1 Infinite Loop', 'Cupertino', 95014, 'United States', 'California', '+1(555) 01 02 03', '', 30, 'english', '', 1, '2014-06-15 08:54:04', '2014-06-15 08:54:04'),
(11, 'Yahoo! Inc', 'swagsura@gmail.com', 'Marissa Mayer', '701 1st Ave', 'Sunnyvale', 94085, 'United States', 'California', '(408) 349-3300', '', 30, 'english', '', 1, '2014-06-15 09:08:19', '2014-06-15 09:08:19');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`id`, `project_id`, `service_id`, `user_id`, `hours`, `billed`, `note`, `created`, `modified`) VALUES
(1, 3, 5, 18, '5.00', 1, 'Configurando framework', '2014-03-19 08:09:31', '2014-06-15 08:09:31'),
(2, 3, 5, 18, '5.00', 1, 'Programando', '2014-03-20 08:09:31', '2014-06-15 08:09:31'),
(3, 3, 5, 18, '5.00', 1, 'Programando', '2014-03-21 08:09:31', '2014-06-15 08:09:31'),
(4, 3, 5, 18, '5.00', 1, 'Programando', '2014-03-23 08:09:31', '2014-06-15 08:09:31'),
(5, 3, 5, 18, '5.00', 1, 'Programando', '2014-03-24 08:09:31', '2014-06-15 08:09:31'),
(6, 3, 5, 18, '5.00', 1, 'Programando', '2014-03-25 08:09:31', '2014-06-15 08:09:31'),
(7, 3, 5, 18, '5.00', 1, 'Programando', '2014-03-26 08:09:31', '2014-06-15 08:09:31'),
(8, 3, 5, 18, '5.00', 1, 'Programando', '2014-03-27 08:09:31', '2014-06-15 08:09:31'),
(9, 3, 5, 18, '5.00', 1, 'Programando', '2014-03-28 08:09:31', '2014-06-15 08:09:31'),
(10, 3, 5, 18, '5.00', 1, 'Programando', '2014-03-31 08:09:31', '2014-06-15 08:09:31'),
(11, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-01 08:09:31', '2014-06-15 08:09:31'),
(12, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-02 08:09:31', '2014-06-15 08:09:31'),
(13, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-03 08:09:31', '2014-06-15 08:09:31'),
(14, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-04 08:09:31', '2014-06-15 08:09:31'),
(15, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-06 08:09:31', '2014-06-15 08:09:31'),
(16, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-07 08:09:31', '2014-06-15 08:09:31'),
(17, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-08 08:09:31', '2014-06-15 08:09:31'),
(18, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-09 08:09:31', '2014-06-15 08:09:31'),
(19, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-10 08:09:31', '2014-06-15 08:09:31'),
(20, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-11 08:09:31', '2014-06-15 08:09:31'),
(21, 3, 5, 18, '5.00', 1, 'Programando', '2014-04-21 08:09:31', '2014-06-15 08:09:31'),
(29, 5, 3, 18, '4.42', 1, 'Modelando el casco', '2014-05-14 08:27:44', '2014-06-15 08:27:44'),
(30, 5, 3, 18, '6.78', 1, 'Modelando la vela', '2014-05-28 08:28:31', '2014-06-15 08:28:31'),
(31, 5, 3, 18, '1.05', 0, 'Limpiando topología', '2014-06-15 08:29:15', '2014-06-15 08:29:15'),
(32, 5, 3, 18, '4.17', 1, 'Añadiendo detalles en cubierta', '2014-06-15 08:30:21', '2014-06-15 08:30:21'),
(33, 5, 3, 18, '1.53', 1, 'Modelando primer cañón', '2014-06-15 08:30:52', '2014-06-15 08:30:52'),
(34, 7, 11, 18, '60.89', 1, 'Aplicación android compatible desde 2.2 en adelante', '2014-06-15 09:17:36', '2014-06-15 09:17:36'),
(35, 7, 12, 18, '89.75', 1, 'Aplicación compatible con iOS 6 en adelante', '2014-06-15 09:18:39', '2014-06-15 09:18:39'),
(36, 7, 13, 18, '92.71', 1, 'Aplicación completa para Windows phone y Windows 8 RT', '2014-06-15 09:20:07', '2014-06-15 09:20:07');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `project_id`, `client_id`, `title`, `status`, `due`, `amount`, `currency_symbol`, `currency_code`, `discount`, `terms`, `note`, `invoice_date`, `due_date`, `display_country`, `created`, `modified`) VALUES
(1, NULL, 1, '0000001', 0, '0.00', '223.00', '€', 'EUR', 0, 'Please, pay me, I''m begging you!', 'Thank you Man!', '2014-06-07', '2014-06-30', 1, '2014-06-07 08:36:00', '2014-06-07 09:42:58'),
(2, 3, 5, '0000002', 1, '0.00', '1079.93', '€', 'EUR', 0, 'Please, pay me, I''m begging you!', 'Thank you!', '2014-06-15', '2014-06-16', 1, '2014-06-15 08:24:34', '2014-06-15 08:57:22'),
(3, 7, 11, '0000003', 4, '0.00', '3422.56', '€', 'EUR', 0, 'Please, pay me, I''m begging you!', 'Thank you!', '2014-06-15', '2014-06-16', 1, '2014-06-15 09:21:14', '2014-06-15 09:21:45'),
(4, 5, 2, '0000004', 0, '0.00', '20.85', '$', 'USD', 0, 'Please, pay me, I''m begging you!', 'Thank you! Your order arrives in 15 days.', '2014-06-15', '2014-06-16', 1, '2014-06-15 09:24:44', '2014-06-15 09:32:32');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`id`, `invoice_id`, `tax_id`, `type`, `code`, `description`, `rate`, `amount_hours`, `created`, `modified`) VALUES
(15, 1, 1, 1, 'Programción Node js', 'Node js, Mongo DB', 9.5, 10, '2014-06-07 09:42:58', '2014-06-07 09:42:58'),
(16, 1, 1, 2, 'Hosting pack - Basic', 'Dominio y hohsting web básico', 89, 1, '2014-06-07 09:42:58', '2014-06-07 09:42:58'),
(17, 2, 27, 1, 'Programación "back-end"', 'PHP', 8.5, 105, '2014-06-15 08:24:34', '2014-06-15 08:24:34'),
(18, 3, 27, 1, 'Programación Android', 'Programación en plataforma Android', 9.23, 60.89, '2014-06-15 09:21:14', '2014-06-15 09:21:14'),
(19, 3, 27, 1, 'Programación iOS', 'Programación en plataforma iOS - Objective-C, Cocoa', 12.63, 89.75, '2014-06-15 09:21:14', '2014-06-15 09:21:14'),
(20, 3, 27, 1, 'Programación Windows Phone', 'Programación en plataforma Windows Phone, C#, etc', 12.15, 92.71, '2014-06-15 09:21:14', '2014-06-15 09:21:14'),
(21, 3, 27, 2, 'Toshiba Transmemory Hayabusa 16GB USB', 'Llave/Memoria ', 6.57, 1, '2014-06-15 09:21:14', '2014-06-15 09:21:14'),
(26, 4, 27, 2, 'Toshiba Transmemory Hayabusa 16GB USB', 'Llave/Memoria ', 6.57, 2, '2014-06-15 09:32:32', '2014-06-15 09:32:32'),
(27, 4, 27, 2, 'Toshiba Transmemory Hayabusa 8GB USB', 'Llave/Memoria ', 4.09, 1, '2014-06-15 09:32:32', '2014-06-15 09:32:32');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `amount`, `date`, `created`) VALUES
(1, 3, '3422.56', '2014-06-15', '2014-06-15 09:21:45');

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
(1, 'Hosting pack - Basic', 1, 'Dominio y hosting web básico', 89, 27, '2014-06-02 16:40:10', '2014-06-15 08:59:11'),
(2, 'Toshiba Transmemory Hayabusa 16GB USB', 1, 'Llave/Memoria ', 6.57, 27, '2014-06-02 16:43:12', '2014-06-15 08:59:19'),
(3, 'Toshiba Transmemory Hayabusa 8GB USB', 1, 'Llave/Memoria ', 4.09, 27, '2014-06-02 16:44:13', '2014-06-15 08:59:26'),
(4, 'Hosting pack - Premium', 1, '5 Dominios y hosting dedicado', 235.95, 27, '2014-06-02 16:45:16', '2014-06-15 08:59:33');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `code`, `status`, `description`, `client_id`, `init_date`, `deadline`, `estimate_time`, `estimate_price`, `billable`, `created`, `modified`) VALUES
(1, 'TimesApp', 2, 'A free and open source web application for tracking your time while working.', 1, '2014-03-19', '2014-04-21', NULL, NULL, 0, '2014-03-19 07:34:36', '2014-06-15 08:21:44'),
(2, 'Web Curso Universitario', 0, '', 5, '2014-06-16', '2014-06-20', NULL, NULL, 0, '2014-06-14 14:51:21', '2014-06-14 14:51:21'),
(3, 'Gestión de encuestas', 2, '', 5, '2014-06-23', '2014-07-23', NULL, NULL, 1, '2014-06-14 14:51:55', '2014-06-15 08:22:06'),
(4, 'Aplicación Concurso Tapas Córdoba', 0, '', 5, '2014-07-23', '2014-08-23', NULL, NULL, 0, '2014-06-14 14:52:26', '2014-06-14 14:52:26'),
(5, 'Sumergible Tipo C', 1, 'Modelado para mecanizado o impresión 3d.', 2, '2014-06-15', '2014-06-16', NULL, NULL, 1, '2014-06-15 07:46:02', '2014-06-15 07:46:37'),
(6, 'Portfolio (NodeJS)', 3, 'Portfolio para NoTime S.L. Uso de NodeJS con Sails.', 6, NULL, NULL, NULL, NULL, 1, '2014-06-15 07:52:33', '2014-06-15 07:52:33'),
(7, 'Mobile client - Flickr', 1, 'Mobile client for iOS, Android & Windows Phone', 11, '2014-01-15', '2014-02-27', NULL, NULL, 1, '2014-06-15 09:09:36', '2014-06-15 09:12:04');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `code`, `status`, `description`, `rate`, `tax_id`, `created`, `modified`) VALUES
(1, 'Mantenimiento del sistema', 1, 'Mantenimiento integral del sistema', 9.99, 27, '2014-06-02 16:46:53', '2014-06-15 08:38:30'),
(2, 'Modelado en CAD', 1, 'Autodesk Inventor, Solidwork', 15, 27, '2014-06-07 07:23:04', '2014-06-15 08:41:56'),
(3, 'Modelado 3d', 1, '3ds Max, Modo', 10, 27, '2014-06-07 07:24:19', '2014-06-15 08:38:41'),
(4, 'Modelado orgánico', 1, 'Mudbox, zbrush', 11, 27, '2014-06-07 07:24:54', '2014-06-15 08:41:47'),
(5, 'Programación ', 1, 'PHP', 8.5, 27, '2014-06-07 07:26:03', '2014-06-15 08:38:51'),
(6, 'Programación "front-end"', 1, 'HTML5, CSS3, Javascript', 8, 1, '2014-06-07 07:27:06', '2014-06-07 07:27:06'),
(8, 'Programación Node js', 1, 'Node js, Mongo DB', 9.5, 27, '2014-06-07 07:28:58', '2014-06-15 08:41:14'),
(9, 'Seguridad extra', 1, 'Para aplicaciones que requieran más seguridad', 12.5, 27, '2014-06-14 14:49:50', '2014-06-15 08:39:04'),
(10, 'Ejemplo de servicio', 0, 'Dummy service', 2.5, 27, '2014-06-15 08:41:01', '2014-06-15 08:41:25'),
(11, 'Programación Android', 1, 'Programación en plataforma Android', 9.23, 27, '2014-06-15 09:13:11', '2014-06-15 09:13:11'),
(12, 'Programación iOS', 1, 'Programación en plataforma iOS - Objective-C, Cocoa', 12.63, 27, '2014-06-15 09:14:13', '2014-06-15 09:14:13'),
(13, 'Programación Windows Phone', 1, 'Programación en plataforma Windows Phone, C#, etc', 12.15, 27, '2014-06-15 09:15:06', '2014-06-15 09:15:06');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `description`, `status`, `rate`, `created`, `modified`) VALUES
(1, 'IVA 21%', 0, 21, '2014-06-02 16:38:56', '2014-06-15 07:37:11'),
(2, 'Austria - 20%', 1, 20, '2014-06-15 07:21:29', '2014-06-15 07:21:29'),
(3, 'Belgium - 21%', 1, 21, '2014-06-15 07:22:52', '2014-06-15 07:22:52'),
(4, 'Bulgaria - 20%', 1, 20, '2014-06-15 07:23:18', '2014-06-15 07:23:18'),
(5, 'Croatia - 25%', 1, 25, '2014-06-15 07:23:37', '2014-06-15 07:23:37'),
(6, 'Cyprus - 19%', 1, 19, '2014-06-15 07:24:00', '2014-06-15 07:24:00'),
(7, 'Czech Republic - 21%', 1, 21, '2014-06-15 07:24:36', '2014-06-15 07:24:36'),
(8, 'Denmark - 25%', 1, 25, '2014-06-15 07:24:55', '2014-06-15 07:24:55'),
(9, 'Estonia - 20%', 1, 20, '2014-06-15 07:25:10', '2014-06-15 07:25:10'),
(10, 'Finland - 24%', 1, 24, '2014-06-15 07:25:28', '2014-06-15 07:25:28'),
(11, 'France - 20%', 1, 20, '2014-06-15 07:26:14', '2014-06-15 07:26:14'),
(12, 'Germany - 19%', 1, 19, '2014-06-15 07:26:33', '2014-06-15 07:26:33'),
(13, 'Greece - 23%', 1, 23, '2014-06-15 07:26:56', '2014-06-15 07:26:56'),
(14, 'Hungary - 27%', 1, 27, '2014-06-15 07:27:29', '2014-06-15 07:27:29'),
(15, 'Ireland - 23%', 1, 23, '2014-06-15 07:27:41', '2014-06-15 07:27:41'),
(16, 'Italy - 22%', 1, 22, '2014-06-15 07:28:01', '2014-06-15 07:28:01'),
(17, 'Latvia - 21%', 1, 21, '2014-06-15 07:28:18', '2014-06-15 07:28:18'),
(18, 'Lithuania - 21%', 1, 21, '2014-06-15 07:28:50', '2014-06-15 07:28:50'),
(19, 'Luxembourg - 15%', 1, 15, '2014-06-15 07:29:24', '2014-06-15 07:29:24'),
(20, 'Malta - 18%', 1, 18, '2014-06-15 07:29:43', '2014-06-15 07:29:43'),
(21, 'Netherlands - 21%', 1, 21, '2014-06-15 07:30:12', '2014-06-15 07:30:12'),
(22, 'Poland - 23%', 1, 23, '2014-06-15 07:30:27', '2014-06-15 07:30:27'),
(23, 'Portugal - 23%', 1, 23, '2014-06-15 07:30:57', '2014-06-15 07:30:57'),
(24, 'Romania - 24%', 1, 24, '2014-06-15 07:31:22', '2014-06-15 07:31:22'),
(25, 'Slovakia - 20%', 1, 20, '2014-06-15 07:32:08', '2014-06-15 07:32:08'),
(26, 'Slovenia - 22%', 1, 22, '2014-06-15 07:32:29', '2014-06-15 07:32:29'),
(27, 'Spain - 21%', 1, 21, '2014-06-15 07:32:44', '2014-06-15 07:32:44'),
(28, 'Sweden - 25%', 1, 25, '2014-06-15 07:32:58', '2014-06-15 07:32:58'),
(29, 'United Kingdom - 20%', 1, 20, '2014-06-15 07:33:18', '2014-06-15 07:33:18'),
(30, 'CA - 13.3%', 1, 13.3, '2014-06-15 07:34:52', '2014-06-15 07:34:52'),
(31, 'WA - none', 1, 0, '2014-06-15 07:35:13', '2014-06-15 07:35:13'),
(32, 'TX - none', 1, 0, '2014-06-15 07:35:25', '2014-06-15 07:35:25'),
(33, 'NY - 8.82%', 1, 8.82, '2014-06-15 07:35:56', '2014-06-15 07:35:56'),
(34, 'OR - 9.9%', 1, 9.9, '2014-06-15 07:36:43', '2014-06-15 07:36:43');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

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
(18, 'Dexter', 'rgtresd@gmail.com', '6d7f8694a3df646b8292c63adef0fe2b3d7669e6', 'overlord', 1, '', '2014-06-07 07:29:50', '2014-06-07 07:29:50'),
(19, 'Jose', 'souanyirer@gmail.com', '4e05c61fa71454de69a7d59d1a43f92477169877', 'overlord', 1, '', '2014-06-14 10:48:30', '2014-06-14 10:48:37'),
(20, 'Jose Ramón', 'jalbendin@gmail.com', '9ab83ae0f52d84e2e75da5a7cefd21a272ffe8ec', 'overlord', 1, '', '2014-06-14 10:50:41', '2014-06-14 10:51:26');

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Check_due_invoices` ON SCHEDULE EVERY 1 DAY STARTS '2014-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `invoices` SET `status` = 5 WHERE `status` < 3 AND `due_date` > CURDATE()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
