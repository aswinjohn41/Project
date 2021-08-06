-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 02:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_ticketing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_tb`
--

CREATE TABLE `booking_tb` (
  `id` int(11) NOT NULL,
  `bus_id` varchar(40) NOT NULL,
  `passanger_id` varchar(40) NOT NULL,
  `seat` varchar(40) NOT NULL,
  `starting_point` varchar(40) NOT NULL,
  `ending_point` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_tb`
--

INSERT INTO `booking_tb` (`id`, `bus_id`, `passanger_id`, `seat`, `starting_point`, `ending_point`) VALUES
(1, '1', '3', '5', 'calicut', 'kannur'),
(2, '1', '3', '6', 'calicut', 'trissur');

-- --------------------------------------------------------

--
-- Table structure for table `bus_tb`
--

CREATE TABLE `bus_tb` (
  `id` int(11) NOT NULL,
  `bus_name` varchar(40) NOT NULL,
  `seat` varchar(40) NOT NULL,
  `action` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_tb`
--

INSERT INTO `bus_tb` (`id`, `bus_name`, `seat`, `action`) VALUES
(1, 'A', '50', '0'),
(2, 'B', '35', '0'),
(3, 'C', '40', '0'),
(4, 'D', '30', '0');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_tb`
--

CREATE TABLE `complaint_tb` (
  `id` int(11) NOT NULL,
  `passanger_id` varchar(40) NOT NULL,
  `bus_id` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `complaint` varchar(100) NOT NULL,
  `reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_tb`
--

INSERT INTO `complaint_tb` (`id`, `passanger_id`, `bus_id`, `date`, `complaint`, `reply`) VALUES
(1, '3', '1', '2021-04-01', 'xcfvbghn', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `conductor_tb`
--

CREATE TABLE `conductor_tb` (
  `id` int(11) NOT NULL,
  `login_id` varchar(50) NOT NULL,
  `conductor_name` varchar(40) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `bus_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conductor_tb`
--

INSERT INTO `conductor_tb` (`id`, `login_id`, `conductor_name`, `mobile`, `bus_id`) VALUES
(1, '2', 'ABI', '1234565215', 'A'),
(5, '8', 'suku', '9876543210', 'D'),
(8, '11', 'suku', '1234567890', 'C'),
(9, '14', 'ABI', '4444223333', ''),
(10, '15', 'asd', '9876543210', '4');

-- --------------------------------------------------------

--
-- Table structure for table `expence_page`
--

CREATE TABLE `expence_page` (
  `expence_id` int(11) NOT NULL,
  `fuel_expence` varchar(100) NOT NULL,
  `food_expence` varchar(100) NOT NULL,
  `service_charge` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expence_page`
--

INSERT INTO `expence_page` (`expence_id`, `fuel_expence`, `food_expence`, `service_charge`) VALUES
(1, '50', '50', '50\r\n'),
(2, '50', '56', '67');

-- --------------------------------------------------------

--
-- Table structure for table `login_tb`
--

CREATE TABLE `login_tb` (
  `login_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tb`
--

INSERT INTO `login_tb` (`login_id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'abcd', '123', 'conductor'),
(3, 'passanger', 'passanger', 'passanger'),
(4, 'abcd', '123', 'passanger'),
(8, 'suku', '1234', 'conductor'),
(9, 'sss', '12345', 'conductor'),
(10, 'abc', '000', 'conductor'),
(11, 'abc', '000', 'conductor'),
(12, 'sree', '111', 'conductor'),
(13, 'sss', '12345', 'conductor'),
(14, 'sree', '123', 'conductor'),
(15, 'asd', '1234', 'conductor'),
(16, 'krish@gmail.com', '1234', '1');

-- --------------------------------------------------------

--
-- Table structure for table `notification_tb`
--

CREATE TABLE `notification_tb` (
  `id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_tb`
--

INSERT INTO `notification_tb` (`id`, `notification`) VALUES
(1, 'asdfghjkl'),
(3, 'dadasz');

-- --------------------------------------------------------

--
-- Table structure for table `passanger_tb`
--

CREATE TABLE `passanger_tb` (
  `passanger_id` int(11) NOT NULL,
  `login_id` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passanger_tb`
--

INSERT INTO `passanger_tb` (`passanger_id`, `login_id`, `name`, `address`, `email`, `contact`) VALUES
(2, '3', 'ABC', 'calicut', 'abc@gmail.com', '1234567890'),
(3, '16', 'krishnakumar', 'calicut', 'Krishnakumarkreatives@gmail.com', '9074343614');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tb`
--

CREATE TABLE `payment_tb` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(40) NOT NULL,
  `amound` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_tb`
--

INSERT INTO `payment_tb` (`id`, `booking_id`, `amound`) VALUES
(1, '1', '500');

-- --------------------------------------------------------

--
-- Table structure for table `route_tb`
--

CREATE TABLE `route_tb` (
  `id` int(11) NOT NULL,
  `bus_name` varchar(40) NOT NULL,
  `starting_point` varchar(40) NOT NULL,
  `ending_point` varchar(40) NOT NULL,
  `time` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `action` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_tb`
--

INSERT INTO `route_tb` (`id`, `bus_name`, `starting_point`, `ending_point`, `time`, `date`, `action`) VALUES
(1, '1', 'calicut', 'kannur', '9.30 am', '2021-04-01', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_tb`
--
ALTER TABLE `booking_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_tb`
--
ALTER TABLE `bus_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_tb`
--
ALTER TABLE `complaint_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conductor_tb`
--
ALTER TABLE `conductor_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expence_page`
--
ALTER TABLE `expence_page`
  ADD PRIMARY KEY (`expence_id`);

--
-- Indexes for table `login_tb`
--
ALTER TABLE `login_tb`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `notification_tb`
--
ALTER TABLE `notification_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passanger_tb`
--
ALTER TABLE `passanger_tb`
  ADD PRIMARY KEY (`passanger_id`);

--
-- Indexes for table `payment_tb`
--
ALTER TABLE `payment_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route_tb`
--
ALTER TABLE `route_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_tb`
--
ALTER TABLE `booking_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bus_tb`
--
ALTER TABLE `bus_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaint_tb`
--
ALTER TABLE `complaint_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conductor_tb`
--
ALTER TABLE `conductor_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expence_page`
--
ALTER TABLE `expence_page`
  MODIFY `expence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_tb`
--
ALTER TABLE `login_tb`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notification_tb`
--
ALTER TABLE `notification_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `passanger_tb`
--
ALTER TABLE `passanger_tb`
  MODIFY `passanger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_tb`
--
ALTER TABLE `payment_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `route_tb`
--
ALTER TABLE `route_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
