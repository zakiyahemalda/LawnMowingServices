-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 06:14 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mowing`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `booking_address` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `booking_status` int(1) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `booking_quantity` int(11) NOT NULL,
  `booking_amount` int(11) NOT NULL,
  `payment_status` int(3) NOT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_tel` varchar(12) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_tel`, `cust_email`, `username`, `password`) VALUES
(1, 'nabil', '133267458', 'nabil@gmail.com', 'blzack', 'kwoshiok'),
(2, 'syamsul', '60133254711', 'syamsul@gmail.com', 'amri', 'kw@shiokor123'),
(3, 'Syafiq', '132547894', 'azizan@gmail.com', 'azizan', 'kwoshiok'),
(4, 'Abdul Hadi', '13-3254120', 'hadi@gmail.com', 'hadi', 'Kw@shiokor12'),
(5, 'Puteri', '60133269713', 'puteri@gmail.com', 'puteri', 'KW@shiokor12'),
(6, 'aji binti rasul', '60136706256', 'aji@gmail.com', 'ajie', 'KW@shiokor12');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `price` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `description`, `price`) VALUES
(6, 'Landscape', 30),
(7, 'Mowing', 150),
(15, 'Landscape and Mowing', 130);

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `worker_id` int(11) NOT NULL,
  `workername` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telno` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `staff_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `workername`, `address`, `telno`, `email`, `username`, `password`, `staff_role`) VALUES
(1, 'Nuratiyah Nabihah Abdul Jamal', 'No.15, Jalan Desa Jaya 3, Taman Desa Jaya Bukit Baru, 75151, Melaka', '60133269713', 'tyah@utem.com', 'atiyah', '123456', 'admin'),
(3, 'Abdul Jamal Khamis', 'No.24, Jalan Desa Permai 1, Taman Desa Permai Bukit Baru, 75150, Melaka', '60133269713', 'jamal@gmail.com', 'jamal', '123456', 'admin'),
(6, 'zaim', 'kelantan', '60133092809', 'zaim@gmail.com', 'zaim', 'kw@shiok', 'mower'),
(7, 'Muhammad Ehsan ', 'Jalan P11a5/8, Presint 11, 62300 Putrajaya, Wilayah Persekutuan Putrajaya', '60197272594', 'ecan@gmail.com', 'ecan', 'KW@shiok', 'mower');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `worker_id` (`worker_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`worker_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
