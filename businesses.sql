-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 08, 2025 at 12:19 PM
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
-- Database: `localfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `category`, `location`, `description`, `image`) VALUES
(1, 'Mama Mboga Shop', 'Retail', 'Ruiru', 'Affordable fresh vegetables and fruits.', 'https://media.istockphoto.com/id/1283509516/photo/african-street-vendor.jpg?s=1024x1024&w=is&k=20&c=y4ofWh5SRTqetPgAYh1cbpkhsYtaDL86ZTnpQkv0QMc='),
(2, 'QuickFix Electronics', 'Repair', 'Thika', 'Expert repair of phones and electronics.', 'https://media.istockphoto.com/id/2168796816/photo/close-up-of-man-repairing-computer-motherboard-electronic-engineer-repairs-circuit-board.jpg?s=1024x1024&w=is&k=20&c=iRD1FGwETrmakgQxYqpYDN0wyzbOYml-z0cfZiuW6J0='),
(3, 'Safari Salon', 'Beauty', 'Nairobi', 'Trendy hair styling and beauty services.', 'https://media.istockphoto.com/id/1350573811/photo/hairstylists-braiding-and-extending-a-clients-hair-in-salon.jpg?s=1024x1024&w=is&k=20&c=X9heipbCHVeZ3XIyJqexTNnAgWWnHEULTuNt5j2Rvd8=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
