-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql110.byethost3.com
-- Generation Time: Mar 25, 2015 at 12:35 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

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
(21, 7, 9, 5, '1969-12-31', 1),
(22, 7, 39, 6, '2015-03-22', 1),
(23, 7, 39, 7, '2015-03-22', 1),
(24, 7, 39, 8, '2015-03-22', 1),
(25, 7, 39, 9, '2015-03-22', 1),
(26, 7, 39, 10, '2015-03-22', 1),
(27, 7, 39, 12, '2015-03-22', 1),
(28, 7, 39, 15, '2015-03-22', 1),
(29, 7, 39, 17, '2015-03-22', 1),
(30, 7, 39, 18, '2015-03-22', 1),
(31, 7, 39, 19, '2015-03-22', 1),
(32, 7, 39, 23, '2015-03-22', 1),
(33, 7, 39, 25, '2015-03-22', 1),
(34, 7, 39, 26, '2015-03-22', 1),
(35, 7, 39, 28, '2015-03-22', 1),
(36, 7, 39, 29, '2015-03-22', 1),
(37, 7, 39, 31, '2015-03-22', 1),
(38, 7, 39, 33, '2015-03-22', 1),
(39, 7, 39, 34, '2015-03-22', 1),
(40, 7, 39, 35, '2015-03-22', 1),
(41, 7, 39, 37, '2015-03-22', 1),
(42, 7, 39, 43, '2015-03-22', 1),
(43, 7, 39, 44, '2015-03-22', 1),
(44, 7, 39, 45, '2015-03-22', 1),
(45, 7, 39, 46, '2015-03-22', 1),
(46, 7, 39, 47, '2015-03-22', 1),
(47, 7, 39, 48, '2015-03-22', 1),
(48, 7, 39, 49, '2015-03-22', 1),
(49, 7, 39, 50, '2015-03-22', 1),
(50, 7, 39, 52, '2015-03-22', 1),
(51, 7, 39, 53, '2015-03-22', 1),
(52, 7, 39, 54, '2015-03-22', 1),
(53, 7, 39, 55, '2015-03-22', 1),
(54, 7, 39, 56, '2015-03-22', 1),
(55, 7, 39, 57, '2015-03-22', 1),
(56, 7, 39, 58, '2015-03-22', 1),
(57, 7, 39, 59, '2015-03-22', 1),
(58, 7, 39, 60, '2015-03-22', 1),
(59, 7, 39, 61, '2015-03-22', 1),
(60, 7, 39, 62, '2015-03-22', 1),
(61, 7, 39, 63, '2015-03-22', 1),
(62, 7, 39, 64, '2015-03-22', 1),
(63, 7, 39, 65, '2015-03-22', 1),
(64, 7, 39, 68, '2015-03-22', 1),
(65, 7, 39, 70, '2015-03-22', 1),
(66, 7, 39, 74, '2015-03-22', 1),
(67, 7, 39, 76, '2015-03-22', 1),
(68, 7, 39, 78, '2015-03-22', 1),
(69, 7, 39, 80, '2015-03-22', 1),
(70, 7, 39, 82, '2015-03-22', 1),
(71, 7, 39, 84, '2015-03-22', 1),
(72, 7, 39, 89, '2015-03-22', 1),
(73, 7, 39, 91, '2015-03-22', 1),
(74, 7, 39, 92, '2015-03-22', 1),
(75, 7, 39, 93, '2015-03-22', 1),
(76, 7, 39, 95, '2015-03-22', 1),
(77, 7, 39, 96, '2015-03-22', 1),
(78, 7, 39, 97, '2015-03-22', 1),
(79, 7, 39, 98, '2015-03-22', 1),
(80, 7, 39, 99, '2015-03-22', 1),
(81, 7, 39, 100, '2015-03-22', 1),
(82, 7, 39, 101, '2015-03-22', 1),
(83, 7, 39, 103, '2015-03-22', 1),
(84, 7, 39, 104, '2015-03-22', 1),
(85, 7, 39, 106, '2015-03-22', 1),
(86, 7, 39, 108, '2015-03-22', 1),
(87, 7, 39, 110, '2015-03-22', 1),
(88, 7, 39, 112, '2015-03-22', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `tbl_faculty_sem_mapping`
--

INSERT INTO `tbl_faculty_sem_mapping` (`map_id`, `user_id`, `semester`) VALUES
(69, 15, '4'),
(68, 14, '6'),
(67, 14, '4'),
(66, 13, '6'),
(65, 13, '4'),
(76, 8, '6'),
(75, 8, '2'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_ia_marks`
--

INSERT INTO `tbl_ia_marks` (`ia_id`, `user_id`, `faculty_id`, `subject_id`, `sem`, `ia_1`, `ia_2`, `ia_3`) VALUES
(1, 18, 7, 14, 6, 12.00, 21.00, NULL),
(2, 18, 7, 9, 6, 10.00, 22.00, 24.00),
(3, 19, 7, 9, 6, 11.00, 21.50, NULL),
(4, 16, 7, 39, 2, 10.00, 34.00, 23.00),
(5, 16, 7, 41, 2, 23.00, 34.00, NULL),
(6, 21, 7, 9, 6, 23.00, 25.00, 15.00),
(7, 24, 7, 39, 2, 1.00, 11.00, NULL),
(8, 28, 7, 9, 6, 0.00, 0.00, NULL),
(9, 23, 7, 39, 2, 1.00, 1.00, 1.00),
(10, 25, 7, 39, 2, 1.00, 12.00, NULL),
(11, 26, 7, 39, 2, 12.00, 12.00, NULL),
(12, 27, 7, 39, 2, 122.00, 22.00, NULL),
(13, 29, 7, 39, 2, 11.00, 21.00, NULL),
(14, 28, 7, 14, 6, 11.00, 11.00, NULL),
(15, 30, 7, 14, 6, NULL, NULL, NULL),
(16, 30, 7, 9, 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `parent_number` varchar(15) DEFAULT NULL,
  `reg_number` varchar(100) DEFAULT NULL,
  `roll_number` int(11) DEFAULT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `user_id`, `parent_name`, `parent_number`, `reg_number`, `roll_number`, `semester`, `department`, `address`, `mobile`, `is_active`) VALUES
(7, 24, 'Narayana Swamy', '8050375224', '119CS14002', 2, '2', '1', '7th cross, R R temple road, devasandra, K R puram, bangalore-36', '9844001122', 1),
(8, 25, 'Manjunath', '9901327151', '119CS14003', 3, '2', '1', '#176, kodigehalli, Ashraya layout, near bharath nagar, 2nd stage, magadi main road, bangalore-91', '8904482608', 1),
(6, 23, 'Kariyappa', '9008420979', '119CS14001', 1, '2', '1', 'Kenjiganahalli, madhure hobli, doddaballapura tq, bangalore district', '8861762830', 1),
(9, 26, NULL, NULL, '119CS14004', 4, '2', '1', 'Bangalore', '9844001144', 1),
(10, 27, 'Chaluvappa', '9741827717', '119CS14005', 5, '2', '1', 'Banashankari temple opposite, shakambari nagar, bangalore', '9741827717', 1),
(11, 28, NULL, NULL, '107CS11041', 1, '6', '1', 'Banglore', '1347368834', 1),
(12, 29, NULL, NULL, '119CS14006', 6, '2', '1', 'Bangalore', '9844001166', 1),
(13, 30, NULL, NULL, '119CS10026', 2, '6', '1', 'Banglore', '1235674779', 1),
(14, 31, NULL, NULL, '119CS11003', 3, '6', '1', 'Banglore', '1235674775', 1),
(15, 32, 'Somashekar B', '9980756616', '119CS14007', 7, '2', '1', '#80 10th cross, sri gandha nagar, heggenahalli, bangalore-91', '8123506700', 1),
(19, 36, NULL, NULL, '119CS14010', 10, '2', '1', 'Bangalore', '9844001110', 1),
(17, 34, NULL, NULL, '119CS14008', 8, '2', '1', 'Bangalore', '9844001188', 1),
(18, 35, 'Gopalakrishna V', '9035288705', '119CS14009', 9, '2', '1', '#13/11 10th main, 17th cross padarayana pura bangalore-26', '8123686745', 1),
(20, 37, NULL, NULL, '119CS11041', 4, '6', '1', 'Banglore', '1346783367', 1),
(21, 38, NULL, NULL, '119CS12001', 5, '6', '1', 'Banglore', '1346783363', 1),
(22, 39, NULL, NULL, '119CS12002', 6, '6', '1', 'Banglore', '1346783364', 1),
(23, 40, 'Amalappa', '9980617058', '119CS14011', 11, '2', '1', '#111, sushelamma layout, ananthapura, yalahanka upanagar, 1st main', '9980617058', 1),
(24, 41, NULL, NULL, '119CS12003', 7, '6', '1', 'Banglore', '1346783368', 1),
(25, 42, NULL, NULL, '119CS14012', 12, '2', '1', 'Bangalore', '9844001112', 1),
(26, 43, 'L Jagadeesha Bangera', '9901918856', '119CS14013', 13, '2', '1', 'Dethimar house, badaga kajekar village, pandavara kallu post, bantwal tq, dakshina kannada district, mangalore-574233', '9902248381', 1),
(27, 44, NULL, NULL, '119CS12005', 8, '6', '1', 'Banglore', '1346783361', 1),
(28, 45, 'Madhesh', '7829770906', '119CS14014', 14, '2', '1', '#19/1,2nd cross, 3rd main, kasturaba nagar, bangalore-26', '9742326578', 1),
(29, 46, 'Nagaraju', '9008618579', '119CS14015', 15, '2', '1', '#47, 17th cross, vishwapriya layout, begur, bangalore-68', '9008618579', 1),
(30, 47, NULL, NULL, '119CS12006', 9, '6', '1', 'Banglore', '1346783362', 1),
(31, 48, 'Ramesh', '9731887584', '119CS14016', 16, '2', '1', '#64 mahadeshwara nagar, herohalli cross, bangalore-91', '9972323490', 1),
(32, 49, NULL, NULL, '119CS12007', 10, '6', '1', 'Banglore', '1346783365', 1),
(33, 50, 'Mohammad Hassan', '9632478523', '119CS14017', 17, '2', '1', '#788 10th cross, 2nd main, kanteerava nagar, nandini layout, bangalore-96', '9611619295', 1),
(34, 51, 'Muthuraj', '8746844322', '119CS14018', 18, '2', '1', '#450/1,9th cross, shivananda nagar, hegganahalli, bangalore-560091', '8904271429', 1),
(35, 52, NULL, NULL, '119CS14019', 19, '2', '1', 'Bangalore', '9844001119', 1),
(36, 53, NULL, NULL, '119CS12008', 11, '6', '1', 'Banglore', '1346783456', 1),
(37, 54, 'Veerappa K S', '9844441367', '119CS14020', 20, '2', '1', 'someshwara temple street, keelara, mandya district', '9844441291', 1),
(38, 55, NULL, NULL, '119CS12012', 12, '6', '1', 'Banglore', '1346783457', 1),
(39, 56, NULL, NULL, '119CS12013', 13, '6', '1', 'Banglore', '1346783454', 1),
(40, 57, NULL, NULL, '119CS12014', 14, '6', '1', 'Banglore', '1346783453', 1),
(41, 58, NULL, NULL, '119CS12015', 15, '6', '1', 'Banglore', '1346783451', 1),
(42, 59, NULL, NULL, '119CS12017', 16, '6', '1', 'Banglore', '1346783450', 1),
(43, 60, 'Mohan kumar G', '966374936', '119CS14021', 21, '2', '1', '#1807, 5th cross, 2nd main , sanjeevini nagar, sakarnagar post, bangalore-', '8123697084', 1),
(44, 61, NULL, NULL, '119CS14022', 22, '2', '1', 'Bangalore', '9844001122', 1),
(45, 62, NULL, NULL, '119CS14023', 23, '2', '1', 'Bangalore', '9844001123', 1),
(46, 63, 'Chandrashekar H M', '4678987423', '119CS14024', 24, '2', '1', '#2 Abbariyareddy layout, kagadhasapura main road vijaya nagar', '8722853030', 1),
(47, 64, 'subbarajeusr K S', '9740134768', '119CS14025', 25, '2', '1', '#8 kaggala hobli, malavalli tq, mandya district', '9740134768', 1),
(48, 65, NULL, NULL, '119CS14026', 26, '2', '1', 'Bangalore', '9844001126', 1),
(49, 66, 'Mallesha', '9632437022', '119CS14027', 27, '2', '1', 'panditha halli, malavalli(tq), mandya(d)', '9844001127', 1),
(50, 67, 'Janardhan', '9663239724', '119CS14028', 28, '2', '1', '#141, 8th cross, subbanna palya, EX-tn, chikkabanasavadi main road, bangalore-33', '9844001128', 1),
(51, 68, NULL, NULL, '119CS12020', 17, '6', '1', 'Banglore', '1234567843', 1),
(52, 69, NULL, NULL, '119CS14029', 29, '2', '1', 'Bangalore', '9844001129', 1),
(53, 70, 'shankariah', '9845358144', '119CS14030', 30, '2', '1', '#12 venkaswamy building, madapattana, haragge (p), anekal(tq), bangalore-105', '8904071562', 1),
(54, 71, 'Vijyakumar V', '9731719731', '119CS14031', 31, '2', '1', 'Ankalamma parameshwari temple street mamballi, chamaraj nagar district.', '7829984127', 1),
(55, 72, 'Hanumanthappa', '9880745606', '119CS14032', 32, '2', '1', 'Near water tank, amruthaa halli circle, sakar nagar post, Gadi ramayya building, bangalore-96', '9035119870', 1),
(56, 73, NULL, NULL, '119CS14033', 33, '2', '1', 'Bangalore', '9844001133', 1),
(57, 74, 'Shivalingaiah', '9845973329', '119CS14034', 34, '2', '1', 'avalahalli, james school main road, kempegowda badavane, bangalore-560049', '9900742691', 1),
(58, 75, NULL, NULL, '119CS14035', 35, '2', '1', 'Bangalore', '9844001135', 1),
(59, 76, 'Shadakshara Aradhya B', '9845040249', '119CS14036', 36, '2', '1', 'chunchunkuppe, tavrekere', '7259790652', 1),
(60, 77, 'Riyaz ahmed', '8902405272', '119CS14037', 37, '2', '1', 'R T Nagar', '8904202527', 1),
(61, 78, 'Narayana S', '9743982540', '119CS14038', 38, '2', '1', '#294 4th cross, sharada school opposite, laggere, lavakusha nagar', '8892760979', 1),
(62, 79, NULL, NULL, '119CS14039', 39, '2', '1', 'Bangalore', '9844001139', 1),
(63, 80, 'choodaiah', '9449865811', '119CS14040', 40, '2', '1', '1st main, 1st cross, rajeshwari nagar, jaggere', '9916405033', 1),
(64, 81, 'M V Gangappa', '9964520606', '119CS14041', 41, '2', '1', 'G,C,C,R,P,F Type-2, #884 block ''A'' Yelahanka', '8088301531', 1),
(65, 82, NULL, NULL, '119CS14042', 42, '2', '1', 'Bangalore', '9844001142', 1),
(66, 83, NULL, NULL, '119CS12021', 18, '6', '1', 'Banglore', '1357480473', 1),
(67, 84, NULL, NULL, '119CS12022', 19, '6', '1', 'Banglore', '1357480472', 1),
(68, 85, 'Ramesh D H', '9901954643', '119CS14043', 43, '2', '1', '#118 Thigaropalya, main road, balaji nagar, peenya 2nd stage.', '9980491505', 1),
(69, 86, NULL, NULL, '119CS12027', 21, '6', '1', 'Banglore', '1357480477', 1),
(70, 87, 'suryakumar T G', '9980081119', '119CS14044', 44, '2', '1', '#41 banglore', '9945006116', 1),
(71, 88, NULL, NULL, '119CS12030', 22, '6', '1', 'Banglore', '1357480446', 1),
(72, 89, NULL, NULL, '119CS12031', 23, '6', '1', 'Banglore', '1357480446', 1),
(73, 90, NULL, NULL, '119CS12032', 24, '6', '1', 'Banglore', '1357480447', 1),
(74, 91, 'Narasimha Raju', '9741414785', '119CS14045', 45, '2', '1', '#15/48  J K form, R V college post, Kengeri, bangalore-59', '8050223493', 1),
(75, 92, NULL, NULL, '119CS12034', 25, '6', '1', 'Banglore', '1357480246', 1),
(76, 93, 'Sanjeeva R', '9880494175', '119CS14046', 46, '2', '1', 'Hessaraghatta, Bangalore, North.', '9535891405', 1),
(77, 94, NULL, NULL, '119CS12035', 26, '6', '1', 'Banglore', '1357480248', 1),
(78, 95, 'late Lakshmana', '7846868737', '119CS14047', 47, '2', '1', 'Marathahalli, Doddanakkundi near Raghavendra mata.', '8971331372', 1),
(79, 96, NULL, NULL, '119CS12041', 27, '6', '1', 'Banglore', '1357480249', 1),
(80, 97, 'Shivakumar', '7760584425', '119CS14048', 48, '2', '1', '#27 Gurupriya kalyana mantapa, karekallu kamakshi palya, bangalore-79', '9901948386', 1),
(81, 98, NULL, NULL, '119CS12043', 28, '6', '1', 'Banglore', '1357480240', 1),
(82, 99, 'Abdul Shukoor', '9141826567', '119CS14049', 49, '2', '1', '#198 Balaji layout, Hegde nagar, bangalore-77', '8183828782', 1),
(83, 100, NULL, NULL, '119CS12045', 29, '6', '1', 'Banglore', '1357480135', 1),
(84, 101, 'Srinivas H T', '9900955699', '119CS14050', 50, '2', '1', '#73/1, 2nd main, 3rd cross, Ranganathpura, Kamakshipalya, bangalore-79', '9902276929', 1),
(85, 102, NULL, NULL, '119CS12046', 30, '6', '1', 'Banglore', '1357480133', 1),
(86, 103, NULL, NULL, '119CS12047', 31, '6', '1', 'Banglore', '8095180977', 1),
(87, 104, NULL, NULL, '119CS12048', 32, '6', '1', 'Banglore', '8095180246', 1),
(88, 105, NULL, NULL, '119CS12049', 33, '6', '1', 'Banglore', '8095180249', 1),
(89, 106, 'Karthik D', '9844453481', '119CS14051', 51, '2', '1', '#219, 2nd cross, Chowdeshwari temple, dommasandra bangalore-562125', '9035561402', 1),
(90, 107, NULL, NULL, '119CS12050', 34, '6', '1', 'Banglore', '8095180241', 1),
(91, 108, 'marugappa', '9741142436', '119CS14052', 52, '2', '1', '#01, agricultural department, sheshadri road, bangalore-01', '9844001152', 1),
(92, 109, 'Rajanna B', '9008274599', '119CS14053', 53, '2', '1', '#97 kempapura, chikkabanavara, bangalore-560006', '8861019921', 1),
(93, 110, NULL, NULL, '119CS14054', 54, '2', '1', 'Bangalore', '9844001154', 1),
(94, 111, NULL, NULL, '119CS12051', 35, '6', '1', 'Banglore', '8095180243', 1),
(95, 112, 'Puttabasappa', '9845456811', '119CS14055', 55, '2', '1', 'Near ambedkar bavan, keelara, mandya district, mandya t/q.', '9611485918', 1),
(96, 113, 'Ramchandra C H', '9880368325', '119CS14056', 56, '2', '1', '#123, 1st cross, sri gandhanagar, heganahalli, bangalore-560091', '9731903352', 1),
(97, 114, 'Premnath', '9663206745', '119CS14057', 57, '2', '1', '#11, vinayak nagar, near sneha hospital, hebbagodi-560099', '8971669040', 1),
(98, 115, 'Lokeshwarappa V', '9900658878', '119CS14058', 58, '2', '1', 'lakshmi bazar, chitradurga', '7259164649', 1),
(99, 116, 'Basavaraj', '9632200149', '119CS14059', 59, '2', '1', '#111/1, N K form, R V college post, kengeri, bangalore-59', '9663407768', 1),
(100, 117, 'Chandra Shekar R N', '9342781632', '119CS14060', 60, '2', '1', 'Chowdeshwari layout, yalahanka, bangalore-64', '9900627378', 1),
(101, 118, 'Somshekar', '9880162760', '119CS14061', 61, '2', '1', 'Raghavendra colony , near shankara mata road, madhugiri', '9535776002', 1),
(102, 119, NULL, NULL, '119CS12053', 36, '6', '1', 'Banglore', '8095180240', 1),
(103, 120, 'Jayaram R', '7795298904', '119CS14062', 62, '2', '1', '#29, Behind shaneshwara temple, Andharahalli main road, peenya 2nd stage, bangalore-58', '7760877097', 1),
(104, 121, 'Elumalai', '8884222186', '119CS14063', 63, '2', '1', '#11/1, 4th cross, BSK 3rd stage, kattariguppe, bangalore-85', '7829354476', 1),
(105, 122, NULL, NULL, '119CS12054', 37, '6', '1', 'Banglore', '8095180135', 1),
(106, 123, 'chikkamariyappa', '9743208997', '119CS14201', 64, '2', '1', '#60, 9th cross , arundhathi nagar, chandra layout', '8746923863', 1),
(107, 124, NULL, NULL, '119CS12057', 39, '6', '1', 'Banglore', '8095180139', 1),
(108, 125, NULL, NULL, '119CS14203', 65, '2', '1', 'Bangalore', '9844001103', 1),
(109, 126, NULL, NULL, '119CS12059', 40, '6', '1', 'Banglore', '8095180131', 1),
(110, 127, NULL, NULL, '119CS14204', 66, '2', '1', 'Bangalore', '9844001104', 1),
(111, 128, NULL, NULL, '119CS12061', 41, '6', '1', 'Banglore', '8095180130', 1),
(112, 129, 'Syeda sivajuddin', '7795746286', '119CS14206', 67, '2', '1', '#17/3, behind lospovation office bazar street, neelsandra, bangalore-5600-47', '9743554731', 1),
(113, 130, NULL, NULL, '119CS12062', 42, '6', '1', 'Banglore', '8095180136', 1),
(114, 131, NULL, NULL, '332CS12038', 43, '6', '1', 'Banglore', '8095180132', 1),
(115, 132, NULL, NULL, '119CS12056', 38, '6', '1', 'Banglore', '1358368936', 1),
(116, 133, NULL, NULL, '119CS12009', 1, '4', '1', 'Bangalore', '9001122331', 1),
(117, 134, NULL, NULL, '119CS12040', 2, '4', '1', 'Bangalore', '9001122332', 1),
(118, 135, NULL, NULL, '119CS12055', 3, '4', '1', 'Bangalore', '9001122333', 1),
(119, 136, 'ab', 'a', '119CS13001', 4, '4', '1', 'Bangalore', '9001122334', 1),
(120, 137, NULL, NULL, '119CS13002', 5, '4', '1', 'Bangalore', '9001122335', 1),
(121, 138, NULL, NULL, '119CS13004', 6, '4', '1', 'Bangalore', '9001122336', 1),
(122, 139, NULL, NULL, '119CS13005', 5, '4', '1', 'Bangalore', '9001122337', 1),
(123, 140, NULL, NULL, '119CS13007', 8, '4', '1', 'Bangalore', '9001122338', 1),
(124, 141, NULL, NULL, '119CS13008', 9, '4', '1', 'Bangalore', '9001122338', 1),
(125, 142, NULL, NULL, '119CS13009', 10, '4', '1', 'Bangalore', '9001122339', 1),
(126, 143, NULL, NULL, '119CS13011', 11, '4', '1', 'Bangalore', '9001122311', 1),
(127, 144, NULL, NULL, '119CS13012', 12, '4', '1', 'Bangalore', '9001122312', 1),
(128, 145, NULL, NULL, '119CS13013', 13, '4', '1', 'Bangalore', '9001122313', 1),
(129, 146, NULL, NULL, '119CS13015', 14, '4', '1', 'Bangalore', '9001122315', 1),
(130, 147, NULL, NULL, '119CS13017', 15, '4', '1', 'Bangalore', '9001122317', 1),
(131, 148, NULL, NULL, '119CS13019', 16, '4', '1', 'Bangalore', '9001122319', 1),
(132, 149, NULL, NULL, '119CS13020', 17, '4', '1', 'Bangalore', '9001122320', 1),
(133, 150, NULL, NULL, '119CS13021', 18, '4', '1', 'Bangalore', '9001122321', 1),
(134, 151, NULL, NULL, '119CS12023', 19, '4', '1', 'Bangalore', '9001122323', 1),
(135, 152, NULL, NULL, '119CS13025', 20, '4', '1', 'Bangalore', '9001122325', 1),
(136, 153, NULL, NULL, '119CS13027', 21, '4', '1', 'Bangalore', '9001122327', 1),
(137, 154, NULL, NULL, '119CS13028', 22, '4', '1', 'Bangalore', '9001122328', 1),
(138, 155, NULL, NULL, '119CS13029', 23, '4', '1', 'Bangalore', '9001122329', 1),
(139, 156, NULL, NULL, '119CS13030', 24, '4', '1', 'Bangalore', '9001122330', 1),
(140, 157, NULL, NULL, '119CS13032', 25, '4', '1', 'Bangalore', '9001122332', 1),
(141, 158, NULL, NULL, '119CS13033', 26, '4', '1', 'Bangalore', '9001122333', 1),
(142, 159, NULL, NULL, '119CS13034', 27, '4', '1', 'Bangalore', '9001122334', 1),
(143, 160, NULL, NULL, '119CS12035', 28, '4', '1', 'Bangalore', '9001122335', 1),
(144, 161, NULL, NULL, '119CS13036', 29, '4', '1', 'Bangalore', '9001122336', 1),
(145, 162, NULL, NULL, '119CS13037', 30, '4', '1', 'Bangalore', '9001122337', 1),
(146, 163, NULL, NULL, '119CS13038', 31, '4', '1', 'Bangalore', '900112238', 1),
(147, 164, NULL, NULL, '119CS13043', 32, '4', '1', 'Bangalore', '9001122343', 1),
(148, 165, NULL, NULL, '119CS13045', 33, '4', '1', 'Bangalore', '9001122345', 1),
(149, 166, NULL, NULL, '119CS13046', 34, '4', '1', 'Bangalore', '9001122346', 1),
(150, 167, NULL, NULL, '119CS12047', 35, '4', '1', 'Bangalore', '9001122347', 1),
(151, 168, NULL, NULL, '119CS12048', 36, '4', '1', 'Bangalore', '9001122348', 1),
(152, 169, NULL, NULL, '119CS12049', 37, '4', '1', 'Bangalore', '9001122349', 1),
(153, 170, NULL, NULL, '119CS13050', 38, '4', '1', 'Bangalore', '9001122350', 1),
(154, 171, NULL, NULL, '119CS13051', 39, '4', '1', 'Bangalore', '9001122351', 1),
(155, 172, NULL, NULL, '119CS12052', 40, '4', '1', 'Bangalore', '9001122352', 1),
(156, 173, NULL, NULL, '119CS13054', 41, '4', '1', 'Bangalore', '9001122354', 1),
(157, 174, NULL, NULL, '119CS13055', 42, '4', '1', 'Bangalore', '9001122355', 1),
(158, 175, NULL, NULL, '119CS12056', 43, '4', '1', 'Bangalore', '90011223356', 1),
(159, 176, NULL, NULL, '119CS12057', 44, '4', '1', 'Bangalore', '9001122357', 1),
(160, 177, NULL, NULL, '119CS13058', 45, '4', '1', 'Bangalore', '9001122358', 1),
(161, 178, NULL, NULL, '119CS13060', 46, '4', '1', 'Bangalore', '90011223360', 1),
(162, 179, NULL, NULL, '119CS13061', 47, '4', '1', 'Bangalore', '9001122361', 1),
(163, 180, NULL, NULL, '119CS13062', 48, '4', '1', 'Bangalore', '9001122362', 1),
(164, 181, NULL, NULL, '119CS13204', 49, '4', '1', 'Bangalore', '9001122304', 1),
(165, 182, NULL, NULL, '139CS13007', 50, '4', '1', 'Bangalore', '9001122307', 1),
(166, 183, 'krishna', '2468526825', '119CS12026', 20, '6', '1', 'Banglore', '1457843678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(100) DEFAULT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `subject_type` int(11) NOT NULL DEFAULT '1',
  `semester` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_code`, `subject_name`, `subject_type`, `semester`, `department`) VALUES
(10, '9cs62', 'Network Security and Management', 1, '6', '1'),
(9, '9cs61', 'Software Testing', 1, '6', '1'),
(12, '9cs64P', 'Software Testing Lab', 2, '6', '1'),
(13, '9cs65P', 'Network Security lab', 2, '6', '1'),
(14, '9cs66P', 'Project Work2', 2, '6', '1'),
(15, '9cs51', 'Basic Management Skills and Indian Constitution', 1, '5', '1'),
(16, '9cs52', 'Programmimg with Java', 1, '5', '1'),
(17, '9cs53', 'Web Programming', 1, '5', '1'),
(18, '9cs54p', 'Programming with Java Lab', 1, '5', '1'),
(19, '9cs55p', 'Web Programming Lab', 1, '5', '1'),
(20, '9cs56p', 'CASP', 1, '5', '1'),
(21, '9cs57p', 'Project Work 1', 1, '5', '1'),
(22, '9cs41', 'OOP with C++', 1, '4', '1'),
(23, '9cs42', 'Database Management Systems', 1, '4', '1'),
(24, '9cs43', 'Operating System', 1, '4', '1'),
(25, '9cs44', 'Software Engineering', 1, '4', '1'),
(26, '9cs45p', 'OOP with C++ Lab', 1, '4', '1'),
(27, '9cs46p', 'DBMS Lab', 1, '4', '1'),
(28, '9cs47p', 'Linux Lab', 1, '4', '1'),
(29, '9cs31', 'Computer Organization', 1, '3', '1'),
(30, '9cs32', 'Data Structure Using C', 1, '3', '1'),
(31, '9cs33', 'Computer Networks', 1, '3', '1'),
(32, '9cs34p', 'Data Structure Lab', 1, '3', '1'),
(33, '9cs35p', 'PC Hardware and Networking Lab', 1, '3', '1'),
(34, '9cs36p', 'Graphical User Interface Lab', 1, '3', '1'),
(35, '9cs37p', 'Web Design Lab', 1, '3', '1'),
(36, '9SC02M', 'Applied Mathematics-2', 1, '2', '1'),
(37, '9CP01E', 'English Communication', 1, '2', '1'),
(38, '9EC02E', 'Digital Electronics', 1, '2', '1'),
(39, '9CS01C', 'Programming With C', 1, '2', '1'),
(40, '9EC26P', 'Digital Lab', 1, '2', '1'),
(41, '9CS26P', 'Programming With C Lab', 1, '2', '1'),
(42, '9CS27P', 'Multimedia Lab', 1, '2', '1'),
(43, '9SC01M', 'Applied Mathematics-1', 1, '1', '1'),
(44, '9SC03S', 'Applied Science', 1, '1', '1'),
(45, '9CS13', 'Concepts of Electrical and Electronic Engineering', 1, '1', '1'),
(46, '9CS14', 'Intoduction to Computer Concepts', 1, '1', '1'),
(47, '9SC10P', 'Applied Science Lab', 1, '1', '1'),
(48, '9CS16P', 'Basic Electronics Lab', 1, '1', '1'),
(49, '9CS17P', 'Basic Computer Skills Lab', 1, '1', '1'),
(50, 'TS1ECE', 'Test Subject', 1, '1', '2');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=184 ;

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
(23, 'Anitha', 'K', 'anianitha578@gmail.com', '', 'female', '', 3, '2015-03-17 13:50:35'),
(17, 'demo', 'ams', 'demo@ams.com', '123456', 'male', NULL, 1, '2015-03-10 17:31:30'),
(25, 'Anusha', 'K M', 'anushaputtykm1999@gmail.com', '', 'female', '', 3, '2015-03-17 13:54:29'),
(24, 'Anju', 'N', 'anjunarayan@gmail.com', '', 'female', '', 3, '2015-03-17 13:52:48'),
(26, 'Anusha', 'R', 'anusha04@gmail.com', '', 'female', '', 3, '2015-03-17 13:56:54'),
(27, 'Ashwini', 'D C', 'ashwiniashu0531@gmail.com', '', 'female', '', 3, '2015-03-17 13:57:53'),
(28, 'Monika', 'S', 'monika@gmail.com', '', 'female', '', 3, '2015-03-17 13:58:07'),
(29, 'Ashwini', 'N P', 'ashwini06@gmail.com', '', 'female', '', 3, '2015-03-17 13:59:19'),
(30, 'Monisha C', 'Yajman', 'monisha@gmail.com', '', 'female', '', 3, '2015-03-17 13:59:56'),
(31, 'Bhavana', 'M C', 'bhavana@gmail.com', '', 'female', '', 3, '2015-03-17 14:01:29'),
(32, 'Ashwini', 'S', 'ashuashwini1193@gmail.com', '', 'female', '', 3, '2015-03-17 14:01:37'),
(36, 'Chaithra', 'B', 'chaithra10@gmail.com', '', 'female', '', 3, '2015-03-17 14:05:33'),
(34, 'Bharathi', 'R', 'bharathi08@gmail.com', '', 'female', '', 3, '2015-03-17 14:02:42'),
(35, 'Chaithanya', 'G', 'chaithanya@gmail.com', '', 'female', '', 3, '2015-03-17 14:04:15'),
(37, 'Pranitha', 'G', 'pranitha@gmail.com', '', 'female', '', 3, '2015-03-17 14:05:38'),
(38, 'Anitha', 'S S', 'anitha@gmail.com', '', 'female', '', 3, '2015-03-17 14:08:17'),
(39, 'Annapoornima F', 'Bhajantri', 'annapoornima@gmail.com', '', 'female', '', 3, '2015-03-17 14:09:51'),
(40, 'Chennamma', 'C', 'chennamma2014@gmail.com', '', 'female', '', 3, '2015-03-17 14:13:39'),
(41, 'Arpitha', 'S', 'arpitha@gmail.com', '', 'female', '', 3, '2015-03-17 14:14:43'),
(42, 'Dakshayini', 'L', 'dakshyini12@gmail.com', '', 'female', '', 3, '2015-03-17 14:14:46'),
(43, 'Deeksha', 'D', 'deekshakotyan@gmail.com', '', 'female', '', 3, '2015-03-17 14:16:04'),
(44, 'Ashwini', 'V P', 'ashwini@gmail.com', '', 'female', '', 3, '2015-03-17 14:16:10'),
(45, 'Divya', 'M', 'divyamadesrupusrinivas@gmail.com', '', 'female', '', 3, '2015-03-17 14:17:00'),
(46, 'Harshitha', 'N', 'harshithasjp123@gmail.com', '', 'female', '', 3, '2015-03-17 14:18:04'),
(47, 'Balamangala', 'S H', 'balamangala@gmail.com', '', 'female', '', 3, '2015-03-17 14:18:44'),
(48, 'Hemalatha', 'R', 'hemlatha.prabhudm@gmail.com', '', 'female', '', 3, '2015-03-17 14:19:00'),
(49, 'Bhagya', 'V D', 'bhagya@gmail.com', '', 'female', '', 3, '2015-03-17 14:20:13'),
(50, 'Humera', 'Kousar', 'humerakousar002@gmail.com', '', 'female', '', 3, '2015-03-17 14:20:15'),
(51, 'Jyothi', 'M', 'jyothimuthuraj99@gmail.com', '', 'female', '', 3, '2015-03-17 14:21:19'),
(52, 'Kavya', 'G V', 'kavya19@gmail.com', '', 'female', '', 3, '2015-03-17 14:22:17'),
(53, 'Chaithra', 'M', 'chaithra@gmail.com', '', 'female', '', 3, '2015-03-17 14:22:22'),
(54, 'Kavya', 'K V', 'kavyakvradhika1995@gmail.com', '', 'female', '', 3, '2015-03-17 14:23:12'),
(55, 'Divyashree', 'U K', 'divyashree@gmail.com', '', 'female', '', 3, '2015-03-17 14:24:39'),
(56, 'Gaganashree', 'J', 'gagana@gmail.com', '', 'female', '', 3, '2015-03-17 14:26:09'),
(57, 'Hemalatha', 'N M', 'hema@gmail.com', '', 'female', '', 3, '2015-03-17 14:27:39'),
(58, 'Kalavathi', 'J', 'kala@gmail.com', '', 'female', '', 3, '2015-03-17 14:28:31'),
(59, 'Kavya', 'B R', 'kavya@gmail.com', '', 'female', '', 3, '2015-03-17 14:30:48'),
(60, 'Kavya', 'M', 'kavya2468@gmail.com', '', 'female', '', 3, '2015-03-17 14:39:04'),
(61, 'Keerthi', 'B R', 'keerthi22@gmail.com', '', 'female', '', 3, '2015-03-17 14:40:02'),
(62, 'Kubra', 'Fathima', 'kubrafathima23@gmail.com', '', 'female', '', 3, '2015-03-17 14:41:00'),
(63, 'Latha', 'M C', 'lathamchandrashekar@gmail.com', '', 'female', '', 3, '2015-03-17 14:41:53'),
(64, 'Lavanya', 'K S', 'lavuurs8@gmail.com', '', 'female', '', 3, '2015-03-17 14:42:46'),
(65, 'Mamatha', 'M', 'mamatha26@gmail.com', '', 'female', '', 3, '2015-03-17 14:43:55'),
(66, 'Mamatha', 'P M', 'pmmamatha667@gmail.com', '', 'female', '', 3, '2015-03-17 14:44:35'),
(67, 'Mamta', 'J', 'mamtamadhu5498@gmail.com', '', 'female', '', 3, '2015-03-17 14:45:34'),
(68, 'Latha', 'S', 'latha@gmail.com', '', 'female', '', 3, '2015-03-17 14:46:06'),
(69, 'Manasa', 'G', 'manasa29@gmail.com', '', 'female', '', 3, '2015-03-17 14:46:48'),
(70, 'Manjula Matapathi', 'S', 'manjulamathapathi@gmail.com', '', 'female', '', 3, '2015-03-17 14:52:25'),
(71, 'Monisha', 'V', 'monishavijya1998@gmail.com', '', 'female', '', 3, '2015-03-17 14:54:04'),
(72, 'Nandini', 'K H', 'nandinikh510@gmail.com', '', 'female', '', 3, '2015-03-17 14:55:33'),
(73, 'Nandini N', 'Gowda', 'nandini33@gmail.com', '', 'female', '', 3, '2015-03-17 14:56:49'),
(74, 'Nandini', 'S', 'snandini037@gmail.com', '', 'female', '', 3, '2015-03-17 14:58:11'),
(75, 'Navya', 'N', 'navya35@gmail.com', '', 'female', '', 3, '2015-03-17 14:59:19'),
(76, 'Nayana', 'S', 'nayanas691@yahoo.com', '', 'female', '', 3, '2015-03-17 15:00:25'),
(77, 'Neha', 'Samreen', 'nehasamreen1998@gmail.com', '', 'female', '', 3, '2015-03-17 15:01:31'),
(78, 'Nethra', 'T N', 'nethraimpana78@gmail.com', '', 'female', '', 3, '2015-03-17 15:02:20'),
(79, 'Nusrathjahan R', 'Biradar', 'biradar39@gmail.com', '', 'female', '', 3, '2015-03-17 15:03:44'),
(80, 'Pooja', 'C L', 'poojachoodaiah1234@gmail.com', '', 'female', '', 3, '2015-03-17 15:05:06'),
(81, 'Pooja', 'G', 'poojagangappa@gmail.com', '', 'female', '', 3, '2015-03-17 15:06:01'),
(82, 'Pooja', 'U I', 'pooja42@gmail.com', '', 'female', '', 3, '2015-03-17 15:06:56'),
(83, 'Lavanya', 'G', 'lavanya@gmail.com', '', 'female', '', 3, '2015-03-17 15:36:53'),
(84, 'Madhuri', 'Sawkar', 'madhuri@gmail.com', '', 'female', '', 3, '2015-03-17 15:38:05'),
(85, 'Priya', 'D R', 'priyaappu2651998@gmail.com', '', 'female', '', 3, '2015-03-17 15:40:45'),
(86, 'Megha', 'M', 'megha@gmail.com', '', 'female', '', 3, '2015-03-17 15:41:25'),
(87, 'Ramya', 'S N', 'ramya44@gmail.com', '', 'female', '', 3, '2015-03-17 15:41:29'),
(88, 'Nandini', 'S', 'nandini@gmail.com', '', 'female', '', 3, '2015-03-17 15:42:50'),
(89, 'Nandinibai', 'P', 'nandinibai@gmail.com', '', 'female', '', 3, '2015-03-17 15:44:43'),
(90, 'Navya', 'B', 'navya@gmail.com', '', 'female', '', 3, '2015-03-17 15:46:17'),
(91, 'Ranjitha', 'R', 'ranjitharanju800@gmail.com', '', 'female', '', 3, '2015-03-17 15:47:17'),
(92, 'Noor', 'Ayesha', 'noor@gmail.com', '', 'female', '', 3, '2015-03-17 15:49:27'),
(93, 'Rashmitha', 'S', 'rashmitha099@gmail.com', '', 'female', '', 3, '2015-03-17 15:49:48'),
(94, 'Ooha', 'C', 'ooha@gmail.com', '', 'female', '', 3, '2015-03-17 15:50:39'),
(95, 'Rekha', 'L', 'rekhal350@gmail.com', '', 'female', '', 3, '2015-03-17 15:50:54'),
(96, 'Rohini', 'T', 'rohini@gmail.com', '', 'female', '', 3, '2015-03-17 15:51:41'),
(97, 'Reshma', 'S', 'rdodamanireshma@gmail.com', '', 'female', '', 3, '2015-03-17 15:51:51'),
(98, 'Shilpa', 'R', 'shilpa@gmail.com', '', 'female', '', 3, '2015-03-17 15:52:39'),
(99, 'Ruksar', 'Begum', 'ruksar3785@gmail.com', '', 'female', '', 3, '2015-03-17 15:52:41'),
(100, 'Sowmyashree', 'G T', 'sowmya@gmail.com', '', 'female', '', 3, '2015-03-17 15:53:36'),
(101, 'Sahana', 'S', 'sahanas851@gmail.com', '', 'female', '', 3, '2015-03-17 15:53:38'),
(102, 'Sowmyashree', 'U', 'sowmya1@gmail.com', '', 'female', '', 3, '2015-03-17 15:54:27'),
(103, 'Suchitra', 'A B', 'suchisuchithra952@gmail.com', '', 'female', '', 3, '2015-03-17 15:55:48'),
(104, 'Sukanya', 'N', 'sukanya52@gmail.com', '', 'female', '', 3, '2015-03-17 15:56:46'),
(105, 'Suneetha', 'G', 'suneetha@gmail.com', '', 'female', '', 3, '2015-03-17 15:58:00'),
(106, 'Sangeetha', 'K', 'sangeethakavi@gmail.com', '', 'female', '', 3, '2015-03-17 15:58:47'),
(107, 'Sushma', 'C', 'sushma@gmail.com', '', 'female', '', 3, '2015-03-17 15:58:59'),
(108, 'Saraswathi', 'M', 'saraswathim375@gmail.com', '', 'female', '', 3, '2015-03-17 16:00:33'),
(109, 'Shilpa', 'H R', 'shilparenukaprasadhr@gmail.com', '', 'female', '', 3, '2015-03-17 16:01:54'),
(110, 'Shilpa', 'T', 'shilpa54@gmail.com', '', 'female', '', 3, '2015-03-17 16:02:59'),
(111, 'Sushmitha', 'K', 'sushmitha@gmail.com', '', 'female', '', 3, '2015-03-17 16:03:01'),
(112, 'Shreerakshitha', 'Rakshitha', 'shreerakshitha97@gmail.com', '', 'female', '', 3, '2015-03-17 16:03:58'),
(113, 'Shwetha', 'C R', 'shwethacr6@gmail.com', '', 'female', '', 3, '2015-03-17 16:04:59'),
(114, 'Shwethashree', 'P', 'shwethaPBMS78@gmail.com', '', 'female', '', 3, '2015-03-17 16:06:05'),
(115, 'Sonali', 'B L', 'sonalibalegar@gmail.com', '', 'female', '', 3, '2015-03-17 16:07:12'),
(116, 'Sowmya', 'B', 'sowmyab598@gmail.com', '', 'female', '', 3, '2015-03-17 16:09:07'),
(117, 'Supritha', 'R C', 'suprithamamshetty@gmail.com', '', 'female', '', 3, '2015-03-17 16:10:16'),
(118, 'Thanuja', 'S P', 'thanujavhroy@gmail.com', '', 'female', '', 3, '2015-03-17 16:11:12'),
(119, 'Swetha devi', 'D', 'swethadevi@gmail.com', '', 'female', '', 3, '2015-03-17 16:11:39'),
(120, 'Ujwalakavya', 'J', 'ujwalajaram14@gmail.com', '', 'female', '', 3, '2015-03-17 16:12:19'),
(121, 'Vanishree', 'E', 'vanishree1198@gmail.com', '', 'female', '', 3, '2015-03-17 16:13:40'),
(122, 'Swetha', 'U', 'swetha01@gmail.com', '', 'female', '', 3, '2015-03-17 16:13:46'),
(123, 'Komala', 'M C', 'komala@gmail.com', '', 'female', '', 3, '2015-03-17 16:14:58'),
(124, 'Vasantha', 'R', 'vasantha@gmail.com', '', 'female', '', 3, '2015-03-17 16:16:14'),
(125, 'Meenakshi', 'P', 'meenakshi@gmail.com', '', 'female', '', 3, '2015-03-17 16:16:19'),
(126, 'Vidyashree', 'G', 'vidyashree@gmail.com', '', 'female', '', 3, '2015-03-17 16:17:09'),
(127, 'Pavithra', 'H V', 'pavithra@gmail.com', '', 'female', '', 3, '2015-03-17 16:17:19'),
(128, 'Vinutha', 'A S', 'vinutha@gmail.com', '', 'female', '', 3, '2015-03-17 16:18:05'),
(129, 'Syeda Noubahar', 'Fazila Sayee', 'fazilla4747@gmail.com', '', 'female', '', 3, '2015-03-17 16:18:35'),
(130, 'Yogeshwari', 'K', 'Yogeshwari@gmail.com', '', 'female', '', 3, '2015-03-17 16:19:38'),
(131, 'Yeshaswini', 'M', 'Yeshaswini@gmail.com', '', 'female', '', 3, '2015-03-17 16:21:44'),
(132, 'Triveni', 'K', 'trivenii@gmail.com', '', 'female', '', 3, '2015-03-17 16:28:41'),
(133, 'Chaitra', 'G S', 'chaitra@gmail.com', '', 'female', '', 3, '2015-03-18 09:14:12'),
(134, 'Rashmi', 'P', 'rashmi@gmail.com', '', 'female', '', 3, '2015-03-18 12:41:09'),
(135, 'Thanuja', 'H S', 'thanu@gmail.com', '', 'female', '', 3, '2015-03-18 12:42:00'),
(136, 'Akshatha', 'B', 'akshatha@gmail.com', '', 'female', '', 3, '2015-03-18 12:42:56'),
(137, 'Akshatha', 'N', 'akshatha1@gmail.com', '', 'female', '', 3, '2015-03-18 12:47:32'),
(138, 'Ankitha', 'V', 'anki@gmail.com', '', 'female', '', 3, '2015-03-18 12:48:24'),
(139, 'Ashwini', 'L', 'ashu@gmail.com', '', 'female', '', 3, '2015-03-18 12:50:56'),
(140, 'Bhuvana', 'V', 'bhuvana@gmail.com', '', 'female', '', 3, '2015-03-18 12:51:51'),
(141, 'Chaitra', 'M', 'chai@gmail.com', '', 'female', '', 3, '2015-03-18 12:54:35'),
(142, 'Divya shree', 'D G', 'divya@gmail.com', '', 'female', '', 3, '2015-03-18 12:56:02'),
(143, 'Gowthami', 'C R', 'cr@gmail.com', '', 'female', '', 3, '2015-03-18 12:57:10'),
(144, 'Harini', 'T S', 'harini@gmail.com', '', 'female', '', 3, '2015-03-18 12:58:15'),
(145, 'Kavya', 'J', 'kavya3@gmail.com', '', 'female', '', 3, '2015-03-18 12:59:10'),
(146, 'Kavya', 'V', 'kav@gmail.com', '', 'female', '', 3, '2015-03-18 12:59:52'),
(147, 'Lakshmi', 'V', 'lak@gmail.com', '', 'female', '', 3, '2015-03-18 13:00:45'),
(148, 'Lavanya', 'L', 'lav@gmail.com', '', 'female', '', 3, '2015-03-18 13:01:33'),
(149, 'Lavanya', 'G S', 'lava@gmail.com', '', 'female', '', 3, '2015-03-18 13:02:39'),
(150, 'Leelavathi', 'K', 'leela@gmail.com', '', 'female', '', 3, '2015-03-18 13:03:28'),
(151, 'Manya', 'P', 'man@gmail.com', '', 'female', '', 3, '2015-03-18 13:06:52'),
(152, 'Megha', 'C', 'meg@gmail.com', '', 'female', '', 3, '2015-03-18 13:07:49'),
(153, 'Musarrath', 'Deeba', 'deeba@gmail.com', '', 'female', '', 3, '2015-03-18 13:08:46'),
(154, 'Mythri', 'B', 'my@gmail.com', '', 'female', '', 3, '2015-03-18 13:09:36'),
(155, 'Nagashree', 'G R', 'naga@gmail.com', '', 'female', '', 3, '2015-03-18 13:10:28'),
(156, 'Navyashree N', 'Yadav', 'nav@gmail.com', '', 'female', '', 3, '2015-03-18 13:11:42'),
(157, 'Poojashree', 'P', 'poja@gmail.com', '', 'female', '', 3, '2015-03-18 13:19:23'),
(158, 'Prathiksha', 'H', 'prathi@gmail.com', '', 'female', '', 3, '2015-03-18 13:20:17'),
(159, 'Pushpa', 'R', 'pushpa@gmail.com', '', 'female', '', 3, '2015-03-18 13:21:51'),
(160, 'Rachana', 'M', 'rac@gmail.com', '', 'female', '', 3, '2015-03-18 13:23:03'),
(161, 'Radha', 'V', 'radha@gmail.com', '', 'female', '', 3, '2015-03-18 13:25:00'),
(162, 'Rahana', 'C T', 'rah@gmail.com', '', 'female', '', 3, '2015-03-18 13:26:00'),
(163, 'Ramya', 'S', 'ramya@gmail.com', '', 'female', '', 3, '2015-03-18 13:26:43'),
(164, 'Sangeetha', 'S M', 'san@gmail.com', '', 'female', '', 3, '2015-03-18 13:27:45'),
(165, 'Shruthi', 'M', 'shruthi@gmail.com', '', 'female', '', 3, '2015-03-18 13:28:39'),
(166, 'Shwetha', 'j', 'swetha1@gmail.com', '', 'female', '', 3, '2015-03-18 13:31:02'),
(167, 'Sindhu', 'C', 'sin@gmail.com', '', 'female', '', 3, '2015-03-18 13:32:31'),
(168, 'Sindhu', 'N', 'sindhu@gmail.com', '', 'female', '', 3, '2015-03-18 13:34:05'),
(169, 'Sowmya', 'B', 'sow@gmail.com', '', 'female', '', 3, '2015-03-18 13:35:00'),
(170, 'Suchithra', 'C', 'suchi@gmail.com', '', 'female', '', 3, '2015-03-18 13:36:15'),
(171, 'Suma', 'A-', 'suma@gmail.com', '', 'female', '', 3, '2015-03-18 13:37:11'),
(172, 'Sunitha', 'M s', 'suni@gmail.com', '', 'female', '', 3, '2015-03-18 13:37:57'),
(173, 'Tejaswini', 'K R', 'teja@gmail.com', '', 'female', '', 3, '2015-03-18 13:38:37'),
(174, 'Tejaswini', 'N', 'teja1@gmail.com', '', 'female', '', 3, '2015-03-18 13:39:17'),
(175, 'Thanuja', 'S', 'thanu1@gmail.com', '', 'female', '', 3, '2015-03-18 13:40:05'),
(176, 'Varshitha', 'N R', 'var@gmail.com', '', 'female', '', 3, '2015-03-18 13:40:48'),
(177, 'Veenashree', 'S V', 'veena@gmail.com', '', 'female', '', 3, '2015-03-18 13:41:34'),
(178, 'Yashashwini', 'B', 'YASHU@GMAIL.COM', '', 'female', '', 3, '2015-03-18 13:42:31'),
(179, 'Yashaswini', 'D', 'YASHU1@GMAIL.COM', '', 'female', '', 3, '2015-03-18 13:43:18'),
(180, 'Yashaswini', 'M', 'YASHU2@GMAIL.COM', '', 'female', '', 3, '2015-03-18 13:45:19'),
(181, 'Pavithra', 'M', 'pavi@gmail.com', '', 'female', '', 3, '2015-03-18 13:46:16'),
(182, 'Apporva', 'Upadye', 'apporva@gmail.com', '', 'female', '', 3, '2015-03-18 13:47:26'),
(183, 'Manjula', '', 'manjula@gmail.com', '', 'female', '', 3, '2015-03-18 17:27:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
