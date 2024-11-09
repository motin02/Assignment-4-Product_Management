-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2024 at 03:05 PM
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
-- Database: `products`
--
CREATE DATABASE IF NOT EXISTS `products` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `products`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_11_07_132948_create_products', 1),
(2, '2024_11_07_141130_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `name`, `description`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(18, '145', 'Lane Hammond', 'Sed maxime est omni', 846.00, 80, 'images/1731156012.jpg', '2024-11-09 06:40:12', '2024-11-09 06:40:12'),
(19, '155', 'Josiah Ross', 'Labore aut est solut', 858.00, 21, 'images/1731156044.jpg', '2024-11-09 06:40:44', '2024-11-09 06:40:44'),
(20, '586', 'Olga Knapp', 'Vel at quibusdam sap', 765.00, 45, 'images/1731156067.jpg', '2024-11-09 06:41:07', '2024-11-09 06:41:07'),
(21, '563', 'Nora Vincent', 'Adipisci omnis verit', 381.00, 55, 'images/1731156085.jpg', '2024-11-09 06:41:25', '2024-11-09 06:41:25'),
(22, '521', 'Maggy Downs', 'Saepe earum omnis se', 619.00, 9, 'images/1731156102.jpg', '2024-11-09 06:41:42', '2024-11-09 06:41:42'),
(23, '153', 'Isaac Marquez', 'Dolores eiusmod vita', 864.00, 100, 'images/1731156168.jpg', '2024-11-09 06:42:48', '2024-11-09 07:17:52'),
(24, '874', 'Kiayada Cooley', 'Id vel amet aperia', 678.00, 57, 'images/1731156187.jpg', '2024-11-09 06:43:07', '2024-11-09 06:43:07'),
(25, '8745', 'Ronan Padilla', 'Sed ea laborum Quis', 623.00, 47, 'images/1731156206.jpg', '2024-11-09 06:43:26', '2024-11-09 06:43:26'),
(26, '852', 'Shaine Floyd', 'Voluptate in possimu', 832.00, 48, 'images/1731156275.jpg', '2024-11-09 06:44:35', '2024-11-09 06:44:35'),
(27, '986', 'Jason Walsh', 'Possimus cupidatat', 593.00, 25, 'images/1731156291.jpg', '2024-11-09 06:44:51', '2024-11-09 06:44:51'),
(28, '258', 'Ralph Vargas', 'Ab ipsa consequatur', 649.00, 83, 'images/1731156320.jpg', '2024-11-09 06:45:20', '2024-11-09 06:45:20'),
(29, '454', 'Logan Sullivan', 'Fugiat delectus la', 429.00, 95, 'images/1731156337.jpg', '2024-11-09 06:45:37', '2024-11-09 06:45:37'),
(30, '123', 'Mohammad Levine', 'Dolor facere reprehe', 97.00, 71, 'images/1731156357.jpg', '2024-11-09 06:45:57', '2024-11-09 06:45:57'),
(31, '4352', 'Meredith Barber', 'Eos qui et asperiore', 901.00, 54, 'images/1731156373.jpg', '2024-11-09 06:46:13', '2024-11-09 06:46:13'),
(32, '487', 'James Martin', 'Voluptatem dolore eu', 655.00, 5, 'images/1731156428.jpg', '2024-11-09 06:47:08', '2024-11-09 06:47:08'),
(33, '1254', 'Ross Chase', 'Ipsum ut nisi obcae', 368.00, 56, 'images/1731156451.jpg', '2024-11-09 06:47:31', '2024-11-09 06:47:31'),
(34, '4512', 'Conan Mueller', 'Non nesciunt corpor', 804.00, 80, 'images/1731158320.jpg', '2024-11-09 07:18:40', '2024-11-09 07:19:57'),
(36, '4871', 'Orli Nunez', 'Perspiciatis quia o', 494.00, 75, 'images/1731159212.jpg', '2024-11-09 07:33:32', '2024-11-09 07:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iREJQ146U0BMwVavNXRbxnxYVuMbYwsUDjJuvVJv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWQyVlRxamJQaHpTZERXNTlMY0xoNHFDalBrbWNnSE1UdVUyOU9WTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1731159623);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_id_unique` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
