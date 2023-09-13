-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2022 at 10:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martialartszen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', '$2y$13$b48oETEdWqsA.NRwWSIVxO/T6yVFUiweTTAhOf8nLNTtEgcPStKqK', '2022-05-05 01:39:07', '2022-05-05 01:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_author` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'New blog post',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `bloged_at` datetime DEFAULT NULL COMMENT 'Public posted at time, if this is in future then it wont appear yet',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'User ID',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories_mappings`
--

CREATE TABLE `blog_categories_mappings` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `blog_category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cmspages`
--

CREATE TABLE `cmspages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locales` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `html_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `bloged_at` datetime DEFAULT NULL COMMENT 'Public posted at time, if this is in future then it wont appear yet',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_regarding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disciplines`
--

INSERT INTO `disciplines` (`id`, `title`, `description`, `photo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Taekwondo', 'Power overwhelming', '/assets/imgdiscipline/1-discipline-1643974916.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(2, 'Karate', 'Power overwhelming', '/assets/imgdiscipline/2-discipline-1643975197.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(3, 'Kung Fu', 'Power overwhelming', '/assets/imgdiscipline/3-discipline-1643975257.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(4, 'Tai chi', 'Power overwhelming', '/assets/imgdiscipline/4-discipline-1643975296.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(5, 'Yoga', 'Power overwhelming', '/assets/imgdiscipline/5-discipline-1643975337.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(6, 'Arial Yoga', 'Power overwhelming', '/assets/imgdiscipline/6-discipline-1643975369.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(7, 'Jeet Kune DO', 'Power overwhelming', '/assets/imgdiscipline/7-discipline-1643975415.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(8, 'Fitness', 'Power overwhelming', '/assets/imgdiscipline/8-discipline-1643975495.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(9, 'Boxing', 'Power overwhelming', '/assets/imgdiscipline/9-discipline-1643975570.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(10, 'Mixed Martial Arts', 'Power overwhelming', '/assets/imgdiscipline/10-discipline-1643975594.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(11, 'Martial Arts For Kids', 'Power overwhelming', '/assets/imgdiscipline/11-discipline-1643975717.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(12, 'Jiu Jitsu', 'Power overwhelming', '/assets/imgdiscipline/12-discipline-1643975775.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(13, 'Meditation', 'Power overwhelming', '/assets/imgdiscipline/13-discipline-1643975910.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(14, 'Fitness For Children', 'Power overwhelming', '/assets/imgdiscipline/14-discipline-1643975938.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(15, 'Judo', 'Power overwhelming', '/assets/imgdiscipline/15-discipline-1643976023.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(16, 'Dance', 'Power overwhelming', '/assets/imgdiscipline/16-discipline-1643976072.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(17, 'Dance For Children', 'Power overwhelming', '/assets/imgdiscipline/17-discipline-1643976099.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07'),
(18, 'Body Building', 'Power overwhelming', '/assets/imgdiscipline/18-discipline-1643976120.jpg', NULL, '2022-05-05 01:39:07', '2022-05-05 01:39:07');

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
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(4) NOT NULL DEFAULT 0,
  `native_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teaching_experience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wistia_project_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `email`, `password`, `phone`, `address`, `city`, `state`, `zip`, `country`, `school_name`, `certificate`, `photo`, `banner`, `is_approved`, `native_language`, `teaching_experience`, `google_id`, `facebook_id`, `wistia_project_id`, `created_at`, `updated_at`) VALUES
