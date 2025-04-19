-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 01:45 PM
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
-- Database: `grievance_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_desc` varchar(500) NOT NULL,
  `ward_or_panchayat` varchar(10) DEFAULT NULL,
  `ward_no` varchar(50) DEFAULT NULL,
  `panchayat` varchar(100) DEFAULT NULL,
  `vidhansabha` varchar(50) DEFAULT NULL,
  `loksabha` varchar(50) NOT NULL,
  `create_ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_desc`, `ward_or_panchayat`, `ward_no`, `panchayat`, `vidhansabha`, `loksabha`, `create_ts`) VALUES
(111, 'Kanke', 'Ward', '7', NULL, 'Ranchi', 'Ranchi', '2024-03-15 12:01:10'),
(112, 'Hatia', 'Ward', '4', NULL, 'Hatia', 'Ranchi', '2024-03-15 12:01:04'),
(113, 'Ranchi', 'Ward', '8', '', 'Ranchi', 'Ranchi', '2024-03-15 12:00:48'),
(114, 'Gonda', 'Ward', '7', '', 'Ranchi', 'Ranchi', '2024-03-19 08:45:19'),
(116, 'rfvrf', 'Ward', '4', '', 'Silli', 'Ranchi', '2024-03-19 09:24:33'),
(117, '117', 'Ward', '12', '', 'Silli', 'Ranchi', '2024-04-01 10:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `case_category`
--

CREATE TABLE `case_category` (
  `category_id` int(11) NOT NULL,
  `category_desc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_category`
--

INSERT INTO `case_category` (`category_id`, `category_desc`) VALUES
(101, 'Police'),
(102, 'Hospital'),
(103, 'BDO/CO Office'),
(104, 'Mukhiya'),
(105, 'Personal'),
(106, 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `case_subcategory`
--

CREATE TABLE `case_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_subcategory`
--

INSERT INTO `case_subcategory` (`subcategory_id`, `category_id`, `subcategory_desc`) VALUES
(201, 101, 'FIR'),
(202, 101, 'Not taking the Case'),
(203, 101, 'Civial Case'),
(204, 101, 'Crimial Case'),
(205, 101, 'SC/ST Case'),
(206, 102, 'Pregnancy'),
(207, 102, 'Ambulance'),
(208, 102, 'Ayshman Related'),
(209, 102, 'Blood Require'),
(210, 102, 'Financial'),
(211, 102, 'Hospital Mis-management'),
(212, 102, 'Shav Wahan'),
(213, 103, 'Land Dispute'),
(214, 103, 'Mutation'),
(215, 103, 'Pension'),
(216, 103, 'Cerification Related'),
(217, 103, 'Land Compensation'),
(218, 103, 'Ration Card'),
(219, 103, 'Ayushman Card'),
(220, 103, 'Pension'),
(221, 103, 'Death'),
(222, 103, 'Birth'),
(223, 103, 'PM Awas'),
(224, 103, 'Abua Awas'),
(225, 104, 'Certification Related'),
(226, 105, 'Job Related'),
(227, 105, 'Family Fight'),
(228, 105, 'Compension (muawaza) -job, electric wire'),
(229, 106, 'Well'),
(230, 106, 'Lake'),
(231, 106, 'Nalkoop'),
(232, 106, 'KCC'),
(233, 106, 'Boring'),
(234, 106, 'Fasal Bima'),
(235, 106, 'Compension');

-- --------------------------------------------------------

--
-- Table structure for table `complainant_details`
--

CREATE TABLE `complainant_details` (
  `id` int(11) NOT NULL,
  `case_id` varchar(15) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `d_o_b` date NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `educational_qualification` varchar(50) NOT NULL,
  `address_line_1` varchar(100) NOT NULL,
  `address_line_2` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(9) NOT NULL,
  `lok_sabha` varchar(100) NOT NULL,
  `vidhan_sabha` varchar(100) NOT NULL,
  `ward_no` int(5) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `status_id` varchar(15) NOT NULL,
  `case_priority` varchar(20) NOT NULL,
  `document1` varchar(200) DEFAULT NULL,
  `document2` varchar(200) DEFAULT NULL,
  `document3` varchar(200) DEFAULT NULL,
  `case_assigned_to` varchar(150) DEFAULT NULL,
  `create_ts` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `last_updated_ts` datetime NOT NULL,
  `last_updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complainant_details`
--

INSERT INTO `complainant_details` (`id`, `case_id`, `branch_id`, `name`, `d_o_b`, `guardian_name`, `gender`, `contact_no`, `occupation`, `educational_qualification`, `address_line_1`, `address_line_2`, `district`, `state`, `city`, `pincode`, `lok_sabha`, `vidhan_sabha`, `ward_no`, `category_id`, `subcategory_id`, `description`, `status_id`, `case_priority`, `document1`, `document2`, `document3`, `case_assigned_to`, `create_ts`, `created_by`, `last_updated_ts`, `last_updated_by`) VALUES
(17, 'CAS4829656', 111, 'rohan', '2024-03-08', 'suraj bali', 'Male', 9999454051, 'Government job', '10th Pass', 'D21 Officer Colony Dugda, Bokaro', 'fgfg', 'Ranchi', 'Jharkhand', 'Bokaro', 8284012, 'Khijri', 'Silli', 1, 101, 215, 'xcxc', 'Pending', 'Medium', NULL, NULL, NULL, '1', '2024-03-06 16:30:24', 'executive', '2024-03-18 12:14:11', 'agent'),
(18, 'CAS3104665', 111, 'pankaj', '2024-03-13', 'QWERTG dwd', 'Male', 9234567807, 'Private Job', '10th Pass', 'D21 officer colony dugda Bokaro', 'edfcdrv', 'sdetryu ds', 'BIHAR', 'AURANGABAD', 824101, 'Kanke', 'Ranchi', 3, 101, 215, '', 'new', 'low', NULL, NULL, NULL, '2', '2024-03-06 16:34:48', 'executive', '2024-03-18 12:28:47', 'agent'),
(19, 'CAS9393343', 111, 'puja', '2024-03-19', 'dcd', 'Female', 564324567, 'cfdvc', 'dfcfvrev', 'wertjhgbfvcwerthg', 'fgfg', 'ranchi', 'Jharkhand', 'dugda', 828404, 'Kanke', 'Ranchi', 3, 101, 216, '', 'Pending', 'low', NULL, NULL, NULL, '', '2024-03-02 16:51:00', 'agents', '2024-03-05 14:57:53', 'agent'),
(20, 'CAS7670854', 112, 'rahul', '2024-03-13', 'ndbcjikl', 'Male', 987654390876, 'nfdbvkjndfv', 'dfve', 'jndfh n djvnifm, nkl', 'nd vjkfhdov', 'dhanbad', 'Jharkhand', 'dugda', 828404, 'Kanke', 'Ranchi', 4, 102, 215, '', 'new', 'Medium', NULL, NULL, NULL, '', '2024-03-06 16:32:01', 'executive', '2024-03-06 16:32:01', 'executive'),
(21, 'CAS9129368', 112, 'priti', '2024-03-29', 'Surendra Manjhi', 'Female', 987654, 'Private Job', '12th Pass', 'fjvbifhiovkl', ',nbjvkcbuo', 'rfe', 'Jharkhand', 'dugda', 828404, 'Kanke', 'Ranchi', 8, 102, 215, '', 'new', 'higher', NULL, NULL, NULL, '', '2024-03-06 16:35:13', 'executive', '2024-03-06 16:35:13', 'executive'),
(22, 'CAS8756556', 113, 'raj', '2024-03-21', 'frfv', 'Male', 983467821, 'efwr', 'sdvfdg', 'dsfvfvrf', 'reft', 'vcfrv', 'Jharkhand', 'dugda', 828404, 'Kanke', 'Ranchi', 6, 101, 207, '', 'Completed', 'low', NULL, NULL, NULL, '', '2024-03-02 16:54:33', 'agents', '2024-03-05 13:54:07', 'agent'),
(23, 'CAS7027852', 113, 'prayanshu', '2024-03-14', 'dcsf', 'Male', 9234567807, 'c vc dscd', 'scds', 'D21 officer colony dugda Bokaro', 'dsc', 'ds', 'Jharkhand', 'Bokaro', 828404, 'Kanke', 'Ranchi', 7, 101, 210, '', 'Pending', 'low', NULL, NULL, NULL, '', '2024-03-02 16:55:26', 'agents', '2024-03-07 14:29:45', 'agent'),
(24, 'CAS7346765', 111, 'jcnd', '2024-03-13', 'QWERTG', 'Female', 3456577654, 'xcdvfd', 'dvscf', 'dcfsvsdc', 'fbgnh', 'cvfdb', 'zcdvfb', 'cdfbg', 828404, 'Kanke', 'Ranchi', 8, 102, 211, '', 'completed', 'higher', NULL, NULL, NULL, '', '2024-03-02 16:56:35', 'agents', '0000-00-00 00:00:00', ''),
(25, 'CAS2879110', 112, 'shiv', '2024-03-21', 'scddvf', 'Male', 34567890, 'cdvfv', 'SAERTG', 'dvfdscvs', 'dfvfdsc', 'ds', 'BIHAR', 'AURANGABAD', 824101, 'Kanke', 'Ranchi', 9, 102, 217, '', 'new', 'low', NULL, NULL, NULL, '', '2024-03-02 16:57:40', 'agents', '0000-00-00 00:00:00', ''),
(26, 'CAS7760171', 113, 'bablu', '2024-03-12', 'dscd', 'Male', 9999454053, 'cfd', 'wdfef', 'D21 officer colony dugda Bokaro', 'fgfg', 'sdc', 'ds', 'ds', 56432, 'Kanke', 'Ranchi', 10, 102, 220, '', 'completed', 'higher', NULL, NULL, NULL, '', '2024-03-02 16:58:51', 'agents', '0000-00-00 00:00:00', ''),
(27, 'CAS2665989', 113, 'kajal', '2024-03-21', 'suraj bali saw', 'Female', 9999454053, 'vcd', 'dcf', 'D21 officer colony dugda Bokaro', 'fgfg', 'dcewedc', 'rf', 'edwc', 0, 'Kanke', 'Ranchi', 11, 101, 218, '', 'Pending', 'low', NULL, NULL, NULL, '', '2024-03-02 16:59:50', 'agents', '2024-03-05 13:11:47', 'agent'),
(28, 'CAS8279074', 113, 'sapna', '2024-03-13', 'cdc', 'Female', 65437654, 'vddcxz', 'bgfbth', 'vfdv', 'vfdd', 'dsvfvsd', 'rfgt', 'dsvf', 0, 'Kanke\n', 'Ranchi', 12, 101, 222, '', 'Pending', 'medium', NULL, NULL, NULL, 'Warning:  Attempt to read property', '2024-03-02 17:02:35', 'agents', '2024-03-15 16:46:43', 'agent'),
(29, 'CAS7250174', 112, 'wedfg', '2024-02-25', 'asdfg', 'Female', 234567876542, 'sdretyh', 'ASERTYHJ', 'sdfg', '', 'asdfg', 'aserfg', 'aWEF', 0, 'Kanke\n', 'Ranchi', 13, 101, 214, '', 'pending', 'higher', NULL, NULL, NULL, '', '2024-03-04 12:50:04', 'agents', '0000-00-00 00:00:00', ''),
(30, 'CAS7082610', 111, 'nehadscx', '2024-02-26', 'wertyhgfdv', 'Female', 32456765432, 'asewrtyghv', 'we45r6t7yu', 'ewrytgh', 're5tyhgf', 'ew45rtyujh', 'Jharkhand', 'Bokaro', 828404, 'Kanke', 'Ranchi', 14, 102, 205, '', 'completed', 'low', NULL, NULL, NULL, '', '2024-03-04 15:49:39', 'agents', '0000-00-00 00:00:00', ''),
(44, 'CAS1794720', 112, 'asxdfgnh', '2024-02-26', 'sdfghj', 'Male', 3456787654, 'Business', '12th Pass', 'D21 officer colony dugda Bokaro', 'fgfg', 'sdetryu', 'Jharkhand', 'Bokaro', 828404, 'Ranchi', 'Khijri', 12, 101, 206, 'जैसे की हम काम नहीं करते।', 'new', 'low', 'ChavviHouseAbrahamJohnArchitects_exteriorview.jpg', NULL, 'icons8-eye-24.png', '', '2024-03-15 15:04:10', 'agent', '2024-03-15 15:04:10', 'agent'),
(45, 'CAS7549138', 111, 'wdertgfb', '1996-05-19', 'werg', 'Other', 32456, 'Business', '10th Pass', 'asedfgb', 'gh', 'fvsdf', 'Jharkhand', 'dfsd', 123456, 'Ranchi', 'Silli', 2, 101, 218, 'zxdzcdf', 'new', 'Medium', '53F5.jpg', 'download.jpeg', 'images (1).jpeg', NULL, '2024-03-19 14:37:44', 'agent', '2024-03-19 14:37:44', 'agent'),
(46, 'CAS5359817', 111, 'rgtrhrh', '2024-03-12', 'tgr', 'Male', 3456789643, 'Government job', '10th Pass', 'fvferfre', 'rftyt', 'erfe', 'Jharkhand', 'erfe', 123456, 'Ranchi', 'Tamar', 11, 102, 215, 'dgerger', 'new', 'Higher', '53F5.jpg', 'images (1).jpeg', 'download.jpeg', NULL, '2024-03-19 15:00:28', 'agent', '2024-03-19 15:00:28', 'agent'),
(47, 'CAS7617953', 116, 'gdfg', '2024-03-31', 'dfgd', 'Male', 1222123221, 'Private Job', 'Graduated', 'efer', 'gdfgdfg', 'fgdg', 'Jharkhand', 'fgdgdg', 343212, 'Ranchi', 'Khijri', 14, 103, 204, 'retert', 'new', '', 'R.jpeg.jpg', '', '', NULL, '2024-04-05 14:17:20', 'agent', '2024-04-05 14:17:20', 'agent'),
(48, 'CAS2057034', 113, 'cxvxc', '2024-04-16', 'cv', 'Male', 3344555555, 'Private Job', '12th Pass', 'xcv', 'c', 'xcz', 'Jharkhand', 'zcv12321', 222222, 'Ranchi', 'Khijri', 10, 103, 211, 'csa', 'new', 'Medium', 'R.jpeg.jpg', '', '', NULL, '2024-04-05 14:18:43', 'agent', '2024-04-05 14:18:43', 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `customer_service`
--

CREATE TABLE `customer_service` (
  `id` int(11) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `guardians_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `ward` int(11) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `vidhamSabha` varchar(50) NOT NULL,
  `lokSabha` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `services` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `createdTs` datetime NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `lastUpdatedTs` datetime NOT NULL,
  `lastUpdatedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_service`
--

INSERT INTO `customer_service` (`id`, `service_id`, `name`, `branch_id`, `guardians_name`, `dob`, `mobile`, `gender`, `occupation`, `qualification`, `address1`, `address2`, `ward`, `district`, `state`, `pincode`, `vidhamSabha`, `lokSabha`, `city`, `services`, `status`, `createdTs`, `createdBy`, `lastUpdatedTs`, `lastUpdatedBy`) VALUES
(1, '', 'आप कैसे हैं?', 111, '', '0000-00-00', 0, '', '', '', '', '', 0, '', '', 0, '', '', '', '', 'Pending', '2024-03-07 09:38:22', '', '2024-03-07 09:38:22', ''),
(2, 'SER2125410', 'neha', 112, 'suraj bali saw', '2000-06-24', 9894358932, 'Female', 'Government job', 'Post Graduated', 'D21 officer colony dugda Bokaro', 'fgfg', 9, 'BOKARO', 'Jharkhand', 828404, 'Ranchi', 'Kanke', 'Bokaro', 'Water Tank', 'Completed', '2024-03-07 14:23:30', 'agent', '2024-03-08 15:16:53', 'agent'),
(3, 'SER6739995', 'sdfsdf', 0, 'sdfs', '2024-03-18', 123456789, 'Male', 'Government job', 'Graduated', 'sdfs', 'sdf', 2, 'dsf', 'Jharkhand', 834008, 'Silli', 'Ranchi', 'Ranchi', 'Water Tank', 'new', '2024-03-19 14:40:10', 'agent', '2024-03-19 14:40:10', 'agent'),
(4, 'SER6177143', 'dfsdf', 112, 'cxxccs', '2024-04-05', 1234321230, 'Male', 'Government job', '10th Pass', 'cvvsd', 'dfsfs', 17, 'dsfdsfs', 'Jharkhand', 0, 'Ranchi', 'Ranchi', 'dfs', 'Funeral', 'new', '2024-04-05 13:05:22', 'agent', '2024-04-05 13:05:22', 'agent'),
(5, 'SER2113883', 'cxvxc', 116, 'vdv', '0000-00-00', 3344555555, 'Male', 'Private Job', 'Post Graduated', 'xcv', 'c', 6, 'dfsf', 'Jharkhand', 222222, 'Ranchi', 'Ranchi', 'zcv12321', 'Water Tank', 'new', '2024-04-05 14:20:15', 'agent', '2024-04-05 14:20:15', 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `desk_agent_details`
--

CREATE TABLE `desk_agent_details` (
  `desk_agent_id` int(11) NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `login_id` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `d_o_b` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `ward_no` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `passing_year` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `work_email` varchar(100) NOT NULL,
  `office_address` varchar(100) NOT NULL,
  `create_ts` datetime NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `last_update_ts` datetime NOT NULL,
  `last_updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desk_agent_details`
--

INSERT INTO `desk_agent_details` (`desk_agent_id`, `agent_name`, `login_id`, `password`, `branch_id`, `contact_no`, `d_o_b`, `gender`, `address`, `state`, `district`, `city`, `ward_no`, `pincode`, `qualification`, `institute`, `passing_year`, `occupation`, `company_name`, `work_email`, `office_address`, `create_ts`, `create_by`, `last_update_ts`, `last_updated_by`) VALUES
(1, 'sdscsdcfsd', '', '1234', 111, 768767851, '2014-01-12', 'male', 'vbcvbcv', 'sdfsnbnb', 'cxxvcxv cvc', 'dcxv vc', '1', 234531, 'cxcvbvb cvc', 'bvbv cvc', '7543', 'dsfsdfnvn', 'nvn jgbjv', 'nbn@gmail.com', 'vcc', '2024-04-01 16:29:26', 'executive', '2024-04-01 16:29:26', 'executive'),
(2, 'xcv', 'AG9135237', '2134', 112, 1234567891, '2024-02-25', 'male', 'dfsfsdfsdf', 'dfs', 'dfsd', 'cvv', '2', 123212, 'dfsdf', 'dfsdfs', 'dfs', 'dfs', 'sdfdsf', 'sdfs@gmail.com', 'vdfsfs', '2024-03-16 13:12:25', 'executive', '2024-03-16 13:12:25', 'executive'),
(3, 'fsdf', '', '', 113, 1234332212, '2024-03-05', 'male', 'dffssdf', 'fsdf', 'sdfs', 'fsdf', '1', 0, 'dfgsgf', 'fdgd', '1234', 'fdgfgd', 'dfdg', 'sds@gmail.com', 'ewrwrw', '2024-03-16 13:19:11', 'executive', '2024-03-16 13:19:11', 'executive'),
(4, 'vxv', '', '', 113, 1232123432, '2024-03-04', 'other', 'dafaf', 'sdf', 'sdf', 'dsfsd', '3', 0, 'dfs', 'dfs', '1234', 'dfs', 'fsdfs', 'dsf@gmail.com', 'sdfsdf', '2024-03-16 13:20:37', 'executive', '2024-03-16 13:20:37', 'executive'),
(5, 'jk', 'AG4309153', '2323', 112, 1234567898, '2024-03-07', 'female', '', '', '', '', '', 0, '', '', '', 'dsds', 'sdds', 'ds@gmail.com', 'xcsxcs', '2024-03-19 14:52:22', 'executive', '2024-03-19 14:52:22', 'executive'),
(6, 'gbffd', 'AG9569227', '1234', 117, 1234567898, '2017-12-31', 'male', 'xzcc', 'dsf', 'df', 'ds', '2', 123456, 'ghfghg', 'gfhf', '1999', 'vxcvxv', 'jhgjgnbnnbv', 'dczc@gmail.com', 'vxcvxvxvx', '2024-04-01 16:28:12', 'executive', '2024-04-01 16:28:12', 'executive');

-- --------------------------------------------------------

--
-- Table structure for table `field_agent_branch_assign`
--

CREATE TABLE `field_agent_branch_assign` (
  `id` int(11) NOT NULL,
  `field_agent_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `branch_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `field_agent_branch_assign`
--

INSERT INTO `field_agent_branch_assign` (`id`, `field_agent_id`, `branch_id`, `branch_desc`) VALUES
(14, 2, 111, ''),
(21, 2, 112, ''),
(22, 2, 113, ''),
(25, 6, 111, ''),
(26, 6, 112, ''),
(33, 3, 113, ''),
(34, 3, 111, ''),
(35, 3, 112, ''),
(36, 5, 111, ''),
(44, 1, 111, ''),
(45, 1, 112, ''),
(46, 1, 113, '');

-- --------------------------------------------------------

--
-- Table structure for table `field_agent_details`
--

CREATE TABLE `field_agent_details` (
  `field_agent_id` int(11) NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `d_o_b` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `ward_no` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `passing_year` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `work_email` varchar(100) NOT NULL,
  `office_address` varchar(100) NOT NULL,
  `create_ts` datetime NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `last_update_ts` datetime NOT NULL,
  `last_updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `field_agent_details`
--

INSERT INTO `field_agent_details` (`field_agent_id`, `agent_name`, `branch_id`, `contact_no`, `password`, `d_o_b`, `gender`, `address`, `state`, `district`, `city`, `ward_no`, `pincode`, `qualification`, `institute`, `passing_year`, `occupation`, `company_name`, `work_email`, `office_address`, `create_ts`, `create_by`, `last_update_ts`, `last_updated_by`) VALUES
(1, 'ckjdbs', 111, 7687678512, '1234', '2014-03-01', 'female', '', 'sdfsnbnb cvxx', 'nbn', 'dcxv', 'nbn', 234531, 'cxcvbvb', 'bvbv', '7543', 'dsfsdfnvn', 'nvn jgbjv vx', 'nbn@gmail.com', '', '2024-04-01 16:26:29', 'executive', '2024-04-01 16:26:29', 'executive'),
(2, 'sds', 112, 7676868686, '', '2014-03-02', 'female', 'jhjhjhjjh', 'sdfsnbnb', 'nbbm', 'sdfgnvbn', '5', 234531, 'sgsg', 'mbmb', 'nbnvn', 'rvxv', 'jhjhj', 'nbn@gmail.com', 'nbmb', '2024-03-06 22:54:25', 'executive', '2024-03-06 22:54:25', 'executive'),
(3, 'dfs', 0, 34234234, '', '2024-02-25', 'female', 'nbnb', 'sfs3424', 'sdf', 'dfssdfdsfs', '1', 342, 'fdsfds', 'dsd34343', '32', 'dfds', '0', 'sdf@gmail.com', 'jjjbn', '2024-03-06 22:57:40', 'executive', '2024-03-06 22:57:40', 'executive'),
(4, 'xsd', 0, 233232312, '', '2024-03-07', 'male', 'dasdada', 'erw', 'erw', 'eq', 'dad', 3222, 'dsdf', 'dsd', '2334', 'sdfs', 'sdfs', 'df@gmail.com', 'edfafs', '2024-03-05 13:20:00', 'executive', '2024-03-05 13:20:00', 'executive'),
(5, 'xsd', 0, 233232312, '', '2024-03-07', 'male', 'ghghghghghgh', 'erwgh', 'erw ghg', 'eqb', 'dadghg', 322256, 'dsdf ghg', 'dsd fgf', '2334', 'sdfs gn', 'sdfs gjg', 'df@gmail.com', 'ghghghghg', '2024-03-06 22:41:53', 'executive', '2024-03-06 22:41:53', 'executive'),
(6, 'sdfs22323', 112, 1234321234, '', '2024-03-04', 'female', 'dssfsdfsdf', 'df', 'sds', 'sdf', '1', 0, 'dsfs', 'dsfs', '1233', 'sdfsd', 'sd', 'fs@gmail.com', 'dfsfsd', '2024-03-16 13:23:25', 'executive', '2024-03-16 13:23:25', 'executive'),
(7, 'hghfg', 117, 1234321234, '1234', '2018-01-01', 'male', 'dfsddg fbcvbcvbcbcbvc', 'fdd', 'dfd', 'fdf', '1', 123321, 'wdsf', 'fdd', '1999', 'fd', 'vdf', 'sds@gmail.com', 'dfsdfsdfsfsdfs', '2024-04-01 16:08:31', 'executive', '2024-04-01 16:08:31', 'executive');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `branch_id` varchar(20) DEFAULT NULL,
  `create_ts` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_id`, `password`, `role`, `branch_id`, `create_ts`) VALUES
('agent007', '1234', 'agent', '111', '2024-03-01 10:23:43'),
('exe007', '1234', 'executive', '', '2024-03-05 09:30:08'),
('reviewer007', '1234', 'reviewer', '111', '2024-03-18 13:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_branch_assign`
--

CREATE TABLE `reviewer_branch_assign` (
  `id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviewer_branch_assign`
--

INSERT INTO `reviewer_branch_assign` (`id`, `reviewer_id`, `branch_id`) VALUES
(1, 5, 111),
(6, 5, 112),
(7, 5, 113);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_details`
--

CREATE TABLE `reviewer_details` (
  `reviewer_id` int(11) NOT NULL,
  `reviewer_name` varchar(50) NOT NULL,
  `login_id` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `d_o_b` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `ward_no` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `passing_year` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `work_email` varchar(100) NOT NULL,
  `office_address` varchar(100) NOT NULL,
  `create_ts` datetime NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `last_update_ts` datetime NOT NULL,
  `last_updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviewer_details`
--

INSERT INTO `reviewer_details` (`reviewer_id`, `reviewer_name`, `login_id`, `password`, `contact_no`, `d_o_b`, `gender`, `address`, `state`, `district`, `city`, `ward_no`, `pincode`, `qualification`, `institute`, `passing_year`, `occupation`, `company_name`, `work_email`, `office_address`, `create_ts`, `create_by`, `last_update_ts`, `last_updated_by`) VALUES
(5, 'dwdsd', 'RE9616378', '32423jh', 878888888, '2024-01-31', 'male', 'mmnmm', 'fsdf', 'dfs234', 'dfd', '1', 32, 'fsf', 'fs', '2342', 'dfsf', 'fsdfsfs', 'sdfs@gmail.com', 'bjbjbjbjbjb', '2024-03-06 23:07:06', 'executive', '2024-03-06 23:07:06', 'executive');

-- --------------------------------------------------------

--
-- Table structure for table `ward_details`
--

CREATE TABLE `ward_details` (
  `ward_id` int(10) NOT NULL,
  `ward_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ward_details`
--

INSERT INTO `ward_details` (`ward_id`, `ward_no`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `complainant_details`
--
ALTER TABLE `complainant_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_service`
--
ALTER TABLE `customer_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desk_agent_details`
--
ALTER TABLE `desk_agent_details`
  ADD PRIMARY KEY (`desk_agent_id`);

--
-- Indexes for table `field_agent_branch_assign`
--
ALTER TABLE `field_agent_branch_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field_agent_details`
--
ALTER TABLE `field_agent_details`
  ADD PRIMARY KEY (`field_agent_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `reviewer_branch_assign`
--
ALTER TABLE `reviewer_branch_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewer_details`
--
ALTER TABLE `reviewer_details`
  ADD PRIMARY KEY (`reviewer_id`);

--
-- Indexes for table `ward_details`
--
ALTER TABLE `ward_details`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `complainant_details`
--
ALTER TABLE `complainant_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customer_service`
--
ALTER TABLE `customer_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `desk_agent_details`
--
ALTER TABLE `desk_agent_details`
  MODIFY `desk_agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `field_agent_branch_assign`
--
ALTER TABLE `field_agent_branch_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `field_agent_details`
--
ALTER TABLE `field_agent_details`
  MODIFY `field_agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviewer_branch_assign`
--
ALTER TABLE `reviewer_branch_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviewer_details`
--
ALTER TABLE `reviewer_details`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
