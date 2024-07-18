-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 08:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plants`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
`about_id` int(255) NOT NULL,
  `about_text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_text`) VALUES
(1, 'At plant Shop, each order counts for us. Whether the order is large or small, customer satisfaction is our top priority, meaning that we are always dedicated to ensuring that our flowers arrive on time and in exceptional form every time.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`cart_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pro_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cateogry`
--

CREATE TABLE IF NOT EXISTS `cateogry` (
`cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`cont_id` int(255) NOT NULL,
  `cont_name` varchar(255) NOT NULL,
  `cont_email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cont_id`, `cont_name`, `cont_email`, `message`) VALUES
(1, 'Alia', 'alia@gmail.com', '123333'),
(2, 'Alia', 'alia@gmail.com', '12344'),
(3, 'Alia', 'alia@gmail.com', '12344'),
(4, 'Alia', 'a@gmial.com', 'qeeecdc'),
(5, 'Alia', 'a@gmial.com', 'qeeecdc'),
(6, 'Alia', 'a@gmial.com', 'qeeecdc'),
(7, 'Alia', 'a@gmial.com', 'qeeecdc'),
(8, 'Alia', 'a@gmial.com', 'qeeecdc');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`pro_id` int(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `cat_id` int(255) NOT NULL,
  `pro_img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_gender` varchar(6) NOT NULL,
  `user_countery` varchar(15) NOT NULL,
  `user_img` varchar(255) NOT NULL DEFAULT 'test.png',
  `user_type` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
 ADD PRIMARY KEY (`about_id`), ADD KEY `about_id` (`about_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`cart_id`), ADD KEY `cart_id` (`cart_id`), ADD KEY `user_id` (`user_id`), ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `cateogry`
--
ALTER TABLE `cateogry`
 ADD PRIMARY KEY (`cat_id`), ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`cont_id`), ADD KEY `cont_id` (`cont_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`pro_id`), ADD UNIQUE KEY `cat_id` (`cat_id`), ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_email` (`user_email`), ADD KEY `user_id` (`user_id`), ADD KEY `user_id_2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
MODIFY `about_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cateogry`
--
ALTER TABLE `cateogry`
MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `cont_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `pro_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cateogry` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
