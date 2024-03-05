-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2024 at 01:00 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `contact`, `address`, `email_verified_at`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Admin', 'admin@example.com', 'mdadmin', '+60  036253-1370', '477 Jalan Kelapa Hijau Segambut Bahagia', NULL, '65b1ec1c5d0f51706159132.png', '$2y$10$R26ql6S4OWPhR4Y2rOVqau.AugpwQI0sWgyEGHa0Z1Cu.4fyi3TqC', NULL, NULL, '2024-02-08 05:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `click_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `user_id`, `title`, `is_read`, `click_url`, `created_at`, `updated_at`) VALUES
(24, 12, 'New member registered', 1, '/admin/user/index', '2024-01-29 10:18:43', '2024-02-12 06:57:02'),
(42, 12, 'New campaign created by James Marshall', 1, '/admin/campaigns/index', '2024-02-14 08:57:20', '2024-02-27 04:52:53'),
(43, 13, 'New member registered', 1, '/admin/user/index', '2024-02-14 12:15:55', '2024-02-27 04:52:53'),
(44, 12, 'New campaign created by James Marshall', 1, '/admin/campaigns/index', '2024-02-15 04:56:21', '2024-02-27 04:52:53'),
(45, 14, 'New member registered', 1, '/admin/user/index', '2024-02-15 06:29:09', '2024-02-27 04:52:53'),
(46, 15, 'New member registered', 1, '/admin/user/index', '2024-02-15 07:03:04', '2024-02-27 04:52:53'),
(49, 15, 'Jane Doe has commented on a campaign.', 1, '/admin/comments/index', '2024-02-15 10:44:57', '2024-02-27 04:52:53'),
(50, 15, 'Jane Doe has commented on a campaign.', 1, '/admin/comments/index', '2024-02-18 08:55:07', '2024-02-27 04:52:53'),
(54, 13, 'David Gonzalez has commented on a campaign.', 1, '/admin/comments/index', '2024-02-18 09:08:18', '2024-02-27 04:52:53'),
(59, 13, 'David Gonzalez has commented on a campaign.', 1, '/admin/comments/index', '2024-02-18 11:23:52', '2024-02-27 04:52:53'),
(60, 0, 'Greg Nixon has commented on a campaign.', 1, '/admin/comments/index', '2024-02-18 11:26:21', '2024-02-27 04:52:53'),
(61, 0, 'Rose Miles has commented on a campaign.', 1, '/admin/comments/index', '2024-02-18 11:28:19', '2024-02-27 04:52:53'),
(62, 0, 'Irma Stewart has commented on a campaign.', 1, '/admin/comments/index', '2024-02-18 11:29:10', '2024-02-27 04:52:53'),
(92, 12, 'Deposit successful via Stripe Storefront - AUD for a campaign', 1, '/admin/deposit/done', '2024-02-29 07:35:31', '2024-03-02 08:25:07'),
(94, 12, 'Deposit request from James Marshall for a campaign', 1, '/admin/deposit/pending', '2024-02-29 09:25:06', '2024-03-02 08:25:07'),
(95, 13, 'New campaign created by David Gonzalez', 1, '/admin/campaigns/index', '2024-02-29 10:33:38', '2024-03-02 08:25:07'),
(96, 0, 'Deposit successful via Stripe Storefront - USD for a campaign', 1, '/admin/deposit/done', '2024-02-29 10:45:09', '2024-03-02 08:24:56'),
(97, 12, 'New campaign created by James Marshall', 1, '/admin/campaigns/index', '2024-02-29 10:54:19', '2024-03-02 08:24:34'),
(99, 13, 'Deposit request from David Gonzalez for a campaign', 0, '/admin/donations/pending', '2024-03-03 09:25:43', '2024-03-03 09:25:43'),
(101, 13, 'Deposit request from David Gonzalez for a campaign', 0, '/admin/donations/pending', '2024-03-03 10:39:09', '2024-03-03 10:39:09'),
(102, 13, 'Deposit request from David Gonzalez for a campaign', 0, '/admin/donations/pending', '2024-03-03 10:50:17', '2024-03-03 10:50:17'),
(103, 13, 'Deposit request from David Gonzalez for a campaign', 0, '/admin/donations/pending', '2024-03-03 11:01:31', '2024-03-03 11:01:31'),
(104, 13, 'Deposit request from David Gonzalez for a campaign', 1, '/admin/donations/pending', '2024-03-04 06:12:51', '2024-03-04 06:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`id`, `email`, `code`, `status`, `created_at`) VALUES
(14, 'admin@test.com', '782343', 1, '2023-10-10 06:26:31'),
(15, 'admin@test.com', '326901', 1, '2023-11-11 08:37:37'),
(16, 'admin@test.com', '272340', 1, '2023-11-11 08:38:17'),
(17, 'admin@test.com', '636482', 1, '2023-11-12 10:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal_amount` decimal(28,8) UNSIGNED NOT NULL,
  `preferred_amounts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `raised_amount` decimal(28,8) UNSIGNED NOT NULL DEFAULT '0.00000000',
  `start_date` timestamp NOT NULL,
  `end_date` timestamp NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2' COMMENT '0 -> campaign rejected, 1 -> campaign approved, 2 -> campaign pending',
  `featured` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT '0 -> campaign not featured, 1 -> campaign is featured',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `category_id`, `image`, `gallery`, `name`, `slug`, `description`, `document`, `goal_amount`, `preferred_amounts`, `raised_amount`, `start_date`, `end_date`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(13, 12, 5, '65cc806f393671707901039.jpg', '[\"65cc7f93e33981707900819.jpg\",\"65cc7f93e6ef91707900819.jpg\"]', 'Education for Every Child: Donate to Break the Cycle of Poverty', 'education-for-every-child-donate-to-break-the-cycle-of-poverty', '<p>In a world filled with opportunities, education stands as the cornerstone of progress and empowerment. Yet, millions of children around the globe are denied this fundamental right, impeding not only their individual potential but also hindering the collective advancement of societies. It\'s time to recognize that education is not a privilege but a basic human right that should be accessible to every child, regardless of their background, ethnicity, or socio-economic status.</p><p> </p><p>At the heart of our campaign lies a profound belief in the transformative power of education. We envision a future where every child has equal access to quality education, where their talents are nurtured, their curiosity encouraged, and their dreams supported. Education is not just about imparting knowledge; it is about instilling values, fostering critical thinking, and equipping children with the skills they need to navigate an ever-changing world.</p><p> </p><p>Sadly, the reality today paints a starkly different picture. Across the globe, millions of children are out of school, trapped in a cycle of poverty, discrimination, and inequality. Many are forced into child labor, early marriage, or conflict, robbing them of their childhood and denying them the chance to fulfill their potential. This is not only a violation of their rights but also a colossal waste of human potential that undermines the fabric of our societies.</p><p> </p><p>Education is not a luxury reserved for the privileged few; it is a fundamental human right that should be accessible to all. It is the key to breaking the cycle of poverty, empowering individuals and communities, and driving sustainable development. When children are educated, they are more likely to lead healthy and productive lives, contribute meaningfully to society, and become agents of positive change in their communities.</p><p> </p><p>Our campaign seeks to address the barriers that prevent children from accessing education and advocate for policies and initiatives that prioritize education for every child. This includes addressing systemic issues such as poverty, gender inequality, discrimination, and conflict, which often serve as obstacles to education. It also involves investing in infrastructure, teacher training, and curriculum development to ensure that education is of high quality and relevance.</p><p> </p><p>But our campaign goes beyond mere advocacy; it is a call to action for governments, policymakers, civil society organizations, and individuals to prioritize education and invest in the future of our children. We must work together to ensure that no child is left behind, regardless of their circumstances. This requires political will, financial investment, and collective effort at all levels of society.</p><p> </p><p>Together, we can create a world where every child has the opportunity to learn, grow, and thrive. We can break the cycle of poverty and inequality and build a future where education is truly universal. Join us in our mission to ensure that every child has access to quality education – because when we invest in our children, we invest in the future of humanity. Education for every child is not just a noble aspiration; it is a moral imperative and the foundation upon which we can build a better world for all.</p>', '65cc80708a0aa1707901040.pdf', 50000.00000000, '[50,100,150,200,250,300]', 650.00000000, '2024-02-10 05:41:54', '2024-03-29 05:41:54', 1, 1, '2024-02-14 08:57:20', '2024-03-04 06:15:07'),
(14, 12, 6, '65cd99745d66b1707972980.jpg', '[\"65cd9858ad6831707972696.jpg\",\"65cd9858ad7471707972696.jpg\"]', 'Rise Together: Empowering Communities for a Brighter Future', 'rise-together-empowering-communities-for-a-brighter-future', '<p>\"Rise Together: Empowering Communities for a Brighter Future\" is a transformative initiative dedicated to uniting individuals, organizations, and communities in a shared commitment to create positive change. At its core, this campaign recognizes the inherent strength within every community and seeks to harness that power to build a future filled with opportunity, equity, and prosperity for all.</p><p> </p><p>In today\'s rapidly changing world, it\'s essential to come together to address the challenges facing our societies. From economic disparities to social injustices, environmental concerns to health crises, the need for collective action has never been greater. \"Rise Together\" serves as a rallying cry, inspiring people from all walks of life to join forces and make a meaningful impact.</p><p> </p><p>This campaign is rooted in the belief that when communities unite, they become stronger, more resilient, and better equipped to overcome adversity. By fostering collaboration, amplifying diverse voices, and providing resources and support, \"Rise Together\" empowers communities to address systemic issues, advocate for change, and implement sustainable solutions.</p><p> </p><p>Through a series of grassroots initiatives, educational programs, advocacy efforts, and community-building activities, \"Rise Together\" aims to create lasting positive change across various domains, including social justice, economic development, environmental sustainability, healthcare access, and education equity.</p><p> </p><p>Together, we can build a future where every individual has the opportunity to thrive, where diversity is celebrated, and where communities are empowered to shape their own destinies. Join us in our mission to \"Rise Together\" and create a brighter, more inclusive, and equitable future for all.</p>', NULL, 70000.00000000, '[100,200,300]', 100.00000000, '2024-02-03 05:40:58', '2024-04-19 05:40:58', 1, 0, '2024-02-15 04:56:21', '2024-02-29 07:35:31'),
(17, 13, 2, '65e05d80cb4ab1709202816.jpg', '[\"65e05c3d4b6fd1709202493.jpg\",\"65e05c3d4b7e51709202493.jpg\",\"65e05c3de70c71709202493.jpg\",\"65e05c3e026931709202494.jpg\"]', 'Community Care: Building Bridges, Changing Lives', 'community-care-building-bridges-changing-lives', '<p>\"Community Care: Building Bridges, Changing Lives\" is a transformative initiative dedicated to uniting individuals, organizations, and communities in a shared commitment to create positive change. At its core, this campaign recognizes the inherent strength within every community and seeks to harness that power to build a future filled with opportunity, equity, and prosperity for all.</p><p> </p><p>In today\'s rapidly changing world, it\'s essential to come together to address the challenges facing our societies. From economic disparities to social injustices, environmental concerns to health crises, the need for collective action has never been greater. \"Rise Together\" serves as a rallying cry, inspiring people from all walks of life to join forces and make a meaningful impact.</p><p> </p><p>This campaign is rooted in the belief that when communities unite, they become stronger, more resilient, and better equipped to overcome adversity. By fostering collaboration, amplifying diverse voices, and providing resources and support, \"Rise Together\" empowers communities to address systemic issues, advocate for change, and implement sustainable solutions.</p><p> </p><p>Through a series of grassroots initiatives, educational programs, advocacy efforts, and community-building activities, \"Rise Together\" aims to create lasting positive change across various domains, including social justice, economic development, environmental sustainability, healthcare access, and education equity.</p><p> </p><p>Together, we can build a future where every individual has the opportunity to thrive, where diversity is celebrated, and where communities are empowered to shape their own destinies. Join us in our mission to \"Rise Together\" and create a brighter, more inclusive, and equitable future for all.</p>', NULL, 80000.00000000, '[\"1000\",\"1500\",\"2000\",\"2500\"]', 1000.00000000, '2024-02-02 18:00:00', '2024-04-25 18:00:00', 1, 1, '2024-02-29 10:33:37', '2024-02-29 10:45:09'),
(18, 12, 2, '65e0625b30a4d1709204059.jpg', '[\"65e061915aade1709203857.jpg\",\"65e0619163c661709203857.jpg\"]', 'Hope Reignited: Transforming Lives, One Step at a Time', 'hope-reignited-transforming-lives-one-step-at-a-time', '<p>\"Hope Reignited: Transforming Lives, One Step at a Time\" is a transformative initiative dedicated to uniting individuals, organizations, and communities in a shared commitment to create positive change. At its core, this campaign recognizes the inherent strength within every community and seeks to harness that power to build a future filled with opportunity, equity, and prosperity for all.</p><p> </p><p>In today\'s rapidly changing world, it\'s essential to come together to address the challenges facing our societies. From economic disparities to social injustices, environmental concerns to health crises, the need for collective action has never been greater. \"Rise Together\" serves as a rallying cry, inspiring people from all walks of life to join forces and make a meaningful impact.</p><p> </p><p>This campaign is rooted in the belief that when communities unite, they become stronger, more resilient, and better equipped to overcome adversity. By fostering collaboration, amplifying diverse voices, and providing resources and support, \"Rise Together\" empowers communities to address systemic issues, advocate for change, and implement sustainable solutions.</p><p> </p><p>Through a series of grassroots initiatives, educational programs, advocacy efforts, and community-building activities, \"Rise Together\" aims to create lasting positive change across various domains, including social justice, economic development, environmental sustainability, healthcare access, and education equity.</p><p> </p><p>Together, we can build a future where every individual has the opportunity to thrive, where diversity is celebrated, and where communities are empowered to shape their own destinies. Join us in our mission to \"Rise Together\" and create a brighter, more inclusive, and equitable future for all.</p>', NULL, 100000.00000000, '[\"500\",\"700\",\"900\"]', 900.00000000, '2024-02-16 18:00:00', '2024-05-02 18:00:00', 1, 1, '2024-02-29 10:54:19', '2024-03-03 10:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '0 -> category is inactive, 1 -> category is active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, '65c1c02a328661707196458.jpg', 'Treatment', 'treatment', 1, '2024-02-06 05:14:18', '2024-02-06 05:14:18'),
(3, '65c1c04e96b741707196494.jpg', 'Medical', 'medical', 1, '2024-02-06 05:14:54', '2024-02-06 05:14:54'),
(4, '65c1c061052f01707196513.jpg', 'Emergency', 'emergency', 1, '2024-02-06 05:15:13', '2024-02-06 05:15:13'),
(5, '65c1c084a74ef1707196548.jpg', 'Non Profit', 'non-profit', 1, '2024-02-06 05:15:48', '2024-02-14 11:49:33'),
(6, '65c1c09f2cf7c1707196575.jpg', 'Financial Emergency', 'financial-emergency', 1, '2024-02-06 05:16:15', '2024-02-06 05:16:15'),
(7, '65c1c0b8815be1707196600.jpg', 'Environment', 'environment', 1, '2024-02-06 05:16:40', '2024-02-08 05:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `campaign_id` bigint UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2' COMMENT '0 -> comment rejected by admin, 1 -> comment approved by admin, 2 -> comment is pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `campaign_id`, `name`, `email`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 15, 13, 'Jane Doe', 'jane@gmail.com', 'The Rise Together campaign is a reminder that we\'re stronger when we lift each other up. Let\'s rise to the occasion and make a difference!', 1, '2024-02-15 10:44:57', '2024-02-18 07:58:04'),
(2, 15, 13, 'Jane Doe', 'jane@gmail.com', 'I love the message of unity and empowerment behind the Rise Together campaign. Let\'s work together to create lasting impact.', 1, '2024-02-18 08:55:07', '2024-02-18 08:56:20'),
(6, 13, 14, 'David Gonzalez', 'david@gmail.com', 'The Rise Together campaign gives me hope for a better future. Let\'s keep the momentum going!', 2, '2024-02-18 09:08:18', '2024-02-18 09:08:18'),
(11, 13, 13, 'David Gonzalez', 'david@gmail.com', 'I\'ve already seen the impact of Rise Together in my community. It\'s incredible how coming together can create meaningful change.', 1, '2024-02-18 11:23:52', '2024-02-18 11:26:35'),
(12, NULL, 13, 'Greg Nixon', 'greg@gmail.com', 'Rise Together is exactly what our community needs right now. Let\'s join forces and make a difference!', 1, '2024-02-18 11:26:21', '2024-02-18 11:26:40'),
(13, NULL, 13, 'Rose Miles', 'rose@gmail.com', 'I\'ve donated to this campaign and encourage others to do the same. Every little bit helps!', 1, '2024-02-18 11:28:19', '2024-02-18 11:29:25'),
(14, NULL, 13, 'Irma Stewart', 'irma@gmail.com', 'The stories shared in this campaign are touching. Let\'s continue to amplify voices and create change.', 1, '2024-02-18 11:29:10', '2024-02-18 11:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `method_code` int UNSIGNED NOT NULL DEFAULT '0',
  `amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `method_currency` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `rate` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `final_amo` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `btc_amo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_try` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=>success, 2=>pending, 3=>cancel',
  `from_api` tinyint(1) NOT NULL DEFAULT '0',
  `admin_feedback` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `method_code`, `amount`, `method_currency`, `charge`, `rate`, `final_amo`, `detail`, `btc_amo`, `btc_wallet`, `trx`, `payment_try`, `status`, `from_api`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(117, 12, 111, 100.00000000, 'AUD', 10.00000000, 0.01400000, 1.54000000, NULL, '0', '', '9J4RK1Q4RRQM', 0, 1, 0, NULL, '2024-02-29 07:34:30', '2024-02-29 07:35:31'),
