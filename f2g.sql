-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 09:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f2g`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `adminid` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `password`, `adminid`) VALUES
(3, 'Manisha', 'manisha@gmail.com', '8459632017', '12345', '17286cef5751a60a99c69ddc0338e918');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `subdistrict` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `aadhar` text DEFAULT NULL,
  `bank_acc` text DEFAULT NULL,
  `ifsc` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postal_code` text DEFAULT NULL,
  `farmerid` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `name`, `gender`, `dob`, `email`, `password`, `state`, `district`, `subdistrict`, `phone`, `aadhar`, `bank_acc`, `ifsc`, `address`, `postal_code`, `farmerid`) VALUES
(1, 'Niharika Konidela', 'male', '1995-06-13', 'niha@gamil.cpm', '12345', 'AP', 'Amalapuramu', 'Addanki', '8574963201', '5214698730', '2514569873', '21254796321022', 'yfguiiwgcugweyfugewuygbeeyucgyeg vfyergyuwgy', '530004', 'Nih857496'),
(2, 'Havila', 'female', '2001-04-01', 'havlia@gmail.com', '12345', 'AP', 'Alluri Sitharama Raju', 'Amalapuram', '8652143097', '856321478920', '415181601719', '62150160111600', '36-19-9, Near Public Library', '530004', 'Hav11865214');

-- --------------------------------------------------------

--
-- Table structure for table `marketvalue`
--

CREATE TABLE `marketvalue` (
  `id` int(11) NOT NULL,
  `pro_name` text DEFAULT NULL,
  `pro_id` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `subdistrict` text DEFAULT NULL,
  `price` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marketvalue`
--

INSERT INTO `marketvalue` (`id`, `pro_name`, `pro_id`, `district`, `subdistrict`, `price`) VALUES
(1, 'Onion', '001', 'Visakhapatnam', 'Attili', '30.26'),
(2, 'Brinjal', '002', 'East Godavari', 'Attili', '73.68'),
(3, 'Tomato', '003', 'Konaseema', 'Banganapalle', '15.08'),
(4, 'Ladyfinger', '004', 'Konaseema', 'Amalapuram', '18.52'),
(5, 'Ginger', '005', 'Visakhapatnam', 'Anakapalle', '23.20');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fname` text DEFAULT NULL,
  `farmerid` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fname`, `farmerid`, `email`, `phone`, `message`, `time`) VALUES
(1, 'Yatheswar Ethalapaka', 'ESWAR123456', 'yatheswar546@gmail.com', '7963021458', 'Thank you helping me in selling the crop', '2023-04-12 19:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `quality_check`
--

CREATE TABLE `quality_check` (
  `id` int(11) NOT NULL,
  `far_name` text DEFAULT NULL,
  `far_id` text DEFAULT NULL,
  `pro_name` text DEFAULT NULL,
  `pro_id` text DEFAULT NULL,
  `quantity` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `report` text DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quality_check`
--

INSERT INTO `quality_check` (`id`, `far_name`, `far_id`, `pro_name`, `pro_id`, `quantity`, `price`, `report`, `status`) VALUES
(20, 'Havila', 'Hav11865214', 'Ladyfinger', '004', '5', '85', '1st QUALITY', 'ACCEPTED'),
(21, 'Havila', 'Hav11865214', 'Tomato', '003', '5', '90', '2nd QUALITY', 'ACCEPTED'),
(22, 'Niharika Konidela', 'Nih857496', 'Brinjal', '002', '5', '450', '3rd QUALITY', 'REJECTED'),
(23, 'Havila', 'Hav11865214', 'Ginger', '005', '5', '130', '2nd QUALITY', 'ACCEPTED'),
(24, 'Havila', 'Hav11865214', 'Brinjal', '002', '5', '400', '3rd QUALITY', 'REJECTED'),
(25, 'Niharika Konidela', 'Nih857496', 'Onion', '001', '5', '180', '1st QUALITY', 'ACCEPTED');

-- --------------------------------------------------------

--
-- Table structure for table `sell_crops`
--

CREATE TABLE `sell_crops` (
  `id` int(11) NOT NULL,
  `farmer_id` text DEFAULT NULL,
  `product_id` text DEFAULT NULL,
  `product_name` text DEFAULT NULL,
  `subdistrict` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `quantity` text DEFAULT NULL,
  `total_amount` text DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `subdistrict` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `volunteer_id` text DEFAULT NULL,
  `aadhar` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postal_code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `name`, `gender`, `dob`, `email`, `password`, `state`, `district`, `subdistrict`, `phone`, `volunteer_id`, `aadhar`, `address`, `postal_code`) VALUES
(1, 'Manihsa', 'female', '2001-08-31', 'manisha@gmail.com', '12345', 'AP', 'Visakhapatnam', 'Bhimavaram', '9547632018', 'manisha123', '875420136954', 'vyybhbchuwegxuqggxcuwe fxx xufyevfxtwwvfxtfvt', '530007'),
(2, 'Srikanth', 'male', '2023-03-31', 'srikanth@gmail.com', '12345', 'AP', '	Bapatla', 'Badvel', '8796541203', 'srikanth123', '85321064795', 'vybilwuhuigfb', '530004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketvalue`
--
ALTER TABLE `marketvalue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quality_check`
--
ALTER TABLE `quality_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_crops`
--
ALTER TABLE `sell_crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marketvalue`
--
ALTER TABLE `marketvalue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quality_check`
--
ALTER TABLE `quality_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sell_crops`
--
ALTER TABLE `sell_crops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
