-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 04:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtbcovid_covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `abroad`
--

CREATE TABLE `abroad` (
  `abid` int(5) NOT NULL,
  `abroadid` int(10) NOT NULL,
  `abname` varchar(50) NOT NULL,
  `abdesc` varchar(75) NOT NULL,
  `riskid` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `abroad`
--

INSERT INTO `abroad` (`abid`, `abroadid`, `abname`, `abdesc`, `riskid`, `status`) VALUES
(1, 1, 'ใช่', 'เสี่ยง', 1, 1),
(2, 0, 'ไม่', 'ไม่เสี่ยง', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `covidlist`
--

CREATE TABLE `covidlist` (
  `coid` int(200) NOT NULL,
  `datecome` date NOT NULL DEFAULT current_timestamp(),
  `prenameid` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `miaf` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `symid` int(50) NOT NULL,
  `tmpid` int(10) NOT NULL,
  `provinceid` int(10) NOT NULL,
  `placeid` int(10) NOT NULL,
  `placeetc` text DEFAULT NULL,
  `abroadid` int(10) NOT NULL,
  `patientcfid` int(10) NOT NULL,
  `patienttimeid` int(10) NOT NULL,
  `patientnearid` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `covid_risk`
--

CREATE TABLE `covid_risk` (
  `corid` int(10) NOT NULL,
  `riskid` int(10) NOT NULL,
  `riskname` varchar(50) NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `covid_risk`
--

INSERT INTO `covid_risk` (`corid`, `riskid`, `riskname`, `status`) VALUES
(1, 0, 'ไม่', 1),
(2, 1, 'ใช่', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imgform`
--

CREATE TABLE `imgform` (
  `id` int(10) NOT NULL,
  `imgname` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imgform`
--

INSERT INTO `imgform` (`id`, `imgname`, `status`) VALUES
(1, '262257638.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

CREATE TABLE `logintb` (
  `loginid` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`loginid`, `name`, `lname`, `username`, `password`, `role`, `status`) VALUES
(1, 'SuperUser', 'xxx', 'hospital46', '50f3f8c42b998a48057e9d33f4144b8b', 'admin', 1),
(2, 'Cap.America', 'Avengers', 'avenger01', '81dc9bdb52d04dc20036dbd8313ed055', 'userreq', 1),
(4, 'กิตติ', 'กล่ำฉวี', 'mtb46', '40da7f1205c322868678a74cba3a34a7', 'userreq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_confirm`
--

CREATE TABLE `patient_confirm` (
  `pcid` int(10) NOT NULL,
  `patientcfid` int(10) NOT NULL,
  `patientcf` varchar(45) NOT NULL,
  `pcfcheck` varchar(45) NOT NULL,
  `riskid` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_confirm`
--

INSERT INTO `patient_confirm` (`pcid`, `patientcfid`, `patientcf`, `pcfcheck`, `riskid`, `status`) VALUES
(1, 1, 'สัมผัสใกล้ชิดผู้ป่วยยืนยัน', 'ใช่', 1, 1),
(2, 0, 'ไม่สัมผัสใกล้ชิดผู้ป่วยยืนยัน', 'ไม่', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_near`
--

CREATE TABLE `patient_near` (
  `pnid` int(10) NOT NULL,
  `patientnearid` int(10) NOT NULL,
  `patientnear` varchar(50) NOT NULL,
  `ptncheck` varchar(45) NOT NULL,
  `riskid` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_near`
--

INSERT INTO `patient_near` (`pnid`, `patientnearid`, `patientnear`, `ptncheck`, `riskid`, `status`) VALUES
(1, 1, 'อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน', 'ใช่', 1, 1),
(2, 0, 'ไม่อยู่ใกล้ชิดกับผู้ที่สัมผัสผู้ป่วยยืนยัน', 'ไม่', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_timeline`
--

CREATE TABLE `patient_timeline` (
  `ptid` int(10) NOT NULL,
  `patienttimeid` int(10) NOT NULL,
  `patienttime` varchar(50) NOT NULL,
  `pticheck` varchar(45) NOT NULL,
  `riskid` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_timeline`
--

INSERT INTO `patient_timeline` (`ptid`, `patienttimeid`, `patienttime`, `pticheck`, `riskid`, `status`) VALUES
(1, 1, 'Timeline ตรงกับผู้ป่วยยืนยัน', 'ใช่', 1, 1),
(2, 0, 'Timeline ไม่ตรงกับผู้ป่วยยืนยัน', 'ไม่', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `plid` int(25) NOT NULL,
  `placeid` int(25) NOT NULL,
  `plgroup` int(10) NOT NULL,
  `place` varchar(255) NOT NULL,
  `placedesc` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`plid`, `placeid`, `plgroup`, `place`, `placedesc`, `status`) VALUES
(1, 1, 1, 'สถานบันเทิง', 'สถานที่เสี่ยง', 1),
(2, 2, 1, 'ร้านอาหาร', 'สถานที่เสี่ยง', 1),
(3, 3, 1, 'ห้างสรรพสินค้า, ร้านสะดวกซื้อ', 'สถานที่เสี่ยง', 1),
(4, 4, 1, 'ตลาด', 'สถานที่เสี่ยง', 1),
(5, 5, 1, 'สนามบิน', 'สถานที่เสี่ยง', 1),
(6, 6, 1, 'สถานีขนส่ง', 'สถานที่เสี่ยง', 1),
(7, 7, 1, 'สถานีรถไฟ', 'สถานที่เสี่ยง', 1),
(8, 8, 2, 'บ้าน, ที่พัก', 'สถานที่ปลอดภัย', 1),
(9, 9, 1, 'บ่อน(สนามมวย, ไก่ชน, วัวชน)', 'สถานที่เสี่ยง', 1),
(10, 10, 1, 'วัด, มัสยิด, โบสถ์', 'สถานที่เสี่ยง', 1),
(11, 11, 1, 'โรงแรม, รีสอร์ต, บังกะโล', 'สถานที่เสี่ยง', 1),
(12, 12, 3, 'อื่น ๆ ', 'เจ้าหน้าที่พิจารณา', 1);

-- --------------------------------------------------------

--
-- Table structure for table `placewarning`
--

CREATE TABLE `placewarning` (
  `plwarnid` int(10) NOT NULL,
  `plgroup` int(10) NOT NULL,
  `plname` varchar(100) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `placewarning`
--

INSERT INTO `placewarning` (`plwarnid`, `plgroup`, `plname`, `status`) VALUES
(1, 1, 'คุณเคยไปสถานที่เสี่ยงต่อโควิด-19', '1'),
(2, 2, 'คุณอยู่ในสถานที่ไม่เสี่ยงต่อโควิด-19', '1'),
(3, 3, 'อื่น ๆ (เจ้าหน้าที่พิจารณา)', '1');

-- --------------------------------------------------------

--
-- Table structure for table `prename`
--

CREATE TABLE `prename` (
  `preid` int(20) NOT NULL,
  `prenameid` int(20) NOT NULL,
  `prename` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prename`
--

INSERT INTO `prename` (`preid`, `prenameid`, `prename`, `status`) VALUES
(1, 1, 'นาย', 1),
(2, 2, 'นาง', 1),
(3, 3, 'นางสาว', 1),
(4, 4, 'ส.ต.', 1),
(5, 5, 'ส.ท.', 1),
(6, 6, 'ส.อ.', 1),
(7, 7, 'จ.ส.ต.', 1),
(8, 8, 'จ.ส.ท.', 1),
(9, 9, 'จ.ส.อ.', 1),
(10, 10, 'ร.ต.', 1),
(11, 11, 'ร.ท.', 1),
(12, 12, 'ร.อ.', 1),
(13, 13, 'พ.ต.', 1),
(14, 14, 'พ.ท.', 1),
(15, 15, 'พ.อ.', 1),
(16, 16, 'พล.ต.', 1),
(17, 17, 'พล.ท', 1),
(18, 18, 'พล.อ.', 1),
(19, 19, 'พลฯ', 1),
(20, 20, 'อส.ทพ.', 1),
(21, 21, 'พล.อส.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `proid` int(100) NOT NULL,
  `provinceid` int(50) NOT NULL,
  `prowarningid` int(10) NOT NULL,
  `province` varchar(255) NOT NULL,
  `provincedesc` varchar(255) NOT NULL,
  `status` bigint(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`proid`, `provinceid`, `prowarningid`, `province`, `provincedesc`, `status`) VALUES
(1, 1, 0, 'ไม่ได้เดินทาง', 'พื้นที่อื่น ๆ', 1),
(2, 2, 0, 'กระบี่', 'พื้นที่อื่น ๆ', 1),
(3, 3, 0, 'กรุงเทพมหานคร', 'พื้นที่อื่น ๆ', 1),
(4, 4, 1, 'กาญจนบุรี', 'พื้นที่เสี่ยงสูงสุด', 1),
(5, 5, 0, 'กาฬสินธุ์', 'พื้นที่อื่น ๆ', 1),
(6, 6, 0, 'กำแพงเพชร', 'พื้นที่อื่น ๆ', 1),
(7, 7, 1, 'ขอนแก่น', 'พื้นที่เสี่ยงสูงสุด', 1),
(8, 8, 1, 'จันทบุรี', 'พื้นที่เสี่ยงสูงสุด', 1),
(9, 9, 1, 'ฉะเชิงเทรา', 'พื้นที่เสี่ยงสูงสุด', 1),
(10, 10, 1, 'ชลบุรี', 'พื้นที่เสี่ยงสูงสุด', 1),
(11, 11, 0, 'ชัยนาท', 'พื้นที่อื่น ๆ', 1),
(12, 12, 0, 'ชัยภูมิ', 'พื้นที่อื่น ๆ', 1),
(13, 13, 1, 'ชุมพร', 'พื้นที่เสี่ยงสูงสุด', 1),
(14, 14, 1, 'ตรัง', 'พื้นที่เสี่ยงสูงสุด', 1),
(15, 15, 1, 'ตราด', 'พื้นที่เสี่ยงสูงสุด', 1),
(16, 16, 1, 'ตาก', 'พื้นที่เสี่ยงสูงสุด', 1),
(17, 17, 1, 'นครนายก', 'พื้นที่เสี่ยงสูงสุด', 1),
(18, 18, 1, 'นครปฐม', 'พื้นที่เสี่ยงสูงสุด', 1),
(19, 19, 0, 'นครพนม', 'พื้นที่อื่น ๆ', 1),
(20, 20, 1, 'นครราชสีมา', 'พื้นที่เสี่ยงสูงสุด', 1),
(21, 21, 1, 'นครศรีธรรมราช', 'พื้นที่เสี่ยงสูงสุด', 1),
(22, 22, 1, 'นครสวรรค์', 'พื้นที่เสี่ยงสูงสุด', 1),
(23, 23, 1, 'นนทบุรี', 'พื้นที่เสี่ยงสูงสุด', 1),
(24, 24, 1, 'นราธิวาส', 'พื้นที่เสี่ยงสูงสุด', 1),
(25, 25, 0, 'น่าน', 'พื้นที่อื่น ๆ', 1),
(26, 26, 0, 'บึงกาฬ', 'พื้นที่อื่น ๆ', 1),
(27, 27, 0, 'บุรีรัมย์', 'พื้นที่อื่น ๆ', 1),
(28, 28, 1, 'ปทุมธานี', 'พื้นที่เสี่ยงสูงสุด', 1),
(29, 29, 1, 'ประจวบคีรีขันธ์', 'พื้นที่เสี่ยงสูงสุด', 1),
(30, 30, 1, 'ปราจีนบุรี', 'พื้นที่เสี่ยงสูงสุด', 1),
(31, 31, 1, 'ปัตตานี', 'พื้นที่เสี่ยงสูงสุด', 1),
(32, 32, 1, 'พระนครศรีอยุธยา', 'พื้นที่เสี่ยงสูงสุด', 1),
(33, 33, 0, 'พะเยา', 'พื้นที่อื่น ๆ', 1),
(34, 34, 0, 'พังงา', 'พื้นที่อื่น ๆ', 1),
(35, 35, 1, 'พัทลุง', 'พื้นที่เสี่ยงสูงสุด', 1),
(36, 36, 1, 'พิจิตร', 'พื้นที่เสี่ยงสูงสุด', 1),
(37, 37, 1, 'พิษณุโลก', 'พื้นที่เสี่ยงสูงสุด', 1),
(38, 38, 0, 'ภูเก็ต', 'พื้นที่อื่น ๆ', 1),
(39, 39, 0, 'มหาสารคาม', 'พื้นที่อื่น ๆ', 1),
(40, 40, 0, 'มุกดาหาร', 'พื้นที่อื่น ๆ', 1),
(41, 41, 1, 'ยะลา', 'พื้นที่เสี่ยงสูงสุด', 1),
(42, 42, 0, 'ยโสธร', 'พื้นที่อื่น ๆ', 1),
(43, 43, 0, 'ร้อยเอ็ด', 'พื้นที่อื่น ๆ', 1),
(44, 44, 1, 'ระนอง', 'พื้นที่เสี่ยงสูงสุด', 1),
(45, 45, 1, 'ระยอง', 'พื้นที่เสี่ยงสูงสุด', 1),
(46, 46, 1, 'ราชบุรี', 'พื้นที่เสี่ยงสูงสุด', 1),
(47, 47, 1, 'ลพบุรี', 'พื้นที่เสี่ยงสูงสุด', 1),
(48, 48, 0, 'ลำปาง', 'พื้นที่อื่น ๆ', 1),
(49, 49, 0, 'ลำพูน', 'พื้นที่อื่น ๆ', 1),
(50, 50, 0, 'ศรีสะเกษ', 'พื้นที่อื่น ๆ', 1),
(51, 51, 0, 'สกลนคร', 'พื้นที่อื่น ๆ', 1),
(52, 52, 1, 'สงขลา', 'พื้นที่เสี่ยงสูงสุด', 1),
(53, 53, 1, 'สตูล', 'พื้นที่เสี่ยงสูงสุด', 1),
(54, 54, 1, 'สมุทรปราการ', 'พื้นที่เสี่ยงสูงสุด', 1),
(55, 55, 1, 'สมุทรสงคราม', 'พื้นที่เสี่ยงสูงสุด', 1),
(56, 56, 1, 'สมุทรสาคร', 'พื้นที่เสี่ยงสูงสุด', 1),
(57, 57, 1, 'สระบุรี', 'พื้นที่เสี่ยงสูงสุด', 1),
(58, 58, 1, 'สระแก้ว', 'พื้นที่เสี่ยงสูงสุด', 1),
(59, 59, 0, 'สิงห์บุรี', 'พื้นที่อื่น ๆ', 1),
(60, 60, 1, 'สุพรรณบุรี', 'พื้นที่เสี่ยงสูงสุด', 1),
(61, 61, 1, 'สุราษฎร์ธานี', 'พื้นที่เสี่ยงสูงสุด', 1),
(62, 62, 0, 'สุรินทร์', 'พื้นที่อื่น ๆ', 1),
(63, 63, 0, 'สุโขทัย', 'พื้นที่อื่น ๆ', 1),
(64, 64, 0, 'หนองคาย', 'พื้นที่อื่น ๆ', 1),
(65, 65, 0, 'หนองบัวลำภู', 'พื้นที่อื่น ๆ', 1),
(66, 66, 1, 'อ่างทอง', 'พื้นที่เสี่ยงสูงสุด', 1),
(67, 67, 0, 'อำนาจเจริญ', 'พื้นที่อื่น ๆ', 1),
(68, 68, 1, 'อุดรธานี', 'พื้นที่เสี่ยงสูงสุด', 1),
(69, 69, 0, 'อุตรดิตถ์', 'พื้นที่อื่น ๆ', 1),
(70, 70, 0, 'อุทัยธานี', 'พื้นที่อื่น ๆ', 1),
(71, 71, 1, 'อุบลราชธานี', 'พื้นที่เสี่ยงสูงสุด', 1),
(72, 72, 1, 'เชียงราย', 'พื้นที่เสี่ยงสูงสุด', 1),
(73, 73, 1, 'เชียงใหม่', 'พื้นที่เสี่ยงสูงสุด', 1),
(74, 74, 1, 'เพชรบุรี', 'พื้นที่เสี่ยงสูงสุด', 1),
(75, 75, 1, 'เพชรบูรณ์', 'พื้นที่เสี่ยงสูงสุด', 1),
(76, 76, 0, 'เลย', 'พื้นที่อื่น ๆ', 1),
(77, 77, 0, 'แพร่', 'พื้นที่อื่น ๆ', 1),
(78, 78, 0, 'แม่ฮ่องสอน', 'พื้นที่อื่น ๆ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prowarning`
--

CREATE TABLE `prowarning` (
  `prowarnid` int(10) NOT NULL,
  `prowarningid` int(10) NOT NULL,
  `prowaringdesc` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prowarning`
--

INSERT INTO `prowarning` (`prowarnid`, `prowarningid`, `prowaringdesc`, `status`) VALUES
(1, 1, 'พื้นที่เสี่ยง', 1),
(2, 0, 'พื้นที่อื่น ๆ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'userreq');

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--

CREATE TABLE `symptom` (
  `sympid` int(10) NOT NULL,
  `symid` int(10) NOT NULL,
  `symptom` varchar(100) NOT NULL,
  `sympdesc` varchar(50) NOT NULL,
  `sympgroup` int(10) NOT NULL,
  `status` tinyint(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `symptom`
--

INSERT INTO `symptom` (`sympid`, `symid`, `symptom`, `sympdesc`, `sympgroup`, `status`) VALUES
(1, 1, 'ไม่มีอาการ', 'ไม่เสี่ยง', 0, 1),
(2, 2, 'มีน้ำมูก', 'เสี่ยง', 1, 1),
(3, 3, 'เจ็บคอ', 'เสี่ยง', 1, 1),
(4, 4, 'จมูกไม่ได้กลิ่น', 'เสี่ยง', 1, 1),
(5, 5, 'ลิ้นไม่รับรส', 'เสี่ยง', 1, 1),
(6, 6, 'หายใจหอบเหนื่อย', 'เสี่ยง', 1, 1),
(7, 7, 'ไอ', 'เสี่ยง', 1, 1),
(8, 8, 'ปวดเมื่อยกล้ามเนื้อ', 'เสี่ยง', 1, 1),
(9, 9, 'มีเสมหะ', 'เสี่ยง', 1, 1),
(10, 10, 'ปวดศีรษะ', 'เสี่ยง', 1, 1),
(11, 11, 'ถ่ายเหลว', 'เสี่ยง', 1, 1),
(12, 12, 'ตาแดง', 'เสี่ยง', 1, 1),
(13, 13, 'มีผื่น', 'เสี่ยง', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `tempid` int(10) NOT NULL,
  `tmpid` int(10) NOT NULL,
  `tempc` varchar(100) NOT NULL,
  `tempdesc` varchar(100) NOT NULL,
  `tmpgroup` int(10) NOT NULL,
  `status` tinyint(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`tempid`, `tmpid`, `tempc`, `tempdesc`, `tmpgroup`, `status`) VALUES
(1, 1, '35.0-35.9', 'ปกติ', 0, 1),
(2, 2, '36.0-36.9', 'ปกติ', 0, 1),
(3, 3, '37.0-37.4', 'ปกติ', 0, 1),
(4, 4, '37.5-38.0', 'มีไข้เสี่ยงต่อโควิด-19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tempwarning`
--

CREATE TABLE `tempwarning` (
  `tempwarnid` int(10) NOT NULL,
  `tmpgroup` int(10) NOT NULL,
  `tmpname` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tempwarning`
--

INSERT INTO `tempwarning` (`tempwarnid`, `tmpgroup`, `tmpname`, `status`) VALUES
(1, 1, 'มีไข้', 1),
(2, 0, 'ปกติ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abroad`
--
ALTER TABLE `abroad`
  ADD PRIMARY KEY (`abid`);

--
-- Indexes for table `covidlist`
--
ALTER TABLE `covidlist`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `covid_risk`
--
ALTER TABLE `covid_risk`
  ADD PRIMARY KEY (`corid`);

--
-- Indexes for table `imgform`
--
ALTER TABLE `imgform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintb`
--
ALTER TABLE `logintb`
  ADD PRIMARY KEY (`loginid`);

--
-- Indexes for table `patient_confirm`
--
ALTER TABLE `patient_confirm`
  ADD PRIMARY KEY (`pcid`);

--
-- Indexes for table `patient_near`
--
ALTER TABLE `patient_near`
  ADD PRIMARY KEY (`pnid`);

--
-- Indexes for table `patient_timeline`
--
ALTER TABLE `patient_timeline`
  ADD PRIMARY KEY (`ptid`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`plid`);

--
-- Indexes for table `placewarning`
--
ALTER TABLE `placewarning`
  ADD PRIMARY KEY (`plwarnid`);

--
-- Indexes for table `prename`
--
ALTER TABLE `prename`
  ADD PRIMARY KEY (`preid`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`proid`);

--
-- Indexes for table `prowarning`
--
ALTER TABLE `prowarning`
  ADD PRIMARY KEY (`prowarnid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`sympid`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`tempid`);

--
-- Indexes for table `tempwarning`
--
ALTER TABLE `tempwarning`
  ADD PRIMARY KEY (`tempwarnid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abroad`
--
ALTER TABLE `abroad`
  MODIFY `abid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `covidlist`
--
ALTER TABLE `covidlist`
  MODIFY `coid` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `covid_risk`
--
ALTER TABLE `covid_risk`
  MODIFY `corid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `imgform`
--
ALTER TABLE `imgform`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logintb`
--
ALTER TABLE `logintb`
  MODIFY `loginid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_confirm`
--
ALTER TABLE `patient_confirm`
  MODIFY `pcid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_near`
--
ALTER TABLE `patient_near`
  MODIFY `pnid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_timeline`
--
ALTER TABLE `patient_timeline`
  MODIFY `ptid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `plid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `placewarning`
--
ALTER TABLE `placewarning`
  MODIFY `plwarnid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prename`
--
ALTER TABLE `prename`
  MODIFY `preid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `proid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `prowarning`
--
ALTER TABLE `prowarning`
  MODIFY `prowarnid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `symptom`
--
ALTER TABLE `symptom`
  MODIFY `sympid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `tempid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tempwarning`
--
ALTER TABLE `tempwarning`
  MODIFY `tempwarnid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
