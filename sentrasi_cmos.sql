-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2026 at 05:02 PM
-- Server version: 11.4.10-MariaDB
-- PHP Version: 8.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sentrasi_cmos`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `model_type`, `model_id`, `description`, `properties`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'login', NULL, NULL, 'User logged in', NULL, '36.76.117.70', '2026-01-25 23:29:44', '2026-01-25 23:29:44'),
(2, NULL, 'login', NULL, NULL, 'User logged in', NULL, '114.10.44.230', '2026-01-26 00:14:53', '2026-01-26 00:14:53'),
(3, 1, 'login', NULL, NULL, 'User logged in', NULL, '114.5.111.67', '2026-01-26 03:41:29', '2026-01-26 03:41:29'),
(4, 1, 'created', 'App\\Models\\Announcement', 1, 'Created announcement', NULL, '114.5.111.67', '2026-01-26 03:42:31', '2026-01-26 03:42:31'),
(5, 1, 'logout', NULL, NULL, 'User logged out', NULL, '114.5.111.67', '2026-01-26 04:25:48', '2026-01-26 04:25:48'),
(6, 1, 'login', NULL, NULL, 'User logged in', NULL, '114.10.44.230', '2026-01-26 05:39:40', '2026-01-26 05:39:40'),
(7, 1, 'logout', NULL, NULL, 'User logged out', NULL, '114.10.44.230', '2026-01-26 05:39:58', '2026-01-26 05:39:58'),
(8, NULL, 'login', NULL, NULL, 'User logged in', NULL, '125.164.212.135', '2026-01-27 04:40:43', '2026-01-27 04:40:43'),
(9, NULL, 'login', NULL, NULL, 'User logged in', NULL, '172.225.72.3', '2026-01-27 04:40:55', '2026-01-27 04:40:55'),
(10, NULL, 'logout', NULL, NULL, 'User logged out', NULL, '172.225.78.208', '2026-01-27 04:49:19', '2026-01-27 04:49:19'),
(11, 1, 'login', NULL, NULL, 'User logged in', NULL, '172.225.78.208', '2026-01-27 04:49:26', '2026-01-27 04:49:26'),
(12, 1, 'login', NULL, NULL, 'User logged in', NULL, '114.10.47.2', '2026-01-27 07:50:57', '2026-01-27 07:50:57'),
(13, 1, 'login', NULL, NULL, 'User logged in', NULL, '36.76.127.40', '2026-02-11 00:59:13', '2026-02-11 00:59:13'),
(14, 1, 'updated', 'App\\Models\\Department', 5, 'Updated department: KesMa', NULL, '36.76.127.40', '2026-02-11 01:06:50', '2026-02-11 01:06:50'),
(15, 1, 'updated', 'App\\Models\\Department', 3, 'Updated department: HuBlu', NULL, '36.76.127.40', '2026-02-11 01:07:06', '2026-02-11 01:07:06'),
(16, 1, 'updated', 'App\\Models\\Cabinet', 1, 'Updated cabinet: Kabinet Sentra Sinergi', NULL, '36.76.127.40', '2026-02-11 01:07:21', '2026-02-11 01:07:21'),
(17, 1, 'updated', 'App\\Models\\Department', 2, 'Updated department: MedFo', NULL, '36.76.127.40', '2026-02-11 01:07:43', '2026-02-11 01:07:43'),
(18, 1, 'updated', 'App\\Models\\Cabinet', 1, 'Updated cabinet: Kabinet Sentra Sinergi', NULL, '36.76.127.40', '2026-02-11 01:07:57', '2026-02-11 01:07:57'),
(19, 1, 'created', 'App\\Models\\Department', 6, 'Created department: Dagri', NULL, '36.76.127.40', '2026-02-11 01:08:23', '2026-02-11 01:08:23'),
(20, 1, 'updated', 'App\\Models\\Department', 4, 'Updated department: RisProf', NULL, '36.76.127.40', '2026-02-11 01:08:59', '2026-02-11 01:08:59'),
(21, 1, 'created', 'App\\Models\\Department', 7, 'Created department: Personalia', NULL, '36.76.127.40', '2026-02-11 01:09:45', '2026-02-11 01:09:45'),
(22, 1, 'created', 'App\\Models\\Department', 8, 'Created department: SekBen', NULL, '36.76.127.40', '2026-02-11 01:10:22', '2026-02-11 01:10:22'),
(23, 1, 'created', 'App\\Models\\Department', 9, 'Created department: KWU', NULL, '36.76.127.40', '2026-02-11 01:10:47', '2026-02-11 01:10:47'),
(24, 1, 'created', 'App\\Models\\User', 7, 'Created user: Developer Kabinet', NULL, '36.76.127.40', '2026-02-11 01:14:23', '2026-02-11 01:14:23'),
(25, 1, 'logout', NULL, NULL, 'User logged out', NULL, '36.76.127.40', '2026-02-11 01:14:29', '2026-02-11 01:14:29'),
(26, 7, 'login', NULL, NULL, 'User logged in', NULL, '36.76.127.40', '2026-02-11 01:14:41', '2026-02-11 01:14:41'),
(27, 7, 'created', 'App\\Models\\Program', 1, 'Created program: ANAKONDA', NULL, '36.76.127.40', '2026-02-11 01:15:34', '2026-02-11 01:15:34'),
(28, 7, 'created', 'App\\Models\\Program', 2, 'Created program: PATK', NULL, '36.76.127.40', '2026-02-11 01:16:38', '2026-02-11 01:16:38'),
(29, 7, 'logout', NULL, NULL, 'User logged out', NULL, '36.76.127.40', '2026-02-11 01:31:30', '2026-02-11 01:31:30'),
(30, 1, 'login', NULL, NULL, 'User logged in', NULL, '36.76.127.40', '2026-02-11 01:31:50', '2026-02-11 01:31:50'),
(31, 1, 'logout', NULL, NULL, 'User logged out', NULL, '36.76.127.40', '2026-02-11 01:37:08', '2026-02-11 01:37:08'),
(32, NULL, 'login', NULL, NULL, 'User logged in', NULL, '36.76.127.40', '2026-02-11 01:37:15', '2026-02-11 01:37:15'),
(33, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.66.87', '2026-02-16 21:13:08', '2026-02-16 21:13:08'),
(34, 1, 'deleted', 'App\\Models\\Announcement', 1, 'Deleted announcement', NULL, '182.8.66.87', '2026-02-16 21:15:13', '2026-02-16 21:15:13'),
(35, NULL, 'login', NULL, NULL, 'User logged in', NULL, '114.10.44.230', '2026-02-17 20:27:45', '2026-02-17 20:27:45'),
(36, 1, 'login', NULL, NULL, 'User logged in', NULL, '36.76.122.160', '2026-02-18 01:02:59', '2026-02-18 01:02:59'),
(37, 1, 'login', NULL, NULL, 'User logged in', NULL, '36.76.122.160', '2026-02-18 01:07:16', '2026-02-18 01:07:16'),
(38, 1, 'logout', NULL, NULL, 'User logged out', NULL, '36.76.122.160', '2026-02-18 01:11:12', '2026-02-18 01:11:12'),
(39, 7, 'login', NULL, NULL, 'User logged in', NULL, '36.76.122.160', '2026-02-18 01:11:23', '2026-02-18 01:11:23'),
(40, 7, 'logout', NULL, NULL, 'User logged out', NULL, '36.76.122.160', '2026-02-18 01:50:17', '2026-02-18 01:50:17'),
(41, 1, 'login', NULL, NULL, 'User logged in', NULL, '36.76.122.160', '2026-02-18 01:50:59', '2026-02-18 01:50:59'),
(42, 1, 'logout', NULL, NULL, 'User logged out', NULL, '36.76.122.160', '2026-02-18 02:19:16', '2026-02-18 02:19:16'),
(43, 7, 'login', NULL, NULL, 'User logged in', NULL, '36.76.122.160', '2026-02-18 02:19:28', '2026-02-18 02:19:28'),
(44, 7, 'created', 'App\\Models\\Task', 1, 'Created task: RAB', NULL, '36.76.122.160', '2026-02-18 02:20:09', '2026-02-18 02:20:09'),
(45, 7, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from todo to todo', NULL, '36.76.122.160', '2026-02-18 02:20:14', '2026-02-18 02:20:14'),
(46, 7, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from todo to in_progress', NULL, '36.76.122.160', '2026-02-18 02:20:16', '2026-02-18 02:20:16'),
(47, 7, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from in_progress to todo', NULL, '36.76.122.160', '2026-02-18 02:20:18', '2026-02-18 02:20:18'),
(48, 7, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from todo to pending', NULL, '36.76.122.160', '2026-02-18 02:20:21', '2026-02-18 02:20:21'),
(49, 7, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from pending to todo', NULL, '36.76.122.160', '2026-02-18 02:20:22', '2026-02-18 02:20:22'),
(50, 7, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from todo to in_progress', NULL, '36.76.122.160', '2026-02-18 02:20:24', '2026-02-18 02:20:24'),
(51, 7, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from in_progress to todo', NULL, '36.76.122.160', '2026-02-18 02:20:25', '2026-02-18 02:20:25'),
(52, 7, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from todo to done', NULL, '36.76.122.160', '2026-02-18 02:20:26', '2026-02-18 02:20:26'),
(53, 7, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from done to todo', NULL, '36.76.122.160', '2026-02-18 02:20:28', '2026-02-18 02:20:28'),
(54, NULL, 'login', NULL, NULL, 'User logged in', NULL, '114.10.44.33', '2026-02-18 06:28:15', '2026-02-18 06:28:15'),
(55, NULL, 'logout', NULL, NULL, 'User logged out', NULL, '114.10.44.33', '2026-02-18 06:35:49', '2026-02-18 06:35:49'),
(56, 7, 'login', NULL, NULL, 'User logged in', NULL, '182.8.122.253', '2026-02-18 06:46:21', '2026-02-18 06:46:21'),
(57, 7, 'created', 'App\\Models\\Task', 2, 'Created task: Pembentukan panitia', NULL, '182.8.122.253', '2026-02-18 06:47:46', '2026-02-18 06:47:46'),
(58, 7, 'updated', 'App\\Models\\Task', 2, 'Changed task status: Pembentukan panitia from in_progress to pending', NULL, '182.8.122.253', '2026-02-18 06:47:49', '2026-02-18 06:47:49'),
(59, 7, 'updated', 'App\\Models\\Task', 2, 'Changed task status: Pembentukan panitia from pending to in_progress', NULL, '182.8.122.253', '2026-02-18 06:47:50', '2026-02-18 06:47:50'),
(60, 7, 'updated', 'App\\Models\\Task', 2, 'Changed task status: Pembentukan panitia from in_progress to done', NULL, '182.8.122.253', '2026-02-18 06:47:52', '2026-02-18 06:47:52'),
(61, 7, 'updated', 'App\\Models\\Task', 2, 'Changed task status: Pembentukan panitia from done to in_progress', NULL, '182.8.122.253', '2026-02-18 06:47:56', '2026-02-18 06:47:56'),
(62, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.122.253', '2026-02-18 06:49:03', '2026-02-18 06:49:03'),
(63, 7, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from todo to pending', NULL, '182.8.122.253', '2026-02-18 06:49:43', '2026-02-18 06:49:43'),
(64, 1, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from pending to todo', NULL, '182.8.122.253', '2026-02-18 06:50:00', '2026-02-18 06:50:00'),
(65, 1, 'updated', 'App\\Models\\Task', 2, 'Updated task: Pembentukan panitia', NULL, '182.8.122.253', '2026-02-18 06:50:15', '2026-02-18 06:50:15'),
(66, 7, 'created', 'App\\Models\\Task', 3, 'Created task: pesen lapangan', NULL, '182.8.122.253', '2026-02-18 06:54:11', '2026-02-18 06:54:11'),
(67, 7, 'updated', 'App\\Models\\Task', 3, 'Changed task status: pesen lapangan from todo to in_progress', NULL, '182.8.122.253', '2026-02-18 06:54:19', '2026-02-18 06:54:19'),
(68, 7, 'updated', 'App\\Models\\Task', 3, 'Updated task: pesen lapangan', NULL, '182.8.122.253', '2026-02-18 06:54:26', '2026-02-18 06:54:26'),
(69, 7, 'updated', 'App\\Models\\Task', 3, 'Changed task status: pesen lapangan from in_progress to pending', NULL, '182.8.122.253', '2026-02-18 06:54:38', '2026-02-18 06:54:38'),
(70, 7, 'updated', 'App\\Models\\Task', 3, 'Updated task: pesen lapangan', NULL, '182.8.122.253', '2026-02-18 06:54:48', '2026-02-18 06:54:48'),
(71, 7, 'updated', 'App\\Models\\Task', 3, 'Changed task status: pesen lapangan from pending to in_progress', NULL, '182.8.122.253', '2026-02-18 06:54:53', '2026-02-18 06:54:53'),
(72, 7, 'updated', 'App\\Models\\Task', 3, 'Changed task status: pesen lapangan from in_progress to done', NULL, '182.8.122.253', '2026-02-18 06:55:00', '2026-02-18 06:55:00'),
(73, 1, 'created', 'App\\Models\\UsefulLink', 1, 'Created link: SOP COBA', NULL, '182.8.122.253', '2026-02-18 06:56:07', '2026-02-18 06:56:07'),
(74, 7, 'created', 'App\\Models\\Task', 4, 'Created task: Membuat RAB', NULL, '114.8.225.98', '2026-02-18 08:22:39', '2026-02-18 08:22:39'),
(75, 7, 'updated', 'App\\Models\\Task', 4, 'Changed task status: Membuat RAB from todo to in_progress', NULL, '114.8.225.98', '2026-02-18 08:23:03', '2026-02-18 08:23:03'),
(76, 7, 'updated', 'App\\Models\\Task', 4, 'Updated task: Membuat RAB', NULL, '114.8.225.98', '2026-02-18 08:23:18', '2026-02-18 08:23:18'),
(77, 7, 'updated', 'App\\Models\\Task', 4, 'Changed task status: Membuat RAB from in_progress to done', NULL, '114.8.225.98', '2026-02-18 08:23:32', '2026-02-18 08:23:32'),
(78, NULL, 'login', NULL, NULL, 'User logged in', NULL, '182.2.42.96', '2026-02-19 00:22:34', '2026-02-19 00:22:34'),
(79, NULL, 'updated', 'App\\Models\\Task', 4, 'Changed task status: Membuat RAB from done to pending', NULL, '182.2.42.96', '2026-02-19 00:23:20', '2026-02-19 00:23:20'),
(80, NULL, 'updated', 'App\\Models\\Task', 4, 'Changed task status: Membuat RAB from pending to done', NULL, '182.2.42.96', '2026-02-19 00:23:22', '2026-02-19 00:23:22'),
(81, NULL, 'logout', NULL, NULL, 'User logged out', NULL, '182.2.42.96', '2026-02-19 00:23:43', '2026-02-19 00:23:43'),
(82, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.6.70.59', '2026-02-19 06:49:42', '2026-02-19 06:49:42'),
(83, 1, 'created', 'App\\Models\\User', 8, 'Created user: Muhammad Panji Fathuroni', NULL, '182.6.70.59', '2026-02-19 06:51:52', '2026-02-19 06:51:52'),
(84, 1, 'created', 'App\\Models\\User', 9, 'Created user: Muhammad Fawaaz Dhawi', NULL, '182.6.70.59', '2026-02-19 06:53:19', '2026-02-19 06:53:19'),
(85, 1, 'created', 'App\\Models\\User', 10, 'Created user: Alya Hasna Fadilah', NULL, '182.6.70.59', '2026-02-19 06:55:09', '2026-02-19 06:55:09'),
(86, 1, 'created', 'App\\Models\\User', 11, 'Created user: Rayyan Fathanza', NULL, '182.6.70.59', '2026-02-19 06:55:50', '2026-02-19 06:55:50'),
(87, 8, 'login', NULL, NULL, 'User logged in', NULL, '182.2.42.96', '2026-02-19 07:00:29', '2026-02-19 07:00:29'),
(88, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.122.253', '2026-02-19 07:03:02', '2026-02-19 07:03:02'),
(89, 1, 'created', 'App\\Models\\User', 12, 'Created user: Sultan Syafiq Rakan', NULL, '182.6.70.59', '2026-02-19 07:05:39', '2026-02-19 07:05:39'),
(90, 1, 'created', 'App\\Models\\User', 13, 'Created user: Bintang Narindra Putra Pratama', NULL, '182.6.70.59', '2026-02-19 07:06:15', '2026-02-19 07:06:15'),
(91, 1, 'created', 'App\\Models\\User', 14, 'Created user: Kenny Joe Neville', NULL, '182.6.70.59', '2026-02-19 07:06:45', '2026-02-19 07:06:45'),
(92, 1, 'created', 'App\\Models\\User', 15, 'Created user: Zaky Ahmad Septyan Pradana', NULL, '182.6.70.59', '2026-02-19 07:09:28', '2026-02-19 07:09:28'),
(93, 1, 'created', 'App\\Models\\User', 16, 'Created user: Gilang Gallan Indrana', NULL, '182.6.70.59', '2026-02-19 07:10:04', '2026-02-19 07:10:04'),
(94, 1, 'created', 'App\\Models\\User', 17, 'Created user: Nadhif Basyara', NULL, '182.6.70.59', '2026-02-19 07:10:33', '2026-02-19 07:10:33'),
(95, 1, 'deleted', 'App\\Models\\User', 3, 'Deleted user: Kepala PSDM', NULL, '182.6.70.59', '2026-02-19 07:11:41', '2026-02-19 07:11:41'),
(96, 1, 'deleted', 'App\\Models\\User', 2, 'Deleted user: Ketua Umum', NULL, '182.6.70.59', '2026-02-19 07:11:48', '2026-02-19 07:11:48'),
(97, 1, 'created', 'App\\Models\\User', 18, 'Created user: Davi Ariq Nugroho', NULL, '182.6.70.59', '2026-02-19 07:13:46', '2026-02-19 07:13:46'),
(98, 1, 'created', 'App\\Models\\User', 19, 'Created user: Atria Caesariano Tinto', NULL, '182.6.70.59', '2026-02-19 07:14:15', '2026-02-19 07:14:15'),
(99, 1, 'created', 'App\\Models\\User', 20, 'Created user: Syela Akhul Khalimi', NULL, '182.6.70.59', '2026-02-19 07:14:49', '2026-02-19 07:14:49'),
(100, 1, 'created', 'App\\Models\\User', 21, 'Created user: Nur Rahman Fauzan', NULL, '182.6.70.59', '2026-02-19 07:16:37', '2026-02-19 07:16:37'),
(101, 1, 'created', 'App\\Models\\User', 22, 'Created user: Akhmad Rizqulloh Ridlohi', NULL, '182.6.70.59', '2026-02-19 07:17:06', '2026-02-19 07:17:06'),
(102, 1, 'created', 'App\\Models\\User', 23, 'Created user: Abraham Napitulu', NULL, '182.6.70.59', '2026-02-19 07:17:45', '2026-02-19 07:17:45'),
(103, 1, 'created', 'App\\Models\\User', 24, 'Created user: Susilo Hendri Yudhoyono', NULL, '182.6.70.59', '2026-02-19 07:19:35', '2026-02-19 07:19:35'),
(104, 1, 'created', 'App\\Models\\User', 25, 'Created user: Rafli JSPT', NULL, '182.6.70.59', '2026-02-19 07:20:23', '2026-02-19 07:20:23'),
(105, 1, 'created', 'App\\Models\\User', 26, 'Created user: Danendra Galang Y', NULL, '182.6.70.59', '2026-02-19 07:20:50', '2026-02-19 07:20:50'),
(106, 1, 'created', 'App\\Models\\User', 27, 'Created user: M Rafli Satriani', NULL, '182.6.70.59', '2026-02-19 07:22:52', '2026-02-19 07:22:52'),
(107, 1, 'created', 'App\\Models\\User', 28, 'Created user: Yudhi Nendra Kurniawan', NULL, '182.6.70.59', '2026-02-19 07:23:26', '2026-02-19 07:23:26'),
(108, 1, 'created', 'App\\Models\\User', 29, 'Created user: Jays', NULL, '182.6.70.59', '2026-02-19 07:23:59', '2026-02-19 07:23:59'),
(109, 1, 'created', 'App\\Models\\User', 30, 'Created user: Alvito Aryo Putra', NULL, '182.6.70.59', '2026-02-19 07:25:19', '2026-02-19 07:25:19'),
(110, 1, 'created', 'App\\Models\\User', 31, 'Created user: Mathew William Junior Tumanggor', NULL, '182.6.70.59', '2026-02-19 07:26:01', '2026-02-19 07:26:01'),
(111, 1, 'created', 'App\\Models\\User', 32, 'Created user: Ahmad Arfian Syamsa', NULL, '182.6.70.59', '2026-02-19 07:26:58', '2026-02-19 07:26:58'),
(112, 1, 'updated', 'App\\Models\\Task', 1, 'Changed task status: RAB from todo to done', NULL, '182.6.70.59', '2026-02-19 07:29:54', '2026-02-19 07:29:54'),
(113, 24, 'login', NULL, NULL, 'User logged in', NULL, '182.8.98.12', '2026-02-19 07:31:19', '2026-02-19 07:31:19'),
(114, 31, 'login', NULL, NULL, 'User logged in', NULL, '118.99.84.51', '2026-02-19 07:38:02', '2026-02-19 07:38:02'),
(115, 29, 'login', NULL, NULL, 'User logged in', NULL, '182.253.50.8', '2026-02-19 07:39:01', '2026-02-19 07:39:01'),
(116, 1, 'deleted', 'App\\Models\\UsefulLink', 1, 'Deleted link: SOP COBA', NULL, '182.6.70.59', '2026-02-19 07:46:08', '2026-02-19 07:46:08'),
(117, 1, 'created', 'App\\Models\\UsefulLink', 2, 'Created link: LINK PPT RAPAT KABINET 1', NULL, '182.6.70.59', '2026-02-19 07:46:59', '2026-02-19 07:46:59'),
(118, 1, 'created', 'App\\Models\\UsefulLink', 3, 'Created link: DATABASE KABINET HIMATEKKOM 2026', NULL, '182.6.70.59', '2026-02-19 07:48:32', '2026-02-19 07:48:32'),
(119, 1, 'created', 'App\\Models\\DriveAccount', 1, 'Created drive account: Drive DAGRI', NULL, '182.6.70.59', '2026-02-19 07:51:51', '2026-02-19 07:51:51'),
(120, 1, 'deleted', 'App\\Models\\DriveAccount', 1, 'Deleted drive account: Drive DAGRI', NULL, '182.6.70.59', '2026-02-19 07:53:13', '2026-02-19 07:53:13'),
(121, 1, 'created', 'App\\Models\\Announcement', 2, 'Created announcement', NULL, '182.6.70.59', '2026-02-19 07:54:06', '2026-02-19 07:54:06'),
(122, 1, 'deleted', 'App\\Models\\Announcement', 2, 'Deleted announcement', NULL, '182.6.70.59', '2026-02-19 07:54:10', '2026-02-19 07:54:10'),
(123, 15, 'login', NULL, NULL, 'User logged in', NULL, '36.68.219.70', '2026-02-19 18:42:37', '2026-02-19 18:42:37'),
(124, 17, 'login', NULL, NULL, 'User logged in', NULL, '36.68.220.6', '2026-02-19 18:42:39', '2026-02-19 18:42:39'),
(125, 15, 'created', 'App\\Models\\Timeline', 1, 'Created timeline: PW-133', NULL, '36.68.219.70', '2026-02-19 18:45:16', '2026-02-19 18:45:16'),
(126, 17, 'created', 'App\\Models\\Program', 3, 'Created program: PW 131', NULL, '36.68.220.6', '2026-02-19 18:46:44', '2026-02-19 18:46:44'),
(127, 17, 'created', 'App\\Models\\Task', 5, 'Created task: Open Recruitment panitia PW 131', NULL, '36.68.220.6', '2026-02-19 18:50:31', '2026-02-19 18:50:31'),
(128, 17, 'updated', 'App\\Models\\Task', 5, 'Changed task status: Open Recruitment panitia PW 131 from todo to in_progress', NULL, '36.68.220.6', '2026-02-19 18:51:05', '2026-02-19 18:51:05'),
(129, 17, 'updated', 'App\\Models\\Task', 5, 'Changed task status: Open Recruitment panitia PW 131 from in_progress to pending', NULL, '36.68.220.6', '2026-02-19 18:51:07', '2026-02-19 18:51:07'),
(130, 17, 'updated', 'App\\Models\\Task', 5, 'Changed task status: Open Recruitment panitia PW 131 from pending to in_progress', NULL, '36.68.220.6', '2026-02-19 18:51:09', '2026-02-19 18:51:09'),
(131, 17, 'updated', 'App\\Models\\Task', 5, 'Changed task status: Open Recruitment panitia PW 131 from in_progress to todo', NULL, '36.68.220.6', '2026-02-19 18:51:17', '2026-02-19 18:51:17'),
(132, 8, 'login', NULL, NULL, 'User logged in', NULL, '114.10.44.180', '2026-02-19 20:51:43', '2026-02-19 20:51:43'),
(133, 17, 'login', NULL, NULL, 'User logged in', NULL, '36.68.220.6', '2026-02-20 00:01:17', '2026-02-20 00:01:17'),
(134, 17, 'updated', 'App\\Models\\Task', 5, 'Changed task status: Open Recruitment panitia PW 131 from todo to in_progress', NULL, '36.68.220.6', '2026-02-20 00:01:25', '2026-02-20 00:01:25'),
(135, 17, 'updated', 'App\\Models\\Task', 5, 'Updated task: Open Recruitment panitia PW 131', NULL, '36.68.220.6', '2026-02-20 00:01:44', '2026-02-20 00:01:44'),
(136, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.65.78', '2026-02-20 23:44:58', '2026-02-20 23:44:58'),
(137, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.65.193', '2026-02-21 00:57:29', '2026-02-21 00:57:29'),
(138, 8, 'login', NULL, NULL, 'User logged in', NULL, '114.10.44.180', '2026-02-21 01:01:54', '2026-02-21 01:01:54'),
(139, 8, 'logout', NULL, NULL, 'User logged out', NULL, '114.10.44.180', '2026-02-21 01:03:31', '2026-02-21 01:03:31'),
(140, 8, 'logout', NULL, NULL, 'User logged out', NULL, '114.10.44.180', '2026-02-21 01:03:31', '2026-02-21 01:03:31'),
(141, 8, 'login', NULL, NULL, 'User logged in', NULL, '114.10.44.180', '2026-02-21 01:03:48', '2026-02-21 01:03:48'),
(142, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.92.102', '2026-02-21 03:43:46', '2026-02-21 03:43:46'),
(143, 12, 'login', NULL, NULL, 'User logged in', NULL, '182.253.50.143', '2026-02-21 05:58:52', '2026-02-21 05:58:52'),
(144, 12, 'created', 'App\\Models\\Task', 6, 'Created task: RPK', NULL, '182.253.50.143', '2026-02-21 06:01:50', '2026-02-21 06:01:50'),
(145, 12, 'updated', 'App\\Models\\Task', 6, 'Updated task: RPK', NULL, '182.253.50.143', '2026-02-21 06:02:03', '2026-02-21 06:02:03'),
(146, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.68.102', '2026-02-21 06:31:59', '2026-02-21 06:31:59'),
(147, 1, 'created', 'App\\Models\\Timeline', 2, 'Created timeline: Tes', NULL, '182.8.68.102', '2026-02-21 07:14:01', '2026-02-21 07:14:01'),
(148, 1, 'created', 'App\\Models\\Timeline', 3, 'Created timeline: res', NULL, '182.8.68.102', '2026-02-21 07:20:21', '2026-02-21 07:20:21'),
(149, 1, 'deleted', 'App\\Models\\Timeline', 2, 'Deleted timeline: Tes', NULL, '182.8.68.102', '2026-02-21 07:27:14', '2026-02-21 07:27:14'),
(150, 1, 'created', 'App\\Models\\Timeline', 4, 'Created timeline: tes', NULL, '182.8.68.102', '2026-02-21 07:27:38', '2026-02-21 07:27:38'),
(151, 1, 'created', 'App\\Models\\Timeline', 5, 'Created timeline: HALOOO', NULL, '182.8.68.102', '2026-02-21 07:44:25', '2026-02-21 07:44:25'),
(152, 1, 'updated', 'App\\Models\\Timeline', 4, 'Updated timeline: tes eddit', NULL, '182.8.68.102', '2026-02-21 09:38:11', '2026-02-21 09:38:11'),
(153, 1, 'logout', NULL, NULL, 'User logged out', NULL, '182.8.68.102', '2026-02-21 09:39:06', '2026-02-21 09:39:06'),
(154, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.68.102', '2026-02-21 09:42:28', '2026-02-21 09:42:28'),
(155, 1, 'logout', NULL, NULL, 'User logged out', NULL, '182.8.68.102', '2026-02-21 09:50:45', '2026-02-21 09:50:45'),
(156, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.68.102', '2026-02-21 20:06:42', '2026-02-21 20:06:42'),
(157, 1, 'created', 'App\\Models\\InformationBoard', 1, 'Created information article: Coba', NULL, '182.8.68.102', '2026-02-21 20:07:37', '2026-02-21 20:07:37'),
(158, 1, 'logout', NULL, NULL, 'User logged out', NULL, '182.8.68.102', '2026-02-21 20:07:57', '2026-02-21 20:07:57'),
(159, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.68.102', '2026-02-21 20:08:38', '2026-02-21 20:08:38'),
(160, 1, 'updated', 'App\\Models\\InformationBoard', 1, 'Updated information article: Coba', NULL, '182.8.68.102', '2026-02-21 20:09:03', '2026-02-21 20:09:03'),
(161, 1, 'logout', NULL, NULL, 'User logged out', NULL, '182.8.68.102', '2026-02-21 20:09:53', '2026-02-21 20:09:53'),
(162, 1, 'login', NULL, NULL, 'User logged in', NULL, '182.8.68.102', '2026-02-21 20:21:45', '2026-02-21 20:21:45'),
(163, 1, 'created', 'App\\Models\\InformationBoard', 2, 'Created information article: Mengaji', NULL, '182.8.68.102', '2026-02-21 20:22:34', '2026-02-21 20:22:34'),
(164, 1, 'logout', NULL, NULL, 'User logged out', NULL, '182.8.68.102', '2026-02-21 20:24:54', '2026-02-21 20:24:54'),
(165, 12, 'updated', 'App\\Models\\Task', 6, 'Changed task status: RPK from in_progress to in_progress', NULL, '182.253.50.143', '2026-02-22 00:16:07', '2026-02-22 00:16:07'),
(166, 12, 'updated', 'App\\Models\\Task', 6, 'Changed task status: RPK from in_progress to done', NULL, '182.253.50.143', '2026-02-22 00:30:00', '2026-02-22 00:30:00'),
(167, 12, 'created', 'App\\Models\\Program', 4, 'Created program: OKKBK', NULL, '182.253.50.143', '2026-02-22 00:31:11', '2026-02-22 00:31:11'),
(168, 12, 'created', 'App\\Models\\Program', 5, 'Created program: WTC', NULL, '182.253.50.143', '2026-02-22 00:32:06', '2026-02-22 00:32:06'),
(169, 12, 'created', 'App\\Models\\Program', 6, 'Created program: COD', NULL, '182.253.50.143', '2026-02-22 00:32:34', '2026-02-22 00:32:34'),
(170, 12, 'created', 'App\\Models\\Program', 7, 'Created program: MATE', NULL, '182.253.50.143', '2026-02-22 00:33:24', '2026-02-22 00:33:24'),
(171, 12, 'created', 'App\\Models\\Program', 8, 'Created program: Budapest', NULL, '182.253.50.143', '2026-02-22 00:33:54', '2026-02-22 00:33:54'),
(172, 12, 'deleted', 'App\\Models\\Timeline', 5, 'Deleted timeline: HALOOO', NULL, '182.253.50.143', '2026-02-22 00:34:57', '2026-02-22 00:34:57'),
(173, 12, 'deleted', 'App\\Models\\Timeline', 3, 'Deleted timeline: res', NULL, '182.253.50.143', '2026-02-22 00:35:03', '2026-02-22 00:35:03'),
(174, 12, 'deleted', 'App\\Models\\Timeline', 4, 'Deleted timeline: tes eddit', NULL, '182.253.50.143', '2026-02-22 00:35:08', '2026-02-22 00:35:08'),
(175, 12, 'created', 'App\\Models\\Task', 7, 'Created task: Staff Hiring', NULL, '182.253.50.143', '2026-02-22 00:35:48', '2026-02-22 00:35:48'),
(176, 12, 'updated', 'App\\Models\\Task', 7, 'Updated task: Staff Hiring', NULL, '182.253.50.143', '2026-02-22 00:36:29', '2026-02-22 00:36:29'),
(177, 12, 'updated', 'App\\Models\\Task', 7, 'Updated task: Staff Hiring', NULL, '182.253.50.143', '2026-02-22 00:36:48', '2026-02-22 00:36:48'),
(178, 12, 'created', 'App\\Models\\Task', 8, 'Created task: Welpar Internal', NULL, '182.253.50.143', '2026-02-22 00:37:21', '2026-02-22 00:37:21'),
(179, 12, 'updated', 'App\\Models\\Task', 7, 'Updated task: Staff Hiring', NULL, '182.253.50.143', '2026-02-22 00:37:33', '2026-02-22 00:37:33'),
(180, 12, 'created', 'App\\Models\\Task', 9, 'Created task: Rapat Departemen 1', NULL, '182.253.50.143', '2026-02-22 00:37:55', '2026-02-22 00:37:55'),
(181, 12, 'created', 'App\\Models\\Task', 10, 'Created task: Rapat departemen 2', NULL, '182.253.50.143', '2026-02-22 00:38:03', '2026-02-22 00:38:03'),
(182, 12, 'created', 'App\\Models\\Task', 11, 'Created task: Rapat Departemen 3', NULL, '182.253.50.143', '2026-02-22 00:38:09', '2026-02-22 00:38:09'),
(183, 12, 'updated', 'App\\Models\\Task', 9, 'Updated task: Rapat Departemen 1', NULL, '182.253.50.143', '2026-02-22 00:39:25', '2026-02-22 00:39:25'),
(184, 12, 'updated', 'App\\Models\\Task', 10, 'Updated task: Rapat departemen 2', NULL, '182.253.50.143', '2026-02-22 00:40:11', '2026-02-22 00:40:11'),
(185, 12, 'updated', 'App\\Models\\Task', 11, 'Updated task: Rapat Departemen 3', NULL, '182.253.50.143', '2026-02-22 00:41:28', '2026-02-22 00:41:28'),
(186, 12, 'updated', 'App\\Models\\Task', 9, 'Updated task: Rapat Departemen 1', NULL, '182.253.50.143', '2026-02-22 00:41:54', '2026-02-22 00:41:54'),
(187, 8, 'login', NULL, NULL, 'User logged in', NULL, '182.5.245.52', '2026-02-22 00:53:39', '2026-02-22 00:53:39'),
(188, 27, 'login', NULL, NULL, 'User logged in', NULL, '182.253.50.108', '2026-02-24 08:17:31', '2026-02-24 08:17:31'),
(189, 15, 'deleted', 'App\\Models\\Task', 3, 'Deleted task: pesen lapangan', NULL, '110.136.89.66', '2026-03-08 23:01:34', '2026-03-08 23:01:34'),
(190, 15, 'deleted', 'App\\Models\\Task', 4, 'Deleted task: Membuat RAB', NULL, '110.136.89.66', '2026-03-08 23:01:37', '2026-03-08 23:01:37'),
(191, 15, 'updated', 'App\\Models\\Program', 3, 'Updated program: PW 133', NULL, '110.136.89.66', '2026-03-08 23:02:56', '2026-03-08 23:02:56'),
(192, 1, 'login', NULL, NULL, 'User logged in', NULL, '103.94.191.152', '2026-03-10 19:53:23', '2026-03-10 19:53:23'),
(193, 15, 'created', 'App\\Models\\Program', 9, 'Created program: Community Development', NULL, '103.94.191.156', '2026-03-10 19:55:12', '2026-03-10 19:55:12'),
(194, 15, 'created', 'App\\Models\\Program', 10, 'Created program: Computer Engineering Championship', NULL, '103.94.191.156', '2026-03-10 19:56:06', '2026-03-10 19:56:06'),
(195, 15, 'updated', 'App\\Models\\Program', 1, 'Updated program: Anak Komputer Bonding Day', NULL, '103.94.191.156', '2026-03-10 19:56:36', '2026-03-10 19:56:36'),
(196, 15, 'updated', 'App\\Models\\Program', 2, 'Updated program: Pelepasan Anak Teknik Komputer', NULL, '103.94.191.156', '2026-03-10 19:56:51', '2026-03-10 19:56:51'),
(197, 15, 'updated', 'App\\Models\\Program', 3, 'Updated program: Perayaan Wisuda 133', NULL, '103.94.191.156', '2026-03-10 19:57:22', '2026-03-10 19:57:22'),
(198, 15, 'created', 'App\\Models\\Program', 11, 'Created program: Computer Engineering Art Appreciation Night', NULL, '103.94.191.156', '2026-03-10 19:58:57', '2026-03-10 19:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `has_poll` tinyint(1) NOT NULL DEFAULT 0,
  `poll_question` varchar(255) DEFAULT NULL,
  `poll_ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_comments`
--

CREATE TABLE `announcement_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_reactions`
--

CREATE TABLE `announcement_reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cabinets`
--

CREATE TABLE `cabinets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` varchar(9) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabinets`
--

