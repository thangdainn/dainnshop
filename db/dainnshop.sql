-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2024 at 12:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dainnshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `status`, `create_at`, `update_at`) VALUES
(1, 'Addidas', '1715659584.png', 1, '2023-03-20 13:30:00', '2023-03-27 14:58:38'),
(2, 'Nike', '1715659597.png', 1, '2023-03-20 13:30:00', '2023-03-20 13:30:00'),
(3, 'Puma', 'puma.jpg', 1, '2023-03-20 13:30:00', '2023-03-20 13:30:00'),
(4, 'Gucci', 'gucci.jpg', 1, '2023-03-20 13:30:00', '2023-03-20 13:30:00'),
(5, 'Reebok', 'reebok.jpg', 1, '2023-03-20 13:30:00', '2023-03-20 13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `amount` int NOT NULL,
  `size_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `create_at`, `update_at`) VALUES
(1, 'T-shirt', '1715401731.jpg', 1, '2023-03-20 13:30:00', '2023-03-20 13:30:00'),
(2, 'Hoodie', 'images/sp3/ao-hoodie-lifestyle-nam-adidas-hl6925-1.jpg', 1, '2023-03-20 13:30:00', '2023-03-27 14:59:53'),
(3, 'Shirt', '1715401628.jpg', 1, '2023-03-20 13:30:00', '2023-03-27 15:00:33'),
(4, 'Polo', '1715401758.jpg', 1, '2023-03-20 13:30:00', '2023-03-27 15:00:17'),
(15, 'Jacket', '1715401806.jpg', 1, '2023-03-29 16:39:38', '2023-03-30 16:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `image` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `create_at`, `update_at`) VALUES
(38, 33, 'images/sp9/ao-ba-lo-chay-bo-nam-nike-cz9180-010-2.jpg', '2023-05-07 21:53:38', NULL),
(39, 33, 'images/sp9/ao-ba-lo-chay-bo-nam-nike-cz9180-010-3.jpg', '2023-05-07 21:53:38', NULL),
(40, 33, 'images/sp9/ao-ba-lo-chay-bo-nam-nike-cz9180-010-4.jpg', '2023-05-07 21:53:38', NULL),
(50, 29, 'images/sp13/ao-nike-sportswear-men-s-hoodie-midnight-navy-cw4319-400-mau-xanh-navy-2.jpg', '2023-05-07 22:02:43', NULL),
(51, 29, 'images/sp13/ao-nike-sportswear-men-s-hoodie-midnight-navy-cw4319-400-mau-xanh-navy-3.jpg', '2023-05-07 22:02:43', NULL),
(52, 29, 'images/sp13/ao-nike-sportswear-men-s-hoodie-midnight-navy-cw4319-400-mau-xanh-navy-4.jpg', '2023-05-07 22:02:43', NULL),
(87, 2, '1715359374_0.jpg', '2024-05-10 23:42:54', '2024-05-10 23:42:54'),
(88, 2, '1715359374_1.jpg', '2024-05-10 23:42:54', '2024-05-10 23:42:54'),
(89, 2, '1715359374_2.jpg', '2024-05-10 23:42:54', '2024-05-10 23:42:54'),
(90, 3, '1715359444_0.jpg', '2024-05-10 23:44:04', '2024-05-10 23:44:04'),
(91, 3, '1715359444_1.jpg', '2024-05-10 23:44:04', '2024-05-10 23:44:04'),
(92, 3, '1715359444_2.jpg', '2024-05-10 23:44:04', '2024-05-10 23:44:04'),
(94, 1, '1715359624_0.jpg', '2024-05-10 23:47:04', '2024-05-10 23:47:04'),
(95, 1, '1715359624_1.jpg', '2024-05-10 23:47:04', '2024-05-10 23:47:04'),
(96, 1, '1715359624_2.jpg', '2024-05-10 23:47:04', '2024-05-10 23:47:04'),
(97, 5, '1715359833_0.jpg', '2024-05-10 23:50:33', '2024-05-10 23:50:33'),
(98, 5, '1715359833_1.jpg', '2024-05-10 23:50:33', '2024-05-10 23:50:33'),
(99, 5, '1715359833_2.jpg', '2024-05-10 23:50:33', '2024-05-10 23:50:33'),
(102, 6, '1715392033_0.jpg', '2024-05-11 08:47:13', '2024-05-11 08:47:13'),
(103, 6, '1715392033_1.jpg', '2024-05-11 08:47:13', '2024-05-11 08:47:13'),
(112, 8, '1715401333_0.jpg', '2024-05-11 11:22:13', '2024-05-11 11:22:13'),
(113, 8, '1715401333_1.jpg', '2024-05-11 11:22:13', '2024-05-11 11:22:13'),
(116, 10, '1715401975_0.jpg', '2024-05-11 11:32:55', '2024-05-11 11:32:55'),
(117, 10, '1715401975_1.jpg', '2024-05-11 11:32:55', '2024-05-11 11:32:55'),
(118, 9, '1715402131_0.jpg', '2024-05-11 11:35:31', '2024-05-11 11:35:31'),
(119, 9, '1715402131_1.jpg', '2024-05-11 11:35:31', '2024-05-11 11:35:31'),
(120, 11, '1715402263_0.jpg', '2024-05-11 11:37:43', '2024-05-11 11:37:43'),
(121, 11, '1715402263_1.jpg', '2024-05-11 11:37:43', '2024-05-11 11:37:43'),
(122, 12, '1715402339_0.jpg', '2024-05-11 11:38:59', '2024-05-11 11:38:59'),
(123, 12, '1715402339_1.jpg', '2024-05-11 11:38:59', '2024-05-11 11:38:59'),
(124, 13, '1715402438_0.jpg', '2024-05-11 11:40:38', '2024-05-11 11:40:38'),
(125, 13, '1715402438_1.jpg', '2024-05-11 11:40:38', '2024-05-11 11:40:38'),
(126, 22, '1715402534_0.jpg', '2024-05-11 11:42:14', '2024-05-11 11:42:14'),
(127, 22, '1715402534_1.jpg', '2024-05-11 11:42:14', '2024-05-11 11:42:14'),
(128, 23, '1715402584_0.jpg', '2024-05-11 11:43:04', '2024-05-11 11:43:04'),
(129, 23, '1715402584_1.jpg', '2024-05-11 11:43:04', '2024-05-11 11:43:04'),
(132, 26, '1715402776_0.jpg', '2024-05-11 11:46:16', '2024-05-11 11:46:16'),
(133, 26, '1715402776_1.jpg', '2024-05-11 11:46:16', '2024-05-11 11:46:16'),
(134, 27, '1715402859_0.jpg', '2024-05-11 11:47:39', '2024-05-11 11:47:39'),
(135, 27, '1715402859_1.jpg', '2024-05-11 11:47:39', '2024-05-11 11:47:39'),
(136, 28, '1715403053_0.jpg', '2024-05-11 11:50:53', '2024-05-11 11:50:53'),
(137, 28, '1715403053_1.jpg', '2024-05-11 11:50:53', '2024-05-11 11:50:53'),
(138, 30, '1715403217_0.jpg', '2024-05-11 11:53:37', '2024-05-11 11:53:37'),
(139, 30, '1715403217_1.jpg', '2024-05-11 11:53:37', '2024-05-11 11:53:37'),
(140, 31, '1715403328_0.jpg', '2024-05-11 11:55:28', '2024-05-11 11:55:28'),
(141, 31, '1715403328_1.jpg', '2024-05-11 11:55:28', '2024-05-11 11:55:28'),
(142, 32, '1715403479_0.jpg', '2024-05-11 11:57:59', '2024-05-11 11:57:59'),
(143, 32, '1715403479_1.jpg', '2024-05-11 11:57:59', '2024-05-11 11:57:59'),
(144, 34, '1715403659_0.jpg', '2024-05-11 12:00:59', '2024-05-11 12:00:59'),
(145, 34, '1715403659_1.jpg', '2024-05-11 12:00:59', '2024-05-11 12:00:59'),
(146, 35, '1715403726_0.jpg', '2024-05-11 12:02:06', '2024-05-11 12:02:06'),
(147, 35, '1715403726_1.jpg', '2024-05-11 12:02:06', '2024-05-11 12:02:06'),
(148, 36, '1715403815_0.jpg', '2024-05-11 12:03:35', '2024-05-11 12:03:35'),
(149, 36, '1715403815_1.jpg', '2024-05-11 12:03:35', '2024-05-11 12:03:35'),
(150, 37, '1715403928_0.jpg', '2024-05-11 12:05:28', '2024-05-11 12:05:28'),
(151, 37, '1715403928_1.jpg', '2024-05-11 12:05:28', '2024-05-11 12:05:28'),
(152, 38, '1715403979_0.jpg', '2024-05-11 12:06:19', '2024-05-11 12:06:19'),
(153, 38, '1715403979_1.jpg', '2024-05-11 12:06:19', '2024-05-11 12:06:19'),
(154, 39, '1715404074_0.jpg', '2024-05-11 12:07:54', '2024-05-11 12:07:54'),
(155, 39, '1715404074_1.jpg', '2024-05-11 12:07:54', '2024-05-11 12:07:54'),
(156, 40, '1715404173.jpg', '2024-05-11 12:09:33', '2024-05-11 12:09:33'),
(157, 40, '1715404173_0.jpg', '2024-05-11 12:09:33', '2024-05-11 12:09:33'),
(158, 40, '1715404173_1.jpg', '2024-05-11 12:09:33', '2024-05-11 12:09:33'),
(159, 41, '1715404257.jpg', '2024-05-11 12:10:57', '2024-05-11 12:10:57'),
(160, 41, '1715404257_0.jpg', '2024-05-11 12:10:57', '2024-05-11 12:10:57'),
(161, 41, '1715404257_1.jpg', '2024-05-11 12:10:57', '2024-05-11 12:10:57'),
(165, 43, '1715404418.jpg', '2024-05-11 12:13:38', '2024-05-11 12:13:38'),
(166, 43, '1715404418_0.jpg', '2024-05-11 12:13:38', '2024-05-11 12:13:38'),
(167, 43, '1715404418_1.jpg', '2024-05-11 12:13:38', '2024-05-11 12:13:38'),
(172, 47, '1715404759_0.png', '2024-05-11 12:19:19', '2024-05-11 12:19:19'),
(173, 47, '1715404759_1.png', '2024-05-11 12:19:19', '2024-05-11 12:19:19'),
(174, 21, '1715406041_0.jpg', '2024-05-11 12:40:41', '2024-05-11 12:40:41'),
(175, 21, '1715406041_1.jpg', '2024-05-11 12:40:41', '2024-05-11 12:40:41'),
(176, 46, '1715408336_0.png', '2024-05-11 13:18:56', '2024-05-11 13:18:56'),
(177, 46, '1715408336_1.png', '2024-05-11 13:18:56', '2024-05-11 13:18:56'),
(178, 45, '1715408361_0.png', '2024-05-11 13:19:21', '2024-05-11 13:19:21'),
(179, 45, '1715408361_1.png', '2024-05-11 13:19:21', '2024-05-11 13:19:21'),
(180, 44, '1715408378_0.png', '2024-05-11 13:19:38', '2024-05-11 13:19:38'),
(181, 44, '1715408378_1.png', '2024-05-11 13:19:38', '2024-05-11 13:19:38'),
(182, 42, '1715409284_0.jpg', '2024-05-11 13:34:44', '2024-05-11 13:34:44'),
(183, 42, '1715409284_1.jpg', '2024-05-11 13:34:44', '2024-05-11 13:34:44'),
(184, 25, '1715422649_0.jpg', '2024-05-11 17:17:29', '2024-05-11 17:17:29'),
(185, 25, '1715422649_1.jpg', '2024-05-11 17:17:29', '2024-05-11 17:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `resipient_name` varchar(50) DEFAULT NULL,
  `resipient_phonenumber` varchar(20) DEFAULT NULL,
  `delivery_address` varchar(100) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `id_order_status` int NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `resipient_name`, `resipient_phonenumber`, `delivery_address`, `note`, `id_order_status`, `create_at`, `update_at`, `payment_method`) VALUES
(66, 45, 'sfsaw', '0333207334', 'wfwqf', NULL, 5, '2024-02-08 14:16:57', '2024-05-08 14:16:57', 'mobile wallet'),
(67, 45, 'wdwdw', '0123123123', 'wdwdw', NULL, 4, '2024-05-08 14:22:48', '2024-05-08 14:22:48', 'mobile wallet'),
(68, 45, 'dwdw', '0333207334', 'dwdwdwd', NULL, 6, '2024-04-08 14:30:03', '2024-05-08 14:30:03', 'cash'),
(100, 45, 'fefef', '0333207334', 'efefe', NULL, 4, '2024-05-11 15:23:29', '2024-05-11 15:23:29', 'credit'),
(101, 45, 'thang', '0333207334', 'thu duc', NULL, 4, '2024-05-11 15:25:13', '2024-05-11 15:25:13', 'mobile wallet'),
(102, 45, 'thang', '0333207334', 'thu duc', NULL, 4, '2024-05-11 15:52:15', '2024-05-11 15:52:15', 'mobile wallet'),
(103, 45, 'duc thang', '0333207334', 'thu duc', NULL, 4, '2024-05-11 16:03:53', '2024-05-11 16:03:53', 'cash'),
(104, 45, 'ducthang', '0333207334', '1fsff', NULL, 4, '2024-05-11 16:12:06', '2024-05-11 16:12:06', 'cash'),
(105, 45, 'rg', '0333207334', 'reg', NULL, 4, '2024-05-11 16:14:31', '2024-05-11 16:14:31', 'credit'),
(106, 45, 'wdwd', '0333207334', 'wdwdw', NULL, 6, '2024-05-11 16:17:24', '2024-05-11 16:17:24', 'credit'),
(107, 45, 'thang dz', '0333207334', 'thu duc', NULL, 4, '2024-05-11 16:41:13', '2024-05-11 16:41:13', 'credit'),
(108, 3, 'admin', '0333207334', 'wdwd', NULL, 1, '2024-05-15 12:30:04', '2024-05-15 12:30:04', 'cash'),
(109, 45, 'thang', '0333207334', 'wdwd', NULL, 6, '2024-05-15 12:30:32', '2024-05-15 12:30:32', 'cash'),
(110, 45, 'thang', '0333207334', 'fff', NULL, 1, '2024-05-15 13:26:13', '2024-05-15 13:26:13', 'cash'),
(111, 45, 'abc', '0333207334', 'wdasdsda', NULL, 1, '2024-05-15 14:31:24', '2024-05-15 14:31:24', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `size_id` int NOT NULL,
  `total` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `isReviewed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `size_id`, `total`, `quantity`, `isReviewed`) VALUES
