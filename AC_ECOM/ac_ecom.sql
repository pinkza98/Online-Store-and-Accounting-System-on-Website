-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 02:58 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ac_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_simple_user`
--

CREATE TABLE `tbl_simple_user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_fb_connect` int(1) NOT NULL,
  `user_fb_authorized` varchar(50) NOT NULL,
  `user_gg_connect` int(1) NOT NULL,
  `user_gg_authorized` varchar(50) NOT NULL,
  `user_last_login` datetime NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_number` varchar(20) NOT NULL,
  `user_credit` decimal(10,2) NOT NULL,
  `user_card` varchar(50) NOT NULL,
  `user_date` date NOT NULL,
  `user_cart_num` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_simple_user`
--

INSERT INTO `tbl_simple_user` (`user_id`, `user_email`, `user_fullname`, `user_name`, `user_pass`, `user_fb_connect`, `user_fb_authorized`, `user_gg_connect`, `user_gg_authorized`, `user_last_login`, `user_type`, `user_address`, `user_number`, `user_credit`, `user_card`, `user_date`, `user_cart_num`) VALUES
(6, 'pinkza88@gmail.com', 'อรรถพล สีชา', 'gg_116497501610897470572', '10370739', 0, '', 1, '044dd31ea75558dd089188a54d35685b', '2019-07-22 17:42:24', 'administrator', 'สารคาม กันทรวิชัย ท่าขอนยาง 12 3 47110', '0878628323', '7490.00', 'card5.jpg', '2019-07-11', '1471200297606'),
(7, 'atthapol.see@msu.ac.th', 'อรรถพล สีชา', 'gg_108761584253317600084', '10630366', 0, '', 1, 'c3ed2b489324bfbede8f68b43b1f6103', '2019-07-22 17:20:31', '', '', '', '0.00', '', '0000-00-00', ''),
(8, 'pinkza98@gmail.com', 'kacys love', 'gg_117874895173436826950', '10683868', 0, '', 1, '91d5dc1e90d28c46a061802a22567a3e', '2019-07-15 19:16:07', '', '', '', '0.00', '', '0000-00-00', ''),
(9, 'poniaza104@gmail.com', 'atthapol seesha', 'gg_108225411764573314622', '10152905', 0, '', 1, '6aef17cabfa39850d9e176db0daa13a4', '2019-07-15 10:15:01', '', '', '', '1000.00', '', '0000-00-00', ''),
(10, 'poniaza102@gmail.com', 'atthapol seesha', 'gg_100449838787372372735', '10483223', 0, '', 1, '2bce4be87bed2ad507e322f0304f4a4e', '2019-07-21 17:28:42', 'user', 'สารคาม กันทรวิชัย ท่าขอนยาง 12 3 47110', '0878628323', '0.00', 'line-translator-accounts-2.jpg', '2019-07-18', '4112191981'),
(11, 'poniaza1@gmail.com', 'atthapol seesaa', 'gg_118143480142689722863', '10277664', 0, '', 1, '27d4a7607737866ce8ca69f8c292c874', '2019-07-15 10:14:31', '', '', '', '0.00', '', '0000-00-00', ''),
(12, 'maizaa00001@gmail.com', 'Krisada Seheng', 'gg_112048369077812286239', '11001600', 0, '', 1, 'fa2622477260699867656e4615470b77', '2019-07-22 17:40:29', '', '', '', '0.00', '', '0000-00-00', ''),
(13, 'poniaza103@gmail.com', 'atthapol seesha', 'gg_105926973519722825242', '10700715', 0, '', 1, 'b201d43acc9cf1967310b471425f398b', '2019-07-18 17:37:30', 'user', 'สารคาม กันทรวิชัย ท่าขอนยาง 12 3 47110', '0878628323', '0.00', '', '2006-03-10', '1471200297606');

-- --------------------------------------------------------

--
-- Table structure for table `tb_acc`
--

CREATE TABLE `tb_acc` (
  `acc_id` varchar(20) NOT NULL,
  `acc_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_acc`
--

INSERT INTO `tb_acc` (`acc_id`, `acc_name`) VALUES
('101', 'เงินสด'),
('102', 'เงินฝากธนาคาร'),
('103', 'ลูกหนี้การค้า'),
('104', 'ภาษีซื้อ'),
('105', 'สินค้าคงเหลือ'),
('106', 'ค่าเผื่อหนี้สงสัยจะสูญ'),
('107', 'ภาษีมูลค่าเพิ่ม-ลูกหนี้กรมสรรกร'),
('108', 'เครื่องใช้สำนักงาน'),
('201', 'เจ้าหนี้การค้า'),
('202', 'ภาษีขาย'),
('203', 'ภาษีมูลค่าเพิ่ม-เจ้าหนี้กรมสรรกร'),
('204', 'เงินกู้'),
('301', 'ทุนเจ้าของ'),
('302', 'ถอนใช้ส่วนตัว'),
('401', 'รายได้ขายสินค้า'),
('402', 'รายได้อื่นๆ'),
('501', 'ค่าสินค้าซื้อ'),
('502', 'ค่าใช้จ่ายยานพานะ'),
('503', 'ค่าน้ำ ค่าไฟ ค่าโทรศัพท์'),
('504', 'เงินเดือนพนักงาน'),
('505', 'ค่าเช่าระบบเครือข่าย');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_phone` varchar(30) NOT NULL,
  `admin_trademark` varchar(200) NOT NULL,
  `admin_sign` varchar(200) NOT NULL,
  `admin_Bank` varchar(30) NOT NULL,
  `admin_accountdetails` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `admin_address`, `admin_phone`, `admin_trademark`, `admin_sign`, `admin_Bank`, `admin_accountdetails`, `user_id`) VALUES
