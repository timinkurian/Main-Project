-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 07:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realdeal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisement`
--

CREATE TABLE `tbl_advertisement` (
  `advertisement_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `advertisement_date` varchar(20) NOT NULL,
  `odometer` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_advertisement`
--

INSERT INTO `tbl_advertisement` (`advertisement_id`, `car_id`, `price`, `description`, `latitude`, `longitude`, `advertisement_date`, `odometer`, `status`) VALUES
(3, 5, 284500, 'Family used car\r\nGood condition\r\nNew insurance', 10.8505159, 76.2710833, '09/05/19', 58000, 1),
(4, 6, 358000, 'Good condition', 0, 0, '09/05/19', 100000, 0),
(5, 5, 260000, 'Family used car', 10.8505159, 76.2710833, '09/05/19', 58000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointment_id` int(11) NOT NULL,
  `registerno` varchar(20) NOT NULL,
  `licenceno` varchar(20) NOT NULL,
  `scheme_id` int(11) NOT NULL,
  `bookdate` varchar(20) NOT NULL,
  `appointment_date` varchar(20) NOT NULL,
  `odometer` int(11) NOT NULL,
  `remarks` varchar(500) DEFAULT 'Nil',
  `appointment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointment_id`, `registerno`, `licenceno`, `scheme_id`, `bookdate`, `appointment_date`, `odometer`, `remarks`, `appointment_status`) VALUES
