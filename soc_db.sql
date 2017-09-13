-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 септ 2017 в 19:45
-- Версия на сървъра: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soc_db`
--

-- --------------------------------------------------------

--
-- Структура на таблица `albums`
--

CREATE TABLE `albums` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  `cover_photo` varchar(100) DEFAULT NULL,
  `description` varchar(2550) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `albums`
--

INSERT INTO `albums` (`id`, `name`, `user_id`, `cover_photo`, `description`, `created_at`, `updated_at`) VALUES
(10, 'Cars', 7, '256313007232_10208948227523730_3757468486341998495_n.jpg', 'A car (or automobile) is a wheeled motor vehicle used for transportation. Most definitions of car say they run primarily on roads, seat one to eight people, have four tires, and mainly transport.', '2017-09-11 15:28:19', '2017-09-11 15:28:19'),
(11, 'slivi', 7, '438513312845_141199432962649_5174086846422340027_n.jpg', 'album za slivi', '2016-10-17 21:54:27', '2016-10-17 21:54:27'),
(12, '', 9, '170313312845_141199432962649_5174086846422340027_n.jpg', 'mnooogo jeni', '2016-10-18 07:57:39', '2016-10-18 07:57:39'),
(13, 'jeni', 9, '837013312845_141199432962649_5174086846422340027_n.jpg', 'mnooogo jeni', '2016-10-17 22:48:22', '2016-10-17 22:48:22'),
(14, 'jeni', 9, '938413312845_141199432962649_5174086846422340027_n.jpg', 'mnooogo jeni', '2016-10-17 22:49:16', '2016-10-17 22:49:16'),
(15, 'jeni', 9, '499313312845_141199432962649_5174086846422340027_n.jpg', 'mnooogo jeni', '2016-10-17 22:49:28', '2016-10-17 22:49:28'),
(16, 'dsadsa', 9, '956513339578_276414022710725_1322819021754599765_n.jpg', 'dsadas', '2016-10-17 22:49:44', '2016-10-17 22:49:44');

-- --------------------------------------------------------

--
-- Структура на таблица `album_comments`
--

CREATE TABLE `album_comments` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED DEFAULT NULL,
  `album_id` int(6) UNSIGNED DEFAULT NULL,
  `comment_text` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `album_comment_status`
--

CREATE TABLE `album_comment_status` (
  `id` int(6) UNSIGNED NOT NULL,
  `comment_id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `album_status`
--

CREATE TABLE `album_status` (
  `id` int(6) UNSIGNED NOT NULL,
  `album_id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE `posts` (
  `id` int(6) UNSIGNED NOT NULL,
  `album_id` int(6) UNSIGNED DEFAULT NULL,
  `user_id` int(6) UNSIGNED DEFAULT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` varchar(100) DEFAULT NULL,
  `tag1` int(6) DEFAULT NULL,
  `tag2` int(6) DEFAULT NULL,
  `tag3` int(6) DEFAULT NULL,
  `location` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`id`, `album_id`, `user_id`, `text`, `created_at`, `updated_at`, `photo`, `tag1`, `tag2`, `tag3`, `location`) VALUES
