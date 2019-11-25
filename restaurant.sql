-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2019 at 11:07 PM
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
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `login_id` varchar(10) NOT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `lname`, `dob`, `login_id`, `address`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Joishnu', 'Roychowdhury', '15-08-1996', 'jois1634', 'dfghjk', '7003447713', 'de774426c74c1368f4ce00671da6dc103c83c846', '2019-11-25 14:09:00', '2019-11-25 08:39:11'),
(2, 'Subh', 'bbjkk', '15-08-1996', 'subh1545', 'svdfvzdf', '74312589', 'de774426c74c1368f4ce00671da6dc103c83c846', '2019-11-25 21:39:00', '2019-11-25 16:09:02'),
(3, 'FGYHGVH', 'bhjbhj', '15-08-1996', 'fgyh5992', 'fgtygvfghyh', '7431258965', 'de774426c74c1368f4ce00671da6dc103c83c846', '2019-11-25 21:39:00', '2019-11-25 16:09:49'),
(4, 'ghgvhbj', 'ghhbvhjjhbj', '15-08-1995', 'ghgv9516', 'fgyhgbvghujhj', '7451236985', 'de774426c74c1368f4ce00671da6dc103c83c846', '2019-11-25 21:41:00', '2019-11-25 16:11:14'),
(5, 'roshan.', 'padhy', '19-12-2019', 'rosh2000', ' klkl  lklk lk lklk ', '9658868988', '5f7e128509c1e91d961411eafd6f2e6b2c30fc9f', '2019-11-25 21:52:00', '2019-11-25 16:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_name` varchar(30) NOT NULL,
  `dish_price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=>not available, 1=>available',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `dish_name`, `dish_price`, `status`, `created_on`) VALUES
(1, 'Menu 1', 100, 1, '2019-11-25 13:00:00'),
(2, 'Menu 2', 154, 1, '2019-11-25 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `tbl_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '1' COMMENT '1=>order_placed,2=>completed',
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `tbl_id`, `total_price`, `order_status`, `created_on`, `updated_on`) VALUES
(1, 1, 0, 100, 1, '2019-11-25 21:03:00', '2019-11-25 15:33:17'),
(2, 1, 0, 100, 1, '2019-11-25 21:03:00', '2019-11-25 15:33:42'),
(3, 1, 3, 154, 1, '2019-11-25 21:14:00', '2019-11-25 15:44:21'),
(4, 1, 3, 154, 1, '2019-11-25 21:14:00', '2019-11-25 15:44:39'),
(5, 1, 4, 154, 1, '2019-11-25 21:16:00', '2019-11-25 15:46:57'),
(6, 1, 2, 100, 1, '2019-11-25 21:23:00', '2019-11-25 15:53:35'),
(7, 4, 3, 254, 1, '2019-11-25 21:41:00', '2019-11-25 16:11:41'),
(8, 5, 5, 254, 1, '2019-11-25 21:54:00', '2019-11-25 16:24:21'),
(9, 5, 7, 254, 1, '2019-11-25 21:55:00', '2019-11-25 16:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `dish_id`, `price`, `quantity`, `created_on`, `updated_on`) VALUES
(8, 5, 2, 154, 1, '0000-00-00 00:00:00', '2019-11-25 15:01:40'),
(7, 5, 1, 100, 1, '0000-00-00 00:00:00', '2019-11-25 15:01:40'),
(6, 4, 2, 154, 1, '0000-00-00 00:00:00', '2019-11-25 14:53:52'),
(5, 4, 1, 100, 1, '0000-00-00 00:00:00', '2019-11-25 14:53:52'),
(9, 6, 1, 100, 1, '0000-00-00 00:00:00', '2019-11-25 15:18:55'),
(10, 7, 1, 100, 1, '0000-00-00 00:00:00', '2019-11-25 15:19:04'),
(11, 8, 1, 100, 1, '0000-00-00 00:00:00', '2019-11-25 15:20:50'),
(12, 9, 2, 154, 1, '0000-00-00 00:00:00', '2019-11-25 15:21:01'),
(13, 10, 2, 154, 1, '0000-00-00 00:00:00', '2019-11-25 15:21:17'),
(14, 11, 1, 100, 1, '0000-00-00 00:00:00', '2019-11-25 15:24:22'),
(15, 1, 1, 100, 1, '0000-00-00 00:00:00', '2019-11-25 15:33:17'),
(16, 2, 1, 100, 1, '0000-00-00 00:00:00', '2019-11-25 15:33:42'),
(17, 3, 2, 154, 1, '0000-00-00 00:00:00', '2019-11-25 15:44:21'),
(18, 4, 2, 154, 1, '0000-00-00 00:00:00', '2019-11-25 15:44:39'),
(19, 5, 2, 154, 1, '0000-00-00 00:00:00', '2019-11-25 15:46:57'),
(20, 6, 1, 100, 1, '0000-00-00 00:00:00', '2019-11-25 15:53:35'),
(21, 7, 1, 100, 2, '0000-00-00 00:00:00', '2019-11-25 16:11:41'),
(22, 7, 2, 154, 2, '0000-00-00 00:00:00', '2019-11-25 16:11:41'),
(23, 8, 1, 100, 2, '0000-00-00 00:00:00', '2019-11-25 16:24:21'),
(24, 8, 2, 154, 1, '0000-00-00 00:00:00', '2019-11-25 16:24:21'),
(25, 9, 1, 100, 1, '0000-00-00 00:00:00', '2019-11-25 16:25:06'),
(26, 9, 2, 154, 1, '0000-00-00 00:00:00', '2019-11-25 16:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `tables_list`
--

DROP TABLE IF EXISTS `tables_list`;
CREATE TABLE IF NOT EXISTS `tables_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_name` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=>available,1=>not available',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables_list`
--

INSERT INTO `tables_list` (`id`, `tbl_name`, `capacity`, `status`, `created_on`) VALUES
(1, 1, 4, 1, '2019-11-25 10:00:00'),
(2, 2, 4, 1, '2019-11-25 00:11:00'),
(3, 3, 4, 1, '2019-11-25 12:00:00'),
(4, 4, 4, 1, '2019-11-25 12:00:00'),
(5, 5, 4, 1, '2019-11-25 12:00:00'),
(6, 6, 4, 1, '2019-11-25 12:00:00'),
(7, 7, 4, 1, '2019-11-25 12:00:00'),
(8, 8, 4, 0, '2019-11-25 12:00:00'),
(9, 9, 4, 0, '2019-11-25 12:00:00'),
(10, 10, 4, 0, '2019-11-25 12:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