(28, 'นาย อรรถพล สีชา', 'สักที', '0828602362', 'Logo.jpg', 'ดาวน์โหลด.png', '141-123154-41', 'ธนาคารกรุงเทพ-768x402.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_album`
--

CREATE TABLE `tb_album` (
  `PP_ID` int(11) NOT NULL,
  `PP_ Album` varchar(20) NOT NULL,
  `PP_Namephoto` varchar(20) NOT NULL,
  `PP_Name` text NOT NULL,
  `PP_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_alert`
--

CREATE TABLE `tb_alert` (
  `AL_ID` int(11) NOT NULL,
  `AL_Name` varchar(20) NOT NULL,
  `AL_Paper` text NOT NULL,
  `AL_Date` date NOT NULL,
  `DB_ID` int(11) NOT NULL,
  `LS_ID` int(11) NOT NULL,
  `CR_ID` int(11) NOT NULL,
  `PR_ID` int(11) NOT NULL,
  `NB_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_basket`
--

CREATE TABLE `tb_basket` (
  `TK_ID` int(11) NOT NULL,
  `TK_ Quantity` int(11) NOT NULL,
  `P_Sell` int(11) NOT NULL,
  `TK_Sum` int(11) NOT NULL,
  `PR_ID` int(11) NOT NULL,
  `NB_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `P_Sell_ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_commerce`
--

CREATE TABLE `tb_commerce` (
  `CR_ID` varchar(20) NOT NULL,
  `CR_Name` varchar(50) NOT NULL,
  `CR_Model` varchar(20) NOT NULL,
  `CRD_Name` varchar(50) NOT NULL,
  `CR_Type` varchar(50) NOT NULL,
  `CR_Address` text NOT NULL,
  `CR_Namemr` varchar(50) NOT NULL,
  `CR_Image` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_commerce`
--

INSERT INTO `tb_commerce` (`CR_ID`, `CR_Name`, `CR_Model`, `CRD_Name`, `CR_Type`, `CR_Address`, `CR_Namemr`, `CR_Image`, `user_id`) VALUES
('14200132160', 'นายอรรถพล สีชา', 'นิติบุคคล', 'รุ่งเรืองกิจพาณิชย์', 'เครื่องใช้ไฟฟ้าในครัวเรือน', 'จังหวัดสกลนคร อำเภอสว่างแดน ตำบลหนองหลวง บ้านเลขที่ 12 หมู่3', 'นาย วงวาล สายกัน', 'ใบรับรองทะเบียนพานิชย์.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_credit`
--

CREATE TABLE `tb_credit` (
  `credit_id` int(11) NOT NULL,
  `credit_all` decimal(10,2) NOT NULL,
  `credit_date` date NOT NULL,
  `credit_date_end` date NOT NULL,
  `paid_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_credit`
--

INSERT INTO `tb_credit` (`credit_id`, `credit_all`, `credit_date`, `credit_date_end`, `paid_id`, `user_id`) VALUES
(10, '3348.00', '2019-07-17', '2019-08-15', 'AC4236064', 6),
(12, '900.00', '2019-07-17', '2019-08-15', 'AC2340028', 6),
(13, '580.00', '2019-07-22', '2019-08-21', 'AC1228601', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_credit_log`
--

CREATE TABLE `tb_credit_log` (
  `clog_id` int(11) NOT NULL,
  `clog_img` varchar(255) NOT NULL,
  `clog_price` decimal(10,2) NOT NULL,
  `clog_status` int(11) NOT NULL,
  `paid_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_credit_log`
--

INSERT INTO `tb_credit_log` (`clog_id`, `clog_img`, `clog_price`, `clog_status`, `paid_id`, `user_id`) VALUES
(1, '1.jpg', '200.00', 2, 'AC8168804', 6),
(2, '2.jpg', '150.00', 2, 'AC8168804', 6),
(3, '3.jpg', '899.00', 2, 'AC249975', 6),
(4, '4.jpg', '1.00', 2, 'AC249975', 6),
(5, '5.jpg', '900.00', 2, 'AC8466862', 6),
(6, '6.jpg', '350.00', 2, 'AC8168804', 6),
(7, '7.jpg', '200.00', 2, 'AC8168804', 6),
(8, '8.jpg', '900.00', 2, 'AC6077684', 6),
(9, '9.jpg', '900.00', 2, 'AC3078289', 6),
(10, '10.jpg', '200.00', 2, 'AC4236064', 6),
(11, '11.jpg', '0.00', 2, 'AC4236064', 6),
(12, '12.jpg', '0.00', 1, 'AC2340028', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_debtor`
--

CREATE TABLE `tb_debtor` (
  `DB_ID` int(11) NOT NULL,
  `DB_ Quantity` int(11) NOT NULL,
  `P_Sell` int(11) NOT NULL,
  `DB_Sum` int(11) NOT NULL,
  `DB_Status` int(11) NOT NULL,
  `DB_Datestart` date NOT NULL,
  `DB_Datelapse` date NOT NULL,
  `LS_ID` int(11) NOT NULL,
  `NB_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_deliver`
--

CREATE TABLE `tb_deliver` (
  `S_ID` int(11) NOT NULL,
  `S_Number` varchar(30) NOT NULL,
  `PD_Unit` int(11) NOT NULL,
  `PD_ID` int(11) NOT NULL,
  `NB_ID` int(11) NOT NULL,
  `PT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal`
--

CREATE TABLE `tb_journal` (
  `AC_ID` int(11) NOT NULL,
  `AC_Number` varchar(10) NOT NULL,
  `AC_Name` varchar(60) NOT NULL,
  `AC_Deteil` text NOT NULL,
  `AC_Date` date NOT NULL,
  `AC_debit` int(11) NOT NULL,
  `AC_credit` int(11) NOT NULL,
  `AC_Statusline` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_journal`
--

INSERT INTO `tb_journal` (`AC_ID`, `AC_Number`, `AC_Name`, `AC_Deteil`, `AC_Date`, `AC_debit`, `AC_credit`, `AC_Statusline`) VALUES
(38, '501', 'ซื้อรองเท้าสีลายดำสิ', 'รองเท้าสีลายดำ', '2019-07-07', 5580, 0, 'off'),
(39, '104', 'ภาษีซื้อรองเท้าสีลาย', 'รองเท้าสีลายดำ', '2019-07-07', 420, 0, 'off'),
(40, '101', 'เงินสด', 'รองเท้าสีลายดำ', '2019-07-07', 0, 6000, 'off'),
(41, '501', 'ซื้อรองเท้าสีแดงสินค', 'รองเท้าสีแดง', '2019-07-07', 11625, 0, 'off'),
(42, '104', 'ภาษีซื้อรองเท้าสีแดง', 'รองเท้าสีแดง', '2019-07-07', 875, 0, 'off'),
(43, '101', 'เงินสด', 'รองเท้าสีแดง', '2019-07-07', 0, 12500, 'off'),
(44, '501', 'ซื้อรองเท้าสีน้ำเงิน', 'รองเท้าสีน้ำเงิน', '2019-07-07', 5580, 0, 'off'),
(45, '104', 'ภาษีซื้อรองเท้าสีน้ำ', 'รองเท้าสีน้ำเงิน', '2019-07-07', 420, 0, 'off'),
(46, '101', 'เงินสด', 'รองเท้าสีน้ำเงิน', '2019-07-07', 0, 6000, 'off'),
(47, '501', 'ซื้อSKECHERSสินค้า', 'SKECHERS', '2019-07-07', 13950, 0, 'off'),
(48, '104', 'ภาษีซื้อSKECHERS', 'SKECHERS', '2019-07-07', 1050, 0, 'off'),
(49, '101', 'เงินสด', 'SKECHERS', '2019-07-07', 0, 15000, 'off'),
(50, '501', 'ซื้อSKECHERSสินค้า', 'SKECHERS', '2019-07-08', 13950, 0, 'on'),
(51, '104', 'ภาษีซื้อSKECHERS', 'SKECHERS', '2019-07-08', 1050, 0, 'on'),
(52, '101', 'เงินสด', 'SKECHERS', '2019-07-08', 0, 15000, 'on'),
(53, '501', 'ซื้อ Freelift Tee เสื้อออกกำลังกายผู้ชาย', 'ซื้อFreelift Tee เสื้อออกกำลังกายผู้ชาย', '2019-07-15', 372000, 0, 'on'),
(54, '104', 'ภาษีซื้อFreelift Tee เสื้อออกกำลังกายผู้ชาย', 'ซื้อFreelift Tee เสื้อออกกำลังกายผู้ชาย', '2019-07-15', 28000, 0, 'on'),
(55, '101', 'เงินสด', 'ซื้อFreelift Tee เสื้อออกกำลังกายผู้ชาย', '2019-07-15', 0, 400000, 'on'),
(56, '501', 'ซื้อ Z.N.E. เสื้อยืดออกกำลังกายผู้ชาย', 'ซื้อZ.N.E. เสื้อยืดออกกำลังกายผู้ชาย', '2019-07-15', 8370, 0, 'on'),
(57, '104', 'ภาษีซื้อZ.N.E. เสื้อยืดออกกำลังกายผู้ชาย', 'ซื้อZ.N.E. เสื้อยืดออกกำลังกายผู้ชาย', '2019-07-15', 630, 0, 'on'),
(58, '101', 'เงินสด', 'ซื้อZ.N.E. เสื้อยืดออกกำลังกายผู้ชาย', '2019-07-15', 0, 9000, 'on'),
(59, '102', '', 'เพิ่มเงินฝาก', '2019-07-22', 400000, 0, 'on'),
(60, '101', '', 'เพิ่มเงินสด', '2019-07-22', 300000, 0, 'on'),
(61, '301', '', '301', '2019-07-22', 0, 700000, 'on'),
(62, '502', '', 'ไปซื้อของ', '2019-07-22', 0, 15000, 'on'),
(63, '503', '', '503', '2019-07-22', 0, 3000, 'on'),
(64, '504', '', '504', '2019-07-22', 0, 9000, 'on'),
(65, '402', '', 'ค่าแชร์', '2019-07-22', 0, 5000, 'on'),
(66, '302', '', 'ถอนงวดรถ', '2019-07-22', 0, 20000, 'on'),
(67, '204', '', 'กู้เจ๊เทิง', '2019-07-22', 0, 200000, 'on'),
(68, '103', '', 'ซื้อเครดิต', '2019-07-22', 35000, 0, 'on'),
(69, '505', '', 'จ่ายเน็ตtot', '2019-07-22', 0, 2500, 'on'),
(70, '505', '', 'ค่าเชฟเวอร์', '2019-07-22', 0, 3000, 'on'),
(71, '504', '', 'จ่ายเงินเดือนหนิง', '2019-07-22', 0, 12000, 'on'),
(72, '504', '', 'จ่านเงินเดือนจิค', '2019-07-22', 0, 9500, 'on'),
(73, '503', '', 'ค่าไฟ', '2019-07-22', 0, 2001, 'on'),
(74, '503', '', 'ค่าน้ำ', '2019-07-22', 0, 600, 'on'),
(75, '502', '', 'เที่ยวพักร้อน', '2019-07-22', 0, 6000, 'on'),
(76, '402', '', 'ค่าแชร์งวด..ใหม่', '2019-07-22', 0, 9000, 'on'),
(77, '302', '', 'ถอนใช้-เลขา', '2019-07-22', 0, 4000, 'on'),
(78, '301', '', 'เพิ่มทุน', '2019-07-22', 0, 300000, 'on'),
(79, '102', '', 'ค่าทุน', '2019-07-22', 300000, 0, 'on'),
(80, '204', '', 'กูเจ๊นิด', '2019-07-22', 0, 25000, 'on'),
(81, '203', '', 'รวมส่งรายได้ส่งสรรพากร', '2019-07-22', 0, 15000, 'on'),
(82, '108', '', 'ซื้อคอมใหม่', '2019-07-22', 0, 50000, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tb_moo`
--

CREATE TABLE `tb_moo` (
  `moo_id` int(11) NOT NULL,
  `moo_name` varchar(50) NOT NULL,
  `muad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_moo`
--

INSERT INTO `tb_moo` (`moo_id`, `moo_name`, `muad_id`) VALUES
(8, 'Nicky', 6),
(9, 'Adidas', 6),
(10, 'fila', 6),
(11, 'adidas', 8),
(12, 'nike', 8),
(13, 'adidas', 7),
(14, 'nike', 7),
(15, 'adidas', 9),
(16, 'nike', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_muad`
--

CREATE TABLE `tb_muad` (
  `muad_id` int(11) NOT NULL,
  `muad_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_muad`
--

INSERT INTO `tb_muad` (`muad_id`, `muad_name`) VALUES
(6, 'รองเท้า'),
(7, 'เสื้อ'),
(8, 'กางเกง'),
(9, 'หมวก');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paid`
--

CREATE TABLE `tb_paid` (
  `paid_id` varchar(100) NOT NULL,
  `paid_detail` text NOT NULL,
  `paid_sum` decimal(10,2) NOT NULL,
  `paid_pdf` varchar(255) NOT NULL,
  `paid_date` date NOT NULL,
  `paid_ems` varchar(20) NOT NULL,
  `paid_ems_img` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_paid`
--

INSERT INTO `tb_paid` (`paid_id`, `paid_detail`, `paid_sum`, `paid_pdf`, `paid_date`, `paid_ems`, `paid_ems_img`, `user_id`) VALUES
('aaa', '82+2=350.00,92+1=330.00', '1030.00', 'aaa.pdf', '2019-07-17', '', '', 6),
('aab', '87+1=430.00', '430.00', '', '2019-07-15', 'EF222222222TH', 'aab.jpg', 6),
('AC1085196', '88+5=580.00', '2900.00', 'AC1085196.pdf', '2019-07-15', 'EF222222222TH', 'AC1085196.jpg', 6),
('AC1228601', '89+1=580.00', '580.00', 'AC1228601.pdf', '2019-07-22', '', '', 6),
('AC1698457', '87+1=430.00', '430.00', 'AC1698457.pdf', '2019-07-15', '', '', 6),
('AC2085123', '88+1=580.00', '580.00', '', '2019-07-15', '', '', 6),
('AC2289939', '93+2=900.00', '1800.00', 'AC2289939.pdf', '2019-07-16', '', '', 6),
('AC2340028', '94+1=900.00', '900.00', 'AC2340028.pdf', '2019-07-17', '', '', 6),
('AC249975', '93+1=900.00', '900.00', 'AC249975.pdf', '2019-07-16', '', '', 6),
('AC3078289', '94+1=900.00', '900.00', 'AC3078289.pdf', '2019-07-16', '', '', 6),
('AC4236064', '84+2=1774.00', '3548.00', 'AC4236064.pdf', '2019-07-17', '', '', 6),
('AC437437', '84+1=1774.00', '1774.00', '', '2019-07-15', '', '', 6),
('AC479410', '86+2=1500.00', '1500.00', 'AC479410.pdf', '2019-07-15', 'EF222222222TH', 'AC479410.jpg', 6),
('AC4896462', '92+1=330.00', '330.00', 'AC4896462.pdf', '2019-07-15', '', '', 6),
('AC5288217', '88+3=580.00', '1740.00', 'AC5288217.pdf', '2019-07-15', '', '', 6),
('AC5447311', '92+1=330.00', '330.00', 'AC5447311.pdf', '2019-07-15', '', '', 6),
('AC6077684', '94+1=900.00', '900.00', 'AC6077684.pdf', '2019-07-16', '', '', 6),
('AC7774580', '94+3=900.00,93+2=900.00', '4500.00', 'AC7774580.pdf', '2019-07-15', '', '', 6),
('AC8168804', '93+1=900.00', '900.00', 'AC8168804.pdf', '2019-07-15', '', '', 6),
('AC8214178', '87+1=430.00,87+1=430.00', '860.00', 'aab.pdf', '2019-07-13', 'EF222222222TH', 'AC8214178.jpg', 6),
('AC8466862', '94+1=900.00', '900.00', 'AC8466862.pdf', '2019-07-16', '', '', 6),
('AC8559113', '84+1=1774.00', '1774.00', '', '2019-07-15', 'EF222222222TH', 'AC8559113.jpg', 6),
('AC8923367', '88+3=580.00', '580.00', '', '2019-07-15', 'EF222222222TH', 'AC8923367.jpg', 6),
('AC9332992', '87+1=430.00', '430.00', '', '2019-07-15', '', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `pay_id` int(11) NOT NULL,
  `P_Sell_ID` int(11) NOT NULL,
  `pay_qty` int(11) NOT NULL,
  `pay_price` decimal(10,2) NOT NULL,
  `pay_img` varchar(255) NOT NULL,
  `pay_status` varchar(20) NOT NULL,
  `pay_in` date NOT NULL,
  `pay_pending` date NOT NULL,
  `pay_accept` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`pay_id`, `P_Sell_ID`, `pay_qty`, `pay_price`, `pay_img`, `pay_status`, `pay_in`, `pay_pending`, `pay_accept`, `user_id`, `pay_key`) VALUES
(26, 94, 1, '900.00', 'AC6075775.jpg', 'ส่งหลักฐานแล้ว', '2019-07-16', '2019-07-16', '0000-00-00', 6, 'AC6075775'),
(31, 87, 3, '430.00', 'AC858924.jpg', 'ส่งหลักฐานแล้ว', '2019-07-17', '2019-07-17', '0000-00-00', 6, 'AC858924'),
(32, 94, 2, '900.00', '', 'รอการชำระเงิน', '2019-07-17', '0000-00-00', '0000-00-00', 6, 'AC3590412'),
(33, 88, 1, '580.00', '', 'รอการชำระเงิน', '2019-07-17', '0000-00-00', '0000-00-00', 6, 'AC3590412'),
(34, 81, 1, '350.00', '', 'รอการชำระเงิน', '2019-07-18', '0000-00-00', '0000-00-00', 6, 'AC8563346'),
(35, 93, 1, '900.00', '', 'รอการชำระเงิน', '2019-07-18', '0000-00-00', '0000-00-00', 6, 'AC8563346');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pending`
--

CREATE TABLE `tb_pending` (
  `PT_ID` int(11) NOT NULL,
  `S_Status` varchar(20) NOT NULL,
  `PT_ Quantity` int(11) NOT NULL,
  `P_Sell` int(11) NOT NULL,
  `PT_Sum` int(11) NOT NULL,
  `PT_ Transfer` text NOT NULL,
  `PR_ID` int(11) NOT NULL,
  `NB_ID` int(11) NOT NULL,
  `PT_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `P_Sell_ID` int(11) NOT NULL,
  `P_Name` varchar(50) NOT NULL,
  `P_Detali` text NOT NULL,
  `P_Import` int(11) NOT NULL,
  `P_Sell` int(11) NOT NULL,
  `P_Quantity` int(11) NOT NULL,
  `muad_id` int(11) NOT NULL,
  `moo_id` int(11) NOT NULL,
  `P_Image` text NOT NULL,
  `P_Date` date NOT NULL,
  `P_Percent` int(11) NOT NULL,
  `PR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`P_Sell_ID`, `P_Name`, `P_Detali`, `P_Import`, `P_Sell`, `P_Quantity`, `muad_id`, `moo_id`, `P_Image`, `P_Date`, `P_Percent`, `PR_ID`) VALUES
(81, 'รองเท้าสีลายดำ', 'ของแท้ 100%', 200, 350, 30, 6, 8, '', '2019-07-07', 7, 0),
(82, 'รองเท้าสีแดง', 'ของแท้ 100%', 250, 350, 50, 6, 8, '', '2019-07-07', 7, 0),
(83, 'รองเท้าสีน้ำเงิน', 'ของแท้ 100%', 300, 450, 20, 6, 8, '', '2019-07-07', 7, 0),
(84, 'SKECHERS', 'Nichlas - Rogates รองเท้าลำลองผู้ชาย', 1500, 1794, 10, 6, 9, '', '2019-07-07', 7, 0),
(85, 'SKECHERS', 'Gorun Mojo - Bravo รองเท้าวิ่งผู้ชาย', 1500, 2100, 10, 6, 10, '', '2019-07-07', 7, 0),
(86, 'ADIDAS', 'Senseboost Go รองเท้าวิ่งผู้ชาย', 1200, 1500, 30, 6, 10, '', '2019-07-07', 7, 0),
(87, 'รองเท้า B2001', 'ผ้าใบ เนื้อหมู', 300, 450, 20, 6, 9, '', '2019-07-08', 7, 0),
(88, 'รองเท้า B2021', 'ใส่นุ่มสบายเท้า', 450, 600, 20, 6, 9, '', '2019-07-10', 7, 0),
(89, 'รองเท้า A4110', 'ลอยได้', 400, 600, 20, 6, 9, '', '2019-07-10', 7, 0),
(90, 'รองเท้า A42200xxx', 'แล้วแต่มึงเลย', 200, 300, 30, 6, 8, '', '2019-07-10', 7, 0),
(91, 'รองเท้า xxxxxx', 'ใส่แล้วลอยได้', 300, 400, 20, 6, 8, '', '2019-07-10', 7, 0),
(92, 'รองเท้า shinobi', 'sxxxxxxxxxxxxxxxxxx', 300, 350, 10, 6, 9, '', '2019-07-10', 7, 0),
(93, 'Freelift Tee เสื้อออกกำลังกายผู้ชาย', 'ใส่สบาย เนื้อผ้าทำมาจากแร่พิเศษจากดาวโลก', 400, 900, 1000, 7, 13, '', '2019-07-15', 7, 0),
(94, 'Z.N.E. เสื้อยืดออกกำลังกายผู้ชาย', 'ของแท้ 90%', 300, 900, 30, 7, 13, '', '2019-07-15', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_img`
--

CREATE TABLE `tb_product_img` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(30) NOT NULL,
  `P_Sell_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product_img`
--

INSERT INTO `tb_product_img` (`img_id`, `img_name`, `P_Sell_ID`) VALUES
(13, '13.jpg', 0),
(14, '14.jpeg', 0),
(15, '15.jpg', 0),
(16, '16.jpg', 42),
(17, '17.jpeg', 42),
(18, '18.jpg', 42),
(19, '19.', 43),
(20, '20.pdf', 44),
(21, '21.jpg', 45),
(22, '22.pdf', 45),
(23, '23.txt', 46),
(24, '24.', 0),
(25, '25.', 0),
(26, '26.', 48),
(27, '27.', 49),
(28, '28.', 50),
(29, '29.', 51),
(30, '30.', 52),
(31, '31.', 53),
(32, '32.', 54),
(33, '33.', 55),
(34, '34.jpg', 57),
(35, '35.jpg', 58),
(36, '36.jpg', 59),
(37, '37.jpg', 60),
(38, '38.jpg', 61),
(39, '39.jpg', 62),
(40, '40.jpg', 63),
(41, '41.jpg', 63),
(42, '42.jpg', 63),
(43, '43.jpg', 64),
(44, '44.jpg', 65),
(45, '45.jpg', 66),
(46, '46.jpg', 67),
(47, '47.jpg', 68),
(48, '48.jpg', 69),
(49, '49.jpg', 70),
(50, '50.', 71),
(51, '51.jpg', 72),
(52, '52.jpg', 73),
(53, '53.jpg', 74),
(54, '54.', 75),
(55, '55.', 76),
(56, '56.jpg', 77),
(57, '57.jpg', 77),
(58, '58.jpg', 78),
(59, '59.jpg', 78),
(60, '60.jpg', 79),
(61, '61.jpg', 80),
(62, '62.jpg', 81),
(63, '63.jpg', 81),
(64, '64.jpg', 81),
(65, '65.jpg', 82),
(66, '66.jpg', 82),
(67, '67.jpg', 82),
(68, '68.jpg', 83),
(69, '69.jpg', 83),
(70, '70.jpg', 83),
(71, '71.jpg', 84),
(72, '72.jpg', 84),
(73, '73.jpg', 84),
(74, '74.jpg', 85),
(75, '75.jpg', 85),
(76, '76.jpg', 85),
(77, '77.jpg', 86),
(78, '78.jpg', 86),
(79, '79.jpg', 86),
(80, '80.jpg', 87),
(81, '81.jpg', 87),
(82, '82.jpeg', 87),
(83, '83.jpg', 88),
(84, '84.jpg', 88),
(85, '85.jpeg', 88),
(86, '86.jpg', 89),
(87, '87.jpg', 89),
(88, '88.jpeg', 89),
(89, '89.jpg', 90),
(90, '90.jpg', 90),
(91, '91.jpeg', 90),
(92, '92.jpg', 91),
(93, '93.jpg', 91),
(94, '94.jpeg', 91),
(95, '95.jpg', 92),
(96, '96.jpg', 92),
(97, '97.jpeg', 92),
(98, '98.jpg', 93),
(99, '99.jpg', 93),
(100, '100.jpg', 94),
(101, '101.jpg', 94);

-- --------------------------------------------------------

--
-- Table structure for table `tb_promotion`
--

CREATE TABLE `tb_promotion` (
  `PR_ID` int(11) NOT NULL,
  `PR_Name` varchar(20) NOT NULL,
  `PR_Start` date NOT NULL,
  `PR_Stop` date NOT NULL,
  `PR_Quantity` int(11) NOT NULL,
  `muad_id` varchar(50) NOT NULL,
  `moo_id` varchar(50) NOT NULL,
  `PR_discount_num` int(11) NOT NULL,
  `PR_discount_precent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_promotion`
--

INSERT INTO `tb_promotion` (`PR_ID`, `PR_Name`, `PR_Start`, `PR_Stop`, `PR_Quantity`, `muad_id`, `moo_id`, `PR_discount_num`, `PR_discount_precent`) VALUES
(1, 'ลดตีนลง', '2019-07-05', '2019-07-07', 100, '4', '6', 0, 0),
(2, 'ลดตีนลง', '2019-07-05', '2019-07-14', 50, '4', '5', 0, 0),
(3, 'ลดตีนลง', '2019-07-05', '2019-07-07', 100, '3', '4', 0, 0),
(4, 'ลดตีนลง', '2019-07-05', '2019-07-07', 8, '4', '5', 0, 20),
(5, 'ลดตีนลง', '2019-07-05', '2019-07-21', 8, '3', '4', 300, 0),
(6, 'ลดกระหน่ำ', '2019-07-04', '2019-07-05', 0, '4', '5', 0, 10),
(7, 'ลดกระหน่ำ2', '2019-07-04', '2019-07-05', 10, '4', '5', 5, 0),
(8, 'ลดรองเท้า', '2019-07-09', '2019-07-11', 100, '6', '9', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_saleitem`
--

CREATE TABLE `tb_saleitem` (
  `LS_ID` int(11) NOT NULL,
  `LS_Status` varchar(20) NOT NULL,
  `N_Product` int(11) NOT NULL,
  `P_Sell` int(11) NOT NULL,
  `Tax_Unit` int(11) NOT NULL,
  `LS_Sumtax` int(11) NOT NULL,
  `Total_net` int(11) NOT NULL,
  `LS_Date` date NOT NULL,
  `DB_ID` int(11) NOT NULL,
  `PD_ID` int(11) NOT NULL,
  `T_ID` int(11) NOT NULL,
  `PT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tax`
--

CREATE TABLE `tb_tax` (
  `T_ID` int(11) NOT NULL,
  `T_Price` int(11) NOT NULL,
  `T_Quantity` int(11) NOT NULL,
  `T_Sum` int(11) NOT NULL,
  `T_Date` date NOT NULL,
  `PT_ID` int(11) NOT NULL,
  `T_status` varchar(40) NOT NULL,
  `T_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tax`
--

INSERT INTO `tb_tax` (`T_ID`, `T_Price`, `T_Quantity`, `T_Sum`, `T_Date`, `PT_ID`, `T_status`, `T_name`) VALUES
(22, 200, 30, 420, '2019-07-07', 81, 'Buy', 'รองเท้าสีลายดำ'),
(23, 250, 50, 875, '2019-07-07', 82, 'Buy', 'รองเท้าสีแดง'),
(24, 300, 20, 420, '2019-07-07', 83, 'Buy', 'รองเท้าสีน้ำเงิน'),
(25, 1500, 10, 1050, '2019-07-07', 84, 'Buy', 'SKECHERS'),
(26, 1500, 10, 1050, '2019-07-07', 85, 'Sell', 'SKECHERS'),
(27, 1200, 30, 2520, '2019-07-07', 86, 'Buy', 'ADIDAS'),
(28, 300, 20, 420, '2019-07-08', 87, 'Buy', 'รองเท้า B2001'),
(29, 450, 20, 630, '2019-07-10', 88, 'Buy', 'รองเท้า B2021'),
(30, 400, 20, 560, '2019-07-10', 89, 'Buy', 'รองเท้า A4110'),
(31, 200, 30, 420, '2019-07-10', 90, 'Buy', 'รองเท้า A42200xxx'),
(32, 300, 20, 420, '2019-07-10', 91, 'Buy', 'รองเท้า xxxxxx'),
(33, 300, 10, 210, '2019-07-10', 92, 'Buy', 'รองเท้า shinobi'),
(34, 400, 1000, 28000, '2019-07-15', 93, 'Buy', 'Freelift Tee เสื้อออกกำลังกายผู้ชาย'),
(35, 300, 30, 630, '2019-07-15', 94, 'Buy', 'Z.N.E. เสื้อยืดออกกำลังกายผู้ชาย');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `NB_ID` int(11) NOT NULL,
  `NB_Name` varchar(50) NOT NULL,
  `NB_User` varchar(50) NOT NULL,
  `NB_Pass` varchar(50) NOT NULL,
  `NB_ Address` text NOT NULL,
  `NB_PHNumber` varchar(20) NOT NULL,
  `NB_email` varchar(50) NOT NULL,
  `NB_ Birthday` date NOT NULL,
  `NB_Number` text NOT NULL,
  `NB_Image` text NOT NULL,
  `NB_ Credit` int(11) NOT NULL,
  `NB_Tax` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_simple_user`
--
ALTER TABLE `tbl_simple_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_acc`
--
ALTER TABLE `tb_acc`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_album`
--
ALTER TABLE `tb_album`
  ADD PRIMARY KEY (`PP_ID`);

--
-- Indexes for table `tb_alert`
--
ALTER TABLE `tb_alert`
  ADD PRIMARY KEY (`AL_ID`);

--
-- Indexes for table `tb_basket`
--
ALTER TABLE `tb_basket`
  ADD PRIMARY KEY (`TK_ID`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tb_commerce`
--
ALTER TABLE `tb_commerce`
  ADD PRIMARY KEY (`CR_ID`);

--
-- Indexes for table `tb_credit`
--
ALTER TABLE `tb_credit`
  ADD PRIMARY KEY (`credit_id`);

--
-- Indexes for table `tb_credit_log`
--
ALTER TABLE `tb_credit_log`
  ADD PRIMARY KEY (`clog_id`);

--
-- Indexes for table `tb_debtor`
--
ALTER TABLE `tb_debtor`
  ADD PRIMARY KEY (`DB_ID`);

--
-- Indexes for table `tb_deliver`
--
ALTER TABLE `tb_deliver`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `tb_journal`
--
ALTER TABLE `tb_journal`
  ADD PRIMARY KEY (`AC_ID`);

--
-- Indexes for table `tb_moo`
--
ALTER TABLE `tb_moo`
  ADD PRIMARY KEY (`moo_id`);

--
-- Indexes for table `tb_muad`
--
ALTER TABLE `tb_muad`
  ADD PRIMARY KEY (`muad_id`);

--
-- Indexes for table `tb_paid`
--
ALTER TABLE `tb_paid`
  ADD PRIMARY KEY (`paid_id`);

--
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tb_pending`
--
ALTER TABLE `tb_pending`
  ADD PRIMARY KEY (`PT_ID`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`P_Sell_ID`);

--
-- Indexes for table `tb_product_img`
--
ALTER TABLE `tb_product_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  ADD PRIMARY KEY (`PR_ID`);

--
-- Indexes for table `tb_saleitem`
--
ALTER TABLE `tb_saleitem`
  ADD PRIMARY KEY (`LS_ID`);

--
-- Indexes for table `tb_tax`
--
ALTER TABLE `tb_tax`
  ADD PRIMARY KEY (`T_ID`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`NB_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_simple_user`
--
ALTER TABLE `tbl_simple_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_album`
--
ALTER TABLE `tb_album`
  MODIFY `PP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_alert`
--
ALTER TABLE `tb_alert`
  MODIFY `AL_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_basket`
--
ALTER TABLE `tb_basket`
  MODIFY `TK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_credit`
--
ALTER TABLE `tb_credit`
  MODIFY `credit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_credit_log`
--
ALTER TABLE `tb_credit_log`
  MODIFY `clog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_debtor`
--
ALTER TABLE `tb_debtor`
  MODIFY `DB_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_deliver`
--
ALTER TABLE `tb_deliver`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_journal`
--
ALTER TABLE `tb_journal`
  MODIFY `AC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tb_moo`
--
ALTER TABLE `tb_moo`
  MODIFY `moo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_muad`
--
ALTER TABLE `tb_muad`
  MODIFY `muad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_pending`
--
ALTER TABLE `tb_pending`
  MODIFY `PT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `P_Sell_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tb_product_img`
--
ALTER TABLE `tb_product_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  MODIFY `PR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_saleitem`
--
ALTER TABLE `tb_saleitem`
  MODIFY `LS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tax`
--
ALTER TABLE `tb_tax`
  MODIFY `T_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `NB_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
