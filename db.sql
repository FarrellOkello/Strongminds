-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2023 at 12:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strongminds`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_information`
--

CREATE TABLE `patient_information` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `prefered_contact` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `age` int(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `conditions` varchar(100) NOT NULL,
  `allergies` varchar(200) NOT NULL,
  `pregnant` varchar(200) NOT NULL,
  `on_medications` varchar(100) NOT NULL,
  `explain_allergy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_information`
--

INSERT INTO `patient_information` (`id`, `first_name`, `last_name`, `date`, `email`, `phone`, `prefered_contact`, `dob`, `age`, `gender`, `conditions`, `allergies`, `pregnant`, `on_medications`, `explain_allergy`) VALUES
(5, 'conrad', 'Dyel ', '2023-01-22', 'conraddyel@gmail.com', 89697, 'Phone call,text message,prefered email', '1990-01-22', 33, 'Male', 'High Blood Pressure,Diabetes Type 1,Diabetes Type 2,Gout', 'no', 'No', 'High Blood Pressure,Diabetes Type 1,Diabetes Type 2,Gout ', ''),
(6, 'Opio ', 'Leo', '2023-01-22', 'conraddyel@gmail.com', 89697, 'Phone call,text message,prefered email', '1995-01-22', 28, 'Male', 'High Blood Pressure,Diabetes Type 1,Diabetes Type 2,Gout', 'yes', 'Yes', 'High Blood Pressure,Diabetes Type 1,Diabetes Type 2,Gout ', ''),
(8, 'Odyek', 'Emmanuel', '2023-01-22', 'shonacasia@gmai]com', 89697, 'Phone call,text message,prefered email', '1990-01-22', 33, 'Male', 'High Blood Pressure,Diabetes Type 1,Diabetes Type 2,Gout', 'yes', 'No', 'High Blood Pressure,Diabetes Type 1,Diabetes Type 2,Gout ', 'Allergic to apple berries '),
(9, 'Odyek', 'Emmanuel', '2023-01-22', 'shonacasia@gmai]com', 89697, 'Phone call,text message,prefered email', '1990-01-22', 33, 'Male', 'High Blood Pressure,Diabetes Type 1,Diabetes Type 2,Gout', 'yes', 'No', 'High Blood Pressure,Diabetes Type 1,Diabetes Type 2,Gout ', 'Allergic to apple berries '),
(10, 'Odyek', 'Emmanuel', '2023-01-22', 'shonacasia@gmai]com', 89697, 'Phone call,text message,prefered email', '1990-01-22', 33, 'Male', 'High Blood Pressure,Diabetes Type 1,Diabetes Type 2,Gout', 'yes', 'No', 'High Blood Pressure,Diabetes Type 1,Diabetes Type 2,Gout ', 'Allergic to apple berries ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_information`
--
ALTER TABLE `patient_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_information`
--
ALTER TABLE `patient_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;