(94, 10, 9, 'dsadsadas', '2017-03-23 15:59:11', '2017-03-23 15:59:11', '1654258d3f0cf7829b7.07696792.jpg', NULL, NULL, NULL, ''),
(95, 10, 13, 'test', '2017-08-28 17:01:54', '2017-08-28 17:01:54', '2706659a44c8290f2b4.47288766.jpg', NULL, NULL, NULL, ''),
(96, 10, 13, '#meduzi ima li ', '2017-08-28 17:02:10', '2017-09-12 16:06:09', '2247259a44c920c9fb3.87121583.jpg', NULL, NULL, NULL, ''),
(97, 10, 11, 'dsads', '2017-08-28 17:10:22', '2017-08-28 17:10:22', '1736159a44e7e76d336.65796135.jpg', NULL, NULL, NULL, ''),
(98, 10, 11, 'dasdsa', '2017-08-28 17:11:39', '2017-08-28 17:11:39', '1946959a44ecbefacb9.18910298.jpg', NULL, NULL, NULL, ''),
(99, 10, 11, 'dsadsa', '2017-08-29 12:29:07', '2017-08-29 12:29:07', '1205359a55e13cd6b89.38698092.jpg', NULL, NULL, NULL, 'test'),
(100, 10, 11, '#dsadsa', '2017-08-29 14:18:28', '2017-09-12 22:04:25', '1354459a577b3cfaa99.15086693.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria'),
(101, 10, 11, 'dsadsa', '2017-08-29 14:19:11', '2017-08-29 14:19:11', '3074259a577dfd03413.73611948.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria'),
(102, 10, 11, 'dsadsa', '2017-08-29 14:22:54', '2017-08-29 14:22:54', '2295059a578bde3e1a3.03600419.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria'),
(103, 10, 11, 'dsadsa', '2017-08-29 14:24:39', '2017-08-29 14:24:39', '1428159a57927787be1.38011584.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria'),
(104, 14, 11, 'dsadsa', '2017-08-29 14:56:41', '2017-08-29 14:56:41', '2453659a580a94aaef8.56408889.jpg', 2, NULL, NULL, 'Sofia, Bulgaria'),
(105, 10, 11, 'This #is test text for post.', '2017-09-07 09:46:22', '2017-09-12 22:04:34', '398859b1156e8d1133.37302541.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria'),
(106, 10, 13, 'Психологически тестове, проведени през есента на 2014 г. в Института за психично здраве в Руската академия за медицински науки разкриват.', '2017-09-07 20:15:01', '2017-09-10 16:45:13', '2712859b1a8c55602d7.25704182.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria'),
(107, 10, 11, 'dsadsa', '2017-09-08 15:40:15', '2017-09-08 15:40:15', '1943859b2b9ded4bef1.39670493.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria'),
(108, 10, 13, 'Коалата (Phascolarctos cinereus) двуутробно растителноядно животно, живеещо по дърветата само и единствено в Австралия. ', '2017-09-09 12:45:39', '2017-09-10 16:44:49', '2648959b3e2736b4d49.34407763.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria'),
(109, 15, 11, 'dadsa', '2017-09-11 14:34:56', '2017-09-11 14:34:56', '2049759b69f10177c87.07874140.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria'),
(110, 15, 11, 'dadsa', '2017-09-11 14:34:58', '2017-09-11 14:34:58', '1010359b69f12564785.03876975.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria'),
(111, 15, 11, 'dadsa', '2017-09-11 14:35:19', '2017-09-11 14:35:19', '2944259b69f27886d08.20885664.jpg', NULL, NULL, NULL, 'Sofia, Bulgaria');

-- --------------------------------------------------------

--
-- Структура на таблица `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED DEFAULT NULL,
  `post_id` int(6) UNSIGNED DEFAULT NULL,
  `comment_text` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `post_comments`
--

INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `comment_text`, `created_at`) VALUES
(1, 13, 104, 'test', '2017-09-07 20:14:35'),
(2, 11, 96, 'dsadsa', '2017-09-09 12:29:47'),
(3, 11, 95, 'test', '2017-09-10 07:58:38'),
(4, 11, 96, 'dsadsa', '2017-09-10 16:52:21'),
(5, 11, 95, 'dadsadsa', '2017-09-11 12:41:20'),
(6, 11, 95, 'xczxz', '2017-09-11 12:41:24'),
(7, 11, 95, 'cxzczxcxz', '2017-09-11 12:41:28');

-- --------------------------------------------------------

--
-- Структура на таблица `post_comment_status`
--

CREATE TABLE `post_comment_status` (
  `id` int(6) UNSIGNED NOT NULL,
  `comment_id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `post_comment_status`
--

INSERT INTO `post_comment_status` (`id`, `comment_id`, `user_id`, `status`) VALUES
(1, 2, 11, 'like');

-- --------------------------------------------------------

--
-- Структура на таблица `post_status`
--

