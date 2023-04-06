-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2023 at 03:28 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19130340_db_jewelsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `name`) VALUES
(1, 'Normal'),
(2, 'Gold'),
(3, 'Premium'),
(4, 'Diamond');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(233) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `image`) VALUES
(1, 'jaffar', 'JaffarAbbas@123', '../vendor/images/admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `cname`, `status`) VALUES
(1, 'latest Products', 1),
(2, 'Our Premium', 1),
(3, 'Artifical Products', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `conid` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(233) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `cid` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `TAX` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`TAX`) VALUES
(50);

-- --------------------------------------------------------

--
-- Stand-in structure for view `SHOW_TEMP_USER_ORDER_ALL_DATA`
-- (See below for the actual view)
--
CREATE TABLE `SHOW_TEMP_USER_ORDER_ALL_DATA` (
`id` int(255)
,`user_token` varchar(255)
,`name` varchar(100)
,`email` varchar(233)
,`phone` varchar(100)
,`address` varchar(250)
,`iid` int(100)
,`quantity` int(100)
,`total_price` double
,`status` tinyint(1)
,`orderat` datetime
,`pid` int(255)
,`product name` varchar(100)
,`description` varchar(255)
,`price` double
,`image` mediumtext
,`product quantity` int(100)
,`product status` tinyint(4)
,`created_on` timestamp
,`cid` int(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `SHOW_USER_ORDER_ALL_DATA`
-- (See below for the actual view)
--
CREATE TABLE `SHOW_USER_ORDER_ALL_DATA` (
`oid` int(255)
,`user_id` int(255)
,`user_name` varchar(201)
,`email` varchar(233)
,`user_status` tinyint(1)
,`user_created` datetime
,`uid` int(100)
,`iid` int(233)
,`order_quantity` int(100)
,`total_price` double
,`uo_status` tinyint(1)
,`order_created_at` datetime
,`product_id` int(255)
,`name` varchar(100)
,`image` mediumtext
,`price` double
,`inventory` int(100)
,`category` int(255)
,`product_status` tinyint(4)
,`product_created_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `temp_user_orders`
--

CREATE TABLE `temp_user_orders` (
  `id` int(255) NOT NULL,
  `user_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(233) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `iid` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_price` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `orderat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, '1'),
(2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(233) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `actype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `oid` int(255) NOT NULL,
  `uid` int(100) NOT NULL,
  `iid` int(233) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_price` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `SHOW_TEMP_USER_ORDER_ALL_DATA`
--
DROP TABLE IF EXISTS `SHOW_TEMP_USER_ORDER_ALL_DATA`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id19130340_root`@`%` SQL SECURITY DEFINER VIEW `SHOW_TEMP_USER_ORDER_ALL_DATA`  AS  select `tu`.`id` AS `id`,`tu`.`user_token` AS `user_token`,`tu`.`name` AS `name`,`tu`.`email` AS `email`,`tu`.`phone` AS `phone`,`tu`.`address` AS `address`,`tu`.`iid` AS `iid`,`tu`.`quantity` AS `quantity`,`tu`.`total_price` AS `total_price`,`tu`.`status` AS `status`,`tu`.`orderat` AS `orderat`,`p`.`pid` AS `pid`,`p`.`name` AS `product name`,`p`.`description` AS `description`,`p`.`price` AS `price`,json_extract(`p`.`image`,'$[0]') AS `image`,`p`.`quantity` AS `product quantity`,`p`.`status` AS `product status`,`p`.`created_on` AS `created_on`,`p`.`cid` AS `cid` from (`temp_user_orders` `tu` join `products` `p` on(`tu`.`iid` = `p`.`pid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `SHOW_USER_ORDER_ALL_DATA`
--
DROP TABLE IF EXISTS `SHOW_USER_ORDER_ALL_DATA`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id19130340_root`@`%` SQL SECURITY DEFINER VIEW `SHOW_USER_ORDER_ALL_DATA`  AS  select `uo`.`oid` AS `oid`,`u`.`id` AS `user_id`,concat(`u`.`firstname`,'_',`u`.`lastname`) AS `user_name`,`u`.`email` AS `email`,`u`.`status` AS `user_status`,`u`.`created_at` AS `user_created`,`uo`.`uid` AS `uid`,`uo`.`iid` AS `iid`,`uo`.`quantity` AS `order_quantity`,`uo`.`total_price` AS `total_price`,`uo`.`status` AS `uo_status`,`uo`.`created_at` AS `order_created_at`,`p`.`pid` AS `product_id`,`p`.`name` AS `name`,json_extract(`p`.`image`,'$[0]') AS `image`,`p`.`price` AS `price`,`p`.`quantity` AS `inventory`,`p`.`cid` AS `category`,`p`.`status` AS `product_status`,`p`.`created_on` AS `product_created_at` from ((`user_orders` `uo` join `products` `p` on(`uo`.`iid` = `p`.`pid`)) join `users` `u` on(`uo`.`uid` = `u`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`conid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `product_to_categories` (`cid`);

--
-- Indexes for table `temp_user_orders`
--
ALTER TABLE `temp_user_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_token` (`user_token`),
  ADD KEY `tem_orders_to_products` (`iid`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `order_to_user` (`uid`),
  ADD KEY `orders_to_products` (`iid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `conid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_user_orders`
--
ALTER TABLE `temp_user_orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `oid` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_to_categories` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`);

--
-- Constraints for table `temp_user_orders`
--
ALTER TABLE `temp_user_orders`
  ADD CONSTRAINT `tem_orders_to_products` FOREIGN KEY (`iid`) REFERENCES `products` (`pid`);

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `order_to_user` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_to_products` FOREIGN KEY (`iid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
