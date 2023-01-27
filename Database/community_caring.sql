-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 12:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `community_caring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`) VALUES
(1, 'admin@admin.com', 'Admin', '$2y$10$5nnZIiydwt3qt9X36v3XleFOVF4ilbDAvdTRbvG2MDbmQuQB/Pa2m');

-- --------------------------------------------------------

--
-- Table structure for table `area_shared`
--

CREATE TABLE `area_shared` (
  `id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state_province` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `county` varchar(200) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `distance` varchar(100) DEFAULT NULL,
  `measure` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `from` int(11) NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `time`, `from`, `message`) VALUES
(1, '2022-05-02 15:46:11', 13, 'asdasdsad'),
(2, '2022-05-02 15:46:19', 13, 'asdasd'),
(3, '2022-05-02 15:48:16', 13, 'sadsad'),
(4, '2022-05-02 15:48:23', 13, 'asdasdasfdg'),
(5, '2022-05-08 21:02:41', 16, 'Hi its me Fakhar'),
(6, '2022-05-10 17:28:52', 13, 'Hi, how are you?'),
(7, '2022-05-27 11:21:02', 17, ''),
(8, '2022-05-27 11:21:05', 17, ''),
(9, '2022-06-14 10:50:21', 17, ''),
(10, '2022-06-14 10:50:32', 17, 'hi'),
(11, '2022-06-21 14:41:25', 32, 'hi'),
(12, '2022-06-24 10:41:55', 42, ''),
(13, '2022-06-24 10:42:06', 42, 'hi'),
(14, '2022-06-24 10:42:11', 42, ''),
(15, '2022-06-24 10:45:27', 42, NULL),
(16, '2022-06-24 10:47:43', 42, ''),
(17, '2022-06-24 10:52:20', 42, ''),
(18, '2022-06-24 11:00:01', 42, 'hi'),
(19, '2022-06-24 11:07:38', 42, 'hello'),
(26, '2022-06-24 11:20:07', 42, 'gh'),
(27, '2022-07-01 10:04:52', 46, 'hi'),
(28, '2022-07-01 12:07:36', 45, 'hi'),
(32, '2022-07-05 22:23:25', 51, 'hello dear'),
(40, '2022-10-28 17:25:15', 56, 'hello'),
(41, '2022-12-19 16:32:05', 51, 'hello everyone');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `is_public` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `variable_description` text DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `type`, `name`, `subject`, `body`, `variable_description`, `date_added`) VALUES
(1, 'welcome', 'Welcome EMail', 'Welcome to offers and needs app. ', '<div style=\"background-color: #eeeeef; padding: 50px 0; \">    <div style=\"max-width:640px; margin:0 auto; \">  <div style=\"color: #fff; text-align: center; background-color:#078a72; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Welcome to NBCOC</h1> </div> <div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">            <span style=\"font-size:18px;\">Hello {{name}},<br>\r\nThank you for creating your account.<br>\r\nWe are happy to see you here.<br>\r\n<br>\r\nThe NBCOC Team</span>        </div>    </div></div>', '<b>{{name}}</b>: The variable contains the name of Person who is receiving the email<br/>', '2022-12-09 18:50:42'),
(2, 'contact', 'Contact Email', 'New contact', '<meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\"> <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\"> <style type=\"text/css\"> #message-container p {margin: 10px 0;} #message-container h1, #message-container h2, #message-container h3, #message-container h4, #message-container h5, #message-container h6 { padding:10px; margin:0; } #message-container table td {border-collapse: collapse;} #message-container table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; } #message-container a span{padding:10px 15px !important;} </style> <table id=\"message-container\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#eee; margin:0; padding:0; width:100% !important; line-height: 100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; font-family:Helvetica,Arial,sans-serif; color: #555;\"><tbody><tr><td valign=\"top\"><table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody> <tr> <td style=\"background-color:#078a72; padding:25px 15px 30px 15px; font-weight:bold; \" width=\"600\"><h2 style=\"color:#fff; text-align:center;\">{{contact_user_name}} sent you a message regarding your {{goal_name}}</h2></td> </tr> <tr> <td bgcolor=\"whitesmoke\" style=\"background: rgb(255, 255, 255); font-family: Helvetica, Arial, sans-serif; line-height: 25px;\" valign=\"top\" width=\"600\"> <span style=\"font-size:18px;\">Hi {{name}}!<br>\r\n<br>\r\n{{contact_user_name}} tried to contact you regarding the {{offer_or_need}} named {{goal_name}}. The message is:<br><br><div style=\"text-align: left;background-color: #d7d7d7;padding: 15px;border-left: 5px solid #008a73;padding-left: 10px;\">{{message_content}}</div><br>&nbsp;You can reply to them directly by replying to this email and get in contact.<br>\r\n<br>\r\nThanks!<br>\r\nNBCOC Team<br>\r\nNBCOC Team</span><br></td></tr> </tbody> </table> </td> </tr> </tbody> </table>', '<b>{{contact_user_name}}</b> The variable contains the name of person who has contacted the owner of an offer/ need.<br/>\n<b>{{goal_name}}</b> The variable contains the name/ title of Offer/ Need<br/>\n<b>{{name}}</b>: The variable contains the name of Person who is receiving the email<br/>\n<b>{{offer_or_need}}</b> The variable shows either its an offer or a need<br/>\n<b>{{message_content}}</b> The variable contains the message which a person writes in the message box while contacting the owner of an offer/ need<br/>', '2022-12-09 18:50:42'),
(3, 'forgot', 'Forgot Password', 'Request for password change', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"><div style=\"max-width:640px; margin:0 auto; \"><div style=\"color: #fff; text-align: center; background-color:#078a72; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Reset Password</h1>\r\n </div>\r\n <div style=\"padding: 20px; background-color: rgb(255, 255, 255); color:#555;\">                    <div> </div><span style=\"font-size:18px;\">Hello {{name}},<br>\r\n<br>\r\nA password reset request has been created for your account.&nbsp;<br>\r\nPlease enter the following code to reset your password:</span><div><br></div><h3 style=\"text-align: center;\">\r\n\r\n\r\n{{reset_code}}</h3><div style=\"text-align: center;\"><b></b></div>\r\n                    \r\n                    <div><span style=\"font-size: 14px; line-height: 20px;\"><br></span></div>\r\n<span style=\"font-size:18px;\">If you\'ve received this mail in error, it\'s likely that another user entered your email address by mistake while trying to reset a password.<br>\r\nIf you didn\'t initiate the request, you don\'t need to take any further action and can safely disregard this email.<br>\r\n<br>\r\nThe NBCOC Team</span>\r\n                </div>\r\n            </div>\r\n        </div>', '<b>{{name}}</b>: The variable contains the name of Person who is receiving the email<br/>\n<b>{{reset_code}}</b> The variable contains the reset code for password reset.<br/>', '2022-12-09 18:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(500) NOT NULL,
  `value` varchar(500) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `setting_name`, `value`, `date_modified`) VALUES