CREATE TABLE `post_status` (
  `id` int(6) NOT NULL,
  `post_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `post_status`
--

INSERT INTO `post_status` (`id`, `post_id`, `user_id`, `status`) VALUES
(1, 29, 1, 'like'),
(2, 24, 1, 'dislike'),
(3, 36, 1, 'like'),
(4, 43, 1, 'delete'),
(5, 3, 1, 'dislike'),
(6, 4, 1, 'like'),
(7, 39, 1, 'like'),
(8, 38, 1, 'like'),
(9, 48, 1, 'dislike'),
(10, 49, 1, 'like'),
(11, 55, 9, 'delete'),
(12, 56, 7, 'delete'),
(13, 52, 1, 'dislike'),
(14, 57, 9, 'like'),
(15, 57, 7, 'like'),
(16, 24, 7, 'like'),
(17, 94, 7, 'delete'),
(18, 94, 11, 'like'),
(19, 104, 13, 'dislike'),
(20, 106, 11, 'like'),
(21, 108, 11, 'like'),
(22, 96, 11, 'like'),
(23, 95, 11, 'dislike');

-- --------------------------------------------------------

--
-- Структура на таблица `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(6) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `post_tag`
--

INSERT INTO `post_tag` (`id`, `name`) VALUES
(1, 'Art'),
(2, 'Tatoos'),
(3, 'Nature'),
(4, 'Landscape'),
(5, 'Animals'),
(6, 'Food'),
(7, 'Portrait'),
(8, 'Hair'),
(9, 'Fashion'),
(10, 'Cars'),
(11, 'Military'),
(12, 'Architectu'),
(13, 'Fantasy'),
(14, 'Sci-Fi'),
(15, 'Space'),
(16, 'Science');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `created_at`) VALUES
(1, 'test', 'test', 'Name', 'Surname', 'mymail@e.mail', '2016-10-11 11:50:42'),
(3, 'test2', 'test22', 'Name222', 'Surname4444', 'mymail@email.mail', '2016-10-11 11:50:42');

-- --------------------------------------------------------

--
-- Структура на таблица `users2`
--

CREATE TABLE `users2` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `users2`
--

