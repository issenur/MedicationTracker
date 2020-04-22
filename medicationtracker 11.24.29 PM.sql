-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 05:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicationtracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `pin` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pin`) VALUES
('admin', 1738);

-- --------------------------------------------------------

--
-- Table structure for table `break_down`
--

CREATE TABLE `break_down` (
  `order_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `medication_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `administer_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `care_giver`
--

CREATE TABLE `care_giver` (
  `care_giver_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `first` varchar(20) NOT NULL,
  `last` varchar(20) NOT NULL,
  `is_nurse` int(1) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `care_giver`
--

INSERT INTO `care_giver` (`care_giver_id`, `first`, `last`, `is_nurse`, `active`) VALUES
(0000, 'NULL', 'NULL', 1, 1),
(0001, 'Samuel', 'Ray', 1, 1),
(0002, 'Ike', 'Mink', 1, 1),
(0003, 'Sean', 'Carter', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `first` varchar(20) NOT NULL,
  `last` varchar(20) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `first`, `last`, `active`) VALUES
(0033, 'Lee', 'Xi', 1),
(0034, 'Jose', 'Nunez', 0),
(0035, 'Mitchell', 'Johnson', 1),
(0036, 'Mack', 'Odell', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `medication_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(40) NOT NULL,
  `units` varchar(20) NOT NULL,
  `physical_form` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`medication_id`, `name`, `units`, `physical_form`) VALUES
(000001, 'Lidocaine Solution', 'ml', 'Syrup');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `doctor_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `patient_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `care_giver_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `doctor_id`, `patient_id`, `care_giver_id`, `date`) VALUES
(000006, 0036, 0063, 0000, '2020-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `first` varchar(20) NOT NULL,
  `last` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `first`, `last`, `date_of_birth`, `active`) VALUES
(0001, 'Abdi', 'Abdi', '1992-02-06', 1),
(0002, 'Billy', 'Jean', '1970-12-01', 0),
(0004, 'Tyrone', 'Taylor', '1985-08-27', 1),
(0063, 'Jay', 'Jackson', '1990-09-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `pin` int(4) UNSIGNED ZEROFILL NOT NULL,
  `doctor_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `patient_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `care_giver_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `pin`, `doctor_id`, `patient_id`, `care_giver_id`, `active`) VALUES
('AbdiAbdi@mn', 1111, NULL, 0001, NULL, 1),
('Billy6000', 9393, NULL, 0002, NULL, 0),
('DocJohnson', 8980, 0035, NULL, NULL, 1),
('IkeMink2019', 8080, NULL, NULL, 0002, 0),
('JayJackson', 0195, NULL, 0063, NULL, 1),
('JoseNunez', 2134, 0034, NULL, NULL, 0),
('LeeXi007', 2020, 0033, NULL, NULL, 1),
('MackOdo', 2300, 0036, NULL, NULL, 1),
('SamuelRay1', 1001, NULL, NULL, 0001, 1),
('SeanCarter', 0003, NULL, NULL, 0003, 1),
('TyroneFFF', 1234, NULL, 0004, NULL, 1),
('Unicorn', 1232, NULL, 0005, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `break_down`
--
ALTER TABLE `break_down`
  ADD PRIMARY KEY (`medication_id`,`order_id`,`quantity`,`administer_time`) USING BTREE,
  ADD KEY `FOREIGN_KEY1` (`order_id`),
  ADD KEY `FOREIGN_KEY2` (`medication_id`);

--
-- Indexes for table `care_giver`
--
ALTER TABLE `care_giver`
  ADD PRIMARY KEY (`care_giver_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`medication_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FOREIGN_KEY1` (`doctor_id`) USING BTREE,
  ADD KEY `FOREIGN_KEY2` (`patient_id`) USING BTREE,
  ADD KEY `FOREIGN_KEY3` (`care_giver_id`) USING BTREE;

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `care_giver`
--
ALTER TABLE `care_giver`
  MODIFY `care_giver_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `medication_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `break_down`
--
ALTER TABLE `break_down`
  ADD CONSTRAINT `FOREIGN_KEY2` FOREIGN KEY (`medication_id`) REFERENCES `medication` (`medication_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FOREIGN2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN4` FOREIGN KEY (`care_giver_id`) REFERENCES `care_giver` (`care_giver_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
