-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 07:55 AM
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `article_number` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `article_number`, `created_at`, `updated_at`) VALUES
(2, '100', '2019-06-11 05:14:31', '0000-00-00 00:00:00'),
(3, '111', '2019-06-11 05:43:26', '0000-00-00 00:00:00');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_desc`
--

INSERT INTO `product_desc` (`description_id`, `product_id`, `size`, `price`, `sku`, `created_at`, `updated_at`) VALUES
(4, '2', '3', '44', '11', '2019-06-11 05:14:31', '0000-00-00 00:00:00'),
(5, '3', '124', '11', '44', '2019-06-11 05:43:26', '0000-00-00 00:00:00'),
(6, '3', '55', '44', '44', '2019-06-11 06:58:09', '0000-00-00 00:00:00'),
(7, '2', '3', '44', '11', '2019-06-11 05:14:31', '0000-00-00 00:00:00');

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
(26, '2', '79fFG0xgFeXSlC3nUPS2LIqDI.jpg', '1512728735_rishikeshrafting2.jpg', '2019-06-11 05:14:29'),
(27, '2', 'Wdbyn02mQfiLfwTb0M0UjZ1M8.jpg', '1512734053_River_20Rafting_20in_20Goa_20(3)_1437979136.jpg', '2019-06-11 05:14:29'),
(28, '2', 'sDngC8DNd6q3BLNHly0AwUElQ.jpg', '1512740619_maxresdefault.jpg', '2019-06-11 05:14:29'),
(29, '3', 'KF1U3rb6BdlDgc3XU5tX79xyc.jpg', '1512728735_rishikeshrafting2.jpg', '2019-06-11 05:43:24'),
(30, '3', 'JzqP2SXwfmwNqh3T2DX5t3PmJ.jpg', '1512734053_River_20Rafting_20in_20Goa_20(3)_1437979136.jpg', '2019-06-11 05:43:24'),
(31, '3', 'lMB0hdbrwNTitfBxxHf1Xp01N.jpg', '1512740619_maxresdefault.jpg', '2019-06-11 05:43:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_desc`
--
ALTER TABLE `product_desc`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
