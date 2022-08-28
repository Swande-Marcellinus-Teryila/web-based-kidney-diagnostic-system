-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 06:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kidney_diagnosis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Userlevel` int(3) NOT NULL,
  `date_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `Userlevel`, `date_created`) VALUES
(1, 'dicksonokoo@gmail.com', '123', 1, '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `id` int(20) NOT NULL,
  `low_level` varchar(500) NOT NULL,
  `high_level` varchar(600) NOT NULL,
  `date_created` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`id`, `low_level`, `high_level`, `date_created`) VALUES
(9, 'Sgsgtaeree', 'The conditiono of your kidney is critical, please go for treatmment immediately', 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE `test_questions` (
  `id` int(100) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option1` varchar(50) NOT NULL DEFAULT 'Not at all',
  `option2` varchar(50) NOT NULL DEFAULT 'Rarely',
  `option3` varchar(50) NOT NULL DEFAULT 'Often',
  `option4` varchar(50) NOT NULL DEFAULT 'Always',
  `causes` varchar(700) NOT NULL,
  `date_created` varchar(6) NOT NULL DEFAULT current_timestamp(),
  `chronic_kidney_status` int(1) NOT NULL,
  `acute_kidney_status` int(1) NOT NULL,
  `kidney_stone_status` int(1) NOT NULL,
  `Glomerulonephritis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `causes`, `date_created`, `chronic_kidney_status`, `acute_kidney_status`, `kidney_stone_status`, `Glomerulonephritis`) VALUES
(10, 'Do you vomit', 'Not at all', 'Rarely', 'Often', 'Always', '', '2021-1', 1, 0, 1, 0),
(11, 'Do you have sleeping problem', 'Not at all', 'Rarely', 'Often', 'Always', '', '2021-1', 1, 0, 0, 0),
(12, 'Do you experience fatigue and weakness of the body?', 'Not at all', 'Rarely', 'Often', 'Always', '', '2021-1', 1, 1, 0, 0),
(13, 'Do you notice a decreased urine output?', 'Not at all', 'Rarely', 'Often', 'Always', '', '2021-1', 1, 1, 0, 0),
(14, 'Do you notice blood in your urine', 'Not at all', 'Rarely', 'Often', 'Always', '', '2021-1', 1, 1, 0, 0),
(15, 'Is your urine cola-coloured?', 'Not at all', 'Rarely', 'Often', 'Always', '', '2021-1', 1, 0, 0, 1),
(16, 'Is your Urine foamy?', 'Not at all', 'Rarely', 'Often', 'Always', '', '2021-1', 1, 0, 0, 1),
(17, 'Are you suffering from hypertension?', 'Not at all', 'Rarely', 'Often', 'Always', '', '2021-1', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `full_name` varchar(45) NOT NULL,
  `password` varchar(11) NOT NULL,
  `age` int(20) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `full_name`, `password`, `age`, `date_created`) VALUES
(2, 'dickson@gmail.com', 'Okoo dickson', '123', 28, '0000-00-00'),
(3, 'marcelo@gmail.com', 'Favour Friday', '123', 56, '0000-00-00'),
(4, 'dickson1@gmail.com', 'swande', '123', 56, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test_questions`
--
ALTER TABLE `test_questions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
