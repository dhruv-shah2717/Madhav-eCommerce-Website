-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2024 at 08:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madhav-website`
--
CREATE DATABASE IF NOT EXISTS `madhav-website` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `madhav-website`;

-- --------------------------------------------------------

--
-- Table structure for table `cart_discounts`
--

CREATE TABLE `cart_discounts` (
  `Discount_id` bigint UNSIGNED NOT NULL,
  `Discount_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Discount_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_discounts`
--

INSERT INTO `cart_discounts` (`Discount_id`, `Discount_code`, `Discount_price`, `created_at`, `updated_at`) VALUES
(1, 'shah', 100, NULL, '2024-11-18 15:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE `cart_products` (
  `Product_id` bigint UNSIGNED NOT NULL,
  `Product_pid` int NOT NULL,
  `Product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_price` int NOT NULL,
  `Product_qty` int NOT NULL DEFAULT '1',
  `Product_uid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_complains`
--

CREATE TABLE `contact_complains` (
  `Complain_id` bigint UNSIGNED NOT NULL,
  `Complain_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Complain_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Complain_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Complain_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_complains`
--

INSERT INTO `contact_complains` (`Complain_id`, `Complain_name`, `Complain_email`, `Complain_phone`, `Complain_message`, `created_at`, `updated_at`) VALUES
(1, 'Dhruv', 'dhruvshah2717@gmail.com', '9054536831', 'Nice website.', '2024-10-06 07:59:26', '2024-10-06 07:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `contact_informations`
--

CREATE TABLE `contact_informations` (
  `Information_id` bigint UNSIGNED NOT NULL,
  `Information_icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Information_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Information_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_informations`
--

INSERT INTO `contact_informations` (`Information_id`, `Information_icon`, `Information_heading`, `Information_description`, `created_at`, `updated_at`) VALUES
(1, 'bi bi-geo-alt-fill', 'Address', 'Haveli Street Jalarma Chowk.', NULL, '2024-11-18 14:16:44'),
(2, 'bi bi-telephone-fill', 'Phone', '9054536831 | 8780430830', NULL, NULL),
(3, 'bi bi-headset', 'Support', 'Dhruvshah2717@gmail.com', NULL, '2024-11-18 14:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact_maps`
--

