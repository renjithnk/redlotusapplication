-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 22, 2019 at 07:35 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redlotus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(1, '', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart_order`
--

DROP TABLE IF EXISTS `cart_order`;
CREATE TABLE IF NOT EXISTS `cart_order` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_disc_id` varchar(50) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `product_quantity` varchar(50) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_order`
--

INSERT INTO `cart_order` (`cart_id`, `product_disc_id`, `product_id`, `product_quantity`, `cart_status`) VALUES
(8, '1', '1', '11', 1),
(9, '1', '1', '11', 1),
(10, '2', '1', '10', 1),
(11, '5', '2', '12', 1),
(13, '14', '6', '4', 1),
(14, '15', '6', '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `executives`
--

DROP TABLE IF EXISTS `executives`;
CREATE TABLE IF NOT EXISTS `executives` (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_name` varchar(250) NOT NULL,
  `ex_email` varchar(250) NOT NULL,
  `ex_password` varchar(250) NOT NULL,
  PRIMARY KEY (`ex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `executives`
--

INSERT INTO `executives` (`ex_id`, `ex_name`, `ex_email`, `ex_password`) VALUES
(1, 'sebin', 'sebin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gst` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `cart_id` varchar(15) NOT NULL,
  `executive_id` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `name`, `gst`, `address`, `cart_id`, `executive_id`, `created_at`) VALUES
(1, 'sebin george', '123456789', 'kaloor , ekmm ', '10', '1', '2019-07-01 07:45:13'),
(2, 'sebin george', '123456789', 'kaloor , ekmm ', '11', '1', '2019-07-01 07:45:14'),
(3, 'sebin george', '123456789', 'abc abc abc', '13', '1', '2019-07-03 09:39:32'),
(4, 'sebin george', '123456789', 'abc abc abc', '14', '1', '2019-07-03 09:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_number` varchar(50) NOT NULL,
  `product_category` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `article_number`, `product_category`, `created_at`, `updated_at`) VALUES
(4, 'ger', 'Roman Bantu', '2019-07-03 08:23:40', '0000-00-00 00:00:00'),
(5, 'fewaf', 'Sleeper', '2019-07-03 08:28:17', '0000-00-00 00:00:00'),
(6, '102', 'Casual', '2019-07-03 09:36:20', '0000-00-00 00:00:00'),
(7, 'A1', 'Formal', '2019-07-19 10:00:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_desc`
--

DROP TABLE IF EXISTS `product_desc`;
CREATE TABLE IF NOT EXISTS `product_desc` (
  `description_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(10) NOT NULL,
  `size` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`description_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_desc`
--

INSERT INTO `product_desc` (`description_id`, `product_id`, `size`, `price`, `sku`, `category`, `created_at`, `updated_at`) VALUES
(12, '4', '9', '520', '100', 'Roman Bantu', '2019-07-03 08:23:40', '2019-07-20 09:37:29'),
(13, '5', '10', '450', '66', 'Sleeper', '2019-07-03 08:28:17', '2019-07-14 04:22:50'),
(14, '6', '9', '500', '11', 'Casual', '2019-07-03 09:36:20', '2019-07-03 09:39:32'),
(15, '6', '8', '600', '4', 'Casual', '2019-07-03 09:38:42', '2019-07-03 09:39:32'),
(16, '7', '6', '300', '9', 'Formal', '2019-07-19 10:00:32', '2019-07-20 09:40:44'),
(17, '7', '7', '350', '10', 'Formal', '2019-07-19 10:46:27', '2019-07-20 09:40:05'),
(18, '7', '8', '250', '9', 'Formal', '2019-07-19 10:54:51', '2019-07-20 09:40:05'),
(19, '7', '9', '350', '5', 'Formal', '2019-07-19 10:55:11', '0000-00-00 00:00:00'),
(20, '7', '10', '450', '5', 'Formal', '2019-07-19 10:57:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`image_id`, `product_id`, `image`, `image_name`, `created_at`) VALUES
(7, '4', 'IdbqO2wkeZqGMgs1PRTeZIuLZ.jpg', 'Desert.jpg', '2019-07-03 08:23:38'),
(8, '5', 'No2YOwbuwIC0upUxTdOeeP5zX.jpg', 'Hydrangeas.jpg', '2019-07-03 08:28:15'),
(9, '6', 'Pue84jDwhDJ5u3g9qWLrNF8y7.jpg', 'Desert.jpg', '2019-07-03 09:36:17'),
(10, '6', 'OiJicaJi0Fsel0BCgBLnz3qKk.jpg', 'Chrysanthemum.jpg', '2019-07-03 09:36:17'),
(11, '6', '2nkd6z6fDEdAP2HU48Q4TSIpA.jpg', 'Hydrangeas.jpg', '2019-07-03 09:36:17'),
(16, '7', 'HETAf3C0JcGJpT0UXzPB8coCt.jpg', 'Chrysanthemum.jpg', '2019-07-08 06:39:17'),
(17, '7', 'NsG8is2Y0oLucdhuULwe9e2rp.jpeg', '370793-7-puma-peacoat-blazing-yellow-original-imaffn2jzqcvqtgq.jpeg', '2019-07-10 16:46:33'),
(18, '7', 'KZAnthBTSjYB119T1bzrQylW9.jpeg', '370793-7-puma-peacoat-blazing-yellow-original-imaffn2jzqcvqtgq.jpeg', '2019-07-10 16:51:21'),
(19, '7', '2TmXg0qPQAqS25DaxWOtGAMED.jpeg', '370793-7-puma-peacoat-blazing-yellow-original-imaffn2jzqcvqtgq.jpeg', '2019-07-10 16:56:42'),
(20, '7', '6EbxH7TrXZyy3jI4omKlHWwGp.jpg', 'p1.jpg', '2019-07-19 10:00:11'),
(21, '7', 'f7xhbg67EKFIMX2L7Hn61kZA8.jpg', 'p2.jpg', '2019-07-19 10:00:18'),
(22, '7', 'hemKEl2qyiNe65MX5R5BFnhP8.jpg', 'p3.jpg', '2019-07-19 10:00:21'),
(23, '7', '3LxzYaoYeSwOC8znOl5M3NaQ5.jpg', 'p4.jpg', '2019-07-19 10:00:26'),
(24, '7', 'RZjMxui514Xfi2P1nPWSPc35p.jpg', 'p5.jpg', '2019-07-19 10:00:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
