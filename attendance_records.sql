-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 02:38 PM
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
-- Database: `attendance_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `presences`
--

CREATE TABLE `presences` (
  `id` varchar(200) NOT NULL,
  `nis` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `journal_collection` varchar(200) NOT NULL,
  `student_attendance` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presences`
--

INSERT INTO `presences` (`id`, `nis`, `full_name`, `class`, `journal_collection`, `student_attendance`, `created_at`, `updated_at`) VALUES
('658d273d63315', '21,5936', 'M Dzaki ardiansyah', 'XI PPLG 1', 'ada', 'hadir', '2023-12-28 07:43:57', '2023-12-28 07:43:57'),
('658d2977cfd3f', '21,354356', 'ananda', 'XI PPLG 1', 'tidak ada', 'hadir', '2023-12-28 07:53:27', '2023-12-28 07:53:27'),
('658d4a7d95e53', '21,5936', 'M Dzaki ardiansyah', 'XI PPLG 1', 'ada', 'hadir', '2023-12-28 10:14:21', '2023-12-28 10:14:21'),
('658d4cec7ae1c', '21,5935', 'M Bariq', 'XI PPLG 1', 'ada', 'hadir', '2023-12-28 10:24:44', '2023-12-28 10:24:44'),
('658d4d323512e', '21,59875', 'agag', 'XI PPLG 1', 'ada', 'hadir', '2023-12-28 10:25:54', '2023-12-28 10:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(200) NOT NULL,
  `nis` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `number_phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nis`, `full_name`, `class`, `number_phone`, `address`, `role`, `created_at`, `updated_at`) VALUES
('658cf9cf9760f', '21,5936', 'M Dzaki ardiansyah', 'XI PPLG 1', '0895632506450', 'Dekoro Pekalongan Timur Kota Pekalongan', 'admin', '2023-12-28 04:30:07', '2023-12-28 04:30:07'),
('658d44cb1b135', '21,5935', 'M Bariq', 'XI PPLG 1', '08965422344', 'Wiradesa Kab Pekalongan', 'user', '2023-12-28 09:50:03', '2023-12-28 09:50:03'),
('658d478751b7e', '21,5944', 'Anisa ramadan', 'XI PPLG 1', '08993673633', 'Setono Pekalongan', 'user', '2023-12-28 10:01:43', '2023-12-28 10:01:43'),
('658d47e0c8dd1', '21,5923', 'Afrizal', 'XI PPLG 2', '048484784933', 'Bojong', 'user', '2023-12-28 10:03:12', '2023-12-28 10:03:12'),
('658d4b03dd3c4', '21,5965', 'Namira', 'XI PPLG 1', '089765453', 'Gamer Pekalongan Timur', 'user', '2023-12-28 10:16:35', '2023-12-28 10:16:35'),
('658d4b1ab8475', '21,5987', 'agung', 'XI PPLG 1', '09897466334', 'pekajangan', 'user', '2023-12-28 10:16:58', '2023-12-28 10:16:58'),
('658d4b9705ea2', '214141', '41444', 'XI PPLG 1', '4144', '41414', 'user', '2023-12-28 10:19:03', '2023-12-28 10:19:03'),
('658d4c7155960', '3212134', 'Nisa sabyan', 'XI PPLG 1', 'agefg3245235', 'awesdfcef', 'user', '2023-12-28 10:22:41', '2023-12-28 10:22:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
