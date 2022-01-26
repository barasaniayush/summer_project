-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 07:26 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Vivek', 'Vengala', 'vivek@codingcyber.com', '26e0eca228b42a520565415246513c0d'),
(2, 'Ayush', 'Barasani', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(4, 'Shirt'),
(5, 'Pant'),
(6, 'T-Shirt'),
(7, 'Jacket'),
(8, 'Shoe'),
(9, 'Sweater');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pquantity` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(40, 25, '1', 68, '750'),
(41, 27, '1', 69, '2400'),
(42, 24, '1', 70, '1200'),
(43, 25, '1', 71, '750'),
(44, 25, '1', 72, '750'),
(45, 30, '1', 73, '1800');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `pid`, `quantity`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(68, 105, 25, 1, '750', 'Delivered', 'cod', '2021-10-03 07:19:21'),
(69, 105, 27, 1, '2400', 'Order Placed', 'cod', '2021-10-03 07:20:16'),
(70, 105, 24, 1, '1200', 'Order Placed', 'cod', '2021-10-03 07:28:00'),
(71, 105, 25, 1, '750', 'Order Placed', 'cod', '2021-10-03 07:28:50'),
(72, 105, 25, 1, '750', 'Order Placed', 'cod', '2021-10-03 10:46:06'),
(73, 106, 30, 1, '1800', 'Delivered', 'cod', '2021-10-03 10:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `ordertracking`
--

CREATE TABLE `ordertracking` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertracking`
--

INSERT INTO `ordertracking` (`id`, `orderid`, `status`, `message`, `timestamp`) VALUES
(14, 68, 'Delivered', '', '2021-10-03 07:20:54'),
(15, 73, 'Delivered', '', '2021-10-03 10:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `catid`, `quantity`, `price`, `thumb`, `description`) VALUES
(24, 'Men\'s Round Neck Sweater', 9, 10, '1200', 'uploads/sweater2.jpg', 'Style: Casual\r\nPattern Type: Solid\r\nShell Material: Nylon / Cotton\r\nClothing Length: Regular\r\nSleeve Length(cm): Full'),
(25, 'White Stripe Shirt', 4, 10, '750', 'uploads/shirt6.jpg', 'This striped shirt is crafted from soft and breathable cotton and a small amount of stretch, which provides it with a nice feel. Includes many details such as the contrasting on placket, collar and cuffs.'),
(26, 'Vintage Black Converse All Star ', 8, 10, '1650', 'uploads/shoe8.jpg', 'This is converse shoes'),
(27, 'Jeans Jacket', 7, 10, '2400', 'uploads/jacket9.jpg', '100% Genuine Product\r\nMaterial: Non-Stretchable Denim / Jeans\r\nSleeves: Long Sleeves\r\nFit: Regular\r\nNeck: Collar\r\nClosure : Bottom\r\nStyle: Classic Blue Wash\r\nFor: Men\r\nWash Care: Hand/Machine Wash, Do not bleach, Dry in shade'),
(28, 'Half Sleeves Cotton Shirt', 4, 10, '899', 'uploads/shirt7.jpg', 'Sea Green Half Sleeved Shirt\r\nHalf Cotton Shirts For Men\r\nStylish and Comfortable\r\nMaterial: Soft Cotton\r\nMachine Wash'),
(29, 'Men\'s Sport Shoe', 8, 15, '1500', 'uploads/shoe10.jpg', 'Product: Sport Sneakers\r\nLine:Breeze\r\nBase Material : Synthetic\r\nUpper Height: Medium Cut\r\nExtremely Comfortable\r\nTrendy Look\r\nDurable and Reliable\r\nSporty Look'),
(30, 'Spring Varsity Jacket', 7, 16, '1800', 'uploads/jacket6.jpg', 'Jacket Type	Casual Jackets\r\nType	casual\r\nSleeve Type	Full Sleeve\r\nGender	Men\r\nMaterial	Leather\r\nOccasion	Casual Wear'),
(31, 'Queenstown Sweater', 9, 12, '1200', 'uploads/sweater3.jpg', 'Aside from its luxurious softness, cashmere is prized for temperature regulating properties (warmer in winter and cooler in spring). Crafted in a timeless crew neck and knitted in a lightweight gauge ideal for layering.'),
(32, 'White Fit Plain Cotton T-Shirt For Men', 6, 12, '550', 'uploads/t-shirt5.jpg', 'White Solid Plain Tshirt For Men\r\nRound Neck Cotton Tshirt\r\nMaterial: Lycra Cotton Syncer\r\nFit Type: Muscle Fit Tshirt\r\nSuper High Quality Tshirt\r\nHalf Sleeves Tshirt For Men\r\nGentle Wash'),
(33, 'Non-Stretchable Pant for Men', 5, 7, '1400', 'uploads/pant4.jpg', '100% Genuine Product\r\nComfortable to wear\r\nFit: Regular\r\nMaterial: Denim/ Jeans\r\nLength: Full Length\r\nPerfect For: Casual Wear\r\nFour Pockets\r\nWash Care: Hand/Machine Wash, Do not bleach, Dry in shade'),
(34, 'Black Yellow running shoe', 8, 6, '2590', 'uploads/shoe5.jpg', 'Material : Canvas\r\nSole : Rubber\r\nClosure : Lace Up\r\nHigh Quality Material\r\nDurable and comfortable\r\nWash care : Surface dirt can be cleaned with a good quality brush or a damp cloth'),
(35, 'Mens Heavyweight T-shirt', 6, 12, '550', 'uploads/t-shirt2.jpg', 'Shoulder-to-shoulder taping\r\nCoverseamed neck\r\nDouble-needle sleeves and hem\r\nAsh is 98/2 cotton/poly\r\nAthletic Heather is 90/10 cotton/poly\r\nDark Heather Grey is 50/50 cotton/poly'),
(36, 'Blue Distress Jeans Pant for Men', 5, 20, '1400', 'uploads/pant1.jpg', 'Stretchable, Slim fit and Choose\r\nCotton and elastane blend\r\n5-pocket mid-rise jeans\r\nwaistband with belt loops\r\nMachine-wash'),
(37, 'Warm Inner Fleece Winter Hoodie For Men', 7, 11, '1200', 'uploads/hoodie1.jpg', 'Material: Cotton Fleece\r\nsleeves: Full Sleeves\r\nStyle: Solid\r\nLength: Hip Length\r\nWarm and Cozy\r\nWash Care: Hand/Machine Wash'),
(38, 'Blue Inner Fleece Winter Hoodie For Men', 7, 15, '1200', 'uploads/hoodie3.jpg', 'Material: Cotton Fleece\r\nsleeves: Full Sleeves\r\nStyle: Solid\r\nLength: Hip Length\r\nWarm and Cozy\r\nWash Care: Hand/Machine Wash');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password2` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usersmeta`
--

CREATE TABLE `usersmeta` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertracking`
--
ALTER TABLE `ordertracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usersmeta`
--
ALTER TABLE `usersmeta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `ordertracking`
--
ALTER TABLE `ordertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `usersmeta`
--
ALTER TABLE `usersmeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