(7, 'KL 06 J 0959', 'lic4123', 2, '05/09/19', '05/11/2019', 850, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Hyundai'),
(2, 'Maruti Suzuki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car`
--

CREATE TABLE `tbl_car` (
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `manufactured_year` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `regno` varchar(13) NOT NULL,
  `engineno` varchar(25) NOT NULL,
  `chasisno` varchar(25) NOT NULL,
  `rcbook` varchar(150) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_car`
--

INSERT INTO `tbl_car` (`car_id`, `user_id`, `variant_id`, `manufactured_year`, `color`, `regno`, `engineno`, `chasisno`, `rcbook`, `photo`, `status`) VALUES
(5, 14, 4, '2017', 'White', 'KL 06 H 3595', 'F8DN5645546', 'MA3EUA61S00878747DG', '/upload/car/14/KL 06 H 3595/RC book.jpg', '/upload/car/14/KL 06 H 3595/alto 800 white.png', 2),
(6, 14, 2, '2018', 'Red', 'KL 06 J 0959', 'G5FG98364578', 'RK1HTE55R47159802IF', '/upload/car/14/KL 06 J 0959/RC book.jpg', '/upload/car/14/KL 06 J 0959/swift1.jpg', 2),
(7, 5, 5, '2017', 'White', 'KL 07 CK 1091', 'K5FG98364548', 'RK1HTE55R47157202KT', '/upload/car/5/KL 07 CK 1091/RC book.jpg', '/upload/car/5/KL 07 CK 1091/i10 white.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checking`
--

CREATE TABLE `tbl_checking` (
  `checking_id` int(11) NOT NULL,
  `scheme_id` int(11) NOT NULL,
  `spare_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_checking`
--

INSERT INTO `tbl_checking` (`checking_id`, `scheme_id`, `spare_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 2),
(4, 2, 3),
(5, 3, 2),
(6, 3, 4),
(7, 4, 2),
(8, 4, 3),
(9, 4, 4),
(10, 5, 3),
(11, 5, 6),
(12, 6, 3),
(13, 6, 6),
(14, 6, 8),
(15, 7, 2),
(16, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`) VALUES
(2, 'Mechanical'),
(3, 'Electrical'),
(4, 'Washing'),
(5, 'Painting'),
(6, 'Patch Work'),
(9, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `designation_id` int(11) NOT NULL,
  `designation` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_id`, `designation`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'servicecenter'),
(4, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district`) VALUES
(1, 'Tiruvananthapuram'),
(2, 'Kollam'),
(3, 'Pathanamthitta'),
(4, 'Alappuzha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `licenceno` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `mobileno` varchar(20) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_id`, `user_id`, `licenceno`, `department_id`, `first_name`, `last_name`, `mobileno`, `place_id`, `photo`, `status`) VALUES
(6, 29, 'lic3691', 2, 'Albin', 'Thomas', '9656897423', 10, 'upload/29/images.jpg', 1),
(7, 31, 'lic3691', 2, 'Sobia', 'Dev', '9539784512', 7, 'upload/31/big.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employeecount`
--

CREATE TABLE `tbl_employeecount` (
  `count_id` int(11) NOT NULL,
  `licenceno` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `maximum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employeecount`
--

INSERT INTO `tbl_employeecount` (`count_id`, `licenceno`, `department_id`, `maximum`) VALUES
(1, 'lic3691', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fuel`
--

CREATE TABLE `tbl_fuel` (
  `fuel_id` int(11) NOT NULL,
  `fuel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fuel`
--

INSERT INTO `tbl_fuel` (`fuel_id`, `fuel`) VALUES
(1, 'Petrol'),
(2, 'Diesel'),
(3, 'CNG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `image_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `image1` varchar(300) NOT NULL,
  `image2` varchar(300) NOT NULL,
  `image3` varchar(300) NOT NULL,
  `image4` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`image_id`, `advertisement_id`, `image1`, `image2`, `image3`, `image4`) VALUES
(8, 3, '/upload/sales/3/alto800 1.jpg', '/upload/sales/3/alto 800 2.jpg', '/upload/sales/3/alto 800 4.jpg', '/upload/sales/3/alto 800 3.jpg'),
(9, 4, '/upload/sales/4/swift 2.jpg', '/upload/sales/4/swift 5.jpg', '/upload/sales/4/swift4.jpg', '/upload/sales/4/swift3.jpg'),
(10, 5, '/upload/sales/5/alto 800 3.jpg', '/upload/sales/5/alto 800 4.jpg', '/upload/sales/5/alto 800 2.jpg', '/upload/sales/5/alto800 1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_incomplete`
--

CREATE TABLE `tbl_incomplete` (
  `incomplete_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `reason` varchar(300) NOT NULL,
  `delivery_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `email`, `password`, `designation_id`, `status`) VALUES
(5, 'timinkurian@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', 1, 1),
(8, 'realdealmca@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', 2, 1),
(14, 'sudhithanuvelil@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', 1, 1),
(18, 'timinkurian@mca.ajce.in', 'b24331b1a138cde62aa1f679164fc62f', 3, 1),
(29, 'realdealcarss@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', 4, 1),
(30, 'cicilyneykuzhy@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', 3, 1),
(31, 'sobiad@mca.ajce.in', 'b24331b1a138cde62aa1f679164fc62f', 4, 1),
(32, 'timin@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', 3, 0),
(33, 'timin123@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE `tbl_model` (
  `model_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`model_id`, `brand_id`, `model_name`) VALUES
(1, 1, 'i10'),
(2, 1, 'i20'),
(3, 2, 'swift'),
(4, 2, 'alto800'),
(5, 1, 'Verna'),
(6, 2, 'Wagon R');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offeredprice`
--

CREATE TABLE `tbl_offeredprice` (
  `offer_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `offer_amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_status` int(11) NOT NULL,
  `offer_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_offeredprice`
--

INSERT INTO `tbl_offeredprice` (`offer_id`, `advertisement_id`, `offer_amount`, `user_id`, `offer_status`, `offer_date`) VALUES
(5, 3, 255000, 5, 1, '09/05/19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `district_id`, `place`) VALUES
(3, 1, 'Pattom'),
(6, 1, 'Venjaranmoodu'),
(7, 2, 'Kollam'),
(9, 4, 'Nedumudy'),
(10, 3, 'Erumeli'),
(11, 1, 'Kollam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replacing`
--

CREATE TABLE `tbl_replacing` (
  `replacing_id` int(11) NOT NULL,
  `scheme_id` int(11) NOT NULL,
  `spare_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_replacing`
--

INSERT INTO `tbl_replacing` (`replacing_id`, `scheme_id`, `spare_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 1),
(4, 2, 4),
(5, 3, 1),
(6, 4, 1),
(7, 5, 2),
(8, 5, 4),
(9, 6, 1),
(10, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicecenter`
--

CREATE TABLE `tbl_servicecenter` (
  `licenceno` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `center_name` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `certificate` varchar(150) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_servicecenter`
--

INSERT INTO `tbl_servicecenter` (`licenceno`, `user_id`, `place_id`, `brand_id`, `center_name`, `photo`, `certificate`, `mobile`) VALUES
('lic3691', 18, 7, 2, 'Indus', 'upload/18/IMG_880.jpg', 'upload/18/IMG_8816.jpg', '9544631245'),
('lic4123', 30, 9, 2, 'Popular', 'upload/30/hyundai.jpg', 'upload/30/College cert.jpg', '9656332211'),
('lic8526', 32, 7, 1, 'MGF', 'upload/32/hyundai1.jpg', 'upload/32/College cert.jpg', '9656741258');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicescheme`
--

CREATE TABLE `tbl_servicescheme` (
  `scheme_id` int(11) NOT NULL,
  `servicetype_id` int(11) NOT NULL,
  `licenceno` varchar(20) NOT NULL,
  `model_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_servicescheme`
--

INSERT INTO `tbl_servicescheme` (`scheme_id`, `servicetype_id`, `licenceno`, `model_id`, `variant_id`, `department_id`, `km`, `amount`) VALUES
(1, 1, 'lic3691', 3, 1, 2, 1000, '1300'),
(2, 1, 'lic3691', 3, 2, 2, 1000, '1300'),
(3, 1, 'lic3691', 4, 3, 2, 1000, '1000'),
(4, 1, 'lic3691', 4, 4, 2, 1000, '1000'),
(5, 2, 'lic3691', 4, 4, 2, 5000, '800'),
(6, 1, 'lic4123', 3, 6, 2, 1000, '1300'),
(7, 1, 'lic3691', 6, 7, 2, 1000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicestatus`
--

CREATE TABLE `tbl_servicestatus` (
  `status_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `started_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `odometer` int(11) NOT NULL,
  `fuel` varchar(20) NOT NULL,
  `damage` varchar(500) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicetype`
--

CREATE TABLE `tbl_servicetype` (
  `servicetype_id` int(11) NOT NULL,
  `servicetype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_servicetype`
--

INSERT INTO `tbl_servicetype` (`servicetype_id`, `servicetype`) VALUES
(1, 'First Service'),
(2, 'Second Service'),
(3, 'Accident Repair');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spare`
--

CREATE TABLE `tbl_spare` (
  `spare_id` int(11) NOT NULL,
  `spare` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spare`
--

INSERT INTO `tbl_spare` (`spare_id`, `spare`) VALUES
(1, 'Engine Oil'),
(2, 'Coolent'),
(3, 'Break Shoe'),
(4, 'Liner'),
(5, 'Axyl'),
(6, 'Battery'),
(7, 'Viper Blade'),
(8, 'Break Fluid'),
(9, 'Bumber');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` varchar(20) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `paid_from` int(11) NOT NULL,
  `paid_to` int(11) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `paid_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transaction_id`, `transaction_date`, `appointment_id`, `paid_from`, `paid_to`, `transaction_type`, `paid_amount`) VALUES
(3, '09/05/19', 7, 14, 30, 'Advance', 1300);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `place_id` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `first_name`, `last_name`, `mobile`, `place_id`, `photo`) VALUES
(5, 'Timin', 'Kurian', '9847390002', 3, '/upload/5/Timin Photo.jpg'),
(14, 'Sudhi', 'Surendran', '7561094154', 7, 'upload/14/2017_jeep_compass_76_1600x1200.jpg'),
(33, 'Appu', 'Jose', '9447987667', 7, 'upload/33/babydriver.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_variant`
--

CREATE TABLE `tbl_variant` (
  `variant_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `fuel_id` int(11) NOT NULL,
  `variant_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_variant`
--

INSERT INTO `tbl_variant` (`variant_id`, `model_id`, `fuel_id`, `variant_name`) VALUES
(1, 3, 1, 'Lxi'),
(2, 3, 2, 'Vdi'),
(3, 4, 1, 'Lxi'),
(4, 4, 1, 'Vxi'),
(5, 1, 1, 'Magna'),
(6, 3, 1, 'Lx'),
(7, 6, 1, 'Lxi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workcount`
--

CREATE TABLE `tbl_workcount` (
  `count_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `licenceno` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_workcount`
--

INSERT INTO `tbl_workcount` (`count_id`, `date`, `licenceno`, `department_id`, `count`) VALUES
(7, '05/11/2019', 'lic4123', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  ADD PRIMARY KEY (`advertisement_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `licenceno` (`licenceno`),
  ADD KEY `scheme_id` (`scheme_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `tbl_checking`
--
ALTER TABLE `tbl_checking`
  ADD PRIMARY KEY (`checking_id`),
  ADD KEY `scheme_id` (`scheme_id`),
  ADD KEY `spare_id` (`spare_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `licenceno` (`licenceno`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `tbl_employeecount`
--
ALTER TABLE `tbl_employeecount`
  ADD PRIMARY KEY (`count_id`),
  ADD KEY `licenceno` (`licenceno`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `tbl_fuel`
--
ALTER TABLE `tbl_fuel`
  ADD PRIMARY KEY (`fuel_id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `tbl_image_ibfk_1` (`advertisement_id`);

--
-- Indexes for table `tbl_incomplete`
--
ALTER TABLE `tbl_incomplete`
  ADD PRIMARY KEY (`incomplete_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `designation_id` (`designation_id`);

--
-- Indexes for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD PRIMARY KEY (`model_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `tbl_offeredprice`
--
ALTER TABLE `tbl_offeredprice`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `advertisement_id` (`advertisement_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `tbl_replacing`
--
ALTER TABLE `tbl_replacing`
  ADD PRIMARY KEY (`replacing_id`),
  ADD KEY `scheme_id` (`scheme_id`),
  ADD KEY `spare_id` (`spare_id`);

--
-- Indexes for table `tbl_servicecenter`
--
ALTER TABLE `tbl_servicecenter`
  ADD PRIMARY KEY (`licenceno`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `place_id` (`place_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `tbl_servicescheme`
--
ALTER TABLE `tbl_servicescheme`
  ADD PRIMARY KEY (`scheme_id`),
  ADD KEY `servicetype_id` (`servicetype_id`),
  ADD KEY `licenceno` (`licenceno`),
  ADD KEY `model_id` (`model_id`),
  ADD KEY `variant_id` (`variant_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `tbl_servicestatus`
--
ALTER TABLE `tbl_servicestatus`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `tbl_servicetype`
--
ALTER TABLE `tbl_servicetype`
  ADD PRIMARY KEY (`servicetype_id`);

--
-- Indexes for table `tbl_spare`
--
ALTER TABLE `tbl_spare`
  ADD PRIMARY KEY (`spare_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `paid_from` (`paid_from`),
  ADD KEY `paid_to` (`paid_to`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `tbl_variant`
--
ALTER TABLE `tbl_variant`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `model_id` (`model_id`),
  ADD KEY `fuel_id` (`fuel_id`);

--
-- Indexes for table `tbl_workcount`
--
ALTER TABLE `tbl_workcount`
  ADD PRIMARY KEY (`count_id`),
  ADD KEY `licenceno` (`licenceno`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  MODIFY `advertisement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_car`
--
ALTER TABLE `tbl_car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_checking`
--
ALTER TABLE `tbl_checking`
  MODIFY `checking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_employeecount`
--
ALTER TABLE `tbl_employeecount`
  MODIFY `count_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fuel`
--
ALTER TABLE `tbl_fuel`
  MODIFY `fuel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_incomplete`
--
ALTER TABLE `tbl_incomplete`
  MODIFY `incomplete_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_model`
--
ALTER TABLE `tbl_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_offeredprice`
--
ALTER TABLE `tbl_offeredprice`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_replacing`
--
ALTER TABLE `tbl_replacing`
  MODIFY `replacing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_servicescheme`
--
ALTER TABLE `tbl_servicescheme`
  MODIFY `scheme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_servicestatus`
--
ALTER TABLE `tbl_servicestatus`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_servicetype`
--
ALTER TABLE `tbl_servicetype`
  MODIFY `servicetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_spare`
--
ALTER TABLE `tbl_spare`
  MODIFY `spare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_variant`
--
ALTER TABLE `tbl_variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_workcount`
--
ALTER TABLE `tbl_workcount`
  MODIFY `count_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_advertisement`
--
ALTER TABLE `tbl_advertisement`
  ADD CONSTRAINT `tbl_advertisement_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `tbl_car` (`car_id`);

--
-- Constraints for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `tbl_appointment_ibfk_1` FOREIGN KEY (`licenceno`) REFERENCES `tbl_servicecenter` (`licenceno`),
  ADD CONSTRAINT `tbl_appointment_ibfk_2` FOREIGN KEY (`scheme_id`) REFERENCES `tbl_servicescheme` (`scheme_id`);

--
-- Constraints for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD CONSTRAINT `tbl_car_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_login` (`user_id`),
  ADD CONSTRAINT `tbl_car_ibfk_2` FOREIGN KEY (`variant_id`) REFERENCES `tbl_variant` (`variant_id`);

--
-- Constraints for table `tbl_checking`
--
ALTER TABLE `tbl_checking`
  ADD CONSTRAINT `tbl_checking_ibfk_1` FOREIGN KEY (`scheme_id`) REFERENCES `tbl_servicescheme` (`scheme_id`),
  ADD CONSTRAINT `tbl_checking_ibfk_2` FOREIGN KEY (`spare_id`) REFERENCES `tbl_spare` (`spare_id`);

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `tbl_employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_login` (`user_id`),
  ADD CONSTRAINT `tbl_employee_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`department_id`),
  ADD CONSTRAINT `tbl_employee_ibfk_3` FOREIGN KEY (`licenceno`) REFERENCES `tbl_servicecenter` (`licenceno`),
  ADD CONSTRAINT `tbl_employee_ibfk_4` FOREIGN KEY (`place_id`) REFERENCES `tbl_place` (`place_id`);

--
-- Constraints for table `tbl_employeecount`
--
ALTER TABLE `tbl_employeecount`
  ADD CONSTRAINT `tbl_employeecount_ibfk_1` FOREIGN KEY (`licenceno`) REFERENCES `tbl_servicecenter` (`licenceno`),
  ADD CONSTRAINT `tbl_employeecount_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`department_id`);

--
-- Constraints for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD CONSTRAINT `tbl_image_ibfk_1` FOREIGN KEY (`advertisement_id`) REFERENCES `tbl_advertisement` (`advertisement_id`);

--
-- Constraints for table `tbl_incomplete`
--
ALTER TABLE `tbl_incomplete`
  ADD CONSTRAINT `tbl_incomplete_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `tbl_appointment` (`appointment_id`);

--
-- Constraints for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD CONSTRAINT `tbl_leave_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`);

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`designation_id`) REFERENCES `tbl_designation` (`designation_id`);

--
-- Constraints for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD CONSTRAINT `tbl_model_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`);

--
-- Constraints for table `tbl_offeredprice`
--
ALTER TABLE `tbl_offeredprice`
  ADD CONSTRAINT `tbl_offeredprice_ibfk_1` FOREIGN KEY (`advertisement_id`) REFERENCES `tbl_advertisement` (`advertisement_id`),
  ADD CONSTRAINT `tbl_offeredprice_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Constraints for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD CONSTRAINT `tbl_place_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `tbl_district` (`district_id`);

--
-- Constraints for table `tbl_replacing`
--
ALTER TABLE `tbl_replacing`
  ADD CONSTRAINT `tbl_replacing_ibfk_1` FOREIGN KEY (`scheme_id`) REFERENCES `tbl_servicescheme` (`scheme_id`),
  ADD CONSTRAINT `tbl_replacing_ibfk_2` FOREIGN KEY (`spare_id`) REFERENCES `tbl_spare` (`spare_id`);

--
-- Constraints for table `tbl_servicecenter`
--
ALTER TABLE `tbl_servicecenter`
  ADD CONSTRAINT `tbl_servicecenter_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_login` (`user_id`),
  ADD CONSTRAINT `tbl_servicecenter_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `tbl_place` (`place_id`),
  ADD CONSTRAINT `tbl_servicecenter_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`);

--
-- Constraints for table `tbl_servicescheme`
--
ALTER TABLE `tbl_servicescheme`
  ADD CONSTRAINT `tbl_servicescheme_ibfk_1` FOREIGN KEY (`servicetype_id`) REFERENCES `tbl_servicetype` (`servicetype_id`),
  ADD CONSTRAINT `tbl_servicescheme_ibfk_2` FOREIGN KEY (`licenceno`) REFERENCES `tbl_servicecenter` (`licenceno`),
  ADD CONSTRAINT `tbl_servicescheme_ibfk_3` FOREIGN KEY (`model_id`) REFERENCES `tbl_model` (`model_id`),
  ADD CONSTRAINT `tbl_servicescheme_ibfk_4` FOREIGN KEY (`variant_id`) REFERENCES `tbl_variant` (`variant_id`),
  ADD CONSTRAINT `tbl_servicescheme_ibfk_5` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`department_id`);

--
-- Constraints for table `tbl_servicestatus`
--
ALTER TABLE `tbl_servicestatus`
  ADD CONSTRAINT `tbl_servicestatus_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `tbl_appointment` (`appointment_id`),
  ADD CONSTRAINT `tbl_servicestatus_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`);

--
-- Constraints for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD CONSTRAINT `tbl_transaction_ibfk_1` FOREIGN KEY (`paid_from`) REFERENCES `tbl_login` (`user_id`),
  ADD CONSTRAINT `tbl_transaction_ibfk_2` FOREIGN KEY (`paid_to`) REFERENCES `tbl_login` (`user_id`),
  ADD CONSTRAINT `tbl_transaction_ibfk_3` FOREIGN KEY (`appointment_id`) REFERENCES `tbl_appointment` (`appointment_id`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_login` (`user_id`),
  ADD CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `tbl_place` (`place_id`);

--
-- Constraints for table `tbl_variant`
--
ALTER TABLE `tbl_variant`
  ADD CONSTRAINT `tbl_variant_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `tbl_model` (`model_id`),
  ADD CONSTRAINT `tbl_variant_ibfk_2` FOREIGN KEY (`fuel_id`) REFERENCES `tbl_fuel` (`fuel_id`);

--
-- Constraints for table `tbl_workcount`
--
ALTER TABLE `tbl_workcount`
  ADD CONSTRAINT `tbl_workcount_ibfk_1` FOREIGN KEY (`licenceno`) REFERENCES `tbl_servicecenter` (`licenceno`),
  ADD CONSTRAINT `tbl_workcount_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
