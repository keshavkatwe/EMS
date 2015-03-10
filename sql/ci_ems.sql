-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2015 at 01:08 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE IF NOT EXISTS `tbl_departments` (
`department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`department_id`, `department_name`) VALUES
(1, 'Computer science'),
(2, 'Information science'),
(3, 'Mechanical'),
(4, 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty` (
`faculty_id` int(11) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `employee_id`, `user_id`, `designation`, `address`, `phone`, `department`) VALUES
(1, 'sdsds', 2, 'dsd', 'sdsd', 'sc', '1'),
(2, 'wd', 3, 'wsdsd', 'wewed', 'wewed', '2'),
(3, 'wewe', 4, 'wewe', 'we', 'wewe', '1'),
(4, '123456', 5, 'Web developersssssssssss', 'Alagundagi onisssssssssss', '9538650838', '2'),
(5, 'asas', 6, 'asa', 'sas', 'asas', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty_sem_mapping`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty_sem_mapping` (
`map_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faculty_sem_mapping`
--

INSERT INTO `tbl_faculty_sem_mapping` (`map_id`, `user_id`, `semester`) VALUES
(1, 4, '2'),
(2, 4, '4'),
(3, 4, '6'),
(27, 5, '1'),
(28, 5, '2'),
(29, 5, '3'),
(30, 5, '4'),
(31, 5, '5'),
(32, 5, '6'),
(33, 2, '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty_sub_mapping`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty_sub_mapping` (
`sub_map_id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ia_marks`
--

CREATE TABLE IF NOT EXISTS `tbl_ia_marks` (
`ia_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ia_I` float(9,2) DEFAULT NULL,
  `ia_II` float(9,2) DEFAULT NULL,
  `ia_III` float(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
`student_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reg_number` varchar(100) DEFAULT NULL,
  `roll_number` int(11) DEFAULT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
`subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) DEFAULT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `profile_image` varchar(500) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email_id`, `password`, `gender`, `profile_image`, `role_id`, `date_log`) VALUES
(1, 'Keshav', 'Katwe', 'admin@ems.com', '123456', NULL, NULL, 1, '2015-03-07 15:15:05'),
(2, 'sdsds', 'sdsd', 'dxzx@dd.com', 'dsd', 'male', NULL, 2, '2015-03-07 19:07:30'),
(3, 'sdsdsd', 'xzzxz', 'sdsdsd', 'wewe', 'male', NULL, 2, '2015-03-08 05:06:03'),
(4, 'sdsd', 'sdsd', 'sdsd', 'wewe', 'male', NULL, 2, '2015-03-08 05:37:23'),
(5, 'Keshavs', 'Katwe', 'keshav@gmail.com', '123456', 'male', '88c22efd12d7ec5c6123e2dfcc7ee1d9.jpg', 2, '2015-03-08 08:05:56'),
(6, 'asas', 'asas', 'asas', 'asas', 'male', 'IMG_20140404_132204.jpg', 2, '2015-03-08 08:45:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
 ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `tbl_faculty_sem_mapping`
--
ALTER TABLE `tbl_faculty_sem_mapping`
 ADD PRIMARY KEY (`map_id`);

--
-- Indexes for table `tbl_faculty_sub_mapping`
--
ALTER TABLE `tbl_faculty_sub_mapping`
 ADD PRIMARY KEY (`sub_map_id`);

--
-- Indexes for table `tbl_ia_marks`
--
ALTER TABLE `tbl_ia_marks`
 ADD PRIMARY KEY (`ia_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
 ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_faculty_sem_mapping`
--
ALTER TABLE `tbl_faculty_sem_mapping`
MODIFY `map_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_faculty_sub_mapping`
--
ALTER TABLE `tbl_faculty_sub_mapping`
MODIFY `sub_map_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ia_marks`
--
ALTER TABLE `tbl_ia_marks`
MODIFY `ia_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
