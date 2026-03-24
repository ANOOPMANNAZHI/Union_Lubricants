-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2026 at 06:26 AM
-- Server version: 10.6.24-MariaDB
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ulgae_ulb`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'OUR REAL COMMITMENT REACHES BEYOND LUBRICANTS & GREASE.', 'Established in 1982 by Mr. Ahmed Alhashmi, Union Lubricants & Grease Factory S.P.S. L.L.C., previously known as Union Chemicals Factory L.L.C., is one of the UAE’s oldest & most trusted manufacturers of automotive & industrial lubricants.\r\n\r\nWith over 40 years of experience, we have grown from a local producer into a global exporter, supplying high quality lubricants & greases to more than 42 countries across the Middle East, Africa, Asia, and Europe.\r\n\r\nUnder the leadership of Mr. Khalifa Alhashmi, the factory continues to expand & modernize, focusing on innovation, customer satisfaction, & long-term partnerships.\r\n\r\nOur facility features advanced blending systems & automated filling lines to ensure consistent quality & reliable production. We use 100% virgin base oils & advanced additive technologies, strictly following ISO & API standards.\r\n\r\nUnion Lubricants & Grease Factory offers:\r\n-  Private Label & OEM Manufacturing\r\n-  Fast & efficient export services\r\n-  Partnerships with globally trusted raw material suppliers\r\n-  Dedicated to quality, reliability, & continuous improvement we continue to set high standards in the lubricant manufacturing industry.', 'about/YkWNzepEoB5SrNy1Ads0eLR2Cty5cwlXg51X8JmF.jpg', '2025-12-02 23:37:43', '2025-12-11 04:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `heading`, `description`, `image_path`, `created_at`, `updated_at`) VALUES
(4, 'Powering Engines. Enhancing Performance', 'From automotive to industrial sectors, our lubricants are engineered to maximize efficiency, protection, and long-term durability.', 'banners/T9ozE4k8UmgyG8q3tcL7ptAT13mteXy9l0eCX6ZF.jpg', '2025-12-08 13:07:12', '2025-12-08 13:16:03'),
(5, 'Engineering Lubrication Excellence Since 1982', 'Delivering high-performance lubricants backed by precision manufacturing, advanced testing, and decades of technical expertise.', 'banners/6HZzr9TZkcpzMnLJaZv8z2JHRUPdJC0HNOCvZYDi.jpg', '2025-12-08 13:14:17', '2025-12-08 13:25:44');

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
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `title`, `description`, `pdf_path`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'EOLCS Certificate', NULL, 'certifications/7dQsHha3JYWub0hNHOtEtmxKw6MDMyiMHtvT9Z18.pdf', NULL, '2025-12-03 09:47:35', '2025-12-10 17:54:02'),
(2, 'ISO 9001_Certificate', NULL, 'certifications/6Y0yHysOOJDAZ45ffaw9STOTtwu3FapGWpptV3xv.pdf', NULL, '2025-12-03 09:48:07', '2025-12-10 17:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('new','in_progress','closed') NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `subject`, `message`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anoop', 'anoop@gmail.com', '98880817711', 'About Product', 'test message', NULL, 'new', '2025-12-05 10:29:20', '2025-12-05 10:29:20'),
(2, 'LIAKATH', 'liakathdxb@gmail.com', '+971551435072', 'Quotation', 'BRAKE FLUID OIL', NULL, 'new', '2025-12-08 14:01:11', '2025-12-08 14:01:11'),
(3, 'Anoop PM', 'anoopmannazhi36@gmail.com', '9880817711', 'Email Checking', 'Email Send Checking', NULL, 'new', '2025-12-10 16:00:54', '2025-12-10 16:00:54'),
(4, 'DIV SINGH', 'APPOLO.MARKET@GMAIL.COM', '+971509435822', 'Inquiry about engine oil - SHPD 15W-40', 'Hello i am Div Singh from Apollo Gulf, Dubai, i am reaching out to inquire about my requirement of this engine oil - SHPD 15W-40, please could you let me know about the availability of this, we are interested in 20LTR AND 205LTR Drum / 20ft Each', NULL, 'new', '2025-12-10 17:07:16', '2025-12-10 17:07:16'),
(5, 'Anoop PM', 'anoopmannazhi36@gmail.com', '564654654564', 'Server Mail Test', 'server mail test', NULL, 'new', '2025-12-10 17:37:05', '2025-12-10 17:37:05'),
(6, 'manu dev', 'anoopmannazhi36@gmail.com', '4564654654', 'SERVER', 'Server email', NULL, 'new', '2025-12-10 17:39:53', '2025-12-10 17:39:53'),
(7, 'Anoop Mannazhi', 'anoopmannazhi36@gmail.com', '564654564', 'SERVER', 'checking server email messages', NULL, 'new', '2025-12-10 17:46:22', '2025-12-10 17:46:22'),
(8, 'LIAKATH ALI KHAN', 'purchase@almehdar.com', '0504791079', 'Test Qtn', 'Hi', NULL, 'new', '2025-12-11 14:29:32', '2025-12-11 14:29:32');

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
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Automotive', 'automotive', 'Lubricants for cars, trucks, and commercial vehicles', '2025-12-02 23:36:28', '2025-12-02 23:36:28'),
(2, 'Manufacturing', 'manufacturing', 'Industrial lubricants for manufacturing plants', '2025-12-02 23:36:28', '2025-12-02 23:36:28'),
(3, 'Mining', 'mining', 'Heavy-duty lubricants for mining equipment', '2025-12-02 23:36:28', '2025-12-02 23:36:28'),
(4, 'Construction', 'construction', 'Lubricants for construction and heavy machinery', '2025-12-02 23:36:28', '2025-12-02 23:36:28'),
(5, 'Marine', 'marine', 'Specialized lubricants for marine vessels', '2025-12-02 23:36:28', '2025-12-02 23:36:28'),
(6, 'Agriculture', 'agriculture', 'Lubricants for agricultural equipment and tractors', '2025-12-02 23:36:28', '2025-12-02 23:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `industry_product`
--

CREATE TABLE `industry_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `industry_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industry_product`
--

INSERT INTO `industry_product` (`id`, `industry_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 5, 1, NULL, NULL),
(3, 1, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 4, 2, NULL, NULL),
(6, 1, 2, NULL, NULL),
(7, 6, 2, NULL, NULL),
(8, 5, 2, NULL, NULL),
(9, 4, 3, NULL, NULL),
(10, 5, 3, NULL, NULL),
(11, 2, 3, NULL, NULL),
(28, 1, 10, NULL, NULL),
(29, 2, 10, NULL, NULL),
(30, 1, 12, NULL, NULL),
(31, 4, 12, NULL, NULL),
(32, 2, 12, NULL, NULL),
(33, 1, 13, NULL, NULL),
(34, 4, 13, NULL, NULL),
(35, 2, 13, NULL, NULL),
(36, 1, 14, NULL, NULL),
(37, 4, 14, NULL, NULL),
(38, 2, 14, NULL, NULL),
(39, 1, 15, NULL, NULL),
(40, 4, 15, NULL, NULL),
(41, 2, 15, NULL, NULL),
(42, 5, 15, NULL, NULL),
(43, 1, 16, NULL, NULL),
(44, 4, 16, NULL, NULL),
(45, 2, 16, NULL, NULL),
(46, 1, 18, NULL, NULL),
(47, 4, 18, NULL, NULL),
(48, 2, 18, NULL, NULL),
(49, 5, 18, NULL, NULL),
(50, 1, 19, NULL, NULL),
(51, 4, 19, NULL, NULL),
(52, 2, 19, NULL, NULL),
(53, 5, 19, NULL, NULL),
(54, 1, 20, NULL, NULL),
(55, 4, 20, NULL, NULL),
(56, 2, 20, NULL, NULL),
(57, 1, 21, NULL, NULL),
(58, 4, 21, NULL, NULL),
(59, 2, 21, NULL, NULL),
(60, 1, 22, NULL, NULL),
(61, 4, 22, NULL, NULL),
(62, 2, 22, NULL, NULL),
(63, 5, 22, NULL, NULL),
(64, 3, 22, NULL, NULL),
(65, 6, 23, NULL, NULL),
(66, 1, 23, NULL, NULL),
(67, 4, 23, NULL, NULL),
(68, 2, 23, NULL, NULL),
(69, 5, 23, NULL, NULL),
(70, 3, 23, NULL, NULL),
(71, 6, 24, NULL, NULL),
(72, 1, 24, NULL, NULL),
(73, 4, 24, NULL, NULL),
(74, 2, 24, NULL, NULL),
(75, 5, 24, NULL, NULL),
(76, 3, 24, NULL, NULL),
(77, 1, 11, NULL, NULL),
(78, 4, 11, NULL, NULL),
(79, 2, 11, NULL, NULL),
(80, 1, 17, NULL, NULL),
(81, 4, 17, NULL, NULL),
(82, 2, 17, NULL, NULL),
(83, 3, 17, NULL, NULL),
(84, 1, 25, NULL, NULL),
(85, 4, 25, NULL, NULL),
(86, 2, 25, NULL, NULL),
(87, 5, 25, NULL, NULL),
(88, 3, 25, NULL, NULL),
(89, 1, 26, NULL, NULL),
(90, 4, 26, NULL, NULL),
(91, 2, 26, NULL, NULL),
(92, 5, 26, NULL, NULL),
(93, 3, 26, NULL, NULL),
(94, 1, 27, NULL, NULL),
(95, 1, 28, NULL, NULL),
(96, 1, 29, NULL, NULL),
(98, 1, 30, NULL, NULL),
(99, 2, 30, NULL, NULL),
(100, 1, 31, NULL, NULL),
(101, 4, 31, NULL, NULL),
(102, 2, 31, NULL, NULL),
(103, 3, 31, NULL, NULL),
(104, 5, 29, NULL, NULL),
(105, 6, 30, NULL, NULL),
(106, 5, 30, NULL, NULL),
(107, 1, 32, NULL, NULL),
(108, 4, 32, NULL, NULL),
(109, 2, 32, NULL, NULL);

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
(4, '2025_12_01_100001_create_product_categories_table', 1),
(5, '2025_12_01_100002_create_products_table', 1),
(6, '2025_12_01_100003_create_industries_table', 1),
(7, '2025_12_01_100004_create_industry_product_table', 1),
(8, '2025_12_01_100005_create_posts_table', 1),
(9, '2025_12_01_100006_create_enquiries_table', 1),
(10, '2025_12_01_100007_create_settings_table', 1),
(11, '2025_12_02_095216_create_abouts_table', 1),
(12, '2025_12_02_095218_create_certifications_table', 1),
(13, '2025_12_02_095219_create_testimonials_table', 1),
(14, '2025_12_02_143603_create_services_table', 1),
(15, '2025_12_02_152130_create_banners_table', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(500) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `excerpt`, `content`, `featured_image`, `published_at`, `is_published`, `created_at`, `updated_at`) VALUES
(4, 'Guide to Synthetic vs Mineral Oils', 'guide-to-synthetic-vs-mineral-oils', 'Understanding the differences and benefits of synthetic and mineral oils', 'Synthetic oils offer superior performance compared to mineral oils in many applications. They provide better thermal stability, improved oxidation resistance, and longer drain intervals. Learn more about which option is best for your needs.', NULL, NULL, 0, '2025-12-08 13:31:27', '2025-12-08 13:31:44'),
(5, 'Seasonal Lubricant Maintenance Tips', 'seasonal-lubricant-maintenance-tips', 'Essential tips for maintaining proper lubrication throughout the year', 'Different seasons require different lubrication strategies. From winter freeze protection to summer heat management, proper seasonal maintenance ensures your equipment operates smoothly year-round. Discover our expert recommendations.', 'posts/dZD8JDmuxYyGRbfCth831EgwRVjEEUJUwqYR056Q.jpg', NULL, 0, '2025-12-08 13:33:39', '2025-12-08 13:33:39'),
(6, 'The Importance of Using Quality Lubricants', 'the-importance-of-using-quality-lubricants', 'Learn why choosing the right lubricant is crucial for equipment longevity', 'Using high-quality lubricants is essential for maintaining equipment performance and extending its lifespan. Poor quality lubricants can lead to increased wear, reduced efficiency, and costly repairs. Our premium range of lubricants ensures optimal protection for all your equipment needs.', NULL, NULL, 0, '2025-12-08 13:34:45', '2025-12-08 13:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `viscosity_grade` varchar(50) DEFAULT NULL,
  `specifications` longtext DEFAULT NULL,
  `applications` longtext DEFAULT NULL,
  `pack_sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`pack_sizes`)),
  `image_path` varchar(500) DEFAULT NULL,
  `tds_pdf` varchar(500) DEFAULT NULL,
  `msds_pdf` varchar(500) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `code`, `short_description`, `description`, `viscosity_grade`, `specifications`, `applications`, `pack_sizes`, `image_path`, `tds_pdf`, `msds_pdf`, `is_active`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 1, 'SuperStar Fully Syn. Engine Oil 0W20 – 5L', 'superstar-fully-syn-engine-oil-0w20-5l', 'SMO-0W20-CB-5L', 'Premium ultra-low viscosity fully synthetic engine oil for superior cold start protection, maximum fuel savings, and ultra-clean engine performance.', 'SuperStar COBALT Eco Power Fully Synthetic Engine Oil 0W-20 is a next-generation premium engine lubricant designed for advanced petrol engines requiring ultra-low viscosity oil. It provides instant lubrication at start-up, even in extremely cold conditions, while maintaining exceptional protection at high temperatures.\r\n\r\nThis formulation enhances fuel economy, minimizes engine wear, supports hybrid and start-stop technologies, and ensures long engine life with superior cleanliness and reduced emissions.', '5W-40', NULL, NULL, NULL, 'products/gQfqTBnogLjXqkDxMIcRTtmxfENUEzZ1lNzLP01G.jpg', NULL, NULL, 1, 1, '2025-12-02 23:36:28', '2025-12-23 08:21:44'),
