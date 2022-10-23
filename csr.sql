-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for csr
CREATE DATABASE IF NOT EXISTS `csr` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `csr`;

-- Dumping structure for table csr.account
CREATE TABLE IF NOT EXISTS `account` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `current_city_region` varchar(255) NOT NULL,
  `k_ketema_woreda` varchar(255) NOT NULL,
  `kebele` varchar(255) NOT NULL,
  `H_No` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `p_o_box` int(255) NOT NULL,
  `emergency_contact_name` varchar(255) NOT NULL,
  `emergency_contact_city` varchar(255) NOT NULL,
  `emergency_contact_k_ketema_woreda` varchar(255) NOT NULL,
  `emergency_contact_kebele` varchar(255) NOT NULL,
  `emergency_contact_h_no` varchar(255) NOT NULL,
  `emergency_contact_tel` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8889 DEFAULT CHARSET=latin1;

-- Dumping data for table csr.account: ~14 rows (approximately)
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`ID`, `first_name`, `middle_name`, `last_name`, `sex`, `image`, `DOB`, `place_of_birth`, `current_city_region`, `k_ketema_woreda`, `kebele`, `H_No`, `tel`, `email`, `p_o_box`, `emergency_contact_name`, `emergency_contact_city`, `emergency_contact_k_ketema_woreda`, `emergency_contact_kebele`, `emergency_contact_h_no`, `emergency_contact_tel`, `date`, `updated_date`, `password`) VALUES
	(1010, 'Yonas1010', 'Ejigu', 'Ambelu', 'Male', '', '1991', 'aa', 'saris', 'Dep005', '23', '', '0987654321', 'yoniman@yahoo.com', 456, '0912345678', 'aa', '03', '23', '567', '012345678', '2022-03-23', '2022-08-14 03:20:34', '202cb962ac59075b964b07152d234b70'),
	(1111, 'Zelalem1111', 'Temesgen', 'Fitte', 'Male', '', '1990', 'Asella', 'Addis Ababa', 'Dep001', '11', '123', '0911003946', 'ztemesgen32@gmail.com', 123, 'Temesgen', 'q', 'q', 'q', 'q', 'q', '2022-03-23', '2022-08-31 00:54:35', 'a384b6463fc216a5f8ecb6670f86456a'),
	(2020, 'Amare2020', 'Bizuneh', 'Abebe', 'Male', '', '1975', 'Fitche', 'aa', 'aa', '12', '', '0929907835', 'amarebizuneh19@gmail.com', 0, 'Tadiwos', 'aa', 'aa', 'aa', 'aa', '', '2022-03-23', '2022-08-14 03:21:18', '202cb962ac59075b964b07152d234b70'),
	(2222, 'Fraol', 'Temesgen', 'Fitte', 'Male', '', '1985', 'aa', 'aa', 'Dep001', '23', '456', '0987654321', 'FrukaT@gmail.com', 0, '', '', '', '', '', '', '2022-03-23', '2022-05-26 18:56:26', '202cb962ac59075b964b07152d234b70'),
	(3030, 'Woinshet', 'Abebe', 'Kidane', 'Female', '', '1982', 'AA', '06', 'Dep001', '12', '34', '0913649580', 'Woini23K@gmail.com', 0, '', '', '', '', '', '', '2022-04-01', '2022-05-26 18:56:29', '202cb962ac59075b964b07152d234b70'),
	(3333, 'Hirut', 'Tsige', 'Eshete', 'Female', '', '1970', 'Addis Abeba', 'Addis Abeba', 'Dep004', '28', '167', '0911454167', 'Hirutsige@gmail.com', 0, 'Zelalem', 'Addis Abeba', 'Yeka', '33', '012', '0912419386', '2022-03-23', '2022-05-26 18:56:32', '202cb962ac59075b964b07152d234b70'),
	(4444, 'Temesgen', 'Fitte', 'Chewaqa', 'Male', '', '1969', 'aa', 'aa', 'Dep004', '28', '176', '0910478707', 'temesgenfitte@gmail.com', 0, '', '', '', '', '', '', '2022-03-23', '2022-05-26 18:56:34', '202cb962ac59075b964b07152d234b70'),
	(5678, 'king', 'solomon', 'dawit', 'male', '', '12-6-1888', 'jerusalem', 'jerusalem', 'Dep005', '1', '1', '0912345678', 'king@yahoo.com', 23, '', '', '', '', '', '', '2022-03-23', '2022-05-26 18:56:39', '202cb962ac59075b964b07152d234b70'),
	(6666, 'Sisay', 'Aseffa', 'Tola', 'Male', '', '1998', 'addis ababa', 'addis ababa', 'Dep003', '23', '567', '0912345689', 'Sisko4582@gmail.com', 656, 'God', 'heaven', '', '', '', 'jesus', '2022-03-23', '2022-05-26 18:56:44', '202cb962ac59075b964b07152d234b70'),
	(6900, 'addis', 'kidan', 'worku', 'female', '', '1990', 'AA', 'AA', 'Dep004', '4', '56', '0987654321', 'addis@gmail.com', 45, '', '', '', '', '', '', '2022-04-08', '2022-05-26 18:56:47', '202cb962ac59075b964b07152d234b70'),
	(7070, 'Segni', 'Mekonnen', 'Mekonnen', 'Male', '', '1990', 'AA', 'AA', 'Bole', '11', '123', '0951107515', 'segni22@gmail.com', 0, 'Mekonnen', 'AA', 'Bole', '11', '123', '0911003946', '2022-04-11', '2022-05-26 18:56:50', '202cb962ac59075b964b07152d234b70'),
	(7777, 'Tesfalem', 'Mamo', 'Dalu', 'Male', '', '1980', 'Asella', 'AA', 'AA', '12', 'New', '0951107515', 'tesfa32@gmail.com', 123, 'Medhanit', 'AA', '11', '12', 'new', '0911454167', '1920', '2022-08-14 15:44:01', '202cb962ac59075b964b07152d234b70'),
	(8888, 'Burte', 'Abay', 'Meles', 'Female', '', '1992', 'Addis', 'hosana', 'Bula kebele gebere mahber', 'Bula kebele gebere mahber', '989', '091123344', 'burte@gmail.com', 123, 'Zola', 'Addis', 'Bole', '19', '787', '0911223322', '8/14/22', '2022-08-14 15:52:53', '202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping structure for table csr.action
CREATE TABLE IF NOT EXISTS `action` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `sender` varchar(250) NOT NULL,
  `reciver` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `action` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table csr.action: ~0 rows (approximately)
/*!40000 ALTER TABLE `action` DISABLE KEYS */;
/*!40000 ALTER TABLE `action` ENABLE KEYS */;

-- Dumping structure for table csr.assigned_requests
CREATE TABLE IF NOT EXISTS `assigned_requests` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `request_type` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `request_id` int(255) NOT NULL,
  `request_subject` varchar(255) NOT NULL,
  `request_detail` varchar(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `process_time` int(11) NOT NULL,
  `support_desk_name` varchar(255) NOT NULL,
  `executive_officer_name` varchar(255) NOT NULL,
  `first_line_officer_execution_time` int(255) NOT NULL,
  `executive_officer_process_time` int(11) NOT NULL,
  `attachement` varchar(200) DEFAULT NULL,
  `date` datetime NOT NULL,
  `denial_reason` varchar(255) NOT NULL,
  `executive_officer_status` int(11) NOT NULL,
  `process_time_left` int(11) NOT NULL,
  `overrided` varchar(255) NOT NULL,
  `ovd_mgr` varchar(255) NOT NULL,
  `request_condition` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

-- Dumping data for table csr.assigned_requests: ~44 rows (approximately)
/*!40000 ALTER TABLE `assigned_requests` DISABLE KEYS */;
INSERT INTO `assigned_requests` (`ID`, `request_type`, `department_name`, `request_id`, `request_subject`, `request_detail`, `sender_id`, `process_time`, `support_desk_name`, `executive_officer_name`, `first_line_officer_execution_time`, `executive_officer_process_time`, `attachement`, `date`, `denial_reason`, `executive_officer_status`, `process_time_left`, `overrided`, `ovd_mgr`, `request_condition`) VALUES
	(94, 'Agent Banking Request', 'E-Banking', 6441981, 'subject', 'Request Detail', 2222, 3, 'Zelalem', '', 1, 2, '', '2022-07-27 11:07:30', '', 1, 3, '', '', 'DONE'),
	(95, 'Agent Banking Request', 'E-Banking', 6441981, 'subject', 'Request Detail', 2222, 3, 'Zelalem', '', 1, 2, '', '2022-07-27 11:07:03', '', 1, 3, '', '', 'DONE'),
	(96, 'Agent Banking Request', 'E-Banking', 6441981, 'subject', 'Request Detail', 2222, 3, 'Zelalem', '', 1, 2, '', '2022-07-27 12:07:59', '', 1, 3, '', '', 'DONE'),
	(97, 'Agent Banking Request', 'E-Banking', 6441981, 'subject', 'Request Detail', 2222, 3, 'Zelalem', '', 1, 2, '', '2022-07-27 12:07:48', '', 1, 3, '', '', 'DONE'),
	(98, 'Agent Banking Request', 'E-Banking', 6441981, 'subject', 'Request Detail', 2222, 3, 'Zelalem', '', 1, 2, '', '2022-07-27 12:07:01', '', 1, 3, '', '', 'DONE'),
	(99, 'Agent Banking Request', 'E-Banking', 6441981, 'subject', 'Request Detail', 2222, 3, 'Zelalem', '', 1, 2, '', '2022-07-27 12:07:16', '', 1, 3, '', '', 'DONE'),
	(100, 'Agent Banking Request', 'E-Banking', 6441981, 'subject', 'Request Detail', 2222, 3, 'Zelalem', '', 1, 2, '', '2022-07-27 12:07:00', '', 1, 3, '', '', 'DONE'),
	(101, 'Card Request', 'E-Banking', 11407797, 'subject', 'Detail', 2222, 7, 'Zelalem', '', 1, 6, 'Research Method - Research Design Sample.docx', '2022-07-27 12:07:37', '', 1, 7, '', '', 'DONE'),
	(102, 'Mobile Banking User', 'E-Banking', 14536170, 'mab', 'MAB', 1010, 2, 'Zelalem', '', 1, 1, '', '2022-07-27 12:07:42', '', 1, 2, '', '', 'DONE'),
	(103, 'Apply for Job', 'Human Resourse', 9478636, 'ASAP', 'ASAP', 1010, 15, 'Zelalem', '', 3, 12, '', '2022-07-28 03:07:51', '', 1, 15, '', '', ''),
	(104, 'Mobile Banking User', 'E-Banking', 13315511, 'MAB ASAP', 'MAB ASAP', 2222, 2, 'Zelalem', '', 1, 1, '', '2022-07-28 03:07:56', '', 1, 2, '', '', 'DONE'),
	(105, 'Internet Banking User', 'E-Banking', 5187344, 'ASAP', 'QWERTYUI', 1010, 2, 'Zelalem', '', 1, 1, '', '2022-07-28 03:07:03', '', 1, 2, '', '', 'DONE'),
	(106, 'Card Reissue', 'E-Banking', 2724002, 'rRRRRRREEEEE', 'REISUE', 1111, 7, 'Zelalem', '', 1, 6, '', '2022-07-28 03:07:08', '', 1, 7, '', '', 'DONE'),
	(107, 'Internet Banking User', 'E-Banking', 11427142, 'IBS', 'IBSIBS', 2222, 2, 'Zelalem', '', 1, 1, '', '2022-07-28 03:07:26', '107 denied', 2, 2, '', '', ''),
	(108, 'Personal Loan', 'Branch Banking', 2583732, 'LOAN', 'LOANLOAN', 1010, 7, 'Zelalem', '', 1, 6, '', '2022-07-28 03:07:50', '', 1, 7, '', '', 'DONE'),
	(109, 'Card Reissue', 'E-Banking', 1702954, 'Reissue', 'ReissueReissue', 2222, 7, 'Zelalem', '', 1, 6, '', '2022-07-28 03:07:07', '109 denied', 2, 7, '', '', ''),
	(110, 'Card Request', 'E-Banking', 2114837, 'ATM CARD', 'NEW ATM CARD', 2222, 7, 'Zelalem', '', 1, 6, '10.pdf', '2022-07-28 03:07:14', 'ASAP not clear', 3, 7, 'ovd', 'Zelalem', ''),
	(111, 'Personal Loan', 'Branch Banking', 9202634, 'ASAP', 'PPLOAN', 1010, 7, 'Zelalem', '', 1, 6, '', '2022-07-28 03:07:38', '111 denied', 2, 7, '', '', ''),
	(112, 'Apply for Job', 'Human Resourse', 16733746, 'JOB', 'JOBJOB', 2222, 15, 'Zelalem', '', 3, 12, '', '2022-07-28 04:07:35', '112 denied', 2, 15, '', '', ''),
	(113, 'Foreign Currency Exchange', 'International Banking', 14480333, 'Dollar Exchange rate', 'Dollar ExchangeDollar Exchange', 1111, 2, 'Zelalem', '', 1, 1, '', '2022-07-28 04:07:10', '', 1, 2, '', '', 'Completed'),
	(114, 'Personal Loan', 'Branch Banking', 14879552, 'ASAP', 'Personal loanPersonal loan', 2222, 7, 'Zelalem', '', 1, 6, '', '2022-07-28 04:07:16', '', 1, 7, '', '', 'DONE'),
	(115, 'Mortgage Loan', 'Credit', 7986199, 'MORTGAGE LOAN', 'MORTGAGE LOAN', 1010, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 10:08:46', 'NO MORTGAGE LOAN AVAILABLE', 3, 7, 'ovd', 'Zelalem', ''),
	(116, 'Card Reissue', 'E-Banking', 17340955, 'REISSUE MY CARD', 'REISSUE MY CARD', 2222, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 11:08:59', '', 1, 7, '', '', 'DONE'),
	(117, 'Card Request', 'E-Banking', 16990230, 'WHERE IS MY CARD', 'WHERE IS MY CARD', 1111, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 11:08:12', '', 1, 7, '', '', 'DONE'),
	(118, 'Checkbook Request', 'Branch Banking', 11830806, 'CHECK BOOK PLEASE', 'CHECK BOOK PLEASE', 3333, 4, 'Zelalem', '', 1, 3, '', '2022-08-12 11:08:35', '', 1, 4, '', '', 'DONE'),
	(119, 'Personal Loan', 'Branch Banking', 16548530, 'PP LOAN FOR ME', 'PP LOAN FOR ME', 1010, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 11:08:52', '', 1, 7, '', '', 'DONE'),
	(120, 'Card Request', 'E-Banking', 13566835, 'ATM CARD REQUEST', 'ATM CARD REQUEST', 2222, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 11:08:10', '', 1, 7, '', '', 'DONE'),
	(121, 'Foreign Currency Request Queue', 'International Banking', 5022454, 'QUEUE QUEUE QUEUE', 'QUEUE QUEUE QUEUE', 3333, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 11:08:49', '', 1, 7, '', '', 'DONE'),
	(122, 'Foreign Currency Request Queue', 'International Banking', 5022454, 'QUEUE QUEUE QUEUE', 'QUEUE QUEUE QUEUE', 3333, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 11:08:50', '122 denied', 2, 7, '', '', 'DONE'),
	(123, 'Personal Loan', 'Branch Banking', 8792104, 'MY PERSONAL LOAN', 'MY PERSONAL LOAN', 3333, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 11:08:02', '', 1, 7, '', '', 'DONE'),
	(124, 'Card Request', 'E-Banking', 1717174, 'MY INSTANT CARD', 'MY INSTANT CARD', 3333, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 11:08:11', '', 1, 7, '', '', 'DONE'),
	(125, 'Card Request', 'E-Banking', 16651629, 'CARD', 'CARD', 2222, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 01:08:42', 'NO CARD', 3, 7, 'ovd', 'Zelalem', ''),
	(126, 'Foreign Currency Exchange', 'International Banking', 2883579, 'ddddddddddD', 'ddddddddddD', 3333, 2, 'Zelalem', '', 1, 1, '', '2022-08-12 01:08:52', '', 1, 2, '', '', 'DONE'),
	(127, 'Card Request', 'E-Banking', 10479597, 'card req', 'card req', 1111, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 01:08:56', 'Nooooooooooooooooooooooo', 2, 7, '', '', ''),
	(128, 'Mobile Banking User', 'E-Banking', 16520273, 'mobile banking', 'MAB', 3333, 2, 'Zelalem', '', 1, 1, '', '2022-08-12 05:08:46', '', 1, 2, '', '', 'DONE'),
	(129, 'Personal Loan', 'Branch Banking', 13671341, 'ASAP', 'loan', 2222, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 06:08:24', '105 reason ', 2, 7, '', '', ''),
	(130, 'Personal Loan', 'Branch Banking', 13671341, 'ASAP', 'loan', 2222, 7, 'Zelalem', '', 1, 6, '', '2022-08-12 06:08:37', 'bla', 2, 7, '', '', ''),
	(131, 'Mobile Banking User', 'E-Banking', 12756436, 'MOBILE BANKING USER', 'MOBILE BANKING USER', 1111, 2, 'Zelalem', '', 1, 1, '', '2022-08-12 06:08:41', '105', 2, 2, '', '', 'DONE'),
	(132, 'Mobile Banking User', 'E-Banking', 12756436, 'MOBILE BANKING USER', 'MOBILE BANKING USER', 1111, 2, 'Zelalem', '', 1, 1, '', '2022-08-12 07:08:17', '105 QWERTYUI', 2, 2, '', '', 'DONE'),
	(133, 'Internet Banking User', 'E-Banking', 8873211, 'New Checkbook', 'Request Detail', 1010, 2, 'Zelalem', '', 1, 1, '', '2022-08-12 07:08:36', '106 denied', 2, 2, '', '', 'Completed'),
	(134, 'Mobile Banking User', 'E-Banking', 12756436, 'MOBILE BANKING USER', 'MOBILE BANKING USER', 1111, 2, 'Zelalem', '', 1, 1, '', '2022-08-12 07:08:40', '', 1, 2, '', '', 'DONE'),
	(135, 'Internet Banking User', 'E-Banking', 4776467, 'subject', 'Request Detail', 6900, 2, 'Zelalem', '', 1, 1, 'Application Letter - Copy.docx', '2022-08-12 07:08:21', 'Enter a Reason Enter a Reason Enter a Reason', 2, 2, '', '', ''),
	(136, 'Checkbook Request', 'Branch Banking', 15451737, 'Check 100 Page', 'Check 100 Page', 1111, 4, 'Meron', 'Kisi', 1, 3, '', '2022-08-14 02:08:03', '', 1, 4, '', '', 'DONE'),
	(137, 'Card Reissue', 'E-Banking', 20505544, 'Please renew my Card', 'Please renew my Card', 2222, 7, 'Meron', '', 1, 6, '', '2022-08-14 02:08:08', 'You dont have any account', 2, 7, '', '', ''),
	(138, 'Card Request', 'E-Banking', 10434425, 'subject', 'Request Detail', 1111, 7, 'zelalem', '', 1, 6, '', '2022-08-30 09:08:35', 'for  2nd line officer check', 2, 7, '', '', ''),
	(139, 'Card Request', 'E-Banking', 16539290, 'hjm', 'fjmkfgjm', 2222, 7, 'zelalem', '', 1, 6, '', '2022-08-31 11:08:40', '', 1, 7, '', '', ''),
	(140, 'Foreign Currency Request Queue', 'International Banking', 11408204, 'IBS', 'asdfghjk', 2222, 7, 'zelalem', '', 1, 6, '', '2022-08-31 11:08:59', '', 1, 7, '', '', ''),
	(141, 'Card Reissue', 'E-Banking', 6105955, 'subject', 'Request Detail', 2222, 7, 'zelalem', '', 1, 6, '', '2022-08-31 11:08:15', '', 1, 7, '', '', ''),
	(142, 'Card Request', 'E-Banking', 9220074, 'ASAP', 'ASAPASAP', 2222, 7, 'zelalem', '', 1, 6, 'OBI_POS_PUR.docx', '2022-08-31 11:08:25', '', 1, 7, '', '', ''),
	(143, 'Internet Banking User', 'E-Banking', 8873211, 'New Checkbook', 'Request Detail', 1010, 2, 'zelalem', '', 1, 1, '', '2022-08-31 11:08:39', '', 1, 2, '', '', 'Completed');
/*!40000 ALTER TABLE `assigned_requests` ENABLE KEYS */;

-- Dumping structure for table csr.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `ID` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `current_city_region` varchar(255) NOT NULL,
  `k_ketema_woreda` varchar(255) NOT NULL,
  `kebele` varchar(255) NOT NULL,
  `H_No` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `p_o_box` int(255) NOT NULL,
  `emergency_contact_name` varchar(255) NOT NULL,
  `emergency_contact_city` varchar(255) NOT NULL,
  `emergency_contact_k_ketema_woreda` varchar(255) NOT NULL,
  `emergency_contact_kebele` varchar(255) NOT NULL,
  `emergency_contact_h_no` varchar(255) NOT NULL,
  `emergency_contact_tel` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table csr.clients: ~14 rows (approximately)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`ID`, `first_name`, `middle_name`, `last_name`, `sex`, `image`, `DOB`, `place_of_birth`, `current_city_region`, `k_ketema_woreda`, `kebele`, `H_No`, `tel`, `email`, `p_o_box`, `emergency_contact_name`, `emergency_contact_city`, `emergency_contact_k_ketema_woreda`, `emergency_contact_kebele`, `emergency_contact_h_no`, `emergency_contact_tel`, `date`) VALUES
	(0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
	(1010, 'Yonas', 'Ejigu', 'Ambelu', 'Male', '', '1991', 'aa', 'saris', 'Dep005', '23', '345', '0987654321', 'yoniman@yahoo.com', 456, '0912345678', 'aa', '03', '23', '567', '012345678', ''),
	(1111, 'Zelalem', 'Temesgen', 'Fitte', 'Male', '', '1990', 'Asella', 'Addis Ababa', 'Dep001', '11', '123', '0911003946', 'ztemesgen32@gmail.com', 123, 'Temesgen', 'q', 'q', 'q', 'q', 'q', 'q'),
	(2020, 'Amare ', 'Bizuneh', 'Abebe', 'Male', '', '1975', 'Fitche', 'aa', 'aa', '12', '778', '0929907835', 'amarebizuneh19@gmail.com ', 0, 'Tadiwos', 'aa', 'aa', 'aa', 'aa', 'aa', ''),
	(2222, 'Fraol', 'Temesgen', 'Fitte', 'Male', '', '1985', 'aa', 'aa', 'Dep001', '23', '456', '0911749717', 'FrukaT@gmail.com', 0, '', '', '', '', '', '', ''),
	(3030, 'Woinshet', 'Abebe', 'Kidane', 'Female', '', '1982', 'AA', '06', 'Dep001', '12', '34', '0913649580', 'Woini23K@gmail.com', 0, '', '', '', '', '', '', ''),
	(3333, 'Hirut', 'Tsige', 'Eshete', 'Female', '', '1970', 'Addis Abeba', 'Addis Abeba', 'Dep004', '28', '167', '0911454167', 'Hirutsige@gmail.com', 0, 'Zelalem', 'Addis Abeba', 'Yeka', '33', '012', '0912419386', ''),
	(4444, 'Temesgen', 'Fitte', 'Chewaqa', 'Male', '', '1969', 'aa', 'aa', 'Dep004', '28', '176', '0910478707', 'temesgenfitte@gmail.com', 0, '', '', '', '', '', '', ''),
	(5555, 'Fraol', 'Kumera', 'Tucho', 'MALE', '', '1993', 'Addis Ababa', 'A.A', 'Dep002', '15', '819', '0910990147', 'fraolkumera@gmail.com', 66819, 'Kumera', 'A.A', 'Arada', '15', '819', '0911254020', '6-29-2018'),
	(5678, 'king', 'solomon', 'dawit', 'male', '', '12-6-1888', 'jerusalem', 'jerusalem', 'Dep005', '1', '1', '0912345678', 'king@yahoo.com', 23, '', '', '', '', '', '', ''),
	(6060, 'Eden ', 'Bedagne', 'Beyene', 'Female', '', '1979', 'Addis Ababa', 'AA', 'Bole', '11', 'New', '0911202123', 'edenbedane@gmail.com', 0, 'Fraol', 'AA', 'Bole', '11', 'New', '0911003946', '04112022'),
	(6666, 'Sisay', 'Aseffa', 'Tola', 'Male', '', '1998', 'addis ababa', 'addis ababa', 'Dep003', '23', '567', '0912345689', 'Sisko4582@gmail.com', 656, 'God', 'heaven', '', '', '', 'jesus', ''),
	(6900, 'addis', 'kidan', 'worku', 'female', '', '1990', 'AA', 'AA', 'Dep004', '4', '56', '0987654321', 'addis@gmail.com', 45, '', '', '', '', '', '', ''),
	(7070, 'Segni', 'Mekonnen', 'Mekonnen', 'Male', '', '1990', 'AA', 'AA', 'Bole', '11', '123', '0951107515', 'segni22@gmail.com', 0, 'Mekonnen', 'AA', 'Bole', '11', '123', '0911003946', '11042022');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table csr.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `d_id` varchar(50) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `d_id` (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table csr.departments: ~8 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `d_id`, `d_name`) VALUES
	(15, 'Dep001', 'IT'),
	(17, 'Dep002', 'E-Banking'),
	(19, 'Dep003', 'Branch Banking'),
	(21, 'Dep004', 'International Banking'),
	(23, 'Dep005', 'Credit'),
	(25, 'Dep006', 'Human Resourse'),
	(26, 'Dep007', 'Help Desk'),
	(27, 'Dep008', 'Admin');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table csr.message
CREATE TABLE IF NOT EXISTS `message` (
  `ID` int(100) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `text_msg` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table csr.message: ~0 rows (approximately)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Dumping structure for table csr.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` varchar(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `request_detail` varchar(255) NOT NULL,
  `support_desk_status` int(255) NOT NULL,
  `process_time` int(11) NOT NULL,
  `aattachement` blob,
  `denial_reason` varchar(255) NOT NULL,
  `executive_officer` varchar(255) NOT NULL,
  `first_line_officer_execution_time` int(255) NOT NULL,
  `executive_officer_process_time` int(11) NOT NULL,
  `executive_officer_status` int(255) NOT NULL,
  `overrided` varchar(255) NOT NULL,
  `ovd_manager` varchar(255) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

-- Dumping data for table csr.requests: ~53 rows (approximately)
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`ID`, `request_id`, `sender_id`, `request_type`, `subject`, `request_detail`, `support_desk_status`, `process_time`, `aattachement`, `denial_reason`, `executive_officer`, `first_line_officer_execution_time`, `executive_officer_process_time`, `executive_officer_status`, `overrided`, `ovd_manager`, `request_date`) VALUES
	(71, '2114837', 2222, 'Card Request', 'ATM CARD', 'NEW ATM CARD', 1, 7, _binary 0x31302E706466, '0', '0', 1, 6, 0, '0', '0', '2022-07-27 11:07:33'),
	(72, '11407797', 2222, 'Card Request', 'subject', 'Detail', 1, 7, _binary 0x5265736561726368204D6574686F64202D2052657365617263682044657369676E2053616D706C652E646F6378, '0', '0', 1, 6, 0, '0', '0', '2022-07-27 11:07:04'),
	(73, '6441981', 2222, 'Agent Banking Request', 'subject', 'Request Detail', 1, 3, _binary '', '0', '0', 1, 2, 0, '0', '0', '2022-07-27 11:07:31'),
	(74, '2724002', 1111, 'Card Reissue', 'rRRRRRREEEEE', 'REISUE', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-07-27 12:07:22'),
	(75, '14536170', 1010, 'Mobile Banking User', 'mab', 'MAB', 1, 2, _binary '', '0', '0', 1, 1, 0, '0', '0', '2022-07-27 12:07:56'),
	(76, '5187344', 1010, 'Internet Banking User', 'ASAP', 'QWERTYUI', 1, 2, _binary '', '0', '0', 1, 1, 0, '0', '0', '2022-07-27 12:07:01'),
	(77, '13315511', 2222, 'Mobile Banking User', 'MAB ASAP', 'MAB ASAP', 1, 2, _binary '', '0', '0', 1, 1, 0, '0', '0', '2022-07-28 02:07:01'),
	(78, '9478636', 1010, 'Apply for Job', 'ASAP', 'ASAP', 1, 15, _binary '', '0', '0', 3, 12, 0, '0', '0', '2022-07-28 03:07:39'),
	(79, '1702954', 2222, 'Card Reissue', 'Reissue', 'ReissueReissue', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-07-28 03:07:34'),
	(80, '2583732', 1010, 'Personal Loan', 'LOAN', 'LOANLOAN', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-07-28 03:07:56'),
	(81, '11427142', 2222, 'Internet Banking User', 'IBS', 'IBSIBS', 1, 2, _binary '', '0', '0', 1, 1, 0, '0', '0', '2022-07-28 03:07:19'),
	(82, '480681', 2222, 'Mortgage Loan', 'MGLOAN', 'MGLOAN', 0, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-07-28 03:07:46'),
	(83, '9202634', 1010, 'Personal Loan', 'ASAP', 'PPLOAN', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-07-28 03:07:04'),
	(84, '16733746', 2222, 'Apply for Job', 'JOB', 'JOBJOB', 1, 15, _binary '', '0', '0', 3, 12, 0, '0', '0', '2022-07-28 03:07:49'),
	(85, '14480333', 1111, 'Foreign Currency Exchange', 'Dollar Exchange rate', 'Dollar ExchangeDollar Exchange', 1, 2, _binary '', '0', '0', 1, 1, 0, '0', '0', '2022-07-28 04:07:56'),
	(86, '14879552', 2222, 'Personal Loan', 'ASAP', 'Personal loanPersonal loan', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-07-28 04:07:59'),
	(87, '9220074', 2222, 'Card Request', 'ASAP', 'ASAPASAP', 1, 7, _binary 0x4F42495F504F535F5055522E646F6378, '0', '0', 1, 6, 0, '0', '0', '2022-08-31 14:14:25'),
	(88, '4283299', 1010, 'Card Reissue', 'New Checkbook', 'ASAPASAPASAP', 0, 7, _binary 0x46524F4E5420454E44205452414E53414354494F4E20545950452E646F6378, '0', '0', 1, 6, 0, '0', '0', '2022-07-28 04:07:39'),
	(89, '16454945', 2222, 'Internet Banking User', 'IBS', 'IBS REQUEST', 2, 2, _binary '', 'Customer does not have account', '0', 1, 1, 0, '0', '0', '2022-08-05 08:08:13'),
	(90, '16539290', 2222, 'Card Request', 'hjm', 'fjmkfgjm', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-31 14:13:40'),
	(91, '3386167', 1010, 'Card Reissue', 'sfgns', 'sfndyn', 0, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-05 10:08:15'),
	(92, '12756436', 1111, 'Mobile Banking User', 'MOBILE BANKING USER', 'MOBILE BANKING USER', 1, 2, _binary '', '0', '0', 1, 1, 0, '0', '0', '2022-08-12 20:04:40'),
	(93, '13566835', 2222, 'Card Request', 'ATM CARD REQUEST', 'ATM CARD REQUEST', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-12 10:08:03'),
	(94, '18096748', 1010, 'Internet Banking User', 'IBS USER PLEASE', 'IBS USER PLEASE', 2, 2, _binary '', 'No Internet Service at your Area', '0', 1, 1, 0, '0', '0', '2022-08-12 10:08:22'),
	(95, '9621955', 3333, 'Agent Banking Request', 'AGENT BANKING USER', 'AGENT BANKING USER', 2, 3, _binary '', 'You can not be an agent', '0', 1, 2, 0, '0', '0', '2022-08-12 10:08:00'),
	(96, '8622483', 3333, 'Foreign Currency Exchange', 'REQUEST FOR DOLLAR', 'REQUEST FOR DOLLAR', 2, 2, _binary 0x4170706C69636174696F6E204C6574746572202D20436F70792E646F6378, 'No Card Available for now', '0', 1, 1, 0, '0', '0', '2022-08-12 10:08:15'),
	(97, '7986199', 1010, 'Mortgage Loan', 'MORTGAGE LOAN', 'MORTGAGE LOAN', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-12 10:08:53'),
	(98, '16548530', 1010, 'Personal Loan', 'PP LOAN FOR ME', 'PP LOAN FOR ME', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-12 11:08:08'),
	(99, '11830806', 3333, 'Checkbook Request', 'CHECK BOOK PLEASE', 'CHECK BOOK PLEASE', 1, 4, _binary '', '0', '0', 1, 3, 0, '0', '0', '2022-08-12 11:08:33'),
	(100, '16990230', 1111, 'Card Request', 'WHERE IS MY CARD', 'WHERE IS MY CARD', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-12 11:08:08'),
	(101, '17340955', 2222, 'Card Reissue', 'REISSUE MY CARD', 'REISSUE MY CARD', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-12 11:08:32'),
	(102, '5022454', 3333, 'Foreign Currency Request Queue', 'QUEUE QUEUE QUEUE', 'QUEUE QUEUE QUEUE', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-12 11:08:36'),
	(103, '1717174', 3333, 'Card Request', 'MY INSTANT CARD', 'MY INSTANT CARD', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-12 11:08:14'),
	(104, '8792104', 3333, 'Personal Loan', 'MY PERSONAL LOAN', 'MY PERSONAL LOAN', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-12 11:08:47'),
	(105, '16651629', 2222, 'Card Request', 'CARD', 'CARD', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-12 01:08:12'),
	(106, '2883579', 3333, 'Foreign Currency Exchange', 'ddddddddddD', 'ddddddddddD', 1, 2, _binary '', '0', '0', 1, 1, 0, '0', '0', '2022-08-12 01:08:34'),
	(107, '10479597', 1111, 'Card Request', 'card req', 'card req', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-12 01:08:44'),
	(108, '6105955', 2222, 'Card Reissue', 'subject', 'Request Detail', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-31 14:14:15'),
	(109, '2736937', 6900, 'Internet Banking User', 'subject', 'Request Detail', 0, 2, _binary 0x4461696C7920576F726B2E786C7378, '0', '0', 1, 1, 0, '0', '0', '2022-08-12 01:08:42'),
	(110, '4776467', 6900, 'Internet Banking User', 'subject', 'Request Detail', 1, 2, _binary 0x4170706C69636174696F6E204C6574746572202D20436F70792E646F6378, '0', '0', 1, 1, 0, '0', '0', '2022-08-12 20:06:21'),
	(111, '11408204', 2222, 'Foreign Currency Request Queue', 'IBS', 'asdfghjk', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-31 14:13:59'),
	(112, '20979194', 2222, 'Checkbook Request', 'subject', 'Request Detail', 0, 4, _binary 0x4170706C69636174696F6E204C6574746572202D20436F70792E646F6378, '0', '0', 1, 3, 0, '0', '0', '2022-08-12 02:08:42'),
	(113, '10412524', 3333, 'Foreign Currency Request Queue', 'subject', 'Request Detail', 2, 7, _binary '', '113 foreign . . . ', '0', 1, 6, 0, '0', '0', '2022-08-12 19:09:38'),
	(114, '20888849', 2222, 'Internet Banking User', 'ASAP', 'Request Detail', 0, 2, _binary 0x4170706C69636174696F6E204C6574746572202D20436F70792E646F6378, '0', '0', 1, 1, 0, '0', '0', '2022-08-12 02:08:43'),
	(115, '8873211', 1010, 'Internet Banking User', 'New Checkbook', 'Request Detail', 1, 2, _binary '', '0', '0', 1, 1, 0, '0', '0', '2022-08-31 14:14:39'),
	(116, '19772139', 2222, 'Card Reissue', 'ASAP', 'Request Detail', 2, 7, _binary '', '116 denie ', '0', 1, 6, 0, '0', '0', '2022-08-12 20:15:43'),
	(117, '13671341', 2222, 'Personal Loan', 'ASAP', 'loan', 1, 7, _binary '', '113 foreign currency denied', '0', 1, 6, 0, '0', '0', '2022-08-12 19:10:24'),
	(118, '16520273', 3333, 'Mobile Banking User', 'mobile banking', 'MAB', 1, 2, _binary '', '0', '0', 1, 1, 0, '0', '0', '2022-08-12 18:51:46'),
	(119, '12443588', 5678, 'Card Reissue', 'uigug', ',kbjkgjkbjk', 0, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-13 09:08:59'),
	(120, '2836199', 2222, 'Mobile Banking User', 'ASAP', 'MOOOBBBBIIIILLLEEEE', 0, 2, _binary '', '0', '0', 1, 1, 0, '0', '0', '2022-08-14 02:08:44'),
	(121, '15451737', 1111, 'Checkbook Request', 'Check 100 Page', 'Check 100 Page', 1, 4, _binary '', '0', '0', 1, 3, 0, '0', '0', '2022-08-14 15:28:03'),
	(122, '4316051', 1111, 'Checkbook Request', 'Check 100 Page', 'Check 100 Page', 2, 4, _binary '', 'Please Attach A File', '0', 1, 3, 0, '0', '0', '2022-08-14 15:33:06'),
	(123, '20505544', 2222, 'Card Reissue', 'Please renew my Card', 'Please renew my Card', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-14 15:37:09'),
	(124, '10434425', 1111, 'Card Request', 'subject', 'Request Detail', 1, 7, _binary '', '0', '0', 1, 6, 0, '0', '0', '2022-08-31 00:57:35');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Dumping structure for table csr.service
CREATE TABLE IF NOT EXISTS `service` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Service_id` varchar(11) NOT NULL,
  `Service_name` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `process_time` int(11) NOT NULL,
  `first_line_officer_execution_time` varchar(255) NOT NULL,
  `executive_officer_process_time` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table csr.service: ~10 rows (approximately)
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` (`ID`, `Service_id`, `Service_name`, `department_name`, `process_time`, `first_line_officer_execution_time`, `executive_officer_process_time`) VALUES
	(4, 'Ser001', 'Card Request', 'E-Banking', 7, '1', '6'),
	(10, 'Ser002', 'Card Reissue', 'E-Banking', 7, '1', '6'),
	(11, 'Ser003', 'Mobile Banking User', 'E-Banking', 2, '1', '1'),
	(12, 'Ser004', 'Internet Banking User', 'E-Banking', 2, '1', '1'),
	(15, 'Ser005', 'Agent Banking Request', 'E-Banking', 3, '1', '2'),
	(16, 'Ser006', 'Checkbook Request', 'Branch Banking', 4, '1', '3'),
	(17, 'Ser007', 'Foreign Currency Exchange', 'International Banking', 2, '1', '1'),
	(18, 'Ser008', 'Foreign Currency Request Queue', 'International Banking', 7, '1', '6'),
	(19, 'Ser009', 'Personal Loan', 'Branch Banking', 7, '1', '6'),
	(21, 'Ser0010', 'Mortgage Loan ', 'Credit', 7, '1', '6');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;

-- Dumping structure for table csr.user
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `user_level` tinyint(1) NOT NULL,
  `Active` char(32) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_type` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12373 DEFAULT CHARSET=latin1;

-- Dumping data for table csr.user: ~18 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`ID`, `first_name`, `last_name`, `email`, `password`, `photo`, `user_level`, `Active`, `registration_date`, `account_type`, `department`) VALUES
	(6060, 'Eden ', 'Beyene', 'edenbedane@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, '', '2022-04-11 00:00:00', 'customer', ''),
	(6900, 'addis', 'worku', 'addis@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, '', '2022-04-08 00:00:00', 'customer', ''),
	(7070, 'Segni', 'Mekonnen', 'segni22@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, '', '2022-04-11 00:00:00', 'customer', ''),
	(12353, 'Gemechis', 'Eshetu', 'alazar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'avatar2.png', 0, 'Active', '2022-04-02 18:22:19', 'second_line_officer', 'Credit'),
	(12357, 'Tadios', 'Zewdu', 'Tadizewdu@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 15:05:09', 'executive_officer', 'E-Banking'),
	(12359, 'Zelalem', 'Temesgen', 'ztemesgen32@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'avatar2.png', 0, 'Active', '2022-07-13 01:28:38', 'admin', 'Admin'),
	(12360, 'Mikiyas', 'Teferi', 'mikiyast@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 15:04:26', 'second_line_officer', 'Credit'),
	(12362, 'Meron', 'Tullu', 'meront23@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 15:15:51', 'support_desk', 'Help Desk'),
	(12363, 'Taye', 'Abera', 'tayeabera11@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 18:00:09', 'second_line_officer', 'E-Banking'),
	(12364, 'Milki', 'Ambellu', 'milkia45@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 18:01:47', 'executive_officer', 'Credit'),
	(12365, 'Selamawit', 'Kelbessa', 'selamselam@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 18:02:56', 'second_line_officer', 'International Banking'),
	(12366, 'Edile', 'Yohanis', 'edyohanis45@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 18:03:42', 'executive_officer', 'International Banking'),
	(12367, 'Almaz', 'Edosa', 'almiedo@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 18:04:38', 'executive_officer', 'Branch Banking'),
	(12368, 'Kisi', 'Aseffa', 'kissiaseffa@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 18:05:10', 'second_line_officer', 'Branch Banking'),
	(12369, 'Gelana', 'Tolla', 'gelanatolla23@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 18:06:26', 'executive_officer', 'Human Resourse'),
	(12370, 'Alazar', 'Kassahun', 'alazark123@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 18:07:19', 'second_line_officer', 'Human Resourse'),
	(12371, 'Betelhem', 'Tsegaye', 'bettyT32@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-04-02 18:16:38', 'support_desk', 'Help Desk'),
	(12372, 'Abebe', 'Tola', 'Abe@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar2.png', 0, 'Active', '2022-08-14 15:19:47', 'second_line_officer', 'Credit');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
