-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220503.92457c1607
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 10:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'shruti', 'shruti', 'eab6930b3c87b22874b40a0e52fe1ca3'),
(2, 'Pratyasha', 'Pratyasha', 'cba821555a126918be708fde30454d5a'),
(3, 'shruti', 'shruti', 'e2fc714c4727ee9395f324cd2e7f331f'),
(7, 'Pratyasha', 'pratya', 'd16fb36f0911f878998c136191af705e'),
(8, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(13, 'Indian Cuisine', 'Food_Category_180.jpg', 'Yes', 'Yes'),
(14, 'Italian Cuisine', 'Food_Category_535.jpg', 'Yes', 'Yes'),
(15, 'South Asian Cuisine', 'Food_Category_897.png', 'Yes', 'Yes'),
(16, 'Chinese Cuisine', 'Food_Category_234.jpg', 'Yes', 'Yes'),
(17, 'Japanese Cuisine', 'Food_Category_465.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(10, 'Palak Paneer', '', '200.00', 'Food-Name-8831.webp', 13, 'yes', 'yes'),
(11, 'Chana Masala', '', '150.00', 'Food-Name-7752.jpg', 13, 'yes', 'yes'),
(12, 'Butter-Brushed Naan', '', '10.00', 'Food-Name-431.jpg', 13, 'yes', 'yes'),
(13, 'Dal Makhani', '', '160.00', 'Food-Name-6524.jpg', 13, 'yes', 'yes'),
(14, 'Biryani', '', '210.00', 'Food-Name-2035.jpg', 13, 'yes', 'yes'),
(15, 'Caprese Salad With Pesto Sauce', '', '180.00', 'Food-Name-9778.webp', 14, 'yes', 'yes'),
(16, 'Bruschetta', '', '150.00', 'Food-Name-2461.jpg', 14, 'yes', 'yes'),
(17, 'White Sauce Pasta ', '', '110.00', 'Food-Name-2834.jpg', 14, 'yes', 'yes'),
(18, 'Red Sauce Pasts', '', '110.00', 'Food-Name-7038.jpg', 14, 'yes', 'yes'),
(19, 'Margherita Pizza', '', '200.00', 'Food-Name-3503.jpg', 14, 'yes', 'yes'),
(20, 'Kottu', '', '250.00', 'Food-Name-6064.jpg', 15, 'yes', 'yes'),
(21, 'Momos', '', '80.00', 'Food-Name-4167.jpg', 15, 'yes', 'yes'),
(22, 'Masala Dosa', '', '100.00', 'Food-Name-1574.jpg', 15, 'yes', 'yes'),
(23, 'Ema Datshi', '', '220.00', 'Food-Name-8449.jpg', 15, 'yes', 'yes'),
(24, ' Kebabs', '', '250.00', 'Food-Name-6028.jpg', 15, 'yes', 'yes'),
(25, 'Fried Rice', '', '100.00', 'Food-Name-5449.jpg', 16, 'yes', 'yes'),
(26, 'Tofu', '', '150.00', 'Food-Name-7847.jpg', 16, 'yes', 'yes'),
(27, 'Noodles', '', '160.00', 'Food-Name-9274.jpg', 16, 'yes', 'yes'),
(28, 'Chinese Hamburger', '', '180.00', 'Food-Name-4198.jpg', 16, 'yes', 'yes'),
(29, 'Scallion Pancakes', '', '190.00', 'Food-Name-8175.jpg', 16, 'yes', 'yes'),
(30, 'Sushi', '', '200.00', 'Food-Name-5912.jpg', 17, 'yes', 'yes'),
(31, 'Ramen', '', '170.00', 'Food-Name-9245.jpg', 17, 'yes', 'yes'),
(32, 'Soba', '', '200.00', 'Food-Name-7824.jpg', 17, 'yes', 'yes'),
(33, 'Kashipan', '', '100.00', 'Food-Name-8700.JPG', 17, 'yes', 'yes'),
(34, 'Miso Soup', '', '150.00', 'Food-Name-1181.jpg', 17, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Margherita Pizza', '200.00', 2, '400.00', '2022-05-05 07:48:11', 'Cancelled', 'Atharv', '987654329', 'atharv@gmail.com', 'agra'),
(3, 'White Sauce Pasta ', '110.00', 1, '110.00', '2022-05-05 07:52:02', 'Delivered', 'Himanshi', '923456789', 'himanshi@gmail.com', 'Agra'),
(4, 'Kashipan', '100.00', 1, '100.00', '2022-05-05 08:21:21', 'Delivered', 'Ashish', '9997994573', 'Agra', 'Agra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