INSERT INTO `cabinets` (`id`, `name`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kabinet Sentra Sinergi', '2026/2027', 'active', '2026-01-25 23:27:05', '2026-02-11 01:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `cabinet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `cabinet_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PSDM', 'Pengembangan Sumber Daya Manusia', 1, 'active', '2026-01-25 23:27:05', '2026-01-25 23:27:05'),
(2, 'MedFo', 'Media dan Informasi', 1, 'active', '2026-01-25 23:27:05', '2026-02-11 01:07:43'),
(3, 'HuBlu', 'Hubungan Luar', 1, 'active', '2026-01-25 23:27:05', '2026-02-11 01:07:06'),
(4, 'RisProf', 'Riset dan Keprofesian', 1, 'active', '2026-01-25 23:27:05', '2026-02-11 01:08:59'),
(5, 'KesMa', 'Kesejahteraan Mahasiswa', 1, 'active', '2026-01-25 23:27:05', '2026-02-11 01:06:50'),
(6, 'Dagri', 'Dalam Negeri', 1, 'active', '2026-02-11 01:08:23', '2026-02-11 01:08:23'),
(7, 'Personalia', 'Harus Kenal Semua', 1, 'active', '2026-02-11 01:09:45', '2026-02-11 01:09:45'),
(8, 'SekBen', 'Sekretaris dan Bendahara', 1, 'active', '2026-02-11 01:10:22', '2026-02-11 01:10:22'),
(9, 'KWU', 'Kewirausahaan', 1, 'active', '2026-02-11 01:10:47', '2026-02-11 01:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `drive_accounts`
--

CREATE TABLE `drive_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `drive_url` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `evaluator_id` bigint(20) UNSIGNED NOT NULL,
  `evaluator_type` enum('kabinet','bph') NOT NULL,
  `period` varchar(50) NOT NULL,
  `kehadiran` tinyint(4) NOT NULL DEFAULT 1,
  `kedisiplinan` tinyint(4) NOT NULL DEFAULT 1,
  `tanggung_jawab` tinyint(4) NOT NULL DEFAULT 1,
  `kerjasama` tinyint(4) NOT NULL DEFAULT 1,
  `inisiatif` tinyint(4) NOT NULL DEFAULT 1,
  `komunikasi` tinyint(4) NOT NULL DEFAULT 1,
  `total_score` decimal(3,2) NOT NULL DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_criteria`
--

CREATE TABLE `evaluation_criteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `max_score` tinyint(3) UNSIGNED NOT NULL DEFAULT 100,
  `weight` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_parameters`
--

CREATE TABLE `grade_parameters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `min_score` decimal(3,2) NOT NULL,
  `max_score` decimal(3,2) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `label` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL DEFAULT '#10B981',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_parameters`
--

INSERT INTO `grade_parameters` (`id`, `min_score`, `max_score`, `grade`, `label`, `color`, `created_at`, `updated_at`) VALUES
(1, 4.50, 5.00, 'A', 'Sangat Baik', '#10B981', '2026-01-25 23:27:08', '2026-01-25 23:27:08'),
(2, 3.50, 4.49, 'B', 'Baik', '#3B82F6', '2026-01-25 23:27:08', '2026-01-25 23:27:08'),
(3, 2.50, 3.49, 'C', 'Cukup', '#F59E0B', '2026-01-25 23:27:08', '2026-01-25 23:27:08'),
(4, 1.50, 2.49, 'D', 'Kurang', '#F97316', '2026-01-25 23:27:08', '2026-01-25 23:27:08'),
(5, 1.00, 1.49, 'E', 'Sangat Kurang', '#EF4444', '2026-01-25 23:27:08', '2026-01-25 23:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `information_boards`
--

CREATE TABLE `information_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(320) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information_boards`
--

INSERT INTO `information_boards` (`id`, `user_id`, `title`, `slug`, `excerpt`, `content`, `cover_image`, `status`, `published_at`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Coba', 'coba', 'Coba Coba', 'haloo', 'information-boards/qYEHuGv04mcjU5AcPYZkSnBLuTTKy02XzxmJZKHt.jpg', 'published', '2026-02-21 03:00:00', NULL, NULL, '2026-02-21 20:07:37', '2026-02-21 20:09:03'),
(2, 1, 'Mengaji', 'mengaji', 'ads', 'asd', 'information-boards/S64PQyH553HbzmwRTP6NoSxGCKzRLUXDFK5hUXXs.jpg', 'published', '2026-02-21 03:00:00', NULL, NULL, '2026-02-21 20:22:34', '2026-02-21 20:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `information_board_category`
--

CREATE TABLE `information_board_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `information_board_id` bigint(20) UNSIGNED NOT NULL,
  `information_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information_board_category`
--

INSERT INTO `information_board_category` (`id`, `information_board_id`, `information_category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL),
(2, 2, 4, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `information_categories`
--

CREATE TABLE `information_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information_categories`
--

INSERT INTO `information_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pengumuman', 'pengumuman', '2026-02-21 20:04:37', '2026-02-21 20:04:37'),
(2, 'Kegiatan', 'kegiatan', '2026-02-21 20:04:37', '2026-02-21 20:04:37'),
(3, 'Kolaborasi', 'kolaborasi', '2026-02-21 20:04:37', '2026-02-21 20:04:37'),
(4, 'Dokumentasi', 'dokumentasi', '2026-02-21 20:04:37', '2026-02-21 20:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `content`, `is_read`, `created_at`, `updated_at`) VALUES
(9, 1, 8, 'opo ae ron', 1, '2026-02-19 06:58:49', '2026-02-19 07:00:39'),
(10, 1, 8, 'tessa', 1, '2026-02-19 06:58:53', '2026-02-19 07:00:39'),
(11, 1, 8, 'tesss', 1, '2026-02-19 06:58:56', '2026-02-19 07:00:39'),
(12, 15, 1, 'Admin asu', 1, '2026-03-10 19:52:48', '2026-03-10 19:54:03'),
(13, 1, 15, 'kn', 0, '2026-03-10 19:55:34', '2026-03-10 19:55:34');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_05_000001_create_roles_table', 1),
(5, '2026_01_05_000002_create_cabinets_table', 1),
(6, '2026_01_05_000003_create_departments_table', 1),
(7, '2026_01_05_000004_add_role_department_to_users_table', 1),
(8, '2026_01_05_000005_create_programs_table', 1),
(9, '2026_01_05_000006_create_timelines_table', 1),
(10, '2026_01_05_000007_create_tasks_table', 1),
(11, '2026_01_05_000008_create_evaluations_table', 1),
(12, '2026_01_05_000009_create_activity_logs_table', 1),
(13, '2026_01_05_000010_create_settings_table', 1),
(14, '2026_01_05_100001_update_evaluations_table', 1),
(15, '2026_01_05_100002_create_v3_tables', 1),
(16, '2026_01_05_100003_create_useful_links_table', 1),
(17, '2026_01_07_000001_create_announcements_tables', 1),
(18, '2026_01_12_072137_add_kanban_columns_to_tasks_table', 1),
(19, '2026_01_12_073626_make_program_id_nullable_in_tasks_table', 1),
(20, '2026_01_12_090223_add_pending_status_to_tasks_table', 1),
(21, '2026_01_14_070859_create_notifications_table', 1),
(22, '2026_02_21_000001_add_google_event_id_to_timelines_table', 2),
(23, '2026_02_21_000002_create_information_boards_table', 3),
(24, '2026_02_21_000003_create_information_categories_tables', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `type`, `title`, `message`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 17, 'task_assigned', 'Task Baru', 'Kamu ditugaskan untuk: Open Recruitment panitia PW 131', '{\"task_id\":5}', NULL, '2026-02-19 18:50:31', '2026-02-19 18:50:31'),
(2, 12, 'task_assigned', 'Task Baru', 'Kamu ditugaskan untuk: Welpar Internal', '{\"task_id\":8}', NULL, '2026-02-22 00:37:21', '2026-02-22 00:37:21'),
(3, 12, 'task_assigned', 'Task Baru', 'Kamu ditugaskan untuk: Rapat Departemen 1', '{\"task_id\":9}', NULL, '2026-02-22 00:37:55', '2026-02-22 00:37:55'),
(4, 12, 'task_assigned', 'Task Baru', 'Kamu ditugaskan untuk: Rapat departemen 2', '{\"task_id\":10}', NULL, '2026-02-22 00:38:03', '2026-02-22 00:38:03'),
(5, 12, 'task_assigned', 'Task Baru', 'Kamu ditugaskan untuk: Rapat Departemen 3', '{\"task_id\":11}', NULL, '2026-02-22 00:38:09', '2026-02-22 00:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll_options`
--

CREATE TABLE `poll_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement_id` bigint(20) UNSIGNED NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `votes_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll_votes`
--

CREATE TABLE `poll_votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poll_option_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('planning','active','completed','cancelled') NOT NULL DEFAULT 'planning',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `description`, `department_id`, `created_by`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anak Komputer Bonding Day', 'Anakonda merupakan sebuah agenda kegiatan yang dirancang khusus untuk mempererat jalinan sosial antar mahasiswa Teknik Komputer ITS. Fokus utama dari kegiatan ini adalah menciptakan suasana kebersamaan dan keakraban melalui aktivitas yang menyenangkan dan inklusif. Rangkaian kegiatan Anakonda dapat mencakup berbagai bentuk aktivitas, seperti olahraga bersama, permainan (games), nonton bareng (nobar), serta kegiatan santai lainnya yang memungkinkan terjadinya interaksi antar mahasiswa lintas angkatan.', 6, 7, '2026-02-11', '2027-12-01', 'planning', '2026-02-11 01:15:34', '2026-03-10 19:56:36'),
(2, 'Pelepasan Anak Teknik Komputer', 'Kegiatan ini akan dilaksanakan dalam bentuk sebuah acara pelepasan dan syukuran atas kelulusan masa studi bagi mahasiswa S1 Teknik Komputer ITS.', 6, 7, '2026-09-09', '2027-05-20', 'planning', '2026-02-11 01:16:38', '2026-03-10 19:56:51'),
(3, 'Perayaan Wisuda 133', NULL, 6, 17, '2026-02-20', '2026-04-18', 'planning', '2026-02-19 18:46:44', '2026-03-10 19:57:22'),
(4, 'OKKBK', NULL, 1, 12, '2026-08-01', '2026-09-01', 'planning', '2026-02-22 00:31:11', '2026-02-22 00:31:11'),
(5, 'WTC', 'Pelatihan Hardskill', 1, 12, '2026-02-22', '2026-12-31', 'planning', '2026-02-22 00:32:06', '2026-02-22 00:32:06'),
(6, 'COD', 'Pengembangan Softskill', 1, 12, '2026-02-22', '2026-12-31', 'planning', '2026-02-22 00:32:34', '2026-02-22 00:32:34'),
(7, 'MATE', 'Pendampingan Kepanitiaan', 1, 12, '2026-02-22', '2026-12-31', 'planning', '2026-02-22 00:33:24', '2026-02-22 00:33:24'),
(8, 'Budapest', 'Pendataan Prestasi', 1, 12, '2026-02-22', '2026-12-31', 'planning', '2026-02-22 00:33:54', '2026-02-22 00:33:54'),
(9, 'Community Development', NULL, 6, 15, '2026-03-11', '2026-11-30', 'planning', '2026-03-10 19:55:12', '2026-03-10 19:55:12'),
(10, 'Computer Engineering Championship', NULL, 6, 15, '2026-11-01', '2026-11-30', 'planning', '2026-03-10 19:56:06', '2026-03-10 19:56:06'),
(11, 'Computer Engineering Art Appreciation Night', NULL, 6, 15, '2026-11-28', '2026-12-05', 'planning', '2026-03-10 19:58:57', '2026-03-10 19:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `program_pics`
--

CREATE TABLE `program_pics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_user`
--

CREATE TABLE `program_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator dengan akses penuh', '2026-01-25 23:27:05', '2026-01-25 23:27:05'),
(2, 'bph', 'Badan Pengurus Harian', '2026-01-25 23:27:05', '2026-01-25 23:27:05'),
(3, 'kabinet', 'Kepala Departemen', '2026-01-25 23:27:05', '2026-01-25 23:27:05'),
(4, 'staff', 'Anggota Staff', '2026-01-25 23:27:05', '2026-01-25 23:27:05');

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

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'string',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'CMOS', 'string', '2026-01-26 03:43:46', '2026-01-26 03:43:46'),
(2, 'theme_color', 'amber', 'string', '2026-01-26 03:43:46', '2026-02-18 06:52:33'),
(3, 'organization_name', 'HIMATEKKOM ITS', 'string', '2026-01-26 03:43:46', '2026-01-26 03:43:46'),
(4, 'evaluation_period', 'monthly', 'string', '2026-01-26 03:43:46', '2026-01-26 03:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assigned_to` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('todo','in_progress','pending','done') DEFAULT 'todo',
  `progress` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `priority` enum('low','medium','high') NOT NULL DEFAULT 'medium',
  `deadline` date DEFAULT NULL,
  `is_global` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `program_id`, `department_id`, `assigned_to`, `created_by`, `status`, `progress`, `priority`, `deadline`, `is_global`, `created_at`, `updated_at`) VALUES
(1, 'RAB', 'mendata dll', NULL, 6, NULL, 7, 'done', 100, 'high', '2026-02-19', 0, '2026-02-18 02:20:09', '2026-02-19 07:29:54'),
(2, 'Pembentukan panitia', 'PDD -2', NULL, 6, NULL, 7, 'in_progress', 65, 'medium', '2026-02-26', 0, '2026-02-18 06:47:46', '2026-02-18 06:50:15'),
(5, 'Open Recruitment panitia PW 131', NULL, 3, NULL, 17, 17, 'in_progress', 20, 'medium', '2026-02-27', 0, '2026-02-19 18:50:31', '2026-02-20 00:01:44'),
(6, 'RPK', 'Bikin RPK dah intinya', NULL, 1, 12, 12, 'done', 100, 'high', '2026-02-25', 0, '2026-02-21 06:01:50', '2026-02-22 00:29:59'),
(7, 'Staff Hiring', 'Pilah staff yang bagus', NULL, 1, 12, 12, 'todo', 0, 'medium', NULL, 0, '2026-02-22 00:35:48', '2026-02-22 00:37:33'),
(8, 'Welpar Internal', 'Adalah pokonya', NULL, 1, 12, 12, 'todo', 0, 'medium', NULL, 0, '2026-02-22 00:37:21', '2026-02-22 00:37:21'),
(9, 'Rapat Departemen 1', 'Pembahasan dan Pembagian Proker', NULL, 1, 12, 12, 'todo', 0, 'high', '2026-04-04', 0, '2026-02-22 00:37:55', '2026-02-22 00:41:54'),
(10, 'Rapat departemen 2', 'Progress proker dan monitoring', NULL, 1, 12, 12, 'todo', 0, 'high', '2026-05-08', 0, '2026-02-22 00:38:03', '2026-02-22 00:40:11'),
(11, 'Rapat Departemen 3', 'Progress proker dan monitoring', NULL, 1, 12, 12, 'todo', 0, 'high', '2026-06-12', 0, '2026-02-22 00:38:09', '2026-02-22 00:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('global','department','program') NOT NULL DEFAULT 'global',
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `color` varchar(255) NOT NULL DEFAULT '#7C3AED',
  `google_event_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `title`, `description`, `type`, `department_id`, `program_id`, `start_date`, `end_date`, `color`, `google_event_id`, `created_at`, `updated_at`) VALUES
(1, 'PW-133', 'Perayaan Wisuda 133', 'department', 6, NULL, '2026-04-12', '2026-04-12', '#ff7300', NULL, '2026-02-19 18:45:16', '2026-02-19 18:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `useful_links`
--

CREATE TABLE `useful_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fas fa-link',
  `category` varchar(255) NOT NULL DEFAULT 'general',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `useful_links`
--

INSERT INTO `useful_links` (`id`, `title`, `description`, `url`, `icon`, `category`, `created_by`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(2, 'LINK PPT RAPAT KABINET 1', NULL, 'https://www.canva.com/design/DAHBo-rJ7tk/FqpiPV6nMCqZd5RXhgrBfg/view?utm_content=DAHBo-rJ7tk&utm_campaign=designshare&utm_medium=link2&utm_source=uniquelinks&utlId=hea1329cdde', 'fas fa-link', 'resource', 1, 1, 0, '2026-02-19 07:46:59', '2026-02-19 07:46:59'),
(3, 'DATABASE KABINET HIMATEKKOM 2026', NULL, 'https://docs.google.com/spreadsheets/d/1dkicSEVlwvg_amzvUUvgvWq2IdnroT-HVc7ekL6oO7g/edit?usp=sharing', 'fas fa-link', 'general', 1, 1, 0, '2026-02-19 07:48:32', '2026-02-19 07:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `department_id`, `name`, `email`, `avatar`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Administrator', 'admin@savana.test', NULL, 'active', NULL, '$2y$12$jwsdn5jfH/VGudf4TG40EuHPpO8iApQp78fFpS21ntoaVNaXsztBS', 'lHKN5Nfdzao8I4qMO2cF8PiwNSNMIKV6KIr8TBQnhl3Li0c0i1BER5cs0ZH4', '2026-01-25 23:27:06', '2026-02-21 00:56:10'),
(4, 3, 2, 'Kepala Medinfo', 'kabinet.medinfo@savana.test', NULL, 'active', NULL, '$2y$12$LxUlXiGm5NFoi3Psv2FyHufC.vfz.1tngNGa.nvhSY/uiRclSHjua', NULL, '2026-01-25 23:27:07', '2026-01-25 23:27:07'),
(6, 4, 2, 'Staff Medinfo 1', 'staff2@savana.test', NULL, 'active', NULL, '$2y$12$Eeuh4ke64LlZNGY8Et6RWuedesiBtkkvlpj/ftH4pkYE0aIFKmYfm', NULL, '2026-01-25 23:27:08', '2026-01-25 23:27:08'),
(7, 3, 6, 'Developer Kabinet', 'kdev@gmail.com', NULL, 'active', NULL, '$2y$12$2QudbIieUTuQD9nC7vVltua9u6hDL/eOYh34GbL7ffnS0dN/1fFBO', NULL, '2026-02-11 01:14:23', '2026-02-18 08:37:18'),
(8, 2, NULL, 'Muhammad Panji Fathuroni', 'm.panjifathuroni@gmail.com', NULL, 'active', NULL, '$2y$12$cD/tVtyHxiW7l6tHDNwtxOHn9nmNhRvwilOphlgmd6ku.gPztcOIi', '68Bzs3nt0TnjlXsHQffchPA6zNyDcWdIv03TQVWrxLYNoHWbM2JDbm0WRMHR', '2026-02-19 06:51:52', '2026-02-21 01:02:18'),
(9, 2, 7, 'Muhammad Fawaaz Dhawi', 'fawaazdhawi@gmail.com', NULL, 'active', NULL, '$2y$12$ZkobR7MGoSmA1kHXsSuzOOw1N54i6njyT6C4UUDmv7z5cxavPALjm', NULL, '2026-02-19 06:53:19', '2026-02-19 06:53:19'),
(10, 2, 8, 'Alya Hasna Fadilah', 'alyahasna20112006@gmail.com', NULL, 'active', NULL, '$2y$12$9vfy7WnN0gMsIj5Vl7LTZuJFpVBk8vwbefqZhAkndH2zHa2iv/pte', NULL, '2026-02-19 06:55:09', '2026-02-19 06:55:09'),
(11, 2, 8, 'Rayyan Fathanza', 'rfathanza@gmail.com', NULL, 'active', NULL, '$2y$12$4uXMHY5v/JPFm5Ld4A32r.puYvou.I94JPq7jkvyQ3pBCLMzqapeO', NULL, '2026-02-19 06:55:50', '2026-02-19 06:55:50'),
(12, 3, 1, 'Sultan Syafiq Rakan', 'sultansyafiqrakan36@gmail.com', NULL, 'active', NULL, '$2y$12$IzOYKJFss/5vHwpzXucG3.R5kgk/NozXZx0InG6yn5tcLO/Q8ktHC', 'Pxv5IebrWxm5OsLPzeguaUn3rsb7ik7ZPau7G8yT0qkMnKMJdaOvHjOgBOaT', '2026-02-19 07:05:39', '2026-02-19 07:05:39'),
(13, 3, 1, 'Bintang Narindra Putra Pratama', 'bintangnarindra08@gmail.com', NULL, 'active', NULL, '$2y$12$1cOUpS5uARu0c5UGvElUR.ggSQN65ws8GEOVH7Th60fgNmFm2XE..', NULL, '2026-02-19 07:06:15', '2026-02-19 07:06:15'),
(14, 3, 1, 'Kenny Joe Neville', 'kjoeneville17@gmail.com', NULL, 'active', NULL, '$2y$12$dTxfRXBZTgIl1HE9Hlw9mep2zy//dSxzVBKsdLQq.ipMWbsXTbtOy', NULL, '2026-02-19 07:06:45', '2026-02-19 07:06:45'),
(15, 3, 6, 'Zaky Ahmad Septyan Pradana', 'zakyahmadsp4746@gmail.com', NULL, 'active', NULL, '$2y$12$o9QmU9AZoRLOzh9OtNOAbOF9Hs38TRmmS9RUNLnvB.m.gQHOj7Ms6', 'NOrPJbXKFvQVJFC94m0KENR9VSrz1c9P0ZrTokhbgXA7dHRv1iDFiIvhlaDx', '2026-02-19 07:09:28', '2026-02-19 07:09:28'),
(16, 3, 6, 'Gilang Gallan Indrana', 'gilangindrana11@gmail.com', NULL, 'active', NULL, '$2y$12$Xw2zwUbu8iCna06h3fyRIec55jp2u64RjHrp5VcIKP0mUo8JhLEd.', NULL, '2026-02-19 07:10:04', '2026-02-19 07:10:04'),
(17, 3, 6, 'Nadhif Basyara', 'nadhifbasyara78@gmail.com', NULL, 'active', NULL, '$2y$12$/XmOw17/PvF2/vUkf9O9NugIi9k3t4HHezX8.6Q/.vsHy3Wo9MPDK', 'MiEv2mUSArkBA7o0WoiCYd15OKHhG4nAQknoCLIVtYpjW1ThmhG1czjgmgRw', '2026-02-19 07:10:33', '2026-02-19 07:10:33'),
(18, 3, 3, 'Davi Ariq Nugroho', 'daviariqq@gmail.com', NULL, 'active', NULL, '$2y$12$gd0TRInnJ1cFdoW/wRBmk.8xIdEaUCrKERqlhOhzXn.NTZ8zj919u', NULL, '2026-02-19 07:13:46', '2026-02-19 07:13:46'),
(19, 3, 3, 'Atria Caesariano Tinto', 'atriact@gmail.com', NULL, 'active', NULL, '$2y$12$K7a1LgfFwazOXDOt4D0Q6umPNU3wjIsOEN9BVEvAIYJQXKVveYFOa', NULL, '2026-02-19 07:14:15', '2026-02-19 07:14:15'),
(20, 3, 3, 'Syela Akhul Khalimi', 'yaudahakhul@gmail.com', NULL, 'active', NULL, '$2y$12$EPC4EemxAlajZQ2rKaneXO77hw44r.mRKKyG5xar8.rFYWftZAlzq', NULL, '2026-02-19 07:14:49', '2026-02-19 07:14:49'),
(21, 3, 4, 'Nur Rahman Fauzan', 'hkhfds1234@gmail.com', NULL, 'active', NULL, '$2y$12$QaSZorFFQWHXVRVDanoFNe6nz68ZGirsVVLDJ3h/.hMR78nweeFVS', NULL, '2026-02-19 07:16:37', '2026-02-19 07:16:37'),
(22, 3, 4, 'Akhmad Rizqulloh Ridlohi', '5024231037@student.its.ac.id', NULL, 'active', NULL, '$2y$12$qvUtE99lYiJMRYThIKO7TejyxBYzKu3g/wfd5RD81gv7924BHFqWO', NULL, '2026-02-19 07:17:06', '2026-02-19 07:17:06'),
(23, 3, 4, 'Abraham Napitulu', 'abraham.na70.work@gmail.com', NULL, 'active', NULL, '$2y$12$goyHoZkGwylqktcld7Apkeb9scOuTLH66BTlZsNKYnSYrB9pFT/Dm', NULL, '2026-02-19 07:17:45', '2026-02-19 07:17:45'),
(24, 3, 9, 'Susilo Hendri Yudhoyono', 'suhenyu2004@gmail.com', NULL, 'active', NULL, '$2y$12$0o.SfYKstargXn4t.NRQDOI3gVtFhO4Ci7OxzV3l4rsTX3G9G6Tai', 'HFQ3oLgKtv5CoL5Mxq16W4dbVabUrTT2LrXg2PST0dkufOIXwRFH4Y717g0N', '2026-02-19 07:19:35', '2026-02-19 07:19:35'),
(25, 3, 9, 'Rafli JSPT', 'raflitambunan2005@gmail.com', NULL, 'active', NULL, '$2y$12$PnkcTIiDZxGh7gr8H3l3betLN3PObA3GObuBlSq0OEw2X3WptUCYm', NULL, '2026-02-19 07:20:23', '2026-02-19 07:20:23'),
(26, 3, 9, 'Danendra Galang Y', 'danendragalangyugastamak9@gmail.com', NULL, 'active', NULL, '$2y$12$gtiQhsR.KqxU0OUWfINtzO638ZeW/8HLh.4zq2Ichr9Sort8oCDOO', NULL, '2026-02-19 07:20:50', '2026-02-19 07:20:50'),
(27, 3, 5, 'M Rafli Satriani', 'rafli.satriani05@gmail.com', NULL, 'active', NULL, '$2y$12$Ul.CW0C/yVDWW6ZEId5NseDkensc6bka07apsmSJnRfHd1KA5H5EG', NULL, '2026-02-19 07:22:52', '2026-02-19 07:22:52'),
(28, 3, 5, 'Yudhi Nendra Kurniawan', 'yudhinindra43@gmail.com', NULL, 'active', NULL, '$2y$12$aIFvACeg2AZlwOl6SlT3r.Uctj2Z9Q3rmqStXSWdOZYv3oLHmiNcK', NULL, '2026-02-19 07:23:26', '2026-02-19 07:23:26'),
(29, 3, 5, 'Jays', 'jaysyurrahman17@gmail.com', NULL, 'active', NULL, '$2y$12$Eju1lhZgwZBUG.0Nm7cAFe61CL8xYs3Sw2iJvaNwXdM5TIdjz2lz.', 'jolU31w9D6G6h53089m5HNwOrYRFvUsarzoSOxtqoSCsVN2Rlc3uAHPaF96T', '2026-02-19 07:23:59', '2026-02-19 07:23:59'),
(30, 3, 2, 'Alvito Aryo Putra', 'alvitoaryo@gmail.com', NULL, 'active', NULL, '$2y$12$9.RyoGF3APkPnZZbuB/m5etgAY94mHZE4PdH3e/r4j4qoQbO1A59C', NULL, '2026-02-19 07:25:19', '2026-02-19 07:25:19'),
(31, 3, 2, 'Mathew William Junior Tumanggor', 'mathew.nyxle@gmail.com', NULL, 'active', NULL, '$2y$12$cCO340N2YovdygMgxTSmbOtc/pVrxg/Hw84LK9tFplNzni9RiVCyi', 'HlfIlNHRLHDskePWRuFgFek98gIbzrG7kgF1cUmUEE4Sv4THpwHYc7HlrZxy', '2026-02-19 07:26:01', '2026-02-19 07:26:01'),
(32, 3, 2, 'Ahmad Arfian Syamsa', 'syamsarfian@gmail.com', NULL, 'active', NULL, '$2y$12$1XETRTfKm.mN3SEIgrfqT.inECMfJHRqIR/woQbozScgwNYkoswOi', NULL, '2026-02-19 07:26:58', '2026-02-19 07:26:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`),
  ADD KEY `activity_logs_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_user_id_foreign` (`user_id`);

--
-- Indexes for table `announcement_comments`
--
ALTER TABLE `announcement_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcement_comments_announcement_id_foreign` (`announcement_id`),
  ADD KEY `announcement_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `announcement_reactions`
--
ALTER TABLE `announcement_reactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `announcement_reactions_announcement_id_user_id_unique` (`announcement_id`,`user_id`),
  ADD KEY `announcement_reactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `cabinets`
--
ALTER TABLE `cabinets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_cabinet_id_foreign` (`cabinet_id`);

--
-- Indexes for table `drive_accounts`
--
ALTER TABLE `drive_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drive_accounts_department_id_foreign` (`department_id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `evaluations_user_id_evaluator_type_period_unique` (`user_id`,`evaluator_type`,`period`),
  ADD KEY `evaluations_evaluator_id_foreign` (`evaluator_id`);

--
-- Indexes for table `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grade_parameters`
--
ALTER TABLE `grade_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information_boards`
--
ALTER TABLE `information_boards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `information_boards_slug_unique` (`slug`),
  ADD KEY `information_boards_user_id_foreign` (`user_id`),
  ADD KEY `information_boards_status_published_at_index` (`status`,`published_at`);

--
-- Indexes for table `information_board_category`
--
ALTER TABLE `information_board_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `info_board_category_unique` (`information_board_id`,`information_category_id`),
  ADD KEY `information_board_category_information_category_id_foreign` (`information_category_id`);

--
-- Indexes for table `information_categories`
--
ALTER TABLE `information_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `information_categories_slug_unique` (`slug`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_receiver_id_index` (`sender_id`,`receiver_id`),
  ADD KEY `messages_receiver_id_is_read_index` (`receiver_id`,`is_read`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_read_at_index` (`user_id`,`read_at`),
  ADD KEY `notifications_created_at_index` (`created_at`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `poll_options`
--
ALTER TABLE `poll_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_options_announcement_id_foreign` (`announcement_id`);

--
-- Indexes for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `poll_votes_poll_option_id_user_id_unique` (`poll_option_id`,`user_id`),
  ADD KEY `poll_votes_user_id_foreign` (`user_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_department_id_foreign` (`department_id`),
  ADD KEY `programs_created_by_foreign` (`created_by`);

--
-- Indexes for table `program_pics`
--
ALTER TABLE `program_pics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_pics_program_id_user_id_unique` (`program_id`,`user_id`),
  ADD KEY `program_pics_user_id_foreign` (`user_id`);

--
-- Indexes for table `program_user`
--
ALTER TABLE `program_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_user_program_id_foreign` (`program_id`),
  ADD KEY `program_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_program_id_foreign` (`program_id`),
  ADD KEY `tasks_assigned_to_foreign` (`assigned_to`),
  ADD KEY `tasks_created_by_foreign` (`created_by`),
  ADD KEY `tasks_department_id_foreign` (`department_id`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timelines_department_id_foreign` (`department_id`),
  ADD KEY `timelines_program_id_foreign` (`program_id`),
  ADD KEY `timelines_google_event_id_index` (`google_event_id`);

--
-- Indexes for table `useful_links`
--
ALTER TABLE `useful_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `useful_links_created_by_foreign` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement_comments`
--
ALTER TABLE `announcement_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement_reactions`
--
ALTER TABLE `announcement_reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cabinets`
--
ALTER TABLE `cabinets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `drive_accounts`
--
ALTER TABLE `drive_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_parameters`
--
ALTER TABLE `grade_parameters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `information_boards`
--
ALTER TABLE `information_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `information_board_category`
--
ALTER TABLE `information_board_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `information_categories`
--
ALTER TABLE `information_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `poll_options`
--
ALTER TABLE `poll_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poll_votes`
--
ALTER TABLE `poll_votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `program_pics`
--
ALTER TABLE `program_pics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_user`
--
ALTER TABLE `program_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `useful_links`
--
ALTER TABLE `useful_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `announcement_comments`
--
ALTER TABLE `announcement_comments`
  ADD CONSTRAINT `announcement_comments_announcement_id_foreign` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcement_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `announcement_reactions`
--
ALTER TABLE `announcement_reactions`
  ADD CONSTRAINT `announcement_reactions_announcement_id_foreign` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcement_reactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_cabinet_id_foreign` FOREIGN KEY (`cabinet_id`) REFERENCES `cabinets` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `drive_accounts`
--
ALTER TABLE `drive_accounts`
  ADD CONSTRAINT `drive_accounts_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_evaluator_id_foreign` FOREIGN KEY (`evaluator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `information_boards`
--
ALTER TABLE `information_boards`
  ADD CONSTRAINT `information_boards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `information_board_category`
--
ALTER TABLE `information_board_category`
  ADD CONSTRAINT `information_board_category_information_board_id_foreign` FOREIGN KEY (`information_board_id`) REFERENCES `information_boards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `information_board_category_information_category_id_foreign` FOREIGN KEY (`information_category_id`) REFERENCES `information_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `poll_options`
--
ALTER TABLE `poll_options`
  ADD CONSTRAINT `poll_options_announcement_id_foreign` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD CONSTRAINT `poll_votes_poll_option_id_foreign` FOREIGN KEY (`poll_option_id`) REFERENCES `poll_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `poll_votes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `programs_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_pics`
--
ALTER TABLE `program_pics`
  ADD CONSTRAINT `program_pics_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_pics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_user`
--
ALTER TABLE `program_user`
  ADD CONSTRAINT `program_user_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tasks_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tasks_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tasks_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `timelines`
--
ALTER TABLE `timelines`
  ADD CONSTRAINT `timelines_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `timelines_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `useful_links`
--
ALTER TABLE `useful_links`
  ADD CONSTRAINT `useful_links_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
