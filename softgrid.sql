-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 08:13 PM
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
-- Database: `softgrid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'MTExMTEx');

-- --------------------------------------------------------

--
-- Table structure for table `api_analyze`
--

CREATE TABLE `api_analyze` (
  `id` int(11) NOT NULL,
  `access_token` varchar(123) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unixtime` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_analyze`
--

INSERT INTO `api_analyze` (`id`, `access_token`, `date`, `unixtime`) VALUES
(1, 'srt10', '2021-12-09 00:11:29', '1638988889'),
(2, 'srt10', '2021-12-09 00:11:42', '1638988902'),
(3, 'srt10', '2021-12-09 00:16:38', '1638989198'),
(4, 'msd7', '2021-12-09 00:39:51', '1638990591');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `status`) VALUES
(1, 'Aruba', 1),
(2, 'Afghanistan', 1),
(3, 'Angola', 1),
(4, 'Anguilla', 1),
(5, 'Albania', 1),
(6, 'Andorra', 1),
(7, 'Netherlands Antilles', 1),
(8, 'United Arab Emirates', 1),
(9, 'Argentina', 1),
(10, 'Armenia', 1),
(11, 'American Samoa', 1),
(12, 'Antarctica', 1),
(13, 'French Southern territories', 1),
(14, 'Antigua and Barbuda', 1),
(15, 'Australia', 1),
(16, 'Austria', 1),
(17, 'Azerbaijan', 1),
(18, 'Burundi', 1),
(19, 'Belgium', 1),
(20, 'Benin', 1),
(21, 'Burkina Faso', 1),
(22, 'Bangladesh', 1),
(23, 'Bulgaria', 1),
(24, 'Bahrain', 1),
(25, 'Bahamas', 1),
(26, 'Bosnia and Herzegovina', 1),
(27, 'Belarus', 1),
(28, 'Belize', 1),
(29, 'Bermuda', 1),
(30, 'Bolivia', 1),
(31, 'Brazil', 1),
(32, 'Barbados', 1),
(33, 'Brunei', 1),
(34, 'Bhutan', 1),
(35, 'Bouvet Island', 1),
(36, 'Botswana', 1),
(37, 'Central African Republic', 1),
(38, 'Canada', 1),
(39, 'Cocos (Keeling) Islands', 1),
(40, 'Switzerland', 1),
(41, 'Chile', 1),
(42, 'China', 1),
(43, 'CÃ´te dâ€™Ivoire', 1),
(44, 'Cameroon', 1),
(45, 'Congo, The Democratic Republic', 1),
(46, 'Congo', 1),
(47, 'Cook Islands', 1),
(48, 'Colombia', 1),
(49, 'Comoros', 1),
(50, 'Cape Verde', 1),
(51, 'Costa Rica', 1),
(52, 'Cuba', 1),
(53, 'Christmas Island', 1),
(54, 'Cayman Islands', 1),
(55, 'Cyprus', 1),
(56, 'Czech Republic', 1),
(57, 'Germany', 1),
(58, 'Djibouti', 1),
(59, 'Dominica', 1),
(60, 'Denmark', 1),
(61, 'Dominican Republic', 1),
(62, 'Algeria', 1),
(63, 'Ecuador', 1),
(64, 'Egypt', 1),
(65, 'Eritrea', 1),
(66, 'Western Sahara', 1),
(67, 'Spain', 1),
(68, 'Estonia', 1),
(69, 'Ethiopia', 1),
(70, 'Finland', 1),
(71, 'Fiji Islands', 1),
(72, 'Falkland Islands', 1),
(73, 'France', 1),
(74, 'Faroe Islands', 1),
(75, 'Micronesia, Federated States o', 1),
(76, 'Gabon', 1),
(77, 'United Kingdom', 1),
(78, 'Georgia', 1),
(79, 'Ghana', 1),
(80, 'Gibraltar', 1),
(81, 'Guinea', 1),
(82, 'Guadeloupe', 1),
(83, 'Gambia', 1),
(84, 'Guinea-Bissau', 1),
(85, 'Equatorial Guinea', 1),
(86, 'Greece', 1),
(87, 'Grenada', 1),
(88, 'Greenland', 1),
(89, 'Guatemala', 1),
(90, 'French Guiana', 1),
(91, 'Guam', 1),
(92, 'Guyana', 1),
(93, 'Hong Kong', 1),
(94, 'Heard Island and McDonald Isla', 1),
(95, 'Honduras', 1),
(96, 'Croatia', 1),
(97, 'Haiti', 1),
(98, 'Hungary', 1),
(99, 'Indonesia', 1),
(100, 'India', 1),
(101, 'British Indian Ocean Territory', 1),
(102, 'Ireland', 1),
(103, 'Iran', 1),
(104, 'Iraq', 1),
(105, 'Iceland', 1),
(106, 'Israel', 1),
(107, 'Italy', 1),
(108, 'Jamaica', 1),
(109, 'Jordan', 1),
(110, 'Japan', 1),
(111, 'Kazakstan', 1),
(112, 'Kenya', 1),
(113, 'Kyrgyzstan', 1),
(114, 'Cambodia', 1),
(115, 'Kiribati', 1),
(116, 'Saint Kitts and Nevis', 1),
(117, 'South Korea', 1),
(118, 'Kuwait', 1),
(119, 'Laos', 1),
(120, 'Lebanon', 1),
(121, 'Liberia', 1),
(122, 'Libyan Arab Jamahiriya', 1),
(123, 'Saint Lucia', 1),
(124, 'Liechtenstein', 1),
(125, 'Sri Lanka', 1),
(126, 'Lesotho', 1),
(127, 'Lithuania', 1),
(128, 'Luxembourg', 1),
(129, 'Latvia', 1),
(130, 'Macao', 1),
(131, 'Morocco', 1),
(132, 'Monaco', 1),
(133, 'Moldova', 1),
(134, 'Madagascar', 1),
(135, 'Maldives', 1),
(136, 'Mexico', 1),
(137, 'Marshall Islands', 1),
(138, 'Macedonia', 1),
(139, 'Mali', 1),
(140, 'Malta', 1),
(141, 'Myanmar', 1),
(142, 'Mongolia', 1),
(143, 'Northern Mariana Islands', 1),
(144, 'Mozambique', 1),
(145, 'Mauritania', 1),
(146, 'Montserrat', 1),
(147, 'Martinique', 1),
(148, 'Mauritius', 1),
(149, 'Malawi', 1),
(150, 'Malaysia', 1),
(151, 'Mayotte', 1),
(152, 'Namibia', 1),
(153, 'New Caledonia', 1),
(154, 'Niger', 1),
(155, 'Norfolk Island', 1),
(156, 'Nigeria', 1),
(157, 'Nicaragua', 1),
(158, 'Niue', 1),
(159, 'Netherlands', 1),
(160, 'Norway', 1),
(161, 'Nepal', 1),
(162, 'Nauru', 1),
(163, 'New Zealand', 1),
(164, 'Oman', 1),
(165, 'Pakistan', 1),
(166, 'Panama', 1),
(167, 'Pitcairn', 1),
(168, 'Peru', 1),
(169, 'Philippines', 1),
(170, 'Palau', 1),
(171, 'Papua New Guinea', 1),
(172, 'Poland', 1),
(173, 'Puerto Rico', 1),
(174, 'North Korea', 1),
(175, 'Portugal', 1),
(176, 'Paraguay', 1),
(177, 'Palestine', 1),
(178, 'French Polynesia', 1),
(179, 'Qatar', 1),
(180, 'RÃ©union', 1),
(181, 'Romania', 1),
(182, 'Russian Federation', 1),
(183, 'Rwanda', 1),
(184, 'Saudi Arabia', 1),
(185, 'Sudan', 1),
(186, 'Senegal', 1),
(187, 'Singapore', 1),
(188, 'South Georgia and the South Sa', 1),
(189, 'Saint Helena', 1),
(190, 'Svalbard and Jan Mayen', 1),
(191, 'Solomon Islands', 1),
(192, 'Sierra Leone', 1),
(193, 'El Salvador', 1),
(194, 'San Marino', 1),
(195, 'Somalia', 1),
(196, 'Saint Pierre and Miquelon', 1),
(197, 'Sao Tome and Principe', 1),
(198, 'Suriname', 1),
(199, 'Slovakia', 1),
(200, 'Slovenia', 1),
(201, 'Sweden', 1),
(202, 'Swaziland', 1),
(203, 'Seychelles', 1),
(204, 'Syria', 1),
(205, 'Turks and Caicos Islands', 1),
(206, 'Chad', 1),
(207, 'Togo', 1),
(208, 'Thailand', 1),
(209, 'Tajikistan', 1),
(210, 'Tokelau', 1),
(211, 'Turkmenistan', 1),
(212, 'East Timor', 1),
(213, 'Tonga', 1),
(214, 'Trinidad and Tobago', 1),
(215, 'Tunisia', 1),
(216, 'Turkey', 1),
(217, 'Tuvalu', 1),
(218, 'Taiwan', 1),
(219, 'Tanzania', 1),
(220, 'Uganda', 1),
(221, 'Ukraine', 1),
(222, 'United States Minor Outlying I', 1),
(223, 'Uruguay', 1),
(224, 'United States', 1),
(225, 'Uzbekistan', 1),
(226, 'Holy See (Vatican City State)', 1),
(227, 'Saint Vincent and the Grenadin', 1),
(228, 'Venezuela', 1),
(229, 'Virgin Islands, British', 1),
(230, 'Virgin Islands, U.S.', 1),
(231, 'Vietnam', 1),
(232, 'Vanuatu', 1),
(233, 'Wallis and Futuna', 1),
(234, 'Samoa', 1),
(235, 'Yemen', 1),
(236, 'Yugoslavia', 1),
(237, 'South Africa', 1),
(238, 'Zambia', 1),
(239, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `access_token`) VALUES
(1, 'user1', 'srt10'),
(2, 'user2', 'msd7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_analyze`
--
ALTER TABLE `api_analyze`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `api_analyze`
--
ALTER TABLE `api_analyze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
