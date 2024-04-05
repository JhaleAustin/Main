-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 01:20 PM
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
-- Table structure for table `application_data`
--

CREATE TABLE `application_data` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `option_selected` text DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `reference_number` varchar(50) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `application_data`
--

INSERT INTO `application_data` (`id`, `type`, `option_selected`, `name`, `email`, `address`, `phone`, `reference_number`, `submission_date`, `password`) VALUES
(32, 'shs', '', 'Athea marie Deocampo Hisu-an', 'atheahisuan36@gmail.com', '259 M.L.Q ST P-4 LOWER BICUTAN', '+639568441798', '660fcc5192fec', '2024-04-05 10:03:04', ''),
(33, 'shs', '', 'Athea marie Deocampo Hisu-an', 'atheahisuan36@gmail.com', '259 M.L.Q ST P-4 LOWER BICUTAN', '+639568441798', '660fcd664463b', '2024-04-05 10:07:38', '0WvAj7ML'),
(34, 'shs', 'Academic:Humanities and Social Sciences (HUMSS)', 'Athea marie Deocampo Hisu-an', 'atheahisuan36@gmail.com', '259 M.L.Q ST P-4 LOWER BICUTAN', '+639568441798', '660fcdf7a39dc', '2024-04-05 10:10:06', 'BUR9hesW'),
(35, 'shs', 'DAcademic:General Academic strand(GAS)', 'Athea marie Deocampo Hisu-an', 'atheahisuan36@gmail.com', '259 M.L.Q ST P-4 LOWER BICUTAN', '+639568441798', '660fcfbe8e1f8', '2024-04-05 10:17:39', ''),
(36, 'shs', 'Academic:Humanities and Social Sciences (HUMSS)', 'Athea marie Deocampo Hisu-an', 'atheahisuan36@gmail.com', '259 M.L.Q ST P-4 LOWER BICUTAN', '+639568441798', '660fd014ea2e3', '2024-04-05 10:19:06', '');

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
(5, 'cxcxxc'),
(6, 'czzxcxxc'),
(7, 'zccccxxc');

-- --------------------------------------------------------

--
-- Table structure for table `examdetails`
--

CREATE TABLE `examdetails` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `ExamName` varchar(255) DEFAULT NULL,
  `numberQ` int(11) DEFAULT NULL,
  `startExam` datetime DEFAULT NULL,
  `EndExam` datetime DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `examPass` varchar(50) DEFAULT NULL,
  `CourseStrand` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`, `course`, `date`, `time`) VALUES
(1, 'dsds', 'sdsd', '2024-03-21', '01:37:00'),
(2, 'dsds', 'BSIT', '2024-04-24', '18:43:00'),
(3, 'dsds', 'BSIT', '0000-00-00', '00:00:00');

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
(8, 'sdsd', 'sds', 'M', 'dssd', 'sdds', '123qwe', 342313, 1),
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
-- Indexes for table `application_data`
--
ALTER TABLE `application_data`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `examdetails`
--
ALTER TABLE `examdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
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
-- AUTO_INCREMENT for table `application_data`
--
ALTER TABLE `application_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `examdetails`
--
ALTER TABLE `examdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `examdetails`
--
ALTER TABLE `examdetails`
  ADD CONSTRAINT `examdetails_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
