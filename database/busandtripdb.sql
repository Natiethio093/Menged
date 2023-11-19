-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 02:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busandtripdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookeds`
--

CREATE TABLE `bookeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `terminal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buscompanies`
--

CREATE TABLE `buscompanies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_buses` int(100) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buscompanies`
--

INSERT INTO `buscompanies` (`id`, `name`, `description`, `number_of_buses`, `image`, `contact_info`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Abay Bus', 'Fast and Save Journey ', 100, 'abaylogo.jpeg', '0115678009', 'Abay@gmail.com', '2023-09-04 08:57:20', '2023-09-04 08:57:20'),
(2, 'Golden Bus', 'Fast And Safe Journey \n', 75, 'goldenlogo.jpg', '0115785008', 'Golden@gmail.com', '2023-09-04 08:58:15', '2023-09-04 08:58:15'),
(3, 'Zemen Bus', 'Fast and Save Journey', 55, 'zemenlogo.jpeg', '0115456907', 'Zemen@gmail.com', '2023-09-04 08:58:15', '2023-09-04 08:58:15'),
(4, 'Walya Bus', 'Fast and Save Journey', 55, 'walyalogo.jpeg', '0116789005', 'Walya@gmail.com', '2023-09-04 08:58:15', '2023-09-04 08:58:15'),
(5, 'Yegna Bus', 'Fast and Save Journey', 50, 'yegnalogo.png', '0115698504', 'Yegna@gmail.com', '2023-09-04 08:58:15', '2023-09-04 08:58:15'),
(6, 'Selam Bus', 'Fast And Safe Journey', 50, 'Selamlogo.png', '0115695201', 'Selam@gmail.com', '2023-09-15 00:25:34', '2023-09-15 00:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_plate_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_com_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_side_num` int(255) NOT NULL,
  `comp_id` int(255) NOT NULL,
  `capacity` int(255) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_plate_number`, `bus_com_id`, `bus_side_num`, `comp_id`, `capacity`, `status`, `created_at`, `updated_at`) VALUES
(1, '18710 AA', 'Aba123', 9345, 1, 51, 'yes', '2023-09-07 04:58:40', '2023-09-07 04:58:40'),
(2, '19456 OR', 'Gbb345', 9876, 2, 51, 'yes', '2023-09-07 04:58:40', '2023-09-07 04:58:40'),
(3, '89345 OR', 'Ybb134', 9871, 5, 51, 'yes', '2023-09-07 04:58:40', '2023-09-07 04:58:40'),
(7, '19820 AA', 'Aba356', 9756, 1, 51, 'yes', '2023-09-11 00:50:57', '2023-09-11 00:50:57'),
(8, '65459 AA', 'Gbb456', 9863, 2, 51, 'yes', '2023-09-11 00:50:57', '2023-09-11 00:50:57'),
(9, '99564 AA', 'Zbb348', 9431, 3, 51, 'yes', '2023-09-11 00:52:24', '2023-09-11 00:52:24'),
(10, '79835 AA', 'Wbc125', 9875, 4, 51, 'yes', '2023-09-11 00:52:57', '2023-09-11 00:52:57'),
(11, '98761 OR', 'Ybb234', 9978, 5, 51, 'yes', '2023-09-11 00:52:57', '2023-09-11 00:52:57'),
(12, '89845 AA', 'Sbb092', 9676, 9, 51, 'yes', '2023-09-18 05:31:23', '2023-09-18 05:31:23'),
(13, '78962 AA', 'Aba053', 9123, 1, 51, 'yes', '2023-09-19 06:51:42', '2023-09-19 06:51:42'),
(16, '69845 AA', 'Aba789', 9758, 1, 51, 'yes', '2023-09-20 02:19:04', '2023-09-20 02:19:04'),
(20, '89436 OR', 'Yba845', 9652, 5, 51, 'yes', '2023-09-23 03:26:32', '2023-09-23 03:26:32'),
(21, '91235 AA', 'Zbb786', 9870, 3, 51, 'yes', '2023-09-23 05:16:27', '2023-09-23 05:16:27'),
(22, '24567 AA', 'Wbc234', 9201, 4, 51, 'yes', '2023-09-26 02:16:39', '2023-09-26 02:16:39'),
(23, '25479 AA', 'Yba935', 9175, 5, 51, 'yes', '2023-09-26 05:27:36', '2023-09-27 22:32:24'),
(24, '12940 AA', 'Abb239', 9864, 1, 51, 'yes', '2023-09-30 03:40:22', '2023-09-30 03:40:22'),
(25, '23767 AA', 'Gbb934', 9878, 2, 51, 'yes', '2023-10-05 08:28:35', '2023-10-05 08:28:35'),
(26, '81567 AA', 'Gbb234', 9787, 2, 51, 'yes', '2023-10-07 01:20:37', '2023-10-07 01:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Adama', 'Ada1', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(2, 'Adigrat', 'Adi2', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(3, 'Addis Abeba', 'AAa3', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(4, 'ArbaMinch', 'Arm4', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(5, 'Axsum', 'Axm5', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(6, 'Assosa', 'Asa6', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(7, 'Addis Zemen', 'Adz7', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(8, 'Bahirdar', 'Bdr8', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(9, 'Bale', 'Bae9', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(10, 'Dangla', 'Dga10', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(11, 'Dire Dawa', 'DDa11', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(12, 'Debre Markos', 'DMs12', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(13, 'Dejen', 'Dgn13', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(14, 'Dessie', 'Dse14', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(15, 'Gambella', 'Gma15', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(16, 'Gondar', 'Gdr16', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(17, 'Harar', 'Har17', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(18, 'Hawassa', 'Hws18', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(19, 'Enjibara', 'Inj19', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(20, 'Jigjga', 'Jia20', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(21, 'Mekelle', 'Mke21', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(22, 'Moyale', 'Moy22', '2023-09-08 07:11:00', '2023-09-08 07:11:00'),
(24, 'Nekemte', 'Nke24', '2023-09-08 07:21:45', '2023-09-08 07:21:45'),
(25, 'Semera', 'Sma25', '2023-09-08 07:22:26', '2023-09-08 07:22:26'),
(26, 'Weldia', 'Wla26', '2023-09-08 07:22:59', '2023-09-08 07:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `combuses`
--

CREATE TABLE `combuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_seat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_09_04_014209_create_tickets_table', 1),
(8, '2023_09_04_084050_create_buscompanies_table', 1),
(9, '2023_09_05_045108_create_sessions_table', 1),
(10, '2023_09_06_034232_create_buses_table', 1),
(11, '2023_09_06_034357_create_routes_table', 1),
(12, '2023_09_06_034519_create_schedules_table', 1),
(13, '2023_09_07_053625_create_bookeds_table', 2),
(14, '2023_09_08_014152_create_schedules_table', 3),
(15, '2023_09_08_070150_create_cities_table', 4),
(16, '2023_09_11_030827_create_combuses_table', 5),
(17, '2023_09_19_062530_create_terminals_table', 6),
(18, '2023_09_28_004923_create_seats_table', 7),
(19, '2023_10_06_015840_create_notifications_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_arrival_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `source`, `destination`, `distance`, `duration`, `dep_time`, `est_arrival_time`, `created_at`, `updated_at`) VALUES
(1, 'Addis Abeba', 'Hawassa', '278Km', '5hr and 11min', '10 Pm', '3:11 Am', '2023-09-07 05:01:20', '2023-09-07 05:01:20'),
(2, 'Addis Abeba', 'Bahirdar', '552Km', '10hr', '10 Pm', '8 Am', '2023-09-07 05:05:22', '2023-09-07 05:05:22'),
(3, 'Hawassa', 'Addis Abeba', '278Km', '5hr and 11min', '10 Pm', '3:11Am', '2023-09-07 05:05:22', '2023-09-07 05:05:22'),
(4, 'Addis Abeba', 'Axsum', '963Km', '19hr and 11min ', '10Am', '5:11Pm', '2023-09-18 05:32:55', '2023-09-18 05:32:55'),
(5, 'Bahirdar', 'Addis Abeba', '552Km', '10hr', '10Pm', '8Am', '2023-09-21 06:31:07', '2023-09-21 06:31:07'),
(6, 'Axsum', 'Addis Abeba', '963Km\r\n', '19hr and 11min \r\n', '10Pm\r\n', '5:11Am', '2023-09-21 06:34:52', '2023-09-21 06:34:52'),
(7, 'Addis Abeba', 'Dire Dawa', '455.6Km', '8hr and 56min', '10Pm', '6:56Am', '2023-09-21 06:34:52', '2023-09-21 06:34:52'),
(8, 'Dire Dawa', 'Addis Abeba', '455.6Km', '8hr and 56min', '10Pm', '6:56Am', '2023-09-21 06:41:27', '2023-09-21 06:41:27'),
(11, 'Addis Abeba', 'Gondar', '653.9Km', '13hr and 13min', '10Pm', '11:13Am', '2023-09-23 08:32:50', '2023-09-23 08:32:50'),
(12, 'Addis Abeba', 'Dessie', '395.6Km', '8hr and 26min', '10Pm', '6:26Am', '2023-09-23 08:32:50', '2023-09-23 08:32:50'),
(13, 'Gondar', 'Addis Abeba', '653.9Km', '13hr and 13min', '10pm', '11:13Am', '2023-09-26 06:18:18', '2023-09-26 06:18:18'),
(14, 'Dessie', 'Addis Abeba', '395.6Km', '8hr and 26min', '10Pm', '6:26Am', '2023-09-26 08:58:04', '2023-09-26 08:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `comp_id`, `name`, `route_id`, `route_type`, `bus_id`, `price`, `terminal`, `terminal_id`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Abay Bus', '1', 'even', '1', '680', 'Lamberet', 1, '2023-09-18', '2023-10-18', 'unavailable', '2023-09-08 01:51:40', '2023-10-05 04:40:53'),
(2, '1', 'Abay Bus', '3', 'odd', '1', '680', 'Hawassa', 5, '2023-09-18', '2023-10-18', 'available', '2023-09-08 01:51:40', '2023-09-08 01:51:40'),
(3, '2', 'Golden Bus', '1', 'even', '2', '680', 'Lamberet', 1, '2023-09-30', '2023-10-30', 'available', '2023-09-30 04:10:21', '2023-10-07 09:19:31'),
(4, '2', 'Golden Bus', '3', 'odd', '2', '680', 'Hawassa', 5, '2023-09-30', '2023-10-30', 'available', '2023-09-26 07:18:35', '2023-09-26 07:18:35'),
(5, '1', 'Abay Bus', '2', 'even', '7', '1450', 'Lamberet', 1, '2023-09-18', '2023-10-18', 'available', '2023-09-08 05:30:41', '2023-09-08 05:30:41'),
(6, '1', 'Abay Bus', '5', 'odd', '7', '1450', 'Papyrus', 4, '2023-09-18', '2023-10-18', 'available', '2023-09-26 07:37:14', '2023-09-26 07:37:14'),
(7, '6', 'Selam Bus', '4', 'odd', '12', '2510', 'Lamberet', 1, '2023-09-18', '2023-10-18', 'available', '2023-09-26 07:27:21', '2023-09-26 07:27:21'),
(8, '6', 'Selam Bus', '6', 'even', '12', '2510', 'Axsum', 8, '2023-09-18', '2023-10-18', 'available', '2023-09-18 05:37:37', '2023-09-11 05:37:37'),
(9, '1', 'Abay Bus', '1', 'odd', '13', '680', 'Lamberet', 1, '2023-09-19', '2023-10-19', 'available', '2023-09-19 06:54:26', '2023-09-19 06:54:26'),
(10, '1', 'Abay Bus', '2', 'odd', '16', '1450', 'Lamberet', 1, '2023-09-19', '2023-10-19', 'available', '2023-09-19 06:54:26', '2023-09-19 06:54:26'),
(11, '1', 'Abay Bus', '5', 'even', '16', '1450', 'Papyrus', 4, '2023-09-19', '2023-10-19', 'available', '2023-09-26 07:49:17', '2023-09-26 07:49:17'),
(12, '2', 'Golden Bus', '2', 'odd', '8', '1450', 'Lamberet', 1, '2023-09-19', '2023-10-19', 'available', '2023-09-19 07:32:35', '2023-10-05 08:43:58'),
(13, '2', 'Golden Bus', '5', 'even', '8', '1450', 'Papyrus', 4, '2023-09-19', '2023-10-19', 'available', '2023-09-26 07:54:12', '2023-09-26 07:54:12'),
(17, '5', 'Yegna Bus', '5', 'even', '11', '1450', 'Papyrus', 4, '2023-09-23', '2023-10-23', 'available', '2023-09-26 07:57:56', '2023-09-26 07:57:56'),
(18, '5', 'Yegna Bus', '2', 'odd', '11', '1450', 'Lamberet', 1, '2023-09-23', '2023-10-23', 'available', '2023-09-23 03:22:08', '2023-09-23 03:22:08'),
(19, '5', 'Yegna Bus', '1', 'even', '20', '680', 'Lamberet', 1, '2023-09-23', '2023-10-23', 'available', '2023-09-23 03:34:49', '2023-09-23 03:34:49'),
(20, '5', 'Yegna Bus', '3', 'odd', '20', '680', 'Hawassa', 5, '2023-09-23', '2023-10-23', 'available', '2023-09-26 08:17:47', '2023-09-26 08:17:47'),
(21, '5', 'Yegna Bus', '8', 'odd', '3', '1280', 'Asebe Teferi', 6, '2023-09-26', '2023-09-26', 'available', '2023-09-26 08:22:12', '2023-09-26 08:22:12'),
(22, '5', 'Yegna Bus', '7', 'even', '3', '1280', 'Lamberet', 1, '2023-09-23', '2023-10-23', 'available', '2023-09-23 05:06:24', '2023-09-23 05:06:24'),
(23, '3', 'Zemen Bus', '13', 'odd', '21', '1650', 'Gondar', 9, '2023-09-23', '2023-10-23', 'available', '2023-09-23 05:30:03', '2023-09-23 05:30:03'),
(24, '3', 'Zemen Bus', '11', 'even', '21', '1650', 'Lamberet', 1, '2023-09-23', '2023-10-23', 'available', '2023-09-23 05:37:31', '2023-09-23 05:37:31'),
(25, '5', 'Yegna Bus', '7', 'even', '23', '1280', 'Lamberet', 1, '2023-09-26', '2023-10-26', 'available', '2023-09-26 08:07:42', '2023-09-26 08:07:42'),
(26, '5', 'Yegna Bus', '8', 'odd', '23', '1280', 'Asebe Teferi', 6, '2023-09-26', '2023-09-26', 'available', '2023-09-26 01:17:54', '2023-09-26 01:17:54'),
(28, '4', 'Walya Bus', '11', 'even', '22', '1650', 'Lamberet', 1, '2023-09-26', '2023-10-26', 'available', '2023-09-26 03:32:49', '2023-09-26 03:32:49'),
(29, '4', 'Walya Bus', '13', 'odd', '22', '1650', 'Gondar', 9, '2023-09-26', '2023-10-26', 'available', '2023-09-26 03:32:49', '2023-09-26 03:32:49'),
(30, '3', 'Zemen Bus', '12', 'even', '9', '1100', 'Lamberet', 1, '2023-09-26', '2023-10-26', 'available', '2023-09-26 06:01:32', '2023-09-26 06:01:32'),
(31, '3', 'Zemen Bus', '14', 'odd', '9', '1100', 'Dessie', 11, '2023-09-26', '2023-10-26', 'available', '2023-09-26 06:01:32', '2023-09-26 06:01:32'),
(35, '4', 'Walya Bus', '1', 'even', '10', '680', 'Lamberet', 1, '2023-10-06', '2023-11-10', 'available', '2023-10-04 22:36:05', '2023-10-04 22:36:05'),
(36, '4', 'Walya Bus', '3', 'odd', '10', '680', 'Hawassa', 5, '2023-10-06', '2023-11-10', 'available', '2023-10-04 22:36:05', '2023-10-04 22:36:05'),
(37, '2', 'Golden Bus', '11', 'even', '25', '1650', 'Lamberet', 1, '2023-10-06', '2023-11-06', 'available', '2023-10-05 08:30:41', '2023-10-05 08:30:41'),
(38, '2', 'Golden Bus', '13', 'odd', '25', '1650', 'Gondar', 9, '2023-10-06', '2023-11-06', 'available', '2023-10-05 08:30:41', '2023-10-05 08:30:41'),
(39, '2', 'Golden Bus', '12', 'even', '26', '1100', 'Lamberet', 1, '2023-10-08', '2023-11-08', 'available', '2023-10-07 01:23:32', '2023-10-07 01:23:32'),
(40, '2', 'Golden Bus', '14', 'odd', '26', '1100', 'Dessie', 11, '2023-10-08', '2023-11-08', 'available', '2023-10-07 01:23:32', '2023-10-07 01:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` int(255) DEFAULT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_com_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `booked_seats` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reserved_seats` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabled_seats` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat_available` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `schedule_id`, `bus_id`, `bus_com_id`, `date`, `booked_seats`, `reserved_seats`, `disabled_seats`, `seat_available`, `created_at`, `updated_at`) VALUES
(49, 22, 3, 'Ybb134', '2023-10-10', NULL, '15,19,23', NULL, 48, '2023-10-07 09:14:46', '2023-10-07 09:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('80EH2dZ8ynWmHOCWc9Qyd9lBGdbPURTg6IxE2Qur', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.47', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoid2t1UzZRajVVY3I0RWVNREdpZjI4NkszMFRuVTNNNzFRSENYcmxJRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE2OTY2ODEyMTI7fX0=', 1696681213),
('I6XECCsOo7m0WwEFfSlwn4WQazVck0FJyLDVcVFu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.47', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTR5S1E1MHNlS2ZMS01Hbk1kVHk0MERzN3RheW5VZmd3bElEeklJSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjAyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2FsbGJhY2svQnVzVGlja2V0c19jaGFwYV8xNjk2NjgwOTQ4NjUyMTRiZjRiMTk3Mz9fPTE2OTY2ODA5ODE0MTkmY2FsbGJhY2s9alF1ZXJ5MzUxMDI5MDU5NzMxMzU4NjIwNTQ0XzE2OTY2ODA5ODE0MTgmc3RhdHVzPXN1Y2Nlc3MmdHJ4X3JlZj1CdXNUaWNrZXRzX2NoYXBhXzE2OTY2ODA5NDg2NTIxNGJmNGIxOTczIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1696680990);

-- --------------------------------------------------------

--
-- Table structure for table `terminals`
--

CREATE TABLE `terminals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terminals`
--

INSERT INTO `terminals` (`id`, `name`, `city_id`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Lamberet', 3, 'Addis Abeba', '2023-09-19 06:40:20', '2023-09-19 06:40:20'),
(2, 'Bole Michael', 3, 'Addis Abeba', '2023-10-02 06:34:09', '2023-10-02 06:34:09'),
(4, 'Papyrus', 8, 'Bahirdar', '2023-09-19 06:41:55', '2023-09-19 06:41:55'),
(5, 'Hawassa', 18, 'Hawassa', '2023-09-19 06:42:46', '2023-09-19 06:42:46'),
(6, 'Asebe Teferi', 11, 'Dire Dawa', '2023-09-19 06:43:23', '2023-09-19 06:43:23'),
(7, 'Semera', 25, 'Semera', '2023-09-19 06:43:53', '2023-09-19 06:43:53'),
(8, 'Axsum', 5, 'Axsum', '2023-09-23 05:45:55', '2023-09-23 05:45:55'),
(9, 'Gondar', 16, 'Gonder', '2023-09-23 08:19:43', '2023-09-23 08:19:43'),
(10, 'Mekelle', 21, 'Mekelle', '2023-09-23 08:21:08', '2023-09-23 08:21:08'),
(11, 'Dessie', 14, 'Dessie', '2023-09-23 08:21:34', '2023-09-23 08:21:34'),
(12, 'ArbaMinch', 4, 'ArbaMinch', '2023-09-23 08:21:34', '2023-09-23 08:21:34'),
(13, 'Jigjga', 20, 'Jigjga', '2023-09-23 08:22:34', '2023-09-23 08:22:34'),
(14, 'Weldia', 26, 'Weldia', '2023-09-23 08:24:55', '2023-09-23 08:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `ticketreference` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `comp_name`, `summary`, `name`, `phone`, `schedule_id`, `date`, `ticketreference`, `seat_no`, `terminal`, `status`, `created_at`, `updated_at`) VALUES
(17, 'Yegna Bus', 'Reserved Ticket', 'Natnael Berhanu', '0970951608', '22', '2023-10-10', '6661069025', '15', 'Bole Michael', 'paid', '2023-10-07 09:16:33', '2023-10-07 09:16:33'),
(18, 'Yegna Bus', 'Reserved Ticket', 'Abebe Kebede', '0970967890', '22', '2023-10-10', '6661069025', '19', 'Lamberet', 'paid', '2023-10-07 09:16:33', '2023-10-07 09:16:33'),
(19, 'Yegna Bus', 'Reserved Ticket', 'Natnael Kebde', '0970951890', '22', '2023-10-10', '6661069025', '23', 'Bole Michael', 'paid', '2023-10-07 09:16:34', '2023-10-07 09:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `usertype`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Natnael Berhanu', 'natman093@gmail.com', '0970951608', 'shola', '0', NULL, '$2y$10$196k7Uxi99cAfdmROP6DZeg4NiJHp00uSnhFgLRcYF3JQSOyRRXU.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-06 02:09:15', '2023-09-06 02:09:15'),
(2, 'Admin', 'admin@gmail.com', '0970951608', 'megenya', '1', NULL, '$2y$10$kCW8knycJpYxFz0DQjbqheezYFOYk4nzMuSBBa3XlXAEIKyVmXFDG', NULL, NULL, NULL, 'SbgJT9ApN1K7NZtD6uYocxMDBK1O60RG0FeYRrpo9cdfZA0Cn2YPJzDXRFZO', NULL, NULL, '2023-09-06 02:12:08', '2023-09-06 02:12:08'),
(3, 'Abebe Kebede', 'abeKee093@gmail.com', '0912345678', 'Bole', '0', NULL, '$2y$10$TGVHffMDMRVdcTy4jWlwx.OB/Jnz91XmpKfemwGdgeiKWg/uKOxIW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-11 00:39:14', '2023-09-11 00:39:14'),
(9, 'Abay Bus', 'Abay@gmail.com', '0115678009', 'Stadium', '2', NULL, '$2y$10$cH0UQKdxl7Qj7Ws39.a5Yu19ns4PfhwBz1kRbk5vBvtLHcgpNSOSW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-14 23:55:13', '2023-09-14 23:55:13'),
(10, 'Golden Bus', 'Golden@gmail.com', '0115785008', 'Stadium', '2', NULL, '$2y$10$VoOgKJQ8dV.G15u.PJ365OfVDw06tv5U2CvX2PzCrZVeRumtgl69u', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-14 23:58:08', '2023-09-14 23:58:08'),
(13, 'Zemen Bus', 'Zemen@gmail.com', '0115456907', 'Stadium', '2', NULL, '$2y$10$Z9GiUNtREvyaXMArlx443.cFH27lEWXqyGJa9b7I5JmmV5NBvk1Ne', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-15 00:05:53', '2023-09-15 00:05:53'),
(14, 'Walya Bus', 'Walya@gmail.com', '0116789005', 'Stadium', '2', NULL, '$2y$10$e.4WeKvjJekBrp6/oWlO/eN7mdR30u9FNbYrxnjJ5RaL28f1.mUxa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-15 00:06:52', '2023-09-15 00:06:52'),
(15, 'Yegna Bus', 'Yegna@gmail.com', '0115698504', 'Stadium', '2', NULL, '$2y$10$71/JOxMXZFFXxztwujPuz.Q4maCK7Lc/CnLxvZwTxPYciqQJ5CzDS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-15 00:08:09', '2023-09-15 00:08:09'),
(18, 'Selam Bus', 'Selam@gmail.com', '0115695201', 'Stadium', '2', NULL, '$2y$10$GqckodgLi7KRhRelbQx/2OJ8oZksegGliWpFxfAZHQk9yR72UIMPy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-15 00:25:34', '2023-09-15 00:25:34'),
(19, 'Kebede Molla', 'natmansafari093@gmail.com', '0712911008', 'Shola', '0', NULL, '$2y$10$/Lbt9pJ090NpwKvQbOC.WepseAOr/wYU6n4OVoUGywqZIC5V2d49y', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-07 01:06:09', '2023-10-07 01:06:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookeds`
--
ALTER TABLE `bookeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buscompanies`
--
ALTER TABLE `buscompanies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bus_plate_number` (`bus_plate_number`),
  ADD UNIQUE KEY `bus_com_id` (`bus_com_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_id` (`city_id`);

--
-- Indexes for table `combuses`
--
ALTER TABLE `combuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `terminals`
--
ALTER TABLE `terminals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
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
-- AUTO_INCREMENT for table `bookeds`
--
ALTER TABLE `bookeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `buscompanies`
--
ALTER TABLE `buscompanies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `combuses`
--
ALTER TABLE `combuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `terminals`
--
ALTER TABLE `terminals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
