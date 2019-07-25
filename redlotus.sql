-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2019 at 01:06 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.1.17-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `executive_id` int(11) NOT NULL,
  `product_disc_id` varchar(50) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `product_quantity` varchar(50) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_order`
--

INSERT INTO `cart_order` (`cart_id`, `executive_id`, `product_disc_id`, `product_id`, `product_quantity`, `cart_status`) VALUES
(5, 1, '5', '3', '1', 1),
(6, 1, '7', '3', '2', 1),
(7, 1, '5', '3', '5', 1),
(8, 2, '7', '3', '2', 1),
(9, 2, '6', '4', '2', 1),
(10, 1, '6', '4', '3', 1),
(11, 1, '5', '3', '2', 1),
(12, 2, '7', '3', '2', 1),
(13, 2, '6', '4', '2', 1),
(15, 1, '6', '4', '2', 1),
(16, 2, '7', '3', '2', 0),
(18, 2, '6', '4', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(20) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `active`) VALUES
(1, 'BLACK', 1),
(2, 'BROWN', 1),
(3, 'TAN', 1),
(4, 'BLUE', 1),
(5, 'CAMEL', 1),
(6, 'BEIGE', 1),
(7, 'BURGUNDY', 1),
(8, 'GREEN', 1),
(9, 'RED', 1),
(10, 'DARK BLUE', 1),
(11, 'NAVY BLUE', 1),
(12, 'SKY BLUE', 1);

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
(1, 'sebin', 'sebin@gmail.com', '1234'),
(2, 'Rajeev', 'rajeev@gmail.com', '1234');

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
(1, 'Santa', '123456', 'Address', '5', '1', '2019-07-23 09:40:28'),
(2, 'Santa', '123456', 'Address', '6', '1', '2019-07-23 09:40:28'),
(3, 'Santa', '123456', 'Address', '7', '1', '2019-07-23 09:41:41'),
(4, 'Product 1', '123456', 'Address', '8', '1', '2019-07-23 09:48:58'),
(5, 'Product 1', '123456', 'Address', '9', '1', '2019-07-23 09:48:58'),
(6, 'Product 1', '123456', 'Address', '10', '1', '2019-07-23 09:48:59'),
(7, 'Tag 1', '123456', 'Address 2', '11', '1', '2019-07-23 09:51:00'),
(8, 'Test 2', '123456', 'Test 2 Address', '15', '1', '2019-07-23 09:56:36'),
(9, 'nebula', '123', 'Nrb Address', '12', '2', '2019-07-23 09:57:41'),
(10, 'nebula', '123', 'Nrb Address', '13', '2', '2019-07-23 09:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `article_number` varchar(50) NOT NULL,
  `color_id` smallint(6) NOT NULL,
  `product_category` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `article_number`, `color_id`, `product_category`, `created_at`, `updated_at`) VALUES
(3, '101', 1, 'Formal', '2019-07-22 13:56:27', '2019-07-25 07:19:44'),
(4, '102', 1, 'Casual', '2019-07-22 14:30:18', '2019-07-25 07:19:48'),
(5, '103', 6, 'Sandel', '2019-07-25 07:22:06', '2019-07-25 07:22:06');

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
(5, '3', '6', '100', '7', 'Formal', '2019-07-22 13:56:27', '2019-07-23 11:22:50'),
(6, '4', '6', '101', '2', 'Casual', '2019-07-22 14:30:18', '2019-07-23 11:19:11'),
(7, '3', '8', '108', '12', 'Formal', '2019-07-22 14:30:37', '2019-07-23 11:22:37'),
(8, '5', '8', '100', '25', 'Sandel', '2019-07-25 07:22:06', '0000-00-00 00:00:00');

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
(3, '3', '1nWs61urtpxyB6CF4GWfDqPQa.jpg', 'p1.jpg', '2019-07-22 13:56:20'),
(4, '3', 'fWoh2aEdTLo66TRbnpk2PssXK.jpg', 'p2.jpg', '2019-07-22 13:56:22'),
(5, '3', 'F0HhgOFhNW5GP136gyzDWdTH5.jpg', 'p3.jpg', '2019-07-22 13:56:26'),
(6, '4', 'R2YqwKa26CgoOBlZPbYlA9H8B.jpg', 'p1.jpg', '2019-07-22 14:30:13'),
(7, '4', 'RPnTnP2ahYusfuepdK2Csh2JZ.jpg', 'p2.jpg', '2019-07-22 14:30:16'),
(8, '5', 'brHm5caW8ZETTxs72ImuPYfrh.jpg', 'p5.jpg', '2019-07-25 07:22:03');

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
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `executives`
--
ALTER TABLE `executives`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_desc`
--
ALTER TABLE `product_desc`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
