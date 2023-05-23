-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 05:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `password`) VALUES
('qwe', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `pro_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(100) NOT NULL,
  `address` longtext NOT NULL,
  `productName` longtext NOT NULL,
  `price` longtext NOT NULL,
  `qty` longtext NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`pro_id`, `name`, `email`, `phone`, `address`, `productName`, `price`, `qty`, `total`, `date`) VALUES
(405, '', '', 0, '', 'Jordan Travis Scott Olive Green, NIke Blazer Mid 77 Jumbo Pink Oxford (Womens), Nike Waffle One Contrasts Muted Pastels With A Vib, Nike Blazer Mid 77 White and Red', '70000, 6500, 35995, 6500', '1, 1, 1, 1', 118995, '2023-05-23'),
(409, '', '', 0, '', 'Jordan Travis Scott Olive Green, NIke Blazer Mid 77 Jumbo Pink Oxford (Womens), Nike Waffle One Contrasts Muted Pastels With A Vib, Nike Blazer Mid 77 White and Red, Jordan 4 Retro Union Off Noir, Adidas Yeezy 350 Frozen Yellow', '70000, 6500, 35995, 6500, 35000, 13600', '1, 1, 1, 1, 1, 1', 167595, '2023-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `file_path` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `info` varchar(255) NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `fname`, `file_path`, `price`, `date`, `info`, `brand`) VALUES
(78, 'Jordan 4 Manila ', 'IMG-646b6f231483b0.47078759.png', 1400000, '2023-05-22 21:33:23', 'Premium materials have been utilized on the Air Jordan 4, ranging from ostrich and pebbled leathers to suede.', 'Jordan'),
(83, 'Adidas Stan Smith ', 'IMG-646b7274ad7a41.62066687.png', 5000, '2023-05-22 21:47:32', 'Adidas has made efforts to manufacture the shoe sustainably, with the current version of the shoe is sustainably made, composed of an upper made of polyester and a sole constituted from rubber waste.', 'Adidas'),
(84, 'Jordan 1 Mid Taxi', 'IMG-646b739f761ed2.77481831.jpg', 8500, '2023-05-22 21:52:31', 'The Air Air Jordan 1 Mid Taxi was originally created by designer Peter Moore in 1985.', 'Jordan'),
(85, 'Jordan 4 Military Black', 'IMG-646b74314ccbe1.59346247.png', 23955, '2023-05-22 21:54:57', 'Smooth white leather is utilized on the upper, bolstered with a forefoot overlay in grey suede.', 'Jordan'),
(86, 'Adidas Yeezy 350 Frozen Yellow', 'IMG-646b7651c1e490.14689177.png', 13600, '2023-05-22 22:04:01', 'The Yeezy Boost 350 marked an entry into \"primeknit\" technology, utilizing flat knitting machinery amalgamated with synthetic yarns. A preliminary version was made of a combination of petroleum-based ethylene-vinyl acetate (EVA) and foam generated from al', 'Adidas'),
(87, 'Jordan 4 Retro Union Off Noir', 'IMG-646b76b1e7cf05.11978121.png', 35000, '2023-05-22 22:05:37', ' black suede upper with matching black mesh on the toe box and blue mesh around the collar. The semi-translucent structural wings are attached to molded red eyelets, matching the woven Air Jordan tag atop the padded tongue and Nike Air branding on the hee', 'Jordan'),
(88, 'Nike Blazer Mid 77 White and Red', 'IMG-646b773c9d68b9.26974276.png', 6500, '2023-05-22 22:07:56', 'Leather and synthetic upper keeps the classic look of the original while adding comfort and support. Vintage treatment on the midsole provides an old-school look.', 'Nike'),
(89, 'Nike Waffle One Contrasts Muted Pastels With A Vib', 'IMG-646b7800e6d3b5.02279670.png', 35995, '2023-05-22 22:11:12', '35995', 'NIke'),
(91, 'NIke Blazer Mid 77 Jumbo Pink Oxford (Womens)', 'IMG-646b79e0e41867.72894389.png', 6500, '2023-05-22 22:19:12', 'These sweet kicks start with a classic colourless upper featuring smooth white overlays along with a cloud-hued suede toe. ', 'Nike'),
(92, 'Jordan Travis Scott Olive Green', 'IMG-646b7da9780992.43923554.jpg', 70000, '2023-05-22 22:35:21', ' \"Olive\" features a leather and suede upper in a black and white colorway with olive green accents. The sneakers showcase Cactus Jack branding in red and a vintage-style midsole.', 'Jordan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `pro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
