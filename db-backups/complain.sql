-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 07:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complain`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(58, 'dadadAD', 'ADWEf', '2023-02-19 18:27:40', '2023-02-19 18:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `registration_number` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('student','lecture','department_master','admin') DEFAULT 'student',
  `department` varchar(100) NOT NULL DEFAULT 'NOT-DEFINED',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `registration_number`, `name`, `password`, `user_type`, `department`, `status`, `created_at`) VALUES
(1, '123abc', 'MONILE MBAPILE MUNYELE', '$2y$10$P545CZTJCW4ke1Vk8nNEaO4ZszstErcV74zkAhqf6uTob9Ep/nLLO', '', 'NOT-DEFINED', '0', '2023-02-18 03:15:01'),
(2, '123123', 'KEANE ROTH', '$2y$10$CMN7HWmDQ9f4D.6cKoeEVe/YY.5UqPVGNsUHI63jNIhHgypAvd1Um', '', 'NOT-DEFINED', '0', '2023-02-18 03:17:15'),
(3, '123lyimo', 'imma', '$2y$10$U4gzYaxAQjTf4l3hmYzJhe6TzBXH.nTNBDEAl9dfIMzjNr9/Yg9m6', '', 'NOT-DEFINED', '0', '2023-02-18 04:46:45'),
(4, 'UNYAMA12', 'ludo', '$2y$10$OOjMS/dBLvtiu1CQ7ODYu.fd.fPzhjjijo61J3GXN617IuAFgcvk2', '', 'NOT-DEFINED', '0', '2023-02-18 09:44:54'),
(5, 'Aliquam voluptas adi', 'Hillary Phelps', '$2y$10$Cw2OwoJR36snsSdtiSVyY.wXJjVL61nU6y0a0su4jder31Ap6lwX.', '', 'NOT-DEFINED', '0', '2023-02-18 10:08:20'),
(6, '123abcxyz', 'TEst', '$2y$10$dc1KeZ6yEAOPd.Z./w56X.waXOxw0v.SLn1bwsmcYaSL/bB2NtxAS', '', 'NOT-DEFINED', '0', '2023-02-18 10:37:40'),
(7, 'admin2023', 'Ludovic Konyo', '$2y$10$YSmsbB487pv6cOlNxYzWeOM3uwMvXpL2vsHxCtKDyCsRnwfe2on7K', 'admin', 'NOT-DEFINED', '0', '2023-02-18 15:03:48'),
(8, 'Ratione sit ut dolor', 'Adara Melton', '$2y$10$jwmsfFPYrGfODDxl2Tzp4uqg6z7.w8G0okpI2m7LKbS7mChDj6erm', 'student', 'NOT-DEFINED', '0', '2023-02-18 15:22:40'),
(9, 'Quia possimus non e', 'Iola Martin', '$2y$10$xEPDrbrVB3vB54yhjPYdm.CRjhKj2EvVHyCOSvDFthEauh./3q0Ku', 'student', 'NOT-DEFINED', '0', '2023-02-18 15:26:23'),
(10, 'Suscipit temporibus ', 'Nicole Saunders', '$2y$10$qUZdc7oMDN.rYHSHDalgf.QimOcN8O18CqjesblbEQFaldM9qrIKu', 'student', 'NOT-DEFINED', '0', '2023-02-18 15:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(48, 7, 58, '2023-02-19 18:27:40', '2023-02-19 18:27:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
