-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 02:34 PM
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
-- Database: `rakaya2`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `userType` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phoneNumber`, `email`, `password`, `userType`, `gender`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'esrasa', 581119796, 'esro.155@gmail.com', '$2y$10$fBYPf/vpbo9ltmoVz3r6TOSdCQNRBSTChrzOnzonsmIUPh6n/OdVa', 'Developer', 'female', '56e6128968e44b6cb0953684d3d88db402d58da5ebc3c32c95044dbdceae0d43', '2023-07-23 14:34:00'),
(9, 'hussainsaif', 508727024, 'es.saif2002@gmail.com', '$2y$10$4Rr7bANd35dZ2AMAXR9zO.5WQckn8J6YKQEmyi8L3oPSGUlv6wvTq', 'Consultant', 'male', '529d113617e4db4ef8f826f9365ef495152402d3ed04136209a3613b8bbcd76b', '2023-07-23 15:03:12'),
(10, 'maryamsa', 581119693, 'esra.saif2002@hotmail.com', '$2y$10$CJh8Ensgf4dNnAGxOwvDpOS6ma0wjUNkxq5CqMG0DSOlb4fadeqp6', 'Clint', 'female', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
