-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 12:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g00398283`
--
CREATE DATABASE IF NOT EXISTS `g00398283` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `g00398283`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `name` varchar(255) NOT NULL,
  `price` float(10,0) NOT NULL,
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `price`, `id`, `image`) VALUES
('Kinnegar American IPA', 4, 1, '\"craftpic.png\"'),
('Galway Hooker Irish Pale Ale', 3, 2, '\"craftpic1.png\"'),
('Galway Hooker IPA', 3, 3, '\"craftpic2.png\"'),
('Galway Bay Pale Ale', 3, 4, '\"craftpic3.png\"'),
('Galway Bay Red Ale', 3, 5, '\"craftpic4.png\"'),
('Kinnegar IPA', 5, 6, '\"craftpic5.png\"'),
('Kinnegar Amber Ale', 4, 7, '\"craftpic6.png\"'),
('9 White Deer Stout', 4, 8, '\"craftpic7.png\"'),
('9 White Deer Pale Ale', 4, 9, '\"craftpic8.png\"'),
('White Hag Dry Hopped Sour', 3, 10, '\"craftpic9.png\"'),
('White Hag Session IPA', 3, 11, '\"craftpic10.png\"');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