(119, 12, 1002, 400.00000000, 'TRY', 5.00000000, 0.28000000, 113.40000000, '[{\"name\":\"Full Name\",\"type\":\"text\",\"value\":\"James Marshall\"},{\"name\":\"Email\",\"type\":\"text\",\"value\":\"james@gmail.com\"},{\"name\":\"Trx Number\",\"type\":\"text\",\"value\":\"ABC123\"}]', '0', '', 'XQKOSCZ6DATE', 0, 1, 0, NULL, '2024-02-29 09:24:55', '2024-03-03 06:18:37'),
(120, 0, 111, 1000.00000000, 'USD', 11.00000000, 0.00910000, 9.20010000, NULL, '0', '', 'X6YBGBMXSD1F', 0, 1, 0, NULL, '2024-02-29 10:43:36', '2024-02-29 10:45:09'),
(124, 13, 1003, 700.00000000, 'IRR', 0.00000000, 382.53000000, 267771.00000000, '[{\"name\":\"Trx Number\",\"type\":\"text\",\"value\":\"XYZ369\"}]', '0', '', '174YZK1OO5P4', 0, 3, 0, 'Your recent donation has been rejected due to discrepancies in the payment details provided.', '2024-03-03 09:25:35', '2024-03-03 10:23:46'),
(125, 13, 1000, 900.00000000, 'USD', 46.00000000, 0.01000000, 9.46000000, '[{\"name\":\"Trx Number\",\"type\":\"text\",\"value\":\"IJK159\"},{\"name\":\"Gender\",\"type\":\"select\",\"value\":\"Male\"}]', '0', '', 'OCKWHHUJHHRX', 0, 1, 0, NULL, '2024-03-03 10:38:41', '2024-03-03 10:41:07'),
(126, 13, 1000, 300.00000000, 'USD', 16.00000000, 0.01000000, 3.16000000, '[{\"name\":\"Trx Number\",\"type\":\"text\",\"value\":\"MNO357\"},{\"name\":\"Gender\",\"type\":\"select\",\"value\":\"Male\"}]', '0', '', '87J9OX9R6TM9', 0, 3, 0, 'Unfortunately, your donation has been rejected due to insufficient funds in the provided payment account.', '2024-03-03 10:49:55', '2024-03-03 10:56:40'),
(127, 13, 1002, 800.00000000, 'TRY', 9.00000000, 0.28000000, 226.52000000, '[{\"name\":\"Full Name\",\"type\":\"text\",\"value\":\"David Gonzalez\"},{\"name\":\"Email\",\"type\":\"text\",\"value\":\"david@gmail.com\"},{\"name\":\"Trx Number\",\"type\":\"text\",\"value\":\"QAZXSW258741\"}]', '0', '', 'XYH3PQV9YUUZ', 0, 2, 0, NULL, '2024-03-03 11:00:12', '2024-03-03 11:01:31'),
(128, 13, 1003, 250.00000000, 'IRR', 0.00000000, 382.53000000, 95632.50000000, '[{\"name\":\"Trx Number\",\"type\":\"text\",\"value\":\"LKJHGFDSA\"},{\"name\":\"Receipt\",\"type\":\"file\",\"value\":\"2024\\/03\\/04\\/65e566636292a1709532771.png\"}]', '0', '', 'KQBY91YFMZH1', 0, 1, 0, NULL, '2024-03-04 06:11:15', '2024-03-04 06:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint UNSIGNED NOT NULL,
  `deposit_id` bigint UNSIGNED NOT NULL,
  `campaign_id` bigint UNSIGNED NOT NULL,
  `type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `deposit_id`, `campaign_id`, `type`, `full_name`, `email`, `phone`, `country`, `created_at`, `updated_at`) VALUES
(87, 117, 14, 'known', 'James Marshall', 'james@gmail.com', '+817-290-8546', 'United States', '2024-02-29 07:34:30', '2024-02-29 07:34:30'),
(89, 119, 13, 'known', 'James Marshall', 'james@gmail.com', '+817-290-8546', 'United States', '2024-02-29 09:24:55', '2024-02-29 09:24:55'),
(90, 120, 17, 'known', 'Camryn Morar', 'camryn@gmail.com', '(619) 561-1846', 'United States', '2024-02-29 10:43:36', '2024-02-29 10:43:36'),
(93, 124, 18, 'known', 'David Gonzalez', 'david@gmail.com', '+912-307-5602', 'United States', '2024-03-03 09:25:35', '2024-03-03 09:25:35'),
(94, 125, 18, 'known', 'David Gonzalez', 'david@gmail.com', '+912-307-5602', 'United States', '2024-03-03 10:38:41', '2024-03-03 10:38:41'),
(95, 126, 14, 'known', 'David Gonzalez', 'david@gmail.com', '+912-307-5602', 'United States', '2024-03-03 10:49:55', '2024-03-03 10:49:55'),
(96, 127, 13, 'known', 'David Gonzalez', 'david@gmail.com', '+912-307-5602', 'United States', '2024-03-03 11:00:12', '2024-03-03 11:00:12'),
(97, 128, 13, 'known', 'David Gonzalez', 'david@gmail.com', '+912-307-5602', 'United States', '2024-03-04 06:11:15', '2024-03-04 06:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint UNSIGNED NOT NULL,
  `act` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `act`, `form_data`, `created_at`, `updated_at`) VALUES
(1, 'manual_deposit', '{\"trx_number\":{\"name\":\"Trx Number\",\"label\":\"trx_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"gender\":{\"name\":\"Gender\",\"label\":\"gender\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[\"Male\",\"Female\",\"Custom\"],\"type\":\"select\"}}', '2023-09-29 00:40:47', '2024-03-03 10:49:21'),
(2, 'manual_deposit', '{\"demo\":{\"name\":\"Demo\",\"label\":\"demo\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"demo_two\":{\"name\":\"Demo two\",\"label\":\"demo_two\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"textarea\"},\"nid_photo\":{\"name\":\"NID Photo\",\"label\":\"nid_photo\",\"is_required\":\"required\",\"extensions\":\"jpeg,png\",\"options\":[],\"type\":\"file\"}}', '2023-10-08 08:30:23', '2023-11-21 06:09:58'),
(3, 'kyc', '{\"full_name\":{\"name\":\"Full Name\",\"label\":\"full_name\",\"is_required\":\"required\",\"extensions\":\"\",\"options\":[],\"type\":\"text\"},\"voter_id\":{\"name\":\"Voter Id\",\"label\":\"voter_id\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"nid_photo\":{\"name\":\"NID Photo\",\"label\":\"nid_photo\",\"is_required\":\"required\",\"extensions\":\"jpg,jpeg,png,pdf\",\"options\":[],\"type\":\"file\"}}', '2023-10-09 06:58:42', '2024-01-29 11:58:41'),
(4, 'manual_deposit', '{\"full_name\":{\"name\":\"Full Name\",\"label\":\"full_name\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"email\":{\"name\":\"Email\",\"label\":\"email\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"trx_number\":{\"name\":\"Trx Number\",\"label\":\"trx_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"}}', '2023-11-21 07:07:31', '2024-02-28 10:35:26'),
(5, 'manual_deposit', '{\"trx_number\":{\"name\":\"Trx Number\",\"label\":\"trx_number\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"},\"receipt\":{\"name\":\"Receipt\",\"label\":\"receipt\",\"is_required\":\"required\",\"extensions\":\"jpg,jpeg,png,pdf\",\"options\":[],\"type\":\"file\"}}', '2023-11-21 09:12:25', '2024-03-04 06:08:21'),
(6, 'withdraw_method', '{\"full_name\":{\"name\":\"Full Name\",\"label\":\"full_name\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"}}', '2023-11-21 11:15:53', '2024-02-29 05:42:09'),
(7, 'withdraw_method', '{\"email\":{\"name\":\"Email\",\"label\":\"email\",\"is_required\":\"required\",\"extensions\":null,\"options\":[],\"type\":\"text\"}}', '2023-11-21 17:08:05', '2024-02-29 05:43:01'),
(8, 'withdraw_method', '{\"receipt\":{\"name\":\"Receipt\",\"label\":\"receipt\",\"is_required\":\"required\",\"extensions\":\"jpg,jpeg,png\",\"options\":[],\"type\":\"file\"}}', '2024-03-05 11:54:18', '2024-03-05 11:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint UNSIGNED NOT NULL,
  `form_id` int UNSIGNED NOT NULL DEFAULT '0',
  `code` int UNSIGNED DEFAULT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '1=>Active, 2=>Inactive',
  `gateway_parameters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `supported_currencies` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `crypto` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `guideline` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `form_id`, `code`, `name`, `alias`, `status`, `gateway_parameters`, `supported_currencies`, `crypto`, `extra`, `guideline`, `created_at`, `updated_at`) VALUES
