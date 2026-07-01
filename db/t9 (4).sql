-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2026 at 02:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t9`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminregisteer`
--

CREATE TABLE `adminregisteer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminregisteer`
--

INSERT INTO `adminregisteer` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `college_type` varchar(100) NOT NULL,
  `college_name` varchar(100) NOT NULL,
  `college_photo` varchar(100) NOT NULL,
  `college_details` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college_type`, `college_name`, `college_photo`, `college_details`) VALUES
(1, 'Management', 'college', 'u2.jpg', 'demo1');

-- --------------------------------------------------------

--
-- Table structure for table `collegetype`
--

CREATE TABLE `collegetype` (
  `id` int(11) NOT NULL,
  `coursetype` varchar(200) NOT NULL,
  `collegetype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collegetype`
--

INSERT INTO `collegetype` (`id`, `coursetype`, `collegetype`) VALUES
(1, 'Management', 'BBA / BBM Colleges & Specializations'),
(2, 'Engineering', 'B.E / B.Tech Colleges'),
(3, 'Engineering', 'M.E / M.Tech Colleges'),
(5, 'Engineering', 'MCA Colleges'),
(6, 'Law', 'LLB Colleges'),
(7, 'Law', 'LLM Colleges'),
(8, 'Commerce', 'B.COM Colleges'),
(9, 'Commerce', 'M.COM Colleges'),
(10, 'Medical', 'MBBS Colleges'),
(11, 'Medical', 'MS Colleges'),
(12, 'Dental', 'BDS Colleges'),
(13, 'Dental', 'MDS Colleges');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `courses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`, `courses`) VALUES
(4, 'SUDHIR KANTA DAS', 'sudhirkantadasdas@gmail.com', '06370180517', 'demo', 'ff', ''),
(5, 'SUDHIR KANTA DAS', 'sudhirkantadasdas@gmail.com', '06370180517', 'demo', 'ss', ''),
(6, 'SUDHIR KANTA DAS', 'sudhirkantadasdas@gmail.com', '06370180517', 'demo', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', ''),
(7, 'SUDHIR KANTA DAS', 'sudhirkantadasdas@gmail.com', '06370180517', '', 'demo', 'Management'),
(8, 'SUDHIR KANTA DAS', 'sudhirkantadasdas@gmail.com', '06370180517', '', '1', '1'),
(9, 'SUDHIR KANTA DAS', 'sudhirkantadasdas@gmail.com', '06370180517', '', '09', 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `uploaded_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image`, `uploaded_at`) VALUES
(4, 'hero1', 'hero1.png', '2026-01-31 17:35:37'),
(5, 'hero3', 'course-details.jpg', '2026-01-31 17:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `subcourse`
--

CREATE TABLE `subcourse` (
  `id` int(11) NOT NULL,
  `collegetypeid` int(11) NOT NULL,
  `subcourse` varchar(300) NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcourse`
--

