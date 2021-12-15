-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2019 at 06:52 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'test', 'admin@mail.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pre_qty` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `user_name`, `product_id`, `qty`, `pre_qty`, `date`) VALUES
(15, 1, 'test user', 13, 5, 0, '2019-12-09 22:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Electronic'),
(3, 'Cleanning'),
(4, 'Fashion'),
(5, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `pro_id`, `name`, `email`, `comment`, `date`) VALUES
(1, 12, 'Tauhid', 'user@mail.com', '					    	\r\n					    This comment is just a demo comment', '2019-11-03 17:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `qty`, `category`, `status`, `description`, `price`, `image`) VALUES
(1, 'Digital Camera', 50, 'Electronic', 'featured', '<p>Sony digital camera for quick photography.</p>', 20000, 'digital camera.jpg'),
(2, 'DSLR Camera', 20, 'Electronic', 'featured', '<p>New Branded DSLR Camera</p>', 50000, 'dslr.jpg'),
(3, 'Table Fan', 20, 'Electronic', 'featured', '<p>New branded table fan.</p>', 2000, 'fan.jpg'),
(4, 'Fridge', 20, 'Electronic', 'new', '<p>Brand new double door fridge</p>', 90000, 'fridge.jpg'),
(5, 'Laptop', 20, 'Electronic', 'new', '<p>Brand new laptop</p>', 60000, 'laptop.jpg'),
(6, 'Mobile', 20, 'Electronic', 'new', '<p>Brand new mobile phone</p>', 25000, 'mobile.jpg'),
(7, 'Shirt', 16, 'Fashion', 'featured', '<p>New stylish shirt</p>', 500, 'shirt.jpeg'),
(8, 'Watch', 20, 'Fashion', 'new', '<p>New branded watch</p>', 1200, 'watch.jpg'),
(9, 'Bag', 20, 'Accessories', 'new', '<p>New brand bag</p>', 1000, 'bag.jpg'),
(10, 'Bag', 20, 'Accessories', 'featured', '<p>New brand bag</p>', 1200, 'bag2.jpg'),
(11, 'Bag', 20, 'Accessories', 'new', '<p>New brand bag</p>', 1100, 'bag3.jpg'),
(12, 'Bag', 20, 'Accessories', 'featured', '<p>New brand bag</p>', 900, 'bag4.jpg'),
(13, 'Shirt', 10, 'Fashion', 'featured', '<p>Top brand shirt</p>', 1000, 'shirt3.jpg'),
(14, 'Shirt', 20, 'Fashion', 'new', '<p>Top brand shirt</p>', 900, 'shirt4.jpg'),
(15, 'Handycam', 20, 'Electronic', 'featured', '<p>ads;fjasd;lasjfldjasdsf</p>', 100000, 'handycam.jpg'),
(16, 'Lipstick', 20, 'Fashion', 'top-sale', '<p>Top branded lipstick</p>', 800, 'lipstick.jpg'),
(17, 'Lipstick ', 5, 'Fashion', 'top-sale', '<p>Top branded lipstick</p>', 500, 'lipstick2.jpg'),
(18, 'Necklace', 20, 'Fashion', 'top-sale', '<p>Fake gold necklace</p>', 20000, 'neclace.jpg'),
(19, 'Necklace', 20, 'Fashion', 'top-sale', '<p>Fake gold necklace</p>', 5000, 'neclace2.jpg'),
(20, 'Beauty product', 20, 'Electronic', 'flash-sale', '<p>This is the description for this product.</p>', 999, 'mascara.jpg'),
(21, 'Beauty product', 20, 'Cleanning', 'flash-sale', '<p>This is the description for the product.</p>', 999, 'mascara.jpg'),
(22, 'Digital camera', 20, 'Electronic', 'flash-sale', '<p>This product description is demo content.</p>', 999, 'digital camera.jpg'),
(23, 'Digital cameta', 20, 'Electronic', 'flash-sale', '<p>The description for the sample product.</p>', 999, 'digital camera.jpg'),
(24, 'Imported Laptop', 19, 'Electronic', 'imported', '<p>This is laptop description</p>', 15000, 'laptop.jpg'),
(25, 'Glasses', 18, 'Fashion', 'imported', '<p>Imported eye glasses</p>', 500, 'sunglasses.jpg'),
(26, 'Table fan', 20, 'Electronic', 'imported', '<p>Imported table fan</p>', 2000, 'fan.jpg'),
(27, 'Fridge', 20, 'Electronic', 'imported', '<p>Imported fridge</p>', 45000, 'fridge.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pro_order`
--

CREATE TABLE `pro_order` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(15) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `pre_qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `trxid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pro_order`
--

INSERT INTO `pro_order` (`id`, `name`, `user_id`, `email`, `phone`, `pro_id`, `pro_name`, `qty`, `pre_qty`, `price`, `method`, `total`, `trxid`, `address`, `date`, `status`) VALUES
(17, 'new1', 1, 'new1@mail.com', 45788912, 13, 'Shirt', 5, 0, 1000, 'cod', 5000, '', 'dhaka', '2019-12-09 22:03:25', 0),
(18, 'new2', 1, 'new2@mail.com', 123456789, 13, 'Shirt', 5, 0, 1000, 'cod', 5000, '', 'borishal', '2019-12-09 22:05:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_option`
--

CREATE TABLE `site_option` (
  `id` int(11) NOT NULL,
  `facebook` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_option`
--

INSERT INTO `site_option` (`id`, `facebook`, `twitter`, `google`, `copyright`) VALUES
(1, '', '', '', 'Company');

-- --------------------------------------------------------

--
-- Table structure for table `update_page`
--

CREATE TABLE `update_page` (
  `id` int(11) NOT NULL,
  `about` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `update_page`
--

INSERT INTO `update_page` (`id`, `about`, `contact`) VALUES
(1, 'lorem Ipsum is simply dummy text of the printing and typesetting industry. lorem Ipsum is simply dummy text of the printing and typesetting industry. lorem Ipsum is simply dummy text of the printing and typesetting industry. lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'lorem Ipsum is simply dummy text of the printing and typesetting industry. lorem Ipsum is simply dummy text of the printing and typesetting industry. lorem Ipsum is simply dummy text of the printing and typesetting industry. lorem Ipsum is simply dummy text of the printing and typesetting industry.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `address`, `password`) VALUES
(1, 'test user', 'user@mail.com', '', '', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_order`
--
ALTER TABLE `pro_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_option`
--
ALTER TABLE `site_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_page`
--
ALTER TABLE `update_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pro_order`
--
ALTER TABLE `pro_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `site_option`
--
ALTER TABLE `site_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `update_page`
--
ALTER TABLE `update_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
