-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2026 at 08:53 AM
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
-- Database: `industry_co_zw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password_hash`, `email`, `last_login`, `created_at`) VALUES
(1, 'admin', '$2y$10$u8Ue4voXrXHfOm2kgVSLJeSOP5NY2p7XiKUIfNpaiSaPcDMMzdN6m', 'admin@industry.co.zw', '2026-05-29 05:37:09', '2026-05-06 08:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `stakeholder` varchar(20) NOT NULL,
  `type` enum('logo','banner','flyer','poster') NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(10) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `views` int(11) DEFAULT 0,
  `clicks` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `stakeholder`, `type`, `title`, `file_path`, `file_type`, `link_url`, `display_order`, `views`, `clicks`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'CZI', 'banner', 'CZI Annual Conference 2026 Banner', 'uploads/banners/czi-conference-banner.jpg', 'jpg', 'www.czi.co.zw/conference', 1, 17, 0, 1, '2026-05-06 09:35:15', '2026-05-28 14:42:18'),
(2, 'CZI', 'banner', 'Join CZI Today Banner', 'uploads/banners/czi-join-banner.jpg', 'jpg', 'www.czi.co.zw/join', 2, 17, 0, 1, '2026-05-06 09:35:15', '2026-05-28 14:42:18'),
(3, 'CZI', 'logo', 'Sable Chemicals Logo', 'uploads/logos/sable-chemicals.png', 'png', 'www.sablechemicals.co.zw', 1, 16, 0, 1, '2026-05-06 09:35:15', '2026-05-28 14:42:18'),
(4, 'CZI', 'logo', 'Willowvale Motors Logo', 'uploads/logos/willowvale-motors.png', 'png', 'www.willowvale.co.zw', 2, 16, 0, 1, '2026-05-06 09:35:15', '2026-05-28 14:42:18'),
(5, 'CZI', 'flyer', 'CZI Member Benefits Brochure', 'uploads/flyers/czi-benefits-2026.pdf', 'pdf', NULL, 1, 16, 0, 1, '2026-05-06 09:35:15', '2026-05-28 14:42:18'),
(6, 'CZI', 'poster', 'CZI Awards 2026 Poster', 'uploads/posters/czi-awards-2026.jpg', 'jpg', NULL, 1, 16, 0, 1, '2026-05-06 09:35:15', '2026-05-28 14:42:18'),
(7, 'CIFOZ', 'banner', 'CIFOZ Construction Expo Banner', 'uploads/banners/cifoz-expo-banner.jpg', 'jpg', 'www.cifoz.co.zw/expo', 1, 16, 0, 1, '2026-05-06 09:35:15', '2026-05-14 05:44:25'),
(8, 'CIFOZ', 'logo', 'Nash Builders Logo', 'uploads/logos/logo_6a0492cc99959_1778684620.jpg', 'png', 'www.nashbuilders.co.zw', 1, 16, 0, 1, '2026-05-06 09:35:15', '2026-05-14 05:44:25'),
(9, 'CIFOZ', 'poster', 'Construction Safety Week Poster', 'uploads/posters/safety-week-2026.jpg', 'jpg', NULL, 1, 16, 0, 1, '2026-05-06 09:35:15', '2026-05-14 05:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `stakeholder` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `industry_id`, `province_id`, `stakeholder`, `phone`, `email`, `website`, `logo`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Zimplats Mining', 11, 8, 'CZI', '+263 242 123456', 'info@zimplats.co.zw', 'www.zimplats.co.zw', NULL, 'Leading platinum mining company in Zimbabwe', 1, '2026-05-06 09:35:15', '2026-05-28 14:07:47'),
(2, 'Murowa Diamonds', 11, 9, 'CZI', '+263 242 789012', 'info@murowadiamonds.co.zw', 'www.murowadiamonds.co.zw', NULL, 'Diamond mining and exploration company', 1, '2026-05-06 09:35:15', '2026-05-28 14:07:47'),
(3, 'Hwange Colliery', 11, 8, 'CZI', '+263 242 345678', 'info@hwangecolliery.co.zw', 'www.hwangecolliery.co.zw', NULL, 'Coal mining and processing company', 1, '2026-05-06 09:35:15', '2026-05-28 14:07:47'),
(4, 'National Foods Zimbabwe', 3, 1, 'CZI', '+263 242 901234', 'info@natfoods.co.zw', 'www.natfoods.co.zw', NULL, 'Food processing and agricultural products', 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(5, 'Seed Co Zimbabwe', 3, 1, 'CZI', '+263 242 567890', 'info@seedco.co.zw', 'www.seedco.co.zw', NULL, 'Seed production and agricultural research', 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(6, 'Tanganda Tea Company', 3, 3, 'CZI', '+263 242 112233', 'info@tanganda.co.zw', 'www.tanganda.co.zw', NULL, 'Tea production and export company', 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(7, 'ZB Financial Holdings', 4, 1, 'CZI', '+263 242 445566', 'info@zb.co.zw', 'www.zb.co.zw', 'uploads/logos/logo_6a01d28047d58_1778504320.jpg', 'Financial services and banking group', 1, '2026-05-06 09:35:15', '2026-05-11 12:58:40'),
(8, 'CBZ Holdings', 4, 1, 'CZI', '+263 242 778899', 'info@cbz.co.zw', 'www.cbz.co.zw', 'uploads/logos/logo_6a01d1ef6995b_1778504175.webp', 'Banking and financial services', 1, '2026-05-06 09:35:15', '2026-05-11 12:56:15'),
(9, 'Econet Wireless', 12, 1, 'CZI', '+263 242 112244', 'info@econet.co.zw', 'www.econet.co.zw', NULL, 'Telecommunications and mobile services', 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(10, 'Murray & Roberts Zimbabwe', 6, 1, 'CIFOZ', '+263 242 334455', 'info@murrob.co.zw', 'www.murrob.co.zw', NULL, 'Construction and engineering services', 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(11, 'Costain Zimbabwe', 6, 2, 'CIFOZ', '+263 292 667788', 'info@costain.co.zw', 'www.costain.co.zw', NULL, 'Civil engineering and building construction', 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(12, 'Treger Group of Companies', 10, 2, 'CZI', '+263 292 990011', 'info@treger.co.zw', 'www.treger.co.zw', NULL, 'Diversified manufacturing group', 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(13, 'Zimbabwe Steel Company', 10, 10, 'CZI', '+263 242 556677', 'info@ziscosteel.co.zw', 'www.ziscosteel.co.zw', NULL, 'Steel manufacturing and processing', 1, '2026-05-06 09:35:15', '2026-05-28 14:07:47'),
(14, 'Victoria Falls Hotel', 13, 8, 'CZI', '+263 242 778800', 'reservations@vfhotel.co.zw', 'www.victoriafallshotel.co.zw', NULL, 'Luxury hotel at Victoria Falls', 1, '2026-05-06 09:35:15', '2026-05-28 14:07:47'),
(15, 'Meikles Hotel', 13, 1, 'CZI', '+263 242 707721', 'info@meikleshotel.co.zw', 'www.meikleshotel.co.zw', NULL, 'Five-star hotel in Harare CBD', 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(16, 'Corporate 24 Medical', 9, 1, 'CZI', '+263 242 334422', 'info@corp24.co.zw', 'www.corp24.co.zw', 'uploads/logos/logo_6a0492cc99959_1778684620.jpg', '24-hour medical and emergency services', 1, '2026-05-06 09:35:15', '2026-05-28 14:07:47'),
(17, 'Mpilo Central Hospital', 9, 2, 'CZI', '+263 292 112255', 'admin@mpilo.co.zw', 'www.mpilo.co.zw', 'uploads/logos/logo_6a02d901d0b53_1778571521.jpg', 'Major referral hospital in Bulawayo', 1, '2026-05-06 09:35:15', '2026-05-28 14:07:47'),
(19, 'Croco Motors  Zimbabwe', 1, 1, 'CZI', '+263 242 759888', 'enquiries@crocomotors.co.zw', 'https://www.crocomotors.co.zw/', 'uploads/logos/logo_6a1927ef5570f_1780033519.png', '1 Telford Road,\r\nGraniteside,\r\nHarare, Zimbabwe', 1, '2026-05-28 14:04:10', '2026-05-29 05:45:19'),
(20, 'Kwikstop Express Auto', 1, 1, 'CZI', '0242 780 377/ 780858', 'kwikstop001@yahoo.com', '', 'uploads/logos/logo_6a1928a2669f3_1780033698.png', '173840 Dhela Way,\r\n\r\nCnr Strands Rd,\r\n\r\nGraniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:48:18'),
(21, 'NTK Auto', 1, 1, 'CZI', '0242 761 152-3/ 787 ', 'brianc@ntkauto.co.zw', '', 'e13a07358245519306c3b8720d3bc211.png', '19 Telford Road,\r\nGraniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(22, 'Royal Windscreens Auto Glass', 1, 1, 'CZI', '0242 752 378/ 717 17', 'royalautoglass123@gmail.com', 'https://royalwindscreens.herokuapp.com/', '', '32 Crippo Road\r\nGraniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(23, 'Tiger and Bolt', 6, 1, 'CZI', '0242 446 182', 'tigerboltnut@gmail.com', 'https://tigerbolt.co.zw/', 'be6015f7b99ce3d416368a12cf86c8d4.png', 'No 102 Mutare Road\r\nMsasa, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(24, 'Dysort Enterprises', 1, 1, 'CZI', '', 'sales@dysiort.co.zw', '', '4d9e4210edaf77ac8165398dfc2d2c7b.png', '32 Telford Rd, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(25, 'Truckman Parts', 1, 1, 'CZI', '', 'truckman.parts@hotmail.com', '', 'uploads/logos/logo_6a19274257bb7_1780033346.png', '18005 Dhlela Way, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:42:26'),
(26, 'Safeguard Security', 10, 1, 'CZI', '0242 751 395-9', '', 'https://www.safeguard.co.zw/', '7aa9e602d216fcd006706f68535a627b.jpg', '36 Telford Road, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(27, 'Hammer and Tongues', 10, 1, 'CZI', '', 'martim.mapininga@hammerandtongues.com', 'https://hammerandtongues.com/', 'f387d7bfa5273f545034f6cf72aa4fb3.jpg', '18005 dhlela Way, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(28, 'The Pulse Group', 9, 1, 'CZI', '0242 446 126', 'nmuguti@tpg.co.zw', 'https://www.tpg.co.zw', '499ed0d2801fda8ca276ac63fe914e24.png', '15 borgward Road\r\nMsasa, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(29, 'Selected Supplies', 6, 1, 'CZI', '0242 753 513', 'sharong@sszim.com', 'https://selectedsupplies.com/', '2650d018bf1291c55e41f3a4dc31e163.png', '3 Dhlela Way\r\nGraniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(30, 'Quality Plastics', 10, 1, 'CZI', '', 'info@cpplastics.co.zw', 'https://qualityplasticsllc.com/', '37492416f75634253cc453e473d55396.png', '17380 Dhlela Way, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(31, 'Optimus Auto', 1, 1, 'CZI', '', 'enquiries@optimus.co.zw', 'https://auto.co.zw/dealer/optimus-auto-parts', 'a0d32699975a5afc2360097fe4c6a35e.png', '120 Lytton Road\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(32, 'Dellson', 10, 1, 'CZI', '0242 62o 638/ 0242 6', 'lynnkudzai@gmail.com', '', 'uploads/logos/logo_6a1929297be93_1780033833.png', '15 Hanover Rd, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:50:33'),
(33, 'Muruwe', 10, 1, 'CZI', '08677 222 350', 'denis@muruwe.com', 'https://muruwe.com/', 'c69a31a72248116bd66c9d8bfe89f36d.png', '', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(34, 'FuelTec', 12, 1, 'CZI', '086 770 06077', 'sales@fueltechz.com', '', 'uploads/logos/logo_6a1927b2653ec_1780033458.png', '76 Lytton Road\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:44:18'),
(35, 'Black Shark', 10, 1, 'CZI', '0242 621 382-4', 'bridgetm@blackshark.co.zw', 'https://www.blackshark.co.zw/', 'f14b1496fcfbc5b5572a9b61178a87bb.png', '34 Douglas Road, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(36, 'Board Warehouse', 10, 1, 'CZI', '', 'talantoo@gmail.com', 'https://boardwarehouse.co.za/', 'cd741a564dbad547d49a6205d6576ffc.png', '18 Bristol Road, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(37, 'J.Mann Power Transmissions', 6, 1, 'CZI', '', 'davidd@jmann.co.zw', '', 'a65ad82a4d062b029c06a28e6ebd7915.png', '3 Nulfield Road\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(38, 'Ceramic Pro', 1, 1, 'CZI', '0242 754297-9', 'ceramicpro@spratechzim.com', 'https://ceramicpro.com/', '3b57c383e1c4b1e48bedca6770fd5b0c.png', '14 Nulffielod Road, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(39, 'PRAZ', 10, 1, 'CZI', '0242 790 080./ 0242 ', 'enquiries@praz.org.zw', 'https://portal.praz.org.zw/', 'uploads/logos/logo_6a192848639a3_1780033608.png', 'OLD Reserve Bank Building\r\n76 Samora Machel Ave, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:46:48'),
(40, 'Sight Connections Engineering', 6, 1, 'CZI', '', '', 'https://sight-connection-engineeringmanufacturing.business.site/?utm_source=gmb&utm_medium=referral', '', '498 Goodwin Road\r\nWillowvale, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(41, 'Royal Furniture', 10, 1, 'CZI', '', '', '', '2200e57e6b3cb44e7bae21fd969d4ae8.png', '498 Goodwin Road\r\nWillowvale, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(42, 'Divaris Makaharis', 7, 1, 'CZI', '04 310 085', '', '', '9397082f061221fe872fc5f80d43a28b.png', '6XHR+66P Cnr Lavenham and Northolt Dr, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(43, 'Spare Inn', 1, 1, 'CZI', '0242-328065-8', 'donny@spareinn.com', 'https://www.sparesinn.com/', 'uploads/logos/logo_6a19280ba520a_1780033547.png', '12892 Madokero Estate\r\nTynwald, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:45:47'),
(44, 'Station Furnishers', 10, 1, 'CZI', '0242 755602/ 0242 27', 'stationfurnishes@gmail.com', 'https://www.stationfurnishers.com/stores-info', '89b01f7e177660dee9f6a5c7feb9f9a4.jpg', '44 Robert Mugabe Rd, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(45, 'Total Fencing', 6, 1, 'CZI', '', 'totalfencing@gmail.com', 'https://www.totalfencing.co.nz/', 'f4a7390f728783e744488a153227ec38.png', '6180A Southerton Rd\r\nSoutherton, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(46, 'Omnica Nutrology', 3, 1, 'CZI', '', '', '', '2b59df86c187255f9343932d4b3abb82.png', '91 Conventry Rd, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(47, 'Industrial Valves & Steel Supplies', 6, 1, 'CZI', '08644 108 066/ 08644', '', '', '155f2f5fcaf558cb3fb8f0858bc8c1a8.png', '1385 Ampleside Rd,\r\nMargolis Industrial Park,\r\nAspindale, Cnr Lytton and Pasley Rd,\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(48, 'Yellyn', 10, 1, 'CZI', '', 'peity.hwata@yellyn.com', '', '', '8 Paisley Rd, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(49, 'Brown Enginering', 6, 1, 'CZI', '', 'sales@b.cvo.zw', '', '707f5206ff1e5f39dba862b253b6f3dc.png', '17 James Martin Avenue,\r\nLokinva, Southerton, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(50, 'Volsec Security', 10, 1, 'CZI', '0242 666 290/ 895 52', 'info@volsecsecurity.co.zw', '', 'uploads/logos/logo_6a192a43755a5_1780034115.png', '18 Hood Rd\r\nSoutherton, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:55:15'),
(51, 'Guard Alert', 10, 1, 'CZI', '0242 754 291', 'colesg@guardalert.cp.zw', 'https://www.guardalert.co.zw/', 'ccab62a96427f35ed43178233700cee0.png', '10 Nuffield, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(52, 'Van Leer', 10, 1, 'CZI', '', 'belindamurahwa@ophirolam.co.zw', '', '', '47 Highfield Rd,\r\nSoutherton, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(53, 'Dulux', 10, 1, 'CZI', '0242 621 460-8', 'tsaurombe@dulux.com', 'https://www.dulux.co.zw/', 'uploads/logos/logo_6a1929477fbbb_1780033863.jpg', '1042 Highfield Rd, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:51:03'),
(54, 'Colcom', 10, 1, 'CZI', '0242 751 051', 'customercare@colcom.co.zw', 'https://colcom.co.zw/', '4dfe9baa93c82aec6b11ade5c6506143.png', '1 Coventry Rd,\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(55, 'Texas Meats', 10, 1, 'CZI', '0242 772 712', 'kmakuni@amp.co.zw', '', '99ede4e8de3233bbd767b445fd889144.jpg', '1 Coventry RD,\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(56, 'Bookline Africa', 10, 1, 'CZI', '', 'felismujaha@gmail.com', 'http://www.booklineafrica.com/', 'dd3be5aa18e34aa7ef47e99c0f710c39.png', '46 Longford Avenue,\r\nQueensdale, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(57, 'Creative Bureau Print and Media Solutions', 10, 1, 'CZI', '0242 753 186', 'sales@creativebureau.co.zw', '', 'd8dce3332dbb46ad489637e502743ac8.png', '25 George Silunduka Avenue,\r\nRegal Star Mall, \r\nShop B, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(58, 'Divine Voyagers and Tours', 14, 1, 'CZI', '', 'victor@divinevoyagersandtours.com', '', 'b4060a61253a8ac32a2034f3d3186b83.jpg', '2nd Floor, Memorial Building,\r\n35 Samora Machel Avenue,\r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(59, 'Travel Connections', 14, 1, 'CZI', '0242 781 961', 'sales@travelconn.co.zw', 'https://www.travelconnections.com/', 'eec2070fde6ec42295693c94a3ac0279.jpg', '2nd Floor Memorial Building,\r\n35 Samora Avenue\r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(60, 'Rural Electrical Fund', 10, 1, 'CZI', '', 'bwata@rea.co.zw', 'https://www.bellevue.co.zw/', '65384891859bcb33ab4e2cf17f249baf.jpg', 'Megawatt House 44,\r\nSamora Machel Ave,\r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(61, 'Bellevue Abbatoir', 10, 1, 'CZI', '', 'fredrick@bellevue.co.zw', 'https://www.bellevue.co.zw/', 'da8e23bf256bf2e2587e45fa9637ef07.jpg', '40 Samora Machel Avenue, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(62, 'Bellevue Abattoir', 10, 1, 'CZI', '', 'fredrick@bellevue.co.zw', 'https://www.bellevue.co.zw/', 'da8e23bf256bf2e2587e45fa9637ef07.jpg', '40 Samora Machel Ave, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(63, 'Retroplan (pvt) ltd', 10, 1, 'CZI', '04 755 237', 'reproplanb@gmail.com', '', 'd692314b9ef2cb68c365159330aac9d4.jpg', '40 Samora Machel Ave, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(64, 'Padsor', 6, 1, 'CZI', '', 'infor@padsor.com', 'https://www.padsor.com/About.html', '63effe741ce78479c21a1fd229148c50.jpg', '17394 Dhlela Way,\r\nGraniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(65, 'Alidale Trading', 6, 1, 'CZI', '', 'info@alidaletrading.co.zw', 'https://alidaletrading.co.zw/', 'd246fafcc08098c6d45117185b56f574.jpg', '8 Tellford Rd,\r\nGraniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(66, 'Astol Holdings', 1, 1, 'CZI', '0242 771 034', 'astolholdings@gmail.com', 'https://astol-motors.business.site/', 'uploads/logos/logo_6a1927d7de3b6_1780033495.jpg', '18 Kelvin Rd N, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:44:55'),
(67, 'GEC Engineering', 6, 1, 'CZI', '0242 770 7606', 'hectorchamba@gec.co.zw', 'https://www.gec.co.zw/', '7463b09e135500ae1833b6e5fd6c8a9f.jpg', '3 Cam Road, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(68, 'Converge Enterprises', 6, 1, 'CZI', '0242 710 034/ 770026', 'sales4cve@gmail.com', 'https://converge-enterprises.business.site', '6876ab9acc3716779deee615ff2fd042.jpg', '8 Cam Rd,\r\nGraniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(69, 'Just Windscreens', 1, 1, 'CZI', '', 'justwindscreen@gmail.com', 'https://just-windscreens-zw.business.site/', 'ebafc6a123810627c5394509630a719f.jpg', '12 Stevenston Rd, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(70, 'Skyglass & Aluminium Works', 10, 1, 'CZI', '', 'skyglasszim@yahoo.com', '', '3ba763cddb896f84189d92738fbfbd3f.jpg', '12 Stevenson RD,\r\nCnr Telford R, Graniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(71, 'Commaf Holdings (Pvt) LTD', 12, 1, 'CZI', '0242 751 012-7/ 0867', 'sales@commaf.co.zw', 'https://www.commaf.co.zw/', '49861187837242cb08f7d9540f60bb0e.jpg', '54 Kelvin Road N, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(72, 'Landy Tronix', 1, 1, 'CZI', '', 'info@landytronix.co.zw', 'https://landytronix.co.zw/', '3b8e1d3baf4550c219303956d8ae8d64.jpg', '20 Kelvin Rd N, \r\nCnr Stevenson Graniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(73, 'Manisa Plastics', 10, 1, 'CZI', '', 'manisaplastics@outlook.com', '', '53c3860b0b8204d9eb95057112f72367.jpg', '20 Kelvin Rd N, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(74, 'Honda Services Center', 1, 1, 'CZI', '0242 751 333', 'showroom@honda.cp.zw', 'https://www.honda.co.zw/', 'ae62961eb8d8290706a1d5c3af591a5c.jpg', '27 Coventry Rd, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(75, 'AROPAK', 10, 1, 'CZI', '0242 761 320-4', 'dennis@aropak.co.zw', 'https://www.aropak.co.zw/', 'uploads/logos/logo_6a192708cb082_1780033288.jpg', '15 Telford Rd,\r\nGraniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:41:28'),
(76, 'Power Speed', 10, 1, 'CZI', '0242 749 630-7/ 0242', 'victoria.ngomanyi@powerspeed.co.zw', 'https://powerspeed-ir.com/', 'b6a5ff9b30aeef5b8e1cd5348d8a6df3.jpg', 'Cnr Cripps Rd and Kelvin Rd N,\r\nGraniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(77, 'Hard Cord Marketing', 10, 1, 'CZI', '0864 4288 457', 'hardcordsales07@gmail.com', '', 'b919a99e72dc7d0cd2fa8e365e4e4418.jpg', '12 Drumfries Rd, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(78, 'Afrilite', 1, 1, 'CZI', '', 'workington@afrilite.co.zw', 'https://www.afrilitecc.com/', '73f435b9d471bdb2964bb5e0807ab067.jpg', '25 Coventry,\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(79, 'MuvMuk', 1, 1, 'CZI', '', 'tafiesoko@gmail.com', '', 'uploads/logos/logo_6a19296a3f11d_1780033898.jpg', '39 Kaguvi St, Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:51:38'),
(80, 'Chesterton Industrial', 6, 1, 'CZI', '0864 420 9573', 'sales@cgesterton.co.zw', 'https://www.chesterton.co.zw/', '7b24972ed6d9ce296e8e4fa18af45a35.jpg', '22 Nuffielf Rd,\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(81, 'Adest Comhold Services', 1, 1, 'CZI', '0242 660 358', 'admin@comhold.co.zw', '', '', '19 Nuffield RD,\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(82, 'Quantum Plastics', 10, 1, 'CZI', '', 'quantumplastics@gmail.com', 'https://quantumplastics.com/', '', 'Albco House 5 Bristol Rd,\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(83, 'Agriden Engineering (Pvt) LTD', 6, 1, 'CZI', '', 'agridenengineering@gmail.com', '', '', '19 Nuffield Rd,\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(84, 'Ames Engineering', 6, 1, 'CZI', '0782 722 796-8/ 0242', 'ameshre@ames.co.zw', '', '', '47 Coventry Rd,\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(85, 'Auto Brakes', 1, 1, 'CZI', '', 'bmasunungure@autobrakes.co.zw', '', 'fd884c008cd9a6f2223945bc81bd75c5.jpg', '45 Coventry Rd,\r\nWorkington, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(86, 'Ace Hardware', 10, 1, 'CZI', '', 'acesales2@acehardware.co.zw', '', '', '', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(87, 'BSI Steel', 10, 1, 'CZI', '08677 000444', 'harare.sales@bsisteel.com', 'https://www.bsisteel.co.zw/', '741120a5ab50fd0802c3c6a2789ad695.jpg', '37 Coventry Road,\r\n Workington, Harare, Zimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(88, 'Trade Centre', 10, 1, 'CZI', '0782 024 074', 'sales@tradecentrezw.com', 'https://tradecentrezimbabwe.co.zw/shop/', '261cb6a6dbca3a4725f18b6386015f9a.png', '64 Hre Street', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(89, 'Central Dry Cleaners', 10, 1, 'CZI', '+263 242 770301', 'pantheo@zol.co.zw', 'https://www.centraldrycleaners.co.zw/', '', 'Corner Cripps & Crawford Rd Graniteside,\r\n Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(90, 'Parksmed Pharmacy', 9, 1, 'CZI', '+263 242 307 213', 'info@parksmed.co.zw', 'https://parksmed.co.zw', 'a2e24d976c7a102dd84de1affbaf2ebb.jpg', '34 Samora Machel Ave,\r\n Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(91, 'Mandiz (copy solutions)', 10, 1, 'CZI', '0772 810 427', 'copysolutions14@gmail.com', 'https://www.shapeitadhesives.com/', '46ea10ef032888eeb03affcda98595d7.jpg', '19 Samora Machel,\r\n corner chinhoyi street Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(92, 'Agro Shape', 3, 1, 'CZI', '774157787', 'sales@agroshape.co.zw', 'https://www.shapeitadhesives.com/', 'uploads/logos/logo_6a1926312eeb2_1780033073.jpg', '20 Shepperton road, \r\nGraniteside Harare', 1, '2026-05-28 14:04:10', '2026-05-29 05:37:53'),
(93, 'Premier Billiards', 10, 1, 'CZI', '(+263) 024 2752163', 'sales@premierbilliards.co.zw', 'https://premierbilliards.co.zw/', '4b07826fb766a92d141b6c1ede6e29b0.jpg', 'No.1 Leopold Takawira Street, \r\nBhika Bros Warehouse Complex, Down-town CBD,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(94, 'Motolac paints', 10, 1, 'CZI', '', 'sales@motolac.co.zw', 'https://www.motolac.africa', '9b3c871af3e9b8f8b09eda86a0b83be8.jpg', '55 Kelvin Road North,\r\nGraniteside,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(95, 'Padsor Pop', 6, 1, 'CZI', '', '', '', '826c8822c2d3505e2c92142858e07a7d.png', '17394 Dhlela Way,\r\n Graniteside, \r\n Harare,\r\n Zimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(96, 'Taita Trading Distributors', 1, 1, 'CZI', '', '', '', '1de1abd82c04338ce3e12dabf5cb059b.jpg', '16 Stevenson Road, \r\nGraniteside, \r\nHarare, \r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(97, 'Sinopec Premium Lubricants', 10, 1, 'CZI', '', '', '', 'd58e5f49a75ea4a08ab58baa42404b9f.jpg', 'Number 34 Kelvin Rd, \r\nGraniteside, \r\nHarare,\r\n Zimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(98, 'Nash Furnitures', 10, 1, 'CZI', '+263 713 185 390', 'marketing@nashfurnishers.co.zw', 'https://www.nashfurnitures.co.zw/', '981a1af71c134ff3d1d78de2ce2bb964.jpg', '22 Angwa Street\r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(99, 'Sky Glass and Aluminum works', 10, 1, 'CZI', '0242 751199', 'skyglasszim@gmail.com', '', '0a9f003f1c3fd59f1e44da37678f0a8a.jpg', 'Number 12 Stevenson Rd Graniteside, Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(100, 'Ger Garage Equipment', 1, 1, 'CZI', '(024) 2749795', 'brian@ger.co.zw', 'https://ger.co.zw/cgi-sys/suspendedpage.cgi', '2b1115ef0f556154b8a37cb269383643.jpg', '10 Cam Road Graniteside, \r\nHarare, \r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(101, 'GEC', 6, 1, 'CZI', '+263 4 770 760 / 71', 'enquiries@gec.co.zw', 'https://www.gec.co.zw/', 'uploads/logos/logo_6a1928f2d7a8f_1780033778.jpg', '9 Cam Road,\r\n Graniteside,\r\n Harare Zimbabwe', 1, '2026-05-28 14:04:10', '2026-05-29 05:49:38'),
(102, 'Industrial Tech', 6, 1, 'CZI', '(+263) 0242 750 267/', 'sales@industrialtech.co.za', 'https://www.industrialtech.co.zw/', '60e53d2d518e3c8ab1fb5948b72475a1.jpg', '55 Kelvin North, \r\nGraniteside, \r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(103, 'Oakland Furnitures', 10, 1, 'CZI', '0772 511 446', 'wchikosi@oaklandfurniture.co.zw', '', 'uploads/logos/logo_6a19278965464_1780033417.png', 'Bradlows Building 71 \r\nCorner Sam Nujoma and, Speke Ave, \r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-29 05:43:37'),
(104, 'Zibuko', 4, 1, 'CZI', '263 71 901 1800', 'tnyakatsapa@zibuko.com', 'https://www.zibuko.com/', 'uploads/logos/logo_6a1929905e644_1780033936.jpg', '60 Speke Ave,\r\n Cnr Speke and 2nd Street,\r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-29 05:52:16'),
(105, 'Print Dynamix', 10, 1, 'CZI', '+263 4 774884', '', '', '822db1986d6b56c7812d1ada4b4d6729.jpg', '20 Shepperton Road\r\nGraniteside\r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(106, 'Perspective Interiors', 10, 1, 'CZI', '077 290 1755', '', '', '5aa8b8c1932ec1745aae0b0fcafbee4c.jpg', 'Dalmatia House, \r\n69 Speke Ave,\r\n Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(107, 'Heritage Bookshop', 10, 1, 'CZI', '078 471 8441', 'sales@heritagebookshop.co.zw', '', '1fe94d108d451c6f7edd9619406d231f.jpg', 'Speke Avenue & 2nd Street \r\nHarare, \r\n Zimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(108, 'ASCA Healthcare', 9, 1, 'CZI', '(024) 2705703', 'ascahealthcare@gmail.com', '', 'uploads/logos/logo_6a19271607a73_1780033302.jpg', '60 Speke Ave,\r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-29 05:41:42'),
(109, 'Mimie\'s closet', 10, 1, 'CZI', '0785 857 389 / 0778 ', '', '', 'uploads/logos/logo_6a192855c6da4_1780033621.jpg', '48 Vanguard house\r\nCorner Kenneth Kaunda and second street \r\nShop 11', 1, '2026-05-28 14:04:10', '2026-05-29 05:47:01'),
(110, 'One Touch Sports', 10, 1, 'CZI', '', '', '', '', '', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(111, 'Tech city', 12, 1, 'CZI', '+263 77 123 4567 / +', 'info@techcity.co.zw', 'https://techcity.co.zw/contact/', 'uploads/logos/logo_6a192a03a28aa_1780034051.jpg', '65 Speke Avenue\r\nHarare. Zimbabwe', 1, '2026-05-28 14:04:10', '2026-05-29 05:54:11'),
(112, 'LeWeak Kitchenware', 10, 1, 'CZI', '077 714 2891', 'leweakinvestments@gmail.com', 'https://www.leweak.co.zw/', 'f8090684fa11a9d0035512d48281a53f.jpg', 'Shop 04 Karigamombe Center Cnr Julius Nyerere and Kwame Knrumah, \r\nHarare, \r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(113, 'One Touch Sport', 10, 1, 'CZI', '077 239 9991', 'onetouchsportscompany@gmail.com', '', '3e231c8fca6a5fa903f36f15e1910f9f.jpg', '67 Speke Ave, Cnr 2nd Street,\r\nOpp ZINWA, Near Eastgate\r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(114, 'Impala Motor Spares', 1, 1, 'CZI', '0111 035 100', 'info@impalaauto.com', 'https://www.impalaauto.com/', '66563674624f370ea4034220108cf858.jpg', 'Arizona House, \r\n 63 Speke Ave,shop 4,\r\n Harare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(115, 'Fourth Street Pharmacy', 9, 1, 'CZI', '(024) 2251256', 'fourthstreetphamarcy@gmail.com', '', 'f1656bbcea652ecea76c6c49ae847b00.jpg', 'Silke House,\r\nCnr Robert Mugabe Way & Fourth Street, \r\nHarare', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(116, 'Medicive Pharmacy', 9, 1, 'CZI', '+263 24 2302117', '', '', '', 'Shop 5 Avondale Shopping Center,\r\nKing George Road,\r\nAvondale, 00000', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(117, 'Innovative Technologies', 12, 1, 'CZI', '086 88 007 836', 'info@innovative.co.zw', 'https://innovative.co.zw/', 'dfc7eaf41b17b86a32aba7907649cb16.jpg', '3 Hampshire Road, \r\n Harare,\r\n Zimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(118, 'Lifestyle Books Harare', 10, 1, 'CZI', '078 453 5931', 'riosafricabooks@yahoo.com', '', '00ab1006297086c2754078aedc503379.jpg', 'Eastgate Shopping Complex, \r\nHarare, \r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(119, 'Opticare', 9, 1, 'CZI', '0242 702 644', 'opticare@africaonline.co.zw', 'https://opticare.co.zw/', 'd22d11be50c6fa3196fb234dcea71b39.jpg', 'Head office, 1 Frank Johnson Avenue,\r\n Eastlea, \r\n Harare,\r\n Zimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(120, 'Hatch Solutions', 3, 1, 'CZI', '071 955 5100', 'hatchsolutions1@gmail.com', '', 'bcc411ce3d18ab53650fac53014604af.jpg', '', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(121, 'Simba Furnitures', 10, 1, 'CZI', '', 'misimokosimba@gmail.com', '', '', 'Cnr 1st and speke\r\nGelfund House shop number2,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(122, 'JanJam', 10, 1, 'CZI', '', '', '', '', '22 Silundika House,\r\nCnr First and George Silundika,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(123, 'Merc Pro', 1, 1, 'CZI', '', 'nathanielmukuya@gmail.com', '', '', '7 Hood Road,\r\nSoutherton,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(124, 'Tedmak', 10, 1, 'CZI', '', '', '', '', '135 Mbuya Nehanda St,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(125, 'Zenith Auto Spares', 1, 1, 'CZI', '', '', 'https://zaubee.com/biz/zenith-auto-spares-12k3bgyf', '', 'Capital Breaks Complex,\r\n62 Kaguvi St,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(126, 'Waynne Motor Spares', 1, 1, 'CZI', '', 'bonzochipo@gmail.com', '', '', '69 Kaguvi Street,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(127, 'Chaps Auto Spares', 1, 1, 'CZI', '', 'simbarashechaparadza@gmail.com', '', '', '69 kaguvi, \r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(128, 'Seke Motor Spares', 1, 1, 'CZI', '', '', '', '', '65 Kaguvi St,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(129, 'Rongary Motor Spares', 1, 1, 'CZI', '', '', '', '', '52 Harare Street,\r\nHarare Central Harare,\r\nHarare, \r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(130, 'Megatron Computers', 12, 1, 'CZI', '0425 2398', '', '', '', '275 H. Chitepo Ave,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(131, 'VPek Plastics', 10, 1, 'CZI', '242665782', 'range@vpek.co.zw', '', '', '14 Lytton Rd,\r\nWorkington,\r\nHarare,\r\nZimbabwe', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(132, 'Thornville Marketing', 10, 1, 'CZI', '772440828', '', '', 'uploads/logos/logo_6a1926d26b88c_1780033234.png', 'They are Karinga manufactures', 1, '2026-05-28 14:04:10', '2026-05-29 05:40:34'),
(133, 'Amiras', 10, 1, 'CZI', '780924555', '', '', '', '<span id=\"description\" class=\"sugar_field\">They do cabinetry.They design and install cabinets.</span>', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(134, 'STRUCTEN ENGINEERING', 10, 1, 'CZI', '078 5000 767', '', '', '18ab0e432546d7b613dfab33357b48aa.png', '<div class=\"col-xs-12 col-sm-2 label col-1-label\"></div>\r\n<div class=\"col-xs-12 col-sm-10 detail-view-field inlineEdit\"><span id=\"description\" class=\"sugar_field\">Industrial Equipment Manufacturing AND Precision Engineering &amp; Plant Maintenance</span></div>', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(135, 'Lammel Manufacturing', 10, 1, 'CZI', '446 336', '', '', 'c173a2c05a7c7568e2895a1c733076c6.jpg', '', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(136, 'Cutting Edge', 10, 1, 'CZI', '08677 008 685', 'abby@cuttingedge.co.zw', 'http://www.cuttingedge.co.zw', 'c787ffa5ea98e414023e7f695dad7f9f.png', '<span id=\"description\" class=\"sugar_field\">They supply high-end light machinery for the forestry, agricultural, gardening, and construction sectors</span>', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(137, 'Steel Warehouse', 10, 1, 'CZI', '0774 569 567', '', '', 'a8febe795a7f631c06b3150f2feb2f26.png', '', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(138, 'Paper house Stationery', 10, 1, 'CZI', '+263 716 448 936', 'salesm@paperhousezim.co.zw', '', 'a599a02f284ddc4e2b801897229fe4a4.png', '<span id=\"description\" class=\"sugar_field\">prominent wholesale and retail supplier of educational materials</span>', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(139, 'Ethan Panel Beaters', 10, 1, 'CZI', '777022965', '', '', '', '', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(140, 'Shaynes Auto', 10, 1, 'CZI', '775509135', 'shaynesauto13@gmail.com', '', '87b510cfbaa0f9837205db3d844f4bdf.png', '', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(141, 'Last Stop AutoMasters', 10, 1, 'CZI', '2.63719E+11', 'desmond@lsazim.com', '', 'bd3f1ce10dce8baa3e26dcbc86c7c068.png', '<span id=\"description\" class=\"sugar_field\">CZI Registration</span>', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(142, 'Las Financial Services', 10, 1, 'CZI', '784707066', '', 'https://lasfinance.co.zw/', '1bc68f769bdebe2660d8b0c563c8f1cb.jpg', '<span id=\"description\" class=\"sugar_field\">We discussed on adverting them on CZI</span>', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(143, 'Sarudzai', 10, 1, 'CZI', '773498964', '', '', '', '<span id=\"description\" class=\"sugar_field\">Small firm which requires Website</span>', 1, '2026-05-28 14:04:10', '2026-05-28 14:04:10'),
(144, 'A M Machado (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 486639-40/49772', 'alexandre@ammachado.com', '', '', 'P O Box AY 8, Amby, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(145, 'Actual Construction', 6, 2, 'CIFOZ', '0292-201221-2', 'actual@zol.co.zw', '', 'd94f6d5b4f70a6fe8d73184a1ab7dcbe.jpg', '25 Baben Powel Rd, Northend, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(146, 'Civilworks Engineering Contractors', 6, 1, 'CIFOZ', '0772229543/077845225', 'diggsrash@yahoo.com', '', 'ae97ba78868345806d99a021a36110c2.png', '1052 Tynawald Industrial, Tynawald, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(147, 'Aveng Zimbabwe (Pvt) Ltd', 6, 1, 'CIFOZ', '0242-201221-2', 'jsampson@grinaker-lta.co.za', '', '3c6afc83b8f5d5193f3cde03832f0147.jpg', 'P O Box AY 136 Amby, Msasa, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(148, 'E.G Construction', 6, 7, 'CIFOZ', '0778400083/071840008', 'info@egconstruction.co.zw', '', '8cf8f618c268e8554b2bab2431c640db.jpg', '18102 A.P. Scholtz Rd, Westview, Masvingo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(149, 'Belmont Construction', 6, 2, 'CIFOZ', '0292-466046-7/466455', 'belcon@mweb.co.zw', '', '7bdd1c91ce44b6654de327fa4c2c0010.jpg', '100 Plumtree Rd, Box 8146 Belmont, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(150, 'Inkaba Construction Company (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 572910', 'morris.tsoka@inkaba.co.zw', '', '', '38 Ashburton Ave, Chadcombe, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(151, 'Birthday Construction & Earthmoving', 6, 1, 'CIFOZ', '0772183197/077216727', 'info@birthday.co.zw', '', '', '8 Comet Rise, Mt Pleasant, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(152, 'China Chrome Mining Company (Pvt) Ltd', 6, 10, 'CIFOZ', '0778018888/077801889', 'ccmczim@hotmail.com', '', '', '106 First Floor, Cabs Building, Gweru.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(153, 'Mota-Engil Zimbabwe', 6, 1, 'CIFOZ', '0242 795303', 'blake.mhatiwa@mota-engil.pt', '', '45908c9c98f283a9762c0ca82c0487f0.jpg', '7 Routledge Road, Milton Park, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(154, 'Rhabhuka Construction', 6, 1, 'CIFOZ', '0772291746/077410044', 'rhabhuka@yahoo.co.uk', '', '', '104 Whitecliff, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(155, 'Sesani (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 307058-61', 'info@sesani.co.zw', '', '819832bd8801dff6bf368948938f06c0.jpg', '60 The Chase, Mt Pleasant, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(156, 'China Civil Engineering Construction Corporation (Pvt) Ltd', 6, 1, 'CIFOZ', '0783180929/+26771317', 'cc_botswana@163.co', '', '', '4-6 Wigtown Rd, Avondale West, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(157, 'Shandong Deijan Group Co. Ltd', 6, 1, 'CIFOZ', '785721359', 'wqrobert@yeah.net', '', '', '2 Boundary Road, Newlands, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(158, 'China Nanchang Engineering (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 852030/07725688', 'cnezim@gmail.com', '', '1a0c9a1251bbe6256cefef9381ca908e.jpg', '19 Breach, Borrowdale, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(159, 'Citizen Construction Company (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 749138/9/', 'citizencon@zol.co.zw', '', '', 'P O Box 6085 Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(160, 'Strutcon Engineering (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 51676 / 0864414', 'strutcon@strutcon.co.zw', '', '51aefe6701408a09bd81b7ce89b41c9c.jpg', '481 Empowerment Way, Willowvale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(161, 'Conduit Contractors & Project Managers', 6, 1, 'CIFOZ', '0242 704365/791175', 'conduit@conduit.co.zw', '', '', '10th floor,44 S Machel Ave, Megawatt House, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(162, 'CZL Zimbabwe', 6, 1, 'CIFOZ', '0242 663571-8', 'kkuhuni@czlinc.com', '', '', '87 Plymouth Road, Southerton, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(163, 'Burger & McBean (Pvt) Ltd', 6, 2, 'CIFOZ', '0292-62701/67145', 'mcbean@yoafrica.com', '', 'e315530adcf0dc0d2269b99e00c75c9f.jpg', '2 Bristol Rd, Belmont, Box 9095, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(164, 'Westmoreland Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 302402/307421/', 'jmahachi@mweb.co.zw', '', '', '1 McCaw Drive, Avondale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(165, 'Yuanda Thrive Industry Engineering', 6, 1, 'CIFOZ', '0242 81230', '', '', '', '69 Coronation Avenue, Greendale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(166, 'Delomic Painters & Renovations P/l', 6, 1, 'CIFOZ', '0242 778921', 'rodgerskativu@gmail.com', '', '', '30 Southey Rd, Hillside, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(167, 'Hart Construction', 6, 1, 'CIFOZ', '0242 933771/2933772/', 'info@hartholdings.co.zw', '', '', '20 Hurwoth Road, Highlands, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(168, 'Dohne Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 486224', 'dmukaro@ecoweb.co.zw', '', '', 'P O Box 6785, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(169, 'Chase Contractors', 6, 1, 'CIFOZ', '0242 666200', 'projects@chase.co.zw', '', '74b855003554770495f1697375445890.jpg', '33 Craster Road, Southerton, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(170, 'Drawcard Construction', 6, 1, 'CIFOZ', '0242 480104-5', 'drawcard@mweb.com', '', '', '49 Greendale Ave, Greendale, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(171, 'Classfield Investments', 6, 1, 'CIFOZ', '63772467783 /7127278', 'classifield2sales@gmail.com', '', '', '4th Floor, Regal Star Hse, 25 G.Silundika, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(172, 'Chituriro Builders', 6, 1, 'CIFOZ', '0273-2201', 'chiturirobuilders@gmail.com', '', '', '950 Robson Manyika Dr, Ruwa', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(173, 'Emobuild Construction', 6, 10, 'CIFOZ', '054-230231/2', 'philkagurah@gmail.com', '', '', '8330 Mtapa Light, Industrial Park, Gweru.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(174, 'Golmac Construction & Civil Works (Pvt) Ltd', 6, 1, 'CIFOZ', '0772 920291', 'golmacconstruction@gmail.com', '', '', '2368 Venturestour, Sunway City, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(175, 'J. Mann & Company (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 759571-8', 'info_hre@jmann.co.zw', '', 'f508d9547a803a42f86ea01c77e982cb.jpg', 'P O Box 514, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(176, 'Energo (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 772367674', 'energozw@mweb.co.zw', '', '8b0940ef8be9a483d39d7e08b45ac458.jpg', '64 Gleneagles Rd, Willowvale, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(177, 'Jatavaky Construction', 6, 1, 'CIFOZ', '0242 750693/', 'sales@jatavaky.co.zw', '', '4ed560f7b33044396e1e2128b1f6945c.jpg', 'B5 Hurtmall Chinhoyi/Nkrumah, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(178, 'Fossil Contracting', 6, 1, 'CIFOZ', '0242 485667', 'civcivils@fossilzim.com', '', 'bfaeac96be671fba740493d17427468c.jpg', '5 Loreley Close, Msasa, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(179, 'Nocal Construction', 6, 1, 'CIFOZ', '0242 666975/666937', 'nocalconstruction@yahoo.com', '', '86aff5d3e9242a19222fa033069bd89d.jpg', '399 Limpopo Way, Willowvale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(180, 'Gateway Construction', 6, 1, 'CIFOZ', '0242-80772614888/778', 'gatewayzvish@gmail.com', '', 'f382c5d7347f94115e503a8e39da056d.jpg', 'Gateway Construction, Milton, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(181, 'Northbourne Construction', 6, 1, 'CIFOZ', '0242 861775', 'northbourne@zim.co.zw', '', '', 'P.O. Box BW 6160, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(182, 'Globeny Construction', 6, 1, 'CIFOZ', '0242 571100/07721882', 'renica@globenyconstruction.com', '', '', '47 Longford Avenue, Queensdale, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(183, 'Greenfrost Construction', 6, 1, 'CIFOZ', '0775364899/071675645', 'greenfrost2@outlook.com', '', '8ba91df4dfabad240b9a9cca4b016186.jpg', '6510 Zimre Park, Ruwa', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(184, 'Hawkflight Construction', 6, 2, 'CIFOZ', '0292 881252/07126143', 'hawkflightconstruction@yahoo.co.uk', '', '467756e4c84806b45e7195a2782c3b5d.jpg', '45 Cnr 4th St/3rd Ave Box 1498, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(185, 'Johnson\'s Design & Installation', 6, 1, 'CIFOZ', '300017/300051/291751', 'jdi@africaonline.co.zw', '', '', 'Emarald Hill, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(186, 'Horstien Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '306949/306964', 'horsteincon@gmail.com', '', '', '41 Camberley Rd, Ashdown Park, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(187, 'Altrac Services', 6, 1, 'CIFOZ', '0712205147/ 07736156', 'afourie@iwayafrica.co.zw', '', '6f0822e253447541310faa75c3c20f20.jpg', 'First Ave/Cheviot R, Waterfalls, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(188, 'Blovetac Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 783473-4', 'blovetacinvest@gmail.com', '', '', 'Suite,1st Floor Lintas Hse, Kwame Nkrumah, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(189, 'Asphalt Products (Pvt) Ltd', 6, 2, 'CIFOZ', '0292 470776/7/8', 'asphaltzim@gmail.com', '', '0d3fa4316e4f5a64628a286d3d2f4b62.jpg', '14999 Donnington, West, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(190, 'Extrovert Engineers And Contractors', 6, 1, 'CIFOZ', '0772230147/071294869', 'extrovertengineers.sales@gmail.com', '', '', 'Workington, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(191, 'Hualong Construction', 6, 1, 'CIFOZ', '486936/0775 612082', 'hualongzimbabwe@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '154 Mutare Road, Msasa, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(192, 'B.S.C.C. Mixers', 6, 1, 'CIFOZ', '0242 333155', 'bsccmixers@gmail.com', '', '', '1 Hay Close, Avonlea, Marlborough, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(193, 'Monagan (Pvt)Ltd', 6, 1, 'CIFOZ', '+263 773 058 621', 'monagan1@hotmail.com', '', 'e60cef405e6563dfe508305477ac9a7c.jpg', '4441 Ceres Ave, Prospect Park Waterfalls, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(194, 'Intergrated Construction Projects (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 335014/332443', 'info@icp.co.zw', '', '6fbca68396210c2bfb054aa9d7b0537c.jpg', '1 Quorn Ave, Mt Pleasant, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(195, 'Hello Project Developers', 6, 1, 'CIFOZ', '0242 754267/8', 'sales@hellodeveopers.co.zw', '', '', '6th Floor LAPF Center, J.Moyo/Chinhoyi, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(196, 'Intelle Build (Pvt) Ltd', 6, 1, 'CIFOZ', '0773993631/077274412', 'info@intellebuildcon.co.zw', '', '414a776f0685c7a1fa5ff7d311fe2bd9.jpg', '3297 Mainway Meadows, Waterfalls, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(197, 'Jiangxi International (Zimbabwe) (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 494333-07725688', 'zimb@cjic.cn', '', '', '11 Gaynor Rd, Chisipite, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(198, 'Bitumen World (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 447231/447232', 'devilious@bitumenworld.net', '', '2766df6ecaa9607f521a07b9889c0003.jpg', '30 George Avenue, Msasa, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(199, 'Mukute Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '788320-2', 'richard.mukutecons@gmail.com', '', 'fed02a7e7c029f9d94df9461f0a3732d.jpg', 'Newlands, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(200, 'L .Gono Construction', 6, 1, 'CIFOZ', '0242 782142/3', 'lchamatowa@gmail.com', '', '', '9 Buckingham Rd, Eastlea, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(201, 'Kiggen Enterprises (Pvt) Ltd', 6, 2, 'CIFOZ', '0292-280735/6/077226', 'builders@yoafrica.com', '', '', '102 Marimba Rd, Matsheumhlope, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(202, 'Padsor Scaffolding and Construction', 6, 1, 'CIFOZ', '581344/581341', 'info@padsor.com', '', '', 'Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(203, 'Likusasa Zimbabwe', 6, 1, 'CIFOZ', '263-0772420671', 'wmupfudza@likusasa.com', '', 'dc3f797338f353a042c30cb8ea497b38.jpg', '10 Selous Avenue, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(204, 'Brown Engineering (Pvt) Ltd', 6, 1, 'CIFOZ', '0242-664795-8/668803', 'sales@be.co.zw', 'https://www.be.co.zw', '727190c77626d2494137dc0d5bc58406.jpg', '17 James Martin Ave, Po Box ST 311, Southerton, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(205, 'Maco Builders', 6, 2, 'CIFOZ', '(0292)78525', 'maco@yoafrica.com', '', '8371a91cd3a42acd99dc921b8ed04b2f.jpg', 'PO Box FM 635, Famona, Bulawayo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(206, 'Mecasonic Contractors', 6, 1, 'CIFOZ', '0242 709007/8', 'mecasonic2@gmail.com', '', '', 'Cnr K.Kaunda/R.Manyika,NRZ Garage, Block 2142, NRZ Complex, CBD, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(207, 'Peta Construction (Pvt) Ltd', 6, 2, 'CIFOZ', '0292-884806', 'petcon@yoafrica.com', '', '', 'Bulawayo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(208, 'Lues Construction', 6, 1, 'CIFOZ', '(065)24744-7/0772471', 'info@luescon.com', '', '55a3133c91558dc378529a8145f7da95.jpg', '4 Smithfield Way, Marondera.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(209, 'Neddicky Industries', 6, 2, 'CIFOZ', '(0292) 416890 /', 'neddickyindustries@gmail.com', '', 'b7ef67f64bc710532dc47ff40fe02881.jpg', '15325 Kelvin East, Bulawayo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(210, 'Rabgraph Construction Services', 6, 1, 'CIFOZ', '570580/570662', 'rabgraphconstruction@gmail.com', '', '9a072b5e7a46cccf543355dd35db5c85.jpg', 'Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(211, 'Praise Construction & Building Services', 6, 1, 'CIFOZ', '0242 774895/774896', 'praiseconstruction@yahoo.com', '', '64868093924c420f13c9be82679ac45f.jpg', '108 Margolis Plaza, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(212, 'Macro Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 2907210-3/66821', 'macro@mcdgroup.co.zw', '', 'e8fcf4805401f7e0f5573a854f306154.jpg', '933 Formby Rd Cnr Waterfalls Ave, Adebennie, Zimbabwe.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(213, 'China International Water & Electric Corp', 6, 1, 'CIFOZ', '(0242)778344', 'cwezw@zol.co.zw', '', '', '1 St Annes Rd, Avondale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(214, 'Real Gain Investments (Pvt) Ltd', 6, 1, 'CIFOZ', '0242-494454', 'info@realgain.co.zw', '', '', 'Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(215, 'Robmeck Builders & Contractors', 6, 1, 'CIFOZ', '0772385769/077238412', 'ddmshoperi@gmail.com', '', '', '1 Ruskinlane, Strathaven, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(216, 'Waterprint Investments', 6, 2, 'CIFOZ', '(0292) 61511', 'waterprint.sales@gmail.com', '', '', '16 Woodbury, Thorngroove, Bulawayo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(217, 'Manifest Contracting', 6, 1, 'CIFOZ', '0242 702003/07120659', 'hchinogurei@mweb.co.zw', '', 'ed019ebdd85f28ec17a1ab430f10d610.jpg', '23 Kay Gardens, Kensington, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(218, 'SFI Constructors (Pvt) Ltd', 6, 1, 'CIFOZ', '486469', 'sficonst.itai@gmail.com', '', '', 'Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(219, 'Evergreen Construction', 6, 1, 'CIFOZ', '(0772) 606692 / 0772', 'evergreenevergreen63@gmail.com', '', 'f9871dbbe7d7a1de6fbb9731053d6119.jpg', 'Exhibition Park, Show Grounds, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(220, 'Metallurgical Construction Company Zimbabwe (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 305325/302111', '', '', '', 'P O Box CY6200, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(221, 'Westpile Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '758197', 'westpileprojects@gmail.com', '', 'b0942018316c4f8abb5da1b93cb29dec.jpg', 'Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(222, 'Crestbrook Investments', 6, 1, 'CIFOZ', '0242 782142', 'crestbrookin1@gmail.com', '', '', '9 Buckingham, Eastlea, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(223, 'Masimba Construction Zimbabwe', 6, 1, 'CIFOZ', '0242 611641-6/611741', 'enquiries@masimbagroup.com', '', '1cee682611394282da554eba45fda35e.jpg', 'P O Box CY490, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(224, 'Dissbell Maintenance', 6, 1, 'CIFOZ', '772381636', 'dissbellzim@gmail.com', '', '', '18A Fereday Drive, Eastlea, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(225, 'ZESA Enterprises (Pvt) Ltd', 6, 1, 'CIFOZ', '666783/669247', 'shellygondo@zent.co.zw', '', '814d0ab99a7cb290fe6ecdb5682ca4f1.jpg', 'Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(226, 'Dougfin Construction', 6, 1, 'CIFOZ', '0772 452423', 'dougfincontractors@gmail.com', '', '', 'P.O. Box 2538, Epworth,', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(227, 'Newview International (Pvt) Ltd', 6, 1, 'CIFOZ', '0775013688/071232017', 'cjsntcxc@126.com', '', '', '39 Harare Drive, Malborough, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(228, 'IRS Construction', 6, 1, 'CIFOZ', '0242 447505/6', 'sales@irs.co.zw', '', '0f987c27c4bdf4bde7b01b752e26aa46.jpg', '142 Mutare Road, Msasa, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(229, 'Njanike Construction', 6, 3, 'CIFOZ', '020-63961', 'njacon@iwayafrica.co.zw', '', '242ed93a8f2f964dc1a86ffda9577581.jpg', '15 Plumpton Chambers Box 1551 Mutare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(230, 'Moor House Holdings', 6, 2, 'CIFOZ', '0292-413540/', 'moorhse@mweb.co.zw', '', '892c50fa90a2d252f9e6d36a800fb442.jpg', '15092 Kelvin North, Bulawayo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(231, 'Nabless Construction', 6, 1, 'CIFOZ', '0772605154/077211160', 'nabless2008@gmail.com', '', '5e3c6d918bca62adec630ee939c19895.jpg', '38 Sommerset Road, Eastlea, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35');
INSERT INTO `companies` (`id`, `name`, `industry_id`, `province_id`, `stakeholder`, `phone`, `email`, `website`, `logo`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(232, 'Number Seventeen Metallurgical Construction(Pvt)Ltd', 6, 1, 'CIFOZ', '0242 793224', 'YWPing2205@126.com', '', '', '4 Natal Road, Belgravia, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(233, 'Benhood Contracting', 6, 1, 'CIFOZ', '2907383/4', 'mmagume@gmail.com', '', '3607c0c72b17dbf745891b6004bdadf5.jpg', '51 Logan Road, Hatfield, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(234, 'Drilling Resources Zimbabwe (Pvt) Ltd', 6, 1, 'CIFOZ', '0242-487244/78', 'allan@kwblasting.co.zw', '', '', 'P O Box 3847, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(235, 'Nalprin Investments (Pvt) Ltd', 6, 1, 'CIFOZ', '0774494539 / 0772830', 'simbamapfumo1@yahoo.com', '', '', '454 Harare Drive, Pomona, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(236, 'Planet Building Contractors', 6, 1, 'CIFOZ', '0242 668170663483/66', 'tklgarwe@gmail.com', '', '', 'P O Box CY2216, Causeway, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(237, 'Setheo Engineering', 6, 1, 'CIFOZ', '0242 744086', 'setheoconzw@gmail.com', '', '', '17 Fleetwood, Alexandra Park, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(238, 'Exodus and Company (Pvt) Ltd', 6, 1, 'CIFOZ', '0242-884823 / 852659', 'info@exodusandcompany.com', '', '2ea8dd1313e0374fe74697704e697984.jpg', '7 Dungarvan, Borrowdale,  Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(239, 'PHIDCO (Pvt)Ltd', 6, 1, 'CIFOZ', '(0242)755857/780237(', 'sales@progresszim.co.zw', '', '759ee160f6685839238e2e5672d7cadb.jpg', 'PHIDCO (Pvt)Ltd, Graniteside, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(240, 'Shrea Contractors (Pvt) Ltd', 6, 1, 'CIFOZ', '0772867650/077404445', 'shrea@gmail.com', '', '', '7 Gorlon House, 3rd Floor, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(241, 'Forit Contracting', 6, 1, 'CIFOZ', '0242-741371', 'admin@forit.co.zw', '', '', '17773 Watermeyer Dr, Belvedere, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(242, 'Pump & Steel Supplies', 6, 2, 'CIFOZ', '0292-460293/4/7/8', 'pss@mweb.co.zw', '', '', '100 Plumtree Rd, Donnington, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(243, 'Sirdalesteel Engineering & Construction', 6, 1, 'CIFOZ', '0772436973/071530058', 'sirdalesteel@gmail.com', '', '', '10A Spurrier Road, New Ardennie, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(244, 'Realquot Construction', 6, 1, 'CIFOZ', '0242 772120892/07716', 'realquot7@gmail.com', '', '', '9 Blackburn, Eastlea, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(245, 'B & S Mcheken Contractors', 6, 1, 'CIFOZ', '2901187', 'info@mchekencontractors.co.zw', '', '', 'Lintos Hse, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(246, 'Rio Douro Construction', 6, 1, 'CIFOZ', '0242 305849/305456-7', 'admin@riodouro.co.zw', '', '', '4 Kermode Blufhill, Box M144, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(247, 'Smervo Investments (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 753053', 'clemence@smervo.com', '', '', '32 Telford Road, Graniteside, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(248, 'Tradecode Investments', 6, 1, 'CIFOZ', '(031) 2614', 'sales@tradecode.co.zw', '', '92bc06f189efe071a560c2481f1f3500.jpg', '344 Lion Drive, Chiredzi,', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(249, 'Shomet Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '0772776660/ 07790218', 'shomet.eng@gmail.com', '', '46c8ef1efb159008ee3d8c9cb9e4fc33.jpg', 'No. 5 Barking Road Deven Engineering Complex Willovale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(250, 'Earthwave Incorporated', 6, 1, 'CIFOZ', '0273-3305', 'earthwaveincorp@gmail.com', '', '', 'Ruwa, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(251, 'Vicadley Construction', 6, 1, 'CIFOZ', '772973555', 'vicadley@gmail.com', '', 'd65c64b645555930e89e80973df88600.jpg', '32 Blackway, Belvedere, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(252, 'Sinoma (Zimbabwe) Engineering', 6, 1, 'CIFOZ', '0782 618 167', 'weiqiang@sinomaee.com', '', '8ac3fab55a44f6b56f1dc4dc2a8a75f7.jpg', '2111 Venturesburg, Sunnyway, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(253, 'Zim-Harah Construction', 6, 1, 'CIFOZ', '784528652', 'zimharah@gmail.com', '', '', '9 Buckingham, Eastlea, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(254, 'EC Zimbabwe T/A Esor Construction Zimbabwe', 6, 1, 'CIFOZ', '754705-7', 'info@esor.co.za', 'https://www.esor.co.za', 'ecdea0fcd1b67ea705a5816cddc8c562.jpg', '27 Conald Road Graniteside Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(255, 'Admire and Sons Construction', 6, 1, 'CIFOZ', '773387428', 'admireandsonsc@gmail.com', '', '', '2278 Arlington Way, Arlington Estate, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(256, 'Sogecoa Zimbabwe (Pvt) Ltd', 6, 1, 'CIFOZ', '883325', 'yangmei610@163.com', '', '', '89 Kingsmead Road, Borrowdale, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(257, 'JR Goddard Contracting (Pvt) Ltd', 6, 1, 'CIFOZ', '0292802-230384/22877', 'jrgadmin@iwayafrica.com', '', 'b5743225781f2facd8ea302a0e130402.jpg', 'P.O.Box 30, Shangani', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(258, 'Greatdyke Earthmoving', 6, 1, 'CIFOZ', '(0273)2330', 'wtnherera@greatdykeearthmoving.co.zw', '', '', 'Ruwa Industrial, Ruwa.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(259, 'Tacna Engineeing & Construction', 6, 1, 'CIFOZ', '0242 300214', 'gkngwari@gmail.com', '', '', '63 Newstead Rd, Malborough, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(260, 'Elchrome Investments (Pvt) Ltd', 6, 1, 'CIFOZ', '0774369391/077211093', 'elchrome.co@gmail.com', '', '', '148 Hogerty Hill, Borrowdale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(261, 'Kotrum Construction', 6, 1, 'CIFOZ', '883430', 'glynnshardware@gmail.com', '', '', 'Eastlea, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(262, 'Technoexpert Construction', 6, 2, 'CIFOZ', '0292-71548/ 60654', 'techno@netconnect.co.zw', '', '', '26A Main Strt Btwn 1st, Av&amp;Connaught, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(263, 'Tensor Systems (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 740160/740179/7', 'info@tensor.co.zw', '', 'ed625ee9375f520206f890ce84f822a2.jpg', '43 Dan Judson, Milton Park, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(264, 'Instatoll Zimbabwe (Pty) Ltd', 6, 1, 'CIFOZ', '0782702353/4', 'gmufuka@instatoll.co.zw', '', '78bea921b1ccff38bcb87ef47788818c.jpg', '15 Fleetwood Road, Alexandra Park, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(265, 'Tower Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '0772470481/077223144', 'tower@mweb.co.zw', '', '', '120 Dartford Willowvale, Box ST590, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(266, 'Multiforce Contractors', 6, 1, 'CIFOZ', '0712406767/077344718', 'modrich@mweb.co.zw', '', '0cc50b142377beb3eb3fe7506eec3714.jpg', 'No 1 Austin Road, Workington, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(267, 'IWR (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 90110', 'iwr@zim.co.zw', '', '', 'P.O Box CH 359, Chisipite, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(268, 'Tzircalle Brothers (Pvt) Ltd', 6, 1, 'CIFOZ', '0292-661188/74084', 'tzircall@netconnect.co.zw', '', '', 'P O Box 3215, Belmont, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(269, 'Leengate (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 750644', 'leengate@zol.co.zw', '', 'da0d890163414272d23904d531828f34.jpg', '3 Prince Edward Road, Avondale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(270, 'Zimbabwe Jiangsu International (Pvt) Ltd', 6, 1, 'CIFOZ', '0772490422/0712 5952', 'zimjiangsu@yahoo.com', '', '', '72 Qn Elizabeth Rd, Greendale, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(271, 'Oplenac (Pvt) Ltd', 6, 7, 'CIFOZ', '(039) 262529', 'blago013@yahoo.com', '', '', 'Stand 4268 Westview, Industrial Park, Masvingo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(272, 'Zimbabwe Nantong International (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 304493', 'ntjgzw@126.com', '', '1a0c9a1251bbe6256cefef9381ca908e.jpg', '16 The Chase, Mt Pleasant, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(273, 'M & L Earthmovers', 6, 1, 'CIFOZ', '(062)2405', 'chalkmount@yahoo.com', '', '', '2 Poort Road, Norton', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(274, 'R. Davis & Company (Pvt) Ltd', 6, 1, 'CIFOZ', '0242-770474/5', 'reception@rdavis2.net', '', '5aa0766e3741ba10041232b6c608b86d.jpg', '12 Boshoff Dr Graniteside, Box 2205, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(275, 'N-Frasys (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 744102', 'info@n-frasys.com', '', 'c98b96765c6a76817fe3edf75fe380af.jpg', '110 Swan Drive, Alexandra Park, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(276, 'Essar Tubes & Towers', 6, 1, 'CIFOZ', '0242 662239/611214', 'info@essar.co.zw', '', '43fc15b2fa189e15f92e925ce6271daf.jpg', 'Cnr Dagenham/Barking Rd, Willowvale, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(277, 'Showbyte Engineering (Pvt) Ltd', 6, 1, 'CIFOZ', '748815', 'showbyteengineering@gmail.com', '', '', 'Takawira/Nhrumah, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(278, 'New Civils (Pvt) Limited', 6, 2, 'CIFOZ', '0292-880437/880311/', 'ncivils@mweb.co.zw', '', '', 'P.O.Box 3296, Bulawayo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(279, 'Sheasham Investments', 6, 10, 'CIFOZ', '054225433/054223407', 'info@shurugwiheights.com', '', '6e3eda8ac51a3d2e7ce50064bc688480.jpg', '75 7th Street, Gweru.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(280, 'Stelix Civil Engineers & Contractors', 6, 2, 'CIFOZ', '(0292)887775', '', '', '', 'Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(281, 'Waterflo Engineering', 6, 1, 'CIFOZ', '774356546', 'bmadamba@yahoo.com', '', '090bc2a1fb3a138a85ad057696151f7d.jpg', '9 Spurn Road, Ardbennie, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(282, 'Release Power Investments (Pvt) Ltd', 6, 1, 'CIFOZ', '0773 294327-8/ 0712 ', 'ctmatope@yahoo.com', '', '', 'P O Box BW 1371, Borrowdale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(283, 'Rivervalley Properties', 6, 10, 'CIFOZ', '8644202979', 'rivervalleyprop@gmail.com', '', '48f6c497a30713a7b682189952377989.jpg', '2, 6th Street Saguga Bldn, Gweru', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(284, 'Zebra Contracting', 6, 1, 'CIFOZ', '0242 581226', 'zebracontract@gmail.com', '', '89c8a15430b379bdc9d648d86481414d.jpg', '42 George Road, Hatfield, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(285, 'Rivereigh Investments', 6, 1, 'CIFOZ', '772420671', 'williemikkel@gmail.com', '', '', '2902 Manyuchi Rd, Marlborough, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(286, 'Zimbabwe Defence Industries', 6, 1, 'CIFOZ', '753579-82; 773105', 'zimdefin@africaonline.co.zw', '', 'a9bec2e7cc58f72a4e53ef582e2e6289.jpg', 'Tourism House, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(287, 'Adherechem (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 667076', 'lamas@zol.co.zw', '', '', '181 Erith Road, Willowvale, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(288, 'Rodcroft Engineering (Pvt) Ltd', 6, 1, 'CIFOZ', '0242-703606/9/798341', 'mbizvopatrick@gmail.com', '', '', 'P.O Box A2001, Avondale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(289, 'Wellod Construction', 6, 1, 'CIFOZ', '0242 772959689', 'morgen.nkomo@wellodtrangings.co.zw', '', '', '85 Harare Drive, Mt Pleasant, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(290, 'BYD Steel Structures and Roofing', 6, 1, 'CIFOZ', '751787/753637/755175', 'byd@iwayafrica.co.zw', '', 'fd95033a89e1d64335eca0e25a7c792a.jpg', 'Graniteside, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(291, 'Beak Peck Enterprises', 6, 1, 'CIFOZ', '0772682960/077324928', 'beakpeck@gmail.com', '', '', '12 Waterfalls Ave, Ardbennie, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(292, 'Road Trackers Construction', 6, 10, 'CIFOZ', '552524913', '', '', '', 'Light Industrial, Kwekwe.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(293, 'Excel Properties', 6, 1, 'CIFOZ', '0242 700948/255626/7', 'pshoko@excelproperty.co.zw', '', '12184194f6035740b1f1177c360e0894.jpg', '1 Mold Crescent, Kensington, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(294, 'Detorn Investments', 6, 1, 'CIFOZ', '0242 94276', 'admin@dptelecoms.co.zw', '', '', '32 Airdrie Road, Eastlea, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(295, 'Homeseeker Inc. (Pvt) Ltd', 6, 2, 'CIFOZ', '(0292) 243837/243692', 'homesaver@homeseekerinc.co.zw', '', 'b95610684497f6e47dc8aa629f2a5e9a.jpg', '50A Leander Ave, Hillside, Bulawayo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(296, 'Windy Construction', 6, 2, 'CIFOZ', '(0292)281333`', 'windycon6@gmail.com', '', '', 'Bag 5212, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(297, 'Jepnik Asphalt Products', 6, 1, 'CIFOZ', '0242 87577/446512', 'info@jepnikinv.co.zw', '', 'deb1804d243a0b371b1a38cbe2719467.jpg', '1086 Western Clause, Greendale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(298, 'WRR Master Specialists & Civil', 6, 2, 'CIFOZ', '(0292) 79878', 'wellington@masterspecialists.co.za', '', '5aaeb35740a28eeecfd2b84eba0c27fd.jpg', 'Thorngrove, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(299, 'Traffic Solutions', 6, 1, 'CIFOZ', '8644089766', 'info@trafsolgroup.com', '', '6f902255adfff486da3fc6bfd68784a6.jpg', '4 Deary Avenue, Belgravia, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(300, 'Afecc Zim Road & Bridge', 6, 1, 'CIFOZ', '772149356', 'afecczim@163.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', 'Longcheng Plaza, Office Block 1, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(301, 'Astra Paints', 6, 1, 'CIFOZ', '0242 753808-16', 'gandaj@astra.co.zw', '', 'e531c78f488eb14ece9a1a9520e12d31.jpg', '14 Burnely Rd, Workington, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(302, 'C A Biffen', 6, 2, 'CIFOZ', '62765/74634', 'cabiffen@acacia.samara.co.zw', '', '', 'Belmont, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(303, 'Dingsheng Road Investments', 6, 1, 'CIFOZ', '772149356', 'dingshengroad@163.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', 'Longcheng Plaza, Office Block 1, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(304, 'Barzem Enterprsises (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 86600-6', 'pdekune@barzem.co.zw', '', '67b4b7a1929a92939167dfe88cd507ba.jpg', 'P O Box 1537, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(305, 'Engineered Waterproofing Systems(EWS)', 6, 2, 'CIFOZ', '0292 76654', 'manager@ews.co.zw', '', 'caedd9e9eeccbc70418c7b211e6919e2.jpg', '38 S.Parirenyatwa 2nd Ave, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(306, 'AC Controls (Pvt) Ltd', 6, 1, 'CIFOZ', '739183/86', 'fmakumbinde@accontrols.co.zw', '', '59104634291c3c421e7412decfe4cecd.jpg', 'Kensington, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(307, 'Bell PTA (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 47374-9', 'keithb@bell.co.za', '', '4decc562ea6e9f87920a090fb4df18bc.jpg', '9 Martin Drive Msasa, P. O. Box 2980, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(308, 'Glenkara Homes (Pvt) Ltd', 6, 2, 'CIFOZ', '0292-460522/3', '', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', 'P O Box FM 250, Famona, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(309, 'Beta Bricks (Pvt) Ltd', 6, 1, 'CIFOZ', '0242  925303-4/29150', 'betasales@beta.co.zw', '', 'cf43f23418c41fb36e572749fd66b16d.jpg', '46 East Road, Avondale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(310, 'Anstock Services (Pvt) Ltd', 6, 1, 'CIFOZ', '0772330103/071260071', 'anstock@zol.co.zw', '', '', 'Belvedere, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(311, 'Glendining AP (Pvt) Ltd', 6, 2, 'CIFOZ', '0292-69076-7', 'apgcon@yoafrica.com', '', 'c9340bec5debf28aff49dc7af0601429.jpg', 'P O Box 9023, Hillside, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(312, 'CAFCA (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 786320/786327', 'rob@cafca.co.zw', '', '4c6a21be9c049b4462378b1773dd3421.jpg', 'P O Box 1651, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(313, 'North South Corridor', 6, 1, 'CIFOZ', '772149356', 'alicia1101@163.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', 'Longcheng Plaza, Office Block 1, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(314, 'Conplant Technology (Pvt) Ltd', 6, 1, 'CIFOZ', '771856904', 'conplant@zol.co.zw', '', '89cfdc7c55e63183ebeb0c057e516ef4.jpg', '1 Chamelsford, Belgravia, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(315, 'Davis Granite (Pvt) Ltd', 6, 2, 'CIFOZ', '0867 700 9880', 'sales.byo@davisgranite.co.zw', 'https://www.davisgranite.com', '9be846ac19c86839bdf24444b82a3382.jpg', 'P O Box 1274, Bulawayo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(316, 'V.Pereti', 6, 2, 'CIFOZ', '0292-64544/70217', 'peretti@yoafrica.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '1 Woburn Road, Thorngrove, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(317, 'Belmont Electrical (Pvt) Ltd', 6, 2, 'CIFOZ', '0292-60587 / 74574', 'belelect@yoafrica.com', '', '7bdd1c91ce44b6654de327fa4c2c0010.jpg', 'P O Box FM 452 Famona, Bulawayo.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(318, 'China Chrome Mining Company', 6, 10, 'CIFOZ', '0778018888/077801889', 'ccmczim@hotmail.com', '', '', 'CABS Building, Gweru.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(319, 'Flint (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 758071-3', 'johan@flint.co.zw', '', '09ad10f172428010e665c637825c2cd3.jpg', '104 Seke Road, Graniteside, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(320, 'Haivol Electrical', 6, 1, 'CIFOZ', '0242 755812', 'maxhaivoelectric@gmail.com', '', '86b9728c49ed1a4ce3b1e1e7e53fc627.jpg', '5 Ground Floor, Fidelity Life Tow, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(321, 'Faraday Electrical Contracting Company', 6, 1, 'CIFOZ', '0242-448269', 'faraday@ask.co.zw', '', 'caf425793a972be92550602a32f41df8.jpg', 'Msasa, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(322, 'Gillfun Steel', 6, 1, 'CIFOZ', '0242 752524/710513', 'sales@gillfunsteel.co.zw', '', '4f84b8c38c0b2b9aee4bc37b0397297f.jpg', '13 Shepperton Rd, Graniteside, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(323, 'Ralton Electricals', 6, 1, 'CIFOZ', '0242 570308', 'info@raltonelectricals.co.zw', '', '', '33 Falcon Road, Hatfield, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(324, 'FC Platinum Holdings', 6, 1, 'CIFOZ', '02542 230000', 'chirewae@mimosa.co.zw', '', '89c2c39db2a614a43b7fb543ad6ac777.jpg', 'Zvishavane.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(325, 'Home-Style Bricks', 6, 1, 'CIFOZ', '0242 851996 / 851983', 'sales@hsbricks.co.zw', '', 'c8bda31051bcc03112b8f8260a8ddd64.jpg', 'Alpes Rd Pomona Quarries, Pomona, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(326, 'JCBLink Zimbabwe', 6, 1, 'CIFOZ', '0242 621550', 'info@scanlink.co.zw', '', 'f7691b37d3d5a2086d3f74cddba51937.jpg', '30001 Dagenham Rd, Willowale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(327, 'Khayah Cement  Limited', 6, 1, 'CIFOZ', '8688005000', 'zim.sales@khayahcement.com', 'https://www.khayahcement.co.zw', '0f4b485c969b2c54a16cb7d4ac35bf92.png', 'Manresa works ,Arcturus Road PO Box GD160; Greendale, Harare', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(328, 'ZESA Enterprises', 6, 1, 'CIFOZ', '0242 666783/669247', 'shellygondo@zent.co.zw', '', '814d0ab99a7cb290fe6ecdb5682ca4f1.jpg', '1 Harare Drive, New Ardbennie, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(329, 'Kamatech Projects (Pvt) Ltd', 6, 1, 'CIFOZ', '740518/741223', 'admin@kamatechprojects.co.zw', '', '6cda3b1590d7bb105cb45107a7a9f8fb.jpg', 'Belvedere, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(330, 'Delta Power Engineering', 6, 1, 'CIFOZ', '0242-447589/90', 'sales@deltapowerltd.com', '', '75749e9bcc199302029277571c467901.jpg', '34 George Ave, Msasa, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(331, 'Macdonald Bricks', 6, 2, 'CIFOZ', '8677000267', 'marketing@macbricks.co.zw', 'https://macbricks.com', '68e1ccd5d13f702b41c473c6bb91abbb.jpg', 'Box 9090 Hillside, Bulawayo', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(332, 'L Electron (Pvt) Ltd', 6, 1, 'CIFOZ', '486771-2', 'stores@electron.co.zw', '', '8e0615f13f2f521fd72bfa067f119a15.jpg', 'Msasa, Harare.', 1, '2026-05-29 06:37:35', '2026-05-29 06:37:35'),
(333, 'Drum City Industry (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 669905/669889', 'drumcity@zol.co.zw', '', '', '859 Bignell Rd, New Ardbennie, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(334, 'Mashwede Diesel Services', 6, 1, 'CIFOZ', '0242 772872/773169', 'sales@mh.co.zw', '', '99355cf9fcd5c92c0152111cccaf85a2.png', '18226 Culverwell Road, Arcadia, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(335, 'Onel Electrical Engineers (Pvt) Ltd', 6, 1, 'CIFOZ', '612860/612849', 'onelnn@mweb.co.zw', '', '395c8bcb1fa3dc0167b95dac70d41933.jpg', 'Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(336, 'MFS Group (Pvt) Ltd', 6, 3, 'CIFOZ', '(020)60502/60558/9', 'farai@mfsgroup.co.zw', '', 'dca81e980aa2e59c0fe6d3d66874f059.jpg', '59 2nd St., Mutare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(337, 'Kacee Electrical Contractors', 6, 1, 'CIFOZ', '0242 747380', 'kaceelimited@gmail.com', '', '', '7 St Quintin Avenue, Eastlea, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(338, 'Surridge Electrical Contractors', 6, 1, 'CIFOZ', '0772838367/073312748', 'surridgeelectricalcontractors@gmail.com', '', '', '80 Kaguvi/Raleigh ST, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(339, 'Olinda Manufacturing (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 663334/663339', 'olinda@mweb.co.zw', '', 'a7faef66970f1995695a8a136a0b0337.jpg', '128 Dartford Road, Willowvale, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(340, 'Powertech Engineering (Pvt) Ltd', 6, 1, 'CIFOZ', '664021/668928/666050', 'admin@powertech.co.zw', '', 'c7e64008fc52e96fb4e9a3b3f7875103.jpg', 'Box CY1134, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(341, 'NATCO', 6, 1, 'CIFOZ', '0242 792254', 'natcoelectrical@gmail.com', '', '842b2d0894b23b5d92c103250161975c.jpg', '88 Crowhill, Borrowdale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(342, 'Powerspeed Electrical Limited', 6, 1, 'CIFOZ', '0242 771097-9', 'hilton@powerspeed.co.zw', '', '3014c13c3963e632e922120c292595aa.jpg', 'Kelvin Rd North/Cripps Rd, Graniteside, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(343, 'Powerite', 6, 1, 'CIFOZ', '0242 779101-2', 'technical@powerite.co.zw', '', '5994bbca8baa1f3804da0b816372bdcd.jpg', '34C 7th Ave, Showgrounds, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(344, 'PPC Zimbabwe (Pvt) Ltd', 6, 2, 'CIFOZ', '0292-79241/72270', 'rsteyn@ppc.co.zw', '', 'd4dd6ad6f4d132a5629f30c3ef782550.jpg', 'Cnr 13th Ave/Main St, P O Box 1493, Bulawayo', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(345, 'Speartech Electrical & Mechenical Design & Installations', 6, 1, 'CIFOZ', '0242-334961/336484/3', 'admin@speartecelectrical.co.zw', 'https://www.speartec.co.zw', '579d9ec87a209dddd500a5b2ec9ccaf0.png', '14 Westcott Road, Mount Pleasant, Harare, Zimbabwe', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(346, 'Scandia Wire', 6, 1, 'CIFOZ', '0242 71122/471485/47', 'denise@scandia.co.zw', '', 'cc36bfe54ac50d195ab66068f3a195d2.jpg', '25 Birningham Road, Southerton, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(347, 'Xianbo Investments (Pvt) Ltd', 6, 1, 'CIFOZ', '0774314070/077404948', 'tindohc@gmail.com', '', '', 'Vainona, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(348, 'Thames Power Company', 6, 1, 'CIFOZ', '0242 306520/306861', 'info@thamespower.co.zw', '', '', 'No 1B Hill morton Rd, Meyrick Park, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(349, 'SINO Zimbabwe Cement Company (Pvt) Ltd', 6, 10, 'CIFOZ', '(054)227751', 'isengwe@sinozim.co.zw', '', '7fe4776e8b53d0a9961d942e0fe09494.jpg', 'P O Box 2038, Gweru', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(350, 'Smart Building Solutions', 6, 1, 'CIFOZ', '0242 86585/7-497589', 'Ttheresa@comstruct.co.zw', '', 'e12ed2f3b5fdb6f8e15c9f7a212f02be.jpg', '28 Anthony Ave, Msasa, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(351, 'UBM-PandL (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 752617-8/771884', 'bnyakurimwa@ubm.co.zw', '', '20b2e32a36b9cfa2d5a700fd836fdd07.jpg', 'Cnr kelvin Road South, Boshoff Drive,. Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(352, 'Willdale Bricks', 6, 1, 'CIFOZ', '+263 4 777198/9', 'marketing@willdale.co.zw', '', 'd110685abcb8e39e35d9691399805cfc.jpg', '19.5km Peg Lomagundi, Mt Hampden, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(353, 'Hems Africa', 6, 2, 'CIFOZ', '(0292) 883051', 'sales@hemsafrica.com', '', '998a0f6fa70114153e9cd372725f56ce.jpg', '21 Old Khami Road, Steeldale, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(354, 'Hogaths Limited', 6, 2, 'CIFOZ', '(0292) 67881-3', 'grahambryce66@gmail.com', '', '', 'P.O. Box 434, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(355, 'Winsten Precast (Pvt) Ltd', 6, 1, 'CIFOZ', '0242-779785', 'info@winstenprecast.co.zw', '', 'b542cbcbffa90b14ca13a61632b78315.jpg', '11 Bradfield, Hillside, 10473 Tilco Industries, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(356, 'ZIMRE Property Investments Limited', 6, 1, 'CIFOZ', '(0242)777139-777157-', '', '', 'ad9f02adc5242863af0324539cb6a470.jpg', '6th Flr Fidelity Life Tower, 5 Raleigh, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(357, 'V Peretti (Pvt) Ltd', 6, 2, 'CIFOZ', '0292-64544/70217', 'peretti@yoafrica.com', '', '', '1 Woburn Road, Thorngrove, Bulawayo', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(358, 'Scotia Steel (Pvt) Ltd', 6, 1, 'CIFOZ', '', 'jmanase@scotiasteel.co.zw', '', '12394bbb3180e4c9993f95d648b8e028.jpg', '22 Douglas Road, Workington, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(359, 'Steelforce (Pvt) Ltd', 6, 2, 'CIFOZ', '0262-474675-7', 'chrystl@steelforce.co.zw', '', 'bf5cee791f7db30045e42e5204bc5c8b.jpg', '9 Bilston Rd Donnington, Belmont, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(360, 'Winnerman Engineering (Pvt) Ltd', 6, 2, 'CIFOZ', '(0292)73186-7', 'info@winnesman.co.zw', '', 'fe71f5bc0aa70c66308fb41498a8ee75.jpg', '9 Nugget Road, Wenstondale, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(361, 'Pump Systems Africa', 6, 1, 'CIFOZ', '0292 665012/663508', 'enquiries@pumpsystemsafrica.net', '', '88e2e8d37207ad347f9061b9dd5bc5ea.jpg', '5 Motherwell, Workington, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(362, 'Shanghai Engineering', 6, 1, 'CIFOZ', '0242 746680', 'dgumbiram@gmail.com', '', '', '80 Glenara Ave, Highlands, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(363, 'Kingson Trading (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 304341-2', 'kingsonnkm@gmail.com', '', '', 'Shop 54 Westgate Mall, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(364, 'Tendo Electronics', 6, 1, 'CIFOZ', '0242 774780/3/6-7735', 'helpdesk@tendo.co.zw', '', 'ba79d51bcf912d84ffc1c0ab0bc55979.jpg', '21 Birmingham Rd, Southerton, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(365, 'Tacna Engineering & Construction', 6, 1, 'CIFOZ', '0242-300214', 'gkngwari@gmail.com', '', '', '63 Newstead Rd, Marlborough, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(366, 'Boltgas Engineering (Pvt) Ltd', 6, 1, 'CIFOZ', '(039 235)147459', 'admin@boltgasengineering.com', '', '', '105 Railway Avenue, Zvishavane.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(367, 'Excel Elevators (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 308014/308018/3', 'gbaudi@excelevators.co.zw', '', '83bc20682a4c0bb1897cab5b13d6892a.jpg', '14 Bedford Road, Avondale, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(368, 'Tarcon (Pvt) Ltd', 6, 1, 'CIFOZ', '2.63868E+12', 'infor@tarconafrica.org', 'https://www.tarconafrica.org', 'cea5c33d2dd163be80aa64a72e429361.jpg', 'Number 8 Fletcher Road, Mt Pleasant, Harare, Zimbabwe', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(369, 'Tencraft Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '0242-447201-3', 'ashambira@yahoo.com', '', 'ba1b490968ad0c282bef90886792708e.png', 'P.O.Box GD 651, Greendale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(370, 'Fusan Constructions', 6, 1, 'CIFOZ', '0774872962/077297292', 'fusanco2015@gmail.com', '', '', '105 Coventry Road, Workington, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(371, 'GEC Zimbabwe (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 770760/6', 'enquiries@gec.co.zw', '', '908be1de9fc7422e365059edfdce7f94.jpg', '9 Cam Road, Graniteside, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(372, 'Sparkle Cleaners', 6, 1, 'CIFOZ', '8644132332', 'sparklecleaners09@gmail.com', '', 'f89867db813327ed771214af7fe37ad9.jpg', '123 Dolphin Hse, Cnr L.Takawira/N.Nkurumah Suite 612, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(373, 'Liftech Elevators', 6, 1, 'CIFOZ', '0242 666741/666869', 'info@liftechelevators.co.zw', '', 'a6f421450f8ba00c59c21f2a592106e7.jpg', '35 Patt Dunn Close, New Adbernnie, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(374, 'V-Tech Elevator Company', 6, 1, 'CIFOZ', '0774667915 / 0772863', 'vtechzw@gmail.com', '', '0b4ba54edaa6928060060910ae2f833d.jpg', '12th Floor,Causeway Bldn, Central Ave, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(375, 'Marmford Engineers', 6, 1, 'CIFOZ', '0424 772491231', 'marmford@gmail.com', '', '4e43766142dfb4e5d7a6a16f6ae4c5d1.jpg', '9 Avonlea S/Centre, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(376, 'Engineering World (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 716324553', 'eworldtechnicians@gmail.com', '', '', 'Engineering World (Pvt) Ltd, Borrowdale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(377, 'Enock Construction &Earthmoving Equipment', 6, 2, 'CIFOZ', '0292-480574', 'enockconsequipment@gmail.com', '', '', '17052 Iron Close, Kelvin West, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(378, 'Trium Incorporated', 6, 1, 'CIFOZ', '0242 757517', 'info@triuminc.co.zw', '', '', '85B Cameron Street, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(379, 'Winnercon', 6, 2, 'CIFOZ', '(0292)73186-7', 'info@winnesman.co.zw', '', '', '9 Nugget Road, Westondale, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(380, 'Zada Construction', 6, 1, 'CIFOZ', '0242 001139-40', 'zadaconstruction@gmail.com', '', '60b21d2ee8b6df74f739e29ef007c519.jpg', '12910 Kirkman Rd, Madokero Tynawald, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(381, 'Creative Systems (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 669783-4/661531', 'vtendayi@creativesystems.co.zw', 'https://www.creativesystems.co.zw', '67ae6b3ad49708d4d65b314ddeec4e09.jpg', '73A Douglas Rd Workington, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(382, 'Architectural Aluminium (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 756336/7', 'sales@hotali.co.zw', '', 'ab5a7f4816704e9c305629baf1d206fb.jpg', '11 Douglas Road, Workington, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(383, 'G & H Shopfitters', 6, 1, 'CIFOZ', '0242 486619/486502', 'dmakanda@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '10 George Dr, Msasa, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(384, 'Global Shopfitters', 6, 1, 'CIFOZ', '0242 447587', 'globalshopfitterszim@gmail.com', 'http://www.globalshopfitters.co.zw/', '8927f2a78371615d6bb17c9ac95e6d63.jpg', 'Unit 3, 279 Whites Way, Msasa Harare, Zimbabwe', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(385, 'AE Electrical Lighting & Manufacturing', 6, 1, 'CIFOZ', '0242661338/665636', 'sales@ae.co.zw', 'http://.ae.co.zw', 'eb70d28f6ba42321e8d174a213d964cf.png', '124 Lytton Road, Workington. Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(386, 'Almin Metal Industries', 6, 1, 'CIFOZ', '8677007191', 'mhlophez@almin.co.zw', 'http://almin.co.zw', '81d265dad646246283c760edc398ab98.jpg', 'Cnr Dagenham/Willowvale Road, Willowvale, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(387, 'Eco Lighting (Pvt) Ltd', 6, 1, 'CIFOZ', '0242 301 852/369504', 'info@ecolighting.co.zw', 'http://ecolighting.co.zw', '5c3294b1ea8d0703ddbf866456942a5f.jpg', '14 Westcott Road, Mt Pleasant, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(388, 'Intercrete Zimbabwe', 6, 1, 'CIFOZ', '0712884043/027321332', 'sales@intercrete.co.zw', 'http://intercrete.co.zw', '1905606d87e3693bbf1622b263293169.jpg', '3789 Shumba Road, Ruwa, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(389, 'Zimbudirira Investments Development Corporate', 6, 1, 'CIFOZ', '0787755288/071685226', 'zimbudirira@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', 'No. 24 Sterling Heights Cnr 5th St &amp; J. Tongogara, CBD, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(390, 'Asnine Trading', 6, 1, 'CIFOZ', '', 'asninetrade7@gmail.com', '', '', '25 Castens Road, Belvedere, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(391, 'Conduit Investments Pvt Ltd', 6, 1, 'CIFOZ', '(04)704365', 'conduit@conduit.co.zw', 'http://conduit.co.zw', '23b0e2eeda373fe449b7c982243e86e0.png', '44 Samora Machel Avenue, Harare,', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(392, 'Homelux Property Development Company', 6, 1, 'CIFOZ', '788107, 788106-11', 'reception@homelux.org', '', '', '108 McClerry Ave ,Eastlea, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(393, 'L. Gono Enterprises', 6, 1, 'CIFOZ', '309791', 'lgonoent@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '160 Gilchrist Road, Marlborough, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(394, 'Leengate (Pvt)Ltd', 6, 1, 'CIFOZ', '(04)750644', 'leengate@zol.co.zw', 'http://zol.co.zw', '552871ebedc26eebc34eada6b31e0f08.png', '3 Prince Edward Road, Avondale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(395, 'Magnet Construction', 6, 1, 'CIFOZ', '242745526', 'pchiyangwa@nativeinvestment.co.zw', 'http://nativeinvestment.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '26 Fleetwood Road, Alexandra Park, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(396, 'Mayor Contracting', 6, 1, 'CIFOZ', '721449', '', '', 'ba1b490968ad0c282bef90886792708e.png', '13th Floor Fidelity Life Tower 5 Raleigh Street, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(397, 'Realquote Construction', 6, 1, 'CIFOZ', '0772 120 892 / 0734 ', 'murema84@gmail.com', '', '', '36 Denbigh Road, Belvedere, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(398, 'Syndicated Resources', 6, 1, 'CIFOZ', '0242 721 449', 'zaniguzha@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '13th Floor Fidelity Life Tower 5 Raleigh Street, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(399, 'Zimbabwe CRSG Construction', 6, 1, 'CIFOZ', '782795466', '124678034@qq.com', '', 'ba1b490968ad0c282bef90886792708e.png', '19 Leicester Road, Emerald Hill, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(400, 'Adela Contracting (PVT) LTD', 6, 1, 'CIFOZ', '778097806', 'info@adelacontracting.com', '', '', 'Highlands, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(401, 'Artin Incorporated (Pvt)Ltd', 6, 1, 'CIFOZ', '242309423', 'info@artinink.co.zw', 'https://www.artinink.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '40 Gilchrist Drive, Malborough, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(402, 'Burchan Land Developers (Pvt) Ltd', 6, 1, 'CIFOZ', '2427944999', 'burchanland@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '107 Kwame Nkrumah Ave Runhare 4th floor, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(403, 'Delta Africa Contracting', 6, 1, 'CIFOZ', '242485023', 'admin@deltaafrika.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '152 Mutare Rd Bay 11 Cavan Industrial Park, Msasa, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(404, 'Evergreen Construction & Land Developers', 6, 1, 'CIFOZ', '', 'evergreenlanddeveloper@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '48 Northampton Road, Eastlea, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(405, 'Fourways Engineering Services', 6, 1, 'CIFOZ', '242305662', 'admin@fourways.co.zw', 'https://www.fourways.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '32 H Kenmark Crescent, Bluffhill, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(406, 'Grindale Engineering', 6, 1, 'CIFOZ', '0772211913/077228760', 'grison.muwidzi@grindaleengineering.co.zw', 'http://grindaleengineering.co.zw', 'ba1b490968ad0c282bef90886792708e.png', 'No 7 Brickfield Road Mt Hampden, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(407, 'Met Holdings Limited', 6, 1, 'CIFOZ', '242700445', 'bmurewa@metholdings.co.z', 'https://www.metholdings.co.z', 'ba1b490968ad0c282bef90886792708e.png', '3 Central Avenue, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(408, 'Nemaks Construction & Engineering Services', 6, 1, 'CIFOZ', '09-889293/5/8', 'nemaks93@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '2A York Road, Hillside, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(409, 'RK Hardware & Construction', 6, 2, 'CIFOZ', '881679/31', 'rkhardware@tapali.co.zw', 'https://www.tapali.co.zw', 'ba1b490968ad0c282bef90886792708e.png', 'No 31 15th Ave Btwn J.Moyo &amp; Five Ave, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(410, 'Sesani Projects (pvt) Ltd', 6, 1, 'CIFOZ', '0242 307 058/61', 'info@sesani.co.zw', 'https://www.sesani.co.zw', '', '60 The Chase, Mount Pleasant , Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(411, 'Urban vision Development (Pvt) Ltd', 6, 1, 'CIFOZ', '0772448822/077705584', 'georgekatsimberis@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '7 normandy Road, Alexandra Park, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(412, 'Virtus Construction', 6, 1, 'CIFOZ', '', '', '', 'ba1b490968ad0c282bef90886792708e.png', '', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(413, 'Alpha International Land Developers', 6, 1, 'CIFOZ', '8644290524', 'lovemore.muchadeyi@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '61 Samora Machel Pearl House, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(414, 'Radx Construction', 6, 1, 'CIFOZ', '0242 446059/60', 'paul@berrycon.co.zw', 'https://radxconstruction.com/', '06bc395008eb439253ea340aaaa96447.jpg', '13 Williams Way, Msasa, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(415, 'Concrete Masters', 6, 1, 'CIFOZ', '732400378', '', 'http://concretemasters.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '3 Browning Drive, Strathaven, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(416, 'Dartex Investments (PVT) LTD', 6, 1, 'CIFOZ', '0242 755 672', 'admin@dartex.co.zw', 'https://www.dartex.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '110 L. Takawira, 8th Floor, Construction hse, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(417, 'Dourich Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '@0772 940 407/ 0772 ', 'i@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', 'stand 11291, Kirkman Rd, Tynwald Township, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(418, 'Finmark Energy', 6, 1, 'CIFOZ', '242780611', 'sales@finmark.co.zw', 'https://www.finmark.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '89 Kelvin Road South, Graniteside, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(419, 'German Construction', 6, 1, 'CIFOZ', '', 'sales@germanconstruction.co.zw', 'https://www.germanconstruction.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '27 Ascot Road, Avondale West, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(420, 'Hogback Construction Services', 6, 1, 'CIFOZ', '218147', 'hogbackconstruction@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '10606 Westlea Industrual Park, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(421, 'Nyamweda Investments', 6, 1, 'CIFOZ', '772917509', 'trynyams@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', 'Construction House Suite 402-4th Floor Cnr L. Takawira &amp; N.Mandela Ave. CBD, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(422, 'Tokologo Technical', 6, 2, 'CIFOZ', '09-280472', 'tokologotech@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '14743 Mziki Way, Selbourne Park, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(423, 'Ventus Investments (Pvt) Ltd', 6, 1, 'CIFOZ', '666578/666605', 'ventusconstruction@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '108 Coventry Road Workington, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(424, 'Advob Enterprises', 6, 2, 'CIFOZ', '0778344254/077923800', 'advobenterprises02@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '14th Avenue/R Mugabe, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(425, 'Awesome Shop Fitters P/L', 6, 1, 'CIFOZ', '446803', 'awesomeshopfitters@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '10 George Drive, musasa, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(426, 'Glenrise Investments', 6, 1, 'CIFOZ', '0772513901-16', 'Israel.tm.potera@gmail.com', '', '44b5a1019f09199ec05d6707df2898d6.png', '885 Turf Township, Mhondoro.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(427, 'Cyle (PVT)LTD', 6, 2, 'CIFOZ', '772415430', 'contact@cyle.co.zw', 'https://www.cyle.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '11TH Ave/G .Silundika, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(428, 'Engineering Innovations', 6, 1, 'CIFOZ', '779818962', 'i@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '53 Victoria Road, New lands , Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(429, 'Kalamain Investments', 6, 1, 'CIFOZ', '0772362886/078310647', 'janinekuschula@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '7 normandy Road, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(430, 'paulo constrution', 6, 1, 'CIFOZ', '771769479', 'paulosconstruction05@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '3 Sessex Road, Avondale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(431, 'Redcliff Engineering(Pvt)Ltd', 6, 10, 'CIFOZ', '0772699488/077322964', 'finance@redcliffengineering.co.zw', 'https://www.redcliffengineering.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '1422 Old Steelworks road, Kwekwe.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(432, 'Smart Construction (Vigillant)', 6, 2, 'CIFOZ', '09-70455', 'pidosburg1@yahoo.com', '', 'ba1b490968ad0c282bef90886792708e.png', '7 Jubilee Court Cnr 4th & R Mugabe, Bulawayo.l', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(433, 'Tanajane Investments', 6, 1, 'CIFOZ', '0773 736 025', 'amasamba10@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '188 Sopers Crescent, Victoria Falls .', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(434, 'Toppick Investments Pvt Ltd', 6, 1, 'CIFOZ', '772420677', 'mudaucjohn@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '1393 Medium Density, Beitbridge', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(435, 'Facilities Management', 6, 1, 'CIFOZ', '0731301520/073260225', 'facilitiesmanagementprivatelim@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '18 Birminghan Road, Southerton, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(436, 'Innovative Marketing', 6, 1, 'CIFOZ', '714421857', '', 'https://www.innovativemarketingcompany.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '9 Bodle Avenue, Eastleas, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(437, 'Lifetime Construction', 6, 1, 'CIFOZ', '0785121298/077414064', 'lifetimeconstruction77@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', 'No 22 Auld Crescent, eastly harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(438, 'N. Rodricks P/L', 6, 1, 'CIFOZ', '773977808', 'i@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '175 Guzha Industry, Chikwanha, chitungwiza', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(439, 'Step After Step Contractors', 6, 1, 'CIFOZ', '', '', '', 'ba1b490968ad0c282bef90886792708e.png', 'Room 13 Kugonachete Cnr Domboshawa/Crowhill, Helensvale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(440, 'Struqton Structural (Pvt) Ltd', 6, 1, 'CIFOZ', '774751841', 'infor@struqton.co.zw', 'https://www.struqton.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '7457 7th Circle Glenview 7, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(441, 'Volcom Enterprises', 6, 1, 'CIFOZ', '242339763', 'volcom.sales@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '3 Sussex Road Avondale West, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(442, 'Bamirica Enterprises(Pvt)Ltd', 6, 1, 'CIFOZ', '772937687', 'bamiricacivilengineers@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '10 Sikaba Road, Hwange.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(443, 'Enhanced Construction Solutions', 6, 1, 'CIFOZ', '772110350', '', 'http://enhancedconstruction.co.zw', '437aa971c23c1127e42bb9ed0e24f5a3.png', '3902 Southview Park; Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(444, 'Frederick Engineering & Construction', 6, 1, 'CIFOZ', '775569895', 'frederickconstandengineering@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '527 Crowhill Views. borrowdale, harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(445, 'Kingswood Contracting', 6, 1, 'CIFOZ', '242886253', 'info@kingswood.co.zw', 'https://kingswood.co.zw', '', '9 Hillbrough Close, Greystone Park, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(446, 'KW Enterprises', 6, 2, 'CIFOZ', '263-9-77713/67034', 'gozon@kwenterprises.org', '', '', '2 Woodbury RoadThorngrove, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(447, 'Pavcon Industries', 6, 1, 'CIFOZ', '2001738', 'pavcon2@gmail.com', '', '', '14744 Nkwisi Gardening, Tynwald, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(448, 'Artline Agencies(PVT )LTD', 6, 1, 'CIFOZ', '0773089369/071325124', 'artlineagencies@yahoo.com', '', '', '12 Somerset Drive, eastlea, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(449, 'Bioray P/L', 6, 1, 'CIFOZ', '775105090/0772910739', 'sales@bioray.co.zw', '', '', 'Block 1 Office 102 Longchen Plaza , Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(450, 'Blessbook Investments', 6, 1, 'CIFOZ', '/0662107031', 'brymaton2020@gmail.com', '', '', 'shop no 1 stand 90 second street, Bindura.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(451, 'Buffet- Constra Construction', 6, 1, 'CIFOZ', '086 44 217 589', 'buffetcontractors@gmail.com', '', '', '3 Sussex Road. Avondale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(452, 'Bull-Shark Construction', 6, 1, 'CIFOZ', '778259140', 'bullsharkcap@gmail.com', '', '', '153 Crystal Hope Close, Goodhope, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(453, 'Converse Construction', 6, 1, 'CIFOZ', '0772602606;077339025', 'conversezw@gmail.com', '', '', '18 Montagu Court 142 J. Chinamano, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(454, 'Commercial Intent Investments', 6, 1, 'CIFOZ', '0715024757/077240952', 'commercialintent2013@gmail.com', '', '', '865 Glaudina Snake Park,', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(455, 'Destiny Movers(Pvt)Ltd', 6, 1, 'CIFOZ', '772616940', 'destinymovers1@gmail.com', '', '', '44 Bradfield Road, hillside ,harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(456, 'Dissbell Investments', 6, 1, 'CIFOZ', '772381636', 'dissbellzim@gmail.com', '', '', '50 Goodringtone Road, Bluffhill, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(457, 'Henbab Investments (Pvt) Ltd', 6, 1, 'CIFOZ', '0773563122/071230058', 'henbabinvestments@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '1320 Empumalanga t/ship, Hwange,', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(458, 'Jam Engineers', 6, 2, 'CIFOZ', '719718818', 'jamengineers@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '14601 Isiwane Crescent, Selbourne park, Bulawayo', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(459, 'Legamach Construction', 6, 1, 'CIFOZ', '712779704/0732290527', 'legamach0@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '1 Union Avenue Office 6F, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(460, 'Liron Civils & Projects', 6, 2, 'CIFOZ', '8644264829', 'lironcivils@gmail.com', '', '0b3d0786d4fc0a4c3c2559075cf915dd.jpg', 'Suite 211 Africa House, Cnr Fife St &amp; 10th Ave, Bulawayo', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(461, 'Liwago Investments', 6, 1, 'CIFOZ', '773051386', 'liwagoinvestments@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '88 Herbert Chitepo &amp; 7th Street, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(462, 'Mekeng Concepts', 6, 2, 'CIFOZ', '086 44 280071', 'mekengconcepts@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '1888 Old Khami Road, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(463, 'Phile- Maling Construction', 6, 2, 'CIFOZ', '0778965569/078352331', 'malingazone@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '18 Essex Court. Jim Nkomo &amp; Connaught Ve, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36');
INSERT INTO `companies` (`id`, `name`, `industry_id`, `province_id`, `stakeholder`, `phone`, `email`, `website`, `logo`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(464, 'Plumbeous Investments', 6, 1, 'CIFOZ', '0772373181/077617466', 'multitechinter6@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', 'Stand No 904, gwanda.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(465, 'Rashping', 6, 1, 'CIFOZ', '0771785217/077413517', 'plrashping@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '587 Willowvale Road, Southerton. harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(466, 'Save drive Building Contractors', 6, 1, 'CIFOZ', '242744086', 'setheoconzw@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '17 Fleetwood Road, Alexandra Park, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(467, 'Tecshed Incorporated', 6, 1, 'CIFOZ', '772789156', 'remigiousnyahunzvi@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '33 Jampies Street, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(468, 'Total Property Solutions', 6, 1, 'CIFOZ', '0242447400/447432', 'info@tps.co.zw', 'https://www.tps.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '16 Neil Ave, Msasa, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(469, 'VACZIM INVESTMENTS T/a Greenfour P/L', 6, 1, 'CIFOZ', '04-611140, 04-612263', 'accounts@greenfour.com', 'https://www.greenfour.co.zw/', 'ba1b490968ad0c282bef90886792708e.png', '493 Goodwin Road, Willowvale. Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(470, 'Vibronic Engineering', 6, 1, 'CIFOZ', '772972926', 'vibronicengineering@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '303 Gelfand House, Cnr 1st / Speke Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(471, 'Wavedom Investments (Gwenzi)', 6, 1, 'CIFOZ', '772703422', 'gwenzihardware@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', 'Stand No 136 Mooche, Chipinge', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(472, 'Altrac Services(Chiswell Investments)', 6, 1, 'CIFOZ', '0712205147/077361562', 'afourie@iwayafrica.co.zw', 'https://www.iwayafrica.co.zw', 'ba1b490968ad0c282bef90886792708e.png', 'Corner First Ave/Chevlot Road, Waterfalls, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(473, 'China Geo Engineering Corporation', 6, 1, 'CIFOZ', '785914136', 'chinageozimbabwe2019@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '119485 STL Flanagan Drive, Braeside, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(474, 'CMED', 6, 1, 'CIFOZ', '59459/517', 'stephen@cmed.co.zw', '', 'ba1b490968ad0c282bef90886792708e.png', 'CMED Head Office Cnr R Tangwena &amp; H. Chjitepo, Belvedere, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(475, 'JTL Equipment', 6, 1, 'CIFOZ', '0772695841/077220496', 'jtlquip@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '18413 Mutare Road, Msasa, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(476, 'Linash Enterprises', 6, 1, 'CIFOZ', '1263-242-750144/3072', 'lina@linash.co.zw', 'https://www.linash.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '79 3rd Ave ZAS, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(477, 'Modrich Enterprises', 6, 1, 'CIFOZ', '0712406767/077344718', 'modrich@mweb.co.zw', 'hjtttp://mweb.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '1 Austin Road, Workington, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(478, 'Bitumen Resources', 6, 1, 'CIFOZ', '744 340', 'bitumenresources@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', 'Bitumen Resources, Mt Pleasant, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(479, 'N-Frasys (Pvt)Ltd', 6, 1, 'CIFOZ', '(263)4744102/', 'info@n-frasys.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '110 Swan Drive Alexandra Park, Harare,', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(480, 'R Davis and Company (Pvt) Ltd', 6, 1, 'CIFOZ', '0712865132/077214371', 'e.davis@rdavis2.net', '', 'ba1b490968ad0c282bef90886792708e.png', 'No 12 Boshoff, Graniteside, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(481, 'RCM Civils', 6, 1, 'CIFOZ', '0773948998/077450207', 'rcmcivils@yahoo.com', '', 'ba1b490968ad0c282bef90886792708e.png', '22-32 McChlerry Ave, Eastlea, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(482, 'Shenxin Investments (Pvt) Ltd', 6, 1, 'CIFOZ', '2.63719E+11', 'info@sx.construction.com', '', 'ba1b490968ad0c282bef90886792708e.png', 'Plot 2, Greenhills, Tynwald, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(483, 'Sinohydro Corporation Limited', 6, 1, 'CIFOZ', '774556/783110/077542', 'mberimunya@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '4 Crackley Lane, Mount Pleasant, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(484, 'Tacna Engineering and Construction', 6, 1, 'CIFOZ', '0773188724/300214', 'admin@tacna.co.zw', '', 'ba1b490968ad0c282bef90886792708e.png', '63 Newstead Road, Marlborough, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(485, 'Boltrec Engineering', 6, 1, 'CIFOZ', '0772 816 906', 'gift@boltrec.co.zw', 'http://boltrec.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '19 Dart Road, Vainona, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(486, 'Brasstop Investments', 6, 1, 'CIFOZ', '0712329880/024220061', 'brasstopinvestments1@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '21669 Damofalls, Ruwa, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(487, 'DK Construction', 6, 1, 'CIFOZ', '2918330-1', 'dkconzim@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '60C Lorraine Drive, Bluffhill, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(488, 'Maka Farm (Pvt) Ltd', 6, 1, 'CIFOZ', '772441251', 'info@maka.co.zw', '', 'ba1b490968ad0c282bef90886792708e.png', '168B Chihombe Road, Ruwa, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(489, 'Mandebvu Contracting', 6, 1, 'CIFOZ', '0777 026 848', '', '', 'ba1b490968ad0c282bef90886792708e.png', 'Lot 4 of Lot B, Mt Hampden, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(490, 'Netlink Communications', 6, 1, 'CIFOZ', '0773595415/077855220', 'netlinkcommunications@zol.co.zw', '', 'ba1b490968ad0c282bef90886792708e.png', '184 Chiremba Road, Queensdale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(491, 'Shape It Adhesives', 6, 1, 'CIFOZ', '777911-2', 'sales@shapeitadhesives.co.zw', 'https://www.shapeitadhesives.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '20 Shepperton Road Graniteside, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(492, 'Sintless Services', 6, 1, 'CIFOZ', '291671', 'cnyatanga@sintlessservices.com', '', 'ba1b490968ad0c282bef90886792708e.png', '708 Midlands Close, Waterfalls, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(493, 'Stelix Civil Engineering', 6, 2, 'CIFOZ', '(09)887775', 'phikinimpofu@yahoo.co.uk', '', 'ba1b490968ad0c282bef90886792708e.png', '144 George Silundika, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(494, 'The Big Rock Logistics', 6, 3, 'CIFOZ', '07727156662/07851917', 'thebigrockpvtltd@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '5 liverpool road nyakamete industrial site, Mutare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(495, 'Apatron Mining', 6, 2, 'CIFOZ', '029-2246695', 'apatronmining@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '3 Greystone Way, Morningside, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(496, 'Concrete Masters P/L', 6, 1, 'CIFOZ', '732400378', 'info@concretemasters.co.zw', 'https://www.concretemasters.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '3 Browning Drive, Strathaven, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(497, 'Civilmax Construction', 6, 1, 'CIFOZ', '0775766489/078309938', 'civilmaxconstruction@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '6987 Guy Clinton Brooke Road, Tynwald, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(498, 'Capevalley Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '0772 884 790/0784 06', 'sales@capevalleyproperties.com', 'https://www.capevalleyproperties.com', '437aa971c23c1127e42bb9ed0e24f5a3.png', '18253 Nelson Mandela &amp; 8th Street, CBD, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(499, 'Crete Construction', 6, 1, 'CIFOZ', '0772334785/077271826', 'info@creteconstruction.co.zw', 'http://creteconstruction.co.zw', '437aa971c23c1127e42bb9ed0e24f5a3.png', '117 Bishop Gaul Road, Kansington, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(500, 'Comhold Services', 6, 1, 'CIFOZ', '24230873', 'tjzhaks@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '10487 Masanga road, Chitungwiza, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(501, 'Dolight Engineering', 6, 1, 'CIFOZ', '0717522669/077221212', 'dolightengineering@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '16 Rockwood Road, Hatfield, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(502, 'Difflock Construction', 6, 1, 'CIFOZ', '712063450', 'difflock84@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '513-5th Floor, Throgmorton House, 51 S. Machel Av, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(503, 'Gratric Trading (Pvt)Ltd', 6, 1, 'CIFOZ', '0774366248/077337114', 'gratrictrading@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '563 Tsubvu Road, Ruwa, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(504, 'Greatspeed Investments', 6, 1, 'CIFOZ', '718930435', 'shirlyxia@yahoo.com', '', 'ba1b490968ad0c282bef90886792708e.png', '10 Leopard Close, Borrowdale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(505, 'Glenwonder Enterprises (Pvt) Ltd', 6, 1, 'CIFOZ', '0772929137/071992913', 'glenwonderenterprises@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '1365 Industrial site, Beitbridge', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(506, 'Haronch Enterprises', 6, 1, 'CIFOZ', '0772 659 765/ 0774 2', 'haronchenterprises@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '1859 New Davis Way, Prospect Industrial, Waterfalls, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(507, 'Knosherie', 6, 1, 'CIFOZ', '333396/8', 'sales@knosherie.com', '', 'ba1b490968ad0c282bef90886792708e.png', '29 Lomagundi Road, Avondale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(508, 'Latmak Supply Chain', 6, 1, 'CIFOZ', '0775 383 886', 'kura.sibanda@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '143 Central Estate, Mvuma', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(509, 'Mega Products', 6, 1, 'CIFOZ', '0776957807/077390570', 'eddie@megasol.co.zw', 'https://www.megasol.co.zw', 'ba1b490968ad0c282bef90886792708e.png', 'No 30 Bredon Road, Waterfalls , Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(510, 'Portocargas', 6, 1, 'CIFOZ', '242446974', 'info@portocargas.com', 'https://www.portocargas.com', '437aa971c23c1127e42bb9ed0e24f5a3.png', '45 Western Road, Msasa, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(511, 'Sheasham Construction', 6, 10, 'CIFOZ', '0712361525/071936158', 'sheashamfinance@hotmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', 'CBD, Midlands, Gweru.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(512, 'Skyharvest Land Developers', 6, 1, 'CIFOZ', '242329457', 'infor@skyhavest.co.zw', 'https://www.skyhavest.co.zw', 'ba1b490968ad0c282bef90886792708e.png', 'Office 14 7 Warwick Street, Kadoma.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(513, 'RH Engineering', 6, 1, 'CIFOZ', '0774067156/086771700', 'zimadmin@rhafrica.com', 'https://www.rhafrica.com', '437aa971c23c1127e42bb9ed0e24f5a3.png', '37 Glenara Ave, Eastlea, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(514, 'Suta Suta (Real Stake)', 6, 1, 'CIFOZ', '0712331598/086441403', 'sifiso.moyo79@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '17115 Kelvin North,', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(515, 'Vanderberg Facilities Management', 6, 1, 'CIFOZ', '0242 447 579/80', 'quotations@vanderberg.co.zw', '', '73cc8f89dfb344848900a142438a1cdd.png', 'Unit 2 Harrow Business Park 225 Martin Drv, Msasa, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(516, 'Superpower Construction Pvt Ltd', 6, 1, 'CIFOZ', '0772314671/077257117', 'supperpower21@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '225 Fifth Ave, Chipinge', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(517, 'Usate Trading (Pvt) Ltd', 6, 1, 'CIFOZ', '0773213581/071273924', 'tmunyeng@yahoo.com', '', '2a96beb130afafe245664cb0ac7b470e.jpg', '44s Haka Street Windsor Park, Ruwa, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(518, 'Wan Agencies', 6, 1, 'CIFOZ', '0242 223993', 'wanagencies@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', 'Office Y133 Zimbabwe National Sports Stadium, Bay 9, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(519, 'Expaline Investments', 6, 1, 'CIFOZ', '08644041262/08682209', 'roy@expalineinvestment.com', 'https://www.expalineinvestment.com', '4c1ee5fa2112a77c0f196f198b89642d.jpg', 'Showground, Samora Machel, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(520, 'Gerald Engineering', 6, 1, 'CIFOZ', '774872333', 'gerrypeterson@geraldengineering.com', 'https://www.geraldengineering.com', 'd819a94f1141680af9de42d61dc64529.jpg', '1857 New Bluffhill, Westgate, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(521, 'Michmat Concrete', 6, 1, 'CIFOZ', '0772 706 775', 'michmatconcrete@gmail.com', '', 'be53b5a7c144d30486f72a83399190fd.jpg', '8th Floor Kopje Plaza Building, J.Moyo &amp; R. Row, Harare', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(522, 'Ablexon Investments', 6, 7, 'CIFOZ', '0786863568/077503653', 'wekanye@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '11 Protea Drive Rhodenie, Masvingo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(523, 'Petrichor Irrigation (Pvt) Ltd', 6, 1, 'CIFOZ', '772220835', 'daniel@petrichor.co.zw', 'https://www.petrichor.co.zw', '479455d064ebc175bc027e226bc61cfd.jpg', '432 Mupfuti Road, Ruwa', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(524, 'Skies Marketing', 6, 1, 'CIFOZ', '772327847', 'nyashaz76@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '667 Seke Road, Hatfield, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(525, 'Fine Contender Investments (Private) Ltd', 6, 1, 'CIFOZ', '0772 935 390 / 0772 ', 'engmarvinm@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '5748 Chibondo Township. Hwange.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(526, 'Fly Pizza Investments', 6, 2, 'CIFOZ', '715348923', 'churucheminzwa1@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', 'No 2 Eldon Court 12&amp;13th Avenue, Parirenyatwa, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(527, '50A Leander Avenue', 6, 2, 'CIFOZ', '(09)243837/243692', 'homesaver@homeseekerinc.co.zw', 'http://homeseekerinc.co.zw', '', 'Hillside, Bulawayo', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(528, 'Instant Tar Zimbabwe', 6, 1, 'CIFOZ', '779703055', 'martin@instantarzim.co.zw', 'https://www.instantarzim.co.zw', '9eda456ca9eda6f6f12d64b6142dd969.jpg', '110 Dagenham Road, Willowvale, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(529, 'Matdom Investments', 6, 1, 'CIFOZ', '0772926825/077267473', 'matconstruction10@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '605 Adlyn, westgate, harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(530, 'Mundline Tanganyika p/l', 6, 1, 'CIFOZ', '0772654743/086442999', 'tanganyikazw2020@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '4 Alex Smith Drv, Eastlea, harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(531, 'Traversal Trading', 6, 1, 'CIFOZ', '8677195891', 'sales.traversal@gmail.com', '', '1865e7a114601a2f3043ec1954ea8653.jpg', '41 Lincoln Road, Belgravia, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(532, 'Bandla Phaphamani', 6, 2, 'CIFOZ', '292880074', 'bpqconstruction@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '78 Sharon Havern Mall, 14th &amp; 15th J Moyo, Bulawayo.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(533, 'Brobondo', 6, 1, 'CIFOZ', '752 781-3', '', '', '4d183500766abbe59c61b4e4d93df1fa.jpg', '117-119 Rotten Row Road, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(534, 'Costlan Real Estate', 6, 1, 'CIFOZ', '0772724415/077230867', 'djanyure@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '15 Norwich Avenue, Eastlea, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(535, 'Earthlygate Civil & Precast Contractors', 6, 1, 'CIFOZ', '0772381745/078518205', 'earthlygate@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '10th Floor Livingstone Building, 48 Samora Machel av, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(536, 'Enrage Holdings', 6, 1, 'CIFOZ', '0778090557/077122710', 'admin@enrageholdings.co.zw', 'https://www.enrageholdings.co.zw', 'd1bcfb188c31cfe02dffcdb564d80e16.jpg', '293 Fairway Drive, Borrowdale brook, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(537, 'Highway Asphalt', 6, 1, 'CIFOZ', '783066357', 'highwayasphalt.ha@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '5 Bodle Avenue Eastlea, Eastlea, Harare.', 1, '2026-05-29 06:37:36', '2026-05-29 06:37:36'),
(538, 'Liron Civils and Projects', 6, 2, 'CIFOZ', '0777012175/071630175', 'lironcivils@gmail.com', '', '0b3d0786d4fc0a4c3c2559075cf915dd.jpg', 'Suite Number 211 Africa House Cnr Fife Street and 10th Ave, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(539, 'Ngomla Investments', 6, 1, 'CIFOZ', '0773527759/077390006', 'ngomlapvtltd@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '976 Light Industrial, Chiredzi.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(540, 'Sales Pack Enterprises', 6, 2, 'CIFOZ', '0772238442/077358603', 'geotechtesting4@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '15th Avenue/T Chinamano, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(541, 'Samaita Chumi (Pvt)Ltd', 6, 1, 'CIFOZ', '262098397', 'samaitachumi800@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '491 Government, Nyanga.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(542, 'Swayed Investments', 6, 2, 'CIFOZ', '772599119', 'swayedinvestments@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '5 Belleville Road, Belmont, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(543, 'Tyger Construction(TygerGrove Inv)', 6, 1, 'CIFOZ', '772966255', 'tigyer@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '713 Msasa Road, Chiredzi.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(544, 'Munatech Electrical Engineering', 6, 1, 'CIFOZ', '883257/884338', 'admin@munatech.co.zw', 'https://www.munatech.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '16 FOWEY RD VAINONA, Borrowdale, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(545, 'Top Spin International', 6, 1, 'CIFOZ', '0777994/0772420492/0', 'projects@topspin.co.zw', 'https://www.topspin.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '14 Van Prangh Milton Park, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(546, 'GST Engineering', 6, 1, 'CIFOZ', '775004846', 'gtsorai@gst.co.zw', 'https://www.gst.co.zw', 'ba1b490968ad0c282bef90886792708e.png', 'Suite 11 Security Trust, Sam Munjoma, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(547, 'Kyton Agencies', 6, 2, 'CIFOZ', '772340155', 'kytonag@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '1888 Old Khami Road Gold Star Complex, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(548, 'Samburn Pressings', 6, 1, 'CIFOZ', '665318/35', 'david@samburn.co.zw', 'https://www.samburn.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '1/5/Y Spurn Road, Ardnennie, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(549, 'Latoma Investments', 6, 1, 'CIFOZ', '2912715/2921620', 'latomainvest@hotmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '93 Kevin South, Graniteside, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(550, 'Fine Rain Industries', 6, 1, 'CIFOZ', '0772113064/077250657', 'caycom.tc@gmail.com', '', '', '34 Shepperton, Graniteside, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(551, 'Cypriano Electrical', 6, 2, 'CIFOZ', '(09) 77416/ 638963', 'cypriano@netconnect.co.zw', 'https://www.netconnect.co.zw', '', 'Cnr Hull Road &amp; Coventry Street, Belmont, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(552, 'Pristine Distributors', 6, 1, 'CIFOZ', '776495/0771134778', 'marketing@pristinezim.co.zw', 'https://www.pristinezim.co.zw', '', '290 Samora Machel Ave, Eastlea, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(553, 'Gids-Martz Industrial Supplies', 6, 2, 'CIFOZ', '0772377303/881510/77', 'sales@gidsmartz.com', '', '', '120 Zexcom Building J Moyo Street, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(554, 'Kristle Empire (Pvt) Ltd', 6, 2, 'CIFOZ', '779618973', 'adam.griffin.zim@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '13 Clare Road, Hillside, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(555, 'Pikay Electrical', 6, 1, 'CIFOZ', '772310502', 'pikayengineering@gmail.com', '', '', '4 Standford Cresent, Eastlea, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(556, 'Airlift Engineering (Pvt) Ltd', 6, 1, 'CIFOZ', '8823/4/666630', 'airlift@mweb.co.zw', 'https://www.mweb.co.zw', '', 'UNIT6A 1573 Patounn Close, New Ardbennie, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(557, 'Carrier Air Conditioning', 6, 1, 'CIFOZ', '0242 741913/77/85', 'admin@carrierair.co.zw', 'https://www.carrierair.co.zw', 'cbd391d7791e85136180af55a13b3b10.jpg', 'No 2 Bishops Road, Belvedere, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(558, 'Nxusa Holdings Pvt Ltd', 6, 1, 'CIFOZ', '0773 221 339/0778 22', 'nxusaholdingafrica@gmail.com', '', '', '95 Hebert Chitepo, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(559, 'Optional Air (Pvt) Ltd', 6, 1, 'CIFOZ', '(04)762863/253661-2', 'achiparausha@optionalair.com', '', 'ba1b490968ad0c282bef90886792708e.png', '22 Simon Mazorodze, Southerton, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(560, 'Pown Engineering (Pvt) Ltd', 6, 1, 'CIFOZ', '761336', 'powneng@zol.co.zw', 'https://www.zol.co.zw', '', '3rd Floor, St Barbors Hse, Suite 313/305, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(561, 'Refrigeration & Air Conditioning (Ref Air)', 6, 2, 'CIFOZ', '09-61350/61349', 'refair@mweb.co.zw', 'https://www.mweb.co.zw', '', '34 Bristol Rd South, Belmont, Bulawayo,.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(562, 'Thermacool (Pvt) Ltd', 6, 1, 'CIFOZ', '663311/660516', 'jehu.rubaba@thermacool.co.zw', 'https://www.thermacool.co.zw', '', 'P O Box MP 335, Mt Pleasant, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(563, 'Webcal Air (Pvt)Ltd', 6, 1, 'CIFOZ', '(0242)446402/356/367', 'webcalair@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '22 Anthony Avenue, Msasa, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(564, 'Hardmonds Engineering', 6, 1, 'CIFOZ', '660316', 'sales@hardmonds.co.zw', 'https://www.hardmonds.co.zw', '437aa971c23c1127e42bb9ed0e24f5a3.png', '38 Warren Industrial Cl, New Ardbennie, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(565, 'Torben Enterprises', 6, 2, 'CIFOZ', '29274628', 'icebergcools@gmail.com', '', '437aa971c23c1127e42bb9ed0e24f5a3.png', '5 Bellevile Road, Belmont, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(566, 'Bill\'s Aircon & Electrical Services', 6, 1, 'CIFOZ', '300628', 'sanya@africaonline.co.zw', '', 'ba1b490968ad0c282bef90886792708e.png', '1955 James Esomonu Rd, New Marlborough, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(567, 'Smarthouse (Pvt) Ltd', 6, 2, 'CIFOZ', '774489843', 'tncube@smarthouse.co.zw', 'https://www.smarthouse.co.zw', 'ba1b490968ad0c282bef90886792708e.png', '139 Jason Moyo Street, Bulawayo,', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(568, 'Alumin Structures', 6, 1, 'CIFOZ', '447194/5', 'info@aluminstructures.co.zw', 'https://www.aluminstructures.co.zw', 'e3e184ce926bd3e52232ad0c7e940afd.jpg', '1 Harrow Road, Msasa, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(569, 'Postcorp Investments', 6, 1, 'CIFOZ', '777939', 'postcorpglass@gmail.com', '', 'efe977b4fa4780667409f16335d5b621.jpg', '53 Camerron Street, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(570, 'Zimtile (Pvt) Ltd', 6, 1, 'CIFOZ', '663511-5', 'sakhilekh@zimtile.co.zw', 'https://www.zimtile.co.zw', '7b2ce32465d700f995a3189ae89b7178.png', 'Cnr Glen Eagles&amp; Jmes Martin Road, Lochnvar, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(571, 'JTL Equipment (Pvt) Ltd', 6, 1, 'CIFOZ', '0772204967/077269584', 'trevor@jtlequip.com', '', 'd51416407eabb2c41df61af503ffa5aa.png', '184B Mutare road, Msasa, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(572, 'Azzar Steel (Ratoang Investments p/l)', 6, 1, 'CIFOZ', '772745311', 'info@azzar.co.zw', 'https://www.azzar.co.zw', '768ab7a4c8a29c903be45994a643618e.png', '23B Edison Crescent, Graniteside, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(573, 'Genzell Mining Pvt Ltd', 6, 10, 'CIFOZ', '0772653092/077531510', 'vincezvirevo@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '18 Eden Street, Gweru East, Gweru.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(574, 'Kingpin Contractors', 6, 1, 'CIFOZ', '(067)29648/29127/289', 'kingpincontractors@zol.co.zw', 'https://www.zol.co.zw', '22229bc980b8099d84c3d77bb83d2253.png', 'P/Bag 7511 Veredale Estate, Chirundu Rd, Chinhoyi.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(575, 'Betterfoc Investments', 6, 1, 'CIFOZ', '773261887', 'sales.betterfocinv@gmail.com', '', '', 'Suite 2 Malvern, Cnr 2nd / Selous Ave, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(576, 'National fencing (Pvt) Ltd', 6, 2, 'CIFOZ', '0292 474118-9', 'salesbyo@cih.co.zw', '', 'ca7559bd13ef990351f9010282dfe378.jpg', '3 Wolverhampton Rd, Doonnington, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(577, 'Konak Enterprises t/a Konak Walling', 6, 1, 'CIFOZ', '+263 715 828 870', 'sales@konak.co.zw', 'https://www.konak.co.zw/', '9896677653458dbf082d4cb4ee8a2e0e.png', '35 Shepperton Road, Graniteside, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(578, 'Fence Africa (Pvt) Ltd', 6, 2, 'CIFOZ', '09-60352/61476', 'fenceafrica@mweb.co.zw', 'https://www.mweb.co.zw', '3c795d5339407be752e2a8c435cbff12.png', 'P O Box 8625, Belmont , Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(579, 'McDonald Fire & Electrical Services', 6, 1, 'CIFOZ', '2907210-3/668216/669', 'macro@mcdgroup.co.zw', '', 'ac8e6d72d243140eab2fed22fdd46d8c.png', '933 Formby/Waterfalls Av, Ardbennie, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(580, 'Exceptional Office Fitouts & Shopfitters', 6, 1, 'CIFOZ', '485131', '', '', 'ba1b490968ad0c282bef90886792708e.png', '123 Paj Building Borgward Road, Msasa, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(581, 'Decorama', 6, 1, 'CIFOZ', '662009/661976', '', '', '82f951ed2b3bbf0c0eaaa144b8136024.png', '21 Pat Dunn Close, New Ardbennie, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(582, 'Innovative Marketing Zimbabwe', 6, 1, 'CIFOZ', '8611280853', 'sales@innovativemarketingcompany.co.zw', 'https://www.innovativemarketingcompany.co.zw', '7cba0326f771afc21745a9f39da1eaeb.png', '9 Bodle Avenue, Eastlea, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(583, 'Emmanuel&Son Solutions(Pvt)Ltd', 6, 1, 'CIFOZ', '242788165', 'sales@eands.co.zw', 'https://www.eands.co.zw', '45ec14fac17176151b214884bd70e026.png', 'Bay 4,3 Borgward Road, Msasa, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(584, 'Dans Designs Shopfitters', 6, 1, 'CIFOZ', '710137/710124', 'sales@dansdesigns.co.zw', 'https://www.dansdesigns.co.zw', '01cfe0b12675527d1a324dc911c2a5ab.png', '13 Nuffield Road, Workington, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(585, 'Scotia shopfitters', 6, 1, 'CIFOZ', '754258/755350-9', 'sale@fsage.co.zw', 'https://www.fsage.co.zw', '8e589b248d19e581a7776f3045060268.png', '17 Douglas Road, Workington, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(586, 'Alu-men Shopfitters (Pvt) Ltd', 6, 1, 'CIFOZ', '770223/770855', 'info@alumenshopfitters.co.zw', 'https://www.alumenshopfitters.co.zw', 'f451a84ab0a04a0abfe6ee176f1880d6.png', '4 Douglas Road, Workington, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(587, 'NN Joinery', 6, 2, 'CIFOZ', '292475226', 'nnjoinery@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '8 Iron Bridge, Belmont, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(588, 'Skilz Shopfitters', 6, 1, 'CIFOZ', '761364', 'sales@skilzshopfitters.com', '', '6f7b7b6c417a18648b80a43b3313629a.png', '9 Lisburn, Workington, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(589, 'Paint & Allied Services (Pvt) Ltd', 6, 2, 'CIFOZ', '09-69800/76436', 'pallied@yoafrica.com', '', '0c76c71c6ceeee61813a80e4e5971742.png', '106 R Mugabe Way, Bulawayo,', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(590, 'BK Painters and Decorators', 6, 1, 'CIFOZ', '334994/302721-2', 'info@bkpainters.co.zw', 'https://www.bkpainters.co.zw', '8a7e5ee4286b7bd74097c8200eebce49.png', '2 Dorset, East, Mt Pleasant, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(591, 'Sahel Weatherproofing', 6, 1, 'CIFOZ', '242788311', 'sahelenquiry@gmail.com', '', 'de7b1675ee712e24ef0a89ad92ef7320.png', '132 Golden stairs, Mt Pleasant, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(592, 'Wisepon Capital Investments', 6, 1, 'CIFOZ', '8644261121', 'wiseponcapital@gmail.com', '', '5e32eba759307e8bd8badf196af13dfd.png', '42 Amby Drive, Msasa, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(593, 'Floorite (Pvt) Ltd', 6, 2, 'CIFOZ', '029) 2276654 (029) 2', 'manager@ews.co.zw', 'https://www.ews.co.zw', '8849d410115259491208b335db306fc4.png', '38 Samuel Parirenyatwa Street Bulawayo', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(594, 'Queling Enterprises(Pvt)Ltd', 6, 1, 'CIFOZ', '04-862955', 'skt.jiri@gmail.com', '', 'f4e34a3013a76dfefb44973adccc2084.png', 'Queling Enterprises(Pvt)Ltd, Helensvale, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(595, 'Water-Tight Engineering', 6, 2, 'CIFOZ', '(0292)264225', 'watertightengineering@gmail.com', '', 'd6e2c78e3421714b6246bfd7d723d270.png', 'CC01 Hartebeeste Road Zimoco, Pavilion  ZITF, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(596, 'Tefeltor Enterprises', 6, 2, 'CIFOZ', '9460935', 'tefeltorent@gmail.com', '', 'ba1b490968ad0c282bef90886792708e.png', '12 Wolverhampton Road, Belmont, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(597, 'Arrows Services (Pvt) Ltd', 6, 2, 'CIFOZ', '09-64351/885867', 'arrows@yoafrica.com', '', '41b408872d3a16e6dfd32e9bc4f4fb67.png', '19 Steelworks Rd West, Steeldale, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(598, 'Hogarths Limited', 6, 2, 'CIFOZ', '(09) 67881-3', 'grahambryce66@gmail.com', '', '0ef36ab4f92237e1997d68ab77a14cae.png', 'P.O. Box 434, Bulawayo,', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(599, 'Longden steel', 6, 1, 'CIFOZ', '0713476631/077580794', 'newbusiness2@gmail.com', '', '15ed0d581b4bf00c9748484940455118.png', '490 Goodwin Road, Willowvale, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(600, 'RSC Steelforce (Pvt) Ltd', 6, 2, 'CIFOZ', '09-474675-7', 'chrystl@steelforce.co.zw', 'https://www.steelforce.co.zw', '', '9 Bilston Rd Donnington, Belmont, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(601, 'Grapenote Steel', 6, 1, 'CIFOZ', '664703', 'sales@grapenotesteel.co.zw', '', '288ca3f94f6f465613025261326eb4ec.png', '390 Willowvale, Southerton, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(602, 'Fabricon Engineering', 6, 1, 'CIFOZ', '773534483', 'fabriconengineering2@gmail.com', '', '20e132a0ae4806f732cd64998a6c32ad.png', '38 Eastcourt Road, Belvedere, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(603, 'Frabdel Engineering', 6, 1, 'CIFOZ', '753553/753494', 'frank@frabdel.co.zw', 'https://www.frabdel.co.zw', 'f2b9fb6fbed63189b86d3362b55ce2fb.png', '93 Kelvin South, Granite, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(604, 'AP Glendinning  (Pvt) Ltd', 6, 2, 'CIFOZ', '09-69076-7', 'apgcon@yoafrica.com', '', 'cfd52ccfdff9c5095d90057b1403b024.png', 'P O Box 9023, Hillside, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(605, 'Jekesa Unlimited', 6, 1, 'CIFOZ', '242485118', 'lcharuma@jekesa.net', '', '5a782226bc2c90525feb7f46fad35236.png', '1 Harrow Road Msasa, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(606, 'Pelgin Consulting Services', 6, 1, 'CIFOZ', '486773/4', 'garym@pelgin.co.zw', 'https://www.pelgin.co.zw', '1719c76e4dfbaba9d9277ee72b9bf3ec.jpg', '7 Loreley Close, Msasa, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(607, 'Penanel Trading (Pvt) Ltd', 6, 1, 'CIFOZ', '0242788559/60', 'bdm@penanel.net', '', 'e18b2a881a251a84bc7351b97c92c837.png', '22 Edison Crescent, Graniteside, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(608, 'Powerfix Electrical', 6, 1, 'CIFOZ', '772890338', 'powerfix@iwayafrica.co.zw', 'https://www.iwayafrica.co.zw', 'd2e8e2481228b74198b4f74b2e897c9e.png', '2 Skipper Hoste Drive, Kopje, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(609, 'PPC Zimbabwe Limited', 6, 2, 'CIFOZ', '792241/72270', 'rsteyn@ppc.co.zw', 'http://ppc.co.zw', 'bb898b9cae83789635e55b0b2319a578.png', 'Portland House, Cnr 13th Ave/ Main street, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(610, 'SINO Truk Zimbabwe', 6, 1, 'CIFOZ', '480 885', 'info@sinotrukzimbabwe.co.zw', 'https://www.sinotrukzimbabwe.co.zw', 'd9349714a6ced349e0d539a3df362900.png', '118 Mutare Road, Msasa, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(611, 'Steel Brands', 6, 1, 'CIFOZ', '621804/621683-4', 'sales@steelbrands.com', '', 'd07504432b49dbadd543b0c26af125d9.png', '1826 Spurn Road, Ardbennie, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(612, 'STF Capital', 6, 1, 'CIFOZ', '0772 684 001 / 0772 ', 'inquiries@stfcapital.co.zw', 'https://www.stfcapital.co.zw', 'a36f50aecbb1be2673100f6226939dff.png', 'Smatsantsa Business Complex, Block B, Borrowdale, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(613, 'Tesa Fencing', 6, 2, 'CIFOZ', '(09)72703/70388', 'tesaadmin@tesazim.co.zw', 'http://www.tesazim.co.zw', '991c5b6a8dd93ff60eb109630f114db2.png', '3 Cardith Street, Belmont, Bulawayo.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(614, 'Treger Products (Pvt) Ltd', 6, 1, 'CIFOZ', '242620861', 'jtembo@tregprod.co.zw', 'https://www.tregprod.co.zw', 'f75cd87cf571d5db2e1fc4390c10b1f3.png', 'Birmingham Road, Southerton, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(615, 'Union Hardware', 6, 1, 'CIFOZ', '0772 663 352 / 0773 ', 'raymore.chauruka@union.co.zw', 'https://www.union.co.zw', '048f82d8881898128e6f150fcc6dc6ca.png', '8 Burnley Road, Workington, Harare.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(616, 'Calundike Exports', 6, 1, 'CIFOZ', '0242) 132909/ 132982', 'sales@calundike.co.zw', 'https://www.calundike.co.zw', '42a0400182793676ec9d58b0291cb215.png', '171 Mupfuti Road, Ruwa,  Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(617, 'Zawara Infrastructure (Pvt) Ltd', 6, 1, 'CIFOZ', '0718776777 / 0772956', 'mchidhakwa8@gmail.com', 'https://www,zawara.co.zw', '', '7793 Belvedere West Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(618, 'Makomo Engineering Pvt Ltd', 6, 1, 'CIFOZ', '2634852030', 'cnezim@gmail.com', '', '79ab4b543b1251080fe47f840621a4e6.png', 'No 19 Breach Borrowdale Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(619, 'Nengo Builders (Pvt)Ltd', 6, 1, 'CIFOZ', '447977', 'nengobuilders@gmail.com', '', 'e3e3f6f44f98ba530e5db50e400acce8.png', '32 Cecil Avenue Greendale Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(620, 'Acetech Contractors', 6, 1, 'CIFOZ', '+263 712 345 803', 'projects@acetechholdings.com', 'https://www.acetechholdings.com', '1fcfa8003122e8e11ce5b57143dec4da.jpg', '13 A  Simon Mazorodze Rd, Waterfalls, Harare, Zimbabwe.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(621, 'Gold Beck Construction', 6, 1, 'CIFOZ', '777749049', 'goldbeckconstruction21@gmail.com', '', '', '12910 Kirkman Road Madokero Estates Tynwald Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(622, 'Frogmerge Construction', 6, 1, 'CIFOZ', '8644089894', 'frogmergeconstruction@gmail.com', '', 'a5fe638b575a8d62122158371186affa.png', '15 Frankjohnson Avenue Eastlea Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(623, 'Airflow Environment Solutions', 6, 10, 'CIFOZ', '26354222554', 'info@aes.co.zw', 'http://www.aes.co.zw', '', '45 Limestone Road Gweru', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(624, 'Catchy Construction', 6, 1, 'CIFOZ', '242883165', 'info@ilangagroupe.com', 'http://www.ilangagroupe.com', '', '13 Dawnhill Road Greendale Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(625, 'Famous Warrior Investments', 6, 2, 'CIFOZ', '292270795', 'sales@fw.co.zw', 'http://www.fw.co.zw', '', '5B Darlington Road Belmont Bulawayo', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(626, 'Finespear Pvt Ltd', 6, 1, 'CIFOZ', '772583891', 'mapfumoja@gmail.com', '', '6ffed22005572f5355f13826cffe28d6.jpg', '6928 Stoneridge Waterfalls Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(627, 'Nabless Construction Pvt Ltd', 6, 1, 'CIFOZ', '772605154', 'nabless2008@gmail.com', '', '', '38 Sommerset Road Eastlea Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(628, 'Zahava Global Investments', 6, 1, 'CIFOZ', '', '', '', '', '13 Devon Road Avondale West Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(629, 'Commerce Veritas', 6, 1, 'CIFOZ', '242621441', 'info@commerceveritas.co.zw', 'http://www.commerceveritas.co.zw', '', '6 Lanark Road Belgravia Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(630, 'Intergrated Construction Projects (Pvt) Ltd(Melrose)', 6, 1, 'CIFOZ', '335014', 'info@icp.co.zw', 'http://www.icp.co.zw', '', '1 Quorn Ave Mt Pleasant Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(631, 'M T Chidzanira Investments (Earthteck)', 6, 1, 'CIFOZ', '784893133', 'earthteckzim@gmail.com', '', '', '2018 Katsande Way New Malborough Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(632, 'Zambezi Bulk Plant Hire Pvt Ltd', 6, 10, 'CIFOZ', '054-222299', 'info@zambezibulk.com', 'http://www.zambezibulk.com', '574862a70940aa614b1c892e4e9bc583.png', '286/61 Umsungwe Road Ridgemont Gweru', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(633, 'Jepnik Investments', 6, 1, 'CIFOZ', '487577', 'accounts@jepnikinv.co.zw', 'http://www.jepnikinv.co.zw', '0e3950e0dc8de595b83e744d65ea15bb.png', '1086 WesternClose Greendale Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(634, 'Megamania Glow Pvt Ltd', 6, 1, 'CIFOZ', '776683338', 'megamaniaglow@gmail.com', '', '', '1350 Diamond Ave Crowhill Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(635, 'TCI International (Pvt) Ltd', 6, 2, 'CIFOZ', '292884705', 'tci.international2011@gmail.com', '', '657f798be9a6a68f83aff91c1000af2a.png', 'Suite 8 Winchester House 52A Five Street Bulawayo', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(636, 'Brooklyn Bright Jobbing Services', 6, 1, 'CIFOZ', '772947287', 'brooklynbrightjobs@gmail.com', '', '', '66B Airport Road Hatfield Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(637, 'M&L Earthmovers/Chalkmount Enter', 6, 1, 'CIFOZ', '772456553', 'chalkmount@yahoo.com', '', '', '2 Poort Road Norton', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(638, 'Redan Bulk', 6, 1, 'CIFOZ', '8677001200', 'john.keogh@redanbulk.com', 'http://www.redanbulk.com', '286e63abe09d2ff9aa116059cda1e917.png', '54 Martin Road Msasa Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(639, 'Tazvi Plant & Equip', 6, 1, 'CIFOZ', '774827001', 'admin@tazviplant.co.zw', 'http://www.tazviplant.co.zw', '85edde922bba4816fd26b67b214ec17a.png', '2577 Heathering Road Shawasha Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(640, 'Brenport Holdings Pvt Ltd', 6, 1, 'CIFOZ', '733009326', 'info@enerstgabriel.co.zw', 'http://www.enerstgabriel.co.zw', '', 'Bay 11A Dias & Issafil Complex Hatfield Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(641, 'Kunze Enterprises/Zero Supplies', 6, 2, 'CIFOZ', '292274959', 'kunzeenterprises@yahoo.com', '', '', '63A Josiah Tongogara Bulawayo', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(642, 'Stealth Construction', 6, 1, 'CIFOZ', '771445855', 'stealthconstructionzim@gmail.com', '', 'f00c69bfc080dc644b0765ded19cc868.png', '433 Glaudina Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(643, 'Terra Seven Construction', 6, 10, 'CIFOZ', '774312540', 'terraseven2022@gmail.com', '', 'f5eb1a7ddf3e9fe49843208409dfd38d.png', '4 Seventh Street PO Box 620 Gweru', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(644, 'Saltaway Enterprises', 6, 2, 'CIFOZ', '773417643', 'sidmorematikiti@gmail.com', '', '', '10 Nugget Road Westondale Bulawayo', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(645, 'Pangako Engineering', 6, 1, 'CIFOZ', '778643379', 'sinekembambo@gmail.com', '', '', '42 McChlery Avenue Eastlea Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(646, 'Square Twenty Two Maintenance', 6, 1, 'CIFOZ', '773091331', 'simon@sttzimbabwe.com', 'http://www.sttzimbabwe.com', 'e2f62d8b19a2d9c87153b0218bfcfe8c.png', 'Plot 2 Greenhills Tynwald Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(647, 'Techold Engineering', 6, 1, 'CIFOZ', '242335369', 'admin@techoldengineering.com', 'http://www.techoldengineering.com', '688da42c5ff3610e8eafc8b29fa1349b.png', '38 Cambridge Rd Avondale Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(648, 'Inel Investments', 6, 1, 'CIFOZ', '242446692', 'admin@inel.co.zw', 'http://www.inel.co.zw', '98326c8bc1824faae4f9377cd3b16b61.png', '34 George Ave Msasa Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(649, 'Twinsets Enterprises Pvt Ltd(PMB Walling)', 6, 1, 'CIFOZ', '772321746', 'info@pmb.co.zw', 'http://www.pmb.co.zw', 'ff0a2e1a3f9ca03558e1ca81546d9ccb.png', '110A New Prospect Road Waterfalls Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(650, 'Aluminium Concepts', 6, 1, 'CIFOZ', '242443377', 'info@aluminiumconcepts.co.zw', 'http://www.aluminiumconcepts.co.zw', '705f3d726a5f76efa6bcaf66cdd200bc.png', '185 Acturus Road Kamfinsa Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(651, 'Skimac Investments', 6, 1, 'CIFOZ', '242570516', 'info@skimac.co.zw', 'http://www.skimac.co.zw', '2466ee478cbe6a25266fb652980240e3.png', '20 George Road Hatfield Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(652, 'Honey Berry Investments', 6, 1, 'CIFOZ', '242704701', 'sales@honeyberry.co.zw', 'http://www.honeyberry.co.zw', '', '1 Kamil Court Cnr 8th Street/H.Chitepo Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(653, 'Abflora Investments', 6, 2, 'CIFOZ', '784083996', 'abflorainvestments@gmail.com', '', 'c444dcee3a1e3c067edabfb30eb3914e.png', '11509 Cowdry Park Bulawayo', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(654, 'Forster Irrigation', 6, 2, 'CIFOZ', '292277704-5', 'trevor@forsterirrigation.com', 'http://www.forsterirrigation.com', '4bcd8004fba612e05886da89eb5f214a.png', '23 Josiah Chinamano Belmont Bulawayo', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(655, 'Proplastics Limited', 6, 1, 'CIFOZ', '242660535', 'sales@proplastics.co.zw', 'http://www.proplastics.co.zw', '724dab0eb15e603f98398912931d36ee.png', '5 Spurn Road New Ardbennie Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(656, 'Conduit Investments Pvt', 6, 1, 'CIFOZ', '(04)704365', 'conduit@conduit.co.zw', 'http://www.conduit.co.zw', '23b0e2eeda373fe449b7c982243e86e0.png', 'Ltd 44 Samora Machel Avenue Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(657, 'Tzircalle Brothers', 6, 2, 'CIFOZ', '09-61188', 'tzircall@netconnect.co.zw', '', '', '9 Swansea Street Belmont Bulawayo', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(658, 'Nash Paints', 6, 1, 'CIFOZ', '0242 779300/ 0242 77', 'sales@nashpaints.co.zw', 'https://www.nashpaints.co.zw/', '39c6dca89c547a5887869188a9e9f213.png', '41 Kelvin Road North Graniteside Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(659, 'Aqua Fire and Safety', 6, 1, 'CIFOZ', '0242 709 155', 'info@aquafireandsafety.com', 'https://www.aquafireandsafety.com', '96d0592789d51070412ed5c5b4233bcc.jpg', '8 Pollett Avenue, Belvedere, Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(660, 'Vast Engineering Services', 6, 2, 'CIFOZ', '0292 888 845', 'vastengineering@yahoo.com', 'https://www.vastengineering.co.zw', 'a7aaa11ec6bd93b98b18ea6d04ab822d.jpg', '19029 Mpopoma South, Bulawayo', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(661, 'Thru-Bridge Entreprises', 6, 10, 'CIFOZ', '0542 3667', '', '', '', '300 Manchester Road, Kwekwe', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(662, 'Turnall Holdings Limited', 6, 1, 'CIFOZ', '2.63868E+12', 'customercare@turnall.co.zw', 'https://turnall.co.zw', '610177252b59ea540213b65d655fb57a.jpg', '5 Glasgow Road, Workington, Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(663, 'Allied Timbers', 6, 1, 'CIFOZ', '(+263) 242 446 140-4', 'sales@alliedtimbers.co', 'https://alliedtimbers.co.zw/', '4e83655ee07c306ab7380a7cce58f835.png', '125a Borgward Road, Msasa Harare, Zimbabwe.', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(664, 'Abanqobi Investments', 6, 1, 'CIFOZ', '+27 61 288 7105', '', '', '', '', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(665, 'Abe-tech Elecetrical', 6, 1, 'CIFOZ', '077 658 2131', '', 'https://abetech.co.zw', '', '', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(666, 'Adcro Civil And Mechanical Engineering Contractors', 6, 1, 'CIFOZ', '+263 77 976 1814', '', '', '', '', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(667, 'Africa At Large', 6, 2, 'CIFOZ', '077 500 4201', '', '', '', '18 Plumtree Rd, Bulawayo', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(668, 'Africa Steel(Pvt)Ltd', 6, 1, 'CIFOZ', '(024) 2611229', 'saleshq@africasteel.co.zw', 'http://africasteel.co.zw/', '', '6 Tilbury Rd, Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(669, 'African Horizon Construction', 6, 1, 'CIFOZ', '', '', '', '', '127 Enterprise Road, Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(670, 'AfriSteel Construction and Mining Supplies', 6, 1, 'CIFOZ', '071 570 3489', 'afristeelconstruction@gmail.com', '', '', '561 Cleveland Industrial, Msasa, Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(671, 'BLACKWOOD HODGE (ZIMBABWE) (PVT) LTD', 6, 1, 'CIFOZ', '466771614', '', '', '', '94, Simon Mazorodze Road, Corner Beatrice And Hobbs Road  Craster Rd, Harar', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(672, 'Broline Transport (Pvt)Ltd', 6, 1, 'CIFOZ', '024) 2446299', '', '', '', '184B Mutare Rd, Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(673, 'Safeguard Security Pvt Ltd', 6, 1, 'CIFOZ', '0242 751 395-9, 0864', 'info@safeguard.co.zw', 'https://www.safeguard.co.zw', '6c0abd4d4568b7da4b028ccbab7a9be0.jpg', '36  Telford Road , Graniteside, Harare, Zimbabwe', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(674, 'Coastal Construction', 6, 1, 'CIFOZ', '+263 78 308 3326', 'richard@coastalconstruction.co.zw', '', '90b948ce245ca00ee5983498f6470190.jpg', '261 WHITES WAY, MSASA, HARARE', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37'),
(675, 'Tension Corner Building Construction (Pvt) Ltd', 6, 1, 'CIFOZ', '778319767', 'tensionconer@gmail.com', 'http://www.tensioncorner.co.zw/about.html', '4b031c2ff663cddd9791b3582c2e35c5.png', 'Office 169 Longcheng Plaza Belvedere Harare', 1, '2026-05-29 06:37:37', '2026-05-29 06:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiries`
--

CREATE TABLE `contact_enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `recaptcha_score` decimal(3,2) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_enquiries`
--

INSERT INTO `contact_enquiries` (`id`, `name`, `email`, `phone`, `subject`, `message`, `recaptcha_score`, `is_read`, `created_at`) VALUES
(1, 'Test User', 'test@example.com', '+263771234567', 'API Test', 'This is a test message from the API test panel.', 0.90, 0, '2026-05-06 09:30:28'),
(2, 'Test User', 'test@example.com', '+263771234567', 'API Test', 'This is a test message from the API test panel.', 0.90, 0, '2026-05-06 09:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `organizer` varchar(20) NOT NULL,
  `event_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `organizer`, `event_date`, `end_date`, `location`, `description`, `poster`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'CZI Annual Business Conference 2026', 'CZI', '2026-06-15', '2026-06-17', 'Harare International Conference Centre', 'Annual gathering of Zimbabwe\'s business leaders discussing industrial growth and economic development', NULL, 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(2, 'CIFOZ Construction Expo 2026', 'CIFOZ', '2026-06-20', '2026-06-22', 'ZITF Bulawayo', 'Exhibition showcasing the latest in construction technology, materials, and services', NULL, 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(3, 'CZI Manufacturing Workshop', 'CZI', '2026-07-01', NULL, 'Meikles Hotel, Harare', 'One-day workshop on modern manufacturing techniques and industry 4.0', NULL, 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(4, 'Mining Indaba Zimbabwe', 'CZI', '2026-07-15', '2026-07-16', 'Victoria Falls', 'Mining industry conference focusing on investment opportunities and sustainable practices', NULL, 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(5, 'CIFOZ Safety Training', 'CIFOZ', '2026-07-20', NULL, 'Harare Construction College', 'Construction safety standards and compliance training for CIFOZ members', 'uploads/gallerys/gallery_6a01ed8aab638_1778511242.png', 1, '2026-05-06 09:35:15', '2026-05-11 14:54:16'),
(6, 'CZI Awards Gala 2026', 'CZI', '2026-08-10', NULL, 'Harare International Conference Centre', 'Annual CZI awards recognizing excellence in Zimbabwean industry', 'uploads/gallerys/gallery_6a01e4f7c9623_1778509047.jpg', 1, '2026-05-06 09:35:15', '2026-05-11 14:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `specs` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `moq` int(11) DEFAULT 1,
  `company` varchar(200) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT 0.0,
  `reviews` int(11) DEFAULT 0,
  `exports_to` varchar(500) DEFAULT NULL,
  `certifications` varchar(500) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exports`
--

INSERT INTO `exports` (`id`, `product_name`, `category`, `description`, `specs`, `price`, `moq`, `company`, `rating`, `reviews`, `exports_to`, `certifications`, `verified`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Premium Virginia Gold Leaf Tobacco', 'Agriculture', 'Premium quality Virginia tobacco for international markets', 'Grade A, Cured, 200kg Bales', 18104.00, 10, 'Zimbabwe Tobacco Exporters', 4.5, 128, 'South Africa,China,UAE', 'iso,gst', 1, NULL, 1, '2026-05-11 13:29:52', '2026-05-11 13:29:52'),
(2, 'Raw Diamonds - Marange Fields', 'Minerals', 'High-quality raw diamonds from Marange diamond fields', 'Industrial Grade, 1-5 carats', 50000.00, 1, 'Zimbabwe Diamond Co.', 4.8, 56, 'South Africa,USA,Canada', 'iso,trustseal', 1, NULL, 1, '2026-05-11 13:29:52', '2026-05-11 13:29:52'),
(3, 'Platinum Group Metals', 'Minerals', 'Extracted platinum, palladium, and rhodium for export', '99.9% Pure, Ingot Form', 35000.00, 5, 'Zimplats Mining', 4.6, 89, 'South Africa,USA,UAE', 'iso,gst,trustseal', 1, NULL, 1, '2026-05-11 13:29:52', '2026-05-11 13:29:52'),
(4, 'Processed Black Tea - Tanganda', 'Agriculture', 'Black tea packaged for export to European and Asian markets', 'Orange Pekoe, 50kg Bags', 2500.00, 20, 'Tanganda Tea Company', 4.3, 215, 'South Africa,Canada,UK', 'iso', 1, NULL, 1, '2026-05-11 13:29:52', '2026-05-11 13:29:52'),
(5, 'Granite Stone Products', 'Minerals', 'Processed black granite slabs for construction industry', 'Black Granite, Polished Slabs', 8200.00, 50, 'Zimbabwe Granite Works', 4.1, 42, 'South Africa,USA,EU', 'iso,gst', 1, 'uploads/gallerys/gallery_6a02ceaf34bbe_1778568879.jpg', 1, '2026-05-11 13:29:52', '2026-05-12 06:54:39'),
(6, 'Ferrochrome Alloys', 'Minerals', 'Processed ferrochrome for steel manufacturing', 'High Carbon, 60% Cr', 15000.00, 100, 'ZimAlloys', 4.7, 73, 'South Africa,China,UAE', 'iso,trustseal', 1, NULL, 1, '2026-05-11 13:29:52', '2026-05-11 13:29:52'),
(7, 'Cotton Lint - Premium Grade', 'Agriculture', 'High-grade cotton for textile industries', 'Long Staple, Ginned', 4200.00, 25, 'Zimbabwe Cotton Company', 4.2, 94, 'South Africa,China', 'gst', 1, 'uploads/gallerys/gallery_6a01dd65277e7_1778507109.jpg', 1, '2026-05-11 13:29:52', '2026-05-11 13:45:09'),
(8, 'Leather Products - Finished', 'Manufacturing', 'Processed leather from Zimbabwean cattle for export', 'Bovine Leather, Various Colors', 6800.00, 15, 'ZimLeather Industries', 4.0, 38, 'South Africa,USA,EU', 'gst', 1, NULL, 1, '2026-05-11 13:29:52', '2026-05-11 13:29:52'),
(9, 'Refined Sugar - White', 'Agriculture', 'Refined sugar from Triangle Sugar Estates', 'ICUMSA 45, 50kg Bags', 3200.00, 100, 'Triangle Sugar Estates', 4.4, 167, 'South Africa,UAE,UK', 'iso,gst,trustseal', 1, NULL, 1, '2026-05-11 13:29:52', '2026-05-11 13:29:52'),
(10, 'Horticultural Products - Roses', 'Agriculture', 'Fresh-cut roses and flowers for European markets', 'Fresh Cut, Premium Grade', 1800.00, 500, 'ZimFlora Exports', 4.1, 52, 'South Africa,EU,UK', 'iso', 1, 'uploads/gallerys/gallery_6a01e0cf005da_1778507983.jpg', 1, '2026-05-11 13:29:52', '2026-05-11 13:59:43'),
(11, 'Fish Bream', 'Agriculture', '', 'Grade B, 500Kg', 10.00, 1, 'Kariba ', 0.0, 0, 'South Africa', 'iso', 1, 'uploads/gallerys/gallery_6a01de060d4c0_1778507270.jpg', 1, '2026-05-11 13:47:04', '2026-05-11 13:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `category`, `file_path`, `caption`, `display_order`, `created_at`) VALUES
(1, 'CZI Conference 2025 Opening', 'events', 'uploads/gallery/czi2025-opening.jpg', 'Official opening of the CZI Annual Conference 2025', 1, '2026-05-06 09:35:15'),
(2, 'Manufacturing Plant Tour', 'industry', 'uploads/gallery/manufacturing-plant.jpg', 'Tour of Treger Manufacturing facility in Bulawayo', 1, '2026-05-06 09:35:15'),
(3, 'Mining Operations - Zimplats', 'industry', 'uploads/gallery/mining-ops.jpg', 'Underground mining operations at Zimplats platinum mine', 2, '2026-05-06 09:35:15'),
(4, 'Victoria Falls Tourist View', 'tourism', 'uploads/gallery/vic-falls.jpg', 'Aerial view of Victoria Falls during peak season', 1, '2026-05-06 09:35:15'),
(5, 'Construction Site Visit', 'industry', 'uploads/gallery/construction.jpg', 'CIFOZ members visiting new construction site in Harare', 3, '2026-05-06 09:35:15'),
(6, 'Networking Event Cocktail', 'events', 'uploads/gallery/networking-cocktail.jpg', 'Evening networking session at CZI Awards Gala', 2, '2026-05-06 09:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `slug`, `name`, `icon`, `description`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'auto', 'Auto', '🚗', 'Automotive industry including vehicle sales, repairs, and parts manufacturing', 1, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(2, 'accommodation', 'Accommodation', '🏨', 'Hotels, lodges, and accommodation services across Zimbabwe', 2, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(3, 'agriculture', 'Agriculture', '🌾', 'Farming, crop production, livestock, and agricultural services', 3, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(4, 'banking-finance', 'Banking & Finance', '🏦', 'Banks, microfinance, insurance, and financial services', 4, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(5, 'biotechnology', 'Biotechnology', '🧬', 'Biotech research, development, and applications', 5, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(6, 'construction', 'Construction', '🏗️', 'Building, civil engineering, and construction services', 6, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(7, 'education', 'Education', '📚', 'Schools, universities, colleges, and educational services', 7, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(8, 'energy-power', 'Energy & Power', '⚡', 'Electricity generation, distribution, and renewable energy', 8, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(9, 'healthcare', 'Healthcare', '🏥', 'Hospitals, clinics, pharmaceutical, and medical services', 9, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(10, 'manufacturing', 'Manufacturing', '🏭', 'Industrial manufacturing and production', 10, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(11, 'mining', 'Mining', '⛏️', 'Mineral extraction, mining operations, and quarrying', 11, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(12, 'technology-ict', 'Technology & ICT', '💻', 'Information technology, software, and telecommunications', 12, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(13, 'tourism-hospitality', 'Tourism & Hospitality', '🎯', 'Tourism operators, travel agencies, and hospitality', 13, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(14, 'transport-logistics', 'Transport & Logistics', '🚛', 'Transportation, logistics, and supply chain services', 14, '2026-05-06 08:51:23', '2026-05-06 08:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `opportunities` text DEFAULT NULL,
  `key_industries` text DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `slug`, `name`, `opportunities`, `key_industries`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'harare', 'Harare', 'Capital city with diverse business opportunities, financial services hub, and growing tech sector', 'Banking & Finance, Technology & ICT, Manufacturing, Construction', 1, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(2, 'bulawayo', 'Bulawayo', 'Industrial hub with strong manufacturing base, cultural tourism, and educational institutions', 'Manufacturing, Education, Tourism & Hospitality, Transport & Logistics', 2, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(3, 'manicaland', 'Manicaland', 'Agricultural heartland with timber, tea, coffee production, and tourism potential', 'Agriculture, Mining, Tourism & Hospitality, Education', 3, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(4, 'mashonaland-central', 'Mashonaland Central', 'Mining region with agricultural potential, tobacco farming, and mineral deposits', 'Mining, Agriculture, Manufacturing, Construction', 4, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(5, 'mashonaland-east', 'Mashonaland East', 'Agricultural production, horticulture, and proximity to Harare markets', 'Agriculture, Manufacturing, Transport & Logistics, Education', 5, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(6, 'mashonaland-west', 'Mashonaland West', 'Tourism attractions, Lake Kariba, mining operations, and commercial farming', 'Tourism & Hospitality, Mining, Agriculture, Energy & Power', 6, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(7, 'masvingo', 'Masvingo', 'Great Zimbabwe heritage site, agriculture, and growing industrial base', 'Tourism & Hospitality, Agriculture, Mining, Construction', 7, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(8, 'matabeleland-north', 'Matabeleland North', 'Victoria Falls tourism, wildlife conservation, coal mining, and timber', 'Tourism & Hospitality, Mining, Agriculture, Construction', 8, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(9, 'matabeleland-south', 'Matabeleland South', 'Ranching, mining, border trade with South Africa and Botswana', 'Mining, Agriculture, Transport & Logistics, Manufacturing', 9, '2026-05-06 08:51:23', '2026-05-06 08:51:23'),
(10, 'midlands', 'Midlands', 'Central location advantage, mining, manufacturing, and educational institutions', 'Mining, Manufacturing, Education, Agriculture', 10, '2026-05-06 08:51:23', '2026-05-06 08:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `tender_number` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `issuing_organization` varchar(200) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `budget` decimal(15,2) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(50) DEFAULT NULL,
  `submission_requirements` text DEFAULT NULL,
  `eligibility_criteria` text DEFAULT NULL,
  `closing_date` date NOT NULL,
  `bid_opening_date` date DEFAULT NULL,
  `document_url` varchar(255) DEFAULT NULL,
  `document_url2` varchar(255) DEFAULT NULL,
  `document_url3` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `title`, `tender_number`, `description`, `issuing_organization`, `category`, `budget`, `location`, `contact_email`, `contact_phone`, `submission_requirements`, `eligibility_criteria`, `closing_date`, `bid_opening_date`, `document_url`, `document_url2`, `document_url3`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Supply of Mining Equipment to Zimplats', 'ZIM/2026/001', 'Supply and delivery of underground mining equipment including drilling rigs and conveyor systems', 'Zimplats Mining', 'Mining', 500000.00, 'Selous, Mashonaland West', 'procurement@zimplats.co.zw', '+263 242 123456', 'Company profile, tax clearance certificate, proof of registration, references from 3 previous clients', 'Must be registered with Ministry of Mines, minimum 5 years experience in mining equipment supply', '2026-06-30', NULL, NULL, NULL, NULL, 1, '2026-05-06 09:35:15', '2026-05-13 13:34:07'),
(2, 'Construction of New Warehouses - Harare', 'ZIM/2026/002', 'Construction of three industrial warehouses with office blocks in Msasa Industrial Area', 'Ministry of Public Works', 'Construction', 2500000.00, 'Msasa, Harare', 'tenders@publicworks.gov.zw', '+263 242 789012', 'Company registration, tax clearance, ZBCA registration, proof of similar projects', 'Registered construction company, Category A or B with ZBCA', '2026-06-15', '2026-06-16', 'uploads/documents/document_6a0480f483183_1778680052.pdf', '', '', 1, '2026-05-06 09:35:15', '2026-05-13 13:47:55'),
(3, 'IT Infrastructure Upgrade for Government Ministries', NULL, 'Supply and installation of network infrastructure, servers, and cybersecurity solutions', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-07-10', NULL, NULL, NULL, NULL, 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(4, 'Road Rehabilitation Project - Bulawayo-Victoria Falls Highway', NULL, 'Rehabilitation and widening of 200km highway including bridge repairs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-25', NULL, NULL, NULL, NULL, 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(5, 'Supply of Agricultural Equipment - Tractors', NULL, 'Supply of 50 tractors with accessories for the Ministry of Agriculture', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-20', NULL, NULL, NULL, NULL, 1, '2026-05-06 09:35:15', '2026-05-06 09:35:15'),
(6, 'School Building Materials Tender', '', 'Supply of cement, steel, and roofing materials for 20 schools in Manicaland', '', '', NULL, '', '', '', '', '', '2026-05-30', NULL, 'uploads/documents/document_6a0480f483183_1778680052.pdf', '', '', 1, '2026-05-06 09:35:15', '2026-05-13 13:47:47'),
(7, 'Expired Tender - Old Project', NULL, 'This tender has already expired for testing purposes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-01', NULL, NULL, NULL, NULL, 0, '2026-05-06 09:35:15', '2026-05-06 09:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `embed_url` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `category`, `embed_url`, `created_at`) VALUES
(1, 'Zimbabwe Mining Investment Opportunities', 'mining', 'https://www.youtube.com/embed/sample1', '2026-05-06 09:35:15'),
(2, 'CZI Annual Conference Highlights 2025', 'events', 'https://www.youtube.com/embed/sample2', '2026-05-06 09:35:15'),
(3, 'Construction Industry Growth in Zimbabwe', 'construction', 'https://www.youtube.com/embed/sample3', '2026-05-06 09:35:15'),
(4, 'Tourism Zimbabwe - Discover Your Adventure', 'tourism', 'https://www.youtube.com/embed/sample4', '2026-05-06 09:35:15'),
(5, 'Agriculture Sector Modernization', 'agriculture', 'https://www.youtube.com/embed/sample5', '2026-05-06 09:35:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_stakeholder_type` (`stakeholder`,`type`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_stakeholder` (`stakeholder`),
  ADD KEY `idx_industry` (`industry_id`),
  ADD KEY `idx_province` (`province_id`);

--
-- Indexes for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_organizer_date` (`organizer`,`event_date`);

--
-- Indexes for table `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_closing_date` (`closing_date`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=676;

--
-- AUTO_INCREMENT for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exports`
--
ALTER TABLE `exports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `companies_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
