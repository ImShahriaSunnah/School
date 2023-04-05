-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 06:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikk_edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `acquisitions`
--

CREATE TABLE `acquisitions` (
  `id` int(11) NOT NULL,
  `happy_clients` int(11) DEFAULT NULL,
  `projects` int(11) DEFAULT NULL,
  `trusted_users` int(11) DEFAULT NULL,
  `hero_thumb` text DEFAULT NULL,
  `hero_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `acquisitions`
--

INSERT INTO `acquisitions` (`id`, `happy_clients`, `projects`, `trusted_users`, `hero_thumb`, `hero_content`) VALUES
(1, 876, 156, 430, '<h2 class=\"section__title section__title-2\">Loved and trusted by over 40k+ users!</h2>\r\n<p>Over the last few years, podcasts have become a huge deal. They’ve taken on a growing role.</p>', '<p>One More Step Left ,Now go and change the World <br> And don\'t Forget to have fun</p>');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$byiUVuPV9ZmA4iZuHgXRj.1YR/5eDfJ7iiYWJqDV7YDTKQEJI/yaa', 0, NULL, '2021-11-17 02:19:28', '2022-11-19 12:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_students`
--

CREATE TABLE `assignment_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_assignment` text DEFAULT NULL,
  `assignment_teachers_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_teachers`
--

CREATE TABLE `assignment_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignment_teachers`
--

INSERT INTO `assignment_teachers` (`id`, `title`, `description`, `file`, `deadline`, `teacher_id`, `subject_id`, `department_id`, `class_id`, `section_id`, `group_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Math assign', 'lorem all', 'storage/uploads/TeacherFile/1664015376.png', '2022-09-26T16:20', 40, 0, 1070, 713, 1420, NULL, 0, '2022-09-24 10:59:36', '2022-09-24 10:59:36'),
(14, 'qwaetrytyguhijkl;\'', 'wertyuiop[', 'storage/uploads/TeacherFile/1672303959.jpeg', '2022-12-31T20:47', 45, 102, 1206, 805, 1514, NULL, 0, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
(16, 'rtytuyuio', 'awesrfghuijkl;', 'storage/uploads/TeacherFile/1672304594.png', '2023-01-01T20:03', 45, 102, 1206, 805, 1514, NULL, 0, '2022-12-29 09:33:14', '2022-12-29 09:33:14'),
(17, 'qrtyui\'', 'dfguyiolu', 'storage/uploads/TeacherFile/1672304616.jpeg', '2022-12-31T20:08', 45, 102, 1206, 805, 1514, NULL, 1, '2022-12-29 09:33:36', '2022-12-29 09:33:45'),
(18, 'math last assignment', 'ch- 12 solve all the problem in the exercise part.\r\nexcept 22 and 23.', NULL, '2022-12-31T17:00', 46, 102, 1202, 804, 1513, NULL, 0, '2022-12-29 10:49:56', '2022-12-29 10:49:56'),
(19, 'first Assignment', 'bangla 1st paper assignment.', 'storage/uploads/TeacherFile/1675502330.txt', '2023-02-05T15:00', 52, 102, 1194, 804, 1513, NULL, 1, '2023-02-04 09:48:50', '2023-02-22 05:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `assign_teachers`
--

CREATE TABLE `assign_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `class_teacher` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_teachers`
--

INSERT INTO `assign_teachers` (`id`, `school_id`, `class_id`, `section_id`, `subject_id`, `department_id`, `teacher_id`, `group_id`, `class_teacher`, `created_at`, `updated_at`) VALUES
(37, 102, 713, 1420, 1070, 1070, 40, NULL, 1, '2022-09-21 14:29:31', '2022-09-21 14:29:31'),
(38, 102, 710, 1417, 1077, 1077, 41, NULL, 1, '2022-09-21 14:30:53', '2022-09-21 14:30:53'),
(50, 102, 714, 1421, NULL, 1068, 41, NULL, 1, '2022-11-20 14:19:19', '2022-11-20 14:19:19'),
(53, 119, 804, 1513, NULL, 1194, 52, 0, 1, '2022-11-20 14:21:00', '2022-11-20 14:21:00'),
(55, 119, 804, 1517, NULL, 1216, 56, 0, 1, '2022-11-21 05:34:38', '2022-11-21 05:34:38'),
(61, 119, 804, 1513, NULL, 1206, 45, 0, 1, '2022-12-08 09:26:16', '2022-12-08 09:26:16'),
(62, 119, 805, 1514, NULL, 1206, 45, NULL, 1, '2022-12-08 09:26:32', '2022-12-08 09:26:32'),
(63, 119, 804, 1513, NULL, 1204, 60, 0, 1, '2022-12-08 09:43:26', '2022-12-08 09:43:26'),
(64, 119, 804, 1517, NULL, 1194, 52, 0, 1, '2022-12-08 09:59:47', '2022-12-08 09:59:47'),
(66, 119, 804, 1513, NULL, 1202, 46, 0, 1, '2022-12-29 10:02:16', '2022-12-29 10:02:16'),
(67, 119, 804, 1513, NULL, 1196, 54, 0, 1, '2023-02-04 08:02:44', '2023-02-04 08:02:44'),
(69, 119, 807, 1518, NULL, 1206, 67, NULL, 1, '2023-02-04 09:29:50', '2023-02-04 09:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `comment` varchar(191) DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `attendance`, `comment`, `class_id`, `section_id`, `group_id`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 78, 1, NULL, 804, 1513, 34, 119, '2022-12-08 05:58:52', '2022-12-08 07:14:10'),
(2, 80, 1, NULL, 804, 1513, 34, 119, '2022-12-08 05:58:52', '2022-12-08 05:59:07'),
(3, 84, 1, NULL, 802, 1511, NULL, 119, '2022-12-08 11:51:46', '2022-12-08 11:51:46'),
(4, 85, 1, NULL, 802, 1511, NULL, 119, '2022-12-08 11:51:46', '2022-12-08 11:51:46'),
(5, 86, 1, NULL, 802, 1511, NULL, 119, '2022-12-08 11:51:46', '2022-12-08 11:51:46'),
(6, 87, 1, NULL, 802, 1511, NULL, 119, '2022-12-08 11:51:46', '2022-12-08 11:51:46'),
(7, 88, 1, NULL, 802, 1511, NULL, 119, '2022-12-08 11:51:46', '2022-12-08 11:51:46'),
(8, 89, 1, NULL, 802, 1511, NULL, 119, '2022-12-08 11:51:46', '2022-12-08 11:51:46'),
(9, 60, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:12:29', '2022-12-29 10:12:29'),
(10, 62, 0, NULL, 804, 1513, 34, 119, '2022-12-29 10:12:29', '2022-12-29 10:12:29'),
(11, 63, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:12:30', '2022-12-29 10:12:30'),
(12, 64, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:12:30', '2022-12-29 10:12:30'),
(13, 66, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:12:30', '2022-12-29 10:12:30'),
(14, 71, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:12:30', '2022-12-29 10:12:30'),
(15, 74, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:12:30', '2022-12-29 10:12:30'),
(16, 78, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:12:30', '2022-12-29 10:12:30'),
(17, 80, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:12:30', '2022-12-29 10:12:30'),
(18, 60, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:22:44', '2022-12-29 10:22:44'),
(19, 62, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:22:44', '2022-12-29 10:22:44'),
(20, 63, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:22:44', '2022-12-29 10:22:44'),
(21, 64, 0, NULL, 804, 1513, 34, 119, '2022-12-29 10:22:44', '2022-12-29 10:22:44'),
(22, 66, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:22:44', '2022-12-29 10:22:44'),
(23, 71, 2, '30 min', 804, 1513, 34, 119, '2022-12-29 10:22:44', '2022-12-29 10:22:44'),
(24, 74, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:22:44', '2022-12-29 10:22:44'),
(25, 78, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:22:44', '2022-12-29 10:22:44'),
(26, 80, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:22:44', '2022-12-29 10:22:44'),
(27, 60, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:21', '2022-12-29 10:23:21'),
(28, 62, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:21', '2022-12-29 10:23:21'),
(29, 63, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:21', '2022-12-29 10:23:21'),
(30, 64, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:21', '2022-12-29 10:23:21'),
(31, 66, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:21', '2022-12-29 10:23:21'),
(32, 71, 2, '30 min', 804, 1513, 34, 119, '2022-12-29 10:23:21', '2022-12-29 10:23:21'),
(33, 74, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:21', '2022-12-29 10:23:21'),
(34, 78, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:21', '2022-12-29 10:23:21'),
(35, 80, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:21', '2022-12-29 10:23:21'),
(36, 60, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:31', '2022-12-29 10:23:31'),
(37, 62, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:31', '2022-12-29 10:23:31'),
(38, 63, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:31', '2022-12-29 10:23:31'),
(39, 64, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:31', '2022-12-29 10:23:31'),
(40, 66, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:31', '2022-12-29 10:23:31'),
(41, 71, 2, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:31', '2022-12-29 10:23:31'),
(42, 74, 1, '30 min', 804, 1513, 34, 119, '2022-12-29 10:23:31', '2022-12-29 10:23:31'),
(43, 78, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:32', '2022-12-29 10:23:32'),
(44, 80, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:32', '2022-12-29 10:23:32'),
(45, 60, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:42', '2022-12-29 10:23:42'),
(46, 62, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:42', '2022-12-29 10:23:42'),
(47, 63, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:42', '2022-12-29 10:23:42'),
(48, 64, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:42', '2022-12-29 10:23:42'),
(49, 66, 2, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:42', '2022-12-29 10:23:42'),
(50, 71, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:42', '2022-12-29 10:23:42'),
(51, 74, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:42', '2022-12-29 10:23:42'),
(52, 78, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:42', '2022-12-29 10:23:42'),
(53, 80, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:42', '2022-12-29 10:23:42'),
(54, 60, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:53', '2022-12-29 10:23:53'),
(55, 62, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:53', '2022-12-29 10:23:53'),
(56, 63, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:53', '2022-12-29 10:23:53'),
(57, 64, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:53', '2022-12-29 10:23:53'),
(58, 66, 2, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:53', '2022-12-29 10:23:53'),
(59, 71, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:53', '2022-12-29 10:23:53'),
(60, 74, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:53', '2022-12-29 10:23:53'),
(61, 78, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:53', '2022-12-29 10:23:53'),
(62, 80, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:23:53', '2022-12-29 10:23:53'),
(63, 60, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:24:00', '2022-12-29 10:24:00'),
(64, 62, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:24:00', '2022-12-29 10:24:00'),
(65, 63, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:24:00', '2022-12-29 10:24:00'),
(66, 64, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:24:00', '2022-12-29 10:24:00'),
(67, 66, 0, NULL, 804, 1513, 34, 119, '2022-12-29 10:24:00', '2022-12-29 10:24:00'),
(68, 71, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:24:01', '2022-12-29 10:24:01'),
(69, 74, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:24:01', '2022-12-29 10:24:01'),
(70, 78, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:24:01', '2022-12-29 10:24:01'),
(71, 80, 1, NULL, 804, 1513, 34, 119, '2022-12-29 10:24:01', '2022-12-29 10:24:01'),
(72, 60, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:05:29', '2023-02-04 08:05:29'),
(73, 62, 0, NULL, 804, 1513, 34, 119, '2023-02-04 08:05:29', '2023-02-04 08:05:29'),
(74, 63, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:05:30', '2023-02-04 08:05:30'),
(75, 64, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:05:30', '2023-02-04 08:05:30'),
(76, 66, 2, NULL, 804, 1513, 34, 119, '2023-02-04 08:05:30', '2023-02-04 08:05:30'),
(77, 71, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:05:30', '2023-02-04 08:05:30'),
(78, 74, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:05:30', '2023-02-04 08:05:30'),
(79, 78, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:05:30', '2023-02-04 08:05:30'),
(80, 80, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:05:30', '2023-02-04 08:05:30'),
(81, 60, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:06:15', '2023-02-04 08:06:15'),
(82, 62, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:06:15', '2023-02-04 08:06:15'),
(83, 63, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:06:15', '2023-02-04 08:06:15'),
(84, 64, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:06:15', '2023-02-04 08:06:15'),
(85, 66, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:06:15', '2023-02-04 08:06:15'),
(86, 71, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:06:15', '2023-02-04 08:06:15'),
(87, 74, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:06:15', '2023-02-04 08:06:15'),
(88, 78, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:06:15', '2023-02-04 08:06:15'),
(89, 80, 1, NULL, 804, 1513, 34, 119, '2023-02-04 08:06:16', '2023-02-04 08:06:16'),
(90, 60, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:48:08', '2023-02-04 14:48:08'),
(91, 62, 0, NULL, 804, 1513, 34, 119, '2023-02-04 14:48:08', '2023-02-04 14:48:08'),
(92, 63, 0, NULL, 804, 1513, 34, 119, '2023-02-04 14:48:09', '2023-02-04 14:48:09'),
(93, 64, 2, NULL, 804, 1513, 34, 119, '2023-02-04 14:48:09', '2023-02-04 14:48:09'),
(94, 66, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:48:09', '2023-02-04 14:48:09'),
(95, 71, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:48:09', '2023-02-04 14:48:09'),
(96, 74, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:48:09', '2023-02-04 14:48:09'),
(97, 78, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:48:09', '2023-02-04 14:48:09'),
(98, 80, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:48:09', '2023-02-04 14:48:09'),
(99, 60, 0, NULL, 804, 1513, 34, 119, '2023-02-04 14:49:48', '2023-02-04 14:49:48'),
(100, 62, 2, NULL, 804, 1513, 34, 119, '2023-02-04 14:49:48', '2023-02-04 14:49:48'),
(101, 63, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:49:48', '2023-02-04 14:49:48'),
(102, 64, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:49:48', '2023-02-04 14:49:48'),
(103, 66, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:49:48', '2023-02-04 14:49:48'),
(104, 71, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:49:48', '2023-02-04 14:49:48'),
(105, 74, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:49:48', '2023-02-04 14:49:48'),
(106, 78, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:49:48', '2023-02-04 14:49:48'),
(107, 80, 1, NULL, 804, 1513, 34, 119, '2023-02-04 14:49:48', '2023-02-04 14:49:48'),
(108, 60, 0, NULL, 804, 1513, 34, 119, '2023-02-05 08:09:49', '2023-02-05 08:09:49'),
(109, 62, 0, NULL, 804, 1513, 34, 119, '2023-02-05 08:09:50', '2023-02-05 08:09:50'),
(110, 63, 1, NULL, 804, 1513, 34, 119, '2023-02-05 08:09:50', '2023-02-05 08:09:50'),
(111, 64, 1, NULL, 804, 1513, 34, 119, '2023-02-05 08:09:50', '2023-02-05 08:09:50'),
(112, 66, 1, NULL, 804, 1513, 34, 119, '2023-02-05 08:09:50', '2023-02-05 08:09:50'),
(113, 71, 1, NULL, 804, 1513, 34, 119, '2023-02-05 08:09:50', '2023-02-05 08:09:50'),
(114, 74, 1, NULL, 804, 1513, 34, 119, '2023-02-05 08:09:50', '2023-02-05 08:09:50'),
(115, 78, 1, NULL, 804, 1513, 34, 119, '2023-02-05 08:09:50', '2023-02-05 08:09:50'),
(116, 80, 1, NULL, 804, 1513, 34, 119, '2023-02-05 08:09:50', '2023-02-05 08:09:50'),
(117, 60, 1, NULL, 804, 1513, 34, 119, '2023-02-14 10:40:49', '2023-02-14 10:40:49'),
(118, 62, 0, NULL, 804, 1513, 34, 119, '2023-02-14 10:40:49', '2023-02-14 10:40:49'),
(119, 63, 2, NULL, 804, 1513, 34, 119, '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(120, 64, 0, NULL, 804, 1513, 34, 119, '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(121, 66, 1, NULL, 804, 1513, 34, 119, '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(122, 71, 0, NULL, 804, 1513, 34, 119, '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(123, 74, 2, NULL, 804, 1513, 34, 119, '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(124, 78, 0, NULL, 804, 1513, 34, 119, '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(125, 80, 1, NULL, 804, 1513, 34, 119, '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(126, 60, 1, NULL, 804, 1513, 34, 119, '2023-02-22 05:30:14', '2023-02-22 05:30:14'),
(127, 62, 1, NULL, 804, 1513, 34, 119, '2023-02-22 05:30:14', '2023-02-22 05:30:14'),
(128, 63, 1, NULL, 804, 1513, 34, 119, '2023-02-22 05:30:14', '2023-02-22 05:30:14'),
(129, 64, 2, NULL, 804, 1513, 34, 119, '2023-02-22 05:30:14', '2023-02-22 05:30:14'),
(130, 66, 2, NULL, 804, 1513, 34, 119, '2023-02-22 05:30:14', '2023-02-22 05:30:14'),
(131, 71, 2, NULL, 804, 1513, 34, 119, '2023-02-22 05:30:14', '2023-02-22 05:30:14'),
(132, 74, 1, NULL, 804, 1513, 34, 119, '2023-02-22 05:30:14', '2023-02-22 05:30:14'),
(133, 78, 0, NULL, 804, 1513, 34, 119, '2023-02-22 05:30:14', '2023-02-22 05:30:14'),
(134, 80, 1, NULL, 804, 1513, 34, 119, '2023-02-22 05:30:14', '2023-02-22 05:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `package_price` varchar(255) DEFAULT NULL,
  `package_quantity` varchar(255) DEFAULT NULL,
  `gateway_number` varchar(255) DEFAULT NULL,
  `gateway_type` varchar(255) DEFAULT NULL,
  `transaction_number` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_classes`
--

CREATE TABLE `common_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `section` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_classes`
--

INSERT INTO `common_classes` (`id`, `title`, `section`, `class`, `created_at`, `updated_at`) VALUES
(1, 'Play', NULL, 0, NULL, NULL),
(2, 'Nursery', NULL, 0, NULL, NULL),
(3, 'Class One', NULL, 1, NULL, NULL),
(4, 'Class Two', NULL, 2, NULL, NULL),
(5, 'Class Three', NULL, 3, NULL, NULL),
(6, 'Class Four', NULL, 4, NULL, NULL),
(7, 'Class Five', NULL, 5, NULL, NULL),
(8, 'Class Six', NULL, 6, NULL, NULL),
(9, 'Class Seven', NULL, 7, NULL, NULL),
(10, 'Class Eight', NULL, 8, NULL, NULL),
(11, 'Class Nine', NULL, 9, NULL, NULL),
(12, 'Class Ten', NULL, 10, NULL, NULL),
(13, 'Class Eleven', NULL, 11, NULL, NULL),
(14, 'Class Tweleve', NULL, 12, NULL, NULL),
(15, 'A', 1, NULL, NULL, NULL),
(16, 'B', 1, NULL, NULL, NULL),
(17, 'C', 1, NULL, NULL, NULL),
(18, 'D', 1, NULL, NULL, NULL),
(19, 'E', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `common_subjects`
--

CREATE TABLE `common_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL COMMENT '0=common, 1=science, 2=commerce, 3=arts',
  `class` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_subjects`
--

INSERT INTO `common_subjects` (`id`, `code`, `name`, `group`, `class`, `status`, `created_at`, `updated_at`) VALUES
(1, '101', 'Bangla', '0', 3, '1', NULL, NULL),
(2, '107', 'English', '0', 3, '1', NULL, NULL),
(3, '109', 'Math', '0', 3, '1', NULL, NULL),
(4, '101', 'Bangla', '0', 4, '1', NULL, NULL),
(5, '107', 'English', '0', 4, '1', NULL, NULL),
(6, '109', 'Math', '0', 4, '1', NULL, NULL),
(7, '101', 'Bangla', '0', 5, '1', NULL, NULL),
(8, '107', 'English', '0', 5, '1', NULL, NULL),
(9, '109', 'Math', '0', 5, '1', NULL, NULL),
(10, '127', 'Science', '0', 5, '1', NULL, NULL),
(11, '150', 'Bangladesh and Global', '0', 5, '1', NULL, NULL),
(12, '111', 'Islam/ Other Religions', '0', 5, '1', NULL, NULL),
(13, '101', 'Bangla', '0', 6, '1', NULL, NULL),
(14, '107', 'English', '0', 6, '1', NULL, NULL),
(15, '109', 'Math', '0', 6, '1', NULL, NULL),
(16, '127', 'Science', '0', 6, '1', NULL, NULL),
(17, '150', 'Bangladesh and Global', '0', 6, '1', NULL, NULL),
(18, '111', 'Islam/ Other Religions', '0', 6, '1', NULL, NULL),
(19, '101', 'Bangla', '0', 7, '1', NULL, NULL),
(20, '107', 'English', '0', 7, '1', NULL, NULL),
(21, '109', 'Math', '0', 7, '1', NULL, NULL),
(22, '127', 'Science', '0', 7, '1', NULL, NULL),
(23, '150', 'Bangladesh and Global', '0', 7, '1', NULL, NULL),
(24, '111', 'Islam/ Other Religions', '0', 7, '1', NULL, NULL),
(25, '101', 'Bangla', '0', 8, '1', NULL, NULL),
(26, '107', 'English', '0', 8, '1', NULL, NULL),
(27, '109', 'Math', '0', 8, '1', NULL, NULL),
(28, '111', 'Islam/ Other Religions', '0', 8, '1', NULL, NULL),
(29, '127', 'Science Inquiry Lessons', '0', 8, '1', NULL, NULL),
(30, '127', 'Science practice book', '0', 8, '1', NULL, NULL),
(31, '151', 'History and Social Science Inquiry Lessons', '0', 8, '1', NULL, NULL),
(32, '151', 'History and Social Science Practice Books', '0', 8, '1', NULL, NULL),
(33, '154', 'Infirmation Technology', '0', 8, '1', NULL, NULL),
(34, 'Null', 'Health protection', '0', 8, '1', NULL, NULL),
(35, '155', 'Work and Education', '0', 8, '1', NULL, NULL),
(36, '148', 'Art and Culture', '0', 8, '1', NULL, NULL),
(37, '101', 'Bangla', '0', 9, '1', NULL, NULL),
(38, '107', 'English', '0', 9, '1', NULL, NULL),
(39, '109', 'Math', '0', 9, '1', NULL, NULL),
(40, '111', 'Islam/ Other Religions', '0', 9, '1', NULL, NULL),
(41, '127', 'Science Inquiry Lessons', '0', 9, '1', NULL, NULL),
(42, '127', 'Science practice book', '0', 9, '1', NULL, NULL),
(43, '151', 'History and Social Science Inquiry Lessons', '0', 9, '1', NULL, NULL),
(44, '151', 'History and Social Science Practice Books', '0', 9, '1', NULL, NULL),
(45, '154', 'Infirmation Technology', '0', 9, '1', NULL, NULL),
(46, 'Null', 'Health protection', '0', 9, '1', NULL, NULL),
(47, '155', 'Work and Education', '0', 9, '1', NULL, NULL),
(48, '148', 'Art and Culture', '0', 9, '1', NULL, NULL),
(49, '101', 'Bangla First Paper', '0', 10, '1', NULL, NULL),
(50, '102', 'Bangla Second paper', '0', 10, '1', NULL, NULL),
(51, '107', 'English First Paper', '0', 10, '1', NULL, NULL),
(52, '108', 'English Second Paper', '0', 10, '1', NULL, NULL),
(53, '109', 'Math', '0', 10, '1', NULL, NULL),
(54, '111', 'Islam/ Other Religions', '0', 10, '1', NULL, NULL),
(55, '134', 'Agriculture Studies', '0', 10, '1', NULL, NULL),
(56, '151', 'Home science', '0', 10, '1', NULL, NULL),
(57, '154', 'Infirmation and Communication Technology', '0', 10, '1', NULL, NULL),
(58, 'Null', 'Health protection', '0', 10, '1', NULL, NULL),
(59, '155', 'Work and Education', '0', 10, '1', NULL, NULL),
(60, '148', 'Art and Culture', '0', 10, '1', NULL, NULL),
(61, 'Null', 'Bangla literature', '0', 10, '1', NULL, NULL),
(62, '101', 'Bangla First Paper', '0', 11, '1', NULL, NULL),
(63, '102', 'Bangla Second paper', '0', 11, '1', NULL, NULL),
(64, '107', 'English First Paper', '0', 11, '1', NULL, NULL),
(65, '108', 'English Second Paper', '0', 11, '1', NULL, NULL),
(66, '109', 'Math', '0', 11, '1', NULL, NULL),
(67, '111', 'Islam/ Other Religions', '0', 11, '1', NULL, NULL),
(68, '134', 'Agriculture Studies', '0', 11, '1', NULL, NULL),
(69, '151', 'Home science', '0', 11, '1', NULL, NULL),
(70, '154', 'Infirmation and Communication Technology', '0', 11, '1', NULL, NULL),
(71, 'Null', 'Health and Sports', '0', 11, '1', NULL, NULL),
(72, 'Null', 'Career Education', '0', 11, '1', NULL, NULL),
(73, '148', 'Art and Culture', '0', 11, '1', NULL, NULL),
(74, 'Null', 'Bangla literature', '0', 11, '1', NULL, NULL),
(75, '136', 'Physics', '1', 11, '1', NULL, NULL),
(76, '137', 'Chemistry', '1', 11, '1', NULL, NULL),
(77, '138', 'Biology', '1', 11, '1', NULL, NULL),
(78, '126', 'Higher Math', '1', 11, '1', NULL, NULL),
(79, '150', 'Bangladesh and World', '1', 11, '1', NULL, NULL),
(80, '152', 'Finance & Banking', '2', 11, '1', NULL, NULL),
(81, '146', 'Accounting', '2', 11, '1', NULL, NULL),
(82, '143', 'Business Ent.', '2', 11, '1', NULL, NULL),
(83, '127', 'General Science', '2', 11, '1', NULL, NULL),
(84, '149', 'Music', '2', 11, '1', NULL, NULL),
(85, '127', 'General Science', '3', 11, '1', NULL, NULL),
(86, '149', 'Music', '3', 11, '1', NULL, NULL),
(87, '110', 'Geography', '3', 11, '1', NULL, NULL),
(88, '140', 'Civic and Citizenship', '3', 11, '1', NULL, NULL),
(89, '141', 'Economics', '3', 11, '1', NULL, NULL),
(90, '153', 'History of Bangladesh', '3', 11, '1', NULL, NULL),
(91, '101', 'Bangla First Paper', '0', 12, '1', NULL, NULL),
(92, '102', 'Bangla Second paper', '0', 12, '1', NULL, NULL),
(93, '107', 'English First Paper', '0', 12, '1', NULL, NULL),
(94, '108', 'English Second Paper', '0', 12, '1', NULL, NULL),
(95, '109', 'Math', '0', 12, '1', NULL, NULL),
(96, '111', 'Islam/ Other Religions', '0', 12, '1', NULL, NULL),
(97, '134', 'Agriculture Studies', '0', 12, '1', NULL, NULL),
(98, '151', 'Home science', '0', 12, '1', NULL, NULL),
(99, '154', 'Infirmation and Communication Technology', '0', 12, '1', NULL, NULL),
(100, 'Null', 'Health and Sports', '0', 12, '1', NULL, NULL),
(101, 'Null', 'Career Education', '0', 12, '1', NULL, NULL),
(102, '148', 'Art and Culture', '0', 12, '1', NULL, NULL),
(103, 'Null', 'Bangla literature', '0', 12, '1', NULL, NULL),
(104, '136', 'Physics', '1', 12, '1', NULL, NULL),
(105, '137', 'Chemistry', '1', 12, '1', NULL, NULL),
(106, '138', 'Biology', '1', 12, '1', NULL, NULL),
(107, '126', 'Higher Math', '1', 12, '1', NULL, NULL),
(108, '150', 'Bangladesh and World', '1', 12, '1', NULL, NULL),
(109, '152', 'Finance & Banking', '2', 12, '1', NULL, NULL),
(110, '146', 'Accounting', '2', 12, '1', NULL, NULL),
(111, '143', 'Business Ent.', '2', 12, '1', NULL, NULL),
(112, '127', 'General Science', '2', 12, '1', NULL, NULL),
(113, '149', 'Music', '2', 12, '1', NULL, NULL),
(114, '127', 'General Science', '3', 12, '1', NULL, NULL),
(115, '149', 'Music', '3', 12, '1', NULL, NULL),
(116, '110', 'Geography', '3', 12, '1', NULL, NULL),
(117, '140', 'Civic and Citizenship', '3', 12, '1', NULL, NULL),
(118, '141', 'Economics', '3', 12, '1', NULL, NULL),
(119, '153', 'History of Bangladesh', '3', 12, '1', NULL, NULL),
(120, '101', 'Bangla First Paper', '0', 13, '1', NULL, NULL),
(121, '102', 'Bangla Second paper', '0', 13, '1', NULL, NULL),
(122, '107', 'English First Paper', '0', 13, '1', NULL, NULL),
(123, '108', 'English Second Paper', '0', 13, '1', NULL, NULL),
(124, '275', 'Infirmation and Communication Technology', '0', 13, '1', NULL, NULL),
(125, '174', 'Physics First Paper', '1', 13, '1', NULL, NULL),
(126, '175', 'Physics Second Paper', '1', 13, '1', NULL, NULL),
(127, '176', 'Chemistry First Paper', '1', 13, '1', NULL, NULL),
(128, '177', 'Chemistry Second Paper', '1', 13, '1', NULL, NULL),
(129, '178', 'Biology First Paper', '1', 13, '1', NULL, NULL),
(130, '179', 'Biology Second Paper', '1', 13, '1', NULL, NULL),
(131, '265', 'Higher Math second Paper', '1', 13, '1', NULL, NULL),
(132, '266', 'Higher Math First Paper', '1', 13, '1', NULL, NULL),
(133, '292', 'Finance & Banking First paper', '2', 13, '1', NULL, NULL),
(134, '293', 'Finance & Banking Second Paper', '2', 13, '1', NULL, NULL),
(135, '253', 'Accounting First Papre', '2', 13, '1', NULL, NULL),
(136, '254', 'Accounting Second Papre', '2', 13, '1', NULL, NULL),
(137, '277', 'Business Organization and management First Papre', '2', 13, '1', NULL, NULL),
(138, '278', 'Business Organization and management Second Papre', '2', 13, '1', NULL, NULL),
(139, '286', 'Production Management and marketing First Papre', '2', 13, '1', NULL, NULL),
(140, '286', 'Production Management and marketing Second Papre', '2', 13, '1', NULL, NULL),
(141, '109', 'Economics First Papre', '2', 13, '1', NULL, NULL),
(142, '109', 'Economics Second Papre', '2', 13, '1', NULL, NULL),
(143, '269', 'Civic and Good Govern', '3', 13, '1', NULL, NULL),
(144, '109', 'Economics', '3', 13, '1', NULL, NULL),
(145, '304', 'History', '3', 13, '1', NULL, NULL),
(146, '121', 'Logic', '3', 13, '1', NULL, NULL),
(147, '101', 'Bangla First Paper', '0', 14, '1', NULL, NULL),
(148, '102', 'Bangla Second paper', '0', 14, '1', NULL, NULL),
(149, '107', 'English First Paper', '0', 14, '1', NULL, NULL),
(150, '108', 'English Second Paper', '0', 14, '1', NULL, NULL),
(151, '275', 'Infirmation and Communication Technology', '0', 14, '1', NULL, NULL),
(152, '174', 'Physics First Paper', '1', 14, '1', NULL, NULL),
(153, '175', 'Physics Second Paper', '1', 14, '1', NULL, NULL),
(154, '176', 'Chemistry First Paper', '1', 14, '1', NULL, NULL),
(155, '177', 'Chemistry Second Paper', '1', 14, '1', NULL, NULL),
(156, '178', 'Biology First Paper', '1', 14, '1', NULL, NULL),
(157, '179', 'Biology Second Paper', '1', 14, '1', NULL, NULL),
(158, '265', 'Higher Math second Paper', '1', 14, '1', NULL, NULL),
(159, '266', 'Higher Math First Paper', '1', 14, '1', NULL, NULL),
(160, '292', 'Finance & Banking First paper', '2', 14, '1', NULL, NULL),
(161, '293', 'Finance & Banking Second Paper', '2', 14, '1', NULL, NULL),
(162, '253', 'Accounting First Papre', '2', 14, '1', NULL, NULL),
(163, '254', 'Accounting Second Papre', '2', 14, '1', NULL, NULL),
(164, '277', 'Business Organization and management First Papre', '2', 14, '1', NULL, NULL),
(165, '278', 'Business Organization and management Second Papre', '2', 14, '1', NULL, NULL),
(166, '286', 'Production Management and marketing First Papre', '2', 14, '1', NULL, NULL),
(167, '286', 'Production Management and marketing Second Papre', '2', 14, '1', NULL, NULL),
(168, '109', 'Economics First Papre', '2', 14, '1', NULL, NULL),
(169, '109', 'Economics Second Papre', '2', 14, '1', NULL, NULL),
(170, '269', 'Civic and Good Govern', '3', 14, '1', NULL, NULL),
(171, '109', 'Economics', '3', 14, '1', NULL, NULL),
(172, '304', 'History', '3', 14, '1', NULL, NULL),
(173, '121', 'Logic', '3', 14, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_keyword` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `active`, `school_id`, `created_at`, `updated_at`) VALUES
(1064, 'Bangla 1st Paper', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1065, 'Bangla 2nd Paper', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1066, 'English 1st Paper', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1067, 'English 2nd Paper', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1068, 'Math', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1069, 'Religion', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1071, 'Physics', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1072, 'Chemistry', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1073, 'Biology', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1074, 'Higher Math', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1075, 'Accounting', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1076, 'Finance', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1077, 'Agricultural Studies', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1078, 'Business Entrepreneurship', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1079, 'General Science', '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1080, 'Bangla 1st Paper', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1081, 'Bangla 2nd Paper', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1082, 'English 1st Paper', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1083, 'English 2nd Paper', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1084, 'Math', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1085, 'Religion', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1086, 'ICT', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1087, 'Physics', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1088, 'Chemistry', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1089, 'Biology', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1090, 'Higher Math', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1091, 'Accounting', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1092, 'Finance', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1093, 'Agricultural Studies', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1094, 'Business Entrepreneurship', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1095, 'General Science', '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1096, 'Bangla 1st Paper', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1097, 'Bangla 2nd Paper', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1098, 'English 1st Paper', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1099, 'English 2nd Paper', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1100, 'Math', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1101, 'Religion', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1102, 'ICT', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1103, 'Physics', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1104, 'Chemistry', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1105, 'Biology', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1106, 'Higher Math', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1107, 'Accounting', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1108, 'Finance', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1109, 'Agricultural Studies', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1110, 'Business Entrepreneurship', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1111, 'General Science', '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1112, 'Bangla 1st Paper', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1113, 'Bangla 2nd Paper', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1114, 'English 1st Paper', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1115, 'English 2nd Paper', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1116, 'Math', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1117, 'Religion', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1118, 'ICT', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1119, 'Physics', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1120, 'Chemistry', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1121, 'Biology', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1122, 'Higher Math', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1123, 'Accounting', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1124, 'Finance', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1125, 'Agricultural Studies', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1126, 'Business Entrepreneurship', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1127, 'General Science', '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1128, 'Bangla 1st Paper', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1129, 'Bangla 2nd Paper', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1130, 'English 1st Paper', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1131, 'English 2nd Paper', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1132, 'Math', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1133, 'Religion', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1134, 'ICT', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1135, 'Physics', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1136, 'Chemistry', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1137, 'Biology', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1138, 'Higher Math', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1139, 'Accounting', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1140, 'Finance', '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1141, 'Agricultural Studies', '1', 108, '2022-09-22 18:03:28', '2022-09-22 18:03:28'),
(1142, 'Business Entrepreneurship', '1', 108, '2022-09-22 18:03:28', '2022-09-22 18:03:28'),
(1143, 'General Science', '1', 108, '2022-09-22 18:03:28', '2022-09-22 18:03:28'),
(1144, 'Bangla 1st Paper', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1145, 'Bangla 2nd Paper', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1146, 'English 1st Paper', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1147, 'English 2nd Paper', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1148, 'Math', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1149, 'Religion', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1150, 'ICT', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1151, 'Physics', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1152, 'Chemistry', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1153, 'Biology', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1154, 'Higher Math', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1155, 'Accounting', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1156, 'Finance', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1157, 'Agricultural Studies', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1158, 'Business Entrepreneurship', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1159, 'General Science', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1160, 'Bangla 1st Paper', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1161, 'Bangla 2nd Paper', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1162, 'English 1st Paper', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1163, 'English 2nd Paper', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1164, 'Math', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1165, 'Religion', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1166, 'ICT', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1167, 'Physics', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1168, 'Chemistry', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1169, 'Biology', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1170, 'Higher Math', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1171, 'Accounting', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1172, 'Finance', '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1173, 'Agricultural Studies', '1', 109, '2022-09-29 11:48:35', '2022-09-29 11:48:35'),
(1174, 'Business Entrepreneurship', '1', 109, '2022-09-29 11:48:35', '2022-09-29 11:48:35'),
(1175, 'General Science', '1', 109, '2022-09-29 11:48:35', '2022-09-29 11:48:35'),
(1176, 'Bangla 1st Paper', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1177, 'Bangla 2nd Paper', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1178, 'English 1st Paper', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1179, 'English 2nd Paper', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1180, 'Math', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1181, 'Religion', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1182, 'ICT', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1183, 'Physics', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1184, 'Chemistry', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1185, 'Biology', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1186, 'Higher Math', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1187, 'Accounting', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1188, 'Finance', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1189, 'Agricultural Studies', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1190, 'Business Entrepreneurship', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1191, 'General Science', '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1192, 'Geology', '1', 118, '2022-11-17 10:35:39', '2022-11-17 10:35:39'),
(1194, 'Bangla 1st Paper', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1196, 'Bangla 2nd Paper', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1198, 'English 1st Paper', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1200, 'English 2nd Paper', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1202, 'Math', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1204, 'Religion', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1206, 'ICT', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1208, 'Physics', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1210, 'Chemistry', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1212, 'Biology', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1214, 'Higher Math', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1216, 'Accounting', '1', 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `phone_number`, `employee_id`, `position`, `address`, `salary`, `school_id`, `created_at`, `updated_at`) VALUES
(10, 'zahir', '01687766428', '1122', 'Security Guard', 'adsads', '10000', 119, '2022-11-21 06:04:54', '2022-11-21 06:04:54'),
(12, 'zahir 2', '01687766422', '1123', 'Doptori', 'adsads', '10000', 119, '2022-11-21 06:06:05', '2022-11-21 06:06:05'),
(15, 'zahir 3', '01687766423', '1124', 'pion', 'chottogram', '10000', 119, '2022-11-21 06:07:37', '2022-11-21 06:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE `employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month_name` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salaries`
--

INSERT INTO `employee_salaries` (`id`, `month_name`, `amount`, `employee_id`, `school_id`, `created_at`, `updated_at`) VALUES
(52, 'November', 10000, 10, 119, '2022-11-21 06:04:54', '2022-12-08 07:12:58'),
(53, 'December', 100, 10, 119, '2022-11-21 06:04:54', '2023-02-04 10:16:51'),
(54, 'November', 10000, 12, 119, '2022-11-21 06:06:05', '2022-12-08 10:35:13'),
(55, 'December', 0, 12, 119, '2022-11-21 06:06:05', '2022-11-21 06:06:05'),
(56, 'November', 0, 15, 119, '2022-11-21 06:07:37', '2022-11-21 06:07:37'),
(57, 'December', 0, 15, 119, '2022-11-21 06:07:37', '2022-11-21 06:07:37');

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
-- Table structure for table `feature_details_pages`
--

CREATE TABLE `feature_details_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_text_1` varchar(255) DEFAULT NULL,
  `header_text_2` varchar(255) DEFAULT NULL,
  `header_p_text_1` varchar(255) DEFAULT NULL,
  `header_p_text_2` varchar(255) DEFAULT NULL,
  `header_label_text_1` varchar(255) DEFAULT NULL,
  `header_label_text_2` varchar(255) DEFAULT NULL,
  `header_label_text_3` varchar(255) DEFAULT NULL,
  `header_image` text DEFAULT NULL,
  `second_section_face_title_1` varchar(255) DEFAULT NULL,
  `second_section_face_paragraph_1` varchar(255) DEFAULT NULL,
  `second_section_face_image_1` text DEFAULT NULL,
  `second_section_face_title_2` varchar(255) DEFAULT NULL,
  `second_section_face_paragraph_2` varchar(255) DEFAULT NULL,
  `second_section_face_image_2` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feature_menus`
--

CREATE TABLE `feature_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_menus`
--

INSERT INTO `feature_menus` (`id`, `menu_name`, `menu_slug`, `status`, `created_at`, `updated_at`) VALUES
(6, 'User Management', 'user-management', 0, '2022-03-07 11:28:12', '2022-03-07 11:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `active`, `section_id`, `class_id`, `school_id`, `created_at`, `updated_at`) VALUES
(32, 'Science', '1', 1491, 784, 118, '2022-11-17 10:33:40', '2022-11-17 10:33:40'),
(34, 'Science', '1', 1513, 804, 119, '2022-11-19 07:09:47', '2022-11-19 07:09:47'),
(39, 'Science', '1', 1514, 805, 119, '2022-11-19 07:32:08', '2022-11-19 07:32:08'),
(40, 'Business-studies', '1', 1516, 805, 119, '2022-11-19 07:32:23', '2022-11-19 07:32:23'),
(41, 'Business-studies', '1', 1517, 804, 119, '2022-11-19 07:33:12', '2022-11-19 07:33:12'),
(43, 'Humanities', '1', 0, 808, 119, '2022-11-21 11:23:01', '2022-12-08 05:19:30'),
(44, 'Science', '1', 0, 807, 119, '2022-12-08 05:20:08', '2022-12-08 05:20:08'),
(45, 'Science', '1', 0, 808, 119, '2022-12-08 05:20:25', '2022-12-08 05:20:43'),
(46, 'Business-studies', '1', 0, 808, 119, '2022-12-08 05:20:25', '2022-12-08 05:20:58'),
(47, 'Humanities', '1', 0, 807, 119, '2022-12-08 05:21:12', '2022-12-08 05:21:12'),
(48, 'Business-studies', '1', 0, 807, 119, '2022-12-08 05:21:24', '2022-12-08 05:21:24'),
(49, 'Humanities', '1', 0, 804, 119, '2022-12-08 05:21:44', '2022-12-08 05:22:15'),
(50, 'Humanities', '1', 0, 805, 119, '2022-12-08 05:22:41', '2022-12-08 05:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `institute_classes`
--

CREATE TABLE `institute_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `class_fees` int(20) NOT NULL DEFAULT 0,
  `active` varchar(255) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institute_classes`
--

INSERT INTO `institute_classes` (`id`, `class_name`, `class_fees`, `active`, `school_id`, `created_at`, `updated_at`) VALUES
(0, 'zero', 0, '1', 0, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(706, 'class 1', 0, '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(707, 'class 2', 0, '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(708, 'class 3', 0, '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(709, 'class 4', 0, '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(710, 'class 5', 0, '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(711, 'class 6', 0, '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(712, 'class 7', 0, '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(713, 'class 8', 0, '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(714, 'class 9', 0, '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(715, 'class 10', 0, '1', 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(716, 'class 1', 0, '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(717, 'class 2', 0, '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(718, 'class 3', 0, '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(719, 'class 4', 0, '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(720, 'class 5', 0, '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(721, 'class 6', 0, '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(722, 'class 7', 0, '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(723, 'class 8', 0, '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(724, 'class 9', 0, '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(725, 'class 10', 0, '1', 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(726, 'class 1', 0, '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(727, 'class 2', 0, '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(728, 'class 3', 0, '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(729, 'class 4', 0, '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(730, 'class 5', 0, '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(731, 'class 6', 0, '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(732, 'class 7', 0, '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(733, 'class 8', 0, '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(734, 'class 9', 0, '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(735, 'class 10', 0, '1', 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(736, 'class 1', 0, '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(737, 'class 2', 0, '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(738, 'class 3', 0, '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(739, 'class 4', 0, '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(740, 'class 5', 0, '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(741, 'class 6', 0, '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(742, 'class 7', 0, '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(743, 'class 8', 0, '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(744, 'class 9', 0, '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(745, 'class 10', 0, '1', 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(746, 'class 1', 0, '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(747, 'class 2', 0, '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(748, 'class 3', 0, '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(749, 'class 4', 0, '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(750, 'class 5', 0, '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(751, 'class 6', 0, '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(752, 'class 7', 0, '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(753, 'class 8', 0, '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(754, 'class 9', 0, '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(755, 'class 10', 0, '1', 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(756, 'class 1', 0, '1', 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(757, 'class 2', 0, '1', 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(758, 'class 3', 0, '1', 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(759, 'class 4', 0, '1', 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(760, 'class 5', 0, '1', 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(761, 'class 6', 0, '1', 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(762, 'class 7', 0, '1', 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(763, 'class 8', 0, '1', 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(764, 'class 9', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(765, 'class 10', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(766, 'class 1', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(767, 'class 2', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(768, 'class 3', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(769, 'class 4', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(770, 'class 5', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(771, 'class 6', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(772, 'class 7', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(773, 'class 8', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(774, 'class 9', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(775, 'class 10', 0, '1', 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(776, 'class 1', 0, '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(777, 'class 2', 0, '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(778, 'class 3', 0, '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(779, 'class 4', 0, '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(780, 'class 5', 0, '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(781, 'class 6', 0, '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(782, 'class 7', 0, '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(783, 'class 8', 0, '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(784, 'class 9', 0, '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(785, 'class 10', 0, '1', 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(786, 'Class 11', 0, '1', 118, '2022-11-17 10:22:00', '2022-11-17 10:22:15'),
(787, 'Class 1', 300, '1', 119, '2022-11-19 06:07:03', '2022-11-21 10:55:10'),
(790, 'Class 2', 300, '1', 119, '2022-11-19 06:07:03', '2022-11-21 10:54:50'),
(792, 'Class 3', 300, '1', 119, '2022-11-19 06:07:03', '2022-11-21 10:54:38'),
(794, 'Class 4', 300, '1', 119, '2022-11-19 06:07:03', '2022-11-21 10:54:28'),
(796, 'Class 5', 300, '1', 119, '2022-11-19 06:07:03', '2022-11-21 10:54:19'),
(798, 'Class 6', 400, '1', 119, '2022-11-19 06:07:03', '2022-11-20 13:44:09'),
(800, 'Class 7', 400, '1', 119, '2022-11-19 06:07:04', '2022-11-20 13:43:59'),
(802, 'Class 8', 400, '1', 119, '2022-11-19 06:07:04', '2022-11-20 13:43:49'),
(804, 'Class 9', 500, '1', 119, '2022-11-19 06:07:04', '2022-11-20 07:16:01'),
(805, 'Class 10', 500, '1', 119, '2022-11-19 06:07:04', '2022-11-20 07:16:16'),
(807, 'Class 11', 800, '1', 119, '2022-11-19 07:20:04', '2022-11-20 13:43:36'),
(808, 'Class 12', 800, '1', 119, '2022-11-20 05:31:38', '2022-11-20 13:43:26'),
(809, 'Class 11', 700, '1', 102, '2022-11-21 09:26:22', '2022-11-21 10:19:34'),
(810, 'Class 12', 700, '1', 102, '2022-11-21 10:21:48', '2022-11-21 10:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `message` int(11) NOT NULL DEFAULT 0,
  `send_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `school_id`, `message`, `send_number`, `created_at`, `updated_at`) VALUES
(48, 119, 1, '01568347144', '2022-11-21 05:22:10', '2022-11-21 05:22:10'),
(49, 119, 1, '01677777788', '2022-11-29 07:03:08', '2022-11-29 07:03:08'),
(50, 119, 1, '01568347144', '2022-12-08 05:58:53', '2022-12-08 05:58:53'),
(51, 119, 1, '01568347144', '2022-12-08 07:40:21', '2022-12-08 07:40:21'),
(52, 119, 1, '01677777777', '2022-12-08 07:40:21', '2022-12-08 07:40:21'),
(53, 119, 1, '01677777788', '2022-12-08 07:40:21', '2022-12-08 07:40:21'),
(54, 119, 1, '01630456677', '2022-12-08 07:40:21', '2022-12-08 07:40:21'),
(55, 119, 1, '014100110011', '2022-12-08 07:40:21', '2022-12-08 07:40:21'),
(56, 119, 1, '01401401401', '2022-12-08 07:40:21', '2022-12-08 07:40:21'),
(57, 119, 1, '0100000001', '2022-12-08 07:40:22', '2022-12-08 07:40:22'),
(58, 119, 1, '45645645645', '2022-12-08 07:40:22', '2022-12-08 07:40:22'),
(59, 119, 1, 'sdfsfd', '2022-12-08 07:40:22', '2022-12-08 07:40:22'),
(60, 119, 1, '01568347144', '2022-12-08 07:40:22', '2022-12-08 07:40:22'),
(61, 119, 1, '01568347144', '2022-12-08 07:40:22', '2022-12-08 07:40:22'),
(62, 119, 1, '01000000092', '2022-12-29 10:12:30', '2022-12-29 10:12:30'),
(63, 119, 1, '01000000924', '2022-12-29 10:22:44', '2022-12-29 10:22:44'),
(64, 119, 1, '01000000501', '2022-12-29 10:24:01', '2022-12-29 10:24:01'),
(65, 119, 1, '01000000092', '2023-02-04 08:05:30', '2023-02-04 08:05:30'),
(66, 119, 1, '01568347144', '2023-02-04 08:18:39', '2023-02-04 08:18:39'),
(67, 119, 1, '01677777777', '2023-02-04 08:18:39', '2023-02-04 08:18:39'),
(68, 119, 1, '01677777788', '2023-02-04 08:18:39', '2023-02-04 08:18:39'),
(69, 119, 1, '01630456677', '2023-02-04 08:18:39', '2023-02-04 08:18:39'),
(70, 119, 1, '014100110011', '2023-02-04 08:18:39', '2023-02-04 08:18:39'),
(71, 119, 1, '01401401401', '2023-02-04 08:18:40', '2023-02-04 08:18:40'),
(72, 119, 1, '0100000001', '2023-02-04 08:18:40', '2023-02-04 08:18:40'),
(73, 119, 1, '45645645645', '2023-02-04 08:18:40', '2023-02-04 08:18:40'),
(74, 119, 1, 'sdfsfd', '2023-02-04 08:18:40', '2023-02-04 08:18:40'),
(75, 119, 1, '01568347144', '2023-02-04 08:18:40', '2023-02-04 08:18:40'),
(76, 119, 1, '01568347144', '2023-02-04 08:18:40', '2023-02-04 08:18:40'),
(77, 119, 1, '01427895639', '2023-02-04 08:18:41', '2023-02-04 08:18:41'),
(78, 119, 1, '01780425530', '2023-02-04 08:18:41', '2023-02-04 08:18:41'),
(79, 119, 1, '01568347144', '2023-02-04 10:11:28', '2023-02-04 10:11:28'),
(80, 119, 1, '01677777777', '2023-02-04 10:11:28', '2023-02-04 10:11:28'),
(81, 119, 1, '01677777788', '2023-02-04 10:11:29', '2023-02-04 10:11:29'),
(82, 119, 1, '01630456677', '2023-02-04 10:11:29', '2023-02-04 10:11:29'),
(83, 119, 1, '014100110011', '2023-02-04 10:11:29', '2023-02-04 10:11:29'),
(84, 119, 1, '01401401401', '2023-02-04 10:11:30', '2023-02-04 10:11:30'),
(85, 119, 1, '0100000001', '2023-02-04 10:11:30', '2023-02-04 10:11:30'),
(86, 119, 1, '45645645645', '2023-02-04 10:11:30', '2023-02-04 10:11:30'),
(87, 119, 1, 'sdfsfd', '2023-02-04 10:11:31', '2023-02-04 10:11:31'),
(88, 119, 1, '01568347144', '2023-02-04 10:11:31', '2023-02-04 10:11:31'),
(89, 119, 1, '01568347144', '2023-02-04 10:11:32', '2023-02-04 10:11:32'),
(90, 119, 1, '01427895639', '2023-02-04 10:11:32', '2023-02-04 10:11:32'),
(91, 119, 1, '01780425530', '2023-02-04 10:11:32', '2023-02-04 10:11:32'),
(92, 119, 1, '01568405146', '2023-02-04 10:11:33', '2023-02-04 10:11:33'),
(93, 119, 1, '01000000092', '2023-02-04 14:48:09', '2023-02-04 14:48:09'),
(94, 119, 1, '01000000923', '2023-02-04 14:48:09', '2023-02-04 14:48:09'),
(95, 119, 1, '01000000001', '2023-02-04 14:49:48', '2023-02-04 14:49:48'),
(96, 119, 1, '01000000001', '2023-02-05 08:09:50', '2023-02-05 08:09:50'),
(97, 119, 1, '01000000092', '2023-02-05 08:09:50', '2023-02-05 08:09:50'),
(98, 119, 1, '01000000092', '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(99, 119, 1, '01000000924', '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(100, 119, 1, '123456', '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(101, 119, 1, '01568347144', '2023-02-14 10:40:50', '2023-02-14 10:40:50'),
(102, 119, 1, '01401401401', '2023-02-22 05:28:36', '2023-02-22 05:28:36'),
(103, 119, 1, '01568347144', '2023-02-22 05:30:14', '2023-02-22 05:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `message_packages`
--

CREATE TABLE `message_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_packages`
--

INSERT INTO `message_packages` (`id`, `package_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Test 1', 50, '50', '2022-01-04 00:05:46', '2022-01-04 00:06:03'),
(2, 'Test 2', 200, '150', '2022-01-05 00:58:30', '2022-01-05 00:58:30'),
(3, 'Test 3', 250, '180', '2022-01-05 00:58:55', '2022-01-05 00:58:55'),
(4, 'Test 4', 300, '240', '2022-01-05 00:59:13', '2022-01-05 00:59:13');

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
(2, '2021_12_19_064250_create_student_fees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `class_id` int(11) NOT NULL DEFAULT 0,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `posted_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `topic`, `description`, `class_id`, `school_id`, `posted_by`, `created_at`, `updated_at`) VALUES
(5, 'Durga pujar notice', 'Durga puja upolokkhe school 9din off thakbe', 715, 102, 0, '2022-09-24 09:33:53', '2022-09-24 09:33:53'),
(7, 'result will publish in 31 december', 'Result of all class will publish in 31 December. so it is mandatory for all the student to be present at school in 31 December.', 0, 119, 0, '2022-12-29 10:56:28', '2022-12-29 10:56:28'),
(8, 'Result will publish in 31 december', 'aqwsedrftgyhujiiiikolppppzxcvbnm', 0, 119, 0, '2022-12-29 10:58:03', '2022-12-29 10:58:03'),
(10, 'check it', 'check itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck itcheck it', 0, 119, 0, '2022-12-29 10:58:58', '2022-12-29 10:58:58'),
(11, 'add new notice', 'add new notice. add new notice. add new notice.', 804, 119, 0, '2023-02-04 10:20:27', '2023-02-04 10:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('02d622ae-ccde-4f63-9e3f-21276147123f', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 77, '{\"title\":\"qwaetrytyguhijkl;\'\"}', NULL, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
('0dcb79eb-122c-4b2a-a12b-1b4c2b4a4e8f', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 75, '{\"title\":\"qwaetrytyguhijkl;\'\"}', NULL, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
('13e11b82-9cf4-4f02-9d6f-7d0616e0e4a3', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 76, '{\"title\":\"qrtyui\'\"}', NULL, '2022-12-29 09:33:36', '2022-12-29 09:33:36'),
('21d78db8-06b9-463e-8b41-b48179662803', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 72, '{\"title\":\"qrtyui\'\"}', NULL, '2022-12-29 09:33:36', '2022-12-29 09:33:36'),
('28109f58-e553-4ffd-998d-cde6fcb2e6aa', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 72, '{\"title\":\"qwaetrytyguhijkl;\'\"}', NULL, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
('2c532c71-bc81-485e-b351-2bcf62d7fcd2', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 76, '{\"title\":\"qwaetrytyguhijkl;\'\"}', NULL, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
('30e30e9a-7ce1-4e74-8652-f4e8a356e4f3', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 73, '{\"title\":\"qwaetrytyguhijkl;\'\"}', NULL, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
('34abf7c9-46d8-448e-8a01-826c019f3d61', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 70, '{\"title\":\"rtytuyuio\"}', NULL, '2022-12-29 09:33:14', '2022-12-29 09:33:14'),
('4cc20dee-1a11-42fa-a23d-d89539867ac8', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 72, '{\"title\":\"rtytuyuio\"}', NULL, '2022-12-29 09:33:14', '2022-12-29 09:33:14'),
('4ddf795a-0a3b-4281-98e5-45968d50fd76', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 68, '{\"title\":\"qwaetrytyguhijkl;\'\"}', NULL, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
('4f825ee5-8054-4dc0-b01c-865d51395453', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 76, '{\"title\":\"rtytuyuio\"}', NULL, '2022-12-29 09:33:14', '2022-12-29 09:33:14'),
('517ebde8-dbab-4250-8163-5615d977cd0e', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 68, '{\"title\":\"qrtyui\'\"}', NULL, '2022-12-29 09:33:36', '2022-12-29 09:33:36'),
('5a15c848-3de7-49f1-a65f-c3eff8067051', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 65, '{\"title\":\"rtytuyuio\"}', NULL, '2022-12-29 09:33:14', '2022-12-29 09:33:14'),
('66783667-4c53-4390-93b2-8fc96b373215', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 67, '{\"title\":\"qwaetrytyguhijkl;\'\"}', NULL, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
('7209451b-339b-4121-a5e0-b4bd4f635f68', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 67, '{\"title\":\"qrtyui\'\"}', NULL, '2022-12-29 09:33:36', '2022-12-29 09:33:36'),
('733c2354-390e-411a-98a5-54b92077ffa1', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 73, '{\"title\":\"rtytuyuio\"}', NULL, '2022-12-29 09:33:14', '2022-12-29 09:33:14'),
('749df41b-a6c6-481d-8059-180d6281e9e7', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 70, '{\"title\":\"qrtyui\'\"}', NULL, '2022-12-29 09:33:36', '2022-12-29 09:33:36'),
('77662cc2-4fb6-4ed7-8fb9-e3a34a53f122', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 75, '{\"title\":\"rtytuyuio\"}', NULL, '2022-12-29 09:33:14', '2022-12-29 09:33:14'),
('7a16f5de-2ab0-40f4-bc61-6403f8093e30', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 69, '{\"title\":\"qwaetrytyguhijkl;\'\"}', NULL, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
('7d2981a8-1958-4b4e-98b3-6252f16e7ccd', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 67, '{\"title\":\"rtytuyuio\"}', NULL, '2022-12-29 09:33:14', '2022-12-29 09:33:14'),
('815ac998-4496-4b69-8fdb-60c64f3f48a1', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 73, '{\"title\":\"qrtyui\'\"}', NULL, '2022-12-29 09:33:36', '2022-12-29 09:33:36'),
('97d8f755-b0d7-4313-9204-dec2d299fc69', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 69, '{\"title\":\"qrtyui\'\"}', NULL, '2022-12-29 09:33:36', '2022-12-29 09:33:36'),
('a1be7b35-e606-44b6-b05c-846dc7791cb3', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 65, '{\"title\":\"qwaetrytyguhijkl;\'\"}', NULL, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
('a7b294b4-1504-4540-8350-cea4ea732717', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 69, '{\"title\":\"rtytuyuio\"}', NULL, '2022-12-29 09:33:14', '2022-12-29 09:33:14'),
('adc81e20-a92b-408a-9a1e-1b9d8e28a828', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 75, '{\"title\":\"qrtyui\'\"}', NULL, '2022-12-29 09:33:36', '2022-12-29 09:33:36'),
('aefdbbeb-3d35-4faf-a157-af05a859b7a9', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 68, '{\"title\":\"rtytuyuio\"}', NULL, '2022-12-29 09:33:14', '2022-12-29 09:33:14'),
('b7be8db2-de80-431c-a129-607079366d2a', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 65, '{\"title\":\"qrtyui\'\"}', NULL, '2022-12-29 09:33:36', '2022-12-29 09:33:36'),
('d7bbce9b-4fa4-415c-af13-ff8ee8eb1d69', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 77, '{\"title\":\"qrtyui\'\"}', NULL, '2022-12-29 09:33:36', '2022-12-29 09:33:36'),
('eebfa43d-4b5c-4376-84e2-f7c0c5b51296', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 70, '{\"title\":\"qwaetrytyguhijkl;\'\"}', NULL, '2022-12-29 09:22:39', '2022-12-29 09:22:39'),
('f29c2ad9-197d-4cb5-8339-ea6bd3523d76', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\User', 77, '{\"title\":\"rtytuyuio\"}', NULL, '2022-12-29 09:33:14', '2022-12-29 09:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `otp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `school_id`, `phone`, `email`, `otp`, `created_at`, `updated_at`) VALUES
(97, 105, '01568405156', 'Tanvir@codecell.com.bd', '3133', '2022-09-21 06:16:13', '2022-09-21 06:16:13'),
(99, 107, '01533448761', 'shahidul@codecell.com.bd', '2912', '2022-09-22 09:10:08', '2022-09-22 12:11:23'),
(102, 110, '01305792192', 'niloychowdhury1010101010@gmail', '7531', '2022-10-13 17:24:47', '2022-10-13 17:24:47'),
(103, 111, '01724292698', 'gabandabiswasbd.in@gmail.com', '6291', '2022-10-17 09:04:53', '2022-10-17 09:04:53'),
(104, 112, '01404285586', 'emam04740@gmail.com', '6761', '2022-10-26 04:30:14', '2022-10-26 04:30:14'),
(105, 113, '01568928443', 'nishatrocky1@gmail.com', '4326', '2022-10-30 03:55:04', '2022-10-30 03:55:04'),
(108, 116, '01951586718', 'ahmeddelwer612@gmail.com', '5543', '2022-11-16 18:18:58', '2022-11-16 18:18:58'),
(112, 120, '+8801940204058', 'developer.shahidul@yandex.com', '6815', '2022-11-19 10:50:20', '2022-11-19 10:50:20'),
(113, 121, '+8801630456676', 'kmarpara@gmail.com', '2532', '2022-12-10 13:54:53', '2022-12-10 13:54:53'),
(114, 122, '01302788947', 'shariar.ceoo@gmail.com', '8841', '2022-12-19 09:25:19', '2022-12-19 09:25:19'),
(115, 124, '01568347144', 'fine@gmail.com', '6326', '2023-02-04 07:21:25', '2023-02-04 07:21:25'),
(116, 125, '01318872707', 'gigsoftltd@gmail.com', '5934', '2023-02-04 07:50:36', '2023-02-04 07:50:36'),
(117, 126, '01768031053', 'tahamidturzo220@gmail.com', '3933', '2023-02-07 19:16:04', '2023-02-07 19:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_keyword` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `student` int(11) DEFAULT NULL,
  `teachers` int(11) DEFAULT NULL,
  `message` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `name`, `title`, `price`, `button_text`, `description`, `status`, `created_at`, `updated_at`, `seo_title`, `seo_keyword`, `seo_description`, `student`, `teachers`, `message`) VALUES
(0, 'Free', 'Free', '0', 'FREE FOREVER', '<p>FREE FOREVER</p>', 1, '2021-12-04 07:40:28', '2021-12-04 07:42:58', 'ABC', 'ABC', '<p>ABC</p>', 1, 1, 50),
(2, 'GOOOD', 'Best for personal use', '1500', 'FREE FOREVER', '<p>FREE FOREVER</p>', 1, '2021-12-04 07:40:28', '2021-12-04 07:42:58', 'ABC', 'ABC', '<p>ABC</p>', 30, 100, 50),
(3, 'UNLIMITED', 'Best for small teams', '2000', 'Get FOREVER', NULL, 1, '2021-12-04 07:58:17', '2021-12-04 07:58:17', 'ABC', 'ABC', 'ABC', 75, 100, 100),
(4, 'TEST', 'Best for personal use', '1800', 'FREE FOREVER', '<p>FREE FOREVER</p>', 1, '2021-12-04 07:40:28', '2021-12-04 07:42:58', 'ABC', 'ABC', '<p>ABC</p>', 15, 3, 50);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `student_roll_number` varchar(255) DEFAULT NULL,
  `written` int(11) NOT NULL DEFAULT 0,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mcq` int(11) NOT NULL DEFAULT 0,
  `practical` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `school_id`, `student_id`, `student_roll_number`, `written`, `subject_id`, `term_id`, `created_at`, `updated_at`, `mcq`, `practical`) VALUES
(34, 119, 60, '1', 25, 109, 13, '2022-12-29 12:06:40', '2022-12-29 12:06:40', 0, 0),
(35, 119, 62, '02', 25, 109, 13, '2022-12-29 12:06:40', '2022-12-29 12:06:40', 0, 0),
(36, 119, 63, '03', 23, 109, 13, '2022-12-29 12:06:41', '2022-12-29 12:06:41', 0, 0),
(37, 119, 64, '150018', 23, 109, 13, '2022-12-29 12:06:41', '2022-12-29 12:06:41', 0, 0),
(38, 119, 66, '150015', 24, 109, 13, '2022-12-29 12:06:41', '2022-12-29 12:06:41', 0, 0),
(39, 119, 71, '150016', 25, 109, 13, '2022-12-29 12:06:41', '2022-12-29 12:06:41', 0, 0),
(40, 119, 74, '150017', 24, 109, 13, '2022-12-29 12:06:41', '2022-12-29 12:06:41', 0, 0),
(41, 119, 78, '150019', 22, 109, 13, '2022-12-29 12:06:41', '2022-12-29 12:06:41', 0, 0),
(42, 119, 80, '100', 21, 109, 13, '2022-12-29 12:06:41', '2022-12-29 12:06:41', 0, 0),
(43, 119, 60, '1', 25, 109, 10, '2022-12-29 12:07:54', '2022-12-29 12:14:56', 25, 19),
(44, 119, 62, '02', 25, 109, 10, '2022-12-29 12:07:54', '2022-12-29 12:14:56', 34, 20),
(45, 119, 63, '03', 25, 109, 10, '2022-12-29 12:07:54', '2022-12-29 12:14:56', 36, 18),
(46, 119, 64, '150018', 25, 109, 10, '2022-12-29 12:07:54', '2022-12-29 12:14:56', 40, 15),
(47, 119, 66, '150015', 25, 109, 10, '2022-12-29 12:07:54', '2022-12-29 12:14:56', 47, 14),
(48, 119, 71, '150016', 25, 109, 10, '2022-12-29 12:07:54', '2022-12-29 12:14:56', 46, 3),
(49, 119, 74, '150017', 25, 109, 10, '2022-12-29 12:07:54', '2022-12-29 12:14:56', 39, 9),
(50, 119, 78, '150019', 25, 109, 10, '2022-12-29 12:07:54', '2022-12-29 12:14:56', 30, 18),
(51, 119, 80, '100', 25, 109, 10, '2022-12-29 12:07:54', '2022-12-29 12:14:56', 48, 17),
(52, 119, 60, '1', 25, 104, 10, '2022-12-29 12:09:36', '2022-12-29 12:12:58', 12, 0),
(53, 119, 62, '02', 25, 104, 10, '2022-12-29 12:09:36', '2022-12-29 12:12:58', 36, 0),
(54, 119, 63, '03', 22, 104, 10, '2022-12-29 12:09:36', '2022-12-29 12:12:58', 50, 0),
(55, 119, 64, '150018', 23, 104, 10, '2022-12-29 12:09:36', '2022-12-29 12:12:58', 45, 0),
(56, 119, 66, '150015', 25, 104, 10, '2022-12-29 12:09:36', '2022-12-29 12:12:58', 37, 0),
(57, 119, 71, '150016', 21, 104, 10, '2022-12-29 12:09:36', '2022-12-29 12:12:58', 50, 0),
(58, 119, 74, '150017', 19, 104, 10, '2022-12-29 12:09:36', '2022-12-29 12:12:58', 40, 0),
(59, 119, 78, '150019', 20, 104, 10, '2022-12-29 12:09:36', '2022-12-29 12:12:58', 35, 0),
(60, 119, 80, '100', 10, 104, 10, '2022-12-29 12:09:36', '2022-12-29 12:12:58', 39, 0),
(61, 119, 60, '1', 25, 104, 13, '2023-02-23 10:04:22', '2023-02-23 10:05:31', 10, 20),
(62, 119, 62, '02', 25, 104, 13, '2023-02-23 10:04:22', '2023-02-23 10:05:31', 10, 20),
(63, 119, 63, '03', 25, 104, 13, '2023-02-23 10:04:22', '2023-02-23 10:05:31', 10, 20),
(64, 119, 64, '150018', 25, 104, 13, '2023-02-23 10:04:22', '2023-02-23 10:29:36', 15, 16),
(65, 119, 66, '150015', 25, 104, 13, '2023-02-23 10:04:22', '2023-02-23 10:29:36', 12, 18),
(66, 119, 71, '150016', 25, 104, 13, '2023-02-23 10:04:22', '2023-02-23 10:29:36', 45, 18),
(67, 119, 74, '150017', 25, 104, 13, '2023-02-23 10:04:22', '2023-02-23 10:29:36', 32, 20),
(68, 119, 78, '150019', 25, 104, 13, '2023-02-23 10:04:22', '2023-02-23 10:29:36', 15, 22),
(69, 119, 80, '100', 25, 104, 13, '2023-02-23 10:04:22', '2023-02-23 10:29:36', 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_editor` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `color` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `email`, `password`, `is_editor`, `remember_token`, `created_at`, `updated_at`, `address`, `phone_number`, `color`, `status`) VALUES
(0, 'zero', 'zero@test.com', 'zero', 3, NULL, '2022-12-29 09:25:16', '2022-12-29 09:25:19', 'zero', '242342', 0, 1),
(102, 'Boktermunshi MH High School', 'antor.developer@gmail.com', '$2y$10$w/TgMBtbHYA.Bp/Eqh6wfOec1hvoAmPKpDIsLM3bzTIcYr6PLlIt6', 3, NULL, '2022-09-20 10:10:35', '2022-11-20 09:26:05', 'Kamarpara, sector-10, Uttara, Dhaka', '01940204058', 0, 1),
(103, 'Kamarpara School', 'kamarpara@gmail.com', '$2y$10$2t1N16vx81AEC2OLyrlRCOUNVlMzC535boWskBwsD3F.rFg2X0o8q', 3, NULL, '2022-09-20 10:43:39', '2022-09-20 11:17:45', 'kamarpara', '01630456676', 0, 1),
(104, 'Milestone School', 'shariar.ceo@gmail.com', '$2y$10$ScrQspeTbnQvms8RUnCVl.c1b/a5t/SHHcKoFju9yi6e39wZXbXaq', 3, NULL, '2022-09-20 14:15:03', '2022-12-19 11:34:09', 'kamarpara, Turag ,Dhaka', '01778101959', 0, 1),
(105, 'JP high School', 'Tanvir@codecell.com.bd', '$2y$10$3VBCoMoeFUGKHBi8p2kMse3BJ2KgOaqPO0R.xu4xOPxVAhLfrvc2u', 0, NULL, '2022-09-21 06:16:13', '2022-09-21 06:16:13', 'Chittagoang', '01568405156', 0, 1),
(106, 'JP High School', 'emailadressoftanvir1@gmail.com', '$2y$10$mWmpg5.q10n4K7AuYgLjget6/DoXCM667oxSbXxmGTktRMbjf5lGO', 3, NULL, '2022-09-21 06:22:49', '2022-09-21 06:23:48', 'Chittagoang', '01568405146', 0, 1),
(107, 'Uttara High School, Uttara', 'shahidul@codecell.com.bd', '$2y$10$9uc.K18sVC.cHULZ/QpnNOkhlKie5M8uqDqKdF8TXOoM75DSPdx9G', 0, NULL, '2022-09-22 09:10:08', '2022-09-22 09:10:08', 'Uttara, Dhaka 1230', '01533448761', 0, 1),
(108, 'Ronju Sorkar Boos', 'ronusorkarboos@gmail.com', '$2y$10$JEOLQC75pQTnXSQ9D4zooeNNFkJFDW1/vPaPvZR9igY5xmq7WolA2', 3, NULL, '2022-09-22 17:57:43', '2022-09-22 18:04:31', 'Bangladas', '01912252092', 1, 1),
(109, 'Nurmim', 'mdnurmim1900@gmail.com', '$2y$10$AI2a03ZpRi.V6uVT0w4DHuT2Q.nrWb/0G0Roq0Qe9ay3jXsHDGuDi', 3, NULL, '2022-09-29 11:47:09', '2022-09-29 11:48:33', 'MdNurmimbabu', '01305468854', 0, 1),
(110, 'Niloy', 'niloychowdhury1010101010@gmail', '$2y$10$/pNVFQCCSmwl9OXTUQ5elOeuGowwQuqxeLGDKFSFIuKK5cl5btkgS', 0, NULL, '2022-10-13 17:24:47', '2022-10-13 17:24:47', 'Manikpur', '01305792192', 0, 1),
(111, 'Gabanda', 'gabandabiswasbd.in@gmail.com', '$2y$10$0QWO8Y9SxOZiBIbcB.JQoOIot4UreqsKtkrR7kK.zHIh2cTqvTw3i', 0, NULL, '2022-10-17 09:04:53', '2022-10-17 09:04:53', 'B', '01724292698', 0, 1),
(112, 'Emam', 'emam04740@gmail.com', '$2y$10$o/rOsgRiqMe/Ssqjk.pHxusBmzyyPgDl9s5pDL2jEEJa/KMINqvOW', 0, NULL, '2022-10-26 04:30:14', '2022-10-26 04:30:14', 'ঢাকা পোস্ত কলা', '01404285586', 0, 1),
(113, 'Rockybhai', 'nishatrocky1@gmail.com', '$2y$10$BwLTQ4PB1cwoeqt7DtityOZo0yeN4vFJ.6xBOf4w3DFfb5LjFaNCy', 0, NULL, '2022-10-30 03:55:04', '2022-10-30 03:55:04', 'Feni', '01568928443', 0, 1),
(116, 'Itz me nasif', 'ahmeddelwer612@gmail.com', '$2y$10$76MkdcdRBIGpIywDwcf/t.eBXm5geA4zjw25kce.b9/irpIXBNf3e', 0, NULL, '2022-11-16 18:18:58', '2022-11-16 18:18:58', 'Sylhet,Bangladesh', '01951586718', 0, 1),
(118, 'codecell international school', 'zahirulislam15@gmail.com', '$2y$10$9cFfcpvzzDEf0k/irjvziug50byZaWwbApqyr7hNhAnDjbPLsiTW2', 3, NULL, '2022-11-17 10:12:58', '2022-11-17 10:18:58', 'kamarpara', '01687766428', 0, 1),
(119, 'codecell international school and college', 'robin@codecell.com', '$2y$10$KYGmtAJIwQjqrmIXZAdc3.tqOikxhT.lLirdslixn/qVdAWLhb0Se', 3, NULL, '2022-11-19 05:54:24', '2023-02-09 12:00:25', 'vatulia', '01630456670', 0, 1),
(120, 'Uttara High School', 'developer.shahidul@yandex.com', '$2y$10$Kz5c4ofRAir4fm46xW2yke93Rx.0IwIKy5BxWV80fekAVibwdKRkm', 0, NULL, '2022-11-19 10:50:20', '2022-11-19 10:50:20', 'Anandiput, Baktermunshi-3900, Sonagazi', '+8801940204058', 0, 1),
(121, 'Kamarpara School', 'kmarpara@gmail.com', '$2y$10$LRK0u1BMQAC/QK9rPmOlv.RzihRdQWlftsfxIoffvFDhvNY1i3Tbe', 0, NULL, '2022-12-10 13:54:53', '2022-12-10 13:54:53', 'kamarpara, Turag ,Dhaka', '+8801630456676', 0, 1),
(122, 'Milestone', 'shariar.ceoo@gmail.com', '$2y$10$uc.D4ZZ97LAv.MffBLXqZOoAHve368tW8RB2zZxfDjx8FrxXuyhGy', 0, NULL, '2022-12-19 09:25:19', '2022-12-19 09:25:19', 'Kamarpara', '01302788947', 0, 1),
(124, 'fyne school and college', 'fine@gmail.com', '$2y$10$fdn/P49w3S4d6KwvtU2F8eDZUq3oSqzSN080vrZ84nx.RQa/9sQq6', 0, NULL, '2023-02-04 07:21:25', '2023-02-04 07:21:25', 'virtual school', '01568347144', 0, 1),
(125, 'International School of Dhaka', 'gigsoftltd@gmail.com', '$2y$10$32/CMzgBDexl4lGq9Br7ye1bI1zd2.MDUfWNZOFyFhcLPz87zHL02', 0, NULL, '2023-02-04 07:50:36', '2023-02-04 07:50:36', 'virtual school', '01318872707', 0, 1),
(126, 'Milestone college', 'tahamidturzo220@gmail.com', '$2y$10$.rDHlvXG4olEphqYd6tl/.f366CIqbw43pTvnrGbKiVFPlgxjNL.C', 0, NULL, '2023-02-07 19:16:04', '2023-02-07 19:16:04', 'Uttara, dhaka', '01768031053', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_checkouts`
--

CREATE TABLE `school_checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `pay_amount` varchar(255) DEFAULT NULL,
  `gateway_number` varchar(255) DEFAULT NULL,
  `gateway_type` varchar(255) DEFAULT NULL,
  `transaction_number` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_checkouts`
--

INSERT INTO `school_checkouts` (`id`, `school_id`, `pay_amount`, `gateway_number`, `gateway_type`, `transaction_number`, `status`, `created_at`, `updated_at`) VALUES
(31, 118, '02000', '01630456676', 'rocket', '191112648752342', 0, '2022-11-17 12:02:02', '2022-11-17 12:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `school_fees`
--

CREATE TABLE `school_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month_name` varchar(255) DEFAULT NULL,
  `month_id` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_fees`
--

INSERT INTO `school_fees` (`id`, `month_name`, `month_id`, `amount`, `status`, `school_id`, `created_at`, `updated_at`) VALUES
(190, 'October', '10', 0, 0, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(191, 'November', '11', 0, 0, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(192, 'December', '12', 0, 0, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(193, 'October', '10', 0, 0, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(194, 'November', '11', 0, 0, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(195, 'December', '12', 0, 0, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(196, 'October', '10', 0, 0, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(197, 'November', '11', 0, 0, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(198, 'December', '12', 0, 0, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(199, 'October', '10', 0, 0, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(200, 'November', '11', 0, 0, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(201, 'December', '12', 0, 0, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(202, 'October', '10', 0, 0, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(203, 'November', '11', 0, 0, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(204, 'December', '12', 0, 0, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(205, 'October', '10', 0, 0, 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(206, 'November', '11', 0, 0, 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(207, 'December', '12', 0, 0, 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(208, 'October', '10', 0, 0, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(209, 'November', '11', 0, 0, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(210, 'December', '12', 0, 0, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(211, 'December', '12', 0, 0, 118, '2022-11-17 10:18:16', '2022-11-17 10:18:16'),
(212, 'December', '12', 0, 0, 119, '2022-11-19 06:07:03', '2022-11-19 06:07:03'),
(213, 'December', '12', 0, 0, 119, '2022-11-19 06:07:03', '2022-11-19 06:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT '1',
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `active`, `class_id`, `school_id`, `created_at`, `updated_at`) VALUES
(0, 'zero', '1', 0, 0, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1413, 'Section A', '1', 706, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1414, 'Section A', '1', 707, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1415, 'Section A', '1', 708, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1416, 'Section A', '1', 709, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1417, 'Section A', '1', 710, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1418, 'Section A', '1', 711, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1419, 'Section A', '1', 712, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1420, 'Section A', '1', 713, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1421, 'Section A', '1', 714, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1422, 'Section A', '1', 715, 102, '2022-09-20 10:11:06', '2022-09-20 10:11:06'),
(1423, 'Section A', '1', 716, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1424, 'Section A', '1', 717, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1425, 'Section A', '1', 718, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1426, 'Section A', '1', 719, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1427, 'Section A', '1', 720, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1428, 'Section A', '1', 721, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1429, 'Section A', '1', 722, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1430, 'Section A', '1', 723, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1431, 'Section A', '1', 724, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1432, 'Section A', '1', 725, 103, '2022-09-20 10:44:35', '2022-09-20 10:44:35'),
(1433, 'Section A', '1', 726, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1434, 'Section A', '1', 727, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1435, 'Section A', '1', 728, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1436, 'Section A', '1', 729, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1437, 'Section A', '1', 730, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1438, 'Section A', '1', 731, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1439, 'Section A', '1', 732, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1440, 'Section A', '1', 733, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1441, 'Section A', '1', 734, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1442, 'Section A', '1', 735, 104, '2022-09-20 14:15:47', '2022-09-20 14:15:47'),
(1443, 'Section A', '1', 736, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1444, 'Section A', '1', 737, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1445, 'Section A', '1', 738, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1446, 'Section A', '1', 739, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1447, 'Section A', '1', 740, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1448, 'Section A', '1', 741, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1449, 'Section A', '1', 742, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1450, 'Section A', '1', 743, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1451, 'Section A', '1', 744, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1452, 'Section A', '1', 745, 106, '2022-09-21 06:23:48', '2022-09-21 06:23:48'),
(1453, 'Section A', '1', 746, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1454, 'Section A', '1', 747, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1455, 'Section A', '1', 748, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1456, 'Section A', '1', 749, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1457, 'Section A', '1', 750, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1458, 'Section A', '1', 751, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1459, 'Section A', '1', 752, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1460, 'Section A', '1', 753, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1461, 'Section A', '1', 754, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1462, 'Section A', '1', 755, 108, '2022-09-22 18:03:27', '2022-09-22 18:03:27'),
(1463, 'Section A', '1', 756, 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(1464, 'Section A', '1', 757, 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(1465, 'Section A', '1', 758, 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(1466, 'Section A', '1', 759, 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(1467, 'Section A', '1', 760, 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(1468, 'Section A', '1', 761, 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(1469, 'Section A', '1', 762, 109, '2022-09-29 11:48:33', '2022-09-29 11:48:33'),
(1470, 'Section A', '1', 763, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1471, 'Section A', '1', 764, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1472, 'Section A', '1', 765, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1473, 'Section A', '1', 766, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1474, 'Section A', '1', 767, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1475, 'Section A', '1', 768, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1476, 'Section A', '1', 769, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1477, 'Section A', '1', 770, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1478, 'Section A', '1', 771, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1479, 'Section A', '1', 772, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1480, 'Section A', '1', 773, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1481, 'Section A', '1', 774, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1482, 'Section A', '1', 775, 109, '2022-09-29 11:48:34', '2022-09-29 11:48:34'),
(1483, 'Section A', '1', 776, 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1484, 'Section A', '1', 777, 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1485, 'Section A', '1', 778, 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1486, 'Section A', '1', 779, 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1487, 'Section A', '1', 780, 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1488, 'Section A', '1', 781, 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1489, 'Section A', '1', 782, 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1490, 'Section A', '1', 783, 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1491, 'Section A', '1', 784, 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1492, 'Section A', '1', 785, 118, '2022-11-17 10:18:17', '2022-11-17 10:18:17'),
(1493, 'Section A', '1', 786, 118, '2022-11-17 10:22:42', '2022-11-17 10:22:42'),
(1494, 'Section B', '1', 786, 118, '2022-11-17 10:23:25', '2022-11-17 10:23:25'),
(1495, 'Section C', '0', 786, 118, '2022-11-17 10:23:56', '2022-11-17 10:23:56'),
(1496, 'Section A', '1', 787, 119, '2022-11-19 06:07:03', '2022-11-19 06:07:03'),
(1499, 'Section A', '1', 790, 119, '2022-11-19 06:07:03', '2022-11-19 06:07:03'),
(1501, 'Section A', '1', 792, 119, '2022-11-19 06:07:03', '2022-11-19 06:07:03'),
(1503, 'Section A', '1', 794, 119, '2022-11-19 06:07:03', '2022-11-19 06:07:03'),
(1505, 'Section A', '1', 796, 119, '2022-11-19 06:07:03', '2022-11-19 06:07:03'),
(1507, 'Section A', '1', 798, 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1509, 'Section A', '1', 800, 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1511, 'Section A', '1', 802, 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1513, 'Section A', '1', 804, 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1514, 'Section A', '1', 805, 119, '2022-11-19 06:07:04', '2022-11-19 06:07:04'),
(1516, 'Section B', '1', 805, 119, '2022-11-19 07:18:17', '2022-11-19 07:18:17'),
(1517, 'Section B', '1', 804, 119, '2022-11-19 07:18:33', '2022-11-19 07:18:33'),
(1518, 'Section A', '1', 807, 119, '2022-11-19 07:20:22', '2022-11-19 07:20:22'),
(1519, 'Section B', '1', 807, 119, '2022-11-19 07:20:34', '2022-11-19 07:20:34'),
(1520, 'Section A', '1', 808, 119, '2022-11-20 05:32:36', '2022-11-20 05:32:36'),
(1521, 'Section B', '1', 808, 119, '2022-11-20 05:32:51', '2022-11-20 05:32:51'),
(1522, 'Section C', '1', 804, 119, '2022-11-20 12:47:06', '2022-11-20 12:47:06'),
(1523, 'Section C', '1', 807, 119, '2022-11-21 11:00:47', '2022-11-21 11:00:47'),
(1525, 'Section D', '1', 804, 119, '2022-12-29 11:45:21', '2022-12-29 11:45:21'),
(1526, 'Section dfghjk', '1', 805, 119, '2023-02-04 07:59:36', '2023-02-04 07:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `staff_types`
--

CREATE TABLE `staff_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_types`
--

INSERT INTO `staff_types` (`id`, `position_name`, `school_id`, `created_at`, `updated_at`) VALUES
(6, 'Doptori', 119, '2022-11-21 05:59:07', '2022-11-21 05:59:07'),
(8, 'pion', 119, '2022-11-21 05:59:32', '2022-11-21 05:59:32'),
(9, 'Security Guard', 119, '2022-11-21 06:01:54', '2022-11-21 06:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `absent` double NOT NULL DEFAULT 0,
  `absent_ater_break` double NOT NULL DEFAULT 0,
  `first_term` double NOT NULL DEFAULT 0,
  `mid_term` double NOT NULL DEFAULT 0,
  `final_term` double NOT NULL DEFAULT 0,
  `development` double NOT NULL DEFAULT 0,
  `library` double NOT NULL DEFAULT 0,
  `sport` double NOT NULL DEFAULT 0,
  `penalty` double NOT NULL DEFAULT 0,
  `admission` double NOT NULL DEFAULT 0,
  `extra_fees` double NOT NULL DEFAULT 0,
  `extra_fees_title` varchar(255) DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `absent`, `absent_ater_break`, `first_term`, `mid_term`, `final_term`, `development`, `library`, `sport`, `penalty`, `admission`, `extra_fees`, `extra_fees_title`, `class_id`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 10, 50, 500, 500, 500, 200, 200, 50, 20, 1000, 0, NULL, 804, 119, '2023-02-16 04:52:39', NULL),
(2, 10, 50, 700, 700, 700, 200, 300, 50, 20, 1000, 0, NULL, 805, 119, '2023-02-16 04:52:39', '2023-02-16 05:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `student_monthly_fees`
--

CREATE TABLE `student_monthly_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month_name` varchar(255) DEFAULT NULL,
  `month_id` int(20) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_monthly_fees`
--

INSERT INTO `student_monthly_fees` (`id`, `month_name`, `month_id`, `amount`, `status`, `student_id`, `school_id`, `created_at`, `updated_at`) VALUES
(529, 'January', 0, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(530, 'February', 1, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(531, 'March', 2, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(532, 'April', 3, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(533, 'May', 4, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(534, 'June', 5, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(535, 'July', 6, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(536, 'August', 7, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(537, 'September', 8, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(538, 'October', 9, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(539, 'November', 10, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(540, 'December', 11, 0, 0, 51, 102, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(541, 'January', 0, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(542, 'February', 1, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(543, 'March', 2, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(544, 'April', 3, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(545, 'May', 4, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(546, 'June', 5, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(547, 'July', 6, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(548, 'August', 7, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(549, 'September', 8, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(550, 'October', 9, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(551, 'November', 10, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(552, 'December', 11, 0, 0, 52, 102, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(565, 'January', 0, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(566, 'February', 1, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(567, 'March', 2, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(568, 'April', 3, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(569, 'May', 4, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(570, 'June', 5, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(571, 'July', 6, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(572, 'August', 7, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(573, 'September', 8, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(574, 'October', 9, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(575, 'November', 10, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(576, 'December', 11, 0, 0, 54, 102, '2022-09-24 09:24:58', '2022-09-24 09:24:58'),
(577, 'January', 0, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(578, 'February', 1, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(579, 'March', 2, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(580, 'April', 3, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(581, 'May', 4, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(582, 'June', 5, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(583, 'July', 6, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(584, 'August', 7, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(585, 'September', 8, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(586, 'October', 9, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(587, 'November', 10, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(588, 'December', 11, 0, 0, 55, 102, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(589, 'January', 0, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(590, 'February', 1, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(591, 'March', 2, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(592, 'April', 3, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(593, 'May', 4, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(594, 'June', 5, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(595, 'July', 6, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(596, 'August', 7, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(597, 'September', 8, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(598, 'October', 9, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(599, 'November', 10, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(600, 'December', 11, 0, 0, 56, 118, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(601, 'January', 0, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(602, 'February', 1, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(603, 'March', 2, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(604, 'April', 3, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(605, 'May', 4, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(606, 'June', 5, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(607, 'July', 6, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(608, 'August', 7, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(609, 'September', 8, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(610, 'October', 9, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(611, 'November', 10, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(612, 'December', 11, 0, 0, 57, 118, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(613, 'January', 0, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(614, 'February', 1, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(615, 'March', 2, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(616, 'April', 3, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(617, 'May', 4, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(618, 'June', 5, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(619, 'July', 6, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(620, 'August', 7, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(621, 'September', 8, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(622, 'October', 9, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(623, 'November', 10, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(624, 'December', 11, 0, 0, 58, 118, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(625, 'January', 0, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(626, 'February', 1, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(627, 'March', 2, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(628, 'April', 3, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(629, 'May', 4, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(630, 'June', 5, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(631, 'July', 6, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(632, 'August', 7, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(633, 'September', 8, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(634, 'October', 9, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(635, 'November', 10, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(636, 'December', 11, 0, 0, 59, 118, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(637, 'January', 0, 1800, 2, 60, 119, '2022-11-19 06:35:50', '2023-02-06 10:07:36'),
(638, 'February', 1, 0, 0, 60, 119, '2022-11-19 06:35:50', '2022-11-19 06:35:50'),
(639, 'March', 2, 0, 0, 60, 119, '2022-11-19 06:35:50', '2022-11-19 06:35:50'),
(640, 'April', 3, 0, 0, 60, 119, '2022-11-19 06:35:50', '2022-11-19 06:35:50'),
(641, 'May', 4, 0, 0, 60, 119, '2022-11-19 06:35:51', '2022-11-19 06:35:51'),
(642, 'June', 5, 0, 0, 60, 119, '2022-11-19 06:35:51', '2022-11-19 06:35:51'),
(643, 'July', 6, 0, 0, 60, 119, '2022-11-19 06:35:51', '2022-11-19 06:35:51'),
(644, 'August', 7, 0, 0, 60, 119, '2022-11-19 06:35:51', '2022-11-19 06:35:51'),
(645, 'September', 8, 0, 0, 60, 119, '2022-11-19 06:35:51', '2022-11-19 06:35:51'),
(646, 'October', 9, 0, 0, 60, 119, '2022-11-19 06:35:51', '2022-11-19 06:35:51'),
(647, 'November', 10, 0, 0, 60, 119, '2022-11-19 06:35:51', '2022-11-19 06:35:51'),
(648, 'December', 11, 0, 0, 60, 119, '2022-11-19 06:35:51', '2022-11-19 06:35:51'),
(661, 'January', 0, 0, 0, 62, 119, '2022-11-19 06:46:05', '2022-11-19 06:46:05'),
(662, 'February', 1, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(663, 'March', 2, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(664, 'April', 3, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(665, 'May', 4, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(666, 'June', 5, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(667, 'July', 6, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(668, 'August', 7, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(669, 'September', 8, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(670, 'October', 9, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(671, 'November', 10, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(672, 'December', 11, 0, 0, 62, 119, '2022-11-19 06:46:06', '2022-11-19 06:46:06'),
(673, 'January', 0, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(674, 'February', 1, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(675, 'March', 2, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(676, 'April', 3, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(677, 'May', 4, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(678, 'June', 5, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(679, 'July', 6, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(680, 'August', 7, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(681, 'September', 8, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(682, 'October', 9, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(683, 'November', 10, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(684, 'December', 11, 0, 0, 63, 119, '2022-11-19 06:50:48', '2022-11-19 06:50:48'),
(685, 'January', 0, 0, 0, 64, 119, '2022-11-19 06:53:22', '2022-11-19 06:53:22'),
(686, 'February', 1, 0, 0, 64, 119, '2022-11-19 06:53:22', '2022-11-19 06:53:22'),
(687, 'March', 2, 0, 0, 64, 119, '2022-11-19 06:53:23', '2022-11-19 06:53:23'),
(688, 'April', 3, 0, 0, 64, 119, '2022-11-19 06:53:23', '2022-11-19 06:53:23'),
(689, 'May', 4, 0, 0, 64, 119, '2022-11-19 06:53:23', '2022-11-19 06:53:23'),
(690, 'June', 5, 0, 0, 64, 119, '2022-11-19 06:53:23', '2022-11-19 06:53:23'),
(691, 'July', 6, 0, 0, 64, 119, '2022-11-19 06:53:23', '2022-11-19 06:53:23'),
(692, 'August', 7, 0, 0, 64, 119, '2022-11-19 06:53:23', '2022-11-19 06:53:23'),
(693, 'September', 8, 0, 0, 64, 119, '2022-11-19 06:53:23', '2022-11-19 06:53:23'),
(694, 'October', 9, 0, 0, 64, 119, '2022-11-19 06:53:23', '2022-11-19 06:53:23'),
(695, 'November', 10, 0, 0, 64, 119, '2022-11-19 06:53:23', '2022-11-19 06:53:23'),
(696, 'December', 11, 0, 0, 64, 119, '2022-11-19 06:53:23', '2022-11-19 06:53:23'),
(697, 'January', 0, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(698, 'February', 1, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(699, 'March', 2, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(700, 'April', 3, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(701, 'May', 4, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(702, 'June', 5, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(703, 'July', 6, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(704, 'August', 7, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(705, 'September', 8, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(706, 'October', 9, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(707, 'November', 10, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(708, 'December', 11, 0, 0, 65, 119, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(709, 'January', 0, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(710, 'February', 1, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(711, 'March', 2, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(712, 'April', 3, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(713, 'May', 4, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(714, 'June', 5, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(715, 'July', 6, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(716, 'August', 7, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(717, 'September', 8, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(718, 'October', 9, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(719, 'November', 10, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(720, 'December', 11, 0, 0, 66, 119, '2022-11-19 06:59:43', '2022-11-19 06:59:43'),
(721, 'January', 0, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(722, 'February', 1, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(723, 'March', 2, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(724, 'April', 3, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(725, 'May', 4, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(726, 'June', 5, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(727, 'July', 6, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(728, 'August', 7, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(729, 'September', 8, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(730, 'October', 9, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(731, 'November', 10, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(732, 'December', 11, 0, 0, 67, 119, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(733, 'January', 0, 0, 0, 68, 119, '2022-11-19 07:01:24', '2022-11-19 07:01:24'),
(734, 'February', 1, 0, 0, 68, 119, '2022-11-19 07:01:25', '2022-11-19 07:01:25'),
(735, 'March', 2, 0, 0, 68, 119, '2022-11-19 07:01:25', '2022-11-19 07:01:25'),
(736, 'April', 3, 0, 0, 68, 119, '2022-11-19 07:01:25', '2022-11-19 07:01:25'),
(737, 'May', 4, 0, 0, 68, 119, '2022-11-19 07:01:25', '2022-11-19 07:01:25'),
(738, 'June', 5, 0, 0, 68, 119, '2022-11-19 07:01:25', '2022-11-19 07:01:25'),
(739, 'July', 6, 0, 0, 68, 119, '2022-11-19 07:01:26', '2022-11-19 07:01:26'),
(740, 'August', 7, 0, 0, 68, 119, '2022-11-19 07:01:26', '2022-11-19 07:01:26'),
(741, 'September', 8, 0, 0, 68, 119, '2022-11-19 07:01:26', '2022-11-19 07:01:26'),
(742, 'October', 9, 0, 0, 68, 119, '2022-11-19 07:01:26', '2022-11-19 07:01:26'),
(743, 'November', 10, 0, 0, 68, 119, '2022-11-19 07:01:26', '2022-11-19 07:01:26'),
(744, 'December', 11, 0, 0, 68, 119, '2022-11-19 07:01:26', '2022-11-19 07:01:26'),
(745, 'January', 0, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(746, 'February', 1, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(747, 'March', 2, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(748, 'April', 3, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(749, 'May', 4, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(750, 'June', 5, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(751, 'July', 6, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(752, 'August', 7, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(753, 'September', 8, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(754, 'October', 9, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(755, 'November', 10, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(756, 'December', 11, 0, 0, 69, 119, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(757, 'January', 0, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(758, 'February', 1, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(759, 'March', 2, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(760, 'April', 3, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(761, 'May', 4, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(762, 'June', 5, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(763, 'July', 6, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(764, 'August', 7, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(765, 'September', 8, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(766, 'October', 9, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(767, 'November', 10, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(768, 'December', 11, 0, 0, 70, 119, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(769, 'January', 0, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(770, 'February', 1, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(771, 'March', 2, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(772, 'April', 3, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(773, 'May', 4, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(774, 'June', 5, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(775, 'July', 6, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(776, 'August', 7, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(777, 'September', 8, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(778, 'October', 9, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(779, 'November', 10, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(780, 'December', 11, 0, 0, 71, 119, '2022-11-19 07:03:39', '2022-11-19 07:03:39'),
(781, 'January', 0, 0, 0, 72, 119, '2022-11-19 07:03:50', '2022-11-19 07:03:50'),
(782, 'February', 1, 0, 0, 72, 119, '2022-11-19 07:03:50', '2022-11-19 07:03:50'),
(783, 'March', 2, 0, 0, 72, 119, '2022-11-19 07:03:50', '2022-11-19 07:03:50'),
(784, 'April', 3, 0, 0, 72, 119, '2022-11-19 07:03:51', '2022-11-19 07:03:51'),
(785, 'May', 4, 0, 0, 72, 119, '2022-11-19 07:03:51', '2022-11-19 07:03:51'),
(786, 'June', 5, 0, 0, 72, 119, '2022-11-19 07:03:51', '2022-11-19 07:03:51'),
(787, 'July', 6, 0, 0, 72, 119, '2022-11-19 07:03:51', '2022-11-19 07:03:51'),
(788, 'August', 7, 0, 0, 72, 119, '2022-11-19 07:03:51', '2022-11-19 07:03:51'),
(789, 'September', 8, 0, 0, 72, 119, '2022-11-19 07:03:51', '2022-11-19 07:03:51'),
(790, 'October', 9, 0, 0, 72, 119, '2022-11-19 07:03:51', '2022-11-19 07:03:51'),
(791, 'November', 10, 0, 0, 72, 119, '2022-11-19 07:03:51', '2022-11-19 07:03:51'),
(792, 'December', 11, 0, 0, 72, 119, '2022-11-19 07:03:51', '2022-11-19 07:03:51'),
(793, 'January', 0, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(794, 'February', 1, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(795, 'March', 2, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(796, 'April', 3, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(797, 'May', 4, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(798, 'June', 5, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(799, 'July', 6, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(800, 'August', 7, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(801, 'September', 8, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(802, 'October', 9, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(803, 'November', 10, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(804, 'December', 11, 0, 0, 73, 119, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(805, 'January', 0, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(806, 'February', 1, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(807, 'March', 2, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(808, 'April', 3, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(809, 'May', 4, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(810, 'June', 5, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(811, 'July', 6, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(812, 'August', 7, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(813, 'September', 8, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(814, 'October', 9, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(815, 'November', 10, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(816, 'December', 11, 0, 0, 74, 119, '2022-11-19 07:04:27', '2022-11-19 07:04:27'),
(817, 'January', 0, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(818, 'February', 1, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(819, 'March', 2, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(820, 'April', 3, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(821, 'May', 4, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(822, 'June', 5, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(823, 'July', 6, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(824, 'August', 7, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(825, 'September', 8, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(826, 'October', 9, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(827, 'November', 10, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(828, 'December', 11, 0, 0, 75, 119, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(829, 'January', 0, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(830, 'February', 1, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(831, 'March', 2, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(832, 'April', 3, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(833, 'May', 4, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(834, 'June', 5, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(835, 'July', 6, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(836, 'August', 7, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(837, 'September', 8, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(838, 'October', 9, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(839, 'November', 10, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(840, 'December', 11, 0, 0, 76, 119, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(841, 'January', 0, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(842, 'February', 1, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(843, 'March', 2, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(844, 'April', 3, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(845, 'May', 4, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(846, 'June', 5, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(847, 'July', 6, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(848, 'August', 7, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(849, 'September', 8, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(850, 'October', 9, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(851, 'November', 10, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(852, 'December', 11, 0, 0, 77, 119, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(853, 'January', 0, 1700, 1, 78, 119, '2022-11-20 11:38:19', '2023-02-06 11:08:35'),
(854, 'February', 1, 0, 0, 78, 119, '2022-11-20 11:38:19', '2022-11-20 11:38:19'),
(855, 'March', 2, 0, 0, 78, 119, '2022-11-20 11:38:19', '2022-11-20 11:38:19'),
(856, 'April', 3, 0, 0, 78, 119, '2022-11-20 11:38:19', '2022-11-20 11:38:19'),
(857, 'May', 4, 0, 0, 78, 119, '2022-11-20 11:38:19', '2022-11-20 11:38:19'),
(858, 'June', 5, 0, 0, 78, 119, '2022-11-20 11:38:19', '2022-11-20 11:38:19'),
(859, 'July', 6, 0, 0, 78, 119, '2022-11-20 11:38:19', '2022-11-20 11:38:19'),
(860, 'August', 7, 0, 0, 78, 119, '2022-11-20 11:38:19', '2022-11-20 11:38:19'),
(861, 'September', 8, 0, 0, 78, 119, '2022-11-20 11:38:19', '2022-11-20 11:38:19'),
(862, 'October', 9, 0, 0, 78, 119, '2022-11-20 11:38:19', '2022-11-20 11:38:19'),
(863, 'November', 10, 500, 2, 78, 119, '2022-11-20 11:38:19', '2022-12-08 11:00:15'),
(864, 'December', 11, 0, 0, 78, 119, '2022-11-20 11:38:19', '2022-11-20 11:38:19'),
(865, 'January', 0, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(866, 'February', 1, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(867, 'March', 2, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(868, 'April', 3, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(869, 'May', 4, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(870, 'June', 5, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(871, 'July', 6, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(872, 'August', 7, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(873, 'September', 8, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(874, 'October', 9, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(875, 'November', 10, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(876, 'December', 11, 0, 0, 79, 119, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(877, 'January', 0, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(878, 'February', 1, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(879, 'March', 2, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(880, 'April', 3, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(881, 'May', 4, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(882, 'June', 5, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(883, 'July', 6, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(884, 'August', 7, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(885, 'September', 8, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(886, 'October', 9, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(887, 'November', 10, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(888, 'December', 11, 0, 0, 80, 119, '2022-11-20 11:46:30', '2022-11-20 11:46:30'),
(889, 'January', 0, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(890, 'February', 1, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(891, 'March', 2, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(892, 'April', 3, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(893, 'May', 4, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(894, 'June', 5, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(895, 'July', 6, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(896, 'August', 7, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(897, 'September', 8, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(898, 'October', 9, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(899, 'November', 10, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(900, 'December', 11, 0, 0, 81, 119, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(901, 'January', 0, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(902, 'February', 1, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(903, 'March', 2, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(904, 'April', 3, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(905, 'May', 4, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(906, 'June', 5, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(907, 'July', 6, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(908, 'August', 7, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(909, 'September', 8, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(910, 'October', 9, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(911, 'November', 10, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(912, 'December', 11, 0, 0, 82, 119, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(913, 'January', 0, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(914, 'February', 1, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(915, 'March', 2, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(916, 'April', 3, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(917, 'May', 4, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(918, 'June', 5, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(919, 'July', 6, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(920, 'August', 7, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(921, 'September', 8, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(922, 'October', 9, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(923, 'November', 10, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(924, 'December', 11, 0, 0, 83, 119, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(925, 'January', 0, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(926, 'February', 1, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(927, 'March', 2, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(928, 'April', 3, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(929, 'May', 4, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(930, 'June', 5, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(931, 'July', 6, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(932, 'August', 7, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(933, 'September', 8, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(934, 'October', 9, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(935, 'November', 10, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(936, 'December', 11, 0, 0, 84, 119, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(937, 'January', 0, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(938, 'February', 1, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(939, 'March', 2, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(940, 'April', 3, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(941, 'May', 4, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(942, 'June', 5, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(943, 'July', 6, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(944, 'August', 7, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(945, 'September', 8, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(946, 'October', 9, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(947, 'November', 10, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(948, 'December', 11, 0, 0, 85, 119, '2022-11-21 05:16:03', '2022-11-21 05:16:03'),
(949, 'January', 0, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(950, 'February', 1, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(951, 'March', 2, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(952, 'April', 3, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(953, 'May', 4, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(954, 'June', 5, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(955, 'July', 6, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(956, 'August', 7, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(957, 'September', 8, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(958, 'October', 9, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(959, 'November', 10, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(960, 'December', 11, 0, 0, 86, 119, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(961, 'January', 0, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(962, 'January', 0, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(963, 'February', 1, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(964, 'February', 1, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(965, 'March', 2, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(966, 'March', 2, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(967, 'April', 3, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(968, 'April', 3, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(969, 'May', 4, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(970, 'May', 4, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(971, 'June', 5, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(972, 'June', 5, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(973, 'July', 6, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(974, 'July', 6, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(975, 'August', 7, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(976, 'August', 7, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(977, 'September', 8, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(978, 'September', 8, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(979, 'October', 9, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(980, 'October', 9, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(981, 'November', 10, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(982, 'November', 10, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(983, 'December', 11, 0, 0, 88, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(984, 'December', 11, 0, 0, 87, 119, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(985, 'January', 0, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(986, 'February', 1, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(987, 'March', 2, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(988, 'April', 3, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(989, 'May', 4, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(990, 'June', 5, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(991, 'July', 6, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(992, 'August', 7, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(993, 'September', 8, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(994, 'October', 9, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(995, 'November', 10, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(996, 'December', 11, 0, 0, 89, 119, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(997, 'January', 0, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(998, 'February', 1, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(999, 'March', 2, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(1000, 'April', 3, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(1001, 'May', 4, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(1002, 'June', 5, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(1003, 'July', 6, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(1004, 'August', 7, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(1005, 'September', 8, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(1006, 'October', 9, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(1007, 'November', 10, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47'),
(1008, 'December', 11, 0, 0, 90, 102, '2022-11-21 06:51:47', '2022-11-21 06:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `active` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `class_id`, `section_id`, `group_id`, `subject_name`, `school_id`, `active`, `created_at`, `updated_at`) VALUES
(102, 785, 1492, NULL, 'Bangla 1st paper', 118, '1', '2022-11-17 10:32:12', '2022-11-17 10:32:12'),
(103, 805, 1514, NULL, 'Bangla 1st paper', 119, '1', '2022-11-20 05:33:47', '2022-11-20 05:33:47'),
(104, 804, 1513, 34, 'Bangla 1st paper', 119, '1', '2022-11-21 08:08:24', '2022-11-21 08:08:24'),
(105, 804, 1513, 34, 'English 1st paper', 119, '1', '2022-11-21 08:10:07', '2022-11-21 08:10:07'),
(106, 804, 1513, 34, 'Bangla 2nd paper', 119, '1', '2022-11-21 08:10:20', '2022-11-21 08:10:20'),
(107, 804, 1513, 34, 'English 2nd paper', 119, '1', '2022-11-21 08:10:41', '2022-11-21 08:10:41'),
(108, 804, 1513, 34, 'ICT', 119, '1', '2022-11-21 08:10:47', '2022-11-21 08:10:47'),
(109, 804, 1513, 34, 'Math', 119, '1', '2022-11-21 08:10:58', '2022-11-21 08:10:58'),
(110, 804, 1513, 34, 'Physics', 119, '1', '2022-11-21 08:11:13', '2022-11-21 08:11:13'),
(111, 804, 1513, 34, 'Chemistry', 119, '1', '2022-11-21 08:11:26', '2022-11-21 08:11:26'),
(112, 804, 1513, 34, 'Biology', 119, '1', '2022-11-21 08:11:36', '2022-11-21 08:11:36'),
(113, 804, 1513, 34, 'Religion', 119, '1', '2022-11-21 08:12:05', '2022-11-21 08:12:05'),
(114, 804, 1513, 34, 'Higher math', 119, '1', '2022-11-21 08:13:06', '2022-11-21 08:13:06'),
(115, 804, 1517, 41, 'Bangla 1st paper', 119, '1', '2022-11-21 08:14:33', '2022-11-21 08:14:33'),
(116, 804, 1517, 41, 'Bangla 2nd paper', 119, '1', '2022-11-21 08:14:43', '2022-11-21 08:14:43'),
(117, 804, 1517, 41, 'English 1st paper', 119, '1', '2022-11-21 08:14:51', '2022-11-21 08:14:51'),
(118, 804, 1517, 41, 'English 2nd paper', 119, '1', '2022-11-21 08:14:58', '2022-11-21 08:14:58'),
(119, 804, 1517, 41, 'ICT', 119, '1', '2022-11-21 08:15:06', '2022-11-21 08:15:06'),
(120, 804, 1517, 41, 'Math', 119, '1', '2022-11-21 08:15:14', '2022-11-21 08:15:14'),
(121, 804, 1517, 41, 'Religion', 119, '1', '2022-11-21 08:17:29', '2022-11-21 08:17:29'),
(122, 802, 1511, NULL, 'Bangla 1st paper', 119, '1', '2022-11-21 08:51:19', '2022-11-21 08:51:19'),
(123, 802, 1511, NULL, 'English 1st paper', 119, '1', '2022-11-21 08:51:25', '2022-11-21 08:51:25'),
(124, 805, 1514, 39, 'Higher Math', 119, '1', '2022-12-08 07:34:37', '2022-12-08 07:34:37'),
(125, 805, 1514, 39, 'Biology', 119, '1', '2022-12-08 07:34:52', '2022-12-08 07:34:52'),
(126, 805, 1514, 39, 'Biology', 119, '1', '2022-12-08 07:34:52', '2022-12-08 07:34:52'),
(127, 776, 0, NULL, 'zero', 0, '1', '2022-11-17 10:32:12', '2022-11-17 10:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `link_id` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `Nationality` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT 1,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `full_name`, `email`, `phone`, `link_id`, `email_verified_at`, `password`, `department_name`, `gender`, `Nationality`, `blood_group`, `address`, `about`, `active`, `school_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(37, 'Teacher', 'Teacher@gmail.com', '01568405146', 'shikka1810668405146', NULL, '$2y$10$0ZL4QslXlE/Vp4U4c637XOvnrELAIZ4ILRUu/R0pH81DBkkw7OxEa', 'Higher Math', NULL, NULL, NULL, NULL, NULL, 1, 106, NULL, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(38, 'Teacher2', 'teacher@mail.com', '015656565656', 'shikka61106656565656', NULL, '$2y$10$DZrL.Q6zqN128ygDUa7Sbeow1jEgRNqCLIZq7V.70gYqbc3TJD24m', 'Bangla 1st Paper', NULL, NULL, NULL, NULL, NULL, 1, 106, NULL, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(39, 'Teacher', 'tanvirrimu8@gmail.com', '01400559390', 'shikka3310600559390', NULL, '$2y$10$UR3dbtPnag./vbFv4AlBdOgvwSiS2YW0GGSioNRJ5cASQdDz8PtG2', 'English 1st Paper', NULL, NULL, NULL, NULL, NULL, 1, 106, NULL, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(40, 'Shahidul Islam', 'contact.shahidul@gmail.com', '01940204058', 'shikka7710240204058', NULL, '$2y$10$1G1IFqlfSQpg4Lg3f2I4ZeAPSfts/E6H2nShBIt3AYzMQGbYG7WcC', 'Math', 'Male', 'Bangladesh', 'A+', 'Rampura, Mohipal, Feni', NULL, 1, 102, NULL, '2022-09-21 10:34:18', '2022-09-24 11:13:51'),
(41, 'Ariyan Ahmed', 'arianahmed257@gmail.com', '01533448761', 'shikka4910233448761', NULL, '$2y$10$6OGWSQDIr4cfBTHUcrhnFuCtwOZoiPwPY73oHGNVXpSZWv7fBC6Ua', 'Math', NULL, NULL, NULL, NULL, NULL, 1, 102, NULL, '2022-09-21 11:17:56', '2022-09-21 12:10:31'),
(42, 'Shariar Islam', 'shariar.ceo@gmail.com', '01630456676', 'shikka2510230456676', NULL, '$2y$10$eJoTZS1iOUCm9s.JgbqS4upwqfDLYIoJ1WtJYfOB6EU4N8i3XKwn.', 'Business Entrepreneurship', NULL, NULL, NULL, NULL, NULL, 1, 102, NULL, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(43, 'Shahidul Islam Antor', 'developer.shahidul@yandex.com', '01642742704', 'shikka9011868347144', NULL, '$2y$10$zPPBw6IDg5wHQAP5ELEz8.cOSad8vUJCq1vlYI1GXO3PHTAxupP7m', 'Bangla 1st Paper', NULL, NULL, NULL, NULL, NULL, 1, 118, NULL, '2022-11-17 10:39:51', '2022-11-17 11:39:24'),
(44, 'Robin', 'robin@codecell.com', '01568991122', 'shikka9411868991122', NULL, '$2y$10$.nRieXimsmq3ibXsgWQf4e2pmoTe0gdmHkr069cFp3rxzaWZBphkW', 'Business Entrepreneurship', NULL, NULL, NULL, NULL, NULL, 1, 118, NULL, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(45, 'Zahirul Islam', 'zahirulislam15@gmail.com', '01568347144', 'shikka3511968347144', NULL, '$2y$10$OwilaRvUQl05ZQoLQjyQUOqiOqLM1hpAaOSKr9NWh2zetVLOAQyCe', 'ICT', 'Male', 'bangladeshi', 'A+', 'kamarpara, uttara, Dhaka.', 'asdfghjkl', 1, 119, NULL, '2022-11-19 06:08:18', '2022-12-08 09:25:28'),
(46, 'tanvir khan', 'tanvir@codecell.bd', '01677777777', 'shikka6011977777777', NULL, '$2y$10$ut2ThZDAr0MV0EYdmnh1..kvJ1FgcmMb5CumzRePkDQLOseFeKZ8i', 'Math', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-11-19 06:11:52', '2022-11-19 06:18:21'),
(48, 'tanvir Ahammed', 'tanvir@gmail.com', '01677777788', 'shikka2211977777788', NULL, '$2y$10$50r/Ak6WwZ2g46e3Z0kdyeJGpNN4x0rF0MXLUOd1h2lqhu1FQVeiC', 'Chemistry', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-11-19 06:17:45', '2022-11-19 06:18:05'),
(49, 'Shariar Islam', 'shariar@gmail.com', '01630456677', 'shikka9411930456677', NULL, '$2y$10$0KW25lU8URioMc8p2Kle3.8MZ2j7Gu.htkTCFhRu5qRXOFPG75I2y', 'Business Entrepreneurship', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(50, 'Robin', 'robin123@codecell.com', '014100110011', 'shikka18119100110011', NULL, '$2y$10$JNTFezOkb5sLuPLscXzM9ODp9Ik5IoNvBKqfTd6QQZYxBpWuglqd.', 'English 1st Paper', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(52, 'Shahidul Islam Antor', 'sahidul@codecell.com', '01401401401', 'shikka1511901401401', NULL, '$2y$10$fEs5kpbND/kNFzgUdAKbB.GQ8rO2uxwy/AsgOBkIVEvHTJL4Jv.Y.', 'Bangla 1st Paper', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(54, 'Shahidul Islam Antor', 'antor@gmail.com', '0100000001', 'shikka151190000001', NULL, '$2y$10$MfNKmWSn9LbLtidD2kZQNO4srcGjEZitDykzKu6a/mdlSMeLE0xD6', 'Bangla 2nd Paper', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(55, 'nobin', 'nobin@codecell.com', '45645645645', 'shikka9411945645645', NULL, '$2y$10$Yi0m0eDvHDOpycZtm0xum.jYh9eFmKak2KvXT9xB.0MU.2x.f0gSy', 'Bangla 1st Paper', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-11-20 08:54:01', '2022-12-08 05:32:07'),
(56, 'test 2', 'test2@dfghj', 'sdfsfd', 'shikka51119sfd', NULL, '$2y$10$X1HRHID6VPCwXayPKlN2oewKx7HVzrWC3XVHqetJYTAUGw2AgI5U2', 'Accounting', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-11-20 08:54:47', '2022-11-21 05:34:19'),
(58, 'Zahirul Islam', 'zahirulislam15@gmail.com', '01568347144', 'shikka1111968347144', NULL, '$2y$10$wcxCQ6w4wpwpWB1SUsoXoOprYBxyTu1wEzWwLSTEIguE8ngOsErE6', 'Math', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-11-20 11:15:04', '2022-11-20 11:15:04'),
(59, 'Zahirul Islam', 'zahirulislam15@gmail.com', '01568347144', 'shikka7911968347144', NULL, '$2y$10$5fweGXJhorzDG.Dxm1okyunjpdOK/YyVKGaFTmwGg9WV/i6Iros/2', 'Chemistry', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-11-20 12:46:05', '2022-11-20 12:46:05'),
(60, 'aman vai', 'aman@codecell.com', '01427895639', 'shikka3611927895639', NULL, '$2y$10$e6FWvEr817UkZb1S3fKPruc16OrU4iHsfBIoQQer1JJPr4hWfVOue', 'Religion', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(61, 'Rakib Raihan', 'rakib@gmail.com', '01780425530', 'shikka4111980425530', NULL, '$2y$10$mWE6kj2EGOQ4zrnoNOKc2e7X6XOPHgWJKX1t0tmR4oIuY/7xjk1EK', 'English 2nd Paper', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(67, 'Tanvir Ahmed', 'emailadressoftanvir1@gmail.com', '01568405146', 'shikka6611968405146', NULL, '$2y$10$NtXsWvgI1czPszP514RRu.jPEbl5GRoLhfPnJMlPkd0gu3f0uPkRe', 'ICT', NULL, NULL, NULL, NULL, NULL, 1, 119, NULL, '2023-02-04 09:27:44', '2023-02-04 09:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salaries`
--

CREATE TABLE `teacher_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month_name` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_salaries`
--

INSERT INTO `teacher_salaries` (`id`, `month_name`, `amount`, `teacher_id`, `school_id`, `created_at`, `updated_at`) VALUES
(181, 'January', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(182, 'February', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(183, 'March', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(184, 'April', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(185, 'May', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(186, 'June', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(187, 'July', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(188, 'August', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(189, 'September', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(190, 'October', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(191, 'November', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(192, 'December', 0, 37, 106, '2022-09-21 06:32:39', '2022-09-21 06:32:39'),
(193, 'January', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(194, 'February', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(195, 'March', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(196, 'April', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(197, 'May', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(198, 'June', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(199, 'July', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(200, 'August', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(201, 'September', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(202, 'October', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(203, 'November', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(204, 'December', 0, 38, 106, '2022-09-21 07:01:48', '2022-09-21 07:01:48'),
(205, 'January', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(206, 'February', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(207, 'March', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(208, 'April', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(209, 'May', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(210, 'June', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(211, 'July', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(212, 'August', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(213, 'September', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(214, 'October', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(215, 'November', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(216, 'December', 0, 39, 106, '2022-09-21 07:04:54', '2022-09-21 07:04:54'),
(217, 'January', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(218, 'February', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(219, 'March', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(220, 'April', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(221, 'May', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(222, 'June', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(223, 'July', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(224, 'August', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(225, 'September', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(226, 'October', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(227, 'November', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(228, 'December', 0, 40, 102, '2022-09-21 10:34:18', '2022-09-21 10:34:18'),
(229, 'January', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(230, 'February', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(231, 'March', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(232, 'April', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(233, 'May', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(234, 'June', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(235, 'July', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(236, 'August', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(237, 'September', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(238, 'October', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(239, 'November', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(240, 'December', 0, 41, 102, '2022-09-21 11:17:56', '2022-09-21 11:17:56'),
(241, 'January', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(242, 'February', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(243, 'March', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(244, 'April', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(245, 'May', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(246, 'June', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(247, 'July', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(248, 'August', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(249, 'September', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(250, 'October', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(251, 'November', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(252, 'December', 0, 42, 102, '2022-09-21 12:10:24', '2022-09-21 12:10:24'),
(253, 'January', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(254, 'February', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(255, 'March', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(256, 'April', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(257, 'May', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(258, 'June', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(259, 'July', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(260, 'August', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(261, 'September', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(262, 'October', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(263, 'November', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(264, 'December', 0, 43, 118, '2022-11-17 10:39:51', '2022-11-17 10:39:51'),
(265, 'January', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(266, 'February', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(267, 'March', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(268, 'April', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(269, 'May', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(270, 'June', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(271, 'July', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(272, 'August', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(273, 'September', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(274, 'October', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(275, 'November', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(276, 'December', 0, 44, 118, '2022-11-17 11:57:44', '2022-11-17 11:57:44'),
(277, 'January', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(278, 'February', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(279, 'March', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(280, 'April', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(281, 'May', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(282, 'June', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(283, 'July', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(284, 'August', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(285, 'September', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(286, 'October', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(287, 'November', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(288, 'December', 0, 45, 119, '2022-11-19 06:08:18', '2022-11-19 06:08:18'),
(289, 'January', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(290, 'February', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(291, 'March', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(292, 'April', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(293, 'May', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(294, 'June', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(295, 'July', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(296, 'August', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(297, 'September', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(298, 'October', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(299, 'November', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(300, 'December', 0, 46, 119, '2022-11-19 06:11:52', '2022-11-19 06:11:52'),
(301, 'January', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(302, 'February', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(303, 'March', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(304, 'April', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(305, 'May', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(306, 'June', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(307, 'July', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(308, 'August', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(309, 'September', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(310, 'October', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(311, 'November', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(312, 'December', 0, 48, 119, '2022-11-19 06:17:45', '2022-11-19 06:17:45'),
(313, 'January', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(314, 'February', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(315, 'March', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(316, 'April', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(317, 'May', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(318, 'June', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(319, 'July', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(320, 'August', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(321, 'September', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(322, 'October', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(323, 'November', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(324, 'December', 0, 49, 119, '2022-11-19 06:19:17', '2022-11-19 06:19:17'),
(325, 'January', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(326, 'February', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(327, 'March', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(328, 'April', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(329, 'May', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(330, 'June', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(331, 'July', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(332, 'August', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(333, 'September', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(334, 'October', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(335, 'November', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(336, 'December', 0, 50, 119, '2022-11-19 06:20:26', '2022-11-19 06:20:26'),
(337, 'January', 100000, 52, 119, '2022-11-19 06:28:05', '2022-12-08 07:11:21'),
(338, 'February', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(339, 'March', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(340, 'April', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(341, 'May', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(342, 'June', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(343, 'July', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(344, 'August', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(345, 'September', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(346, 'October', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(347, 'November', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(348, 'December', 0, 52, 119, '2022-11-19 06:28:05', '2022-11-19 06:28:05'),
(361, 'January', 100000, 54, 119, '2022-11-20 08:52:32', '2022-12-08 07:11:38'),
(362, 'February', 0, 54, 119, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(363, 'March', 0, 54, 119, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(364, 'April', 0, 54, 119, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(365, 'May', 0, 54, 119, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(366, 'June', 0, 54, 119, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(367, 'July', 50000, 54, 119, '2022-11-20 08:52:32', '2022-12-08 07:10:52'),
(368, 'August', 0, 54, 119, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(369, 'September', 0, 54, 119, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(370, 'October', 0, 54, 119, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(371, 'November', 0, 54, 119, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(372, 'December', 0, 54, 119, '2022-11-20 08:52:32', '2022-11-20 08:52:32'),
(373, 'January', 0, 55, 119, '2022-11-20 08:54:01', '2022-11-20 08:54:01'),
(374, 'February', 0, 55, 119, '2022-11-20 08:54:01', '2022-11-20 08:54:01'),
(375, 'March', 0, 55, 119, '2022-11-20 08:54:01', '2022-11-20 08:54:01'),
(376, 'April', 0, 55, 119, '2022-11-20 08:54:01', '2022-11-20 08:54:01'),
(377, 'May', 0, 55, 119, '2022-11-20 08:54:01', '2022-11-20 08:54:01'),
(378, 'June', 0, 55, 119, '2022-11-20 08:54:01', '2022-11-20 08:54:01'),
(379, 'July', 0, 55, 119, '2022-11-20 08:54:01', '2022-11-20 08:54:01'),
(380, 'August', 0, 55, 119, '2022-11-20 08:54:01', '2022-11-20 08:54:01'),
(381, 'September', 10000, 55, 119, '2022-11-20 08:54:01', '2023-02-04 10:18:33'),
(382, 'October', 10000, 55, 119, '2022-11-20 08:54:01', '2023-02-04 10:18:16'),
(383, 'November', 0, 55, 119, '2022-11-20 08:54:01', '2022-11-20 08:54:01'),
(384, 'December', 10000, 55, 119, '2022-11-20 08:54:01', '2023-02-04 10:18:58'),
(385, 'January', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(386, 'February', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(387, 'March', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(388, 'April', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(389, 'May', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(390, 'June', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(391, 'July', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(392, 'August', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(393, 'September', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(394, 'October', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(395, 'November', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(396, 'December', 0, 56, 119, '2022-11-20 08:54:47', '2022-11-20 08:54:47'),
(397, 'January', 0, 58, 119, '2022-11-20 11:15:04', '2022-11-20 11:15:04'),
(398, 'February', 0, 58, 119, '2022-11-20 11:15:04', '2022-11-20 11:15:04'),
(399, 'March', 0, 58, 119, '2022-11-20 11:15:04', '2022-11-20 11:15:04'),
(400, 'April', 0, 58, 119, '2022-11-20 11:15:04', '2022-11-20 11:15:04'),
(401, 'May', 0, 58, 119, '2022-11-20 11:15:04', '2022-11-20 11:15:04'),
(402, 'June', 0, 58, 119, '2022-11-20 11:15:04', '2022-11-20 11:15:04'),
(403, 'July', 0, 58, 119, '2022-11-20 11:15:04', '2022-11-20 11:15:04'),
(404, 'August', 0, 58, 119, '2022-11-20 11:15:04', '2022-11-20 11:15:04'),
(405, 'September', 0, 58, 119, '2022-11-20 11:15:05', '2022-11-20 11:15:05'),
(406, 'October', 0, 58, 119, '2022-11-20 11:15:05', '2022-11-20 11:15:05'),
(407, 'November', 100, 58, 119, '2022-11-20 11:15:05', '2022-11-21 05:56:30'),
(408, 'December', 0, 58, 119, '2022-11-20 11:15:05', '2022-11-20 11:15:05'),
(409, 'January', 100, 59, 119, '2022-11-20 12:46:05', '2022-11-21 05:55:30'),
(410, 'February', 100, 59, 119, '2022-11-20 12:46:05', '2022-11-21 05:57:03'),
(411, 'March', 100, 59, 119, '2022-11-20 12:46:05', '2022-11-21 05:57:18'),
(412, 'April', 100, 59, 119, '2022-11-20 12:46:05', '2022-11-21 05:57:27'),
(413, 'May', 0, 59, 119, '2022-11-20 12:46:05', '2022-11-20 12:46:05'),
(414, 'June', 0, 59, 119, '2022-11-20 12:46:05', '2022-11-20 12:46:05'),
(415, 'July', 0, 59, 119, '2022-11-20 12:46:05', '2022-11-20 12:46:05'),
(416, 'August', 0, 59, 119, '2022-11-20 12:46:05', '2022-11-20 12:46:05'),
(417, 'September', 0, 59, 119, '2022-11-20 12:46:05', '2022-11-20 12:46:05'),
(418, 'October', 0, 59, 119, '2022-11-20 12:46:05', '2022-11-20 12:46:05'),
(419, 'November', 0, 59, 119, '2022-11-20 12:46:05', '2022-11-20 12:46:05'),
(420, 'December', 0, 59, 119, '2022-11-20 12:46:05', '2022-11-20 12:46:05'),
(421, 'January', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(422, 'February', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(423, 'March', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(424, 'April', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(425, 'May', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(426, 'June', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(427, 'July', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(428, 'August', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(429, 'September', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(430, 'October', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(431, 'November', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(432, 'December', 0, 60, 119, '2022-12-08 09:42:59', '2022-12-08 09:42:59'),
(433, 'January', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(434, 'February', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(435, 'March', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(436, 'April', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(437, 'May', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(438, 'June', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(439, 'July', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(440, 'August', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(441, 'September', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(442, 'October', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(443, 'November', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(444, 'December', 0, 61, 119, '2023-02-04 08:16:48', '2023-02-04 08:16:48'),
(505, 'January', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(506, 'February', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(507, 'March', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(508, 'April', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(509, 'May', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(510, 'June', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(511, 'July', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(512, 'August', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(513, 'September', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(514, 'October', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(515, 'November', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44'),
(516, 'December', 0, 67, 119, '2023-02-04 09:27:44', '2023-02-04 09:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `term_name` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `term_name`, `active`, `school_id`, `created_at`, `updated_at`) VALUES
(10, 'Final Term', '1', 119, '2022-11-19 07:29:30', '2022-11-20 05:36:22'),
(12, 'Mid Term', '1', 119, '2022-11-19 07:30:14', '2022-11-20 05:36:38'),
(13, 'First Term', '1', 119, '2022-11-20 05:36:58', '2022-11-20 05:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `todolists`
--

CREATE TABLE `todolists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 3,
  `assign_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todolists`
--

INSERT INTO `todolists` (`id`, `task_name`, `date`, `priority`, `assign_teacher_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(7, 'result published', '2023-02-06', 1, 69, 67, '2023-02-05 09:14:21', '2023-02-05 09:14:21'),
(8, 'take class of class 9 section A', '2023-02-20', 1, 53, 52, '2023-02-19 04:59:41', '2023-02-19 04:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `transections`
--

CREATE TABLE `transections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purpose` varchar(255) NOT NULL,
  `payment_method` tinyint(4) NOT NULL,
  `amount` double NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remark` varchar(255) DEFAULT NULL,
  `datee` timestamp NOT NULL DEFAULT current_timestamp(),
  `school_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transections`
--

INSERT INTO `transections` (`id`, `created_at`, `updated_at`, `purpose`, `payment_method`, `amount`, `name`, `type`, `status`, `remark`, `datee`, `school_id`) VALUES
(1, '2023-02-12 07:41:57', '2023-02-12 07:45:08', 'Buy Table', 2, 10000, 'tahmid Turjo', 1, 1, 'dfghj', '2023-02-11 18:00:00', 119),
(2, '2023-02-12 07:46:26', '2023-02-12 07:46:26', 'laptop', 2, 3000000, 'Health insurance company ltd.', 2, 1, NULL, '2023-02-10 18:00:00', 119),
(3, '2023-02-15 12:02:24', '2023-02-15 12:02:24', 'water for office', 1, 10000, 'tahmid Turjo', 1, 1, 'azsxdcfvgbhnjmkl', '2023-02-14 18:00:00', 119),
(4, '2023-02-15 12:03:27', '2023-02-15 12:03:27', 'mobile', 2, 2345600, 'sdefrg', 2, 1, 'azsxdcfvgbnhqwerty', '2023-02-14 18:00:00', 119),
(5, '2023-02-22 11:22:49', '2023-02-22 11:22:49', 'Buy mouse', 1, 350, 'Nobin', 1, 1, 'lagbe na.', '2023-02-21 18:00:00', 119),
(6, '2023-02-22 11:23:41', '2023-02-22 11:23:41', 'keyboard', 1, 550, 'sazzad', 1, 1, NULL, '2023-02-21 18:00:00', 119),
(7, '2023-02-22 11:26:33', '2023-02-22 12:50:21', 'New laptop', 1, 60000, 'majidul islam', 1, 1, 'asdf', '2023-01-15 18:00:00', 119),
(8, '2023-02-22 11:52:46', '2023-02-22 11:52:46', 'price giving ceremony.', 1, 20000, 'Shariar', 2, 1, 'asdfgh', '2023-02-21 18:00:00', 119),
(10, '2023-02-22 13:15:28', '2023-02-22 13:15:28', 'buy new book.', 1, 10000, 'abcd', 2, 1, NULL, '2023-01-23 18:00:00', 119),
(11, '2023-02-22 13:16:00', '2023-02-22 13:16:00', 'asasd', 2, 3000000, 'asdasas', 2, 1, 'asdasdas', '2023-01-20 18:00:00', 119),
(13, '2023-02-25 04:51:40', '2023-02-25 04:51:40', 'mobile', 1, 20000, 'turzo', 1, 1, NULL, '2023-02-24 18:00:00', 119);

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_info` varchar(255) NOT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `page_info`, `link`, `created_at`, `updated_at`) VALUES
(1, 'class-show', 'GvsgJTFUJq0', '2022-01-02 23:53:01', '2022-01-02 23:53:01'),
(2, 'section-show', 'F6iAQz7wQdM', '2022-01-03 00:11:59', '2022-01-03 00:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `roll_number` varchar(191) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `parents_name` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `roll_number`, `dob`, `gender`, `blood_group`, `parents_name`, `image`, `address`, `email_verified_at`, `password`, `class_id`, `section_id`, `group_id`, `school_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(51, 'iuewyfiewb1', 'hfdsfwlak@mail.com', '89765', '823649', '2022-08-30', 'Male', 'B-', 'Abdul Mannan', 'profile/img/2033956411.png', 'Kamarpara, sector-10, Uttara, Dhaka', NULL, '$2y$10$TZYnkXKgmVGBdUsWTeMdkuGyDQqzu1vBm9H1daEEx6viNeQwRluGG', 709, 1416, NULL, 102, NULL, '2022-09-20 13:14:36', '2022-09-20 13:14:36'),
(52, 'Antor Islam', 'antor@gmail.com', '01940204051', '567', '1970-01-16', 'Male', 'B+', 'Riaz Uddin', 'profile/img/495537890.jpeg', 'Kamarpara, sector-10, Uttara, Dhaka\r\nKamarpara, sector-10, Uttara, Dhaka', NULL, '$2y$10$MmZIi68f4loWxoTnHMaqJedVtKyrBv7WhVNFFgzqF0EDQY.az7R2G', 706, 1413, NULL, 102, NULL, '2022-09-21 06:45:26', '2022-09-21 06:45:26'),
(54, 'Rakibul Islam', 'rakib@gmail.com', '01862342459', '54', '2001-12-13', 'Male', 'O+', 'Abdul Mannan', 'profile/img/868452231.jpg', 'Sonagazi, Feni', NULL, '$2y$10$30/zRWCkHuQ.is0uwjk1pOtMnSYbU8DlxNF73fQnUoUG.EzXuT3ui', 715, 1422, NULL, 102, NULL, '2022-09-24 09:24:58', '2022-09-24 11:20:09'),
(55, 'MD Alauddin', 'alauddin@mail.com', '01533448761', '132', '2001-03-10', 'Male', 'AB-', 'Abdur Rouf', 'profile/img/1662980138.png', 'Unknown', NULL, '$2y$10$znbPxk.MgKMJKCnquM6zDemcix8VR95zre6kAlaNchqkKcIYysXvG', 713, 1420, NULL, 102, NULL, '2022-09-24 11:08:16', '2022-09-24 11:08:16'),
(56, 'hasina', 'mojibkaka@gmail.com', '01001100011', '103', '1996-06-14', 'Female', 'B+', 'mojub kaka', 'profile/img/1440420349.png', 'USA, bangladesh.', NULL, '$2y$10$f5Ccb5Vw2N1YyiIJMzzGuuQEbLUCJwUMCbpaEzcTT.jkyuSoYtywq', 785, 1492, NULL, 118, NULL, '2022-11-17 12:23:58', '2022-11-17 12:23:58'),
(57, 'rehana', 'mojibkaka2@gmail.com', '01001100110', '104', '1996-06-07', 'Male', 'A+', 'mojub kaka', 'profile/img/1379071277.png', 'UK, Bangladesh.', NULL, '$2y$10$WKSFWU3PsLfStQfKnfbeWOyh7wAMReH1YXdIroc6a30FW/1w8KOVK', 785, 1492, NULL, 118, NULL, '2022-11-17 12:28:39', '2022-11-17 12:28:39'),
(58, 'kamal', 'mojibkaka1@gmail.com', '01001100111', '101', '2022-11-10', 'Male', 'A-', 'mojub kaka', 'profile/img/625514394.png', 'tongipara, gopalgong.', NULL, '$2y$10$MZAR2g9XDnFDh8Z9ozkB5.ecQtMSVlBdPdX7p5.8SZhCwBEGz5DU.', 785, 1492, NULL, 118, NULL, '2022-11-17 12:34:39', '2022-11-17 12:34:39'),
(59, 'jamal', 'mojibkaka3@gmail.com', '01556644556', '102', '2022-11-17', 'Male', 'B-', 'mojub kaka', 'profile/img/799287098.png', 'tongipara, gopalgong.', NULL, '$2y$10$TsAuhpOjyMQQdjpvMMpA8eDERBjIQLfwYjqp6RL9eZI/csgcP.6dq', 785, 1492, NULL, 118, NULL, '2022-11-17 12:37:56', '2022-11-17 12:37:56'),
(60, 'roll one', 'roll1@gmail.com', '01000000001', '1', '2000-07-15', 'Male', 'A+', 'roll one parent', 'profile/img/308063273.jpg', 'asdfghjkl', NULL, '$2y$10$6GWHL2VEmNHp9jD1J3mT9ORhQmNIkSP8RctJrOEuMpjsTiQi2ywn6', 804, 1513, 34, 119, NULL, '2022-11-19 06:35:50', '2022-12-08 12:41:22'),
(62, 'roll two', 'roll92@gmail.com', '01000000092', '02', '1998-01-01', 'Male', 'A+', 'roll two', 'profile/img/171669696.jpg', 'asdf', NULL, '$2y$10$UB0xBQ9ZyeCAXwn19Kdid.ZojLDt6dwntNOvwqHYncJOSjCkLPHmK', 804, 1513, 34, 119, NULL, '2022-11-19 06:46:05', '2022-12-08 12:41:44'),
(63, 'roll three', 'roll923@gmail.com', '01000000923', '03', '2022-11-19', 'Male', 'O-', 'roll three parent', 'profile/img/731027858.jpeg', 'asdfg', NULL, '$2y$10$VQzVFsiPq4vr4KVBddD75.U1HukW1VA.lhwNCYT8Xn7b4Ryq9W2IK', 804, 1513, 34, 119, NULL, '2022-11-19 06:50:48', '2022-12-08 12:42:54'),
(64, 'roll four', 'roll924@gmail.com', '01000000924', '150018', '1999-01-01', 'Male', 'O-', 'roll four parents', 'profile/img/1171058849.jpg', 'asef', NULL, '$2y$10$n6PWkD9RKiRHIJFVBrWkr.M4Ft.OEba5jiOg01sk2cqC0QZw/zOfa', 804, 1513, 34, 119, NULL, '2022-11-19 06:53:22', '2022-12-08 12:48:31'),
(65, 'Shakil', 'Shakil@gmail.com', '01568405147', '501', '2022-11-15', 'Male', 'O-', 'asdtfghk', 'profile/img/1526274144.png', 'fghjkjkll;', NULL, '$2y$10$ggiKOLRvUf80eNOnI9yPf.71PVOBCIk8ZvW/FySQTeK0txOCHV90a', 805, 1514, NULL, 119, NULL, '2022-11-19 06:55:59', '2022-11-19 06:55:59'),
(66, 'mominul', 'email.gmail.com', '01000000501', '150015', '2022-11-10', 'Male', 'O+', 'mojub kaka', 'profile/img/83171114.png', 'asdfv', NULL, '$2y$10$7gObuDQZ6Cq4tZhxJzkHbOo5w.TCtE7MOvSUbfs3RD4QxT4AFcnnS', 804, 1513, 34, 119, NULL, '2022-11-19 06:59:43', '2022-12-08 12:44:02'),
(67, 'Azad', 'Azad@gmail.com', '01568402515', '502', '2022-11-16', 'Male', 'O+', 'ghi', 'profile/img/663144354.png', 'ghjokl', NULL, '$2y$10$PthtdBYUS9uQP9zAMEl15uYzxTjj3We32Q6Hl8ax4Y4hTh5YXkp2K', 805, 1514, NULL, 119, NULL, '2022-11-19 07:00:50', '2022-11-19 07:00:50'),
(68, 'rahat', 'aatesyrtuiyo', '4654151465451', '503', '2022-11-21', 'Male', 'O+', 'tfgyikg', 'profile/img/1055699701.png', 'sadfghjkl;j\'', NULL, '$2y$10$6pQgjIamv3fUEQESDBpJeOqskSdSXkAdOAcjagCLOpRezxlAxtjZC', 805, 1514, NULL, 119, NULL, '2022-11-19 07:01:24', '2022-11-19 07:01:24'),
(69, 'Rumon', 'fastdjdkjhlkk', '01568405148', '504', '2022-11-22', 'Male', 'O+', 'hjkkj', 'profile/img/797486156.png', 'fghjkl;\'', NULL, '$2y$10$d4XOtlHFsI32T3hRTP0iUOQP4dbNA2QGKB1JmGngazIENGk4HIXpa', 805, 1514, NULL, 119, NULL, '2022-11-19 07:02:03', '2022-11-19 07:02:03'),
(70, 'Shahinul', 'asdfghjlk;l', '01568405152', '505', '2022-11-30', 'Male', 'O+', 'atsyruiuoio', 'profile/img/1764327115.png', 'sdfgdtfygu', NULL, '$2y$10$K3GEsgSXCLzFjG7dKToNG.Vkf1akPW5.NrLeVafZUvJjZKnf75/GG', 805, 1514, NULL, 119, NULL, '2022-11-19 07:03:14', '2022-11-19 07:03:14'),
(71, 'mahafujur Rahman', 'ads@gmail.com', '123456', '150016', '2022-11-14', 'Male', 'A-', 'sdfghjk', 'profile/img/2036217170.jpg', 'wert', NULL, '$2y$10$nywerf6oPRufRKxiQvW0m.yy.Gc98wYIro07szLOxWwYmaR93c6bq', 804, 1513, 34, 119, NULL, '2022-11-19 07:03:39', '2022-12-08 12:45:49'),
(72, 'Riad', 'sdrfghjk;l\';\'', '01568405153', '506', '2022-11-21', 'Male', 'O+', 'dfsdfgjkhjlk', 'profile/img/894242979.png', 'dsfjkl;\';', NULL, '$2y$10$8hWJWzvk9AB7dXfHO7kAQecDOFiCDTxG9jH2VltXoyjlw28B7MQxe', 805, 1514, NULL, 119, NULL, '2022-11-19 07:03:50', '2022-11-19 07:03:50'),
(73, 'raju', 'rsdtgkuih', '01568405156', '507', '2022-11-08', 'Male', 'B-', 'rdfyiui', 'profile/img/1103933256.png', 'rtyguhijokpl;', NULL, '$2y$10$9ecZRI0/J8T.zydDQ2..SODoHFZjdhXpnPVHxL8V9HwNuNSwu4WTi', 805, 1514, NULL, 119, NULL, '2022-11-19 07:04:25', '2022-11-19 07:04:25'),
(74, 'shahadat', 'sdf@gmail.com', 'asfgh', '150017', '1996-06-07', 'Male', 'B+', 'mojub kaka', 'profile/img/1621264282.jpg', 'sdfghjkl', NULL, '$2y$10$1cObDiHT6visD9sxu3jcJeJzhVLQ7V2aJkWqXZWbl5wS56C4Otjau', 804, 1513, 34, 119, NULL, '2022-11-19 07:04:27', '2022-12-08 12:46:23'),
(75, 'Arif', 'dsfjkl;\'', '01568405157', '508', '2022-11-17', 'Male', 'O+', 'fdghfkl;l\';', 'profile/img/490916917.png', 'dgjuhkijkl', NULL, '$2y$10$tV6ZmPaBoXDo4HVPoVrP9OhbPmAoc9M86j4mWHEjb5FDumIWVbl2m', 805, 1514, NULL, 119, NULL, '2022-11-19 07:05:03', '2022-11-19 07:05:03'),
(76, 'Hridoy', 'sdfyguhijokl', '01568405158', '509', '2022-11-21', 'Male', 'O+', 'dfgfhjkk', 'profile/img/993728136.png', 'adertyukl;', NULL, '$2y$10$WlTyfV1DXNQRDVLhYIGVAuSL0FVGcKFdqB1zfxqyjeISebu6Sp5lS', 805, 1514, NULL, 119, NULL, '2022-11-19 07:05:55', '2022-11-19 07:05:55'),
(77, 'Fakhrul', 'rtyuil;kl\';\\\'', '01568405159', '510', '2022-11-26', 'Male', 'O+', 'fsdfyguhjl;k;l;', 'profile/img/1955991580.png', 'sdafghjkl;l', NULL, '$2y$10$S.bAJEQ8tzlY8MASmeY1auFFSP9mfhAFOaPz0QBx1GRh.YE4joQhK', 805, 1514, NULL, 119, NULL, '2022-11-19 07:06:41', '2022-11-19 07:06:41'),
(78, 'Zahirul Islam', 'zahirulislam15@gmail.com', '01568347144', '150019', '2022-11-10', 'Male', 'A+', 'rtyu', 'profile/img/212160928.png', 'xdcfvbnm,.', NULL, '$2y$10$6NFGkpWGA2r7xy8HG8bHcOlu.Zt89qSm7nULQUt6RuNJzHABZ1byO', 804, 1513, 34, 119, NULL, '2022-11-20 11:38:19', '2022-12-08 12:50:04'),
(79, 'Zahir test', 'zahirulislam15@gmail.com', '01568347144', '699', '1996-06-14', 'Male', 'B+', 'sdfghjk', 'profile/img/979072625.jpeg', 'dcfvghj', NULL, '$2y$10$LmYije4Pq6UeJXQTdMIIh.3M1WJDPPJjCvSAf9IGCEKTmWhRwtdZ6', 805, 1514, 39, 119, NULL, '2022-11-20 11:40:50', '2022-11-20 11:40:50'),
(80, 'shariar islam sa', 'zahirulislam15@gmail.com', '01568347144', '100', '1996-06-14', 'Male', 'B+', 'sdfghjk', 'profile/img/639997397.jpeg', 'asdfghj', NULL, '$2y$10$8P.W4sGqkImpm/8OyH212OxFWp8IDCh7L/thfbO96qAcLxDYtyTYS', 804, 1513, 34, 119, NULL, '2022-11-20 11:46:30', '2022-12-08 12:40:46'),
(81, 'test 3', 'zahirulislam15@gmail.com', '01568347144', '15', '1996-06-14', 'Male', 'A-', 'mojub kaka', 'profile/img/2981263.jpeg', 'asd', NULL, '$2y$10$aBg9kOZoE39dfDMskM9b.OGgFO5stS3yK06P6KLj8rsrYrUTFtnwi', 804, 1517, 41, 119, NULL, '2022-11-20 12:42:19', '2022-11-20 12:42:19'),
(82, 'Zahirul Islam wert', 'zahirulislam15@gmail.com', '01568347144', '23', '1996-06-14', 'Male', 'O+', 'mojub kaka', 'profile/img/257131990.jpeg', '726asdfg', NULL, '$2y$10$WnkBlLWh6vxrqumccte0aOraXuXam9j97eqWnVKTOncDf.lV80tSm', 804, 1517, 41, 119, NULL, '2022-11-20 12:42:59', '2022-11-20 12:42:59'),
(83, 'Zahirul Islamasdfgh', 'zahirulislam15@gmail.com', '01568347144', '4567', '1996-06-14', 'Male', 'B+', 'mojub kaka', 'profile/img/2022543838.jpg', '726asdfghj', NULL, '$2y$10$EZux7IWYMtvl2TigGn4WFeXIkdDViYo2gQVbKFE6iI2bv8fVP.OUC', 804, 1517, 41, 119, NULL, '2022-11-20 12:44:09', '2022-11-20 12:44:09'),
(84, 'sdf', 'zahirulislam15@gmail.com', '01568347144', '1', '2022-11-10', 'Male', 'A-', 'mojub kaka', 'profile/img/1514479489.jpg', 'zxcv', NULL, '$2y$10$OfZjxhv5vve2jGGOndun4eaLSbBBl8jpyFw6OorPVcD5FmUBFsKXe', 802, 1511, NULL, 119, NULL, '2022-11-21 05:15:28', '2022-11-21 05:15:28'),
(85, 'abdul korim', 'zahirulislam02@gmail.com', '01568347144', '2', '2022-11-10', 'Male', 'B-', 'mojub kaka', 'profile/img/2071951644.jpeg', '726gfh', NULL, '$2y$10$fOoOGH/tSbU1pxlTIJ7fx.xD1ST6XbQU2pDDtbTaabJ1RY/7ofZNa', 802, 1511, NULL, 119, NULL, '2022-11-21 05:16:03', '2022-12-08 12:20:47'),
(86, 'fg', 'zahirulislam15@gmail.com', '01568347144', '3', '1996-06-14', 'Male', 'A+', 'mojub kaka', 'profile/img/1532403711.png', '726erdgf', NULL, '$2y$10$1JMIhOsRLVBn55XpUcszIOGT9Da5DwQSzDYllFLNAefL/O78i315i', 802, 1511, NULL, 119, NULL, '2022-11-21 05:16:36', '2022-11-21 05:16:36'),
(87, 'Zahirul Islam', 'zahirulislam15@gmail.com', '01568347144', '4', '1996-06-14', 'Male', 'A+', 'mojub kaka', 'profile/img/1959501154.webp', '726f', NULL, '$2y$10$TZWQR0t9LLaj/V.zXuO/ZuQxFuQtbK4GTzaCLTo13/av10CH3Iw0W', 802, 1511, NULL, 119, NULL, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(88, 'Zahirul Islam', 'zahirulislam15@gmail.com', '01568347144', '4', '1996-06-14', 'Male', 'A+', 'mojub kaka', 'profile/img/1686558883.webp', '726f', NULL, '$2y$10$AJ69/TKTumcaGN9kMtOmvuVSxswW3u9gnpfdRwZAlPMTm.Gd2k6bO', 802, 1511, NULL, 119, NULL, '2022-11-21 05:17:15', '2022-11-21 05:17:15'),
(89, 'Zahirul Islam zahir', 'zahirulislam15@gmail.com', '01568347144', '5', '2022-11-10', 'Male', 'A-', 'mojub kaka', 'profile/img/1630016779.jpg', '726 sfdgg', NULL, '$2y$10$2cJqhknGed0Oe6X.AixqT.l6SUeaIDrPIZ3gLFvQ7kLVxjQeBV9Ya', 802, 1511, NULL, 119, NULL, '2022-11-21 05:21:06', '2022-11-21 05:21:06'),
(90, 'student 100', 'student100@test.com', '10000000001', '1001', '2001-03-10', 'Male', 'B-', 'parents 100', 'profile/img/1382470814.jpeg', 'student 100', NULL, '$2y$10$DSAZrhl1yr8OAGXh/775cOJ8/vN3nZ51CDLusBiZ8BcyM.xk4HNi2', 714, 1421, NULL, 102, NULL, '2022-11-21 06:51:47', '2022-11-21 06:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `birth_certificate_no` varchar(255) DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `vaccine` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id`, `birth_certificate_no`, `student_id`, `vaccine`, `created_at`, `updated_at`) VALUES
(9, '12345678909876543', 78, 3, '2023-02-04 10:10:42', '2023-02-04 10:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_teachers`
--

CREATE TABLE `vaccine_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `birth_certificate_no` varchar(255) DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `vaccine` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workplace_infos`
--

CREATE TABLE `workplace_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_name` varchar(255) DEFAULT NULL,
  `student` varchar(255) DEFAULT NULL,
  `teachers` varchar(255) DEFAULT NULL,
  `hear_us` varchar(255) DEFAULT NULL,
  `price_id` int(11) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workplace_infos`
--

INSERT INTO `workplace_infos` (`id`, `workspace_name`, `student`, `teachers`, `hear_us`, `price_id`, `school_id`, `created_at`, `updated_at`) VALUES
(55, 'Boktermunshi MH High School', '1-150', '1-150', 'Facebook Ads', 0, 102, '2022-09-20 10:11:02', '2022-09-20 10:11:06'),
(56, 'Kamarpara School', '1-250', '1-50', 'Search Engine (Google,Bing,etc)', 2, 103, '2022-09-20 10:44:29', '2022-09-20 11:18:15'),
(57, 'Milestone School', '1-250', '1-25', 'Search Engine (Google,Bing,etc)', 0, 104, '2022-09-20 14:15:44', '2022-09-20 14:15:47'),
(58, 'JP High School', '1-250', '1-25', 'Search Engine (Google,Bing,etc)', 0, 106, '2022-09-21 06:23:41', '2022-09-21 06:23:48'),
(59, 'Ronju Sorkar Boos', '1-25', '1-50', 'Search Engine (Google,Bing,etc)', NULL, 108, '2022-09-22 18:00:29', '2022-09-22 18:00:29'),
(60, 'Ronju Sorkar Boos', '1-100', '1-100', 'Google Ads', 0, 108, '2022-09-22 18:02:59', '2022-09-22 18:03:27'),
(61, 'Nurmim', '1-50', '1-50', 'Search Engine (Google,Bing,etc)', 3, 109, '2022-09-29 11:48:18', '2022-09-29 11:48:33'),
(62, 'codecell international school', '250-5000', '1-25', 'Others', 2, 118, '2022-11-17 10:16:35', '2022-11-17 12:00:04'),
(63, 'codecell international school and college', '250-5000', '1-100', 'Others', 4, 119, '2022-11-19 05:55:51', '2022-11-19 06:07:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acquisitions`
--
ALTER TABLE `acquisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_students`
--
ALTER TABLE `assignment_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_students_assignment_teachers_id_foreign` (`assignment_teachers_id`),
  ADD KEY `assignment_students_user_id_foreign` (`user_id`);

--
-- Indexes for table `assignment_teachers`
--
ALTER TABLE `assignment_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_teachers_teacher_id_foreign` (`teacher_id`),
  ADD KEY `assignment_teachers_class_id_foreign` (`class_id`),
  ADD KEY `assignment_teachers_section_id_foreign` (`section_id`);

--
-- Indexes for table `assign_teachers`
--
ALTER TABLE `assign_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_teachers_school_id_foreign` (`school_id`),
  ADD KEY `assign_teachers_class_id_foreign` (`class_id`),
  ADD KEY `assign_teachers_section_id_foreign` (`section_id`),
  ADD KEY `assign_teachers_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`),
  ADD KEY `attendances_class_id_foreign` (`class_id`),
  ADD KEY `attendances_section_id_foreign` (`section_id`),
  ADD KEY `attendances_school_id_foreign` (`school_id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkouts_school_id_foreign` (`school_id`);

--
-- Indexes for table `common_classes`
--
ALTER TABLE `common_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_subjects`
--
ALTER TABLE `common_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_school_id_foreign` (`school_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `employees_employee_id_unique` (`employee_id`),
  ADD KEY `employees_school_id_foreign` (`school_id`);

--
-- Indexes for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_salaries_employee_id_foreign` (`employee_id`),
  ADD KEY `employee_salaries_school_id_foreign` (`school_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feature_details_pages`
--
ALTER TABLE `feature_details_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_menus`
--
ALTER TABLE `feature_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_class_id_foreign` (`class_id`),
  ADD KEY `groups_school_id_foreign` (`school_id`);

--
-- Indexes for table `institute_classes`
--
ALTER TABLE `institute_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `institute_classes_school_id_foreign` (`school_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_school_id_foreign` (`school_id`);

--
-- Indexes for table `message_packages`
--
ALTER TABLE `message_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notices_school_id_foreign` (`school_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `otps_otp_unique` (`otp`),
  ADD KEY `otps_school_id_foreign` (`school_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_school_id_foreign` (`school_id`),
  ADD KEY `results_student_id_foreign` (`student_id`),
  ADD KEY `results_subject_id_foreign` (`subject_id`),
  ADD KEY `results_term_id_foreign` (`term_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_email_unique` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `school_checkouts`
--
ALTER TABLE `school_checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_checkouts_school_id_foreign` (`school_id`);

--
-- Indexes for table `school_fees`
--
ALTER TABLE `school_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_fees_school_id_foreign` (`school_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_class_id_foreign` (`class_id`),
  ADD KEY `sections_school_id_foreign` (`school_id`);

--
-- Indexes for table `staff_types`
--
ALTER TABLE `staff_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_types_school_id_foreign` (`school_id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_fees_class_id_foreign` (`class_id`),
  ADD KEY `student_fees_school_id_foreign` (`school_id`);

--
-- Indexes for table `student_monthly_fees`
--
ALTER TABLE `student_monthly_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_monthly_fees_student_id_foreign` (`student_id`),
  ADD KEY `student_monthly_fees_school_id_foreign` (`school_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_class_id_foreign` (`class_id`),
  ADD KEY `subjects_section_id_foreign` (`section_id`),
  ADD KEY `subjects_school_id_foreign` (`school_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_school_id_foreign` (`school_id`);

--
-- Indexes for table `teacher_salaries`
--
ALTER TABLE `teacher_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_salaries_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_salaries_school_id_foreign` (`school_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_school_id_foreign` (`school_id`);

--
-- Indexes for table `todolists`
--
ALTER TABLE `todolists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todolists_assign_teacher_id_foreign` (`assign_teacher_id`),
  ADD KEY `todolists_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `transections`
--
ALTER TABLE `transections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transections_school_id_foreign` (`school_id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_class_id_foreign` (`class_id`),
  ADD KEY `users_section_id_foreign` (`section_id`),
  ADD KEY `users_school_id_foreign` (`school_id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccines_student_id_foreign` (`student_id`);

--
-- Indexes for table `vaccine_teachers`
--
ALTER TABLE `vaccine_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccine_teachers_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `workplace_infos`
--
ALTER TABLE `workplace_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workplace_infos_school_id_foreign` (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acquisitions`
--
ALTER TABLE `acquisitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment_students`
--
ALTER TABLE `assignment_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignment_teachers`
--
ALTER TABLE `assignment_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `assign_teachers`
--
ALTER TABLE `assign_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `common_classes`
--
ALTER TABLE `common_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `common_subjects`
--
ALTER TABLE `common_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1230;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_details_pages`
--
ALTER TABLE `feature_details_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feature_menus`
--
ALTER TABLE `feature_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `institute_classes`
--
ALTER TABLE `institute_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=814;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `message_packages`
--
ALTER TABLE `message_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `school_checkouts`
--
ALTER TABLE `school_checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `school_fees`
--
ALTER TABLE `school_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1527;

--
-- AUTO_INCREMENT for table `staff_types`
--
ALTER TABLE `staff_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_monthly_fees`
--
ALTER TABLE `student_monthly_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `teacher_salaries`
--
ALTER TABLE `teacher_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `todolists`
--
ALTER TABLE `todolists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transections`
--
ALTER TABLE `transections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vaccine_teachers`
--
ALTER TABLE `vaccine_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `workplace_infos`
--
ALTER TABLE `workplace_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment_students`
--
ALTER TABLE `assignment_students`
  ADD CONSTRAINT `assignment_students_assignment_teachers_id_foreign` FOREIGN KEY (`assignment_teachers_id`) REFERENCES `assignment_teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignment_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD CONSTRAINT `student_fees_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `institute_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_fees_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transections`
--
ALTER TABLE `transections`
  ADD CONSTRAINT `transections_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