(1, 0, 507, 'BTCPay', 'BTCPay', 1, '{\"store_id\":{\"title\":\"Store Id\",\"global\":true,\"value\":\"HsqFVTXSeUFJu7caoYZc3CTnP8g5LErVdHhEXPVTheHf\"},\"api_key\":{\"title\":\"Api Key\",\"global\":true,\"value\":\"4436bd706f99efae69305e7c4eff4780de1335ce\"},\"server_name\":{\"title\":\"Server Name\",\"global\":true,\"value\":\"https:\\/\\/testnet.demo.btcpayserver.org\"},\"secret_code\":{\"title\":\"Secret Code\",\"global\":true,\"value\":\"SUCdqPn9CDkY7RmJHfpQVHP2Lf2\"}}', '{\"BTC\":\"Bitcoin\",\"LTC\":\"Litecoin\"}', 1, '{\"webhook\":{\"title\": \"IPN URL\",\"value\":\"ipn.BTCPay\"}}', NULL, NULL, '2023-09-28 12:02:39'),
(2, 0, 102, 'Perfect Money', 'PerfectMoney', 1, '{\"passphrase\":{\"title\":\"Alternate Passpharse\",\"global\":true,\"value\":\"hR26aw02Q1eEeUPSIfuwNypXX\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2024-02-27 05:59:32'),
(3, 0, 106, 'Payeer', 'Payeer', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"866989763\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"7575\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}', 0, '{\"status\":{\"title\": \"Status URL\",\"value\":\"ipn.Payeer\"}}', NULL, '2019-09-14 13:14:22', '2022-08-28 10:11:14'),
(4, 0, 107, 'PayStack', 'Paystack', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"pk_test_cd330608eb47970889bca397ced55c1dd5ad3783\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_8a0b1f199362d7acc9c390bff72c4e81f74e2ac3\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.Paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.Paystack\"}}\r\n', NULL, '2019-09-14 13:14:22', '2021-05-21 01:49:51'),
(6, 0, 109, 'Flutterwave', 'Flutterwave', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"---------------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"---------------------\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"---------------------\"}}', '{\"BIF\":\"BIF\",\"CAD\":\"CAD\",\"CDF\":\"CDF\",\"CVE\":\"CVE\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"GHS\":\"GHS\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"KES\":\"KES\",\"LRD\":\"LRD\",\"MWK\":\"MWK\",\"MZN\":\"MZN\",\"NGN\":\"NGN\",\"RWF\":\"RWF\",\"SLL\":\"SLL\",\"STD\":\"STD\",\"TZS\":\"TZS\",\"UGX\":\"UGX\",\"USD\":\"USD\",\"XAF\":\"XAF\",\"XOF\":\"XOF\",\"ZMK\":\"ZMK\",\"ZMW\":\"ZMW\",\"ZWD\":\"ZWD\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2024-02-26 10:06:12'),
(7, 0, 503, 'CoinPayments', 'Coinpayments', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"---------------------\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"---------------------\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"---------------------\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"USDT.BEP20\":\"Tether USD (BSC Chain)\",\"USDT.ERC20\":\"Tether USD (ERC20)\",\"USDT.TRC20\":\"Tether USD (Tron/TRC20)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, NULL, '2019-09-14 13:14:22', '2023-04-08 03:17:18'),
(8, 0, 506, 'Coinbase Commerce', 'CoinbaseCommerce', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"c47cd7df-d8e8-424b-a20a\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"55871878-2c32-4f64-ab66\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.CoinbaseCommerce\"}}', NULL, '2019-09-14 13:14:22', '2023-09-30 13:52:56'),
(9, 0, 113, 'Paypal Express', 'PaypalSdk', 1, '{\"clientId\":{\"title\":\"Paypal Client ID\",\"global\":true,\"value\":\"Ae0-tixtSV7DvLwIh3Bmu7JvHrjh5EfGdXr_cEklKAVjjezRZ747BxKILiBdzlKKyp-W8W_T7CKH1Ken\"},\"clientSecret\":{\"title\":\"Client Secret\",\"global\":true,\"value\":\"EOhbvHZgFNO21soQJT1L9Q00M3rK6PIEsdiTgXRBt2gtGtxwRer5JvKnVUGNU5oE63fFnjnYY7hq3HBA\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2024-02-27 09:07:26'),
(10, 0, 114, 'Stripe Checkout', 'StripeV3', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51I6GGiCGv1sRiQlEi5v1or9eR0HVbuzdMd2rW4n3DxC8UKfz66R4X6n4yYkzvI2LeAIuRU9H99ZpY7XCNFC9xMs500vBjZGkKG\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51I6GGiCGv1sRiQlEOisPKrjBqQqqcFsw8mXNaZ2H2baN6R01NulFS7dKFji1NRRxuchoUTEDdB7ujKcyKYSVc0z500eth7otOM\"},\"end_point\":{\"title\":\"End Point Secret\",\"global\":true,\"value\":\"whsec_lUmit1gtxwKTveLnSe88xCSDdnPOt8g5\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, '{\"webhook\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.StripeV3\"}}', NULL, '2019-09-14 13:14:22', '2021-05-21 00:58:38'),
(11, 0, 119, 'Mercado Pago', 'MercadoPago', 1, '{\"access_token\":{\"title\":\"Access Token\",\"global\":true,\"value\":\"APP_USR-7924565816849832-082312-21941521997fab717db925cf1ea2c190-1071840315\"}}', '{\"USD\":\"USD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"NOK\":\"NOK\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"AUD\":\"AUD\",\"NZD\":\"NZD\"}', 0, NULL, NULL, NULL, '2022-09-14 07:41:14'),
(12, 0, 120, 'Authorize.net', 'Authorize', 1, '{\"login_id\":{\"title\":\"Login ID\",\"global\":true,\"value\":\"59e4P9DBcZv\"},\"transaction_key\":{\"title\":\"Transaction Key\",\"global\":true,\"value\":\"47x47TJyLw2E7DbR\"}}', '{\"USD\":\"USD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"NOK\":\"NOK\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"AUD\":\"AUD\",\"NZD\":\"NZD\"}', 0, NULL, NULL, NULL, '2022-08-28 09:33:06'),
(13, 0, 509, 'Now Payments Checkout', 'NowPaymentsCheckout', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"---------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"-----------\"}}', '{\"BTG\":\"BTG\",\"ETH\":\"ETH\",\"XMR\":\"XMR\",\"ZEC\":\"ZEC\",\"XVG\":\"XVG\",\"ADA\":\"ADA\",\"LTC\":\"LTC\",\"BCH\":\"BCH\",\"QTUM\":\"QTUM\",\"DASH\":\"DASH\",\"XLM\":\"XLM\",\"XRP\":\"XRP\",\"XEM\":\"XEM\",\"DGB\":\"DGB\",\"LSK\":\"LSK\",\"DOGE\":\"DOGE\",\"TRX\":\"TRX\",\"KMD\":\"KMD\",\"REP\":\"REP\",\"BAT\":\"BAT\",\"ARK\":\"ARK\",\"WAVES\":\"WAVES\",\"BNB\":\"BNB\",\"XZC\":\"XZC\",\"NANO\":\"NANO\",\"TUSD\":\"TUSD\",\"VET\":\"VET\",\"ZEN\":\"ZEN\",\"GRS\":\"GRS\",\"FUN\":\"FUN\",\"NEO\":\"NEO\",\"GAS\":\"GAS\",\"PAX\":\"PAX\",\"USDC\":\"USDC\",\"ONT\":\"ONT\",\"XTZ\":\"XTZ\",\"LINK\":\"LINK\",\"RVN\":\"RVN\",\"BNBMAINNET\":\"BNBMAINNET\",\"ZIL\":\"ZIL\",\"BCD\":\"BCD\",\"USDT\":\"USDT\",\"USDTERC20\":\"USDTERC20\",\"CRO\":\"CRO\",\"DAI\":\"DAI\",\"HT\":\"HT\",\"WABI\":\"WABI\",\"BUSD\":\"BUSD\",\"ALGO\":\"ALGO\",\"USDTTRC20\":\"USDTTRC20\",\"GT\":\"GT\",\"STPT\":\"STPT\",\"AVA\":\"AVA\",\"SXP\":\"SXP\",\"UNI\":\"UNI\",\"OKB\":\"OKB\",\"BTC\":\"BTC\"}', 1, '', NULL, NULL, '2023-02-14 05:08:04'),
(14, 0, 122, '2Checkout', 'TwoCheckout', 1, '{\"merchant_code\":{\"title\":\"Merchant Code\",\"global\":true,\"value\":\"253248016872\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"eQM)ID@&vG84u!O*g[p+\"}}', '{\"AFN\": \"AFN\",\"ALL\": \"ALL\",\"DZD\": \"DZD\",\"ARS\": \"ARS\",\"AUD\": \"AUD\",\"AZN\": \"AZN\",\"BSD\": \"BSD\",\"BDT\": \"BDT\",\"BBD\": \"BBD\",\"BZD\": \"BZD\",\"BMD\": \"BMD\",\"BOB\": \"BOB\",\"BWP\": \"BWP\",\"BRL\": \"BRL\",\"GBP\": \"GBP\",\"BND\": \"BND\",\"BGN\": \"BGN\",\"CAD\": \"CAD\",\"CLP\": \"CLP\",\"CNY\": \"CNY\",\"COP\": \"COP\",\"CRC\": \"CRC\",\"HRK\": \"HRK\",\"CZK\": \"CZK\",\"DKK\": \"DKK\",\"DOP\": \"DOP\",\"XCD\": \"XCD\",\"EGP\": \"EGP\",\"EUR\": \"EUR\",\"FJD\": \"FJD\",\"GTQ\": \"GTQ\",\"HKD\": \"HKD\",\"HNL\": \"HNL\",\"HUF\": \"HUF\",\"INR\": \"INR\",\"IDR\": \"IDR\",\"ILS\": \"ILS\",\"JMD\": \"JMD\",\"JPY\": \"JPY\",\"KZT\": \"KZT\",\"KES\": \"KES\",\"LAK\": \"LAK\",\"MMK\": \"MMK\",\"LBP\": \"LBP\",\"LRD\": \"LRD\",\"MOP\": \"MOP\",\"MYR\": \"MYR\",\"MVR\": \"MVR\",\"MRO\": \"MRO\",\"MUR\": \"MUR\",\"MXN\": \"MXN\",\"MAD\": \"MAD\",\"NPR\": \"NPR\",\"TWD\": \"TWD\",\"NZD\": \"NZD\",\"NIO\": \"NIO\",\"NOK\": \"NOK\",\"PKR\": \"PKR\",\"PGK\": \"PGK\",\"PEN\": \"PEN\",\"PHP\": \"PHP\",\"PLN\": \"PLN\",\"QAR\": \"QAR\",\"RON\": \"RON\",\"RUB\": \"RUB\",\"WST\": \"WST\",\"SAR\": \"SAR\",\"SCR\": \"SCR\",\"SGD\": \"SGD\",\"SBD\": \"SBD\",\"ZAR\": \"ZAR\",\"KRW\": \"KRW\",\"LKR\": \"LKR\",\"SEK\": \"SEK\",\"CHF\": \"CHF\",\"SYP\": \"SYP\",\"THB\": \"THB\",\"TOP\": \"TOP\",\"TTD\": \"TTD\",\"TRY\": \"TRY\",\"UAH\": \"UAH\",\"AED\": \"AED\",\"USD\": \"USD\",\"VUV\": \"VUV\",\"VND\": \"VND\",\"XOF\": \"XOF\",\"YER\": \"YER\"}', 1, '{\"approved_url\":{\"title\": \"Approved URL\",\"value\":\"ipn.TwoCheckout\"}}', NULL, NULL, '2023-04-29 09:21:58'),
(15, 0, 123, 'Checkout', 'Checkout', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"------\"},\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"------\"},\"processing_channel_id\":{\"title\":\"Processing Channel\",\"global\":true,\"value\":\"------\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"AUD\":\"AUD\",\"CAN\":\"CAN\",\"CHF\":\"CHF\",\"SGD\":\"SGD\",\"JPY\":\"JPY\",\"NZD\":\"NZD\"}', 0, NULL, NULL, NULL, '2023-10-05 07:10:52'),
(16, 0, 110, 'RazorPay', 'Razorpay', 1, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"rzp_test_kiOtejPbRZU90E\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"osRDebzEqbsE1kbyQJ4y0re7\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, NULL),
(17, 1, 1000, 'Manual Gateway One', 'manual_gateway_one', 1, '[]', '[]', 0, NULL, '<p>When using a manual payment gateway, follow provided instructions carefully to initiate payment. Provide accurate information and choose a preferred payment method. Keep records of the transaction and allow time for processing. Verify payment and address any issues promptly. Contact customer support if needed. Ensure security and consider providing feedback for improvement.</p>', '2023-09-29 00:40:47', '2024-02-28 10:35:50'),
(18, 2, 1001, 'Manual Gateway Two', 'manual_gateway_two', 0, '[]', '[]', 0, NULL, '<p>Demo massive instructions</p>', '2023-10-08 08:30:23', '2024-02-28 10:23:25'),
(19, 0, 111, 'Stripe Storefront', 'StripeJs', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51I6GGiCGv1sRiQlEi5v1or9eR0HVbuzdMd2rW4n3DxC8UKfz66R4X6n4yYkzvI2LeAIuRU9H99ZpY7XCNFC9xMs500vBjZGkKG\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51I6GGiCGv1sRiQlEOisPKrjBqQqqcFsw8mXNaZ2H2baN6R01NulFS7dKFji1NRRxuchoUTEDdB7ujKcyKYSVc0z500eth7otOM\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, NULL),
(20, 4, 1002, 'Manual Gateway Three', 'manual_gateway_three', 1, '[]', '[]', 0, NULL, '<p>When using a manual payment gateway, follow provided instructions carefully to initiate payment. Provide accurate information and choose a preferred payment method. Keep records of the transaction and allow time for processing. Verify payment and address any issues promptly. Contact customer support if needed. Ensure security and consider providing feedback for improvement.<br></p>', '2023-11-21 07:07:31', '2024-02-28 10:35:26'),
(21, 5, 1003, 'Manual Gateway Four', 'manual_gateway_four', 1, '[]', '[]', 0, NULL, '<p>When using a manual payment gateway, follow provided instructions carefully to initiate payment. Provide accurate information and choose a preferred payment method. Keep records of the transaction and allow time for processing. Verify payment and address any issues promptly. Contact customer support if needed. Ensure security and consider providing feedback for improvement.<br></p>', '2023-11-21 09:12:25', '2024-02-28 10:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_code` int UNSIGNED DEFAULT NULL,
  `gateway_alias` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `max_amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `percent_charge` decimal(5,2) NOT NULL DEFAULT '0.00',
  `fixed_charge` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `rate` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `gateway_parameter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateway_currencies`
--

INSERT INTO `gateway_currencies` (`id`, `name`, `currency`, `symbol`, `method_code`, `gateway_alias`, `min_amount`, `max_amount`, `percent_charge`, `fixed_charge`, `rate`, `gateway_parameter`, `created_at`, `updated_at`) VALUES
(1, 'Manual Gateway One', 'USD', '', 1000, 'manual_gateway_one', 1.00000000, 900.00000000, 5.00, 1.00000000, 0.01000000, NULL, '2023-09-29 00:40:47', '2024-03-03 10:49:21'),
(9, 'Manual Gateway Two', 'USD', '', 1001, 'manual_gateway_two', 1.00000000, 1000.00000000, 1.00, 1.00000000, 1.00000000, NULL, '2023-10-08 08:30:23', '2024-02-28 10:19:58'),
(12, 'Coinbase Commerce - USD', 'USD', '$', 506, 'CoinbaseCommerce', 1.00000000, 1000.00000000, 1.00, 1.00000000, 1.00000000, '{\"api_key\":\"c47cd7df-d8e8-424b-a20a\",\"secret\":\"55871878-2c32-4f64-ab66\"}', '2023-11-16 10:32:33', '2023-11-16 10:32:33'),
(16, 'Now Payments Checkout - AVA', 'AVA', 'AVA', 509, 'NowPaymentsCheckout', 1.00000000, 1000.00000000, 1.00, 1.00000000, 1.89000000, '{\"api_key\":\"---------------\",\"secret_key\":\"-----------\"}', '2023-11-16 11:14:33', '2023-11-16 11:14:33'),
(25, 'BTCPay - BTC', 'BTC', 'BTC', 507, 'BTCPay', 1.00000000, 1000.00000000, 1.00, 1.00000000, 1.00000000, '{\"store_id\":\"HsqFVTXSeUFJu7caoYZc3CTnP8g5LErVdHhEXPVTheHf\",\"api_key\":\"4436bd706f99efae69305e7c4eff4780de1335ce\",\"server_name\":\"https:\\/\\/testnet.demo.btcpayserver.org\",\"secret_code\":\"SUCdqPn9CDkY7RmJHfpQVHP2Lf2\"}', '2023-11-16 12:25:24', '2023-11-16 12:25:24'),
(29, '2Checkout - USD', 'USD', '$', 122, 'TwoCheckout', 1.00000000, 1000.00000000, 1.00, 1.00000000, 1.00000000, '{\"merchant_code\":\"253248016872\",\"secret_key\":\"eQM)ID@&vG84u!O*g[p+\"}', '2023-11-16 12:41:19', '2023-11-16 12:41:19'),
(32, 'Manual Gateway Three', 'TRY', '', 1002, 'manual_gateway_three', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.28000000, NULL, '2023-11-21 07:07:31', '2024-02-28 10:35:26'),
(33, 'Manual Gateway Four', 'IRR', '', 1003, 'manual_gateway_four', 1.00000000, 700.00000000, 0.00, 0.00000000, 382.53000000, NULL, '2023-11-21 09:12:25', '2024-03-04 06:08:21'),
(37, 'Authorize.net - USD', 'USD', '$', 120, 'Authorize', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.00910000, '{\"login_id\":\"59e4P9DBcZv\",\"transaction_key\":\"47x47TJyLw2E7DbR\"}', '2024-02-25 05:24:43', '2024-02-25 05:24:43'),
(38, 'Checkout - USD', 'USD', '$', 123, 'Checkout', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.00910000, '{\"secret_key\":\"------\",\"public_key\":\"------\",\"processing_channel_id\":\"------\"}', '2024-02-26 05:18:51', '2024-02-26 05:18:51'),
(39, 'CoinPayments - BTC', 'BTC', 'BTC', 503, 'Coinpayments', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.00910000, '{\"public_key\":\"---------------------\",\"private_key\":\"---------------------\",\"merchant_id\":\"---------------------\"}', '2024-02-26 07:05:06', '2024-02-26 07:05:06'),
(42, 'Flutterwave - CAD', 'CAD', 'CAD', 109, 'Flutterwave', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.01000000, '{\"public_key\":\"---------------------\",\"secret_key\":\"---------------------\",\"encryption_key\":\"---------------------\"}', '2024-02-26 10:06:12', '2024-02-26 10:06:12'),
(43, 'Mercado Pago - USD', 'USD', '$', 119, 'MercadoPago', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.00910000, '{\"access_token\":\"APP_USR-7924565816849832-082312-21941521997fab717db925cf1ea2c190-1071840315\"}', '2024-02-26 10:07:33', '2024-02-26 10:07:33'),
(45, 'RazorPay - INR', 'INR', '₹', 110, 'Razorpay', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.75000000, '{\"key_id\":\"rzp_test_kiOtejPbRZU90E\",\"key_secret\":\"osRDebzEqbsE1kbyQJ4y0re7\"}', '2024-02-26 10:41:28', '2024-02-26 10:41:28'),
(48, 'PayStack - NGN', 'NGN', '₦', 107, 'Paystack', 1.00000000, 1000.00000000, 1.00, 1.00000000, 14.23000000, '{\"public_key\":\"pk_test_cd330608eb47970889bca397ced55c1dd5ad3783\",\"secret_key\":\"sk_test_8a0b1f199362d7acc9c390bff72c4e81f74e2ac3\"}', '2024-02-27 05:24:18', '2024-02-27 05:24:18'),
(49, 'Perfect Money - USD', 'USD', '$', 102, 'PerfectMoney', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.00910000, '{\"passphrase\":\"hR26aw02Q1eEeUPSIfuwNypXX\",\"wallet_id\":\"U30603391\"}', '2024-02-27 05:56:04', '2024-02-27 05:56:04'),
(50, 'Payeer - USD', 'USD', '$', 106, 'Payeer', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.00910000, '{\"merchant_id\":\"866989763\",\"secret_key\":\"7575\"}', '2024-02-27 06:11:40', '2024-02-27 06:11:40'),
(54, 'Paypal Express - USD', 'USD', '$', 113, 'PaypalSdk', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.01000000, '{\"clientId\":\"Ae0-tixtSV7DvLwIh3Bmu7JvHrjh5EfGdXr_cEklKAVjjezRZ747BxKILiBdzlKKyp-W8W_T7CKH1Ken\",\"clientSecret\":\"EOhbvHZgFNO21soQJT1L9Q00M3rK6PIEsdiTgXRBt2gtGtxwRer5JvKnVUGNU5oE63fFnjnYY7hq3HBA\"}', '2024-02-27 09:07:26', '2024-02-27 09:07:26'),
(55, 'Stripe Storefront - USD', 'USD', '$', 111, 'StripeJs', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.00910000, '{\"secret_key\":\"sk_test_51I6GGiCGv1sRiQlEi5v1or9eR0HVbuzdMd2rW4n3DxC8UKfz66R4X6n4yYkzvI2LeAIuRU9H99ZpY7XCNFC9xMs500vBjZGkKG\",\"publishable_key\":\"pk_test_51I6GGiCGv1sRiQlEOisPKrjBqQqqcFsw8mXNaZ2H2baN6R01NulFS7dKFji1NRRxuchoUTEDdB7ujKcyKYSVc0z500eth7otOM\"}', '2024-02-27 09:25:56', '2024-02-27 09:25:56'),
(56, 'Stripe Storefront - AUD', 'AUD', 'A$', 111, 'StripeJs', 1.00000000, 1000.00000000, 5.00, 5.00000000, 0.01400000, '{\"secret_key\":\"sk_test_51I6GGiCGv1sRiQlEi5v1or9eR0HVbuzdMd2rW4n3DxC8UKfz66R4X6n4yYkzvI2LeAIuRU9H99ZpY7XCNFC9xMs500vBjZGkKG\",\"publishable_key\":\"pk_test_51I6GGiCGv1sRiQlEOisPKrjBqQqqcFsw8mXNaZ2H2baN6R01NulFS7dKFji1NRRxuchoUTEDdB7ujKcyKYSVc0z500eth7otOM\"}', '2024-02-27 09:25:56', '2024-02-27 09:25:56'),
(57, 'Stripe Checkout - USD', 'USD', '$', 114, 'StripeV3', 1.00000000, 1000.00000000, 1.00, 1.00000000, 0.00910000, '{\"secret_key\":\"sk_test_51I6GGiCGv1sRiQlEi5v1or9eR0HVbuzdMd2rW4n3DxC8UKfz66R4X6n4yYkzvI2LeAIuRU9H99ZpY7XCNFC9xMs500vBjZGkKG\",\"publishable_key\":\"pk_test_51I6GGiCGv1sRiQlEOisPKrjBqQqqcFsw8mXNaZ2H2baN6R01NulFS7dKFji1NRRxuchoUTEDdB7ujKcyKYSVc0z500eth7otOM\",\"end_point\":\"whsec_lUmit1gtxwKTveLnSe88xCSDdnPOt8g5\"}', '2024-02-27 11:40:44', '2024-02-27 11:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 1, NULL, '2023-09-17 11:48:33'),
(4, 'Bangla', 'bn', 1, '2023-08-21 12:50:55', '2023-09-17 11:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_26_091103_create_admins_table', 1),
(6, '2023_07_26_100423_create_admin_password_resets_table', 2),
(7, '2023_08_05_103533_create_settings_table', 3),
(10, '2023_08_15_194830_create_site_data_table', 4),
(11, '2023_08_20_140452_create_languages_table', 5),
(12, '2023_09_25_165355_create_plugins_table', 6),
(13, '2023_09_27_053636_create_gateways_table', 7),
(14, '2023_09_27_170521_create_gateway_currencies_table', 8),
(15, '2023_09_29_062351_create_forms_table', 9),
(16, '2023_10_08_164420_create_notification_templates_table', 10),
(17, '2023_10_08_164602_create_admin_notifications_table', 11),
(18, '2023_10_08_164629_create_notification_logs_table', 12),
(19, '2023_10_09_135811_create_subscribers_table', 13),
(20, '2023_11_16_193930_create_deposits_table', 14),
(21, '2023_11_17_181741_create_transactions_table', 15),
(22, '2023_11_20_150839_create_withdraw_methods_table', 16),
(23, '2023_11_20_150907_create_withdrawals_table', 16),
(24, '2023_12_06_154325_create_contacts_table', 17),
(35, '2024_01_31_140216_create_categories_table', 18),
(38, '2024_02_03_151844_create_campaigns_table', 19),
(39, '2024_02_04_152936_create_galleries_table', 19),
(43, '2024_02_14_150246_create_comments_table', 20),
(45, '2024_02_22_110001_add_preferred_amounts_to_campaigns_table', 21),
(49, '2024_02_22_132250_create_donations_table', 22),
(51, '2024_02_25_114249_alter_transactions_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `act` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sms_body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shortcodes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_status` tinyint(1) NOT NULL DEFAULT '1',
  `sms_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'BAL_ADD', 'Balance - Added', 'Your Account has been Credited', '<div><div style=\"font-family: Montserrat, sans-serif;\">{{amount}} {{site_currency}} has been added to your account .</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">Your Current Balance is :&nbsp;</span><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">{{post_balance}}&nbsp; {{site_currency}}&nbsp;</span></font><br></div><div><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></font></div><div>Admin note:&nbsp;<span style=\"color: rgb(33, 37, 41); font-size: 12px; font-weight: 600; white-space: nowrap; text-align: var(--bs-body-text-align);\">{{remark}}</span></div>', '{{amount}} {{site_currency}} credited in your account. Your Current Balance {{post_balance}} {{site_currency}} . Transaction: #{{trx}}. Admin note is \"{{remark}}\"', '{\"trx\":\"Transaction number for the action\",\"amount\":\"Amount inserted by the admin\",\"remark\":\"Remark inserted by the admin\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 0, '2021-11-03 12:00:00', '2022-04-03 02:18:28'),
(2, 'BAL_SUB', 'Balance - Subtracted', 'Your Account has been Debited', '<div style=\"font-family: Montserrat, sans-serif;\">{{amount}} {{site_currency}} has been subtracted from your account .</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">Your Current Balance is :&nbsp;</span><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">{{post_balance}}&nbsp; {{site_currency}}</span></font><br><div><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></font></div><div>Admin Note: {{remark}}</div>', '{{amount}} {{site_currency}} debited from your account. Your Current Balance {{post_balance}} {{site_currency}} . Transaction: #{{trx}}. Admin Note is {{remark}}', '{\"trx\":\"Transaction number for the action\",\"amount\":\"Amount inserted by the admin\",\"remark\":\"Remark inserted by the admin\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:24:11'),
(7, 'PASS_RESET_CODE', 'Password - Reset - Code', 'Password Reset', '<div style=\"font-family: Montserrat, sans-serif;\">We have received a request to reset the password for your account on&nbsp;<span style=\"font-weight: bolder;\">{{time}} .<br></span></div><div style=\"font-family: Montserrat, sans-serif;\">Requested From IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>.</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><div>Your account recovery code is:&nbsp;&nbsp;&nbsp;<font size=\"6\"><span style=\"font-weight: bolder;\">{{code}}</span></font></div><div><br></div></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><div><font size=\"4\" color=\"#CC0000\"><br></font></div>', 'Your account recovery code is: {{code}}', '{\"code\":\"Verification code for password reset\",\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, 0, '2021-11-03 12:00:00', '2022-03-20 20:47:05'),
(8, 'PASS_RESET_DONE', 'Password - Reset - Confirmation', 'You have reset your password', '<p style=\"font-family: Montserrat, sans-serif;\">You have successfully reset your password.</p><p style=\"font-family: Montserrat, sans-serif;\">You changed from&nbsp; IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{time}}</span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><font color=\"#ff0000\">If you did not change that, please contact us as soon as possible.</font></span></p>', 'Your password has been changed successfully', '{\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-05 03:46:35'),
(9, 'ADMIN_SUPPORT_REPLY', 'Support - Reply', 'Reply Support Ticket', '<div><p><span data-mce-style=\"font-size: 11pt;\" style=\"font-size: 11pt;\"><span style=\"font-weight: bolder;\">A member from our support team has replied to the following ticket:</span></span></p><p><span style=\"font-weight: bolder;\"><span data-mce-style=\"font-size: 11pt;\" style=\"font-size: 11pt;\"><span style=\"font-weight: bolder;\"><br></span></span></span></p><p><span style=\"font-weight: bolder;\">[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</span></p><p>----------------------------------------------</p><p>Here is the reply :<br></p><p>{{reply}}<br></p></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', 'Your Ticket#{{ticket_id}} :  {{ticket_subject}} has been replied.', '{\"ticket_id\":\"ID of the support ticket\",\"ticket_subject\":\"Subject  of the support ticket\",\"reply\":\"Reply made by the admin\",\"link\":\"URL to view the support ticket\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:47:51'),
(10, 'EVER_CODE', 'Verification - Email', 'Please verify your email address', '<br><div><div style=\"font-family: Montserrat, sans-serif;\">Thanks For joining us.<br></div><div style=\"font-family: Montserrat, sans-serif;\">Please use the below code to verify your email address.<br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Your email verification code is:<font size=\"6\"><span style=\"font-weight: bolder;\">&nbsp;{{code}}</span></font></div></div>', '---', '{\"code\":\"Email verification code\"}', 1, 0, '2021-11-03 12:00:00', '2022-04-03 02:32:07'),
(11, 'SVER_CODE', 'Verification - SMS', 'Verify Your Mobile Number', '---', 'Your phone verification code is: {{code}}', '{\"code\":\"SMS Verification Code\"}', 0, 1, '2021-11-03 12:00:00', '2022-03-20 19:24:37'),
(12, 'WITHDRAW_APPROVE', 'Withdraw - Approved', 'Withdraw Request has been Processed and your money is sent', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been Processed Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You will get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">-----</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\">Details of Processed Payment :</font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\"><span style=\"font-weight: bolder;\">{{admin_details}}</span></font></div>', 'Admin Approve Your {{amount}} {{site_currency}} withdraw request by {{method_name}}. Transaction {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"admin_details\":\"Details provided by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:50:16'),
(13, 'WITHDRAW_REJECT', 'Withdraw - Rejected', 'Withdraw Request has been Rejected and your money is refunded to your account', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been Rejected.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You should get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">----</div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"3\"><br></font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"3\">{{amount}} {{currency}} has been&nbsp;<span style=\"font-weight: bolder;\">refunded&nbsp;</span>to your account and your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}}</span><span style=\"font-weight: bolder;\">&nbsp;{{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">-----</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\">Details of Rejection :</font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\"><span style=\"font-weight: bolder;\">{{admin_details}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br><br><br><br><br></div><div></div><div></div>', 'Admin Rejected Your {{amount}} {{site_currency}} withdraw request. Your Main Balance {{post_balance}}  {{method_name}} , Transaction {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after fter this action\",\"admin_details\":\"Rejection message by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:57:46'),
(14, 'WITHDRAW_REQUEST', 'Withdraw - Requested', 'Withdraw Request Submitted Successfully', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been submitted Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You will get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"5\">Your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br><br><br></div>', '{{amount}} {{site_currency}} withdraw requested by {{method_name}}. You will get {{method_amount}} {{method_currency}} Trx: {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after fter this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-21 04:39:03'),
(15, 'DEFAULT', 'Default Template', '{{subject}}', '{{message}}', '{{message}}', '{\"subject\":\"Subject\",\"message\":\"Message\"}', 1, 0, '2019-09-14 13:14:22', '2024-02-18 08:37:31'),
(16, 'KYC_APPROVE', 'KYC Approved Successfully', 'KYC has been approved', NULL, NULL, '[]', 1, 1, NULL, NULL),
(17, 'KYC_REJECT', 'KYC Rejected Successfully', 'KYC has been rejected', NULL, NULL, '[]', 1, 1, NULL, NULL),
(18, 'CAMPAIGN_APPROVE', 'Campaign - Approved', 'Your Campaign Has Been Approved!', '<div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"background-color: var(--bs-card-bg); color: var(--bs-card-color); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">I hope this email finds you well.</span><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"\"><font face=\"Montserrat, sans-serif\">I am pleased to inform you that your campaign, \"{{campaign_name}}\" has been successfully reviewed and approved by our team! Congratulations on reaching this milestone.</font><br></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">Your creativity and dedication to your cause shine through in the campaign you\'ve created. We believe it will make a significant impact and resonate with our audience.</font></div></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">Thank you for your hard work and commitment. We are excited to see your campaign flourish and achieve its goals.<br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">Best Regards</font></div>', 'Great news! Your campaign, \"{{campaign_name}}\" has been approved! Get ready to make an impact and reach your goals. Need assistance? Just let us know. - {{site_name}}', '{\"campaign_name\":\"Name of the campaign\"}', 1, 0, '2021-11-03 12:00:00', '2024-02-18 07:21:25'),
(19, 'CAMPAIGN_REJECT', 'Campaign - Rejected', 'Your Campaign Has Been Rejected!', '<div><div style=\"\"><font face=\"Montserrat, sans-serif\">I hope this email finds you well. I wanted to reach out to you regarding the campaign you recently submitted to our platform.</font><br></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">After careful consideration and review, we regret to inform you that your campaign</font><span style=\"font-family: Montserrat, sans-serif; color: var(--bs-card-color); background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">, \"{{campaign_name}}\"</span><span style=\"font-family: Montserrat, sans-serif; color: var(--bs-card-color); background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">&nbsp;has not been approved for publication at this time. We understand the effort and creativity you put into your submission, and we truly appreciate your contribution.</span></div><div style=\"\"><span style=\"font-family: Montserrat, sans-serif; color: var(--bs-card-color); background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><br></span></div><div style=\"\"><span style=\"background-color: var(--bs-card-bg); text-align: var(--bs-body-text-align);\"><font face=\"Montserrat, sans-serif\">Please know that our decision is not a reflection of the quality of your work, but rather a result of our current campaign criteria and objectives. We encourage you to continue exploring and creating, as your ideas are valuable to us.</font><br></span></div><div style=\"\"><span style=\"background-color: var(--bs-card-bg); text-align: var(--bs-body-text-align);\"><font face=\"Montserrat, sans-serif\"><br></font></span></div><div style=\"\"><span style=\"background-color: var(--bs-card-bg); text-align: var(--bs-body-text-align);\"><font face=\"Montserrat, sans-serif\">Thank you for your understanding and continued support. If you have any questions or would like further feedback on your submission, please don\'t hesitate to reach out to us.</font></span></div></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">Best Regards</font></div>', 'Unfortunately, your campaign, \"{{campaign_name}}\" submission wasn\'t approved this time. We value your effort but it didn\'t quite fit our criteria. Thank you for understanding. Any queries, just ask. - {{site_name}}', '{\"campaign_name\":\"Name of the campaign\"}', 1, 0, '2021-11-03 12:00:00', '2024-02-18 07:21:44'),
(20, 'COMMENT_APPROVE', 'Comment - Approved', 'Your Comment Has Been Approved!', '<div><div style=\"\"><font face=\"Montserrat, sans-serif\">We are writing to inform you that your recent comments on&nbsp;</font><span style=\"font-family: Montserrat, sans-serif;\"><b>\"{{campaign_name}}\"</b></span><font face=\"Montserrat, sans-serif\">&nbsp;have been reviewed and approved by our administrative team. We appreciate your contribution and engagement with our community.</font><br></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">Your insightful comments add value to the discussions and help foster a positive environment for exchange of ideas. We encourage you to continue participating and sharing your thoughts on topics that interest you.<br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">Thank you for your patience during the review process. If you have any further questions or concerns, please don\'t hesitate to reach out to us.</font></div></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">Best Regards,</font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">{{site_name}}<br></font></div>', 'Good news! Your comment on \"{{campaign_name}}\" have been approved by our admin team. Keep up the great contributions! - {{site_name}}', '{\"campaign_name\":\"Name of the campaign\"}', 1, 0, '2021-11-03 12:00:00', '2024-02-18 07:22:10'),
(21, 'COMMENT_REJECT', 'Comment - Rejected', 'Your Comment Has Been Rejected!', '<div><div style=\"\"><font face=\"Montserrat, sans-serif\">We regret to inform you that after careful review, your recent comments on&nbsp;</font><span style=\"font-weight: 700; font-family: Montserrat, sans-serif;\">\"{{campaign_name}}\"</span><font face=\"Montserrat, sans-serif\">&nbsp;have been rejected by our administrative team. We appreciate your effort in contributing to the discussions, however, upon review, we found that your comments did not adhere to our community guidelines.<br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">We encourage you to review our guidelines to ensure future comments align with our standards. Constructive and respectful participation is essential for maintaining a positive environment for all users.<br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">If you have any questions regarding this decision or would like further clarification, please feel free to reach out to us. We\'re here to assist you.<br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">Thank you for your understanding.</font></div></div><div style=\"\"><font face=\"Montserrat, sans-serif\"><br></font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">Best Regards,</font></div><div style=\"\"><font face=\"Montserrat, sans-serif\">{{site_name}}<br></font></div>', 'Unfortunately, your recent comments on \"{{campaign_name}}\" have been rejected. Please review our guidelines for future submissions. Thanks for your understanding. - {{site_name}}', '{\"campaign_name\":\"Name of the campaign\"}', 1, 0, '2021-11-03 12:00:00', '2024-02-18 07:33:11'),
(22, 'DONATION_COMPLETE', 'Donation - Automated - Successful', 'Thank You for Your Generous Donation!', '<p>We are thrilled to inform you that your contribution to our campaign has been received and processed successfully. Your support means the world to us and plays a vital role in helping us achieve our goals. Here are the details of your recent donation:<span style=\"color: var(--bs-card-color); background-color: var(--bs-card-bg); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">&nbsp;</span></p><p><br></p><p><b>Amount:</b> {{amount}} {{site_currency}}</p><p><b>Charge:</b>&nbsp;{{charge}} {{site_currency}}</p><p><b>Conversion Rate:</b> 1 {{site_currency}} = {{rate}} {{method_currency}}</p><p><b>Donated:</b> {{method_amount}} {{method_currency}}</p><p><span style=\"font-weight: 700; color: var(--bs-card-color); background-color: var(--bs-card-bg); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); text-align: var(--bs-body-text-align);\">Donated</span><b>&nbsp;Via:</b>&nbsp;{{method_name}}<br></p><p><b>Transaction Number:</b> {{trx}}</p><p><br></p><p>Your commitment to our cause is deeply appreciated, and we are truly grateful for your generosity. With your support, we can continue our efforts towards \"{{campaign_name}}\" campaign.</p><p>Thank you once again for your generosity and belief in our mission. If you have any questions or need further assistance, please don\'t hesitate to reach out to us.<br></p><p>Warm regards,<br></p>', 'Thank you for your donation of {{amount}} {{site_currency}} to our \"{{campaign_name}}\" campaign via {{method_name}}! Your support is invaluable and will help us make a positive impact. 🌟 {{site_name}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"campaign_name\":\"Name of the campaign\"}', 1, 1, '2021-11-03 12:00:00', '2024-03-03 10:46:15'),
(23, 'DONATION_REQUEST', 'Donation - Manual - Requested', 'Acknowledgement of Donation and Pending Status', '<p>We hope this email finds you well. We are reaching out to express our sincere gratitude for your recent contribution to our campaign. Your support is invaluable to us and brings us one step closer to achieving our goals.<br></p><p>However, we wanted to inform you that your donation is currently in a pending state. Our manual payment gateway requires administrative approval before final processing. Rest assured, our team is working diligently to review and confirm your donation as swiftly as possible.<br></p><p>Here are the details of your recent donation:<br></p><p><br></p><p><span style=\"font-weight: 700;\">Amount:</span>&nbsp;{{amount}} {{site_currency}}</p><p><span style=\"font-weight: 700;\">Charge:</span>&nbsp;{{charge}} {{site_currency}}</p><p><span style=\"font-weight: 700;\">Conversion Rate:</span>&nbsp;1 {{site_currency}} = {{rate}} {{method_currency}}</p><p><span style=\"font-weight: 700;\">Donated:</span>&nbsp;{{method_amount}} {{method_currency}}</p><p><span style=\"font-weight: 700; color: var(--bs-card-color); background-color: var(--bs-card-bg); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); text-align: var(--bs-body-text-align);\">Donated</span><span style=\"font-weight: 700;\">&nbsp;Via:</span>&nbsp;{{method_name}}<br></p><p><span style=\"font-weight: 700;\">Transaction Number:</span>&nbsp;{{trx}}</p><p><br></p><p>Your commitment to our cause fills us with gratitude, and we cannot thank you enough for your generosity. Your contribution will directly impact our efforts towards \"{{campaign_name}}\" campaign.</p><p>We understand that this pending status may raise questions or concerns. Please rest assured that we are actively monitoring the situation and will keep you updated on any developments. If you have any inquiries or require further assistance, please do not hesitate to reach out to us.<br></p><p>Once again, thank you for your unwavering support and belief in our mission. Together, we can make a difference.<br></p><p>Warm regards,<br></p>', 'Thank you for your donation of {{amount}} {{site_currency}} to our \"{{campaign_name}}\" campaign via {{method_name}}! Your support is appreciated. Please note that your donation is pending and waiting for admin approval. We\'ll keep you updated. - {{site_name}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"campaign_name\":\"Name of the campaign\"}', 1, 1, '2021-11-03 12:00:00', '2024-03-03 10:47:31'),
(24, 'DONATION_APPROVE', 'Donation - Manual - Approved', 'Confirmation of Your Generous Donation', '<div style=\"\"><p style=\"\">We hope this email finds you well.<br></p><p style=\"\">We wanted to express our sincerest gratitude for your recent donation to our \"{{campaign_name}}\" campaign. Your generosity is truly appreciated, and your contribution will go a long way in helping us achieve our goals.<span style=\"color: var(--bs-card-color); background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">&nbsp;</span></p><p style=\"\"><span style=\"color: var(--bs-card-color); background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Here are the details of your recent donation:</span><span style=\"font-family: var(--bs-body-font-family); color: var(--bs-card-color); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); background-color: var(--bs-card-bg);\">&nbsp;</span></p><p style=\"\"><span style=\"font-family: var(--bs-body-font-family); color: var(--bs-card-color); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); background-color: var(--bs-card-bg);\"><br></span></p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Amount:</span>&nbsp;{{amount}} {{site_currency}}</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Charge:</span>&nbsp;{{charge}} {{site_currency}}</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Conversion Rate:</span>&nbsp;1 {{site_currency}} = {{rate}} {{method_currency}}</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Donated:</span>&nbsp;{{method_amount}} {{method_currency}}</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700; color: var(--bs-card-color); background-color: var(--bs-card-bg); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); text-align: var(--bs-body-text-align);\">Donated</span><span style=\"font-weight: 700;\">&nbsp;Via:</span>&nbsp;{{method_name}}<br></p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Transaction Number:</span>&nbsp;{{trx}}</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><br></p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\">Your donation has been successfully processed and approved by our administration. It\'s through the support of kind-hearted individuals like you that we are able to make a difference in our community.</p><p style=\"\">Once again, thank you for your generosity and support. If you have any questions or need further assistance, please don\'t hesitate to contact us.</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\">Warm regards,</p></div>', 'Thank you for your recent donation to \"{{campaign_name}}\" campaign! Your contribution of {{amount}} {{site_currency}} has been approved and processed successfully.\r\n\r\nTransaction Details:\r\n\r\nAmount: {{amount}} {{site_currency}}\r\nCharge: {{charge}} {{site_currency}}\r\nConversion Rate: 1 {{site_currency}} = {{rate}} {{method_currency}}\r\nDonated: {{method_amount}} {{method_currency}}\r\nDonated Via: {{method_name}}\r\nTransaction Number: {{trx}}\r\n\r\nYour support means the world to us. Together, we\'re making a difference! - {{site_name}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"campaign_name\":\"Name of the campaign\"}', 1, 1, '2021-11-03 12:00:00', '2024-03-03 10:44:07'),
(25, 'DONATION_REJECT', 'Donation - Manual - Rejected', 'Important Update Regarding Your Recent Donation', '<div style=\"\"><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\">We hope this email finds you well.<br></p><p style=\"\">We regret to inform you that your recent donation to our \"<span style=\"text-wrap: nowrap; color: var(--bs-card-color); background-color: var(--bs-card-bg); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">{{campaign_name}}</span><span style=\"color: var(--bs-card-color); background-color: var(--bs-card-bg); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">\" campaign has been rejected by our administration. We understand this news may come as a disappointment, and we sincerely apologize for any inconvenience this may cause.&nbsp;</span></p><p style=\"\"><span style=\"color: var(--bs-card-color); background-color: var(--bs-card-bg); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Here are the details regarding the rejected donation:</span><span style=\"color: var(--bs-card-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); background-color: var(--bs-card-bg);\">&nbsp;</span></p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-family: var(--bs-body-font-family); color: var(--bs-card-color); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); background-color: var(--bs-card-bg);\"><br></span></p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Amount:</span>&nbsp;{{amount}} {{site_currency}}</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Charge:</span>&nbsp;{{charge}} {{site_currency}}</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Conversion Rate:</span>&nbsp;1 {{site_currency}} = {{rate}} {{method_currency}}</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Donated:</span>&nbsp;{{method_amount}} {{method_currency}}</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Donated Via:</span>&nbsp;{{method_name}}<br></p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-weight: 700;\">Transaction Number:</span>&nbsp;{{trx}}</p><p style=\"\"><span style=\"background-color: var(--bs-card-bg); text-align: var(--bs-body-text-align);\"><b>Rejection Message:</b></span>&nbsp;</p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"text-wrap: nowrap; color: var(--bs-card-color); background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">{{rejection_message}}</span></p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><br></p><p style=\"\">We want to assure you that this decision was not taken lightly, and it was made after careful consideration by our team. If you have any questions or concerns regarding this rejection, please don\'t hesitate to reach out to us.</p><p style=\"\">We genuinely appreciate your willingness to support our cause, and we hope this experience doesn\'t deter you from continuing to make a positive impact in the future.</p><p style=\"\">Thank you for your understanding.<br></p><p style=\"font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif;\">Warm regards,</p></div>', 'We regret to inform you that your recent donation to \"{{campaign_name}}\" campaign has been rejected. We apologize for any inconvenience caused.\r\n\r\nDetails:\r\n\r\nAmount: {{amount}} {{site_currency}}\r\nCharge: {{charge}} {{site_currency}}\r\nConversion Rate: 1 {{site_currency}} = {{rate}} {{method_currency}}\r\nDonated: {{method_amount}} {{method_currency}}\r\nDonated Via: {{method_name}}\r\nTransaction Number: {{trx}}\r\n\r\nRejection Message: \r\n{{rejection_message}}\r\n\r\nIf you have any questions or concerns regarding this rejection, please don\'t hesitate to reach out to us. Thank you for your understanding. - {{site_name}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"campaign_name\":\"Name of the campaign\",\"rejection_message\":\"Rejection message by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2024-03-03 10:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` bigint UNSIGNED NOT NULL,
  `act` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `script` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortcode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'object',
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `act`, `name`, `image`, `script`, `shortcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'google-analytics', 'Google Analytics', 'analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\n                <script>\n                  window.dataLayer = window.dataLayer || [];\n                  function gtag(){dataLayer.push(arguments);}\n                  gtag(\"js\", new Date());\n                \n                  gtag(\"config\", \"{{app_key}}\");\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"------\"}}', 0, NULL, '2024-01-29 10:13:38'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'captcha.png', '\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\n<div class=\"g-recaptcha\" data-sitekey=\"{{site_key}}\" data-callback=\"verifyCaptcha\"></div>\n<div id=\"g-recaptcha-error\"></div>', '{\"site_key\":{\"title\":\"Site Key\",\"value\":\"6LdPC88fAAAAADQlUf_DV6Hrvgm-pZuLJFSLDOWV\"},\"secret_key\":{\"title\":\"Secret Key\",\"value\":\"6LdPC88fAAAAAG5SVaRYDnV2NpCrptLg2XLYKRKB\"}}', 0, NULL, '2024-01-29 10:14:59'),
(3, 'facebook-messenger', 'Facebook Messenger', 'messenger.png', '<div id=\"fb-root\"></div>\n<div id=\"fb-customer-chat\" class=\"fb-customerchat\"></div>\n\n<script>\n    var chatbox = document.getElementById(\'fb-customer-chat\');\n    chatbox.setAttribute(\"page_id\", {{page_id}});\n    chatbox.setAttribute(\"attribution\", \"biz_inbox\");\n</script>\n\n<!-- Your SDK code -->\n<script>\n    window.fbAsyncInit = function() {\n    FB.init({\n        xfbml            : true,\n        version          : \'v17.0\'\n    });\n    };\n\n    (function(d, s, id) {\n    var js, fjs = d.getElementsByTagName(s)[0];\n    if (d.getElementById(id)) return;\n    js = d.createElement(s); js.id = id;\n    js.src = \'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js\';\n    fjs.parentNode.insertBefore(js, fjs);\n    }(document, \'script\', \'facebook-jssdk\'));\n</script>', '{\"page_id\":{\"title\":\"Page Id\",\"value\":\"123-123456\"}}', 0, NULL, '2023-12-03 16:46:50'),
(4, 'tawk-chat', 'Tawk.to', 'tawk.png', '<script>\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\n                        (function(){\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\n                        s1.async=true;\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\n                        s1.charset=\"UTF-8\";\n                        s1.setAttribute(\"crossorigin\",\"*\");\n                        s0.parentNode.insertBefore(s1,s0);\n                        })();\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"------\"}}', 0, NULL, '2023-11-09 10:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `site_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_cur` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'site currency text',
  `cur_sym` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'site currency symbol',
  `email_from` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sms_body` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_config` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sms_config` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `universal_shortcodes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `first_color` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_color` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signup` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'user registration',
  `enforce_ssl` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'enforce ssl',
  `agree_policy` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'accept terms and policy',
  `strong_pass` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'enforce strong password',
  `kc` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'kyc confirmation',
  `ec` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'email confirmation',
  `ea` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'email alert',
  `sc` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'sms confirmation',
  `sa` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'sms alert',
  `site_maintenance` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `language` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `active_theme` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'primary',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_cur`, `cur_sym`, `email_from`, `email_template`, `sms_body`, `sms_from`, `mail_config`, `sms_config`, `universal_shortcodes`, `first_color`, `second_color`, `signup`, `enforce_ssl`, `agree_policy`, `strong_pass`, `kc`, `ec`, `ea`, `sc`, `sa`, `site_maintenance`, `language`, `active_theme`, `created_at`, `updated_at`) VALUES
(1, 'Charity', 'BDT', '৳', 'info@softphinix.com', '<p><strong>Hello {{fullname}} ({{username}})</strong></p><p><strong>---------------------------------------</strong></p><p><strong>{{message}}</strong></p><p><strong>---------------------------------------</strong></p><p><strong>{{site_name}}</strong>.</p>', 'Hi {{fullname}} ({{username}}), {{message}}', 'PhinixAdmin', '{\"name\":\"php\"}', '{\"name\":\"custom\",\"nexmo\":{\"api_key\":\"------\",\"api_secret\":\"------\"},\"twilio\":{\"account_sid\":\"-----------------------\",\"auth_token\":\"-----------------------\",\"from\":\"----------------------\"},\"custom\":{\"method\":\"get\",\"url\":\"https:\\/\\/hostname\\/demo-api-v1\",\"headers\":{\"name\":[\"api_key\",\"Demo API\"],\"value\":[\"test_api\",\"Demo API\"]},\"body\":{\"name\":[\"from_number\",\"Demo body API\"],\"value\":[\"123-456-789\",\"Demo body API\"]}}}', '{\r\n    \"site_name\":\"Name of your site\",\r\n    \"site_currency\":\"Currency of your site\",\r\n    \"currency_symbol\":\"Symbol of currency\"\r\n}', '1b6be6', '8d0fe9', 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 1, 'primary', NULL, '2024-02-29 05:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `site_data`
--

CREATE TABLE `site_data` (
  `id` bigint UNSIGNED NOT NULL,
  `data_key` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_data`
--

INSERT INTO `site_data` (`id`, `data_key`, `data_info`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"charity\",\"donation\"],\"social_title\":\"Charity\",\"description\":\"Join Charity in creating positive change worldwide. Donate, volunteer, or spread the word to support impactful projects and foster community engagement. Together, let\'s make a difference. Donate now.\",\"social_description\":\"Empower change with Charity. Join us in our mission to create a brighter future for all through donations, volunteering, and community engagement. Together, let\'s make a difference. #Charity #Impact #DonateNow\",\"image\":\"65c46fbd9fe061707372477.jpeg\"}', '2023-08-15 14:11:35', '2024-02-08 06:13:16'),
(3, 'about.content', '{\"has_image\":\"1\",\"heading\":\"Together We Fund, Together We Flourish\",\"description\":\"Welcome to our community, where our mantra is simple yet powerful: \\\"Together We Fund, Together We Flourish.\\\" We believe that collective generosity cultivates flourishing outcomes.\\r\\n\\r\\nJoin us on this journey of shared purpose, as every contribution sows the seeds for a thriving, interconnected future.\",\"button_text\":\"Learn More\",\"button_url\":\"https:\\/\\/example.com\\/\",\"background_image\":\"65b2340b51b391706177547.jpg\",\"image\":\"65b2204867fb71706172488.png\"}', '2023-09-23 13:19:27', '2024-01-25 10:14:35'),
(8, 'cookie.data', '{\"short_details\":\"We may use cookies or any other tracking technologies when you visit our website, including any other media form, mobile website, or mobile application related or connected to help customize the Site and improve your experience\",\"details\":\"<p><strong>We may use cookies or any other tracking technologies when you visit our website, including any other media form, mobile website, or mobile application related or connected to help customize the Site and improve your experience<\\/strong><\\/p>\",\"status\":1}', NULL, '2023-11-06 11:04:44'),
(9, 'maintenance.data', '{\"heading\":\"Under Maintenance\",\"details\":\"<h3><strong>What information do we collect?<\\/strong><\\/h3><p>We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p>\"}', NULL, '2023-11-06 15:14:38'),
(11, 'policy_pages.element', '{\"title\":\"Privacy Policy\",\"details\":\"<h3><strong>What information do we collect?<\\/strong><\\/h3><p>We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><h3><strong>How do we protect your information?<\\/strong><\\/h3><p>All provided delicate\\/credit data is sent through Stripe.<br \\/>After an exchange, your private data (credit cards, social security numbers, financials, and so on) won\'t be put away on our workers.<\\/p><h3><strong>Do we disclose any information to outside parties?<\\/strong><\\/h3><p>We don\'t sell, exchange, or in any case move to outside gatherings by and by recognizable data. This does exclude confided in outsiders who help us in working our site, leading our business, or adjusting you, since those gatherings consent to keep this data private. We may likewise deliver your data when we accept discharge is suitable to follow the law, implement our site strategies, or ensure our own or others\' rights, property, or wellbeing.<\\/p><h3><strong>Children\'s Online Privacy Protection Act Compliance<\\/strong><\\/h3><p>We are consistent with the prerequisites of COPPA (Children\'s Online Privacy Protection Act), we don\'t gather any data from anybody under 13 years old. Our site, items, and administrations are completely coordinated to individuals who are in any event 13 years of age or more established.<\\/p><h3><strong>Changes to our Privacy Policy<\\/strong><\\/h3><p>If we decide to change our privacy policy, we will post those changes on this page.<\\/p><h3><strong>How long we retain your information?<\\/strong><\\/h3><p>At the point when you register for our site, we cycle and keep your information we have about you however long you don\'t erase the record or withdraw yourself (subject to laws and guidelines).<\\/p><h3><strong>What we don\\u2019t do with your data<\\/strong><\\/h3><p>We don\'t and will never share, unveil, sell, or in any case give your information to different organizations for the promoting of their items or administrations.<\\/p>\"}', '2023-11-09 10:17:26', '2023-11-09 10:17:26'),
(12, 'policy_pages.element', '{\"title\":\"Terms of Service\",\"details\":\"<p>We claim all authority to dismiss, end, or handicap any help with or without cause per administrator discretion. This is a Complete independent facilitating, on the off chance that you misuse our ticket or Livechat or emotionally supportive network by submitting solicitations or protests we will impair your record. The solitary time you should reach us about the seaward facilitating is if there is an issue with the worker. We have not many substance limitations and everything is as per laws and guidelines. Try not to join on the off chance that you intend to do anything contrary to the guidelines, we do check these things and we will know, don\'t burn through our own and your time by joining on the off chance that you figure you will have the option to sneak by us and break the terms.<\\/p><ul><li>Configuration requests - If you have a fully managed dedicated server with us then we offer custom PHP\\/MySQL configurations, firewalls for dedicated IPs, DNS, and httpd configurations.<\\/li><li>Software requests - Cpanel Extension Installation will be granted as long as it does not interfere with the security, stability, and performance of other users on the server.<\\/li><li>Emergency Support - We do not provide emergency support \\/ Phone Support \\/ LiveChat Support. Support may take some hours sometimes.<\\/li><li>Webmaster help - We do not offer any support for webmaster related issues and difficulty including coding, & installs, Error solving. if there is an issue where a library or configuration of the server then we can help you if it\'s possible from our end.<\\/li><li>Backups - We keep backups but we are not responsible for data loss, you are fully responsible for all backups.<\\/li><li>We Don\'t support any child porn or such material.<\\/li><li>No spam-related sites or material, such as email lists, mass mail programs, and scripts, etc.<\\/li><li>No harassing material that may cause people to retaliate against you.<\\/li><li>No phishing pages.<\\/li><li>You may not run any exploitation script from the server. reason can be terminated immediately.<\\/li><li>If Anyone attempting to hack or exploit the server by using your script or hosting, we will terminate your account to keep safe other users.<\\/li><li>Malicious Botnets are strictly forbidden.<\\/li><li>Spam, mass mailing, or email marketing in any way are strictly forbidden here.<\\/li><li>Malicious hacking materials, trojans, viruses, & malicious bots running or for download are forbidden.<\\/li><li>Resource and cronjob abuse is forbidden and will result in suspension or termination.<\\/li><li>Php\\/CGI proxies are strictly forbidden.<\\/li><li>CGI-IRC is strictly forbidden.<\\/li><li>No fake or disposal mailers, mass mailing, mail bombers, SMS bombers, etc.<\\/li><li>NO CREDIT OR REFUND will be granted for interruptions of service, due to User Agreement violations.<\\/li><\\/ul><h3><strong>Terms & Conditions for Users<\\/strong><\\/h3><p>Before getting to this site, you are consenting to be limited by these site Terms and Conditions of Use, every single appropriate law, and guidelines, and concur that you are answerable for consistency with any material neighborhood laws. If you disagree with any of these terms, you are restricted from utilizing or getting to this site.<\\/p><h3><strong>Support<\\/strong><\\/h3><p>Whenever you have downloaded our item, you may get in touch with us for help through email and we will give a valiant effort to determine your issue. We will attempt to answer using the Email for more modest bug fixes, after which we will refresh the center bundle. Content help is offered to confirmed clients by Tickets as it were. Backing demands made by email and Livechat.<\\/p><p>On the off chance that your help requires extra adjustment of the System, at that point, you have two alternatives:<\\/p><ul><li>Hang tight for additional update discharge.<\\/li><li>Or on the other hand, enlist a specialist (We offer customization for extra charges).<\\/li><\\/ul><h3><strong>Ownership<\\/strong><\\/h3><p>You may not guarantee scholarly or selective possession of any of our items, altered or unmodified. All items are property, we created them. Our items are given \\\"with no guarantees\\\" without guarantee of any sort, either communicated or suggested. On no occasion will our juridical individual be subject to any harms including, however not restricted to, immediate, roundabout, extraordinary, accidental, or significant harms or different misfortunes emerging out of the utilization of or powerlessness to utilize our items.<\\/p><h3><strong>Warranty<\\/strong><\\/h3><p>We don\'t offer any guarantee or assurance of these Services in any way. When our Services have been modified we can\'t ensure they will work with all outsider plugins, modules, or internet browsers. Program similarity ought to be tried against the show formats on the demo worker. If you don\'t mind guarantee that the programs you use will work with the component, as we can not ensure that our systems will work with all program mixes.<\\/p><h3><strong>Unauthorized\\/Illegal Usage<\\/strong><\\/h3><p>You may not utilize our things for any illicit or unapproved reason or may you, in the utilization of the stage, disregard any laws in your locale (counting yet not restricted to copyright laws) just as the laws of your nation and International law. Specifically, it is disallowed to utilize the things on our foundation for pages that advance: brutality, illegal intimidation, hard sexual entertainment, bigotry, obscenity content or warez programming joins.<br \\/><br \\/>You can\'t imitate, copy, duplicate, sell, exchange or adventure any of our segment, utilization of the offered on our things, or admittance to the administration without the express composed consent by us or item proprietor.<br \\/><br \\/>Our Members are liable for all substance posted on the discussion and demo and movement that happens under your record.<br \\/><br \\/>We hold the chance of hindering your participation account quickly if we will think about a particularly not allowed conduct.<br \\/><br \\/>If you make a record on our site, you are liable for keeping up the security of your record, and you are completely answerable for all exercises that happen under the record and some other activities taken regarding the record. You should quickly inform us, of any unapproved employments of your record or some other penetrates of security.<\\/p><h3><strong>Fiverr, Seoclerks Sellers Or Affiliates<\\/strong><\\/h3><p>We do NOT ensure full SEO campaign conveyance within 24 hours. We make no assurance for conveyance time by any means. We give our best assessment to orders during the putting in of requests, anyway, these are gauges. We won\'t be considered liable for loss of assets, negative surveys or you being prohibited for late conveyance. If you are selling on a site that requires time touchy outcomes, utilize Our SEO Services at your own risk.<\\/p><h3><strong>Payment\\/Refund Policy<\\/strong><\\/h3><p>No refund or cash back will be made. After a deposit has been finished, it is extremely unlikely to invert it. You should utilize your equilibrium on requests our administrations, Hosting, SEO campaign. You concur that once you complete a deposit, you won\'t document a debate or a chargeback against us in any way, shape, or form.<br \\/><br \\/>If you document a debate or chargeback against us after a deposit, we claim all authority to end every single future request, prohibit you from our site. False action, for example, utilizing unapproved or taken charge cards will prompt the end of your record. There are no special cases.<\\/p><h3><strong>Free Balance \\/ Coupon Policy<\\/strong><\\/h3><p>We offer numerous approaches to get FREE Balance, Coupons and Deposit offers yet we generally reserve the privilege to audit it and deduct it from your record offset with any explanation we may it is a sort of misuse. If we choose to deduct a few or all of free Balance from your record balance, and your record balance becomes negative, at that point the record will naturally be suspended. If your record is suspended because of a negative Balance you can request to make a custom payment to settle your equilibrium to actuate your record.<\\/p>\"}', '2023-11-09 10:17:51', '2023-11-09 10:17:51'),
(14, 'banner.element', '{\"has_image\":\"1\",\"title\":\"Pledge for Progress\",\"heading\":\"Empowering Dreams, One Backing at a Time\",\"short_description\":\"Crowdfunding is a funding method where individuals or organizations raise small amounts of money from a large number of people, typically via online platforms.\",\"first_button_text\":\"Join With Us\",\"first_button_url\":\"https:\\/\\/example.com\\/\",\"second_button_text\":\"Explore Campaign\",\"second_button_url\":\"https:\\/\\/example.com\\/\",\"background_image\":\"65b2056b8623d1706165611.jpg\"}', '2024-01-25 06:53:31', '2024-01-25 06:53:31'),
(15, 'banner.element', '{\"has_image\":\"1\",\"title\":\"Join the Backing Revolution\",\"heading\":\"Backing Visionaries, Building Tomorrow\",\"short_description\":\"Crowdfunding is a funding method where individuals or organizations raise small amounts of money from a large number of people, typically via online platforms.\",\"first_button_text\":\"Join With Us\",\"first_button_url\":\"https:\\/\\/example.com\\/\",\"second_button_text\":\"Explore Campaign\",\"second_button_url\":\"https:\\/\\/example.com\\/\",\"background_image\":\"65b20636395661706165814.jpg\"}', '2024-01-25 06:56:54', '2024-01-25 06:56:54'),
(16, 'banner.element', '{\"has_image\":\"1\",\"title\":\"Back, Believe, Build\",\"heading\":\"Where Ideas Take Flight, Fueled by You\",\"short_description\":\"Crowdfunding is a funding method where individuals or organizations raise small amounts of money from a large number of people, typically via online platforms.\",\"first_button_text\":\"Join With Us\",\"first_button_url\":\"https:\\/\\/example.com\\/\",\"second_button_text\":\"Explore Campaign\",\"second_button_url\":\"https:\\/\\/example.com\\/\",\"background_image\":\"65b2068a2840e1706165898.jpg\"}', '2024-01-25 06:58:18', '2024-01-25 06:58:18'),
(17, 'featured_campaign.content', '{\"section_heading\":\"Featured Campaign\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.\"}', '2024-01-25 10:33:22', '2024-01-25 10:38:45'),
(18, 'volunteer.content', '{\"section_heading\":\"Discover Our Volunteer\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.\"}', '2024-01-25 10:53:52', '2024-01-25 10:53:52'),
(19, 'volunteer.element', '{\"has_image\":\"1\",\"name\":\"John Doe\",\"participated\":\"10\",\"from\":\"Bangladesh\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\",\"twitter\":\"https:\\/\\/twitter.com\\/\",\"instagram\":\"https:\\/\\/www.instagram.com\\/\",\"linkedin\":\"https:\\/\\/www.linkedin.com\\/\",\"volunteer_image\":\"65b23e875768d1706180231.jpg\"}', '2024-01-25 10:57:11', '2024-01-25 10:57:11'),
(20, 'volunteer.element', '{\"has_image\":\"1\",\"name\":\"John Doe\",\"participated\":\"20\",\"from\":\"Bangladesh\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\",\"twitter\":\"https:\\/\\/twitter.com\\/\",\"instagram\":\"https:\\/\\/www.instagram.com\\/\",\"linkedin\":\"https:\\/\\/www.linkedin.com\\/\",\"volunteer_image\":\"65b23e9fd081e1706180255.jpg\"}', '2024-01-25 10:57:35', '2024-01-25 10:57:35'),
(21, 'volunteer.element', '{\"has_image\":\"1\",\"name\":\"John Doe\",\"participated\":\"30\",\"from\":\"Bangladesh\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\",\"twitter\":\"https:\\/\\/twitter.com\\/\",\"instagram\":\"https:\\/\\/www.instagram.com\\/\",\"linkedin\":\"https:\\/\\/www.linkedin.com\\/\",\"volunteer_image\":\"65b23eb0ba4ae1706180272.jpg\"}', '2024-01-25 10:57:52', '2024-01-25 10:57:52'),
(22, 'volunteer.element', '{\"has_image\":\"1\",\"name\":\"John Doe\",\"participated\":\"40\",\"from\":\"Bangladesh\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\",\"twitter\":\"https:\\/\\/twitter.com\\/\",\"instagram\":\"https:\\/\\/www.instagram.com\\/\",\"linkedin\":\"https:\\/\\/www.linkedin.com\\/\",\"volunteer_image\":\"65b23ec00f1281706180288.jpg\"}', '2024-01-25 10:58:08', '2024-01-25 10:58:08'),
(23, 'counter.element', '{\"title\":\"Total Volunteer\",\"counter_digit\":\"1203\"}', '2024-01-25 11:33:01', '2024-01-25 11:33:01'),
(24, 'counter.element', '{\"title\":\"Total Volunteer\",\"counter_digit\":\"3627\"}', '2024-01-25 11:38:15', '2024-01-25 11:38:15'),
(25, 'counter.element', '{\"title\":\"Total Volunteer\",\"counter_digit\":\"2785\"}', '2024-01-25 11:38:26', '2024-01-25 11:38:26'),
(26, 'counter.element', '{\"title\":\"Total Volunteer\",\"counter_digit\":\"1596\"}', '2024-01-25 11:38:39', '2024-01-25 11:38:39'),
(27, 'breadcrumb.content', '{\"has_image\":\"1\",\"background_image\":\"65b24f623fe111706184546.png\"}', '2024-01-25 12:09:06', '2024-01-25 12:09:07'),
(28, 'client_review.content', '{\"heading\":\"Client\\u2019s Review\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.\"}', '2024-01-28 04:54:05', '2024-01-28 04:54:05'),
(29, 'client_review.element', '{\"has_image\":\"1\",\"client_name\":\"Donald M. Hayman\",\"client_designation\":\"CEO & Founder\",\"client_review\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quasi odit dolorem non iste itaque ratione sit quis. Animi ipsa quisquam repellendus natus eius error praesentium officia at sapiente iste.\",\"client_image\":\"65b5de61abb9a1706417761.jpg\"}', '2024-01-28 04:56:01', '2024-01-28 04:56:01'),
(30, 'client_review.element', '{\"has_image\":\"1\",\"client_name\":\"John Doe\",\"client_designation\":\"Web Developer\",\"client_review\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quasi odit dolorem non iste itaque ratione sit quis. Animi ipsa quisquam repellendus natus eius error praesentium officia at sapiente iste.\",\"client_image\":\"65b5dea35d3a51706417827.jpg\"}', '2024-01-28 04:57:07', '2024-01-28 04:57:07'),
(31, 'client_review.element', '{\"has_image\":\"1\",\"client_name\":\"Mark Smith\",\"client_designation\":\"Web Designer\",\"client_review\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quasi odit dolorem non iste itaque ratione sit quis. Animi ipsa quisquam repellendus natus eius error praesentium officia at sapiente iste.\",\"client_image\":\"65b5ded10c2a91706417873.jpg\"}', '2024-01-28 04:57:53', '2024-01-28 04:57:53'),
(32, 'partner.element', '{\"has_image\":\"1\",\"image\":\"65b5ea1ceb5641706420764.png\"}', '2024-01-28 05:46:04', '2024-01-28 05:46:05'),
(33, 'partner.element', '{\"has_image\":\"1\",\"image\":\"65b5ea2a74b941706420778.png\"}', '2024-01-28 05:46:18', '2024-01-28 05:46:18'),
(34, 'partner.element', '{\"has_image\":\"1\",\"image\":\"65b5ea337412f1706420787.png\"}', '2024-01-28 05:46:27', '2024-01-28 05:46:27'),
(35, 'partner.element', '{\"has_image\":\"1\",\"image\":\"65b5ea3d571c61706420797.png\"}', '2024-01-28 05:46:37', '2024-01-28 05:46:37'),
(36, 'partner.element', '{\"has_image\":\"1\",\"image\":\"65b5ea48bce621706420808.png\"}', '2024-01-28 05:46:48', '2024-01-28 05:46:48'),
(37, 'partner.element', '{\"has_image\":\"1\",\"image\":\"65b5ea53051e61706420819.png\"}', '2024-01-28 05:46:58', '2024-01-28 05:46:59'),
(38, 'faq.content', '{\"heading\":\"Frequently Asked Question\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.\"}', '2024-01-28 06:18:23', '2024-02-20 09:40:06'),
(39, 'faq.element', '{\"question\":\"What is crowdfunding?\",\"answer\":\"Crowdfunding is a method of raising funds from a large number of people, typically via online platforms. It allows individuals, businesses, or organizations to present their projects, causes, or ventures to a wide audience, inviting contributions from interested individuals, known as backers or supporters.<br \\/>\"}', '2024-01-28 06:19:09', '2024-01-28 06:19:09'),
(40, 'faq.element', '{\"question\":\"How does crowdfunding work?\",\"answer\":\"Crowdfunding involves creating a campaign that outlines the details of a project or cause, including its purpose, goals, and often, rewards for backers. Supporters can then contribute financially to the campaign through the crowdfunding platform. If the funding goal is reached within a specified timeframe, the project is funded, and funds are typically released to the campaign creator.<br \\/>\"}', '2024-01-28 06:19:39', '2024-01-28 06:19:39'),
(41, 'faq.element', '{\"question\":\"What types of crowdfunding are there?\",\"answer\":\"There are various types of crowdfunding, including reward-based (backers receive non-financial incentives), equity-based (backers receive a share of the project), donation-based (contributors give without expecting anything in return), and debt-based (backers lend money to the project, expecting repayment with interest).<br \\/>\"}', '2024-01-28 06:20:10', '2024-01-28 06:20:10'),
(42, 'faq.element', '{\"question\":\"What are the benefits of crowdfunding?\",\"answer\":\"Crowdfunding offers a democratized approach to funding, allowing creators to access capital from a broad audience. It also provides a platform for testing market interest, building a community around a project, and gaining early support and validation.<br \\/>\"}', '2024-01-28 06:20:40', '2024-01-28 06:20:40'),
(43, 'faq.element', '{\"question\":\"Is crowdfunding only for business startups?\",\"answer\":\"No, crowdfunding is versatile and can be used for various purposes, including supporting creative projects, charitable causes, personal needs, or even product launches. It\'s not limited to business startups and has been successfully used across diverse sectors.<br \\/>\"}', '2024-01-28 06:21:14', '2024-01-28 06:21:14'),
(44, 'faq.element', '{\"question\":\"Are there risks involved in crowdfunding?\",\"answer\":\"Yes, there are risks associated with crowdfunding. Contributors may not receive the promised rewards or returns, and projects may not be completed as planned. Due diligence is crucial for both creators and backers to minimize these risks.<br \\/>\"}', '2024-01-28 06:22:02', '2024-01-28 06:22:02'),
(45, 'faq.element', '{\"question\":\"How do creators set crowdfunding goals?\",\"answer\":\"Creators should carefully calculate their funding needs, considering the costs associated with their project or cause. It\'s essential to set a realistic goal that covers expenses while appealing to potential backers. Unrealistic goals can lead to unsuccessful campaigns.<br \\/>\"}', '2024-01-28 06:22:33', '2024-01-28 06:22:33'),
(46, 'faq.element', '{\"question\":\"What tips can enhance a crowdfunding campaign\'s success?\",\"answer\":\"Success often hinges on effective communication, a compelling story, and a well-thought-out marketing strategy. Engaging with the audience, offering attractive rewards, and providing regular updates can build trust and momentum for a crowdfunding campaign.<br \\/>\"}', '2024-01-28 06:23:01', '2024-01-28 06:23:01'),
(47, 'contact_us.content', '{\"heading\":\"Get In Touch With Us\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.\",\"form_heading\":\"We are waiting to hear from you\",\"form_button_name\":\"Send Message\",\"latitude\":\"23.815406\",\"longitude\":\"90.371220\"}', '2024-01-28 07:22:17', '2024-01-28 09:27:21'),
(48, 'contact_us.element', '{\"icon\":\"<i class=\\\"fas fa-map-marker-alt\\\"><\\/i>\",\"heading\":\"Address\",\"data\":\"House - 60, Road - 20, Sector - 11, Uttara, Dhaka, Bangladesh.\"}', '2024-01-28 08:41:57', '2024-01-28 08:41:57'),
(49, 'contact_us.element', '{\"icon\":\"<i class=\\\"fas fa-envelope\\\"><\\/i>\",\"heading\":\"Email Address\",\"data\":\"example@example.com\"}', '2024-01-28 08:44:00', '2024-01-28 08:44:00'),
(50, 'contact_us.element', '{\"icon\":\"<i class=\\\"fas fa-phone\\\"><\\/i>\",\"heading\":\"Phone\",\"data\":\"+880 1234 567 890\"}', '2024-01-28 08:46:13', '2024-01-28 08:46:13'),
(51, 'footer.content', '{\"footer_text\":\"Your Support, Their Dreams - Transforming Lives with us.\",\"copyright_text\":\"\\u00a9 Copyright 2024. All rights reserved.\"}', '2024-01-28 10:51:36', '2024-01-28 10:51:36'),
(52, 'footer.element', '{\"social_icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/\"}', '2024-01-28 10:52:44', '2024-01-28 10:52:44'),
(53, 'footer.element', '{\"social_icon\":\"<i class=\\\"fab fa-twitter\\\"><\\/i>\",\"url\":\"https:\\/\\/twitter.com\\/\"}', '2024-01-28 10:56:10', '2024-01-28 10:56:10'),
(54, 'footer.element', '{\"social_icon\":\"<i class=\\\"fab fa-linkedin-in\\\"><\\/i>\",\"url\":\"https:\\/\\/www.linkedin.com\\/\"}', '2024-01-28 11:01:24', '2024-01-28 11:01:24'),
(55, 'footer.element', '{\"social_icon\":\"<i class=\\\"fab fa-instagram\\\"><\\/i>\",\"url\":\"https:\\/\\/www.instagram.com\\/\"}', '2024-01-28 11:02:20', '2024-01-28 11:02:20'),
(56, 'login.content', '{\"has_image\":\"1\",\"form_heading\":\"Sign in to your account\",\"submit_button_text\":\"Log In\",\"background_image\":\"65b74764a461f1706510180.png\",\"image\":\"65b74765412171706510181.png\"}', '2024-01-29 06:36:20', '2024-01-29 06:45:49'),
(57, 'register.content', '{\"has_image\":\"1\",\"form_heading\":\"Create new account\",\"submit_button_text\":\"Sign Up\",\"background_image\":\"65b74f51b34751706512209.png\",\"image\":\"65b74f52152831706512210.png\"}', '2024-01-29 07:10:09', '2024-01-29 07:10:10'),
(58, 'kyc.content', '{\"verification_required_heading\":\"Verification Needed\",\"verification_required_details\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.\",\"verification_pending_heading\":\"Verification Pending\",\"verification_pending_details\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.\"}', '2024-01-29 10:35:38', '2024-01-29 10:56:49'),
(59, 'forgot_password.content', '{\"has_image\":\"1\",\"form_heading\":\"Recover your account\",\"submit_button_text\":\"Next\",\"background_image\":\"65b889ba49ef11706592698.png\",\"image\":\"65b889bad9f7f1706592698.png\"}', '2024-01-30 05:31:38', '2024-01-30 05:33:54'),
(60, 'code_verification.content', '{\"has_image\":\"1\",\"form_heading\":\"Enter the verification code\",\"submit_button_text\":\"Submit\",\"background_image\":\"65b89466d3f5f1706595430.png\",\"image\":\"65b8946735e5d1706595431.png\"}', '2024-01-30 06:17:10', '2024-01-30 06:17:11'),
(61, 'password_reset.content', '{\"has_image\":\"1\",\"form_heading\":\"Reset your password\",\"submit_button_text\":\"Submit\",\"background_image\":\"65b8a0de319171706598622.png\",\"image\":\"65b8a0de8cb621706598622.png\"}', '2024-01-30 07:10:22', '2024-01-30 07:10:22'),
(62, 'email_confirm.content', '{\"has_image\":\"1\",\"form_heading\":\"Verify your email address\",\"submit_button_text\":\"Submit\",\"background_image\":\"65b8c50552abc1706607877.png\",\"image\":\"65b8c505e4e881706607877.png\"}', '2024-01-30 09:44:37', '2024-01-30 09:44:38'),
(63, 'mobile_confirm.content', '{\"has_image\":\"1\",\"form_heading\":\"Verify your phone number\",\"submit_button_text\":\"Submit\",\"background_image\":\"65b8cad7221bf1706609367.png\",\"image\":\"65b8cad77c5201706609367.png\"}', '2024-01-30 10:09:27', '2024-01-30 10:09:27'),
(64, 'user_ban.content', '{\"has_image\":\"1\",\"form_heading\":\"You are banned\",\"background_image\":\"65b8d184a65391706611076.png\",\"image\":\"65b8d1850888c1706611077.png\"}', '2024-01-30 10:37:56', '2024-01-30 10:37:57'),
(65, '2fa_confirm.content', '{\"has_image\":\"1\",\"form_heading\":\"Verify two factor authentication\",\"submit_button_text\":\"Submit\",\"background_image\":\"65b8e90fe5ee11706617103.png\",\"image\":\"65b8e9104af471706617104.png\"}', '2024-01-30 12:18:23', '2024-01-30 12:29:35'),
(66, 'campaign_category.content', '{\"section_heading\":\"Campaign Category\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.\"}', '2024-02-03 06:31:04', '2024-02-03 06:31:04'),
(67, 'recent_campaign.content', '{\"section_heading\":\"Our Recent Initiatives\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate doloribus recusandae iste fugit assumenda.\"}', '2024-02-08 06:59:23', '2024-02-08 06:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `charge` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `post_balance` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `campaign_id` int UNSIGNED DEFAULT NULL,
  `campaign_post_balance` decimal(28,8) UNSIGNED NOT NULL DEFAULT '0.00000000',
  `trx_type` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `charge`, `post_balance`, `campaign_id`, `campaign_post_balance`, `trx_type`, `trx`, `details`, `remark`, `created_at`, `updated_at`) VALUES
(36, 12, 100.00000000, 10.00000000, 0.00000000, 14, 100.00000000, '+', '9J4RK1Q4RRQM', 'Donation Via Stripe Storefront - AUD', 'deposit', '2024-02-29 07:35:31', '2024-02-29 07:35:31'),
(37, 0, 1000.00000000, 11.00000000, 0.00000000, 17, 1000.00000000, '+', 'X6YBGBMXSD1F', 'Donation Via Stripe Storefront - USD', 'deposit', '2024-02-29 10:45:09', '2024-02-29 10:45:09'),
(38, 12, 400.00000000, 5.00000000, 0.00000000, 13, 400.00000000, '+', 'XQKOSCZ6DATE', 'Donation Via Manual Gateway Three', 'deposit', '2024-03-03 06:18:37', '2024-03-03 06:18:37'),
(39, 13, 900.00000000, 46.00000000, 0.00000000, 18, 900.00000000, '+', 'OCKWHHUJHHRX', 'Donation Via Manual Gateway One', 'deposit', '2024-03-03 10:41:07', '2024-03-03 10:41:07'),
(40, 13, 250.00000000, 0.00000000, 0.00000000, 13, 650.00000000, '+', 'KQBY91YFMZH1', 'Donation Via Manual Gateway Four', 'deposit', '2024-03-04 06:15:07', '2024-03-04 06:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_by` int UNSIGNED NOT NULL DEFAULT '0',
  `balance` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '0: banned, 1: active',
  `kyc_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `kc` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: KYC unconfirmed, 2: KYC pending, 1: KYC confirmed',
  `ec` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: email unconfirmed, 1: email confirmed',
  `sc` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: mobile unconfirmed, 1: mobile confirmed',
  `ver_code` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: 2fa off, 1: 2fa on',
  `tc` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '0: 2fa unconfirmed, 1: 2fa confirmed',
  `tsc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ban_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `firstname`, `lastname`, `username`, `email`, `country_code`, `country_name`, `mobile`, `ref_by`, `balance`, `password`, `address`, `status`, `kyc_data`, `kc`, `ec`, `sc`, `ver_code`, `ver_code_send_at`, `ts`, `tc`, `tsc`, `ban_reason`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, '65d466e8710181708418792.jpg', 'James', 'Marshall', 'james', 'james@gmail.com', 'US', 'United States', '817-290-8546', 0, 1650.00000000, '$2y$10$WgfK/bFU5aiJ0E1qvtfgjuDbJPBOXd77ksCTdims7H2t7tPYv/rka', '{\"state\":\"Louisiana\",\"zip\":\"70116\",\"city\":\"New Orleans\",\"address\":\"1003 Bourbon St\"}', 1, NULL, 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, '2024-01-29 10:18:43', '2024-02-29 06:22:27'),
(13, '65d46c259fae31708420133.jpg', 'David', 'Gonzalez', 'david', 'david@gmail.com', 'US', 'United States', '912-307-5602', 0, 0.00000000, '$2y$10$GCjStwEr6Nnr/lVd92dCMu.HpB0w1lsxbPoEmJ/t5Ft/SNHUx8x7y', '{\"state\":\"Texas\",\"zip\":\"75223\",\"city\":\"Dallas\",\"address\":\"515 S Peak St\"}', 1, NULL, 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, '2024-02-14 12:15:55', '2024-02-29 06:25:04'),
(14, NULL, 'John', 'Doe', 'johndoe', 'john@gmail.com', 'AX', 'Aland Islands', '358123456789', 0, 0.00000000, '$2y$10$jXQZDC90YT2pJ1rKfbOcy.9wH/Y/N5PmzS0.K46rDYpxpeeOiObAq', NULL, 1, '[{\"name\":\"Full Name\",\"type\":\"text\",\"value\":\"John Doe\"},{\"name\":\"Voter Id\",\"type\":\"text\",\"value\":\"JOHN123456789\"},{\"name\":\"NID Photo\",\"type\":\"file\",\"value\":\"2024\\/02\\/15\\/65cdaf5424bcf1707978580.jpg\"}]', 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, '2024-02-15 06:29:09', '2024-02-15 06:30:01'),
(15, '65d46c908d6141708420240.jpg', 'Jane', 'Doe', 'janedoe', 'jane@gmail.com', 'AS', 'AmericanSamoa', '1684987654321', 0, 0.00000000, '$2y$10$KAT0wI0OgG2dV1yz0p0L9.ehVORSPMo1U9sYAUV3GKpBV2GLm5M5y', '{\"state\":null,\"zip\":null,\"city\":null,\"address\":null}', 1, '[{\"name\":\"Full Name\",\"type\":\"text\",\"value\":\"John Doe\"},{\"name\":\"Voter Id\",\"type\":\"text\",\"value\":\"JANE987654321\"},{\"name\":\"NID Photo\",\"type\":\"file\",\"value\":\"2024\\/02\\/15\\/65cdb73f528841707980607.jpg\"}]', 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, '2024-02-15 07:03:04', '2024-02-20 09:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint UNSIGNED NOT NULL,
  `method_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `currency` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `charge` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `trx` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `after_charge` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `withdraw_information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `form_id` int UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(28,8) DEFAULT '0.00000000',
  `max_amount` decimal(28,8) NOT NULL DEFAULT '0.00000000',
  `fixed_charge` decimal(28,8) DEFAULT '0.00000000',
  `rate` decimal(28,8) DEFAULT '0.00000000',
  `percent_charge` decimal(5,2) DEFAULT NULL,
  `currency` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guideline` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `form_id`, `name`, `min_amount`, `max_amount`, `fixed_charge`, `rate`, `percent_charge`, `currency`, `guideline`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'EasyCashOut', 1.00000000, 1000.00000000, 0.00000000, 2.54000000, 1.00, 'PKR', '<p>To withdraw funds using EasyCashOut, log in, go to the \'Withdrawal\' section, choose EasyCashOut, enter the amount, and confirm. Funds will be transferred within 1-3 business days. Check for fees and ensure accurate account details.<br></p>', 1, '2023-11-21 11:15:53', '2024-02-29 05:42:09'),
(2, 7, 'InstantCash', 1.00000000, 1000.00000000, 0.00000000, 0.67000000, 1.00, 'AFN', '<p>To withdraw funds using InstantCash, log in, go to the \'Withdrawal\' section, choose InstantCash, enter the amount, and confirm. Funds will be transferred within 1-3 business days. Check for fees and ensure accurate account details.<br></p>', 1, '2023-11-21 17:08:05', '2024-02-29 05:43:01'),
(3, 8, 'TurboCashOut', 10.00000000, 900.00000000, 1.00000000, 0.04300000, 1.00, 'MYR', '<p>To withdraw funds using TurboCashOut, log in, go to the \'Withdrawal\' section, choose TurboCashOut, enter the amount, and confirm. Funds will be transferred within 1-3 business days. Check for fees and ensure accurate account details.<br></p>', 1, '2024-03-05 11:54:18', '2024-03-05 11:54:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaigns_user_id_foreign` (`user_id`),
  ADD KEY `campaigns_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_campaign_id_foreign` (`campaign_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_deposit_id_foreign` (`deposit_id`),
  ADD KEY `donations_campaign_id_foreign` (`campaign_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_user_id_foreign` (`user_id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_data`
--
ALTER TABLE `site_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_data`
--
ALTER TABLE `site_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `campaigns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`),
  ADD CONSTRAINT `donations_deposit_id_foreign` FOREIGN KEY (`deposit_id`) REFERENCES `deposits` (`id`);

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
