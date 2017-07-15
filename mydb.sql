-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2017 at 05:32 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentID` varchar(11) NOT NULL,
  `cost` varchar(10) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `roomNumber` int(11) NOT NULL,
  `visitDate` varchar(20) DEFAULT NULL,
  `visitTime` varchar(20) DEFAULT NULL,
  `visitType` varchar(20) NOT NULL,
  `employeeID` varchar(11) DEFAULT NULL,
  `patientID` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `cost`, `description`, `duration`, `roomNumber`, `visitDate`, `visitTime`, `visitType`, `employeeID`, `patientID`) VALUES
('A1234', '$12.50', 'this is an appointment', '30minutes', 4, '12/11/2012', '12:30', 'doctor', 'E1234', 'P1234');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `address` varchar(30) NOT NULL,
  `clinicID` varchar(10) NOT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`address`, `clinicID`, `phoneNumber`, `name`) VALUES
('76354 donovan dr', 'CL1209', '1-813-975-3342', 'wellness clinic');

-- --------------------------------------------------------

--
-- Table structure for table `druginfo`
--

CREATE TABLE `druginfo` (
  `cost` varchar(10) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `drugID` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `warning` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `druginfo`
--

INSERT INTO `druginfo` (`cost`, `description`, `drugID`, `name`, `warning`) VALUES
('$20.00', 'Abilify is used to treat the symptoms of psychotic conditions such as schizophrenia and bipolar I disorder (manic depression.', 'DI3244', 'abilify', 'Common Abilify side effects may include:\r\nweight gain;\r\nblurred vision;\r\nnausea, vomiting, changes in appetite, se, sneezing, sore throat.');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `address` varchar(25) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `job` varchar(20) NOT NULL,
  `taxID` int(11) DEFAULT NULL,
  `employeeID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`address`, `name`, `phoneNumber`, `job`, `taxID`, `employeeID`) VALUES
('67543 willow dr', 'bob thorton', '1-313-234-6543', 'doctor', 784563920, 'E1234'),
('546372 weatherstone dr', 'cathy', '1-654-734-76354', 'nurse', 78654328, 'E1235');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `amountOwed` varchar(11) NOT NULL,
  `amountPaid` varchar(11) NOT NULL,
  `datePaid` varchar(11) NOT NULL,
  `dateIssued` varchar(11) NOT NULL,
  `feeID` varchar(11) NOT NULL,
  `patientID` varchar(11) NOT NULL,
  `totalBalance` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`amountOwed`, `amountPaid`, `datePaid`, `dateIssued`, `feeID`, `patientID`, `totalBalance`) VALUES
('$25.00', '$50.00', '12/21/2001', '12/21/2001', 'F1234', 'P1234', '$25.00');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `company` varchar(20) NOT NULL,
  `insuranceID` varchar(11) NOT NULL,
  `drugID` varchar(11) NOT NULL,
  `policyType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`company`, `insuranceID`, `drugID`, `policyType`) VALUES
('total health', 'I1234', 'DI3244', 'medical');

-- --------------------------------------------------------

--
-- Table structure for table `labtest`
--

CREATE TABLE `labtest` (
  `cost` varchar(11) NOT NULL,
  `employeeID` varchar(11) NOT NULL,
  `patientID` varchar(11) NOT NULL,
  `result` varchar(10) NOT NULL,
  `testDate` varchar(11) NOT NULL,
  `testID` varchar(11) NOT NULL,
  `testTime` varchar(11) NOT NULL,
  `testType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labtest`
--

INSERT INTO `labtest` (`cost`, `employeeID`, `patientID`, `result`, `testDate`, `testID`, `testTime`, `testType`) VALUES
('$12.50', 'E1234', 'P1234', 'positive', '05/24/2000', 'T1234', '12:30pm', 'bipolar');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `dateFilled` varchar(11) NOT NULL,
  `directions` varchar(100) NOT NULL,
  `drugName` varchar(20) NOT NULL,
  `employeeID` varchar(11) NOT NULL,
  `form` varchar(10) NOT NULL,
  `medicationID` varchar(11) NOT NULL,
  `numberOfRefills` int(11) NOT NULL,
  `originalDate` varchar(11) NOT NULL,
  `patientID` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `strength` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`dateFilled`, `directions`, `drugName`, `employeeID`, `form`, `medicationID`, `numberOfRefills`, `originalDate`, `patientID`, `quantity`, `strength`) VALUES
('05/24/2000', 'take one pill everyday in the morning', 'Abilify', 'E1234', 'tablet', 'M1234', 4, '05/24/2000', 'P1234', 30, '10mg');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `address` varchar(25) NOT NULL,
  `dateOfBirth` varchar(10) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `patientID` varchar(11) NOT NULL,
  `sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`address`, `dateOfBirth`, `name`, `phoneNumber`, `patientID`, `sex`) VALUES
('45362 willow dr', '09/12/2001', 'jake glowright', '1-745-987-3245', 'P1234', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE `procedures` (
  `codes` varchar(10) DEFAULT NULL,
  `fees` varchar(10) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `procedureID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`codes`, `fees`, `name`, `procedureID`) VALUES
('C151', '$120.00', 'biopsy', 'PR1234');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `date` varchar(11) NOT NULL,
  `emergencyTime` varchar(11) NOT NULL,
  `scheduleID` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL,
  `employeeID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`date`, `emergencyTime`, `scheduleID`, `time`, `employeeID`) VALUES
('05/24/200', '12:30pm-6pm', 'S1234', '6pm-1am', 'E1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `employeeID` (`employeeID`,`patientID`),
  ADD KEY `patient_appointments_fk` (`patientID`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinicID`);

--
-- Indexes for table `druginfo`
--
ALTER TABLE `druginfo`
  ADD PRIMARY KEY (`drugID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`feeID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insuranceID`),
  ADD KEY `drugID` (`drugID`);

--
-- Indexes for table `labtest`
--
ALTER TABLE `labtest`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`medicationID`),
  ADD KEY `employeeID` (`employeeID`,`patientID`),
  ADD KEY `patient_medication_fk` (`patientID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`procedureID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `employee_appointments_fk` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`),
  ADD CONSTRAINT `patient_appointments_fk` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `patient_fees_fk` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`);

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `drug_insurance_fk` FOREIGN KEY (`drugID`) REFERENCES `druginfo` (`drugID`);

--
-- Constraints for table `labtest`
--
ALTER TABLE `labtest`
  ADD CONSTRAINT `patient_test_fk` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`);

--
-- Constraints for table `medication`
--
ALTER TABLE `medication`
  ADD CONSTRAINT `employee_medication_fk` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`),
  ADD CONSTRAINT `patient_medication_fk` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `employee_schedule_fk` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