INSERT INTO `users2` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `created_at`, `updated_at`, `remember_token`, `profile_pic`, `description`) VALUES
(1, 'laravel', '$2y$10$FxPcDTzrvzEtjUxel8p/0O6W8UYiga31Ww2Yw6llrftRc24SySV4S', 'Ivan', 'Stefanov', 'ivan@abv.bg', '2017-09-11 18:27:47', '2016-10-17 12:49:20', 'VIxHUQvPQIkwxDQPNIAP22dk4cGDcDzByXStYmooOX4XtvbxW0gIeNQZ9nVX', 'C:\\xampp\\htdocs\\Social_Network\\resources\\uploads\\6674error.png', NULL),
(2, 'test', 'test', 'Name', 'Surname', 'mymail@e.mail', '2016-10-11 11:52:22', '0000-00-00 00:00:00', 'token', NULL, NULL),
(4, 'NewUser', '$2y$10$6FwqsdSaIqPqG4uP0sz9auYjPDunWVIPMuebE7.EGHhauXo1iBzlO', 'New', 'Userov', 'new_user@user.new', '2016-10-16 16:05:33', '2016-10-16 13:05:33', '1DpFK9tr5mYbzIdkAtjT2j4h984H1Ww2X1m87NRMNGw7ZZAZeJuUJJK38RAe', NULL, NULL),
(5, 'baba', '$2y$10$CgY4dmTR4SfoEj7FiDkWfeRh8PFo8ZpMIrf90I7YsLmwKwUky8LN6', 'Baba', 'Babata', 'babata@abv.bg', '2016-10-17 13:45:20', '2016-10-17 10:45:20', 'UBhoixZdEjVuEnPnNPRNYLulzfpURAA2g4b4oTWgyz597yretY1KMadoL9wQ', NULL, NULL),
(6, 'dqdo', '$2y$10$ye2Gt9otUeOj4MnODJI3zO5dgj1BRou.WlkV/hdzVlh1cagUx.s8S', 'Dqdo', 'Dqdov', 'dqdo@abv.bg', '2017-09-11 19:46:29', '2016-10-17 11:27:48', '1NZx2vorPacYAWAapPW9fWdbMqZUd3Uewcu2LD56bcul7W61m1QYEl1AuNmC', '', NULL),
(7, 'deadshark', '$2y$10$OVIuN4Suj4lQmkCgDGPtoO7Fb2Bkm1o5.C4nw44/XSGXnC.y/V2GO', 'Vanio', 'Todorov', 'deadshark@abv.bg', '2017-08-28 06:18:36', '2017-08-28 03:18:36', 'fHfMx2y3XsCcQ2PXWP7kyfYLPZFM14PkmAfeM6jIubj63Du4yiWd9UdOJWsY', 'D:\\xampp\\htdocs\\ivan_forma\\resources\\uploads\\32097599d8a832c9494.44951607.jpg', NULL),
(8, 'gosho', '$2y$10$eVX8pIZPC9NXU/InuG3GDeQzGZkTLZyurqcdCLYtKRSjuS7Z7a.J.', 'Gosho', 'Goshov', 'gosho@abv.bg', '2016-10-17 14:31:38', '2016-10-17 11:31:38', '2Nz9jkz3CZyBDLQqKmZNvtQ5QvUt5GGeH7zLWh5CsieQRcCxPZ4JyiYHLao7', NULL, NULL),
(9, 'elena', '$2y$10$tE1ONwWZGA7RxAzYSkvC2ukEYx98GlRtAJDwy9A6/2O2wtudmJt76', 'Elena', 'Elenova', 'elena@abv.bg', '2017-03-23 15:59:23', '2017-03-23 13:59:23', 'zrZT6hecqNPPNAtvbuE2q6bfisq2zNpozAkeLovZ8q8t1YYfe4PL2qZ4tBOG', 'C:\\xampp\\htdocs\\ittalents\\Final\\social_lara\\ivan_forma\\resources\\uploads\\82313007232_10208948227523730_3757468486341998495_n.jpg', NULL),
(11, 'baba', '$2y$10$JSbstufjjBH/C1ZXP5ztouF/1bPvUBmO3FFzytvHLOGx2p.tuww1C', 'Ivan', 'Asenov', 'deadshark2@abv.bg', '2017-09-13 15:10:12', '2017-09-12 12:26:37', 'sjOHoJDnanruDqOkbc4HrPIGhE47Wvc5AXfQXLwjBlgSJYg1dTByBpFpO9kA', 'D:\\xampp\\htdocs\\ivan_forma\\resources\\uploads\\2769959b94a54313e45.78107343.jpg', 'Tova e test description for me.'),
(12, 'ahaaaa', '$2y$10$CWiWn/DaKU6DxY98eUyKyO24aFm/2jhrZa.8QxxvZjIqHl0QVogAy', 'aha', 'ahaa', 'aha@abv.bg', '2017-08-29 14:53:51', '2017-08-29 11:53:51', 'ptfBcruQiaoIRf1HJS1bfwOiVCHWOseAg7XZB8CMs9fGVzGaihiEmAmcfvbV', '..\\resources\\uploads\\default.jpg', NULL),
(13, 'follow', '$2y$10$Q8LXRKHXEZfBowxTgXvfz.WDNzJubA2vZuMZWZ8FOqpCbDKekMwiy', 'Asen', 'Stoqnov', 'follow@abv.bg', '2017-09-11 19:01:38', '2017-09-11 16:01:38', 'BSm5COpq0xHaq5bskAFRaKXGPdKAtEeHMwmVzzlu91tT6CY9mp0gOnynAXTs', 'D:\\xampp\\htdocs\\ivan_forma\\resources\\uploads\\2637259b506e6244e60.28240152.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ');

-- --------------------------------------------------------

--
-- Структура на таблица `users_friends`
--

CREATE TABLE `users_friends` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  `friend_id` int(6) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `users_friends`
--

