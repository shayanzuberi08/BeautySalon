-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2025 at 11:40 AM
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
-- Database: `beauty_salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `booking_date` datetime NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `service_id`, `branch`, `booking_date`, `status`, `created_at`) VALUES
(4, 2, 6, 'Malir', '2025-10-03 00:00:00', 'confirmed', '2025-10-01 08:23:28'),
(5, 2, 10, 'Malir', '2025-10-10 00:00:00', 'confirmed', '2025-10-06 09:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `message`, `created_at`) VALUES
(1, 2, 'very good services', '2025-09-30 12:57:37'),
(2, 2, 'Nice salon', '2025-09-30 13:00:17'),
(3, 2, 'amazing', '2025-10-01 00:44:47'),
(4, 2, 'good\r\n', '2025-10-01 00:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `category`, `price`, `description`, `image`, `created_at`) VALUES
(6, 'Deal 28', 'Korean Glass Facial', 7999.00, 'Deep Cleansing\nPapaya Enzyme Face Wash\nRefreshing Cleansing Milk\nOxygen Infusion\nDerma Regener K Solution\nDeep Hydration\nVitamin C Complex Ampoule\nCarming Softing Skin\nChamomile Soothing Gel\nPhototherapy\nEpiderma Brighting Modelling\nMask\nRs', '1759305556_deal_1.jpeg', '2025-10-01 07:51:30'),
(7, 'Deal 9', 'Protein Treatment + Hair Oil Massage', 1499.00, 'Protein Treatment +\r\nHair Oil Massage\r\nFor Dry & Damage Hairs\r\nStrong Hairs\r\nHair Machine Massage\r\nStop Hair Fall\r\nHair Oil Massage\r\nSalon Selected Shampoo\r\nOrganic Hair Protein Mask', '1759306589_deal_2.jpeg', '2025-10-01 08:16:04'),
(9, 'Deal 3', 'Head Wash', 1499.00, 'Hair Cut (Any Length)\r\nProtein Treatment With Head\r\nMassage\r\nBlow Dry', '1759306784_deal_3.jpeg', '2025-10-01 08:19:44'),
(10, 'Deal 6', 'Baby Girls Cut', 999.00, 'Hair Cut Blow Dry', '1759306909_deal_4.jpeg', '2025-10-01 08:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password_hash`, `is_admin`, `created_at`) VALUES
(2, 'shayan ', 'shayanzuberi08@gmail.com', '0330904231', '$2y$10$/fftglGTRcWgqE3xID0swuho4DcfSXzMKW87qbcG.R4e2m5ok/X/2', 0, '2025-09-30 12:07:10'),
(4, 'Admin', 'admin@salon.com', '03000000000', '$2y$10$4zM9xy1BHHuOCzod4trzyOZmJCA50U0jAYG6yxfBwykv7QQukzqgu', 1, '2025-09-30 12:23:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
