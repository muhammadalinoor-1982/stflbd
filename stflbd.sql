-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 06:41 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stflbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_speech` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `History` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_us` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `Company_name`, `owner_speech`, `History`, `why_us`, `status`, `creator`, `updater`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'stflbd', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'active', 'Noor', NULL, NULL, '2021-04-28 21:01:43', '2021-04-28 21:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `agros`
--

CREATE TABLE `agros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agros`
--

INSERT INTO `agros` (`id`, `name`, `status`, `creator_name`, `updater_name`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Fruits', 'active', 'Noor', 'Noor', NULL, NULL, '2021-03-27 20:22:46', '2021-05-12 21:21:14'),
(8, 'Vegetables', 'active', 'Noor', 'Noor', NULL, NULL, '2021-03-27 20:23:41', '2021-03-30 08:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `agro_links`
--

CREATE TABLE `agro_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `link` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` enum('special','social','cultural','occasional','festival') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agro_links`
--

INSERT INTO `agro_links` (`id`, `name`, `heading`, `description`, `link`, `image`, `event`, `status`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(1, 'Fruits & Vez', 'Lorem Ipsum is simply dummy', 'There are many variations', 'http://localhost/stflbd/Agro/Products/view', '06.05.2021_1620281593_3990_STFL_1.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-06 00:13:13', '2021-05-06 00:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `agro_products`
--

CREATE TABLE `agro_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agro_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulk_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cultivation_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harvesting_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agro_products`
--

INSERT INTO `agro_products` (`id`, `agro_id`, `name`, `description`, `color`, `size`, `quantity`, `regular_prise`, `special_prise`, `discount_prise`, `bulk_prise`, `cultivation_time`, `harvesting_time`, `image`, `status`, `creator`, `updater`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 7, 'Watermelon', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Green', 'Big', '20', '$50', '$45', '$30', '$20', 'Summer', 'Late Summer', '06.05.2021_1620299801_7134_STFL_c5e65a4829c50b4d0f0108d1c92b368a.jpg', 'active', 'Aupu Chowdhury', 'Noor', NULL, NULL, '2021-03-29 05:33:44', '2021-05-09 04:02:52'),
(12, 8, 'Cucumber', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Green', 'Medium', '80', '$10', '$7', '$5', '$3', '10 Days', '7 days', '06.05.2021_1620299621_9990_STFL_800px_COLOURBOX18999147.jpg', 'active', 'Aopo', 'Noor', NULL, NULL, NULL, '2021-05-06 05:13:41'),
(13, 7, 'Pineapple', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Orange', 'Small', '60', '$12', '$9', '$7', '$5', '30 Days', '20 days', '06.05.2021_1620299423_2883_STFL_pineapple-fruit-water.jpg', 'active', 'Aopo', 'Noor', NULL, NULL, NULL, '2021-05-06 05:10:23'),
(14, 8, 'Corn', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Yellow', 'Medium', '20', '$20', '$17', '$13', '$9', '11 Days', '7 days', '06.05.2021_1620299267_3074_STFL_27247912924_d0b7bece1a_b.jpg', 'active', 'Aopo', 'Noor', NULL, NULL, NULL, '2021-05-06 05:07:47'),
(15, 7, 'Strawberry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Red', 'Medium', '50', '$15', '$10', '$7', '$3', '15 Days', '5 days', '06.05.2021_1620299039_5970_STFL_depositphotos_78373736-stock-photo-fresh-strawberry-dropped-into-water.jpg', 'active', 'Aopo', 'Noor', NULL, NULL, NULL, '2021-05-06 05:03:59'),
(16, 8, 'Capsicum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Yellow and Red', 'Medium', '10', '$5', '$3', '$2', '$1', '11 Days', '7 days', '06.05.2021_1620298760_3338_STFL_editor.jpg', 'active', 'Aopo', 'Noor', NULL, NULL, NULL, '2021-05-06 04:59:20'),
(17, 8, 'Alovera', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Green', 'Small', '25', '$10', '$8', '$6', '$3', '10 Days', '5 days', '06.05.2021_1620300376_8019_STFL__-600.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 05:26:16', '2021-05-06 05:26:16'),
(18, 7, 'Cherry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Red', 'Big', '100', '$50', '$40', '$30', '$20', '30 Days', '20 days', '06.05.2021_1620300520_7421_STFL_c21a0f069a579dbd2b6ed57df9777d50.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 05:28:40', '2021-05-06 05:28:40'),
(19, 8, 'Onion', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Purpel', 'Medium', '1000', '$20', '$15', '$13', '$9', '30 Days', '7 days', '06.05.2021_1620300629_4687_STFL_aeaf943c6950fc491926d09b6e0d83b1.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 05:30:29', '2021-05-06 05:30:29'),
(20, 7, 'Apple', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Red', 'Medium', '50', '$20', '$17', '$13', '$9', '11 Days', '15 days', '06.05.2021_1620300769_6894_STFL_apple-fresh-water-drop-of-water.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 05:32:49', '2021-05-06 05:32:49'),
(21, 8, 'Egg Plant', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Blue', 'Big', '25', '$12', '$10', '$9', '$5', '11 Days', '7 days', '06.05.2021_1620300937_9446_STFL_8.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 05:35:37', '2021-05-06 05:35:37'),
(22, 7, 'Mango', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Green', 'Medium', '50', '$25', '$20', '$15', '$10', '60 Days', '20 days', '06.05.2021_1620301074_720_STFL_khai9000170400385.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 05:37:54', '2021-05-06 05:37:54'),
(23, 8, 'Broccoli', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Green', 'Medium', '10', '$20', '$17', '$13', '$9', '15 Days', '7 days', '06.05.2021_1620301141_7354_STFL_photo-1584868792839-bff69783216a.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 05:39:01', '2021-05-11 08:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_query_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `customer_query_id`, `user_id`, `comment`, `status`, `creator`, `updater`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 17, 1, 'Hi Aupu... This is Noor from Admin Reply on  Aupu\'s main Comment', 'active', 'Noor', NULL, NULL, '2021-04-26 07:32:18', '2021-04-26 07:32:18'),
(7, 16, 1, 'hi Caprio... This is Noor from Admin Reply on  Caprio\'s main Comment', 'active', 'Noor', NULL, NULL, '2021-04-26 07:33:10', '2021-04-26 07:33:10'),
(8, 15, 1, 'Hi Shanaya...  This is Noor from Admin Reply on  Shanaya\'s main Comment', 'active', 'Noor', NULL, NULL, '2021-04-26 07:33:39', '2021-04-26 07:33:39'),
(9, 19, 4, '@Shanaya reply on her second main Comment', 'active', 'Shanaya', NULL, NULL, '2021-05-01 20:19:09', '2021-05-01 20:19:09'),
(10, 15, 4, '@Noor Shayan\'s reply on Noor\'s reply', 'active', 'Shanaya', NULL, NULL, '2021-05-01 20:21:06', '2021-05-01 20:21:06'),
(11, 15, 4, '@Shanaya Another reply', 'active', 'Shanaya', NULL, NULL, '2021-05-01 20:22:16', '2021-05-01 20:22:16'),
(12, 19, 4, '@Shanaya test', 'active', 'Shanaya', NULL, NULL, '2021-05-01 20:38:31', '2021-05-01 20:38:31'),
(13, 20, 4, '@Shanaya test', 'active', 'Shanaya', NULL, NULL, '2021-05-01 20:41:24', '2021-05-01 20:41:24'),
(14, 20, 4, 'test', 'active', 'Shanaya', NULL, NULL, '2021-05-01 20:43:12', '2021-05-01 20:43:12'),
(15, 21, 1, '@Noor', 'active', 'Noor', NULL, NULL, '2021-05-12 21:59:02', '2021-05-12 21:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `designation`, `email`, `phone`, `address`, `facebook`, `instagram`, `twitter`, `linkedin`, `youtube`, `skype`, `pinterest`, `google_plus`, `status`, `creator`, `updater`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Russel', 'Founder', 'russel@stflbd.com', '01787667262', 'Dhaka-1212', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/?lang=en', 'https://bd.linkedin.com/', 'https://www.youtube.com/', 'https://www.skype.com/en/', 'https://www.pinterest.com/', 'https://accounts.google.com/ServiceLogin', 'active', 'Noor', 'Noor', NULL, '2021-04-28 06:52:23', '2021-04-29 21:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `customer_queries`
--

CREATE TABLE `customer_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `query_type_id` bigint(20) UNSIGNED NOT NULL,
  `cust_query` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_queries`
--

INSERT INTO `customer_queries` (`id`, `user_id`, `query_type_id`, `cust_query`, `status`, `creator`, `updater`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 4, 4, 'This is Shayana\'s main Comment', 'active', 'Shanaya', NULL, NULL, NULL, '2021-04-26 07:10:27', '2021-04-26 07:10:27'),
(16, 3, 2, 'This is Caprio\'s main Comment', 'active', 'Caprio', NULL, NULL, NULL, '2021-04-26 07:11:16', '2021-04-26 07:11:16'),
(17, 2, 6, 'This is Aupu\'s main Comment', 'active', 'Aupu', NULL, NULL, NULL, '2021-04-26 07:13:19', '2021-04-26 07:13:19'),
(19, 4, 5, 'This is Shayana\'s second main Comment', 'active', 'Shanaya', NULL, NULL, NULL, '2021-05-01 20:17:59', '2021-05-01 20:17:59'),
(20, 4, 3, 'test', 'active', 'Shanaya', NULL, NULL, NULL, '2021-05-01 20:39:13', '2021-05-01 20:39:13'),
(21, 1, 4, 'test-222', 'active', 'Noor', NULL, NULL, NULL, '2021-05-12 21:51:54', '2021-05-12 21:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fashions`
--

CREATE TABLE `fashions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fashions`
--

INSERT INTO `fashions` (`id`, `name`, `status`, `creator`, `updater`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Knit', 'active', 'Noor', NULL, NULL, NULL, '2021-04-01 08:14:42', '2021-04-01 08:14:42'),
(3, 'Flat Knit', 'active', 'Noor', NULL, NULL, NULL, '2021-04-01 08:15:14', '2021-04-01 08:15:14'),
(4, 'Woven', 'active', 'Noor', NULL, NULL, NULL, '2021-04-01 08:15:41', '2021-04-01 08:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `fashion_links`
--

CREATE TABLE `fashion_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `link` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` enum('special','social','cultural','occasional','festival') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fashion_links`
--

INSERT INTO `fashion_links` (`id`, `name`, `heading`, `description`, `link`, `image`, `event`, `status`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(1, 'Knit', 'Dummy text of the printing', 'The middle of text', 'http://localhost/stflbd/Fashion/Products/view', '06.05.2021_1620281904_3284_STFL_6.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-06 00:18:24', '2021-05-06 00:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `fashion_products`
--

CREATE TABLE `fashion_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fashion_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulk_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_lead_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_lead_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fashion_products`
--

INSERT INTO `fashion_products` (`id`, `fashion_id`, `name`, `description`, `color`, `size`, `quantity`, `regular_prise`, `special_prise`, `discount_prise`, `bulk_prise`, `production_lead_time`, `delivery_lead_time`, `image`, `status`, `creator`, `updater`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 2, 'Zarzin', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Red', 'M', '10', '$50', '$80', '$30', '$35', '5 Days', '7 Days', '07.05.2021_1620352320_2268_STFL_0.jpg', 'active', 'Noor', 'Noor', NULL, NULL, '2021-05-06 19:50:39', '2021-05-06 19:52:00'),
(8, 3, 'Juggling', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Green', 'Small', '200', '$20', '$17', '$13', '$9', '5 Days', '7 Days', '07.05.2021_1620352399_1259_STFL_img-1.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 19:53:19', '2021-05-06 19:53:19'),
(9, 4, 'Khaima', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'yellow', 'Big', '50', '$10', '$17', '$13', '$20', '5 Days', '7 Days', '07.05.2021_1620352505_8561_STFL_00.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 19:55:05', '2021-05-06 19:55:05'),
(10, 2, 'Turkuth', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Brown', 'Small', '200', '$50', '$40', '$30', '$20', '5 Days', '7 Days', '07.05.2021_1620353277_6847_STFL_img-11.jpg', 'active', 'Noor', 'Noor', NULL, NULL, '2021-05-06 20:06:46', '2021-05-06 20:07:57'),
(11, 3, 'Mashrik', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Gray', 'Medium', '200', '$111', '$80', '$30', '$35', '5 Days', '7 Days', '07.05.2021_1620353392_301_STFL_img-7.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 20:09:52', '2021-05-06 20:09:52'),
(12, 4, 'Magrib', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Red', 'Medium', '50', '$50', '$80', '$30', '$35', '5 Days', '7 Days', '07.05.2021_1620353619_7807_STFL_img-4.jpg', 'active', 'Noor', NULL, NULL, NULL, '2021-05-06 20:13:39', '2021-05-06 20:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `home_carousels`
--

CREATE TABLE `home_carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `link` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` enum('special','social','cultural','occasional','festival') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_carousels`
--

INSERT INTO `home_carousels` (`id`, `name`, `tag`, `heading`, `description`, `link`, `image`, `event`, `status`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(10, 'Fruits', 'Agro', 'test-1', 'test-1', 'http://localhost/stflbd/Agro/Products/view', '05.05.2021_1620225518_2949_STFL_1.jpg', 'festival', 'active', 'Noor', 'Noor', '2021-05-05 08:38:38', '2021-05-07 20:09:57'),
(11, 'Vegetables', 'Agro', 'test-2', 'test-2', 'http://localhost/stflbd/Agro/Products/view', '05.05.2021_1620225609_1874_STFL_2.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-05 08:40:09', '2021-05-05 08:40:09'),
(12, 'Fruits and Veg', 'Agro', 'test-3', 'test-3', 'http://localhost/stflbd/Agro/Products/view', '05.05.2021_1620225812_9295_STFL_3.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-05 08:43:32', '2021-05-05 08:43:32'),
(13, 'Fashion', 'Fashion', 'test-4', 'test-4', 'http://localhost/stflbd/Fashion/Products/view', '05.05.2021_1620227348_1370_STFL_4.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-05 09:09:08', '2021-05-05 09:09:08'),
(14, 'knit', 'Fashion', 'test-5', 'test-5', 'http://localhost/stflbd/Fashion/Products/view', '05.05.2021_1620227463_4735_STFL_5.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-05 09:11:03', '2021-05-05 09:11:03'),
(15, 'Flat Knit', 'Fashion', 'test-6', 'test-6', 'http://localhost/stflbd/Fashion/Products/view', '05.05.2021_1620227509_2240_STFL_6.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-05 09:11:49', '2021-05-05 09:11:49'),
(16, 'Jute Products', 'Luxury', 'test-7', 'test-7', 'http://localhost/stflbd/Luxury/Products/view', '05.05.2021_1620227570_230_STFL_7.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-05 09:12:50', '2021-05-05 09:12:50'),
(17, 'Leather Products', 'Luxury', 'test-8', 'test-8', 'http://localhost/stflbd/Luxury/Products/view', '05.05.2021_1620227674_6818_STFL_8.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-05 09:14:34', '2021-05-05 09:14:34'),
(18, 'Clay Products', 'Luxury', 'test-9', 'test-9', 'http://localhost/stflbd/Luxury/Products/view', '05.05.2021_1620227736_283_STFL_9.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-05 09:15:36', '2021-05-05 09:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `luxuries`
--

CREATE TABLE `luxuries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `luxuries`
--

INSERT INTO `luxuries` (`id`, `name`, `status`, `creator`, `updater`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Handy Craft', 'active', 'Caprio', NULL, NULL, NULL, '2021-04-02 02:07:51', '2021-04-02 02:07:51'),
(3, 'Jute Products', 'active', 'Caprio', NULL, NULL, NULL, '2021-04-02 02:09:01', '2021-04-02 02:09:01'),
(4, 'Leather Products', 'active', 'Caprio', NULL, NULL, NULL, '2021-04-02 02:10:31', '2021-04-02 02:10:31'),
(5, 'Clay Products', 'active', 'Caprio', NULL, NULL, NULL, '2021-04-02 02:11:45', '2021-04-02 02:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `luxury_links`
--

CREATE TABLE `luxury_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `link` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` enum('special','social','cultural','occasional','festival') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `luxury_links`
--

INSERT INTO `luxury_links` (`id`, `name`, `heading`, `description`, `link`, `image`, `event`, `status`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(1, 'Leather Goods', 'Typesetting industry.', 'The middle of text.', 'http://localhost/stflbd/Luxury/Products/view', '06.05.2021_1620281995_3241_STFL_7.jpg', 'festival', 'active', 'Noor', NULL, '2021-05-06 00:19:55', '2021-05-06 00:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `luxury_products`
--

CREATE TABLE `luxury_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `luxury_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulk_prise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_lead_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_lead_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `luxury_products`
--

INSERT INTO `luxury_products` (`id`, `luxury_id`, `name`, `description`, `color`, `size`, `quantity`, `regular_prise`, `special_prise`, `discount_prise`, `bulk_prise`, `production_lead_time`, `delivery_lead_time`, `image`, `status`, `creator`, `updater`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 3, 'Jute Show\'s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Gray', '7 inch', '200', '$10', '$8', '$6', '$4', '5 Days', '7 Days', '07.05.2021_1620354332_4412_STFL_prity_girls.jpg', 'active', 'Aupu Chowdhury', 'Noor', NULL, NULL, '2021-04-02 23:02:11', '2021-05-07 20:21:25'),
(7, 2, 'Ariba', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Brown', 'Small', '11', '$111', '$55', '$541', '$455', '7 Days', '3 days', '07.05.2021_1620354973_9629_STFL_charming.jpg', 'active', 'Aopo', 'Noor', NULL, NULL, NULL, '2021-05-06 20:36:13'),
(8, 5, 'Bangi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'White', 'Normal', '22', '$55', '$77', '$124', '$25214', '8 Days', '4 days', '07.05.2021_1620353990_3502_STFL_6.png', 'active', 'Aopo', 'Noor', NULL, NULL, NULL, '2021-05-06 20:19:50'),
(9, 4, 'cicilian', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Gray', 'XL', '33', '$99', '$90', '$80', '$70', '9 Days', '5 days', '07.05.2021_1620354817_6486_STFL_fashion-casual-long-sleeve-printed-floral-flower-t-shirt-women-top-tees-summer-autumn-2017-t-shirt-femme-ladies-tshirt-clothes.jpg', 'active', 'Aopo', 'Noor', NULL, NULL, NULL, '2021-05-06 20:33:37'),
(10, 3, 'Bali', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Blue', 'Medium', '44', '$444', '$245', '$1384', '$2518', '10 Days', '6 days', '07.05.2021_1620354753_6578_STFL_PINK-LADIES-1024x917.jpg', 'active', 'Aopo', 'Noor', NULL, NULL, NULL, '2021-05-06 20:32:33'),
(11, 2, 'BOGO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Yellow', 'Small', '7', '$250', '$214', '$200', '$150', '11 Days', '7 days', '07.05.2021_1620354376_2263_STFL_09Nov2013111922355.jpg', 'active', 'Aopo', 'Noor', NULL, NULL, NULL, '2021-05-06 20:26:16');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_21_123623_create_registers_table', 1),
(5, '2021_03_24_021411_create_agros_table', 2),
(6, '2021_03_27_133602_create_agro_categories_table', 3),
(7, '2021_03_28_023302_create_agro_products_table', 4),
(8, '2021_03_28_035627_create_agro_products_table', 5),
(9, '2021_04_01_125058_create_fashions_table', 6),
(10, '2021_04_01_145003_create_fashion_products_table', 7),
(11, '2021_04_02_061140_create_luxuries_table', 8),
(12, '2021_04_02_083225_create_luxury_products_table', 9),
(13, '2014_10_12_000000_create_users_table', 10),
(14, '2021_04_14_021514_create_query_types_table', 11),
(19, '2021_04_18_042032_create_comments_table', 13),
(21, '2021_04_14_031744_create_customer_queries_table', 15),
(23, '2021_04_20_091937_create_comment_replies_table', 16),
(25, '2021_04_27_113807_create_subscriptions_table', 17),
(26, '2021_04_28_103029_create_contact_us_table', 18),
(28, '2021_04_28_135859_create_about_us_table', 19),
(30, '2021_04_29_034042_create_services_table', 20),
(32, '2021_05_05_022248_create_home_carousels_table', 21),
(33, '2021_05_06_034655_create_agro_links_table', 22),
(34, '2021_05_06_034803_create_fashion_links_table', 22),
(35, '2021_05_06_034827_create_luxury_links_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aupuchowdhury_200@hotmail.com', '$2y$10$NbT31sAarAMx94//D94IXOO1ljFGoz9GncGOCoc3w8BtBkGlmhvji', '2021-04-28 01:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `query_types`
--

CREATE TABLE `query_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `query_types`
--

INSERT INTO `query_types` (`id`, `name`, `status`, `creator`, `updater`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'urgent', 'active', 'Noor', NULL, NULL, NULL, '2021-04-13 20:58:16', '2021-04-13 20:58:16'),
(3, 'special', 'active', 'Noor', NULL, NULL, NULL, '2021-04-13 20:58:33', '2021-04-13 20:58:33'),
(4, 'important', 'active', 'Noor', NULL, NULL, NULL, '2021-04-13 20:58:44', '2021-04-13 20:58:44'),
(5, 'general', 'active', 'Noor', NULL, NULL, NULL, '2021-04-13 20:59:15', '2021-04-13 20:59:15'),
(6, 'informative', 'active', 'Noor', NULL, NULL, NULL, '2021-04-13 20:59:33', '2021-04-13 20:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` longtext COLLATE utf8mb4_unicode_ci,
  `service_type` longtext COLLATE utf8mb4_unicode_ci,
  `product_type` longtext COLLATE utf8mb4_unicode_ci,
  `transport_type` longtext COLLATE utf8mb4_unicode_ci,
  `delivery_method` longtext COLLATE utf8mb4_unicode_ci,
  `payment_method` longtext COLLATE utf8mb4_unicode_ci,
  `bulk_supply` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_type`, `product_type`, `transport_type`, `delivery_method`, `payment_method`, `bulk_supply`, `status`, `creator`, `updater`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'active', 'Noor', 'Noor', NULL, '2021-05-01 05:31:54', '2021-05-01 06:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dialogue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `heading`, `dialogue`, `status`, `creator`, `updater`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aupuchowdhhhury@gmail.com', 'Please Subscribe This  Website', 'Get to know new arrival', 'active', 'Noor', 'Noor', NULL, '2021-04-27 07:44:32', '2021-04-27 10:58:14'),
(2, 'comment@test.com', NULL, NULL, 'active', NULL, NULL, NULL, '2021-04-27 07:46:25', '2021-04-27 07:46:25'),
(3, 's@rrr.com', NULL, NULL, 'active', NULL, NULL, NULL, '2021-04-27 10:44:39', '2021-04-27 10:44:39'),
(4, 'tash@tash.com', NULL, NULL, 'active', NULL, NULL, NULL, '2021-05-06 23:05:52', '2021-05-06 23:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_nid` bigint(20) DEFAULT NULL,
  `user_address` longtext COLLATE utf8mb4_unicode_ci,
  `about_you` longtext COLLATE utf8mb4_unicode_ci,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` enum('individual','company','trading') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `user_role` enum('admin','supervisor','operator','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `image` text COLLATE utf8mb4_unicode_ci,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `custom_id`, `name`, `email`, `email_verified_at`, `user_phone`, `user_nid`, `user_address`, `about_you`, `nationality`, `country`, `password`, `verification_code`, `business_type`, `gender`, `is_verified`, `user_role`, `image`, `creator`, `updater`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'STFL-00001', 'Noor', 'aupuchowdhhhury@gmail.com', '2021-04-06 21:31:36', '01787667262', 111111111, 'Dhaka', 'Me meme me', 'Bangladeshi', 'Bangladesh', '$2y$10$XydQ5k/2TS8Pkp4ECrgnauiUMrmhK4ZT8XNMqmOc7cJYiZrjWVJTu', '79bb4b527dea3fa81023ab09ca595b4c2a155c42', 'individual', 'male', 'active', 'admin', '26.04.2021_1619420730_6086_STFL_1.jpg', NULL, 'Noor', NULL, 'qgnM1qBQdK9nALje6fZ84R76FOgqGa6pZp2Xt4A2lTPnsGJBT2k0dFxRbyg6', '2021-04-06 21:29:53', '2021-05-09 20:56:45'),
(2, 'STFL-00002', 'Aupu', 'aupuchowdhury@live.com', NULL, '01787667262', 222222222, 'Dhaka-1215', 'Portugal', 'Japanies', 'Japan', '$2y$10$s1AGHUZ2am07X0Oj8ATzdejA57FBeAxhw.CjHfXi/D69VCk78jYbe', '5ee927a3bf3b58d8f7e06313f44a21cfe665f3cf', 'trading', 'others', 'active', 'customer', '07.04.2021_1617808256_5092_STFL_0.jpg', NULL, NULL, NULL, '6aaj9Tce5bLcurVK1tqUFVOAwYPCORbA9Pntu6kNNO4yUTApdgrC9t4UW7oR', '2021-04-07 09:10:56', '2021-04-12 07:57:29'),
(3, 'STFL-00003', 'Caprio', 'noor.web.journey@gmail.com', NULL, '01787667262', NULL, 'Dhaka-1219', 'MEMEMEME', 'Bangladeshi', 'BD', '$2y$10$cq.OFG.j0R7A6oY9WTkZ6evVjpdiJUCa.72dmSHPnKLAWuRq9Vvzi', 'f2985aed2e0bc885dffe58b9997d3b0f1bdeca6a', 'company', 'male', 'active', 'customer', '12.04.2021_1618235481_8195_STFL_img-1.jpg', NULL, NULL, NULL, NULL, '2021-04-11 08:34:31', '2021-04-12 07:51:21'),
(4, 'STFL-00004', 'Shanaya', 'c.corn.1.9.8.9@gmail.com', '2021-04-23 06:08:20', '01787667262', 454545454, 'Dhaka-1220', 'Software tester', 'American', 'USA', '$2y$10$BBntdGbzejL5Vvcp9hOELenq8lk.vGIj3onNlMa2x.jNFDvCs7EKy', '263946dcc53b12a7ff3b4471682b71aaf5164bfb', 'trading', 'female', 'active', 'customer', '22.04.2021_1619060169_8868_STFL_img-7.jpg', NULL, 'Noor', NULL, NULL, '2021-04-21 20:53:42', '2021-05-01 20:37:03'),
(8, 'STFL-00006', 'Prithvi', 'prthvchowhan@gmail.com', NULL, '123456', 534645646, '15356456', 'fsdfhsdhsdh', NULL, NULL, '$2y$10$kBvR2QJ86mPuZ2gdUmkNh.Yws9glAH2N7aCHfsrV.K2AErd5I8DoO', '1dcdd8ce42359f093868d38d3fcd356b7a67a371', NULL, NULL, 'active', 'supervisor', '10.05.2021_1620615043_1699_STFL_3.jpg', NULL, 'Noor', NULL, 'r0LwEJZiWPQM8s3h4LlTiZDDF2SILHxfjAJtgPuZVz502lw2Aw94TER52lbz', '2021-04-28 01:56:25', '2021-05-10 22:33:04'),
(9, 'STFL-00007', 'Galib', 'aupuchowdhury_2007@hotmail.com', NULL, '01787667262', NULL, NULL, NULL, NULL, NULL, '$2y$10$8bkAQiTQi.UN8aNdsI7NU.Bg1vg4JO1aPrxQEQuQmY.29Krk0RiHe', '601ec37afc7846aebf4a8707a84520f305aa026b', 'individual', 'male', 'active', 'operator', '13.05.2021_1620875669_4941_STFL_C24.png', NULL, 'Noor', NULL, NULL, '2021-05-12 21:09:34', '2021-05-12 21:14:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agros`
--
ALTER TABLE `agros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agros_name_unique` (`name`);

--
-- Indexes for table `agro_links`
--
ALTER TABLE `agro_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agro_links_name_unique` (`name`);

--
-- Indexes for table `agro_products`
--
ALTER TABLE `agro_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agro_products_name_unique` (`name`),
  ADD KEY `agro_products_agro_id_foreign` (`agro_id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_customer_query_id_foreign` (`customer_query_id`),
  ADD KEY `comment_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_us_email_unique` (`email`);

--
-- Indexes for table `customer_queries`
--
ALTER TABLE `customer_queries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_queries_user_id_foreign` (`user_id`),
  ADD KEY `customer_queries_query_type_id_foreign` (`query_type_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fashions`
--
ALTER TABLE `fashions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fashions_name_unique` (`name`);

--
-- Indexes for table `fashion_links`
--
ALTER TABLE `fashion_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fashion_links_name_unique` (`name`);

--
-- Indexes for table `fashion_products`
--
ALTER TABLE `fashion_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fashion_products_name_unique` (`name`),
  ADD KEY `fashion_products_fashion_id_foreign` (`fashion_id`);

--
-- Indexes for table `home_carousels`
--
ALTER TABLE `home_carousels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `home_carousels_name_unique` (`name`);

--
-- Indexes for table `luxuries`
--
ALTER TABLE `luxuries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `luxuries_name_unique` (`name`);

--
-- Indexes for table `luxury_links`
--
ALTER TABLE `luxury_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `luxury_links_name_unique` (`name`);

--
-- Indexes for table `luxury_products`
--
ALTER TABLE `luxury_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `luxury_products_name_unique` (`name`),
  ADD KEY `luxury_products_luxury_id_foreign` (`luxury_id`);

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
-- Indexes for table `query_types`
--
ALTER TABLE `query_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `query_types_name_unique` (`name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agros`
--
ALTER TABLE `agros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `agro_links`
--
ALTER TABLE `agro_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agro_products`
--
ALTER TABLE `agro_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_queries`
--
ALTER TABLE `customer_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fashions`
--
ALTER TABLE `fashions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fashion_links`
--
ALTER TABLE `fashion_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fashion_products`
--
ALTER TABLE `fashion_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `home_carousels`
--
ALTER TABLE `home_carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `luxuries`
--
ALTER TABLE `luxuries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `luxury_links`
--
ALTER TABLE `luxury_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `luxury_products`
--
ALTER TABLE `luxury_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `query_types`
--
ALTER TABLE `query_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agro_products`
--
ALTER TABLE `agro_products`
  ADD CONSTRAINT `agro_products_agro_id_foreign` FOREIGN KEY (`agro_id`) REFERENCES `agros` (`id`);

--
-- Constraints for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_customer_query_id_foreign` FOREIGN KEY (`customer_query_id`) REFERENCES `customer_queries` (`id`),
  ADD CONSTRAINT `comment_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customer_queries`
--
ALTER TABLE `customer_queries`
  ADD CONSTRAINT `customer_queries_query_type_id_foreign` FOREIGN KEY (`query_type_id`) REFERENCES `query_types` (`id`),
  ADD CONSTRAINT `customer_queries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `fashion_products`
--
ALTER TABLE `fashion_products`
  ADD CONSTRAINT `fashion_products_fashion_id_foreign` FOREIGN KEY (`fashion_id`) REFERENCES `fashions` (`id`);

--
-- Constraints for table `luxury_products`
--
ALTER TABLE `luxury_products`
  ADD CONSTRAINT `luxury_products_luxury_id_foreign` FOREIGN KEY (`luxury_id`) REFERENCES `luxuries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
