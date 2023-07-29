-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 05:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chanel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pro_name` varchar(150) NOT NULL,
  `pro_price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `sub_total` int(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `place_on` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `order_pro` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `place_on`, `name`, `email`, `number`, `address`, `payment_method`, `order_pro`, `price`, `payment_status`) VALUES
(125, 2, '2022-07-07', 'NARA Heng', 'monyrasath44@gmail.com', '098675432', 'st 234 PP Cambodia', 'paypal', 'Chanel Pre-Owned (1) , SMALL FLAP BAG (2) , SMALL FLAP BAG (3) , ', 4050, 'completed'),
(126, 2, '2022-07-07', 'NARA Heng', 'monyrasath44@gmail.com', '098675432', 'st 234 PP Cambodia', 'paypal', 'Chanel Pre-Owned (1) , SMALL FLAP BAG (2) , ', 2100, 'pending'),
(127, 2, '2022-07-09', 'NARA Heng', 'monyrasath44@gmail.com', '089764532', 'st 234 PP Cambodia', 'creditCard', 'Chanel Pre-Owned (1) , ', 800, 'completed'),
(155, 1, '2022-07-07', 'NARA Sath', 'monyrasath44@gmail.com', '098675432', 'st 234 PP Cambodia', 'paypal', 'MINI FLAP BAG (1) , SMALL FLAP BAG (2) , ', 2100, 'pending'),
(156, 1, '2022-07-20', 'Sath Nara', 'reancode123@gamil.com', '089674523', 'st23 45 PP Cambodia', 'aba', 'Chanel Pre-Owned (1) , LARGE 2.55 HANDBAG (1) , ', 1400, 'pending'),
(162, 5, '2023-07-29', 'Heng Nara', 'nara12@gmail.com', '098765423', 'st 44 PP Cambodia', 'creditCard', 'MINI FLAP BAG (2) , SMALL FLAP BAG (1) , ', 2050, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `color` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `pro_price` int(100) NOT NULL,
  `dimensions` varchar(25) NOT NULL,
  `proDetail_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pro_name`, `color`, `image`, `pro_price`, `dimensions`, `proDetail_img`) VALUES
(1, 'Chanel Pre-Owned', 'Aged Calfskin, Smooth Calfskin, Gold-Tone, Silver-Tone', 'img1.webp', 800, '5.9 × 7.8 × 3.1', 'proimg1'),
(2, 'MINI FLAP BAG', 'Lambskin & Gold-Tone Metal\r\nBlack', 'img2.webp', 700, '5.3 × 6.6 × 3.1', 'proimg2'),
(3, 'SMALL FLAP BAG', 'Velvet & Gold-Tone Metal\r\nLight Pink', 'img3.webp', 650, '5.5 × 7.6 × 2.9', 'proimg3'),
(4, 'CHANEL\'S GABRIELLE', 'Lambskin & Gold-Tone Metal\r\nBlack', 'img4.webp', 500, '6.6 × 9.8 × 4.7', 'proimg4'),
(5, 'LARGE 2.55 HANDBAG', 'Grained Calfskin & Gold-Tone Metal\r\nBlack', 'img5.webp', 600, '3.9 × 5.9 × 2.3', 'proimg5'),
(6, 'CLASSIC HANDBAG', 'Grained Shiny Calfskin & Gold-Tone Metal\r\nCoral Pink', 'img6.webp', 750, '5.1 × 6.8 × 2.9', 'proimg6');

-- --------------------------------------------------------

--
-- Table structure for table `saysomething`
--

CREATE TABLE `saysomething` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saysomething`
--

INSERT INTO `saysomething` (`id`, `user_id`, `name`, `email`, `number`, `message`, `date`) VALUES
(1, 4, 'Nara Maya', 'reancode45@gamil.com', '078563412', '\r\n        Hi, admin!!', '2022-07-11'),
(2, 5, 'NARA Heng', 'nara12@gmail.com', '09875623', 'pop up song!', '2023-07-29'),
(3, 1, 'Heng Nara', 'nara12@gmail.com', '09875623', 'Hello!!!', '2023-07-29'),
(6, 1, 'NARA Heng', 'nara12@gmail.com', '09875623', 'Hello hi!!!', '2023-07-29'),
(7, 1, '', '', '', '', '2023-07-29'),
(8, 5, '', '', '', '', '2023-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `passwords` varchar(15) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `first_name`, `last_name`, `passwords`, `user_type`, `date`) VALUES
(1, 1, 'reancode123@gamil.com', 'Nara', 'Sath', '123', 'user', '2022-07-05'),
(2, 2, 'monyrasath44@gmail.com', 'Nara', 'Heng', '456', 'user', '2022-07-05'),
(6, 6, 'reanGOGO123@gamil.com', 'GOGO', 'HO', '123', 'admin', '2022-07-06'),
(7, 5, 'nara12@gmail.com', 'Nara', 'Heng', '12345', 'user', '2023-07-29'),
(8, 5, 'testing23@gmail.com', 'Admin', 'Testing', '123', 'user', '2023-07-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saysomething`
--
ALTER TABLE `saysomething`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `saysomething`
--
ALTER TABLE `saysomething`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