INSERT INTO `subcourse` (`id`, `collegetypeid`, `subcourse`, `details`, `image`) VALUES
(3, 1, 'BBA / BBM in Computer Science', 'Focuses on IT fundamentals, software systems, data analysis, and business technology.', '1770448065_Untitled.png'),
(4, 1, 'Hospital Management', 'Covers healthcare administration, hospital operations, and medical management systems.', '1770448135_Untitled.png'),
(5, 1, 'Design Management', 'Combines creativity with business strategy, branding, and product design leadership.', '1770447919_Untitled.png'),
(6, 2, 'Civil Engineering', 'Civil Engineering deals with planning, designing, constructing, and maintaining infrastructure such as buildings, roads, bridges, and water systems. It plays a vital role in urban development and offers stable career opportunities in both government and private sectors.', '1770448742_civil-engineer-ss2470319003.webp'),
(7, 3, 'Structural Engineering', 'Structural Engineering specializes in designing and analyzing structures such as buildings, bridges, and towers to ensure strength, stability, and safety under all loads and conditions.', '1770449233_structural_engineer.jpg'),
(10, 2, 'Mechanical Engineering', 'Mechanical Engineering focuses on the design, manufacturing, and maintenance of machines and mechanical systems. It combines principles of physics and materials science and offers wide career opportunities in industries like automotive, manufacturing, energy, and aerospace.', '1770448987_ME-111.jpg'),
(11, 3, 'Highway Technology', 'Highway Technology focuses on the planning, design, construction, and maintenance of roads and highways to ensure safe, efficient, and durable transportation systems.', '1770449368_download.jpg'),
(12, 5, 'Master of Computer Application (MCA)', 'Master of Computer Application (MCA) is a postgraduate program focused on software development, programming, and computer systems, preparing graduates for careers in IT, software engineering, and technology management.', '1770449585_MCA.png'),
(13, 6, 'Intellectual Property Law', 'Intellectual Property Law is a specialized law course that deals with the legal protection of inventions, trademarks, copyrights, and patents, helping safeguard creative and innovative work.', '1770449853_Intellectual-Property-Rights-in-India-1280x720-1.jpg'),
(14, 6, 'General Law', 'General Law covers the fundamental principles of legal systems, including civil, criminal, constitutional, and administrative law, providing a broad foundation for legal practice and public service.', '1770450024_General-Law-Course.jpg'),
(15, 7, 'Environmental Law', 'Environmental Law focuses on laws and regulations that protect the environment, control pollution, and promote sustainable use of natural resources.', '1770450207_images.jpg'),
(16, 7, 'Labor Law', 'Labor Law deals with the legal rights and duties of employers and employees, covering wages, working conditions, industrial relations, and workplace safety.', '1770450311_Capture-48.jpg'),
(17, 8, 'Office Management', 'Office Management deals with the efficient handling of daily administrative work in an organization. It involves organizing office activities, managing staff, records, communication, and resources to ensure smooth operations. Proper office management improves productivity, saves time, and supports overall business efficiency.', '1770453662_Office-management-2-2048.webp'),
(18, 8, 'Taxation', 'Taxation is the system through which the government collects money from individuals and businesses to fund public services and development. It includes different types of taxes such as income tax, corporate tax, and indirect taxes. Proper understanding of taxation helps ensure legal compliance and effective financial planning.', '1770453749_Taxation-img.jpg'),
(19, 9, 'Entrepreneurship', 'Entrepreneurship is the ability to identify business opportunities and turn ideas into successful ventures. It involves innovation, risk-taking, and effective management of resources to create value. Entrepreneurs contribute to economic growth by generating employment, introducing new ideas, and solving real-world problems. Through creativity and determination, entrepreneurship encourages self-reliance and long-term business growth.', '1770455146_1697114187603.jpg'),
(20, 9, 'International Business', 'International Business refers to trade and business activities conducted across national borders. It includes the exchange of goods, services, technology, and capital between different countries. By operating globally, businesses gain access to new markets, resources, and customers, while contributing to economic growth and international cooperation.', '1770455274_International-Business-Management.webp'),
(21, 10, 'General Medicine', 'General Medicine is a branch of medical science focused on the prevention, diagnosis, and treatment of a wide range of diseases in adults. It deals with common health problems, chronic illnesses, and overall patient care without surgical intervention, emphasizing accurate diagnosis and long-term management.', '1770456087_Services-Facilities.jpg'),
(22, 11, 'Human Anatomy', 'Human Anatomy is the study of the structure of the human body. It explains the organization of organs, tissues, and systems and how they are arranged to support normal body functions and overall health.', '1770456241_the-human-body-diagram.jpg'),
(23, 11, ' Ayurveda', 'Ayurveda is an ancient system of medicine that focuses on maintaining health through natural therapies, balanced diet, and lifestyle practices. It emphasizes harmony between the body, mind, and spirit to prevent disease and promote overall well-being.', '1770456318_TR-3.webp'),
(24, 12, 'General Dentistry', 'General Dentistry focuses on the prevention, diagnosis, and treatment of common oral health issues. It includes routine check-ups, cleaning, fillings, and basic dental care to maintain healthy teeth and gums.', '1770456463_images (1).jpg'),
(25, 13, 'Oral Radiology', '\r\n**Oral Radiology** is a dental specialty that uses imaging techniques such as X-rays to diagnose diseases of the teeth, jaws, and surrounding structures. It helps in accurate treatment planning and early detection of oral conditions.\r\n', '1770456587_oral-diagnosis-and-radiology-28257_b.webp'),
(26, 13, 'Endodontics', 'Endodontics is a branch of dentistry concerned with the diagnosis and treatment of dental pulp and root canal-related problems. It focuses on saving natural teeth by treating infections and injuries inside the tooth.', '1770456691_What-is-Endodontics-Understanding-the-Basics-scaled.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `university_name` varchar(100) NOT NULL,
  `university_photo` varchar(200) NOT NULL,
  `university_details` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `university_name`, `university_photo`, `university_details`) VALUES
(1, 'university2', 'u2.jpg', 'good university'),
(2, 'University', 'u1.webp', 'best university');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminregisteer`
--
ALTER TABLE `adminregisteer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collegetype`
--
ALTER TABLE `collegetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcourse`
--
ALTER TABLE `subcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminregisteer`
--
ALTER TABLE `adminregisteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collegetype`
--
ALTER TABLE `collegetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcourse`
--
ALTER TABLE `subcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
