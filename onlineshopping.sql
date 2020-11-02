-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2020 at 11:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Samaung', 'img/brands/1.jpg', '2020-10-12 08:32:39', '2020-10-12 08:34:19'),
(2, 'Dell', 'img/brands/1.jpg', '2020-10-12 08:32:39', '2020-10-12 08:34:21'),
(3, 'Lenove', 'img/brands/1.jpg', '2020-10-12 08:32:39', '2020-10-12 08:34:24'),
(4, 'Acer', 'img/brands/1.jpg', '2020-10-12 08:32:39', '2020-10-12 08:34:27'),
(5, 'No Brand', 'img/brands/1.jpg', '2020-10-12 08:33:57', '2020-10-12 08:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `photo`, `name`, `created_at`, `updated_at`) VALUES
(1, 'img/categories/1.jpg', 'Electronic Devices', '2020-10-12 08:14:24', '2020-10-12 08:15:38'),
(2, 'img/categories/1.jpg', 'Men\'s Clothings', '2020-10-12 08:14:24', '2020-10-12 08:15:40'),
(3, 'img/categories/1.jpg', 'Women\'s Clothings', '2020-10-12 08:14:24', '2020-10-12 08:15:45'),
(4, 'img/categories/1.jpg', 'Watches', '2020-10-12 08:14:24', '2020-10-12 08:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `codeno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `codeno`, `name`, `photo`, `price`, `discount`, `description`, `brand_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 'CODE_256205', 'Item 1 Update', 'img/items/m_watches2.jpg', '50000', '25003', 'Blah Blah...........', 1, 1, '2020-10-12 08:04:18', '2020-10-13 09:52:38'),
(2, 'CODE_823260', 'Item 2', 'img/items/desktops2.jpg', '30000', '25000', 'Hello blah blah', 1, 1, '2020-10-12 08:05:35', '2020-10-12 08:05:00'),
(3, 'CODE_435120', 'Item 3', 'img/items/m_watches3.jpg', '25000', '20000', 'Hello', 4, 5, '2020-10-12 08:29:43', '2020-10-12 08:29:43'),
(4, 'CODE_405530', 'Item 4', 'img/items/desktops3.jpg', '800000', '750000', 'Blah Blah...............', 2, 4, '2020-10-12 09:38:05', '2020-10-12 09:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_order`
--

INSERT INTO `item_order` (`id`, `order_id`, `qty`, `item_id`, `created_at`, `updated_at`) VALUES
(18, '1', 1, 3, '2020-10-16 09:59:23', '0000-00-00 00:00:00'),
(19, '1', 1, 4, '2020-10-16 09:59:23', '0000-00-00 00:00:00'),
(20, '1', 1, 2, '2020-10-16 09:59:23', '0000-00-00 00:00:00'),
(21, '2', 1, 3, '2020-10-16 10:03:49', '0000-00-00 00:00:00'),
(22, '2', 1, 4, '2020-10-16 10:03:49', '0000-00-00 00:00:00'),
(23, '2', 1, 2, '2020-10-16 10:03:49', '0000-00-00 00:00:00'),
(24, '3', 1, 3, '2020-10-16 10:04:23', '0000-00-00 00:00:00'),
(25, '3', 1, 4, '2020-10-16 10:04:23', '0000-00-00 00:00:00'),
(26, '3', 1, 2, '2020-10-16 10:04:23', '0000-00-00 00:00:00'),
(27, '4', 1, 3, '2020-10-16 10:45:40', '0000-00-00 00:00:00'),
(28, '4', 1, 4, '2020-10-16 10:45:40', '0000-00-00 00:00:00'),
(29, '4', 1, 2, '2020-10-16 10:45:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 3, 1),
(2, 4, 2),
(3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `voucherno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderdate`, `voucherno`, `total`, `note`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2020-10-16', '1602799163', '795000', 'Hello', 1, 3, '2020-10-16 10:37:34', '0000-00-00 00:00:00'),
(3, '2020-10-16', '1602799463', '795000', 'kdsjflkasj', 0, 3, '2020-10-16 10:04:23', '0000-00-00 00:00:00'),
(4, '2020-10-16', '1602801940', '795000', '', 1, 5, '2020-10-16 10:46:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Client', '2020-10-14 10:03:54', '0000-00-00 00:00:00'),
(2, 'Admin', '2020-10-14 10:03:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Mobiles', 1, '2020-10-12 08:16:55', '2020-10-12 08:16:55'),
(2, 'Tablets', 1, '2020-10-12 08:16:55', '2020-10-12 08:16:55'),
(3, 'Laptops', 1, '2020-10-12 08:16:55', '2020-10-12 08:16:55'),
(4, 'Desktips', 1, '2020-10-12 08:16:55', '2020-10-12 08:16:55'),
(5, 'Camera\r\n', 1, '2020-10-12 08:16:55', '2020-10-12 08:16:55'),
(6, 'Hoodies', 2, '2020-10-12 08:18:31', '2020-10-12 08:18:31'),
(7, 'Polo Shirts', 2, '2020-10-12 08:18:31', '2020-10-12 08:18:31'),
(8, 'T-Shirts', 2, '2020-10-12 08:18:31', '2020-10-12 08:18:31'),
(9, 'Jeans', 2, '2020-10-12 08:18:31', '2020-10-12 08:18:31'),
(10, 'Short Pants', 2, '2020-10-12 08:18:31', '2020-10-12 08:18:31'),
(11, 'Sweaters', 2, '2020-10-12 08:18:31', '2020-10-12 08:18:31'),
(12, 'Dress', 3, '2020-10-12 08:19:56', '2020-10-12 08:19:56'),
(13, 'Shorts', 3, '2020-10-12 08:19:56', '2020-10-12 08:19:56'),
(14, 'Jackets', 3, '2020-10-12 08:19:56', '2020-10-12 08:19:56'),
(15, 'Coats', 3, '2020-10-12 08:19:56', '2020-10-12 08:19:56'),
(16, 'Skirts', 3, '2020-10-12 08:19:56', '2020-10-12 08:19:56'),
(17, 'Shirts', 3, '2020-10-12 08:19:56', '2020-10-12 08:19:56'),
(18, 'Men\'s Watches', 4, '2020-10-12 08:21:32', '2020-10-12 08:21:32'),
(19, 'Women\'s Watches', 4, '2020-10-12 08:21:32', '2020-10-12 08:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profile`, `email`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Mg Mg', 'img/users/New Project.png', 'mgmg@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0987654321234', 'Yangon', '2020-10-14 09:51:43', '0000-00-00 00:00:00'),
(2, 'Ma Ma', 'img/users/New Project.png', 'mama@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '098765432123', 'Yangon\r\n', '2020-10-14 10:03:04', '0000-00-00 00:00:00'),
(3, 'aung aung', 'img/users/lukasz-niescioruk-rYZZmUm-l5w-unsplash.jpg', 'aungaung@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0987654321', 'Yagnon', '2020-10-14 10:10:40', '0000-00-00 00:00:00'),
(4, 'Admin', 'img/users/unnamed.png', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '09876413213', 'Mandalay', '2020-10-14 10:11:51', '0000-00-00 00:00:00'),
(5, 'Kaung Kaung', 'img/users/bg3.jpg', 'kaungkaung@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '098765123456', 'Yagnon, Ahlon', '2020-10-16 10:45:21', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