(57, 66, 8, 3, 800, 1, 1),
(58, 66, 21, 2, 600, 1, 0),
(59, 66, 2, 2, 800, 1, 0),
(60, 66, 3, 2, 1800, 2, 0),
(61, 66, 3, 5, 900, 1, 0),
(62, 67, 3, 2, 900, 1, 0),
(63, 68, 2, 2, 800, 1, 1),
(95, 100, 42, 3, 1960, 2, 0),
(96, 101, 42, 3, 1960, 2, 0),
(97, 102, 42, 3, 1960, 2, 0),
(98, 103, 42, 3, 2940, 3, 0),
(99, 104, 42, 3, 1960, 2, 0),
(100, 105, 42, 3, 1960, 2, 0),
(101, 106, 42, 3, 1960, 2, 1),
(102, 107, 1, 2, 1497, 3, 0),
(103, 107, 2, 2, 1600, 2, 0),
(104, 107, 3, 4, 2700, 3, 0),
(105, 108, 5, 5, 1500, 1, 0),
(106, 108, 2, 1, 800, 1, 0),
(107, 109, 2, 1, 800, 1, 1),
(108, 110, 1, 1, 1497, 3, 0),
(109, 111, 1, 5, 2994, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`, `description`, `create_at`, `update_at`) VALUES
(1, 'To Confirm', 'To Confirm', '2024-05-08 13:53:57', '2024-05-08 13:53:57'),
(4, 'Canceled', 'Canceled', '2024-05-08 13:53:57', '2024-05-08 13:53:57'),
(5, 'To Ship', 'To Ship', '2024-05-08 13:53:57', '2024-05-08 13:53:57'),
(6, 'Completed', 'Completed', '2024-05-08 13:53:57', '2024-05-08 13:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `img` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `sale` int NOT NULL,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `status` int DEFAULT '1' COMMENT '1 Mở bán 0 Ẩn',
  `type` varchar(50) DEFAULT NULL COMMENT 'Normal Sale New',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `price`, `sale`, `category_id`, `brand_id`, `status`, `type`, `create_at`, `update_at`) VALUES
(1, 'Shirt BrandLove', '1715357716.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 600, 499, 3, 1, 1, 'sale', '2023-03-20 13:30:00', '2023-05-06 10:44:01'),
(2, 'Shirt Adidas D4R Blue', 'adidas-d4r-tee-men-hk7117-1.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 800, 500, 1, 1, 1, 'new', '2023-03-20 13:30:00', '2023-05-08 10:12:21'),
(3, 'Shirt Adidas HC2760 Black', 'adidas-m-ti-tee-hc2760-den-1.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 900, 800, 1, 1, 1, 'normal', '2023-03-20 13:30:00', '2023-03-20 13:30:00'),
(5, 'Hoodie Tokyo Carrier Pullover', '1715405961.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 1500, 1200, 2, 1, 1, 'normal', '2023-03-20 13:30:00', '2023-03-27 15:03:27'),
(6, 'Hoodie Lifestyle HL6925', '1715392033.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 1200, 800, 2, 1, 1, 'normal', '2023-03-20 13:30:00', '2023-03-20 13:30:00'),
(8, 'Shirt Sportwear Midnight Navy', '1715402954.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 800, 700, 3, 2, 1, 'normal', '2023-03-20 13:30:00', '2023-03-27 15:05:37'),
(9, 'Jacket Adidas GAMEDAY', '1715402131.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 1900, 1500, 15, 1, 1, 'normal', '2023-03-20 13:30:00', '2023-03-27 15:07:52'),
(10, 'Polo Gucci With Pocket', '1715401975.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 3000, 2800, 4, 4, 1, 'normal', '2023-03-20 13:30:00', '2023-03-27 15:08:19'),
(11, 'Hoodie Street NEUCLASSIC', '1715402263.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 400, 200, 2, 1, 1, 'normal', '2023-03-20 13:30:00', '2023-03-27 15:07:19'),
(12, 'Shirt City Escape', '1715402339.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 300, 100, 3, 1, 1, 'new', '2023-03-20 13:30:00', '2023-03-27 15:07:01'),
(13, 'Shirt Puma Cotton White', '1715402438.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 500, 490, 3, 3, 1, 'normal', '2023-03-20 13:30:00', '2023-03-27 15:06:28'),
(21, 'Shirt Addidas D2M', '1715406041.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 350, 300, 3, 1, 1, 'normal', '2023-03-20 13:30:00', '2023-03-29 22:04:45'),
(22, 'Shirt Adidas D4R Green', '1715402534.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 800, 500, 3, 1, 1, 'new', '2023-03-20 13:30:00', '2023-05-07 22:10:46'),
(23, 'Shirt Adidas Traning Supply', '1715402584.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 900, 800, 3, 1, 1, 'normal', '2023-03-20 13:30:00', '2023-05-07 22:09:18'),
(25, 'Shirt Carrier Pullover', '1715422649.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 289, 200, 3, 5, 0, 'normal', '2023-03-20 13:30:00', '2023-05-07 21:51:28'),
(26, 'Shirt Adidas Lifestyle HL6925', '1715402776.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 1200, 800, 3, 1, 1, 'normal', '2023-03-20 13:30:00', '2023-05-07 22:07:57'),
(27, 'Hoodie Power Knit Training', '1715402859.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 1700, 1200, 2, 3, 1, 'normal', '2023-03-20 13:30:00', '2023-05-07 22:05:45'),
(28, 'Shirt Adidas Studio Lounge', '1715403053.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 800, 700, 3, 1, 1, 'normal', '2023-03-20 13:30:00', '2023-05-07 22:06:33'),
(29, 'Hoodie Nike Midnight Navy', 'images/sp13/ao-nike-sportswear-men-s-hoodie-midnight-navy-cw4319-400-mau-xanh-navy-1.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 1900, 1500, 2, 2, 1, 'normal', '2023-03-20 13:30:00', '2023-05-07 22:02:43'),
(30, 'Jacket Adidas Bonded SST', '1715403217.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 3000, 2800, 15, 1, 1, 'new', '2023-03-20 13:30:00', '2023-05-07 21:59:14'),
(31, 'Jacket Short Sleeve Olive', 'images/sp11/ao-thun-lifestyle-nam-adidas-m-feelcozy-swt-h12221-1.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 900, 849, 15, 1, 1, 'normal', '2023-03-20 13:30:00', '2023-05-07 21:57:06'),
(32, 'Jacket FIREBIRD CLASSICS', '1715403479.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 1100, 999, 15, 1, 1, 'new', '2023-03-20 13:30:00', '2023-05-07 21:55:07'),
(33, 'Polo Cotton Black', 'images/sp9/ao-ba-lo-chay-bo-nam-nike-cz9180-010-1.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 200, 100, 4, 2, 1, 'sale', '2023-03-20 13:30:00', '2023-05-07 21:53:38'),
(34, 'Shirt ReBasic HM2856', 'images/sp4/reebok-re-basic-ss-tee-hm2865-1.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 550, 400, 3, 5, 1, 'new', '2023-05-07 21:40:00', NULL),
(35, 'T-Shirt Originals HS9471', '1715403726.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 650, 500, 1, 1, 1, 'normal', '2023-05-07 21:46:30', NULL),
(36, 'Shirt Pink HS128', 'images/sp7/nike-dq1011-824-1.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 300, 200, 3, 2, 1, 'new', '2023-05-07 21:48:52', NULL),
(37, 'Hoodie Sport Pullover Tokyo', '1715403928.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 1400, 1200, 2, 2, 1, 'normal', '2023-05-07 22:15:11', NULL),
(38, 'T-Shirt Embroidered Cotten', '1715403979.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 700, 600, 1, 4, 1, 'sale', '2023-05-07 22:18:10', '2023-05-08 11:06:10'),
(39, 'Jacket Tiro Suit-up', '1715404074.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 500, 100, 15, 1, 1, 'normal', '2023-05-08 14:09:56', '2023-05-08 14:13:56'),
(40, 'JERSEY SWEATSHIRT', '1715404173.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 680, 599, 15, 4, 1, 'new', '2024-05-11 12:09:33', '2024-05-11 12:09:33'),
(41, 'JERSEY SHIRT PRINT', '1715404257.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 450, 300, 3, 4, 1, 'new', '2024-05-11 12:10:57', '2024-05-11 12:10:57'),
(42, 'DENIM JACKET GG EMBOSSED', '1715404356.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 980, 890, 15, 5, 1, 'new', '2024-05-11 12:12:36', '2024-05-11 12:12:36'),
(43, 'Jacket CB WV TT', '1715404418.jpg', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 1090, 980, 15, 1, 1, 'new', '2024-05-11 12:13:38', '2024-05-11 12:13:38'),
(44, 'NSW CLUB HOODIE FZ BB', '1715408378.png', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 650, 599, 2, 2, 1, 'new', '2024-05-11 12:14:48', '2024-05-11 12:14:48'),
(45, 'Polo Slim-Fit', '1715408361.png', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 390, 350, 4, 2, 1, 'new', '2024-05-11 12:15:40', '2024-05-11 12:15:40'),
(46, ' Polo Sportswear', '1715408336.png', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 290, 200, 4, 2, 1, 'new', '2024-05-11 12:16:20', '2024-05-11 12:16:20'),
(47, 'Run Stripe Jacket', '1715404759.png', 'Over 30 years, Dainn has expanded from its Ho Chi Minh City origins into a global community; working with generations of artists, photographers, designers, musicians, filmmakers, and writers who defied conventions and contributed to its unique identity and attitude.\r\n<br/>\r\nS : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg\r\n<br/>\r\nM : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg\r\n<br/>\r\nL : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg\r\n<br/>\r\nXL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg\r\n<br/>\r\n2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg\r\n<br/>\r\n3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 700, 600, 15, 2, 1, 'new', '2024-05-11 12:17:13', '2024-05-11 12:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `products_size`
--

CREATE TABLE `products_size` (
  `product_id` int NOT NULL,
  `size_id` int NOT NULL,
  `quantity` int NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products_size`
--

INSERT INTO `products_size` (`product_id`, `size_id`, `quantity`, `create_at`, `update_at`) VALUES
(1, 1, 27, '2023-03-29 22:04:45', '2024-05-15 06:26:13'),
(1, 2, 24, '2023-03-29 22:04:45', '2024-05-11 09:41:13'),
(1, 3, 32, '2023-03-29 22:04:45', '2023-05-07 22:13:49'),
(1, 4, 30, '2023-03-29 22:04:45', NULL),
(1, 5, 24, '2023-03-29 22:04:45', '2024-05-15 07:31:24'),
(2, 1, 0, NULL, '2024-05-15 05:30:32'),
(2, 2, 101, NULL, '2024-05-11 09:41:13'),
(2, 3, -1, NULL, NULL),
(2, 4, 0, NULL, NULL),
(2, 5, 6, NULL, NULL),
(3, 1, 42, NULL, '2024-05-11 09:14:31'),
(3, 2, 42, NULL, '2024-05-11 09:03:53'),
(3, 3, 42, NULL, '2024-05-11 08:52:15'),
(3, 4, 39, NULL, '2024-05-11 09:41:13'),
(3, 5, 11, NULL, NULL),
(5, 1, 19, NULL, NULL),
(5, 2, 20, NULL, NULL),
(5, 3, 0, NULL, NULL),
(5, 4, 21, NULL, NULL),
(5, 5, 21, NULL, '2024-05-15 05:30:04'),
(6, 1, 24, NULL, NULL),
(6, 2, 25, NULL, NULL),
(6, 3, 26, NULL, NULL),
(6, 4, 27, NULL, NULL),
(6, 5, 28, NULL, NULL),
(8, 1, 16, NULL, NULL),
(8, 2, 0, NULL, NULL),
(8, 3, 115, NULL, '2023-04-10 21:52:03'),
(8, 4, 6, NULL, NULL),
(8, 5, 12, NULL, NULL),
(9, 1, 30, NULL, NULL),
(9, 2, 8, NULL, NULL),
(9, 3, 21, NULL, NULL),
(9, 4, 22, NULL, NULL),
(9, 5, 30, NULL, NULL),
(10, 1, 12, NULL, NULL),
(10, 2, 11, NULL, NULL),
(10, 3, 20, NULL, NULL),
(10, 4, 10, NULL, NULL),
(10, 5, 0, NULL, NULL),
(11, 1, 24, NULL, NULL),
(11, 2, 5, NULL, NULL),
(11, 3, 11, NULL, NULL),
(11, 4, 97, NULL, '2023-04-10 21:52:03'),
(11, 5, 23, NULL, NULL),
(12, 1, 16, NULL, NULL),
(12, 2, 0, NULL, NULL),
(12, 3, 0, NULL, NULL),
(12, 4, 0, NULL, NULL),
(12, 5, 13, NULL, NULL),
(13, 1, 2, NULL, NULL),
(13, 2, 1, NULL, NULL),
(13, 3, 0, NULL, NULL),
(13, 4, 0, NULL, NULL),
(13, 5, 3, NULL, NULL),
(21, 1, 30, '2023-03-29 22:04:45', NULL),
(21, 2, 45, '2023-03-29 22:04:45', NULL),
(21, 3, 32, '2023-03-29 22:04:45', NULL),
(21, 4, 30, '2023-03-29 22:04:45', NULL),
(21, 5, 30, '2023-03-29 22:04:45', NULL),
(22, 1, 2, '2023-05-07 22:10:46', NULL),
(22, 2, 3, '2023-05-07 22:10:46', NULL),
(22, 3, 1, '2023-05-07 22:10:46', NULL),
(22, 4, 2, '2023-05-07 22:10:46', NULL),
(22, 5, 6, '2023-05-07 22:10:46', NULL),
(23, 1, 8, '2023-05-07 22:09:18', NULL),
(23, 2, 9, '2023-05-07 22:09:18', NULL),
(23, 3, 10, '2023-05-07 22:09:18', NULL),
(23, 4, 10, '2023-05-07 22:09:18', NULL),
(23, 5, 11, '2023-05-07 22:09:18', NULL),
(25, 1, 19, '2023-05-07 21:51:28', NULL),
(25, 2, 20, '2023-05-07 21:51:28', NULL),
(25, 3, 10, '2023-05-07 21:51:28', NULL),
(25, 4, 21, '2023-05-07 21:51:28', NULL),
(25, 5, 22, '2023-05-07 21:51:28', NULL),
(26, 1, 24, '2023-05-07 22:07:57', NULL),
(26, 2, 25, '2023-05-07 22:07:57', NULL),
(26, 3, 26, '2023-05-07 22:07:57', NULL),
(26, 4, 27, '2023-05-07 22:07:57', NULL),
(26, 5, 28, '2023-05-07 22:07:57', NULL),
(27, 1, 30, '2023-05-07 22:05:45', NULL),
(27, 2, 10, '2023-05-07 22:05:45', NULL),
(27, 3, 1, '2023-05-07 22:05:45', NULL),
(27, 4, 4, '2023-05-07 22:05:45', NULL),
(27, 5, 25, '2023-05-07 22:05:45', NULL),
(28, 1, 16, '2023-05-07 22:06:33', NULL),
(28, 3, 10, '2023-05-07 22:06:33', NULL),
(28, 4, 2, '2023-05-07 22:06:33', NULL),
(28, 5, 12, '2023-05-07 22:06:33', NULL),
(29, 1, 30, '2023-05-07 22:02:43', NULL),
(29, 2, 8, '2023-05-07 22:02:43', NULL),
(29, 3, 21, '2023-05-07 22:02:43', NULL),
(29, 4, 22, '2023-05-07 22:02:43', NULL),
(29, 5, 30, '2023-05-07 22:02:43', NULL),
(30, 1, 12, '2023-05-07 21:59:14', NULL),
(30, 2, 11, '2023-05-07 21:59:14', NULL),
(30, 3, 20, '2023-05-07 21:59:14', NULL),
(30, 4, 10, '2023-05-07 21:59:14', NULL),
(31, 1, 24, '2023-05-07 21:57:06', NULL),
(31, 2, 0, '2023-05-07 21:57:06', NULL),
(31, 3, 11, '2023-05-07 21:57:06', NULL),
(31, 4, 27, '2023-05-07 21:57:06', NULL),
(31, 5, 23, '2023-05-07 21:57:06', NULL),
(32, 1, 16, '2023-05-07 21:55:07', NULL),
(32, 2, 3, '2023-05-07 21:55:07', NULL),
(32, 3, 7, '2023-05-07 21:55:07', NULL),
(32, 4, 9, '2023-05-07 21:55:07', NULL),
(32, 5, 14, '2023-05-07 21:55:07', NULL),
(33, 1, 2, '2023-05-07 21:53:38', NULL),
(33, 2, 1, '2023-05-07 21:53:38', NULL),
(33, 3, 1, '2023-05-07 21:53:38', NULL),
(33, 4, 2, '2023-05-07 21:53:38', NULL),
(33, 5, 3, '2023-05-07 21:53:38', NULL),
(34, 1, 10, '2023-05-07 21:40:00', NULL),
(34, 2, 24, '2023-05-07 21:40:00', NULL),
(34, 3, 14, '2023-05-07 21:40:00', NULL),
(34, 4, 21, '2023-05-07 21:40:00', NULL),
(34, 5, 24, '2023-05-07 21:40:00', NULL),
(35, 1, 10, '2023-05-07 21:46:30', NULL),
(35, 2, 2, '2023-05-07 21:46:30', NULL),
(35, 3, 9, '2023-05-07 21:46:30', NULL),
(35, 4, 11, '2023-05-07 21:46:30', NULL),
(35, 5, 42, '2023-05-07 21:46:30', NULL),
(36, 1, 13, '2023-05-07 21:48:52', NULL),
(36, 2, 7, '2023-05-07 21:48:52', NULL),
(36, 3, 11, '2023-05-07 21:48:52', NULL),
(36, 4, 31, '2023-05-07 21:48:52', NULL),
(36, 5, 32, '2023-05-07 21:48:52', NULL),
(37, 1, 20, '2023-05-07 22:15:11', NULL),
(37, 2, 31, '2023-05-07 22:15:11', NULL),
(37, 3, 10, '2023-05-07 22:15:11', NULL),
(37, 4, 18, '2023-05-07 22:15:11', NULL),
(37, 5, 12, '2023-05-07 22:15:11', NULL),
(38, 1, 32, '2023-05-07 22:18:10', NULL),
(38, 2, 23, '2023-05-07 22:18:10', NULL),
(38, 3, 10, '2023-05-07 22:18:10', NULL),
(38, 4, 14, '2023-05-07 22:18:10', NULL),
(38, 5, 13, '2023-05-07 22:18:10', NULL),
(39, 2, 41, '2024-05-11 13:26:18', '2024-05-11 13:26:18'),
(39, 3, 21, '2024-05-11 13:26:57', '2024-05-11 13:26:57'),
(39, 4, 20, '2024-05-11 13:27:05', '2024-05-11 13:27:05'),
(39, 8, 2, '2024-05-11 13:27:22', '2024-05-11 13:27:22'),
(40, 2, 22, '2024-05-11 13:25:44', '2024-05-11 13:25:44'),
(40, 3, 14, '2024-05-11 13:25:53', '2024-05-11 13:25:53'),
(40, 4, 6, '2024-05-11 13:26:01', '2024-05-11 13:26:01'),
(40, 5, 2, '2024-05-11 13:26:07', '2024-05-11 13:26:07'),
(41, 2, 39, '2024-05-11 13:24:59', '2024-05-11 13:24:59'),
(41, 3, 13, '2024-05-11 13:25:20', '2024-05-11 13:25:20'),
(41, 4, 2, '2024-05-11 13:25:28', '2024-05-11 13:25:28'),
(42, 3, 10, '2024-05-11 13:22:42', '2024-05-11 09:17:24'),
(42, 4, 13, '2024-05-11 13:22:53', '2024-05-11 13:22:53'),
(43, 2, 31, '2024-05-11 13:21:54', '2024-05-11 13:21:54'),
(43, 3, 15, '2024-05-11 13:22:03', '2024-05-11 13:22:03'),
(43, 4, 13, '2024-05-11 13:22:12', '2024-05-11 13:22:12'),
(43, 5, 5, '2024-05-11 13:22:19', '2024-05-11 13:22:19'),
(44, 2, 22, '2024-05-11 13:21:31', '2024-05-11 13:21:31'),
(44, 3, 13, '2024-05-11 13:21:23', '2024-05-11 13:21:23'),
(44, 4, 8, '2024-05-11 13:21:42', '2024-05-11 13:21:42'),
(45, 1, 23, '2024-05-11 13:20:55', '2024-05-11 13:20:55'),
(45, 2, 55, '2024-05-11 13:21:03', '2024-05-11 13:21:03'),
(45, 4, 5, '2024-05-11 13:21:12', '2024-05-11 13:21:12'),
(46, 2, 9, '2024-05-11 13:20:41', '2024-05-11 13:20:41'),
(46, 3, 12, '2024-05-11 13:20:49', '2024-05-11 13:20:49'),
(47, 2, 32, '2024-05-11 13:14:15', '2024-05-11 13:14:15'),
(47, 3, 22, '2024-05-11 13:14:26', '2024-05-11 13:14:26'),
(47, 4, 21, '2024-05-11 13:14:50', '2024-05-11 13:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text,
  `star` int DEFAULT NULL,
  `status` int DEFAULT '1' COMMENT '0: An 1:Hien Thi',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `name`, `email`, `message`, `star`, `status`, `create_at`) VALUES
(8, 1, 3, 'Minh Lâm', 'tienhai@gmail.com', 'san pham ok lamnh', 5, 1, '2023-04-03 16:40:20'),
(9, 1, 3, 'Minh Lâm', 'minhlam@gmail.com', 'ok lam do nha', 3, 1, '2023-04-03 16:44:32'),
(10, 12, 9, 'Minh Lâm', 'tienhai488@gmail.com', 'ok nha moi nguoio', 2, 1, '2023-04-03 16:56:27'),
(11, 12, 10, 'Minh Lâm', 'minhlam@gmail.com', 'minhlam@gmail.com', 5, 1, '2023-04-03 16:58:09'),
(12, 1, 45, 'PTTK_Tuan3', 'tienhai9a2@gmail.com', 'tienhai9a2@gmail.com', 5, 1, '2023-04-03 21:02:24'),
(28, 12, 45, 'haile@gmail.com', 'haile@gmail.com', 'haile@gmail.com', 5, 1, '2023-04-14 18:27:39'),
(29, 12, 45, 'TienHai', 'tienhai@gmail.com', 'Binh luan danh gia san pham', 5, 1, '2023-04-14 19:57:26'),
(34, 12, 9, 'TienHai488', 'tienhai4888@gmail.com', 'Binh luan cho san pham tesst chuc nawng', 3, 1, '2023-04-14 20:43:25'),
(35, 12, 9, 'TienHai488', 'tienhai4888@gmail.com', 'Binh luan cho san pham tesst chuc nawng', 3, 1, '2024-05-06 15:08:41'),
(36, 42, 45, 'ducthang', 'thanngit@gmail.com', 'so beautiful', 4, 1, '2024-05-11 16:56:37'),
(37, 2, 45, 'ducthang', 'thanngit@gmail.com', 'ffffffff', 5, 1, '2024-05-15 13:18:49'),
(38, 2, 45, 'ducthang', 'thanngit@gmail.com', 'fff', 4, 1, '2024-05-15 13:20:32'),
(39, 8, 45, 'ducthang', 'thanngit@gmail.com', 'vvv', 4, 1, '2024-05-15 13:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `permission` text,
  `status` int NOT NULL DEFAULT '1',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permission`, `status`, `create_at`, `update_at`) VALUES
(2, 'User', 'User', 1, '2023-03-17 11:18:31', '2024-05-08 08:50:28'),
(3, 'Process Orders', '{\"order\":[\"update\"]}', 1, '2023-03-17 11:18:43', '2024-05-11 09:23:29'),
(8, 'Administrator', '{\"roles\":[\"add\",\"update\",\"delete\",\"permission\"],\"products\":[\"add\",\"update\",\"delete\"],\"users\":[\"add\",\"update\",\"delete\"],\"orders\":[\"update\"]}', 1, '2023-04-01 20:31:31', '2023-04-02 08:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `description`, `status`, `create_at`, `update_at`) VALUES
(1, 'S', 'S : Length 65 Width 50 | 1m36 - 1m49, 45 - 58Kg', 1, NULL, NULL),
(2, 'M', 'M : Length 69 Width 53 | 1m50 - 1m63, 45 - 58Kg', 1, NULL, NULL),
(3, 'L', 'L : Length 73 Width 56 | 1m60 - 1m73, 50 - 65Kg', 1, NULL, NULL),
(4, 'XL', 'XL: Length: 77 Width: 59 | 1m74 - 1m8, 65Kg - 80Kg', 1, NULL, NULL),
(5, '2XL', '2XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 1, NULL, NULL),
(8, '3XL', '3XL: Length: 80 Width: 61 | 1m8 - 1m84, 80Kg - 95Kg', 0, '2024-05-07 07:16:26', '2024-05-07 00:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'images/avatar/default.png',
  `status` int NOT NULL DEFAULT '1' COMMENT '1 Kich hoat 0 Chua kich hoat',
  `type` varchar(50) DEFAULT 'user',
  `role_id` int NOT NULL DEFAULT '2',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `password`, `image`, `status`, `type`, `role_id`, `create_at`, `update_at`) VALUES
(3, 'Administrators', 'admin@gmail.com', '0333207334', '$2y$10$Wm/iV7Uml8hcsIJOQDJ53OzxfT05mUHlN9QsMGZPEJ4lUfNN3lS5i', 'images/avatar/6638ed5fdd2823.75382897_1715006815.png', 1, 'member', 8, '2023-03-17 11:05:40', '2024-05-06 15:48:04'),
(45, 'ducthang', 'thanngit@gmail.com', '0123123123', '$2y$10$zIttZ3qWteOyBc6wJB56tekkiwblqbDNxrUT6Rb/D3G9SmoSp.oSi', 'images/avatar/65f91f62623ce2.97199938_1710825314.jpg', 1, 'user', 2, '2023-10-19 10:49:41', '2024-05-06 13:01:31'),
(50, 'chi tai', 'tailuongbr13@gmail.com', '000002222', '$2y$10$c2XukQssI9WOOHy.XsLFLecinGwpMqjxW7kEHEDbQLTZtUNZkW72e', 'images/avatar/default.png', 1, 'user', 3, '2024-05-06 18:06:39', '2024-05-06 18:06:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_user` (`user_id`),
  ADD KEY `fk_cart_product` (`product_id`),
  ADD KEY `fk_cart_size` (`size_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image_product` (`product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`user_id`),
  ADD KEY `fk_bill_order_status` (`id_order_status`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_bill_bill` (`order_id`),
  ADD KEY `fk_bill_detail_product` (`product_id`),
  ADD KEY `fk_bill_detail_size` (`size_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_categorie` (`category_id`),
  ADD KEY `fk_product_brand` (`brand_id`);

--
-- Indexes for table `products_size`
--
ALTER TABLE `products_size`
  ADD PRIMARY KEY (`product_id`,`size_id`),
  ADD KEY `fk_product_size_size` (`size_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_review_product` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_group` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cart_size` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_image_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_bill_order_status` FOREIGN KEY (`id_order_status`) REFERENCES `order_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_bill_detail_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bill_detail_size` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detail_bill_bill` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_categorie` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products_size`
--
ALTER TABLE `products_size`
  ADD CONSTRAINT `fk_product_size_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_product_size_size` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_review_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_group` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
