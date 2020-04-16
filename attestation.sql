-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 05:30 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attestation`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ID` text NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ID`, `Name`, `Email`, `Phone`, `Password`) VALUES
('1', 'Kempesh', 'kempesh@gmail.com', 1234567890, 'kempesh@123'),
('2', 'Rashmi', 'rashmi@gmail.com', 9875643251, 'rashmi@123'),
('3', 'Priya', 'priya@gmail.com', 9449760572, 'priya@123');

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `Username` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`Username`, `Password`) VALUES
('2KL16CS035', 'manali'),
('2KL16CS039', 'komal'),
('2KL16CS077', 'samprada'),
('2KL16CS078', 'sandhya'),
('2KL16CS113', 'vidya');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DeptId` varchar(2) NOT NULL,
  `DeptName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DeptId`, `DeptName`) VALUES
('', ''),
('1', 'COMPUTER SCIENCE'),
('2', 'ELECTRONICS AND COMMUNICATION'),
('3', 'ELECTRICAL AND ELECTRONICS'),
('4', 'MECHANICAL'),
('5', 'CHEMICAL'),
('6', 'CIVIL'),
('7', 'BIO MEDICAL');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `USN` varchar(10) NOT NULL,
  `Semester` int(1) NOT NULL,
  `SubjectCode` varchar(10) NOT NULL,
  `InternalMarks` int(2) NOT NULL,
  `ExternalMarks` int(2) NOT NULL,
  `TotalMarks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`USN`, `Semester`, `SubjectCode`, `InternalMarks`, `ExternalMarks`, `TotalMarks`) VALUES
('2KL16CS077', 2, '15CED24', 19, 63, 82),
('2KL16CS077', 2, '15CHE22', 20, 62, 82),
('2KL16CS077', 2, '15CHEL27', 20, 78, 98),
('2KL16CS077', 1, '15CIV13', 20, 54, 74),
('2KL16CS077', 2, '15CIV28', 10, 35, 45),
('2KL16CS077', 1, '15CPH18', 10, 40, 50),
('2KL16CS077', 2, '15CPL26', 20, 76, 96),
('2KL16CS077', 3, '15CS32', 19, 38, 57),
('2KL16CS077', 3, '15CS33', 20, 52, 72),
('2KL16CS077', 3, '15CS34', 18, 52, 70),
('2KL16CS077', 3, '15CS35', 20, 64, 84),
('2KL16CS077', 3, '15CS36', 20, 42, 62),
('2KL16CS077', 4, '15CS42', 19, 40, 59),
('2KL16CS077', 4, '15CS43', 20, 60, 80),
('2KL16CS077', 4, '15CS44', 20, 66, 86),
('2KL16CS077', 4, '15CS45', 20, 35, 55),
('2KL16CS077', 4, '15CS46', 20, 54, 74),
('2KL16CS077', 5, '15CS51', 18, 45, 63),
('2KL16CS077', 5, '15CS52', 19, 67, 87),
('2KL16CS077', 5, '15CS53', 18, 53, 71),
('2KL16CS077', 5, '15CS54', 20, 62, 82),
('2KL16CS077', 5, '15CS553', 20, 47, 67),
('2KL16CS077', 5, '15CS562', 19, 65, 84),
('2KL16CS077', 6, '15CS61', 19, 44, 63),
('2KL16CS077', 6, '15CS62', 19, 65, 84),
('2KL16CS077', 6, '15CS63', 20, 66, 86),
('2KL16CS077', 6, '15CS64', 20, 65, 85),
('2KL16CS077', 6, '15CS653', 20, 59, 79),
('2KL16CS077', 6, '15CS661', 20, 63, 83),
('2KL16CS077', 3, '15CSL37', 20, 74, 94),
('2KL16CS077', 3, '15CSL38', 20, 79, 99),
('2KL16CS077', 4, '15CSL47', 20, 77, 97),
('2KL16CS077', 4, '15CSL48', 20, 77, 97),
('2KL16CS077', 5, '15CSL57', 20, 79, 99),
('2KL16CS077', 5, '15CSL58', 20, 75, 95),
('2KL16CS077', 6, '15CSL67', 20, 79, 99),
('2KL16CS077', 6, '15CSL68', 20, 79, 99),
('2KL16CS077', 1, '15ELE15', 19, 70, 89),
('2KL16CS077', 2, '15ELN25', 20, 65, 85),
('2KL16CS077', 1, '15EME14', 20, 43, 63),
('2KL16CS077', 1, '15MAT11', 20, 65, 85),
('2KL16CS077', 2, '15MAT21', 20, 78, 98),
('2KL16CS077', 3, '15MAT31', 19, 64, 83),
('2KL16CS077', 4, '15MAT41', 20, 65, 85),
('2KL16CS077', 2, '15PCD23', 20, 44, 64),
('2KL16CS077', 1, '15PHY12', 20, 61, 81),
('2KL16CS077', 1, '15PHYL17', 19, 80, 99),
('2KL16CS077', 1, '15WSL16', 18, 79, 97),
('2KL16CS113', 1, '15CIV13', 19, 69, 88),
('2KL16CS113', 1, '15CPH18', 10, 40, 50),
('2KL16CS113', 1, '15ELE15', 20, 77, 97),
('2KL16CS113', 1, '15EME14', 18, 68, 86),
('2KL16CS113', 1, '15MAT11', 20, 69, 89),
('2KL16CS113', 1, '15PHY12', 20, 75, 95),
('2KL16CS113', 1, '15PHYL17', 20, 78, 98),
('2KL16CS113', 1, '15WSL16', 20, 79, 99);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `USN` varchar(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `DeptId` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `Name`, `Email`, `Phone`, `DeptId`) VALUES
('', '', '', 0, ''),
('2KL16CS035', 'Manali H', 'manali@gmail.com', 8073698465, '1'),
('2KL16CS039', 'Komal Kekare', 'kekarekomal@gmail.com', 8147742950, '1'),
('2KL16CS077', 'Samprada R', 'sampradarmsh@gmail.com', 9483976703, '1'),
('2KL16CS078', 'Sandhya Nandaragi', 'sandhyanandaragi@gmail.com', 1245637890, '1'),
('2KL16CS113', 'Vidya Narayan Kavadi', 'rosevk0408@gmail.com', 9945835221, '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectCode` varchar(10) NOT NULL,
  `SubjectName` varchar(50) NOT NULL,
  `Credits` int(1) NOT NULL,
  `Semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectCode`, `SubjectName`, `Credits`, `Semester`) VALUES
