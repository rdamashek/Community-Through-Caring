-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2024 at 05:51 PM
-- Server version: 10.5.21-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbcoc_Hqle`
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
(1, 'admin@nbcoc.ca', 'Admin', '$2y$10$cGGH7xFKepORLZmgh3LPkuEPA/mgbxFeiy2KqAgMZglbt1ZvIg50m'),
(2, 'nbcoc.admin@gmail.com', 'Jennifer', '$2y$10$OgvMe2V/pXfARQsQCApZM.8toZwttIBvNQx0vKOYdyNXflIWTBSCW');

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
(1, '2022-07-06 00:18:23', 1, 'Test from fakhar'),
(2, '2022-07-06 07:34:28', 2, 'Hello'),
(3, '2022-07-22 07:51:04', 4, 'test'),
(5, '2022-09-27 07:42:50', 10, 'Hello Beta Community'),
(6, '2022-10-18 07:29:17', 12, 'Hello folks. This seems a little sparse.'),
(7, '2022-10-18 07:29:49', 12, 'How do you efen know who a message is from? What about any threads or ways to follow up answers?'),
(8, '2022-10-18 07:56:56', 13, 'Hi all! Awesome job for settimg this up!'),
(9, '2022-10-20 14:36:42', 16, 'Hi there everyone!'),
(10, '2022-10-20 14:37:07', 16, 'Testing this out here in Utah, USA'),
(11, '2022-10-22 13:19:43', 11, 'Hello! We will be adding an about page to this app soon, but for now I would like to clarify what this app is designed to do. This app is an Open Source Web Mobile App for supporting ongoing live meetings (either in-person or online) in small communities where offers and needs are shared and matched. This app is not meant to be a stand-alone app for sharing offers and needs. It is meant to be used by communities who are meeting and exchanging offers and needs. It is simply a place to store the offers and needs that are shared.'),
(12, '2022-10-22 13:20:20', 11, 'To find the github repository, go here: https://github.com/rdamashek/Community-Through-Caring'),
(13, '2022-10-22 13:20:40', 11, 'To contact us, email jenniferdamashek@protonmail.com');

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
(1, 'welcome', 'Welcome EMail', 'Welcome to offers and needs app. ', '<div style=\"background-color: #eeeeef; padding: 50px 0; \">    <div style=\"max-width:640px; margin:0 auto; \">  <div style=\"color: #fff; text-align: center; background-color:#078a72; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Welcome to NBCOC</h1> </div> <div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">            <span style=\"font-size:18px;\">Hello {{name}},<br>\r\nThank you for creating your account. Your signup request is on hold, pending community review. Please use the email on the About Us page with any questions.</span></div><div style=\"padding: 20px; background-color: rgb(255, 255, 255);\"><span style=\"font-size:18px;\">Thank you for your patience. We are happy to see you here.<br>\r\n<br></span><a href=\"https://%7B%7Bcommunity_url%7D%7D/\" target=\"_blank\" style=\"color: rgb(85, 85, 85); font-size: 18px;\"><u>{{community_name}}</u></a><span style=\"font-size:18px;\"><br></span></div>    </div></div>', '<b>{{name}}</b>: The variable contains the name of Person who is receiving the email<br/>', '2022-12-09 18:50:42'),
(2, 'contact', 'Contact Email', 'New contact', '<meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\"> <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\"> <style type=\"text/css\"> #message-container p {margin: 10px 0;} #message-container h1, #message-container h2, #message-container h3, #message-container h4, #message-container h5, #message-container h6 { padding:10px; margin:0; } #message-container table td {border-collapse: collapse;} #message-container table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; } #message-container a span{padding:10px 15px !important;} </style> <table id=\"message-container\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#eee; margin:0; padding:0; width:100% !important; line-height: 100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; font-family:Helvetica,Arial,sans-serif; color: #555;\"><tbody><tr><td valign=\"top\"><table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody> <tr> <td style=\"background-color:#078a72; padding:25px 15px 30px 15px; font-weight:bold; \" width=\"600\"><h2 style=\"color:#fff; text-align:center;\">{{contact_user_name}} sent you a message regarding your {{goal_name}}</h2></td> </tr> <tr> <td bgcolor=\"whitesmoke\" style=\"background: rgb(255, 255, 255); font-family: Helvetica, Arial, sans-serif; line-height: 25px;\" valign=\"top\" width=\"600\"> <span style=\"font-size:18px;\">Hi {{name}}!<br>\r\n<br>\r\n{{contact_user_name}} tried to contact you regarding the {{offer_or_need}} named {{goal_name}}. The message is:<br><br><div style=\"text-align: left;background-color: #d7d7d7;padding: 15px;border-left: 5px solid #008a73;padding-left: 10px;\">{{message_content}}</div><br>&nbsp;You can reply to them directly by replying to this email and get in contact.<br>\r\n<br>\r\nThanks!<br></span><a href=\"https://%7B%7Bcommunity_url%7D%7D/\" target=\"_blank\" style=\"color: rgb(85, 85, 85); font-size: 18px;\"><u>{{community_name}}</u></a><br></td></tr> </tbody> </table> </td> </tr> </tbody> </table>', '<b>{{contact_user_name}}</b> The variable contains the name of person who has contacted the owner of an offer/ need.<br/>\n<b>{{goal_name}}</b> The variable contains the name/ title of Offer/ Need<br/>\n<b>{{name}}</b>: The variable contains the name of Person who is receiving the email<br/>\n<b>{{offer_or_need}}</b> The variable shows either its an offer or a need<br/>\n<b>{{message_content}}</b> The variable contains the message which a person writes in the message box while contacting the owner of an offer/ need<br/>', '2022-12-09 18:50:42'),
(3, 'forgot', 'Forgot Password', 'Request for password change', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"><div style=\"max-width:640px; margin:0 auto; \"><div style=\"color: #fff; text-align: center; background-color:#078a72; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Reset Password</h1>\r\n </div>\r\n <div style=\"padding: 20px; background-color: rgb(255, 255, 255); color:#555;\">                    <div> </div><span style=\"font-size:18px;\">Hello {{name}},<br>\r\n<br>\r\nA password reset request has been created for your account.&nbsp;<br>\r\nPlease enter the following code to reset your password:</span><div><br></div><h3 style=\"text-align: center;\">\r\n\r\n\r\n{{reset_code}}</h3><div style=\"text-align: center;\"><b></b></div>\r\n                    \r\n                    <div><span style=\"font-size: 14px; line-height: 20px;\"><br></span></div>\r\n<span style=\"font-size:18px;\">If you\'ve received this mail in error, it\'s likely that another user entered your email address by mistake while trying to reset a password.<br>\r\nIf you didn\'t initiate the request, you don\'t need to take any further action and can safely disregard this email.<br>\r\n<br></span><a href=\"https://%7B%7Bcommunity_url%7D%7D/\" target=\"_blank\" style=\"color: rgb(85, 85, 85); font-size: 18px;\"><u>{{community_name}}</u></a><span style=\"font-size:18px;\"><br></span></div>\r\n            </div>\r\n        </div>', '<b>{{name}}</b>: The variable contains the name of Person who is receiving the email<br/>\n<b>{{reset_code}}</b> The variable contains the reset code for password reset.<br/>', '2022-12-09 18:50:42'),
(4, 'user_status_update_pending', 'Status change - Pending', 'Your status has been changed to Pending', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"><div style=\"max-width:640px; margin:0 auto; \"><div style=\"color: #fff; text-align: center; background-color:#078a72; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1 style=\"font-family: Poppins, sans-serif; color: rgb(255, 255, 255);\">Account Update</h1>\r\n </div>\r\n <div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">                    <div style=\"color: rgb(85, 85, 85);\"> </div><span style=\"color: rgb(85, 85, 85); font-size: 18px;\">Hello {{name}},<br>\r\n<br></span><font color=\"#555555\"><span style=\"font-size: 18px;\">Your signup request is on hold, pending community review. Please use the email on the About Us page with any questions.</span></font><br>\r\n<br><a href=\"https://%7B%7Bcommunity_url%7D%7D/\" target=\"_blank\" style=\"color: rgb(85, 85, 85); font-size: 18px;\"><u>{{community_name}}</u></a><br></div>\r\n            </div>\r\n        </div>', '<b>{{name}}</b>: The variable contains the name of Person who is receiving the email<br/>\r\n<b>{{community_url}}</b>: Add this keyword to insert the Commuity Website URL<br/>\r\n<b>{{community_name}}</b>: Add this keyword to insert the Commuity Website Name<br/>\r\n', '2022-12-09 18:50:42'),
(5, 'user_status_update_approved', 'Status change - Approved', 'Your account has been approved', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"><div style=\"max-width:640px; margin:0 auto; \"><div style=\"color: #fff; text-align: center; background-color:#078a72; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1 style=\"font-family: Poppins, sans-serif; color: rgb(255, 255, 255);\">Account Update</h1>\r\n </div>\r\n <div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">                    <div style=\"color: rgb(85, 85, 85);\"> </div><span style=\"color: rgb(85, 85, 85); font-size: 18px;\">Hello {{name}},<br>\r\n<br></span><font color=\"#555555\"><span style=\"font-size: 18px;\">Your signup request has been approved. Please sign in again to post your own offers and needs.</span></font><br></div><div style=\"padding: 20px; background-color: rgb(255, 255, 255); color:#555;\"><span style=\"font-size:18px;\">\r\n<br></span><a href=\"https://%7B%7Bcommunity_url%7D%7D/\" target=\"_blank\" style=\"color: rgb(85, 85, 85); font-size: 18px;\"><u>{{community_name}}</u></a><span style=\"font-size:18px;\"><br></span></div>\r\n            </div>\r\n        </div>', '<b>{{name}}</b>: The variable contains the name of Person who is receiving the email<br/>\r\n<b>{{community_url}}</b>: Add this keyword to insert the Commuity Website URL<br/>\r\n<b>{{community_name}}</b>: Add this keyword to insert the Commuity Website Name<br/>\r\n', '2022-12-09 18:50:42'),
(6, 'user_status_update_denied', 'Status change - Denied', 'Your signup request has been declined by system administrator', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"><div style=\"max-width:640px; margin:0 auto; \"><div style=\"color: #fff; text-align: center; background-color:#078a72; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1 style=\"font-family: Poppins, sans-serif; color: rgb(255, 255, 255);\">Account Update</h1>\r\n </div>\r\n <div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">                    <div style=\"color: rgb(85, 85, 85);\"> </div><span style=\"color: rgb(85, 85, 85); font-size: 18px;\">Hello {{name}},<br>\r\n<br></span><font color=\"#555555\"><span style=\"font-size: 18px;\">Your signup request has been reviewed and denied by the community. Please use the email on the About Us page with any questions.</span></font><br>\r\n<br><a href=\"https://%7B%7Bcommunity_url%7D%7D/\" target=\"_blank\" style=\"color: rgb(85, 85, 85); font-size: 18px;\"><u>{{community_name}}</u></a><br></div>\r\n            </div>\r\n        </div>', '<b>{{name}}</b>: The variable contains the name of Person who is receiving the email<br/>\r\n<b>{{community_url}}</b>: Add this keyword to insert the Commuity Website URL<br/>\r\n<b>{{community_name}}</b>: Add this keyword to insert the Commuity Website Name<br/>\r\n', '2022-12-09 18:50:42'),
(7, 'user_status_update_restricted', 'Status change - Restricted', 'Your account has been restricted', '<div style=\"background-color: #eeeeef; padding: 50px 0; \"><div style=\"max-width:640px; margin:0 auto; \"><div style=\"color: #fff; text-align: center; background-color:#078a72; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;\"><h1>Account Update</h1>\r\n </div>\r\n <div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">                    <div style=\"color: rgb(85, 85, 85);\"> </div><span style=\"color: rgb(85, 85, 85); font-size: 18px;\">Hello {{name}},<br>\r\n<br></span><font color=\"#555555\"><span style=\"font-size: 18px;\">Your account is on hold. Please use the email on the About Us page with any questions.</span></font></div><div style=\"padding: 20px; background-color: rgb(255, 255, 255);\">\r\n<a style=\"color:#555555; font-size: 18px;\" href=\"//{{community_url}}\" target=\"_blank\"><u>{{community_name}}</u></a><font color=\"#555555\"><span style=\"font-size: 18px;\"></span></font><br></div>\r\n            </div>\r\n        </div>', '<b>{{name}}</b>: The variable contains the name of Person who is receiving the email<br/>\r\n<b>{{community_url}}</b>: Add this keyword to insert the Commuity Website URL<br/>\r\n<b>{{community_name}}</b>: Add this keyword to insert the Commuity Website Name<br/>\r\n', '2022-12-09 18:50:42');

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
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `lang_key` varchar(1000) NOT NULL,
  `lang_value` text NOT NULL,
  `notes` text DEFAULT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `lang_key`, `lang_value`, `notes`, `date_modified`) VALUES
(1, 'lang_about_us', 'About Us', 'This keyword is for about us page in navbar', '2023-05-12 23:21:06'),
(2, 'lang_account_settings', 'Account Settings', '', '2023-05-12 23:21:06'),
(3, 'lang_actions', 'Actions', '', '2023-05-12 23:21:06'),
(4, 'lang_add_your_photo', 'Add your photo', '', '2023-05-12 23:21:06'),
(5, 'lang_address', 'Address', '', '2023-05-12 23:21:06'),
(6, 'lang_after', 'After', '', '2023-05-12 23:21:06'),
(7, 'lang_all', 'All', 'All text in table for needs and offers pages', '2023-05-12 23:21:06'),
(8, 'lang_all_need', 'All Needs', '', '2023-05-12 23:21:06'),
(9, 'lang_all_offers', 'All Offers', '', '2023-05-12 23:21:06'),
(10, 'lang_asap', 'ASAP', '', '2023-05-12 23:21:06'),
(11, 'lang_auth_code', 'Auth Code', '', '2023-05-12 23:21:06'),
(12, 'lang_auth_code_does_not_match', 'Auth Code does not match', '', '2023-05-12 23:21:06'),
(13, 'lang_barter', 'Barter', '', '2023-05-12 23:21:06'),
(14, 'lang_but_you_can_create_an_account_simply_by_clicking_the_button_below', 'But you can create an account simply, by clicking the button below', '', '2023-05-12 23:21:06'),
(15, 'lang_change_password', 'Change password', '', '2023-05-12 23:21:06'),
(16, 'lang_change_photo', 'Change photo', '', '2023-05-12 23:21:06'),
(17, 'lang_change_user_password', 'Change User Password', '', '2023-05-12 23:21:06'),
(18, 'lang_charging', 'Charging', '', '2023-05-12 23:21:06'),
(19, 'lang_chat', 'Chat', '', '2023-05-12 23:21:06'),
(20, 'lang_check_to_sort_column_descending', 'Check to sort column descending', '', '2023-05-12 23:21:06'),
(21, 'lang_check_to_sort_the_column_in_ascending_order', 'Check to sort the column in ascending order', '', '2023-05-12 23:21:06'),
(22, 'lang_city', 'City', '', '2023-05-12 23:21:06'),
(23, 'lang_click_or_drag_to_upload', 'Click or drag to upload', '', '2023-05-12 23:21:06'),
(24, 'lang_close', 'Close', '', '2023-05-12 23:21:06'),
(25, 'lang_confirm_new_password', 'Confirm new password', '', '2023-05-12 23:21:06'),
(26, 'lang_confirmation_password', 'Confirmation password', '', '2023-05-12 23:21:06'),
(27, 'lang_contact_name', 'Contact Name', '', '2023-05-12 23:21:06'),
(28, 'lang_contact_owner', 'Contact Owner', '', '2023-05-12 23:21:06'),
(29, 'lang_continent', 'Continent', '', '2023-05-12 23:21:06'),
(30, 'lang_cost', 'Cost', '', '2023-05-12 23:21:06'),
(31, 'lang_country', 'Country', '', '2023-05-12 23:21:06'),
(32, 'lang_County', 'County', '', '2023-05-12 23:21:06'),
(33, 'lang_create_offer_right_away_popup_text', 'Create a new offer right away, just click the button below and fill out the details!', '', '2023-05-12 23:21:06'),
(34, 'lang_date_created', 'Date Created', '', '2023-05-12 23:21:06'),
(35, 'lang_delivery_details', 'Delivery Details', '', '2023-05-12 23:21:06'),
(36, 'lang_description', 'Description', '', '2023-05-12 23:21:06'),
(37, 'lang_description_about_something_i_need', 'Description about something I need', '', '2023-05-12 23:21:06'),
(38, 'lang_description_about_something_i_want_to_offer', 'Description about something I want to offer', '', '2023-05-12 23:21:06'),
(39, 'lang_details', 'Details', '', '2023-05-12 23:21:06'),
(40, 'lang_display_my_contact_details_on_my_listing', 'Display my contact details on my listing?', '', '2023-05-12 23:21:06'),
(41, 'lang_display_name', 'Display name', '', '2023-05-12 23:21:06'),
(42, 'lang_distance', 'Distance', '', '2023-05-12 23:21:06'),
(43, 'lang_do_you_want_to_continue', 'Do you want to continue?', '', '2023-05-12 23:21:06'),
(44, 'lang_email', 'Email', '', '2023-05-12 23:21:06'),
(45, 'lang_email_address', 'Email Address', '', '2023-05-12 23:21:06'),
(46, 'lang_email_already_in_use_please_try_a_different_email', 'Email already in use. Please try a different email.', '', '2023-05-12 23:21:06'),
(47, 'lang_enter_the_barter_details', 'Enter the barter details', '', '2023-05-12 23:21:06'),
(48, 'lang_enter_your_auth_code', 'Enter Your Auth Code', '', '2023-05-12 23:21:06'),
(49, 'lang_enter_your_password', 'Enter your password', '', '2023-05-12 23:21:06'),
(50, 'lang_error', 'Error', '', '2023-05-12 23:21:06'),
(51, 'lang_favourites', 'Favourites', '', '2023-05-12 23:21:06'),
(52, 'lang_filtering_a_total_of', 'filtering a total of', '', '2023-05-12 23:21:06'),
(53, 'lang_first', 'First', '', '2023-05-12 23:21:06'),
(54, 'lang_forgot_password', 'Forgot Password?', '', '2023-05-12 23:21:06'),
(55, 'lang_free', 'Free', '', '2023-05-12 23:21:06'),
(57, 'lang_sendpassword_email_message', 'Hi {{name}}<br/>Here\'s the password reset code for your account: {{otp_code}}. <br/>Thanks<br/>{{app_name}}', '', '2023-05-12 23:21:06'),
(58, 'lang_how_far_away_from_the_address_will_the_need_be_shared', 'How far away from the address will the need be shared?', '', '2023-05-12 23:21:06'),
(59, 'lang_how_far_away_from_the_address_will_the_offer_be_shared', 'How far away from the address will the offer be shared?', '', '2023-05-12 23:21:06'),
(60, 'lang_how_soon_do_you_need_it', 'How soon do you need it?', '', '2023-05-12 23:21:06'),
(61, 'lang_i_agree_to_the', 'I agree to the', '', '2023-05-12 23:21:06'),
(62, 'lang_i_need_a_bike', 'I need a bike', '', '2023-05-12 23:21:06'),
(63, 'lang_i_want_to_create_a_new_offer', 'I want to create a new offer', '', '2023-05-12 23:21:06'),
(64, 'lang_i_want_to_post_my_need', 'I want to post my need', '', '2023-05-12 23:21:06'),
(65, 'lang_invalid_details', 'Invalid details', '', '2023-05-12 23:21:06'),
(66, 'lang_john_doe', 'John Doe', '', '2023-05-12 23:21:06'),
(67, 'lang_john_example_com', 'john@example.com', '', '2023-05-12 23:21:06'),
(68, 'lang_language_setting', 'Language Setting', '', '2023-05-12 23:21:06'),
(69, 'lang_last', 'Last', '', '2023-05-12 23:21:06'),
(70, 'lang_locality', 'Locality', '', '2023-05-12 23:21:06'),
(72, 'lang_match', 'Match', '', '2023-05-12 23:21:06'),
(73, 'lang_message', 'Message', '', '2023-05-12 23:21:06'),
(74, 'lang_my_dashboard', 'My Dashboard', '', '2023-05-12 23:21:06'),
(75, 'lang_my_needs', 'My needs', '', '2023-05-12 23:21:06'),
(76, 'lang_my_offers', 'My offers', '', '2023-05-12 23:21:06'),
(77, 'lang_name', 'Name', '', '2023-05-12 23:21:06'),
(78, 'lang_name_title_cannot_be_blank', 'Name/ Title cannot be blank', '', '2023-05-12 23:21:06'),
(79, 'lang_nation', 'Nation', '', '2023-05-12 23:21:06'),
(80, 'lang_need', 'Need', '', '2023-05-12 23:21:06'),
(81, 'lang_need_name', 'Need Name', '', '2023-05-12 23:21:06'),
(82, 'lang_need_posted_successfully', 'Need posted successfully', '', '2023-05-12 23:21:06'),
(83, 'lang_need_updated_successfully', 'Need updated successfully', '', '2023-05-12 23:21:06'),
(84, 'lang_needs', 'Needs', '', '2023-05-12 23:21:06'),
(85, 'lang_new_password', 'New password', '', '2023-05-12 23:21:06'),
(86, 'lang_new_password_and_confirmation_do_not_match', 'New password and confirmation do not match', '', '2023-05-12 23:21:06'),
(87, 'lang_next', 'Next', '', '2023-05-12 23:21:06'),
(88, 'lang_no_data_available_in_table', 'No data available in table', '', '2023-05-12 23:21:06'),
(89, 'lang_no_results_found', 'No results found', '', '2023-05-12 23:21:06'),
(90, 'lang_offer', 'Offer', '', '2023-05-12 23:21:06'),
(91, 'lang_offer_name', 'Offer Name', '', '2023-05-12 23:21:06'),
(92, 'lang_offer_posted_successfully', 'Offer posted successfully', '', '2023-05-12 23:21:06'),
(93, 'lang_offer_price', 'Offer Price', '', '2023-05-12 23:21:06'),
(94, 'lang_offer_updated_successfully', 'Offer updated successfully', '', '2023-05-12 23:21:06'),
(95, 'lang_offers', 'Offers', '', '2023-05-12 23:21:06'),
(96, 'lang_offers_and_needs', 'Offers and needs', '', '2023-05-12 23:21:06'),
(97, 'lang_old_password', 'Old password', '', '2023-05-12 23:21:06'),
(98, 'lang_old_password_is_incorrect', 'Old password is incorrect', '', '2023-05-12 23:21:06'),
(99, 'lang_oops_this_email_does_not_match_with_any_account', 'Oops, this email doesn\'t match with any account', '', '2023-05-12 23:21:06'),
(100, 'lang_password_and_confirmation_password_do_not_match', 'password and confirmation password do not match', '', '2023-05-12 23:21:06'),
(101, 'lang_password_reset_otp_code', 'Password reset OTP code', '', '2023-05-12 23:21:06'),
(102, 'lang_phone', 'Phone', '', '2023-05-12 23:21:06'),
(103, 'lang_phone_number', 'Phone number', '', '2023-05-12 23:21:06'),
(104, 'lang_please_also_check_the_email', 'Please also check the email.', '', '2023-05-12 23:21:06'),
(105, 'lang_incorrect_password', 'Please check the username and password, or click here if you forgot password', '', '2023-05-12 23:21:06'),
(106, 'lang_please_enter_the_budget_for_your_need', 'Please enter the budget for your need', '', '2023-05-12 23:21:06'),
(107, 'lang_please_enter_the_need_delivery_location', 'Please enter the need delivery location', '', '2023-05-12 23:21:06'),
(108, 'lang_please_enter_the_need_description', 'Please enter the need description', '', '2023-05-12 23:21:06'),
(109, 'lang_please_enter_the_offer_delivery_location', 'Please enter the offer delivery location', '', '2023-05-12 23:21:06'),
(110, 'lang_please_enter_the_title_of_the_need', 'Please enter the title of the need', '', '2023-05-12 23:21:06'),
(111, 'lang_please_enter_your_details_below', 'Please enter your details below', '', '2023-05-12 23:21:06'),
(112, 'lang_please_enter_your_email', 'Please enter your email', '', '2023-05-12 23:21:06'),
(113, 'lang_please_enter_your_password_below', 'Please enter your password below', '', '2023-05-12 23:21:06'),
(114, 'lang_please_fill_in_the_address_details', 'Please fill in the address details', '', '2023-05-12 23:21:06'),
(115, 'lang_please_fill_in_the_contact_details', 'Please fill in the contact details', '', '2023-05-12 23:21:06'),
(116, 'lang_please_fill_in_the_details_for_your_need', 'Please fill in the details for your need', '', '2023-05-12 23:21:06'),
(117, 'lang_please_fill_in_the_details_for_your_offer', 'Please fill in the details for your offer', '', '2023-05-12 23:21:06'),
(118, 'lang_please_login_before_adding_a_new_offer_or_need', 'Please sign in before adding a new offer or need', '', '2023-05-12 23:21:06'),
(120, 'lang_please_provide_the_address_details', 'Please provide the address details', '', '2023-05-12 23:21:06'),
(121, 'lang_please_provide_the_contact_details', 'Please provide the contact details', '', '2023-05-12 23:21:06'),
(122, 'lang_please_select_an_option', 'Please select an option', '', '2023-05-12 23:21:06'),
(123, 'lang_please_select_recurring_days_when_you_need_it', 'Please select recurring days when you need it', '', '2023-05-12 23:21:06'),
(124, 'lang_please_select_the_address_type', 'Please select the address type', '', '2023-05-12 23:21:06'),
(125, 'lang_please_select_the_end_date', 'Please select the end date', '', '2023-05-12 23:21:06'),
(126, 'lang_please_select_the_medium_of_exchange', 'Please select the medium of exchange', '', '2023-05-12 23:21:06'),
(127, 'lang_please_select_the_start_date', 'Please select the start date', '', '2023-05-12 23:21:06'),
(128, 'lang_please_sign_in_before_liking_need', 'Please sign in before liking need', '', '2023-05-12 23:21:06'),
(129, 'lang_please_sign_in_before_liking_offer', 'Please sign in before liking offer', '', '2023-05-12 23:21:06'),
(130, 'lang_please_sign_in_before_participating_in_the_chat', 'Please sign in before participating in the chat', '', '2023-05-12 23:21:06'),
(131, 'lang_please_sign_in_to_add_view_your_favourites', 'please sign in to add view your favourites', '', '2023-05-12 23:21:06'),
(132, 'lang_please_sign_in_to_add_view_your_match', 'please sign in to add view your match', '', '2023-05-12 23:21:06'),
(133, 'lang_post_my_need', 'Post my need', '', '2023-05-12 23:21:06'),
(134, 'lang_post_my_offer', 'Post my offer', '', '2023-05-12 23:21:06'),
(135, 'lang_preview', 'Preview', '', '2023-05-12 23:21:06'),
(136, 'lang_previous', 'Previous', '', '2023-05-12 23:21:06'),
(137, 'lang_price', 'Price', '', '2023-05-12 23:21:06'),
(138, 'lang_processing', 'Processing', '', '2023-05-12 23:21:06'),
(139, 'lang_public_chat', 'Public Chat', '', '2023-05-12 23:21:06'),
(140, 'lang_records', 'records', '', '2023-05-12 23:21:06'),
(141, 'lang_recurring', 'Recurring', '', '2023-05-12 23:21:06'),
(142, 'lang_region', 'Region', '', '2023-05-12 23:21:06'),
(143, 'lang_search', 'Search', '', '2023-05-12 23:21:06'),
(144, 'lang_select_address_type', 'Select address type', '', '2023-05-12 23:21:06'),
(145, 'lang_select_an_option', 'Select an option', '', '2023-05-12 23:21:06'),
(146, 'lang_select_days', 'Select Days', '', '2023-05-12 23:21:06'),
(147, 'lang_select_option', 'Select Option', '', '2023-05-12 23:21:06'),
(148, 'lang_select_urgency', 'Select Urgency', '', '2023-05-12 23:21:06'),
(149, 'lang_send_reset_link', 'Send Reset Link', '', '2023-05-12 23:21:06'),
(150, 'lang_show_menu_entries', 'Show _MENU_ entries', '', '2023-05-12 23:21:06'),
(151, 'lang_showing_0_to_0_of_0_entries', 'Showing 0 to 0 of 0 entries', '', '2023-05-12 23:21:06'),
(152, 'lang_showing_start_to_end_of_total_entries', 'Showing _START_ to _END_ of _TOTAL_ entries', '', '2023-05-12 23:21:06'),
(153, 'lang_sign_in', 'Sign in', '', '2023-05-12 23:21:06'),
(154, 'lang_sign_in_now', 'Sign in Now', '', '2023-05-12 23:21:06'),
(155, 'lang_sign_out', 'Sign out', '', '2023-05-12 23:21:06'),
(156, 'lang_sign_up', 'Sign Up', '', '2023-05-12 23:21:06'),
(157, 'lang_sign_up_now', 'Sign Up Now', '', '2023-05-12 23:21:06'),
(158, 'lang_someone_example_com', 'someone@example.com', '', '2023-05-12 23:21:06'),
(159, 'lang_something_i_want_to_offer', 'Something I want to offer', '', '2023-05-12 23:21:06'),
(160, 'lang_state_province', 'State/Province', '', '2023-05-12 23:21:06'),
(161, 'lang_street_address', 'Street Address', '', '2023-05-12 23:21:06'),
(162, 'lang_submit', 'Submit', '', '2023-05-12 23:21:06'),
(163, 'lang_terms_and_conditions', 'terms and conditions', '', '2023-05-12 23:21:06'),
(164, 'lang_email_already_associated', 'The email you entered is already associated with an account. Click here if you forgot password', '', '2023-05-12 23:21:06'),
(165, 'lang_the_last_step', 'The last step', '', '2023-05-12 23:21:06'),
(166, 'lang_the_primary_contact_email', 'The primary contact email', '', '2023-05-12 23:21:06'),
(167, 'lang_the_primary_phone_number_to_contact', 'The primary phone number to contact', '', '2023-05-12 23:21:06'),
(168, 'lang_about_text', 'This app is a test site. If you have questions please email Jennifer Damashek at jenniferdamashek@protonmail.com.', '', '2023-05-12 23:21:06'),
(169, 'lang_this_email_not_registered', 'This email not registered', '', '2023-05-12 23:21:06'),
(170, 'lang_monday', 'Monday', '', '2023-05-12 23:21:06'),
(171, 'lang_tuesday', 'Tuesday', '', '2023-05-12 23:21:06'),
(172, 'lang_wednesday', 'Wednesday', '', '2023-05-12 23:21:06'),
(173, 'lang_thursday', 'Thursday', '', '2023-05-12 23:21:06'),
(174, 'lang_friday', 'Friday', '', '2023-05-12 23:21:06'),
(175, 'lang_saturday', 'Saturday', '', '2023-05-12 23:21:06'),
(176, 'lang_sunday', 'Sunday', '', '2023-05-12 23:21:06'),
(177, 'lang_update_my_need', 'Update my need', '', '2023-05-12 23:21:06'),
(178, 'lang_update_my_offer', 'Update my offer', '', '2023-05-12 23:21:06'),
(179, 'lang_update_password', 'Update password', '', '2023-05-12 23:21:06'),
(180, 'lang_update_user', 'Update User', '', '2023-05-12 23:21:06'),
(181, 'lang_update_user_password', 'Update User Password', '', '2023-05-12 23:21:06'),
(182, 'lang_update_your_offer', 'Update your offer', '', '2023-05-12 23:21:06'),
(183, 'lang_updated_successfully', 'updated successfully', '', '2023-05-12 23:21:06'),
(184, 'lang_user_name', 'User Name', '', '2023-05-12 23:21:06'),
(185, 'lang_user_updated_successfully', 'User updated successfully', '', '2023-05-12 23:21:06'),
(186, 'lang_users_management', 'Users Management', '', '2023-05-12 23:21:06'),
(187, 'lang_virtual', 'Virtual', '', '2023-05-12 23:21:06'),
(188, 'lang_want_to_add_an_image', 'Want to add an image?', '', '2023-05-12 23:21:06'),
(189, 'lang_welcome', 'Welcome', '', '2023-05-12 23:21:06'),
(190, 'lang_welcome_to_public_chat', 'Welcome to Public Chat', '', '2023-05-12 23:21:06'),
(191, 'lang_what_would_you_like_to_offer', 'What would you like to offer?', '', '2023-05-12 23:21:06'),
(192, 'lang_world', 'World', '', '2023-05-12 23:21:06'),
(193, 'lang_you_do_not_have_any_matches_yet', 'You do not have any matches yet.', '', '2023-05-12 23:21:06'),
(194, 'lang_you_must_agree_to_the_terms_and_conditions', 'You must agree to the terms and conditions', '', '2023-05-12 23:21:06'),
(195, 'lang_your_email', 'Your Email', '', '2023-05-12 23:21:06'),
(196, 'lang_your_message', 'Your Message', '', '2023-05-12 23:21:06'),
(197, 'lang_your_name', 'Your Name', '', '2023-05-12 23:21:06'),
(198, 'lang_your_password', 'Your password', '', '2023-05-12 23:21:06'),
(199, 'lang_your_photo', 'Your Photo', '', '2023-05-12 23:21:06'),
(200, 'lang_zip', 'Zip', '', '2023-05-12 23:21:06'),
(201, 'lang_zip_or_postal_code', 'Zip or Postal Code', '', '2023-05-12 23:21:06'),
(202, 'lang_need_it_before', 'Need it before', '', '2023-05-12 23:21:06'),
(203, 'lang_need_it_after', 'Need it after', '', '2023-05-12 23:21:06'),
(204, 'lang_need_it_recurring', 'Need it recurring', '', '2023-05-12 23:21:06'),
(205, 'lang_need_it_asap', 'Need it ASAP', '', '2023-05-12 23:21:06'),
(206, 'lang_create_need_right_away_popup_text', 'Create a new need right away, just click the button below and fill out the details!', '', '2023-05-12 23:21:06'),
(207, 'lang_your_message_has_been_sent_successfully', 'Your message has been sent successfully.', '', '2023-05-12 23:21:06'),
(208, 'test', 'test', '', '2023-05-12 23:21:06'),
(209, 'lang_delivery_address', 'Delivery Address', '', '2023-05-12 23:21:06'),
(210, 'lang_available_within_the', 'Available within the', '', '2023-05-12 23:21:06'),
(211, 'lang_available_in_the_area_of', 'Available in the area of', '', '2023-05-12 23:21:06'),
(212, 'lang_miles', 'Miles', '', '2023-05-12 23:21:06'),
(213, 'lang_needed_within_the', 'Needed within the', '', '2023-05-12 23:21:06'),
(214, 'lang_needed_in_the_area_of', 'Needed in the area of', '', '2023-05-12 23:21:06'),
(215, 'create_need_page_please_enter_the_goal_delivery_location', 'Please enter the goal delivery location', 'Please enter the goal delivery location', '2023-05-12 23:21:06'),
(216, 'lang_before', 'Before', '', '2023-05-12 23:21:06'),
(217, 'lang_pending_approval_by_admin', 'The account is pending approval by the community.', '', '2023-09-14 12:22:40'),
(218, 'lang_restricted_by_admin', 'The account is restricted by the community.', '', '2023-09-14 12:18:11');

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
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
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
-- Indexes for table `language`
--
ALTER TABLE `language`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `area_shared`
--
ALTER TABLE `area_shared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

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
