-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 08:25 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phongkham`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(255) NOT NULL,
  `clinicId` int(255) DEFAULT NULL,
  `patientId` int(255) DEFAULT NULL,
  `doctorId` int(255) DEFAULT NULL,
  `appointmentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `reason` varchar(255) NOT NULL,
  `symptom` varchar(255) DEFAULT NULL,
  `arrived` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `taxCode` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `name`, `phone`, `email`, `address`, `taxCode`, `website`) VALUES
(1, 'Hoàn Mỹ', 37252002, 'info@uit.edu.vn', 'Khu phố 6, P.Linh Trung, Q.Thủ Đức, Tp.Hồ Chí Minh', '37252148', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `id` int(255) NOT NULL,
  `patientId` int(255) DEFAULT NULL,
  `cardCode` varchar(255) NOT NULL,
  `fromDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `toDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `placeCheck` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecord`
--

CREATE TABLE `medicalrecord` (
  `id` int(255) NOT NULL,
  `patientId` int(255) DEFAULT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `conclusion` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(255) NOT NULL,
  `clinicId` int(255) DEFAULT NULL,
  `unitId` int(255) DEFAULT NULL,
  `standard` varchar(255) NOT NULL,
  `expectancy` varchar(255) NOT NULL,
  `concentration` float NOT NULL,
  `madeIn` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `price` int(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `patientId` int(255) DEFAULT NULL,
  `doctorId` int(255) DEFAULT NULL,
  `clinicId` int(255) DEFAULT NULL,
  `medicalRecordId` int(255) DEFAULT NULL,
  `orderCode` varchar(255) NOT NULL,
  `totalAmount` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ordermedicine`
--

CREATE TABLE `ordermedicine` (
  `id` int(255) NOT NULL,
  `orderId` int(255) DEFAULT NULL,
  `medicineId` int(255) DEFAULT NULL,
  `amount` int(255) NOT NULL,
  `totalPrice` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderservice`
--

CREATE TABLE `orderservice` (
  `id` int(255) NOT NULL,
  `orderId` int(255) DEFAULT NULL,
  `serviceId` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `DOB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `passport` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `country` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `bloodgroup` varchar(255) DEFAULT NULL,
  `allergic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fullname`, `phone`, `address`, `email`, `DOB`, `passport`, `gender`, `avatar`, `username`, `password`, `remember_token`, `active`, `createdAt`, `updatedAt`, `country`, `religion`, `bloodgroup`, `allergic`) VALUES
(1, 'Nguyễn Văn Tú', '0124674209', '78 Đường 2, P.Bình Trưng Tây, Q.2, TP.HCM', 'tu243@gmail.com', '1993-07-14 17:00:00', '023165786', 1, NULL, 'tunv123', '123456', NULL, 1, '2017-11-21 11:32:49', '0000-00-00 00:00:00', 'Việt Nam', 'Kinh', 'A', NULL),
(2, 'Phan Hoàng Anh', '0126754889', '56/21/1, Đường Nguyễn Xí, P.23, Q.Bình Thạnh, TP.HCM', 'hoanganh@yahoo.com.vn', '1987-10-31 17:00:00', '026278545', 0, NULL, 'hoanganh', '123456', NULL, 1, '2017-11-21 11:32:49', '0000-00-00 00:00:00', 'Việt Nam', 'Kinh', 'A', NULL),
(3, 'Trần Đình Toàn', '0909565786', '34/12 Đường Nguyễn Duy Trinh, P.Thạnh Mỹ Lợi, Q.2, TP.HCM', 'toantr@gmail.com', '1993-06-27 17:00:00', '023187564', 1, NULL, 'toantd', '123456', NULL, 1, '2017-11-21 11:32:49', '0000-00-00 00:00:00', 'Việt Nam', 'Kinh', 'O', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(255) NOT NULL,
  `clinicId` int(255) DEFAULT NULL,
  `executedById` int(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `price` int(255) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(255) NOT NULL,
  `clinicId` int(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `clinicId`, `name`, `content`, `active`) VALUES
(1, 1, 'Răng Hàm Mặt', NULL, 1),
(2, 1, 'Da Liễu', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(255) NOT NULL,
  `orderId` int(255) DEFAULT NULL,
  `createdById` int(255) DEFAULT NULL,
  `totalAmount` int(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `specializationId` int(255) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `DOB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `passport` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `userType` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `specializationId`, `fullname`, `phone`, `address`, `email`, `DOB`, `passport`, `gender`, `avatar`, `userType`, `username`, `password`, `remember_token`, `active`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'Nguyễn Văn Khánh', '0909645297', '89 Đường 4, P.Linh Trung, Q.Thủ Đức', 'khanhnv@gmail.com', '1981-11-20 17:00:00', '0562987631', 1, NULL, 'Bác Sĩ', 'khanhnv', '123456', NULL, 1, '2017-11-21 11:15:00', '0000-00-00 00:00:00'),
(2, 2, 'Hoàng Thế Phong', '0908264841', '56 Đường Lê Văn Chí, P.Linh Trung, Q.Thủ Đức, TP.HCM', 'phonght@gmail.com', '1980-11-09 17:00:00', '025243678', 1, NULL, 'Bác Sĩ', 'phonght', '123456', NULL, 1, '2017-11-21 11:23:40', '0000-00-00 00:00:00'),
(3, NULL, 'Trần Thị Minh', '0123598106', '12/3 Đường Xô Viết Nghệ Tĩnh, P.25, Q. Bình Thạnh, TP.HCM', 'minhtt@gmail.com', '1989-01-27 17:00:00', '025243554', 0, NULL, 'Lễ Tân', 'minhtt', '123456', NULL, 1, '2017-11-21 11:23:40', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_fk0` (`clinicId`),
  ADD KEY `appointment_fk1` (`patientId`),
  ADD KEY `appointment_fk2` (`doctorId`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insurance_fk0` (`patientId`);

--
-- Indexes for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicalRecord_fk0` (`patientId`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_fk0` (`clinicId`),
  ADD KEY `medicine_fk1` (`unitId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_fk0` (`patientId`),
  ADD KEY `order_fk1` (`doctorId`),
  ADD KEY `order_fk2` (`clinicId`),
  ADD KEY `order_fk3` (`medicalRecordId`);

--
-- Indexes for table `ordermedicine`
--
ALTER TABLE `ordermedicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderMedicine_fk0` (`orderId`),
  ADD KEY `orderMedicine_fk1` (`medicineId`);

--
-- Indexes for table `orderservice`
--
ALTER TABLE `orderservice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderService_fk0` (`orderId`),
  ADD KEY `orderService_fk1` (`serviceId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_fk0` (`clinicId`),
  ADD KEY `service_fk1` (`executedById`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialization_fk0` (`clinicId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_fk0` (`orderId`),
  ADD KEY `transaction_fk1` (`createdById`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_fk0` (`specializationId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ordermedicine`
--
ALTER TABLE `ordermedicine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderservice`
--
ALTER TABLE `orderservice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_fk0` FOREIGN KEY (`clinicId`) REFERENCES `clinic` (`id`),
  ADD CONSTRAINT `appointment_fk1` FOREIGN KEY (`patientId`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `appointment_fk2` FOREIGN KEY (`doctorId`) REFERENCES `user` (`id`);

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `insurance_fk0` FOREIGN KEY (`patientId`) REFERENCES `patient` (`id`);

--
-- Constraints for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  ADD CONSTRAINT `medicalRecord_fk0` FOREIGN KEY (`patientId`) REFERENCES `patient` (`id`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_fk0` FOREIGN KEY (`clinicId`) REFERENCES `clinic` (`id`),
  ADD CONSTRAINT `medicine_fk1` FOREIGN KEY (`unitId`) REFERENCES `unit` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_fk0` FOREIGN KEY (`patientId`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `order_fk1` FOREIGN KEY (`doctorId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `order_fk2` FOREIGN KEY (`clinicId`) REFERENCES `clinic` (`id`),
  ADD CONSTRAINT `order_fk3` FOREIGN KEY (`medicalRecordId`) REFERENCES `medicalrecord` (`id`);

--
-- Constraints for table `ordermedicine`
--
ALTER TABLE `ordermedicine`
  ADD CONSTRAINT `orderMedicine_fk0` FOREIGN KEY (`orderId`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `orderMedicine_fk1` FOREIGN KEY (`medicineId`) REFERENCES `medicine` (`id`);

--
-- Constraints for table `orderservice`
--
ALTER TABLE `orderservice`
  ADD CONSTRAINT `orderService_fk0` FOREIGN KEY (`orderId`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `orderService_fk1` FOREIGN KEY (`serviceId`) REFERENCES `service` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_fk0` FOREIGN KEY (`clinicId`) REFERENCES `clinic` (`id`),
  ADD CONSTRAINT `service_fk1` FOREIGN KEY (`executedById`) REFERENCES `user` (`id`);

--
-- Constraints for table `specialization`
--
ALTER TABLE `specialization`
  ADD CONSTRAINT `specialization_fk0` FOREIGN KEY (`clinicId`) REFERENCES `clinic` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_fk0` FOREIGN KEY (`orderId`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `transaction_fk1` FOREIGN KEY (`createdById`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_fk0` FOREIGN KEY (`specializationId`) REFERENCES `specialization` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
