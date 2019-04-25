-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2017 at 06:35 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashbond`
--

-- --------------------------------------------------------

--
-- Table structure for table `dist_state`
--

CREATE TABLE `dist_state` (
  `city` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `production_production_dtl`
--

CREATE TABLE `production_production_dtl` (
  `invoice_dtl_id` int(11) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `invoice_id` varchar(200) NOT NULL,
  `finish_goods` varchar(200) NOT NULL,
  `process` varchar(200) NOT NULL,
  `qnty` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_production_dtl`
--

INSERT INTO `production_production_dtl` (`invoice_dtl_id`, `product_id`, `invoice_id`, `finish_goods`, `process`, `qnty`, `unit`, `maker_id`, `author_id`, `maker_date`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(2, '5', '2', '3', '', '5', 'pc', '21', '21', '2017-02-07', '2017-02-07', 'A', '1', '1', '1', '1'),
(5, '5', '1', '1', '', '4', 'pc', '21', '21', '2017-02-07', '2017-02-07', 'A', '1', '1', '1', '1'),
(6, '2', '1', '1', '', '2', 'pc', '21', '21', '2017-02-07', '2017-02-07', 'A', '1', '1', '1', '1'),
(7, '5', '1', '1', '', '1', 'pc', '21', '21', '2017-02-07', '2017-02-07', 'A', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `production_production_hdr`
--

CREATE TABLE `production_production_hdr` (
  `invoiceid` int(11) NOT NULL,
  `finish_goods` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_production_hdr`
--

INSERT INTO `production_production_hdr` (`invoiceid`, `finish_goods`, `qty`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '1', '', '21', '2017-02-07', '21', '2017-02-07', 'A', '1', '1', '1', '1'),
(2, '3', '', '21', '2017-02-07', '21', '2017-02-07', 'A', '1', '1', '1', '1'),
(3, '8', '', '21', '2017-02-14', '21', '2017-02-14', 'A', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `account_id` int(200) NOT NULL,
  `bill_by_bill_details` varchar(200) DEFAULT NULL,
  `broker_wise_reporting` varchar(200) NOT NULL,
  `credit_limits` varchar(200) NOT NULL,
  `budgets` varchar(200) NOT NULL,
  `targets` varchar(200) NOT NULL,
  `multi_currency` varchar(200) NOT NULL,
  `bank_reconciliation` varchar(200) NOT NULL,
  `currency_con_decimal_places` varchar(200) NOT NULL,
  `post_dated_cheques_payment` varchar(200) NOT NULL,
  `maintain_sub_ledgers` varchar(200) NOT NULL,
  `posting_acc_through` varchar(200) NOT NULL,
  `double_entry_system_for_payment` varchar(200) NOT NULL,
  `show_acc_current_balance` varchar(200) NOT NULL,
  `maintain_images` varchar(200) NOT NULL,
  `balance_stock_updat` varchar(200) NOT NULL,
  `ledger_reconciliation` varchar(200) NOT NULL,
  `cheque_printing` varchar(200) NOT NULL,
  `enab_group_reference` varchar(200) NOT NULL,
  `tag_bill_refe_group_with` varchar(200) NOT NULL,
  `enforce_amount_alloct_references` varchar(200) NOT NULL,
  `show_pen_till_vouch_date_only` varchar(200) NOT NULL,
  `enable_bill_ref_narration` varchar(200) NOT NULL,
  `enable_by_bill_for_all_acco` varchar(200) NOT NULL,
  `auto_party_Ref_sale_voucher` varchar(200) NOT NULL,
  `auto_party_ref_purch_voucher` varchar(200) NOT NULL,
  `brok_to_applied_at` varchar(200) NOT NULL,
  `broker` varchar(200) NOT NULL,
  `brokerage` varchar(200) NOT NULL,
  `enable_in` varchar(200) NOT NULL,
  `specify_default_brok` varchar(200) NOT NULL,
  `default_brok_to_pick_fro` varchar(200) NOT NULL,
  `brok_mode_rate` varchar(200) NOT NULL,
  `brokerage_rate` varchar(200) NOT NULL,
  `sep_brok_in_each_voucher` varchar(200) NOT NULL,
  `post_brok_in_account` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` datetime DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`account_id`, `bill_by_bill_details`, `broker_wise_reporting`, `credit_limits`, `budgets`, `targets`, `multi_currency`, `bank_reconciliation`, `currency_con_decimal_places`, `post_dated_cheques_payment`, `maintain_sub_ledgers`, `posting_acc_through`, `double_entry_system_for_payment`, `show_acc_current_balance`, `maintain_images`, `balance_stock_updat`, `ledger_reconciliation`, `cheque_printing`, `enab_group_reference`, `tag_bill_refe_group_with`, `enforce_amount_alloct_references`, `show_pen_till_vouch_date_only`, `enable_bill_ref_narration`, `enable_by_bill_for_all_acco`, `auto_party_Ref_sale_voucher`, `auto_party_ref_purch_voucher`, `brok_to_applied_at`, `broker`, `brokerage`, `enable_in`, `specify_default_brok`, `default_brok_to_pick_fro`, `brok_mode_rate`, `brokerage_rate`, `sep_brok_in_each_voucher`, `post_brok_in_account`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '1', '1', '1', '0', '1', '1', '1', '6', '1', '1', '1', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '21', '2016-05-20 00:00:00', '21', '2016-05-20 00:00:00', 'A', '1', '1', '1', '1'),
(2, '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_mst`
--

CREATE TABLE `tbl_account_mst` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(200) DEFAULT NULL,
  `main_account_id` int(11) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `printname` varchar(255) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account_mst`
--

INSERT INTO `tbl_account_mst` (`account_id`, `account_name`, `main_account_id`, `alias`, `printname`, `Description`, `status`, `maker_id`, `author_id`, `maker_date`, `author_date`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, NULL, NULL, '', '', NULL, 'I', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Vendor', 1, 'Vendor', 'Vendor', NULL, 'A', '21', '21', '2016-04-08', '2016-04-08', '1', '1', '1', '1'),
(4, 'Customer', 3, 'Customer', 'Customer', NULL, 'A', '21', '21', '2016-04-08', '2016-04-08', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_m`
--

CREATE TABLE `tbl_address_m` (
  `addressid` int(11) NOT NULL,
  `entitytypeid` varchar(200) DEFAULT NULL,
  `entityid` int(11) NOT NULL,
  `addresstype` varchar(200) DEFAULT NULL,
  `address1` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `address3` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `Street` varchar(200) DEFAULT NULL,
  `City` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `zip` varchar(200) DEFAULT NULL,
  `pobox` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `tbl_address_m`
--
DELIMITER $$
CREATE TRIGGER `testref` AFTER INSERT ON `tbl_address_m` FOR EACH ROW BEGIN
    UPDATE cybercodex_contact_m SET addres_id = NEW.addressid WHERE contact_id = NEW.entityid;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approve_status`
--

CREATE TABLE `tbl_approve_status` (
  `new_case_id` int(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `action_status` varchar(200) DEFAULT NULL,
  `mail_sent_status` varchar(200) NOT NULL DEFAULT 'Not Sent',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_approve_status`
--

INSERT INTO `tbl_approve_status` (`new_case_id`, `type`, `order_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `action_status`, `mail_sent_status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, 'Communication', '1', NULL, NULL, NULL, NULL, 'A', NULL, 'Sent', NULL, NULL, NULL, NULL),
(2, 'Purchase Order', '1', NULL, NULL, NULL, NULL, 'A', NULL, 'Sent', NULL, NULL, NULL, NULL),
(3, 'Sales Order', '1', NULL, NULL, NULL, NULL, 'A', NULL, 'Sent', NULL, NULL, NULL, NULL),
(4, 'Quotation', '2', NULL, NULL, NULL, NULL, 'A', NULL, 'Sent', NULL, NULL, NULL, NULL),
(5, 'Communication', '11', NULL, NULL, NULL, NULL, 'A', NULL, 'Not Sent', NULL, NULL, NULL, NULL),
(6, 'Letter Head', '3', NULL, NULL, NULL, NULL, 'A', NULL, 'Not Sent', NULL, NULL, NULL, NULL),
(7, 'Quotation', '4', NULL, NULL, NULL, NULL, 'A', NULL, 'Not Sent', NULL, NULL, NULL, NULL),
(8, 'Sales Order', '3', NULL, NULL, NULL, NULL, 'A', NULL, 'Not Sent', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch_mst`
--

CREATE TABLE `tbl_branch_mst` (
  `brnh_id` int(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `brnh_name` varchar(200) NOT NULL,
  `comp_id` varchar(200) NOT NULL,
  `zone_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `divn_id` varchar(200) DEFAULT NULL,
  `compa_id` varchar(200) DEFAULT NULL,
  `zonea_id` varchar(200) DEFAULT NULL,
  `brnha_id` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch_mst`
--

INSERT INTO `tbl_branch_mst` (`brnh_id`, `code`, `brnh_name`, `comp_id`, `zone_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `divn_id`, `compa_id`, `zonea_id`, `brnha_id`, `type`) VALUES
(1, '678', 'Branch1', '1', '1', '1', '2017-03-18', '1', '2017-03-18', 'A', '1', '1', '1', '1', 'Branch Type');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city_m`
--

CREATE TABLE `tbl_city_m` (
  `cityid` int(11) NOT NULL,
  `stateid` int(11) DEFAULT NULL,
  `city_name` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city_m`
--

INSERT INTO `tbl_city_m` (`cityid`, `stateid`, `city_name`, `maker_id`, `author_id`, `maker_date`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, 4, 'Goo', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(3, 21, 'Achalpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(4, 35, 'Achhnera', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(5, 35, 'Adari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(6, 12, 'Adalaj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(8, 12, 'Adityana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(9, 17, 'Pereyaapatna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10, 2, 'Adoni', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(11, 18, 'Adoor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(12, 17, 'Adiyara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(13, 37, 'Adra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(14, 17, 'Afzalpura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(15, 34, 'Agartala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(16, 35, 'Agra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(17, 7, 'Ahiwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(18, 12, 'Ahmedabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(19, 30, 'Ahmedgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(20, 21, 'Ahmednagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(21, 21, 'Ahmedpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(22, 24, 'Aizawl', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(23, 31, 'Ajmer', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(24, 21, 'Ajra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(25, 7, 'Akaltara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(26, 35, 'Akbarpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(27, 18, 'Akathiyoor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(29, 21, 'Akkalkot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(30, 21, 'Akola', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(31, 21, 'Akot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(32, 17, 'Alandha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(33, 21, 'Alandi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(34, 12, 'Alang', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(35, 18, 'Alappuzha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(36, 11, 'Aldona', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(37, 21, 'Alibag', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(38, 35, 'Aligarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(39, 37, 'Alipurduar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(40, 35, 'Allahabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(41, 36, 'Almora', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(42, 17, 'Aalanavara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(43, 3, 'Along', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(44, 17, 'Alur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(45, 31, 'Alwar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(46, 2, 'Amadalavalasa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(47, 2, 'Amalapuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(48, 21, 'Amalner', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(49, 5, 'Amarpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(50, 21, 'Ambad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(51, 7, 'Ambagarh Chowki', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(52, 12, 'Ambaji', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(53, 12, 'Ambaliyasan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(54, 21, 'Ambejogai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(55, 17, 'Ambikaanagara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(56, 7, 'Ambikapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(57, 21, 'Ambivali Tarf Wankhal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(58, 2, 'Ameenapuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(59, 4, 'Amguri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(60, 19, 'Amini', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(61, 16, 'Amlabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(62, 8, 'Amli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(63, 21, 'Amravati', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(64, 12, 'Amreli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(65, 30, 'Amritsar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(66, 35, 'Amroha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(67, 2, 'Anakapalle', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(68, 12, 'Anand', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(69, 27, 'Anandapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(70, 4, 'Anandnagaar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(71, 2, 'Anantapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(73, 18, 'Ancharakandy', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(74, 12, 'Andada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(75, 17, 'Anekal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(76, 17, 'Ankola', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(77, 12, 'Anjar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(78, 21, 'Anjangaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(79, 12, 'Anklav', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(80, 12, 'Ankleshwar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(81, 17, 'Annigeri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(82, 12, 'Antaliya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(83, 27, 'Anugul', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(84, 16, 'Ara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(85, 12, 'Arambhada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(86, 33, 'Arakkonam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(87, 5, 'Araria', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(88, 7, 'Arang', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(89, 37, 'Arambagh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(90, 17, 'Arsikere', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(91, 33, 'Arcot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(92, 5, 'Areraj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(94, 17, 'Arkalgud', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(95, 14, 'Arki', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(97, 18, 'Aroor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(98, 5, 'Arrah', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(99, 33, 'Aruppukkottai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100, 21, 'Arvi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(101, 5, 'Arwal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(102, 13, 'Asankhurd', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(103, 37, 'Asansol', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(104, 5, 'Asarganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(105, 20, 'Ashok Nagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(106, 21, 'Ashta', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(107, 18, 'Ashtamichira', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(108, 27, 'Asika', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(109, 10, 'Asola', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(110, 13, 'Assandh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(111, 13, 'Ateli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(112, 17, 'Athni', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(113, 18, 'Attingal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(114, 12, 'Atul', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(115, 17, 'Aurad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(116, 5, 'Aurangabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(118, 21, 'Ausa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(119, 18, 'Avinissery', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(121, 35, 'Azamgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(122, 35, 'Azmatgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(123, 17, 'Babaleshwar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(124, 13, 'Babiyal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(125, 14, 'Baddi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(126, 7, 'Bade Bacheli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(127, 35, 'Badaun', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(128, 20, 'Badagaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(129, 2, 'Badepalle', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(130, 34, 'Badharghat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(131, 5, 'Bagaha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(132, 36, 'Bageshwar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(133, 13, 'Bahadurgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(134, 5, 'Bahadurganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(135, 37, 'Baharampur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(136, 35, 'Bahraich', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(137, 5, 'Bairgania', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(138, 5, 'Bakhtiarpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(139, 20, 'Balaghat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(140, 27, 'Balangir', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(141, 27, 'Balasore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(142, 27, 'Baleshwar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(143, 10, 'Bawana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(144, 31, 'Bhiwadi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(145, 31, 'Bali', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(146, 37, 'Bally', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(147, 13, 'Ballabhgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(148, 35, 'Ballia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(149, 7, 'Balod', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(150, 7, 'Baloda Bazar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(151, 35, 'Balrampur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(152, 37, 'Balurghat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(153, 27, 'Bamra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(154, 35, 'Bandar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(155, 31, 'Bandikui', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(157, 17, 'Bangalore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(158, 2, 'Banganapalle', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(159, 5, 'Banka', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(160, 5, 'Banmankhi Bazar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(161, 31, 'Banswara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(162, 37, 'Bankura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(163, 2, 'Bapatla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(164, 37, 'Barakar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(165, 5, 'Barahiya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(166, 21, 'Baramati', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(168, 31, 'Baran', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(169, 37, 'Barasat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(170, 37, 'Bardhaman', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(171, 5, 'Barauli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(172, 5, 'Barbigha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(173, 35, 'Bareilly', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(174, 16, 'Barughutu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(175, 7, 'Basna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(176, 27, 'Barbil', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(177, 27, 'Bargarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(178, 5, 'Barh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(179, 27, 'Baripada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(180, 31, 'Barmer', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(181, 30, 'Barnala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(182, 4, 'Barpeta', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(183, 4, 'Barpeta Road', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(184, 37, 'Barrackpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(185, 20, 'Barwani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(186, 13, 'Barwala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(187, 17, 'Basavan Bagevadi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(188, 27, 'Basudebpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(189, 30, 'Batala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(190, 30, 'Bathinda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(191, 13, 'Bawal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(192, 36, 'Bazpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(193, 31, 'Beawar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(194, 5, 'Begusarai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(195, 5, 'Behea', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(196, 17, 'Belgaum', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(197, 2, 'Bellampalle', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(198, 17, 'Ballary', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(199, 27, 'Belpahar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(200, 7, 'Bemetra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(201, 36, 'Berinag', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(202, 2, 'Bethamcherla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(203, 5, 'Bettiah', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(204, 20, 'Betul', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(205, 5, 'Bhabua', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(206, 2, 'Bhadrachalam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(207, 27, 'Bhadrak', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(208, 5, 'Bhagalpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(209, 30, 'Bhagha Purana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(210, 2, 'Bhainsa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(211, 10, 'Bhajanpura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(212, 21, 'Bhandara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(213, 31, 'Bharatpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(214, 35, 'Bharthana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(215, 12, 'Bharuch', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(216, 7, 'Bhatapara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(217, 33, 'Bhavani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(218, 12, 'Bhavnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(219, 27, 'Bhawanipatna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(220, 2, 'Bheemunipatnam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(221, 7, 'Bhilai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(222, 31, 'Bhilwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(223, 2, 'Bhimavaram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(224, 31, 'Bhinmal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(225, 21, 'Bhiwandi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(226, 13, 'Bhiwani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(227, 2, 'Bhongir', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(228, 20, 'Bhopal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(229, 27, 'Bhuban', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(230, 27, 'Bhubaneswar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(231, 12, 'Bhuj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(232, 21, 'Bhusawal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(233, 17, 'Bidar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(234, 37, 'Bidhan Nagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(235, 5, 'Bihar Sharif', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(236, 17, 'Bijapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(238, 35, 'Bijnor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(239, 31, 'Bikaner', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(240, 5, 'Bikramganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(241, 31, 'Bilara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(242, 4, 'Bilasipara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(243, 7, 'Bilaspur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(244, 14, 'Bilaspur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(245, 27, 'Biramitrapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(246, 7, 'Birgaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(247, 2, 'Bobbili', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(248, 2, 'Bodhan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(249, 5, 'Bodh Gaya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(250, 16, 'Bokaro Steel City', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(251, 4, 'Bongaigaon City', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(252, 3, 'Bomdila', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(253, 27, 'Brahmapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(254, 27, 'Brajrajnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(255, 35, 'Budaun', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(256, 30, 'Budhlada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(257, 35, 'Bulandshahr', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(258, 20, 'Burhanpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(259, 27, 'Burla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(260, 5, 'Buxar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(261, 27, 'Byasanagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(263, 17, 'Chadchan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(264, 16, 'Chaibasa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(265, 35, 'Chakeri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(266, 16, 'Chakradharpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(267, 21, 'Chalisgaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(268, 14, 'Chamba', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(270, 7, 'Champa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(271, 36, 'Champawat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(272, 24, 'Champhai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(273, 17, 'Chamarajanagara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(274, 6, 'Chandigarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(275, 16, 'Chandil', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(276, 35, 'Chandausi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(277, 16, 'Chandrapura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(278, 5, 'Chanpatia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(279, 13, 'Charkhi Dadri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(280, 2, 'Chapirevula', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(281, 16, 'Chatra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(282, 35, 'Charkhari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(283, 18, 'Chalakudy', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(284, 21, 'Chandrapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(285, 18, 'Changanassery', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(286, 13, 'Cheeka', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(287, 18, 'Chendamangalam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(288, 33, 'Chengalpattu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(289, 18, 'Chengannur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(290, 33, 'Chennai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(291, 18, 'Cherthala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(292, 18, 'Cheruthazham', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(293, 5, 'Chhapra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(294, 20, 'Chhatarpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(295, 20, 'Chhindwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(296, 17, 'Chikkodi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(297, 17, 'Chikkamagalur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(298, 2, 'Chilakaluripet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(299, 21, 'Chinchani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(300, 33, 'Chinna salem', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(301, 17, 'Chinthaamani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(302, 21, 'Chiplun', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(303, 2, 'Chirala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(304, 16, 'Chirkunda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(305, 7, 'Chirmiri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(306, 37, 'Chinsura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(307, 17, 'Chitradurga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(308, 18, 'Chittur-Thathamangalam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(309, 20, 'Chitrakoot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(310, 2, 'Chittoor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(311, 18, 'Chockli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(312, 16, 'Churi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(313, 31, 'Churu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(314, 33, 'Coimbatore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(315, 5, 'Colgong', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(316, 37, 'Contai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(317, 37, 'Cooch Behar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(318, 33, 'Coonoor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(319, 33, 'Cuddalore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(320, 2, 'Cuddapah', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(321, 11, 'Curchorem Cacora', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(322, 27, 'Cuttack', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(323, 17, 'Chikkaballapura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(324, 5, 'Chandan Bara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(325, 36, 'Chaukori', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(326, 20, 'Dabra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(327, 35, 'Dadri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(328, 12, 'Dahod', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(329, 14, 'Dalhousie', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(330, 37, 'Dalkhola', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(331, 7, 'Dalli-Rajhara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(332, 5, 'Dalsinghsarai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(333, 16, 'Daltonganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(334, 9, 'Daman and Diu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(335, 20, 'Damoh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(336, 5, 'Darbhanga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(337, 37, 'Darjeeling', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(338, 30, 'Dasua', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(339, 20, 'Datia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(340, 5, 'Daudnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(341, 21, 'Daund', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(342, 17, 'Davanagere', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(343, 28, 'Debagarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(344, 12, 'Deesa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(345, 12, 'Dehegam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(346, 36, 'Dehradun', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(347, 5, 'Dehri-on-Sone', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(348, 10, 'Delhi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(349, 16, 'Deoghar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(350, 35, 'Deoria', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(351, 2, 'Devarakonda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(352, 17, 'Devar Hipparagi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(353, 21, 'Devgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(354, 31, 'Devgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(355, 20, 'Dewas', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(356, 35, 'Dhampur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(357, 7, 'Dhamtari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(358, 16, 'Dhanbad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(359, 20, 'Dhar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(360, 12, 'Dharampur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(361, 14, 'Dharamsala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(362, 34, 'Dharmanagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(363, 33, 'Dharmapuri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(364, 2, 'Dharmavaram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(365, 17, 'Dharwad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(366, 4, 'Dhekiajuli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(367, 28, 'Dhenkanal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(368, 12, 'Dholka', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(369, 4, 'Dhubri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(370, 21, 'Dhule', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(371, 37, 'Dhulian', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(372, 30, 'Dhuri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(373, 4, 'Dibrugarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(374, 4, 'Digboi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(375, 5, 'Dighwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(376, 25, 'Dimapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(377, 30, 'Dinanagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(378, 33, 'Dindigul', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(379, 4, 'Diphu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(380, 7, 'Dipka', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(381, 4, 'Dispur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(382, 21, 'Dombivli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(383, 7, 'Dongargarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(384, 4, 'Duliajan Oil Town', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(385, 37, 'Dumdum', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(386, 16, 'Dumka', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(387, 5, 'Dumraon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(388, 7, 'Durg-Bhilai Nagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(389, 21, 'Durgapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(391, 12, 'Dwarka', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(392, 13, 'Ellenabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(393, 2, 'Eluru', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(394, 18, 'Erattupetta', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(395, 33, 'Erode', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(396, 35, 'Etah', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(397, 35, 'Etawah', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(398, 37, 'English Bazar(Malda)', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(399, 35, 'Faizabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(400, 31, 'Falna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(401, 13, 'Faridabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(402, 30, 'Faridkot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(403, 2, 'Farooqnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(404, 35, 'Farrukhabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(405, 13, 'Fatehabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(408, 35, 'Fatehgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(409, 35, 'Fatehpur Chaurasi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(410, 35, 'Fatehpur Sikri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(411, 31, 'Fatehpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(414, 5, 'Fatwah', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(415, 30, 'Fazilka', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(416, 5, 'Forbesganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(417, 35, 'Firozabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(418, 30, 'Firozpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(419, 30, 'Firozpur Cantt', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(420, 20, 'Gadarwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(421, 17, 'Gadhaga/Gadag', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(422, 21, 'Gadchiroli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(423, 2, 'Gadwal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(424, 13, 'Ganaur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(425, 12, 'Gandhidham', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(426, 12, 'Gandhinagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(427, 32, 'Gangtok', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(428, 27, 'Ganjam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(429, 16, 'Garhwa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(430, 4, 'Gauripur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(431, 17, 'Gauribidanur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(432, 5, 'Gaya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(433, 13, 'Gharaunda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(434, 35, 'Ghatampur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(435, 21, 'Ghatanji', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(436, 16, 'Ghatshila', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(437, 35, 'Ghaziabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(438, 35, 'Ghazipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(439, 30, 'Giddarbaha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(440, 33, 'Gingee', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(441, 16, 'Giridih', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(442, 11, 'Goa Velha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(443, 4, 'Goalpara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(444, 33, 'Gobichettipalayam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(445, 30, 'Gobindgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(446, 7, 'Gobranawapara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(447, 16, 'Godda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(448, 12, 'Godhra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(449, 5, 'Gogri Jamalpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(450, 13, 'Gohana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(451, 17, 'Gokak', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(452, 4, 'Golaghat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(453, 16, 'Gomoh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(454, 21, 'Gondiya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(455, 2, 'Gooty', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(456, 5, 'Gopalganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(457, 35, 'Gorakhpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(458, 35, 'Greater Noida', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(459, 33, 'Gudalur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(460, 33, 'Gudalur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(461, 33, 'Gudalur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(462, 2, 'Gudivada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(463, 2, 'Gudur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(464, 17, 'Gulbarga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(465, 16, 'Gumia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(466, 16, 'Gumla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(467, 20, 'Guna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(468, 17, 'Gundlupet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(469, 2, 'Guntakal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(470, 2, 'Guntur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(471, 27, 'Gunupur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(472, 30, 'Gurdaspur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(473, 13, 'Gurgaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(474, 18, 'Guruvayoor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(475, 4, 'Guwahati', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(476, 20, 'Gwalior', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(477, 4, 'Haflong', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(478, 4, 'Hailakandi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(479, 5, 'Hajipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(480, 37, 'Haldia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(481, 36, 'Haldwani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(482, 14, 'Hamirpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(484, 13, 'Hansi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(485, 2, 'Hanuman Junction', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(486, 31, 'Hanumangarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(487, 35, 'Hapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(488, 20, 'Harda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(489, 35, 'Hardoi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(490, 36, 'Haridwar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(491, 18, 'Haripad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(492, 31, 'Harsawa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(493, 33, 'Harur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(494, 17, 'Haasana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(495, 35, 'Hastinapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(496, 35, 'Hathras', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(497, 16, 'Hazaribag', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(498, 5, 'Hilsa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(499, 12, 'Himatnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(500, 2, 'Hindupur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(501, 27, 'Hinjilicut', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(502, 13, 'Hisar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(503, 5, 'Hisua', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(504, 13, 'Hodal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(505, 4, 'Hojai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(506, 30, 'Hoshiarpurm', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(507, 17, 'Hosapet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(508, 37, 'Howrah', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(509, 17, 'Hubbali', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(510, 17, 'Hukkeri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(511, 37, 'Hugli-Chuchura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(512, 16, 'Hussainabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(513, 2, 'Hyderabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(514, 21, 'Ichalkaranji', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(515, 2, 'Ichchapuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(516, 12, 'Idar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(517, 22, 'Imphal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(518, 26, 'Indirapuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(519, 17, 'Indi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(520, 20, 'Indore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(521, 34, 'Indranagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(522, 18, 'Irinjalakuda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(523, 5, 'Islampur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(525, 3, 'Itanagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(526, 20, 'Itarsi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(527, 18, 'Idukki', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(528, 20, 'Jabalpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(529, 13, 'Jagadhri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(530, 27, 'Jagatsinghapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(531, 7, 'Jagdalpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(532, 5, 'Jagdispur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(533, 2, 'Jaggaiahpet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(534, 30, 'Jagraon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(535, 2, 'Jagtial', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(536, 31, 'Jaipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(537, 35, 'Jais', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(538, 31, 'Jaisalmer', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(539, 31, 'Jaitaran', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(540, 30, 'Jaitu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(541, 27, 'Jajapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(542, 35, 'Jajmau', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(543, 30, 'Jalalabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(544, 21, 'Jalna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(545, 30, 'Jalandhar Cantt', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(546, 30, 'Jalandhar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(547, 27, 'Jaleswar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(548, 21, 'Jalgaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(549, 37, 'Jalpaiguri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(550, 31, 'Jalore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(551, 5, 'Jamalpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(552, 2, 'Jammalamadugu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(554, 12, 'Jamnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(555, 16, 'Jamshedpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(556, 16, 'Jamtara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(557, 5, 'Jamui', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(558, 30, 'Jandiala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(559, 2, 'Jangaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(560, 7, 'Janjgir', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(561, 7, 'Jashpurnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(562, 36, 'Jaspur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(563, 27, 'Jatani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(564, 35, 'Jaunpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(565, 33, 'Jayankondam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(566, 5, 'Jehanabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(567, 27, 'Jeypur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(568, 20, 'Jhabua', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(569, 5, 'Jhajha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(570, 13, 'Jhajjar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(571, 31, 'Jhalawar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(572, 5, 'Jhanjharpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(573, 35, 'Jhansi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(574, 37, 'Jhargram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(575, 27, 'Jharsuguda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(576, 16, 'Jhumri Tilaiya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(577, 31, 'Jhunjhunu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(578, 13, 'Jind', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(579, 27, 'Joda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(580, 31, 'Jodhpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(581, 5, 'Jogabani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(582, 34, 'Jogendranagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(583, 4, 'Jorhat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(584, 23, 'Jowai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(585, 12, 'Junagadh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(586, 21, 'Junnar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(587, 37, 'Jhalda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(588, 2, 'Kadapa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(589, 12, 'Kadi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(590, 2, 'Kadiri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(591, 18, 'Kadirur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(592, 2, 'Kagaznagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(593, 20, 'Kailaras', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(594, 34, 'Kailasahar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(595, 13, 'Kaithal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(596, 22, 'Kakching', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(597, 2, 'Kakinada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(598, 13, 'Kalan Wali', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(599, 12, 'Kalavad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(600, 17, 'Kalburgi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(601, 37, 'Kalimpong', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(602, 13, 'Kalka', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(603, 18, 'Kalliasseri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(604, 35, 'Kalpi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(605, 12, 'Kalol', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(606, 18, 'Kalpetta', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(607, 21, 'Kalyan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(608, 2, 'Kalyandurg', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(609, 2, 'Kamareddy', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(610, 21, 'Kamthi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(611, 33, 'Kanchipuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(612, 36, 'Kanda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(613, 2, 'Kandukur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(614, 18, 'Kanhangad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(615, 18, 'Kanjikkuzhi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(616, 7, 'Kanker', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(617, 18, 'Kannur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(618, 35, 'Kanpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(619, 27, 'Kantabanji', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(620, 5, 'Kanti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(621, 12, 'Kapadvanj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(622, 30, 'Kapurthala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(623, 21, 'Karad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(624, 29, 'Karaikal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(625, 33, 'Karaikudi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(626, 27, 'Karanjia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(627, 4, 'Karimganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(628, 2, 'Karimnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(629, 12, 'Karjan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(630, 21, 'karjat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(631, 17, 'Kaarkala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(632, 13, 'Karnal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(633, 30, 'Karoran', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(634, 30, 'Kartarpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(635, 33, 'Karur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(636, 33, 'Karungal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(637, 17, 'Karwar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(638, 18, 'Kasaragod', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(639, 36, 'Kashipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(641, 5, 'Katihar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(642, 20, 'Katni', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(643, 15, 'Katra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(644, 2, 'Kavali', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(645, 19, 'Kavaratti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(646, 7, 'Kawardha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(647, 18, 'Kayamkulam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(648, 27, 'Kendrapara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(649, 27, 'Kendujhar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(650, 12, 'Keshod', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(651, 14, 'Keylong', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(652, 5, 'Khagaria', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(653, 35, 'Khalilabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(654, 12, 'Khambhalia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(655, 12, 'Khambhat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(656, 2, 'Khammam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(657, 30, 'Khanna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(658, 5, 'Kharagpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(660, 30, 'Kharar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(661, 12, 'Kheda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(662, 12, 'Khedbrahma', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(663, 12, 'Kheralu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(664, 35, 'Kheri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', '');
INSERT INTO `tbl_city_m` (`cityid`, `stateid`, `city_name`, `maker_id`, `author_id`, `maker_date`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(665, 27, 'Khordha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(666, 34, 'Khowai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(667, 16, 'Khunti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(668, 20, 'Khurai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(669, 36, 'kichha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(670, 5, 'Kishanganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(671, 18, 'Kochi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(672, 2, 'Kodad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(673, 12, 'Kodinar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(674, 18, 'Kodungallur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(675, 25, 'Kohima', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(676, 4, 'Kokrajhar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(677, 17, 'Kolar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(678, 17, 'Kolhar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(679, 21, 'Kolhapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(680, 37, 'Kolkata', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(681, 18, 'Kollam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(682, 33, 'Kollankodu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(683, 7, 'Kondagaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(684, 37, 'Konnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(685, 18, 'Koothuparamba', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(686, 27, 'Koraput', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(687, 7, 'Korba', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(688, 2, 'Koratla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(689, 30, 'Kot Kapura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(690, 17, 'Kota', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(693, 36, 'Kotdwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(694, 2, 'Kothagudem', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(695, 18, 'Kothamangalam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(696, 2, 'Kothapeta', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(697, 20, 'Kotma', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(698, 18, 'Kottayam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(699, 2, 'Kovvur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(700, 18, 'Kozhikode', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(701, 18, 'Kozhencherry', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(702, 37, 'Krishnanagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(703, 27, 'Kuchinda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(704, 35, 'Kulpahar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(705, 18, 'Kunnamkulam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(706, 30, 'Kurali', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(707, 2, 'Kurnool', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(708, 13, 'Kurukshetra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(709, 2, 'Kyathampalle', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(710, 30, 'Kamahi Devi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(711, 37, 'Kalyani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(712, 31, 'Lachhmangarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(713, 31, 'Ladnu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(714, 13, 'Ladwa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(715, 20, 'Lahar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(716, 35, 'Laharpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(717, 31, 'Lakheri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(718, 35, 'Lakhimpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(719, 5, 'Lakhisarai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(720, 17, 'Lakshmishawara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(721, 35, 'Lal Gopalganj Nindaura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(722, 5, 'Lalganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(723, 33, 'Lalgudi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(724, 35, 'Lalitpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(725, 35, 'Lalganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(726, 31, 'Lalsot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(727, 4, 'Lanka', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(728, 35, 'Lar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(729, 12, 'Lathi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(730, 21, 'Latur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(732, 22, 'Lilong', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(733, 12, 'Limbdi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(734, 17, 'Lingsuguru', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(735, 21, 'Loha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(736, 16, 'Lohardaga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(737, 21, 'Lonar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(738, 21, 'Lonavla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(739, 30, 'Longowal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(740, 35, 'Loni', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(741, 31, 'Losal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(742, 35, 'Lucknow', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(743, 30, 'Ludhiana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(744, 4, 'Lumding', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(745, 12, 'Lunawada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(746, 20, 'Lundi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(747, 24, 'Lunglei', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(748, 2, 'Macherla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(749, 2, 'Machilipatnam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(750, 2, 'Madanapalle', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(751, 17, 'Maddhuru', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(752, 11, 'Margao', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(753, 5, 'Madhepura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(754, 5, 'Madhubani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(755, 17, 'Madhugiri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(756, 16, 'Madhupur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(757, 27, 'Madhyamgram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(758, 17, 'Madikeri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(759, 33, 'Madurai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(760, 17, 'Maagadi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(761, 21, 'Mahabaleswar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(762, 21, 'Mahad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(763, 2, 'Mahbubnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(764, 17, 'Mahalingapura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(765, 5, 'Maharajganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(766, 20, 'Maharajpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(767, 7, 'Mahasamund', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(768, 29, 'Mahe', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(769, 7, 'Mahendragarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(771, 12, 'Mahesana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(772, 20, 'Mahidpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(773, 5, 'Mahnar Bazar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(774, 35, 'Mahoba', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(775, 21, 'Mahuli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(776, 12, 'Mahuva', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(777, 31, 'Mahwa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(778, 20, 'Maihar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(779, 37, 'Mainaguri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(780, 5, 'Makhdumpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(781, 31, 'Makrana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(782, 37, 'Mal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(783, 20, 'Malajkhand', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(784, 18, 'Malappuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(785, 17, 'Malavalli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(786, 21, 'Malegaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(787, 30, 'Malerkotla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(788, 27, 'Malkangiri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(789, 21, 'Malkapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(790, 30, 'Malout', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(791, 31, 'Malpura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(792, 17, 'Maaluru', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(793, 20, 'Manasa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(794, 12, 'Manavadar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(795, 20, 'Manawar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(796, 21, 'Manchar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(797, 2, 'Mancherial', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(798, 31, 'Mandalgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(799, 2, 'Mandamarri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(800, 2, 'Mandapeta', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(801, 31, 'Mandawa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(802, 14, 'Mandi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(803, 13, 'Mandi Dabwali', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(804, 20, 'Mandideep', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(805, 20, 'Mandla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(806, 20, 'Mandsaur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(807, 12, 'Mandvi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(808, 17, 'Mandya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(809, 5, 'Maner', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(810, 13, 'Manesar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(811, 2, 'Mangalagiri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(812, 4, 'Mangaldoi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(813, 17, 'Mangalore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(814, 21, 'Mangalvedhe', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(815, 36, 'Manglaur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(816, 12, 'Mangrol', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(818, 21, 'Mangrulpir', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(819, 5, 'Manihari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(820, 21, 'Manjlegaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(821, 4, 'Mankachar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(822, 21, 'Manmad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(823, 30, 'Mansa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(825, 2, 'Manuguru', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(826, 17, 'Maanvi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(827, 21, 'Manwath', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(828, 11, 'Mapusa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(829, 11, 'Margao', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(830, 4, 'Margherita', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(831, 5, 'Marhaura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(832, 4, 'Mariani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(833, 4, 'Marigaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(834, 2, 'Markapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(835, 11, 'Marmagao', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(836, 5, 'Masaurhi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(837, 37, 'Mathabhanga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(838, 35, 'Mathura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(839, 18, 'Mattannur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(840, 20, 'Mauganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(841, 30, 'Maur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(842, 18, 'Mavelikkara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(843, 18, 'Mavoor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(844, 22, 'Mayang Imphal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(845, 2, 'Medak', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(846, 37, 'Medinipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(847, 35, 'Meerut', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(848, 21, 'Mehkar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(849, 12, 'Mehmedabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(850, 37, 'Memari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(851, 31, 'Merta City', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(852, 21, 'Mhaswad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(853, 20, 'Mhow Cantonment', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(854, 20, 'Mhowgaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(855, 16, 'Mihijam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(856, 21, 'Mira-Bhayandar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(857, 21, 'Miraj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(858, 5, 'Mirganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(859, 2, 'Miryalaguda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(860, 35, 'Mirzapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(861, 12, 'Mithapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(862, 12, 'Modasa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(863, 35, 'Modinagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(864, 30, 'Moga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(865, 2, 'Mogalthur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(866, 30, 'Mohali', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(867, 5, 'Mohania', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(868, 5, 'Mokama', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(869, 5, 'Mokameh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(870, 25, 'Mokokchung', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(871, 37, 'Monoharpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(872, 35, 'Moradabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(873, 20, 'Morena', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(874, 30, 'Morinda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(875, 21, 'Morshi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(876, 12, 'Morvi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(877, 5, 'Motihari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(878, 5, 'Motipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(879, 31, 'Mount Abu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(880, 17, 'Mudalagi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(881, 17, 'Mudabidri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(882, 17, 'Muddebihala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(883, 17, 'Mudhola', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(884, 30, 'Mukatsar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(885, 30, 'Mukerian', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(886, 21, 'Mukhed', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(887, 30, 'Muktsar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(888, 21, 'Mul', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(889, 17, 'Mulabaagilu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(890, 20, 'Multai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(891, 21, 'Mumbai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(892, 20, 'Mundi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(893, 17, 'Mundaragi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(894, 7, 'Mungeli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(895, 5, 'Munger', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(896, 35, 'Muradnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(897, 5, 'Murliganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(898, 37, 'Murshidabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(899, 21, 'Murtijapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(900, 20, 'Murwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(901, 16, 'Musabani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(902, 36, 'Mussoorie', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(903, 18, 'Muvattupuzha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(904, 35, 'Muzaffarnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(905, 5, 'Muzaffarpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(906, 17, 'Mysore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(907, 31, 'Meethari Marwar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(908, 37, 'Nabadwip', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(909, 27, 'Nabarangapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(910, 30, 'Nabha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(911, 31, 'Nadbai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(912, 12, 'Nadiad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(913, 17, 'Nidagundi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(914, 4, 'Nagaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(915, 33, 'Nagapattinam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(916, 31, 'Nagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(917, 2, 'Nagari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(918, 2, 'Nagarkurnool', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(919, 31, 'Nagaur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(920, 20, 'Nagda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(921, 33, 'Nagercoil', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(922, 35, 'Nagina', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(923, 36, 'Nagla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(924, 21, 'Nagpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(925, 14, 'Nahan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(926, 3, 'Naharlagun', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(927, 37, 'Naihati', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(928, 7, 'Naila Janjgir', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(929, 36, 'Nainital', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(930, 20, 'Nainpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(931, 10, 'Najafgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(932, 35, 'Najibabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(933, 30, 'Nakodar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(934, 35, 'Nakur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(935, 21, 'Nalasopara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(936, 5, 'Nalanda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(937, 4, 'Nalbari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(938, 33, 'Namagiripettai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(939, 33, 'Namakkal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(940, 21, 'Nanded-Waghala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(941, 21, 'Nandgaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(942, 33, 'Nandivaram-Guduvancheri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(943, 21, 'Nandura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(944, 21, 'Nandurbar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(945, 2, 'Nandyal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(946, 30, 'Nangal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(947, 17, 'Nanjanagoodu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(948, 33, 'Nanjikottai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(949, 35, 'Nanpara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(950, 2, 'Narasapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(951, 2, 'Narasaraopet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(952, 35, 'Naraura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(953, 2, 'Narayanpet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(954, 10, 'Narela', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(955, 31, 'Nargund', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(956, 5, 'Narkatiaganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(957, 21, 'Narkhed', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(958, 13, 'Narnaul', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(959, 20, 'Narsinghgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(960, 20, 'Narsinghgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(961, 2, 'Narsipatnam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(962, 13, 'Narwana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(963, 21, 'Nashik', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(964, 31, 'Nasirabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(965, 33, 'Natham', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(966, 31, 'Nathdwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(967, 5, 'Naugachhia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(968, 35, 'Naugawan Sadat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(969, 35, 'Nautanwa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(970, 31, 'Navalgund', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(971, 21, 'Navi Mumbai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(972, 12, 'Navsari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(973, 35, 'Nawabganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(974, 5, 'Nawada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(975, 7, 'Nawagarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(976, 31, 'Nawalgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(977, 30, 'Nawanshahr', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(978, 21, 'Nawapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(979, 18, 'Nedumangad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(980, 31, 'Neem-Ka-Thana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(981, 20, 'Neemuch', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(982, 35, 'Nehtaur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(983, 31, 'Nelamangala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(984, 33, 'Nellikuppam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(985, 2, 'Nellore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(986, 20, 'Nepanagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(987, 10, 'New Delhi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(988, 33, 'Neyveli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(989, 18, 'Neyyattinkara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(990, 2, 'Nidadavole', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(991, 21, 'Nilanga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(992, 18, 'Nilambur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(993, 31, 'Nimbahera', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(994, 17, 'Nippani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(995, 2, 'Nirmal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(996, 31, 'Niwai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(997, 20, 'Niwari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(998, 2, 'Nizamabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(999, 31, 'Nohar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1000, 35, 'Noida', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1001, 5, 'Nokha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1003, 23, 'Nongstoin', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1004, 35, 'Noorpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1005, 4, 'North Lakhimpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1006, 20, 'Nowgong', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1007, 20, 'Nowrozabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1008, 2, 'Nuzvid', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1009, 106, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1010, 33, 'Oddanchatram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1011, 35, 'Obra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1012, 35, 'Orai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1013, 21, 'Osmanabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1014, 18, 'Ottappalam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1015, 21, 'Ozar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1016, 33, 'P.N.Patti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1017, 21, 'Pachora', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1018, 20, 'Pachore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1019, 33, 'Pacode', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1020, 33, 'Padmanabhapuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1021, 12, 'Padra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1022, 35, 'Padrauna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1023, 21, 'Paithan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1024, 16, 'Pakaur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1025, 2, 'Palacole', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1026, 18, 'Palai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1027, 18, 'Palakkad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1028, 33, 'Palani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1029, 12, 'Palanpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1030, 2, 'Palasa Kasibugga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1031, 21, 'Palghar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1032, 31, 'Pali', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1034, 35, 'Palia Kalan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1035, 12, 'Palitana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1036, 2, 'Pondur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1037, 33, 'Palladam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1038, 33, 'Pallapatti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1039, 33, 'Pallikonda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1040, 13, 'Palwal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1041, 2, 'Palwancha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1042, 20, 'Panagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1043, 33, 'Panagudi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1044, 11, 'Panaji', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1045, 18, 'Panamattom', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1046, 13, 'Panchkula', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1047, 37, 'Panchla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1048, 21, 'Pandharkaoda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1049, 21, 'Pandharpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1050, 20, 'Pandhurna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1051, 37, 'Pandua', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1052, 13, 'Panipat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1053, 20, 'Panna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1054, 18, 'Panniyannur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1055, 33, 'Panruti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1056, 21, 'Panvel', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1057, 18, 'Pappinisseri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1058, 27, 'Paradip', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1059, 33, 'Paramakudi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1060, 33, 'Parangipettai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1061, 35, 'Parasi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1062, 18, 'Paravoor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1063, 21, 'Parbhani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1064, 12, 'Pardi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1065, 27, 'Parlakhemundi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1066, 21, 'Parli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1067, 21, 'Parola', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1068, 21, 'Partur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1069, 2, 'Parvathipuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1070, 20, 'Pasan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1071, 37, 'Paschim Punropara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1072, 3, 'Pasighat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1073, 12, 'Patan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1074, 18, 'Pathanamthitta', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1075, 30, 'Pathankot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1076, 21, 'Pathardi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1077, 21, 'Pathri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1078, 30, 'Patiala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1079, 5, 'Patna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1080, 30, 'Patran', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1081, 16, 'Patratu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1082, 27, 'Pattamundai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1083, 30, 'Patti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1084, 33, 'Pattukkottai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1085, 21, 'Patur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1086, 21, 'Pauni', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1087, 36, 'Pauri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1088, 17, 'Paavagada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1089, 2, 'Pedana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1090, 2, 'Peddapuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1091, 13, 'Pehowa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1092, 21, 'Pen', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1093, 2, 'Penuganchiprolu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1094, 33, 'Perambalur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1095, 33, 'Peravurani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1096, 18, 'Peringathur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1097, 18, 'Perinthalmanna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1098, 33, 'Periyakulam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1099, 33, 'Periyasemur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1100, 33, 'Pernampattu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1101, 18, 'Perumbavoor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1102, 12, 'Petlad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1103, 30, 'Phagwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1104, 31, 'Phalodi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1105, 21, 'Phaltan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1106, 30, 'Phillaur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1107, 27, 'Phulabani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1108, 31, 'Phulera', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1109, 35, 'Phulpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1110, 16, 'Phusro', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1111, 35, 'Pihani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1112, 31, 'Pilani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1113, 31, 'Pilibanga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1114, 35, 'Pilibhit', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1115, 35, 'Pilkhuwa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1116, 31, 'Pindwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1117, 13, 'Pinjore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1118, 31, 'Pipar City', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1119, 20, 'Pipariya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1120, 5, 'Piro', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1121, 20, 'Pithampur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1122, 2, 'Pithapuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1123, 36, 'Pithoragarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1124, 33, 'Pollachi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1125, 33, 'Polur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1126, 29, 'Pondicherry', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1127, 18, 'Ponkunnam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1128, 18, 'Ponnani', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1129, 33, 'Ponneri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1130, 2, 'Ponnur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1131, 12, 'Porbandar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1132, 20, 'Porsa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1133, 1, 'Port Blair', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1134, 35, 'Powayan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1135, 31, 'Prantij', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1136, 31, 'Pratapgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1138, 20, 'Prithvipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1139, 2, 'Proddatur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1140, 33, 'Pudukkottai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1141, 33, 'Pudupattinam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1142, 35, 'Pukhrayan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1143, 21, 'Pulgaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1144, 33, 'Puliyankudi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1145, 18, 'Punalur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1147, 21, 'Pune', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1148, 33, 'Punjaipugalur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1149, 2, 'Punganur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1150, 35, 'Puranpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1151, 21, 'Purna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1152, 27, 'Puri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1153, 5, 'Purnia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1154, 35, 'Purquazi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1155, 37, 'Purulia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1156, 35, 'Purwa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1157, 21, 'Pusad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1158, 17, 'Puthooru', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1159, 18, 'Puthuppally', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1160, 2, 'Puttur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1161, 30, 'Qadian', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1162, 18, 'Quilandy', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1163, 17, 'Rabakavi Banahatti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1164, 12, 'Radhanpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1165, 35, 'Rae Bareli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1166, 5, 'Rafiganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1167, 20, 'Raghogarh-Vijaypur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1168, 37, 'Raghunathpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1169, 37, 'Raghunathganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1170, 20, 'Rahatgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1171, 21, 'Raichuri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1172, 17, 'Raayachuru', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1173, 37, 'Raiganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1174, 7, 'Raigarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1175, 33, 'Ranipet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1176, 30, 'Raikot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1177, 7, 'Raipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1178, 27, 'Rairangpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1179, 20, 'Raisen', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1180, 31, 'Raisinghnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1181, 27, 'Rajagangapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1182, 2, 'Rajahmundry', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1183, 31, 'Rajakhera', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1184, 31, 'Rajaldesar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1185, 2, 'Rajam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1186, 2, 'Rajampet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1187, 33, 'Rajapalayam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1189, 31, 'Rajgarh Alwar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1190, 31, 'Rajgarh Churu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1191, 20, 'Rajgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1192, 5, 'Rajgir', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1193, 12, 'Rajkot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1194, 7, 'Rajnandgaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1195, 12, 'Rajpipla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1196, 30, 'Rajpura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1197, 31, 'Rajsamand', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1198, 12, 'Rajula', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1199, 21, 'Rajura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1200, 2, 'Ramachandrapuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1201, 2, 'Ramagundam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1202, 17, 'Raamanagara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1203, 33, 'Ramanathapuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1204, 17, 'Raamadurga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1205, 33, 'Rameshwaram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1206, 31, 'Ramganj Mandi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1207, 16, 'Ramngarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1208, 31, 'Ramngarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1209, 5, 'Ramnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1211, 35, 'Rampur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1212, 35, 'Rampur Maniharan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1213, 35, 'Rampur Maniharan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1214, 30, 'Rampura Phul', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1215, 37, 'Rampurhat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1216, 21, 'Ramtek', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1217, 37, 'Ranaghat', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1218, 12, 'Ranavav', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1219, 16, 'Ranchi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1220, 4, 'Rangia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1221, 13, 'Rania', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1222, 17, 'Ranibennur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1223, 12, 'Rapar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1224, 33, 'Rasipuram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1225, 35, 'Rasra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1226, 31, 'Ratangarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1227, 35, 'Rath', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1228, 13, 'Ratia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1229, 20, 'Ratlam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1230, 21, 'Ratnagiri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1231, 20, 'Rau', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1232, 27, 'Raurkela', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1233, 21, 'Raver', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1234, 31, 'Rawatbhata', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1235, 31, 'Rawatsar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1236, 5, 'Raxaul Bazar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1237, 2, 'Rayachoti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1238, 2, 'Rayadurg', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1239, 27, 'Rayagada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1240, 31, 'Reengus', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1241, 20, 'Rehli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1242, 2, 'Renigunta', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1243, 35, 'Renukoot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1244, 35, 'Reoti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1245, 2, 'Repalle', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1246, 5, 'Revelganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1247, 20, 'Rewa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1248, 13, 'Rewari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1249, 36, 'Rishikesh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1250, 21, 'Risod', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1251, 35, 'Robertsganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1252, 17, 'Robertson Pet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1253, 13, 'Rohtak', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1254, 17, 'Ron', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1255, 36, 'Roorkee', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1256, 5, 'Rosera', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1257, 35, 'Rudauli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1258, 36, 'Rudrapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1259, 35, 'Rudrapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1260, 30, 'Rupnagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1261, 20, 'Sabalgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1262, 35, 'Sadabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1263, 17, 'Sadalaga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1264, 2, 'Sadasivpet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1265, 31, 'Sadri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1266, 31, 'Sadulshahar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1267, 31, 'Sadulpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1268, 13, 'Safidon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1269, 35, 'Safipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1270, 20, 'Sagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1271, 17, 'Sagara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1272, 31, 'Sagwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1273, 35, 'Saharanpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1274, 5, 'Saharsa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1275, 35, 'Sahaspur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1276, 35, 'Sahaswan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1277, 35, 'Sahawar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1278, 16, 'Sahibganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1279, 35, 'Sahjanwa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1280, 35, 'Saidpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1281, 24, 'Saiha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1282, 21, 'Sailu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1283, 37, 'Sainthia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1284, 17, 'Sakaleshapura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1285, 7, 'Sakti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1286, 12, 'Salaya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1287, 33, 'Salem', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1288, 2, 'Salur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1289, 13, 'Samalkha', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1290, 2, 'Samalkot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1291, 30, 'Samana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1292, 5, 'Samastipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1293, 27, 'Sambalpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1294, 35, 'Sambhal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1295, 31, 'Sambhar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1296, 35, 'Samdhan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1297, 35, 'Samthar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1298, 12, 'Sanand', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1299, 20, 'Sanawad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1300, 31, 'Sanchore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1301, 17, 'Sindagi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1302, 35, 'Sandi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1303, 35, 'Sandila', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1304, 17, 'Sandur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1305, 21, 'Sangamner', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1306, 2, 'Sangareddy', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1307, 31, 'Sangaria', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1308, 21, 'Sangli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1309, 21, 'Sangole', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1310, 30, 'Sangrur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1311, 33, 'Sankarankoil', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', '');
INSERT INTO `tbl_city_m` (`cityid`, `stateid`, `city_name`, `maker_id`, `author_id`, `maker_date`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1312, 33, 'Sankari', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1313, 17, 'Sankeshwara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1314, 37, 'Santipur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1315, 20, 'Sarangpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1316, 31, 'Sardarshahar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1317, 35, 'Sardhana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1318, 20, 'Sarni', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1319, 5, 'Sasaram', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1320, 21, 'Sasvad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1321, 21, 'Satana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1322, 21, 'Satara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1323, 20, 'Satna', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1324, 33, 'Sathyamangalam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1325, 2, 'Sattenapalle', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1326, 33, 'Sattur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1327, 16, 'Saunda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1328, 17, 'Soudaththi Yellamma', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1329, 20, 'Sausar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1330, 12, 'Savarkundla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1331, 17, 'Savanur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1332, 21, 'Savner', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1333, 31, 'Sawai Madhopur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1334, 21, 'Sawantwadi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1335, 17, 'Sedam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1336, 20, 'Sehore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1337, 20, 'Sendhwa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1338, 35, 'Seohara', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1339, 20, 'Seoni', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1340, 20, 'Seoni Malwa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1355, 35, 'Shamsabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1356, 35, 'Shamsabad Farrukhabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1357, 21, 'Shegaon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1358, 5, 'Sheikhpura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1359, 21, 'Shendurjana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1360, 33, 'Shenkottai', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1361, 31, 'Sheoganj', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1362, 5, 'Sheohar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1363, 20, 'Sheopur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1364, 5, 'Sherghati', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1365, 35, 'Sherkot', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1366, 17, 'Shiggaavi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1367, 17, 'Shikapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1368, 35, 'Bulandshahr', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1369, 35, 'Shikohabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1370, 23, 'Shillong', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1371, 14, 'Shimla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1372, 17, 'Shivamogga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1373, 21, 'Shirdi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1374, 21, 'Shirpur-Warwade', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1375, 21, 'Shirur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1376, 35, 'Shishgarh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1377, 20, 'Shivpuri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1378, 33, 'Sholavandan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1379, 33, 'Sholingur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1380, 18, 'Shoranur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1381, 17, 'Surapura', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1382, 21, 'Shrigonda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1383, 21, 'Shrirampur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1384, 17, 'Shree Rangapattana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1385, 20, 'Shujalpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1386, 35, 'Siana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1387, 4, 'Sibsagar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1388, 2, 'Siddipet', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1389, 20, 'Sidhi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1390, 12, 'Sidhpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1391, 17, 'Sidhalaghatta', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1392, 12, 'Sihor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1393, 20, 'Sihora', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1394, 35, 'Sikanderpur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1395, 35, 'Sikandra Rao', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1396, 35, 'Sikandrabad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1397, 31, 'Sikar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1398, 5, 'Silao', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1399, 4, 'Silapathar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1400, 4, 'Silchar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1401, 37, 'Siliguri', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1402, 21, 'Sillod', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1403, 8, 'Silvassa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1404, 16, 'Simdega', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1405, 17, 'Sindhagi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1406, 17, 'Sindhanooru', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1407, 2, 'Singapur', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1408, 20, 'Singrauli', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1409, 21, 'Sinnar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1410, 17, 'Sira', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(1411, 2, 'Sircilla', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010, 107, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10011, 108, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10012, 109, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10013, 110, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10014, 111, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10015, 112, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10016, 113, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10017, 114, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10018, 115, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10019, 116, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10020, 117, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10021, 118, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10022, 119, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10023, 120, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10024, 121, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10025, 122, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10026, 123, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10027, 124, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10028, 125, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10030, 127, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10031, 128, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10033, 130, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10034, 131, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10035, 132, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10036, 133, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10037, 134, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10038, 135, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10039, 136, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10040, 137, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10041, 138, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10042, 139, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10043, 140, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10044, 141, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10045, 142, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10046, 143, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10047, 144, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10048, 145, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10049, 146, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10050, 147, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10051, 148, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10052, 149, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10053, 150, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10054, 151, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10055, 152, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10056, 153, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10057, 154, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10058, 156, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10059, 157, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10060, 158, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10061, 159, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10062, 160, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10063, 161, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10064, 162, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10065, 163, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10066, 164, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10067, 165, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10068, 166, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10069, 167, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10070, 168, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10071, 169, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10072, 170, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10073, 171, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10074, 172, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10075, 173, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10076, 174, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10077, 175, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10078, 176, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10079, 177, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10080, 178, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10081, 179, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10082, 180, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10083, 181, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10085, 183, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10086, 184, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10087, 185, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10088, 186, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10089, 187, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10090, 188, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10091, 189, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10092, 190, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10093, 191, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10094, 192, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10095, 193, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10096, 194, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10097, 195, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10098, 196, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10099, 197, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100100, 198, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100101, 199, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100102, 200, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100103, 201, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100104, 202, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100105, 203, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100106, 204, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100107, 205, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100108, 206, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100109, 207, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100110, 208, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100111, 209, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100112, 210, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100113, 211, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100114, 212, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100115, 213, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100116, 214, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100117, 215, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100118, 216, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100119, 217, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100120, 218, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100121, 219, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100122, 220, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100123, 221, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100124, 222, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100125, 223, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100126, 224, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100127, 225, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100128, 226, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100129, 227, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100130, 228, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100131, 229, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100132, 230, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100133, 231, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100134, 232, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100135, 233, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100136, 234, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100137, 235, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100138, 236, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100139, 237, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100140, 238, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100141, 239, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100142, 240, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100143, 241, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100144, 242, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100145, 243, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100146, 244, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100147, 245, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100148, 247, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100149, 248, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100150, 249, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100151, 250, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100152, 251, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100153, 252, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100154, 253, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100155, 254, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100156, 255, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100157, 256, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100158, 257, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100159, 258, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100161, 260, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100162, 261, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100163, 262, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100164, 263, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100165, 264, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100166, 265, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100167, 266, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100168, 267, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100169, 268, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100170, 269, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100171, 270, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100172, 271, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100173, 272, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100174, 273, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100175, 274, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100176, 275, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100178, 277, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100179, 278, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100180, 279, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100182, 281, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100183, 282, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100184, 283, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100185, 284, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100186, 285, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100187, 286, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100188, 287, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100189, 288, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100190, 289, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100191, 290, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100192, 291, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100193, 292, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100194, 293, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100195, 294, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100196, 295, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100197, 296, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100198, 297, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100199, 298, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100200, 299, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100201, 300, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100202, 301, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100203, 302, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100204, 303, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100205, 304, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100206, 305, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100207, 306, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010032, 129, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010033, 100, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010034, 101, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010035, 102, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010036, 103, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010037, 104, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010038, 105, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010039, 182, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010040, 307, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010041, 308, 'NA', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10010042, 2, 'Naidupet', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010043, 2, 'Yemmiganur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010044, 2, 'Yemmiganur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010045, 2, 'Naidupet', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010046, 2, 'Narasapuram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010047, 2, 'Ongole', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010048, 2, 'Srikakulam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010049, 2, 'Srikalahasti', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010050, 2, 'Srisailam Project (Right Flank Colony) Township', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010051, 2, 'Sullurpeta', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010052, 2, 'Tadepalligudem', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010053, 2, 'Tadpatri', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010054, 2, 'Tanuku', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010055, 2, 'Tenali', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010056, 2, 'Tirupati', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010057, 2, 'Tiruvuru', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010058, 2, 'Tuni', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010059, 2, 'Uravakonda', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010060, 2, 'Venkatagiri', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010061, 2, 'Vijayawada', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010062, 2, 'Vinukonda', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010063, 2, 'Visakhapatnam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010064, 2, 'Vizianagaram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010065, 2, 'Yemmiganur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010066, 2, 'Yerraguntla', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010067, 4, 'Tinsukia', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010068, 4, 'Tezpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010069, 4, 'Tinsukia', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010070, 4, 'Tezpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010071, 4, 'Tinsukia', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010072, 4, 'Tezpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010073, 4, 'Tinsukia', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010074, 7, 'Bhilai Nagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010075, 5, 'Siwan ', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010084, 12, 'Dhoraji ', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010085, 12, 'Mahemdabad ', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010086, 12, 'Songadh ', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010087, 12, 'Surat ', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010088, 4, 'Tezpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010089, 4, 'Tinsukia', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010090, 5, 'Sitamarhi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010091, 5, 'Siwan', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010092, 5, 'Sonepur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010093, 5, 'Sugauli', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010094, 5, 'Sultanganj', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010095, 5, 'Supaul', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010096, 5, 'Warisaliganj', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010097, 7, 'Bhilai Nagar ', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010098, 7, 'Durg', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010099, 7, 'Manendragarh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010100, 7, 'Raipur*', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010101, 7, 'Tilda Newra', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010102, 12, 'Dhoraji', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010103, 12, 'Mahemdabad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010104, 12, 'Songadh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010105, 12, 'Surat', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010106, 12, 'Talaja', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010107, 12, 'Thangadh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010108, 12, 'Tharad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010109, 12, 'Thangadh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010110, 12, 'Tharad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010111, 12, 'Umbergaon', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010112, 12, 'Umreth', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010113, 12, 'Una', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010114, 12, 'Unjha', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010115, 12, 'Upleta', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010116, 12, 'Vadnagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010117, 12, 'Vadodara', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010118, 12, 'Valsad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010119, 12, 'Vapi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010120, 12, 'Veraval', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010121, 12, 'Vijapur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010122, 12, 'Viramgam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010123, 12, 'Visnagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010124, 12, 'Vyara', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010125, 12, 'Wadhwan', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010126, 12, 'Wankaner', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010127, 12, 'Dhoraji', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010128, 12, 'Mahemdabad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010129, 12, 'Songadh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010130, 12, 'Surat', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010131, 12, 'Talaja', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010132, 12, 'Thangadh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010133, 12, 'Tharad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010134, 12, 'Thangadh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010135, 12, 'Tharad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010136, 12, 'Umbergaon', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010137, 12, 'Umreth', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010138, 12, 'Una', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010139, 12, 'Unjha', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010140, 12, 'Upleta', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010141, 12, 'Vadnagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010142, 12, 'Vadodara', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010143, 12, 'Valsad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010144, 12, 'Vapi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010145, 12, 'Veraval', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010146, 12, 'Vijapur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010147, 12, 'Viramgam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010148, 12, 'Visnagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010149, 12, 'Vyara', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010152, 13, 'Sarsod', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010153, 13, 'Shahbad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010154, 13, 'Sirsa', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010155, 13, 'Sohna', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010156, 13, 'Sonipat', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010157, 13, 'Taraori', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010158, 13, 'Thanesar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010159, 13, 'Tohana', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010160, 13, 'Yamunanagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010161, 14, 'Solan', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010162, 14, 'Sundarnagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010163, 15, 'Anantnag', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010164, 15, 'Baramula', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010165, 15, 'Jammu', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010166, 15, 'Kathua', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010167, 15, 'Punch', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010168, 15, 'Rajauri', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010169, 15, 'Sopore', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010170, 15, 'Srinagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010171, 15, 'Udhampur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010172, 16, 'Adityapur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010173, 16, 'Medininagar (Daltonganj)', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010174, 16, 'Ramgarh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010175, 16, 'Tenu dam-cum-Kathhara', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010176, 17, 'Adyar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010177, 17, 'Afzalpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010178, 17, 'Ballari', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010179, 17, 'Belagavi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010180, 17, 'Bengaluru', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010181, 17, 'Chikkamagaluru', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010182, 17, 'Hubli-Dharwad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010183, 17, 'Lakshmeshwar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010184, 17, 'Lingsugur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010185, 17, 'Maddur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010186, 17, 'Magadi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010187, 17, 'Malur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010188, 17, 'Mangaluru', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010189, 17, 'Manvi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010190, 17, 'Muddebihal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010191, 17, 'Mudhol', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010192, 17, 'Mulbagal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010193, 17, 'Mundargi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010194, 17, 'Nanjangud', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010195, 17, 'Pavagada', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010196, 17, 'Piriyapatna', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010197, 17, 'Rabkavi Banhatti', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010198, 17, 'Ramanagaram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010199, 17, 'Ramdurg', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010200, 17, 'Ranebennuru', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010201, 17, 'Sadalagi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010202, 17, 'Sanduru', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010203, 17, 'Saundatti-Yellamma', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010204, 17, 'Shahabad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010205, 17, 'Shahpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010206, 17, 'Shiggaon', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010207, 17, 'Shikaripur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010208, 17, 'Shrirangapattana', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010209, 17, 'Sidlaghatta', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010210, 17, 'Sindhnur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010211, 17, 'Sirsi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010212, 17, 'Siruguppa', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010213, 17, 'Srinivaspur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010214, 17, 'Talikota', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010215, 17, 'Tarikere', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010216, 17, 'Tekkalakote', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010217, 17, 'Terdal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010218, 17, 'Tiptur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010219, 17, 'Tumkur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010220, 17, 'Udupi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010221, 17, 'Vijayapura', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010222, 17, 'Wadi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010223, 17, 'Yadgir', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010224, 18, 'Koyilandy', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010225, 18, 'Taliparamba', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010226, 18, 'Thiruvalla', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010227, 18, 'Thiruvananthapuram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010228, 18, 'Thodupuzha', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010229, 18, 'Thrissur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010230, 18, 'Tirur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010231, 18, 'Vaikom', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010232, 18, 'Varkala', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010233, 18, 'Vatakara', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010234, 20, 'Alirajpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010235, 20, 'Ganjbasoda', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010236, 20, 'Malaj Khand', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010237, 20, 'MurwaraÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â (Katni)', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010238, 20, 'Nowrozabad (Khodargama)', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010239, 20, 'Seoni-Malwa', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010240, 20, 'Shahdol', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010241, 20, 'Shajapur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010242, 20, 'Shamgarh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010243, 20, 'Sironj', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010244, 20, 'Sohagpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010245, 20, 'Tarana', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010246, 20, 'Tikamgarh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010247, 20, 'Ujjain', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010248, 20, 'Umaria', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010249, 20, 'Vijaypur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010250, 20, 'Wara Seoni', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010251, 21, 'Greater Mumbai', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010252, 21, 'Kalyan-Dombivali', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010253, 21, 'Rahuri', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010254, 21, 'Shahade', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010255, 21, 'Solapur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010256, 21, 'Soyagaon', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010257, 21, 'Talegaon Dabhade', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010258, 21, 'Talode', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010259, 21, 'Tasgaon', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010260, 21, 'Thane', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010261, 21, 'Tirora', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010262, 21, 'Tuljapur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010263, 21, 'Tumsar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010264, 21, 'Uchgaon', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010265, 21, 'Udgir', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010266, 21, 'Umarga', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010267, 21, 'Umarkhed', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010268, 21, 'Umred', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010269, 21, 'Uran', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010270, 21, 'Uran Islampur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010271, 21, 'Vadgaon Kasba', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010272, 21, 'Vasai-Virar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010273, 21, 'Vita', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010274, 21, 'Wadgaon Road', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010275, 21, 'Wai', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010276, 21, ' Wani', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010277, 21, 'Wardha', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010278, 21, 'Warora', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010279, 21, 'Warud', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010280, 21, 'Washim', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010281, 21, 'Yavatmal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010282, 21, 'Yawal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010283, 21, 'Yevla', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010284, 22, 'Thoubal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010285, 23, 'Shillong*', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010286, 23, 'Tura', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010287, 25, 'Tuensang', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010288, 25, 'Wokha', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010289, 25, 'Zunheboto', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010290, 27, 'Baleshwar Town', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010291, 27, 'Baripada Town', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010292, 27, 'Soro', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010293, 27, 'Sunabeda', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010294, 27, 'Sundargarh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010295, 27, 'Talcher', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010296, 27, 'Tarbha', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010297, 27, 'Titlagarh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010298, 29, 'Yanam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010299, 30, 'Firozpur Cantt.', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010300, 30, 'Hoshiarpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010301, 30, 'Jalandhar Cantt.', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010302, 30, 'Pattran', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010303, 30, 'Sirhind Fatehgarh Sahib', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010304, 30, 'Sujanpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010305, 30, 'Sunam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010306, 30, 'Talwara', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010307, 30, 'Tarn Taran', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010308, 30, 'Urmar Tanda', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010309, 30, 'Zira', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010310, 30, 'Zirakpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010311, 31, 'Rajgarh (Alwar)', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010312, 31, 'Rajgarh (Churu)', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010313, 31, 'Shahpura ', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010314, 31, 'Sirohi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010315, 31, 'Sojat', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010316, 31, 'Sri Madhopur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010317, 31, 'Sujangarh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010318, 31, 'Suratgarh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010319, 31, 'Taranagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010320, 31, 'Todabhim', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010321, 31, 'Todaraisingh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010322, 31, 'Tonk', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010323, 31, 'Udaipur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010324, 31, 'Udaipurwati', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010325, 31, 'Vijainagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010326, 33, 'Kancheepuram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010327, 33, 'Manachanallur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010328, 33, 'Neyveli (TS)', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010329, 33, 'O\\ Valley', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010330, 33, 'Sirkali', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010331, 33, 'Sivaganga', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010332, 33, 'Sivagiri', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010333, 33, 'Sivakasi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010334, 33, 'Srivilliputhur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010335, 33, 'Surandai', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010336, 33, 'Suriyampalayam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010337, 33, 'Tenkasi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010338, 33, 'Thammampatti', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010339, 33, 'Thanjavur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010340, 33, 'Tharamangalam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010341, 33, 'Tharangambadi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010342, 33, 'Theni Allinagaram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010343, 33, 'Thirumangalam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010344, 33, 'Thirupuvanam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010345, 33, 'Thiruthuraipoondi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010346, 33, 'Thiruvallur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010347, 33, 'Thiruvarur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010348, 33, 'Thuraiyur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010349, 33, 'Tindivanam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010350, 33, 'Tiruchendur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010351, 33, 'Tiruchengode', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010352, 33, 'Tiruchirappalli', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010353, 33, 'Tirukalukundram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010354, 33, 'Tirukkoyilur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010355, 33, 'Tirunelveli', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010356, 33, 'Tirupathur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010357, 33, 'Tiruppur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010358, 33, 'Tiruttani', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010359, 33, 'Tiruvannamalai', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010360, 33, 'Tiruvethipuram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010361, 33, 'Tittakudi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010362, 33, 'Udhagamandalam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010363, 33, 'Udumalaipettai', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010364, 33, 'Unnamalaikadai', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010365, 33, 'Usilampatti', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010366, 33, 'Uthamapalayam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010367, 33, 'Uthiramerur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010368, 33, 'Vadakkuvalliyur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010369, 33, 'Vadalur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010370, 33, 'Vadipatti', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010371, 33, 'Valparai', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010372, 33, 'Vandavasi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010373, 33, 'Vaniyambadi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010374, 33, 'Vedaranyam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010375, 33, 'Vellakoil', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010376, 33, 'Vellore', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010377, 33, 'Vikramasingapuram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010378, 33, 'Viluppuram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010379, 33, 'Virudhachalam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010380, 33, 'Virudhunagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010381, 33, 'Viswanatham', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010382, 30, 'Suryapet', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010383, 30, 'Tandur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010384, 30, 'Vikarabad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010385, 30, 'Wanaparthy', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010386, 30, 'Warangal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010387, 30, 'Yellandu', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010388, 34, 'Belonia', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010389, 34, 'Udaipur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010390, 34, 'Belonia', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010391, 34, 'Udaipur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010392, 35, 'Khair', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010393, 35, 'Shahabad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010394, 35, 'Shahganj', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010395, 35, 'Shahjahanpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010396, 35, 'Shamli', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010397, 35, 'Shikarpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_city_m` (`cityid`, `stateid`, `city_name`, `maker_id`, `author_id`, `maker_date`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(10010398, 35, 'Sirsaganj', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010399, 35, 'Sirsi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010400, 35, 'Sitapur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010401, 35, 'Soron', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010402, 35, 'Suar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010403, 35, 'Sultanpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010404, 35, 'Sumerpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010405, 35, 'Tanda', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010406, 35, 'Thakurdwara', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010407, 35, 'Thana Bhawan', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010408, 35, 'Tilhar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010409, 35, 'Tirwaganj', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010410, 35, 'Tulsipur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010411, 35, 'Tundla', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010412, 35, 'Ujhani', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010413, 35, 'Unnao', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010414, 35, 'Utraula', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010415, 35, 'Varanasi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010416, 35, 'Vrindavan', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010417, 35, 'Warhapur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010418, 35, 'Zaidpur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010419, 35, 'Zamania', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010420, 35, 'Hardwar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010421, 35, 'Sitarganj', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010422, 35, 'Srinagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010423, 35, 'Tehri', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010424, 37, 'Darjiling', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010425, 37, 'English Bazar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010426, 37, 'Habra', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010427, 37, 'Hugli-Chinsurah', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010428, 37, 'Malda', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010429, 313, 'Adilabad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010434, 313, 'Bhadrachalam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010435, 313, 'Bhainsa', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010436, 313, 'Bhongir', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010437, 313, 'Bodhan', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010438, 313, 'Farooqnagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010439, 313, 'Gadwal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010440, 313, 'Hyderabad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010441, 313, 'Jagtial', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010442, 313, 'Jangaon', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010443, 313, 'Kagaznagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010444, 313, 'Kamareddy', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010445, 313, 'Karimnagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010446, 313, 'Khammam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010447, 313, 'Koratla', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010448, 313, 'Kothagudem', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010449, 313, 'Kyathampalle', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010450, 313, 'Mahbubnagar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010451, 313, 'Mancherial', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010452, 313, 'Mandamarri', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010453, 313, 'Manuguru', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010454, 313, 'Medak', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010455, 313, 'Miryalaguda', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010456, 313, 'Nagarkurnool', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010457, 313, 'Narayanpet', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010458, 313, 'Nirmal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010459, 313, 'Nizamabad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010460, 313, 'Palwancha', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010461, 313, 'Ramagundam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010462, 313, 'Sadasivpet', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010463, 313, 'Sangareddy', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010464, 313, 'Siddipet', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010465, 313, 'Sircilla', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010466, 313, 'Suryapet', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010467, 313, 'Tandur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010468, 313, 'Vikarabad', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010469, 313, 'Wanaparthy', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010470, 313, 'Warangal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010471, 313, 'Yellandu', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10010472, 2, 'Naidupet', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_communication`
--

CREATE TABLE `tbl_communication` (
  `communication_id` int(200) NOT NULL,
  `contact_id` varchar(200) DEFAULT NULL,
  `case_id` varchar(200) NOT NULL,
  `totalcaseid` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `remark_name` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `contact_person_id` varchar(200) NOT NULL,
  `refno` varchar(200) NOT NULL,
  `office_ref_no` varchar(200) NOT NULL,
  `des` text NOT NULL,
  `termandcondition` text NOT NULL,
  `template` varchar(200) NOT NULL,
  `communication_type` varchar(200) DEFAULT NULL,
  `updateid` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'A',
  `send_status` varchar(200) NOT NULL DEFAULT 'Send'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_communication`
--

INSERT INTO `tbl_communication` (`communication_id`, `contact_id`, `case_id`, `totalcaseid`, `date`, `remark_name`, `subject`, `contact_person_id`, `refno`, `office_ref_no`, `des`, `termandcondition`, `template`, `communication_type`, `updateid`, `maker_id`, `maker_date`, `author_id`, `author_date`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `status`, `send_status`) VALUES
(1, '2', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', 'Naba Kishore Biswal', 'Enquiry from Hindalco Mahan', '2', 'AEPL/S/0001/17-18/S/0001', '', '0', '<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-ansi-language: EN-IN; mso-fareast-language: EN-IN; mso-bidi-language: AR-SA;\">Kindly provide the budgetary offer for the below items.</span><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',\'serif\'; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-ansi-language: EN-IN; mso-fareast-language: EN-IN; mso-bidi-language: AR-SA;\">&nbsp;<br /><br /></span><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; color: #0020c2; mso-ansi-language: EN-IN; mso-fareast-language: EN-IN; mso-bidi-language: AR-SA;\">1. Hydraulic Tool kit(servicing Tool kit) for servo valve and Blocking&nbsp;element &nbsp;in&nbsp;HPBP.</span></strong><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',\'serif\'; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-ansi-language: EN-IN; mso-fareast-language: EN-IN; mso-bidi-language: AR-SA;\">&nbsp;<br /></span><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',\'sans-serif\'; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; color: #0020c2; mso-ansi-language: EN-IN; mso-fareast-language: EN-IN; mso-bidi-language: AR-SA;\">2. Electric Tester for servo and Blocking&nbsp;Element &nbsp;in&nbsp;HPBP.</span></strong><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',\'serif\'; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-ansi-language: EN-IN; mso-fareast-language: EN-IN; mso-bidi-language: AR-SA;\">&nbsp;<br /><br />Best Regards</span></p>\r\n<p><span style=\"font-size: 12.0pt; font-family: \'Times New Roman\',\'serif\'; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-ansi-language: EN-IN; mso-fareast-language: EN-IN; mso-bidi-language: AR-SA;\">Jyoti Dhamija</span></p>\r\n<p>&nbsp;</p>', '0', 'Communication', '', NULL, '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Sent'),
(2, '2', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', '', 'TEST LETTER HEAD', '2', 'AEPL/S/0001/17-18/S/0002', '', '', '', '', 'letterhead', '1', NULL, '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Send'),
(3, '2', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', '', 'Purchase Order For NTPC Kahalgaon', '2', 'AEPL/S/0001/17-18/S/0003', '', '', '', '', 'PurchaseOrder', '1', '1', '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Send'),
(4, '2', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', 'ISS/QTN/BG/001/1718 DTD 24/4/2017', 'Offer for Spares', '2', 'AEPL/S/0001/17-18/S/0004', '', '', '', '', 'Quotation', '1', '1', '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Send'),
(5, '2', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', 'PO FROM HINDALCO MAHAN', 'SPARES', '2', 'AEPL/S/0001/17-18/S/0005', '', '', '', '', 'SaleOrdernew', '1', '1', '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Send'),
(6, '1', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', 'ISS/QTN/BG/001/1718 DTD 24/4/2017', 'Offer for Spares', '1', 'AEPL/S/0001/17-18/NTPC Parichha/0006', '', '', '', '', 'Quotation', '2', '1', '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Send'),
(7, '1', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', '', 'TEST LETTER HEAD', '1', 'AEPL/S/0001/17-18/NTPC Parichha/0007', '', '', '', '', 'letterhead', '2', NULL, '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Send'),
(8, '1', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', '', 'jhbkbh', '1', 'AEPL/S/0001/17-18/NTPC Parichha/0008', '', '', '', '', 'SaleOrdernew', '2', '1', '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Send'),
(9, '1', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', '', 'utdfut', '1', 'AEPL/S/0001/17-18/NTPC Parichha/0009', '', '', '', '', 'PurchaseOrder', '2', '1', '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Send'),
(10, '1', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', '', 'JHVHI', '1', 'AEPL/S/0001/17-18/NTPC Parichha/0010', '', '', '', '', 'Quotation', '3', '1', '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Send'),
(11, '2', 'S/0002', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-08', '', 'SUBJECT TEST ONLY', '2', 'AEPL/S/0002/17-18/S/0011', '', '0', '<p>&nbsp;</p>\n<p>Dear Sir,</p>\n<p>&nbsp;</p>\n<p>&nbsp; &nbsp; &nbsp;Kindly find enclosed here with the Enquiry for the supply of M/s Iyappan Engineering Industrial Pvt. Ltd. make spares for HPBP of U#6&amp;7 of 2X500MW DTPS Anpara&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\n<p>&nbsp;</p>', '0', 'Communication', '', NULL, '2017-09-08', NULL, '2017-09-08', '1', '1', '1', '1', 'A', 'Sent'),
(12, '2', 'S/0002', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-08', '', 'SUBJECT TEST ONLY letter head', '2', 'AEPL/S/0002/17-18/S/0012', '', '', '', '', 'letterhead', '3', NULL, '2017-09-08', NULL, '2017-09-08', '1', '1', '1', '1', 'A', 'Send'),
(13, '2', 'S/0002', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-08', '', 'SUBJECT TEST ONLY QUOTATION', '2', 'AEPL/S/0002/17-18/S/0013', '', '', '', '', 'Quotation', '4', '1', '2017-09-08', NULL, '2017-09-08', '1', '1', '1', '1', 'A', 'Send'),
(14, '1', 'S/0002', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-08', '', 'SALE ORDER', '1', 'AEPL/S/0002/17-18/NTPC Parichha/0014', '', '', '', '', 'SaleOrdernew', '3', '1', '2017-09-08', NULL, '2017-09-08', '1', '1', '1', '1', 'A', 'Send'),
(15, '2', 'S/0002', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-10', 'djgjfdfhjdjhdfh', 'jdfhgj', '2', 'AEPL/S/0002/17-18/S/0015', '', '', '', '', 'PurchaseOrder', '3', '1', '2017-09-10', NULL, '2017-09-10', '1', '1', '1', '1', 'A', 'Send'),
(16, '2', 'S/0002', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-10', 'jkhhf', 'hjhjfh', '2', 'AEPL/S/0002/17-18/S/0016', '', '', '', '', 'PurchaseOrder', '4', '1', '2017-09-10', NULL, '2017-09-10', '1', '1', '1', '1', 'A', 'Send'),
(17, '2', 'S/0002', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-10', 'mdfgdgjh', 'hsdfgjhgj', '2', 'AEPL/S/0002/17-18/S/0017', '', '', '', '', 'PurchaseOrder', '5', '1', '2017-09-10', NULL, '2017-09-10', '1', '1', '1', '1', 'A', 'Send'),
(18, '2', 'S/0002', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-10', 'fggfjhghj', 'hghghg', '2', 'AEPL/S/0002/17-18/S/0018', '', '', '', '', 'PurchaseOrder', '6', '1', '2017-09-10', NULL, '2017-09-10', '1', '1', '1', '1', 'A', 'Send'),
(19, '2', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-10', 'gjgsjh', 'gfhdgjhgjh', '2', 'AEPL/S/0001/17-18/S/0019', '', '', '', '', 'PurchaseOrder', '7', '1', '2017-09-10', NULL, '2017-09-10', '1', '1', '1', '1', 'A', 'Send'),
(20, '2', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-10', 'fgfgdfgdd', 'hfghff hfh fhf', '2', 'AEPL/S/0001/17-18/S/0020', '', '', '', '', 'Quotation', '5', '1', '2017-09-10', NULL, '2017-09-10', '1', '1', '1', '1', 'A', 'Send'),
(21, '1', 'S/0002', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-10', 'jkdhasjkhdjashjh', 'jsdgjhfgjhsdg', '1', 'AEPL/S/0002/17-18/NTPC Parichha/0021', '', '', '', '', 'SaleOrdernew', '4', '1', '2017-09-10', NULL, '2017-09-10', '1', '1', '1', '1', 'A', 'Send');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_m`
--

CREATE TABLE `tbl_contact_m` (
  `contact_id` int(11) NOT NULL,
  `addres_id` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `code_name` varchar(200) DEFAULT NULL,
  `accunt` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `printname` varchar(255) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address1` text,
  `address3` text,
  `opening_balance` varchar(255) NOT NULL,
  `previous_balance` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `IT_Pan` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `lst` varchar(255) NOT NULL,
  `cst` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `fax` varchar(200) NOT NULL,
  `contact_persons_name` varchar(200) DEFAULT NULL,
  `contact_persons_emailid` varchar(200) DEFAULT NULL,
  `contact_persons_phone` varchar(200) DEFAULT NULL,
  `state_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `ledgertype` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_m`
--

INSERT INTO `tbl_contact_m` (`contact_id`, `addres_id`, `first_name`, `group_name`, `company_name`, `code_name`, `accunt`, `middle_name`, `alias`, `printname`, `last_name`, `email`, `phone`, `mobile`, `address1`, `address3`, `opening_balance`, `previous_balance`, `transport`, `station`, `contact_person`, `IT_Pan`, `ward`, `lst`, `cst`, `tin`, `fax`, `contact_persons_name`, `contact_persons_emailid`, `contact_persons_phone`, `state_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `ledgertype`) VALUES
(1, '', 'Parichha Thermal Power Project', '4', 'Er. M. S. Rai', 'NTPC Parichha', '', '', '', '', '', 'ee.cid_2.parichha@uprvunl.org', '', '09415900783', 'New Delhi', '', '', '', '', '', '', '', '', '0', '', '0', '0510-2782192', NULL, NULL, NULL, '35', '1', '2017-09-07', '1', '2017-09-07', 'A', '1', '1', '1', '1', ''),
(2, '', 'IYAPPAN SERVO SYSTEMS', '3', 'T PALANIAPPAN', 'S', '', '', '', '', '', 'tpalani@iyappanengg.com', '', '04443111572', 'NO 71 3RD STREET SECTOR 1 SIDCO INDUSTRIAL ESTATE AMBATTUR CHENNAI 600098', '', '', '', '', '', '', '', '', '0', '', '0', '', NULL, NULL, NULL, '', '1', '2017-09-07', '1', '2017-09-07', 'A', '1', '1', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_person`
--

CREATE TABLE `tbl_contact_person` (
  `person_id` int(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `contact_id` varchar(200) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_email` varchar(200) NOT NULL,
  `p_phone` varchar(200) NOT NULL,
  `designation` varchar(500) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_person`
--

INSERT INTO `tbl_contact_person` (`person_id`, `customer_id`, `contact_id`, `p_name`, `p_email`, `p_phone`, `designation`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '4', '1', 'Er. M. S. Rai', 'ee.cid_2.parichha@uprvunl.org', '09415900783', '', '1', '0000-00-00', NULL, '2017-09-07', 'A', '1', '1', '1', NULL),
(2, '3', '2', 'T PALANIAPPAN', 'tpalani@iyappanengg.com', '044-43111572', 'DIRECTOR OPERATIONS', '1', '0000-00-00', NULL, '2017-09-07', 'A', '1', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country_m`
--

CREATE TABLE `tbl_country_m` (
  `contryid` int(11) NOT NULL,
  `countryName` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country_m`
--

INSERT INTO `tbl_country_m` (`contryid`, `countryName`, `maker_id`, `author_id`, `maker_date`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, 'India', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(2, 'England', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(3, 'Afghanistan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(4, 'Albania', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(5, 'Algeria', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(6, 'Andorra', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(7, 'Angola', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(8, 'Antigua and Barbuda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(9, 'Argentina', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(10, 'Armenia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(11, 'Aruba', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(12, 'Australia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(13, 'Austria', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(14, 'Azerbaijan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(15, 'Bahamas The', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(16, 'Bahrain', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(17, 'Bangladesh', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(18, 'Barbados', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(19, 'Belarus', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(20, 'Belgium', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(21, 'Belize', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(22, 'Benin', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(23, 'Bhutan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(24, 'Bolivia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(25, 'Bosnia and Herzegovina', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(26, 'Botswana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(27, 'Brazil', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(28, 'Brunei', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(30, 'Burkina Faso', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(31, 'Burma', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(32, 'Burundi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(33, 'Cambodia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(34, 'Cameroon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(35, 'Canada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(36, 'Cape Verde', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(37, 'Central African Republic', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(38, 'Chad', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(39, 'Chile', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(40, 'China', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(41, 'Colombia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(42, 'Comoros', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(43, 'Congo Democratic Republic of the', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(44, 'Congo Republic of the', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(45, 'Costa Rica', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(46, 'Cote dIvoire', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(47, 'Croatia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(48, 'Cuba', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(49, 'Curacao', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(50, 'Cyprus', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(51, 'Czech Republic', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(52, 'Denmark', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(53, 'Djibouti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(54, 'Dominica', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(55, 'Dominican Republic', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(56, 'East Timor', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(57, 'Ecuador', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(58, 'Egypt', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(59, 'El Salvador', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(60, 'Equatorial Guinea', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(61, 'Eritrea', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(62, 'Estonia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(63, 'Ethiopia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(64, 'Fiji', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(65, 'Finland', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(66, 'France', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(67, 'Gabon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(68, 'Gambia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(69, 'Georgia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(70, 'Germany', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(71, 'Ghana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(72, 'Greece', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(73, 'Grenada', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(74, 'Guatemala', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(75, 'Guinea', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(76, 'Guinea Bissau', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(77, 'Guyana', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(78, 'Haiti', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(79, 'Holy See', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(80, 'Honduras', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(81, 'Hong Kong', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(82, 'Hungary', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(83, 'Iceland', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(85, 'Indonesia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(86, 'Iran', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(87, 'Iraq', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(88, 'Ireland', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(89, 'Israel', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(90, 'Italy', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(91, 'Jamaica', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(92, 'Japan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(93, 'Jordan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(94, 'Kazakhstan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(95, 'Kenya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(96, 'Kiribati', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(97, 'Korea North', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(98, 'Korea South', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(99, 'Kosovo', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(100, 'Kuwait', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(101, 'Kyrgyzstan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(102, 'Laos', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(103, 'Latvia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(104, 'Lebanon', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(105, 'Lesotho', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(106, 'Liberia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(107, 'Libya', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(108, 'Liechtenstein', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(109, 'Lithuania', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(110, 'Luxembourg', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(111, 'Macau', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(112, 'Macedonia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(113, 'Madagascar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(114, 'Malawi', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(115, 'Malaysia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(116, 'Maldives', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(117, 'Mali', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(118, 'Malta', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(119, 'Marshall Islands', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(120, 'Mauritania', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(121, 'Mauritius', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(122, 'Mexico', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(123, 'Micronesia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(124, 'Moldova', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(125, 'Monaco', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(126, 'Mongolia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(127, 'Montenegro', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(128, 'Morocco', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(129, 'Mozambique', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(130, 'Namibia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(131, 'Nauru', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(132, 'Nepal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(133, 'Netherlands', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(134, 'Netherlands Antilles', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(135, 'New Zealand', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(136, 'Nicaragua', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(137, 'Niger', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(138, 'Nigeria', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(139, 'North Korea', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(140, 'Norway', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(141, 'Oman', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(142, 'Pakistan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(143, 'Palau', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(144, 'Palestinian Territories', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(145, 'Panama', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(146, 'Papua New Guinea', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(147, 'Paraguay', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(148, 'Peru', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(149, 'Philippines', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(150, 'Poland', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(151, 'Portugal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(152, 'Qatar', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(153, 'Romania', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(154, 'Russia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(155, 'Rwanda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(156, 'Saint Kitts and Nevis', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(157, 'Saint Lucia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(158, 'Saint Vincent and the Grenadines', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(159, 'Samoa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(161, 'Sao Tome and Principe', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(162, 'Saudi Arabia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(163, 'Senegal', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(164, 'Serbia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(165, 'Seychelles', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(166, 'Sierra Leone', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(167, 'Singapore', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(168, 'Sint Maarten', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(169, 'Slovakia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(170, 'Slovenia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(171, 'Solomon Islands', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(172, 'Somalia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(173, 'South Africa', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(174, 'South Korea', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(175, 'South Sudan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(176, 'Spain', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(178, 'Sudan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(179, 'Suriname', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(180, 'Swaziland', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(182, 'Switzerland', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(183, 'Syria', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(184, 'Taiwan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(185, 'Tajikistan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(186, 'Tanzania', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(187, 'Thailand', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(188, 'Timor Leste', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(189, 'Togo', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(190, 'Tonga', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(191, 'Trinidad and Tobago', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(192, 'Tunisia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(193, 'Turkey', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(194, 'Turkmenistan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(195, 'Tuvalu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(196, 'Uganda', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(197, 'Ukraine', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(198, 'United Arab Emirates', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(199, 'United Kingdom', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(200, 'Uruguay', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(201, 'Uzbekistan', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(202, 'Vanuatu', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(203, 'Venezuela', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(204, 'Vietnam', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(205, 'Yemen', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(206, 'Zambia', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(207, 'Zimbabwe', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', ''),
(208, 'Other', '', '', '0000-00-00', '0000-00-00', 'A', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enterprise_mst`
--

CREATE TABLE `tbl_enterprise_mst` (
  `comp_id` int(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `comp_name` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `compa_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enterprise_mst`
--

INSERT INTO `tbl_enterprise_mst` (`comp_id`, `code`, `comp_name`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `zone_id`, `brnh_id`, `divn_id`, `compa_id`) VALUES
(1, '123', 'Enterprice1', '1', '2017-03-18', '1', '2017-03-18', 'A', '1', '1', '1', '1'),
(2, '0010', 'AshBond', '1', '2017-06-06', '1', '2017-06-06', 'A', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_entitytype_mst`
--

CREATE TABLE `tbl_entitytype_mst` (
  `entitytypeid` int(11) NOT NULL,
  `entitytypecode` varchar(200) DEFAULT NULL,
  `entitytypedesc` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `Tablename` varchar(200) DEFAULT NULL,
  `columnid` varchar(200) DEFAULT NULL,
  `columnname` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_entitytype_mst`
--

INSERT INTO `tbl_entitytype_mst` (`entitytypeid`, `entitytypecode`, `entitytypedesc`, `status`, `Tablename`, `columnid`, `columnname`, `maker_id`, `author_id`, `maker_date`, `author_date`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, 'Leads', 'Leads', 'A', 'dizypro_leads_m', 'lead_id', 'first_name', '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(3, 'Vendor', 'Vendor', 'A', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(4, 'Organization', 'Organization', 'A', 'dizypro_opportunity_m', 'opportunity_id', 'opportunity_name', '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(5, 'Contact', 'Contact', 'A', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(6, 'Campaign', 'Campaign', 'A', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(7, 'Invoice', 'Invoice', 'A', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(8, 'Branch', 'Branch', 'A', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(9, 'Purchase Order', 'Purchase Order', 'A', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(10, 'Employee', 'Employee Description', 'A', NULL, NULL, NULL, '', '', '0000-00-00', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_godown_mst`
--

CREATE TABLE `tbl_godown_mst` (
  `godown_id` int(11) NOT NULL,
  `godown_name` varchar(200) DEFAULT NULL,
  `main_godown_id` int(11) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `printname` varchar(255) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_godown_mst`
--

INSERT INTO `tbl_godown_mst` (`godown_id`, `godown_name`, `main_godown_id`, `alias`, `printname`, `Description`, `status`, `maker_id`, `author_id`, `maker_date`, `author_date`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, 'ddd', NULL, '', '', NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'deli', 1, '', 'deli', 'asd', 'A', '21', '21', '2016-03-12', '2016-03-12', '0', '1', '1', '1'),
(11, 'jank', 10, '', 'jank', 'asd', 'A', '21', '21', '2016-03-12', '2016-03-12', '0', '1', '1', '1'),
(15, 'rr', 1, 'hh', 'rr', NULL, 'A', '21', '21', '2016-05-24', '2016-05-24', '1', '1', '1', '1'),
(16, 'dsaas', 1, '', 'dsaas', NULL, 'A', '21', '21', '2016-05-25', '2016-05-25', '1', '1', '1', '1'),
(17, 'gg1', 1, 'bv', 'gg1', NULL, 'A', '21', '21', '2016-05-26', '2016-05-26', '1', '1', '1', '1'),
(18, 'hhh1', 1, 'mn', 'hhh1', NULL, 'A', '21', '21', '2016-05-26', '2016-05-26', '1', '1', '1', '1'),
(19, 'nmb', 18, 'nb', 'nmb', NULL, 'A', '21', '21', '2016-05-26', '2016-05-26', '1', '1', '1', '1'),
(20, 'rk', 1, 'nn', 'rk', NULL, 'A', '21', '21', '2016-07-13', '2016-07-13', '1', '1', '1', '1'),
(21, 'ff', 20, 'kkk', 'ff', NULL, 'A', '21', '21', '2016-07-13', '2016-07-13', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_dtl`
--

CREATE TABLE `tbl_invoice_dtl` (
  `invoice_dtl_id` int(11) NOT NULL,
  `vat_rate_on_item` varchar(200) DEFAULT '0',
  `vat_on_item` varchar(200) DEFAULT '0',
  `service_rate_on_item` varchar(200) DEFAULT '0',
  `service_on_item` varchar(200) DEFAULT NULL,
  `discount_percent_on_item` varchar(200) DEFAULT '0',
  `invoiceid` varchar(200) DEFAULT NULL,
  `tempid` varchar(100) DEFAULT NULL,
  `productid` varchar(200) DEFAULT NULL,
  `unit` varchar(200) DEFAULT NULL,
  `serial_code` varchar(200) DEFAULT NULL,
  `qty` varchar(200) DEFAULT NULL,
  `list_price` varchar(200) DEFAULT NULL,
  `discount_item_amt` varchar(200) DEFAULT '0',
  `net_price_after_discount` varchar(200) DEFAULT NULL,
  `direct_discount_amt` varchar(200) DEFAULT '0',
  `idvat_rate_on_total` varchar(200) DEFAULT '0',
  `idvat_total` varchar(200) DEFAULT '0',
  `ivat_rate_on_total` varchar(200) DEFAULT '0',
  `ivat_total` varchar(200) DEFAULT '0',
  `isales_rate_on_total` varchar(200) DEFAULT '0',
  `isales_total` varchar(200) DEFAULT '0',
  `iservice_rate_on_total` varchar(200) DEFAULT '0',
  `iservices_total` varchar(200) DEFAULT '0',
  `v_DISCOUNT` varchar(200) DEFAULT '0',
  `total_price` varchar(200) DEFAULT '0',
  `net_price` varchar(200) DEFAULT '0',
  `main_catg_id` varchar(200) DEFAULT NULL,
  `child_invoice_id` int(11) DEFAULT NULL,
  `total_tax` varchar(200) DEFAULT '0',
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_hdr`
--

CREATE TABLE `tbl_invoice_hdr` (
  `invoiceid` int(11) NOT NULL,
  `tax_retail` varchar(200) NOT NULL,
  `schoolname` varchar(200) NOT NULL,
  `agent_id` varchar(200) NOT NULL,
  `state_id` varchar(200) NOT NULL,
  `company_id` varchar(200) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `customernumber` varchar(200) DEFAULT NULL,
  `contactid` varchar(200) DEFAULT NULL,
  `season` varchar(200) NOT NULL,
  `assignedto` varchar(200) DEFAULT NULL,
  `purchaseorder` varchar(200) DEFAULT NULL,
  `sales_commission` varchar(200) DEFAULT NULL,
  `sales_ordernumber` varchar(200) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `organisation_id` varchar(200) DEFAULT NULL,
  `invoice_status` varchar(200) DEFAULT NULL,
  `excise_total` varchar(200) DEFAULT NULL,
  `vat_total` varchar(200) DEFAULT NULL,
  `sales_total` varchar(200) DEFAULT NULL,
  `services_total` varchar(200) DEFAULT NULL,
  `item_price_total` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `shipping_charge` varchar(200) DEFAULT NULL,
  `installation_charge_per` varchar(200) DEFAULT NULL,
  `installation_charge` varchar(200) DEFAULT NULL,
  `service_tax_per` varchar(200) DEFAULT NULL,
  `service_tax` varchar(200) DEFAULT NULL,
  `dvat_total` varchar(200) DEFAULT NULL,
  `dvat_on_a_per` varchar(200) DEFAULT NULL,
  `dvat_on_a` varchar(200) DEFAULT NULL,
  `pre_tax_total` varchar(200) DEFAULT NULL,
  `discount_rate_on_total` varchar(200) DEFAULT NULL,
  `direct_dicount_amt` varchar(200) DEFAULT NULL,
  `vat_rate_on_total` varchar(200) DEFAULT NULL,
  `sales_rate_on_total` varchar(200) DEFAULT NULL,
  `service_rate_on_total` varchar(200) DEFAULT NULL,
  `shipping_vat_rate_on_total` varchar(200) DEFAULT NULL,
  `shipping_sales_rate_on_total` varchar(200) DEFAULT NULL,
  `shipping_service_rate_on_total` varchar(200) DEFAULT NULL,
  `shipping_vat_total` varchar(200) DEFAULT NULL,
  `shipping_sales_total` varchar(200) DEFAULT NULL,
  `shipping_service_total` varchar(200) DEFAULT NULL,
  `shpping_total` varchar(200) DEFAULT NULL,
  `tax_total` varchar(200) DEFAULT NULL,
  `adjustment_type` varchar(200) DEFAULT NULL,
  `adjustment_total` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) DEFAULT NULL,
  `advance_total` varchar(200) DEFAULT NULL,
  `balance_total` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `invoice_no` varchar(200) DEFAULT 'Retail',
  `manufacturer_id` varchar(200) DEFAULT NULL,
  `c_name` varchar(200) DEFAULT NULL,
  `cust_phone` varchar(200) DEFAULT NULL,
  `cust_address` varchar(200) DEFAULT NULL,
  `brnch_id` varchar(200) DEFAULT NULL,
  `invoice_type` varchar(200) DEFAULT NULL,
  `fdate` varchar(200) DEFAULT NULL,
  `todate` varchar(200) DEFAULT NULL,
  `product_exp_date` varchar(200) DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `surcharge_tax` varchar(200) DEFAULT '0',
  `paymode` varchar(200) DEFAULT NULL,
  `generated_status` varchar(200) DEFAULT 'Direct',
  `serial_no` int(11) DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `referenceof` varchar(200) DEFAULT NULL,
  `deliverymode` varchar(200) DEFAULT NULL,
  `submit_amount` varchar(200) DEFAULT '0',
  `locationid` varchar(200) DEFAULT NULL,
  `terminalid` varchar(200) DEFAULT NULL,
  `contact_no` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_payment`
--

CREATE TABLE `tbl_invoice_payment` (
  `id` int(200) NOT NULL,
  `contact_id` varchar(200) NOT NULL,
  `invoiceid` varchar(200) NOT NULL,
  `receive_billing_mount` varchar(200) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `pay_modes` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `maker_id` varchar(200) NOT NULL,
  `maker_date` date NOT NULL,
  `comp_id` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice_payment`
--

INSERT INTO `tbl_invoice_payment` (`id`, `contact_id`, `invoiceid`, `receive_billing_mount`, `remarks`, `pay_modes`, `date`, `maker_id`, `maker_date`, `comp_id`, `status`) VALUES
(1, '2', '1', '38421.00', '', '', '2017-09-07 13:39:15', '1', '2017-09-07', '1', 'Purchaseorder'),
(2, '1', '', '100000', '', 'Transfer', '2017-09-08', '1', '2017-09-08', '1', 'paymentReceived'),
(3, '1', '3', '213455.00', '', '', '2017-09-08 11:27:01', '1', '2017-09-08', '1', 'SalesOrder'),
(4, '2', '3', '38421.00', '', '', '2017-09-10 16:30:14', '1', '2017-09-10', '1', 'Purchaseorder'),
(5, '2', '4', '40500.00', '', '', '2017-09-10 16:34:30', '1', '2017-09-10', '1', 'Purchaseorder'),
(6, '2', '5', '19210.50', '', '', '2017-09-10 16:41:37', '1', '2017-09-10', '1', 'Purchaseorder'),
(7, '2', '6', '38421.00', '', '', '2017-09-10 16:47:31', '1', '2017-09-10', '1', 'Purchaseorder'),
(8, '2', '7', '81000.00', '', '', '2017-09-10 16:49:25', '1', '2017-09-10', '1', 'Purchaseorder'),
(9, '1', '4', '192109.50', '', '', '2017-09-10 17:17:04', '1', '2017-09-10', '1', 'SalesOrder');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_report`
--

CREATE TABLE `tbl_invoice_report` (
  `invoice_rid` int(200) NOT NULL,
  `invoiceid` varchar(200) NOT NULL,
  `billamount` varchar(200) NOT NULL,
  `remaining_amt` varchar(200) NOT NULL,
  `advance_receive_amt` varchar(200) NOT NULL,
  `billamount_receive` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `contact_id` varchar(200) NOT NULL,
  `due_amount` varchar(200) NOT NULL,
  `total_billamt` varchar(200) NOT NULL,
  `total_billamt_receive` varchar(200) NOT NULL,
  `maker_id` varchar(200) NOT NULL,
  `maker_date` varchar(200) NOT NULL,
  `comp_id` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_letter_head`
--

CREATE TABLE `tbl_letter_head` (
  `id` int(11) NOT NULL,
  `contact_id` varchar(200) DEFAULT NULL,
  `case_id` varchar(200) NOT NULL,
  `totalcaseid` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `remark_name` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `contact_person_id` varchar(200) NOT NULL,
  `refno` varchar(200) NOT NULL,
  `office_ref_no` varchar(200) NOT NULL,
  `des` text NOT NULL,
  `termandcondition` text NOT NULL,
  `template` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'A',
  `send_status` varchar(200) NOT NULL DEFAULT 'Send'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_letter_head`
--

INSERT INTO `tbl_letter_head` (`id`, `contact_id`, `case_id`, `totalcaseid`, `date`, `remark_name`, `subject`, `contact_person_id`, `refno`, `office_ref_no`, `des`, `termandcondition`, `template`, `maker_id`, `maker_date`, `author_id`, `author_date`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `status`, `send_status`) VALUES
(1, '2', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', '', 'TEST LETTER HEAD', '2', 'AEPL/S/0001/17-18/S/0002', '', '0', '<p class=\"MsoNormal\" style=\"margin-bottom: 12.0pt;\"><strong><u>Ref:- Po.No.4000183482-M94-1007 dated 20.05.2017</u></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 12.0pt;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 12.0pt;\">&nbsp;Dear Sir,<u></u></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 12.0pt;\">With reference to above purchase order, we would like to mention the following:-</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 12.0pt;\">1. Looking of the urgency of your&nbsp;plant ,&nbsp;the part material has been supplied&nbsp;&nbsp;,you&nbsp;are requested to please arrange to release our payment.Please find attached the invoice of the same.</p>\r\n<p class=\"MsoNormal\">2. As the Po terms were - CST @ 2% extra against c form, the same will be changed to IGST extra as per attachment.<br /><br />Please do the necessary amendment in the Po if required so that balance material can be supplied within the delivery period.</p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 11.0pt; font-family: \'Calibri\',\'sans-serif\';\">Thanks &amp; Regards,</span></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><span style=\"font-size: 11.0pt; font-family: \'Calibri Light\'; mso-bidi-font-family: Calibri;\">&nbsp;</span></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 13.5pt; font-family: \'Arial Narrow\',\'sans-serif\';\">Binay Kumar Chaurasiya</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 13.5pt; font-family: \'Arial Narrow\',\'sans-serif\';\">&nbsp;Engineer-&nbsp;Sales&nbsp;</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><span style=\"font-size: 11.0pt;\">&nbsp;</span></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><span style=\"font-size: 11.0pt; font-family: \'Calibri\',\'sans-serif\';\">&nbsp;</span></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 14.0pt; font-family: \'Arial Narrow\',\'sans-serif\'; mso-bidi-font-family: Calibri; color: #3d85c6;\">Ashbond&nbsp;Engineers Pvt. Ltd.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\';\">B- 9/3, Mianwali Nagar, Rohtak Road</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\';\">New Delhi - 110087</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\';\">Mob: 8505856674</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\'; mso-bidi-font-family: Calibri;\">Phone: 011-25271161, 25264696</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\'; mso-bidi-font-family: Calibri;\">Fax: 011- 25264696</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\'; mso-bidi-font-family: Calibri;\">Website:&nbsp;<span style=\"color: blue;\"><a href=\"http://www.ashbond.in/\" target=\"_blank\" rel=\"noopener\"><span style=\"color: #1155cc;\">www.ashbond.in</span></a></span></span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><span style=\"font-size: 7.5pt; font-family: \'Verdana\',\'sans-serif\'; mso-bidi-font-family: Calibri; color: #009900;\">Save a tree. Please consider the environment before printing this email.</span></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt;\">&nbsp;</p>', '0', NULL, '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Sent'),
(2, '1', 'S/0001', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-07', '', 'TEST LETTER HEAD', '1', 'AEPL/S/0001/17-18/NTPC Parichha/0007', '', '0', '<p class=\"MsoNormal\" style=\"margin-bottom: 12.0pt;\"><strong><u>Ref:- Po.No.4000183482-M94-1007 dated 20.05.2017</u></strong></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: 12.0pt;\">&nbsp;</p>\n<p class=\"MsoNormal\" style=\"margin-bottom: 12.0pt;\">&nbsp;Dear Sir,<u></u></p>\n<p class=\"MsoNormal\" style=\"margin-bottom: 12.0pt;\">With reference to above purchase order, we would like to mention the following:-</p>\n<p class=\"MsoNormal\" style=\"margin-bottom: 12.0pt;\">1. Looking of the urgency of your&nbsp;plant ,&nbsp;the part material has been supplied&nbsp;&nbsp;,you&nbsp;are requested to please arrange to release our payment.Please find attached the invoice of the same.</p>\n<p class=\"MsoNormal\">2. As the Po terms were - CST @ 2% extra against c form, the same will be changed to IGST extra as per attachment.<br /><br />Please do the necessary amendment in the Po if required so that balance material can be supplied within the delivery period.</p>\n<p class=\"MsoNormal\">&nbsp;</p>\n<p class=\"MsoNormal\"><span style=\"font-size: 11.0pt; font-family: \'Calibri\',\'sans-serif\';\">Thanks &amp; Regards,</span></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><span style=\"font-size: 11.0pt; font-family: \'Calibri Light\'; mso-bidi-font-family: Calibri;\">&nbsp;</span></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 13.5pt; font-family: \'Arial Narrow\',\'sans-serif\';\">Binay Kumar Chaurasiya</span></strong></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 13.5pt; font-family: \'Arial Narrow\',\'sans-serif\';\">&nbsp;Engineer-&nbsp;Sales&nbsp;</span></strong></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><span style=\"font-size: 11.0pt;\">&nbsp;</span></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><span style=\"font-size: 11.0pt; font-family: \'Calibri\',\'sans-serif\';\">&nbsp;</span></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 14.0pt; font-family: \'Arial Narrow\',\'sans-serif\'; mso-bidi-font-family: Calibri; color: #3d85c6;\">Ashbond&nbsp;Engineers Pvt. Ltd.</span></strong></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\';\">B- 9/3, Mianwali Nagar, Rohtak Road</span></strong></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\';\">New Delhi - 110087</span></strong></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\';\">Mob: 8505856674</span></strong></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\'; mso-bidi-font-family: Calibri;\">Phone: 011-25271161, 25264696</span></strong></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\'; mso-bidi-font-family: Calibri;\">Fax: 011- 25264696</span></strong></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><strong><span style=\"font-size: 9.5pt; font-family: \'Arial Narrow\',\'sans-serif\'; mso-bidi-font-family: Calibri;\">Website:&nbsp;<span style=\"color: blue;\"><a href=\"http://www.ashbond.in/\" target=\"_blank\" rel=\"noopener\"><span style=\"color: #1155cc;\">www.ashbond.in</span></a></span></span></strong></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\"><span style=\"font-size: 7.5pt; font-family: \'Verdana\',\'sans-serif\'; mso-bidi-font-family: Calibri; color: #009900;\">Save a tree. Please consider the environment before printing this email.</span></p>\n<p style=\"margin: 0in; margin-bottom: .0001pt;\">&nbsp;</p>', '0', NULL, '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A', 'Sent'),
(3, '2', 'S/0002', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '2017-09-08', '', 'SUBJECT TEST ONLY letter head', '2', 'AEPL/S/0002/17-18/S/0012', '', '0', '<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp; &nbsp; &nbsp;Kindly find enclosed here with the Enquiry for the supply of M/s Iyappan Engineering Industrial Pvt. Ltd. make spares for HPBP of U#6&amp;7 of 2X500MW DTPS Anpara&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>', '0', NULL, '2017-09-08', NULL, '2017-09-08', '1', '1', '1', '1', 'A', 'Sent');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(11) NOT NULL,
  `location_name` varchar(200) DEFAULT NULL,
  `branch_id` varchar(200) DEFAULT NULL,
  `loc_type_id` varchar(200) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT 'A',
  `comp_id` varchar(15) DEFAULT NULL,
  `zone_id` varchar(15) DEFAULT NULL,
  `maker_id` varchar(15) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(15) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `brnh_id` varchar(15) DEFAULT NULL,
  `divn_id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `location_name`, `branch_id`, `loc_type_id`, `STATUS`, `comp_id`, `zone_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `brnh_id`, `divn_id`) VALUES
(1, 'Jankpuri', '1', '1584', 'A', '1', '1', '13', '2015-05-31', '13', '2015-05-31', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_data`
--

CREATE TABLE `tbl_master_data` (
  `serial_number` int(11) NOT NULL,
  `param_id` varchar(200) DEFAULT NULL,
  `key1` varchar(200) DEFAULT NULL,
  `key2` varchar(200) DEFAULT NULL,
  `keyvalue` varchar(200) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` datetime DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_data`
--

INSERT INTO `tbl_master_data` (`serial_number`, `param_id`, `key1`, `key2`, `keyvalue`, `description`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(5, '16', NULL, NULL, 'No.', '', '1', '2017-05-22 00:00:00', '1', '2017-05-22 00:00:00', 'A', '1', '1', '1', '1'),
(6, '16', NULL, NULL, 'Set', '', '1', '2017-05-22 00:00:00', '1', '2017-05-22 00:00:00', 'A', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_data_mst`
--

CREATE TABLE `tbl_master_data_mst` (
  `param_id` int(11) NOT NULL,
  `keyname` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` datetime DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_data_mst`
--

INSERT INTO `tbl_master_data_mst` (`param_id`, `keyname`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(16, 'Usage Unit\r\n', NULL, NULL, NULL, NULL, 'A', '36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_function`
--

CREATE TABLE `tbl_module_function` (
  `func_id` int(11) NOT NULL,
  `function_url` varchar(200) NOT NULL,
  `function_name` varchar(200) DEFAULT NULL,
  `module_name` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `function_group` varchar(200) DEFAULT ' ',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_module_function`
--

INSERT INTO `tbl_module_function` (`func_id`, `function_url`, `function_name`, `module_name`, `maker_id`, `maker_date`, `author_id`, `author`, `status`, `function_group`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `author_date`) VALUES
(3, '../user/add_Account', 'New Account', '10', NULL, NULL, NULL, NULL, 'A', 'Account', '', '', '', '', '0000-00-00'),
(4, 'manage_account', 'Manage Account', '10', NULL, NULL, NULL, NULL, 'A', 'Account', '', '', '', '', '0000-00-00'),
(5, 'send_mail', 'Send New Mail', '1', NULL, NULL, NULL, NULL, 'A', 'Mail', '', '', '', '', '0000-00-00'),
(89, 'Report/report_function', 'Report', '25', NULL, NULL, NULL, NULL, 'A', '', '', '', '', '', '0000-00-00'),
(90, '../master/logout', 'Logout ', '7', NULL, NULL, NULL, NULL, 'A', '', '', '', '', '', '0000-00-00'),
(91, 'admin/enterprise/add_enterprise', 'New Enterprise', '4', NULL, NULL, NULL, NULL, 'A', 'Enterprise', '', '', '', '', '0000-00-00'),
(93, 'admin/enterprise/manage_enterprise', 'Manage Enterprise', '4', NULL, NULL, NULL, NULL, 'A', 'Enterprise', '', '', '', '', '0000-00-00'),
(95, 'admin/region/add_region', 'New Region', '4', NULL, NULL, NULL, NULL, 'A', 'Region', '', '', '', '', '0000-00-00'),
(97, 'admin/region/manage_region', 'Manage Region', '4', NULL, NULL, NULL, NULL, 'A', 'Region', '', '', '', '', '0000-00-00'),
(99, 'admin/branch/add_branch', 'New Branch', '4', NULL, NULL, NULL, NULL, 'A', 'Branch', '', '', '', '', '0000-00-00'),
(101, 'admin/branch/manage_branch', 'Manage Branch', '4', NULL, NULL, NULL, NULL, 'A', 'Branch', '', '', '', '', '0000-00-00'),
(103, 'admin/wing/add_wing', 'New Wing/Department', '4', NULL, NULL, NULL, NULL, 'A', 'Wing/Department', '', '', '', '', '0000-00-00'),
(105, 'admin/wing/manage_Wing', 'Manage Wing/Department', '4', NULL, NULL, NULL, NULL, 'A', 'Wing/Department', '', '', '', '', '0000-00-00'),
(107, 'admin/role/add_role', 'New Role', '4', NULL, NULL, NULL, NULL, 'A', 'Role', '', '', '', '', '0000-00-00'),
(109, 'admin/role/manage_role', 'Manage Role', '4', NULL, NULL, NULL, NULL, 'A', 'Role', '', '', '', '', '0000-00-00'),
(111, 'admin/rolefunction/role_function_action', 'Role Function Action', '4', NULL, NULL, NULL, NULL, 'A', '', '', '', '', '', '0000-00-00'),
(113, 'admin/user/add_user', 'New User', '4', NULL, NULL, NULL, NULL, 'A', 'Users', '', '', '', '', '0000-00-00'),
(115, 'admin/user/manage_user', 'Manage Users', '4', NULL, NULL, NULL, NULL, 'A', 'Users', '', '', '', '', '0000-00-00'),
(117, 'admin/mapuser/map_user_role', 'Add User Role', '4', NULL, NULL, NULL, NULL, 'A', 'User Role', '', '', '', '', '0000-00-00'),
(141, 'kjmd2wh/oifr', 'ADD', '13', NULL, NULL, NULL, NULL, 'A', 'emp', NULL, NULL, NULL, NULL, NULL),
(166, 'admin/masterdata/add_master_data', 'Add Generic Param', '4', NULL, NULL, NULL, NULL, 'A', 'Master Data', NULL, NULL, NULL, NULL, NULL),
(167, 'admin/masterdata/manage_master_data', 'Manage Master Data', '4', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(189, 'admin/mapuser/mapped_user_role', 'Manage User Role', '4', NULL, NULL, NULL, NULL, 'A', 'User Role', NULL, NULL, NULL, NULL, NULL),
(209, 'master/Item/add_item', 'Add Product', '3', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(215, 'master/ProductCategory/manage_itemctg', 'Manage Product Category', '3', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(221, 'master/Item/manage_item', 'Manage Product', '3', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(224, 'master/ProductCategory/add_itemctg', 'Add Product Group', '3', NULL, NULL, NULL, NULL, 'A', 'Product Group', NULL, NULL, NULL, NULL, NULL),
(256, 'master/AccountGroup/add_account', 'Add Account Group', '3', NULL, NULL, NULL, NULL, 'A', 'Account Group', NULL, NULL, NULL, NULL, NULL),
(263, 'master/Account/add_contact', 'Add Contact', '3', NULL, NULL, NULL, NULL, 'A', 'Contact', NULL, NULL, NULL, NULL, NULL),
(264, 'master/Contact/manage_contact', 'Manage Contact', '3', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(287, '../billing/add_product_quantity', 'Add Product Quantity', '19', NULL, NULL, NULL, NULL, 'A', '', '', '', '', '', '0000-00-00'),
(289, '../billing/sale2', 'Manage Fabricator', '3', NULL, NULL, NULL, NULL, 'A', '', '', '', '', '', '0000-00-00'),
(291, '../production/manage_template', 'Manage Template', '26', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(292, '../production/manage_production', 'Manage Production', '26', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(293, 'purchaseorder/PurchaseOrder/managePurchaseOrder', 'Manage Purchase Order', '27', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(294, 'Invoice/Invoice/manageInvoice', 'Manage Invoice', '28', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(303, 'StockRefill/add_multiple_qty', 'Add Multiple Quantity', '30', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(305, 'Quotation/manageQuotation', 'Manage Quotation', '31', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(312, 'BalanceSheet/balanceSheetPay', 'Balance Sheet', '32', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(313, 'VendorHistoryPrice/vendor_history_price_function', 'Vendor Price List History', '2722', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(314, 'master/termandcondition/manage_termandcondition', 'Manage Term & Condition', '3', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(316, 'Payment/PaymentReceived/payment_amount', 'Received', '23', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(317, 'Payment/Payment/payment_amount', 'Payment', '23', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(318, 'salesorder/SalesOrder/price_history', 'Customer Price History', '2888', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(319, 'Quotation/price_history', 'Manage Price History', '3122', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(320, 'master/CreateCommunication/manage_letterhead', 'Manage Communication', '3', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(322, 'master/Letterhead/manage_letterhead?letter=letter', 'Manage Letter Head', '3', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(323, 'master/CreateCase/manage_case', 'Manage Case', '3', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(324, 'authorization/manage_authorization', 'Manage Authorization', '33', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(325, 'salesordernew/SalesOrderNew/managePurchaseOrder', 'Manage Sales Order', '34', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(327, 'salesordernew/SalesOrderNew/price_history', 'Price List', '3444', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(328, 'ManageCaseStatus/ManageCaseStatus/manageFinalOfferSent', 'Show Final Offer Sent', '35', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(329, 'ManageCaseStatus/ManageCaseStatus/manageSaleOrderReceived', 'Show Sale Order Received', '35', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(330, 'ManageCaseStatus/ManageCaseStatus/managePurchaseOrderSent', 'Show Purchase Order Sent', '35', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(331, 'ManageCaseStatus/ManageCaseStatus/manageInvoiceRaised', 'Show Invoice Raised', '35', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL),
(332, 'ManageCaseStatus/ManageCaseStatus/managePaymentReceived', 'Show Payment Received', '35', NULL, NULL, NULL, NULL, 'A', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_mst`
--

CREATE TABLE `tbl_module_mst` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(200) NOT NULL,
  `Order_id` int(11) DEFAULT '0',
  `status` varchar(200) DEFAULT 'A',
  `module_url` varchar(2000) DEFAULT '#',
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_module_mst`
--

INSERT INTO `tbl_module_mst` (`module_id`, `module_name`, `Order_id`, `status`, `module_url`, `maker_id`, `author_id`, `maker_date`, `author_date`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(3, 'Master', 2, 'A', '#', '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(4, 'Admin Setup', 1, 'A', '#', '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(7, 'Logout', 14, 'A', '#', '', '', '0000-00-00', '0000-00-00', '', '', '', ''),
(19, 'Billing', 3, 'hiii', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Payment', 5, 'hhh', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Report', 9, 'A', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Production', 3, 'hhh', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Purchase Order', 4, 'A', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Invoice', 6, 'A', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Stock Refill', 4, 'hh', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Quotation', 4, 'A', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Account', 4, 'hh', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Authorizations\r\n', 8, 'A', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Sales Order', 5, 'A', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Manage Case Id Status', 3, 'A', '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_case`
--

CREATE TABLE `tbl_new_case` (
  `new_case_id` int(200) NOT NULL,
  `vendor_id` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `case_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `action_status` varchar(200) DEFAULT 'Budgetary-Offer-Sent',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_new_case`
--

INSERT INTO `tbl_new_case` (`new_case_id`, `vendor_id`, `customer_id`, `case_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `action_status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '2', '1', 'S/0001', '1', '2017-09-07', '1', '2017-09-07', 'A', 'Invoice-Raised', '1', '1', '1', '1'),
(2, '2', '1', 'S/0002', '1', '2017-09-08', '1', '2017-09-08', 'A', 'Purchase-Order-Sent', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_invoice`
--

CREATE TABLE `tbl_new_invoice` (
  `invoice_id` int(11) NOT NULL,
  `case_id` varchar(200) DEFAULT NULL,
  `invoice_no` varchar(200) DEFAULT NULL,
  `n_date` date DEFAULT NULL,
  `basic_amt` varchar(200) DEFAULT NULL,
  `tax` varchar(200) DEFAULT NULL,
  `total_amt` varchar(200) DEFAULT NULL,
  `invoice_image` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) NOT NULL,
  `maker_date` varchar(200) NOT NULL,
  `author_date` varchar(200) NOT NULL,
  `comp_id` varchar(200) NOT NULL,
  `zone_id` varchar(200) NOT NULL,
  `brnh_id` varchar(200) NOT NULL,
  `choose_status` varchar(200) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_new_invoice`
--

INSERT INTO `tbl_new_invoice` (`invoice_id`, `case_id`, `invoice_no`, `n_date`, `basic_amt`, `tax`, `total_amt`, `invoice_image`, `maker_id`, `maker_date`, `author_date`, `comp_id`, `zone_id`, `brnh_id`, `choose_status`) VALUES
(1, 'S/0001', '4532323', '2017-09-07', '12000', '18', '15000', '1504784964_1502440654_951805047_dt-09.08.2017.pdf', '1', '17-09-07', '17-09-07', '1', '1', '1', 'A'),
(2, 'S/0001', '985419541', '2017-09-01', '5256263', '616', '332156', '1504865651_CORRECTIONS_PO FORMAT.JPG', '1', '17-09-08', '17-09-08', '1', '1', '1', 'A'),
(3, 'S/0001', '1234', '2017-09-10', '12000', '100', '12000', '1505057470_Desert.jpg', '1', '17-09-10', '17-09-10', '1', '1', '1', 'A'),
(4, 'S/0002', '4234', '2017-09-10', '234564361', '10', '23456436.1', '1505062805_Desert.jpg', '1', '17-09-10', '17-09-10', '1', '1', '1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opening_stock_mst`
--

CREATE TABLE `tbl_opening_stock_mst` (
  `opening_stock_id` int(200) NOT NULL,
  `material_centre` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `maker_date` date NOT NULL,
  `author_date` date NOT NULL,
  `author_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) NOT NULL,
  `divn_id` varchar(200) NOT NULL,
  `comp_id` varchar(200) NOT NULL,
  `zone_id` varchar(200) NOT NULL,
  `brnh_id` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_opening_stock_mst`
--

INSERT INTO `tbl_opening_stock_mst` (`opening_stock_id`, `material_centre`, `qty`, `amount`, `maker_date`, `author_date`, `author_id`, `maker_id`, `divn_id`, `comp_id`, `zone_id`, `brnh_id`, `status`) VALUES
(1, 'jank', '', '', '2016-06-25', '2016-06-25', '21', '21', '1', '1', '1', '1', 'A'),
(2, 'jank', '', '', '2016-06-25', '2016-06-25', '21', '21', '1', '1', '1', '1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `invoice_rid` int(200) NOT NULL,
  `contact_id` varchar(200) NOT NULL,
  `total_billamt` varchar(200) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_mode_value` varchar(225) NOT NULL,
  `zone_id` varchar(225) NOT NULL,
  `brnh_id` varchar(225) NOT NULL,
  `divn_id` varchar(225) NOT NULL,
  `maker_id` varchar(200) NOT NULL,
  `maker_date` varchar(200) NOT NULL,
  `author_date` date NOT NULL,
  `comp_id` varchar(200) NOT NULL,
  `author_id` varchar(225) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_log`
--

CREATE TABLE `tbl_payment_log` (
  `p_id` int(11) NOT NULL,
  `all_id` varchar(200) DEFAULT NULL,
  `case_id` varchar(200) DEFAULT NULL,
  `date` varchar(200) NOT NULL,
  `ref_no` varchar(200) DEFAULT NULL,
  `total_amount` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) NOT NULL,
  `maker_date` varchar(200) NOT NULL,
  `comp_id` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `choose_status` varchar(200) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_log`
--

INSERT INTO `tbl_payment_log` (`p_id`, `all_id`, `case_id`, `date`, `ref_no`, `total_amount`, `maker_id`, `maker_date`, `comp_id`, `status`, `choose_status`) VALUES
(1, '6', 'S/0002', '2017-09-10 16:47:31', 'AEPL/S/0002/17-18/S/0018', '38421.00', '1', '17-09-10', '1', 'Purchaseorder', 'A'),
(2, '7', 'S/0001', '2017-09-10 16:56:47', 'AEPL/S/0001/17-18/S/0019', '138631.50', '1', '17-09-10', '1', 'Purchaseorder', 'A'),
(3, '5', 'S/0001', '2017-09-10 17:07:11', 'AEPL/S/0001/17-18/S/0020', '576328.50', '1', '17-09-10', '1', 'Quotation', 'A'),
(4, '4', 'S/0002', '2017-09-10 17:20:14', 'AEPL/S/0002/17-18/NTPC Parichha/0021', '242217.00', '1', '17-09-10', '1', 'SaleOrdernew', 'A'),
(5, '3', 'S/0001', '2017-09-10 17:31:10', '', '12000', '1', '17-09-10', '1', 'Invoice', 'A'),
(6, '2', 'S/0002', '2017-09-10 17:55:40', NULL, NULL, '1', '17-09-10', '1', 'Purchase-Order-Sent', 'A'),
(7, '1', 'S/0001', '2017-09-10 17:57:46', NULL, NULL, '1', '17-09-10', '1', 'Invoice-Raised', 'A'),
(8, '4', 'S/0002', '2017-09-10 19:00:05', NULL, '23456436.1', '1', '17-09-10', '1', 'Invoice', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_stock_in`
--

CREATE TABLE `tbl_po_stock_in` (
  `poid` int(200) NOT NULL,
  `fpoid` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `brnch_id` varchar(200) DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `pid` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po_stock_in`
--

INSERT INTO `tbl_po_stock_in` (`poid`, `fpoid`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `brnch_id`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `pid`, `qty`) VALUES
(1, '2', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, '3', '1'),
(2, '3', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, '4', '1'),
(3, '3', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, '5', '1'),
(4, '4', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, '6', '1'),
(5, '5', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodcatg_m`
--

CREATE TABLE `tbl_prodcatg_m` (
  `product_Catid` int(11) NOT NULL,
  `categoryName` varchar(200) DEFAULT NULL,
  `industryid` varchar(200) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `main_category_id` varchar(200) DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `group_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodcatg_m`
--

INSERT INTO `tbl_prodcatg_m` (`product_Catid`, `categoryName`, `industryid`, `Description`, `status`, `maker_id`, `maker_date`, `author_id`, `author_date`, `main_category_id`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `group_name`) VALUES
(1, 'Dps GGN', '', '', 'A', '21', '2016-01-09', '21', '2016-01-09', '', '1', '1', '1', '1', ''),
(2, 'DPS S.LOK.', '', '', 'A', '21', '2016-01-09', '21', '2016-01-09', '', '1', '1', '1', '1', ''),
(3, 'DPS M.K', '', '', 'A', '21', '2016-01-09', '21', '2016-01-09', '', '1', '1', '1', '1', ''),
(4, 'DPS V.K', '', '', 'A', '21', '2016-01-09', '21', '2016-01-09', '', '1', '1', '1', '1', ''),
(8, 'SHALOM', '', '', 'A', '21', '2016-01-09', '21', '2016-01-09', '', '1', '1', '1', '1', ''),
(10, 'Amity', '', '', 'A', '21', '2016-01-09', '21', '2016-01-09', '', '1', '1', '1', '1', ''),
(11, 'SFS', '', '', 'A', '21', '2016-01-09', '21', '2016-01-09', '', '1', '1', '1', '1', ''),
(12, 'Pinecrest', '', '', 'A', '21', '2016-01-09', '21', '2016-01-09', '', '1', '1', '1', '1', ''),
(15, 'SRGS GGN', '', '', 'A', '21', '2016-01-09', '21', '2016-01-09', '', '1', '1', '1', '1', ''),
(18, 'SHALOM', '', '', 'I', '36', '2016-01-28', '36', '2016-01-28', '', '3', '21', '4', '', ''),
(19, 'DPS', '', '', 'A', '21', '2016-01-30', '21', '2016-01-30', '', '1', '1', '1', '1', ''),
(20, 'DPS 45', '', '', 'A', '21', '2016-02-01', '21', '2016-02-01', '', '1', '1', '1', '1', ''),
(21, 'INDUS', '', '', 'A', '21', '2016-02-01', '21', '2016-02-01', '', '1', '1', '1', '1', ''),
(22, 'CBPS', '', '', 'A', '21', '2016-02-01', '21', '2016-02-01', '', '1', '1', '1', '1', ''),
(23, 'GURUGRAM', '', '', 'A', '21', '2016-02-01', '21', '2016-02-01', '', '1', '1', '1', '1', ''),
(24, 'GOLDEN HEIGHT', '', '', 'A', '21', '2016-02-01', '21', '2016-02-01', '', '1', '1', '1', '1', ''),
(25, 'RYAN', '', '', 'A', '21', '2016-02-01', '21', '2016-02-01', '', '1', '1', '1', '1', ''),
(26, 'PLAIN', '', '', 'A', '21', '2016-02-08', '21', '2016-02-08', '', '1', '1', '1', '1', ''),
(27, 'HOUSE SOCKS', '', '', 'A', '21', '2016-02-08', '21', '2016-02-08', '', '1', '1', '1', '1', ''),
(28, 'C.SHORTS', '', '', 'A', '21', '2016-02-08', '21', '2016-02-08', '', '1', '1', '1', '1', ''),
(29, 'LABCOATS', '', '', 'A', '21', '2016-02-08', '21', '2016-02-08', '', '1', '1', '1', '1', ''),
(30, 'SURAJ(BABAL)', '', '', 'A', '21', '2016-02-09', '21', '2016-02-09', '', '1', '1', '1', '1', ''),
(31, 'SURAJ(BHIWADI)', '', '', 'A', '21', '2016-02-09', '21', '2016-02-09', '', '1', '1', '1', '1', ''),
(32, 'SURAJ(RIWARI)', '', '', 'A', '21', '2016-02-09', '21', '2016-02-09', '', '1', '1', '1', '1', ''),
(33, 'SURAJ(PATAUDI)', '', '', 'A', '21', '2016-02-09', '21', '2016-02-09', '', '1', '1', '1', '1', ''),
(34, 'SURAJ(KOSLI)', '', '', 'A', '21', '2016-02-09', '21', '2016-02-09', '', '1', '1', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodcatg_mst`
--

CREATE TABLE `tbl_prodcatg_mst` (
  `prodcatg_id` int(11) NOT NULL,
  `main_prodcatg_id` int(11) DEFAULT NULL,
  `prodcatg_name` varchar(200) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `printname` varchar(255) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodcatg_mst`
--

INSERT INTO `tbl_prodcatg_mst` (`prodcatg_id`, `main_prodcatg_id`, `prodcatg_name`, `alias`, `printname`, `Description`, `status`, `maker_id`, `author_id`, `maker_date`, `author_date`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(121, 1, '', '0', '0', '', 'A', '1', '1', '2017-06-05', '2017-06-05', '1', '1', '1', '1'),
(155, 121, 'REMI SALES', '', '', '', 'A', '1', '1', '2017-06-05', '2017-06-05', '1', '1', '1', '1'),
(156, 121, 'IYAPPAN ENGINEERING INDUSTRIES PRIVATE LIMITED', '', '', '', 'A', '1', '1', '2017-06-05', '2017-06-05', '1', '1', '1', '1'),
(157, 121, 'IDEAL FLOW CONTROL PVT. LTD', '', '', '', 'A', '1', '1', '2017-06-06', '2017-06-06', '1', '1', '1', '1'),
(158, 121, 'IT CONCEPTS ', '', '', '', 'A', '1', '1', '2017-06-05', '2017-06-05', '1', '1', '1', '1'),
(159, 121, 'COLE PALMER', '', '', '', 'A', '1', '1', '2017-06-05', '2017-06-05', '1', '1', '1', '1'),
(160, 121, 'DEMECH CHEMICALS ', '', '', '', 'A', '1', '1', '2017-06-05', '2017-06-05', '1', '1', '1', '1'),
(161, 121, 'IYAPPAN SERVO SYSTEM', '', '', 'IYAPPAN SERVO SYSTEM', 'A', '1', '1', '2017-06-06', '2017-06-06', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_producttype_m`
--

CREATE TABLE `tbl_producttype_m` (
  `Product_typeid` int(11) NOT NULL,
  `categoryName` varchar(200) DEFAULT NULL,
  `Product_Catid` varchar(200) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_producttype_m`
--

INSERT INTO `tbl_producttype_m` (`Product_typeid`, `categoryName`, `Product_Catid`, `Description`, `status`, `maker_id`, `author_id`, `maker_date`, `author_date`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, 'Shirts', '1', '', 'A', '21', '21', '2016-01-09', '2016-01-09', '1', '1', '1', '1'),
(2, 'Pant', '1', '', 'A', '21', '21', '2016-01-09', '2016-01-09', '1', '1', '1', '1'),
(3, 'Coat', '1', '', 'A', '21', '21', '2016-01-09', '2016-01-09', '1', '1', '1', '1'),
(4, 'Coat', '8', '', 'A', '21', '21', '2016-01-09', '2016-01-09', '1', '1', '1', '1'),
(5, 'Shirt full s', '8', '', 'A', '21', '21', '2016-01-09', '2016-01-09', '1', '1', '1', '1'),
(6, 'Track suit', '8', '', 'A', '21', '21', '2016-01-09', '2016-01-09', '1', '1', '1', '1'),
(7, 'Shirts', '8', '', 'A', '21', '21', '2016-01-09', '2016-01-09', '1', '1', '1', '1'),
(8, 'Pant', '8', '', 'A', '21', '21', '2016-01-09', '2016-01-09', '1', '1', '1', '1'),
(9, 'Socks', '8', '', 'A', '21', '21', '2016-01-09', '2016-01-09', '1', '1', '1', '1'),
(10, 'Sweater', '8', '', 'A', '21', '21', '2016-01-09', '2016-01-09', '1', '1', '1', '1'),
(11, 'sweter', '1', '', 'A', '21', '21', '2016-01-11', '2016-01-11', '1', '1', '1', '1'),
(12, 'socks', '1', '', 'A', '21', '21', '2016-01-11', '2016-01-11', '1', '1', '1', '1'),
(13, 'tshirt', '8', '', 'A', '21', '21', '2016-01-11', '2016-01-11', '1', '1', '1', '1'),
(14, 'Tie', '8', '', 'A', '21', '21', '2016-01-16', '2016-01-16', '1', '1', '1', '1'),
(15, 'c', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(16, 'coat', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(17, 'shirts full seleves', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(18, 'kurta', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(19, 'salwar', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(20, 'pant', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(21, 'Nur-jacket', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(22, 'so', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(23, 'socks', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(24, 'sweater po', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(25, 'sweater sl', '10', '', 'A', '21', '21', '2016-01-21', '2016-01-21', '1', '1', '1', '1'),
(26, 'Coat', '18', '', 'A', '36', '36', '2016-01-28', '2016-01-28', '3', '21', '4', ''),
(27, 'Shirt full s', '18', '', 'A', '36', '36', '2016-01-28', '2016-01-28', '3', '21', '4', ''),
(28, 'SHIRT(H/S)', '20', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(29, 'PANT', '20', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(30, 'FROCK', '20', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(31, 'SOCKS', '20', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(32, 'BELT', '20', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(33, 'SHIRT[NUR]', '20', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(34, 'SHORT', '20', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(35, 'SKIRT', '20', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(36, 'SHIRT(H/S)', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(37, 'SHORT', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(38, 'LOWER COTTON', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(39, 'T-SHIRT[NUR]TO 2ND', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(40, 'SHORT MAROON', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(41, 'SKIRT-MAROON', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(42, 'HOUSE-T-SHIRT', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(43, 'SOCKS-N-BLUE', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(44, 'BELT-N-BLUE', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(45, 'SOCKS-MAROON', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(46, 'BELT-MAROON', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(47, 'PANT', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(48, 'SKIRT-KHAKI', '21', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(49, 'SHIRT(H/S)', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(50, 'SHORT', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(51, 'FROCK', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(52, 'HOUSE T-SHIRT(G)', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(53, 'HOUSE T-SHIRT(R)', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(54, 'HOUSE T-SHIRT(Y)', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(55, 'HOUSET-SHIRT(B)', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(56, 'BELT', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(57, 'SHIRT-(NUR)', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(58, 'SKIRT', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(59, 'T-SHIRT(H/S)', '15', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(60, 'SHORT', '15', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(61, 'SKIRT', '15', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(62, 'SOCKS', '15', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(63, 'BELT', '15', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(64, 'LOWER COTTON', '15', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(65, 'SHIRT(H/S)', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(66, 'SHORT', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(67, 'PANT', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(68, 'SKIRT', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(69, 'HOUSE T-SHIRT(G)', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(70, 'HOUSE T-SHIRT(Y)', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(71, 'HOUSET-SHIRT(B)', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(72, 'SOCKS', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(73, 'BELT', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(74, 'SHORT-(NUR)', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(75, 'SKIRT-(NUR)', '12', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(76, 'SHIRT(H/S)', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(77, 'SHORT', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(78, 'SKIRT', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(79, 'HOUSE T-SHIRT(G)', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(80, 'HOUSE T-SHIRT(R)', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(81, 'HOUSE T-SHIRT(Y)', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(82, 'HOUSET-SHIRT(B)', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(83, 'BELT', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(84, 'SHORT-(NUR)', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(85, 'SKIRT-(NUR)', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(86, 'T-SHIRT(NUR)', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(87, 'LOWER COTTON', '8', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(88, 'SHIRT(H/S)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(89, 'PANT', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(90, 'FROCK', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(91, 'SOCKS', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(92, 'BELT', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(93, 'SHORT', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(94, 'SKIRT', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(95, 'SHIRT(NUR,BOY)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(96, 'SHIRT(NUR,GIRL)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(97, 'SHORT(NUR,BOY)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(98, 'SKIRT(NUR,GIRL)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(99, 'HOUSE T-SHIRT(G)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(100, 'HOUSE T-SHIRT(R)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(101, 'HOUSE T-SHIRT(Y)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(102, 'HOUSET-SHIRT(B)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(103, 'HOUSET-SHIRT(O)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(104, 'HOUSET-SHIRT(P)', '2', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(105, 'SHIRT(H/S)', '4', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(106, 'PANT', '4', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(107, 'SOCKS', '4', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(108, 'BELT', '4', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(109, 'SHORT', '4', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(110, 'SKIRT', '4', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(111, 'PANT', '3', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(112, 'SOCKS', '3', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(113, 'BELT', '3', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(114, 'SHORT', '3', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(115, 'SKIRT', '3', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(116, 'TSHIRT(H/S)M.K', '3', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(117, 'SHIRT(H/S)', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(118, 'SHORT', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(119, 'FROCK(NUR)SFS', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(120, 'HOUSE T-SHIRT(G)', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(121, 'HOUSE T-SHIRT(R)', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(122, 'HOUSE T-SHIRT(GRY)', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(123, 'HOUSET-SHIRT(B)', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(124, 'PANT', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(125, 'SKIRT', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(126, 'SOCKS', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(127, 'BELT', '11', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(128, 'PANT', '22', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(129, 'SKIRT', '22', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(130, 'SOCKS', '22', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(131, 'BELT', '22', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(132, 'SHIRT(H/S)', '22', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(133, 'SHORT', '22', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(134, 'SHIRT(H/S)', '23', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(135, 'PANT', '23', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(136, 'SHORT', '23', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(137, 'SKIRT', '23', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(138, 'SOCKS', '23', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(139, 'BELT', '23', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(140, 'HOUSE T-SHIRT(G)', '23', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(141, 'HOUSE T-SHIRT(R)', '23', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(142, 'HOUSE T-SHIRT(Y)', '23', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(143, 'HOUSET-SHIRT(B)', '23', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(144, 'SHIRT(H/S)', '24', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(145, 'PANT', '24', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(146, 'SHORT', '24', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(147, 'SKIRT', '24', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(148, 'SOCKS', '24', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(149, 'BELT', '24', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(150, 'SHORTS(NUR)', '24', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(151, 'SHIRT(H/S)', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(152, 'PANT', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(153, 'SHORT', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(154, 'SKIRT', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(155, 'SOCKS', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(156, 'BELT', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(157, 'TIE', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(158, 'HOUSET-SHIRT(G)', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(159, 'HOUSE T-SHIRT(R)', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(160, 'HOUSE T-SHIRT(Y)', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(161, 'HOUSET-SHIRT(B)', '25', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(162, 'WHITE-PANT-AMITY', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(163, 'WHITE-SHORT-AMITY', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(164, 'WHITE-SKIRT-AMITY', '10', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(165, 'SHORT[NUR]', '20', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(166, 'FROCK[NUR]', '20', '', 'A', '21', '21', '2016-02-01', '2016-02-01', '1', '1', '1', '1'),
(167, 'SHORT-(NUR)', '10', '', 'A', '21', '21', '2016-02-03', '2016-02-03', '1', '1', '1', '1'),
(168, 'SHIRT(FS)', '10', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(169, 'SWEATER', '10', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(170, 'JACKET', '10', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(171, 'TIE', '10', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(172, 'SHIRT(FS)', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(173, 'PANT', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(174, 'SWEATER', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(175, 'SKIRTS', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(176, 'TUNIC', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(177, 'TIE', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(178, 'BELT', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(179, 'SOCKS', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(180, 'TSHIRT(FS)', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(181, 'LOWER', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(182, 'JACKET', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(183, 'TSHIRT(FS)', '2', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(184, 'PANT(NUR)', '2', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(185, 'JACKET', '2', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(186, 'SWEATER(NUR)', '2', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(187, 'PANT(S.LOK)', '2', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(188, 'SWEATER(SLOK)', '2', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(189, 'TUNIC(SLOK)', '2', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(190, 'TSHIRT(FS)', '21', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(191, 'JACKETS', '21', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(192, 'LOWER', '21', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(193, 'SWEATER', '21', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(194, 'SOCKS', '21', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(195, 'TSHIRT(FS)', '15', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(196, 'SWEAT-SHIRT', '15', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(197, 'JACKET&LOWER', '15', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(198, 'LOWER ONLY', '15', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(199, 'JACKET ONLY', '15', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(200, 'KARATE SET', '15', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(201, 'COAT', '19', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(202, 'COAT', '23', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(203, 'SHIRT(FS)', '23', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(204, 'SWEATER', '23', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(205, 'TIE', '23', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(206, 'COAT', '25', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(207, 'SHIRT(FS)', '25', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(208, 'SWEATER', '25', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(209, 'HOUSE TSHIRT', '25', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(210, 'COAT', '11', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(211, 'SHIRT(FS)', '11', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(212, 'SWEATER', '11', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(213, 'TIE', '11', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(214, 'TSHIRT(NUR)', '11', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(215, 'LOWER(NUR)', '11', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(216, 'JACKET(NUR)', '11', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(217, 'COAT', '22', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(218, 'SHIRT(FS)', '22', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(219, 'SWEATER', '22', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(220, 'TIE', '22', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(221, 'COAT', '24', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(222, 'SHIRT(FS)', '24', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(223, 'SWEATER', '24', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(224, 'TIE', '24', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(225, 'SHIRTS(FS)', '12', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(226, 'SWEATER', '12', '', 'A', '21', '21', '2016-02-04', '2016-02-04', '1', '1', '1', '1'),
(227, 'WHITE-PANT-TC', '26', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(228, 'WHITE SHIRT(H/S)', '26', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(229, 'WHITE SHORT', '26', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(230, 'WHITE SKIRT', '26', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(231, 'WHITE SOCKS', '26', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(232, 'HOUSE SOCKS(G)', '27', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(233, 'HOUSE SOCKS(B)', '27', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(234, 'HOUSE SOCKS(Y)', '27', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(235, 'HOUSE SOCKS(R.)', '27', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(236, 'C.SHORTS(WHITE)', '28', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(237, 'C.SHORTS(BLACK)', '28', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(238, 'LABCOAT WHITE', '28', '', 'A', '21', '21', '2016-02-08', '2016-02-08', '1', '1', '1', '1'),
(239, 'SHIRT CHECK', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(240, 'SHIRT WHITE', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(241, 'PANT GREY', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(242, 'PANT WHITE', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(243, 'GREY SHORT', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(244, 'WHITE SHORT', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(245, 'SHIRT CHECK (H/S)', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(246, 'WHITE SOCKS', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(247, 'GREY SOCKS', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(248, 'GREY BELT', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(249, 'GREY TIE', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(250, 'GREY SKIRT', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(252, 'LABCOAT WHITE', '29', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(253, 'WHITE SKIRT', '30', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(254, 'SHIRT CHECK', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(255, 'SHIRT WHITE', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(256, 'PANT GREY', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(257, 'PANT WHITE', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(258, 'GREY SHORT', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(259, 'WHITE SHORT', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(260, 'SHIRT CHECK (H/S)', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(261, 'WHITE SOCKS', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(262, 'GREY SOCKS', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(263, 'GREY BELT', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(264, 'GREY TIE', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(265, 'GREY SKIRT', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(266, 'WHITE SKIRT', '31', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(267, 'SHIRT LINING', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(268, 'SHIRT WHITE', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(269, 'PANT WHITE', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(270, 'PANT LINING', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(271, 'LINING SKIRT', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(272, 'WHITE SKIRT', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(273, 'NAVI BLUE SOCKS', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(274, 'BILTS', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(275, 'BELTS', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(276, 'TIE', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(277, 'NAVYORANGE SOCKS', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(278, 'NWSHORTS', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(279, 'NWSKIRTS', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(280, 'BLOOMERSKIRT', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(281, 'ORANGETSHIRT', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(282, 'LINING SHIRT', '32', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(283, 'SHIRT LINING', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(284, 'SHIRT WHITE', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(285, 'PANT WHITE', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(286, 'PANT LINING', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(287, 'LINING SKIRT', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(288, 'WHITE SKIRT', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(289, 'NAVI BLUE SOCKS', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(290, 'BELTS', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(291, 'TIE', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(292, 'NAVYORANGE SOCKS', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(293, 'NWSHORTS', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(294, 'NWSKIRTS', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(295, 'BLOOMERSKIRT', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(296, 'ORANGETSHIRT', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(297, 'LINING SHIRT', '33', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(298, 'SHIRT LINING', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(299, 'SHIRT WHITE', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(300, 'PANT WHITE', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(301, 'PANT LINING', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(302, 'LINING SKIRT', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(303, 'WHITE SKIRT', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(304, 'NAVI BLUE SOCKS', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(305, 'TIE', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(306, 'NAVYORANGE SOCKS', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(307, 'NWSHORTS', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(308, 'NWSKIRTS', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(309, 'BLOOMERSKIRT', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(310, 'ORANGETSHIRT', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(311, 'LINING SHIRT', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(312, 'KURTA SALWAR', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(313, 'BELT', '34', '', 'A', '21', '21', '2016-02-09', '2016-02-09', '1', '1', '1', '1'),
(314, 'NURSOCKS(BOY)', '20', '', 'A', '21', '21', '2016-02-11', '2016-02-11', '1', '1', '1', '1'),
(315, 'NURSOCKS(GIRL)', '20', '', 'A', '21', '21', '2016-02-11', '2016-02-11', '1', '1', '1', '1'),
(316, 'WHITE SOCK', '32', '', 'A', '21', '21', '2016-02-18', '2016-02-18', '1', '1', '1', '1'),
(317, 'WHITE SOCKS', '33', '', 'A', '21', '21', '2016-02-18', '2016-02-18', '1', '1', '1', '1'),
(318, 'WHITE SOCKS', '34', '', 'A', '21', '21', '2016-02-18', '2016-02-18', '1', '1', '1', '1'),
(319, 'SOCKS NUR', '8', '', 'A', '21', '21', '2016-02-18', '2016-02-18', '1', '1', '1', '1'),
(320, 'SOCKS NUR', '2', '', 'A', '21', '21', '2016-02-18', '2016-02-18', '1', '1', '1', '1'),
(321, 'SHIRT  (PRI NUR)', '20', '', 'A', '21', '21', '2016-02-18', '2016-02-18', '1', '1', '1', '1'),
(322, 'PRI NUR SHORT', '20', '', 'A', '21', '21', '2016-02-18', '2016-02-18', '1', '1', '1', '1'),
(323, 'PRE NUR FROCK', '20', '', 'A', '21', '21', '2016-02-18', '2016-02-18', '1', '1', '1', '1'),
(324, 'PINK BELT', '12', '', 'A', '21', '21', '2016-02-19', '2016-02-19', '1', '1', '1', '1'),
(325, 'PINK SOCKS', '12', '', 'A', '21', '21', '2016-02-19', '2016-02-19', '1', '1', '1', '1'),
(326, 'WHITE SKIRT', '10', '', 'A', '21', '21', '2016-02-19', '2016-02-19', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_serial`
--

CREATE TABLE `tbl_product_serial` (
  `serial_number` int(11) NOT NULL,
  `serialno` varchar(200) NOT NULL,
  `aval_status` varchar(100) NOT NULL,
  `serial_code` varchar(200) DEFAULT ' ',
  `product_id` varchar(200) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT '1',
  `location_id` varchar(200) DEFAULT NULL,
  `serial_status` varchar(200) DEFAULT NULL,
  `inmode` varchar(200) DEFAULT NULL,
  `color` varchar(200) NOT NULL,
  `incode` varchar(200) DEFAULT NULL,
  `outmode` varchar(200) DEFAULT NULL,
  `outcode` varchar(200) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `warranty_date` varchar(200) DEFAULT NULL,
  `expiry_date` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` datetime DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `no_of_tray` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_serial`
--

INSERT INTO `tbl_product_serial` (`serial_number`, `serialno`, `aval_status`, `serial_code`, `product_id`, `quantity`, `location_id`, `serial_status`, `inmode`, `color`, `incode`, `outmode`, `outcode`, `create_date`, `warranty_date`, `expiry_date`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `no_of_tray`, `weight`) VALUES
(1, '', '', ' ', '1', '14', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(2, '', '', ' ', '5', '-61', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(3, '', '', ' ', '', '-11', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(4, '', '', ' ', '6', '-91', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(5, '', '', ' ', '7', '-1', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(6, '', '', ' ', '2', '-1', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(7, '', '', ' ', '4', '-3', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(8, '', '', ' ', '8', '-1', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(9, '', '', ' ', '12', '0', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(10, '', '', ' ', '408', '1', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(11, '', '', ' ', '399', '7', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(12, '', '', ' ', '99', '-5', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(13, '', '', ' ', '432', '-1', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', ''),
(14, '', '', ' ', '430', '-1', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_serial_log`
--

CREATE TABLE `tbl_product_serial_log` (
  `serial_number` int(11) NOT NULL,
  `serialno` varchar(200) NOT NULL,
  `aval_status` varchar(100) NOT NULL,
  `serial_code` varchar(200) DEFAULT ' ',
  `product_id` varchar(200) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT '1',
  `color` varchar(250) NOT NULL,
  `location_id` varchar(200) DEFAULT NULL,
  `serial_status` varchar(200) DEFAULT NULL,
  `inmode` varchar(200) DEFAULT NULL,
  `incode` varchar(200) DEFAULT NULL,
  `outmode` varchar(200) DEFAULT NULL,
  `outcode` varchar(200) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `warranty_date` varchar(200) DEFAULT NULL,
  `expiry_date` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` datetime DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `no_of_tray` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_serial_log`
--

INSERT INTO `tbl_product_serial_log` (`serial_number`, `serialno`, `aval_status`, `serial_code`, `product_id`, `quantity`, `color`, `location_id`, `serial_status`, `inmode`, `incode`, `outmode`, `outcode`, `create_date`, `warranty_date`, `expiry_date`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `no_of_tray`, `weight`) VALUES
(1, '', '', ' ', '1', '20', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 12:48:04', '1', '2017-03-21 12:48:04', 'A', '1', '1', '1', '1', '', ''),
(2, '', '', ' ', '2', '10', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 12:48:04', '1', '2017-03-21 12:48:04', 'A', '1', '1', '1', '1', '', ''),
(3, '', '', ' ', '3', '100', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 12:48:04', '1', '2017-03-21 12:48:04', 'A', '1', '1', '1', '1', '', ''),
(4, '', '', ' ', '4', '20', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 12:48:05', '1', '2017-03-21 12:48:05', 'A', '1', '1', '1', '1', '', ''),
(5, '', '', ' ', '5', '10', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 12:48:05', '1', '2017-03-21 12:48:05', 'A', '1', '1', '1', '1', '', ''),
(6, '', '', ' ', '1', '10', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 12:59:15', '1', '2017-03-21 12:59:15', 'A', '1', '1', '1', '1', '', ''),
(7, '', '', ' ', '2', '20', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 12:59:15', '1', '2017-03-21 12:59:15', 'A', '1', '1', '1', '1', '', ''),
(8, '', '', ' ', '3', '30', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 12:59:15', '1', '2017-03-21 12:59:15', 'A', '1', '1', '1', '1', '', ''),
(9, '', '', ' ', '4', '10', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 12:59:15', '1', '2017-03-21 12:59:15', 'A', '1', '1', '1', '1', '', ''),
(10, '', '', ' ', '5', '40', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 12:59:16', '1', '2017-03-21 12:59:16', 'A', '1', '1', '1', '1', '', ''),
(11, '', '', ' ', '1', '10', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 13:10:20', '1', '2017-03-21 13:10:20', 'A', '1', '1', '1', '1', '', ''),
(12, '', '', ' ', '2', '20', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 13:10:21', '1', '2017-03-21 13:10:21', 'A', '1', '1', '1', '1', '', ''),
(13, '', '', ' ', '3', '30', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 13:10:21', '1', '2017-03-21 13:10:21', 'A', '1', '1', '1', '1', '', ''),
(14, '', '', ' ', '4', '10', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 13:10:21', '1', '2017-03-21 13:10:21', 'A', '1', '1', '1', '1', '', ''),
(15, '', '', ' ', '5', '20', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 13:10:21', '1', '2017-03-21 13:10:21', 'A', '1', '1', '1', '1', '', ''),
(16, '', '', ' ', '1', '10', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 13:18:33', '1', '2017-03-21 13:18:33', 'A', '1', '1', '1', '1', '', ''),
(17, '', '', ' ', '2', '20', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 13:18:33', '1', '2017-03-21 13:18:33', 'A', '1', '1', '1', '1', '', ''),
(18, '', '', ' ', '3', '30', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 13:18:33', '1', '2017-03-21 13:18:33', 'A', '1', '1', '1', '1', '', ''),
(19, '', '', ' ', '4', '40', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 13:18:34', '1', '2017-03-21 13:18:34', 'A', '1', '1', '1', '1', '', ''),
(20, '', '', ' ', '5', '20', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 13:18:34', '1', '2017-03-21 13:18:34', 'A', '1', '1', '1', '1', '', ''),
(21, '', '', ' ', '1', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-03-21 00:00:00', NULL, '2017-03-21 00:00:00', 'A', '1', '1', '1', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_stock`
--

CREATE TABLE `tbl_product_stock` (
  `Product_id` int(11) NOT NULL,
  `sku_no` varchar(200) DEFAULT NULL,
  `qtyinstock` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `part_no` varchar(200) NOT NULL,
  `productctg_id` varchar(200) DEFAULT NULL,
  `Product_typeid` varchar(200) DEFAULT NULL,
  `templateid` varchar(200) NOT NULL DEFAULT '0',
  `manufacturer_id` varchar(200) DEFAULT NULL,
  `productname` varchar(200) DEFAULT NULL,
  `category` varchar(200) NOT NULL,
  `under_group` varchar(200) NOT NULL,
  `serialno` varchar(200) DEFAULT NULL,
  `unitprice_purchase` varchar(200) DEFAULT NULL,
  `hsn_code` varchar(200) DEFAULT NULL,
  `gst_tax` varchar(200) DEFAULT NULL,
  `unitprice_sale` varchar(200) DEFAULT NULL,
  `usageunit` varchar(255) NOT NULL,
  `pic_per_box` varchar(200) NOT NULL,
  `mrp` varchar(255) NOT NULL,
  `product_image` varchar(225) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_stock`
--

INSERT INTO `tbl_product_stock` (`Product_id`, `sku_no`, `qtyinstock`, `quantity`, `part_no`, `productctg_id`, `Product_typeid`, `templateid`, `manufacturer_id`, `productname`, `category`, `under_group`, `serialno`, `unitprice_purchase`, `hsn_code`, `gst_tax`, `unitprice_sale`, `usageunit`, `pic_per_box`, `mrp`, `product_image`, `maker_id`, `maker_date`, `author_id`, `author_date`, `type`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `color`, `size`, `status`) VALUES
(1, '255-44030-0001', '', '', '4.0mm 3.0m 0Degree (', NULL, NULL, '0', NULL, 'iTool DVR System 44-30', '158', '', NULL, '21345', '2323', '18', '213455', '6', '', '0', NULL, NULL, '2017-09-07', NULL, '2017-09-07', NULL, '1', '1', '1', '1', NULL, NULL, 'A'),
(2, '', '', '', 'STEP CONTROL UNIT-APL 6 ASSY', NULL, NULL, '0', NULL, 'STEP CONTROL UNIT-APL 6 ASSY', '156', '', NULL, '45000', '8402', '18', '55675', '5', '', '0', NULL, NULL, '2017-09-07', NULL, '2017-09-07', NULL, '1', '1', '1', '1', NULL, NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_stock_log`
--

CREATE TABLE `tbl_product_stock_log` (
  `stocklog_id` int(11) NOT NULL,
  `serialno` varchar(200) NOT NULL,
  `Product_id` varchar(600) DEFAULT NULL,
  `product_code` varchar(600) DEFAULT NULL,
  `productctg_id` varchar(600) DEFAULT NULL,
  `Product_typeid` varchar(600) DEFAULT NULL,
  `manufacturer_id` varchar(600) DEFAULT NULL,
  `product_name_hndi` varchar(600) DEFAULT NULL,
  `productname` varchar(600) DEFAULT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `price` varchar(600) DEFAULT NULL,
  `partno` varchar(600) DEFAULT NULL,
  `vendorid` varchar(600) DEFAULT NULL,
  `usageunit` varchar(600) DEFAULT NULL,
  `qtyperunit` varchar(600) DEFAULT NULL,
  `unitinstock` varchar(600) DEFAULT NULL,
  `qtyinstock` varchar(600) DEFAULT NULL,
  `qtyindemand` varchar(600) DEFAULT NULL,
  `reorderlevelqty` varchar(600) DEFAULT NULL,
  `unitprice_purchase` varchar(600) DEFAULT NULL,
  `vat_purchase` varchar(600) DEFAULT NULL,
  `st_purchase` varchar(600) DEFAULT NULL,
  `excise_purchase` varchar(600) DEFAULT NULL,
  `commission_purchase` varchar(600) DEFAULT NULL,
  `unitprice_sale` varchar(600) DEFAULT NULL,
  `vat_sale` varchar(600) DEFAULT NULL,
  `st_sale` varchar(600) DEFAULT NULL,
  `excise_sale` varchar(600) DEFAULT NULL,
  `commission_sale` varchar(600) DEFAULT NULL,
  `product_image` varchar(675) DEFAULT NULL,
  `maker_id` varchar(600) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(600) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(600) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `prev_qtyinstock` varchar(600) DEFAULT NULL,
  `total_qtyinstock` varchar(600) DEFAULT NULL,
  `log_id` double DEFAULT NULL,
  `mode` varchar(600) DEFAULT NULL,
  `warrenty_date` varchar(600) DEFAULT NULL,
  `expiry_date` varchar(600) DEFAULT NULL,
  `brnh_id` varchar(600) DEFAULT NULL,
  `comp_id` varchar(600) DEFAULT NULL,
  `zone_id` varchar(600) DEFAULT NULL,
  `divn_id` varchar(600) DEFAULT NULL,
  `type` varchar(600) DEFAULT 'Stock',
  `templateavailable` int(3) DEFAULT NULL,
  `product_nature` varchar(200) DEFAULT NULL,
  `product_type` varchar(200) DEFAULT NULL,
  `serial_no` varchar(200) DEFAULT NULL,
  `product_non_refondable` varchar(200) DEFAULT NULL,
  `pos_display_order` varchar(200) DEFAULT NULL,
  `assetason` varchar(200) DEFAULT NULL,
  `asset_as_on_vendor_cus` varchar(200) DEFAULT NULL,
  `asset_as_on_expected_date` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_stock_log`
--

INSERT INTO `tbl_product_stock_log` (`stocklog_id`, `serialno`, `Product_id`, `product_code`, `productctg_id`, `Product_typeid`, `manufacturer_id`, `product_name_hndi`, `productname`, `Description`, `price`, `partno`, `vendorid`, `usageunit`, `qtyperunit`, `unitinstock`, `qtyinstock`, `qtyindemand`, `reorderlevelqty`, `unitprice_purchase`, `vat_purchase`, `st_purchase`, `excise_purchase`, `commission_purchase`, `unitprice_sale`, `vat_sale`, `st_sale`, `excise_sale`, `commission_sale`, `product_image`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `date`, `prev_qtyinstock`, `total_qtyinstock`, `log_id`, `mode`, `warrenty_date`, `expiry_date`, `brnh_id`, `comp_id`, `zone_id`, `divn_id`, `type`, `templateavailable`, `product_nature`, `product_type`, `serial_no`, `product_non_refondable`, `pos_display_order`, `assetason`, `asset_as_on_vendor_cus`, `asset_as_on_expected_date`, `color`, `size`) VALUES
(1, 'dfghj', '34', 'gfd', NULL, '9', '', NULL, 'dfsgh', '', NULL, '', '', '1581', '42', '43', '100', '', '12', '1212', '', '', '', '', '121212', '', '', '', '', '', '21', '2015-12-08', '21', '2015-12-08', 'A', '2015-12-08 12:46:13', '', '100', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'dfghj', '34', 'gfd', NULL, '9', '', NULL, 'dfsgh', '', NULL, '', '', '1581', '42', '43', '100', '', '12', '1212', '', '', '', '', '121212', '', '', '', '', '', '21', '2015-12-08', '21', '2015-12-08', 'A', '2015-12-08 12:57:27', '99', '199', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '1230450', '35', '120', NULL, '8', '', NULL, 'tata', '', NULL, '', '', '1581', '100', '100', '100', '', '10', '123', '', '', '', '', '123456', '', '', '', '', '', '21', '2015-12-08', '21', '2015-12-08', 'A', '2015-12-08 13:02:01', '', '100', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '1230450', '35', '120', NULL, '8', '', NULL, 'tata', '', NULL, '', '', '1581', '100', '100', '50', '', '10', '123', '', '', '', '', '123456', '', '', '', '', '', '21', '2015-12-08', '21', '2015-12-08', 'A', '2015-12-08 13:02:38', '100', '150', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '145456', '1', 'code1', NULL, '1', '', NULL, 'Soft drink', '', NULL, '', '', '1581', '42', '43', '100', '', '12', '1212', '', '', '', '', '121212', '', '', '', '', '', '21', '2015-12-08', '21', '2015-12-08', 'A', '2015-12-08 15:12:44', '', '100', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '145456', '1', 'code1', NULL, '1', '', NULL, 'Soft drink', '', NULL, '', '', '1581', '42', '43', '100', '', '12', '20', '', '', '', '', '30', '', '', '', '', '', '21', '2015-12-08', '21', '2015-12-08', 'A', '2015-12-08 15:14:14', '100', '200', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '34234234234', '38', '342342342', NULL, '15', '', NULL, 'crystal vase', '', NULL, '', '', '1594', '4', '111', '1000', '', '1', '123', '', '', '', '', '500', '', '', '', '', '', '21', '2015-12-10', '21', '2015-12-10', 'A', '2015-12-10 12:15:46', '', '1000', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '52165165', '26', '5', NULL, '9', '', NULL, 'tfd', '', NULL, '', '', '1581', '42', '43', '100', '', '12', '1212', '', '', '', '', '121212', '', '', '', '', '', '21', '2015-12-10', '21', '2015-12-10', 'A', '2015-12-10 12:18:02', '', '100', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '', '40', '01458', NULL, '2', '', NULL, 'tyu', '', NULL, '', '', '1594', '4', '111', '100', '', '1', '123', '', '', '', '', '500', '', '', '', '', '', '21', '2015-12-10', '21', '2015-12-10', 'A', '2015-12-10 12:18:26', '', '100', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '', '59', '8906063560500', NULL, '25', '', NULL, 'Crystal Decanter Bohemia', '', NULL, '', '', '1595', '', '', '100', '', '', '', '', '', '', '', '1295', '', '', '', '', '', '21', '2015-12-10', '21', '2015-12-10', 'A', '2015-12-10 18:26:03', '', '100', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '', '73', '0987654321', NULL, '21', '', NULL, 'Hi- Luxe Crystal Vase Crack Big', '', NULL, '', '', '1594', '4', '', '5000', '', '1', '123', '', '', '', '', '500', '', '', '', '', '', '21', '2015-12-11', '21', '2015-12-11', 'A', '2015-12-11 11:40:47', '', '5000', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '', '59', '8906063560500', NULL, '25', '', NULL, 'Crystal Decanter Bohemia', '', NULL, '', '', '1595', '', '', '200', '', '', '', '', '', '', '', '1295', '', '', '', '', '', '21', '2015-12-11', '21', '2015-12-11', 'A', '2015-12-11 12:32:24', '99', '299', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '', '1', '8906063560272', NULL, '7', '', NULL, 'Hi- Luxe Crystal Vase Crack Big', '', NULL, '', '', '1593', '', '', '100', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2015-12-11', '21', '2015-12-11', 'A', '2015-12-11 14:40:44', '', '100', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '', '1', '8906063560272', NULL, '7', '', NULL, 'Hi- Luxe Crystal Vase Crack Big', '', NULL, '', '', '1593', '', '', '100', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2015-12-11', '21', '2015-12-11', 'A', '2015-12-11 15:06:30', '90', '190', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '', '132', 'RD - 66', NULL, '14', '', NULL, 'Superfish Rd Dinner Set', '', NULL, '', '', '1604', '66', '', '100', '', '', '', '', '', '', '', '3895', '', '', '', '', '', '21', '2015-12-12', '21', '2015-12-12', 'A', '2015-12-12 15:08:40', '', '100', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '', '24', '8906063560494', NULL, '4', '', NULL, 'Hi Luxe  Crystal Decanter Crack', '', NULL, '', '', '1596', '', '', '12', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2015-12-14', '21', '2015-12-14', 'A', '2015-12-14 13:24:53', '', '12', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '', '24', '8906063560494', NULL, '4', '', NULL, 'Hi Luxe  Crystal Decanter Crack', '', NULL, '', '', '1596', '', '', '36', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2015-12-14', '21', '2015-12-14', 'A', '2015-12-14 13:43:58', '0', '36', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '', '24', '8906063560494', NULL, '4', '', NULL, 'Hi Luxe  Crystal Decanter Crack', '', NULL, '', '', '1596', '', '', '10', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2015-12-14', '21', '2015-12-14', 'A', '2015-12-14 13:48:28', '36', '46', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '', '6', '8906063560326', NULL, '7', '', NULL, 'Hi- Luxe Crystal Vase Brick', '', NULL, '', '', '1595', '', '', '12', '', '', '', '', '', '', '', '625', '', '', '', '', '', '21', '2015-12-15', '21', '2015-12-15', 'A', '2015-12-15 11:58:34', '', '12', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '', '18', '8906063560449', NULL, '7', '', NULL, 'Hi- luxe Crystal Vase Blossam', '', NULL, '', '', '1598', '', '', '20', '', '', '', '', '', '', '', '245', '', '', '', '', '', '21', '2015-12-15', '21', '2015-12-15', 'A', '2015-12-15 12:04:55', '', '20', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '', '19', '8906063560456', NULL, '7', '', NULL, 'Hi- luxe Crystal Vase Slim', '', NULL, '', '', '1601', '', '', '20', '', '', '', '', '', '', '', '285', '', '', '', '', '', '21', '2015-12-15', '21', '2015-12-15', 'A', '2015-12-15 12:05:25', '', '20', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '', '24', '8906063560494', NULL, '4', '', NULL, 'Hi Luxe  Crystal Decanter Crack', '', NULL, '', '', '1596', '', '', '10', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2015-12-19', '21', '2015-12-19', 'A', '2015-12-19 12:59:27', '45', '55', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '', '24', '8906063560494', NULL, '4', '', NULL, 'Hi Luxe  Crystal Decanter Crack', '', NULL, '', '', '1596', '', '', '5', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2015-12-19', '21', '2015-12-19', 'A', '2015-12-19 13:35:59', '35', '40', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '', '273', '6676', NULL, '25', '', NULL, 'VASE', '', NULL, '', '', '1599', '', '', '2', '', '', '', '', '', '', '', '865', '', '', '', '', '', '21', '2016-01-04', '21', '2016-01-04', 'A', '2016-01-04 15:29:02', '', '2', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '', '137', 'NEW - SQ  66', NULL, '', '', NULL, 'Superfish NEW  SQ Dinner Set 66', '', NULL, '', '', '1604', '66', '', '19', '', '', '', '', '', '', '', '3895', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 14:53:43', '', '19', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '', '137', 'NEW - SQ  66', NULL, '', '', NULL, 'Superfish NEW  SQ Dinner Set 66', '', NULL, '', '', '1604', '66', '', '38', '', '', '', '', '', '', '', '3895', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 14:57:02', '1', '39', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '', '141', 'Emboss Rd-35', NULL, '', '', NULL, 'Hi-Luxe Blossom Rd Double color Dinner Set', '', NULL, '', '', '1591', '35', '', '37', '', '', '', '', '', '', '', '3995', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 14:58:32', '', '37', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '', '142', 'Titan - 35', NULL, '16', '', NULL, 'Hi-Luxe Titan  Dinner Set', 'For serving of 6 person with soup set\r\nMade in Thailand', NULL, '', '', '1604', '35', '', '0', '', '', '', '', '', '', '', '3495', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:02:25', '', '0', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '', '142', 'Titan - 35', NULL, '16', '', NULL, 'Hi-Luxe Titan  Dinner Set', 'For serving of 6 person with soup set\r\nMade in Thailand', NULL, '', '', '1604', '35', '', '14', '', '', '', '', '', '', '', '3495', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:02:47', '0', '14', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '', '285', 'Elite - 44 Pc.', NULL, '', '', NULL, 'Hi Luxe Elite Dinner Set - 44 pc', '', NULL, '', '', '1591', '44pc', '', '111', '', '', '', '', '', '', '', '3495', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:03:21', '', '111', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '', '286', 'Trendy Sq - 29', NULL, '', '', NULL, 'Hi Luxe Sq. Trendy Double Color - 29 Pcs.', '', NULL, '', '', '1591', '29pc', '', '8', '', '', '', '', '', '', '', '3995', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:04:49', '', '8', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '', '287', 'Double Color Sq. - 29', NULL, '', '', NULL, 'Hi Luxe Sq. Double Color - 29 Pcs.', '', NULL, '', '', '1591', '29pc', '', '40', '', '', '', '', '', '', '', '3995', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:05:21', '', '40', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '', '292', 'T 302-18', NULL, '', '', NULL, 'S. Well Tray Xtra Large', 'Service Tray Extra Large', NULL, '', '', '1596', '', '', '90', '', '', '', '', '', '', '', '230', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:07:43', '', '90', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '', '295', 'T308-10', NULL, '', '', NULL, 'Waiver Tray with handle', '', NULL, '', '', '1609', '', '', '720', '', '', '', '', '', '', '', '62', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:09:01', '', '720', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '', '296', 'T 308-12', NULL, '', '', NULL, 'Waiver Tray with handle', 'Waiver Tray with handle', NULL, '', '', '1607', '', '', '144', '', '', '', '', '', '', '', '99', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:10:05', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '', '297', 'T 308-14', NULL, '', '', NULL, 'Waiver Tray with handle', 'Waiver Tray with handle', NULL, '', '', '1607', '', '', '-48', '', '', '', '', '', '', '', '145', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:12:06', '', '-48', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '', '298', 'T 308-16', NULL, '', '', NULL, 'Waiver Tray with handle', 'Tray Set', NULL, '', '', '1600', '', '', '648', '', '', '', '', '', '', '', '180', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:12:38', '', '648', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '', '304', 'T166-9', NULL, '', '', NULL, 'Handle Tray Mini', '', NULL, '', '', '1600', '', '', '180', '', '', '', '', '', '', '', '62', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:13:34', '', '180', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '', '307', 'T169-18', NULL, '', '', NULL, 'Handle Tray Large 18', '', NULL, '', '', '1598', '', '', '1104', '', '', '', '', '', '', '', '235', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:14:08', '', '1104', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '', '313', 'T31011-18', NULL, '', '', NULL, 'Dx Rect Tray', '', NULL, '', '', '1598', '', '', '768', '', '', '', '', '', '', '', '230', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:14:39', '', '768', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '', '315', 'T 320 - 9', NULL, '', '', NULL, 'Unique Serving Tray Small', 'Serving Tray Small', NULL, '', '', '1607', '', '', '384', '', '', '', '', '', '', '', '72', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:16:56', '', '384', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '', '319', 'T 004-12', NULL, '', '', NULL, 'Service Tray Medium', 'Serving Tray Medium', NULL, '', '', '1607', '', '', '432', '', '', '', '', '', '', '', '115', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:17:50', '', '432', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '', '322', 'T - 20845', NULL, '', '', NULL, 'Oval Chip & Dip', '', NULL, '', '', '1598', '', '', '360', '', '', '', '', '', '', '', '100', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:18:34', '', '360', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '', '323', 'T - 20735', NULL, '', '', NULL, 'Oval Chip & Dip', '', NULL, '', '', '1598', '', '', '336', '', '', '', '', '', '', '', '82', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:19:00', '', '336', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '', '324', 'T - 20845 Small', NULL, '', '', NULL, 'Oval Chip & Dip', '', NULL, '', '', '1600', '', '', '756', '', '', '', '', '', '', '', '77', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:19:39', '', '756', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '', '325', 'T-257-11', NULL, '', '', NULL, 'Rectangle Chip & Dip', '', NULL, '', '', '1607', '', '', '1104', '', '', '', '', '', '', '', '77', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:20:07', '', '1104', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '', '325', 'T-257-11', NULL, '', '', NULL, 'Rectangle Chip & Dip', '', NULL, '', '', '1607', '', '', '0', '', '', '', '', '', '', '', '77', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:21:09', '1104', '1104', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '', '326', 'T 8017', NULL, '', '', NULL, 'Snack Tray Sq.', '', NULL, '', '', '1611', '', '', '6048', '', '', '', '', '', '', '', '40', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:22:27', '', '6048', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '', '297', 'T 308-14', NULL, '', '', NULL, 'Waiver Tray with handle', 'Waiver Tray with handle', NULL, '', '', '1607', '', '', '144', '', '', '', '', '', '', '', '145', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:24:30', '-48', '96', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '', '328', 'T 259-7', NULL, '', '', NULL, 'Square Chip & Dip Color', '', NULL, '', '', '1609', '', '', '1512', '', '', '', '', '', '', '', '65', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:25:11', '', '1512', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '', '329', 'T 321-12', NULL, '', '', NULL, 'Sleek Serving Tray Med.', '', NULL, '', '', '1607', '', '', '528', '', '', '', '', '', '', '', '95', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:25:55', '', '528', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, '', '330', 'T 321-15', NULL, '', '', NULL, 'Sleek Serving Tray Med.', '', NULL, '', '', '1600', '', '', '216', '', '', '', '', '', '', '', '165', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:26:25', '', '216', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '', '331', 'T 321-20', NULL, '', '', NULL, 'Sleek Serving Tray Med.', '', NULL, '', '', '1598', '', '', '288', '', '', '', '', '', '', '', '235', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:26:51', '', '288', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '', '332', 'T 324-8.50', NULL, '', '', NULL, 'Oval Serving Tray Mini', '', NULL, '', '', '1609', '', '', '2160', '', '', '', '', '', '', '', '52', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:27:36', '', '2160', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '', '333', 'T 324-10', NULL, '', '', NULL, 'Oval Serving Tray Small', '', NULL, '', '', '1609', '', '', '2304', '', '', '', '', '', '', '', '72', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:28:09', '', '2304', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, '', '334', 'T 324-12', NULL, '', '', NULL, 'Oval Serving Tray Med.', '', NULL, '', '', '1607', '', '', '1056', '', '', '', '', '', '', '', '93', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:28:43', '', '1056', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '', '335', 'T 324-13', NULL, '', '', NULL, 'Oval Serving Tray Large', '', NULL, '', '', '1607', '', '', '864', '', '', '', '', '', '', '', '115', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:30:06', '', '864', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '', '336', 'T 323-14', NULL, '', '', NULL, 'Serving Tray Med.', '', NULL, '', '', '1600', '', '', '720', '', '', '', '', '', '', '', '120', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:30:54', '', '720', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '', '337', 'T 323-17', NULL, '', '', NULL, 'Serving Tray Large', '', NULL, '', '', '1598', '', '', '144', '', '', '', '', '', '', '', '180', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:34:47', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, '', '339', 'K - 104', NULL, '', '', NULL, 'Children Plate Round', '', NULL, '', '', '1609', '', '', '1296', '', '', '', '', '', '', '', '57', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:36:22', '', '1296', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, '', '340', 'K - 383', NULL, '', '', NULL, 'Children Plate Round', '', NULL, '', '', '1607', '', '', '720', '', '', '', '', '', '', '', '77', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:36:47', '', '720', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '', '341', 'K - 384', NULL, '', '', NULL, 'Children Plate Rectangle', '', NULL, '', '', '1607', '', '', '131', '', '', '', '', '', '', '', '110', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:37:39', '', '131', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, '', '342', 'KB 217', NULL, '', '', NULL, 'Kidz Set (5 Pc)B217', '', NULL, '', '', '1596', '', '', '648', '', '', '', '', '', '', '', '265', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:38:21', '', '648', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, '', '343', 'KB238-10', NULL, '', '', NULL, 'Kidz Set (5 Pc) Rect.', '', NULL, '', '', '1612', '', '', '340', '', '', '', '', '', '', '', '235', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:39:10', '', '340', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, '', '344', 'K Fox', NULL, '', '', NULL, 'Kidz Set (5 Pc) Fox', '', NULL, '', '', '1612', '', '', '420', '', '', '', '', '', '', '', '200', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:43:30', '', '420', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, '', '345', 'K1103-C', NULL, '', '', NULL, 'Children Milk Mug with Lid', '', NULL, '', '', '1613', '', '', '3240', '', '', '', '', '', '', '', '60', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:44:32', '', '3240', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, '', '346', 'KG508', NULL, '', '', NULL, 'Children Milk Mug with Lid', '', NULL, '', '', '1613', '', '', '400', '', '', '', '', '', '', '', '60', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:45:23', '', '400', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, '', '347', 'K-6003', NULL, '', '', NULL, 'Children Milk Mug', '', NULL, '', '', '1613', '', '', '1200', '', '', '', '', '', '', '', '25', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 15:47:36', '', '1200', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, '', '349', 'KS 873', NULL, '', '', NULL, 'Children Fork', '', NULL, '', '', '1614', '', '', '1440', '', '', '', '', '', '', '', '6', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:03:26', '', '1440', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, '', '351', 'K1051', NULL, '', '', NULL, 'Kidz Bowl', '', NULL, '', '', '1615', '', '', '480', '', '', '', '', '', '', '', '32', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:04:17', '', '480', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, '', '352', 'KC113-5.5', NULL, '', '', NULL, 'Kidz Bowl', '', NULL, '', '', '1615', '', '', '1524', '', '', '', '', '', '', '', '32', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:07:31', '', '1524', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '', '353', 'KC 023-5', NULL, '', '', NULL, 'Children Bowl with Lid', '', NULL, '', '', '1607', '', '', '528', '', '', '', '', '', '', '', '80', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:08:44', '', '528', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, '', '356', 'S-017', NULL, '', '', NULL, 'Coffee Mug', '', NULL, '', '', '1615', '', '', '96', '', '', '', '', '', '', '', '45', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:09:15', '', '96', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, '', '356', 'S-017', NULL, '', '', NULL, 'Coffee Mug', '', NULL, '', '', '1615', '', '', '-12', '', '', '', '', '', '', '', '45', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:10:00', '96', '84', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, '', '651', 'C-307', NULL, '', '', NULL, 'Cofee Mug Printed', '', NULL, '', '', '1615', '', '', '480', '', '', '', '', '', '', '', '44', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:14:43', '', '480', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, '', '652', 'C-6014', NULL, '', '', NULL, 'Cofee Mug Coloured', '', NULL, '', '', '1615', '', '', '192', '', '', '', '', '', '', '', '45', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:21:30', '', '192', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, '', '358', 'C-320', NULL, '', '', NULL, 'Corn Flax Mug', '', NULL, '', '', '1609', '', '', '564', '', '', '', '', '', '', '', '95', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:22:10', '', '564', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, '', '361', 'C-320 Deco', NULL, '', '', NULL, 'Corn Flax Mug', '', NULL, '', '', '1609', '', '', '720', '', '', '', '', '', '', '', '115', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:22:59', '', '720', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, '', '363', 'C-1915 Deco', NULL, '', '', NULL, 'Milk Mug', '', NULL, '', '', '1609', '', '', '504', '', '', '', '', '', '', '', '85', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:23:34', '', '504', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, '', '653', 'C - 321', NULL, '', '', NULL, 'Milk Mug', '', NULL, '', '', '1615', '', '', '480', '', '', '', '', '', '', '', '85', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:26:41', '', '480', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, '', '369', '42248', NULL, '', '', NULL, 'Milk Mug', '', NULL, '', '', '1607', '', '', '708', '', '', '', '', '', '', '', '100', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:28:02', '', '708', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, '', '373', '42248 Two Tone', NULL, '', '', NULL, 'Milk Mug', '', NULL, '', '', '1607', '', '', '153', '', '', '', '', '', '', '', '120', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:28:47', '', '153', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, '', '370', '42249', NULL, '', '', NULL, 'Milk Mug Oval', '', NULL, '', '', '1607', '', '', '715', '', '', '', '', '', '', '', '110', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:30:05', '', '715', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '', '374', '42249 Two Tone', NULL, '', '', NULL, 'Milk Mug Oval', '', NULL, '', '', '1607', '', '', '324', '', '', '', '', '', '', '', '135', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:32:09', '', '324', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, '', '371', '43052', NULL, '', '', NULL, 'Milk Mug Big', '', NULL, '', '', '1607', '', '', '5', '', '', '', '', '', '', '', '110', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:32:39', '', '5', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '', '375', '43052 Two Tone', NULL, '', '', NULL, 'Milk Mug Big', '', NULL, '', '', '1607', '', '', '336', '', '', '', '', '', '', '', '135', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:33:08', '', '336', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, '', '392', 'E002', NULL, '', '', NULL, 'Rice Palta Color', '', NULL, '', '', '1611', '', '', '1440', '', '', '', '', '', '', '', '35', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:34:16', '', '1440', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, '', '393', 'E 016', NULL, '', '', NULL, 'Service Ladle Color', '', NULL, '', '', '1611', '', '', '432', '', '', '', '', '', '', '', '32', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:36:41', '', '432', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '', '137', 'NEW - SQ  66', NULL, '', '', NULL, 'Superfish NEW  SQ Dinner Set 66', '', NULL, '', '', '1604', '66', '', '-1', '', '', '', '', '', '', '', '3895', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:37:41', '39', '38', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '', '394', 'Colored Spoon', NULL, '', '', NULL, 'Serving Spoon Color', '', NULL, '', '', '1611', '', '', '720', '', '', '', '', '', '', '', '32', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:41:22', '', '720', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, '', '410', 'C-115-3', NULL, '', '', NULL, 'Chatni Bowl Sq.', '', NULL, '', '', '1611', '', '', '864', '', '', '', '', '', '', '', '13', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:42:35', '', '864', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, '', '443', 'Tea Coaster', NULL, '', '', NULL, 'Tea Coaster Set Sq.', '', NULL, '', '', '1607', '', '', '960', '', '', '', '', '', '', '', '145', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:56:43', '', '960', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, '', '654', 'Tea coster', NULL, '', '', NULL, 'Tea Coaster Set Rd.', '', NULL, '', '', '1607', '', '', '864', '', '', '', '', '', '', '', '145', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:57:04', '', '864', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, '', '5', '8906063560319', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Victoria Vase', '', NULL, '', '', '1595', '', '', '6', '', '', '', '', '', '', '', '625', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:57:55', '', '6', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '', '7', '8906063560333', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Imperial Vase', '', NULL, '', '', '1595', '', '', '6', '', '', '', '', '', '', '', '555', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:58:16', '', '6', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, '', '10', '8906063560364', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Wave', '', NULL, '', '', '1595', '', '', '6', '', '', '', '', '', '', '', '575', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:59:10', '', '6', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, '', '12', '8906063560388', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Sorento', '', NULL, '', '', '1597', '', '', '24', '', '', '', '', '', '', '', '345', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 16:59:38', '', '24', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '', '13', '8906063560395', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Viceroy', '', NULL, '', '', '1595', '', '', '23', '', '', '', '', '', '', '', '475', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:00:32', '', '23', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, '', '14', '8906063560401', NULL, '', '', NULL, 'Hi-Luxe Crystal  Vase Brusseles', '', NULL, '', '', '1597', '', '', '216', '', '', '', '', '', '', '', '275', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:04:09', '', '216', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, '', '15', '8906063560418', NULL, '', '', NULL, 'Hi-Luxe Crystal Vase Galaxy', '', NULL, '', '', '1597', '', '', '132', '', '', '', '', '', '', '', '295', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:04:41', '', '132', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, '', '20', '8906063560463', NULL, '', '', NULL, 'Hi- luxe Crystal Vase Crack Small', '', NULL, '', '', '1601', '', '', '28', '', '', '', '', '', '', '', '255', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:05:28', '', '28', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, '', '33', '8906063560524', NULL, '', '', NULL, 'Hi- Luxe Crystal Tumblar Fiero', '', NULL, '', '', '1593', '', '', '36', '', '', '', '', '', '', '', '935', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:15:47', '', '36', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '', '34', '8906063560531', NULL, '', '', NULL, 'Hi- Luxe Crystal Tumblar Crack', '', NULL, '', '', '1593', '', '', '36', '', '', '', '', '', '', '', '650', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:16:08', '', '36', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, '', '35', '8906063560548', NULL, '', '', NULL, 'Hi- Luxe Crystal Tumblar Alpha', '', NULL, '', '', '1593', '', '', '36', '', '', '', '', '', '', '', '435', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:16:31', '', '36', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '', '39', '8906063560586', NULL, '', '', NULL, 'HI-Luxe Crystal Tumblar STROKE', '', NULL, '', '', '1599', '', '', '72', '', '', '', '', '', '', '', '435', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:17:03', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, '', '40', '8906063560593', NULL, '', '', NULL, 'HI-Luxe Crystal Tumblar STROKE Tall', '', NULL, '', '', '1599', '', '', '120', '', '', '', '', '', '', '', '495', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:17:42', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, '', '41', '8906063560609', NULL, '', '', NULL, 'HI-LUXE  Crystal Tumblar NIGARA Whisky', '', NULL, '', '', '1599', '', '', '56', '', '', '', '', '', '', '', '435', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:18:23', '', '56', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '', '42', '8906063560616', NULL, '', '', NULL, 'Hi- Luxe Crystal Tumblar Tulip', '', NULL, '', '', '1599', '', '', '16', '', '', '', '', '', '', '', '355', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:18:48', '', '16', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '', '44', '8906063560630', NULL, '', '', NULL, 'Hi- Luxe Tiffany Dessert Bowl Set(6pc)', '', NULL, '', '', '1599', '', '', '72', '', '', '', '', '', '', '', '395', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:19:52', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, '', '45', '8906063560647', NULL, '', '', NULL, 'Hi- Luxe Bolero Dessert Bowl Set(6pc)', '', NULL, '', '', '1597', '', '', '132', '', '', '', '', '', '', '', '310', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:20:20', '', '132', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, '', '46', '8906063560654', NULL, '', '', NULL, 'Hi- Luxe Caption Dessert Bowl Set(6pc)', '', NULL, '', '', '1597', '', '', '132', '', '', '', '', '', '', '', '360', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:22:52', '', '132', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, '', '48', '8906063560678', NULL, '', '', NULL, 'Hi- Luxe Gripper Dessert Bowl Set(4pc)', '', NULL, '', '', '1601', '', '', '192', '', '', '', '', '', '', '', '205', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:23:21', '', '192', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, '', '49', '8906063560685', NULL, '', '', NULL, 'Hi- Luxe Duke Dessert Bowl Set(4pc)', '', NULL, '', '', '1597', '', '', '216', '', '', '', '', '', '', '', '245', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:24:28', '', '216', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, '', '59', '8906063560753', NULL, '', '', NULL, 'Hi- Luxe Twist Bowl Set(2pc)', '', NULL, '', '', '1598', '', '', '396', '', '', '', '', '', '', '', '160', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 17:27:54', '', '396', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, '', '61', '4', NULL, '', '', NULL, 'Hi- Luxe Solitare Bowl Set(2pc)', '', NULL, '', '', '1598', '', '', '456', '', '', '', '', '', '', '', '120', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:23:32', '', '456', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, '', '64', '7', NULL, '', '', NULL, 'Hi- Luxe Olympice Bowl Set (2pc)', '', NULL, '', '', '1598', '', '', '144', '', '', '', '', '', '', '', '120', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:24:01', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, '', '72', '8906063560821', NULL, '', '', NULL, 'Hi- Luxe Sky  Cup Set(6pc)', '', NULL, '', '', '1599', '', '', '32', '', '', '', '', '', '', '', '395', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:26:44', '', '32', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '', '74', '8906063560845', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl Big Champ', '', NULL, '', '', '1593', '', '', '36', '', '', '', '', '', '', '', '835', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:27:12', '', '36', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '', '76', '8906063560869', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl Pecock SQ Fotted', '', NULL, '', '', '1599', '', '', '24', '', '', '', '', '', '', '', '395', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:28:57', '', '24', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, '', '77', '8906063560876', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl Ace', '', NULL, '', '', '1595', '', '', '60', '', '', '', '', '', '', '', '385', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:29:47', '', '60', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '', '82', '8906063560920', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl Crack Big', '', NULL, '', '', '1599', '', '', '56', '', '', '', '', '', '', '', '515', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:30:27', '', '56', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '', '86', '8906063560951', NULL, '', '', NULL, 'Hi- luxe Crystal Candy Bowl Lumina', '', NULL, '', '', '1597', '', '', '87', '', '', '', '', '', '', '', '435', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:30:51', '', '87', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '', '90', '8906063560999', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl precious', '', NULL, '', '', '1597', '', '', '177', '', '', '', '', '', '', '', '275', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:31:44', '', '177', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '', '93', '8906063561026', NULL, '', '', NULL, 'Hi- luxe Crystal Wave Candy Jar Footed', '', NULL, '', '', '1597', '', '', '80', '', '', '', '', '', '', '', '225', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:33:13', '', '80', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, '', '95', '8906063561040', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl Camelia', '', NULL, '', '', '1597', '', '', '168', '', '', '', '', '', '', '', '220', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:33:45', '', '168', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, '', '97', '8906063561064', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl Black Gold Footed', '', NULL, '', '', '1597', '', '', '32', '', '', '', '', '', '', '', '175', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:34:10', '', '32', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, '', '99', '8906063561088', NULL, '', '', NULL, 'Hi- luxe Crystal Candy Joy', '', NULL, '', '', '1597', '', '', '45', '', '', '', '', '', '', '', '225', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:34:39', '', '45', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, '', '98', '8906063561071', NULL, '', '', NULL, 'Hi- luxe Crystal Cuttlery HolderRiviera', '', NULL, '', '', '1601', '', '', '240', '', '', '', '', '', '', '', '225', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:35:36', '', '240', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, '', '100', '8906063561095', NULL, '', '', NULL, 'Hi- luxe Crystal Footed Bowl Amigo', '', NULL, '', '', '1598', '', '', '72', '', '', '', '', '', '', '', '160', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:36:11', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, '', '101', '8906063561101', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl Black Gold', '', NULL, '', '', '1598', '', '', '33', '', '', '', '', '', '', '', '120', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:36:47', '', '33', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_product_stock_log` (`stocklog_id`, `serialno`, `Product_id`, `product_code`, `productctg_id`, `Product_typeid`, `manufacturer_id`, `product_name_hndi`, `productname`, `Description`, `price`, `partno`, `vendorid`, `usageunit`, `qtyperunit`, `unitinstock`, `qtyinstock`, `qtyindemand`, `reorderlevelqty`, `unitprice_purchase`, `vat_purchase`, `st_purchase`, `excise_purchase`, `commission_purchase`, `unitprice_sale`, `vat_sale`, `st_sale`, `excise_sale`, `commission_sale`, `product_image`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `date`, `prev_qtyinstock`, `total_qtyinstock`, `log_id`, `mode`, `warrenty_date`, `expiry_date`, `brnh_id`, `comp_id`, `zone_id`, `divn_id`, `type`, `templateavailable`, `product_nature`, `product_type`, `serial_no`, `product_non_refondable`, `pos_display_order`, `assetason`, `asset_as_on_vendor_cus`, `asset_as_on_expected_date`, `color`, `size`) VALUES
(131, '', '104', '8906063561132', NULL, '', '', NULL, 'Hi- luxe Crystal Plate Freedom', '', NULL, '', '', '1596', '', '', '108', '', '', '', '', '', '', '', '120', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:37:40', '', '108', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, '', '109', '8906063561187', NULL, '', '', NULL, 'Hi- luxe Crystal Lily Bowl', '', NULL, '', '', '1598', '', '', '120', '', '', '', '', '', '', '', '140', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:38:14', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, '', '119', '8906063561279', NULL, '', '', NULL, 'Hi- luxe Crystal 6pc Bowl Timeless', '', NULL, '', '', '1597', '', '', '72', '', '', '', '', '', '', '', '265', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:38:37', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, '', '120', '8906063561286', NULL, '', '', NULL, 'Hi- luxe Crystal 1Pc Fusion Bowl SQ.', '', NULL, '', '', '1597', '', '', '43', '', '', '', '', '', '', '', '260', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:39:19', '', '43', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, '', '121', '8906063561293', NULL, '', '', NULL, 'Hi- luxe Crystal Isis Bowl', '', NULL, '', '', '1597', '', '', '168', '', '', '', '', '', '', '', '360', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:39:49', '', '168', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, '', '125', '8906063561330', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl Evita', '', NULL, '', '', '1602', '', '', '20', '', '', '', '', '', '', '', '395', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:44:42', '', '20', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, '', '274', 'HL-11000', NULL, '', '', NULL, 'O/W RD CASSEROLE N LID 1000ML', '', NULL, '', '', '1597', '', '', '36', '', '', '', '', '', '', '', '335', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:46:57', '', '36', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, '', '275', 'HL-11500', NULL, '', '', NULL, 'O/W RD CASSEROLE N LID 1500ML', '', NULL, '', '', '1595', '', '', '72', '', '', '', '', '', '', '', '415', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:47:23', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, '', '276', 'HL-21000', NULL, '', '', NULL, 'O/W SQ. BAKING DISH 1000ML', '', NULL, '', '', '1597', '', '', '48', '', '', '', '', '', '', '', '205', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:47:51', '', '48', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, '', '277', 'HL-21800', NULL, '', '', NULL, 'O/W SQ. BAKING DISH 1800ML', '', NULL, '', '', '1597', '', '', '72', '', '', '', '', '', '', '', '335', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:48:17', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, '', '280', 'HL-31500', NULL, '', '', NULL, 'O/W MIXING BOWL 1500ML', '', NULL, '', '', '1597', '', '', '12', '', '', '', '', '', '', '', '250', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:48:54', '', '12', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, '', '281', 'HL-32000', NULL, '', '', NULL, 'O/W MIXING BOWL 2000ML', '', NULL, '', '', '1597', '', '', '78', '', '', '', '', '', '', '', '325', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:49:16', '', '78', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, '', '472', 'HL-6001', NULL, '', '', NULL, 'Sq. Food Container - 1000 ML', '', NULL, '', '', '1597', '', '', '36', '', '', '', '', '', '', '', '310', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:49:34', '', '36', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, '', '473', 'HL-5001', NULL, '', '', NULL, '3 Pc. O/W Rd. Food Container Set', '', NULL, '', '', '1595', '', '', '64', '', '', '', '', '', '', '', '685', '', '', '', '', '', '21', '2016-01-11', '21', '2016-01-11', 'A', '2016-01-11 18:50:06', '', '64', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, '', '655', 'Hl-6001 - 500 ML', NULL, '', '', NULL, 'Square Food Container - 500 ML', '', NULL, '', '', '1598', '', '', '116', '', '', '', '', '', '', '', '195', '', '', '', '', '', '21', '2016-01-12', '21', '2016-01-12', 'A', '2016-01-12 16:59:53', '', '116', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, '', '474', 'Hl-10001', NULL, '', '', NULL, 'Cola Bottle 1000 ML', '', NULL, '', '', '1617', '', '', '75', '', '', '', '', '', '', '', '645', '', '', '', '', '', '21', '2016-01-12', '21', '2016-01-12', 'A', '2016-01-12 17:01:05', '', '75', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, '', '475', 'HL-10002', NULL, '', '', NULL, 'Cola Bottle Leather Cover 1000 ML', '', NULL, '', '', '1617', '', '', '75', '', '', '', '', '', '', '', '745', '', '', '', '', '', '21', '2016-01-12', '21', '2016-01-12', 'A', '2016-01-12 17:01:33', '', '75', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, '', '476', 'HL-7501', NULL, '', '', NULL, 'Cola Bottle 750 ML', '', NULL, '', '', '1617', '', '', '150', '', '', '', '', '', '', '', '575', '', '', '', '', '', '21', '2016-01-12', '21', '2016-01-12', 'A', '2016-01-12 17:01:59', '', '150', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, '', '478', 'HL-5001 - 500 ML', NULL, '', '', NULL, 'Cola Bottle 500 ML', '', NULL, '', '', '1618', '', '', '60', '', '', '', '', '', '', '', '445', '', '', '', '', '', '21', '2016-01-12', '21', '2016-01-12', 'A', '2016-01-12 17:02:36', '', '60', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, '', '131', '8906063561385', NULL, '', '', NULL, 'HK HI-LUXE LIBERTY WATER BIG', '', NULL, '', '', '1597', '', '', '180', '', '', '', '', '', '', '', '230', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 10:57:35', '', '180', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, '', '135', '8906063561408', NULL, '', '', NULL, 'HK HI-LUXE GLAXY WATER BIG', '', NULL, '', '', '1597', '', '', '264', '', '', '', '', '', '', '', '240', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 10:58:19', '', '264', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, '', '138', '8906063561415', NULL, '', '', NULL, 'HK HI-LUXE GLAXY  WHISKY', '', NULL, '', '', '1597', '', '', '288', '', '', '', '', '', '', '', '255', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 10:59:00', '', '288', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, '', '140', '8906063561422', NULL, '', '', NULL, 'HK HI-LUXE TUMBLAR OCTAGON JUICE', '', NULL, '', '', '1597', '', '', '160', '', '', '', '', '', '', '', '220', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 11:01:00', '', '160', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, '', '145', '8906063561439', NULL, '', '', NULL, 'HK HI-LUXE OCTAGON WATER', '', NULL, '', '', '1597', '', '', '84', '', '', '', '', '', '', '', '240', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 11:01:33', '', '84', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, '', '146', '8906063561446', NULL, '', '', NULL, 'HK HI-LUXE TUMBLAR OCTAGON WHISKY', '', NULL, '', '', '1597', '', '', '120', '', '', '', '', '', '', '', '255', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 11:22:16', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, '', '147', '8906063561453', NULL, '', '', NULL, 'HK HI-LUXE TUMBLAR ELEGANT WATER', '', NULL, '', '', '1597', '', '', '72', '', '', '', '', '', '', '', '240', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 11:23:20', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, '', '148', '8906063561460', NULL, '', '', NULL, 'HK HI-LUXE TUMBLAR ELEGANT WHISKY', '', NULL, '', '', '1597', '', '', '240', '', '', '', '', '', '', '', '255', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 12:59:04', '', '240', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, '', '149', '8906063561477', NULL, '', '', NULL, 'HK HI-LUXE 6 PC CRUZ GLASS DECO', '', NULL, '', '', '1597', '', '', '276', '', '', '', '', '', '', '', '220', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 12:59:34', '', '276', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, '', '150', '8906063561484', NULL, '', '', NULL, 'HK HI-LUXE PLISNER JUICE', '', NULL, '', '', '1597', '', '', '372', '', '', '', '', '', '', '', '195', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 13:06:57', '', '372', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, '', '153', '8906063561514', NULL, '', '', NULL, 'HK HI-LUXE 6 PC CAPITAL JUICE GLASS', '', NULL, '', '', '1597', '', '', '156', '', '', '', '', '', '', '', '240', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 13:08:25', '', '156', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, '', '154', '8906063561521', NULL, '', '', NULL, 'HK HI-LUXE 6 PC CAPITAL WATER GLASS', '', NULL, '', '', '1597', '', '', '120', '', '', '', '', '', '', '', '220', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 13:08:47', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, '', '156', '8906063561545', NULL, '', '', NULL, 'HK HI-LUXE 6 PC GLASS VENUS WATER', '', NULL, '', '', '1597', '', '', '636', '', '', '', '', '', '', '', '240', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 13:09:43', '', '636', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, '', '158', '8906063561569', NULL, '', '', NULL, 'HK HI-LUXE 6 PC ASCOT WATER', '', NULL, '', '', '1597', '', '', '72', '', '', '', '', '', '', '', '245', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:23:08', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, '', '480', '8906063561590', NULL, '', '', NULL, 'Hi Luxe Tumblar Sweet Bell Water', '', NULL, '', '', '1597', '', '', '108', '', '', '', '', '', '', '', '220', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:23:30', '', '108', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, '', '162', '8906063561606', NULL, '', '', NULL, 'HK HI-LUXE TUMBLAR SWEET BELL JUICE', '', NULL, '', '', '1597', '', '', '12', '', '', '', '', '', '', '', '210', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:23:52', '', '12', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, '', '189', '8906063561620', NULL, '', '', NULL, 'HI-LUXE TUMBLAR DASH WATER', '', NULL, '', '', '1597', '', '', '108', '', '', '', '', '', '', '', '240', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:24:17', '', '108', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, '', '190', '11', NULL, '', '', NULL, 'HI-LUXE TUMBLAR DASH TALL', '', NULL, '', '', '1597', '', '', '96', '', '', '', '', '', '', '', '250', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:25:08', '', '96', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, '', '192', '8906063561644', NULL, '', '', NULL, 'HI-LUXE TUMBLAR OSCAR JUICE', '', NULL, '', '', '1599', '', '', '64', '', '', '', '', '', '', '', '300', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:27:50', '', '64', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, '', '193', '8906063561651', NULL, '', '', NULL, 'HI-LUXE TUMBLAR ZINETH WHISKY', '', NULL, '', '', '1599', '', '', '72', '', '', '', '', '', '', '', '330', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:28:27', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, '', '194', '8906063561668', NULL, '', '', NULL, 'HI-LUXE TUMBLAR ZENITH SMALL', '', NULL, '', '', '1599', '', '', '64', '', '', '', '', '', '', '', '265', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:28:53', '', '64', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, '', '195', '8906063561675', NULL, '', '', NULL, 'HI-LUXE TUMBLAR MELODY WHISKY', '', NULL, '', '', '1599', '', '', '152', '', '', '', '', '', '', '', '305', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:29:25', '', '152', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, '', '196', '8906063561682', NULL, '', '', NULL, 'HI-LUXE TUMBLAR MELODY', '', NULL, '', '', '1599', '', '', '272', '', '', '', '', '', '', '', '305', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:30:10', '', '272', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, '', '197', '8906063561699', NULL, '', '', NULL, 'HI-LUXE TUMBLAR ATLAS', '', NULL, '', '', '1599', '', '', '120', '', '', '', '', '', '', '', '305', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:30:39', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, '', '198', '8906063561705', NULL, '', '', NULL, 'HI-LUXE TUMBLAR ELITE', '', NULL, '', '', '1599', '', '', '46', '', '', '', '', '', '', '', '305', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:30:59', '', '46', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, '', '199', '8906063561712', NULL, '', '', NULL, 'HI-LUXE TUMBLAR ELITE TALL', '', NULL, '', '', '1599', '', '', '64', '', '', '', '', '', '', '', '375', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:31:39', '', '64', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, '', '200', '8906063561729', NULL, '', '', NULL, 'HI-LUXE TUMBLAR CLASSIC', '', NULL, '', '', '1599', '', '', '88', '', '', '', '', '', '', '', '305', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:32:16', '', '88', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, '', '201', '8906063561736', NULL, '', '', NULL, 'HI-LUXE TUMBLAR ERICA JUICE', '', NULL, '', '', '1599', '', '', '56', '', '', '', '', '', '', '', '305', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:33:11', '', '56', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, '', '202', '8906063561743', NULL, '', '', NULL, 'HI-LUXE TUMBLAR SANMARINO', '', NULL, '', '', '1599', '', '', '48', '', '', '', '', '', '', '', '290', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:34:27', '', '48', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, '', '203', '8906063561750', NULL, '', '', NULL, 'HI-LUXE TUMBLAR SIGNATURE/FLORAT/KIARA', '', NULL, '', '', '1597', '', '', '120', '', '', '', '', '', '', '', '305', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:34:53', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, '', '204', '8906063561767', NULL, '', '', NULL, 'HI-LUXE TUMBLAR EGYPT/CUBA', '', NULL, '', '', '1599', '', '', '24', '', '', '', '', '', '', '', '370', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:35:17', '', '24', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, '', '205', '8906063561774', NULL, '', '', NULL, 'HI-LUXE TUMBLAR GRAND WATER', '', NULL, '', '', '1597', '', '', '132', '', '', '', '', '', '', '', '235', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:36:21', '', '132', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, '', '206', '8906063561781', NULL, '', '', NULL, 'HI-LUXE TUMBLAR GRAND JUICE', '', NULL, '', '', '1597', '', '', '162', '', '', '', '', '', '', '', '225', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:36:51', '', '162', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, '', '207', '12', NULL, '', '', NULL, 'HI-LUXE TUMBLAR CENTURY WATER', '', NULL, '', '', '1597', '', '', '416', '', '', '', '', '', '', '', '215', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:39:03', '', '416', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, '', '208', '13', NULL, '', '', NULL, 'HI-LUXE TUMBLAR CENTURY TALL', '', NULL, '', '', '1597', '', '', '130', '', '', '', '', '', '', '', '240', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:40:13', '', '130', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, '', '209', '14', NULL, '', '', NULL, 'HI-LUXE TUMBLAR GOLF WATER', '', NULL, '', '', '1599', '', '', '111', '', '', '', '', '', '', '', '215', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:40:51', '', '111', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, '', '210', '15', NULL, '', '', NULL, 'HI-LUXE TUMBLAR PRAYMID WATER', '', NULL, '', '', '1597', '', '', '119', '', '', '', '', '', '', '', '245', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:43:01', '', '119', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, '', '211', '8906063561798', NULL, '', '', NULL, 'HI-LUXE BEER MUG BRITANIA - 2PC', '', NULL, '', '', '1597', '', '', '116', '', '', '', '', '', '', '', '145', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:43:41', '', '116', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, '', '212', '8906063561804', NULL, '', '', NULL, 'HI-LUXE BEER MUG DELTA -2 PC', '', NULL, '', '', '1597', '', '', '132', '', '', '', '', '', '', '', '145', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:44:24', '', '132', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, '', '213', '8906063561811', NULL, '', '', NULL, 'HI-LUXE BEER MUG ALTO -2 Pc', '', NULL, '', '', '1597', '', '', '144', '', '', '', '', '', '', '', '145', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:45:00', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, '', '216', '8906063561835', NULL, '', '', NULL, 'HI-LUXE WATER JUG DASH', '', NULL, '', '', '1591', '', '', '108', '', '', '', '', '', '', '', '325', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:45:32', '', '108', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, '', '217', '8906063561842', NULL, '', '', NULL, 'HI-LUXE WATER JUG TIVOLI', '', NULL, '', '', '1597', '', '', '24', '', '', '', '', '', '', '', '255', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:45:52', '', '24', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, '', '218', '17', NULL, '', '', NULL, 'HI-LUXE WATER JUG GRAND', '', NULL, '', '', '1597', '', '', '118', '', '', '', '', '', '', '', '225', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:46:23', '', '118', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, '', '481', 'JAZZ', NULL, '', '', NULL, 'HL-Crystal Tumblar JAZZ - 6 PC', '', NULL, '', '', '1599', '', '', '86', '', '', '', '', '', '', '', '475', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:47:12', '', '86', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, '', '482', 'ASPEN', NULL, '', '', NULL, 'HL-Crystal Tumblar ASPEN - 6 PC', '', NULL, '', '', '1599', '', '', '120', '', '', '', '', '', '', '', '475', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:47:36', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, '', '483', 'PEARL', NULL, '', '', NULL, 'HL-Crystal Tumblar PEARL - 6 PC', '', NULL, '', '', '1599', '', '', '72', '', '', '', '', '', '', '', '475', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:48:09', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, '', '483', 'PEARL', NULL, '', '', NULL, 'HL-Crystal Tumblar PEARL - 6 PC', '', NULL, '', '', '1599', '', '', '40', '', '', '', '', '', '', '', '475', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:49:00', '72', '112', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, '', '484', 'DANCE', NULL, '', '', NULL, 'HL-Crystal Tumblar DANCE - 6 PC', '', NULL, '', '', '1599', '', '', '120', '', '', '', '', '', '', '', '475', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:50:37', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, '', '485', 'SPHERE', NULL, '', '', NULL, 'HL-Crystal Tumblar SPHERE - 6 Pc', '', NULL, '', '', '1599', '', '', '88', '', '', '', '', '', '', '', '475', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:51:13', '', '88', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, '', '486', 'DELIGHT', NULL, '', '', NULL, 'HL-Crystal Snack Plate Set-6 Pc Delight', '', NULL, '', '', '1597', '', '', '120', '', '', '', '', '', '', '', '355', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:51:52', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, '', '487', 'HIGHLAND', NULL, '', '', NULL, 'HL-Crystal Bowl', '', NULL, '', '', '1596', '', '', '108', '', '', '', '', '', '', '', '245', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:52:16', '', '108', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, '', '488', 'LANCER', NULL, '', '', NULL, 'HL-Crystal 2 Pc Snack Set n Tray LANCER', '', NULL, '', '', '1597', '', '', '168', '', '', '', '', '', '', '', '360', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:52:48', '', '168', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, '', '489', 'Anna-M', NULL, '', '', NULL, 'HL-ANNA Jar Med. - 800 ML', '', NULL, '', '', '1600', '', '', '707', '', '', '', '', '', '', '', '255', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:53:30', '', '707', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, '', '490', 'Anna-S', NULL, '', '', NULL, 'HL-ANNA Jar Med. - 600 ML', '', NULL, '', '', '1600', '', '', '504', '', '', '', '', '', '', '', '225', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:53:55', '', '504', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, '', '491', 'Cattle 1.3', NULL, '', '', NULL, 'HL-Vacuum Cattle 1.3 Ltr.', '', NULL, '', '', '1597', '', '', '93', '', '', '', '', '', '', '', '1145', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 17:55:46', '', '93', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, '', '492', 'Cattle 1.2', NULL, '', '', NULL, 'HL-Vacuum Cattle 1.2 Ltr.', '', NULL, '', '', '1597', '', '', '0', '', '', '', '', '', '', '', '1095', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:21:15', '', '0', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, '', '492', 'Cattle 1.2', NULL, '', '', NULL, 'HL-Vacuum Cattle 1.2 Ltr.', '', NULL, '', '', '1597', '', '', '78', '', '', '', '', '', '', '', '1095', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:22:26', '0', '78', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, '', '493', 'Cattle 1', NULL, '', '', NULL, 'HL-Vacuum Cattle 1 Ltr.', '', NULL, '', '', '1597', '', '', '24', '', '', '', '', '', '', '', '1045', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:23:35', '', '24', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, '', '494', 'Airpot 2.5', NULL, '', '', NULL, 'HL-Airpot Vacuum Jug 2.5 Ltr.', '', NULL, '', '', '1595', '', '', '15', '', '', '', '', '', '', '', '1745', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:24:07', '', '15', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, '', '495', 'HL-100-3 Ltr', NULL, '', '', NULL, 'HL-Travel Vacuum Jug 100-3 Ltr.', '', NULL, '', '', '1595', '', '', '27', '', '', '', '', '', '', '', '1195', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:24:39', '', '27', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, '', '496', 'HL-200-4 Ltr.', NULL, '', '', NULL, 'HL-Travel Vacuum Jug 200-4 Ltr.', '', NULL, '', '', '1595', '', '', '29', '', '', '', '', '', '', '', '1295', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:26:00', '', '29', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, '', '497', 'HL-300-5 Ltr.', NULL, '', '', NULL, 'HL-Travel Vacuum Jug HL-300-5 Ltr.', '', NULL, '', '', '1595', '', '', '29', '', '', '', '', '', '', '', '1495', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:26:25', '', '29', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, '', '501', 'RIO-2 Pc', NULL, '', '', NULL, 'HL-RIO Party Perfect Set - 2 Pc N SS Set', '', NULL, '', '', '1593', '', '', '56', '', '', '', '', '', '', '', '975', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:27:09', '', '56', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, '', '502', 'RIO - 3 Pc', NULL, '', '', NULL, 'HL-RIO Party Perfect Set - 3 Pc', '', NULL, '', '', '1593', '', '', '40', '', '', '', '', '', '', '', '1045', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:27:56', '', '40', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, '', '507', 'Glacier-7 Pc', NULL, '', '', NULL, 'HL-Glacier Pudding Set - 7 Pc', '', NULL, '', '', '1595', '', '', '93', '', '', '', '', '', '', '', '575', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:28:40', '', '93', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, '', '508', 'Jow-2 Pc', NULL, '', '', NULL, 'HL-Jow Jar Set - 2 Pc', '', NULL, '', '', '1618', '', '', '120', '', '', '', '', '', '', '', '150', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:29:04', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, '', '509', 'Daisy-4 Pc', NULL, '', '', NULL, 'HL-Daisy Jar Set n Tray - 4 Pc', '', NULL, '', '', '1598', '', '', '336', '', '', '', '', '', '', '', '325', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:29:30', '', '336', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, '', '510', 'Storage 1.4', NULL, '', '', NULL, 'HL-Storage Jar 1.4 Ltr.', '', NULL, '', '', '1598', '', '', '144', '', '', '', '', '', '', '', '225', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:30:21', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, '', '511', 'Storage 1.8', NULL, '', '', NULL, 'HL-Storage Jar 1.8 Ltr.', '', NULL, '', '', '1598', '', '', '96', '', '', '', '', '', '', '', '275', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:31:59', '', '96', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, '', '513', 'Ring-2 Pc', NULL, '', '', NULL, 'HL - Ring Jar Set - 2 Pc', '', NULL, '', '', '1597', '', '', '367', '', '', '', '', '', '', '', '345', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:33:01', '', '367', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, '', '514', 'RING-900', NULL, '', '', NULL, 'HL-Ring Jar - 900 ML', '', NULL, '', '', '1598', '', '', '240', '', '', '', '', '', '', '', '155', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:33:24', '', '240', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, '', '515', 'RING-1300', NULL, '', '', NULL, 'HL-Ring Jar - 1300 ML', '', NULL, '', '', '1598', '', '', '257', '', '', '', '', '', '', '', '195', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:33:52', '', '257', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, '', '516', 'STELLA-1000', NULL, '', '', NULL, 'HL-STELLA JAR - 1000 ML', '', NULL, '', '', '1599', '', '', '44', '', '', '', '', '', '', '', '215', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:34:22', '', '44', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, '', '517', 'STELLA-1500', NULL, '', '', NULL, 'HL-STELLA JAR - 1500 ML', '', NULL, '', '', '1595', '', '', '24', '', '', '', '', '', '', '', '235', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:34:49', '', '24', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, '', '518', 'OLIVE -3 PC', NULL, '', '', NULL, '3 PC OLIVE JAR', '', NULL, '', '', '1599', '', '', '80', '', '', '', '', '', '', '', '375', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:36:19', '', '80', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, '', '519', 'FLOWER-3 PC', NULL, '', '', NULL, '3 PC FLOWER JAR SET', '', NULL, '', '', '1601', '', '', '96', '', '', '', '', '', '', '', '525', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:36:43', '', '96', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, '', '520', 'RIO-8', NULL, '', '', NULL, '8', '', NULL, '', '', '1599', '', '', '69', '', '', '', '', '', '', '', '525', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:37:24', '', '69', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, '', '521', 'RIO-7', NULL, '', '', NULL, '7', '', NULL, '', '', '1599', '', '', '97', '', '', '', '', '', '', '', '375', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:38:00', '', '97', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, '', '522', 'CAPRI - 8', NULL, '', '', NULL, '8', '', NULL, '', '', '1599', '', '', '136', '', '', '', '', '', '', '', '485', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:38:32', '', '136', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, '', '523', 'CAPRI-7', NULL, '', '', NULL, '7', '', NULL, '', '', '1601', '', '', '128', '', '', '', '', '', '', '', '355', '', '', '', '', '', '21', '2016-01-15', '21', '2016-01-15', 'A', '2016-01-15 18:41:11', '', '128', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, '', '273', '6676', NULL, '25', '', NULL, 'VASE', '', NULL, '', '', '1599', '', '', '20', '', '', '', '', '', '', '', '865', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 14:23:07', '-22', '-2', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, '', '656', 'New Sq. - 45 Pc', NULL, '', '', NULL, 'Superfish New Sq. 45 Pc D.Set', '', NULL, '', '', '1591', '', '', '463', '', '', '', '', '', '', '', '2895', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 14:34:46', '', '463', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, '', '132', 'RD - 66', NULL, '', '', NULL, 'Superfish Rd Dinner Set', '', NULL, '', '', '1604', '66', '', '9', '', '', '', '', '', '', '', '3895', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 15:15:42', '100', '109', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, '', '132', 'RD - 66', NULL, '', '', NULL, 'Superfish Rd Dinner Set', '', NULL, '', '', '1604', '66', '', '-100', '', '', '', '', '', '', '', '3895', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 15:17:42', '109', '9', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, '', '132', 'RD - 66', NULL, '', '', NULL, 'Superfish Rd Dinner Set', '', NULL, '', '', '1604', '66', '', '0', '', '', '', '', '', '', '', '3895', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 15:18:09', '9', '9', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, '', '657', 'Plate - 11 inches', NULL, '', '', NULL, 'Round D.Plate Blossom - 11 inches', '', NULL, '', '', '1598', '', '', '72', '', '', '', '', '', '', '', '160', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 15:23:32', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, '', '658', 'Two Tone - 11 inches', NULL, '', '', NULL, 'Round D.Plate Blossom Two Tone', '', NULL, '', '', '1598', '', '', '144', '', '', '', '', '', '', '', '160', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 15:25:29', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, '', '362', 'C-1915', NULL, '', '', NULL, 'Milk Mug', '', NULL, '', '', '1609', '', '', '504', '', '', '', '', '', '', '', '80', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 15:30:14', '', '504', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(238, '', '376', '2 Pc in Tray', NULL, '', '', NULL, '2 Pc Seal Fresh Snack Bowl n Tray', '', NULL, '', '', '1598', '', '', '551', '', '', '', '', '', '', '', '230', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:10:33', '', '551', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, '', '377', '4 Pc in Tray', NULL, '', '', NULL, '4 Pc Seal Fresh Snack Bowl n Tray', '', NULL, '', '', '1597', '', '', '250', '', '', '', '', '', '', '', '495', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:11:05', '', '250', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(240, '', '378', '6 Pc In Tray', NULL, '', '', NULL, '6 Pc Seal Fresh Snack Bowl  n Tray', '', NULL, '', '', '1597', '', '', '68', '', '', '', '', '', '', '', '685', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:11:44', '', '68', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(241, '', '381', 'C-57  4-5-6', NULL, '', '', NULL, 'Cont. Set - 3 Pc N air tight lid', '', NULL, '', '', '1598', '', '', '667', '', '', '', '', '', '', '', '300', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:21:07', '', '667', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, '', '384', 'C 052  3.5-4.5-5.5', NULL, '', '', NULL, 'Cont. Set - 3 Pc N air tight lid', '', NULL, '', '', '1598', '', '', '272', '', '', '', '', '', '', '', '300', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:21:37', '', '272', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(243, '', '387', 'C-52 - 4.5', NULL, '', '', NULL, 'Cont. Set - 2 Pc N air tight lid', '', NULL, '', '', '1598', '', '', '225', '', '', '', '', '', '', '', '255', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:22:23', '', '225', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(244, '', '388', 'C-58  4-5-6', NULL, '', '', NULL, 'Cont. Set - 3 Pc N air tight lid', '', NULL, '', '', '1598', '', '', '696', '', '', '', '', '', '', '', '355', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:23:23', '', '696', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, '', '395', 'Plain Spoon', NULL, '', '', NULL, 'Service Spoon Plain', '', NULL, '', '', '1611', '', '', '1296', '', '', '', '', '', '', '', '30', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:25:06', '', '1296', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, '', '659', 'Rd. 11 inches', NULL, '', '', NULL, 'Hotel Ware Rd. Dinner Plate', '', NULL, '', '', '1598', '', '', '96', '', '', '', '', '', '', '', '160', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:29:57', '', '96', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(247, '', '660', 'C 1915 Color', NULL, '', '', NULL, 'Milk Mug Colour', '', NULL, '', '', '1609', '', '', '60', '', '', '', '', '', '', '', '80', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:35:38', '', '60', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, '', '438', '231 - 4', NULL, '', '', NULL, 'Bowl Solid Color', '', NULL, '', '', '1609', '', '', '216', '', '', '', '', '', '', '', '30', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:36:37', '', '216', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(249, '', '439', '231 - 6', NULL, '', '', NULL, 'Bowl Solid Color', '', NULL, '', '', '1607', '', '', '192', '', '', '', '', '', '', '', '75', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:37:02', '', '192', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, '', '661', 'S 018 - 5.25', NULL, '', '', NULL, 'Bowls Two Tone', '', NULL, '', '', '1615', '', '', '480', '', '', '', '', '', '', '', '55', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:48:06', '', '480', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(251, '', '406', 'S-018 - 5.75', NULL, '', '', NULL, 'Bowls Two Tone', '', NULL, '', '', '1609', '', '', '186', '', '', '', '', '', '', '', '70', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:48:35', '', '186', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(252, '', '407', 'S-018 - 6.25', NULL, '', '', NULL, 'Bowls Two Tone', '', NULL, '', '', '1609', '', '', '360', '', '', '', '', '', '', '', '85', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:49:03', '', '360', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, '', '408', 'S - 018 - 6.75', NULL, '', '', NULL, 'Bowls Two Tone', '', NULL, '', '', '1607', '', '', '240', '', '', '', '', '', '', '', '115', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 16:49:40', '', '240', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(254, '', '662', 'C 232-6', NULL, '', '', NULL, 'Bowl Solid Color', '', NULL, '', '', '1615', '', '', '768', '', '', '', '', '', '', '', '75', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:21:34', '', '768', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, '', '431', 'S-041 - 5', NULL, '', '', NULL, 'Round Color Bowl', '', NULL, '', '', '1609', '', '', '144', '', '', '', '', '', '', '', '55', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:24:09', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, '', '432', 'S-041 - 6', NULL, '', '', NULL, 'Round Color Bowl', '', NULL, '', '', '1607', '', '', '48', '', '', '', '', '', '', '', '85', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:26:39', '', '48', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, '', '413', 'C 101-4-6', NULL, '', '', NULL, 'Square Color Bowl', '', NULL, '', '', '1609', '', '', '216', '', '', '', '', '', '', '', '65', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:30:13', '', '216', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(258, '', '414', 'C 101-4 - 7', NULL, '', '', NULL, 'Square Color Bowl', '', NULL, '', '', '1607', '', '', '144', '', '', '', '', '', '', '', '90', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:30:47', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(259, '', '415', 'C 101-4 - 8', NULL, '', '', NULL, 'Square Color Bowl', '', NULL, '', '', '1600', '', '', '108', '', '', '', '', '', '', '', '120', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:33:12', '', '108', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(260, '', '442', 'C - 214 C', NULL, '', '', NULL, 'Casrol Rd. S. Color', '', NULL, '', '', '1598', '', '', '108', '', '', '', '', '', '', '', '145', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:39:43', '', '108', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_product_stock_log` (`stocklog_id`, `serialno`, `Product_id`, `product_code`, `productctg_id`, `Product_typeid`, `manufacturer_id`, `product_name_hndi`, `productname`, `Description`, `price`, `partno`, `vendorid`, `usageunit`, `qtyperunit`, `unitinstock`, `qtyinstock`, `qtyindemand`, `reorderlevelqty`, `unitprice_purchase`, `vat_purchase`, `st_purchase`, `excise_purchase`, `commission_purchase`, `unitprice_sale`, `vat_sale`, `st_sale`, `excise_sale`, `commission_sale`, `product_image`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `date`, `prev_qtyinstock`, `total_qtyinstock`, `log_id`, `mode`, `warrenty_date`, `expiry_date`, `brnh_id`, `comp_id`, `zone_id`, `divn_id`, `type`, `templateavailable`, `product_nature`, `product_type`, `serial_no`, `product_non_refondable`, `pos_display_order`, `assetason`, `asset_as_on_vendor_cus`, `asset_as_on_expected_date`, `color`, `size`) VALUES
(261, '', '441', 'C - 138', NULL, '', '', NULL, 'Casrol Rd. S. Color', '', NULL, '', '', '1598', '', '', '120', '', '', '', '', '', '', '', '160', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:40:05', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(262, '', '444', '27025', NULL, '', '', NULL, 'Hi Luxe Corn Platter Mix colors', '', NULL, '', '', '1598', '', '', '216', '', '', '', '', '', '', '', '100', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:44:52', '', '216', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(263, '', '446', '91015', NULL, '', '', NULL, 'Hi Luxe Mixing Bowl Mix Colors', '', NULL, '', '', '1597', '', '', '120', '', '', '', '', '', '', '', '255', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:45:20', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(264, '', '447', '36108', NULL, '', '', NULL, 'Hi Luxe Fish Bowl Mix Colors', '', NULL, '', '', '1598', '', '', '216', '', '', '', '', '', '', '', '125', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:45:47', '', '216', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(265, '', '448', 'TWD 23', NULL, '', '', NULL, 'HI Luxe Candy 3 in 1 Mix Colors', '', NULL, '', '', '1598', '', '', '48', '', '', '', '', '', '', '', '175', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:46:36', '', '48', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(266, '', '449', 'OB 550', NULL, '', '', NULL, 'Hi Luxe Oval Bowl small mix colors', '', NULL, '', '', '1598', '', '', '144', '', '', '', '', '', '', '', '105', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:47:04', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(267, '', '450', 'OB 650', NULL, '', '', NULL, 'Hi Luxe Oval Bowl Med. Mix Colors', '', NULL, '', '', '1598', '', '', '144', '', '', '', '', '', '', '', '130', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:47:27', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(268, '', '452', 'OB 3004', NULL, '', '', NULL, 'Hi Luxe Banana Bowl Small Mix Colors', '', NULL, '', '', '1598', '', '', '72', '', '', '', '', '', '', '', '165', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:48:02', '', '72', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(269, '', '453', 'OB 3005', NULL, '', '', NULL, 'Hi Luxe Banana Bowl Med. Mix Colors', '', NULL, '', '', '1598', '', '', '120', '', '', '', '', '', '', '', '195', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:48:31', '', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(270, '', '454', 'OB 3006', NULL, '', '', NULL, 'Hi Luxe Banana Bowl Large Mix Colors', '', NULL, '', '', '1598', '', '', '168', '', '', '', '', '', '', '', '245', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:49:00', '', '168', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(271, '', '460', '33038', NULL, '', '', NULL, 'Hi Luxe Pear Bowl Mix Colors', '', NULL, '', '', '1607', '', '', '284', '', '', '', '', '', '', '', '140', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:49:27', '', '284', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(272, '', '461', '33184', NULL, '', '', NULL, 'Hi Luxe Lemon Bowl Mix Colors', '', NULL, '', '', '1607', '', '', '96', '', '', '', '', '', '', '', '140', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:49:42', '', '96', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(273, '', '462', '33085', NULL, '', '', NULL, 'Hi Luxe Strawberry Bowl Mix Colors', '', NULL, '', '', '1607', '', '', '192', '', '', '', '', '', '', '', '140', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:50:06', '', '192', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, '', '463', '33086', NULL, '', '', NULL, 'Hi Luxe Orange Bowl Mix Colors', '', NULL, '', '', '1607', '', '', '192', '', '', '', '', '', '', '', '140', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:50:27', '', '192', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(275, '', '465', '33282', NULL, '', '', NULL, 'Hi Luxe Carrot Bowl Mix Colors', '', NULL, '', '', '1607', '', '', '138', '', '', '', '', '', '', '', '140', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:50:58', '', '138', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(276, '', '21', '0', NULL, '', '', NULL, 'Hi- luxe Crystal Vase Quantum', '', NULL, '', '', '1601', '', '', '47', '', '', '', '', '', '', '', '245', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 17:52:38', '', '47', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, '', '24', '8906063560494', NULL, '', '', NULL, 'Hi Luxe  Crystal Decanter Crack', '', NULL, '', '', '1593', '', '', '17', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 18:37:14', '-13', '4', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, '', '37', '8906063560562', NULL, '', '', NULL, 'HI-Luxe Crystal Tumblar ODESSY Water', '', NULL, '', '', '1599', '', '', '88', '', '', '', '', '', '', '', '445', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 18:39:48', '', '88', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, '', '38', '8906063560579', NULL, '', '', NULL, 'HI-Luxe Crystal Tumblar  ODESSY Whisky', '', NULL, '', '', '1599', '', '', '24', '', '', '', '', '', '', '', '435', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 18:41:27', '', '24', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, '', '94', '8906063561033', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl Supreme', '', NULL, '', '', '1598', '', '', '288', '', '', '', '', '', '', '', '150', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 18:47:20', '', '288', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, '', '97', '8906063561064', NULL, '', '', NULL, 'Hi- luxe Crystal Bowl Black Gold Footed', '', NULL, '', '', '1597', '', '', '-12', '', '', '', '', '', '', '', '175', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 18:49:04', '32', '20', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(282, '', '469', '10', NULL, '', '', NULL, 'Hl Cutlery Set - 24 Pc', '', NULL, '', '', '1595', '', '', '242', '', '', '', '', '', '', '', '2395', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 18:50:47', '', '242', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(283, '', '150', '8906063561484', NULL, '', '', NULL, 'HK HI-LUXE PLISNER JUICE', '', NULL, '', '', '1597', '', '', '5', '', '', '', '', '', '', '', '195', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 18:52:32', '372', '377', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(284, '', '425', 'S-020 - 5', NULL, '', '', NULL, 'Star Color Bowl', '', NULL, '', '', '1609', '', '', '480', '', '', '', '', '', '', '', '65', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 18:56:00', '', '480', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, '', '427', 'S-020-7', NULL, '', '', NULL, 'Star Color Bowl', '', NULL, '', '', '1607', '', '', '192', '', '', '', '', '', '', '', '130', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 18:56:27', '', '192', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(286, '', '506', 'Vegas-8', NULL, '', '', NULL, 'HL-Vegas 8', '', NULL, '', '', '1599', '', '', '5', '', '', '', '', '', '', '', '465', '', '', '', '', '', '21', '2016-01-16', '21', '2016-01-16', 'A', '2016-01-16 18:56:53', '', '5', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(287, '', '303', 'T 317', NULL, '', '', NULL, 'Peacock Tray Set (3 Pc)', '', NULL, '', '', '1594', '', '', '198', '', '', '', '', '', '', '', '400', '', '', '', '', '', '21', '2016-01-22', '21', '2016-01-22', 'A', '2016-01-22 18:07:40', '', '198', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(288, '', '321', 'T 004', NULL, '', '', NULL, 'Service Tray Set (3 Pc)', '', NULL, '', '', '1594', '', '', '165', '', '', '', '', '', '', '', '400', '', '', '', '', '', '21', '2016-01-22', '21', '2016-01-22', 'A', '2016-01-22 18:09:19', '', '165', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(289, '', '644', '01060', NULL, '', '', NULL, 'HI LUXE DOUBLE COLOR BOWL', '', NULL, '', '', '1598', '', '', '336', '', '', '', '', '', '', '', '125', '', '', '', '', '', '21', '2016-01-22', '21', '2016-01-22', 'A', '2016-01-22 18:11:56', '', '336', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(290, '', '214', '16', NULL, '', '', NULL, 'HI-LUXE BEER MUG MUNICH -2 Pc', '', NULL, '', '', '1597', '', '', '27', '', '', '', '', '', '', '', '125', '', '', '', '', '', '21', '2016-01-22', '21', '2016-01-22', 'A', '2016-01-22 18:23:54', '', '27', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(291, '', '351', 'K1051', NULL, '', '', NULL, 'Kidz Bowl', '', NULL, '', '', '1615', '', '', '-120', '', '', '', '', '', '', '', '32', '', '', '', '', '', '21', '2016-01-22', '21', '2016-01-22', 'A', '2016-01-22 18:26:28', '480', '360', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(292, '', '363', 'C-1915 Deco', NULL, '', '', NULL, 'Milk Mug', '', NULL, '', '', '1609', '', '', '-504', '', '', '', '', '', '', '', '85', '', '', '', '', '', '21', '2016-01-22', '21', '2016-01-22', 'A', '2016-01-22 18:42:22', '504', '0', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(293, '', '273', '6676', NULL, '25', '', NULL, 'VASE', '', NULL, '', '', '1599', '', '', '20', '', '', '', '', '', '', '', '865', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 10:53:30', '-14', '6', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(294, '', '1', '8906063560272', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Crack Big', '', NULL, '', '', '1593', '', '', '1219', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 10:58:28', '-1151', '68', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(295, '', '1', '8906063560272', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Crack Big', '', NULL, '', '', '1593', '', '', '100', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 11:01:50', '68', '168', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(296, '', '1', '8906063560272', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Crack Big', '', NULL, '', '', '1593', '', '', '200', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 11:03:56', '168', '368', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(297, '', '652', 'C-6014', NULL, '', '', NULL, 'Cofee Mug Coloured', '', NULL, '', '', '1615', '', '', '10', '', '', '', '', '', '', '', '45', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 12:46:02', '-192', '-182', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, '', '652', 'C-6014', NULL, '', '', NULL, 'Cofee Mug Coloured', '', NULL, '', '', '1615', '', '', '10', '', '', '', '', '', '', '', '45', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 12:46:47', '-182', '-172', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(299, '', '665', 'MG - 607', NULL, '', '', NULL, 'MG Water Glass Big', '', NULL, '', '', '1599', '', '', '208', '', '', '', '', '', '', '', '225', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 14:04:43', '', '208', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(300, '', '666', 'MG - 606', NULL, '', '', NULL, 'MG Slim Round Glass', '', NULL, '', '', '1599', '', '', '240', '', '', '', '', '', '', '', '175', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 14:05:37', '', '240', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(301, '', '667', 'Bowl - 24292', NULL, '', '', NULL, 'Bowl Mix Coloured', '', NULL, '', '', '1598', '', '', '240', '', '', '', '', '', '', '', '100', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 14:12:43', '', '240', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(302, '', '668', 'Bowl - 39635', NULL, '', '', NULL, 'Handi Bowl Mix Coloured', '', NULL, '', '', '1598', '', '', '168', '', '', '', '', '', '', '', '155', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 14:13:20', '', '168', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(303, '', '669', 'Bowl - 32014', NULL, '', '', NULL, 'Oval Bowl Mix Color', '', NULL, '', '', '1598', '', '', '144', '', '', '', '', '', '', '', '85', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 14:13:49', '', '144', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(304, '', '537', 'Tajmahal XL - 32 Pc', NULL, '', '', NULL, 'Eagleware Tajmahal XL D/Set - 32 Pc', '', NULL, '', '', '1595', '', '', '54', '', '', '', '', '', '', '', '555', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 18:11:44', '', '54', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(305, '', '671', 'Cello', NULL, '', '', NULL, 'Cello Dining Set - 32 Pc', '', NULL, '', '', '1599', '', '', '32', '', '', '', '', '', '', '', '300', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 18:13:03', '', '32', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(306, '', '533', 'magic Gold -32pc', NULL, '', '', NULL, 'Eagleware D/Set Magic Gold', '', NULL, '', '', '1593', '', '', '40', '', '', '', '', '', '', '', '550', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 18:13:42', '', '40', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(307, '', '528', 'Floral Sq-33Pc', NULL, '', '', NULL, 'Eagleware Dining Set Floral Sq-33Pc', '', NULL, '', '', '1593', '', '', '20', '', '', '', '', '', '', '', '750', '', '', '', '', '', '21', '2016-01-23', '21', '2016-01-23', 'A', '2016-01-23 18:14:24', '', '20', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, '', '273', '6676', NULL, '25', '', NULL, 'VASE', '', NULL, '', '', '1599', '', '', '10', '', '', '', '', '', '', '', '865', '', '', '', '', '', '21', '2016-01-25', '21', '2016-01-25', 'A', '2016-01-25 12:55:06', '-6', '4', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, '', '402', 'C 222-6', NULL, '', '', NULL, 'Bowl Solid Color', '', NULL, '', '', '1609', '', '', '576', '', '', '', '', '', '', '', '45', '', '', '', '', '', '21', '2016-01-27', '21', '2016-01-27', 'A', '2016-01-27 10:43:07', '', '576', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(310, '', '273', '6676', NULL, '25', '', NULL, 'VASE', '', NULL, '', '', '1599', '', '', '9', '', '', '', '', '', '', '', '865', '', '', '', '', '', '21', '2016-01-27', '21', '2016-01-27', 'A', '2016-01-27 16:47:41', '1', '10', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(311, '', '1', '8906063560272', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Crack Big', '', NULL, '', '', '1593', '', '', '10', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2016-01-27', '21', '2016-01-27', 'A', '2016-01-27 16:48:40', '110', '120', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(312, '', '2', '8906063560289', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Bubble', '', NULL, '', '', '1593', '', '', '10', '', '', '', '', '', '', '', '1445', '', '', '', '', '', '21', '2016-01-27', '21', '2016-01-27', 'A', '2016-01-27 16:50:17', '', '10', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(313, '', '3', '8906063560296', NULL, '', '', NULL, 'Hi- Luxe Crystal Vase Wave Big', '', NULL, '', '', '1593', '', '', '10', '', '', '', '', '', '', '', '855', '', '', '', '', '', '21', '2016-01-27', '21', '2016-01-27', 'A', '2016-01-27 17:03:27', '', '10', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, '', '273', '6676', NULL, '25', '', NULL, 'VASE', '', NULL, '', '', '1599', '', '', '30', '', '', '', '', '', '', '', '865', '', '', '', '', '', '21', '2016-01-27', '21', '2016-01-27', 'A', '2016-01-27 18:05:53', '10', '3.0E+148', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, '', '273', '6676', NULL, '25', '', NULL, 'VASE', '', NULL, '', '', '1599', '', '', '-22', '', '', '', '', '', '', '', '865', '', '', '', '', '', '21', '2016-01-27', '21', '2016-01-27', 'A', '2016-01-27 18:06:22', '3.0E+148', '3.0E+148', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(316, '', '273', '6676', NULL, '25', '', NULL, 'VASE', '', NULL, '', '', '1599', '', '', '-2', '', '', '', '', '', '', '', '865', '', '', '', '', '', '21', '2016-01-27', '21', '2016-01-27', 'A', '2016-01-27 18:06:47', '3.0E+148', '3.0E+148', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(317, '', '15', '8906063560418', NULL, '', '', NULL, 'Hi-Luxe Crystal Vase Galaxy', '', NULL, '', '', '1597', '', '', '200', '', '', '', '', '', '', '', '295', '', '', '', '', '', '21', '2016-01-30', '21', '2016-01-30', 'A', '2016-01-30 11:46:15', '108', '308', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, '', '86', '8906063560951', NULL, '', '', NULL, 'Hi- luxe Crystal Candy Bowl Lumina', '', NULL, '', '', '1597', '', '', '200', '', '', '', '', '', '', '', '435', '', '', '', '', '', '21', '2016-01-30', '21', '2016-01-30', 'A', '2016-01-30 11:46:36', '87', '287', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, '', '633', 'Tulip - F.P. Set', NULL, '', '', NULL, 'Eagleware Tulip F/Plate - 6 Pc', '', NULL, '', '', '1594', '', '', '60', '', '', '', '', '', '', '', '400', '', '', '', '', '', '21', '2016-02-01', '21', '2016-02-01', 'A', '2016-02-01 18:44:36', '', '60', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(320, '', '635', 'Tulip - Q.P. Set', NULL, '', '', NULL, 'Eagleware Tulip Q/Plate - 6 Pc', '', NULL, '', '', '1594', '', '', '40', '', '', '', '', '', '', '', '200', '', '', '', '', '', '21', '2016-02-01', '21', '2016-02-01', 'A', '2016-02-01 18:44:56', '', '40', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, '', '637', 'Tulip - V.B. Set', NULL, '', '', NULL, 'Eagleware Tulip V.Bowl - 6 Pc', '', NULL, '', '', '1594', '', '', '50', '', '', '', '', '', '', '', '140', '', '', '', '', '', '21', '2016-02-01', '21', '2016-02-01', 'A', '2016-02-01 18:45:18', '', '50', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(322, '', '534', 'Taj-32pc', NULL, '', '', NULL, 'Eagleware D/Set Tajmahal', '', NULL, '', '', '1595', '', '', '54', '', '', '', '', '', '', '', '450', '', '', '', '', '', '21', '2016-02-01', '21', '2016-02-01', 'A', '2016-02-01 18:45:41', '', '54', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, '', '536', 'Crystal Ultra - 32 Pc', NULL, '', '', NULL, 'Eagleware Crystal Ultra D/Set - 32 Pc', '', NULL, '', '', '1595', '', '', '96', '', '', '', '', '', '', '', '535', '', '', '', '', '', '21', '2016-02-01', '21', '2016-02-01', 'A', '2016-02-01 18:46:32', '', '96', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, '', '535', 'Maharaja - 32 Pc', NULL, '', '', NULL, 'Eagleware Maharaja D/Set - 32 Pc', '', NULL, '', '', '1594', '', '', '96', '', '', '', '', '', '', '', '385', '', '', '', '', '', '21', '2016-02-02', '21', '2016-02-02', 'A', '2016-02-02 18:42:44', '', '96', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, '', '538', 'Magic Gold - 33 Pc', NULL, '', '', NULL, 'Eagleware M/Gold D/Set - 33 Pc', '', NULL, '', '', '1594', '', '', '28', '', '', '', '', '', '', '', '735', '', '', '', '', '', '21', '2016-02-02', '21', '2016-02-02', 'A', '2016-02-02 18:43:18', '', '28', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(326, '', '609', 'Crystal Ultra - F.P. Set', NULL, '', '', NULL, 'Eagleware Crystal Ultra F/Plate - 6 Pc', '', NULL, '', '', '1594', '', '', '40', '', '', '', '', '', '', '', '148', '', '', '', '', '', '21', '2016-02-02', '21', '2016-02-02', 'A', '2016-02-02 18:43:41', '', '40', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, '', '629', 'Floral Sq. - Q.P. Set', NULL, '', '', NULL, 'Eagleware Floral Sq. Q/Plate - 6 Pc', '', NULL, '', '', '1594', '', '', '40', '', '', '', '', '', '', '', '155', '', '', '', '', '', '21', '2016-02-02', '21', '2016-02-02', 'A', '2016-02-02 18:44:03', '', '40', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, '', '552', '18 PcsTajmahal', NULL, '', '', NULL, 'Eagleware Tajmahal S.Set - 18 Pcs', '', NULL, '', '', '1594', '', '', '24', '', '', '', '', '', '', '', '360', '', '', '', '', '', '21', '2016-02-02', '21', '2016-02-02', 'A', '2016-02-02 18:44:37', '', '24', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(329, '', '601', 'Grand Tray - Small', NULL, '', '', NULL, 'Eagleware Grand Snack Tray', '', NULL, '', '', '1620', '', '', '1392', '', '', '', '', '', '', '', '35', '', '', '', '', '', '21', '2016-02-05', '21', '2016-02-05', 'A', '2016-02-05 16:47:18', '', '1392', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(330, '', '674', 'Deep - Loose', NULL, '', '', NULL, 'Deep Square Half Plate', '', NULL, '', '', '1620', '', '', '504', '', '', '', '', '', '', '', '16', '', '', '', '', '', '21', '2016-02-05', '21', '2016-02-05', 'A', '2016-02-05 16:54:27', '', '504', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(331, '', '525', 'Tulip-40Pc', NULL, '', '', NULL, 'Eagleware Dining Set Tulip-40Pc', '', NULL, '', '', '1593', '', '', '40', '', '', '', '', '', '', '', '1000', '', '', '', '', '', '21', '2016-02-05', '21', '2016-02-05', 'A', '2016-02-05 16:56:43', '', '40', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(332, '', '562', '18 Pcs Floral Sq.', NULL, '', '', NULL, 'Eagleware Floral Sq. S/Set - 18 Pcs', '', NULL, '', '', '1594', '', '', '48', '', '', '', '', '', '', '', '570', '', '', '', '', '', '21', '2016-02-05', '21', '2016-02-05', 'A', '2016-02-05 16:57:22', '', '48', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, '', '528', 'Floral Sq-33Pc', NULL, '', '', NULL, 'Eagleware Dining Set Floral Sq-33Pc', '', NULL, '', '', '1593', '', '', '60', '', '', '', '', '', '', '', '750', '', '', '', '', '', '21', '2016-02-05', '21', '2016-02-05', 'A', '2016-02-05 17:00:04', '20', '80', NULL, 'update', NULL, NULL, '1', '1', '1', '1', 'Stock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proforma_invoice_dtl`
--

CREATE TABLE `tbl_proforma_invoice_dtl` (
  `proforma_invoice_dtl_id` int(200) NOT NULL,
  `vat_rate_on_item` varchar(200) DEFAULT '0',
  `vat_on_item` varchar(200) DEFAULT '0',
  `service_rate_on_item` varchar(200) DEFAULT '0',
  `service_on_item` varchar(200) DEFAULT NULL,
  `discount_percent_on_item` varchar(200) DEFAULT '0',
  `proforma_invoice_id` varchar(200) DEFAULT NULL,
  `tempid` varchar(100) DEFAULT NULL,
  `productid` varchar(200) DEFAULT NULL,
  `unit` varchar(200) DEFAULT NULL,
  `serial_code` varchar(200) DEFAULT NULL,
  `qty` varchar(200) DEFAULT NULL,
  `list_price` varchar(200) DEFAULT NULL,
  `discount_item_amt` varchar(200) DEFAULT '0',
  `net_price_after_discount` varchar(200) DEFAULT NULL,
  `direct_discount_amt` varchar(200) DEFAULT '0',
  `idvat_rate_on_total` varchar(200) DEFAULT '0',
  `idvat_total` varchar(200) DEFAULT '0',
  `ivat_rate_on_total` varchar(200) DEFAULT '0',
  `ivat_total` varchar(200) DEFAULT '0',
  `isales_rate_on_total` varchar(200) DEFAULT '0',
  `isales_total` varchar(200) DEFAULT '0',
  `iservice_rate_on_total` varchar(200) DEFAULT '0',
  `iservices_total` varchar(200) DEFAULT '0',
  `v_DISCOUNT` varchar(200) DEFAULT '0',
  `total_price` varchar(200) DEFAULT '0',
  `net_price` varchar(200) DEFAULT '0',
  `main_catg_id` varchar(200) DEFAULT NULL,
  `child_invoice_id` int(11) DEFAULT NULL,
  `total_tax` varchar(200) DEFAULT '0',
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proforma_invoice_dtl`
--

INSERT INTO `tbl_proforma_invoice_dtl` (`proforma_invoice_dtl_id`, `vat_rate_on_item`, `vat_on_item`, `service_rate_on_item`, `service_on_item`, `discount_percent_on_item`, `proforma_invoice_id`, `tempid`, `productid`, `unit`, `serial_code`, `qty`, `list_price`, `discount_item_amt`, `net_price_after_discount`, `direct_discount_amt`, `idvat_rate_on_total`, `idvat_total`, `ivat_rate_on_total`, `ivat_total`, `isales_rate_on_total`, `isales_total`, `iservice_rate_on_total`, `iservices_total`, `v_DISCOUNT`, `total_price`, `net_price`, `main_catg_id`, `child_invoice_id`, `total_tax`, `maker_id`, `author_id`, `maker_date`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '0', '0', '0', NULL, '', '1', NULL, '1', '5', NULL, '1', '54564', '', '54564', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '54564', '54564', '', NULL, '+', '1', NULL, NULL, NULL, 'A', '1', '1', '1', NULL),
(2, '0', '0', '0', NULL, '0', '1', NULL, '3', '5', NULL, '1', '5635', '0', '5635', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5635', '5635', '', NULL, '+0', '1', NULL, NULL, NULL, 'A', '1', '1', '1', NULL),
(3, '0', '0', '0', NULL, '', '2', NULL, '1', '5', NULL, '1', '152', '', '152', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '152', '152', '', NULL, '+', '1', NULL, NULL, NULL, 'A', '1', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proforma_invoice_hdr`
--

CREATE TABLE `tbl_proforma_invoice_hdr` (
  `proforma_invoice_id` int(200) NOT NULL,
  `tax_retail` varchar(200) NOT NULL,
  `schoolname` varchar(200) NOT NULL,
  `agent_id` varchar(200) NOT NULL,
  `state_id` varchar(200) NOT NULL,
  `company_id` varchar(200) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `customernumber` varchar(200) DEFAULT NULL,
  `contactid` varchar(200) DEFAULT NULL,
  `season` varchar(200) NOT NULL,
  `assignedto` varchar(200) DEFAULT NULL,
  `purchaseorder` varchar(200) DEFAULT NULL,
  `sales_commission` varchar(200) DEFAULT NULL,
  `sales_ordernumber` varchar(200) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `organisation_id` varchar(200) DEFAULT NULL,
  `invoice_status` varchar(200) DEFAULT NULL,
  `excise_total` varchar(200) DEFAULT NULL,
  `vat_total` varchar(200) DEFAULT NULL,
  `sales_total` varchar(200) DEFAULT NULL,
  `services_total` varchar(200) DEFAULT NULL,
  `item_price_total` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `shipping_charge` varchar(200) DEFAULT NULL,
  `installation_charge_per` varchar(200) DEFAULT NULL,
  `installation_charge` varchar(200) DEFAULT NULL,
  `service_tax_per` varchar(200) DEFAULT NULL,
  `service_tax` varchar(200) DEFAULT NULL,
  `dvat_total` varchar(200) DEFAULT NULL,
  `dvat_on_a_per` varchar(200) DEFAULT NULL,
  `dvat_on_a` varchar(200) DEFAULT NULL,
  `pre_tax_total` varchar(200) DEFAULT NULL,
  `discount_rate_on_total` varchar(200) DEFAULT NULL,
  `direct_dicount_amt` varchar(200) DEFAULT NULL,
  `vat_rate_on_total` varchar(200) DEFAULT NULL,
  `sales_rate_on_total` varchar(200) DEFAULT NULL,
  `service_rate_on_total` varchar(200) DEFAULT NULL,
  `shipping_vat_rate_on_total` varchar(200) DEFAULT NULL,
  `shipping_sales_rate_on_total` varchar(200) DEFAULT NULL,
  `shipping_service_rate_on_total` varchar(200) DEFAULT NULL,
  `shipping_vat_total` varchar(200) DEFAULT NULL,
  `shipping_sales_total` varchar(200) DEFAULT NULL,
  `shipping_service_total` varchar(200) DEFAULT NULL,
  `shpping_total` varchar(200) DEFAULT NULL,
  `tax_total` varchar(200) DEFAULT NULL,
  `adjustment_type` varchar(200) DEFAULT NULL,
  `adjustment_total` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) DEFAULT NULL,
  `advance_total` varchar(200) DEFAULT NULL,
  `balance_total` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `invoice_no` varchar(200) DEFAULT 'Retail',
  `manufacturer_id` varchar(200) DEFAULT NULL,
  `c_name` varchar(200) DEFAULT NULL,
  `cust_phone` varchar(200) DEFAULT NULL,
  `cust_address` varchar(200) DEFAULT NULL,
  `brnch_id` varchar(200) DEFAULT NULL,
  `invoice_type` varchar(200) DEFAULT NULL,
  `fdate` varchar(200) DEFAULT NULL,
  `todate` varchar(200) DEFAULT NULL,
  `product_exp_date` varchar(200) DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `surcharge_tax` varchar(200) DEFAULT '0',
  `paymode` varchar(200) DEFAULT NULL,
  `generated_status` varchar(200) DEFAULT 'Direct',
  `serial_no` int(11) DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `referenceof` varchar(200) DEFAULT NULL,
  `deliverymode` varchar(200) DEFAULT NULL,
  `submit_amount` varchar(200) DEFAULT '0',
  `locationid` varchar(200) DEFAULT NULL,
  `terminalid` varchar(200) DEFAULT NULL,
  `contact_no` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proforma_invoice_hdr`
--

INSERT INTO `tbl_proforma_invoice_hdr` (`proforma_invoice_id`, `tax_retail`, `schoolname`, `agent_id`, `state_id`, `company_id`, `subject`, `invoice_date`, `customernumber`, `contactid`, `season`, `assignedto`, `purchaseorder`, `sales_commission`, `sales_ordernumber`, `due_date`, `organisation_id`, `invoice_status`, `excise_total`, `vat_total`, `sales_total`, `services_total`, `item_price_total`, `discount`, `shipping_charge`, `installation_charge_per`, `installation_charge`, `service_tax_per`, `service_tax`, `dvat_total`, `dvat_on_a_per`, `dvat_on_a`, `pre_tax_total`, `discount_rate_on_total`, `direct_dicount_amt`, `vat_rate_on_total`, `sales_rate_on_total`, `service_rate_on_total`, `shipping_vat_rate_on_total`, `shipping_sales_rate_on_total`, `shipping_service_rate_on_total`, `shipping_vat_total`, `shipping_sales_total`, `shipping_service_total`, `shpping_total`, `tax_total`, `adjustment_type`, `adjustment_total`, `grand_total`, `advance_total`, `balance_total`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `invoice_no`, `manufacturer_id`, `c_name`, `cust_phone`, `cust_address`, `brnch_id`, `invoice_type`, `fdate`, `todate`, `product_exp_date`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `surcharge_tax`, `paymode`, `generated_status`, `serial_no`, `delivery_date`, `referenceof`, `deliverymode`, `submit_amount`, `locationid`, `terminalid`, `contact_no`) VALUES
(1, '', '0', '11', '0', '0', NULL, '2017-03-20', NULL, '7', 'winter', NULL, NULL, NULL, NULL, '2017-03-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60199.00', '0', '60199', '1', '2017-03-20', NULL, NULL, 'A', 'Retail', NULL, NULL, NULL, NULL, NULL, 'purchase', NULL, NULL, NULL, '1', '1', '1', '1', '0', NULL, 'Direct', NULL, '2017-03-20 00:00:00', NULL, NULL, '0', NULL, NULL, NULL),
(2, '0', '0', '0', '0', '0', NULL, '2017-03-22', NULL, '8', 'winter', NULL, NULL, NULL, NULL, '2017-03-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '152.00', '0', '152', '1', '2017-03-22', NULL, NULL, 'A', 'Retail', NULL, NULL, NULL, NULL, NULL, 'purchase', NULL, NULL, NULL, '1', '1', '1', '1', '0', NULL, 'Direct', NULL, '2017-03-22 00:00:00', NULL, NULL, '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_order_dtl`
--

CREATE TABLE `tbl_purchase_order_dtl` (
  `purchase_order_dtl_id` int(200) NOT NULL,
  `vendor_id` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `discountamount` varchar(200) DEFAULT NULL,
  `per_discount` varchar(200) DEFAULT NULL,
  `product_id` varchar(200) NOT NULL,
  `list_price` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `unit` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `net_price` varchar(200) NOT NULL,
  `sub_total` varchar(200) NOT NULL,
  `service_charge_percentage` varchar(200) DEFAULT NULL,
  `service_charge` varchar(200) DEFAULT NULL,
  `gross_discount_percentage` varchar(200) DEFAULT NULL,
  `gross_discount` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) NOT NULL,
  `purchase_order_hdr_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_order_dtl`
--

INSERT INTO `tbl_purchase_order_dtl` (`purchase_order_dtl_id`, `vendor_id`, `remark`, `discountamount`, `per_discount`, `product_id`, `list_price`, `quantity`, `description`, `unit`, `total`, `net_price`, `sub_total`, `service_charge_percentage`, `service_charge`, `gross_discount_percentage`, `gross_discount`, `grand_total`, `purchase_order_hdr_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '2', 'sdfj sdghfdsg sdgf', '4269', '10', '1', '21345', '2', '4.0mm 3.0m 0Degree (', 'Set', '42690', '38421', '38421', '', '0.00', '', '0', '38421.00', '1', '1', '0000-00-00', NULL, '2017-09-07', 'A', '1', '1', '1', NULL),
(2, '1', '', '4500', '10', '2', '45000', '1', 'STEP CONTROL UNIT-APL 6 ASSY', 'No.', '45000', '40500', '40500', '', '0.00', '', '0', '40500.00', '2', '1', '0000-00-00', NULL, '2017-09-07', 'A', '1', '1', '1', NULL),
(3, '2', 'fgjkdfhgjk', '4269', '10', '1', '21345', '2', '4.0mm 3.0m 0Degree (', 'Set', '42690', '38421', '38421', '', '0.00', '', '0', '38421.00', '3', '1', '0000-00-00', NULL, '2017-09-10', 'A', '1', '1', '1', NULL),
(4, '2', 'hmghkg', '4500', '10', '2', '45000', '1', 'STEP CONTROL UNIT-APL 6 ASSY', 'No.', '45000', '40500', '40500', '', '0.00', '', '0', '40500.00', '4', '1', '0000-00-00', NULL, '2017-09-10', 'A', '1', '1', '1', NULL),
(6, '0', 'sjdjsh', '2134.5', '10', '1', '21345', '1', '4.0mm 3.0m 0Degree (', 'Set', '21345', '19210.5', '19210.5', '', '0.00', '', '0', '19210.50', '5', '1', '0000-00-00', NULL, '2017-09-10', 'A', '1', '1', '1', NULL),
(7, '2', '', '4269', '10', '1', '21345', '2', '4.0mm 3.0m 0Degree (', 'Set', '42690', '38421', '38421', '', '0.00', '', '0', '38421.00', '6', '1', '0000-00-00', NULL, '2017-09-10', 'A', '1', '1', '1', NULL),
(10, '0', 'djgfjdgjfg', '9000', '10', '2', '45000', '2', 'STEP CONTROL UNIT-APL 6 ASSY', 'No.', '90000', '81000', '138631.5', '', '0.00', '', '0', '138631.50', '7', '1', '0000-00-00', NULL, '2017-09-10', 'A', '1', '1', '1', NULL),
(11, '0', 'sjkdfj', '4269', '10', '1', '21345', '2', 'STEP CONTROL UNIT-APL 6 ASSY', 'Set', '42690', '38421', '138631.5', '', '0.00', '', '0', '138631.50', '7', '1', '0000-00-00', NULL, '2017-09-10', 'A', '1', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_order_hdr`
--

CREATE TABLE `tbl_purchase_order_hdr` (
  `purchase_order_id` int(200) NOT NULL,
  `vendor_id` varchar(200) NOT NULL,
  `delivery_date` date NOT NULL,
  `remark` varchar(200) NOT NULL,
  `contant` text NOT NULL,
  `office_remark_name` varchar(200) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `case_id` varchar(200) NOT NULL,
  `refno` varchar(200) NOT NULL,
  `customer_dod` varchar(200) NOT NULL,
  `vendor_dod` varchar(200) NOT NULL,
  `new_ref_no` varchar(200) NOT NULL,
  `contact_person_id` varchar(200) NOT NULL,
  `totalcaseid` varchar(200) NOT NULL,
  `termandcondition` text NOT NULL,
  `template` varchar(200) NOT NULL,
  `sub_total` varchar(200) NOT NULL,
  `service_charge` varchar(200) NOT NULL,
  `service_charge_percentage` varchar(200) DEFAULT NULL,
  `gross_discount` varchar(200) NOT NULL,
  `gross_discount_percentage` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `send_status` varchar(200) DEFAULT 'Send',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_order_hdr`
--

INSERT INTO `tbl_purchase_order_hdr` (`purchase_order_id`, `vendor_id`, `delivery_date`, `remark`, `contant`, `office_remark_name`, `subject`, `case_id`, `refno`, `customer_dod`, `vendor_dod`, `new_ref_no`, `contact_person_id`, `totalcaseid`, `termandcondition`, `template`, `sub_total`, `service_charge`, `service_charge_percentage`, `gross_discount`, `gross_discount_percentage`, `grand_total`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `send_status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '2', '2017-09-07', '', 'We are pleased to place an order for the following material as per details given here under.', '0', 'Purchase Order For NTPC Kahalgaon', 'S/0001', 'AEPL/S/0001/17-18/S/0003', '2017-09-07', '2017-09-07', 'Your offer No. :  IY/QTN/005/1718 dated 26.05.2017', '2', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><ins><strong>Terms and Conditions:&nbsp;</strong></ins></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>1. Prices :-</strong></td>\r\n			<td>F. O. R. &nbsp;Destination.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>2. Delivery</strong></td>\r\n			<td>04 weeks.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>3. Mode of Dispatch</strong></td>\r\n			<td>By Road</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>4. Payment Terms</strong></td>\r\n			<td>30 days after receipt of material.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>5. GST</strong></td>\r\n			<td>Extra as application at the time of dispatch.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>6. Warranty :-</strong></td>\r\n			<td>The material shall be inspected by the Customer or his&nbsp;authorized Inspection engineer at your works. &nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>7. Guarantee</strong></td>\r\n			<td>The supplied material should be free from defects and guarantee for a period of 18 month from date of dispatch or 12 month from the date of commission whichever is earlier.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>8. Test certificate</strong></td>\r\n			<td>&nbsp;Fitment and interchange ability certificate , test &amp; compliance certificate shall be provide.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p>Best Regards,&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>for ASHBOND ENGINEERS PVT. LTD.&nbsp;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>(ASHISH DHAMIJA)</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;Director</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '1', '38421', '0.00', '', '0', '', '38421.00', '1', '2017-09-07', NULL, '2017-09-07', 'A', 'Sent', '1', '1', '1', '1'),
(2, '1', '2017-09-07', '', 'm vhv', '0', 'utdfut', 'S/0001', 'AEPL/S/0001/17-18/NTPC Parichha/0009', '2017-09-07', '2017-09-07', '', '1', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\"><ins><strong>Terms and Conditions:&nbsp;</strong></ins></td>\n		</tr>\n		<tr>\n			<td><strong>1. Prices :-</strong></td>\n			<td>F. O. R. &nbsp;Destination.</td>\n		</tr>\n		<tr>\n			<td><strong>2. Delivery</strong></td>\n			<td>04 weeks.</td>\n		</tr>\n		<tr>\n			<td><strong>3. Mode of Dispatch</strong></td>\n			<td>By Road</td>\n		</tr>\n		<tr>\n			<td><strong>4. Payment Terms</strong></td>\n			<td>30 days after receipt of material.</td>\n		</tr>\n		<tr>\n			<td><strong>5. GST</strong></td>\n			<td>Extra as application at the time of dispatch.</td>\n		</tr>\n		<tr>\n			<td><strong>6. Warranty :-</strong></td>\n			<td>The material shall be inspected by the Customer or his&nbsp;authorized Inspection engineer at your works. &nbsp;</td>\n		</tr>\n		<tr>\n			<td><strong>7. Guarantee</strong></td>\n			<td>The supplied material should be free from defects and guarantee for a period of 18 month from date of dispatch or 12 month from the date of commission whichever is earlier.</td>\n		</tr>\n		<tr>\n			<td><strong>8. Test certificate</strong></td>\n			<td>&nbsp;Fitment and interchange ability certificate , test &amp; compliance certificate shall be provide.</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">\n			<p>Best Regards,&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>for ASHBOND ENGINEERS PVT. LTD.&nbsp;</strong></td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>(ASHISH DHAMIJA)</strong></td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;Director</strong></td>\n		</tr>\n	</tbody>\n</table>\n', '1', '40500', '0.00', '', '0', '', '40500.00', '1', '2017-09-07', NULL, '2017-09-07', 'A', 'Send', '1', '1', '1', '1'),
(3, '2', '2017-09-10', 'djgjfdfhjdjhdfh', 'jkdsfhjksdhhfdsfhdjk hdkj hfjk hksfh kdh fjkdh khdskh fkj hsdh jfsdfhdjkhj hjkfjdfhjk', '0', 'jdfhgj', 'S/0002', 'AEPL/S/0002/17-18/S/0015', '0', '2017-09-10', 'hsfjsdjafhg', '2', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '', '1', '38421', '0.00', '', '0', '', '38421.00', '1', '2017-09-10', NULL, '2017-09-10', 'A', 'Send', '1', '1', '1', '1'),
(4, '2', '2017-09-10', 'jkhhf', 'kgkjhkhkhhj', '0', 'hjhjfh', 'S/0002', 'AEPL/S/0002/17-18/S/0016', '0', '2017-09-10', 'hfhgjhdj', '2', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '', '1', '40500', '0.00', '', '0', '', '40500.00', '1', '2017-09-10', NULL, '2017-09-10', 'A', 'Send', '1', '1', '1', '1'),
(5, '2', '2017-09-10', 'mdfgdgjh', 'hdgfdhgfhg', '0', 'hsdfgjhgj', 'S/0002', 'AEPL/S/0002/17-18/S/0017', '', '2017-09-10', 'hsgjfgjh', '2', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '', '1', '19210.5', '0.00', '', '0', '', '19210.50', '1', '2017-09-10', NULL, '2017-09-10', 'A', 'Send', '1', '1', '1', '1'),
(6, '2', '2017-09-10', 'fggfjhghj', 'ghfgfghf ghfg fghffh fhfhfh h', '0', 'hghghg', 'S/0002', 'AEPL/S/0002/17-18/S/0018', '0', '2017-09-10', 'gjh', '2', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '', '1', '38421', '0.00', '', '0', '', '38421.00', '1', '2017-09-10', NULL, '2017-09-10', 'A', 'Send', '1', '1', '1', '1'),
(7, '2', '2017-09-10', 'gjgsjh', 'djghjfhjhhghdhj', '0', 'gfhdgjhgjh', 'S/0001', 'AEPL/S/0001/17-18/S/0019', '', '2017-09-10', 'dfgjfhj', '2', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '', '1', '138631.5', '0.00', '', '0', '', '138631.50', '1', '2017-09-10', NULL, '2017-09-10', 'A', 'Send', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_order_return_dtl`
--

CREATE TABLE `tbl_purchase_order_return_dtl` (
  `purchase_order_return_id_dtl` int(200) NOT NULL,
  `s_no` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `list_price` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `return_quantity` varchar(200) NOT NULL,
  `reaming_return_qty` varchar(200) DEFAULT NULL,
  `purchase_return_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `brnch_id` varchar(200) DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_order_return_dtl`
--

INSERT INTO `tbl_purchase_order_return_dtl` (`purchase_order_return_id_dtl`, `s_no`, `product_name`, `list_price`, `quantity`, `return_quantity`, `reaming_return_qty`, `purchase_return_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `brnch_id`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '1', '3', '5635', '1', '1', '1', '1', '1', '2017-03-20', NULL, '2017-03-20', 'A', '1', '1', '1', '1', NULL),
(2, '1', '4', '2', '1', '1', '1', '2', '1', '2017-03-21', NULL, '2017-03-21', 'A', '1', '1', '1', '1', NULL),
(3, '2', '5', '30', '1', '1', '1', '2', '1', '2017-03-21', NULL, '2017-03-21', 'A', '1', '1', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_order_return_hdr`
--

CREATE TABLE `tbl_purchase_order_return_hdr` (
  `purchase_order_return_id` int(200) NOT NULL,
  `vendor_name` varchar(200) NOT NULL,
  `p_no` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `brnch_id` varchar(200) DEFAULT NULL,
  `fdate` varchar(200) DEFAULT NULL,
  `todate` varchar(200) DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_order_return_hdr`
--

INSERT INTO `tbl_purchase_order_return_hdr` (`purchase_order_return_id`, `vendor_name`, `p_no`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `brnch_id`, `fdate`, `todate`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '8', '1', '1', '2017-03-20', NULL, NULL, 'A', NULL, NULL, NULL, '1', '1', '1', '1'),
(2, '8', '3', '1', '2017-03-21', NULL, NULL, 'A', NULL, NULL, NULL, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_dtl`
--

CREATE TABLE `tbl_quotation_dtl` (
  `quotation_id_dtl` int(200) NOT NULL,
  `vendor_id` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `discountamount` varchar(200) DEFAULT NULL,
  `per_discount` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `product_id` varchar(200) NOT NULL,
  `quotation_id` varchar(200) NOT NULL,
  `list_price` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `net_price` varchar(200) NOT NULL,
  `sub_total` varchar(200) NOT NULL,
  `service_charge_percentage` varchar(200) DEFAULT NULL,
  `service_charge` varchar(200) DEFAULT NULL,
  `gross_discount_percentage` varchar(200) DEFAULT NULL,
  `gross_discount` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_quotation_dtl`
--

INSERT INTO `tbl_quotation_dtl` (`quotation_id_dtl`, `vendor_id`, `remark`, `discountamount`, `per_discount`, `description`, `product_id`, `quotation_id`, `list_price`, `quantity`, `unit`, `total`, `net_price`, `sub_total`, `service_charge_percentage`, `service_charge`, `gross_discount_percentage`, `gross_discount`, `grand_total`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '2', 'hdfj hjfhsdjkfhjsd sdjhfjdsjf', '42691', '10', '4.0mm 3.0m 0Degree (', '1', '1', '213455', '2', 'Set', '426910', '384219', '384219', '', '0.00', '', '0', '384219.00', '1', '0000-00-00', NULL, '2017-09-07', 'A', '1', '1', '1', NULL),
(2, '1', 'klsfds sdfds sd', '42691', '10', '4.0mm 3.0m 0Degree (', '1', '2', '213455', '2', 'Set', '426910', '384219', '384219', '', '0.00', '', '0', '384219.00', '1', '0000-00-00', NULL, '2017-09-07', 'A', '1', '1', '1', NULL),
(3, '1', '', '3897.25', '7', 'STEP CONTROL UNIT-APL 6 ASSY', '2', '3', '55675', '1', 'No.', '55675', '51777.75', '51777.75', '', '0.00', '', '0', '51777.75', '1', '0000-00-00', NULL, '2017-09-07', 'A', '1', '1', '1', NULL),
(4, '2', '', '', '', '4.0mm 3.0m 0Degree (', '1', '4', '213455', '2', 'Set', '426910', '426910', '426910', '', '0.00', '', '0', '426910.00', '1', '0000-00-00', NULL, '2017-09-08', 'A', '1', '1', '1', NULL),
(6, '', 'gdffd', '42691', '10', '4.0mm 3.0m 0Degree (', '1', '5', '213455', '2', 'Set', '426910', '384219', '576328.5', '', '0.00', '', '0', '576328.50', '1', '0000-00-00', NULL, '2017-09-10', 'A', '1', '1', '1', NULL),
(7, '', 'dfgdgfd', '21345.5', '10', '4.0mm 3.0m 0Degree (', '1', '5', '213455', '1', 'Set', '213455', '192109.5', '576328.5', '', '0.00', '', '0', '576328.50', '1', '0000-00-00', NULL, '2017-09-10', 'A', '1', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_hdr`
--

CREATE TABLE `tbl_quotation_hdr` (
  `quotation_id_hdr` int(200) NOT NULL,
  `vendor_id` varchar(200) NOT NULL,
  `delivery_date` date NOT NULL,
  `remark` varchar(200) NOT NULL,
  `office_remark_name` varchar(200) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `contant` varchar(5000) DEFAULT NULL,
  `contact_person_id` varchar(200) NOT NULL,
  `case_id` varchar(200) NOT NULL,
  `refno` varchar(200) NOT NULL,
  `new_ref` varchar(200) NOT NULL,
  `termandcondition` text NOT NULL,
  `template` varchar(200) NOT NULL,
  `sub_total` varchar(200) NOT NULL,
  `totalcaseid` varchar(200) NOT NULL,
  `service_charge` varchar(200) NOT NULL,
  `service_charge_percentage` varchar(200) DEFAULT NULL,
  `gross_discount` varchar(200) NOT NULL,
  `gross_discount_percentage` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `send_status` varchar(200) NOT NULL DEFAULT 'Send',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_quotation_hdr`
--

INSERT INTO `tbl_quotation_hdr` (`quotation_id_hdr`, `vendor_id`, `delivery_date`, `remark`, `office_remark_name`, `subject`, `contant`, `contact_person_id`, `case_id`, `refno`, `new_ref`, `termandcondition`, `template`, `sub_total`, `totalcaseid`, `service_charge`, `service_charge_percentage`, `gross_discount`, `gross_discount_percentage`, `grand_total`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `send_status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '2', '2017-09-07', 'ISS/QTN/BG/001/1718 DTD 24/4/2017', '', 'Offer for Spares', 'We thankfully acknowledge the receipt of your above mentioned enquiry which is redirected to us by our principals M/s. Iyappan Engineering Industries Private Limited, Chennai (The redirection letter is enclosed for yur reference).\r\nIn this connection we are pleased to quote our most competitive prices as under:-', '2', 'S/0001', 'AEPL/S/0001/17-18/S/0004', 'Your email dtd 24/4/2017', '<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><ins><strong>TERMS AND CONDITIONS:</strong></ins></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>1. Prices &ndash;</strong></td>\r\n			<td>F.O.R. Delhi.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>2. GST &ndash;</strong></td>\r\n			<td>GST Extra as applicable at the time of Despatch.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>3. Payment Terms</strong></td>\r\n			<td>100% payment along with 100% taxes against Proforma Invoice.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>4. Delivery</strong></td>\r\n			<td>20 Weeks from the date of receipt of your &nbsp;technically&nbsp; &amp; commercially&nbsp;Clear formal purchase order. SUBJECT TO FORCE MAJURE CLAUSE.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>5. Quotation Validity</strong></td>\r\n			<td>60 days from the date of this offer.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>6. Guarantee</strong></td>\r\n			<td>The material supplied by us shall be guaranteed for a period of 12months&nbsp;from the date of&nbsp;installation or 18month from the date of supply whichever&nbsp;is earlier.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>7. Road Permit &ndash;</strong></td>\r\n			<td>If applicable shall be provided by you.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Best Regards,</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>for ASHBOND ENGINEERS PVT. LTD.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Ashish Dhamija</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Director</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '2', '384219', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '0.00', '', '0', '', '384219.00', '1', '2017-09-07', NULL, '2017-09-07', 'A', 'Sent', '1', '1', '1', '1'),
(2, '1', '2017-09-07', 'ISS/QTN/BG/001/1718 DTD 24/4/2017', '', 'Offer for Spares', 'We thankfully acknowledge the receipt of your above mentioned enquiry which is redirected to us by our principals M/s. Iyappan Engineering Industries Private Limited, Chennai (The redirection letter is enclosed for yur reference).\nIn this connection we are pleased to quote our most competitive prices as under:-', '1', 'S/0001', 'AEPL/S/0001/17-18/NTPC Parichha/0006', 'Your email dtd 24/4/2017', '<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\"><ins><strong>TERMS AND CONDITIONS:</strong></ins></td>\n		</tr>\n		<tr>\n			<td><strong>1. Prices &ndash;</strong></td>\n			<td>F.O.R. Delhi.</td>\n		</tr>\n		<tr>\n			<td><strong>2. GST &ndash;</strong></td>\n			<td>GST Extra as applicable at the time of Despatch.</td>\n		</tr>\n		<tr>\n			<td><strong>3. Payment Terms</strong></td>\n			<td>100% payment along with 100% taxes against Proforma Invoice.</td>\n		</tr>\n		<tr>\n			<td><strong>4. Delivery</strong></td>\n			<td>20 Weeks from the date of receipt of your &nbsp;technically&nbsp; &amp; commercially&nbsp;Clear formal purchase order. SUBJECT TO FORCE MAJURE CLAUSE.&nbsp;</td>\n		</tr>\n		<tr>\n			<td><strong>5. Quotation Validity</strong></td>\n			<td>60 days from the date of this offer.</td>\n		</tr>\n		<tr>\n			<td><strong>6. Guarantee</strong></td>\n			<td>The material supplied by us shall be guaranteed for a period of 12months&nbsp;from the date of&nbsp;installation or 18month from the date of supply whichever&nbsp;is earlier.</td>\n		</tr>\n		<tr>\n			<td><strong>7. Road Permit &ndash;</strong></td>\n			<td>If applicable shall be provided by you.</td>\n		</tr>\n		<tr>\n			<td>Best Regards,</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>for ASHBOND ENGINEERS PVT. LTD.</strong></td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">&nbsp;</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">&nbsp;</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>Ashish Dhamija</strong></td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>Director</strong></td>\n		</tr>\n	</tbody>\n</table>\n', '2', '384219', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '0.00', '', '0', '', '384219.00', '1', '2017-09-07', NULL, '2017-09-07', 'A', 'Sent', '1', '1', '1', '1'),
(3, '1', '2017-09-07', '', '', 'JHVHI', 'jgvmckgckhgchgg', '1', 'S/0001', 'AEPL/S/0001/17-18/NTPC Parichha/0010', 'khvb', '<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\"><ins><strong>Terms and Conditions:&nbsp;</strong></ins></td>\n		</tr>\n		<tr>\n			<td><strong>1. Prices :-</strong></td>\n			<td>F. O. R. &nbsp;Destination.</td>\n		</tr>\n		<tr>\n			<td><strong>2. Delivery</strong></td>\n			<td>04 weeks.</td>\n		</tr>\n		<tr>\n			<td><strong>3. Mode of Dispatch</strong></td>\n			<td>By Road</td>\n		</tr>\n		<tr>\n			<td><strong>4. Payment Terms</strong></td>\n			<td>30 days after receipt of material.</td>\n		</tr>\n		<tr>\n			<td><strong>5. GST</strong></td>\n			<td>Extra as application at the time of dispatch.</td>\n		</tr>\n		<tr>\n			<td><strong>6. Warranty :-</strong></td>\n			<td>The material shall be inspected by the Customer or his&nbsp;authorized Inspection engineer at your works. &nbsp;</td>\n		</tr>\n		<tr>\n			<td><strong>7. Guarantee</strong></td>\n			<td>The supplied material should be free from defects and guarantee for a period of 18 month from date of dispatch or 12 month from the date of commission whichever is earlier.</td>\n		</tr>\n		<tr>\n			<td><strong>8. Test certificate</strong></td>\n			<td>&nbsp;Fitment and interchange ability certificate , test &amp; compliance certificate shall be provide.</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">\n			<p>Best Regards,&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>for ASHBOND ENGINEERS PVT. LTD.&nbsp;</strong></td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>(ASHISH DHAMIJA)</strong></td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;Director</strong></td>\n		</tr>\n	</tbody>\n</table>\n', '1', '51777.75', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '0.00', '', '0', '', '51777.75', '1', '2017-09-07', NULL, '2017-09-07', 'A', 'Send', '1', '1', '1', '1'),
(4, '2', '2017-09-08', '', '', 'SUBJECT TEST ONLY QUOTATION', 'We thank you for your above enquiry', '2', 'S/0002', 'AEPL/S/0002/17-18/S/0013', 'Ref. Mail dated 08.09.2017', '<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\"><ins><strong>TERMS AND CONDITIONS:</strong></ins></td>\n		</tr>\n		<tr>\n			<td><strong>1. Prices &ndash;</strong></td>\n			<td>F.O.R. Delhi.</td>\n		</tr>\n		<tr>\n			<td><strong>2. GST &ndash;</strong></td>\n			<td>GST Extra as applicable at the time of Despatch.</td>\n		</tr>\n		<tr>\n			<td><strong>3. Payment Terms</strong></td>\n			<td>100% payment along with 100% taxes against Proforma Invoice.</td>\n		</tr>\n		<tr>\n			<td><strong>4. Delivery</strong></td>\n			<td>20 Weeks from the date of receipt of your &nbsp;technically&nbsp; &amp; commercially&nbsp;Clear formal purchase order. SUBJECT TO FORCE MAJURE CLAUSE.&nbsp;</td>\n		</tr>\n		<tr>\n			<td><strong>5. Quotation Validity</strong></td>\n			<td>60 days from the date of this offer.</td>\n		</tr>\n		<tr>\n			<td><strong>6. Guarantee</strong></td>\n			<td>The material supplied by us shall be guaranteed for a period of 12months&nbsp;from the date of&nbsp;installation or 18month from the date of supply whichever&nbsp;is earlier.</td>\n		</tr>\n		<tr>\n			<td><strong>7. Road Permit &ndash;</strong></td>\n			<td>If applicable shall be provided by you.</td>\n		</tr>\n		<tr>\n			<td>Best Regards,</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td>&nbsp;</td>\n			<td>&nbsp;</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>for ASHBOND ENGINEERS PVT. LTD.</strong></td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">&nbsp;</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">&nbsp;</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>Ashish Dhamija</strong></td>\n		</tr>\n		<tr>\n			<td colspan=\"2\"><strong>Director</strong></td>\n		</tr>\n	</tbody>\n</table>\n', '2', '426910', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '0.00', '', '0', '', '426910.00', '1', '2017-09-08', NULL, '2017-09-08', 'A', 'Sent', '1', '1', '1', '1'),
(5, '2', '2017-09-10', 'fgfgdfgdd', '', 'hfghff hfh fhf', 'jhhfhgfgh', '2', 'S/0001', 'AEPL/S/0001/17-18/S/0020', 'gdfgdfgd', '', '1', '576328.5', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '0.00', '', '0', '', '576328.50', '1', '2017-09-10', NULL, '2017-09-10', 'A', 'Send', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_region_mst`
--

CREATE TABLE `tbl_region_mst` (
  `zone_id` int(200) NOT NULL,
  `comp_id` varchar(255) NOT NULL,
  `code` varchar(200) NOT NULL,
  `zone_name` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `compa_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `zonea_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_region_mst`
--

INSERT INTO `tbl_region_mst` (`zone_id`, `comp_id`, `code`, `zone_name`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `compa_id`, `brnh_id`, `divn_id`, `zonea_id`) VALUES
(1, '1', '345', 'Zone1', '1', '2017-03-18', '1', '2017-03-18', 'A', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_func_action`
--

CREATE TABLE `tbl_role_func_action` (
  `rol_func_act_id` int(11) NOT NULL,
  `role_id` varchar(200) NOT NULL,
  `module_id` varchar(200) DEFAULT NULL,
  `function_url` varchar(200) NOT NULL,
  `action_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role_func_action`
--

INSERT INTO `tbl_role_func_action` (`rol_func_act_id`, `role_id`, `module_id`, `function_url`, `action_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '1', '4', '91', 'Inactive', '1', '2017-03-18', '1', '2017-03-18', 'A', '1', '1', '1', '1'),
(2, '1', '4', '111', 'Inactive', '1', '2017-03-18', '1', '2017-03-18', 'A', '1', '1', '1', '1'),
(3, '1', '4', '93', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(4, '1', '4', '95', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(5, '1', '4', '97', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(6, '1', '4', '99', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(7, '1', '4', '101', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(8, '1', '4', '103', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(9, '1', '4', '105', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10, '1', '4', '107', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(11, '1', '4', '109', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(12, '1', '4', '113', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(13, '1', '4', '115', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(14, '1', '4', '117', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(15, '1', '4', '166', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(16, '1', '4', '167', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(17, '1', '4', '189', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(18, '1', '3', '209', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(19, '1', '3', '215', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(20, '1', '3', '221', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(21, '1', '3', '224', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(22, '1', '3', '256', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(23, '1', '3', '263', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(24, '1', '3', '264', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(25, '1', '3', '289', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(26, '1', '23', '306', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(27, '1', '30', '303', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(28, '1', '31', '305', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(29, '1', '28', '294', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(30, '1', '28', '302', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(31, '1', '27', '293', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(32, '1', '27', '304', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(33, '1', '27', '310', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(34, '1', '25', '89', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(35, '1', '7', '90', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(36, '1', '32', '311', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(37, '1', '32', '312', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(38, '1', '23', '316', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(39, '1', '3', '314', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(40, '1', '3', '320', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(41, '1', '3', '322', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(42, '1', '3', '323', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(43, '1', '23', '317', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(44, '1', '33', '324', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(45, '2', '3', '209', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(46, '2', '3', '215', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(47, '2', '3', '221', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(48, '2', '3', '224', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(49, '2', '3', '256', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(50, '2', '3', '263', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(51, '2', '3', '264', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(52, '2', '3', '289', 'Inactive', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(53, '2', '3', '314', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(54, '2', '3', '320', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(55, '2', '3', '322', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(56, '2', '3', '323', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(57, '2', '27', '293', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(58, '2', '27', '313', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(59, '2', '28', '294', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(60, '2', '28', '318', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(61, '2', '31', '305', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(62, '2', '31', '319', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(63, '2', '25', '89', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(64, '1', '34', '325', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(65, '1', '34', '327', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(66, '1', '35', '328', 'Active', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_mst`
--

CREATE TABLE `tbl_role_mst` (
  `role_id` int(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `action` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role_mst`
--

INSERT INTO `tbl_role_mst` (`role_id`, `code`, `role_name`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `action`) VALUES
(1, '945', 'admin_role', '1', '2017-03-18', '1', '2017-03-18', 'A', '1', '1', '1', '1', 'Add-edit-view-delete'),
(2, 'user_role', 'user_role', '1', '2017-06-06', '1', '2017-06-06', 'A', '1', '1', '1', '1', 'edit-view-delete-Add');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_ordernew_dtl`
--

CREATE TABLE `tbl_sales_ordernew_dtl` (
  `purchase_order_dtl_id` int(200) NOT NULL,
  `vendor_id` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `discountamount` varchar(200) DEFAULT NULL,
  `per_discount` varchar(200) DEFAULT NULL,
  `product_id` varchar(200) NOT NULL,
  `list_price` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `unit` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `net_price` varchar(200) NOT NULL,
  `sub_total` varchar(200) NOT NULL,
  `service_charge_percentage` varchar(200) DEFAULT NULL,
  `service_charge` varchar(200) DEFAULT NULL,
  `gross_discount_percentage` varchar(200) DEFAULT NULL,
  `gross_discount` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) NOT NULL,
  `purchase_order_hdr_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales_ordernew_dtl`
--

INSERT INTO `tbl_sales_ordernew_dtl` (`purchase_order_dtl_id`, `vendor_id`, `remark`, `discountamount`, `per_discount`, `product_id`, `list_price`, `quantity`, `description`, `unit`, `total`, `net_price`, `sub_total`, `service_charge_percentage`, `service_charge`, `gross_discount_percentage`, `gross_discount`, `grand_total`, `purchase_order_hdr_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '2', 'djkf jkdfhjkdhjfdf djkhjkdh df', '42691', '10', '1', '213455', '2', '4.0mm 3.0m 0Degree (', 'Set', '426910', '384219', '384219', '', '0.00', '', '0', '384219.00', '1', '1', '0000-00-00', NULL, '2017-09-07', 'A', '1', '1', '1', NULL),
(2, '1', '', '', '', '2', '55675', '1', 'STEP CONTROL UNIT-APL 6 ASSY', 'No.', '55675', '55675', '55675', '', '0.00', '', '0', '55675.00', '2', '1', '0000-00-00', NULL, '2017-09-07', 'A', '1', '1', '1', NULL),
(3, '1', '', '', '', '1', '213455', '1', '4.0mm 3.0m 0Degree (', 'Set', '213455', '213455', '213455', '', '0.00', '', '0', '213455.00', '3', '1', '0000-00-00', NULL, '2017-09-08', 'A', '1', '1', '1', NULL),
(5, '0', 'jjdsf', '21345.5', '10', '1', '213455', '1', '4.0mm 3.0m 0Degree (', 'Set', '213455', '192109.5', '242217', '', '0.00', '', '0', '242217.00', '4', '1', '0000-00-00', NULL, '2017-09-10', 'A', '1', '1', '1', NULL),
(6, '0', 'dfsdfsd', '5567.5', '10', '2', '55675', '1', '4.0mm 3.0m 0Degree (', 'No.', '55675', '50107.5', '242217', '', '0.00', '', '0', '242217.00', '4', '1', '0000-00-00', NULL, '2017-09-10', 'A', '1', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_ordernew_hdr`
--

CREATE TABLE `tbl_sales_ordernew_hdr` (
  `purchase_order_id` int(200) NOT NULL,
  `vendor_id` varchar(200) NOT NULL,
  `delivery_date` date NOT NULL,
  `remark` varchar(200) NOT NULL,
  `contant` text NOT NULL,
  `customer_dod` varchar(200) NOT NULL,
  `vendor_dod` varchar(200) NOT NULL,
  `ponew_date` varchar(200) NOT NULL,
  `ponew_no` varchar(200) NOT NULL,
  `office_remark_name` varchar(200) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `case_id` varchar(200) NOT NULL,
  `refno` varchar(200) NOT NULL,
  `new_ref_no` varchar(200) NOT NULL,
  `contact_person_id` varchar(200) NOT NULL,
  `totalcaseid` varchar(200) NOT NULL,
  `termandcondition` text NOT NULL,
  `template` varchar(200) NOT NULL,
  `sub_total` varchar(200) NOT NULL,
  `service_charge` varchar(200) NOT NULL,
  `service_charge_percentage` varchar(200) DEFAULT NULL,
  `gross_discount` varchar(200) NOT NULL,
  `gross_discount_percentage` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) NOT NULL,
  `upload_image` varchar(225) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `send_status` varchar(200) NOT NULL DEFAULT 'Send',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales_ordernew_hdr`
--

INSERT INTO `tbl_sales_ordernew_hdr` (`purchase_order_id`, `vendor_id`, `delivery_date`, `remark`, `contant`, `customer_dod`, `vendor_dod`, `ponew_date`, `ponew_no`, `office_remark_name`, `subject`, `case_id`, `refno`, `new_ref_no`, `contact_person_id`, `totalcaseid`, `termandcondition`, `template`, `sub_total`, `service_charge`, `service_charge_percentage`, `gross_discount`, `gross_discount_percentage`, `grand_total`, `upload_image`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `send_status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '2', '2017-09-07', 'PO FROM HINDALCO MAHAN', '', '2017-09-07', '2017-09-07', '2017-09-07', '951805809', '0', 'SPARES', 'S/0001', 'AEPL/S/0001/17-18/S/0005', 'ISS/QTN/BG/001', '2', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '', '', '384219', '0.00', '', '0', '', '384219.00', '1504784880_1502440654_951805047_dt-09.08.2017.pdf', '1', '2017-09-07', NULL, '2017-09-07', 'A', 'Sent', '1', '1', '1', '1'),
(2, '1', '2017-09-07', '', '', '2017-09-13', '2017-09-22', '2017-09-22', 'hvhkv', '0', 'jhbkbh', 'S/0001', 'AEPL/S/0001/17-18/NTPC Parichha/0008', '', '1', 'S/0001(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '', '', '55675', '0.00', '', '0', '', '55675.00', NULL, '1', '2017-09-07', NULL, '2017-09-07', 'A', 'Send', '1', '1', '1', '1'),
(3, '1', '2017-09-08', '', '', '2017-09-10', '2017-09-09', '2017-09-08', '100', '0', 'SALE ORDER', 'S/0002', 'AEPL/S/0002/17-18/NTPC Parichha/0014', 'REF. IY/S/BG/0006/1718', '1', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '', '', '213455', '0.00', '', '0', '', '213455.00', '1504870021_0422CAL1ZOTNCAO17XZ2CAEYDULMCA5OR6VUCA1KLNDRCA9GOLQLCAR6PANCCAZHUWBCCA3SRGY8CAP2ZHCSCAY38IW2CA1M3W10CASZFMMSCA0P86EXCA309AE4CAO4Q102CAFN9AHGCA5QTO7VCAS05ICX.jpg', '1', '2017-09-08', NULL, '2017-09-08', 'A', 'Sent', '1', '1', '1', '1'),
(4, '1', '2017-09-10', 'jkdhasjkhdjashjh', '', '2017-09-10', '2017-09-10', '2017-09-10', 'gsjdhgfjhd', '0', 'jsdgjhfgjhsdg', 'S/0002', 'AEPL/S/0002/17-18/NTPC Parichha/0021', 'jhgjhsdjghh', '1', 'S/0002(IYAPPAN SERVO SYSTEMS) (Parichha Thermal Power Project)', '', '', '242217', '0.00', '', '0', '', '242217.00', '', '1', '2017-09-10', NULL, '2017-09-10', 'A', 'Send', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_order_dtl`
--

CREATE TABLE `tbl_sales_order_dtl` (
  `sales_dtl_id` int(200) NOT NULL,
  `vendor_id` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `salesid` varchar(200) NOT NULL,
  `list_price` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `cgst` varchar(200) DEFAULT NULL,
  `sgst` varchar(200) DEFAULT NULL,
  `igst` varchar(200) DEFAULT NULL,
  `gstTotal` varchar(200) DEFAULT NULL,
  `remark` varchar(200) NOT NULL,
  `discountamount` varchar(200) DEFAULT NULL,
  `per_discount` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `unit` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `net_price` varchar(200) NOT NULL,
  `sub_total` varchar(200) NOT NULL,
  `service_charge_percentage` varchar(200) DEFAULT NULL,
  `service_charge` varchar(200) DEFAULT NULL,
  `gross_discount_percentage` varchar(200) DEFAULT NULL,
  `gross_discount` varchar(200) DEFAULT NULL,
  `cgst_per_total` varchar(200) DEFAULT NULL,
  `cgst_per_total_two` varchar(200) DEFAULT NULL,
  `sgst_per_total` varchar(200) DEFAULT NULL,
  `sgst_per_total_two` varchar(200) DEFAULT NULL,
  `igst_per_total` varchar(200) DEFAULT NULL,
  `igst_per_total_two` varchar(200) DEFAULT NULL,
  `gst_total_two` varchar(200) DEFAULT NULL,
  `discount_amount_total` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_order_hdr`
--

CREATE TABLE `tbl_sales_order_hdr` (
  `salesid` int(200) NOT NULL,
  `vendor_id` varchar(200) NOT NULL,
  `delivery_date` date NOT NULL,
  `remark` varchar(200) NOT NULL,
  `contant` text NOT NULL,
  `office_remark_name` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `case_id` varchar(200) NOT NULL,
  `refno` varchar(200) NOT NULL,
  `contact_person_id` varchar(200) NOT NULL,
  `totalcaseid` varchar(200) NOT NULL,
  `termandcondition` text NOT NULL,
  `template` varchar(200) NOT NULL,
  `agent_id` varchar(200) NOT NULL,
  `sub_total` varchar(200) NOT NULL,
  `service_charge` varchar(200) NOT NULL,
  `service_charge_percentage` varchar(200) NOT NULL,
  `gross_discount` varchar(200) NOT NULL,
  `gross_discount_percentage` varchar(200) NOT NULL,
  `cgst_per_total` varchar(200) DEFAULT NULL,
  `cgst_per_total_two` varchar(200) DEFAULT NULL,
  `sgst_per_total` varchar(200) DEFAULT NULL,
  `sgst_per_total_two` varchar(200) DEFAULT NULL,
  `igst_per_total` varchar(200) DEFAULT NULL,
  `igst_per_total_two` varchar(200) DEFAULT NULL,
  `gst_total_two` varchar(200) DEFAULT NULL,
  `discount_amount_total` varchar(200) DEFAULT NULL,
  `grand_total` varchar(200) NOT NULL,
  `maker_id` varchar(200) NOT NULL,
  `maker_date` date NOT NULL,
  `author_id` varchar(200) NOT NULL,
  `author_date` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `send_status` varchar(200) NOT NULL DEFAULT 'Send',
  `comp_id` varchar(200) NOT NULL,
  `zone_id` varchar(200) NOT NULL,
  `brnh_id` varchar(200) NOT NULL,
  `divn_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_order_return_dtl`
--

CREATE TABLE `tbl_sales_order_return_dtl` (
  `sales_order_return_id_dtl` int(200) NOT NULL,
  `s_no` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `list_price` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `reaming_return_qty` varchar(200) DEFAULT NULL,
  `return_qty` varchar(200) NOT NULL,
  `sales_order_returnid` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `brnch_id` varchar(200) DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_order_return_hdr`
--

CREATE TABLE `tbl_sales_order_return_hdr` (
  `sales_order_return_id` int(200) NOT NULL,
  `costomerid` varchar(200) NOT NULL,
  `so_no` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `brnch_id` varchar(200) DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state_m`
--

CREATE TABLE `tbl_state_m` (
  `stateid` int(11) NOT NULL,
  `countryid` int(11) DEFAULT NULL,
  `stateName` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state_m`
--

INSERT INTO `tbl_state_m` (`stateid`, `countryid`, `stateName`, `maker_id`, `author_id`, `maker_date`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, 1, 'Andaman and Nicobar Islands', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(2, 1, 'Andhra Pradesh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(3, 1, 'Arunachal Pradesh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(4, 1, 'Assam', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(5, 1, 'Bihar', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(6, 1, 'Chandigarh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(7, 1, 'Chhattisgarh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(8, 1, 'Dadra and Nagar Haveli', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(9, 1, 'Daman and Diu', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(10, 1, 'Delhi', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(11, 1, 'Goa', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(12, 1, 'Gujarat', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(13, 1, 'Haryana', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(14, 1, 'Himachal Pradesh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(15, 1, 'Jammu & Kashmir', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(16, 1, 'Jharkhand', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(17, 1, 'Karnataka', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(18, 1, 'Kerala', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(19, 1, 'Lakshadweep', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(20, 1, 'Madhya Pradesh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(21, 1, 'Maharashtra', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(22, 1, 'Manipur', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(23, 1, 'Meghalaya', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(24, 1, 'Mizoram', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(25, 1, 'Nagaland', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(26, 1, 'National Capital Region (India)', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(27, 1, 'Odisha', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(28, 1, 'Orissa', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(29, 1, 'Puducherry', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(30, 1, 'Punjab', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(31, 1, 'Rajasthan', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(32, 1, 'Sikkim', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(33, 1, 'Tamil Nadu', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(34, 1, 'Tripura', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(35, 1, 'Uttar Pradesh', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(36, 1, 'Uttarakhand', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(37, 1, 'West Bengal', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(100, 3, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(101, 4, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(102, 5, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(103, 6, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(104, 7, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(105, 8, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(106, 9, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(107, 10, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(108, 11, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(109, 12, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(110, 13, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(111, 14, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(112, 15, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(113, 16, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(114, 17, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(115, 18, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(116, 19, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(117, 20, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(118, 21, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(119, 22, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(120, 23, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(121, 24, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(122, 25, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(123, 26, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(124, 27, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(125, 28, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(127, 30, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(128, 31, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(129, 32, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(130, 33, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(131, 34, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(132, 35, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(133, 36, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(134, 37, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(135, 38, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(136, 39, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(137, 40, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(138, 41, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(139, 42, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(140, 43, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(141, 44, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(142, 45, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(143, 46, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(144, 47, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(145, 48, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(146, 49, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(147, 50, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(148, 51, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(149, 52, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(150, 53, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(151, 54, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(152, 55, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(153, 56, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(154, 57, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(156, 58, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(157, 59, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(158, 60, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(159, 61, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(160, 62, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(161, 63, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(162, 64, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(163, 65, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(164, 66, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(165, 67, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(166, 68, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(167, 69, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(168, 70, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(169, 71, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(170, 72, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(171, 73, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(172, 74, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(173, 75, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(174, 76, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(175, 77, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(176, 78, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(177, 79, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(178, 80, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(179, 81, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(180, 82, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(181, 83, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(182, 1, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(183, 85, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(184, 86, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(185, 87, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(186, 88, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(187, 89, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(188, 90, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(189, 91, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(190, 92, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(191, 93, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(192, 94, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(193, 95, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(194, 96, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(195, 97, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(196, 98, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(197, 99, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(198, 100, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(199, 101, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(200, 102, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(201, 103, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(202, 104, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(203, 105, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(204, 106, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(205, 107, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(206, 108, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(207, 109, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(208, 110, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(209, 111, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(210, 112, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(211, 113, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(212, 114, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(213, 115, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(214, 116, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(215, 117, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(216, 118, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(217, 119, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(218, 120, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(219, 121, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(220, 122, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(221, 123, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(222, 124, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(223, 125, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(224, 126, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(225, 127, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(226, 128, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(227, 129, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(228, 130, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(229, 131, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(230, 132, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(231, 133, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(232, 134, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(233, 135, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(234, 136, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(235, 137, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(236, 138, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(237, 139, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(238, 140, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(239, 141, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(240, 142, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(241, 143, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(242, 144, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(243, 145, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(244, 146, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(245, 147, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(247, 148, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(248, 149, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(249, 150, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(250, 151, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(251, 152, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(252, 153, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(253, 154, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(254, 155, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(255, 156, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(256, 157, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(257, 158, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(258, 159, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(260, 161, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(261, 162, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(262, 163, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(263, 164, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(264, 165, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(265, 166, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(266, 167, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(267, 168, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(268, 169, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(269, 170, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(270, 171, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(271, 172, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(272, 173, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(273, 174, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(274, 175, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(275, 176, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(277, 178, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(278, 179, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(279, 180, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(281, 182, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(282, 183, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(283, 184, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(284, 185, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(285, 186, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(286, 187, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(287, 188, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(288, 189, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(289, 190, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(290, 191, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(291, 192, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(292, 193, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(293, 194, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(294, 195, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(295, 196, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(296, 197, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(297, 198, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(298, 199, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(299, 200, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(300, 201, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(301, 202, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(302, 203, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(303, 204, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(304, 205, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(305, 206, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(306, 207, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(307, 2, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(308, 208, 'NA', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL),
(313, 1, 'Telangana', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_termandcondition`
--

CREATE TABLE `tbl_termandcondition` (
  `id` int(11) NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `des` text NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_termandcondition`
--

INSERT INTO `tbl_termandcondition` (`id`, `type`, `des`, `maker_id`, `maker_date`, `author_id`, `author_date`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `status`) VALUES
(1, 'IYAPPAN T&C', '<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><ins><strong>Terms and Conditions:&nbsp;</strong></ins></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>1. Prices :-</strong></td>\r\n			<td>F. O. R. &nbsp;Destination.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>2. Delivery</strong></td>\r\n			<td>04 weeks.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>3. Mode of Dispatch</strong></td>\r\n			<td>By Road</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>4. Payment Terms</strong></td>\r\n			<td>30 days after receipt of material.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>5. GST</strong></td>\r\n			<td>Extra as application at the time of dispatch.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>6. Warranty :-</strong></td>\r\n			<td>The material shall be inspected by the Customer or his&nbsp;authorized Inspection engineer at your works. &nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>7. Guarantee</strong></td>\r\n			<td>The supplied material should be free from defects and guarantee for a period of 18 month from date of dispatch or 12 month from the date of commission whichever is earlier.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>8. Test certificate</strong></td>\r\n			<td>&nbsp;Fitment and interchange ability certificate , test &amp; compliance certificate shall be provide.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<p>Best Regards,&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>for ASHBOND ENGINEERS PVT. LTD.&nbsp;</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>(ASHISH DHAMIJA)</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;Director</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A'),
(2, 'NON NTPC T&C', '<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><ins><strong>TERMS AND CONDITIONS:</strong></ins></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>1. Prices &ndash;</strong></td>\r\n			<td>F.O.R. Delhi.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>2. GST &ndash;</strong></td>\r\n			<td>GST Extra as applicable at the time of Despatch.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>3. Payment Terms</strong></td>\r\n			<td>100% payment along with 100% taxes against Proforma Invoice.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>4. Delivery</strong></td>\r\n			<td>20 Weeks from the date of receipt of your &nbsp;technically&nbsp; &amp; commercially&nbsp;Clear formal purchase order. SUBJECT TO FORCE MAJURE CLAUSE.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>5. Quotation Validity</strong></td>\r\n			<td>60 days from the date of this offer.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>6. Guarantee</strong></td>\r\n			<td>The material supplied by us shall be guaranteed for a period of 12months&nbsp;from the date of&nbsp;installation or 18month from the date of supply whichever&nbsp;is earlier.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>7. Road Permit &ndash;</strong></td>\r\n			<td>If applicable shall be provided by you.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Best Regards,</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>for ASHBOND ENGINEERS PVT. LTD.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Ashish Dhamija</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Director</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, '2017-09-07', NULL, '2017-09-07', '1', '1', '1', '1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_mst`
--

CREATE TABLE `tbl_user_mst` (
  `user_id` int(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `comp_id` varchar(200) NOT NULL,
  `zone_id` varchar(200) NOT NULL,
  `brnh_id` varchar(200) NOT NULL,
  `divn_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `data_access` varchar(200) DEFAULT 'self',
  `Allrowaccess` int(3) DEFAULT '1',
  `brnha_id` varchar(200) DEFAULT NULL,
  `compa_id` varchar(200) DEFAULT NULL,
  `divna_id` varchar(200) DEFAULT NULL,
  `zonea_id` varchar(200) DEFAULT NULL,
  `user_type` varchar(200) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `phone_no` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_mst`
--

INSERT INTO `tbl_user_mst` (`user_id`, `user_name`, `password`, `company_name`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `data_access`, `Allrowaccess`, `brnha_id`, `compa_id`, `divna_id`, `zonea_id`, `user_type`, `email_id`, `phone_no`) VALUES
(1, 'admin', 'admin', 'Techvyas', '1', '1', '1', '1', '1', '2017-03-18', '1', '2017-03-18', 'A', 'self', 1, '1', '1', '1', '1', 'User', 'anojk1996@gmail.com', '9582075068'),
(2, 'user', 'user', '', '2', '', '1', '1', '1', '2017-06-06', '1', '2017-06-06', 'A', 'self', 1, '1', '1', '1', '1', '', 'collestbablu@gmail.com', '9716127292');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role_mst`
--

CREATE TABLE `tbl_user_role_mst` (
  `user_role_id` int(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `role_id` varchar(200) NOT NULL,
  `comp_id` varchar(200) NOT NULL,
  `zone_id` varchar(200) NOT NULL,
  `brnh_id` varchar(200) NOT NULL,
  `divn_id` varchar(200) NOT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role_mst`
--

INSERT INTO `tbl_user_role_mst` (`user_role_id`, `user_id`, `role_id`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`, `maker_id`, `author_id`, `maker_date`, `author_date`, `status`) VALUES
(1, '1', '1', '1', '1', '1', '1', '1', '1', '2017-03-18', '2017-03-18', 'A'),
(2, '2', '2', '', '', '', '', NULL, NULL, NULL, NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usr_func_act_mst`
--

CREATE TABLE `tbl_usr_func_act_mst` (
  `mod_fuc_act_id` int(11) NOT NULL,
  `module_id` varchar(200) DEFAULT NULL,
  `role_id` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `function_url` varchar(200) DEFAULT NULL,
  `action_id` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `divn_id` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usr_func_act_mst`
--

INSERT INTO `tbl_usr_func_act_mst` (`mod_fuc_act_id`, `module_id`, `role_id`, `user_id`, `function_url`, `action_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1, '4', '1', '3', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(2, '4', '1', '3', '93', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(3, '4', '1', '3', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(4, '4', '1', '3', '97', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(5, '4', '1', '3', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(6, '4', '1', '3', '101', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(7, '4', '1', '3', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(8, '4', '1', '3', '105', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(9, '4', '1', '3', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(10, '4', '1', '3', '109', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(11, '4', '1', '3', '111', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(12, '4', '1', '3', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(13, '4', '1', '3', '115', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(14, '4', '1', '3', '117', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(15, '4', '1', '3', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(16, '4', '1', '3', '167', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(17, '3', '1', '3', '27', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(18, '3', '1', '3', '29', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(19, '3', '1', '3', '31', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(20, '3', '1', '3', '33', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(21, '3', '1', '3', '35', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(22, '3', '1', '3', '37', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(23, '3', '1', '3', '39', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(24, '3', '1', '3', '41', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(25, '3', '1', '3', '47', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(26, '3', '1', '3', '49', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(27, '3', '1', '3', '127', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(28, '3', '1', '3', '128', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(29, '3', '1', '3', '129', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(30, '3', '1', '3', '130', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(31, '3', '1', '3', '131', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(32, '3', '1', '3', '132', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(33, '3', '1', '3', '134', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(34, '3', '1', '3', '142', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(35, '3', '1', '3', '146', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(36, '3', '1', '3', '147', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(37, '3', '1', '3', '148', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(38, '3', '1', '3', '149', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(39, '3', '1', '3', '150', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(40, '3', '1', '3', '155', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(41, '3', '1', '3', '156', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(42, '3', '1', '3', '174', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(43, '3', '1', '3', '175', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(44, '3', '1', '3', '176', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(45, '10', '1', '3', '3', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(46, '10', '1', '3', '4', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(47, '10', '1', '3', '10', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(48, '10', '1', '3', '11', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(49, '10', '1', '3', '123', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(50, '10', '1', '3', '124', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(51, '10', '1', '3', '125', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(52, '10', '1', '3', '126', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(53, '10', '1', '3', '138', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(54, '10', '1', '3', '139', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(55, '10', '1', '3', '140', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(56, '10', '1', '3', '157', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(57, '10', '1', '3', '158', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(58, '10', '1', '3', '163', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(59, '10', '1', '3', '165', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(60, '10', '1', '3', '180', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(61, '10', '1', '3', '181', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(62, '10', '1', '3', '182', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(63, '10', '1', '3', '183', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(64, '10', '1', '3', '184', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(65, '10', '1', '3', '185', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(66, '11', '1', '3', '43', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(67, '11', '1', '3', '45', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(68, '11', '1', '3', '133', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(69, '6', '1', '3', '89', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(70, '8', '1', '3', '120', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(71, '8', '1', '3', '122', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(72, '7', '1', '3', '90', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(73, '4', '1', '3', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(74, '4', '1', '3', '93', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(75, '4', '1', '3', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(76, '4', '1', '3', '97', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(77, '4', '1', '3', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(78, '4', '1', '3', '101', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(79, '4', '1', '3', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(80, '4', '1', '3', '105', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(81, '4', '1', '3', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(82, '4', '1', '3', '109', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(83, '4', '1', '3', '111', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(84, '4', '1', '3', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(85, '4', '1', '3', '115', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(86, '4', '1', '3', '117', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(87, '4', '1', '3', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(88, '4', '1', '3', '167', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(89, '3', '1', '3', '27', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(90, '3', '1', '3', '29', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(91, '3', '1', '3', '31', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(92, '3', '1', '3', '33', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(93, '3', '1', '3', '35', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(94, '3', '1', '3', '37', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(95, '3', '1', '3', '39', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(96, '3', '1', '3', '41', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(97, '3', '1', '3', '47', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(98, '3', '1', '3', '49', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(99, '3', '1', '3', '127', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(100, '3', '1', '3', '128', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(101, '3', '1', '3', '129', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(102, '3', '1', '3', '130', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(103, '3', '1', '3', '131', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(104, '3', '1', '3', '132', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(105, '3', '1', '3', '134', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(106, '3', '1', '3', '142', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(107, '3', '1', '3', '146', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(108, '3', '1', '3', '147', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(109, '3', '1', '3', '148', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(110, '3', '1', '3', '149', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(111, '3', '1', '3', '150', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(112, '3', '1', '3', '155', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(113, '3', '1', '3', '156', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(114, '3', '1', '3', '174', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(115, '3', '1', '3', '175', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(116, '3', '1', '3', '176', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(117, '10', '1', '3', '3', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(118, '10', '1', '3', '4', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(119, '10', '1', '3', '10', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(120, '10', '1', '3', '11', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(121, '10', '1', '3', '123', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(122, '10', '1', '3', '124', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(123, '10', '1', '3', '125', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(124, '10', '1', '3', '126', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(125, '10', '1', '3', '138', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(126, '10', '1', '3', '139', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(127, '10', '1', '3', '140', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(128, '10', '1', '3', '157', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(129, '10', '1', '3', '158', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(130, '10', '1', '3', '163', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(131, '10', '1', '3', '165', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(132, '10', '1', '3', '180', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(133, '10', '1', '3', '181', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(134, '10', '1', '3', '182', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(135, '10', '1', '3', '183', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(136, '10', '1', '3', '184', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(137, '10', '1', '3', '185', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(138, '11', '1', '3', '43', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(139, '11', '1', '3', '45', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(140, '11', '1', '3', '133', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(141, '6', '1', '3', '89', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(142, '8', '1', '3', '120', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(143, '8', '1', '3', '122', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(144, '7', '1', '3', '90', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(145, '4', '2', '3', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(146, '4', '2', '3', '93', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(147, '4', '2', '3', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(148, '4', '2', '3', '97', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(149, '4', '2', '3', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(150, '4', '2', '3', '101', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(151, '4', '2', '3', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(152, '4', '2', '3', '105', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(153, '4', '2', '3', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(154, '4', '2', '3', '109', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(155, '4', '2', '3', '111', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(156, '4', '2', '3', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(157, '4', '2', '3', '115', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(158, '4', '2', '3', '117', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(159, '4', '2', '3', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(160, '4', '2', '3', '167', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(161, '4', '2', '12', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(162, '4', '2', '12', '93', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(163, '4', '2', '12', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(164, '4', '2', '12', '97', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(165, '4', '2', '12', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(166, '4', '2', '12', '101', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(167, '4', '2', '12', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(168, '4', '2', '12', '105', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(169, '4', '2', '12', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(170, '4', '2', '12', '109', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(171, '4', '2', '12', '111', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(172, '4', '2', '12', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(173, '4', '2', '12', '115', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(174, '4', '2', '12', '117', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(175, '4', '2', '12', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(176, '4', '2', '12', '167', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(177, '3', '2', '12', '27', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(178, '3', '2', '12', '29', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(179, '3', '2', '12', '31', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(180, '3', '2', '12', '33', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(181, '3', '2', '12', '35', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(182, '3', '2', '12', '37', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(183, '3', '2', '12', '39', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(184, '3', '2', '12', '41', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(185, '3', '2', '12', '47', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(186, '3', '2', '12', '49', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(187, '3', '2', '12', '127', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(188, '3', '2', '12', '128', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(189, '3', '2', '12', '129', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(190, '3', '2', '12', '130', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(191, '3', '2', '12', '131', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(192, '3', '2', '12', '132', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(193, '3', '2', '12', '134', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(194, '3', '2', '12', '142', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(195, '3', '2', '12', '146', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(196, '3', '2', '12', '147', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(197, '3', '2', '12', '148', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(198, '3', '2', '12', '149', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(199, '3', '2', '12', '150', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(200, '3', '2', '12', '155', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(201, '3', '2', '12', '156', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(202, '3', '2', '12', '174', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(203, '3', '2', '12', '175', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(204, '3', '2', '12', '176', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(205, '10', '2', '12', '3', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(206, '10', '2', '12', '4', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(207, '10', '2', '12', '10', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(208, '10', '2', '12', '11', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(209, '10', '2', '12', '123', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(210, '10', '2', '12', '124', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(211, '4', '2', '12', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(212, '4', '2', '12', '93', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(213, '4', '2', '12', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(214, '4', '2', '12', '97', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(215, '4', '2', '12', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(216, '4', '2', '12', '101', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(217, '4', '2', '12', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(218, '4', '2', '12', '105', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(219, '4', '2', '12', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(220, '4', '2', '12', '109', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(221, '4', '2', '12', '111', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(222, '4', '2', '12', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(223, '4', '2', '12', '115', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(224, '4', '2', '12', '117', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(225, '4', '2', '12', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(226, '4', '2', '12', '167', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(227, '12', '2', '12', '25', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(228, '12', '2', '12', '51', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(229, '12', '2', '12', '53', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(230, '12', '2', '12', '55', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(231, '12', '2', '12', '57', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(232, '12', '2', '12', '59', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(233, '12', '2', '12', '61', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(234, '6', '2', '12', '89', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(235, '8', '2', '12', '120', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(236, '8', '2', '12', '122', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(237, '7', '2', '12', '90', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(238, '11', '2', '12', '43', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(239, '11', '2', '12', '45', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(240, '11', '2', '12', '133', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(241, '4', '2', '13', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(242, '4', '2', '13', '93', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(243, '4', '2', '13', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(244, '4', '2', '13', '97', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(245, '4', '2', '13', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(246, '4', '2', '13', '101', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(247, '4', '2', '13', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(248, '4', '2', '13', '105', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(249, '4', '2', '13', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(250, '4', '2', '13', '109', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(251, '4', '2', '13', '111', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(252, '4', '2', '13', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(253, '4', '2', '13', '115', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(254, '4', '2', '13', '117', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(255, '4', '2', '13', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(256, '4', '2', '13', '167', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(257, '3', '2', '13', '27', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(258, '3', '2', '13', '29', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(259, '3', '2', '13', '31', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(260, '3', '2', '13', '33', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(261, '3', '2', '13', '35', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(262, '3', '2', '13', '37', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(263, '3', '2', '13', '39', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(264, '3', '2', '13', '41', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(265, '3', '2', '13', '47', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(266, '3', '2', '13', '49', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(267, '3', '2', '13', '127', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(268, '3', '2', '13', '128', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(269, '3', '2', '13', '129', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(270, '3', '2', '13', '130', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(271, '3', '2', '13', '131', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(272, '3', '2', '13', '132', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(273, '3', '2', '13', '134', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(274, '3', '2', '13', '142', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(275, '3', '2', '13', '146', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(276, '3', '2', '13', '147', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(277, '3', '2', '13', '148', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(278, '3', '2', '13', '149', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(279, '3', '2', '13', '150', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(280, '3', '2', '13', '155', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(281, '3', '2', '13', '156', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(282, '3', '2', '13', '174', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(283, '3', '2', '13', '175', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(284, '3', '2', '13', '176', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(285, '10', '2', '13', '3', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(286, '10', '2', '13', '4', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(287, '10', '2', '13', '10', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(288, '10', '2', '13', '11', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(289, '10', '2', '13', '123', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(290, '10', '2', '13', '124', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(291, '4', '2', '13', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(292, '4', '2', '13', '93', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(293, '4', '2', '13', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(294, '4', '2', '13', '97', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(295, '4', '2', '13', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(296, '4', '2', '13', '101', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(297, '4', '2', '13', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(298, '4', '2', '13', '105', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(299, '4', '2', '13', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(300, '4', '2', '13', '109', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(301, '4', '2', '13', '111', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(302, '4', '2', '13', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(303, '4', '2', '13', '115', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(304, '4', '2', '13', '117', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(305, '4', '2', '13', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(306, '4', '2', '13', '167', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(307, '12', '2', '13', '25', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(308, '12', '2', '13', '51', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(309, '12', '2', '13', '53', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(310, '12', '2', '13', '55', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(311, '12', '2', '13', '57', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(312, '12', '2', '13', '59', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(313, '12', '2', '13', '61', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(314, '6', '2', '13', '89', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(315, '8', '2', '13', '120', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(316, '8', '2', '13', '122', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(317, '7', '2', '13', '90', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(318, '11', '2', '13', '43', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(319, '11', '2', '13', '45', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(320, '11', '2', '13', '133', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(321, '4', '2', '13', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(322, '4', '2', '13', '93', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(323, '4', '2', '13', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(324, '4', '2', '13', '97', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(325, '4', '2', '13', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(326, '4', '2', '13', '101', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(327, '4', '2', '13', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(328, '4', '2', '13', '105', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(329, '4', '2', '13', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(330, '4', '2', '13', '109', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(331, '4', '2', '13', '111', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(332, '4', '2', '13', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(333, '4', '2', '13', '115', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(334, '4', '2', '13', '117', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(335, '4', '2', '13', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(336, '4', '2', '13', '167', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(337, '3', '2', '13', '27', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(338, '3', '2', '13', '29', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(339, '3', '2', '13', '31', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(340, '3', '2', '13', '33', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(341, '3', '2', '13', '35', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(342, '3', '2', '13', '37', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(343, '3', '2', '13', '39', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(344, '3', '2', '13', '41', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(345, '3', '2', '13', '47', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(346, '3', '2', '13', '49', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(347, '3', '2', '13', '127', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(348, '3', '2', '13', '128', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(349, '3', '2', '13', '129', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(350, '3', '2', '13', '130', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(351, '3', '2', '13', '131', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(352, '3', '2', '13', '132', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(353, '3', '2', '13', '134', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(354, '3', '2', '13', '142', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(355, '3', '2', '13', '146', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(356, '3', '2', '13', '147', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(357, '3', '2', '13', '148', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(358, '3', '2', '13', '149', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(359, '3', '2', '13', '150', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(360, '3', '2', '13', '155', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(361, '3', '2', '13', '156', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(362, '3', '2', '13', '174', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(363, '3', '2', '13', '175', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(364, '3', '2', '13', '176', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(365, '10', '2', '13', '3', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(366, '10', '2', '13', '4', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(367, '10', '2', '13', '10', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(368, '10', '2', '13', '11', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(369, '10', '2', '13', '123', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(370, '10', '2', '13', '124', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(371, '4', '2', '13', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(372, '4', '2', '13', '93', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(373, '4', '2', '13', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(374, '4', '2', '13', '97', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(375, '4', '2', '13', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(376, '4', '2', '13', '101', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(377, '4', '2', '13', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(378, '4', '2', '13', '105', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(379, '4', '2', '13', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(380, '4', '2', '13', '109', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(381, '4', '2', '13', '111', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(382, '4', '2', '13', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(383, '4', '2', '13', '115', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(384, '4', '2', '13', '117', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(385, '4', '2', '13', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(386, '4', '2', '13', '167', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(387, '12', '2', '13', '25', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(388, '12', '2', '13', '51', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(389, '12', '2', '13', '53', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(390, '12', '2', '13', '55', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(391, '12', '2', '13', '57', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(392, '12', '2', '13', '59', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(393, '12', '2', '13', '61', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(394, '6', '2', '13', '89', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(395, '8', '2', '13', '120', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(396, '8', '2', '13', '122', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(397, '7', '2', '13', '90', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(398, '11', '2', '13', '43', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(399, '11', '2', '13', '45', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(400, '11', '2', '13', '133', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(401, '4', '2', '13', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(402, '4', '2', '13', '93', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(403, '4', '2', '13', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(404, '4', '2', '13', '97', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(405, '4', '2', '13', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(406, '4', '2', '13', '101', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(407, '4', '2', '13', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(408, '4', '2', '13', '105', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(409, '4', '2', '13', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(410, '4', '2', '13', '109', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(411, '4', '2', '13', '111', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(412, '4', '2', '13', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(413, '4', '2', '13', '115', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(414, '4', '2', '13', '117', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(415, '4', '2', '13', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(416, '4', '2', '13', '167', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(417, '3', '2', '13', '27', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(418, '3', '2', '13', '29', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(419, '3', '2', '13', '31', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(420, '3', '2', '13', '33', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(421, '3', '2', '13', '35', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(422, '3', '2', '13', '37', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(423, '3', '2', '13', '39', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(424, '3', '2', '13', '41', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(425, '3', '2', '13', '47', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(426, '3', '2', '13', '49', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(427, '3', '2', '13', '127', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(428, '3', '2', '13', '128', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(429, '3', '2', '13', '129', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(430, '3', '2', '13', '130', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(431, '3', '2', '13', '131', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(432, '3', '2', '13', '132', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(433, '3', '2', '13', '134', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(434, '3', '2', '13', '142', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(435, '3', '2', '13', '146', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(436, '3', '2', '13', '147', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(437, '3', '2', '13', '148', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(438, '3', '2', '13', '149', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(439, '3', '2', '13', '150', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(440, '3', '2', '13', '155', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(441, '3', '2', '13', '156', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(442, '3', '2', '13', '174', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(443, '3', '2', '13', '175', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(444, '3', '2', '13', '176', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(445, '10', '2', '13', '3', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(446, '10', '2', '13', '4', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(447, '10', '2', '13', '10', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(448, '10', '2', '13', '11', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(449, '10', '2', '13', '123', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(450, '10', '2', '13', '124', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(451, '4', '2', '13', '91', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(452, '4', '2', '13', '93', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(453, '4', '2', '13', '95', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(454, '4', '2', '13', '97', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(455, '4', '2', '13', '99', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(456, '4', '2', '13', '101', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(457, '4', '2', '13', '103', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(458, '4', '2', '13', '105', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(459, '4', '2', '13', '107', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(460, '4', '2', '13', '109', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(461, '4', '2', '13', '111', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(462, '4', '2', '13', '113', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(463, '4', '2', '13', '115', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(464, '4', '2', '13', '117', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(465, '4', '2', '13', '166', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(466, '4', '2', '13', '167', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(467, '12', '2', '13', '25', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(468, '12', '2', '13', '51', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(469, '12', '2', '13', '53', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(470, '12', '2', '13', '55', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(471, '12', '2', '13', '57', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(472, '12', '2', '13', '59', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(473, '12', '2', '13', '61', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(474, '6', '2', '13', '89', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(475, '8', '2', '13', '120', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(476, '8', '2', '13', '122', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(477, '7', '2', '13', '90', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(478, '11', '2', '13', '43', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(479, '11', '2', '13', '45', 'Active', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(480, '11', '2', '13', '133', 'Inactive', '3', '2015-03-04', '3', '2015-03-04', 'A', '1', '7', '7', '13'),
(481, '4', '2', '14', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(482, '4', '2', '14', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(483, '4', '2', '14', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(484, '4', '2', '14', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(485, '4', '2', '14', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1');
INSERT INTO `tbl_usr_func_act_mst` (`mod_fuc_act_id`, `module_id`, `role_id`, `user_id`, `function_url`, `action_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(486, '4', '2', '14', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(487, '4', '2', '14', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(488, '4', '2', '14', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(489, '4', '2', '14', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(490, '4', '2', '14', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(491, '4', '2', '14', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(492, '4', '2', '14', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(493, '4', '2', '14', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(494, '4', '2', '14', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(495, '4', '2', '14', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(496, '4', '2', '14', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(497, '3', '2', '14', '27', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(498, '3', '2', '14', '29', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(499, '3', '2', '14', '31', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(500, '3', '2', '14', '33', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(501, '3', '2', '14', '35', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(502, '3', '2', '14', '37', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(503, '3', '2', '14', '39', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(504, '3', '2', '14', '41', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(505, '3', '2', '14', '47', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(506, '3', '2', '14', '49', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(507, '3', '2', '14', '127', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(508, '3', '2', '14', '128', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(509, '3', '2', '14', '129', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(510, '3', '2', '14', '130', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(511, '3', '2', '14', '131', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(512, '3', '2', '14', '132', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(513, '3', '2', '14', '134', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(514, '3', '2', '14', '142', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(515, '3', '2', '14', '146', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(516, '3', '2', '14', '147', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(517, '3', '2', '14', '148', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(518, '3', '2', '14', '149', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(519, '3', '2', '14', '150', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(520, '3', '2', '14', '155', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(521, '3', '2', '14', '156', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(522, '3', '2', '14', '174', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(523, '3', '2', '14', '175', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(524, '3', '2', '14', '176', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(525, '10', '2', '14', '3', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(526, '10', '2', '14', '4', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(527, '10', '2', '14', '10', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(528, '10', '2', '14', '11', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(529, '10', '2', '14', '123', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(530, '10', '2', '14', '124', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(531, '4', '2', '14', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(532, '4', '2', '14', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(533, '4', '2', '14', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(534, '4', '2', '14', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(535, '4', '2', '14', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(536, '4', '2', '14', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(537, '4', '2', '14', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(538, '4', '2', '14', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(539, '4', '2', '14', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(540, '4', '2', '14', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(541, '4', '2', '14', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(542, '4', '2', '14', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(543, '4', '2', '14', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(544, '4', '2', '14', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(545, '4', '2', '14', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(546, '4', '2', '14', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(547, '12', '2', '14', '25', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(548, '12', '2', '14', '51', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(549, '12', '2', '14', '53', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(550, '12', '2', '14', '55', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(551, '12', '2', '14', '57', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(552, '12', '2', '14', '59', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(553, '12', '2', '14', '61', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(554, '6', '2', '14', '89', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(555, '8', '2', '14', '120', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(556, '8', '2', '14', '122', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(557, '7', '2', '14', '90', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(558, '11', '2', '14', '43', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(559, '11', '2', '14', '45', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(560, '11', '2', '14', '133', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(561, '10', '2', '14', '125', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(562, '10', '2', '14', '126', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(563, '10', '2', '14', '138', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(564, '10', '2', '14', '139', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(565, '10', '2', '14', '140', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(566, '10', '2', '14', '157', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(567, '10', '2', '14', '158', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(568, '10', '2', '14', '163', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(569, '10', '2', '14', '165', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(570, '10', '2', '14', '180', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(571, '10', '2', '14', '181', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(572, '10', '2', '14', '182', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(573, '10', '2', '14', '183', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(574, '10', '2', '14', '184', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(575, '10', '2', '14', '185', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(576, '4', '2', '15', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(577, '4', '2', '15', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(578, '4', '2', '15', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(579, '4', '2', '15', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(580, '4', '2', '15', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(581, '4', '2', '15', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(582, '4', '2', '15', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(583, '4', '2', '15', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(584, '4', '2', '15', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(585, '4', '2', '15', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(586, '4', '2', '15', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(587, '4', '2', '15', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(588, '4', '2', '15', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(589, '4', '2', '15', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(590, '4', '2', '15', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(591, '4', '2', '15', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(592, '3', '2', '15', '27', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(593, '3', '2', '15', '29', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(594, '3', '2', '15', '31', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(595, '3', '2', '15', '33', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(596, '3', '2', '15', '35', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(597, '3', '2', '15', '37', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(598, '3', '2', '15', '39', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(599, '3', '2', '15', '41', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(600, '3', '2', '15', '47', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(601, '3', '2', '15', '49', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(602, '3', '2', '15', '127', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(603, '3', '2', '15', '128', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(604, '3', '2', '15', '129', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(605, '3', '2', '15', '130', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(606, '3', '2', '15', '131', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(607, '3', '2', '15', '132', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(608, '3', '2', '15', '134', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(609, '3', '2', '15', '142', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(610, '3', '2', '15', '146', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(611, '3', '2', '15', '147', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(612, '3', '2', '15', '148', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(613, '3', '2', '15', '149', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(614, '3', '2', '15', '150', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(615, '3', '2', '15', '155', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(616, '3', '2', '15', '156', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(617, '3', '2', '15', '174', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(618, '3', '2', '15', '175', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(619, '3', '2', '15', '176', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(620, '10', '2', '15', '3', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(621, '10', '2', '15', '4', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(622, '10', '2', '15', '10', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(623, '10', '2', '15', '11', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(624, '10', '2', '15', '123', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(625, '10', '2', '15', '124', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(626, '4', '2', '15', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(627, '4', '2', '15', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(628, '4', '2', '15', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(629, '4', '2', '15', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(630, '4', '2', '15', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(631, '4', '2', '15', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(632, '4', '2', '15', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(633, '4', '2', '15', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(634, '4', '2', '15', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(635, '4', '2', '15', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(636, '4', '2', '15', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(637, '4', '2', '15', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(638, '4', '2', '15', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(639, '4', '2', '15', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(640, '4', '2', '15', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(641, '4', '2', '15', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(642, '12', '2', '15', '25', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(643, '12', '2', '15', '51', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(644, '12', '2', '15', '53', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(645, '12', '2', '15', '55', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(646, '12', '2', '15', '57', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(647, '12', '2', '15', '59', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(648, '12', '2', '15', '61', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(649, '6', '2', '15', '89', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(650, '8', '2', '15', '120', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(651, '8', '2', '15', '122', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(652, '7', '2', '15', '90', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(653, '11', '2', '15', '43', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(654, '11', '2', '15', '45', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(655, '11', '2', '15', '133', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(656, '10', '2', '15', '125', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(657, '10', '2', '15', '126', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(658, '10', '2', '15', '138', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(659, '10', '2', '15', '139', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(660, '10', '2', '15', '140', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(661, '10', '2', '15', '157', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(662, '10', '2', '15', '158', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(663, '10', '2', '15', '163', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(664, '10', '2', '15', '165', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(665, '10', '2', '15', '180', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(666, '10', '2', '15', '181', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(667, '10', '2', '15', '182', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(668, '10', '2', '15', '183', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(669, '10', '2', '15', '184', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(670, '10', '2', '15', '185', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(671, '4', '2', '16', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(672, '4', '2', '16', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(673, '4', '2', '16', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(674, '4', '2', '16', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(675, '4', '2', '16', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(676, '4', '2', '16', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(677, '4', '2', '16', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(678, '4', '2', '16', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(679, '4', '2', '16', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(680, '4', '2', '16', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(681, '4', '2', '16', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(682, '4', '2', '16', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(683, '4', '2', '16', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(684, '4', '2', '16', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(685, '4', '2', '16', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(686, '4', '2', '16', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(687, '3', '2', '16', '27', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(688, '3', '2', '16', '29', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(689, '3', '2', '16', '31', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(690, '3', '2', '16', '33', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(691, '3', '2', '16', '35', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(692, '3', '2', '16', '37', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(693, '3', '2', '16', '39', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(694, '3', '2', '16', '41', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(695, '3', '2', '16', '47', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(696, '3', '2', '16', '49', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(697, '3', '2', '16', '127', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(698, '3', '2', '16', '128', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(699, '3', '2', '16', '129', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(700, '3', '2', '16', '130', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(701, '3', '2', '16', '131', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(702, '3', '2', '16', '132', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(703, '3', '2', '16', '134', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(704, '3', '2', '16', '142', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(705, '3', '2', '16', '146', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(706, '3', '2', '16', '147', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(707, '3', '2', '16', '148', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(708, '3', '2', '16', '149', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(709, '3', '2', '16', '150', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(710, '3', '2', '16', '155', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(711, '3', '2', '16', '156', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(712, '3', '2', '16', '174', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(713, '3', '2', '16', '175', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(714, '3', '2', '16', '176', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(715, '10', '2', '16', '3', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(716, '10', '2', '16', '4', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(717, '10', '2', '16', '10', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(718, '10', '2', '16', '11', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(719, '10', '2', '16', '123', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(720, '10', '2', '16', '124', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(721, '4', '2', '16', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(722, '4', '2', '16', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(723, '4', '2', '16', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(724, '4', '2', '16', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(725, '4', '2', '16', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(726, '4', '2', '16', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(727, '4', '2', '16', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(728, '4', '2', '16', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(729, '4', '2', '16', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(730, '4', '2', '16', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(731, '4', '2', '16', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(732, '4', '2', '16', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(733, '4', '2', '16', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(734, '4', '2', '16', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(735, '4', '2', '16', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(736, '4', '2', '16', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(737, '12', '2', '16', '25', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(738, '12', '2', '16', '51', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(739, '12', '2', '16', '53', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(740, '12', '2', '16', '55', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(741, '12', '2', '16', '57', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(742, '12', '2', '16', '59', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(743, '12', '2', '16', '61', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(744, '6', '2', '16', '89', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(745, '8', '2', '16', '120', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(746, '8', '2', '16', '122', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(747, '7', '2', '16', '90', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(748, '11', '2', '16', '43', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(749, '11', '2', '16', '45', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(750, '11', '2', '16', '133', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(751, '10', '2', '16', '125', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(752, '10', '2', '16', '126', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(753, '10', '2', '16', '138', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(754, '10', '2', '16', '139', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(755, '10', '2', '16', '140', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(756, '10', '2', '16', '157', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(757, '10', '2', '16', '158', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(758, '10', '2', '16', '163', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(759, '10', '2', '16', '165', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(760, '10', '2', '16', '180', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(761, '10', '2', '16', '181', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(762, '10', '2', '16', '182', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(763, '10', '2', '16', '183', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(764, '10', '2', '16', '184', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(765, '10', '2', '16', '185', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(766, '4', '2', '17', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(767, '4', '2', '17', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(768, '4', '2', '17', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(769, '4', '2', '17', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(770, '4', '2', '17', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(771, '4', '2', '17', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(772, '4', '2', '17', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(773, '4', '2', '17', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(774, '4', '2', '17', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(775, '4', '2', '17', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(776, '4', '2', '17', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(777, '4', '2', '17', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(778, '4', '2', '17', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(779, '4', '2', '17', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(780, '4', '2', '17', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(781, '4', '2', '17', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(782, '3', '2', '17', '27', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(783, '3', '2', '17', '29', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(784, '3', '2', '17', '31', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(785, '3', '2', '17', '33', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(786, '3', '2', '17', '35', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(787, '3', '2', '17', '37', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(788, '3', '2', '17', '39', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(789, '3', '2', '17', '41', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(790, '3', '2', '17', '47', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(791, '3', '2', '17', '49', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(792, '3', '2', '17', '127', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(793, '3', '2', '17', '128', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(794, '3', '2', '17', '129', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(795, '3', '2', '17', '130', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(796, '3', '2', '17', '131', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(797, '3', '2', '17', '132', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(798, '3', '2', '17', '134', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(799, '3', '2', '17', '142', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(800, '3', '2', '17', '146', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(801, '3', '2', '17', '147', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(802, '3', '2', '17', '148', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(803, '3', '2', '17', '149', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(804, '3', '2', '17', '150', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(805, '3', '2', '17', '155', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(806, '3', '2', '17', '156', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(807, '3', '2', '17', '174', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(808, '3', '2', '17', '175', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(809, '3', '2', '17', '176', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(810, '10', '2', '17', '3', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(811, '10', '2', '17', '4', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(812, '10', '2', '17', '10', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(813, '10', '2', '17', '11', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(814, '10', '2', '17', '123', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(815, '10', '2', '17', '124', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(816, '4', '2', '17', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(817, '4', '2', '17', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(818, '4', '2', '17', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(819, '4', '2', '17', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(820, '4', '2', '17', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(821, '4', '2', '17', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(822, '4', '2', '17', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(823, '4', '2', '17', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(824, '4', '2', '17', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(825, '4', '2', '17', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(826, '4', '2', '17', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(827, '4', '2', '17', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(828, '4', '2', '17', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(829, '4', '2', '17', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(830, '4', '2', '17', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(831, '4', '2', '17', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(832, '12', '2', '17', '25', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(833, '12', '2', '17', '51', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(834, '12', '2', '17', '53', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(835, '12', '2', '17', '55', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(836, '12', '2', '17', '57', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(837, '12', '2', '17', '59', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(838, '12', '2', '17', '61', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(839, '6', '2', '17', '89', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(840, '8', '2', '17', '120', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(841, '8', '2', '17', '122', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(842, '7', '2', '17', '90', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(843, '11', '2', '17', '43', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(844, '11', '2', '17', '45', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(845, '11', '2', '17', '133', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(846, '10', '2', '17', '125', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(847, '10', '2', '17', '126', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(848, '10', '2', '17', '138', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(849, '10', '2', '17', '139', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(850, '10', '2', '17', '140', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(851, '10', '2', '17', '157', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(852, '10', '2', '17', '158', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(853, '10', '2', '17', '163', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(854, '10', '2', '17', '165', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(855, '10', '2', '17', '180', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(856, '10', '2', '17', '181', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(857, '10', '2', '17', '182', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(858, '10', '2', '17', '183', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(859, '10', '2', '17', '184', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(860, '10', '2', '17', '185', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(861, '4', '2', '17', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(862, '4', '2', '17', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(863, '4', '2', '17', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(864, '4', '2', '17', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(865, '4', '2', '17', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(866, '4', '2', '17', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(867, '4', '2', '17', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(868, '4', '2', '17', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(869, '4', '2', '17', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(870, '4', '2', '17', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(871, '4', '2', '17', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(872, '4', '2', '17', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(873, '4', '2', '17', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(874, '4', '2', '17', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(875, '4', '2', '17', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(876, '4', '2', '17', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(877, '3', '2', '17', '27', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(878, '3', '2', '17', '29', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(879, '3', '2', '17', '31', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(880, '3', '2', '17', '33', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(881, '3', '2', '17', '35', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(882, '3', '2', '17', '37', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(883, '3', '2', '17', '39', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(884, '3', '2', '17', '41', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(885, '3', '2', '17', '47', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(886, '3', '2', '17', '49', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(887, '3', '2', '17', '127', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(888, '3', '2', '17', '128', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(889, '3', '2', '17', '129', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(890, '3', '2', '17', '130', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(891, '3', '2', '17', '131', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(892, '3', '2', '17', '132', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(893, '3', '2', '17', '134', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(894, '3', '2', '17', '142', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(895, '3', '2', '17', '146', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(896, '3', '2', '17', '147', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(897, '3', '2', '17', '148', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(898, '3', '2', '17', '149', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(899, '3', '2', '17', '150', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(900, '3', '2', '17', '155', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(901, '3', '2', '17', '156', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(902, '3', '2', '17', '174', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(903, '3', '2', '17', '175', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(904, '3', '2', '17', '176', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(905, '10', '2', '17', '3', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(906, '10', '2', '17', '4', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(907, '10', '2', '17', '10', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(908, '10', '2', '17', '11', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(909, '10', '2', '17', '123', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(910, '10', '2', '17', '124', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(911, '4', '2', '17', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(912, '4', '2', '17', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(913, '4', '2', '17', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(914, '4', '2', '17', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(915, '4', '2', '17', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(916, '4', '2', '17', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(917, '4', '2', '17', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(918, '4', '2', '17', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(919, '4', '2', '17', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(920, '4', '2', '17', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(921, '4', '2', '17', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(922, '4', '2', '17', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(923, '4', '2', '17', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(924, '4', '2', '17', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(925, '4', '2', '17', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(926, '4', '2', '17', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(927, '12', '2', '17', '25', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(928, '12', '2', '17', '51', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(929, '12', '2', '17', '53', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(930, '12', '2', '17', '55', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(931, '12', '2', '17', '57', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(932, '12', '2', '17', '59', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(933, '12', '2', '17', '61', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(934, '6', '2', '17', '89', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(935, '8', '2', '17', '120', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(936, '8', '2', '17', '122', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(937, '7', '2', '17', '90', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(938, '11', '2', '17', '43', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(939, '11', '2', '17', '45', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(940, '11', '2', '17', '133', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(941, '10', '2', '17', '125', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(942, '10', '2', '17', '126', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(943, '10', '2', '17', '138', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(944, '10', '2', '17', '139', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(945, '10', '2', '17', '140', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(946, '10', '2', '17', '157', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(947, '10', '2', '17', '158', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(948, '10', '2', '17', '163', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(949, '10', '2', '17', '165', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(950, '10', '2', '17', '180', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(951, '10', '2', '17', '181', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(952, '10', '2', '17', '182', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(953, '10', '2', '17', '183', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(954, '10', '2', '17', '184', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(955, '10', '2', '17', '185', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(956, '4', '2', '18', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(957, '4', '2', '18', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(958, '4', '2', '18', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(959, '4', '2', '18', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(960, '4', '2', '18', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(961, '4', '2', '18', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(962, '4', '2', '18', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1');
INSERT INTO `tbl_usr_func_act_mst` (`mod_fuc_act_id`, `module_id`, `role_id`, `user_id`, `function_url`, `action_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(963, '4', '2', '18', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(964, '4', '2', '18', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(965, '4', '2', '18', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(966, '4', '2', '18', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(967, '4', '2', '18', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(968, '4', '2', '18', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(969, '4', '2', '18', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(970, '4', '2', '18', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(971, '4', '2', '18', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(972, '3', '2', '18', '27', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(973, '3', '2', '18', '29', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(974, '3', '2', '18', '31', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(975, '3', '2', '18', '33', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(976, '3', '2', '18', '35', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(977, '3', '2', '18', '37', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(978, '3', '2', '18', '39', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(979, '3', '2', '18', '41', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(980, '3', '2', '18', '47', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(981, '3', '2', '18', '49', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(982, '3', '2', '18', '127', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(983, '3', '2', '18', '128', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(984, '3', '2', '18', '129', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(985, '3', '2', '18', '130', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(986, '3', '2', '18', '131', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(987, '3', '2', '18', '132', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(988, '3', '2', '18', '134', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(989, '3', '2', '18', '142', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(990, '3', '2', '18', '146', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(991, '3', '2', '18', '147', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(992, '3', '2', '18', '148', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(993, '3', '2', '18', '149', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(994, '3', '2', '18', '150', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(995, '3', '2', '18', '155', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(996, '3', '2', '18', '156', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(997, '3', '2', '18', '174', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(998, '3', '2', '18', '175', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(999, '3', '2', '18', '176', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1000, '10', '2', '18', '3', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1001, '10', '2', '18', '4', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1002, '10', '2', '18', '10', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1003, '10', '2', '18', '11', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1004, '10', '2', '18', '123', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1005, '10', '2', '18', '124', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1006, '4', '2', '18', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1007, '4', '2', '18', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1008, '4', '2', '18', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1009, '4', '2', '18', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1010, '4', '2', '18', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1011, '4', '2', '18', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1012, '4', '2', '18', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1013, '4', '2', '18', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1014, '4', '2', '18', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1015, '4', '2', '18', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1016, '4', '2', '18', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1017, '4', '2', '18', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1018, '4', '2', '18', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1019, '4', '2', '18', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1020, '4', '2', '18', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1021, '4', '2', '18', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1022, '12', '2', '18', '25', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1023, '12', '2', '18', '51', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1024, '12', '2', '18', '53', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1025, '12', '2', '18', '55', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1026, '12', '2', '18', '57', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1027, '12', '2', '18', '59', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1028, '12', '2', '18', '61', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1029, '6', '2', '18', '89', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1030, '8', '2', '18', '120', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1031, '8', '2', '18', '122', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1032, '7', '2', '18', '90', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1033, '11', '2', '18', '43', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1034, '11', '2', '18', '45', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1035, '11', '2', '18', '133', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1036, '10', '2', '18', '125', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1037, '10', '2', '18', '126', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1038, '10', '2', '18', '138', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1039, '10', '2', '18', '139', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1040, '10', '2', '18', '140', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1041, '10', '2', '18', '157', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1042, '10', '2', '18', '158', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1043, '10', '2', '18', '163', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1044, '10', '2', '18', '165', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1045, '10', '2', '18', '180', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1046, '10', '2', '18', '181', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1047, '10', '2', '18', '182', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1048, '10', '2', '18', '183', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1049, '10', '2', '18', '184', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1050, '10', '2', '18', '185', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1051, '4', '2', '19', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1052, '4', '2', '19', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1053, '4', '2', '19', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1054, '4', '2', '19', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1055, '4', '2', '19', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1056, '4', '2', '19', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1057, '4', '2', '19', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1058, '4', '2', '19', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1059, '4', '2', '19', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1060, '4', '2', '19', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1061, '4', '2', '19', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1062, '4', '2', '19', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1063, '4', '2', '19', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1064, '4', '2', '19', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1065, '4', '2', '19', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1066, '4', '2', '19', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1067, '3', '2', '19', '27', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1068, '3', '2', '19', '29', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1069, '3', '2', '19', '31', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1070, '3', '2', '19', '33', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1071, '3', '2', '19', '35', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1072, '3', '2', '19', '37', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1073, '3', '2', '19', '39', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1074, '3', '2', '19', '41', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1075, '3', '2', '19', '47', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1076, '3', '2', '19', '49', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1077, '3', '2', '19', '127', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1078, '3', '2', '19', '128', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1079, '3', '2', '19', '129', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1080, '3', '2', '19', '130', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1081, '3', '2', '19', '131', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1082, '3', '2', '19', '132', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1083, '3', '2', '19', '134', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1084, '3', '2', '19', '142', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1085, '3', '2', '19', '146', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1086, '3', '2', '19', '147', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1087, '3', '2', '19', '148', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1088, '3', '2', '19', '149', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1089, '3', '2', '19', '150', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1090, '3', '2', '19', '155', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1091, '3', '2', '19', '156', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1092, '3', '2', '19', '174', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1093, '3', '2', '19', '175', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1094, '3', '2', '19', '176', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1095, '10', '2', '19', '3', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1096, '10', '2', '19', '4', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1097, '10', '2', '19', '10', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1098, '10', '2', '19', '11', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1099, '10', '2', '19', '123', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1100, '10', '2', '19', '124', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1101, '4', '2', '19', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1102, '4', '2', '19', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1103, '4', '2', '19', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1104, '4', '2', '19', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1105, '4', '2', '19', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1106, '4', '2', '19', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1107, '4', '2', '19', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1108, '4', '2', '19', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1109, '4', '2', '19', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1110, '4', '2', '19', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1111, '4', '2', '19', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1112, '4', '2', '19', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1113, '4', '2', '19', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1114, '4', '2', '19', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1115, '4', '2', '19', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1116, '4', '2', '19', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1117, '12', '2', '19', '25', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1118, '12', '2', '19', '51', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1119, '12', '2', '19', '53', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1120, '12', '2', '19', '55', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1121, '12', '2', '19', '57', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1122, '12', '2', '19', '59', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1123, '12', '2', '19', '61', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1124, '6', '2', '19', '89', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1125, '8', '2', '19', '120', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1126, '8', '2', '19', '122', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1127, '7', '2', '19', '90', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1128, '11', '2', '19', '43', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1129, '11', '2', '19', '45', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1130, '11', '2', '19', '133', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1131, '10', '2', '19', '125', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1132, '10', '2', '19', '126', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1133, '10', '2', '19', '138', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1134, '10', '2', '19', '139', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1135, '10', '2', '19', '140', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1136, '10', '2', '19', '157', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1137, '10', '2', '19', '158', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1138, '10', '2', '19', '163', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1139, '10', '2', '19', '165', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1140, '10', '2', '19', '180', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1141, '10', '2', '19', '181', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1142, '10', '2', '19', '182', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1143, '10', '2', '19', '183', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1144, '10', '2', '19', '184', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1145, '10', '2', '19', '185', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1146, '4', '2', '20', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1147, '4', '2', '20', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1148, '4', '2', '20', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1149, '4', '2', '20', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1150, '4', '2', '20', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1151, '4', '2', '20', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1152, '4', '2', '20', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1153, '4', '2', '20', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1154, '4', '2', '20', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1155, '4', '2', '20', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1156, '4', '2', '20', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1157, '4', '2', '20', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1158, '4', '2', '20', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1159, '4', '2', '20', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1160, '4', '2', '20', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1161, '4', '2', '20', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1162, '3', '2', '20', '27', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1163, '3', '2', '20', '29', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1164, '3', '2', '20', '31', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1165, '3', '2', '20', '33', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1166, '3', '2', '20', '35', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1167, '3', '2', '20', '37', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1168, '3', '2', '20', '39', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1169, '3', '2', '20', '41', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1170, '3', '2', '20', '47', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1171, '3', '2', '20', '49', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1172, '3', '2', '20', '127', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1173, '3', '2', '20', '128', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1174, '3', '2', '20', '129', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1175, '3', '2', '20', '130', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1176, '3', '2', '20', '131', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1177, '3', '2', '20', '132', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1178, '3', '2', '20', '134', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1179, '3', '2', '20', '142', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1180, '3', '2', '20', '146', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1181, '3', '2', '20', '147', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1182, '3', '2', '20', '148', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1183, '3', '2', '20', '149', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1184, '3', '2', '20', '150', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1185, '3', '2', '20', '155', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1186, '3', '2', '20', '156', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1187, '3', '2', '20', '174', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1188, '3', '2', '20', '175', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1189, '3', '2', '20', '176', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1190, '10', '2', '20', '3', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1191, '10', '2', '20', '4', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1192, '10', '2', '20', '10', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1193, '10', '2', '20', '11', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1194, '10', '2', '20', '123', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1195, '10', '2', '20', '124', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1196, '4', '2', '20', '91', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1197, '4', '2', '20', '93', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1198, '4', '2', '20', '95', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1199, '4', '2', '20', '97', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1200, '4', '2', '20', '99', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1201, '4', '2', '20', '101', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1202, '4', '2', '20', '103', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1203, '4', '2', '20', '105', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1204, '4', '2', '20', '107', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1205, '4', '2', '20', '109', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1206, '4', '2', '20', '111', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1207, '4', '2', '20', '113', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1208, '4', '2', '20', '115', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1209, '4', '2', '20', '117', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1210, '4', '2', '20', '166', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1211, '4', '2', '20', '167', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1212, '12', '2', '20', '25', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1213, '12', '2', '20', '51', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1214, '12', '2', '20', '53', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1215, '12', '2', '20', '55', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1216, '12', '2', '20', '57', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1217, '12', '2', '20', '59', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1218, '12', '2', '20', '61', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1219, '6', '2', '20', '89', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1220, '8', '2', '20', '120', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1221, '8', '2', '20', '122', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1222, '7', '2', '20', '90', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1223, '11', '2', '20', '43', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1224, '11', '2', '20', '45', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1225, '11', '2', '20', '133', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1226, '10', '2', '20', '125', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1227, '10', '2', '20', '126', 'Active', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1228, '10', '2', '20', '138', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1229, '10', '2', '20', '139', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1230, '10', '2', '20', '140', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1231, '10', '2', '20', '157', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1232, '10', '2', '20', '158', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1233, '10', '2', '20', '163', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1234, '10', '2', '20', '165', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1235, '10', '2', '20', '180', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1236, '10', '2', '20', '181', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1237, '10', '2', '20', '182', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1238, '10', '2', '20', '183', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1239, '10', '2', '20', '184', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1240, '10', '2', '20', '185', 'Inactive', '13', '2015-06-01', '13', '2015-06-01', 'A', '1', '1', '1', '1'),
(1241, '4', '2', '21', '91', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1242, '4', '2', '21', '93', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1243, '4', '2', '21', '95', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1244, '4', '2', '21', '97', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1245, '4', '2', '21', '99', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1246, '4', '2', '21', '101', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1247, '4', '2', '21', '103', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1248, '4', '2', '21', '105', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1249, '4', '2', '21', '107', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1250, '4', '2', '21', '109', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1251, '4', '2', '21', '111', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1252, '4', '2', '21', '113', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1253, '4', '2', '21', '115', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1254, '4', '2', '21', '117', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1255, '4', '2', '21', '166', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1256, '4', '2', '21', '167', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1257, '3', '2', '21', '27', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1258, '3', '2', '21', '29', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1259, '3', '2', '21', '31', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1260, '3', '2', '21', '33', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1261, '3', '2', '21', '35', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1262, '3', '2', '21', '37', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1263, '3', '2', '21', '39', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1264, '3', '2', '21', '41', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1265, '3', '2', '21', '47', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1266, '3', '2', '21', '49', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1267, '3', '2', '21', '127', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1268, '3', '2', '21', '128', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1269, '3', '2', '21', '129', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1270, '3', '2', '21', '130', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1271, '3', '2', '21', '131', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1272, '3', '2', '21', '132', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1273, '3', '2', '21', '134', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1274, '3', '2', '21', '142', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1275, '3', '2', '21', '146', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1276, '3', '2', '21', '147', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1277, '3', '2', '21', '148', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1278, '3', '2', '21', '149', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1279, '3', '2', '21', '150', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1280, '3', '2', '21', '155', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1281, '3', '2', '21', '156', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1282, '3', '2', '21', '174', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1283, '3', '2', '21', '175', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1284, '3', '2', '21', '176', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1285, '10', '2', '21', '3', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1286, '10', '2', '21', '4', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1287, '10', '2', '21', '10', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1288, '10', '2', '21', '11', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1289, '10', '2', '21', '123', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1290, '10', '2', '21', '124', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1291, '4', '2', '21', '91', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1292, '4', '2', '21', '93', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1293, '4', '2', '21', '95', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1294, '4', '2', '21', '97', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1295, '4', '2', '21', '99', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1296, '4', '2', '21', '101', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1297, '4', '2', '21', '103', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1298, '4', '2', '21', '105', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1299, '4', '2', '21', '107', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1300, '4', '2', '21', '109', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1301, '4', '2', '21', '111', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1302, '4', '2', '21', '113', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1303, '4', '2', '21', '115', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1304, '4', '2', '21', '117', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1305, '4', '2', '21', '166', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1306, '4', '2', '21', '167', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1307, '12', '2', '21', '25', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1308, '12', '2', '21', '51', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1309, '12', '2', '21', '53', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1310, '12', '2', '21', '55', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1311, '12', '2', '21', '57', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1312, '12', '2', '21', '59', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1313, '12', '2', '21', '61', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1314, '6', '2', '21', '89', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1315, '8', '2', '21', '120', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1316, '8', '2', '21', '122', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1317, '7', '2', '21', '90', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1318, '11', '2', '21', '43', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1319, '11', '2', '21', '45', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1320, '11', '2', '21', '133', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1321, '10', '2', '21', '125', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1322, '10', '2', '21', '126', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1323, '10', '2', '21', '138', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1324, '10', '2', '21', '139', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1325, '10', '2', '21', '140', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1326, '10', '2', '21', '157', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1327, '10', '2', '21', '158', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1328, '10', '2', '21', '163', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1329, '10', '2', '21', '165', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1330, '10', '2', '21', '180', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1331, '10', '2', '21', '181', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1332, '10', '2', '21', '182', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1333, '10', '2', '21', '183', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1334, '10', '2', '21', '184', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1335, '10', '2', '21', '185', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1336, '17', '2', '21', '186', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1337, '12', '2', '21', '188', 'Inactive', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1338, '4', '2', '21', '189', 'Active', '21', '2015-06-04', '21', '2015-06-04', 'A', '1', '1', '1', '1'),
(1339, '4', '3', '21', '91', 'Inactive', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1340, '4', '3', '21', '93', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1341, '4', '3', '21', '95', 'Inactive', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1342, '4', '3', '21', '97', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1343, '4', '3', '21', '99', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1344, '4', '3', '21', '101', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1345, '4', '3', '21', '103', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1346, '4', '3', '21', '105', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1347, '4', '3', '21', '107', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1348, '4', '3', '21', '109', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1349, '4', '3', '21', '111', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1350, '4', '3', '21', '113', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1351, '4', '3', '21', '115', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1352, '4', '3', '21', '117', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1353, '4', '3', '21', '166', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1354, '4', '3', '21', '167', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1355, '4', '3', '21', '189', 'Active', '21', '2015-10-24', '21', '2015-10-24', 'A', '1', '1', '1', '1'),
(1356, '4', '3', '21', '91', 'Inactive', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1357, '4', '3', '21', '93', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1358, '4', '3', '21', '95', 'Inactive', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1359, '4', '3', '21', '97', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1360, '4', '3', '21', '99', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1361, '4', '3', '21', '101', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1362, '4', '3', '21', '103', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1363, '4', '3', '21', '105', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1364, '4', '3', '21', '107', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1365, '4', '3', '21', '109', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1366, '4', '3', '21', '111', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1367, '4', '3', '21', '113', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1368, '4', '3', '21', '115', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1369, '4', '3', '21', '117', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1370, '4', '3', '21', '166', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1371, '4', '3', '21', '167', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1372, '4', '3', '21', '189', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1373, '6', '3', '21', '89', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1374, '4', '3', '21', '91', 'Inactive', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1375, '4', '3', '21', '93', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1376, '4', '3', '21', '95', 'Inactive', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1377, '4', '3', '21', '97', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1378, '4', '3', '21', '99', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1379, '4', '3', '21', '101', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1380, '4', '3', '21', '103', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1381, '4', '3', '21', '105', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1382, '4', '3', '21', '107', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1383, '4', '3', '21', '109', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1384, '4', '3', '21', '111', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1385, '4', '3', '21', '113', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1386, '4', '3', '21', '115', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1387, '4', '3', '21', '117', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1388, '4', '3', '21', '166', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1389, '4', '3', '21', '167', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1390, '4', '3', '21', '189', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1391, '6', '3', '21', '89', 'Active', '21', '2015-10-28', '21', '2015-10-28', 'A', '1', '1', '1', '1'),
(1392, '4', '2', '24', '91', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1393, '4', '2', '24', '93', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1394, '4', '2', '24', '95', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1395, '4', '2', '24', '97', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1396, '4', '2', '24', '99', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1397, '4', '2', '24', '101', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1398, '4', '2', '24', '103', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1399, '4', '2', '24', '105', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1400, '4', '2', '24', '107', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1401, '4', '2', '24', '109', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1402, '4', '2', '24', '111', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1403, '4', '2', '24', '113', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1404, '4', '2', '24', '115', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1405, '4', '2', '24', '117', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1406, '4', '2', '24', '166', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1407, '4', '2', '24', '167', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1408, '3', '2', '24', '27', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1409, '3', '2', '24', '29', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1410, '3', '2', '24', '31', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1411, '3', '2', '24', '33', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1412, '3', '2', '24', '35', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1413, '3', '2', '24', '37', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1414, '3', '2', '24', '39', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1415, '3', '2', '24', '41', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1416, '3', '2', '24', '47', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1417, '3', '2', '24', '49', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1418, '3', '2', '24', '127', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1419, '3', '2', '24', '128', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1420, '3', '2', '24', '129', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1421, '3', '2', '24', '130', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1422, '3', '2', '24', '131', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1423, '3', '2', '24', '132', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1424, '3', '2', '24', '134', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1425, '3', '2', '24', '142', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1426, '3', '2', '24', '146', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1427, '3', '2', '24', '147', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1428, '3', '2', '24', '148', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1429, '3', '2', '24', '149', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1430, '3', '2', '24', '150', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1431, '3', '2', '24', '155', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1432, '3', '2', '24', '156', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1433, '3', '2', '24', '174', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1434, '3', '2', '24', '175', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1435, '3', '2', '24', '176', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1');
INSERT INTO `tbl_usr_func_act_mst` (`mod_fuc_act_id`, `module_id`, `role_id`, `user_id`, `function_url`, `action_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1436, '10', '2', '24', '3', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1437, '10', '2', '24', '4', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1438, '10', '2', '24', '10', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1439, '10', '2', '24', '11', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1440, '10', '2', '24', '123', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1441, '10', '2', '24', '124', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1442, '4', '2', '24', '91', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1443, '4', '2', '24', '93', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1444, '4', '2', '24', '95', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1445, '4', '2', '24', '97', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1446, '4', '2', '24', '99', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1447, '4', '2', '24', '101', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1448, '4', '2', '24', '103', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1449, '4', '2', '24', '105', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1450, '4', '2', '24', '107', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1451, '4', '2', '24', '109', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1452, '4', '2', '24', '111', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1453, '4', '2', '24', '113', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1454, '4', '2', '24', '115', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1455, '4', '2', '24', '117', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1456, '4', '2', '24', '166', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1457, '4', '2', '24', '167', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1458, '12', '2', '24', '25', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1459, '12', '2', '24', '51', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1460, '12', '2', '24', '53', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1461, '12', '2', '24', '55', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1462, '12', '2', '24', '57', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1463, '12', '2', '24', '59', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1464, '12', '2', '24', '61', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1465, '6', '2', '24', '89', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1466, '8', '2', '24', '120', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1467, '8', '2', '24', '122', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1468, '7', '2', '24', '90', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1469, '11', '2', '24', '43', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1470, '11', '2', '24', '45', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1471, '11', '2', '24', '133', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1472, '10', '2', '24', '125', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1473, '10', '2', '24', '126', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1474, '10', '2', '24', '138', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1475, '10', '2', '24', '139', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1476, '10', '2', '24', '140', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1477, '10', '2', '24', '157', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1478, '10', '2', '24', '158', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1479, '10', '2', '24', '163', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1480, '10', '2', '24', '165', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1481, '10', '2', '24', '180', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1482, '10', '2', '24', '181', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1483, '10', '2', '24', '182', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1484, '10', '2', '24', '183', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1485, '10', '2', '24', '184', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1486, '10', '2', '24', '185', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1487, '17', '2', '24', '186', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1488, '12', '2', '24', '188', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1489, '4', '2', '24', '189', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1490, '17', '2', '24', '187', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1491, '3', '2', '24', '27', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1492, '3', '2', '24', '29', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1493, '3', '2', '24', '31', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1494, '3', '2', '24', '33', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1495, '3', '2', '24', '35', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1496, '3', '2', '24', '37', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1497, '3', '2', '24', '39', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1498, '3', '2', '24', '41', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1499, '3', '2', '24', '47', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1500, '3', '2', '24', '49', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1501, '3', '2', '24', '127', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1502, '3', '2', '24', '128', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1503, '3', '2', '24', '129', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1504, '3', '2', '24', '130', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1505, '3', '2', '24', '131', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1506, '3', '2', '24', '132', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1507, '3', '2', '24', '134', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1508, '3', '2', '24', '142', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1509, '3', '2', '24', '146', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1510, '3', '2', '24', '147', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1511, '3', '2', '24', '148', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1512, '3', '2', '24', '149', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1513, '3', '2', '24', '150', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1514, '3', '2', '24', '155', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1515, '3', '2', '24', '156', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1516, '3', '2', '24', '174', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1517, '3', '2', '24', '175', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1518, '3', '2', '24', '176', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1519, '3', '2', '24', '27', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1520, '3', '2', '24', '29', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1521, '3', '2', '24', '31', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1522, '3', '2', '24', '33', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1523, '3', '2', '24', '35', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1524, '3', '2', '24', '37', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1525, '3', '2', '24', '39', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1526, '3', '2', '24', '41', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1527, '3', '2', '24', '47', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1528, '3', '2', '24', '49', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1529, '3', '2', '24', '127', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1530, '3', '2', '24', '128', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1531, '3', '2', '24', '129', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1532, '3', '2', '24', '130', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1533, '3', '2', '24', '131', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1534, '3', '2', '24', '132', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1535, '3', '2', '24', '134', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1536, '3', '2', '24', '142', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1537, '3', '2', '24', '146', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1538, '3', '2', '24', '147', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1539, '3', '2', '24', '148', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1540, '3', '2', '24', '149', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1541, '3', '2', '24', '150', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1542, '3', '2', '24', '155', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1543, '3', '2', '24', '156', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1544, '3', '2', '24', '174', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1545, '3', '2', '24', '175', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1546, '3', '2', '24', '176', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1547, '3', '2', '24', '27', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1548, '3', '2', '24', '29', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1549, '3', '2', '24', '31', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1550, '3', '2', '24', '33', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1551, '3', '2', '24', '35', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1552, '3', '2', '24', '37', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1553, '3', '2', '24', '39', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1554, '3', '2', '24', '41', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1555, '3', '2', '24', '47', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1556, '3', '2', '24', '49', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1557, '3', '2', '24', '127', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1558, '3', '2', '24', '128', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1559, '3', '2', '24', '129', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1560, '3', '2', '24', '130', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1561, '3', '2', '24', '131', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1562, '3', '2', '24', '132', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1563, '3', '2', '24', '134', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1564, '3', '2', '24', '142', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1565, '3', '2', '24', '146', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1566, '3', '2', '24', '147', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1567, '3', '2', '24', '148', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1568, '3', '2', '24', '149', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1569, '3', '2', '24', '150', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1570, '3', '2', '24', '155', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1571, '3', '2', '24', '156', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1572, '3', '2', '24', '174', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1573, '3', '2', '24', '175', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1574, '3', '2', '24', '176', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1575, '3', '2', '24', '27', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1576, '3', '2', '24', '29', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1577, '3', '2', '24', '31', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1578, '3', '2', '24', '33', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1579, '3', '2', '24', '35', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1580, '3', '2', '24', '37', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1581, '3', '2', '24', '39', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1582, '3', '2', '24', '41', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1583, '3', '2', '24', '47', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1584, '3', '2', '24', '49', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1585, '3', '2', '24', '127', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1586, '3', '2', '24', '128', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1587, '3', '2', '24', '129', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1588, '3', '2', '24', '130', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1589, '3', '2', '24', '131', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1590, '3', '2', '24', '132', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1591, '3', '2', '24', '134', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1592, '3', '2', '24', '142', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1593, '3', '2', '24', '146', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1594, '3', '2', '24', '147', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1595, '3', '2', '24', '148', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1596, '3', '2', '24', '149', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1597, '3', '2', '24', '150', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1598, '3', '2', '24', '155', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1599, '3', '2', '24', '156', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1600, '3', '2', '24', '174', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1601, '3', '2', '24', '175', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1602, '3', '2', '24', '176', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1603, '3', '2', '24', '27', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1604, '3', '2', '24', '29', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1605, '3', '2', '24', '31', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1606, '3', '2', '24', '33', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1607, '3', '2', '24', '35', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1608, '3', '2', '24', '37', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1609, '3', '2', '24', '39', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1610, '3', '2', '24', '41', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1611, '3', '2', '24', '47', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1612, '3', '2', '24', '49', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1613, '3', '2', '24', '127', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1614, '3', '2', '24', '128', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1615, '3', '2', '24', '129', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1616, '3', '2', '24', '130', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1617, '3', '2', '24', '131', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1618, '3', '2', '24', '132', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1619, '3', '2', '24', '134', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1620, '3', '2', '24', '142', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1621, '3', '2', '24', '146', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1622, '3', '2', '24', '147', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1623, '3', '2', '24', '148', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1624, '3', '2', '24', '149', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1625, '3', '2', '24', '150', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1626, '3', '2', '24', '155', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1627, '3', '2', '24', '156', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1628, '3', '2', '24', '174', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1629, '3', '2', '24', '175', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1630, '3', '2', '24', '176', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1631, '3', '2', '24', '27', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1632, '3', '2', '24', '29', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1633, '3', '2', '24', '31', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1634, '3', '2', '24', '33', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1635, '3', '2', '24', '35', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1636, '3', '2', '24', '37', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1637, '3', '2', '24', '39', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1638, '3', '2', '24', '41', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1639, '3', '2', '24', '47', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1640, '3', '2', '24', '49', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1641, '3', '2', '24', '127', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1642, '3', '2', '24', '128', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1643, '3', '2', '24', '129', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1644, '3', '2', '24', '130', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1645, '3', '2', '24', '131', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1646, '3', '2', '24', '132', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1647, '3', '2', '24', '134', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1648, '3', '2', '24', '142', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1649, '3', '2', '24', '146', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1650, '3', '2', '24', '147', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1651, '3', '2', '24', '148', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1652, '3', '2', '24', '149', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1653, '3', '2', '24', '150', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1654, '3', '2', '24', '155', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1655, '3', '2', '24', '156', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1656, '3', '2', '24', '174', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1657, '3', '2', '24', '175', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1658, '3', '2', '24', '176', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1659, '3', '2', '24', '27', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1660, '3', '2', '24', '29', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1661, '3', '2', '24', '31', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1662, '3', '2', '24', '33', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1663, '3', '2', '24', '35', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1664, '3', '2', '24', '37', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1665, '3', '2', '24', '39', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1666, '3', '2', '24', '41', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1667, '3', '2', '24', '47', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1668, '3', '2', '24', '49', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1669, '3', '2', '24', '127', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1670, '3', '2', '24', '128', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1671, '3', '2', '24', '129', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1672, '3', '2', '24', '130', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1673, '3', '2', '24', '131', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1674, '3', '2', '24', '132', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1675, '3', '2', '24', '134', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1676, '3', '2', '24', '142', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1677, '3', '2', '24', '146', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1678, '3', '2', '24', '147', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1679, '3', '2', '24', '148', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1680, '3', '2', '24', '149', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1681, '3', '2', '24', '150', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1682, '3', '2', '24', '155', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1683, '3', '2', '24', '156', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1684, '3', '2', '24', '174', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1685, '3', '2', '24', '175', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1686, '3', '2', '24', '176', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1687, '3', '2', '24', '27', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1688, '3', '2', '24', '29', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1689, '3', '2', '24', '31', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1690, '3', '2', '24', '33', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1691, '3', '2', '24', '35', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1692, '3', '2', '24', '37', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1693, '3', '2', '24', '39', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1694, '3', '2', '24', '41', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1695, '3', '2', '24', '47', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1696, '3', '2', '24', '49', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1697, '3', '2', '24', '127', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1698, '3', '2', '24', '128', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1699, '3', '2', '24', '129', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1700, '3', '2', '24', '130', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1701, '3', '2', '24', '131', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1702, '3', '2', '24', '132', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1703, '3', '2', '24', '134', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1704, '3', '2', '24', '142', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1705, '3', '2', '24', '146', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1706, '3', '2', '24', '147', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1707, '3', '2', '24', '148', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1708, '3', '2', '24', '149', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1709, '3', '2', '24', '150', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1710, '3', '2', '24', '155', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1711, '3', '2', '24', '156', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1712, '3', '2', '24', '174', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1713, '3', '2', '24', '175', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1714, '3', '2', '24', '176', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1715, '3', '2', '24', '27', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1716, '3', '2', '24', '29', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1717, '3', '2', '24', '31', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1718, '3', '2', '24', '33', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1719, '3', '2', '24', '35', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1720, '3', '2', '24', '37', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1721, '3', '2', '24', '39', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1722, '3', '2', '24', '41', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1723, '3', '2', '24', '47', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1724, '3', '2', '24', '49', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1725, '3', '2', '24', '127', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1726, '3', '2', '24', '128', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1727, '3', '2', '24', '129', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1728, '3', '2', '24', '130', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1729, '3', '2', '24', '131', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1730, '3', '2', '24', '132', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1731, '3', '2', '24', '134', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1732, '3', '2', '24', '142', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1733, '3', '2', '24', '146', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1734, '3', '2', '24', '147', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1735, '3', '2', '24', '148', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1736, '3', '2', '24', '149', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1737, '3', '2', '24', '150', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1738, '3', '2', '24', '155', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1739, '3', '2', '24', '156', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1740, '3', '2', '24', '174', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1741, '3', '2', '24', '175', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1742, '3', '2', '24', '176', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1743, '18', '2', '24', '190', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1744, '18', '2', '24', '191', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1745, '18', '2', '24', '192', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1746, '18', '2', '24', '193', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1747, '19', '2', '24', '194', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1748, '19', '2', '24', '195', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1749, '20', '2', '24', '196', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1750, '21', '2', '24', '197', 'Inactive', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1751, '19', '2', '24', '198', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1752, '18', '2', '24', '199', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1753, '18', '2', '24', '201', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1754, '18', '2', '24', '202', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1755, '20', '2', '24', '203', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1756, '19', '2', '24', '204', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1757, '19', '2', '24', '205', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1758, '19', '2', '24', '206', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1759, '19', '2', '24', '207', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1760, '20', '2', '24', '208', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1761, '3', '2', '24', '209', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1762, '19', '2', '24', '210', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1763, '3', '2', '24', '211', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1764, '19', '2', '24', '212', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1765, '19', '2', '24', '213', 'Active', '21', '2015-12-10', '21', '2015-12-10', 'A', '1', '1', '1', '1'),
(1766, '4', '2', '1', '91', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1767, '4', '2', '1', '93', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1768, '4', '2', '1', '95', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1769, '4', '2', '1', '97', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1770, '4', '2', '1', '99', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1771, '4', '2', '1', '101', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1772, '4', '2', '1', '103', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1773, '4', '2', '1', '105', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1774, '4', '2', '1', '107', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1775, '4', '2', '1', '109', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1776, '4', '2', '1', '111', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1777, '4', '2', '1', '113', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1778, '4', '2', '1', '115', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1779, '4', '2', '1', '117', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1780, '4', '2', '1', '166', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1781, '4', '2', '1', '167', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1782, '3', '2', '1', '27', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1783, '3', '2', '1', '29', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1784, '3', '2', '1', '31', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1785, '3', '2', '1', '33', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1786, '3', '2', '1', '35', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1787, '3', '2', '1', '37', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1788, '3', '2', '1', '39', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1789, '3', '2', '1', '41', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1790, '3', '2', '1', '47', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1791, '3', '2', '1', '49', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1792, '3', '2', '1', '127', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1793, '3', '2', '1', '128', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1794, '3', '2', '1', '129', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1795, '3', '2', '1', '130', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1796, '3', '2', '1', '131', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1797, '3', '2', '1', '132', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1798, '3', '2', '1', '134', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1799, '3', '2', '1', '142', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1800, '3', '2', '1', '146', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1801, '3', '2', '1', '147', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1802, '3', '2', '1', '148', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1803, '3', '2', '1', '149', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1804, '3', '2', '1', '150', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1805, '3', '2', '1', '155', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1806, '3', '2', '1', '156', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1807, '3', '2', '1', '174', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1808, '3', '2', '1', '175', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1809, '3', '2', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1810, '10', '2', '1', '3', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1811, '10', '2', '1', '4', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1812, '10', '2', '1', '10', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1813, '10', '2', '1', '11', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1814, '10', '2', '1', '123', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1815, '10', '2', '1', '124', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1816, '4', '2', '1', '91', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1817, '4', '2', '1', '93', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1818, '4', '2', '1', '95', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1819, '4', '2', '1', '97', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1820, '4', '2', '1', '99', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1821, '4', '2', '1', '101', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1822, '4', '2', '1', '103', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1823, '4', '2', '1', '105', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1824, '4', '2', '1', '107', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1825, '4', '2', '1', '109', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1826, '4', '2', '1', '111', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1827, '4', '2', '1', '113', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1828, '4', '2', '1', '115', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1829, '4', '2', '1', '117', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1830, '4', '2', '1', '166', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1831, '4', '2', '1', '167', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1832, '12', '2', '1', '25', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1833, '12', '2', '1', '51', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1834, '12', '2', '1', '53', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1835, '12', '2', '1', '55', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1836, '12', '2', '1', '57', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1837, '12', '2', '1', '59', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1838, '12', '2', '1', '61', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1839, '6', '2', '1', '89', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1840, '8', '2', '1', '120', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1841, '8', '2', '1', '122', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1842, '7', '2', '1', '90', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1843, '11', '2', '1', '43', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1844, '11', '2', '1', '45', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1845, '11', '2', '1', '133', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1846, '10', '2', '1', '125', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1847, '10', '2', '1', '126', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1848, '10', '2', '1', '138', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1849, '10', '2', '1', '139', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1850, '10', '2', '1', '140', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1851, '10', '2', '1', '157', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1852, '10', '2', '1', '158', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1853, '10', '2', '1', '163', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1854, '10', '2', '1', '165', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1855, '10', '2', '1', '180', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1856, '10', '2', '1', '181', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1857, '10', '2', '1', '182', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1858, '10', '2', '1', '183', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1859, '10', '2', '1', '184', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1860, '10', '2', '1', '185', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1861, '17', '2', '1', '186', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1862, '12', '2', '1', '188', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1863, '4', '2', '1', '189', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1864, '17', '2', '1', '187', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1865, '3', '2', '1', '27', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1866, '3', '2', '1', '29', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1867, '3', '2', '1', '31', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1868, '3', '2', '1', '33', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1869, '3', '2', '1', '35', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1870, '3', '2', '1', '37', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1871, '3', '2', '1', '39', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1872, '3', '2', '1', '41', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1873, '3', '2', '1', '47', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1874, '3', '2', '1', '49', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1875, '3', '2', '1', '127', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1876, '3', '2', '1', '128', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1877, '3', '2', '1', '129', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1878, '3', '2', '1', '130', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1879, '3', '2', '1', '131', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1880, '3', '2', '1', '132', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1881, '3', '2', '1', '134', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1882, '3', '2', '1', '142', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1883, '3', '2', '1', '146', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1884, '3', '2', '1', '147', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1885, '3', '2', '1', '148', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1886, '3', '2', '1', '149', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1887, '3', '2', '1', '150', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1888, '3', '2', '1', '155', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1889, '3', '2', '1', '156', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1890, '3', '2', '1', '174', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1891, '3', '2', '1', '175', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1892, '3', '2', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1893, '3', '2', '1', '27', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1894, '3', '2', '1', '29', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1895, '3', '2', '1', '31', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1896, '3', '2', '1', '33', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1897, '3', '2', '1', '35', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1898, '3', '2', '1', '37', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1899, '3', '2', '1', '39', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1900, '3', '2', '1', '41', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1901, '3', '2', '1', '47', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1902, '3', '2', '1', '49', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1903, '3', '2', '1', '127', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1904, '3', '2', '1', '128', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1905, '3', '2', '1', '129', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1906, '3', '2', '1', '130', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1907, '3', '2', '1', '131', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1908, '3', '2', '1', '132', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1');
INSERT INTO `tbl_usr_func_act_mst` (`mod_fuc_act_id`, `module_id`, `role_id`, `user_id`, `function_url`, `action_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnh_id`, `divn_id`) VALUES
(1909, '3', '2', '1', '134', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1910, '3', '2', '1', '142', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1911, '3', '2', '1', '146', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1912, '3', '2', '1', '147', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1913, '3', '2', '1', '148', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1914, '3', '2', '1', '149', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1915, '3', '2', '1', '150', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1916, '3', '2', '1', '155', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1917, '3', '2', '1', '156', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1918, '3', '2', '1', '174', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1919, '3', '2', '1', '175', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1920, '3', '2', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1921, '3', '2', '1', '27', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1922, '3', '2', '1', '29', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1923, '3', '2', '1', '31', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1924, '3', '2', '1', '33', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1925, '3', '2', '1', '35', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1926, '3', '2', '1', '37', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1927, '3', '2', '1', '39', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1928, '3', '2', '1', '41', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1929, '3', '2', '1', '47', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1930, '3', '2', '1', '49', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1931, '3', '2', '1', '127', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1932, '3', '2', '1', '128', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1933, '3', '2', '1', '129', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1934, '3', '2', '1', '130', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1935, '3', '2', '1', '131', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1936, '3', '2', '1', '132', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1937, '3', '2', '1', '134', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1938, '3', '2', '1', '142', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1939, '3', '2', '1', '146', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1940, '3', '2', '1', '147', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1941, '3', '2', '1', '148', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1942, '3', '2', '1', '149', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1943, '3', '2', '1', '150', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1944, '3', '2', '1', '155', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1945, '3', '2', '1', '156', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1946, '3', '2', '1', '174', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1947, '3', '2', '1', '175', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1948, '3', '2', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1949, '3', '2', '1', '27', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1950, '3', '2', '1', '29', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1951, '3', '2', '1', '31', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1952, '3', '2', '1', '33', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1953, '3', '2', '1', '35', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1954, '3', '2', '1', '37', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1955, '3', '2', '1', '39', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1956, '3', '2', '1', '41', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1957, '3', '2', '1', '47', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1958, '3', '2', '1', '49', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1959, '3', '2', '1', '127', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1960, '3', '2', '1', '128', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1961, '3', '2', '1', '129', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1962, '3', '2', '1', '130', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1963, '3', '2', '1', '131', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1964, '3', '2', '1', '132', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1965, '3', '2', '1', '134', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1966, '3', '2', '1', '142', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1967, '3', '2', '1', '146', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1968, '3', '2', '1', '147', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1969, '3', '2', '1', '148', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1970, '3', '2', '1', '149', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1971, '3', '2', '1', '150', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1972, '3', '2', '1', '155', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1973, '3', '2', '1', '156', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1974, '3', '2', '1', '174', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1975, '3', '2', '1', '175', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1976, '3', '2', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1977, '3', '2', '1', '27', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1978, '3', '2', '1', '29', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1979, '3', '2', '1', '31', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1980, '3', '2', '1', '33', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1981, '3', '2', '1', '35', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1982, '3', '2', '1', '37', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1983, '3', '2', '1', '39', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1984, '3', '2', '1', '41', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1985, '3', '2', '1', '47', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1986, '3', '2', '1', '49', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1987, '3', '2', '1', '127', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1988, '3', '2', '1', '128', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1989, '3', '2', '1', '129', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1990, '3', '2', '1', '130', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1991, '3', '2', '1', '131', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1992, '3', '2', '1', '132', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1993, '3', '2', '1', '134', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1994, '3', '2', '1', '142', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1995, '3', '2', '1', '146', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1996, '3', '2', '1', '147', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1997, '3', '2', '1', '148', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1998, '3', '2', '1', '149', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(1999, '3', '2', '1', '150', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2000, '3', '2', '1', '155', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2001, '3', '2', '1', '156', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2002, '3', '2', '1', '174', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2003, '3', '2', '1', '175', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2004, '3', '2', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2005, '3', '2', '1', '27', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2006, '3', '2', '1', '29', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2007, '3', '2', '1', '31', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2008, '3', '2', '1', '33', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2009, '3', '2', '1', '35', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2010, '3', '2', '1', '37', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2011, '3', '2', '1', '39', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2012, '3', '2', '1', '41', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2013, '3', '2', '1', '47', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2014, '3', '2', '1', '49', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2015, '3', '2', '1', '127', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2016, '3', '2', '1', '128', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2017, '3', '2', '1', '129', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2018, '3', '2', '1', '130', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2019, '3', '2', '1', '131', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2020, '3', '2', '1', '132', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2021, '3', '2', '1', '134', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2022, '3', '2', '1', '142', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2023, '3', '2', '1', '146', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2024, '3', '2', '1', '147', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2025, '3', '2', '1', '148', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2026, '3', '2', '1', '149', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2027, '3', '2', '1', '150', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2028, '3', '2', '1', '155', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2029, '3', '2', '1', '156', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2030, '3', '2', '1', '174', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2031, '3', '2', '1', '175', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2032, '3', '2', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2033, '3', '2', '1', '27', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2034, '3', '2', '1', '29', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2035, '3', '2', '1', '31', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2036, '3', '2', '1', '33', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2037, '3', '2', '1', '35', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2038, '3', '2', '1', '37', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2039, '3', '2', '1', '39', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2040, '3', '2', '1', '41', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2041, '3', '2', '1', '47', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2042, '3', '2', '1', '49', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2043, '3', '2', '1', '127', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2044, '3', '2', '1', '128', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2045, '3', '2', '1', '129', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2046, '3', '2', '1', '130', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2047, '3', '2', '1', '131', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2048, '3', '2', '1', '132', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2049, '3', '2', '1', '134', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2050, '3', '2', '1', '142', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2051, '3', '2', '1', '146', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2052, '3', '2', '1', '147', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2053, '3', '2', '1', '148', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2054, '3', '2', '1', '149', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2055, '3', '2', '1', '150', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2056, '3', '2', '1', '155', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2057, '3', '2', '1', '156', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2058, '3', '2', '1', '174', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2059, '3', '2', '1', '175', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2060, '3', '2', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2061, '3', '2', '1', '27', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2062, '3', '2', '1', '29', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2063, '3', '2', '1', '31', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2064, '3', '2', '1', '33', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2065, '3', '2', '1', '35', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2066, '3', '2', '1', '37', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2067, '3', '2', '1', '39', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2068, '3', '2', '1', '41', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2069, '3', '2', '1', '47', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2070, '3', '2', '1', '49', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2071, '3', '2', '1', '127', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2072, '3', '2', '1', '128', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2073, '3', '2', '1', '129', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2074, '3', '2', '1', '130', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2075, '3', '2', '1', '131', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2076, '3', '2', '1', '132', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2077, '3', '2', '1', '134', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2078, '3', '2', '1', '142', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2079, '3', '2', '1', '146', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2080, '3', '2', '1', '147', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2081, '3', '2', '1', '148', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2082, '3', '2', '1', '149', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2083, '3', '2', '1', '150', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2084, '3', '2', '1', '155', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2085, '3', '2', '1', '156', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2086, '3', '2', '1', '174', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2087, '3', '2', '1', '175', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2088, '3', '2', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2089, '3', '2', '1', '27', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2090, '3', '2', '1', '29', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2091, '3', '2', '1', '31', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2092, '3', '2', '1', '33', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2093, '3', '2', '1', '35', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2094, '3', '2', '1', '37', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2095, '3', '2', '1', '39', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2096, '3', '2', '1', '41', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2097, '3', '2', '1', '47', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2098, '3', '2', '1', '49', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2099, '3', '2', '1', '127', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2100, '3', '2', '1', '128', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2101, '3', '2', '1', '129', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2102, '3', '2', '1', '130', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2103, '3', '2', '1', '131', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2104, '3', '2', '1', '132', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2105, '3', '2', '1', '134', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2106, '3', '2', '1', '142', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2107, '3', '2', '1', '146', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2108, '3', '2', '1', '147', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2109, '3', '2', '1', '148', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2110, '3', '2', '1', '149', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2111, '3', '2', '1', '150', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2112, '3', '2', '1', '155', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2113, '3', '2', '1', '156', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2114, '3', '2', '1', '174', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2115, '3', '2', '1', '175', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2116, '3', '2', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2117, '18', '2', '1', '190', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2118, '18', '2', '1', '191', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2119, '18', '2', '1', '192', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2120, '18', '2', '1', '193', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2121, '19', '2', '1', '194', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2122, '19', '2', '1', '195', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2123, '20', '2', '1', '196', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2124, '21', '2', '1', '197', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2125, '19', '2', '1', '198', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2126, '18', '2', '1', '199', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2127, '18', '2', '1', '201', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2128, '18', '2', '1', '202', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2129, '20', '2', '1', '203', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2130, '19', '2', '1', '204', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2131, '19', '2', '1', '205', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2132, '19', '2', '1', '206', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2133, '19', '2', '1', '207', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2134, '20', '2', '1', '208', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2135, '3', '2', '1', '209', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2136, '19', '2', '1', '210', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2137, '3', '2', '1', '211', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2138, '19', '2', '1', '212', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2139, '19', '2', '1', '213', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2140, '19', '2', '1', '214', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2141, '3', '2', '1', '215', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2142, '3', '2', '1', '216', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2143, '3', '2', '1', '217', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2144, '19', '2', '1', '218', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2145, '19', '2', '1', '219', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2146, '19', '2', '1', '220', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2147, '4', '3', '1', '91', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2148, '4', '3', '1', '93', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2149, '4', '3', '1', '95', 'Inactive', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2150, '4', '3', '1', '97', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2151, '4', '3', '1', '99', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2152, '4', '3', '1', '101', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2153, '4', '3', '1', '103', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2154, '4', '3', '1', '105', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2155, '4', '3', '1', '107', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2156, '4', '3', '1', '109', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2157, '4', '3', '1', '111', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2158, '4', '3', '1', '113', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2159, '4', '3', '1', '115', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2160, '4', '3', '1', '117', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2161, '4', '3', '1', '166', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2162, '4', '3', '1', '167', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2163, '4', '3', '1', '189', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2164, '6', '3', '1', '89', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2165, '19', '3', '1', '194', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2166, '19', '3', '1', '195', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2167, '19', '3', '1', '197', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2168, '19', '3', '1', '198', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2169, '3', '3', '1', '176', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2170, '3', '3', '1', '209', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2171, '3', '3', '1', '211', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2172, '3', '3', '1', '212', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2173, '3', '3', '1', '215', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2174, '3', '3', '1', '216', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2175, '3', '3', '1', '217', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2176, '3', '3', '1', '220', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2177, '19', '3', '1', '140', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2178, '19', '3', '1', '213', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2179, '19', '3', '1', '214', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2180, '19', '3', '1', '218', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2181, '19', '3', '1', '219', 'Active', '21', '2016-02-06', '21', '2016-02-06', 'A', '1', '1', '1', '1'),
(2182, '19', '5', '36', '194', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2183, '19', '5', '36', '195', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2184, '19', '5', '36', '197', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2185, '19', '5', '36', '198', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2186, '19', '5', '36', '140', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2187, '19', '5', '36', '213', 'Inactive', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2188, '19', '5', '36', '214', 'Inactive', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2189, '19', '5', '36', '218', 'Inactive', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2190, '19', '5', '36', '219', 'Inactive', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2191, '19', '5', '36', '229', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2192, '7', '5', '36', '90', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2193, '19', '5', '35', '194', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2194, '19', '5', '35', '195', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2195, '19', '5', '35', '197', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2196, '19', '5', '35', '198', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2197, '19', '5', '35', '140', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2198, '19', '5', '35', '213', 'Inactive', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2199, '19', '5', '35', '214', 'Inactive', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2200, '19', '5', '35', '218', 'Inactive', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2201, '19', '5', '35', '219', 'Inactive', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2202, '19', '5', '35', '229', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2203, '7', '5', '35', '90', 'Active', '21', '2016-02-12', '21', '2016-02-12', 'A', '1', '1', '1', '1'),
(2204, '19', '5', '41', '194', 'Active', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2205, '19', '5', '41', '195', 'Active', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2206, '19', '5', '41', '197', 'Active', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2207, '19', '5', '41', '198', 'Active', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2208, '19', '5', '41', '140', 'Active', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2209, '19', '5', '41', '213', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2210, '19', '5', '41', '214', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2211, '19', '5', '41', '218', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2212, '19', '5', '41', '219', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2213, '19', '5', '41', '229', 'Active', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2214, '7', '5', '41', '90', 'Active', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2215, '19', '5', '41', '230', 'Active', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2216, '3', '5', '41', '209', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2217, '3', '5', '41', '215', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2218, '3', '5', '41', '216', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2219, '3', '5', '41', '221', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2220, '3', '5', '41', '223', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2221, '3', '5', '41', '224', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2222, '3', '5', '41', '225', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2223, '3', '5', '41', '226', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2224, '3', '5', '41', '227', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2225, '3', '5', '41', '228', 'Inactive', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1'),
(2226, '3', '5', '41', '231', 'Active', '21', '2016-02-17', '21', '2016-02-17', 'A', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wing_mst`
--

CREATE TABLE `tbl_wing_mst` (
  `divn_id` int(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `divn_name` varchar(200) NOT NULL,
  `brnh_id` varchar(200) DEFAULT NULL,
  `maker_id` varchar(200) DEFAULT NULL,
  `maker_date` date DEFAULT NULL,
  `author_id` varchar(200) DEFAULT NULL,
  `author_date` date DEFAULT NULL,
  `status` varchar(200) DEFAULT 'A',
  `comp_id` varchar(200) DEFAULT NULL,
  `zone_id` varchar(200) DEFAULT NULL,
  `brnha_id` varchar(200) DEFAULT NULL,
  `divna_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wing_mst`
--

INSERT INTO `tbl_wing_mst` (`divn_id`, `code`, `divn_name`, `brnh_id`, `maker_id`, `maker_date`, `author_id`, `author_date`, `status`, `comp_id`, `zone_id`, `brnha_id`, `divna_id`) VALUES
(1, '912', 'Department1', '1', '1', '2017-03-18', '1', '2017-03-18', 'A', '1', '1', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `production_production_dtl`
--
ALTER TABLE `production_production_dtl`
  ADD PRIMARY KEY (`invoice_dtl_id`);

--
-- Indexes for table `production_production_hdr`
--
ALTER TABLE `production_production_hdr`
  ADD PRIMARY KEY (`invoiceid`);

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tbl_account_mst`
--
ALTER TABLE `tbl_account_mst`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `FK_main_id` (`main_account_id`),
  ADD KEY `main_account_id_2` (`main_account_id`),
  ADD KEY `main_account_id` (`main_account_id`);

--
-- Indexes for table `tbl_address_m`
--
ALTER TABLE `tbl_address_m`
  ADD PRIMARY KEY (`addressid`);

--
-- Indexes for table `tbl_approve_status`
--
ALTER TABLE `tbl_approve_status`
  ADD PRIMARY KEY (`new_case_id`);

--
-- Indexes for table `tbl_branch_mst`
--
ALTER TABLE `tbl_branch_mst`
  ADD PRIMARY KEY (`brnh_id`);

--
-- Indexes for table `tbl_city_m`
--
ALTER TABLE `tbl_city_m`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `tbl_communication`
--
ALTER TABLE `tbl_communication`
  ADD PRIMARY KEY (`communication_id`);

--
-- Indexes for table `tbl_contact_m`
--
ALTER TABLE `tbl_contact_m`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_contact_person`
--
ALTER TABLE `tbl_contact_person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `tbl_country_m`
--
ALTER TABLE `tbl_country_m`
  ADD UNIQUE KEY `contryid` (`contryid`);

--
-- Indexes for table `tbl_enterprise_mst`
--
ALTER TABLE `tbl_enterprise_mst`
  ADD PRIMARY KEY (`comp_id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `tbl_entitytype_mst`
--
ALTER TABLE `tbl_entitytype_mst`
  ADD PRIMARY KEY (`entitytypeid`);

--
-- Indexes for table `tbl_godown_mst`
--
ALTER TABLE `tbl_godown_mst`
  ADD PRIMARY KEY (`godown_id`),
  ADD KEY `FK_main_id` (`main_godown_id`),
  ADD KEY `main_godown_id_2` (`main_godown_id`),
  ADD KEY `main_godown_id` (`main_godown_id`);

--
-- Indexes for table `tbl_invoice_dtl`
--
ALTER TABLE `tbl_invoice_dtl`
  ADD PRIMARY KEY (`invoice_dtl_id`);

--
-- Indexes for table `tbl_invoice_hdr`
--
ALTER TABLE `tbl_invoice_hdr`
  ADD PRIMARY KEY (`invoiceid`);

--
-- Indexes for table `tbl_invoice_payment`
--
ALTER TABLE `tbl_invoice_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice_report`
--
ALTER TABLE `tbl_invoice_report`
  ADD PRIMARY KEY (`invoice_rid`);

--
-- Indexes for table `tbl_letter_head`
--
ALTER TABLE `tbl_letter_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_data`
--
ALTER TABLE `tbl_master_data`
  ADD PRIMARY KEY (`serial_number`);

--
-- Indexes for table `tbl_master_data_mst`
--
ALTER TABLE `tbl_master_data_mst`
  ADD PRIMARY KEY (`param_id`);

--
-- Indexes for table `tbl_module_function`
--
ALTER TABLE `tbl_module_function`
  ADD PRIMARY KEY (`func_id`),
  ADD UNIQUE KEY `function_name` (`function_name`);

--
-- Indexes for table `tbl_module_mst`
--
ALTER TABLE `tbl_module_mst`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `tbl_new_case`
--
ALTER TABLE `tbl_new_case`
  ADD PRIMARY KEY (`new_case_id`);

--
-- Indexes for table `tbl_new_invoice`
--
ALTER TABLE `tbl_new_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `tbl_opening_stock_mst`
--
ALTER TABLE `tbl_opening_stock_mst`
  ADD PRIMARY KEY (`opening_stock_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`invoice_rid`);

--
-- Indexes for table `tbl_payment_log`
--
ALTER TABLE `tbl_payment_log`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_po_stock_in`
--
ALTER TABLE `tbl_po_stock_in`
  ADD PRIMARY KEY (`poid`);

--
-- Indexes for table `tbl_prodcatg_m`
--
ALTER TABLE `tbl_prodcatg_m`
  ADD PRIMARY KEY (`product_Catid`);

--
-- Indexes for table `tbl_prodcatg_mst`
--
ALTER TABLE `tbl_prodcatg_mst`
  ADD PRIMARY KEY (`prodcatg_id`),
  ADD KEY `main_godown_id_2` (`main_prodcatg_id`),
  ADD KEY `main_godown_id` (`main_prodcatg_id`),
  ADD KEY `FK_main_id` (`main_prodcatg_id`);

--
-- Indexes for table `tbl_producttype_m`
--
ALTER TABLE `tbl_producttype_m`
  ADD PRIMARY KEY (`Product_typeid`);

--
-- Indexes for table `tbl_product_serial`
--
ALTER TABLE `tbl_product_serial`
  ADD PRIMARY KEY (`serial_number`);

--
-- Indexes for table `tbl_product_serial_log`
--
ALTER TABLE `tbl_product_serial_log`
  ADD PRIMARY KEY (`serial_number`);

--
-- Indexes for table `tbl_product_stock`
--
ALTER TABLE `tbl_product_stock`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `tbl_product_stock_log`
--
ALTER TABLE `tbl_product_stock_log`
  ADD PRIMARY KEY (`stocklog_id`);

--
-- Indexes for table `tbl_proforma_invoice_dtl`
--
ALTER TABLE `tbl_proforma_invoice_dtl`
  ADD PRIMARY KEY (`proforma_invoice_dtl_id`);

--
-- Indexes for table `tbl_proforma_invoice_hdr`
--
ALTER TABLE `tbl_proforma_invoice_hdr`
  ADD PRIMARY KEY (`proforma_invoice_id`);

--
-- Indexes for table `tbl_purchase_order_dtl`
--
ALTER TABLE `tbl_purchase_order_dtl`
  ADD PRIMARY KEY (`purchase_order_dtl_id`);

--
-- Indexes for table `tbl_purchase_order_hdr`
--
ALTER TABLE `tbl_purchase_order_hdr`
  ADD PRIMARY KEY (`purchase_order_id`);

--
-- Indexes for table `tbl_purchase_order_return_dtl`
--
ALTER TABLE `tbl_purchase_order_return_dtl`
  ADD PRIMARY KEY (`purchase_order_return_id_dtl`);

--
-- Indexes for table `tbl_purchase_order_return_hdr`
--
ALTER TABLE `tbl_purchase_order_return_hdr`
  ADD PRIMARY KEY (`purchase_order_return_id`);

--
-- Indexes for table `tbl_quotation_dtl`
--
ALTER TABLE `tbl_quotation_dtl`
  ADD PRIMARY KEY (`quotation_id_dtl`);

--
-- Indexes for table `tbl_quotation_hdr`
--
ALTER TABLE `tbl_quotation_hdr`
  ADD PRIMARY KEY (`quotation_id_hdr`);

--
-- Indexes for table `tbl_region_mst`
--
ALTER TABLE `tbl_region_mst`
  ADD PRIMARY KEY (`zone_id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `tbl_role_func_action`
--
ALTER TABLE `tbl_role_func_action`
  ADD PRIMARY KEY (`rol_func_act_id`);

--
-- Indexes for table `tbl_role_mst`
--
ALTER TABLE `tbl_role_mst`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_sales_ordernew_dtl`
--
ALTER TABLE `tbl_sales_ordernew_dtl`
  ADD PRIMARY KEY (`purchase_order_dtl_id`);

--
-- Indexes for table `tbl_sales_ordernew_hdr`
--
ALTER TABLE `tbl_sales_ordernew_hdr`
  ADD PRIMARY KEY (`purchase_order_id`);

--
-- Indexes for table `tbl_sales_order_dtl`
--
ALTER TABLE `tbl_sales_order_dtl`
  ADD PRIMARY KEY (`sales_dtl_id`);

--
-- Indexes for table `tbl_sales_order_hdr`
--
ALTER TABLE `tbl_sales_order_hdr`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `tbl_sales_order_return_dtl`
--
ALTER TABLE `tbl_sales_order_return_dtl`
  ADD PRIMARY KEY (`sales_order_return_id_dtl`);

--
-- Indexes for table `tbl_sales_order_return_hdr`
--
ALTER TABLE `tbl_sales_order_return_hdr`
  ADD PRIMARY KEY (`sales_order_return_id`);

--
-- Indexes for table `tbl_state_m`
--
ALTER TABLE `tbl_state_m`
  ADD UNIQUE KEY `stateid` (`stateid`);

--
-- Indexes for table `tbl_termandcondition`
--
ALTER TABLE `tbl_termandcondition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_mst`
--
ALTER TABLE `tbl_user_mst`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_role_mst`
--
ALTER TABLE `tbl_user_role_mst`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `tbl_usr_func_act_mst`
--
ALTER TABLE `tbl_usr_func_act_mst`
  ADD PRIMARY KEY (`mod_fuc_act_id`);

--
-- Indexes for table `tbl_wing_mst`
--
ALTER TABLE `tbl_wing_mst`
  ADD PRIMARY KEY (`divn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `production_production_dtl`
--
ALTER TABLE `production_production_dtl`
  MODIFY `invoice_dtl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `production_production_hdr`
--
ALTER TABLE `production_production_hdr`
  MODIFY `invoiceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `account_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_account_mst`
--
ALTER TABLE `tbl_account_mst`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_address_m`
--
ALTER TABLE `tbl_address_m`
  MODIFY `addressid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_approve_status`
--
ALTER TABLE `tbl_approve_status`
  MODIFY `new_case_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_branch_mst`
--
ALTER TABLE `tbl_branch_mst`
  MODIFY `brnh_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_city_m`
--
ALTER TABLE `tbl_city_m`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10010473;
--
-- AUTO_INCREMENT for table `tbl_communication`
--
ALTER TABLE `tbl_communication`
  MODIFY `communication_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_contact_m`
--
ALTER TABLE `tbl_contact_m`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_contact_person`
--
ALTER TABLE `tbl_contact_person`
  MODIFY `person_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_country_m`
--
ALTER TABLE `tbl_country_m`
  MODIFY `contryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT for table `tbl_enterprise_mst`
--
ALTER TABLE `tbl_enterprise_mst`
  MODIFY `comp_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_entitytype_mst`
--
ALTER TABLE `tbl_entitytype_mst`
  MODIFY `entitytypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_godown_mst`
--
ALTER TABLE `tbl_godown_mst`
  MODIFY `godown_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_invoice_dtl`
--
ALTER TABLE `tbl_invoice_dtl`
  MODIFY `invoice_dtl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_invoice_hdr`
--
ALTER TABLE `tbl_invoice_hdr`
  MODIFY `invoiceid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_invoice_payment`
--
ALTER TABLE `tbl_invoice_payment`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_invoice_report`
--
ALTER TABLE `tbl_invoice_report`
  MODIFY `invoice_rid` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_letter_head`
--
ALTER TABLE `tbl_letter_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_master_data`
--
ALTER TABLE `tbl_master_data`
  MODIFY `serial_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_master_data_mst`
--
ALTER TABLE `tbl_master_data_mst`
  MODIFY `param_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_module_function`
--
ALTER TABLE `tbl_module_function`
  MODIFY `func_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;
--
-- AUTO_INCREMENT for table `tbl_module_mst`
--
ALTER TABLE `tbl_module_mst`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_new_case`
--
ALTER TABLE `tbl_new_case`
  MODIFY `new_case_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_new_invoice`
--
ALTER TABLE `tbl_new_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_opening_stock_mst`
--
ALTER TABLE `tbl_opening_stock_mst`
  MODIFY `opening_stock_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `invoice_rid` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_payment_log`
--
ALTER TABLE `tbl_payment_log`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_po_stock_in`
--
ALTER TABLE `tbl_po_stock_in`
  MODIFY `poid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_prodcatg_m`
--
ALTER TABLE `tbl_prodcatg_m`
  MODIFY `product_Catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_prodcatg_mst`
--
ALTER TABLE `tbl_prodcatg_mst`
  MODIFY `prodcatg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `tbl_producttype_m`
--
ALTER TABLE `tbl_producttype_m`
  MODIFY `Product_typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;
--
-- AUTO_INCREMENT for table `tbl_product_serial`
--
ALTER TABLE `tbl_product_serial`
  MODIFY `serial_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_product_serial_log`
--
ALTER TABLE `tbl_product_serial_log`
  MODIFY `serial_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_product_stock`
--
ALTER TABLE `tbl_product_stock`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_product_stock_log`
--
ALTER TABLE `tbl_product_stock_log`
  MODIFY `stocklog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;
--
-- AUTO_INCREMENT for table `tbl_proforma_invoice_dtl`
--
ALTER TABLE `tbl_proforma_invoice_dtl`
  MODIFY `proforma_invoice_dtl_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_proforma_invoice_hdr`
--
ALTER TABLE `tbl_proforma_invoice_hdr`
  MODIFY `proforma_invoice_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_purchase_order_dtl`
--
ALTER TABLE `tbl_purchase_order_dtl`
  MODIFY `purchase_order_dtl_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_purchase_order_hdr`
--
ALTER TABLE `tbl_purchase_order_hdr`
  MODIFY `purchase_order_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_purchase_order_return_dtl`
--
ALTER TABLE `tbl_purchase_order_return_dtl`
  MODIFY `purchase_order_return_id_dtl` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_purchase_order_return_hdr`
--
ALTER TABLE `tbl_purchase_order_return_hdr`
  MODIFY `purchase_order_return_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_quotation_dtl`
--
ALTER TABLE `tbl_quotation_dtl`
  MODIFY `quotation_id_dtl` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_quotation_hdr`
--
ALTER TABLE `tbl_quotation_hdr`
  MODIFY `quotation_id_hdr` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_region_mst`
--
ALTER TABLE `tbl_region_mst`
  MODIFY `zone_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_role_func_action`
--
ALTER TABLE `tbl_role_func_action`
  MODIFY `rol_func_act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tbl_role_mst`
--
ALTER TABLE `tbl_role_mst`
  MODIFY `role_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sales_ordernew_dtl`
--
ALTER TABLE `tbl_sales_ordernew_dtl`
  MODIFY `purchase_order_dtl_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_sales_ordernew_hdr`
--
ALTER TABLE `tbl_sales_ordernew_hdr`
  MODIFY `purchase_order_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_sales_order_dtl`
--
ALTER TABLE `tbl_sales_order_dtl`
  MODIFY `sales_dtl_id` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sales_order_hdr`
--
ALTER TABLE `tbl_sales_order_hdr`
  MODIFY `salesid` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sales_order_return_dtl`
--
ALTER TABLE `tbl_sales_order_return_dtl`
  MODIFY `sales_order_return_id_dtl` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sales_order_return_hdr`
--
ALTER TABLE `tbl_sales_order_return_hdr`
  MODIFY `sales_order_return_id` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_state_m`
--
ALTER TABLE `tbl_state_m`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;
--
-- AUTO_INCREMENT for table `tbl_termandcondition`
--
ALTER TABLE `tbl_termandcondition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user_mst`
--
ALTER TABLE `tbl_user_mst`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user_role_mst`
--
ALTER TABLE `tbl_user_role_mst`
  MODIFY `user_role_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_usr_func_act_mst`
--
ALTER TABLE `tbl_usr_func_act_mst`
  MODIFY `mod_fuc_act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2227;
--
-- AUTO_INCREMENT for table `tbl_wing_mst`
--
ALTER TABLE `tbl_wing_mst`
  MODIFY `divn_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_account_mst`
--
ALTER TABLE `tbl_account_mst`
  ADD CONSTRAINT `FK_main_account_id` FOREIGN KEY (`main_account_id`) REFERENCES `tbl_account_mst` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_godown_mst`
--
ALTER TABLE `tbl_godown_mst`
  ADD CONSTRAINT `FK_main_godown_id` FOREIGN KEY (`main_godown_id`) REFERENCES `tbl_godown_mst` (`godown_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
