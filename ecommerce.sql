-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 02:57 PM
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `file_path` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `info` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `fname`, `file_path`, `price`, `date`, `info`, `brand`) VALUES
(61, '', 'IMG-6469fc99375b88.60268758.jpg', 0, '2023-05-21 19:12:25', '', ''),
(62, '', 'IMG-6469fcbfd63c11.45052846.jpeg', 0, '2023-05-21 19:13:03', '', ''),
(63, '', 'IMG-6469fd38939233.04247280.jpeg', 0, '2023-05-21 19:15:04', '', ''),
(64, '', 'IMG-6469fd78027c63.17295695.jpg', 0, '2023-05-21 19:16:08', '', ''),
(65, 'qweqwe', 'IMG-6469fe04b22360.39697283.jpg', 0, '2023-05-21 19:18:28', '', ''),
(66, 'wer', 'IMG-6469fe6b0c63d4.64827129.jpg', 2, '2023-05-21 19:20:11', 'werwer', 'wer'),
(67, 'qweqwe', 'IMG-646a0505681743.58135203.jpg', 222, '2023-05-21 19:48:21', 'qwe', 'qwe'),
(68, 'qweqweqwe', 'IMG-646a0524e237b0.99486478.jpeg', 213123, '2023-05-21 19:48:52', 'qweqweqwe', '2222'),
(69, '', 'IMG-646a05387bae42.04867556.jpg', 0, '2023-05-21 19:49:12', '', ''),
(70, '', 'IMG-646a058f913f80.45799766.jpg', 0, '2023-05-21 19:50:39', '', ''),
(71, '', 'IMG-646a05a0031eb7.64254706.jpg', 0, '2023-05-21 19:50:56', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
