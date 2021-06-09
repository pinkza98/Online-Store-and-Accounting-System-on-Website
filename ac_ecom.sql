-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 10:51 AM
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
(6, 'pinkza88@gmail.com', 'อรรถพล สีชา', 'gg_116497501610897470572', '10370739', 0, '', 1, '044dd31ea75558dd089188a54d35685b', '2019-07-26 02:54:35', 'administrator', 'สารคาม กันทรวิชัย ท่าขอนยาง 12 3 47110', '0878628323', '6590.00', 'card5.jpg', '2019-07-11', '1471200297606'),
(7, 'atthapol.see@msu.ac.th', 'อรรถพล สีชา', 'gg_108761584253317600084', '10630366', 0, '', 1, 'c3ed2b489324bfbede8f68b43b1f6103', '2019-07-26 02:42:58', '', '', '', '0.00', '', '0000-00-00', ''),
(8, 'pinkza98@gmail.com', 'kacys love', 'gg_117874895173436826950', '10683868', 0, '', 1, '91d5dc1e90d28c46a061802a22567a3e', '2019-07-15 19:16:07', '', '', '', '0.00', '', '0000-00-00', ''),
(9, 'poniaza104@gmail.com', 'atthapol seesha', 'gg_108225411764573314622', '10152905', 0, '', 1, '6aef17cabfa39850d9e176db0daa13a4', '2019-07-15 10:15:01', '', '', '', '1000.00', '', '0000-00-00', ''),
(10, 'poniaza102@gmail.com', 'atthapol seesha', 'gg_100449838787372372735', '10483223', 0, '', 1, '2bce4be87bed2ad507e322f0304f4a4e', '2019-07-21 17:28:42', 'user', 'สารคาม กันทรวิชัย ท่าขอนยาง 12 3 47110', '0878628323', '0.00', 'line-translator-accounts-2.jpg', '2019-07-18', '4112191981'),
(11, 'poniaza1@gmail.com', 'atthapol seesaa', 'gg_118143480142689722863', '10277664', 0, '', 1, '27d4a7607737866ce8ca69f8c292c874', '2019-07-26 02:43:19', '', '', '', '0.00', '', '0000-00-00', ''),
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
  `album_id` int(11) NOT NULL,
  `album_image` varchar(255) NOT NULL,
  `algroup_id` int(11) NOT NULL,
  `album_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_album`
--

