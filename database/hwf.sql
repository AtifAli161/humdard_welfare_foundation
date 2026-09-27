-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 10:44 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hwf`
--

-- --------------------------------------------------------

--
-- Table structure for table `seekar_requests`
--

CREATE TABLE `seekar_requests` (
  `Req id` int(128) NOT NULL,
  `Seekar_Name` varchar(128) NOT NULL,
  `Item_Name` varchar(128) NOT NULL,
  `Category` varchar(128) NOT NULL,
  `Doner_Name` varchar(128) NOT NULL,
  `Date/Time` datetime NOT NULL,
  `Status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seekar_requests`
--

INSERT INTO `seekar_requests` (`Req id`, `Seekar_Name`, `Item_Name`, `Category`, `Doner_Name`, `Date/Time`, `Status`) VALUES
(1, 'seeker 1', 'Book12', 'Books', 'Doner1', '2022-06-01 00:00:00', 'Pending'),
(2, 'seekar 1 ', 'Panadol', 'Medicine ', 'Doner 1', '2022-06-06 21:32:40', 'Accepted '),
(3, 'seekar 1', 'test', 'test', 'test', '2022-06-06 22:02:27', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `email`, `phone`, `password`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '03339898987', 'admin', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `book_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_category` varchar(255) NOT NULL,
  `book_qty` int(11) NOT NULL,
  `book_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`book_id`, `donor_id`, `book_title`, `book_author`, `book_category`, `book_qty`, `book_status`) VALUES
(1, 1, 'assa', 'as', 'as', 12, 'Enable'),
(4, 1, 'The book of souls', 'M mark', 'novel', 4, 'Enable'),
(5, 1, 'Islamiat', 'M azad', 'class 2nd', 6, 'Enable'),
(6, 1, 'English', 'ABC', '6th class', 9, 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_title`, `status`) VALUES
(1, 'Medicine', 'Enable'),
(2, 'books', 'Enable'),
(3, 'Clothes', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clothes`
--

CREATE TABLE `tbl_clothes` (
  `clothes_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `clothes_type` varchar(255) NOT NULL,
  `clothes_color` varchar(255) NOT NULL,
  `clothes_category` varchar(255) NOT NULL,
  `clothes_qty` int(11) NOT NULL,
  `clothes_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_clothes`
--

INSERT INTO `tbl_clothes` (`clothes_id`, `donor_id`, `clothes_type`, `clothes_color`, `clothes_category`, `clothes_qty`, `clothes_status`) VALUES
(2, 1, 'Jeans1', 'Black1', 'Male', 27, 'Enable'),
(3, 1, 'Shirt', 'Blue', 'Male', 5, 'Enable'),
(4, 1, 'Cotton Suit', 'White', 'Male', 6, 'Enable'),
(7, 1, 'Swiss Loan', 'Dark brown', 'Female', 5, 'Enable'),
(8, 1, 'Swiss Loan', 'Black', 'Female', 8, 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation`
--

CREATE TABLE `tbl_donation` (
  `donation_id` int(11) NOT NULL,
  `donation_by` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `donation_on` datetime NOT NULL,
  `donation_qty` int(11) NOT NULL,
  `donation_des` text NOT NULL,
  `donation_status` enum('Pending','Rejected','Accepted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_donation`
--

INSERT INTO `tbl_donation` (`donation_id`, `donation_by`, `category_id`, `donation_on`, `donation_qty`, `donation_des`, `donation_status`) VALUES
(3, 1, 1, '2022-05-30 12:13:40', 8, 'Painkiller', 'Pending'),
(8, 1, 2, '2022-05-31 21:12:01', 8, 'BSCS books', 'Rejected'),
(9, 1, 3, '2022-05-31 21:14:51', 7, 'Jeans', 'Accepted'),
(10, 1, 3, '2022-05-31 21:15:21', 66, 'jeans', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donor`
--

CREATE TABLE `tbl_donor` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donor_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `donor_phone` varchar(255) NOT NULL,
  `donor_address` varchar(255) NOT NULL,
  `donor_status` varchar(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_donor`
--

INSERT INTO `tbl_donor` (`donor_id`, `donor_name`, `donor_email`, `password`, `donor_phone`, `donor_address`, `donor_status`, `added_on`) VALUES
(1, 'donor 1', 'donor1@gmail.com', 'donor', '03339289829', 'Nowshera', 'Enable', '2022-05-28 11:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `medicine_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `medicine_type` varchar(255) NOT NULL,
  `medicine_qty` varchar(255) NOT NULL,
  `exp_date` date NOT NULL,
  `mfg_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`medicine_id`, `donor_id`, `medicine_name`, `category_id`, `medicine_type`, `medicine_qty`, `exp_date`, `mfg_date`, `status`) VALUES
(2, 1, 'pandol', 1, 'painkiller', '18', '2022-05-19', '2022-05-19', 'Enable'),
(4, 1, 'Befflom', 1, 'pain killer', '2', '2021-03-22', '2022-05-22', 'Enable'),
(5, 1, 'Sinovac', 1, 'Antibiotic', '4', '2021-04-01', '2022-05-22', 'Enable'),
(6, 1, 'CAC+', 1, 'Vitamin ', '7', '2021-07-23', '2022-05-26', 'Enable'),
(7, 1, 'Befflom', 1, 'painkiller', '5', '2022-05-24', '2022-05-25', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seekar`
--

CREATE TABLE `tbl_seekar` (
  `seekar_id` int(11) NOT NULL,
  `seekar_name` varchar(255) NOT NULL,
  `seekar_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `seekar_phone` varchar(255) NOT NULL,
  `seekar_address` varchar(255) NOT NULL,
  `seekar_status` varchar(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seekar`
--

INSERT INTO `tbl_seekar` (`seekar_id`, `seekar_name`, `seekar_email`, `password`, `seekar_phone`, `seekar_address`, `seekar_status`, `added_on`) VALUES
(1, 'seekar 1', 'seekar1@gmail.com', 'seekar', '03325055999', 'Nowshera', 'Enable', '2022-05-28 11:31:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seekar_requests`
--
ALTER TABLE `seekar_requests`
  ADD PRIMARY KEY (`Req id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  ADD PRIMARY KEY (`clothes_id`);

--
-- Indexes for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `tbl_donor`
--
ALTER TABLE `tbl_donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seekar_requests`
--
ALTER TABLE `seekar_requests`
  MODIFY `Req id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  MODIFY `clothes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_donor`
--
ALTER TABLE `tbl_donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