(1, 'app_name', 'Community through Caring', '2023-01-27 18:31:00'),
(2, 'meta_title', 'NBCOC Website', '2023-01-08 18:39:42'),
(3, 'default_from_email', '', '2023-01-27 18:31:14'),
(4, 'default_currency_name', 'US Dollars', '2023-01-08 18:40:58'),
(5, 'default_currency_symbol', '$', '2023-01-08 18:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) NOT NULL,
  `member_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `barter_details` varchar(500) DEFAULT NULL,
  `delivery_type` varchar(20) DEFAULT NULL,
  `deliery_location` varchar(100) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goal_contact`
--

CREATE TABLE `goal_contact` (
  `id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(500) NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `auth_code` varchar(10) DEFAULT NULL,
  `signup_date` datetime NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_contact`
--

CREATE TABLE `member_contact` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_goal`
--

CREATE TABLE `member_goal` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_period`
--

CREATE TABLE `time_period` (
  `id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `day` varchar(1000) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_shared`
--
ALTER TABLE `area_shared`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal_contact`
--
ALTER TABLE `goal_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_contact`
--
ALTER TABLE `member_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_goal`
--
ALTER TABLE `member_goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_period`
--
ALTER TABLE `time_period`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area_shared`
--
ALTER TABLE `area_shared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fav`
--
ALTER TABLE `fav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goal_contact`
--
ALTER TABLE `goal_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_contact`
--
ALTER TABLE `member_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_goal`
--
ALTER TABLE `member_goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_period`
--
ALTER TABLE `time_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
