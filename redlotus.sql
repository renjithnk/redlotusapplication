-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 02:11 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

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

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(1, '', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart_order`
--

CREATE TABLE `cart_order` (
  `cart_id` int(11) NOT NULL,
  `product_disc_id` varchar(50) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `product_quantity` varchar(50) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_order`
--

INSERT INTO `cart_order` (`cart_id`, `product_disc_id`, `product_id`, `product_quantity`, `cart_status`) VALUES
(8, '1', '1', '11', 1),
(9, '1', '1', '11', 1),
(10, '2', '1', '10', 1),
(11, '5', '2', '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `executives`
--

CREATE TABLE `executives` (
  `ex_id` int(11) NOT NULL,
  `ex_name` varchar(250) NOT NULL,
  `ex_email` varchar(250) NOT NULL,
  `ex_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `executives`
--

INSERT INTO `executives` (`ex_id`, `ex_name`, `ex_email`, `ex_password`) VALUES
(1, 'sebin', 'sebin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gst` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `cart_id` varchar(15) NOT NULL,
  `executive_id` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `name`, `gst`, `address`, `cart_id`, `executive_id`, `created_at`) VALUES
(1, 'sebin george', '123456789', 'kaloor , ekmm ', '10', '1', '2019-07-01 07:45:13'),
(2, 'sebin george', '123456789', 'kaloor , ekmm ', '11', '1', '2019-07-01 07:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `article_number` varchar(50) NOT NULL,
  `product_category` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `article_number`, `product_category`, `created_at`, `updated_at`) VALUES
(1, 'aaa', 'formal', '2019-06-27 09:28:52', '2019-07-01 04:33:54'),
(2, 'bbb', '', '2019-06-27 09:31:34', '0000-00-00 00:00:00'),
(3, 'ccc', '', '2019-06-27 09:33:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_desc`
--

CREATE TABLE `product_desc` (
  `description_id` int(11) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `size` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_desc`
--

INSERT INTO `product_desc` (`description_id`, `product_id`, `size`, `price`, `sku`, `category`, `created_at`, `updated_at`) VALUES
(1, '1', '6', '100', '9', '', '2019-06-27 09:28:52', '2019-07-01 12:05:36'),
(2, '1', '6', '100', '10', 'fiat', '2019-06-27 09:30:03', '2019-07-01 07:45:14'),
(3, '1', '45', '55', '60', 'audi', '2019-06-27 09:30:23', '0000-00-00 00:00:00'),
(4, '1', '77', '620', '10', 'volvo', '2019-06-27 09:30:54', '0000-00-00 00:00:00'),
(5, '2', '50', '12', '20', '', '2019-06-27 09:31:34', '2019-07-01 07:45:14'),
(6, '2', '5', '320', '5', 'saab', '2019-06-27 09:31:51', '0000-00-00 00:00:00'),
(7, '2', '9', '800', '40', 'audi', '2019-06-27 09:32:25', '0000-00-00 00:00:00'),
(8, '2', '11', '1200', '60', 'audi', '2019-06-27 09:32:44', '0000-00-00 00:00:00'),
(9, '3', '7', '55', '14', '', '2019-06-27 09:33:05', '0000-00-00 00:00:00'),
(10, '3', '8', '650', '50', 'saab', '2019-06-27 09:33:20', '0000-00-00 00:00:00'),
(11, '3', '8', '650', '50', 'saab', '2019-06-27 09:33:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `image_id` int(11) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`image_id`, `product_id`, `image`, `image_name`, `created_at`) VALUES
(3, '1', 'jxJsWNbbOXBRzxKxsy4P5HRMW.jpg', 'Chrysanthemum.jpg', '2019-06-27 09:28:50'),
(4, '1', '6GFKlMI5oABxJAtRJkl513wGj.jpg', 'Desert.jpg', '2019-06-27 09:29:59'),
(5, '2', '380GI8SjoNahF0hbwpYd7UULl.jpg', 'Hydrangeas.jpg', '2019-06-27 09:31:32'),
(6, '3', 'uipKe6Ct6XgCJtwhnHLTGytBM.jpg', 'Chrysanthemum.jpg', '2019-06-27 09:33:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_order`
--
ALTER TABLE `cart_order`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `executives`
--
ALTER TABLE `executives`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_desc`
--
ALTER TABLE `product_desc`
  ADD PRIMARY KEY (`description_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_order`
--
ALTER TABLE `cart_order`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `executives`
--
ALTER TABLE `executives`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_desc`
--
ALTER TABLE `product_desc`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
