-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 07:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lr`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountsofficeropinion`
--

CREATE TABLE `accountsofficeropinion` (
  `id` int(255) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `accountofficer_id` int(11) NOT NULL,
  `budgetYear` varchar(255) NOT NULL,
  `budgetCode` varchar(255) NOT NULL,
  `budgetSector` varchar(255) NOT NULL,
  `pageNo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(256) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `demand`
--

CREATE TABLE `demand` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recommending_officer_id` int(11) NOT NULL,
  `document_number` varchar(50) NOT NULL,
  `office_department_name` varchar(50) NOT NULL,
  `total` varchar(256) DEFAULT NULL,
  `comment` varchar(1000) NOT NULL,
  `fiscal_year` varchar(256) NOT NULL,
  `source_of_money` int(255) NOT NULL,
  `expenditure_budget_sector` varchar(11) NOT NULL,
  `expenditure_budget_code` varchar(11) NOT NULL,
  `procurement_number` varchar(11) NOT NULL,
  `planned_price` varchar(11) NOT NULL,
  `procurement_type` varchar(11) NOT NULL,
  `details_of_goods_and_work` varchar(11) NOT NULL,
  `advanceAmount` double NOT NULL,
  `need` varchar(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `stage` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recommendingofficeropinion`
--

CREATE TABLE `recommendingofficeropinion` (
  `id` int(20) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `date` varchar(256) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `recommend` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `verification_status` tinyint(1) NOT NULL,
  `verification_id` varchar(256) NOT NULL,
  `admin_verification_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountsofficeropinion`
--
ALTER TABLE `accountsofficeropinion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand`
--
ALTER TABLE `demand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendingofficeropinion`
--
ALTER TABLE `recommendingofficeropinion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountsofficeropinion`
--
ALTER TABLE `accountsofficeropinion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `demand`
--
ALTER TABLE `demand`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `recommendingofficeropinion`
--
ALTER TABLE `recommendingofficeropinion`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