(2, 1, 'SuperStar Fully Syn. Engine Oil 5W20 – 5L', 'superstar-fully-syn-engine-oil-5w20-5l', 'SMO-5W20-CB-5L', 'Ultra-low viscosity fully synthetic engine oil designed to maximize fuel efficiency and protect high-performance modern engines.', 'SuperStar COBALT Eco Power Fully Synthetic Engine Oil 5W-20 is specially developed for new-generation petrol engines requiring lighter viscosity oils. Its advanced formulation ensures rapid oil circulation at cold start while maintaining strong protection under high operating temperatures.\r\n\r\nThis oil significantly improves fuel economy, minimizes internal engine friction, and protects critical engine components from wear, corrosion, and harmful deposits. It is ideal for modern vehicles equipped with start-stop systems, turbochargers, and emission control technologies.', NULL, NULL, NULL, NULL, 'products/GORZ1sVUzwKdNB33uwzQdLHg2rAYGJYWMwZtQyQD.jpg', NULL, NULL, 1, 1, '2025-12-02 23:36:28', '2025-12-23 08:22:01'),
(3, 1, 'SuperStar Fully Syn. Engine Oil 5W30 – 5L', 'superstar-fully-syn-engine-oil-5w30-5l', 'SMO-5W30-CB-5L', 'Advanced fully synthetic engine oil formulated for superior engine protection, improved fuel efficiency, and extended drain intervals.', 'SuperStar COBALT Eco Power Fully Synthetic Engine Oil 5W-30 is engineered using advanced synthetic base oils and modern additive technology to deliver outstanding engine protection and performance. Designed for modern petrol engines, this oil ensures excellent lubrication at both low and high temperatures.\r\n\r\nIts low-viscosity formulation improves fuel economy, reduces engine friction, and provides exceptional protection against wear, sludge, and oxidation. Ideal for passenger cars, turbocharged engines, and vehicles operating under severe driving conditions.', NULL, 'SAE Grade: 5W-30\r\nAPI Performance Level: SP\r\nBase Oil Type: Fully Synthetic\r\nNet Volume: 5 Litres\r\nApplication: Modern petrol engines', NULL, NULL, 'products/CHOTPQ012EZZLD5snSHDYV1lDRv6Psiswjp40wqN.jpg', NULL, NULL, 1, 1, '2025-12-02 23:36:28', '2025-12-23 08:22:14'),
(10, 1, 'SuperStar Diesel Engine Oil CI- 4 25L', 'superstar-diesel-engine-oil-ci-4-25l', 'SDO-SAE50-CI4-25L', 'High-performance heavy-duty diesel engine oil formulated to deliver superior protection, durability, and reliability for commercial and industrial diesel engines.', 'SuperStar Diesel Engine Oil SAE 50 (API CI-4) is a premium-quality heavy-duty monograde engine lubricant specially engineered for high-output diesel engines operating under severe service conditions. Formulated with high-grade base oils and advanced additive technology, it provides excellent protection against wear, soot buildup, oxidation, and deposit formation.\r\n\r\nDesigned for use in trucks, buses, construction equipment, generators, and agricultural machinery, this oil ensures stable performance under continuous high loads and extreme operating temperatures. Its strong oil film strength improves engine durability, reduces maintenance costs, and extends engine service life.\r\n\r\nThis 25-litre pack is ideal for fleet operators, workshops, and industrial users requiring bulk lubrication solutions with consistent performance and reliability.', NULL, 'SAE Grade: 50\r\nAPI Performance Level: CI-4\r\nBase Oil Type: Mineral\r\nNet Volume: 25 Litres\r\nApplication: Heavy-duty diesel engines (commercial & industrial)', NULL, NULL, 'products/MoeGNyOIBaB3CVU1NJbpUzGXcoxV9igpBTljAXt6.png', NULL, NULL, 1, 0, '2025-12-08 10:02:04', '2025-12-11 13:42:11'),
(11, 1, 'SuperStar Diesel Engine Oil HD-50 5L', 'superstar-diesel-engine-oil-hd-50-5l', 'SDO-HD50-5L', 'High-performance monograde diesel engine oil engineered for heavy-duty commercial vehicles, offering strong wear protection and reliable performance under high-load conditions.', 'SuperStar Diesel Engine Oil HD 50 is a premium-quality monograde lubricant specially formulated for heavy-duty diesel engines operating under severe service conditions. Developed with high-quality base oils and advanced additive technology, it delivers excellent protection against engine wear, corrosion, oxidation, and deposit formation.\r\n\r\nThis oil ensures consistent lubrication performance at high operating temperatures, making it ideal for trucks, buses, construction equipment, generators, and agricultural machinery. Its strong film strength helps extend engine life while maintaining smooth engine operation even under continuous load and harsh working environments.', NULL, 'SAE Grade: HD 50\r\nAPI Performance Level: CD / SF\r\nNet Volume: 5 Litres\r\nApplication: Heavy-duty diesel engines', NULL, NULL, 'products/2UiSDzBKaTPe4bNPgbpGSA9uKZAItGjROQofjoVR.png', NULL, NULL, 1, 0, '2025-12-08 13:22:44', '2025-12-11 13:41:32'),
(12, 1, 'SuperStar MG Motor Oil 20W50 5L', 'superstar-mg-motor-oil-20w50-5l', 'SMO-20W50-5L', 'Premium multigrade engine oil designed for both petrol and diesel engines, delivering excellent performance, engine protection, and reliability across varying driving conditions.', 'SuperStar Multigrade Motor Oil SAE 20W-50 is a high-quality, all-season engine lubricant developed to provide consistent performance and superior engine protection in both petrol and diesel vehicles. Its multigrade formulation ensures smooth cold starts while maintaining strong oil film strength at higher temperatures.\r\n\r\nThis oil effectively protects against engine wear, corrosion, and sludge formation while helping to improve engine efficiency and longevity. It is ideal for passenger cars, SUVs, light commercial vehicles, and older engines that require higher viscosity oil.', NULL, 'SAE Grade: 20W-50\r\nAPI Performance Level: SL / CF\r\nNet Volume: 5 Litres\r\nApplication: Petrol & Diesel Engines', NULL, NULL, 'products/86wNWSbxMjBiqPJbsvFaj574GK3CtsexfmIgDhS1.png', NULL, NULL, 1, 0, '2025-12-08 13:40:16', '2025-12-11 13:39:31'),
(13, 1, 'SuperStar Syn. Engine Oil 10W30 5L', 'superstar-syn-engine-oil-10w30-5l', 'SMO-10W30-CB-5L', 'Premium fully synthetic engine oil designed for excellent fuel efficiency, smooth engine operation, and long-lasting protection for modern vehicles.', 'SuperStar COBALT Eco Power Fully Synthetic Engine Oil 10W-30 is formulated using high-performance synthetic base oils and advanced additives to deliver superior protection and efficiency in modern petrol engines. It offers excellent lubrication during cold starts while maintaining strong oil film protection at high operating temperatures.\r\n\r\nThis engine oil minimizes friction, improves fuel economy, and protects vital engine components from wear, sludge, and harmful deposits. It is ideal for daily-driven passenger cars, SUVs, and light commercial vehicles operating under varied driving conditions.', NULL, 'SAE Grade: 10W-30\r\nAPI Performance Level: SN\r\nBase Oil Type: Fully Synthetic\r\nNet Volume: 5 Litres\r\nApplication: Modern petrol engines', NULL, NULL, 'products/24La6Bb1dLeDgF9nw7XQk6MAU4bcNc4yGo5HxzWO.jpg', NULL, NULL, 1, 1, '2025-12-08 14:41:14', '2025-12-18 14:00:29'),
(14, 1, 'SuperStar Syn. Engine Oil 10W40 5L', 'superstar-syn-engine-oil-10w40-5l', 'SMO-10W40-CB-5L', 'High-performance fully synthetic engine oil providing excellent protection for engines operating under high temperature and load conditions.', 'SuperStar COBALT Eco Power Fully Synthetic Engine Oil 10W-40 is engineered for vehicles that demand strong protection under demanding driving environments. Its advanced formulation ensures optimal viscosity control, strong oil film strength, and excellent resistance to oxidation and thermal breakdown.\r\n\r\nThis oil reduces engine noise, protects against wear and corrosion, and maintains engine cleanliness throughout extended drain intervals. It is suitable for both modern and high-mileage petrol engines.', NULL, 'SAE Grade: 10W-40\r\nAPI Performance Level: SN\r\nBase Oil Type: Fully Synthetic\r\nNet Volume: 5 Litres\r\nApplication: Petrol engines & light commercial vehicles', NULL, NULL, 'products/5Y6vpvozzrwQGsTMK6oA6JhVAEnKYycoKduzN54I.jpg', NULL, NULL, 1, 1, '2025-12-08 14:42:38', '2025-12-11 13:38:49'),
(15, 1, 'SuperStar Prem. Engine Oil 15W40 5L', 'superstar-prem-engine-oil-15w40-5l', 'SMO-15W40-CH-5L', 'Reliable premium mineral engine oil delivering dependable protection for older petrol and diesel engines under normal operating conditions.', 'SuperStar CHALLENGER High Protection Premium Mineral Engine Oil 15W-40 is a high-quality multigrade mineral lubricant developed to protect engines from wear, corrosion, and harmful deposits. It ensures stable viscosity across a wide temperature range and delivers consistent lubrication performance in everyday driving conditions.\r\n\r\nThis oil is especially suitable for older model vehicles, light commercial vehicles, and engines that require a thicker viscosity for proper lubrication and protection.', NULL, NULL, 'SAE Grade: 15W-40\r\nAPI Performance Level: SD\r\nBase Oil Type: Premium Mineral\r\nNet Volume: 5 Litres\r\nApplication: Petrol & Diesel engines (older models)', NULL, 'products/65NhebyxeJOIbo2Tr8fsTyc7DTlS9mHf5ZGZQuTw.jpg', NULL, NULL, 1, 1, '2025-12-08 14:45:09', '2025-12-11 13:38:36'),
(16, 1, 'SuperStar Engine Oil 20W50 5L', 'superstar-engine-oil-20w50-5l', 'SMO-20W50-AD-CI4-5L', 'High-performance premium mineral engine oil specially formulated for high-mileage diesel engines, delivering strong protection under heavy-duty operating conditions.', 'SuperStar ADVANCE High Kilometre Premium Mineral Engine Oil 20W-50 (API CI-4) is engineered for diesel engines that operate under high load, long running hours, and severe driving environments. Its high-viscosity formulation provides excellent oil film strength to protect worn engine components and reduce oil consumption in high-kilometre vehicles.\r\n\r\nFormulated with high-quality mineral base oils and a robust additive package, it offers superior protection against wear, soot, sludge, oxidation, and corrosion. This makes it ideal for trucks, buses, construction machinery, generators, and commercial fleets operating in hot climates.', NULL, NULL, NULL, NULL, 'products/wumdT3GJhwWko4UuJSPmtkjewS8C0O7z6T2x7R9l.jpg', NULL, NULL, 1, 1, '2025-12-08 14:50:57', '2025-12-18 14:19:17'),
(17, 1, 'SuperStar Prem. Engine Oil 20W50 5L', 'superstar-prem-engine-oil-20w50-5l', 'SMO-20W50-AD-SLCF-5L', 'Premium multigrade mineral engine oil for high-mileage petrol and diesel vehicles, offering excellent protection, oil stability, and reduced engine wear.', 'SuperStar ADVANCE High Kilometre Premium Mineral Engine Oil 20W-50 (API SL/CF) is specially developed for older and high-mileage petrol and light diesel engines. Its thick viscosity helps compensate for internal engine wear, improves oil pressure, and reduces oil consumption.\r\n\r\nThe advanced additive formulation protects the engine against wear, corrosion, sludge, and carbon deposits while ensuring smooth engine performance in daily driving and demanding traffic conditions. It is an ideal lubricant for sedans, SUVs, pickup trucks, and light commercial vehicles operating in hot and dusty environments.', NULL, 'SAE Grade: 20W-50\r\nAPI Performance Level: SL / CF\r\nBase Oil Type: Premium Mineral\r\nNet Volume: 5 Litres\r\nApplication: Petrol & light diesel engines', NULL, NULL, 'products/G1Scsn9pv6xaBP1oSPcDliP3TlzWeYckU2hxKXFn.jpg', NULL, NULL, 1, 1, '2025-12-08 14:53:18', '2025-12-18 14:06:32'),
(18, 5, 'SuperStar Diesel Engine Oil HD50 – 5L', 'superstar-diesel-engine-oil-hd50-5l', 'SDO-HD50-DF-5L', 'High-performance heavy-duty mineral diesel engine oil formulated for strong protection under extreme load and high-temperature operating conditions.', 'SuperStar DEFENDER Heavy Duty Mineral Diesel Engine Oil HD 50 (API CI-4) is a premium-quality monograde diesel lubricant engineered for modern high-output diesel engines operating in severe environments. Its high-viscosity formulation delivers an exceptionally strong oil film, ensuring maximum protection against wear, friction, and component failure under continuous heavy loads.\r\n\r\nBlended with high-quality mineral base oils and advanced additive technology, it provides superior resistance to oxidation, soot thickening, sludge formation, and corrosion. This oil is ideal for trucks, buses, construction equipment, generators, marine engines, and agricultural machinery operating in hot climates and high-load applications.', NULL, 'SAE Grade: HD 50\r\nAPI Performance Level: CI-4\r\nBase Oil Type: Mineral\r\nNet Volume: 5 Litres\r\nApplication: Heavy-duty diesel engines', NULL, NULL, 'products/R80Zh5CkQcdT3nuwUpjyPNnGtPVfIhzRgZ9YyUN1.jpg', NULL, NULL, 1, 1, '2025-12-08 15:01:36', '2025-12-11 13:32:39'),
(19, 5, 'SuperStar Diesel Engine Oil HD 70 – 5L', 'superstar-diesel-engine-oil-hd-70-5l', 'SDO-HD70-VG-5L', 'Extra heavy-duty mineral diesel engine oil developed for extreme-duty diesel engines requiring ultra-thick oil for maximum protection.', 'SuperStar VIGOR Super Duty Mineral Diesel Engine Oil HD 70 (API CI-4) is an ultra-high viscosity diesel engine lubricant specially designed for extreme operating conditions where maximum oil film strength is critical. It is ideal for severely worn engines, high-load industrial applications, and equipment operating under constant stress and elevated temperatures.\r\n\r\nIts advanced additive system provides exceptional wear protection, superior oxidation resistance, and strong defense against sludge, soot, and corrosion. This oil is widely recommended for mining equipment, marine engines, heavy construction machinery, and older high-capacity diesel engines.', NULL, 'SAE Grade: HD 70\r\nAPI Performance Level: CI-4\r\nBase Oil Type: Mineral\r\nNet Volume: 5 Litres\r\nApplication: Extreme-duty diesel engines', NULL, NULL, 'products/Jnj8lgSSA1NIJOOrAQmTEjEx2XnCDbUeijfDd9Xf.jpg', NULL, NULL, 1, 1, '2025-12-08 15:04:20', '2025-12-18 14:04:31'),
(20, 1, 'SuperStar Premium Engine Oil 15W40 5L', 'superstar-premium-engine-oil-15w40-5l', 'SDO-15W40-CH-CI4-5L', 'High-performance premium mineral diesel engine oil designed for strong protection and reliable performance in heavy-duty diesel engines.', 'SuperStar CHALLENGER High Protection Premium Mineral Engine Oil 15W-40 (API CI-4) is a high-quality multigrade diesel engine lubricant engineered for commercial and industrial diesel engines operating under demanding conditions. Its advanced additive technology ensures excellent protection against wear, soot, oxidation, and deposit formation.\r\n\r\nThe balanced 15W-40 viscosity provides smooth cold starts and stable lubrication at high operating temperatures. This oil is ideal for trucks, buses, construction equipment, generators, agricultural machinery, and fleet operations requiring dependable performance and extended engine life.', NULL, 'SAE Grade: 15W-40\r\nAPI Performance Level: CI-4\r\nBase Oil Type: Premium Mineral\r\nNet Volume: 5 Litres\r\nApplication: Heavy-duty diesel engines', NULL, NULL, 'products/DHgg7MiZLztStuDmM4A2js1zV6DValWZQW2UHIjJ.jpg', NULL, NULL, 1, 1, '2025-12-08 15:12:17', '2025-12-23 08:21:24'),
(21, 1, 'SuperStar Diesel Engine Oil 15W40 – 20L', 'superstar-diesel-engine-oil-15w40-20l', 'SDO-15W40-CI4-20L', 'Heavy-duty multigrade diesel engine oil in economical 20L pack, formulated for fleet, workshop, and industrial use.', 'SuperStar Diesel Engine Oil SAE 15W-40 (API CI-4) – 20 Litres is specially formulated to meet the lubrication demands of modern high-output diesel engines operating under severe working conditions. Its improved new formula delivers superior protection against wear, oxidation, corrosion, and deposit buildup.\r\n\r\nDesigned for long drain intervals and continuous heavy-load operations, this oil ensures reliable performance in trucks, buses, generators, marine engines, construction equipment, and agricultural machinery. The 20-litre pack is ideal for fleet operators, workshops, and bulk users seeking cost-effective and consistent lubrication performance.', NULL, 'SAE Grade: 15W-40\r\nAPI Performance Level: CI-4\r\nBase Oil Type: Mineral\r\nNet Volume: 20 Litres\r\nApplication: Heavy-duty diesel engines (commercial & industrial)', NULL, NULL, 'products/4fVQ3was27R1l1mR2WTI0d3aVxAhvn7IfTtOQGAz.jpg', NULL, NULL, 1, 1, '2025-12-08 15:13:19', '2025-12-23 08:21:10'),
(22, 1, 'SuperStar HD-50 Diesel Engine Oil – 20L', 'superstar-hd-50-diesel-engine-oil-20l', 'SDO-HD50-SUP-CI4-20L', 'Heavy-duty monograde diesel engine oil formulated for robust protection in high-load commercial and industrial diesel engines.', 'SuperStar SUPER HD-50 Diesel Engine Oil (API CI-4) is a high-performance monograde mineral lubricant designed for heavy-duty diesel engines operating under severe service conditions. Its high-viscosity formulation provides a strong protective oil film that safeguards critical engine components against wear, friction, and thermal stress.\r\n\r\nBlended with premium base oils and an advanced additive system, this oil offers excellent protection against oxidation, soot thickening, sludge formation, and corrosion. It is ideally suited for trucks, buses, construction equipment, generators, marine engines, and agricultural machinery working in hot climates and continuous-duty operations. The 20-litre bulk pack is perfect for fleet operators and workshops.', NULL, 'SAE Grade: HD 50\r\nAPI Performance Level: CI-4\r\nBase Oil Type: Mineral\r\nNet Volume: 20 Litres\r\nApplication: Heavy-duty diesel engines', NULL, NULL, 'products/27gkOxz0Q5VI3Ztmnljf2YH12hpfKfCjVwAS1jSY.jpg', NULL, NULL, 1, 1, '2025-12-08 15:16:58', '2025-12-18 13:58:21'),
(23, 1, 'SuperStar HD-70 Diesel Engine Oil – 20L', 'superstar-hd-70-diesel-engine-oil-20l', 'SDO-HD70-SUP-CI4-20L', 'Ultra-heavy-duty diesel engine oil developed for extreme operating conditions and severely worn high-capacity diesel engines.', 'SuperStar SUPER HD-70 Diesel Engine Oil (API CI-4) is an ultra-high viscosity mineral diesel lubricant engineered for extreme-duty operations where maximum oil film strength is essential. It is specially recommended for older, high-capacity diesel engines, heavy construction equipment, mining machinery, and marine engines operating under continuous high loads and elevated temperatures.\r\n\r\nIts reinforced additive technology delivers superior wear protection, excellent thermal stability, and strong defense against sludge, soot, and corrosive by-products. The 20-litre pack makes it a cost-effective solution for bulk users, industrial plants, and fleet maintenance operations.', NULL, 'SAE Grade: HD 70\r\nAPI Performance Level: CI-4\r\nBase Oil Type: Mineral\r\nNet Volume: 20 Litres\r\nApplication: Extreme-duty diesel engines', NULL, NULL, 'products/V8WPgBUBepDtkIEeZ5eWULh1zL7LaumQ0xz65ApO.jpg', NULL, NULL, 1, 1, '2025-12-08 15:19:37', '2025-12-11 13:29:27'),
(24, 1, 'SuperStar 20W-50 Diesel Engine Oil – 20L', 'superstar-20w-50-diesel-engine-oil-20l', 'SDO-20W50-CI4-20L', 'High-viscosity heavy-duty diesel engine oil formulated for superior protection in high-load and high-temperature operating conditions.', 'SuperStar SAE 20W-50 Diesel Engine Oil (API CI-4) is a premium-quality multigrade mineral lubricant engineered for heavy-duty diesel engines operating under severe service conditions. Its high-viscosity formulation provides a strong and durable oil film that protects engine components from excessive wear, friction, and thermal stress, especially in hot climates and continuous-duty operations.\r\n\r\nBlended with high-quality base oils and an advanced additive package, this oil delivers excellent resistance to oxidation, sludge formation, soot thickening, and corrosion. It is ideally suited for trucks, buses, generators, construction equipment, marine engines, and agricultural machinery. The 20-litre bulk pack is ideal for fleet operators, workshops, and industrial users looking for cost-effective and reliable lubrication performance.', NULL, 'SAE Grade: 20W-50\r\nAPI Performance Level: CI-4\r\nBase Oil Type: Mineral\r\nNet Volume: 20 Litres\r\nApplication: Heavy-duty diesel engines', NULL, NULL, 'products/0r6kZz5NQMCJ4kQ6kQMpuiXhZI2Z3kx5k8cajrcZ.jpg', NULL, NULL, 1, 1, '2025-12-08 15:24:29', '2025-12-11 13:29:13'),
(25, 1, 'SuperStar Prem. Engine Oil 15W40 4L', 'superstar-prem-engine-oil-15w40-4l', 'SMO-15W40-CH-4L', 'Reliable premium mineral engine oil delivering dependable protection for older petrol and diesel engines under normal operating conditions.', 'SuperStar CHALLENGER High Protection Premium Mineral Engine Oil 15W-40 is a high-quality multigrade mineral lubricant developed to protect engines from wear, corrosion, and harmful deposits. It ensures stable viscosity across a wide temperature range and delivers consistent lubrication performance in everyday driving conditions.\r\n\r\nThis oil is especially suitable for older model vehicles, light commercial vehicles, and engines that require a thicker viscosity for proper lubrication and protection.', NULL, NULL, NULL, NULL, 'products/ljFvuqdUjjf1cYVDGck5F4cbqJbXMuN3Vj6sIrqU.jpg', NULL, NULL, 1, 1, '2025-12-18 14:08:26', '2025-12-18 14:08:26'),
(26, 1, 'SuperStar Prem. Engine Oil 20W50 4L', 'superstar-prem-engine-oil-20w50-4l', 'SMO-20W50-AD-SLCF-4L', 'Premium multigrade mineral engine oil for high-mileage petrol and diesel vehicles, offering excellent protection, oil stability, and reduced engine wear.', 'SuperStar ADVANCE High Kilometre Premium Mineral Engine Oil 20W-50 (API SL/CF) is specially developed for older and high-mileage petrol and light diesel engines. Its thick viscosity helps compensate for internal engine wear, improves oil pressure, and reduces oil consumption.\r\n\r\nThe advanced additive formulation protects the engine against wear, corrosion, sludge, and carbon deposits while ensuring smooth engine performance in daily driving and demanding traffic conditions. It is an ideal lubricant for sedans, SUVs, pickup trucks, and light commercial vehicles operating in hot and dusty environments.', NULL, 'SAE Grade: 20W-50\r\nAPI Performance Level: SL / CF\r\nBase Oil Type: Premium Mineral\r\nNet Volume: 4 Litres\r\nApplication: Petrol & light diesel engines', NULL, NULL, 'products/by4UYkPoz6xlvCnGCPdc7awvLdnpm8OvRAbnIdJ2.jpg', NULL, NULL, 1, 1, '2025-12-18 14:10:11', '2025-12-18 14:10:11'),
(27, 3, 'SuperStar TRANSMAX Fully Syn. ATF – 4L', 'superstar-transmax-fully-syn-atf-4l', 'STF-ATF-DEXIII-TX-4L', 'Fully synthetic multi-vehicle automatic transmission fluid engineered for smooth shifting, extended transmission life, and superior thermal stability.', 'SuperStar TRANSMAX Multi-Vehicle Fully Synthetic ATF DEX III is a high-performance automatic transmission fluid formulated to meet the demanding requirements of modern automatic transmissions. Developed with premium synthetic base oils and advanced friction modifier technology, it ensures smooth gear shifts, reduced transmission wear, and excellent protection under high temperatures.\r\n\r\nThis ATF provides outstanding resistance to oxidation, thermal breakdown, and deposit formation, helping to extend transmission service life. It is suitable for a wide range of passenger cars, SUVs, and light commercial vehicles requiring DEXRON® III-type fluids. The 4-litre pack is ideal for workshops and routine transmission servicing.', NULL, 'Fluid Type: ATF\r\nPerformance Level: DEX III\r\nBase Oil Type: Fully Synthetic\r\nNet Volume: 4 Litres\r\nApplication: Automatic transmissions, power steering systems (where DEX III is specified)', NULL, NULL, 'products/9LOQg1cT2L2RZUEukaJYCB46jlA0YAKgDxx7QE60.jpg', NULL, NULL, 1, 0, '2025-12-18 14:13:08', '2025-12-18 14:21:54'),
(28, 3, 'SuperStar MAXLIFE Fully Syn. ATF – 1L', 'superstar-maxlife-fully-syn-atf-1l', 'STF-ATF-DEXIII-ML-1L', 'High-performance fully synthetic ATF designed for extended transmission life, smooth operation, and superior wear protection.', 'SuperStar MAXLIFE Fully Synthetic ATF DEX III is specially formulated to deliver reliable performance and long-lasting protection for automatic transmissions operating under varied driving conditions. Its advanced synthetic formulation provides excellent lubrication, reduces friction, and ensures smooth power transfer throughout the transmission system.\r\n\r\nThis ATF helps prevent transmission shudder, minimizes wear on internal components, and maintains fluid stability over extended service intervals. The convenient 1-litre pack is ideal for top-ups and routine maintenance.', NULL, NULL, 'Fluid Type: ATF\r\nPerformance Level: DEX III\r\nBase Oil Type: Fully Synthetic\r\nNet Volume: 1 Litre\r\nApplication: Automatic transmissions & power steering systems', NULL, 'products/HKzTxuQPhtgD8fQuXQnQvpifL9ReDvQnPW6h7u1D.jpg', NULL, NULL, 1, 0, '2025-12-18 14:14:41', '2025-12-18 14:21:28'),
(29, 6, 'VORTOIL Octane Booster – 444 ml', 'vortoil-octane-booster-444-ml', 'VTA-OB-444ML', 'High-performance fuel additive designed to boost octane rating, improve engine performance, and reduce knocking in petrol engines.', 'VORTOIL Octane Booster is a premium-quality fuel additive formulated to increase the octane rating of petrol fuels, resulting in improved engine performance, smoother acceleration, and reduced engine knocking or pinging. It enhances combustion efficiency, allowing engines to operate more effectively, especially under high load, high compression, or performance-driving conditions.\r\n\r\nThis octane booster helps restore lost power, improves throttle response, and protects the engine from harmful pre-ignition and detonation. It is suitable for use in all petrol engines, including naturally aspirated, turbocharged, and high-performance vehicles. The convenient 444 ml can is ideal for single-tank treatment and regular performance maintenance.', NULL, 'Product Type: Octane Booster\r\nFuel Type: Petrol (Gasoline)\r\nNet Volume: 444 ml\r\nApplication: Add directly to fuel tank before refueling\r\nSuitable For: Passenger cars, performance cars, motorcycles (petrol engines)', NULL, NULL, 'products/jdKve3fSEaI3an0eitU0fHISlDRpTcOFabvFz0b8.jpg', NULL, NULL, 1, 0, '2026-01-04 06:24:14', '2026-01-04 06:25:43'),
(30, 6, 'VORTOIL Injector Cleaner – 444 ml', 'vortoil-injector-cleaner-444-ml', 'VTA-IC-444ML', 'High-performance fuel injector cleaner designed to remove deposits, restore injector spray patterns, and improve engine efficiency.', 'VORTOIL Injector Cleaner is a premium fuel additive formulated to clean fuel injectors, intake valves, and combustion chamber components. It effectively removes carbon deposits, gum, and varnish buildup that can restrict fuel flow and disrupt proper spray patterns.\r\n\r\nBy restoring optimal fuel atomization, this injector cleaner improves combustion efficiency, enhances throttle response, reduces hesitation, and helps recover lost engine power. Regular use supports smoother engine operation, improved fuel economy, and reduced exhaust emissions.\r\n\r\nVORTOIL Injector Cleaner is suitable for all petrol engines, including modern direct injection, turbocharged, and naturally aspirated engines. The 444 ml can is ideal for single-tank treatment and routine fuel system maintenance.', NULL, 'Product Type: Fuel Injector Cleaner\r\nFuel Type: Petrol (Gasoline)\r\nNet Volume: 444 ml\r\nApplication: Add directly to fuel tank before refueling\r\nRecommended Use: Periodic fuel system maintenance', NULL, NULL, 'products/RXombXcSsMJT8VgiWohA0bRmLJUoLvuFkrCPeI4u.jpg', NULL, NULL, 1, 0, '2026-01-04 06:31:34', '2026-01-04 06:32:04'),
(31, 5, 'VORTOIL Hi-Temp EP2 Multipurpose Grease – NLGI 2', 'vortoil-hi-temp-ep2-multipurpose-grease-nlgi-2', 'VTG-EP2-HT-NLGI2', 'High-performance fuel injector cleaner designed to remove deposits, restore injector spray patterns, and improve engine efficiency.', 'VORTOIL Injector Cleaner is a premium fuel additive formulated to clean fuel injectors, intake valves, and combustion chamber components. It effectively removes carbon deposits, gum, and varnish buildup that can restrict fuel flow and disrupt proper spray patterns.\r\n\r\nBy restoring optimal fuel atomization, this injector cleaner improves combustion efficiency, enhances throttle response, reduces hesitation, and helps recover lost engine power. Regular use supports smoother engine operation, improved fuel economy, and reduced exhaust emissions.\r\n\r\nVORTOIL Injector Cleaner is suitable for all petrol engines, including modern direct injection, turbocharged, and naturally aspirated engines. The 444 ml can is ideal for single-tank treatment and routine fuel system maintenance.', NULL, 'Product Type: Fuel Injector Cleaner\r\nFuel Type: Petrol (Gasoline)\r\nNet Volume: 444 ml\r\nApplication: Add directly to fuel tank before refueling\r\nRecommended Use: Periodic fuel system maintenance', NULL, NULL, 'products/RDXSrB65Cpo5qaJeEv5ARju0qKi5gERNnejbVAoy.jpg', NULL, NULL, 1, 0, '2026-01-04 06:38:27', '2026-01-04 06:38:27'),
(32, 1, 'Vortoil Product List', 'vortoil-product-list', 'Vortoil Product List', NULL, NULL, NULL, NULL, NULL, NULL, 'products/hNzfi7c7h7D9YPe3UY0TUnfJZ51xp6Yc4ekgmvmY.jpg', 'docs/KDAMgPrZaj2HZ1EhgntgBDoXgyFGYFTXb9uAGqnu.pdf', NULL, 1, 0, '2026-01-05 06:55:28', '2026-01-05 13:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Engine Oils', 'engine-oils', 'Premium quality engine oils for all vehicle types', 1, '2025-12-02 23:36:28', '2025-12-02 23:36:28'),
(2, 'Hydraulic Fluids', 'hydraulic-fluids', 'High-performance hydraulic fluids for industrial applications', 1, '2025-12-02 23:36:28', '2025-12-02 23:36:28'),
(3, 'Transmission Oils', 'transmission-oils', 'Specialized transmission and gearbox lubricants', 1, '2025-12-02 23:36:28', '2025-12-02 23:36:28'),
(4, 'Coolants', 'coolants', 'Engine coolants and antifreeze solutions', 1, '2025-12-02 23:36:28', '2025-12-02 23:36:28'),
(5, 'Industrial Lubricants', 'industrial-lubricants', 'Lubricants for industrial machinery and equipment', 1, '2025-12-02 23:36:28', '2025-12-02 23:36:28'),
(6, 'Automotive Additives', 'automotive-additives', 'Fuel Additives are specialized formulations designed to enhance fuel quality, improve engine performance, reduce knocking, and support cleaner, more efficient combustion while protecting fuel system components.', 1, '2026-01-04 06:21:06', '2026-01-04 06:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Lubricant Manufacturing', 'We manufacture a full range of high-quality lubricants including petrol engine oil, diesel engine oil, hydraulic oil, gear oil, brake fluids, automotive transmission fluid (ATF), specialty lubricants, industrial lubricants, marine lubricants, and greases.', 'fa-cogs', 'services/DYnlDIB5C6L9RoLCWrP2bPSky6m0y4boRX2QanP5.jpg', '2025-12-02 23:36:29', '2025-12-03 09:54:20'),
(2, 'Blending & Filling Services', 'Our large-scale blending and filling capacity includes lubricant blending (65,000 MT/annum), viscosity improver blending (10,000 MT/annum), filling & packaging services, third-party blending & filling for other brands, and export packaging services.', 'fa-filter', 'services/8iPBRykc6zNYLdVoEbBUwmic0oQjSxz82WqUoMd6.jpg', '2025-12-02 23:36:29', '2025-12-08 15:51:17'),
(3, 'Private Label Manufacturing', 'We help clients build their own brands through custom lubricant formulation, custom packaging & labeling, brand identity creation, graphic design for labels, and production & supply for private-label clients.', 'fa-tag', 'services/B5fUCu2u8lIu4ZxGHpro0NA2aqLT7IF5v2iiqnDQ.jpg', '2025-12-02 23:36:29', '2025-12-03 09:58:24'),
(4, 'Laboratory Testing Services', 'Our in-house lab provides comprehensive quality assurance testing including lubricant formulation testing, grease testing, ICP analysis, FTIR analysis, viscometer testing, flash point testing, pour point testing, density testing, four ball testing, penetrometer testing, drop point testing, water wash test, and oil separation test.', 'fa-flask', 'services/hF1r6LFtYtrbzvXZWOEQoO2V5Va9OKSSIOSzgwtO.jpg', '2025-12-02 23:36:29', '2025-12-08 15:47:11'),
(5, 'Research & Development', 'We provide continuous product improvement, development of new lubricant formulas, performance enhancement research, and technological innovation for advanced lubricants to meet evolving market demands.', 'fa-book', 'services/ncmufsGqhvMgFuLlkGsCkdrOewrF4w5ebqHX4t2Z.jpg', '2025-12-02 23:36:29', '2025-12-08 15:48:14'),
(6, 'Specialized Consulting Services', 'Our expert consulting team offers lubrication planning, lubricant selection guidance, technical consulting for machinery lubrication, and customized lubricant formulations for specific industries and applications.', 'fa-comments', 'services/MWWLfb4aHrl5O4aoomAOrSytwj8JMQwUbtSyTUzZ.jpg', '2025-12-02 23:36:29', '2025-12-03 10:02:35'),
(7, 'Global Export Services', 'We export lubricants to Middle East, Africa, South Asia, and Russia with tailored lubricant solutions for international climate demands and comprehensive support for global distribution partners.', 'fa-globe', 'services/ioreIenRV8CM9QQ8Jwz0y7GDWiXwe2d0e3HenQoX.jpg', '2025-12-02 23:36:29', '2025-12-03 10:04:12'),
(8, 'Health, Safety & Environment (HSE) Compliance', 'We maintain rigorous workplace safety systems, environmental compliance processes, eco-friendly production methods, and provide training & safety protocol implementation to ensure the highest standards.', 'fa-shield', 'services/osj0a6ZkLFPGHIFj3i8MpsNdQayOiaPACPiqLNyz.jpg', '2025-12-02 23:36:29', '2025-12-03 10:05:39'),
(9, 'Industry-Specific Lubrication Solutions', 'We offer industry-specific lubrication products and solutions for automotive, heavy-duty vehicles, motorcycles, agriculture, earth-moving equipment, industrial machinery, and marine sectors.', 'fa-wrench', 'services/wB0efec0A513nIkHSPN0sDSk8NstlOJBkCUNctHw.jpg', '2025-12-02 23:36:29', '2025-12-08 16:07:38'),
(10, 'Customer Support & Delivery Services', 'We provide 24/7 customer service, maintain large inventory availability, and offer fast delivery services to ensure our clients receive the products they need when they need them.', 'fa-truck', 'services/rXHh5A6shmlq4NlF5Nsiz0MiydIdpcebjgPxxPMh.jpg', '2025-12-02 23:36:29', '2025-12-03 10:08:21');

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
('1jZxeTtG7hNujJoM8EsVXeG2bqKmXeS9zLoSXIqO', NULL, '93.158.90.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWRSUDRYWFlDZjNuNjRkanJEWFA4WUhxYXg4TWh3Q2o5VGFTUnYyRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly91bGcuYWUvcHJvZHVjdHMvc3VwZXJzdGFyLWZ1bGx5LXN5bi1lbmdpbmUtb2lsLTV3MzAtNWwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768722921),
('2CN3JirsmDitTqgOBLSUxRHEbBcRpjJOpI3o0DbU', NULL, '40.77.167.131', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1NiTEQ5M3FuTU5NdVNSbGZ2ZUlKeGJ6YXF4QkFsTm5paHFhRlU5YyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjU6Imh0dHA6Ly93d3cudWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci0yMHctNTAtZGllc2VsLWVuZ2luZS1vaWwtMjBsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768732102),
('4fA4akB3tTFVYNUQe0K6CKFC2eOn9C0jL1V9dkas', NULL, '198.244.183.168', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkN0bU5iUkdBY2IzVXZKSDJLYXRscjRQc296Y3Q2M0w1bW9rdU5zQyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjM6Imh0dHBzOi8vd3d3LnVsZy5hZS9wcm9kdWN0cy9zdXBlcnN0YXItdHJhbnNtYXgtZnVsbHktc3luLWF0Zi00bCI7czo1OiJyb3V0ZSI7czoxMzoicHJvZHVjdHMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768773809),
('4wORSoKNE46ShLKD9rtPyx1I5bEmPBRIMhxnEI2i', NULL, '207.46.13.17', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieWxOTnl0ODljNUlmOG0wakJIRkVFQThvTXUyeXhOTDVaR3JtandaNCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vdWxnLmFlL3NpdGVtYXAueG1sIjtzOjU6InJvdXRlIjtzOjExOiJzaXRlbWFwLnhtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768730062),
('53JXbtS2IBC8zs67ZQen8kWLsqQc5tVzdWAhlEcT', NULL, '217.165.247.216', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1o4WlFad0pJUXNjaWswNlczMm9mQVpDQTNPRkpZZ3FmRWtWZmdHNiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768740161),
('568DEZ44JKFiHHMQRnFjFAS4xTu94CC7ctS61XBj', NULL, '54.38.147.148', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGdMajl3ZmtSUDlxck9UMENpNEQ4UjR1RGkzMTVYQnl0SGF4TGEzMCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL2NhdGVnb3J5L2VuZ2luZS1vaWxzP3BhZ2U9MiI7czo1OiJyb3V0ZSI7czoyMDoicHJvZHVjdHMuYnktY2F0ZWdvcnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768767760),
('5HlDg9J4IuUEKtEeO5L2TavEgfUVG3ghLJ6H1OUJ', NULL, '51.89.129.50', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXp6TjUxZGhCaFRBQTdxREZyRTJJUW03dHZhVkxCZmZwZHZ6WDZPTCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vd3d3LnVsZy5hZS9wcm9kdWN0cy9zdXBlcnN0YXItbWF4bGlmZS1mdWxseS1zeW4tYXRmLTFsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768783845),
('665Txjl71WejATrgb4YcvzEjEX0oEVR0ELaAmmIL', NULL, '17.246.19.198', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Safari/605.1.15 (Applebot/0.1; +http://www.apple.com/go/applebot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkhKeklkYmVJYWZNNGNrbVZlZjVtM2J1ZnI3QUdrZ0lHZEkxVnpEeCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTc6Imh0dHA6Ly93d3cudWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768717009),
('6rwx8U9Nc12EtJ1jCGqsMVVnpuOmwt979CcwV6MN', NULL, '103.166.245.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnhhOUhXdkdTTEpXdk5ldnd5d1lVOHVxR0hub1RNcUxlTnNUZjVOWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768803519),
('6UjoJaJtJDPWRNhzlDE4TWdOfIlLOFaGKS7sczCX', NULL, '51.195.183.252', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTMybGVPSGFPRTdJcmd2M1dGU0xPekFHN293d0dsVmQ3OGlZelZjdCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjM6Imh0dHBzOi8vd3d3LnVsZy5hZS9wcm9kdWN0cy9zdXBlcnN0YXItZGllc2VsLWVuZ2luZS1vaWwtaGQ1MC01bCI7czo1OiJyb3V0ZSI7czoxMzoicHJvZHVjdHMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768742652),
('7lRGTlKjZWqvLeXTISog54EGnbuOVBr2myTC3v5n', NULL, '2.51.124.131', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkNUNUYyWEhpRmEydDZqYzBUMWNTWXB6WFU0aEpmZkZCc0lweUFNdiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768803675),
('9p7xDaoc1pFgT1smbL1ByjD8U8r0YnDGerQqoxED', NULL, '51.89.129.17', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialJPc0RsNk9MWUpsQ01jWGk5RnBkMTF0dHhkTkNJeGVROHphMXc1TyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1mdWxseS1zeW4tZW5naW5lLW9pbC01dzMwLTVsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768730483),
('a58loAbm9guumxUU6q6whYMDUXivj4cpVplCAWvX', NULL, '198.244.183.15', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2NrYnNpVWM4NlR5QTlkZkNIa3NQY2lVR1lnVkxPeWswQ2JkSDNFSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1tZy1tb3Rvci1vaWwtMjB3NTAtNWwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768758970),
('AiiXgFmlm80UvQ9zmLrhN3xVzUssF7s2Mzc2S6Y6', NULL, '207.46.13.168', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0lpRUt4Y0p4djZmdlFQczZkd2VYOFZVNVl1bGo0Uk50SEpjNWl2MiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vd3d3LnVsZy5hZS9zaXRlbWFwLnhtbCI7czo1OiJyb3V0ZSI7czoxMToic2l0ZW1hcC54bWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768749757),
('aLzekZVaR4z5Nsi7E1SijRcR6a2KGfvPhaOE3b9o', NULL, '20.215.220.204', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmhCRWF1UHF5WjgwdVBYcTZmY21xTUNGTHFFTXV4cHlQeGZHd3FXUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768717841),
('BE6KSbpzOEqS2fQkpIsNdLrBEbXPXV0G2oeWNFrl', NULL, '54.38.147.216', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUFVDVUU3azBsV2w4RHozcDNBOHZFeDVXQWl0U3hnZnNIOTQzaW44byI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTg6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1tYXhsaWZlLWZ1bGx5LXN5bi1hdGYtMWwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768799274),
('BK7YbJvd0LaGhJZ6Pz8Yf0oVRs3y8ByU5bTfiKrb', NULL, '51.89.129.175', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHBHNm5HQVhPSUhqbHZUNUVBcHhFYTZMT1RaRXU2bkF0aEJWdUZRVSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1oZC01MC1kaWVzZWwtZW5naW5lLW9pbC0yMGwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768788528),
('bSzf3ILPsC26yom6Fj2LizC0BKBejLeXhp5TMvJs', NULL, '198.244.240.170', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUE0ZzRMUGVpMWxPRDVwVHJqeEhPMm9uQ2JkOGd1ZzQ3ejZMM0xmdSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci0yMHctNTAtZGllc2VsLWVuZ2luZS1vaWwtMjBsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768792972),
('BVd1FkxNfZJoJBCMCcSII6yx3KBIULFXlDqDdyiH', NULL, '52.167.144.183', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlpTV3dMNDBrZjRYN3pXbmxqMjVIVEFxV3p2elUwbk5YamVhbHkzVyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1mdWxseS1zeW4tZW5naW5lLW9pbC01dzMwLTVsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768736727),
('Cg3uk4s0ecdBzHpKWvvVcN3qTV9ZeRtlYviLwO5X', NULL, '162.120.188.97', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjEwYkFwQjA5c1hpbElUZUdtRFFHOUJiU3dzZWFmenRjNFZJT21uUSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd3d3LnVsZy5hZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768751185),
('dLHoz4kkYqIISRnn6gLB7odtmRVbI4xqVJRKmyKM', NULL, '52.167.144.172', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzZiWnlUeXRRS3BNMlFjV3FRRmNUbkpVcGd2WUFrSU9hWVdtQ0RpbiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768784699),
('FmrwBddbOdpcfaO6l4QuZz5haCjL2eP3BK4CQEU4', NULL, '198.244.226.3', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUw0M2M3bmY0NVdQSmRwNkM1N2tGcjQxWmJtdnpZQmhyTXpEcUl6YSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1mdWxseS1zeW4tZW5naW5lLW9pbC0wdzIwLTVsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768739696),
('FSE9CfA869RuQlGCFxsxk2j7pnmppLrs5VaHLjLb', NULL, '51.195.215.230', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiODFOZVhtZGFkMUhrdDJZMTg1VWcxNGg4bU9haldxc3FXbktQQWtTcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjQ6Imh0dHBzOi8vd3d3LnVsZy5hZS9wcm9kdWN0cy9zdXBlcnN0YXItZGllc2VsLWVuZ2luZS1vaWwtaGQtNzAtNWwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768754587),
('FvZmuqcE74lqNZ3V7vriytJxNC0Bstqwqg5IO8f6', NULL, '192.250.229.23', '', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiUmoxYlhHdUViT3VHZFBQbVdPcnhvQWFuWkQybEtoTERidWdDT1hjbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768803926),
('G3gfAh7jWggTKIqOJ8ZFOsLrcDzJPvmf0EguGoGP', NULL, '91.73.22.212', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVh0MWxjbVNHcFExWFNNMkcxOGxOeldDV056Ym0wWDI5YzVYWFNWOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768733295),
('g7R9d3NbYdMjUKdlZj3biFz7ucMk81KisSwDnaD5', NULL, '51.195.215.162', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTBoU0RLWWU5MkF0S2pmTG9vYzNvNGJISzZ0Mms1TlNtbmJDdVRoTyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjY6Imh0dHBzOi8vd3d3LnVsZy5hZS9wcm9kdWN0cy9zdXBlcnN0YXItZnVsbHktc3luLWVuZ2luZS1vaWwtMHcyMC01bCI7czo1OiJyb3V0ZSI7czoxMzoicHJvZHVjdHMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768748154),
('GkB0oKCJxnKS981WILbSKvHpEA55bpOKvFtnO9QM', NULL, '198.244.168.179', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1c5UksxRlpVeGR1VnIwUjZYYjVZNXR0SkF0OFFYa2IxSmhyMmtXdyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vd3d3LnVsZy5hZS9wcm9kdWN0cy9zdXBlcnN0YXItcHJlbS1lbmdpbmUtb2lsLTIwdzUwLTVsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768765552),
('hFCDs7DDHRJHU43UzVN5uej92LJL3ik741fnWPMO', NULL, '162.120.187.97', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTJ6ZXQ4ZlM3VzZWUjl1UDRCVFFaRXZpSUJvYlFSZmZJUml0MEw3ZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd3d3LnVsZy5hZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768732368),
('infJbQ8BbSahyTva62jSaA7kgkAQJDKjoHCxnrPE', NULL, '20.215.220.125', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielY0YlUzamw3czZ0RUFnUnRJekkyaVBWZ2dLdk9CVzNVZjJkTTZjWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768803743),
('k3skIl0Se2PI2MFNluXJa6EDiRZ9uYwMgcRcrnjZ', NULL, '51.195.244.225', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnlIYzIyaXVMcVp4emNQRGJSM1dER3JSQUF2Q0MwZzdlQ1VwNUdCRCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768791019),
('kGg8OaBYXoBiZh1S1SofTHNdwJI4ytf8ASiIs1tS', NULL, '162.120.188.97', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3VmalpCeHFKUENxYW9ZSWpVQXhzTGd0OWtsNGt4ZzZ4RUhYUUdtbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd3d3LnVsZy5hZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768751480),
('KU1EFAkuFGNopNG7h336YTeDHZdbtIhGk4Uk4luz', NULL, '103.203.72.32', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTRUUXlxeDlObk5YODFmZ1NJcGZrTzhaQU93eHo5ZXNtTjdzTE11MiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768721591),
('LJactW2sfpryzbqcy8BtfzC6KYAx6ST2CnqhfH72', NULL, '207.46.13.168', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNU1tREIwS0M3aXNkR1pnWmpZbWFpelp3Skcya3QyMEhya3BoUWx3WCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly93d3cudWxnLmFlL3NlcnZpY2VzIjtzOjU6InJvdXRlIjtzOjE0OiJzZXJ2aWNlcy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768783013),
('Lspcb9LUjykglJBkBXgJtIgMhEbpat7D6gaXXowh', NULL, '5.38.44.242', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHIwa2pCRHY1YVhTT1FIdTdGUHVlWjlOTHNKaVZHMFg4Wm1vZm9qQyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LnVsZy5hZS9wcm9kdWN0cyI7czo1OiJyb3V0ZSI7czoxNDoicHJvZHVjdHMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768775154),
('MJ7u0TzliYIDZHust16DxTr4lXqOM7zpnG59UffL', NULL, '40.77.167.73', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieERhNEthUDBzc2I0UzZhZWIzUU53bklrQ2syYzdYcGpVSlhCU1dvNiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd3d3LnVsZy5hZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768717276),
('NkhGixHl5VZcuwjmidLOko0ysGAdr8RwHFecKLAV', NULL, '51.89.129.220', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjVQWkFVS1F0NUhFcE96Umg3NGpCWHpoVmMzRmhCdXJNRm9Ubk9FTiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjY6Imh0dHBzOi8vd3d3LnVsZy5hZS9wcm9kdWN0cy9zdXBlcnN0YXItZnVsbHktc3luLWVuZ2luZS1vaWwtNXczMC01bCI7czo1OiJyb3V0ZSI7czoxMzoicHJvZHVjdHMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768736539),
('NvICs6Wyi3xcF9BI1rAm1nWIizhh14imoa1xVB4i', NULL, '51.195.244.165', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2hCVDVjM25ZM1RRYUIzZm5DZ0JpeWp3UTdleVV4N20wb3JyWWtTUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd3d3LnVsZy5hZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768777103),
('nWn6xQ3jtIkt5hlg0xDAS8Jq8yeoEz54HV0QxvB3', NULL, '157.55.39.58', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWhQM0d6eDFBSG02TkdWVEFLMXlDeGxuTDh4ZlFYR0RrTldsNjdwcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjM6Imh0dHA6Ly93d3cudWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1kaWVzZWwtZW5naW5lLW9pbC1jaS00LTI1bCI7czo1OiJyb3V0ZSI7czoxMzoicHJvZHVjdHMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768761725),
('OHIxctQFupXmx3bxHT7yXLh7frh3Rl8Z1G33MPvB', NULL, '198.244.168.60', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidFBtY294RTRDODN2b3habUFuTGdFdXpOcTVKSzFRdGdTWmJkVEVjciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjI6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1mdWxseS1zeW4tZW5naW5lLW9pbC01dzIwLTVsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768733191),
('Oj9mOqMTY16X5hSFfuzi2a1NgFNqbNbVsPzhUfgp', NULL, '93.158.90.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDEyOUNQMjhxaHFZTVRLa2xRZGttMHVkSThvSUd5S3J4VmdhdUx0VCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly91bGcuYWUvcHJvZHVjdHMvc3VwZXJzdGFyLWZ1bGx5LXN5bi1lbmdpbmUtb2lsLTB3MjAtNWwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768722920),
('p49XMDQg9hSHHLUF63hwSAgtAmbvUYLtrwfLfQXS', NULL, '157.55.39.55', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicEducUdVNW1zR3N3bUZCMFFFRmtTeHNsNGY1NDk5eUpqNkppbU5sciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly93d3cudWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1wcmVtLWVuZ2luZS1vaWwtMTV3NDAtNGwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768755836),
('PBsVsPG3u2gmwnuSGmBfyrvS3Bx37u5aIC5vktEH', NULL, '20.215.220.124', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0tjbHI5dHNKdzVVRFpmZ2pIVktsMmd2TnVVTzdoTEFmWXVpSk5aRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768749849),
('PKUHVaCnFhYFxIpXLK5Abvj7ehB1wtTFXtn7pDLd', NULL, '52.167.144.188', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2liSE5VSEFBNTJvTktEb1RYbXN5VXNXQVQ4WG1pcFBnUEIzbExKaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd3d3LnVsZy5hZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768803749),
('ptCqsOSfV3wVkQac9Y2tOJd7WTB7l1xtG2xkhBzr', NULL, '93.158.90.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicExLUHVWMlhvTjg0NDRub3l5d2x4eFlEWkRhbkVxMHJLVXNqRmZ6MCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly91bGcuYWUvcHJvZHVjdHMvc3VwZXJzdGFyLWZ1bGx5LXN5bi1lbmdpbmUtb2lsLTV3MjAtNWwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768722921),
('PwSdG6n0uvCxYYzHvasIe3Ipxmoj4cTEWwtgfviI', NULL, '40.77.167.144', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTU2TE5YZ3dBRjZydW9DbWkyR3NDdkxMSHMxaFRCNUpUak8zOW9xWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly93d3cudWxnLmFlL3Byb2R1Y3RzP3BhZ2U9MyI7czo1OiJyb3V0ZSI7czoxNDoicHJvZHVjdHMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768721125),
('QBHJ78qoPwcpghvqbgbwNJobx2lLQi1wsg6t1XaS', NULL, '51.195.183.129', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVWtveTdKTTZJSFI4Ym9ZQTVUVWZIa2JJVk5mTzdZTTlPcExqV1lnayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1oZC03MC1kaWVzZWwtZW5naW5lLW9pbC0yMGwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768786113),
('qJrzdj7ZD5b3yWjbKIfvEgucDA7N52e8Ji0n2Qgp', NULL, '51.195.244.116', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2Eweno4RHA4a2Z6NjJBQVJwYmlheFRTQzVBZlN2bnoyMlhPaDA2NyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly91bGcuYWUvcHJvZHVjdHMvc3VwZXJzdGFyLWZ1bGx5LXN5bi1lbmdpbmUtb2lsLTV3MjAtNWwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768725853),
('qJVwNhAMGy6ZCiKpU2D5Purxaou0LhIiLEdSjRHx', NULL, '157.55.39.59', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFFPWnNKOE9ZMWJ1UTlSU0xLVlVJQmVQUktUZVlzRE5qTTZmamExSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly91bGcuYWUvcHJvZHVjdHMvY2F0ZWdvcnkvaHlkcmF1bGljLWZsdWlkcyI7czo1OiJyb3V0ZSI7czoyMDoicHJvZHVjdHMuYnktY2F0ZWdvcnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768760378),
('QygIYqAHm0Pm86npFaG9wlzfCQdfMFVZ7kPOKIMf', NULL, '51.195.244.12', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzBIWVY1cXhvRU03VDhOVTFNV3I2eDhxYXRsRkczQlVvUE1zWHdYSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly91bGcuYWUvcHJvZHVjdHMvY2F0ZWdvcnkvaW5kdXN0cmlhbC1sdWJyaWNhbnRzIjtzOjU6InJvdXRlIjtzOjIwOiJwcm9kdWN0cy5ieS1jYXRlZ29yeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768797929),
('r2HsDBumDNlkpTRiS9jN24y1PXqgGZRaMlaPkRgo', NULL, '198.244.183.80', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkJtYnppTkxKamZNeXI5QXRmRnRQVVJOd21lYUg4WmM5SjdlVFN6SyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci10cmFuc21heC1mdWxseS1zeW4tYXRmLTRsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768794828),
('Ro0FbnibRShEmchNy0BU5IjwiAmjZgl1DpcKTtXV', NULL, '207.46.13.6', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazBlQkQ1clRNajZicXhYTDVhMUwxMmJYZ215dk5hZ29NcWVDcWs4TCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vd3d3LnVsZy5hZS9zaXRlbWFwLnhtbCI7czo1OiJyb3V0ZSI7czoxMToic2l0ZW1hcC54bWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768776090),
('s4MnbKpwivOcYUj0PtoikSzKTGTdBJgASoInhtK3', NULL, '198.244.242.192', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibUZ2VDlvOEthY2NjWGhkNHFXdmVEOVYwR2pjWXJDSkQ4MGI3ZlZZMiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTg6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1wcmVtLWVuZ2luZS1vaWwtMTV3NDAtNGwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768801759),
('tcSoJTCCnkd9D5Vs7kltFkrLzinMuzGYG8SGykXa', NULL, '40.77.167.48', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVW40cGpwVTRrVktNUVBHajcwWTBxS3FZR2R2YmR1aEtkRG9WSkhMdSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly93d3cudWxnLmFlL3Byb2R1Y3RzL2NhdGVnb3J5L3RyYW5zbWlzc2lvbi1vaWxzIjtzOjU6InJvdXRlIjtzOjIwOiJwcm9kdWN0cy5ieS1jYXRlZ29yeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768719522),
('TgVNYtNwfVwkkLaT4qJ6Cpog73xu9fGNYrT2OH8V', NULL, '51.89.129.54', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWW91dkJBcVNlclpIbTNKM2p0QU5RS2s1eWRWczBEMEI2aHMyRldlSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1kaWVzZWwtZW5naW5lLW9pbC0xNXc0MC0yMGwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768803018),
('Tu2MZ6ZJj7FbaSvJWTANl2GK7yyoPEhCdfw0SSor', NULL, '68.221.75.18', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1dNWVY4ZGNKWHVKM2NvdlVobk9yUVhIcmE1MmE3UFlUQ2ZVTFV1SiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQ6Imh0dHBzOi8vdWxnLmFlIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768726887),
('u1zG1tYbCnk5AW5SoXDtOSV3I1zl9EdmAZMHVjPG', NULL, '198.244.226.2', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXdabEU5MFdxbnU0WTM5OTdlRWtKQWhvT2ZGdHg3dGNLYW02eGY2biI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTM6Imh0dHA6Ly91bGcuYWUiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768718769),
('uazs8XeQkIKwyfmdGdBim2e0qhwld3kQrFbQ3Amq', NULL, '93.158.90.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:123.0) Gecko/20100101 Firefox/123', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlY2U2tRMWlVVURYemlIQjdmaFlJZDQwenhxNWwyNzhyUTd6azU5ViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTM6Imh0dHA6Ly91bGcuYWUiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768722920),
('UTpiJvOlIPE3fyAj3tIHKBwk1Vgt8b8fokPLSdda', NULL, '198.244.240.247', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGlaa0k3T1U0YTA3d3BMdTBBUGpmSVJrVGhGd1NuWlZHUUR2TjQwbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly91bGcuYWUvcHJvZHVjdHMvc3VwZXJzdGFyLWZ1bGx5LXN5bi1lbmdpbmUtb2lsLTB3MjAtNWwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768728233),
('V0INIeqWn3ISCOHjPgdvGvehlGVjTHMdn15Q3sPG', NULL, '157.55.39.196', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHpteWd2OTFQV0ZKVkxZOXJ0M1ZEaklqNHl0VkhxcjR3SU1lQTRaSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly93d3cudWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1wcmVtLWVuZ2luZS1vaWwtMjB3NTAtNGwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768742294),
('vfH2BlF6bhob3e9z61ZuaovBuW3VpS38g8zlcUjc', NULL, '103.103.246.164', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGd5MWlOaDF5bFhSM1JIRks3RFNBdUdhR2NkdlczQTI5dTZqcG56RiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd3d3LnVsZy5hZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768803912),
('vKwxhzPO3AXEXhLp6hRsgAXnBAJTEpEIxYjcIB8k', NULL, '52.167.144.184', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidllsaThuSm83eE1vY2l2RDFzeEZTcDVrdkR0a1J6SE5IQUhoQnh2QSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NzM6Imh0dHA6Ly93d3cudWxnLmFlL3Byb2R1Y3RzL3ZvcnRvaWwtaGktdGVtcC1lcDItbXVsdGlwdXJwb3NlLWdyZWFzZS1ubGdpLTIiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768738092),
('VxapNTTZMyZGQiL3sKTwOfg6TeQcDZRhAEE25cao', NULL, '162.120.188.225', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFRTcllPbWFzZk5EMENrT1l2VjlRSGdacmF3WU4xUjRCMWU4bWI2UCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd3d3LnVsZy5hZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768751201),
('W4ZNmP58nv0JTnfa0TXNCOY0qZSBlIZ2VeOMw6oF', NULL, '51.195.215.180', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTBYYVlmcUpaNWVRaHZXeWJKVDZhc3NuMDlVeVJMNFJQZlk5akJkMCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTg6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1wcmVtLWVuZ2luZS1vaWwtMjB3NTAtNGwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768800542),
('W5zIjHocdvHqouUN1xHvA2tJhPX894kxbOQoTc63', NULL, '207.46.13.86', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWdxNFVWMkkxbDRZelFPY2pJQUhNT2s4eEt3OGp5MUx0dU12RkU5WCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly91bGcuYWUvcHJvZHVjdHMvc3VwZXJzdGFyLWZ1bGx5LXN5bi1lbmdpbmUtb2lsLTV3LTMwLTVsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768746190),
('wDVt7qdeunPRJBSncL2ATljKJFOZVudVzc4LSUdY', NULL, '198.244.226.86', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmlVTGZTZUdLU1QySzZUamh1UEVMMWpWdkVlemtRdURkNElROFQ0OSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjY6Imh0dHBzOi8vd3d3LnVsZy5hZS9wcm9kdWN0cy9zdXBlcnN0YXItZnVsbHktc3luLWVuZ2luZS1vaWwtNXcyMC01bCI7czo1OiJyb3V0ZSI7czoxMzoicHJvZHVjdHMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768745271),
('xdCuVX3YzP709wuczs4M1501Ngs0oIuWhFYW4T1T', NULL, '20.215.220.207', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTFUcWZuMmVhQ3R1ZmRWVm5VU09OVUo4U2dqSmx2WU9mUXR1WkR6OCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd3d3LnVsZy5hZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768801703),
('xGEImDknszBRL08mweQydVovEKTRgYPqLSpubOFt', NULL, '51.195.215.57', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNEpYbjVRbjVma3U1aUtRMFNZYTFsR2lBOHJ1NkoxQlRWbE02ckIzMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTM6Imh0dHA6Ly91bGcuYWUiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768796637),
('xW88nj5L18OuaH03ETJPJAOREPjoFCYBoWrgvMdo', NULL, '198.244.168.94', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHZEVW9KSVRDUWtWS045b3BFeUhmUFpnTFZGeG12OGF6S3lBbXJtVSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vd3d3LnVsZy5hZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768763448),
('YRNGNstOmKTw8AadnZVBThekxzgJ2S11I8ZnYWdS', NULL, '207.46.13.63', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3RrVTNTSmZKZEJjaG9BNjk1V3RlZFhFV2ZyZFFRVGRBMDZuOE9QMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly93d3cudWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci10cmFuc21heC1mdWxseS1zeW4tYXRmLTRsIjtzOjU6InJvdXRlIjtzOjEzOiJwcm9kdWN0cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768720435),
('yYQXjSDmAmMt88QYPt1fDTK4ejLBmSEkIP1jp4zi', NULL, '207.46.13.92', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTJwRUNNMmJObk9CVm5FRHI2MHcxS2pCNGwwb2NWOGVmSDRYSkhYTyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vdWxnLmFlL3VuaW9uX2x1YnJpY2FudHMvcHVibGljL2NvbnRhY3QiO3M6NToicm91dGUiO3M6MTI6ImNvbnRhY3Quc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768779586),
('zHUUlwbmGpG3fbEujO6bViytTeEjHRvF7ofA9MKj', NULL, '51.195.215.5', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWtXUjRkVGE5MjFHMkNkRDY3a1VZbnRHeXhkZk1od3VTNzI5d0x1TiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vdWxnLmFlL3Byb2R1Y3RzL3N1cGVyc3Rhci1wcmVtaXVtLWVuZ2luZS1vaWwtMTV3NDAtNWwiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768770816);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'company_name', 'Union Lubricants & Grease Factory S.P.S. LLC', '2025-12-03 11:27:50', '2025-12-08 05:17:32'),
(2, 'company_email', 'info@ulg.ae', '2025-12-03 11:27:50', '2025-12-08 05:17:32'),
(3, 'company_phone', '+971 6 5464696', '2025-12-03 11:27:50', '2025-12-24 10:26:24'),
(4, 'company_address', 'Industrial Area 2, Ajman, UAE', '2025-12-03 11:27:50', '2025-12-08 05:17:32'),
(5, 'company_description', 'Premium lubricant solutions for industrial applications worldwide.', '2025-12-03 11:27:50', '2025-12-03 11:27:50'),
(6, 'facebook_url', NULL, '2025-12-03 11:27:50', '2025-12-03 11:27:50'),
(7, 'twitter_url', NULL, '2025-12-03 11:27:50', '2025-12-03 11:27:50'),
(8, 'linkedin_url', NULL, '2025-12-03 11:27:50', '2025-12-03 11:27:50'),
(9, 'instagram_url', NULL, '2025-12-03 11:27:50', '2025-12-03 11:27:50'),
(10, 'meta_title', 'Union Lubricants - Premium Industrial Lubricants', '2025-12-03 11:27:50', '2025-12-03 11:27:50'),
(11, 'meta_description', 'High-quality lubricant solutions for industrial applications', '2025-12-03 11:27:50', '2025-12-03 11:27:50'),
(12, 'meta_keywords', 'lubricants, industrial oils, hydraulic fluids', '2025-12-03 11:27:50', '2025-12-03 11:27:50'),
(13, 'mail_mailer', 'smtp', '2025-12-08 05:17:32', '2025-12-08 05:17:32'),
(14, 'mail_from_name', 'Union Lubricants', '2025-12-08 05:17:32', '2025-12-08 05:17:32'),
(15, 'mail_from_address', 'info@ulg.ae', '2025-12-08 05:17:32', '2025-12-08 05:17:32'),
(16, 'mail_host', 'mail.ulg.ae', '2025-12-08 05:17:32', '2025-12-08 05:17:32'),
(17, 'mail_port', '465', '2025-12-08 05:17:32', '2025-12-08 05:17:32'),
(18, 'mail_username', 'info@ulg.ae', '2025-12-08 05:17:32', '2025-12-08 05:17:32'),
(19, 'mail_password', 'Ulg$INF#2025', '2025-12-08 05:17:32', '2025-12-08 05:17:32'),
(20, 'mail_scheme', 'tls', '2025-12-08 05:17:32', '2025-12-11 04:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_company` varchar(255) DEFAULT NULL,
  `author_position` varchar(255) DEFAULT NULL,
  `content` longtext NOT NULL,
  `author_image` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `author_name`, `author_company`, `author_position`, `content`, `author_image`, `rating`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'John Anderson', 'Premium Auto Industries', 'Fleet Manager', 'Union Lubricants has been our trusted partner for over 5 years. Their exceptional engine oils have significantly improved our fleet\'s performance and reduced maintenance costs.', NULL, 5, 1, '2025-12-03 07:16:20', '2025-12-03 07:16:20'),
(2, 'Sarah Mitchell', 'Heavy Machinery Corp', 'Operations Director', 'The hydraulic fluids from Union Lubricants are outstanding. They have delivered consistent performance in our heavy-duty equipment, reducing downtime significantly.', NULL, 5, 1, '2025-12-03 07:16:20', '2025-12-03 07:16:20'),
(3, 'Michael Chen', 'Global Manufacturing Ltd', 'Maintenance Supervisor', 'Excellent quality and reliability. Union Lubricants\' products have helped us achieve optimal equipment efficiency. Highly recommended for industrial applications.', NULL, 5, 1, '2025-12-03 07:16:20', '2025-12-03 07:16:20'),
(4, 'Emma Thompson', 'Agricultural Solutions Inc', 'Technical Manager', 'Their agricultural lubricants are perfect for our demanding farm equipment. Great product quality and excellent customer support throughout our partnership.', NULL, 5, 0, '2025-12-03 07:16:20', '2025-12-03 07:16:20'),
(5, 'Robert Davis', 'Marine Transport Services', 'Fleet Superintendent', 'Union Lubricants\' marine products are top-notch. Their formulations provide superior protection in harsh marine environments. We trust them completely.', NULL, 5, 0, '2025-12-03 07:16:20', '2025-12-03 07:16:20'),
(6, 'Lisa Rodriguez', 'Construction Equipment Co', 'Equipment Coordinator', 'Outstanding value for money. The lubricants not only perform exceptionally well but also offer great cost efficiency for our large equipment fleet.', NULL, 4, 0, '2025-12-03 07:16:20', '2025-12-03 07:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@union-lubricants.local', NULL, '$2y$12$Sp963LjLnL6zkm/OoxLlyu2d13TvBqQYBiNiJYaTozkcizPVks5Au', 'hjcCqV3P3nfgF8Kt5B7Qv8kir5KWSZCerrd4LJo7QXVWZUryBDU6Uc4ekVHd', '2025-12-02 23:36:28', '2025-12-08 14:19:01'),
(2, 'Demo User', 'demo@example.com', NULL, '$2y$12$bMnrj0bibr0lXWdVPK0QMuveGbpIUI3CEGU0qLL0xpRhiIwhgmuuO', NULL, '2025-12-02 23:36:28', '2025-12-02 23:36:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
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
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_email_index` (`email`),
  ADD KEY `enquiries_product_id_index` (`product_id`),
  ADD KEY `enquiries_created_at_index` (`created_at`),
  ADD KEY `enquiries_status_index` (`status`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `industries_name_unique` (`name`),
  ADD UNIQUE KEY `industries_slug_unique` (`slug`);

--
-- Indexes for table `industry_product`
--
ALTER TABLE `industry_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `industry_product_industry_id_product_id_unique` (`industry_id`,`product_id`),
  ADD KEY `industry_product_industry_id_index` (`industry_id`),
  ADD KEY `industry_product_product_id_index` (`product_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_created_at_index` (`created_at`),
  ADD KEY `posts_published_at_index` (`published_at`),
  ADD KEY `posts_is_published_index` (`is_published`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_category_id_index` (`category_id`),
  ADD KEY `products_created_at_index` (`created_at`),
  ADD KEY `products_is_active_index` (`is_active`),
  ADD KEY `products_is_featured_index` (`is_featured`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_name_unique` (`name`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`),
  ADD KEY `product_categories_is_active_index` (`is_active`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `industry_product`
--
ALTER TABLE `industry_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `enquiries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `industry_product`
--
ALTER TABLE `industry_product`
  ADD CONSTRAINT `industry_product_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `industry_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
