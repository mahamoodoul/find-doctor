-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 02:43 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `find_a_doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `pass`) VALUES
(1, 'shakil', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paitent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paitent_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_id` int(11) NOT NULL,
  `slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `paitent_id`, `paitent_name`, `doc_id`, `slot`, `date`, `message`, `status`) VALUES
(158, 'Paitent-719872', 'shakil ahmed', 4, '02:00pm', '12-16-2020', 'aaaaaaaa', 1),
(159, 'Paitent-719872', 'shakil ahmed', 4, '02:00pm', '12-19-2020', 'qqq', 1),
(166, 'Paitent-719872', 'shakil ahmed', 7, '10:30am', '12-18-2020', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_category`
--

CREATE TABLE `doctor_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_category`
--

INSERT INTO `doctor_category` (`id`, `category`) VALUES
(1, 'Drug Rehabilitation Centers'),
(2, 'Eye Specialist'),
(3, 'Colorectal Surgery Specialist'),
(4, 'Dental Specialist'),
(5, 'Burn Specialist'),
(6, 'Child Pediatric Cardiology'),
(7, 'Diabetes Specialist'),
(8, 'Haematology Specialist'),
(9, 'Medicine Specialist'),
(10, 'Neuro Surgeons Specialist');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_education`
--

CREATE TABLE `doctor_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_education`
--

INSERT INTO `doctor_education` (`id`, `institution`, `subject`, `starting`, `ending`, `category`, `degree`, `grade`, `birth_date`, `image`, `phone2`, `doctor_id`, `doctor_status`) VALUES
(1, 'Dhaka Medical College', ' Human Anatomy', '20/10/2020', '30/09/2020', 'Drug Rehabilitation Centers', 'dhaka,bangladesh', 'A', '20/10/2020', 'http://127.0.0.1:8000/storage/MOXaVN2k5dH6Q0eE3hXBhX9jfAUxJ0hxwGgqaIjX.jpeg', '01773521823', 4, 1),
(2, '11', ' 11', '22/10/2020', '22/10/2020', 'Eye Specialist', '11', '11', '22/10/2020', 'http://127.0.0.1:8000/storage/0EXdWdBWfy66Ued7qF5vjgES7MKj342CvAu6zNOp.jpeg', '1111111111111', 5, 1),
(3, '33', '33', '22/10/2020', '22/10/2020', 'Neuro Surgeons Specialist', '33', '33', '22/10/2020', 'http://127.0.0.1:8000/storage/zwmcF8McMnwHuC0exSyBV9pPxM2BOeHZungLEv7o.jpeg', '22222222222', 6, 1),
(4, '55', ' 55', '22/10/2020', '22/10/2020', 'Eye Specialist', 'dhaka,bangladesh', '5', '22/10/2020', 'http://127.0.0.1:8000/storage/6bkPEAskdCwQZyKdNXyFCv5ufWEcVDM6OU1uP8XP.jpeg', '55555555555555', 7, 1),
(6, '33', ' 33', '22/10/2020', '22/10/2020', 'Neuro Surgeons Specialist', '33', '33', '22/10/2020', 'http://127.0.0.1:8000/storage/dIwMuSD2L3YtiACM5BdDRqURz77FvWXqg5kbb0ft.jpeg', '33333333', 8, 1),
(7, '66', ' 66', '22/10/2020', '22/10/2020', 'Dental Specialist', 'dhaka,bangladesh', '66', '22/10/2020', 'http://127.0.0.1:8000/storage/leoqiOc3RuQARIR3k17y7k6ISmtoRKM5KOoGRJWS.jpeg', '66', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_experience`
--

CREATE TABLE `doctor_experience` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_experience`
--

INSERT INTO `doctor_experience` (`id`, `company_name`, `location`, `job_position`, `period_start`, `period_end`, `doctor_id`) VALUES
(1, 'Delta Hospital', 'Dhaka,Bangladesh', 'Senior Doctor', '20/10/2020', '20/10/2020', 4),
(2, '11', '11', '11', '22/10/2020', '22/10/2020', 5),
(3, '33', '33', '33', '22/10/2020', '22/10/2020', 6),
(4, 'Square Hospital', 'Dhaka,Bangladesh', 'Senior Officer ', '22/10/2020', '22/10/2020', 7),
(6, '33', '33', '33', '22/10/2020', '22/10/2020', 8),
(7, '66', '66', '66', '22/10/2020', '22/10/2020', 9);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_register`
--

