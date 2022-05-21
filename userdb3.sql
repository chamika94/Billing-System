-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 03:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_task`
--

CREATE TABLE `admin_task` (
  `id` int(11) NOT NULL,
  `task` varchar(200) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_task`
--

INSERT INTO `admin_task` (`id`, `task`, `created_date`) VALUES
(1, 'task-1', '2029-03-22'),
(2, 'task-2', '2029-03-22'),
(3, 'task-3', '2029-03-22'),
(4, 'task-4', '2029-03-22'),
(5, 'task-5', '2029-03-22'),
(6, 'task-6', '2029-03-22'),
(7, 'task-7', '2029-03-22'),
(8, 'task-8', '2029-03-22'),
(9, 'task-9', '2029-03-22'),
(10, 'task-10', '2029-03-22'),
(11, 'task-11', '2029-03-22'),
(12, 'task-12', '2029-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `cid` int(200) NOT NULL,
  `vid` int(200) NOT NULL,
  `page2_1` varchar(100) NOT NULL,
  `page2_2` varchar(100) NOT NULL,
  `page2_3` varchar(100) NOT NULL,
  `page2_4` varchar(100) NOT NULL,
  `page2_5` varchar(100) NOT NULL,
  `page2_6` varchar(100) NOT NULL,
  `page2_7` varchar(100) NOT NULL,
  `page2_8` varchar(100) NOT NULL,
  `page2_9` varchar(100) NOT NULL,
  `page2_10` varchar(100) NOT NULL,
  `page2_11` varchar(100) NOT NULL,
  `page2_12` varchar(100) NOT NULL,
  `page2_13` varchar(100) NOT NULL,
  `page2_14` varchar(100) NOT NULL,
  `blf` varchar(100) NOT NULL,
  `blb` varchar(100) NOT NULL,
  `brf` varchar(100) NOT NULL,
  `brb` varchar(100) NOT NULL,
  `blfinfo` varchar(100) NOT NULL,
  `blbinfo` varchar(100) NOT NULL,
  `brfinfo` varchar(100) NOT NULL,
  `brbinfo` varchar(100) NOT NULL,
  `tlf` varchar(100) NOT NULL,
  `tlb` varchar(100) NOT NULL,
  `trf` varchar(100) NOT NULL,
  `trb` varchar(100) NOT NULL,
  `tlfinfo` varchar(100) NOT NULL,
  `tlbinfo` varchar(100) NOT NULL,
  `trfinfo` varchar(100) NOT NULL,
  `trbinfo` varchar(100) NOT NULL,
  `page4_1` varchar(40) NOT NULL,
  `page4_2` varchar(40) NOT NULL,
  `page4_3` varchar(40) NOT NULL,
  `page4_4` varchar(40) NOT NULL,
  `page4_5` varchar(40) NOT NULL,
  `page4_6` varchar(40) NOT NULL,
  `page4_7` varchar(40) NOT NULL,
  `page4_8` varchar(40) NOT NULL,
  `page4_9` varchar(40) NOT NULL,
  `page4_10` varchar(40) NOT NULL,
  `page4_11` varchar(40) NOT NULL,
  `page4_12` varchar(40) NOT NULL,
  `page4_13` varchar(40) NOT NULL,
  `page4_14` varchar(40) NOT NULL,
  `page4_15` varchar(40) NOT NULL,
  `page4_1info` varchar(200) NOT NULL,
  `page4_2info` varchar(200) NOT NULL,
  `page4_3info` varchar(200) NOT NULL,
  `page4_4info` varchar(200) NOT NULL,
  `page4_5info` varchar(200) NOT NULL,
  `page4_6info` varchar(200) NOT NULL,
  `page4_7info` varchar(200) NOT NULL,
  `page4_8info` varchar(200) NOT NULL,
  `page4_9info` varchar(200) NOT NULL,
  `page4_10info` varchar(200) NOT NULL,
  `page4_11info` varchar(200) NOT NULL,
  `page4_12info` varchar(200) NOT NULL,
  `page4_13info` varchar(200) NOT NULL,
  `page4_14info` varchar(200) NOT NULL,
  `page4_15info` varchar(200) NOT NULL,
  `page4_13header` varchar(200) NOT NULL,
  `page4_14header` varchar(200) NOT NULL,
  `page4_15header` varchar(200) NOT NULL,
  `year` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `token` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `cid`, `vid`, `page2_1`, `page2_2`, `page2_3`, `page2_4`, `page2_5`, `page2_6`, `page2_7`, `page2_8`, `page2_9`, `page2_10`, `page2_11`, `page2_12`, `page2_13`, `page2_14`, `blf`, `blb`, `brf`, `brb`, `blfinfo`, `blbinfo`, `brfinfo`, `brbinfo`, `tlf`, `tlb`, `trf`, `trb`, `tlfinfo`, `tlbinfo`, `trfinfo`, `trbinfo`, `page4_1`, `page4_2`, `page4_3`, `page4_4`, `page4_5`, `page4_6`, `page4_7`, `page4_8`, `page4_9`, `page4_10`, `page4_11`, `page4_12`, `page4_13`, `page4_14`, `page4_15`, `page4_1info`, `page4_2info`, `page4_3info`, `page4_4info`, `page4_5info`, `page4_6info`, `page4_7info`, `page4_8info`, `page4_9info`, `page4_10info`, `page4_11info`, `page4_12info`, `page4_13info`, `page4_14info`, `page4_15info`, `page4_13header`, `page4_14header`, `page4_15header`, `year`, `month`, `day`, `created_date`, `token`) VALUES