(1, 'Sheetal CHive', 's.chive@splendornet.com', '$2y$13$b48oETEdWqsA.NRwWSIVxO/T6yVFUiweTTAhOf8nLNTtEgcPStKqK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_biography_videos`
--

CREATE TABLE `instructor_biography_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_duration` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_courses`
--

CREATE TABLE `instructor_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT 0,
  `course_category_id` bigint(20) UNSIGNED DEFAULT 0,
  `discipline_id` bigint(20) UNSIGNED DEFAULT 0,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_course_lessions`
--

CREATE TABLE `instructor_course_lessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT 0,
  `instructor_course_id` bigint(20) UNSIGNED DEFAULT 0,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lession_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lession_video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_duration` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_password_resets`
--

CREATE TABLE `instructor_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `resized_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_13_065250_create_permission_tables', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_09_04_054811_create_admins_table', 1),
(6, '2019_10_12_164114_create_blogs_table', 1),
(7, '2019_10_12_164142_create_blog_categories_table', 1),
(8, '2019_10_12_164246_create_blog_categories_mappings_table', 1),
(9, '2019_11_06_185010_create_media_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2020_01_10_134939_create_testimonials_table', 1),
(12, '2021_12_02_092427_create_contacts_table', 1),
(13, '2021_12_06_070652_cmspage', 1),
(14, '2022_01_17_125731_create_jobs_table', 1),
(15, '2022_01_20_052556_create_instructors_table', 1),
(16, '2022_01_24_062944_add_socialite_to_instructors_table', 1),
(17, '2022_01_24_123800_create_course_categories_table', 1),
(18, '2022_01_27_054502_add_firstname_lastname_is_block_to_users_table', 1),
(19, '2022_01_28_124440_add_phone_age_group_gender_profile_picture_to_users_table', 1),
(20, '2022_01_31_054057_create_disciplines_table', 1),
(21, '2022_02_01_132028_create_instructor_password_resets_table', 1),
(22, '2022_02_03_124904_add_fields_to_users_table', 1),
(23, '2022_02_04_075658_create_instructor_courses_table', 1),
(24, '2022_02_04_122155_create_instructor_course_lessions_table', 1),
(25, '2022_02_07_135555_add_customer_id_to_users_table', 1),
(26, '2022_02_10_085754_add_fields_to_contacts_table', 1),
(27, '2022_02_10_134948_add_subscription_to_users_table', 1),
(28, '2022_02_11_064132_update_contacts_table', 1),
(29, '2022_02_14_143220_add_request_type_to_users_table', 1),
(30, '2022_03_10_111726_add_wistia_project_id_to_instructors', 1),
(31, '2022_03_15_112034_add_videos_fields_to_instructor_course_lessions_table', 1),
(32, '2022_03_16_110913_update_columns_to_instructor_courses_table', 1),
(33, '2022_03_16_111426_update_columns_to_instructor_course_lessions_table', 1),
(34, '2022_03_22_072036_add_banner_field_to_instructors_table', 1),
(35, '2022_03_22_135317_create_instructor_biography_videos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'Modules\\RightsManagement\\Entities\\Admin', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', 'admin', '2022-05-05 01:39:07', '2022-05-05 01:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_block` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_group` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `who_will_be_training` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disciplines_in_martial_arts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stretching_flexibility_spiritual_meditative_arts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `health_and_wellness_guidance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_fitness_including` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fitness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferred_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructor_gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferred_training_style` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructor_experience` int(11) NOT NULL DEFAULT 0,
  `is_subscribe` tinyint(4) NOT NULL DEFAULT 0,
  `subscription_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_amount` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_amount_currency` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_interval` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `google_id`, `facebook_id`, `is_block`, `phone`, `age_group`, `gender`, `profile_picture`, `who_will_be_training`, `disciplines_in_martial_arts`, `stretching_flexibility_spiritual_meditative_arts`, `health_and_wellness_guidance`, `all_fitness_including`, `fitness`, `preferred_language`, `instructor_gender`, `preferred_training_style`, `customer_id`, `instructor_experience`, `is_subscribe`, `subscription_id`, `plan_id`, `plan_amount`, `plan_amount_currency`, `plan_interval`, `status`, `request_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aparna Nichat', 'Aparna', 'Nichat', 'a.nichat@splendornet.com', '2022-05-05 10:33:32', '$2y$13$b48oETEdWqsA.NRwWSIVxO/T6yVFUiweTTAhOf8nLNTtEgcPStKqK', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_user_id_index` (`user_id`),
  ADD KEY `blogs_bloged_at_index` (`bloged_at`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`),
  ADD KEY `blog_categories_created_by_index` (`created_by`);

--
-- Indexes for table `blog_categories_mappings`
--
ALTER TABLE `blog_categories_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_categories_mappings_blog_id_index` (`blog_id`),
  ADD KEY `blog_categories_mappings_blog_category_id_index` (`blog_category_id`);

--
-- Indexes for table `cmspages`
--
ALTER TABLE `cmspages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmspages_bloged_at_index` (`bloged_at`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructors_email_unique` (`email`);

--
-- Indexes for table `instructor_biography_videos`
--
ALTER TABLE `instructor_biography_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_biography_videos_instructor_id_foreign` (`instructor_id`);

--
-- Indexes for table `instructor_courses`
--
ALTER TABLE `instructor_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_courses_instructor_id_foreign` (`instructor_id`),
  ADD KEY `instructor_courses_course_category_id_foreign` (`course_category_id`),
  ADD KEY `instructor_courses_discipline_id_foreign` (`discipline_id`);

--
-- Indexes for table `instructor_course_lessions`
--
ALTER TABLE `instructor_course_lessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_course_lessions_instructor_id_foreign` (`instructor_id`),
  ADD KEY `instructor_course_lessions_instructor_course_id_foreign` (`instructor_course_id`);

--
-- Indexes for table `instructor_password_resets`
--
ALTER TABLE `instructor_password_resets`
  ADD KEY `instructor_password_resets_email_index` (`email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories_mappings`
--
ALTER TABLE `blog_categories_mappings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cmspages`
--
ALTER TABLE `cmspages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instructor_biography_videos`
--
ALTER TABLE `instructor_biography_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_courses`
--
ALTER TABLE `instructor_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_course_lessions`
--
ALTER TABLE `instructor_course_lessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_categories_mappings`
--
ALTER TABLE `blog_categories_mappings`
  ADD CONSTRAINT `blog_categories_mappings_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_categories_mappings_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instructor_biography_videos`
--
ALTER TABLE `instructor_biography_videos`
  ADD CONSTRAINT `instructor_biography_videos_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `instructor_courses`
--
ALTER TABLE `instructor_courses`
  ADD CONSTRAINT `instructor_courses_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `instructor_courses_discipline_id_foreign` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `instructor_courses_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `instructor_course_lessions`
--
ALTER TABLE `instructor_course_lessions`
  ADD CONSTRAINT `instructor_course_lessions_instructor_course_id_foreign` FOREIGN KEY (`instructor_course_id`) REFERENCES `instructor_courses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `instructor_course_lessions_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
