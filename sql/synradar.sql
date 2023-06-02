-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 07:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `synradar`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'india'),
(2, 'India'),
(3, 'india'),
(4, 'pak'),
(5, 'sri'),
(6, 'america'),
(7, 'japan');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `dept_details` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `dept_details`) VALUES
(1, 'IT', 'Information Technology'),
(2, 'Support', ''),
(3, 'HR', 'Human Resource'),
(4, 'Test', 'Cyber Testing'),
(5, 'department', 'details');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_details` varchar(200) DEFAULT NULL,
  `fk_dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `emp_details`, `fk_dept_id`) VALUES
(1, 'Raju', '', 1),
(2, 'Mohan', '', 4),
(3, 'Ganesh', '', 2),
(4, 'Ram', '', 2),
(5, 'Shilpi', '', 1),
(6, 'Priya', 'HR Manager', 3);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_type` enum('One Time','Monthly') NOT NULL DEFAULT 'One Time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `pro_name`, `pro_type`) VALUES
(1, 'HP project', 'One Time'),
(2, 'SBI project', 'Monthly'),
(3, 'ICICI project', 'Monthly'),
(4, 'Mumbai Police', 'One Time');

-- --------------------------------------------------------

--
-- Table structure for table `project_emp`
--

CREATE TABLE `project_emp` (
  `id` int(11) NOT NULL,
  `fk_pro_id` int(11) NOT NULL,
  `fk_emp_id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_emp`
--

INSERT INTO `project_emp` (`id`, `fk_pro_id`, `fk_emp_id`, `role`) VALUES
(1, 1, 1, ''),
(2, 2, 1, 'Main'),
(3, 2, 3, 'Support'),
(4, 3, 3, ''),
(5, 3, 4, ''),
(6, 3, 5, 'Support'),
(7, 4, 4, 'Developer'),
(8, 4, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `rep_title` varchar(200) NOT NULL,
  `fk_pro_id` int(11) DEFAULT NULL,
  `fk_emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `rep_title`, `fk_pro_id`, `fk_emp_id`) VALUES
(1, 'Report 1', 1, 1),
(2, 'Report 2', 1, 1),
(3, 'Report 3', 2, 3),
(4, 'Report 4', 4, 4),
(5, 'Report 5', 2, 1),
(6, 'Report 6', 3, 3),
(7, 'Report 7', 3, 4),
(8, 'Report 8', 4, 5),
(9, 'Report 9', 4, 5),
(10, 'Report 10', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rep_task`
--

CREATE TABLE `rep_task` (
  `id` int(11) NOT NULL,
  `fk_rep_id` int(11) NOT NULL,
  `fk_task_id` int(11) NOT NULL,
  `fk_emp_id` int(11) NOT NULL,
  `repeated` enum('Yes','No') DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rep_task`
--

INSERT INTO `rep_task` (`id`, `fk_rep_id`, `fk_task_id`, `fk_emp_id`, `repeated`) VALUES
(1, 1, 3, 1, 'No'),
(2, 1, 7, 1, 'No'),
(3, 2, 3, 1, 'No'),
(4, 2, 6, 1, 'No'),
(5, 3, 2, 3, 'Yes'),
(6, 3, 4, 1, 'Yes'),
(7, 4, 1, 5, 'No'),
(8, 5, 5, 1, 'Yes'),
(9, 5, 7, 3, 'No'),
(10, 7, 2, 5, 'Yes'),
(11, 7, 5, 5, 'Yes'),
(12, 9, 1, 4, 'No'),
(13, 10, 5, 5, 'Yes'),
(14, 6, 3, 4, 'No'),
(15, 6, 4, 3, 'No'),
(16, 6, 4, 3, 'No'),
(17, 6, 4, 3, 'No'),
(18, 5, 1, 5, 'No'),
(19, 10, 3, 1, 'No'),
(20, 10, 3, 1, 'No'),
(21, 6, 4, 4, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `task_details` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task_name`, `task_details`) VALUES
(1, 'Task 1', 'Task 1'),
(2, 'Task 2', ''),
(3, 'Task 3', ''),
(4, 'Task 4', ''),
(5, 'Task 5', 'Task 5'),
(6, 'Task 6', ''),
(7, 'Task 7', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dept_id` (`fk_dept_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_emp`
--
ALTER TABLE `project_emp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pro_id` (`fk_pro_id`),
  ADD KEY `fk_emp_id` (`fk_emp_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_emp_id` (`fk_emp_id`),
  ADD KEY `fk_pro_id` (`fk_pro_id`);

--
-- Indexes for table `rep_task`
--
ALTER TABLE `rep_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_emp_id` (`fk_emp_id`),
  ADD KEY `rep_task_ibfk_2` (`fk_task_id`),
  ADD KEY `rep_task_ibfk_3` (`fk_rep_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_emp`
--
ALTER TABLE `project_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rep_task`
--
ALTER TABLE `rep_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`fk_dept_id`) REFERENCES `department` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `project_emp`
--
ALTER TABLE `project_emp`
  ADD CONSTRAINT `project_emp_ibfk_1` FOREIGN KEY (`fk_pro_id`) REFERENCES `project` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_emp_ibfk_2` FOREIGN KEY (`fk_emp_id`) REFERENCES `employee` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`fk_emp_id`) REFERENCES `employee` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`fk_pro_id`) REFERENCES `project` (`id`);

--
-- Constraints for table `rep_task`
--
ALTER TABLE `rep_task`
  ADD CONSTRAINT `rep_task_ibfk_1` FOREIGN KEY (`fk_emp_id`) REFERENCES `employee` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rep_task_ibfk_2` FOREIGN KEY (`fk_task_id`) REFERENCES `task` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rep_task_ibfk_3` FOREIGN KEY (`fk_rep_id`) REFERENCES `report` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
