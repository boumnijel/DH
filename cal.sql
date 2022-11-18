-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2021 at 02:02 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cal`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `all_day` tinyint(1) NOT NULL,
  `background_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `border_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calendar_user_id` int(11) NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creat_at` datetime NOT NULL,
  `user_patient` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EA9A146C519A852` (`calendar_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `start`, `end`, `description`, `all_day`, `background_color`, `border_color`, `text_color`, `calendar_user_id`, `state`, `creat_at`, `user_patient`) VALUES
(43, 'doctor@doctor.com', '2021-10-14 08:19:33', '2021-10-14 13:19:33', 'doctor@doctor.com', 0, '#ffcc00', '#ffeedd', '#000000', 4, 'free', '2021-10-12 11:19:33', 0),
(44, 'doctor@doctor.com', '2021-10-15 12:22:08', '2021-10-15 12:52:08', 'doctor@doctor.com', 0, '#ffcc00', '#ffeedd', '#000000', 4, 'free', '2021-10-15 12:22:08', 0),
(45, 'doctor@doctor.com', '2021-10-15 12:47:14', '2021-10-15 13:17:14', 'doctor@doctor.com', 0, '#ffcc00', '#ffeedd', '#000000', 4, 'Checked', '2021-10-15 12:47:14', 3),
(46, 'doctor@doctor.com', '2021-10-15 12:39:34', '2021-10-15 13:09:34', 'doctor@doctor.com', 0, '#ffcc00', '#ffeedd', '#000000', 4, 'Future Consultation', '2021-10-15 12:39:34', 3),
(47, 'doctor2@doctor.com', '2021-10-18 09:37:55', '2021-10-18 10:07:55', 'doctor2@doctor.com', 0, '#ffcc00', '#ffeedd', '#000000', 6, 'free', '2021-10-18 09:37:55', 0),
(48, 'doctor@doctor.com', '2021-10-18 12:50:00', '2021-10-18 13:20:00', 'patient@patient.com', 0, '#ffcc00', '#ffeedd', '#000000', 3, 'Checked', '2021-10-18 15:40:30', 3),
(49, 'doctor@doctor.com', '2021-10-21 10:04:42', '2021-10-21 10:34:42', 'doctor@doctor.com', 0, '#ffcc00', '#ffeedd', '#000000', 4, 'free', '2021-10-21 10:04:42', 0),
(50, 'doctor@doctor.com', '2021-10-29 10:41:12', '2021-10-29 11:11:12', 'doctor@doctor.com', 0, '#ffcc00', '#ffeedd', '#000000', 4, 'free', '2021-10-29 10:41:12', 0),
(51, 'doctor@doctor.com', '2021-10-30 10:43:43', '2021-10-30 11:13:43', 'doctor@doctor.com', 0, '#ffcc00', '#ffeedd', '#000000', 4, 'free', '2021-10-29 10:43:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210927103424', '2021-10-12 07:46:26', 22),
('DoctrineMigrations\\Version20211012073921', '2021-10-12 07:49:12', 104),
('DoctrineMigrations\\Version20211012123830', '2021-11-17 09:08:14', 725),
('DoctrineMigrations\\Version20211117091525', '2021-11-17 09:21:01', 48);

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

DROP TABLE IF EXISTS `sensor`;
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `name`, `value`, `datetime_at`) VALUES
(1, 'thermometer', '52', '2021-11-17 10:34:38'),
(2, 'spo2', '25', '2021-11-17 11:34:38'),
(3, 'Blood_Pressure', '132', '2021-11-16 11:34:38'),
(5, 'spo2', '13', '2021-11-17 15:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `sensorstate`
--

DROP TABLE IF EXISTS `sensorstate`;
CREATE TABLE IF NOT EXISTS `sensorstate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin@admin.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$b0VpWE52UkpBUlZBeGE5eg$ahbbjTi+f/Bco24b4aUYYFuHDYq36HVAhPr9KdP8tsI'),
(3, 'patient@patient.com', '[\"ROLE_PATIENT\"]', '$argon2id$v=19$m=65536,t=4,p=1$bEpBanBTMkg0RG9pRkFpSQ$+GRaJVBw9rbri/WOvUs40+d4JKpM1L5JE65G7XGvtj0'),
(4, 'doctor@doctor.com', '[\"ROLE_DOCTOR\"]', '$argon2id$v=19$m=65536,t=4,p=1$SGEwZWp6ZjVubjNTWTYxYg$Vv8LS245qrEkUPbCoNVLsYzPmzoT2Uv8+B4tJbg4+dw'),
(6, 'doctor2@doctor.com', '[\"ROLE_DOCTOR\"]', '$argon2id$v=19$m=65536,t=4,p=1$OWQ3N0FDandyRnNWbHl1Rg$8eUfso45sRkNysAFAkB5HJSCojufCG9Gd4k+gKWLuGE');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `FK_6EA9A146C519A852` FOREIGN KEY (`calendar_user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