(114, 80, 26, 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT OKAY', 'NOT OKAY', 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT OKAY', 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT OKAY', 'NOT OKAY', 'NOT APPLICABLE', 'NOT APPLICABLE', 'Yellow', 'Green', 'Green', 'Yellow', '2', '3', '4', '8', 'Yellow', 'Red', 'Yellow', 'Red', '12', '3', '9', '10', 'NOT OKAY', 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT APPLICABLE', 'OKAY', 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT APPLICABLE', 'NOT OKAY', 'NOT APPLICABLE', 'NOT APPLICABLE', 'chamika', 'chamika', 'chamika', 'chamika', 'chamika', 'chamika', 'chamika', 'chamika', 'chamika', 'chamika', 'chamika', 'chamika', 'good', '', '', 'topic1', '', '', '2022', '04', '21', '2022-04-21', 772793);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_page1`
--

CREATE TABLE `checklist_page1` (
  `id` int(11) NOT NULL,
  `cid` int(100) NOT NULL,
  `vid` int(100) NOT NULL,
  `ctime` varchar(200) NOT NULL,
  `cdate` date NOT NULL,
  `cmeter` varchar(100) NOT NULL,
  `vtime` varchar(200) NOT NULL,
  `vdate` date NOT NULL,
  `vmeter` varchar(100) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `img2` varchar(200) NOT NULL,
  `img3` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `token` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklist_page1`
--

INSERT INTO `checklist_page1` (`id`, `cid`, `vid`, `ctime`, `cdate`, `cmeter`, `vtime`, `vdate`, `vmeter`, `img1`, `img2`, `img3`, `created_date`, `token`) VALUES
(25, 80, 26, '01:01 PM', '2022-04-26', '322', '01:01 AM', '2022-04-27', '233', 'image/9.jpg', 'image/8.jpg', 'image/3.jpg', '2022-04-21', 772793);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_task`
--

CREATE TABLE `checklist_task` (
  `id` int(11) NOT NULL,
  `task` varchar(500) NOT NULL,
  `cid` int(100) NOT NULL,
  `vid` int(100) NOT NULL,
  `created_date` date NOT NULL,
  `token` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklist_task`
--

INSERT INTO `checklist_task` (`id`, `task`, `cid`, `vid`, `created_date`, `token`) VALUES
(111, 'task-1', 80, 26, '2022-04-21', 772793),
(112, 'task-3', 80, 26, '2022-04-21', 772793),
(113, 'task-2', 80, 26, '2022-04-21', 772793),
(114, 'task-3', 80, 26, '2022-04-21', 772793),
(115, 'task-5', 80, 26, '2022-04-21', 772793),
(116, 'task-6', 80, 26, '2022-04-21', 772793),
(117, 'task-3', 80, 26, '2022-04-21', 772793),
(118, 'task-5', 80, 26, '2022-04-21', 772793),
(119, 'task-6', 80, 26, '2022-04-21', 772793),
(120, 'task-7', 80, 26, '2022-04-21', 772793);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ccid` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(10) NOT NULL,
  `home` int(10) NOT NULL,
  `office` int(10) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ccid`, `name`, `address`, `email`, `mobile`, `home`, `office`, `created_date`) VALUES
(72, 'name1', 'Residental Address1', 'name1@gmail.com', 755463277, 255852588, 258963699, '2001-04-22'),
(73, 'name2', 'Residental Address', 'name2@gmail.com', 755463277, 255852588, 258963699, '2001-04-22'),
(74, 'name3', 'Residental Address3', 'name3@gmail.com', 755463277, 255852588, 258963699, '2001-04-22'),
(75, 'name4', 'Residental Address4', 'name4@gmail.com', 755463277, 255852588, 258963699, '2001-04-22'),
(76, 'name5', 'Residental Address5', 'name5@gmail.com', 755463277, 255852588, 258963699, '2001-04-22'),
(77, 'name6', 'Residental Address6', 'name6@gmail.com', 755463277, 255852588, 258963699, '2001-04-22'),
(79, 'CHAMIKA', 'No 1/60 Magazine Road, Tissawewa', 'chamikasandaruwan1994@gmail.com', 2147483647, 255852588, 258963699, '2022-04-19'),
(80, 'kevin', 'No 1/60 Magazine Road, Tissawewa', 'kevin@gmail.com', 755463277, 255852588, 258963699, '2022-04-20'),
(81, 'chanuka', 'kevin', 'chanuka@gmail.com', 755463277, 255852588, 258963699, '2022-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id`, `description`, `added_date`) VALUES
(8, 'description1', '2016-09-26'),
(9, 'description2', '2016-09-26'),
(10, 'description3', '2016-09-26'),
(12, 'description4', '2001-04-22'),
(13, 'description5', '2001-04-22'),
(14, 'description6', '2001-04-22'),
(15, 'description7', '2001-04-22'),
(16, 'description8', '2001-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `intime` varchar(50) NOT NULL,
  `indate` date NOT NULL,
  `inmeter` varchar(200) NOT NULL,
  `outtime` varchar(50) NOT NULL,
  `outdate` date NOT NULL,
  `outmeter` varchar(200) NOT NULL,
  `deposite` int(100) NOT NULL,
  `note` varchar(800) NOT NULL,
  `cid` int(100) NOT NULL,
  `vid` int(100) NOT NULL,
  `type_of` varchar(50) NOT NULL,
  `day` int(100) NOT NULL,
  `month` int(100) NOT NULL,
  `year` int(100) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `status_of` int(20) NOT NULL,
  `total` int(100) NOT NULL,
  `token` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `intime`, `indate`, `inmeter`, `outtime`, `outdate`, `outmeter`, `deposite`, `note`, `cid`, `vid`, `type_of`, `day`, `month`, `year`, `created_date`, `status_of`, `total`, `token`) VALUES
(221, '14:34:00', '2022-04-06', 'chamika', '14:36:00', '2022-04-11', 'chamika', 0, '', 79, 20, 'Tax Invoice', 19, 4, 2022, '2022-04-19', 0, 0, 195547),
(222, '16:08:00', '2022-04-13', 'test1', '15:10:00', '2022-04-10', 'test2', 100, 'test1', 79, 21, 'Quotation', 19, 4, 2022, '2022-04-19', 1, 7000, 390703),
(223, '10:49', '0000-00-00', '', '02:46:00', '0000-00-00', '', 0, '', 79, 21, 'Tax Invoice', 20, 4, 2022, '2022-04-20', 0, 0, 494541),
(224, '01:00 AM', '0000-00-00', '', '02:01 PM', '0000-00-00', '', 0, '', 79, 20, 'Tax Invoice', 20, 4, 2022, '2022-04-20', 0, 0, 414396),
(225, '02:01 AM', '2022-04-07', '12', '01:01 AM', '2022-04-04', '456', 0, '', 81, 20, 'Tax Invoice', 20, 4, 2022, '2022-04-20', 0, 2880, 364029),
(226, '02:01 PM', '0000-00-00', '', '', '0000-00-00', '', 0, '', 80, 27, 'Tax Invoice', 20, 4, 2022, '2022-04-20', 0, 3150, 816980),
(227, '', '0000-00-00', '', '', '0000-00-00', '', 0, '', 81, 21, 'Tax Invoice', 20, 4, 2022, '2022-04-20', 0, 0, 292720),
(228, '', '0000-00-00', '', '', '0000-00-00', '', 0, '', 81, 20, 'Tax Invoice', 20, 4, 2022, '2022-04-20', 0, 0, 967592),
(229, '', '0000-00-00', '', '', '0000-00-00', '', 0, '', 81, 27, 'Tax Invoice', 20, 4, 2022, '2022-04-20', 0, 5, 173222),
(230, '', '0000-00-00', '', '', '0000-00-00', '', 0, '', 80, 20, 'Tax Invoice', 20, 4, 2022, '2022-04-20', 0, 0, 166646),
(231, '', '0000-00-00', '', '', '0000-00-00', '', 0, '', 80, 26, 'Tax Invoice', 20, 4, 2022, '2022-04-20', 0, 3, 21356),
(232, '', '0000-00-00', '', '', '0000-00-00', '', 0, '', 80, 27, 'Tax Invoice', 20, 4, 2022, '2022-04-20', 0, 2, 415679),
(233, '02:00 PM', '2022-04-14', '120', '02:00 PM', '2022-03-29', '890', 1200, 'agreed between the parties Electronic items and special ordered spare parts are not returnable in any situation. Return accepted only for unused mechanical spare parts with original packing within 7 days from invoiced. This is my in writing approval to operate and carryout agreed repairs ,services ,diagnostic and inspection drive in anywhere. I would also confirm that I am fully understood above terms & conditions', 80, 26, 'Tax Invoice', 22, 4, 2022, '2022-04-22', 1, 42950, 764753),
(234, '', '0000-00-00', '', '', '0000-00-00', '', 0, '', 79, 27, 'Tax Invoice', 25, 4, 2022, '2022-04-25', 0, 662, 163285);

-- --------------------------------------------------------

--
-- Table structure for table `partno`
--

CREATE TABLE `partno` (
  `id` int(11) NOT NULL,
  `partNo` varchar(200) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partno`
--

INSERT INTO `partno` (`id`, `partNo`, `added_date`) VALUES
(32, 'part no1', '2024-03-22'),
(33, 'part no2', '2024-03-22'),
(34, 'part no3', '2024-03-22'),
(35, 'part no4', '2024-03-22'),
(36, 'part no5', '2024-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `summary_report`
--

CREATE TABLE `summary_report` (
  `id` int(11) NOT NULL,
  `ctime` time NOT NULL,
  `cdate` date NOT NULL,
  `cmeter` varchar(200) NOT NULL,
  `vtime` time NOT NULL,
  `vdate` date NOT NULL,
  `vmeter` varchar(200) NOT NULL,
  `cid` int(100) NOT NULL,
  `vid` int(100) NOT NULL,
  `day` int(100) NOT NULL,
  `month` int(100) NOT NULL,
  `year` int(100) NOT NULL,
  `created_date` date NOT NULL,
  `token` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summary_report`
--

INSERT INTO `summary_report` (`id`, `ctime`, `cdate`, `cmeter`, `vtime`, `vdate`, `vmeter`, `cid`, `vid`, `day`, `month`, `year`, `created_date`, `token`) VALUES
(15, '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', '', 72, 25, 5, 4, 2022, '2022-04-05', 102318),
(16, '00:00:00', '0000-00-00', '', '00:00:00', '0000-00-00', '', 72, 24, 5, 4, 2022, '2022-04-05', 589776);

-- --------------------------------------------------------

--
-- Table structure for table `summary_task`
--

CREATE TABLE `summary_task` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `comment` varchar(400) NOT NULL,
  `images` varchar(200) NOT NULL,
  `cid` int(100) NOT NULL,
  `vid` int(100) NOT NULL,
  `created_date` date NOT NULL,
  `token` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summary_task`
--

INSERT INTO `summary_task` (`id`, `title`, `info`, `comment`, `images`, `cid`, `vid`, `created_date`, `token`) VALUES
(154, 'task-2', '', '', 'image/land_rover_range_rover_evoque_serebristyj_spusk_1081800_wallpaper-picture-big_1920x1080.jpg', 72, 25, '2022-04-05', 102318);

-- --------------------------------------------------------

--
-- Table structure for table `summary_task_page1`
--

CREATE TABLE `summary_task_page1` (
  `id` int(11) NOT NULL,
  `task` varchar(400) NOT NULL,
  `cid` int(100) NOT NULL,
  `vid` int(100) NOT NULL,
  `created_date` date NOT NULL,
  `token` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summary_task_page1`
--

INSERT INTO `summary_task_page1` (`id`, `task`, `cid`, `vid`, `created_date`, `token`) VALUES
(62, 'task-2', 72, 24, '2022-04-05', 589776),
(63, 'task-2', 72, 24, '2022-04-05', 589776),
(64, 'task-3', 72, 24, '2022-04-05', 589776),
(65, 'task-3', 72, 24, '2022-04-05', 589776);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `useritem`
--

CREATE TABLE `useritem` (
  `id` int(11) NOT NULL,
  `info` varchar(400) NOT NULL,
  `partNo` varchar(400) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` varchar(200) NOT NULL,
  `cid` int(100) NOT NULL,
  `vid` int(100) NOT NULL,
  `type_of` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `status_of` int(20) NOT NULL,
  `token` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useritem`
--

INSERT INTO `useritem` (`id`, `info`, `partNo`, `quantity`, `price`, `cid`, `vid`, `type_of`, `created_date`, `status_of`, `token`) VALUES
(273, 'description1', 'part no1', '1', '1000', 72, 20, 'Used car Sales Receipt', '2022-04-05', 1, 560480),
(274, 'description1', 'part no1', '1', '1000', 72, 20, 'Used car Sales Receipt', '2022-04-05', 1, 560480),
(275, 'description1', 'part no1', '1', '1000', 72, 20, 'Used car Sales Receipt', '2022-04-05', 1, 560480),
(276, 'description1', 'part no1', '1', '1000', 72, 20, 'Used car Sales Receipt', '2022-04-05', 1, 560480),
(277, 'description1', 'part no1', '1', '1000', 72, 20, 'Used car Sales Receipt', '2022-04-05', 1, 560480),
(278, 'description1', 'part no1', '1', '1000', 72, 20, 'Used car Sales Receipt', '2022-04-05', 1, 560480),
(279, 'description1', 'part no1', '1', '1000', 72, 20, 'Used car Sales Receipt', '2022-04-05', 1, 560480),
(280, 'description1', 'part no1', '1', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 0, 23198),
(281, 'description1', 'part no1', '1', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 0, 23198),
(282, 'description1', 'part no1', '1', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 0, 23198),
(283, 'description1', 'part no1', '1', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 0, 23198),
(284, 'description1', 'part no1', '1', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 0, 23198),
(285, 'description1', 'part no1', '2', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 1, 600818),
(286, 'description1', 'part no1', '2', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 1, 600818),
(287, 'description1', 'part no1', '2', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 1, 600818),
(288, 'description1', 'part no1', '2', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 1, 600818),
(289, 'description1', 'part no1', '2', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 1, 600818),
(290, 'description1', 'part no1', '2', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 1, 600818),
(291, 'description1', 'part no1', '2', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 1, 600818),
(292, 'description1', 'part no1', '2', '1000', 72, 20, 'Tax Invoice', '2022-04-05', 1, 600818),
(293, 'description1', 'part no1', '0', '0', 72, 21, 'Tax Invoice', '2022-04-05', 0, 3718),
(294, 'description1', 'part no1', '0', '0', 72, 21, 'Tax Invoice', '2022-04-05', 0, 3718),
(295, 'description1', 'part no1', '0', '0', 72, 21, 'Tax Invoice', '2022-04-05', 0, 3718),
(296, 'description1', 'part no1', '0', '0', 72, 21, 'Tax Invoice', '2022-04-05', 0, 3718),
(297, 'description1', 'part no1', '0', '0', 72, 21, 'Tax Invoice', '2022-04-05', 0, 3718),
(298, 'description1', 'part no1', '0', '0', 72, 21, 'Tax Invoice', '2022-04-05', 0, 3718),
(299, 'description1', 'part no1', '0', '0', 72, 21, 'Tax Invoice', '2022-04-05', 0, 3718),
(300, 'description1', 'part no1', '0', '0', 72, 21, 'Tax Invoice', '2022-04-05', 0, 3718),
(301, 'description2', 'part no1', '2', '22', 72, 21, 'Tax Invoice', '2022-04-05', 0, 3718),
(302, 'description2', 'part no2', '3', '4500', 72, 22, 'Tax Invoice', '2022-04-05', 0, 67995),
(303, 'description2', 'part no3', '2', '2500', 79, 21, 'Quotation', '2022-04-19', 1, 390703),
(304, 'test1', 'test1', '1', '4500', 79, 21, 'Quotation', '2022-04-19', 1, 390703),
(305, 'description2', 'part no2', '45', '100', 81, 20, 'Tax Invoice', '2022-04-20', 0, 364029),
(306, 'description4', 'part no1', '2', '2000', 81, 20, 'Tax Invoice', '2022-04-20', 0, 364029),
(307, 'description2', 'part no2', '2', '780', 81, 20, 'Tax Invoice', '2022-04-20', 0, 364029),
(308, 'description1', 'part no2', '4', '1200', 80, 27, 'Tax Invoice', '2022-04-20', 0, 816980),
(309, 'description5', 'part no1', '5', '1500', 80, 27, 'Tax Invoice', '2022-04-20', 0, 816980),
(310, 'description2', 'part no4', '1', '450', 80, 27, 'Tax Invoice', '2022-04-20', 0, 816980),
(311, 'description2', 'part no2', '1', '1', 81, 27, 'Tax Invoice', '2022-04-20', 0, 173222),
(312, 'description1', 'part no3', '1', '4', 81, 27, 'Tax Invoice', '2022-04-20', 0, 173222),
(313, '', '', '0', '1', 80, 26, 'Tax Invoice', '2022-04-20', 0, 21356),
(314, '', '', '0', '2', 80, 26, 'Tax Invoice', '2022-04-20', 0, 21356),
(315, '', '', '0', '1', 80, 27, 'Tax Invoice', '2022-04-20', 0, 415679),
(316, '', '', '0', '1', 80, 27, 'Tax Invoice', '2022-04-20', 0, 415679),
(317, 'description1', 'part no1', '1', '2000', 80, 26, 'Tax Invoice', '2022-04-22', 1, 764753),
(318, 'description2', 'part no2', '2', '3000', 80, 26, 'Tax Invoice', '2022-04-22', 1, 764753),
(319, 'description4', 'part no3', '1', '5000', 80, 26, 'Tax Invoice', '2022-04-22', 1, 764753),
(320, 'description6', 'part no4', '4', '5000', 80, 26, 'Tax Invoice', '2022-04-22', 1, 764753),
(321, 'description4', 'part no5', '4', '450', 80, 26, 'Tax Invoice', '2022-04-22', 1, 764753),
(322, 'description2', 'part no3', '5', '7500', 80, 26, 'Tax Invoice', '2022-04-22', 1, 764753),
(323, 'description5', '', '5', '7500', 80, 26, 'Tax Invoice', '2022-04-22', 1, 764753),
(324, '', 'part no2', '1', '500', 80, 26, 'Tax Invoice', '2022-04-22', 1, 764753),
(325, 'description6', 'part no4', '4', '7500', 80, 26, 'Tax Invoice', '2022-04-22', 1, 764753),
(326, 'description3', 'part no5', '4', '4500', 80, 26, 'Tax Invoice', '2022-04-22', 1, 764753),
(327, '', '', '', '10', 79, 27, 'Tax Invoice', '2022-04-25', 0, 163285),
(328, '', '', '', '200', 79, 27, 'Tax Invoice', '2022-04-25', 0, 163285),
(329, 'description2', 'part no2', '780', '452', 79, 27, 'Tax Invoice', '2022-04-25', 0, 163285);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vvid` int(11) NOT NULL,
  `vin` varchar(40) NOT NULL,
  `rego` varchar(40) NOT NULL,
  `make` varchar(40) NOT NULL,
  `model` varchar(40) NOT NULL,
  `eng` varchar(40) NOT NULL,
  `gear` varchar(40) NOT NULL,
  `paint` varchar(40) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vvid`, `vin`, `rego`, `make`, `model`, `eng`, `gear`, `paint`, `created_date`) VALUES
(20, 'vin1', 'rego1', 'make1', 'modal1', 'engine1', 'gear1', 'paint1', '2001-04-22'),
(21, 'vin2', 'rego2', 'make2', 'modal2', 'engine2', 'gear2', 'paint2', '2001-04-22'),
(22, 'vin3', 'rego3', 'make3', 'modal3', 'engine3', 'gear3', 'paint3', '2001-04-22'),
(23, 'vin4', 'rego4', 'make4', 'modal4', 'engine4', 'gear4', 'paint4', '2001-04-22'),
(24, 'vin5', 'rego5', 'make5', 'modal5', 'engine5', 'gear5', 'paint5', '2001-04-22'),
(25, 'vin6', 'rego6', 'make6', 'modal6', 'engine6', 'gear6', 'paint6', '2001-04-22'),
(26, 'kevin', 'kevin', 'make', 'modal', 'engine', 'gear', 'paint', '2022-04-20'),
(27, 'vin34', 'sago', 'make', 'modal', 'engine', 'gear', 'paint', '2022-04-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_task`
--
ALTER TABLE `admin_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist_page1`
--
ALTER TABLE `checklist_page1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist_task`
--
ALTER TABLE `checklist_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ccid`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partno`
--
ALTER TABLE `partno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summary_report`
--
ALTER TABLE `summary_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summary_task`
--
ALTER TABLE `summary_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summary_task_page1`
--
ALTER TABLE `summary_task_page1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useritem`
--
ALTER TABLE `useritem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vvid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_task`
--
ALTER TABLE `admin_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `checklist_page1`
--
ALTER TABLE `checklist_page1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `checklist_task`
--
ALTER TABLE `checklist_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `partno`
--
ALTER TABLE `partno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `summary_report`
--
ALTER TABLE `summary_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `summary_task`
--
ALTER TABLE `summary_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `summary_task_page1`
--
ALTER TABLE `summary_task_page1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `useritem`
--
ALTER TABLE `useritem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