CREATE TABLE `doctor_register` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_register`
--

INSERT INTO `doctor_register` (`id`, `name`, `email`, `gender`, `phone`, `address`, `password`, `status`) VALUES
(4, 'shakil khan', 'mahamodul.shakil2152@gmail.com', 'male', '01732199802', 'dhaka,bangladesh', '1234', 1),
(5, 'mahamodul2152', 'm@yahoo.com', 'male', '01732199802', 'dhaka,bangladesh', '1234', 1),
(6, 'DR. miraz', 'shakil11@yahoo.com', 'male', '01732199802', 'dhaka,bangladesh', '1234', 1),
(7, 'Dr Simran Hossain', 'shakil@yahoo.com', 'male', '01732199802', 'dhaka,bangladesh', '1234', 1),
(8, 'aaaaaaaaaa', 'mahamodul.shakil11@gamil.com', 'female', '01732199802', 'dhaka,bangladesh', '1234', 1),
(9, 'Dr. Mira hossain', 'ab@gmail.com', 'male', '01732199802', 'dhaka,bangladesh', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_slot`
--

CREATE TABLE `doctor_slot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_slot`
--

INSERT INTO `doctor_slot` (`id`, `slot`, `doctor_id`, `date`, `status`) VALUES
(33, '[\"10:00am\",\"10:30am\",\"11:00am\",\"11:30am\",\"12:00pm\",\"12:30pm\",\"01:00pm\",\"01:30pm\",\"02:00pm\",\"02:30pm\",\"03:00pm\",\"08:00am\",\"08:30am\",\"09:00am\",\"09:30am\"]', 4, '2020-11-20', 0),
(34, '[\"10:00am\",\"10:30am\",\"11:00am\",\"11:30am\",\"12:00pm\",\"12:30pm\",\"01:00pm\",\"01:30pm\",\"02:00pm\",\"02:30pm\",\"03:00pm\",\"08:00am\",\"08:30am\",\"09:00am\",\"09:30am\"]', 5, '2020-11-20', 0),
(35, '[\"10:00am\",\"10:30am\",\"11:00am\",\"11:30am\",\"12:00pm\",\"12:30pm\",\"01:00pm\",\"01:30pm\",\"02:00pm\",\"02:30pm\",\"03:00pm\",\"08:00am\",\"08:30am\",\"09:00am\",\"09:30am\"]', 6, '2020-11-20', 0),
(36, '[\"10:00am\",\"10:30am\",\"11:00am\",\"11:30am\",\"12:00pm\",\"12:30pm\",\"01:00pm\",\"01:30pm\",\"02:00pm\",\"02:30pm\",\"03:00pm\",\"08:00am\",\"08:30am\",\"09:00am\",\"09:30am\"]', 7, '2020-11-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_10_19_103213_doctor_register', 1),
(4, '2020_10_19_191437_doctor-education', 1),
(5, '2020_10_19_191526_doctor-experience', 1),
(6, '2020_10_20_101313_doctor_category', 1),
(7, '2020_10_21_151707_paitent_register', 2),
(8, '2020_10_23_122710_doctor_slot', 3),
(9, '2020_10_25_145857_appointment', 4),
(12, '2020_10_25_213227_video_link', 5),
(13, '2020_11_05_120811_prescrition', 6),
(16, '2020_11_14_140613_pdf_data', 7),
(19, '2020_11_16_080936_doctor_ratting', 8),
(20, '2020_11_16_164241_rating_avg', 9),
(21, '2020_11_17_121140_admin', 10);

-- --------------------------------------------------------

--
-- Table structure for table `paitent_register`
--

