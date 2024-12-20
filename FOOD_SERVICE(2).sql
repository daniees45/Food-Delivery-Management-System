-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2024 at 12:48 PM
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
-- Database: `FOOD_SERVICE`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `restaurantID` int(11) DEFAULT NULL,
  `Postid` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `PostTitle` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`restaurantID`, `Postid`, `price`, `PostTitle`, `Description`, `banner_image`, `category`, `created_at`, `updated_at`) VALUES
(3713, 204, 100, 'Chocolate Malt', 'Unstoppable', 'uploads/67473e82ba64b_chocolate malt.jpg', 'Beverages', '2024-11-27 15:45:06', '2024-11-27 15:45:06'),
(3713, 205, 200, 'Chocolate', 'very sweet', 'uploads/67472b60971e1_chocolate.jpg', 'snacks', '2024-11-27 14:23:28', '2024-11-27 23:46:35'),
(3713, 212, 850, 'Lobster', 'Try and see', 'uploads/67473585bc0e6_lobster.jpg', 'fastFood', '2024-11-27 15:06:45', '2024-11-27 15:06:45'),
(3713, 213, 200, 'Shrimp Fried Rice', 'hahahaha', 'uploads/674735f19a394_Shrimp-Fried-Rice.jpg', 'fastFood', '2024-11-27 15:08:33', '2024-11-27 15:08:33'),
(3713, 216, 120, 'Banku', 'As you know our local food are the best', 'uploads/67471e7dbe894_banku.jpg', 'local', '2024-11-27 13:28:29', '2024-11-27 13:28:29'),
(3713, 217, 90, 'Bread and egg', 'enjoy', 'uploads/6747276bf3131_bread and egg.jpg', 'Breakfast', '2024-11-27 14:06:35', '2024-11-27 23:46:37'),
(3713, 218, 250, 'Hot Cocktail', 'You know where to find us', 'uploads/6747216216174_Hot cocktail.jpg', 'Cocktail', '2024-11-27 13:40:50', '2024-11-27 23:46:39'),
(3713, 226, 100, 'Spaghetti', 'The best spaghetti in town', 'uploads/67471c9290570_spaghetti.jpg', 'intercontinental', '2024-11-27 13:20:18', '2024-11-27 13:20:18'),
(3713, 228, 50, 'Wakkye', 'My wakkey is the best', 'uploads/67471e40f1bdb_WhatsApp Image 2024-11-25 at 10.35.22.jpeg', 'local', '2024-11-27 13:27:28', '2024-11-27 13:27:28'),
(3713, 233, 150, 'Chicken-Kebab', 'You know what to expect', 'uploads/6747205e1af1c_Chicken-Kebab.jpg', 'intercontinental', '2024-11-27 13:36:30', '2024-11-27 23:46:42'),
(3713, 241, 65, 'Guinness Malt', 'Unbelievable', 'uploads/67473e3c5d4f4_guinness malt.jpg', 'Beverages', '2024-11-27 15:43:56', '2024-11-27 15:43:56'),
(3713, 243, 100, 'Sweet potato chips', 'You can\'t stop after one bite', 'uploads/67472d483d04c_potato chips.jpg', 'snacks', '2024-11-27 14:31:36', '2024-11-27 23:46:44'),
(3713, 245, 450, 'Sauteed shrimp', 'very spicy', 'uploads/674737075ce85_Sauteed-Shrimp.jpg', 'fastFood', '2024-11-27 15:13:11', '2024-11-27 15:13:11'),
(3713, 246, 30, 'Sprite', 'delicious', 'uploads/67473df7914e6_sprite.jpg', 'Beverages', '2024-11-27 15:42:47', '2024-11-27 15:42:47'),
(2851, 251, 100, 'pizza', 'Pizza going for 100 cedis only', 'uploads/674455b1ccc0e_WhatsApp Image 2024-11-25 at 10.35.20.jpeg', 'intercontinental', '2024-11-25 10:47:13', '2024-11-25 10:47:13'),
(3713, 262, 1000, 'seafood', 'Our delicious seafood', 'uploads/6747364711c3e_seafood.jpg', 'fastFood', '2024-11-27 15:09:59', '2024-11-27 15:09:59'),
(3713, 264, 200, 'Beef kebab', 'the best kebab you can find', 'uploads/67471ef32b6f1_beef kebab.jpg', 'fastFood', '2024-11-27 13:30:27', '2024-11-27 13:30:27'),
(3713, 267, 20, 'Banku and Tilapia', 'good food', 'uploads/674482856d5a8_banku.jpg', 'local', '2024-11-25 13:58:29', '2024-11-27 23:45:39'),
(3713, 268, 60, 'Juice with bread', 'enjoy', 'uploads/67472728ea045_juice with bread.jpg', 'Breakfast', '2024-11-27 14:05:28', '2024-11-27 23:45:53'),
(3713, 270, 100, 'tea and croissant', 'enjoy', 'uploads/6747278f6167b_tea and croissant.jpg', 'Breakfast', '2024-11-27 14:07:11', '2024-11-27 23:45:58'),
(2851, 273, 29, 'food', 'Eat with relish', 'uploads/674468114e02e_WhatsApp Image 2024-11-25 at 10.35.23 (2).jpeg', 'desert', '2024-11-25 12:05:37', '2024-11-25 12:05:37'),
(3713, 278, 45, 'Fanta', 'nice', 'uploads/67473dcc7079b_fanta.jpg', 'Beverages', '2024-11-27 15:42:04', '2024-11-27 15:42:04'),
(3713, 279, 50, 'Coka Cola', 'sweet', 'uploads/67473d12a04bc_coke.jpg', 'Beverages', '2024-11-27 15:38:58', '2024-11-27 15:38:58'),
(3713, 280, 20, 'fufu and egos ', 'locally made', 'uploads/674468e744dcb_WhatsApp Image 2024-11-25 at 10.35.23.jpeg', 'local', '2024-11-25 12:09:11', '2024-11-27 23:46:18'),
(3713, 284, 450, 'Blended Cocktail', 'come and discover', 'uploads/674721b437021_Blended cocktail.jpg', 'Cocktail', '2024-11-27 13:42:12', '2024-11-27 23:46:10'),
(3713, 285, 50, 'Blended Cocktail', 'made from good stuff', 'uploads/674480e92c962_Blended cocktail.jpg', 'Cocktail', '2024-11-25 13:51:37', '2024-11-27 23:46:15'),
(2851, 286, 2, 'Oranges', 'sweet oranges', 'uploads/674466702f52f_WhatsApp Image 2024-11-25 at 10.35.18 (1).jpeg', 'Beverages', '2024-11-25 11:58:40', '2024-11-25 11:58:40'),
(3713, 287, 300, 'Potato chips', 'nice and delicious', 'uploads/67472c383f11d_sweet potato chips.webp', 'snacks', '2024-11-27 14:27:04', '2024-11-27 23:46:20'),
(3713, 288, 500, 'Tiki and Specialty Cocktails ', 'Come and discover', 'uploads/674722ca7d35b_Tiki and Specialty Cocktails.jpg', 'Cocktail', '2024-11-27 13:46:50', '2024-11-27 23:46:22'),
(2851, 290, 5, 'Grapes', 'delicious ', 'uploads/674466a68aeea_WhatsApp Image 2024-11-25 at 10.35.22 (1).jpeg', 'Appetizer', '2024-11-25 11:59:34', '2024-11-25 11:59:34'),
(3713, 291, 150, 'Mixed biscuit', 'crunchy and delicious', 'uploads/67472cf66c120_mixed biscuit.jpg', 'snacks', '2024-11-27 14:30:14', '2024-11-27 23:46:25'),
(3713, 295, 20, 'Banku and Tilapia', 'locally made food here', 'uploads/674481384c369_banku.jpg', 'local', '2024-11-25 13:52:56', '2024-11-27 23:46:28'),
(3713, 299, 150, 'Cookies', 'very crunchy ', 'uploads/67472b9397612_cookies.jpg', 'snacks', '2024-11-27 14:24:19', '2024-11-27 23:46:30'),
(3713, 301, 150, 'Highball cocktail', 'Come to us dear', 'uploads/674723647f9ee_Highball cocktail.jpg', 'Cocktail', '2024-11-27 13:49:24', '2024-11-27 23:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `product_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `user_id`, `product_id`, `product_name`, `product_price`, `quantity`, `product_image`, `created_at`, `updated_at`) VALUES
(5391, 2703, 295, 'Banku and Tilapia', 20.00, 1, 'uploads/674481384c369_banku.jpg', '2024-11-25 16:59:56', '2024-11-25 17:09:37'),
(5391, 2703, 285, 'Blended Cocktail', 50.00, 1, 'uploads/674480e92c962_Blended cocktail.jpg', '2024-11-25 16:59:58', '2024-11-25 17:09:38'),
(5391, 2703, 280, 'fufu and egos ', 20.00, 1, 'uploads/674468e744dcb_WhatsApp Image 2024-11-25 at 10.35.23.jpeg', '2024-11-25 16:59:59', '2024-11-25 17:09:39'),
(5391, 2703, 286, 'Oranges', 2.00, 3, 'uploads/674466702f52f_WhatsApp Image 2024-11-25 at 10.35.18 (1).jpeg', '2024-11-25 17:14:17', '2024-11-25 17:14:28'),
(7180, 2703, 285, 'Blended Cocktail', 50.00, 6, 'uploads/674480e92c962_Blended cocktail.jpg', '2024-11-25 17:34:57', '2024-11-25 17:34:58'),
(4764, 4879, 228, 'Wakkye', 50.00, 1, 'uploads/67471e40f1bdb_WhatsApp Image 2024-11-25 at 10.35.22.jpeg', '2024-11-28 07:37:14', '2024-11-28 07:37:14'),
(4764, 4879, 290, 'Grapes', 5.00, 1, 'uploads/674466a68aeea_WhatsApp Image 2024-11-25 at 10.35.22 (1).jpeg', '2024-11-28 07:37:51', '2024-11-28 07:37:51'),
(1651, 6704, 241, 'Guinness Malt', 65.00, 1, 'uploads/67473e3c5d4f4_guinness malt.jpg', '2024-12-04 08:04:10', '2024-12-04 08:04:10'),
(1651, 6704, 246, 'Sprite', 30.00, 1, 'uploads/67473df7914e6_sprite.jpg', '2024-12-04 08:04:11', '2024-12-04 08:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `userID` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `cart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `cvv` char(3) NOT NULL,
  `card_holder` varchar(100) NOT NULL,
  `expiry_month` int(11) NOT NULL CHECK (`expiry_month` between 1 and 12),
  `expiry_year` int(11) NOT NULL,
  `card_type` varchar(50) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `R_id` int(11) NOT NULL,
  `R_name` varchar(255) NOT NULL,
  `R_email` varchar(255) NOT NULL,
  `R_password` varchar(255) NOT NULL,
  `R_contact` int(13) NOT NULL,
  `TOS` varchar(255) NOT NULL,
  `ADDRESS` text NOT NULL,
  `Banner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`R_id`, `R_name`, `R_email`, `R_password`, `R_contact`, `TOS`, `ADDRESS`, `Banner`) VALUES
(285, 'ALPHA', 'alpha@gmail.com', '$2y$10$CNild0ASyMDRQ5TOQYmC4Oj9NIkCIxAuoux7xgwJFrhdIztm8Arc6', 123489, 'Takeaway', '2, alpha road', ''),
(2346, 'KFC', 'kfc@gmail.com', '$2y$10$7v2RKXuSsdUBCqSu8GW3/.UeHNKPEAsTo2rfvjQ1C3Q/V8/.RM7/G', 594979536, 'Takeaway', '2, kfc road', ''),
(2639, 'Indomie & Spagetti', 'spagetti@gmail.com', '$2y$10$3igFWLEteycRXkmjHjclT.aev1xcOp8nbmgL.YEccZV8o0SOg3bxC', 550319025, 'Takeaway', '2, vvu road off accra', ''),
(2851, 'wakkyeseller', 'seller@gmail.com', '$2y$10$3eEaCd/CNomAwbN76K0j7e6bc4IdFhZXD74SSdavdB66KX9aWu5ce', 455454, 'Takeaway', '2, hjefhfe efer', ''),
(3713, 'Justine\'s delice', 'justpedasu@gmail.com', '$2y$10$hT02G8oMAX0u7WPjHBlIdOIK5RYw89Q3U8/Qjs9Ap7DjiZWHOAOTa', 543323263, 'Delivery', 'Tema ', 'uploads/67471b9f318ad_tracking.webp'),
(5575, 'MyFood', 'Daniees491@gmail.com', 'Oladipupo45', 555055, 'Dine-in', '2, ibukun oluwa str', ''),
(6448, 'abeeb', 'abeeb@gmail.com', '$2y$10$uCunugTGzhmRVWuq6GY00.wGmZGgzl4k3vMWNwE9K2CKHF5Gi4/jO', 87458745, 'Dine-in', 'nke ib334', ''),
(8377, 'Foodies', 'foodies@gmail.com', '$2y$10$i2zwvE/8ZkAfkSPF2F6byOeNbIK7n20xvVRBNPeZej1QyNfDfuUgO', 590319025, 'Takeaway', '2, food way', ''),
(8893, 'drinks', 'drink@gmail.com', '$2y$10$D0DHl5yDt4kkw2./Tm59KuqBmjUf34owSvQJuNOcaDZNlJNl8hPoq', 1234567, 'Dine-in', '2, drinks way', 'uploads/6746352fda2b6_short cocktail.jpg'),
(8947, 'Ola Food', 'Olafood@gmail.com', '$2y$10$2mUYC8YcHPuF7I0ZgcQKqe7jFvFFelq7JogbgrKOPsrR7DWw1cc1.', 594979531, 'allservice', 'valley view', 'uploads/674795c6f209b_seafood.jpg'),
(9343, 'dpaul ', 'pauladanlawo@gmail.com', '$2y$10$s98Mbj/GLjr.SGtHXXKq.e1a1AxR16LSJz.IqKyoAPkD2Q96KzxIC', 90192921, 'allservice', 'oyibi', 'uploads/6748193ba3792_WhatsApp Image 2024-11-25 at 10.35.18.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `riderID` varchar(255) NOT NULL,
  `riderName` varchar(255) NOT NULL,
  `riderEmail` varchar(255) NOT NULL,
  `riderPassword` varchar(255) NOT NULL,
  `riderContact` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`riderID`, `riderName`, `riderEmail`, `riderPassword`, `riderContact`, `address`) VALUES
('571', 'abeeb', 'ola2@gmail.com', '$2y$10$G7eugtg0f6gqAfibqskzDOszCW5i5oGOxJFcEoEV4th1Cvwp2dipu', '6667767', '2, ivdg'),
('631', 'Abeeb', 'ab@gmail.com', '$2y$10$nLYP81R3NoVaBszAHhYLSuZd0UxN.KNogaWZ0lIpaElUzT/wWpmIW', '23324343', '2,hediuu'),
('9403', 'abeeb', 'abeeb@gmail.com', '$2y$10$mLQ6urWCwWwrLQ6uR1LsCOtA8jEA6JqNJCtLIw5kLrwor7YUJVdem', '433443', '2 bduifdi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT 0.00,
  `address` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `firstname`, `password`, `email`, `gender`, `phone_number`, `amount`, `address`, `profile_image`, `created_at`, `updated_at`) VALUES
(242, 'Ibe', 'amarchi', '$2y$10$RCJAqqbSHqJ650IJRj55EuzD6Y5ofAi032BE29UwYSx9gRKAHEnSK', 'ami@gmail.com', 'female', '3322323', 0.00, NULL, NULL, '2024-11-06 10:26:46', '2024-11-11 14:36:42'),
(1326, 'ola', 'abeeb', '$2y$10$1lRtqJPBLdu4ZQb8u/kWyeFfcS/lJ2/SeCS15yN5zIxg9gTv.Lz4.', 'abe23@gmail.com', 'male', '0550319025', 0.00, NULL, NULL, '2024-11-10 17:26:36', '2024-11-11 14:36:42'),
(2045, 'okoli', 'Chidubem', '$2y$10$yVupbYTYAcRNSEYDXuQWAOGPwkuhBnZexbZb/KC5UwkHoL0On7dbO', 'okolichidubem07@gmail.com', 'male', '0594614818', 0.00, NULL, NULL, '2024-11-28 07:32:59', '2024-11-28 07:32:59'),
(2181, 'war', 'ab', '$2y$10$9XivnQ0WKVEqPLvZ/W020OljYQbAqD.cO37GUWgA7WgL3.Q5mArvO', 'abw@gmail.com', 'male', '266223', 0.00, NULL, NULL, '2024-11-06 10:25:48', '2024-11-11 14:36:42'),
(2326, 'shine', 'shine', '$2y$10$zXa2/cgoWjY7oyiSiQf5YeWLpprgO/r2p/cWXLobZ7U8WLRKunr42', 'woman@gmail.com', '0', '0594979536', 0.00, NULL, NULL, '2024-11-12 13:49:22', '2024-11-12 13:49:22'),
(2485, 'abeeb', 'sameul', '$2y$10$jAALb5Gw7/TA3Fiy2XiRMeW0KeKOEpF5dloh8woKmoC7.0.jZIw3W', 'rhhr@gmail.com', 'male', '344434', 0.00, NULL, NULL, '2024-11-06 13:38:06', '2024-11-11 14:36:42'),
(2703, 'maxwell', 'emmanuel', '$2y$10$kQYbONzsbwt6Kn37RR2NE.ILXqZCzFSb0xC6Amwb5pTPY5fmVHcPy', 'emman@tempmail.com', 'male', '264983532', 3601.00, NULL, NULL, '2024-11-21 07:54:33', '2024-11-26 19:19:27'),
(2786, 'Adanlepon', 'Paul', '$2y$10$GXumIWrC/.hbgiIz7624Yuy2sp8tfvO1N24quZInHnEzY4doewt86', 'pauladan@gmail.com', 'female', '0558838', 0.00, NULL, NULL, '2024-11-21 07:46:38', '2024-11-21 07:50:12'),
(2873, 'ibe', 'amara', '$2y$10$sxcluXy81hTInK7dGiICqee9oJfpuotoxC0SbWwBDTA3SuwiS7Fh6', 'ib@gmail.com', 'female', '98888998', 0.00, NULL, NULL, '2024-11-06 10:21:45', '2024-11-11 14:36:42'),
(3119, 'Oladipupo', 'Amara', '$2y$10$WK3F.i03kz2L7v8A8ne8WOdPxDU5x2V3o/jtZyFspH3DD4EwwnU3u', 'Oladipupoabeeb491@gmail.com', 'male', '233550319025', 0.00, NULL, NULL, '2024-11-11 09:39:58', '2024-11-14 14:21:56'),
(3382, 'pol', 'abb', '$2y$10$O0/MriBjmLxFTi2ub2w5muGBzZjc3O9lKP44fDd.ycfYTe6mCUWpW', 'pol@gmail.com', 'male', '550319025', 0.00, NULL, NULL, '2024-11-11 14:38:53', '2024-11-11 14:38:53'),
(4879, 'Amarachi', 'Okoli', '$2y$10$2Ql.AG1UDWAg1/0aYtIi8O5AHmrFXyA/s5Wl96SL8azO8inwFA6Em', 'group5@gmail.com', 'male', '050', 5000.00, 'valley view ', NULL, '2024-11-28 07:35:34', '2024-11-28 07:42:25'),
(5045, 'Ola', 'wa', '$2y$10$k0gD39z/b1MtiBTDQ9bfuOkAiB3sdcZhCrTg3TfwXASehT9AhLJP.', 'warrriiii@gmail.com', '0', '0550319025', 0.00, NULL, NULL, '2024-11-14 13:22:00', '2024-11-14 13:22:00'),
(5175, 'Ibe', 'Amara', '$2y$10$cEWitcfoN3XwgHvI0NKZBOaq6b7oCKGX6MRW2JHMbtCJE5ZYqg8C2', 'ibe@gmail.com', 'female', '32322', 0.00, NULL, NULL, '2024-11-06 10:20:17', '2024-11-11 14:36:42'),
(5307, 'Labbi', 'abbi', '$2y$10$fAU0V5C9gWdr8l11lW40Xu82o/T./VRasx/fiMkcxKnQ3tWhn2gsC', 'lal@gmail.com', '0', '984949484', 0.00, NULL, NULL, '2024-11-14 08:14:26', '2024-11-14 08:14:26'),
(5990, 'people', 'some', '$2y$10$JxkqsVVIv4U7vWjSUzRhSOQvsPq0vr84EPGfnAAOXgo1mf7I01waG', 'people@gmail.com', 'male', '0550319025', 0.00, NULL, NULL, '2024-11-10 18:10:06', '2024-11-11 14:36:42'),
(6704, 'Justine Akossiwa', 'Pedasu', '$2y$10$cYACZoVCTJ/GC9XxSpP/R.i7Yzp1YrOxTviNR77K96CCVmg6A.kUa', 'justpedasu@gmail.com', 'female', '0543323263', 0.00, '2, justine road @Justine Country', NULL, '2024-12-04 07:59:59', '2024-12-04 08:08:03'),
(7000, 'Abeeb', 'man', '$2y$10$4s1E/RJYAJjb75.htkgjEukurm78VAIEk9emBGnFjZ8wPdvQfTCF.', 'man@gmail.com', 'male', '0550319025', 0.00, NULL, NULL, '2024-11-12 12:50:05', '2024-11-12 12:50:05'),
(7209, 'amara', 'chiii', '$2y$10$4zUXMsBf03sQpuO.yY3u2ut6oLd6y9iSgm6skOfPaZZGhdzriGCL6', 'femarachi@gmail.com', 'female', '0550319025', 0.00, NULL, NULL, '2024-11-14 13:28:41', '2024-11-14 13:28:41'),
(7227, 'just', 'pedasu', '$2y$10$PORRXeIK.QzhiLAGQqxhAeDJplNKhH2vpJdEG9mGGbzXAwuaw1aw.', 'justinepedasu@gmailcom', 'female', '13032005', 0.00, NULL, NULL, '2024-12-04 08:42:58', '2024-12-04 08:42:58'),
(7347, 'paul', 'first', '$2y$10$GfbG87XUPDU9Z/cqeBHzF.VNTmWQ8JZDiFn012AqcNYRe2EOtS.ZK', 'paul@gmail.com', 'male', '0550319025', 0.00, NULL, NULL, '2024-11-10 17:34:31', '2024-11-11 14:36:42'),
(7627, 'Oladipupo', 'abeeb', '$2y$10$8QIgbNhqAXBPPCGO8uv.8.xLYgc2lOEdM9sIZc0zPyndjMhG.88Vi', 'abn@gmail.com', 'male', '0550319025', 0.00, NULL, NULL, '2024-11-10 17:27:37', '2024-11-11 14:36:42'),
(7675, 'sam', 'sam', '$2y$10$9F1Sm5KUhdtlvA0H1G9uHuVwdjDmlnBP9Vn8A9/8OJ.0rAAmiyvS6', 'Sammy@gmail.com', 'male', '58888833', 0.00, NULL, NULL, '2024-11-11 10:00:12', '2024-11-11 14:36:42'),
(8011, 'abeb', 'wehew', '$2y$10$U4aOLv6Xgb2lJV7sCVpT/u4zzKnae3DYw6HnFP08cY.JDFfYH7SfC', 'sdbsdh@gmail.com', 'male', '3478347834', 0.00, NULL, NULL, '2024-11-07 06:35:25', '2024-11-11 14:36:42'),
(8044, 'abe', 'sa', '$2y$10$SoEzuDiksCWgUE1Msf7INO2YWHZdJ5tUNKfmwHczNvBI9uD/zoud6', 'abs@gmail.com', 'male', '0550319025', 0.00, NULL, NULL, '2024-11-11 14:32:47', '2024-11-11 14:32:47'),
(8078, 'warris', 'stubborn1', '$2y$10$aDcaBBW7w7lSmZxHfjTz6OagwBexiZy0c/Q4PuvBUWdHuDKEXJG.G', 'justine1253@gmail.com', '0', '12345567', 0.00, NULL, NULL, '2024-11-14 09:35:17', '2024-11-14 11:26:04'),
(8478, 'Juju', 'Pedasu', '$2y$10$DYarAZGmqVTVf4ztzuWhyO3okhyCNgzpI8V9R/SgT7hs/7EaedraO', 'justinepedasu@gamil.com', 'female', '0543323264', 0.00, NULL, NULL, '2024-12-04 08:34:03', '2024-12-04 08:34:03'),
(9126, 'abeeb', 'wiwi', '$2y$10$2kko5ZNB463AJ7g5v2jHsulOQcKlIDq5gCmr9j7IsHkSjTR557812', 'maam@gmail.com', 'male', '2323323', 0.00, NULL, NULL, '2024-11-06 10:44:32', '2024-11-11 14:36:42'),
(65254, 'lan', 're', '$2y$10$0cKbD308mJP4f83ROFERc.Toe1poUjbnHfC2y1ZDEVct9WH0qTj5y', 'lanre@gmail.com', 'female', '233333333', 0.00, NULL, NULL, '2024-11-06 05:25:22', '2024-11-11 14:36:42'),
(68719, 'SAA', 'Muu', '$2y$10$7itXXpCOpP8a0gYpmHBZ5OfrxODlwGWF9NX8wbBVQY.6KDXUv0w4S', 'ola1232G@gmail.com', 'male', '23334334', 0.00, NULL, NULL, '2024-11-06 05:09:31', '2024-11-11 14:36:42'),
(70094, 'Abeeb', 'SAm1', 'abeeb', 'Olad@gmail.com', 'male', '23455655', 0.00, NULL, NULL, '2024-11-06 04:59:19', '2024-11-11 14:36:42'),
(77854, 'Abeeb', 'SAm', 'abeeb', 'Ola@gmail.com', 'male', '23455655', 0.00, NULL, NULL, '2024-11-06 04:55:39', '2024-11-11 14:36:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`Postid`),
  ADD KEY `restaurants_post` (`restaurantID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `fk_usercart` (`user_id`),
  ADD KEY `FK_product` (`product_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order` (`cart_id`),
  ADD KEY `fk_usersID` (`userID`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`is_default`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`R_id`),
  ADD UNIQUE KEY `R_name` (`R_name`),
  ADD UNIQUE KEY `R_email` (`R_email`),
  ADD UNIQUE KEY `R_contact` (`R_contact`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`riderID`),
  ADD UNIQUE KEY `riderEmail` (`riderEmail`),
  ADD UNIQUE KEY `riderContact` (`riderContact`),
  ADD UNIQUE KEY `address` (`address`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=659734235;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `restaurants_post` FOREIGN KEY (`restaurantID`) REFERENCES `restaurants` (`R_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`product_id`) REFERENCES `blog` (`Postid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usercart` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cartid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usersID` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
