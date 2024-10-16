-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 03:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikerental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin`, `password`) VALUES
('admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `bike`
--

CREATE TABLE `bike` (
  `sl_no` bigint(255) NOT NULL,
  `bike_no` int(3) UNSIGNED NOT NULL COMMENT 'this shows bike number',
  `bike_name` varchar(30) NOT NULL COMMENT 'Enters bike name by admin',
  `bike_class` varchar(50) NOT NULL COMMENT 'bike class entered by admin',
  `booking_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:booked,0:available',
  `bike_img` varchar(255) NOT NULL COMMENT 'Bike image by admin',
  `brand` varchar(20) NOT NULL,
  `price` float(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bike`
--

INSERT INTO `bike` (`sl_no`, `bike_no`, `bike_name`, `bike_class`, `booking_status`, `bike_img`, `brand`, `price`) VALUES
(2, 100, 'splendor', 'standard', 0, 'D:\\XAMPP\\htdocs\\New folder\\images\\localsplendor.jpeg', 'Hero Honda', 30.00),
(1, 4656, 'access', 'standard', 0, 'D:\\XAMPP\\htdocs\\New folder\\images\\localaccess.jpg', 'suzuki', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_no` int(5) UNSIGNED NOT NULL,
  `pickup_date` datetime NOT NULL,
  `dropoff_date` datetime NOT NULL,
  `mail` varchar(50) NOT NULL COMMENT 'user mail\r\n',
  `bike_no` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(50) NOT NULL COMMENT 'user name entered',
  `email` varchar(80) NOT NULL COMMENT 'Email entered ',
  `phone_no` varchar(10) DEFAULT NULL COMMENT 'Phone number entered (Not necessary)',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='This is the table containing user info';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `email`, `phone_no`, `password`) VALUES
('admin', 'user@example.com', '7894561230', '$2y$10$of7NgsomKS0m4fENnqlW5uRa9/4xOwo0kL6M5hdNHrIY6W1LpmcZy'),
('ammavan', 'ammavan@gmail.com', '8574123157', '$2y$10$nac8FwWM4x3M22xg8UqN9u.EA1dxXT2I3bV4AnPOFnLUrBKiS/JL6'),
('jagan', 'jagan@gmail.com', '', '$2y$10$RE0fJVz7QH4GFb9BBnh15euumnBSxszzmAgRKB27W1T6sDuAgd7oe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bike`
--
ALTER TABLE `bike`
  ADD PRIMARY KEY (`bike_no`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_no`),
  ADD KEY `test` (`bike_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `test` FOREIGN KEY (`bike_no`) REFERENCES `bike` (`bike_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