INSERT INTO `tb_album` (`album_id`, `album_image`, `algroup_id`, `album_date`) VALUES
(5, '5.jpg', 1, '2019-07-23'),
(6, '6.jpg', 1, '2019-07-23'),
(7, '7.jpg', 3, '2019-07-23'),
(8, '8.jpg', 4, '2019-07-23'),
(9, '9.jpg', 4, '2019-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_album_group`
--

CREATE TABLE `tb_album_group` (
  `algroup_id` int(11) NOT NULL,
  `algroup_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_album_group`
--

INSERT INTO `tb_album_group` (`algroup_id`, `algroup_name`) VALUES
(1, 'ใบซื้อสินค้า'),
(2, 'ใบซื้อสินค้า 2'),
(3, 'ใบอะไรสักอย่าง'),
(4, 'ใบซื้อสินค้า จากร้าน AAA');

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
(12, '12.jpg', '900.00', 2, 'AC2340028', 6),
(13, '13.jpg', '900.00', 2, 'AC3871593', 6),
(14, '14.PNG', '0.00', 1, 'AC4236064', 6);

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
(172, '101', '', 'เงินสด', '2019-07-26', 39000, 0, 'on'),
(173, '102', '', 'เงินฝาก', '2019-07-26', 240000, 0, 'on'),
(174, '103', '', 'ลูกหนี้การค้า', '2019-07-26', 44000, 0, 'on'),
(175, '108', '', 'เครื่องใช้สำนักงาน', '2019-07-26', 426200, 0, 'on'),
(176, '201', '', 'เจ้าหนี้', '2019-07-26', 0, 21000, 'on'),
(177, '204', '', 'เงินกู้', '2019-07-26', 0, 46000, 'on'),
(178, '301', '', 'ทุน', '2019-07-26', 0, 647155, 'on'),
(179, '401', '', 'รายได้', '2019-07-26', 0, 360050, 'off'),
(180, '402', '', 'รายได้อื่นๆ', '2019-07-26', 0, 6050, 'off'),
(181, '501', '', 'ซื้อของ', '2019-07-26', 157060, 0, 'off'),
(182, '501', '', 'ซื้อสินค้า', '2019-07-26', 173995, 0, 'off'),
(183, '401', 'ขาย94', 'ขาย94', '2019-07-26', 0, 837, 'off'),
(184, '202', 'ภาษีขาย94', 'ขาย94', '2019-07-26', 0, 63, 'on'),
(185, '102', 'เงินฝาก', 'ขาย94', '2019-07-26', 900, 0, 'on'),
(186, '401', 'ขาย93', 'ขาย93', '2019-07-26', 0, 837, 'off'),
(187, '202', 'ภาษีขาย93', 'ขาย93', '2019-07-26', 0, 63, 'on'),
(188, '102', 'เงินฝาก', 'ขาย93', '2019-07-26', 900, 0, 'on'),
(189, '401', 'ขาย87', 'ขาย87', '2019-07-26', 0, 1674, 'off'),
(190, '202', 'ภาษีขาย87', 'ขาย87', '2019-07-26', 0, 126, 'on'),
(191, '102', 'เงินฝาก', 'ขาย87', '2019-07-26', 1800, 0, 'on'),
(192, '401', 'ขาย94', 'ขาย94', '2019-07-26', 0, 837, 'off'),
(193, '202', 'ภาษีขาย94', 'ขาย94', '2019-07-26', 0, 63, 'on'),
(194, '102', 'เงินฝาก', 'ขาย94', '2019-07-26', 900, 0, 'on'),
(195, '401', '', 'รายได้', '2019-07-26', 30000, 0, 'off'),
(196, '301', '', 'เพิ่มทุน', '2019-07-26', 0, 30000, 'on');

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
('AC1429720', '94+1=900.00,93+1=900.00,87+4=450.00', '3600.00', 'AC1429720.pdf', '2019-07-26', 'EF222222222TH', 'AC1429720.jpg', 6),
('AC3581309', '93+2=900.00,87+3=430.00', '3090.00', 'AC3581309.pdf', '2019-07-24', 'EF222222222TH', 'AC3581309.jpg', 6),
('AC3590412', '94+2=900.00,88+1=580.00', '2380.00', 'AC3590412.pdf', '2019-07-24', '', '', 6),
('AC3871593', '94+1=900.00', '900.00', 'AC3871593.pdf', '2019-07-26', '', '', 6),
('AC5028925', '84+3=1774.00,94+3=900.00', '8022.00', 'AC5028925.pdf', '2019-07-24', '', '', 6),
('d', '94+2=900.00,88+1=580.00', '2380.00', 'd.pdf', '2019-07-24', '', '', 6);

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
(52, 87, 1, '350.00', '', 'รอการชำระเงิน', '2019-07-26', '0000-00-00', '0000-00-00', 6, 'AC1337301'),
(53, 94, 1, '900.00', '', 'รอการชำระเงิน', '2019-07-26', '0000-00-00', '0000-00-00', 6, 'AC1337301');

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_report_closed`
--

CREATE TABLE `tb_report_closed` (
  `report_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `report_price` varchar(255) NOT NULL,
  `report_money` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_report_closed`
--

INSERT INTO `tb_report_closed` (`report_id`, `report_date`, `report_price`, `report_money`) VALUES
(1, '2019-07-26', '2699_2019-07-26_price.pdf', '2699_2019-07-26_money.pdf'),
(2, '2019-07-26', '1206_2019-07-26_price.pdf', '1206_2019-07-26_money.pdf'),
(3, '2019-07-26', '1016_2019-07-26_price.pdf', '1016_2019-07-26_money.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tax`
--

CREATE TABLE `tb_tax` (
  `T_ID` int(11) NOT NULL,
  `T_Price` int(11) NOT NULL,
  `T_Quantity` int(11) NOT NULL,
  `T_Sum` decimal(10,2) NOT NULL,
  `T_Date` date NOT NULL,
  `PT_ID` int(11) NOT NULL,
  `T_status` varchar(40) NOT NULL,
  `T_name` varchar(100) NOT NULL,
  `T_user` int(11) NOT NULL,
  `T_Key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tax`
--

INSERT INTO `tb_tax` (`T_ID`, `T_Price`, `T_Quantity`, `T_Sum`, `T_Date`, `PT_ID`, `T_status`, `T_name`, `T_user`, `T_Key`) VALUES
(22, 200, 30, '420.00', '2019-07-07', 81, 'Buy', 'รองเท้าสีลายดำ', 0, ''),
(23, 250, 50, '875.00', '2019-07-07', 82, 'Buy', 'รองเท้าสีแดง', 0, ''),
(24, 300, 20, '420.00', '2019-07-07', 83, 'Buy', 'รองเท้าสีน้ำเงิน', 0, ''),
(25, 1500, 10, '1050.00', '2019-07-07', 84, 'Buy', 'SKECHERS', 0, ''),
(26, 1500, 10, '1050.00', '2019-07-07', 85, 'Sell', 'SKECHERS', 0, ''),
(27, 1200, 30, '2520.00', '2019-07-07', 86, 'Buy', 'ADIDAS', 0, ''),
(28, 300, 20, '420.00', '2019-07-08', 87, 'Buy', 'รองเท้า B2001', 0, ''),
(29, 450, 20, '630.00', '2019-07-10', 88, 'Buy', 'รองเท้า B2021', 0, ''),
(30, 400, 20, '560.00', '2019-07-10', 89, 'Buy', 'รองเท้า A4110', 0, ''),
(31, 200, 30, '420.00', '2019-07-10', 90, 'Buy', 'รองเท้า A42200xxx', 0, ''),
(32, 300, 20, '420.00', '2019-07-10', 91, 'Buy', 'รองเท้า xxxxxx', 0, ''),
(33, 300, 10, '210.00', '2019-07-10', 92, 'Buy', 'รองเท้า shinobi', 0, ''),
(34, 400, 10, '280.00', '2019-07-15', 93, 'Buy', 'Freelift Tee เสื้อออกกำลังกายผู้ชาย', 0, ''),
(35, 300, 30, '630.00', '2019-07-15', 94, 'Buy', 'Z.N.E. เสื้อยืดออกกำลังกายผู้ชาย', 0, ''),
(40, 900, 2, '126.00', '2019-07-24', 94, 'Sell', 'รหัสสินค้า94', 6, 'AC3590412'),
(41, 580, 1, '41.00', '2019-07-24', 88, 'Sell', 'รหัสสินค้า88', 6, 'AC3590412'),
(42, 430, 6, '181.00', '2019-07-24', 87, 'Sell', 'รหัสสินค้า87', 6, 'AC6968967'),
(43, 350, 1, '25.00', '2019-07-24', 81, 'Sell', 'รหัสสินค้า81', 6, 'AC8563346'),
(44, 900, 1, '63.00', '2019-07-24', 93, 'Sell', 'รหัสสินค้า93', 6, 'AC8563346'),
(45, 1774, 3, '372.54', '2019-07-24', 84, 'Sell', 'รหัสสินค้า84', 6, 'AC8564926'),
(46, 900, 3, '189.00', '2019-07-24', 94, 'Sell', 'รหัสสินค้า94', 6, 'AC8564926'),
(47, 900, 2, '126.00', '2019-07-24', 93, 'Sell', 'รหัสสินค้า93', 6, 'AC3581309'),
(48, 430, 3, '90.30', '2019-07-24', 87, 'Sell', 'รหัสสินค้า87', 6, 'AC3581309'),
(49, 580, 3, '121.80', '2019-07-24', 88, 'Sell', 'รหัสสินค้า88', 6, 'AC6908487'),
(50, 330, 3, '69.30', '2019-07-24', 92, 'Sell', 'รหัสสินค้า92', 6, 'AC6908487'),
(51, 1774, 3, '372.54', '2019-07-24', 84, 'Sell', 'รหัสสินค้า84', 6, 'AC5028925'),
(52, 900, 3, '189.00', '2019-07-24', 94, 'Sell', 'รหัสสินค้า94', 6, 'AC5028925'),
(53, 1774, 2, '248.36', '2019-07-24', 84, 'Sell', 'รหัสสินค้า84', 6, 'AC9357081'),
(54, 430, 2, '60.20', '2019-07-24', 87, 'Sell', 'รหัสสินค้า87', 6, 'AC9357081'),
(55, 580, 2, '81.20', '2019-07-24', 88, 'Sell', 'รหัสสินค้า88', 6, 'AC9357081'),
(56, 900, 1, '63.00', '2019-07-26', 94, 'Sell', 'รหัสสินค้า94', 6, 'AC1429720'),
(57, 900, 1, '63.00', '2019-07-26', 93, 'Sell', 'รหัสสินค้า93', 6, 'AC1429720');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tax_gen`
--

CREATE TABLE `tb_tax_gen` (
  `gen_id` int(11) NOT NULL,
  `gen_date` date NOT NULL,
  `gen_date_start` date NOT NULL,
  `gen_date_end` date NOT NULL,
  `gen_tax_gern` decimal(10,2) NOT NULL,
  `gen_doc_buy` varchar(255) NOT NULL,
  `gen_doc_sell` varchar(255) NOT NULL,
  `gen_doc_vat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tax_gen`
--

INSERT INTO `tb_tax_gen` (`gen_id`, `gen_date`, `gen_date_start`, `gen_date_end`, `gen_tax_gern`, `gen_doc_buy`, `gen_doc_sell`, `gen_doc_vat`) VALUES
(114, '2019-07-26', '2019-07-15', '2019-07-26', '0.00', '114_buy_2019-07-26.pdf', '114_sell_2019-07-26.pdf', '');

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
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `tb_album_group`
--
ALTER TABLE `tb_album_group`
  ADD PRIMARY KEY (`algroup_id`);

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
-- Indexes for table `tb_report_closed`
--
ALTER TABLE `tb_report_closed`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tb_tax`
--
ALTER TABLE `tb_tax`
  ADD PRIMARY KEY (`T_ID`);

--
-- Indexes for table `tb_tax_gen`
--
ALTER TABLE `tb_tax_gen`
  ADD PRIMARY KEY (`gen_id`);

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
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_album_group`
--
ALTER TABLE `tb_album_group`
  MODIFY `algroup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_credit`
--
ALTER TABLE `tb_credit`
  MODIFY `credit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_credit_log`
--
ALTER TABLE `tb_credit_log`
  MODIFY `clog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_journal`
--
ALTER TABLE `tb_journal`
  MODIFY `AC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

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
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `PR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_report_closed`
--
ALTER TABLE `tb_report_closed`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tax`
--
ALTER TABLE `tb_tax`
  MODIFY `T_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_tax_gen`
--
ALTER TABLE `tb_tax_gen`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
