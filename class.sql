-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 12:05 PM
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
-- Database: `class`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_status` int(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_message` text NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `user_status`, `image`, `phone`, `about`, `login`, `password`, `last_message`, `time`, `subject`) VALUES
(1, 'Чат класу', 0, '', '', 'Чат класу', '', '', '2', '00:00:00', ''),
(2, 'Андрій Петров', 0, '/images/02.png', '+38032547544', 'Я учень 8-Б классу школи № 1', 'a@a.a', 'a', 'ee', '23:00:00', ''),
(3, 'Василь Іванов', 0, '/images/03.png', '+38024573154', 'Я учень 8-Б классу школи № 1', 'i@i.i', 'i', '1', '23:00:00', ''),
(4, 'Петрова Надія Василівна', 1, '/images/04.png', '+38043157245', 'Я вчитель фізики в школі № 1', 'n@n.n', 'n', '2', '00:00:00', 'Фізика'),
(6, 'Юлія Кавицька', 0, '', '0935951018', '1', 'julia.k106.l7@gmail.com', '1', '2', '10:37:56', ''),
(8, 'Юлія Кавицька', 1, '', '0930000000', 'q', 'q@q.q', 'q', 'Доброго ранку', '11:38:06', 'Українська мова та література'),
(9, 'e', 1, '', 'e', 'e', 'e@e', 'tbbe', '111', '14:38:35', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(10) NOT NULL,
  `subject` int(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `homework` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `subject`, `day`, `homework`) VALUES
(1, 4, '10.11.2020', 'Прочитати параграф 5'),
(2, 4, '8.10.2020', 'Виконати вправи 11 та 12 на стр 126');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `time_1` varchar(255) NOT NULL,
  `time_2` varchar(255) NOT NULL,
  `break` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `time_1`, `time_2`, `break`) VALUES
(1, '8:00', '8:45', 10),
(2, '8:55', '9:40', 10),
(3, '9:50', '10:35', 15),
(4, '10:50', '11:35', 15),
(5, '11:50', '12:35', 10),
(6, '12:45', '13:30', 10),
(7, '13:40', '14:25', 10),
(8, '14:35', '15:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `recipient_id`, `message`, `time`) VALUES
(1, 2, 3, 'Привіт', '00:00:00'),
(2, 2, 3, 'Зробив домашку?', '00:00:00'),
(3, 3, 2, 'Привіт ще ні', '00:00:00'),
(4, 2, 1, '11111', '00:00:00'),
(5, 4, 2, 'Вам 2 за дз! Воно списане!', '22:49:56'),
(6, 2, 4, 'Може домовимось?', '22:49:43'),
(7, 2, 1, '22222', '23:00:23'),
(8, 3, 1, '3333', '23:00:23'),
(9, 2, 3, '23.05', '23:05:56'),
(10, 2, 3, '23/06', '23:06:32'),
(11, 2, 3, '23.07', '23:07:13'),
(12, 2, 3, '8', '23:07:49'),
(13, 2, 3, '8', '23:07:56'),
(14, 2, 3, '23', '23:08:20'),
(15, 2, 3, '13', '23:13:28'),
(16, 2, 3, '14', '23:14:23'),
(17, 2, 3, '15', '23:15:24'),
(18, 2, 3, '16', '23:16:30'),
(19, 2, 3, 'Ура! оно отправляет!', '23:16:48'),
(20, 2, 4, '1', '23:18:16'),
(21, 2, 3, 'kyky', '23:24:30'),
(22, 2, 3, '1', '23:25:18'),
(23, 2, 3, 'lalla', '23:25:38'),
(24, 2, 3, '111', '23:26:19'),
(25, 2, 3, '2', '23:42:57'),
(26, 2, 3, '3', '23:28:48'),
(27, 2, 3, '4', '23:29:48'),
(28, 2, 3, '5', '23:30:36'),
(29, 2, 3, '6', '23:32:05'),
(30, 2, 3, '7', '23:33:55'),
(31, 2, 3, '7', '23:34:01'),
(32, 2, 3, '8', '23:36:45'),
(33, 2, 3, '8', '23:37:25'),
(34, 2, 3, '9', '23:38:48'),
(35, 2, 3, '3', '23:40:35'),
(36, 2, 3, '1234', '23:41:44'),
(37, 2, 3, '11', '23:42:10'),
(38, 2, 3, '12', '23:43:14'),
(39, 2, 3, '1', '23:44:06'),
(40, 2, 3, '12', '23:45:07'),
(41, 2, 3, '13', '23:45:20'),
(42, 2, 3, '1', '23:47:01'),
(43, 2, 3, '1', '23:48:01'),
(44, 2, 3, '1', '23:49:38'),
(45, 2, 3, '1', '23:53:14'),
(46, 2, 3, '1', '23:53:29'),
(47, 2, 3, '2', '23:57:50'),
(48, 2, 3, '2', '23:57:58'),
(49, 2, 3, '1', '00:00:25'),
(50, 2, 3, '2', '00:01:16'),
(51, 2, 3, '3', '00:01:43'),
(52, 2, 3, '1', '00:03:36'),
(53, 2, 3, '2', '00:04:08'),
(54, 2, 3, '06', '00:06:37'),
(55, 2, 8, 'Доброго ранку', '00:10:22'),
(56, 4, 2, 'батьків в школу!', '00:12:06'),
(57, 2, 6, 'Привіт!', '11:27:20'),
(58, 2, 2, 'закладки', '11:27:40'),
(59, 6, 1, 'myr', '11:50:46'),
(60, 6, 1, 'rere', '11:51:02'),
(61, 6, 2, 'ee', '11:51:16'),
(62, 6, 3, '1', '11:51:20'),
(63, 6, 1, '11', '11:54:27'),
(64, 6, 1, '2', '11:55:10'),
(65, 6, 4, '1', '12:35:37'),
(66, 6, 4, '2', '12:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(20) NOT NULL,
  `student_id` int(10) NOT NULL,
  `date` varchar(250) NOT NULL,
  `rating` int(10) NOT NULL,
  `subject` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `student_id`, `date`, `rating`, `subject`) VALUES
(1, 2, '', 10, 4),
(2, 2, '10.11.2020', 8, 4),
(4, 2, '2020-10-10', 3, 4),
(6, 2, '2020-10-10', 7, 4),
(7, 2, '2020-15-10', 9, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
