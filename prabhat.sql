-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 03:28 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prabhat`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `father_name`, `email`, `password`, `image`, `address`) VALUES
(1, 'Prabhat', 'dddd', 'prabhat@gmail.com', '1234', 'fe78fad47f6b5f6d406c52e03db67738.png', '123'),
(2, 'Praveen', 'Ramm', 'praveen@gmail.com', '1234', 'c06a6b6dc73db1fbe0c5cb3fec0366e4.png', '122255'),
(3, 'Ram Kumer', 'Father\'s Name', 'jude.matsimela@gmail.com', '1234', '2a59b331e13cc3509ee0d2809f1f43c8.jpg', '5454548 nusdhv'),
(4, 'Rohit yadav', 'Father\'s Name', 'evgh656@gmail.com', '1234', '8f032598b84581746c812a98471d5f24.jpg', '15156'),
(5, 'Vivek Kumar', 'Vivek lannn', 'jude.matsi333mela@gmail.com', '1234', '5dc311124a85d7137809e606f817411f.jpg', '123456'),
(6, 'Www', 'Father\'s Name', '1234eee@gmail.com', '1234', 'f8b1d8eebcf143b886bd1c5bb9e3dd79.jpg', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