INSERT INTO `users_friends` (`id`, `user_id`, `friend_id`, `created_at`) VALUES
(3, 1, 1, '2016-10-17 10:48:03'),
(20, 1, 5, '2016-10-17 14:02:12'),
(22, 1, 5, '2016-10-17 14:02:23'),
(24, 9, 8, '2016-10-17 14:37:42'),
(26, 9, 11, '2017-09-13 14:43:36'),
(27, 7, 2, '2016-10-17 14:59:01'),
(28, 7, 1, '2016-10-17 14:59:01'),
(29, 7, 1, '2016-10-17 14:59:02'),
(30, 1, 7, '2016-10-17 15:48:54'),
(31, 9, 7, '2016-10-17 21:57:37'),
(32, 9, 1, '2016-10-17 22:41:04'),
(33, 9, 11, '2017-09-13 14:43:13'),
(34, 9, 4, '2017-03-23 15:58:37'),
(35, 9, 5, '2017-03-23 15:58:39'),
(36, 7, 11, '2017-09-13 14:43:06'),
(40, 11, 9, '2017-08-28 12:17:10'),
(58, 13, 11, '2017-08-28 15:05:31'),
(83, 11, 5, '2017-09-11 18:40:35'),
(86, 13, 13, '2017-09-13 14:40:51'),
(90, 13, 8, '2017-09-13 14:41:36'),
(97, 11, 7, '2017-09-13 09:17:18'),
(98, 11, 2, '2017-09-13 09:17:21'),
(99, 11, 13, '2017-09-13 09:25:13'),
(100, 11, 4, '2017-09-13 14:42:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `album_comments`
--
ALTER TABLE `album_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_fk_user_id_idx` (`user_id`),
  ADD KEY `album_comments_fk_album_id_idx` (`album_id`);

--
-- Indexes for table `album_comment_status`
--
ALTER TABLE `album_comment_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_comments_status_fk_user_id_idx` (`user_id`),
  ADD KEY `album_comments_status_fk_comment_id_idx` (`comment_id`);

--
-- Indexes for table `album_status`
--
ALTER TABLE `album_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_album_id_idx` (`album_id`),
  ADD KEY `fk_user_id_idx` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `posts_ibfk_t1_idx` (`tag1`),
  ADD KEY `posts_ibfk_t2_idx` (`tag2`),
  ADD KEY `posts_ibfk_t3_idx` (`tag3`),
  ADD KEY `posts_ibfk_1_idx` (`user_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `post_comments_ibfk_1_idx` (`user_id`);

--
-- Indexes for table `post_comment_status`
--
ALTER TABLE `post_comment_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_id_idx` (`comment_id`),
  ADD KEY `post_comment_fk_user_id_idx` (`user_id`);

--
-- Indexes for table `post_status`
--
ALTER TABLE `post_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_friends`
--
ALTER TABLE `users_friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_idx` (`user_id`),
  ADD KEY `fk_friend_id_idx` (`friend_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `album_comments`
--
ALTER TABLE `album_comments`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `album_comment_status`
--
ALTER TABLE `album_comment_status`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `album_status`
--
ALTER TABLE `album_status`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post_comment_status`
--
ALTER TABLE `post_comment_status`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post_status`
--
ALTER TABLE `post_status`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_friends`
--
ALTER TABLE `users_friends`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users2` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `album_comments`
--
ALTER TABLE `album_comments`
  ADD CONSTRAINT `album_comments_fk_album_id` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `album_comments_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users2` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `album_comment_status`
--
ALTER TABLE `album_comment_status`
  ADD CONSTRAINT `album_comments_status_fk_comment_id` FOREIGN KEY (`comment_id`) REFERENCES `album_comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `album_comments_status_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users2` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `album_status`
--
ALTER TABLE `album_status`
  ADD CONSTRAINT `fk2_user_id` FOREIGN KEY (`user_id`) REFERENCES `users2` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_album_id` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_t1` FOREIGN KEY (`tag1`) REFERENCES `post_tag` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `posts_ibfk_t2` FOREIGN KEY (`tag2`) REFERENCES `post_tag` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `posts_ibfk_t3` FOREIGN KEY (`tag3`) REFERENCES `post_tag` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `posts_ibkf_2` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users2` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `post_comment_status`
--
ALTER TABLE `post_comment_status`
  ADD CONSTRAINT `fk_comment_id` FOREIGN KEY (`comment_id`) REFERENCES `post_comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comment_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users2` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `users_friends`
--
ALTER TABLE `users_friends`
  ADD CONSTRAINT `fk_friend_id` FOREIGN KEY (`friend_id`) REFERENCES `users2` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users2` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
