-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 11:02 AM
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
-- Database: `login_otp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `password` text NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_expiration` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `email`, `profile_picture`, `password`, `otp`, `otp_expiration`, `date_created`) VALUES
(16, 'jean', 'damour', 'byiringiro', 'byiringirodamour2@gmail.com', 'uploads/blog-author.jpg', '$2y$10$zmWyc023rOt22WOmC64z1.l0bKtfuewaIjzQJq4dunVF3oKPg2qZK', NULL, NULL, '2024-02-05 13:22:27'),
(17, 'kaaman', 'damour', 'byiringiro', 'jeandamour.byiringiro2023@kepler.org', 'uploads/comments-4.jpg', '$2y$10$rqMxTbqW8CMdoYabRlIevuuwjJ9BSdS3CZqdHcEp3q0nfMG4LY6Fy', NULL, NULL, '2024-02-05 13:24:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
