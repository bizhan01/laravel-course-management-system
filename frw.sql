-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 08:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frw`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clas`
--

CREATE TABLE `clas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clas`
--

INSERT INTO `clas` (`id`, `name`, `fee`, `discount`, `start_time`, `end_time`, `year`, `month`, `day`, `status`, `description`, `subject_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 'حساب صبحگاهی', 250, NULL, '06:21:00', '07:21:00', '1402', 'جدی', '1', '0', NULL, 3, 2301, '2023-11-26 01:22:26', '2023-11-26 01:22:26'),
(2, 'کیمیا عضوی', 200, NULL, '01:23:00', '02:23:00', '1402', 'دلو', '1', '0', NULL, 6, 2303, '2023-11-26 01:23:18', '2023-11-26 01:23:18'),
(3, 'فزیک برق', 400, NULL, '03:23:00', '04:23:00', NULL, 'حمل', '1', '1', NULL, 5, 2304, '2023-11-26 01:23:52', '2023-11-26 01:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `class_infos`
--

CREATE TABLE `class_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `present` int(11) DEFAULT NULL,
  `absent` int(11) DEFAULT NULL,
  `score` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_infos`
--

INSERT INTO `class_infos` (`id`, `class_id`, `student_id`, `present`, `absent`, `score`, `created_at`, `updated_at`) VALUES
(2, 3, 230009, 0, 0, 40.00, '2023-11-26 01:33:15', '2023-11-26 01:38:32'),
(3, 3, 230002, 0, 0, 50.00, '2023-11-26 01:33:22', '2023-11-26 01:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tazkira` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fullName`, `position`, `dob`, `phone1`, `phone2`, `email`, `province1`, `district1`, `region1`, `province2`, `district2`, `region2`, `profileImage`, `tazkira`, `warranty`, `created_at`, `updated_at`) VALUES
(2301, 'کریم نوروزی', 'گارد', '1987-02-03', '(073) 453-4543', '(075) 353-4524', 'karim@gmail.com', 'غزنی', 'جغتو', 'سراب', 'کابل', 'ناحیه 13', 'دشت برچی', '2016627348.jpg', '1695754129.jpg', '133899433.jpg', '2023-11-26 01:50:36', '2023-11-26 01:50:36'),
(2303, 'کریم نوروزی', 'گارد', '1987-02-03', '(073) 453-4543', '(075) 353-4524', 'karim@gmail.com', 'غزنی', 'جغتو', 'سراب', 'کابل', 'ناحیه 13', 'دشت برچی', '2016627348.jpg', '1695754129.jpg', '133899433.jpg', '2023-11-26 01:50:36', '2023-11-26 01:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billNumber` int(11) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `item`, `date`, `category`, `consumer`, `billNumber`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 'چوکی', '2023-11-07', 'اجناس', 'صنف های طبقه دوم', 324234, 10, '100.00', 1000, '2023-11-26 01:53:32', '2023-11-26 01:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_id`, `class`, `fee`, `discount`, `paid`, `created_at`, `updated_at`) VALUES
(1, '230002', 'حساب صبحگاهی', 250, 0, 250, '2023-11-26 01:30:43', '2023-11-26 01:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_08_110535_create_expenses_table', 1),
(4, '2020_02_08_145809_create_employees_table', 1),
(5, '2020_02_10_084708_create_revenues_table', 1),
(6, '2020_02_16_053638_create_balances_table', 1),
(7, '2020_07_27_060714_create_subject_categories_table', 1),
(8, '2020_07_27_060745_create_teachers_table', 1),
(9, '2020_07_27_060802_create_subjects_table', 1),
(10, '2020_07_27_060821_create_students_table', 1),
(11, '2020_08_11_083109_create_clas_table', 1),
(12, '2020_08_11_083131_create_class_infos_table', 1),
(13, '2021_02_01_092502_create_fees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE `revenues` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revenues`
--

INSERT INTO `revenues` (`id`, `date`, `source`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, '2023-11-15', 'توضیح دیپلوم', 10000, NULL, '2023-11-26 01:52:52', '2023-11-26 01:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `father_name`, `phone`, `parent_phone`, `photo`, `created_at`, `updated_at`) VALUES
(230001, 'علی احمدی', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230002, 'زهرا نوری', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055909.jpg', '2023-11-26 01:26:14', '2023-11-26 01:29:09'),
(230003, 'زینب', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126060430.jpg', '2023-11-26 01:26:14', '2023-11-26 01:34:30'),
(230004, 'فاطمه', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230005, 'شکیبا رضایی', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126060551.jpg', '2023-11-26 01:26:14', '2023-11-26 01:35:51'),
(230006, 'خالق', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126060526.jpg', '2023-11-26 01:26:14', '2023-11-26 01:35:26'),
(230007, 'صالحه یکتا', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055946.jpg', '2023-11-26 01:26:14', '2023-11-26 01:29:46'),
(230008, 'نوروز', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230009, 'ذکریا رازی', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126060505.jpg', '2023-11-26 01:26:14', '2023-11-26 01:35:05'),
(230010, 'خاطره', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230011, 'شکیبا رضایی', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230012, 'سعید', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230013, 'عباس', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230014, 'شکیبا رضایی', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230015, 'شکیبا رضایی', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230016, 'شکیبا رضایی', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230017, 'شکیبا رضایی', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14'),
(230018, 'شکیبا رضایی', 'علی محمد', '(076) 756-7856', '(045) 645-3634', '20231126055614.jpg', '2023-11-26 01:26:14', '2023-11-26 01:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `description`, `photo`, `cat_id`, `created_at`, `updated_at`) VALUES
(2, 'دری', NULL, 'noImg.png', 1, '2023-11-26 01:15:57', '2023-11-26 01:15:57'),
(3, 'حساب', NULL, 'noImg.png', 2, '2023-11-26 01:20:19', '2023-11-26 01:20:19'),
(4, 'الجبر', NULL, 'noImg.png', 2, '2023-11-26 01:20:30', '2023-11-26 01:20:30'),
(5, 'فزیک', NULL, 'noImg.png', 3, '2023-11-26 01:20:39', '2023-11-26 01:20:39'),
(6, 'کیمیا', NULL, 'noImg.png', 3, '2023-11-26 01:20:49', '2023-11-26 01:20:49'),
(7, 'لیمت', NULL, 'noImg.png', 2, '2023-11-26 01:21:07', '2023-11-26 01:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `subject_categories`
--

CREATE TABLE `subject_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_categories`
--

INSERT INTO `subject_categories` (`id`, `name`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'لسان', 'مضامین شامل دری، انگلیسی و پشتو', '20231126052321.png', '2023-11-26 00:53:21', '2023-11-26 00:53:21'),
(2, 'ریاضیات', 'مضامین شامل دری، انگلیسی و پشتو', '20231126052321.png', '2023-11-26 00:53:21', '2023-11-26 00:53:21'),
(3, 'ساینس', 'مضامین شامل دری، انگلیسی و پشتو', '20231126052321.png', '2023-11-26 00:53:21', '2023-11-26 00:53:21'),
(4, 'انسان شناسی', 'مضامین شامل دری، انگلیسی و پشتو', '20231126052321.png', '2023-11-26 00:53:21', '2023-11-26 00:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tazkira_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tazkira` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `full_name`, `father_name`, `phone`, `email`, `tazkira_no`, `main_address`, `current_address`, `photo`, `tazkira`, `warranty`, `created_at`, `updated_at`) VALUES
(2301, 'علی', 'عبدالله', '(077) 564-5746', 'fatema@gmail.com', '2323423', 'غزنی، جغتو، سراب', 'کابل، ناحیه 13، برچی', '20231126053745.jpg', 'T-20231126053120.jpg', 'W-20231126053120.jpg', '2023-11-26 01:01:20', '2023-11-26 01:07:45'),
(2302, 'فاطمه رضایی', 'عبدالله', '(077) 564-5746', 'fatema@gmail.com', '2323423', 'غزنی، جغتو، سراب', 'کابل، ناحیه 13، برچی', '20231126053806.jpg', 'T-20231126053120.jpg', 'W-20231126053120.jpg', '2023-11-26 01:01:20', '2023-11-26 01:08:06'),
(2303, 'مهدی شاهین', 'عبدالله', '(077) 564-5746', 'fatema@gmail.com', '2323423', 'غزنی، جغتو، سراب', 'کابل، ناحیه 13، برچی', '20231126053838.jpg', 'T-20231126053120.jpg', 'W-20231126053120.jpg', '2023-11-26 01:01:20', '2023-11-26 01:08:38'),
(2304, 'مهریه ', 'عبدالله', '(077) 564-5746', 'fatema@gmail.com', '2323423', 'غزنی، جغتو، سراب', 'کابل، ناحیه 13، برچی', 'IMG-20231126053120.jpg', 'T-20231126053120.jpg', 'W-20231126053120.jpg', '2023-11-26 01:01:20', '2023-11-26 01:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `profileImage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `isAdmin`, `status`, `profileImage`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ادمین', 'admin@gmail.com', NULL, '$2y$10$ojUtYlPAwGzs44cz966y1esC/GqQ4zvdv79XAQACfG25Z/05nfX02', '1', 1, '1552010777.jpg', 'FeeDOSAgZoS9ibu5s23Dyxnb4gVAIyAdDavM4uX4z7OkE2XO8HJ1onQ9bXaM', '2021-09-20 19:12:31', '2021-09-20 19:12:31'),
(6, 'رضا احمدی\r\n', 'manager@gmail.com', NULL, '$2y$10$ojUtYlPAwGzs44cz966y1esC/GqQ4zvdv79XAQACfG25Z/05nfX02', '2', 1, '1552010777.jpg', 'mNj7MRdEhh9WDWlkgmMfXxhHvunDE2KXcKwLCPAMVOU0aWSHV0aRC54TW3Wp', '2021-09-20 19:12:31', '2021-09-20 19:12:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clas`
--
ALTER TABLE `clas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clas_subject_id_foreign` (`subject_id`),
  ADD KEY `clas_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `class_infos`
--
ALTER TABLE `class_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_infos_class_id_foreign` (`class_id`),
  ADD KEY `class_infos_student_id_foreign` (`student_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `subject_categories`
--
ALTER TABLE `subject_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clas`
--
ALTER TABLE `clas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_infos`
--
ALTER TABLE `class_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2306;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230020;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject_categories`
--
ALTER TABLE `subject_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2307;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clas`
--
ALTER TABLE `clas`
  ADD CONSTRAINT `clas_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clas_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_infos`
--
ALTER TABLE `class_infos`
  ADD CONSTRAINT `class_infos_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `clas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_infos_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `subject_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
