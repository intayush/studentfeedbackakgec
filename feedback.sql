-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2017 at 11:43 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `department`) VALUES
(1, 'ayush', 'cse'),
(2, 'shivang', 'me'),
(3, 'null', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `practical_faculty_response`
--

CREATE TABLE `practical_faculty_response` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(20) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practical_faculty_response`
--

INSERT INTO `practical_faculty_response` (`id`, `student_id`, `faculty_id`, `subject`, `year`, `section`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES
(1, 1, 1, 'ncs551', 4, 'cs1', 4, 5, 5, 3, 3),
(2, 1, 2, 'ncs551', 4, 'cs1', 4, 5, 4, 2, 2),
(3, 1, 2, 'ncs552', 4, 'cs1', 4, 4, 3, 2, 2),
(4, 1, 1, 'ncs552', 4, 'cs1', 3, 3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `practical_questions`
--

CREATE TABLE `practical_questions` (
  `id` int(11) NOT NULL,
  `part` varchar(10) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practical_questions`
--

INSERT INTO `practical_questions` (`id`, `part`, `question`) VALUES
(1, 'a', 'Coverage of experiments specified in the list of experiments'),
(2, 'a', 'Preparation and conduction of experiments'),
(3, 'a', 'Solving queries of experiments'),
(4, 'a', 'Quality of experiments'),
(5, 'a', 'Uniformity to cover the experiments during the semester'),
(6, 'b', 'Availability of lab staff for technical problems in experiments'),
(7, 'b', 'Assistance in conduct of experiments'),
(8, 'b', 'Involvement in up keeping of experiments'),
(9, 'b', 'Assistance in solving query of experiments'),
(10, 'b', 'Rate the lab in terms of facilities');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `studentno` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `rollno`, `studentno`, `name`, `year`, `section`, `semester`, `tid`, `pid`) VALUES
(1, '1402710046', '1410134', 'aysuh', 4, 'cs1', 7, 1, 1),
(2, '33434', '44', 'hfghjfg', 2, 'cd3', 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_practical`
--

CREATE TABLE `student_practical` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `f11` int(16) NOT NULL,
  `f12` int(11) NOT NULL,
  `l1` varchar(11) NOT NULL,
  `f21` int(12) NOT NULL,
  `f22` int(11) NOT NULL,
  `l2` varchar(11) NOT NULL,
  `f31` int(16) NOT NULL,
  `f32` int(11) NOT NULL,
  `l3` varchar(11) NOT NULL,
  `f41` int(12) NOT NULL,
  `f42` int(11) NOT NULL,
  `l4` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_practical`
--

INSERT INTO `student_practical` (`id`, `student_id`, `f11`, `f12`, `l1`, `f21`, `f22`, `l2`, `f31`, `f32`, `l3`, `f41`, `f42`, `l4`) VALUES
(1, 1, 1, 2, 'ncs551', 2, 1, 'ncs552', 3, 3, '', 3, 3, ''),
(2, 2, 1, 2, '', 3, 3, '', 3, 3, '', 3, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_theory`
--

CREATE TABLE `student_theory` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `t1` varchar(10) NOT NULL,
  `f1` int(11) NOT NULL,
  `t2` varchar(10) NOT NULL,
  `f2` int(11) NOT NULL,
  `t3` varchar(11) NOT NULL,
  `f3` int(11) NOT NULL,
  `t4` varchar(11) NOT NULL,
  `f4` int(11) NOT NULL,
  `t5` varchar(11) NOT NULL,
  `f5` int(11) NOT NULL,
  `t6` varchar(11) NOT NULL,
  `f6` int(11) NOT NULL,
  `t7` varchar(11) NOT NULL,
  `f7` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_theory`
--

INSERT INTO `student_theory` (`id`, `student_id`, `t1`, `f1`, `t2`, `f2`, `t3`, `f3`, `t4`, `f4`, `t5`, `f5`, `t6`, `f6`, `t7`, `f7`) VALUES
(1, 1, 'ncs502', 1, 'ncs501', 2, 'ncs503', 2, '', 3, '', 3, '', 3, '', 3),
(2, 2, 'ncs303', 1, 'ncs409', 2, '', 3, '', 3, '', 3, '', 3, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `theory_questions`
--

CREATE TABLE `theory_questions` (
  `id` int(11) NOT NULL,
  `part` varchar(5) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theory_questions`
--

INSERT INTO `theory_questions` (`id`, `part`, `question`) VALUES
(1, 'a', 'Coverage of the subject material specified in the syllabus.'),
(2, 'a', 'Preparation and organization of lectire.'),
(3, 'a', 'Presentation and Communication Skills.'),
(4, 'a', 'Quality of tutorial assignments'),
(5, 'a', 'Uniformity of pace in teaching during the semester.'),
(6, 'b', 'Were two class tests conducted.'),
(7, 'b', 'Were the illustrations and writings legible'),
(8, 'b', 'Was the voice clear and audible.'),
(9, 'b', 'Was the faculty accessible for clarification of doubts.'),
(10, 'b', 'Were the corrected answer sheets of class tests/sessional tests shown and discussed.');

-- --------------------------------------------------------

--
-- Table structure for table `theory_response`
--

CREATE TABLE `theory_response` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(20) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theory_response`
--

INSERT INTO `theory_response` (`id`, `student_id`, `faculty_id`, `subject`, `year`, `section`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`) VALUES
(1, 1, 1, 'ncs502', 4, 'cs1', 1, 2, 3, 4, 5, 1, 0, 1, 1, 1),
(2, 1, 2, 'ncs503', 4, 'cs1', 1, 2, 3, 4, 5, 1, 0, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practical_faculty_response`
--
ALTER TABLE `practical_faculty_response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `practical_questions`
--
ALTER TABLE `practical_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid` (`tid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `student_practical`
--
ALTER TABLE `student_practical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f11` (`f11`),
  ADD KEY `f12` (`f12`),
  ADD KEY `f21` (`f21`),
  ADD KEY `f22` (`f22`),
  ADD KEY `f31` (`f31`),
  ADD KEY `f32` (`f32`),
  ADD KEY `f41` (`f41`),
  ADD KEY `f42` (`f42`);

--
-- Indexes for table `student_theory`
--
ALTER TABLE `student_theory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f1` (`f1`),
  ADD KEY `f2` (`f2`),
  ADD KEY `f3` (`f3`),
  ADD KEY `f4` (`f4`),
  ADD KEY `f5` (`f5`),
  ADD KEY `f6` (`f6`),
  ADD KEY `f7` (`f7`);

--
-- Indexes for table `theory_questions`
--
ALTER TABLE `theory_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theory_response`
--
ALTER TABLE `theory_response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `practical_faculty_response`
--
ALTER TABLE `practical_faculty_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `practical_questions`
--
ALTER TABLE `practical_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `theory_questions`
--
ALTER TABLE `theory_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `theory_response`
--
ALTER TABLE `theory_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `practical_faculty_response`
--
ALTER TABLE `practical_faculty_response`
  ADD CONSTRAINT `fk_faculty_lab_response` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_faculty_lab_response` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `student_theory` (`id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `student_practical` (`id`);

--
-- Constraints for table `student_practical`
--
ALTER TABLE `student_practical`
  ADD CONSTRAINT `student_practical_ibfk_1` FOREIGN KEY (`f11`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_practical_ibfk_2` FOREIGN KEY (`f12`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_practical_ibfk_3` FOREIGN KEY (`f21`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_practical_ibfk_4` FOREIGN KEY (`f22`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_practical_ibfk_5` FOREIGN KEY (`f31`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_practical_ibfk_6` FOREIGN KEY (`f32`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_practical_ibfk_7` FOREIGN KEY (`f41`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_practical_ibfk_8` FOREIGN KEY (`f42`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `student_theory`
--
ALTER TABLE `student_theory`
  ADD CONSTRAINT `student_theory_ibfk_1` FOREIGN KEY (`f1`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_theory_ibfk_2` FOREIGN KEY (`f2`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_theory_ibfk_3` FOREIGN KEY (`f3`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_theory_ibfk_4` FOREIGN KEY (`f4`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_theory_ibfk_5` FOREIGN KEY (`f5`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_theory_ibfk_6` FOREIGN KEY (`f6`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_theory_ibfk_7` FOREIGN KEY (`f7`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `theory_response`
--
ALTER TABLE `theory_response`
  ADD CONSTRAINT `fk_faculty_response` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_response` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
