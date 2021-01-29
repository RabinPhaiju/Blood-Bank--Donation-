-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2019 at 12:46 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10230174_raktasanchar`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` bigint(20) NOT NULL COMMENT 'contact',
  `message` varchar(50) NOT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `post_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_id`, `name`, `email`, `phone`, `message`, `remark`, `post_at`) VALUES
(26, 'Rosan', 'uramud07@gmail.com', 9841215692, 'give me blood!!!', NULL, '2019-08-21 07:40:06'),
(27, 'arun1234', 'arunkp1122@gmail.com', 984646464, 'hello arun', NULL, '2019-08-22 06:03:46'),
(28, 'sabin', 'sabin@gmail.com', 1234567890, 'cdf', NULL, '2019-08-22 08:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `postby_id` int(6) DEFAULT NULL,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `verifiedby_id` int(6) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `hits` int(6) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `description`, `created_at`, `postby_id`, `is_verified`, `verifiedby_id`, `updated_at`, `hits`, `status`) VALUES
(4, 'footer', '© All Rights Reserved.\r\nThis is a 4th semester project on FOSP 2019.(Khwopa Engineering College)PU.																															', '2019-07-25 15:33:55', NULL, 0, NULL, '2019-08-01 15:59:48', NULL, 1),
(11, 'seminar', '<p>At the request of local organizations, prior to holding of blood donation camps, motivational sessions including an introductory speech delivered by volunteers of the Association.\r\n			</p><p>\r\n			Interaction and other motivational and informative programs are organized to enhance the relationship between voluntary blood donors, blood donor organizations, BLODAN and Blood Transfusion services.</p>', '2019-07-27 10:23:36', NULL, 0, NULL, NULL, NULL, 1),
(12, 'activities', '<p>The Association conducts various programs to meet the growing demand for blood. Major programs conducted by the association are in the field of donor education, motivation, donation and recognition. All programs conducted are entirely from voluntary contribution.</p>', '2019-07-27 10:37:36', NULL, 0, NULL, NULL, NULL, 1),
(13, 'educational activities', '				<p><h5>School Education Program:</h5>\r\n		The School Education Program which was initiated since the inception of the Association with a view to educate and motivate the school students to donate blood on attaining the age of 18. Under this program school students are educated about the basic blood science and blood donation and essay, painting and oratory competition on “voluntary blood donation and safe blood” is organized. This program is helping to prepare future non-remunerated voluntary blood donor in the country.\r\n			Training for Blood Donor Motivators\r\n		Blood Donor Motivators training program is organized to train volunteers to motivate, recruit and retain voluntary blood donors.</p>			', '2019-07-27 10:41:44', NULL, 0, NULL, '2019-07-27 10:43:47', NULL, 1),
(14, 'motivational activities', '<p><h5>Seminars</h5>At the request of local organizations, prior to holding of blood donation camps, motivational sessions including an introductory speech delivered by volunteers of the Association, followed by question-answers are regularly held.\r\n		Interaction and other motivational and informative programs are organized to enhance the relationship between voluntary blood donors, blood donor organizations, BLODAN and Blood Transfusion services.</p>\r\n		<h5>Blood Requisition Form</h5>\r\n		<p>Blood Requisition Form is issued to the donor organization when they organized donation camp. The implementation of the Blood requisition form has enhanced the relationship between the Blood Transfusion service and the blood donor organization thus helping remarkably in increasing the collection of blood.</p>', '2019-07-27 10:45:32', NULL, 0, NULL, NULL, NULL, 1),
(15, 'donation', '<p><h5>Regular Donation Camps</h5>Member organizations are mobilized throughout the years to organize blood donation camps. New organization, organization other than member organizations are also motivated to organize donation camps.</p>\r\n		<h5>Special Camps, Emergency Camps</h5>\r\n		<p>Special donation camps are organized during special occasion and emergency donation camps are organized when there is shortage of blood.</p>', '2019-07-27 10:46:15', NULL, 0, NULL, NULL, NULL, 1),
(16, 'who can donate', '<p>Accupunture Postpone donation for one year.</p>\r\n					<p>Accident &amp; Injury Can donate if otherwise healthy.</p><p>Aids Cannot donate.</p>\r\n					<p>Allergies Can donate if mild and require no treatment.</p>\r\n					<p>Alcohol Postpone donation if consumed alcohol in last 12 hours.</p>\r\n					<p>Anaemia Postpone donation.</p>\r\n					<p>Arthiritis Can donate if mild and not on medication.</p>\r\n					<p>Asthama Can donate if mild. Those with severe asthama requiring regular treatment cannot donate.</p>\r\n					<p>Blood Pressure Acceptable range is 160/90 to 110/70. Not to donate if on medication.</p>\r\n					<p>Bronchitis Postpone donation till 4 weeks after recovery.</p>\r\n					<p>Cancer Cannot donate.</p>\r\n					<p>Cold and Sore Throat– May not donate for first 24 hours into the condition. Can donate after 24 hours if feeling well enough to donate.</p>\r\n					<p>Chicken Pox Postpone donation till 4 weeks after recovery.</p>\r\n					<p>Cholesterol– Can donate if on diet control. Not to donate if under treatment.</p>\r\n					<p>Colitis Cannot donate.</p>\r\n					<p>Colostomy Cannot donate</p>\r\n					<p>Dementia Cannot donate</p>\r\n					<p>Dental Work Can donate even if recent case of minor dental work like dental cleaning, fillings and extractions. Postpone donation for 72 hours if undergone oral surgery.</p>\r\n					<p>Dengue Postpone donation till 4 weeks after recovery.</p>\r\n					<p>Dermatitis Can donate if mild. Postpone donation if severe.</p>\r\n					<p>Diabetes Can donate if treating by diet control. Postpone donation if under medication.</p>\r\n					<p>Diarrhoea Postpone donation till 3 weeks after recovery.</p>\r\n					<p>Drug Abuse– Cannot donate.</p>\r\n					<p>Ear Piercing Can donate if done by physician or using ear piercing gun with sterile supplies. Else postpone for one year.</p>\r\n					<p>Eczema Can donate if mild. Postpone donation if severe.</p>\r\n					<p>Electrolysis Postpone donation for one year.</p>\r\n					<p>Emphysema Can not donate.</p>\r\n					<p>Filariasis Cannot donate.</p>\r\n					<p>Food Poisoning Postpone donation for one week after recovery.</p>\r\n					<p>Gastroenteritis Postpone donation for one week after recovery.</p>\r\n					<p>Gall Stone Can donate if not on treatment.</p>\r\n					<p>Genital Herpes Postpone donation for 4 weeks after recovery.</p>\r\n					<p>Gonorrhoea/Syphillis Postpone donation for 1 year after recovery.</p>\r\n					<p>Gout Cannot donate.</p>\r\n					<p>Hepatitis Can not donate if having history of viral hepatitis after 11 years of age. However can donate if history of hepatitis pertaining to mononucleosis or CMV infection.</p>\r\n					<p>Leprosy Cannot donate.</p>\r\n					<p>Malaria Postpone donation for 3 years after recovery.</p>\r\n					<p>Mensuration Can donate.</p>\r\n					<p>Postrate Cannot donate.</p>\r\n					<p>Pregnancy Can donate after 6 weeks of full term normal delivery. Can donate 6 weeks after termination in third trimester. Those with first or second trimester miscarriage can donate.</p>\r\n					<p>Sickle Cell Trait Cannot donate.</p>\r\n					<p>Smoker Can Donate.</p>\r\n					<p>Spondylosis Can donate if feeling fit and not under treatment.</p>\r\n					<p>Stroke Cannot donate.</p>\r\n					<p>Syphilis Cannot donate.</p>\r\n					<p>Tattoo Postpone donation for one year.</p>\r\n					<p>Thyroid For Hypothyroid can donate if feeling well and euthyroid on thyroxine for six months. For Hyperthyroid cannot donate until euthyroid for six months.</p>\r\n					<p>Transfusion Postpone donation by one year if undergone transfusion with blood products. However can donate if undergone autologous transfusion.</p>\r\n					<p>Tuberculosis Cannot donate till 2 years after complete cure.</p>\r\n					<p>Viral Infection Can donate after cure and off treatment.</p>\r\n					<p>Worms Can donate after cure.</p>\r\n					<h2>Who Can/Cannot Donate?</h2>\r\n					<p>Normally there is a common thinking that anyone can donate blood except children but medicos have developed some guidelines and thus explained some guidelines and criteria for donation of blood.</p>\r\n					<p>A person of any sex from the age from seventeen to sixty can donate blood.</p>\r\n					<p>Blood donors should be of more than 45 kg.</p>\r\n					<p>The amount of hemoglobin in the blood should be more than 12 gm.</p>\r\n					<p>People who donate blood should be in good health and should not suffer or have suffered from any serious illness . Heart, lungs, liver must be in good condition and any person with past or present illness like (Jaundice, malaria, typhoid, AIDS, hepatitis ) is contradicted. If the donor is using any drugs/medicines, s/he must consult the doctor before donating blood.</p>\r\n					<h2>Period &amp; Quantity</h2>\r\n					<p>One can not donate blood more than four times a year and for females it is recommended to donate blood only two times a year. It is also recommended that one should not donate more than 400ml of blood at one time. After each withdrawal of blood, it takes 36 hours for the body to reconstitute the fluid volume and 21 days for the blood cell count to return to normal level.</p>\r\n					<h2>Who cannot donate</h2>\r\n					<p>Blood donation is prohibited for persons with following health problems. Tuberculosis, Sexually Transferable diseases, Diabetes, Asthma, High Blood pressure, Kidney problems, Heart diseases, Jaundice, Fever, AIDS.</p>\r\n					<p>Also if the person is taking medicine for long time or addicted to any drugs, s/he is prohibited for donating blood. Incase of females, one can not donate during her periods, pregnancy and also during breast feeding.</p>\r\n					<p>THE MAIN AIM OF BLOOD DONATION IS TO: SAVE LIFE SO THEREFORE THE RECIPIENT SHOULD BENEFIT FROM DONATION AND THE DONOR SHOULD NOT SUFFER.</p>', '2019-07-27 10:48:20', NULL, 0, NULL, NULL, NULL, 1),
(17, 'about', '																Rakta Sanchar Nepal, established in 2019, is a federation of non-remunerated voluntary blood donors, donor’s organizations, clubs and associations. It is working to meet the needs for high quality human blood and blood products by promoting the regular, non-remunerated voluntary blood donation all over the country.\r\n\r\n				Rakta Sanchar has 002 member organization and eight districts.	\r\n<br>\r\n<br>\r\n<h3>\r\nThis is a 4th semester Project on FOSP (2019).\r\n<br>\r\nkhwopa Engineering College,PU.	\r\n</h3>										', '2019-08-01 15:40:07', NULL, 0, NULL, '2019-08-01 16:03:46', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `postby_id` int(6) NOT NULL DEFAULT 1,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `verifiedby_id` int(6) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `hits` bigint(20) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `title`, `remarks`, `created_at`, `postby_id`, `is_verified`, `verifiedby_id`, `updated_at`, `hits`, `status`) VALUES
(8, 'download.jpg', NULL, '2019-07-27 11:00:10', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(16, 'i1.jpg', NULL, '2019-07-28 09:55:07', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(17, 'i2.jpg', NULL, '2019-07-28 09:55:14', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(18, 'i3.jpg', NULL, '2019-07-28 09:55:21', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(20, 'i4.jpg', NULL, '2019-07-28 10:04:53', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(21, 'i5.jpg', NULL, '2019-07-28 10:05:35', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(24, '2.jpg', NULL, '2019-08-01 16:24:54', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(25, '3.jpg', NULL, '2019-08-01 16:25:10', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(26, '4.jpg', NULL, '2019-08-01 16:26:19', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(27, '5.jpg', NULL, '2019-08-01 16:26:31', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(28, '6.jpg', NULL, '2019-08-01 16:26:40', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(29, '7.jpg', NULL, '2019-08-01 16:27:04', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(30, '8.jpg', NULL, '2019-08-01 16:27:13', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(31, '9.jpg', NULL, '2019-08-01 16:27:24', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(32, '10.jpg', NULL, '2019-08-01 16:27:50', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(33, '11.jpg', NULL, '2019-08-01 16:28:01', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(34, '12.jpg', NULL, '2019-08-01 16:28:09', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(35, '13.jpg', NULL, '2019-08-01 16:28:22', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(36, '14.jpg', NULL, '2019-08-01 16:28:31', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(37, '15.jpg', NULL, '2019-08-01 16:28:49', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(38, '16.jpg', NULL, '2019-08-01 16:29:06', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(41, 'profile.png', NULL, '2019-08-20 11:22:28', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(44, 'blood-donor-match.png', NULL, '2019-08-22 09:20:45', 1, 0, 1, '0000-00-00 00:00:00', 1, 1),
(45, '1.jpg', NULL, '2019-08-22 11:56:29', 1, 0, 1, '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` int(10) UNSIGNED NOT NULL,
  `bloodtype` varchar(6) DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `contact` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Contact No',
  `dob` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `password` varchar(40) NOT NULL,
  `secret_key` varchar(6) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `verifiedby_id` int(6) NOT NULL DEFAULT 0 COMMENT 'Verified By',
  `remark` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `show_bloodtype` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `bloodtype`, `username`, `pic`, `user_type`, `firstname`, `lastname`, `email`, `location`, `contact`, `dob`, `created_at`, `updated_at`, `password`, `secret_key`, `verified`, `verifiedby_id`, `remark`, `status`, `show_bloodtype`) VALUES
(38, 'B +ve', 'rodip', NULL, NULL, 'Rodip', 'Duwal', 'rodipduwal15@gmail.com', 'Bhaktapur', '9860488878', '1998-08-13', '2019-08-20 07:14:59', '2019-08-22 11:30:09', 'f42492762d449d0942253d286d1c457e', '428738', 1, 4, NULL, 1, 1),
(39, 'B +ve', 'rbnph', 'rbnph.jpg', 'regular', 'Rabin', 'Phaiju', 'rabinphaiju15@gmail.com', 'Bhaktapur', '9808215115', '1994-07-21', '2019-08-20 09:15:26', '2019-08-24 05:15:42', '672fe60e8f79e1494810a78ac5bd8e12', 'fmjkTn', 1, 1, NULL, 1, 1),
(51, 'A +ve', 'uramud', NULL, NULL, 'Roshan', 'Dumaru', 'uramud07@gmail.com', 'Bhaktapur', '9841215692', '2019-08-05', '2019-08-21 07:30:18', '2019-08-22 11:30:14', '7310245e7d1579ee2da13fed41da4764', '451555', 1, 4, NULL, 1, 1),
(52, 'O +ve', 'arun1234', 'arun1234.jpg', NULL, 'Arun', 'Prajapati', 'arunkp1122@gmail.com', 'Bhaktapur', '9860465326', '2019-08-21', '2019-08-22 05:42:00', '2019-08-22 11:30:17', 'ff41647d3dee46a4a167f913e7d7c029', '242043', 1, 4, NULL, 1, 1),
(59, NULL, 'ra', NULL, NULL, 'R', 'E', 'eaaaa@aag.com', NULL, NULL, NULL, '2019-08-24 12:20:24', NULL, '3dbe00a167653a1aaee01d93e77e730e', '02SGyf', 0, 0, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL DEFAULT 'staff',
  `email` varchar(40) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `secret_key` varchar(20) DEFAULT NULL,
  `remarks` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `postby_id` int(11) DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `verifiedby_id` int(6) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `usertype`, `email`, `phone`, `address`, `password`, `secret_key`, `remarks`, `dob`, `gender`, `created_at`, `postby_id`, `is_verified`, `verifiedby_id`, `updated_at`, `status`) VALUES
(0, 'Superadmin', 'Superadmin', 'admin', 'raktasanchar@gmail.com', 13456789, 'libali', '25069a844a19b900c0e3efa525153472', NULL, 'SuperAdmin', '2019-07-06', 1, '2019-07-27 10:21:36', NULL, 0, NULL, '2019-08-21 02:23:04', 1),
(1, 'system', 'system', 'admin', 'raktasanchar@gmail.com', 1, 'system', '25069a844a19b900c0e3efa525153472', NULL, 'system', '2019-07-01', 3, '2019-07-01 00:00:00', NULL, 1, NULL, '2019-08-21 02:22:23', 1),
(2, 'sabina', 'sai', 'staff', 'sabina@gmail.com', 456456455, 'libalii', 'a29bac723ca2d59ed78a2d715e17e92f', NULL, 'qq', '2019-07-02', 1, '2019-07-23 18:50:45', NULL, 1, 4, '2019-08-22 06:24:42', 1),
(4, 'Rabin Phaiju', 'rabin', 'manager', 'rabinphaiju15@gmail.com', 9808215115, 'bkt', '672fe60e8f79e1494810a78ac5bd8e12', NULL, 'rabin', '2019-07-01', 1, '2019-07-10 00:00:00', NULL, 1, 4, '2019-08-22 06:25:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `view_id` int(6) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`view_id`, `name`, `views`) VALUES
(1, 'index', 503),
(2, 'bhaktapur', 60),
(3, 'kathmandu', 11),
(4, 'lalitpur', 19),
(5, 'whocandonate', 57),
(6, 'contactus', 115);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `view_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