('15CED24', 'Computer Aided Engineering Drawing', 4, 2),
('15CHE22', 'Engineering Chemistry', 4, 2),
('15CHEL27', 'Engineering Chemistry Lab', 2, 2),
('15CIV13', 'Elements of Civil Engg. and Mechanics', 4, 1),
('15CIV28', 'Environmental Studies', 0, 2),
('15CPH18', 'Constitution of India,Professional Ethics and Huma', 0, 1),
('15CPL26', 'Computer Programming Lab', 2, 2),
('15CS32', 'Analog and Digital Electronics', 4, 3),
('15CS33', 'Data Structures and Application', 4, 3),
('15CS34', 'Computer Organisation', 4, 3),
('15CS35', 'Unix and Shell Programming', 4, 3),
('15CS36', 'Discrete Mathematical Structures', 4, 3),
('15CS42', 'Software Engineering', 4, 4),
('15CS43', 'Design and Analysis of Algorithms', 4, 4),
('15CS44', 'Microprocessors and Microcontrollers', 4, 4),
('15CS45', 'Object Oriented Concepts', 4, 4),
('15CS46', 'Data Communication', 4, 4),
('15CS51', 'Management and Enterpreneurship for IT Industry', 4, 5),
('15CS52', 'Computer Networks', 4, 5),
('15CS53', 'Database Management System', 4, 5),
('15CS54', 'Automata Theory and Computability', 4, 5),
('15CS551', 'Object Oriented Modelling and Design', 3, 5),
('15CS552', 'Introduction to Software Testing', 3, 5),
('15CS553', 'Advanced Java and J2EE', 3, 5),
('15CS554', 'Advanced Algorithms', 3, 5),
('15CS561', 'Programming in Java', 3, 5),
('15CS562', 'Artificial Intelligence', 3, 5),
('15CS563', 'Embedded Computing Systems', 3, 5),
('15CS564', 'Dot Net Framework for Application Development', 3, 5),
('15CS565', 'Cloud Computing', 3, 5),
('15CS61', 'Cryptography,Network Security and Cyber Law', 4, 6),
('15CS62', 'Computer Graphics and Visualization', 4, 6),
('15CS63', 'System Software and Compiler Design', 4, 6),
('15CS64', 'Operating Systems', 4, 6),
('15CS651', 'Data Mining and Data Warehousing', 3, 6),
('15CS652', 'Software Architecture and Design Patterns', 3, 6),
('15CS653', 'Operations Research', 3, 6),
('15CS654', 'Distributed Computing Systems', 3, 6),
('15CS661', 'Mobile Application Development', 3, 6),
('15CS662', 'Big Data Analytics', 3, 6),
('15CS663', 'Wireless Networks and Mobile Computing', 3, 6),
('15CS664', 'Python Application Programming', 3, 6),
('15CS665', 'Service Oriented Architecture', 3, 6),
('15CS666', 'Multicore Architecture and Programming', 3, 6),
('15CS71', 'Web Technology and its Application', 4, 7),
('15CS72', 'Advanced Computer Architectures', 4, 7),
('15CS73', 'Machine Learning', 4, 7),
('15CS741', 'Natural Language Processing', 3, 7),
('15CS742', 'Cloud Computing and its Applications', 3, 7),
('15CS743', 'Information and Network Security', 3, 7),
('15CS744', 'Unix System Programming', 3, 7),
('15CS751', 'Soft and Evolutionary Computing', 3, 7),
('15CS752', 'Computer Vision and Robotics', 3, 7),
('15CS753', 'Digital Image Processing', 3, 7),
('15CS754', 'Storage Area Networks', 3, 7),
('15CSL37', 'Analog and Digital Electronics Lab', 2, 3),
('15CSL38', 'Data Structures Laboratory', 2, 3),
('15CSL47', 'Design and Analysis of Algorithms Laboratory', 2, 4),
('15CSL48', 'Microprocessors Laboratory', 2, 4),
('15CSL57', 'Computer Netword Laboratory', 2, 5),
('15CSL58', 'DBMS Laboratory with Mini Project', 2, 5),
('15CSL67', 'System Software and Operating System Laboratory ', 2, 6),
('15CSL68', 'Computer Graphics Laboratory with Mini Project', 2, 6),
('15CSL76', 'Machine Learning Laboratory', 2, 7),
('15CSL77', 'Web Technology Laboratory with Mini Project', 2, 7),
('15ELE15', 'Basic Electrical Engineering', 4, 1),
('15ELN25', 'Basic Electronics', 4, 2),
('15EME14', 'Elements of Mechanical Engineering', 4, 1),
('15MAT11', 'Engineering Maths-1', 4, 1),
('15MAT21', 'Engineering Maths-2', 4, 2),
('15MAT31', 'Engineering Maths-3', 4, 3),
('15MAT41', 'Engineering Mathematics-4', 4, 4),
('15PCD23', 'Programming in C and Data Structures', 4, 2),
('15PHY12', 'Engineering Physics', 4, 1),
('15PHYL17', 'Engg. Physics Lab', 2, 1),
('15WSL16', 'Workshop Practical', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID`(10));

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DeptId`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`USN`,`SubjectCode`),
  ADD KEY `SubjectCode` (`SubjectCode`),
  ADD KEY `USN` (`USN`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`USN`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `DeptId` (`DeptId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authentication`
--
ALTER TABLE `authentication`
  ADD CONSTRAINT `authentication_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `student` (`USN`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`SubjectCode`) REFERENCES `subject` (`SubjectCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
