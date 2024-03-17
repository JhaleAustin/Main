-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 07:03 PM
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
-- Database: `sps_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `choices_text` varchar(255) NOT NULL,
  `letter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `choices_text`, `letter`) VALUES
(1, 1, ' zxzxxzxz', 'a'),
(2, 1, ' ', 'b'),
(3, 1, ' xzxzxz', 'c'),
(4, 1, ' xzxxx', 'd'),
(5, 2, ' cxc', 'a'),
(6, 2, ' ', 'b'),
(7, 2, ' cxcx', 'c'),
(8, 2, ' cxcx', 'd'),
(9, 3, ' xccx', 'a'),
(10, 3, ' cxccx', 'b'),
(11, 3, ' ccxccx', 'c'),
(12, 3, ' cxcxcx', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`) VALUES
(1, 'cxcx'),
(2, 'cxcx'),
(3, 'cxcx');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` int(10) NOT NULL,
  `NIP` int(10) NOT NULL,
  `lecture_name` varchar(255) NOT NULL,
  `lecture_email` varchar(255) NOT NULL,
  `course_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `NIP`, `lecture_name`, `lecture_email`, `course_id`) VALUES
(1, 2, 'vcc', 'vcvcv@sdsdd.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(10) NOT NULL,
  `lecturer_id` int(10) NOT NULL,
  `question` varchar(255) NOT NULL,
  `question_weight` int(255) NOT NULL,
  `answer_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `lecturer_id`, `question`, `question_weight`, `answer_key`) VALUES
(1, 1, ' xzxxzzxx', 112, 'C'),
(2, 1, ' xcxc', 122, 'C'),
(3, 1, ' cxcx', 22, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mdname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `role_as` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `mdname`, `gender`, `email`, `password`, `phone`, `role_as`) VALUES
(8, 'kenuard', 'gabutero', 'M', 'Male', 'kenuard_gabutero@gmail.com', '123qwe', 2147483647, 1),
(9, 'benward', 'hindisibenward', 'benben', 'Male', 'benward@gmail.com', '123', 2147483647, 0),
(10, 'kingward', 'ward', 'king', 'Male', 'kingward@gmail.com', '123', 2147483647, 0),
(11, 'angge', 'angeline', 'garcia', 'Female', 'angeline@gmail.com', '123', 2147483647, 0),
(12, 'enzo', 'arguelles', 'A', 'Male', 'enzobenzo@gmail.com', '123', 2147483647, 0),
(13, 'user', 'usertest', 'w', 'Male', 'user@gmail.com', '123', 2147483647, 0),
(14, 'jose', 'kiss', 'Q', 'Male', 'jose@gmail.com', '123', 2147483647, 0),
(15, 'admin', 'main', 'A', 'Male', 'admin@gmail.com', '123', 2147483647, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_apply`
--

CREATE TABLE `user_apply` (
  `id` int(11) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `mdname` varchar(191) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(12) NOT NULL,
  `image` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
