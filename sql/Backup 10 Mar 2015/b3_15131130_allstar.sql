-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql110.byethost3.com
-- Generation Time: Mar 10, 2015 at 10:50 AM
-- Server version: 5.6.22-71.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b3_15131130_allstar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE IF NOT EXISTS `tbl_departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `employee_id`, `user_id`, `designation`, `address`, `phone`, `department`) VALUES
(13, '1868576', 14, 'lecturer', 'Government womens polytechnic bangalore-01', '9880059250', '1'),
(7, '2492292', 8, 'lecturer', 'Government womens polytechnic bangalore-01', '9886334222', '1'),
(8, '', 9, 'lecturer', 'Government womens polytechnic bangalore-01', '9900113290', '1'),
(12, '2379247', 13, 'lecturer', 'Government womens polytechnic bangalore-01', '8722816447', '1'),
(14, '1659967', 15, 'lecturer', 'Government womens polytechnic bangalore-01', '9448858171', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty_sem_mapping`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty_sem_mapping` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`map_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `tbl_faculty_sem_mapping`
--

INSERT INTO `tbl_faculty_sem_mapping` (`map_id`, `user_id`, `semester`) VALUES
(69, 15, '4'),
(68, 14, '6'),
(67, 14, '4'),
(62, 8, '6'),
(66, 13, '6'),
(65, 13, '4'),
(61, 8, '2'),
(64, 9, '6'),
(63, 9, '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty_sub_mapping`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty_sub_mapping` (
  `sub_map_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_map_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ia_marks`
--

CREATE TABLE IF NOT EXISTS `tbl_ia_marks` (
  `ia_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ia_I` float(9,2) DEFAULT NULL,
  `ia_II` float(9,2) DEFAULT NULL,
  `ia_III` float(9,2) DEFAULT NULL,
  PRIMARY KEY (`ia_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `reg_number` varchar(100) DEFAULT NULL,
  `roll_number` int(11) DEFAULT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(100) DEFAULT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_code`, `subject_name`, `semester`, `department`) VALUES
(10, '9cs62', 'Network Security and Management', '6', '1'),
(11, '9cs63A', 'Information Storage and Management', '6', '1'),
(9, '9cs61', 'Software Testing', '6', '1'),
(12, '9cs64P', 'Software Testing Lab', '6', '1'),
(13, '9cs65P', 'Network Security lab', '6', '1'),
(14, '9cs66P', 'Project Work2', '6', '1'),
(15, '9cs51', 'Basic Management Skills and Indian Constitution', '5', '1'),
(16, '9cs52', 'Programmimg with Java', '5', '1'),
(17, '9cs53', 'Web Programming', '5', '1'),
(18, '9cs54p', 'Programming with Java Lab', '5', '1'),
(19, '9cs55p', 'Web Programming Lab', '5', '1'),
(20, '9cs56p', 'CASP', '5', '1'),
(21, '9cs57p', 'Project Work 1', '5', '1'),
(22, '9cs41', 'OOP with C++', '4', '1'),
(23, '9cs42', 'Database Management Systems', '4', '1'),
(24, '9cs43', 'Operating System', '4', '1'),
(25, '9cs44', 'Software Engineering', '4', '1'),
(26, '9cs45p', 'OOP with C++ Lab', '4', '1'),
(27, '9cs46p', 'DBMS Lab', '4', '1'),
(28, '9cs47p', 'Linux Lab', '4', '1'),
(29, '9cs31', 'Computer Organization', '3', '1'),
(30, '9cs32', 'Data Structure Using C', '3', '1'),
(31, '9cs33', 'Computer Networks', '3', '1'),
(32, '9cs34p', 'Data Structure Lab', '3', '1'),
(33, '9cs35p', 'PC Hardware and Networking Lab', '3', '1'),
(34, '9cs36p', 'Graphical User Interface Lab', '3', '1'),
(35, '9cs37p', 'Web Design Lab', '3', '1'),
(36, '9SC02M', 'Applied Mathematics-2', '2', '1'),
(37, '9CP01E', 'English Communication', '2', '1'),
(38, '9EC02E', 'Digital Electronics', '2', '1'),
(39, '9CS01C', 'Programming With C', '2', '1'),
(40, '9EC26P', 'Digital Lab', '2', '1'),
(41, '9CS26P', 'Programming With C Lab', '2', '1'),
(42, '9CS27P', 'Multimedia Lab', '2', '1'),
(43, '9SC01M', 'Applied Mathematics-1', '1', '1'),
(44, '9SC03S', 'Applied Science', '1', '1'),
(45, '9CS13', 'Concepts of Electrical and Electronic Engineering', '1', '1'),
(46, '9CS14', 'Intoduction to Computer Concepts', '1', '1'),
(47, '9SC10P', 'Applied Science Lab', '1', '1'),
(48, '9CS16P', 'Basic Electronics Lab', '1', '1'),
(49, '9CS17P', 'Basic Computer Skills Lab', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `profile_image` varchar(500) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email_id`, `password`, `gender`, `profile_image`, `role_id`, `date_log`) VALUES
(1, 'admin', 'ems', 'admin@ams.com', '123456', NULL, NULL, 1, '2015-03-07 15:15:05'),
(15, 'B Prabha', 'Rao', 'prabha_bappanad@yahoo.co.in', 'prabha123', 'female', '0', 2, '2015-03-10 10:16:33'),
(10, 'bghsndc', 'jhmdkdms', 'swetha@gmail.com', '12345', 'female', '0', 2, '2015-03-09 07:34:19'),
(8, 'Ashok', 'hullur', 'ashok.hullur@hotmail.com', 'ashok123', 'male', '0', 2, '2015-03-08 16:34:37'),
(14, 'M A', 'Bagewadi', 'mabagewadi@gmail.com', 'BAGEWADI123', 'male', '0', 2, '2015-03-10 10:14:10'),
(9, 'Harish', 'Y N', 'ynharish@gmail.com', 'harish123', 'male', '0', 2, '2015-03-08 16:38:04'),
(11, 'ngghfdsm', 'jfd,bh', 'triveni@gmail.com', '1234', 'female', '0', 2, '2015-03-09 07:35:30'),
(13, 'Swetha', 'rani K', 'swetharavi11411@gmail.com', 'swetha123', 'female', '0', 2, '2015-03-09 09:24:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
