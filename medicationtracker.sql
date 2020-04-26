-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 12:14 AM
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
  `admin_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `first` varchar(20) NOT NULL,
  `last` varchar(20) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first`, `last`, `active`) VALUES
(2000, 'Admin', 'Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `break_down`
--

CREATE TABLE `break_down` (
  `order_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `medication_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `administer_time` time NOT NULL,
  `completed` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `break_down`
--

INSERT INTO `break_down` (`order_id`, `medication_id`, `quantity`, `administer_time`, `completed`) VALUES
(400001, 100000, '1.00', '09:00:00', 0),
(400003, 100000, '1.00', '15:00:00', 0),
(400000, 100001, '1.00', '09:00:00', 0),
(400002, 100004, '0.20', '09:00:00', 0),
(400000, 100005, '1.00', '09:00:00', 0),
(400000, 100005, '1.00', '21:00:00', 0),
(400002, 100005, '1.00', '09:00:00', 0),
(400002, 100005, '1.00', '21:00:00', 0),
(400000, 100006, '2.00', '09:00:00', 0),
(400001, 100006, '2.00', '09:00:00', 0),
(400000, 100007, '1.00', '09:00:00', 0),
(400000, 100007, '1.00', '15:00:00', 0),
(400003, 100007, '1.00', '09:00:00', 0),
(400003, 100007, '1.00', '15:00:00', 0),
(400000, 100008, '2.00', '15:00:00', 0),
(400001, 100008, '150.00', '09:00:00', 0);

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
(5000, 'Samuel', 'Ray', 1, 1),
(5001, 'Nina', 'Rodgers', 1, 1),
(5002, 'Anisa', 'Abdi', 1, 1),
(5003, 'Sean', 'Carter', 1, 1);

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
(7000, 'Leroy', 'James', 1),
(7001, 'Najma', 'Jama', 1),
(7002, 'Jose', 'Nunez', 1);

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
(100000, 'lidocaine patch 5%', 'patch', 'NSAID'),
(100001, 'furosemide', 'tablet', 'beta-blocker'),
(100002, 'fluticasone 100mcg', 'sprays', 'antihistamine'),
(100003, 'metformin', 'ml', 'diabetes medicine'),
(100004, 'clonidine', 'ml', 'ADHD'),
(100005, 'atenolol', 'tablet', 'beta-blocker'),
(100006, 'albuterol 100mcg', 'puffs', 'corticosteriod'),
(100007, 'omeperazole', 'capsule', 'pump inhibitor'),
(100008, 'carafate', 'ml', 'pump inhibitor');

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
(400000, 7001, 3002, 0000, '2020-01-06'),
(400001, 7001, 3001, 0000, '2020-03-07'),
(400002, 7001, 3003, 0000, '2020-03-11'),
(400003, 7001, 3000, 0000, '2020-03-28');

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
(3000, 'Kyle', 'Omar', '2001-02-06', 1),
(3001, 'Guled', 'Farah', '1995-09-27', 1),
(3002, 'Angie', 'Simpson', '1929-12-01', 1),
(3003, 'David', 'Lucas', '1974-08-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `doctor_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `patient_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `care_giver_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `admin_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `user_type` varchar(20) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `doctor_id`, `patient_id`, `care_giver_id`, `admin_id`, `user_type`, `active`) VALUES
('Admin2020', 'fea7f657f56a2a448da7d4b535ee5e279caf3d9a', NULL, NULL, NULL, 2000, 'admin', 2),
('Anisa2020', 'ab874467a7d1ff5fc71a4ade87dc0e098b458aae', NULL, NULL, 5002, NULL, 'caregiver', 1),
('Farah500!', 'f56d6351aa71cff0debea014d13525e42036187a', NULL, 3001, NULL, NULL, 'patient', 1),
('JoseNunez', '501ab5444eae9ad32b562570b36ff628ec3790ce', 7002, NULL, NULL, NULL, 'doctor', 1),
('KyleOmar', 'f56d6351aa71cff0debea014d13525e42036187a', NULL, 3000, NULL, NULL, 'patient', 1),
('LeeROY1', '501ab5444eae9ad32b562570b36ff628ec3790ce', 7000, NULL, NULL, NULL, 'doctor', 1),
('LU8989', 'f56d6351aa71cff0debea014d13525e42036187a', NULL, 3003, NULL, NULL, 'patient', 1),
('NinaR$007', 'ab874467a7d1ff5fc71a4ade87dc0e098b458aae', NULL, NULL, 5001, NULL, 'caregiver', 1),
('SamuelRay1', 'ab874467a7d1ff5fc71a4ade87dc0e098b458aae', NULL, NULL, 5000, NULL, 'caregiver', 1),
('SeanCarter', 'ab874467a7d1ff5fc71a4ade87dc0e098b458aae', NULL, NULL, 5003, NULL, 'caregiver', 1),
('Simpson6000', 'f56d6351aa71cff0debea014d13525e42036187a', NULL, 3002, NULL, NULL, 'patient', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
  ADD PRIMARY KEY (`username`),
  ADD KEY `FOREIGN_KEY1` (`doctor_id`),
  ADD KEY `FOREIGN_KEY3` (`care_giver_id`),
  ADD KEY `FOREIGN_KEY0` (`patient_id`),
  ADD KEY `FOREIGN_KEY4` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002;

--
-- AUTO_INCREMENT for table `care_giver`
--
ALTER TABLE `care_giver`
  MODIFY `care_giver_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7005;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7015;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `medication_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100010;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400008;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3012;

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

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FOREIGN_KEY0` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN_KEY1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN_KEY3` FOREIGN KEY (`care_giver_id`) REFERENCES `care_giver` (`care_giver_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN_KEY4` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;