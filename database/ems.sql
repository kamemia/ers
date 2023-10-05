-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 06:03 AM
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
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `state` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `agency_id` varchar(50) NOT NULL,
  `photo` varchar(700) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `state`, `username`, `password`, `address`, `agency_id`, `photo`) VALUES
(10, 'Vincent Kamemia', 'vincentkamemia@gmail.com', '+254758301176', 'Nakuru', 'admin', 'admin', 'Kabarak University', '6757', '');

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id` int(11) NOT NULL,
  `agency_id` varchar(50) NOT NULL,
  `agency_name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `personincharge` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id`, `agency_id`, `agency_name`, `phone_number`, `email`, `personincharge`, `username`, `password`, `state`, `address`, `photo`) VALUES
(3, '1337', 'Police', '020 3343312', 'police@gmail.com', 'DCI ', 'police', '12345', 'Nairobi', 'Harambee House', '');

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `id` int(11) NOT NULL,
  `emergency_id` int(11) NOT NULL,
  `agency_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `agency_name` varchar(50) NOT NULL,
  `case_severity` varchar(50) NOT NULL,
  `emergency_category` varchar(50) NOT NULL,
  `date` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `state` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `officer` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dates` varchar(500) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `victim_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `photo` varchar(500) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `region` varchar(50) NOT NULL,
  `mapLink` varchar(150) NOT NULL,
  `action` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`id`, `emergency_id`, `agency_id`, `agency_name`, `case_severity`, `emergency_category`, `date`, `state`, `phone_number`, `officer`, `name`, `status`, `email`, `dates`, `victim_id`, `description`, `photo`, `longitude`, `latitude`, `region`, `mapLink`, `action`) VALUES
(86, 2613, '1337', '', 'Normal', 'Accident', '', 'Rongai', '+254758301176', '', 'Vincent Kamemia', 'Pending', 'vincentkamemia@gmail.com', '03-08-2023', '<br /><b>Warning</b>:  Undefined array key ', '', '', '35.9645269', '-0.1668746', 'Nakuru', 'https://maps.google.com/maps?q=-0.1668746,35.9645269', ''),
(87, 2083, '1337', '', 'Critical', 'Accident', '', 'Rongai', '+254793923656', 'Mr Mike', 'Martin Kandie', 'Resolved', 'martinkandie@gmail.com', '03-08-2023', '3253', 'deguiqdw', '', '35.9654585', '-0.1673099', 'Nakuru', 'https://maps.google.com/maps?q=-0.1673099,35.9654585', 'Vehicle were sent');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_type`
--

CREATE TABLE `emergency_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_type`
--

INSERT INTO `emergency_type` (`id`, `name`, `description`) VALUES
(1, 'Accident', ''),
(2, 'Fire out break', ''),
(3, 'Covid-19', ''),
(4, 'Insurgency', ''),
(5, 'Armed Robbery', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Name` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Staff_Number` int(11) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `joined` varchar(30) NOT NULL,
  `state` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `joined`, `state`, `phone`, `user_id`, `address`, `photo`) VALUES
(23, 'Martin Kandie', 'martinkandie@gmail.com', 'martin', 'martin', '', 'Eldoret', '+254793923656', '3253', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_type`
--
ALTER TABLE `emergency_type`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `emergency_type`
--
ALTER TABLE `emergency_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
