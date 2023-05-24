-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 22, 2023 at 09:02 PM
-- Server version: 10.9.4-MariaDB-1:10.9.4+maria~ubu2204
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `booking_status` varchar(1000) NOT NULL,
  `booking_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(5) NOT NULL,
  `type` varchar(50) NOT NULL,
  `birthDate` datetime NOT NULL,
  `booking_status` varchar(20) DEFAULT NULL,
  `booking_date` datetime DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`, `age`, `type`, `birthDate`, `booking_status`, `booking_date`, `image`) VALUES
(136, 'Emma Watson', 32, 'female', '1990-04-15 00:00:00', NULL, NULL, '/image/63cc63331530b.jpg'),
(137, 'Emma Stone', 34, 'curvy', '1988-11-06 00:00:00', NULL, NULL, '/image/63cc6b2e10940.jpg'),
(144, 'Hohyun Lee', 27, 'male', '1996-01-05 00:00:00', NULL, NULL, '/image/63cc83bb884de.jpg'),
(146, 'Lily Aldridge', 37, 'vegetarian', '1985-11-15 00:00:00', NULL, NULL, '/image/63cc842743739.jpg'),
(147, 'Joshua Andrea', 24, 'male', '1998-04-16 00:00:00', NULL, NULL, '/image/63cda0327ac75.jpeg'),
(149, 'Philip', 23, 'male', '1998-11-05 00:00:00', NULL, NULL, '/image/63cda385155c2.jpg'),
(150, 'Aizaz', 23, 'male', '1998-09-04 00:00:00', NULL, NULL, '/image/63cda3a2b3eb8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `hashedPassword` varchar(100) NOT NULL,
  `types` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `hashedPassword`, `types`, `image`) VALUES
(46, 'Bill gates', 'bill@gmail.com', '$2y$10$NnNdDq8i0XrqW8SPpCRBweCtLc1B8x6RJBLZK95sAqH/QNMSXPcgq', 'client', '/image/63cc848f6188a.jpg'),
(47, 'Mark De Haan', 'mark@gmail.com', '$2y$10$eT7YFZXTRdbZzgylhz71rO3Hu1AcPImUEa.IhMGOG5FVbvkvzBu6G', 'admin', '/image/63cd9fa7bc9d9.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
