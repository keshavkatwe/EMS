-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql110.byethost3.com
-- Generation Time: Mar 17, 2015 at 11:03 AM
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
-- Table structure for table `tbl_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attendance_id`, `faculty_id`, `subject_id`, `student_id`, `date`, `status`) VALUES
(13, 7, 14, 2, '2015-03-14', 1),
(14, 7, 14, 3, '2015-03-14', 0),
(15, 7, 14, 5, '2015-03-14', 1),
(16, 7, 9, 2, '2015-03-15', 1),
(17, 7, 9, 3, '2015-03-15', 1),
(18, 7, 9, 5, '2015-03-15', 1),
(19, 7, 9, 2, '1969-12-31', 0),
(20, 7, 9, 3, '1969-12-31', 0),
(21, 7, 9, 5, '1969-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE IF NOT EXISTS `tbl_departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`department_id`, `department_name`) VALUES
(1, 'Computer science and engg'),
(2, 'Electronic Communication & engg'),
(3, 'Library Science'),
(4, 'Civil'),
(5, 'Commercial practice'),
(6, 'ADFT');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `employee_id`, `user_id`, `designation`, `address`, `phone`, `department`) VALUES
(13, '1868576', 14, 'lecturer', 'Government womens polytechnic bangalore-01', '9880059250', '1'),
(7, '2492292', 8, 'lecturer', 'Government womens polytechnic bangalore-01', '9886334222', '1'),
(8, '', 9, 'lecturer', 'Government womens polytechnic bangalore-01', '9900113290', '1'),
(12, '2379247', 13, 'lecturer', 'Government womens polytechnic bangalore-01', '8722816447', '1'),
(14, '1659967', 15, 'lecturer', 'Government womens polytechnic bangalore-01', '9448858171', '1'),
(15, '45795', 22, 'lecturer', 'Banglore', '1234567896', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty_sem_mapping`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty_sem_mapping` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`map_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

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
(71, 22, '2'),
(70, 22, '1'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_faculty_sub_mapping`
--

INSERT INTO `tbl_faculty_sub_mapping` (`sub_map_id`, `faculty_id`, `subject_id`) VALUES
(1, 12, 10),
(2, 7, 39),
(3, 7, 41),
(4, 14, 22),
(5, 13, 23),
(6, 8, 24),
(7, 12, 25),
(8, 14, 26),
(9, 13, 27),
(10, 8, 28),
(11, 8, 11),
(12, 7, 9),
(13, 13, 12),
(14, 12, 13),
(15, 7, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ia_marks`
--

CREATE TABLE IF NOT EXISTS `tbl_ia_marks` (
  `ia_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `ia_1` float(9,2) DEFAULT NULL,
  `ia_2` float(9,2) DEFAULT NULL,
  `ia_3` float(9,2) DEFAULT NULL,
  PRIMARY KEY (`ia_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_ia_marks`
--

INSERT INTO `tbl_ia_marks` (`ia_id`, `user_id`, `faculty_id`, `subject_id`, `sem`, `ia_1`, `ia_2`, `ia_3`) VALUES
(1, 18, 7, 14, 6, 12.00, 21.00, NULL),
(2, 18, 7, 9, 6, 10.00, 22.00, 24.00),
(3, 19, 7, 9, 6, 11.00, 21.50, NULL),
(4, 16, 7, 39, 2, 10.00, 34.00, 23.00),
(5, 16, 7, 41, 2, 23.00, 34.00, NULL),
(6, 21, 7, 9, 6, 23.00, 25.00, 15.00);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `user_id`, `reg_number`, `roll_number`, `semester`, `department`, `address`, `mobile`) VALUES
(7, 24, '119CS14002', 2, '2', '1', 'Bangalore', '9844001122'),
(8, 25, '119CS14003', 3, '2', '1', 'Bangalore', '9844001133'),
(6, 23, '119CS14001', 1, '2', '1', 'Bangalore', '9844001111'),
(9, 26, '119CS14004', 4, '2', '1', 'Bangalore', '9844001144'),
(10, 27, '119CS14005', 5, '2', '1', 'Bangalore', '9844001155'),
(11, 28, '107CS11041', 1, '6', '1', 'Banglore', '1347368834'),
(12, 29, '119CS14006', 6, '2', '1', 'Bangalore', '9844001166'),
(13, 30, '119CS10026', 2, '6', '1', 'Banglore', '1235674779'),
(14, 31, '119CS11003', 3, '6', '1', 'Banglore', '1235674775'),
(15, 32, '119CS14007', 7, '2', '1', 'Bangalore', '9844001177'),
(19, 36, '119CS14010', 10, '2', '1', 'Bangalore', '9844001110'),
(17, 34, '119CS14008', 8, '2', '1', 'Bangalore', '9844001188'),
(18, 35, '119CS14009', 9, '2', '1', 'Bangalore', '984400199'),
(20, 37, '119CS11041', 4, '6', '1', 'Banglore', '1346783367'),
(21, 38, '119CS12001', 5, '6', '1', 'Banglore', '1346783363'),
(22, 39, '119CS12002', 6, '6', '1', 'Banglore', '1346783364'),
(23, 40, '119CS14011', 11, '2', '1', 'Bangalore', '9944001011'),
(24, 41, '119CS12003', 7, '6', '1', 'Banglore', '1346783368'),
(25, 42, '119CS14012', 12, '2', '1', 'Bangalore', '9844001112'),
(26, 43, '119CS14013', 13, '2', '1', 'Bangalore', '9844001113'),
(27, 44, '119CS12005', 8, '6', '1', 'Banglore', '1346783361'),
(28, 45, '119CS14014', 14, '2', '1', 'Bangalore', '9844001114'),
(29, 46, '119CS14015', 15, '2', '1', 'Bangalore', '9844001115'),
(30, 47, '119CS12006', 9, '6', '1', 'Banglore', '1346783362'),
(31, 48, '119CS14016', 16, '2', '1', 'Bangalore', '9844001116'),
(32, 49, '119CS12007', 10, '6', '1', 'Banglore', '1346783365'),
(33, 50, '119CS14017', 17, '2', '1', 'Bangalore', '9844001117'),
(34, 51, '119CS14018', 18, '2', '1', 'Bangalore', '9844001118'),
(35, 52, '119CS14019', 19, '2', '1', 'Bangalore', '9844001119'),
(36, 53, '119CS12008', 11, '6', '1', 'Banglore', '1346783456'),
(37, 54, '119CS14020', 20, '2', '1', 'Bangalore', '9844001120'),
(38, 55, '119CS12012', 12, '6', '1', 'Banglore', '1346783457'),
(39, 56, '119CS12013', 13, '6', '1', 'Banglore', '1346783454'),
(40, 57, '119CS12014', 14, '6', '1', 'Banglore', '1346783453'),
(41, 58, '119CS12015', 15, '6', '1', 'Banglore', '1346783451'),
(42, 59, '119CS12017', 16, '6', '1', 'Banglore', '1346783450'),
(43, 60, '119CS14021', 21, '2', '1', 'Bangalore', '9844001121'),
(44, 61, '119CS14022', 22, '2', '1', 'Bangalore', '9844001122'),
(45, 62, '119CS14023', 23, '2', '1', 'Bangalore', '9844001123'),
(46, 63, '119CS14024', 24, '2', '1', 'Bangalore', '9844001124'),
(47, 64, '119CS14025', 25, '2', '1', 'Bangalore', '9844001125'),
(48, 65, '119CS14026', 26, '2', '1', 'Bangalore', '9844001126'),
(49, 66, '119CS14027', 27, '2', '1', 'Bnagalore', '9844001127'),
(50, 67, '119CS14028', 28, '2', '1', 'Bangalore', '9844001128'),
(51, 68, '119CS12020', 17, '6', '1', 'Banglore', '1234567843'),
(52, 69, '119CS14029', 29, '2', '1', 'Bangalore', '9844001129'),
(53, 70, '119CS14030', 30, '2', '1', 'Bangalore', '9844001130'),
(54, 71, '119CS14031', 31, '2', '1', 'Bangalore', '9844001131'),
(55, 72, '119CS14032', 32, '2', '1', 'Bangalore', '9844001132'),
(56, 73, '119CS14033', 33, '2', '1', 'Bangalore', '9844001133'),
(57, 74, '119CS14034', 34, '2', '1', 'Bangalore', '9844001134'),
(58, 75, '119CS14035', 35, '2', '1', 'Bangalore', '9844001135'),
(59, 76, '119CS14036', 36, '2', '1', 'Bangalore', '9844001136');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

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
(49, '9CS17P', 'Basic Computer Skills Lab', '1', '1'),
(50, 'TS1ECE', 'Test Subject', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `profile_image` varchar(500) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `date_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email_id`, `password`, `gender`, `profile_image`, `role_id`, `date_log`) VALUES
(1, 'admin', 'ems', 'admin@ams.com', '123456', 'female', NULL, 1, '2015-03-07 15:15:05'),
(15, 'B Prabha', 'Rao', 'prabha_bappanad@yahoo.co.in', 'prabha123', 'female', NULL, 2, '2015-03-10 10:16:33'),
(10, 'bghsndc', 'jhmdkdms', 'swetha@gmail.com', '12345', 'female', NULL, 2, '2015-03-09 07:34:19'),
(8, 'Ashok', 'hullur', 'ashok.hullur@hotmail.com', 'ashok123', 'male', NULL, 2, '2015-03-08 16:34:37'),
(14, 'M A', 'Bagewadi', 'mabagewadi@gmail.com', 'BAGEWADI123', 'male', NULL, 2, '2015-03-10 10:14:10'),
(9, 'Harish', 'Y N', 'ynharish@gmail.com', 'harish123', 'male', NULL, 2, '2015-03-08 16:38:04'),
(11, 'ngghfdsm', 'jfd,bh', 'triveni@gmail.com', '1234', 'female', NULL, 2, '2015-03-09 07:35:30'),
(13, 'Swetha', 'rani K', 'swetharavi11411@gmail.com', 'swetha123', 'female', NULL, 2, '2015-03-09 09:24:16'),
(23, 'Anitha', 'K', 'anitha01@gmail.com', '', 'female', '', 3, '2015-03-17 13:50:35'),
(17, 'demo', 'ams', 'demo@ams.com', '123456', 'male', NULL, 1, '2015-03-10 17:31:30'),
(25, 'Anusha', 'K M', 'anusha03@gmail.com', '', 'female', '', 3, '2015-03-17 13:54:29'),
(24, 'Anju', 'N', 'anju02@gmail.com', '', 'female', '', 3, '2015-03-17 13:52:48'),
(22, 'Gayatri', 'mm', 'gayatri@gmail.com', 'gayatri123', 'female', NULL, 2, '2015-03-10 18:33:20'),
(26, 'Anusha', 'R', 'anusha04@gmail.com', '', 'female', '', 3, '2015-03-17 13:56:54'),
(27, 'Ashwini', 'D C', 'ashwini05@gmail.com', '', 'female', '', 3, '2015-03-17 13:57:53'),
(28, 'Monika', 'S', 'monika@gmail.com', '', 'female', '', 3, '2015-03-17 13:58:07'),
(29, 'Ashwini', 'N P', 'ashwini06@gmail.com', '', 'female', '', 3, '2015-03-17 13:59:19'),
(30, 'Monisha C', 'Yajman', 'monisha@gmail.com', '', 'female', '', 3, '2015-03-17 13:59:56'),
(31, 'Bhavana', 'M C', 'bhavana@gmail.com', '', 'female', '', 3, '2015-03-17 14:01:29'),
(32, 'Ashwini', 'S', 'ashwini07@gmail.com', '', 'female', '', 3, '2015-03-17 14:01:37'),
(36, 'Chaithra', 'B', 'chaithra10@gmail.com', '', 'female', '', 3, '2015-03-17 14:05:33'),
(34, 'Bharathi', 'R', 'bharathi08@gmail.com', '', 'female', '', 3, '2015-03-17 14:02:42'),
(35, 'Chaithanya', 'G', 'chaitanya09@gmail.com', '', 'female', '', 3, '2015-03-17 14:04:15'),
(37, 'Pranitha', 'G', 'pranitha@gmail.com', '', 'female', '', 3, '2015-03-17 14:05:38'),
(38, 'Anitha', 'S S', 'anitha@gmail.com', '', 'female', '', 3, '2015-03-17 14:08:17'),
(39, 'Annapoornima F', 'Bhajantri', 'annapoornima@gmail.com', '', 'female', '', 3, '2015-03-17 14:09:51'),
(40, 'Chennamma', 'C', 'chennamma11@gmail.com', '', 'female', '', 3, '2015-03-17 14:13:39'),
(41, 'Arpitha', 'S', 'arpitha@gmail.com', '', 'female', '', 3, '2015-03-17 14:14:43'),
(42, 'Dakshayini', 'L', 'dakshyini12@gmail.com', '', 'female', '', 3, '2015-03-17 14:14:46'),
(43, 'Deeksha', 'D', 'deeksha13@gmail.com', '', 'female', '', 3, '2015-03-17 14:16:04'),
(44, 'Ashwini', 'V P', 'ashwini@gmail.com', '', 'female', '', 3, '2015-03-17 14:16:10'),
(45, 'Divya', 'M', 'divya14@gmail.com', '', 'female', '', 3, '2015-03-17 14:17:00'),
(46, 'Harshitha', 'N', 'harshitha15@gmail.com', '', 'female', '', 3, '2015-03-17 14:18:04'),
(47, 'Balamangala', 'S H', 'balamangala@gmail.com', '', 'female', '', 3, '2015-03-17 14:18:44'),
(48, 'Hemalatha', 'R', 'hemalatha16@gmail.com', '', 'female', '', 3, '2015-03-17 14:19:00'),
(49, 'Bhagya', 'V D', 'bhagya@gmail.com', '', 'female', '', 3, '2015-03-17 14:20:13'),
(50, 'Humera', 'Kousar', 'humerakousar17@gmail.com', '', 'female', '', 3, '2015-03-17 14:20:15'),
(51, 'Jyothi', 'M', 'jyothi18@gmail.com', '', 'female', '', 3, '2015-03-17 14:21:19'),
(52, 'Kavya', 'G V', 'kavya19@gmail.com', '', 'female', '', 3, '2015-03-17 14:22:17'),
(53, 'Chaithra', 'M', 'chaithra@gmail.com', '', 'female', '', 3, '2015-03-17 14:22:22'),
(54, 'Kavya', 'K V', 'kavya20@gmail.com', '', 'female', '', 3, '2015-03-17 14:23:12'),
(55, 'Divyashree', 'U K', 'divyashree@gmail.com', '', 'female', '', 3, '2015-03-17 14:24:39'),
(56, 'Gaganashree', 'J', 'gagana@gmail.com', '', 'female', '', 3, '2015-03-17 14:26:09'),
(57, 'Hemalatha', 'N M', 'hema@gmail.com', '', 'female', '', 3, '2015-03-17 14:27:39'),
(58, 'Kalavathi', 'J', 'kala@gmail.com', '', 'female', '', 3, '2015-03-17 14:28:31'),
(59, 'Kavya', 'B R', 'kavya@gmail.com', '', 'female', '', 3, '2015-03-17 14:30:48'),
(60, 'Kavya', 'M', 'kavya21@gmail.com', '', 'female', '', 3, '2015-03-17 14:39:04'),
(61, 'Keerthi', 'B R', 'keerthi22@gmail.com', '', 'female', '', 3, '2015-03-17 14:40:02'),
(62, 'Kubra', 'Fathima', 'kubrafathima23@gmail.com', '', 'female', '', 3, '2015-03-17 14:41:00'),
(63, 'Latha', 'M C', 'latha24@gmail.com', '', 'female', '', 3, '2015-03-17 14:41:53'),
(64, 'Lavanya', 'K S', 'lavanya25@gmail.com', '', 'female', '', 3, '2015-03-17 14:42:46'),
(65, 'Mamatha', 'M', 'mamatha26@gmail.com', '', 'female', '', 3, '2015-03-17 14:43:55'),
(66, 'Mamatha', 'P M', 'mamatha27@gmail.com', '', 'female', '', 3, '2015-03-17 14:44:35'),
(67, 'Mamta', 'J', 'mamta28@gmail.com', '', 'female', '', 3, '2015-03-17 14:45:34'),
(68, 'Latha', 'S', 'latha@gmail.com', '', 'female', '', 3, '2015-03-17 14:46:06'),
(69, 'Manasa', 'G', 'manasa29@gmail.com', '', 'female', '', 3, '2015-03-17 14:46:48'),
(70, 'Manjula Matapathi', 'S', 'manjula30@gmail.com', '', 'female', '', 3, '2015-03-17 14:52:25'),
(71, 'Monisha', 'V', 'monisha31@gmail.com', '', 'female', '', 3, '2015-03-17 14:54:04'),
(72, 'Nandini', 'K H', 'nandini32@gmail.com', '', 'female', '', 3, '2015-03-17 14:55:33'),
(73, 'Nandini N', 'Gowda', 'nandini33@gmail.com', '', 'female', '', 3, '2015-03-17 14:56:49'),
(74, 'Nandini', 'S', 'nandini34@gmail.com', '', 'female', '', 3, '2015-03-17 14:58:11'),
(75, 'Navya', 'N', 'navya35@gmail.com', '', 'female', '', 3, '2015-03-17 14:59:19'),
(76, 'Nayana', 'S', 'nayana36@gmail.com', '', 'female', '', 3, '2015-03-17 15:00:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