CREATE TABLE `contact_maps` (
  `Map_id` bigint UNSIGNED NOT NULL,
  `Map_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_maps`
--

INSERT INTO `contact_maps` (`Map_id`, `Map_link`, `created_at`, `updated_at`) VALUES
(1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59257.42962928425!2d70.6523436323088!3d20.81757233004739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be2d93ac5833031%3A0x48916fb7e9a5eaad!2sKodinar%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1728233721099!5m2!1sen!2sin', NULL, '2024-11-18 14:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forgotpass_tokens`
--

CREATE TABLE `forgotpass_tokens` (
  `Token_id` bigint UNSIGNED NOT NULL,
  `Token_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Token_expiry_time` time NOT NULL,
  `Token_otp` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_features`
--

CREATE TABLE `home_features` (
  `Feature_id` bigint UNSIGNED NOT NULL,
  `Feature_icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Feature_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Feature_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_features`
--

INSERT INTO `home_features` (`Feature_id`, `Feature_icon`, `Feature_name`, `Feature_description`, `created_at`, `updated_at`) VALUES
(1, 'bi bi-car-front-fill', 'Free Shipping', 'For all order over ₹500', NULL, '2024-11-18 12:56:31'),
(2, 'bi bi-cash', 'Money Back Guarantee', 'If good have Problems', NULL, NULL),
(3, 'bi bi-clock', 'Online Support 24/7', 'Dedicated support', NULL, '2024-11-18 12:56:15'),
(4, 'bi bi-headphones', 'Payment Secure', '100% secure payment', NULL, '2024-11-18 12:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `home_heroimages`
--

CREATE TABLE `home_heroimages` (
  `Heroimage_id` bigint UNSIGNED NOT NULL,
  `Heroimage_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_heroimages`
--

INSERT INTO `home_heroimages` (`Heroimage_id`, `Heroimage_image`, `created_at`, `updated_at`) VALUES
(1, 'Hero.jpg', NULL, '2024-11-18 14:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `home_slideimages`
--

CREATE TABLE `home_slideimages` (
  `Slideimage_id` bigint UNSIGNED NOT NULL,
  `Slideimage_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Slideimage_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Slideimage_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_slideimages`
--

INSERT INTO `home_slideimages` (`Slideimage_id`, `Slideimage_image`, `Slideimage_heading`, `Slideimage_description`, `created_at`, `updated_at`) VALUES
(1, 'Slide.jpg', 'Shine Brighter with Diwali Sale Extravaganza!', 'This Diwali, let your celebrations sparkle with joy and savings! Get ready for a shopping experience like never before with our Diwali Sale Extravaganza, where the best deals meet unbeatable prices. Whether you\'re looking to upgrade your wardrobe, deck out your home, or find the perfect gifts for loved ones, we\'ve got you covered!', NULL, '2024-11-18 13:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `Slider_id` bigint UNSIGNED NOT NULL,
  `Slider_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`Slider_id`, `Slider_image`, `created_at`, `updated_at`) VALUES
(1, 'Slider1.jpg', NULL, '2024-11-18 12:47:10'),
(2, 'Slider2.webp', NULL, NULL),
(3, 'Slider3.webp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2024_10_06_115402_create_cart_discounts_table', 1),
(6, '2024_10_06_115441_create_cart_products_table', 1),
(7, '2024_10_06_115501_create_contact_complains_table', 1),
(8, '2024_10_06_115519_create_contact_informations_table', 1),
(9, '2024_10_06_115529_create_contact_maps_table', 1),
(10, '2024_10_06_115551_create_forgotpass_tokens_table', 1),
(11, '2024_10_06_115611_create_home_features_table', 1),
(12, '2024_10_06_115622_create_home_heroimages_table', 1),
(13, '2024_10_06_115633_create_home_slideimages_table', 1),
(14, '2024_10_06_115643_create_home_sliders_table', 1),
(15, '2024_10_06_115657_create_order_orders_table', 1),
(16, '2024_10_06_115709_create_order_reviews_table', 1),
(17, '2024_10_06_115820_create_product_products_table', 1),
(18, '2024_10_06_115839_create_register_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_orders`
--

CREATE TABLE `order_orders` (
  `Order_id` bigint UNSIGNED NOT NULL,
  `Order_pid` int NOT NULL,
  `Order_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Order_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Order_price` int NOT NULL,
  `Order_qty` int NOT NULL,
  `Order_date` date NOT NULL,
  `Order_paymentid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `Order_uid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_orders`
--

INSERT INTO `order_orders` (`Order_id`, `Order_pid`, `Order_image`, `Order_name`, `Order_price`, `Order_qty`, `Order_date`, `Order_paymentid`, `Order_status`, `Order_uid`, `created_at`, `updated_at`) VALUES
(19, 4, 'Product 4/p1.jpg', 'Portronics Toad One Bluetooth Mouse.', 649, 2, '2024-11-27', 'order_PQD3lyNvYISojD', 'Paid', 'dhruvshah2717@gmail.com', '2024-11-26 23:43:21', '2024-11-26 23:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_reviews`
--

CREATE TABLE `order_reviews` (
  `Review_id` bigint UNSIGNED NOT NULL,
  `Review_rid` int NOT NULL,
  `Review_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Review_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Review_pphoto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Review_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_reviews`
--

INSERT INTO `order_reviews` (`Review_id`, `Review_rid`, `Review_name`, `Review_email`, `Review_pphoto`, `Review_description`, `created_at`, `updated_at`) VALUES
(5, 4, 'boat', 'dhruvshah2717@gmail.com', 'IMG_1348.jpg', 'nice', '2024-11-26 23:44:12', '2024-11-26 23:44:12');

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_products`
--

CREATE TABLE `product_products` (
  `Product_id` bigint UNSIGNED NOT NULL,
  `Product_image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_image2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_image3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_image4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_brand` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_price` int NOT NULL,
  `Product_exprice` int NOT NULL,
  `Product_about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_new` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `Product_trending` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `Product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_products`
--

INSERT INTO `product_products` (`Product_id`, `Product_image1`, `Product_image2`, `Product_image3`, `Product_image4`, `Product_brand`, `Product_name`, `Product_review`, `Product_price`, `Product_exprice`, `Product_about`, `Product_color`, `Product_category`, `Product_new`, `Product_trending`, `Product_description`, `created_at`, `updated_at`) VALUES
(2, 'Product 2/p1.jpg', 'Product 2/p2.jpg', 'Product 2/p3.jpg', 'Product 2/p3.jpg', 'Boat', 'boAt Wave Elevate Smart Watch.', '200', 1499, 6499, 'boAt Wave Elevate Smart Watch with 1.96\" Display, BT Calling, Functional Crown, AI Voice Assistant, Built-in Game, HR & SPO2 Monitoring and Stress Monitoring, IP67(Active Black).', 'Black', 'Electronics', 'No', 'No', 'Bluetooth Calling- Calling made convenient with just a tap on Wave Elevate. Save up to 10 contacts, make calls with the dial pad and its superior quality speaker & mic make your experience smooth and clear.\n, Functional Crown- A functional crown on the side of this smartwatch allows you to conveniently navigate through the features and settings.\n, Watch Faces- Multiple watch faces with customizable options to match your OOTD, every day!\n,Voice Assistant- This smartwatch’s voice assistant takes on questions, set reminders and alarms. Wave Elevate is a smartwatch smart enough to listen to all your commands.', NULL, NULL),
(3, 'Product 3/p1.jpg', 'Product 3/p2.jpg', 'Product 3/p3.jpg', 'Product 3/p4.jpg', 'Boat', 'boAt Airdopes 141.', '60', 999, 4490, 'boAt Airdopes 141 Bluetooth Truly Wireless in Ear Earbuds with 42H Playtime,Low Latency Mode for Gaming, ENx Tech, IWP, IPX4 Water Resistance, Smooth Touch Controls(Cyan Cider).', 'Cyan Cider', 'Electronics', 'yes', 'No', 'Playback- Enjoy an extended break on weekends with your favourite episodes on stream, virtue of a playback time of up to 42 hours including the 6 hours nonstop playtime for earbuds.\n, Low Latency- Our BEAST mode makes Airdopes 141 a partner in entertainment with real-time audio and low latency experience. These tws earbuds are perfect for a gaming experience.\n, Clear Voice Calls- It dons built-in mic on each tws earbud along with our ENx Environmental Noise Cancellation tech that ensures a smooth delivery of your voice via voice calls\n, boAt Signature Sound- Delve into your cherished boAt Immersive auditory time with Airdopes 141.', NULL, NULL),
(4, 'Product 4/p1.jpg', 'Product 4/p2.jpg', 'Product 4/p3.jpg', 'Product 4/p4.jpg', 'Portronics', 'Portronics Toad One Bluetooth Mouse.', '300', 649, 1499, 'Portronics Toad One Bluetooth Mouse with 2.4 GHz & BT 5.3 Dual Wireless, 6 Buttons, Rechargeable, RGB Lights, Connect 3 Devices, Ergonomic Design for Laptop, Smartphone, (Black).', 'Black', 'Electronics', 'Yes', 'No', 'Toad One wireless optical mouse is the perfect accessory for those who travel for work, executives who give presentations, or anyone who wants greater control and freedom.\r\n, This wireless optical mouse comes with a lighting feature to make your working experience a colourful one. Moreover, Toad One gives you 7 coloured light functionality to adjust the lighting as per your desire.\r\n, Enjoy up to a 10-meter wireless connection with the Toad One wireless mouse’s tiny plug-and-forget nano dongle. No software or driver installation is needed.\r\n, This optical sensor mouse comes with a rechargeable battery through its Type-C charging port.', NULL, NULL),
(5, 'Product 5/p1.jpg', 'Product 5/p2.jpg', 'Product 5/p3.jpg', 'Product 5/p4.jpg', 'Ant Esports', 'Ant Esports KM500 Pro Backlit Gaming Membrane Keyboard.', '20', 1099, 2999, 'Ant Esports KM500 Pro Backlit Gaming Membrane Keyboard-19 Anti GhostingKeys I Braided Cable with Rubberised Coating and 3200 DPI Optical Sensor I LED Backlit Scroll Wheel Mouse Combo.', 'Black', 'Electronics', 'No', 'No', 'Premium Membrane Implementation - The Keyboard comes with membrane to diffuse the RGB lights evenly while the keycaps are double shot ABS for ultimate comfort and durability.\r\n, Reinforced Aluminum Design - Underneath the brushed aluminum finish the keyboard is reinforced with an aluminum plate to avoid warping and ensures longevity.\r\n, Braided Cable and Rubberized Coating – Coming with a braided cable the mouse not only offer a premium touch but with an anti-slip rubberized coating becomes comfortable to use during long gaming sessions too.\r\n, High DPI Optical Sensor - Mouse is coated with an anti-slip rubberized finish and is equipped with a high DPI optical sensor sensitive upto 3200DPI.', NULL, NULL),
(6, 'Product 6/p1.jpg', 'Product 6/p2.jpg', 'Product 6/p3.jpg', 'Product 6/p4.jpg', 'SanDisk', 'SanDisk Ultra Dual Drive Luxe USB Type C Flash Drive.', '500', 1299, 3000, 'SanDisk Ultra Dual Drive Luxe USB Type C Flash Drive (Silver, 128 GB, 5Y - SDDDC4-128G-I35) The all-metal, 2-in-1 flash drive with a reversible USB Type-C and a traditional.', 'Sliver', 'Electronics', 'No', 'Yes', 'The all-metal, 2-in-1 flash drive with a reversible USB Type-C and a traditional Type-A connector.\r\n, Seamlessly move content between your USB Type-C smartphone, tablets and Macs and USB Type-A computers.\r\n, Free up space on your USB Type-C smartphone so you can take more photos.\r\n, High-performance USB 3.1 Gen 1 drive with 150MB/s read speeds lets you quickly move your files to your computer.', NULL, NULL),
(7, 'Product 7/p1.jpg', 'Product 7/p2.jpg', 'Product 7/p3.jpg', 'Product 7/p4.jpg', 'Ant Esports', 'Ant Esports MP290 Gaming Mouse Pad.', '24', 199, 999, 'Ant Esports MP290 Gaming Mouse Pad-L- Large with Stitched Edges, Waterproof Non-Slip Base for Gaming & Office – Black Anti-slip Rubber Base Gaming Mouse Pad -Dense anti-slip.', 'Black', 'Electronics', 'No', 'No', 'Durable Stitched Edges -MP290 large mouse pad has delicate edges which can prevent wear, deformation and degumming in prolonged use. And the edge even the seams at the edge are flat,\r\n, Anti-slip Rubber Base Gaming Mouse Pad -Dense anti-slip rubber base provides heavy grip preventing sliding or movement of mouse pads, available for any flat, hard, tabletop surface.\r\n, Ultra-smooth Surface Gaming Mouse Pad -Made of Premium-textured and smooth lycra cloth surface that the mouse glides over nicely\r\n, Washable Design Gaming Mouse Pad - Machine washable, pure black mouse pad multipack which has great locking-colour effect.', NULL, NULL),
(8, 'Product 8/p1.jpg', 'Product 8/p2.jpg', 'Product 8/p3.jpg', 'Product 8/p4.jpg', 'Zebronics', 'Zebronics-NS1500 Laptop Stand.', '54', 299, 1599, 'Zebronics-NS1500 Laptop Stand Featuring Foldable Design, Anti-Slip Silicone Rubber Pads, Supports Maximum of 5kgs Weight Tabletop Ventilation friendly design Ergonomic Design.', 'Black', 'Electronics', 'No', 'No', 'Supports Max 5kg weight | Supports upto 43.18cm (17) laptop sizes\r\n, Easy to Carry | Anti-slip silicone Rubber pads | 7 Adjustable Levels\r\n, Ventilation friendly design | Ergonomic Design.', NULL, NULL),
(9, 'Product 9/p1.jpg', 'Product 9/p2.jpg', 'Product 9/p3.jpg', 'Product 9/p4.jpg', 'Cosmic Byte', 'Cosmic Byte CB-GK-25 Pandora TKL Mechanical Keyboard.', '78', 1600, 2200, 'Cosmic Byte CB-GK-25 Pandora TKL Mechanical Keyboard Upgraded with Swappable Outemu Blue Switches and Rainbow LED (Black/Grey).', 'Black', 'Electronics', 'No', 'Yes', 'Compact Mechanical Keyboard with 87 keys.\nBlue Outemu Mechanical Silent Key Switches.\n50 million + Operations for Each Key.\nInjection Molded Double-shot Color Keycaps.\nSimultaneous Operation for All Keys Without Any Key Ghosting Effects.\nAdjustable Backlight Brightness and Speed\n20 Backlight Effects and 8 Game Modes.', NULL, NULL),
(10, 'Product 10/p1.jpg', 'Product 10/p2.jpg', 'Product 10/p3.jpg', 'Product 10/p4.jpg', 'OTUS', 'OTUS Men\'s Formal Slim Fit Solid Shirt.', '40', 418, 1799, 'OTUS Men\'s Cotton Casual/Formal Slim Fit Solid Shirt.', 'SkuBlue', 'Fashions', 'Yes', 'No', 'Fit Type: Slim Fit\r\n, 100% premium Cotton, extremely soft finish and rich look\r\n, Stylish full sleeve solid casual shirt Best for casual & smart casual wear.', NULL, NULL),
(11, 'Product 11/p1.jpg', 'Product 11/p2.jpg', 'Product 11/p3.jpg', 'Product 11/p4.jpg', 'OTUS', 'OTUS Men\'s Formal Slim Fit Solid Shirt.', '20', 218, 1199, 'OTUS Men\'s Cotton Casual/Formal Slim Fit Solid Shirt.', 'Brown', 'Fashions', 'No', 'Yes', 'Care Instructions: Hand Wash Only\r\n, Fit Type: Slim Fit.', NULL, NULL),
(12, 'Product 12/p1.jpg', 'Product 12/p2.jpg', 'Product 12/p3.jpg', 'Product 12/p4.jpg', 'CB-COLEBROOK', 'CB-COLEBROOK Men\'s Regular Fit  Shirt.', '65', 495, 1849, 'CB-COLEBROOK Men\'s Regular Fit Solid Soft Touch Cotton Casual Shirt Gray.', 'Gray', 'Fashions', 'No', 'No', 'Care Instructions: Machine Wash\r\n, Shirt Material : Soft Touch Cotton Fabrics Good capability of tenderness, air permeability and moisture absorption feels soft and comfy 80% Cotton 20% Silk.\r\n, Sleeve Type :- Full Sleeve , Occasion :- Casual, Closure :- Button , Pocket Type :- V- Designer Pocket\r\n, Enhance your look by wearing this trendy shirt. Team it with a pair of Sharp Looking Chinos and Tassel Loafers for a Dapper Look.', NULL, NULL),
(13, 'Product 13/p1.jpg', 'Product 13/p2.jpg', 'Product 13/p3.jpg', 'Product 13/p4.jpg', 'CB-COLEBROOK', 'CB-COLEBROOK Men\'s Regular Fit Shirt.', '43', 392, 1288, 'CB-COLEBROOK Men\'s Regular Fit Solid Soft Touch Cotton Casual Shirt Black.', 'Black', 'Fashions', 'No', 'Yes', 'Care Instructions: Machine Wash\r\n, Shirt Material : Soft Touch Cotton Fabrics Good capability of tenderness, air permeability and moisture absorption feels soft and comfy , 80% Cotton 20% Silk.\r\n, Sleeve Type :- Full Sleeve , Occasion :- Casual, Closure :- Button , Pocket Type :- V- Designer Pocket\r\n, Pocket Type : V Design : 1 , unit_count : 1 , shirt_form_type : reguler , Size chart - S-38, M-40, L-42, XL-44, XXL-46.', NULL, NULL),
(14, 'Product 14/p1.jpg', 'Product 14/p2.jpg', 'Product 14/p3.jpg', 'Product 14/p4.jpg', 'Lymio', 'Lymio Jeans for Men.', '32', 799, 5999, 'Lymio Jeans for Men || Men Jeans || Men Jeans Pants || Denim Jeans (Jeans-002-003).', 'Blue', 'Fashions', 'Yes', 'No', 'Men jeans || men jeans pants || Denim Jeans || jeans for men\r\n, Disclaimer : Kindly Refer To The Size Chart (Also Mentioned In Images) For Fitting Measurements.1\r\n, TYPE: Full length denim jeans. Designed to offer an energetic look, the denim jeans combine the warmth of comfortable and casual feel. Offering an elevated look, it showcases a perfect fit.\r\n, FIT TYPE: This denim jeans have a regular fit. Quality craftsmanship is at the forefront. Using a range of high-quality fabrics, there is a seamlessly crafted collection for laid-back style.', NULL, NULL),
(15, 'Product 15/p1.jpg', 'Product 15/p2.jpg', 'Product 15/p3.jpg', 'Product 15/p4.jpg', 'Lymio', 'Lymio Jeans for Men.', '76', 679, 5999, 'Lymio Jeans for Men || Men Jeans || Men Jeans Pants || Denim Jeans (Jeans-001).', 'Black', 'Fashions', 'No', 'Yes', 'Men jeans || men jeans pants || Denim Jeans || jeans for men\r\n, Disclaimer : Kindly Refer To The Size Chart (Also Mentioned In Images) For Fitting Measurements.1\r\n, TYPE: Full length denim jeans. Designed to offer an energetic look, the denim jeans combine the warmth of comfortable and casual feel. Offering an elevated look, it showcases a perfect fit.\r\n, FIT TYPE: This denim jeans have a regular fit. Quality craftsmanship is at the forefront. Using a range of high-quality fabrics, there is a seamlessly crafted collection for laid-back style.', NULL, NULL),
(16, 'Product 16/p1.jpg', 'Product 16/p2.jpg', 'Product 16/p3.jpg', 'Product 16/p4.jpg', 'Lymio', 'Lymio Men Cargo Men Cargo Pants Cotton.', '45', 699, 4999, 'Lymio Men Cargo || Men Cargo Pants Cotton || Cargos for Men (Cargo-05-08).', 'Green', 'Fashions', 'No', 'No', 'Men Cargo || Men Cargo Pants || Men Cargo Pants Cotton || Cargos for Men\r\n, Type:Cargo Pants\r\n, Closure Type:Drawstring Waist\r\n, Length:Long.', NULL, NULL),
(17, 'Product 17/p1.jpg', 'Product 17/p2.jpg', 'Product 17/p3.jpg', 'Product 17/p4.jpg', 'Ben Martin', 'Ben Martin Men\' Denim Tapered Fit Jeans.', '67', 899, 2999, 'Ben Martin Men\'s Casual Strechable Denim Tapered Fit Carrot Jeans.', 'Blue', 'Fashions', 'No', 'No', 'Carrot jeans have a distinct tapering from the hips or waist down to the ankles. This creates a narrow, carrot-like shape.\r\n, This carrot jeans is more relaxed fit around the waist and upper thighs, providing comfort in these areas.\r\n, This carrot jeans often have a higher rise, meaning it\'s sit higher on the waist compared to other styles like low-rise or mid-rise jeans.\r\n, This jeans can be dressed up or down, making them suitable for various occasions from casual to semi-formal depending on the styling.', NULL, NULL),
(18, 'Product 18/p1.jpg', 'Product 18/p2.jpg', 'Product 18/p3.jpg', 'Product 18/p4.jpg', 'Lymio', 'Lymio Casual Shirt for Men.', '89', 600, 1400, 'Lymio Casual Shirt for Men|| Shirt for Men|| Men Stylish Shirt (Rib-Shirt).', 'Grey', 'Fashions', 'Yes', 'No', 'Casual Shirt for Men|| Shirt for Men|| Men Stylish Shirt\nStyle:Casual\nNeckline:Collar\nSleeve Length:Long Sleeve.', NULL, NULL),
(19, 'Product 19/p1.jpg', 'Product 19/p2.jpg', 'Product 19/p3.jpg', 'Product 19/p4.jpg', 'YONEX', 'YONEX Nanoray Aluminum Badminton Racquet.', '56', 1496, 2299, 'YONEX Nanoray 7000I G4-2U Aluminum Badminton Racquet with Full Cover (Blue) Pack of 1.', 'Blue', 'Sports', 'Yes', 'No', 'Grip Size : G4 (3.25 Inches)| Weight : 4U (80-84.9 grams). Head Size 95.3 sq/in\r\n, Color : Blue | Head Shape : Isometric\r\n, String Level : 24 pounds | Strung Type : Strung\r\n, Balance Type : Head Light |Playing Level : All Material : Aluminum-Alloy Frame - aluminum.', NULL, NULL),
(20, 'Product 20/p1.jpg', 'Product 20/p2.jpg', 'Product 20/p3.jpg', 'Product 20/p4.jpg', 'YONEX', 'YONEX Light Aluminium Strung Badminton Racket.', '88', 490, 800, 'YONEX ZR 100 Light Aluminium Strung Badminton Racket (Dark Charcoal) 95 grams.', 'Charcol Black', 'Sports', 'No', 'Yes', 'Stiff Flexibility: The racket is characterized by a stiff flexibility, providing stability and control during gameplay. This stiffness is well-suited for players who are developing their badminton skills, especially beginners.\r\n, Ideal for Beginners: Tailored for players at the beginner level, the racket is designed to support skill development and provide a balance of power and control to aid in the learning process.\r\n, Isometric Head Shape: The racket features an isometric head shape, optimizing the sweet spot. This design choice enhances the hitting area, promoting better shot accuracy and consistency for players still refining their techniques.\r\n, Aluminium and Graphite Composition: The racket is constructed with a combination of aluminium and graphite, providing a balance of durability and performance.', NULL, NULL),
(21, 'Product 21/p1.jpg', 'Product 21/p2.jpg', 'Product 21/p3.jpg', 'Product 21/p4.jpg', 'NONGI', 'NONGI 200 Plastic Badminton Shuttlecock.', '87', 189, 250, 'NONGI 200 Plastic Badminton Shuttlecock Pack of 5 Color :-Yellow Base material :-Eva Cork.', 'Yellow', 'Sports', 'No', 'No', 'Skirt Material:- Plastic\r\n, Base material :-Eva Cork\r\n, Color :-Yellow\r\n. Shuttlecock Pack of 5.', NULL, NULL),
(22, 'Product 22/p1.jpg', 'Product 22/p2.jpg', 'Product 22/p3.jpg', 'Product 22/p4.jpg', 'SG', 'SG Prokick Spinner Cricket Shoe.', '56', 899, 1200, 'SG Prokick Spinner Cricket Shoe PVC upper material having higher wear & tear resistance.', 'White', 'Sports', 'No', 'No', 'Upper –Mesh & PVC, PVC upper material having higher wear & tear resistance.\r\n, Upper –Mesh & PVC, PVC upper material having higher wear & tear resistance.\r\n, Good color combination with good flexing cycle, durability, super strength & perfect finish.\r\n, Reinforcement material used for provide more strength to shoe; Upper lining material breathable mesh upper lining for more comfort.', NULL, NULL),
(23, 'Product 23/p1.jpg', 'Product 23/p2.jpg', 'Product 23/p3.jpg', 'Product 23/p4.jpg', 'Nivia', 'Nivia Storm Football.', '89', 299, 726, 'Nivia Storm Football | Suitable for Hard Ground Without Grass | Football Size - 5 (White).', 'White', 'Sports', 'No', 'Yes', 'Sole: Rubber\r\n, Closure: Lace-Up\r\n, Shoe Width: Medium\r\n, High Gloss PU Synthetic leather stitched with Collar ankle mesh A moulded Removable P.U(SPORTHO FOOT COMFORT ) sockliner.', NULL, NULL),
(24, 'Product 24/p1.jpg', 'Product 24/p2.jpg', 'Product 24/p3.jpg', 'Product 24/p4.jpg', 'SG', 'SG Prokick Kashmir Willow Cricket Bat.', '78', 1735, 2699, 'SG Prokick Kashmir Willow Cricket Bat with Fullcover Short Handle Mens high-quality Kashmir willow.', 'White', 'Sports', 'Yes', 'No', 'Made from high-quality Kashmir willow, the Prokick bat delivers exceptional durability and power. The robust nature of the willow ensures that you can confidently face leather balls\r\n, Made from high-quality Kashmir willow, the Prokick bat delivers exceptional durability and power. The robust nature of the willow ensures that you can confidently face leather balls\r\n, Specifically designed for leather ball play, the Prokick Kashmir Willow Cricket Bat delivers exceptional performance and power.\r\n, Whether you\'re a professional cricketer or a passionate enthusiast, the Prokick Kashmir Willow Cricket Bat is a reliable and high-performing choice. Elevate your game with this exceptional cricket bat from SG.', NULL, NULL),
(25, 'Product 25/p1.jpg', 'Product 25/p2.jpg', 'Product 25/p3.jpg', 'Product 25/p4.jpg', 'SG', 'SG Seamer Leather Cricket Ball.', '43', 499, 529, 'SG Seamer Leather Cricket Ball, Adult Size-3, (Red), Standard for club and school matches.', 'Red', 'Sports', 'No', 'No', 'The Seamer is a good quality two-piece cricket ball made from good quality alum tanned leather\r\n, The Seamer is ideally suited for club and school matches\r\n, Water-proofed\r\n, Good quality centre construction encased with layers of top quality Portuguese cork wound with 100 percent wool.', NULL, NULL),
(26, 'Product 26/p1.jpg', 'Product 26/p2.jpg', 'Product 26/p3.jpg', 'Product 26/p4.jpg', 'Boldfit', 'Boldfit Cricket Stumps with Stand Cricket Kit Plastic Wickets.', '89', 289, 699, 'Boldfit Cricket Stumps with Stand Cricket Kit Plastic Wickets for Cricket With Plastic Stand.', 'Yellow', 'Sports', 'No', 'No', 'Complete your cricket kit with the Boldfit\'s Cricket Stumps With Stand. Make your cricket dreams come true, and take wicket and wicket.\r\n, A starter cricket kit for youth and aspiring cricket players to help make their sports star dreams come true.\r\n, Cricket wickets that are sturdy and durable match after match. Bowl yorkers, leg spins or a googly and take wicket after wicket with these plastic wickets for cricket. \r\n, The cricket kit of the plastic cricket stumps with a stand comes handy everywhere to make every hard and flat ground — a cricket field. Perfect for every cricket match.', NULL, NULL),
(27, 'Product 27/p1.jpg', 'Product 27/p2.jpg', 'Product 27/p3.jpg', 'Product 27/p4.jpg', 'SG', 'SG Rsd Extreme Cricket Wicket Keeping Gloves.', '90', 1350, 1900, 'SG Rsd Extreme Cricket Wicket Keeping Gloves, Youth (Assorted) - Rubber ; Pvc,Standard.', 'White', 'Sports', 'No', 'Yes', 'Made from high quality PVC cuffs\nHigh quality all-leather palm\nRubber grip on the front face of the Gloves\nCloth lining in the cuffs\nColor May Vary.', NULL, NULL),
(100, 'Product 1/p1.jpg', 'Product 1/p2.jpg', 'Product 1/p3.jpg', 'Product 1/p4.jpg', 'Lenovo', 'Lenovo IdeaPad Gaming 3.', '150', 6499, 91290, 'Lenovo IdeaPad Gaming 3 AMD Ryzen 5 6600H 15.6\" 39.62cm FHD IPS 120Hz Gaming Laptop 16GB/512GB SSD/Win11/Office/NVIDIA RTX 3050 4GB/RGB Keyboard/Alexa/3Month.', 'Black', 'Electronics', 'Yes', 'No', 'Processor: Intel i5 12800H | Speed: 3.3 GHz (Base) - 4.5 GHz (Max) | 6 Cores | 12 Threads | 16MB Cache.\r\n, OS and Pre-Installed Software: Pre-Loaded Windows 11 Home with Lifetime Validity | MS Office Home and Student 2021 | Xbox GamePass Ultimate 3-month subscription.\r\n, Keyboard: Full-size 4-Zone white Backlit legendary TrueStrike Keyboard with 100pct. Anti-Ghosting, Anti-Abrasion & Soft-Landing switches| 1.5 mm Key Travel| Large Arrow Keys| 1 piece TrackPad.\r\n, Display: 16\" FHD (1920x1080) | IPS Technology | 120 Hz Refresh Rate | 250Nits Brightness | Anti-glare || Memory: 16GB RAM DDR4-3200 || Storage: 512GB SSD.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE `register_users` (
  `User_id` bigint UNSIGNED NOT NULL,
  `User_fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_date` date NOT NULL,
  `User_pphoto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Default.png',
  `User_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `User_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `User_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`User_id`, `User_fname`, `User_lname`, `User_email`, `User_phone`, `User_password`, `User_date`, `User_pphoto`, `User_role`, `User_status`, `User_token`, `created_at`, `updated_at`) VALUES
(1, 'Dhruv', 'Shah', 'dhruvshah2717@gmail.com', '9054536831', 'Shah@2006', '2006-01-27', 'IMG_1348.jpg', 'User', 'Active', 'Madhav', '2024-10-06 07:49:18', '2024-11-26 10:00:28'),
(9, 'Dhruv', 'Shah', 'dshah666@rku.ac.in', '9054536831', 'Shah@2006', '2006-01-27', 'IMG_1348.jpg', 'Admin', 'Active', 'Madhav', '2024-11-26 21:21:37', '2024-11-26 21:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_discounts`
--
ALTER TABLE `cart_discounts`
  ADD PRIMARY KEY (`Discount_id`);

--
-- Indexes for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `contact_complains`
--
ALTER TABLE `contact_complains`
  ADD PRIMARY KEY (`Complain_id`);

--
-- Indexes for table `contact_informations`
--
ALTER TABLE `contact_informations`
  ADD PRIMARY KEY (`Information_id`);

--
-- Indexes for table `contact_maps`
--
ALTER TABLE `contact_maps`
  ADD PRIMARY KEY (`Map_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forgotpass_tokens`
--
ALTER TABLE `forgotpass_tokens`
  ADD PRIMARY KEY (`Token_id`);

--
-- Indexes for table `home_features`
--
ALTER TABLE `home_features`
  ADD PRIMARY KEY (`Feature_id`);

--
-- Indexes for table `home_heroimages`
--
ALTER TABLE `home_heroimages`
  ADD PRIMARY KEY (`Heroimage_id`);

--
-- Indexes for table `home_slideimages`
--
ALTER TABLE `home_slideimages`
  ADD PRIMARY KEY (`Slideimage_id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`Slider_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_orders`
--
ALTER TABLE `order_orders`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `order_reviews`
--
ALTER TABLE `order_reviews`
  ADD PRIMARY KEY (`Review_id`);

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
-- Indexes for table `product_products`
--
ALTER TABLE `product_products`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `register_users`
--
ALTER TABLE `register_users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `register_users_user_email_unique` (`User_email`);

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
-- AUTO_INCREMENT for table `cart_discounts`
--
ALTER TABLE `cart_discounts`
  MODIFY `Discount_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `Product_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_complains`
--
ALTER TABLE `contact_complains`
  MODIFY `Complain_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_informations`
--
ALTER TABLE `contact_informations`
  MODIFY `Information_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_maps`
--
ALTER TABLE `contact_maps`
  MODIFY `Map_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forgotpass_tokens`
--
ALTER TABLE `forgotpass_tokens`
  MODIFY `Token_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_features`
--
ALTER TABLE `home_features`
  MODIFY `Feature_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `home_heroimages`
--
ALTER TABLE `home_heroimages`
  MODIFY `Heroimage_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_slideimages`
--
ALTER TABLE `home_slideimages`
  MODIFY `Slideimage_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `Slider_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_orders`
--
ALTER TABLE `order_orders`
  MODIFY `Order_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_reviews`
--
ALTER TABLE `order_reviews`
  MODIFY `Review_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_products`
--
ALTER TABLE `product_products`
  MODIFY `Product_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `register_users`
--
ALTER TABLE `register_users`
  MODIFY `User_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