CREATE TABLE `paitent_register` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paitent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paitent_register`
--

INSERT INTO `paitent_register` (`id`, `paitent_id`, `name`, `email`, `phone`, `gender`, `address`, `age`, `blood_group`, `password`, `status`) VALUES
(1, 'Paitent-719872', 'shakil ahmed', 'mahamodul.shakil2152@gmail.com', '01732199802', 'male', 'dhaka,bangladesh', 22, 'O+', '1234', 0),
(3, 'Paitent-697326', 'shakil ahmed', 'mahamodul.shakil@yahoo.com', '01732199802', 'male', 'dhaka,bangladesh', 22, 'O+', '1234', 0),
(4, 'Paitent-991620', 'shakil ahmed', 'mahamodul@yahoo.com', '01732199802', 'male', 'dhaka,bangladesh', 22, 'O+', '1234', 0),
(5, 'Paitent-269828', 'shakil ahmed', 'm@yahoo.com', '01732199802', 'male', 'dhaka,bangladesh', 22, 'A+', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pdf_data`
--

CREATE TABLE `pdf_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `paitent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `med_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `med_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdf_data`
--

INSERT INTO `pdf_data` (`id`, `app_id`, `doc_id`, `paitent_id`, `med_name`, `med_time`, `procedure`, `status`) VALUES
(3, 158, 4, 'Paitent-719872', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"1\";}', 1),
(4, 159, 6, 'Paitent-719872', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"1\";}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prescrition`
--

CREATE TABLE `prescrition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `paitent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prescriton_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `rating` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `app_id`, `doc_id`, `rating`) VALUES
(1, 158, 4, 1.00),
(4, 11, 5, 3.00),
(5, 11, 5, 3.00),
(6, 159, 6, 4.00);

-- --------------------------------------------------------

--
-- Table structure for table `rating_avg`
--

CREATE TABLE `rating_avg` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_id` int(11) NOT NULL,
  `avg` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_avg`
--

INSERT INTO `rating_avg` (`id`, `doc_id`, `avg`) VALUES
(9, 4, 1.00),
(10, 5, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_link`
--

CREATE TABLE `video_link` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `paitent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_link`
--

INSERT INTO `video_link` (`id`, `appointment_id`, `doc_id`, `paitent_id`, `link`, `status`) VALUES
(11, 158, 4, 'Paitent-719872', 'https://meet.google.com/nbt-tfda-fxz?pli=1', 0),
(12, 159, 6, 'Paitent-719872', 'https://meet.google.com/nbt-tfda-fxz?pli=1', 0),
(13, 161, 6, 'Paitent-719872', 'https://meet.google.com/nbt-tfda-fxz?pli=1', 0),
(14, 162, 4, 'Paitent-719872', 'https://meet.google.com/nbt-tfda-fxz?pli=11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_category`
--
ALTER TABLE `doctor_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_education`
--
ALTER TABLE `doctor_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_experience`
--
ALTER TABLE `doctor_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_register`
--
ALTER TABLE `doctor_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_register_email_unique` (`email`);

--
-- Indexes for table `doctor_slot`
--
ALTER TABLE `doctor_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paitent_register`
--
ALTER TABLE `paitent_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paitent_register_email_unique` (`email`);

--
-- Indexes for table `pdf_data`
--
ALTER TABLE `pdf_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescrition`
--
ALTER TABLE `prescrition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_avg`
--
ALTER TABLE `rating_avg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_link`
--
ALTER TABLE `video_link`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `doctor_category`
--
ALTER TABLE `doctor_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor_education`
--
ALTER TABLE `doctor_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor_experience`
--
ALTER TABLE `doctor_experience`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor_register`
--
ALTER TABLE `doctor_register`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctor_slot`
--
ALTER TABLE `doctor_slot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `paitent_register`
--
ALTER TABLE `paitent_register`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pdf_data`
--
ALTER TABLE `pdf_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescrition`
--
ALTER TABLE `prescrition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating_avg`
--
ALTER TABLE `rating_avg`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_link`
--
ALTER TABLE `video_link`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
