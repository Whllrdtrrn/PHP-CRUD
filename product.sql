-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 05:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date_of_expiry` date NOT NULL,
  `available_inventory` int(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `unit`, `price`, `date_of_expiry`, `available_inventory`, `image`) VALUES
(143, 'ewe2', 'Box', '100.00', '2023-08-25', 10, 'uploads/Grilled-Pizza-Margherita-3-500x500.jpg'),
(144, 'dasd111122', 'asdas', '12.00', '2023-08-17', 22, 'uploads/egg-salad-appetizers-613108.jpg'),
(145, 'dasd111122', 'asd', '22.00', '2023-08-24', 22, 'uploads/download (7).jpg'),
(146, 'asdas', '22', '222.00', '2023-08-23', 22, 'uploads/245660988_600449984482370_956012033177363889_n.png'),
(148, 'dasd111122', '22', '22.00', '2023-08-25', 22, 'uploads/245956031_605167374185768_545159696794285412_n.png'),
(149, 'asd222', '11', '22.00', '2023-08-25', 2, 'uploads/245956031_605167374185768_545159696794285412_n.png'),
(150, 'asdasd', '222', '23.00', '2023-08-23', 22, 'uploads/245956031_605167374185768_545159696794285412_n.png'),
(151, 'dddd', 'asd', '12.00', '2023-08-02', 22, 'uploads/245660988_600449984482370_956012033177363889_n.png'),
(152, 'coke', 'bottle', '22.21', '2023-08-23', 3, 'uploads/images (1).jpg'),
(153, 'ad', 'asd', '12.00', '2023-08-23', 2, 'uploads/Grilled-Pizza-Margherita-3-500x500.jpg'),
(154, 'ds', 'asd', '100.00', '2023-08-04', 22, 'uploads/2.-floreria-atlantico.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
