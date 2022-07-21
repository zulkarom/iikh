-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 11:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iikhtiar`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) NOT NULL,
  `country_code` char(2) NOT NULL DEFAULT '',
  `country_name` varchar(45) NOT NULL DEFAULT '',
  `currency_code` char(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `currency_code`) VALUES
(1, 'AD', 'Andorra', 'EUR'),
(2, 'AE', 'United Arab Emirates', 'AED'),
(3, 'AF', 'Afghanistan', 'AFN'),
(4, 'AG', 'Antigua and Barbuda', 'XCD'),
(5, 'AI', 'Anguilla', 'XCD'),
(6, 'AL', 'Albania', 'ALL'),
(7, 'AM', 'Armenia', 'AMD'),
(8, 'AO', 'Angola', 'AOA'),
(9, 'AQ', 'Antarctica', ''),
(10, 'AR', 'Argentina', 'ARS'),
(11, 'AS', 'American Samoa', 'USD'),
(12, 'AT', 'Austria', 'EUR'),
(13, 'AU', 'Australia', 'AUD'),
(14, 'AW', 'Aruba', 'AWG'),
(15, 'AX', 'Åland', 'EUR'),
(16, 'AZ', 'Azerbaijan', 'AZN'),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM'),
(18, 'BB', 'Barbados', 'BBD'),
(19, 'BD', 'Bangladesh', 'BDT'),
(20, 'BE', 'Belgium', 'EUR'),
(21, 'BF', 'Burkina Faso', 'XOF'),
(22, 'BG', 'Bulgaria', 'BGN'),
(23, 'BH', 'Bahrain', 'BHD'),
(24, 'BI', 'Burundi', 'BIF'),
(25, 'BJ', 'Benin', 'XOF'),
(26, 'BL', 'Saint Barthélemy', 'EUR'),
(27, 'BM', 'Bermuda', 'BMD'),
(28, 'BN', 'Brunei', 'BND'),
(29, 'BO', 'Bolivia', 'BOB'),
(30, 'BQ', 'Bonaire', 'USD'),
(31, 'BR', 'Brazil', 'BRL'),
(32, 'BS', 'Bahamas', 'BSD'),
(33, 'BT', 'Bhutan', 'BTN'),
(34, 'BV', 'Bouvet Island', 'NOK'),
(35, 'BW', 'Botswana', 'BWP'),
(36, 'BY', 'Belarus', 'BYR'),
(37, 'BZ', 'Belize', 'BZD'),
(38, 'CA', 'Canada', 'CAD'),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD'),
(40, 'CD', 'Democratic Republic of the Congo', 'CDF'),
(41, 'CF', 'Central African Republic', 'XAF'),
(42, 'CG', 'Republic of the Congo', 'XAF'),
(43, 'CH', 'Switzerland', 'CHF'),
(44, 'CI', 'Ivory Coast', 'XOF'),
(45, 'CK', 'Cook Islands', 'NZD'),
(46, 'CL', 'Chile', 'CLP'),
(47, 'CM', 'Cameroon', 'XAF'),
(48, 'CN', 'China', 'CNY'),
(49, 'CO', 'Colombia', 'COP'),
(50, 'CR', 'Costa Rica', 'CRC'),
(51, 'CU', 'Cuba', 'CUP'),
(52, 'CV', 'Cape Verde', 'CVE'),
(53, 'CW', 'Curacao', 'ANG'),
(54, 'CX', 'Christmas Island', 'AUD'),
(55, 'CY', 'Cyprus', 'EUR'),
(56, 'CZ', 'Czech Republic', 'CZK'),
(57, 'DE', 'Germany', 'EUR'),
(58, 'DJ', 'Djibouti', 'DJF'),
(59, 'DK', 'Denmark', 'DKK'),
(60, 'DM', 'Dominica', 'XCD'),
(61, 'DO', 'Dominican Republic', 'DOP'),
(62, 'DZ', 'Algeria', 'DZD'),
(63, 'EC', 'Ecuador', 'USD'),
(64, 'EE', 'Estonia', 'EUR'),
(65, 'EG', 'Egypt', 'EGP'),
(66, 'EH', 'Western Sahara', 'MAD'),
(67, 'ER', 'Eritrea', 'ERN'),
(68, 'ES', 'Spain', 'EUR'),
(69, 'ET', 'Ethiopia', 'ETB'),
(70, 'FI', 'Finland', 'EUR'),
(71, 'FJ', 'Fiji', 'FJD'),
(72, 'FK', 'Falkland Islands', 'FKP'),
(73, 'FM', 'Micronesia', 'USD'),
(74, 'FO', 'Faroe Islands', 'DKK'),
(75, 'FR', 'France', 'EUR'),
(76, 'GA', 'Gabon', 'XAF'),
(77, 'GB', 'United Kingdom', 'GBP'),
(78, 'GD', 'Grenada', 'XCD'),
(79, 'GE', 'Georgia', 'GEL'),
(80, 'GF', 'French Guiana', 'EUR'),
(81, 'GG', 'Guernsey', 'GBP'),
(82, 'GH', 'Ghana', 'GHS'),
(83, 'GI', 'Gibraltar', 'GIP'),
(84, 'GL', 'Greenland', 'DKK'),
(85, 'GM', 'Gambia', 'GMD'),
(86, 'GN', 'Guinea', 'GNF'),
(87, 'GP', 'Guadeloupe', 'EUR'),
(88, 'GQ', 'Equatorial Guinea', 'XAF'),
(89, 'GR', 'Greece', 'EUR'),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP'),
(91, 'GT', 'Guatemala', 'GTQ'),
(92, 'GU', 'Guam', 'USD'),
(93, 'GW', 'Guinea-Bissau', 'XOF'),
(94, 'GY', 'Guyana', 'GYD'),
(95, 'HK', 'Hong Kong', 'HKD'),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD'),
(97, 'HN', 'Honduras', 'HNL'),
(98, 'HR', 'Croatia', 'HRK'),
(99, 'HT', 'Haiti', 'HTG'),
(100, 'HU', 'Hungary', 'HUF'),
(101, 'ID', 'Indonesia', 'IDR'),
(102, 'IE', 'Ireland', 'EUR'),
(103, 'IL', 'Israel', 'ILS'),
(104, 'IM', 'Isle of Man', 'GBP'),
(105, 'IN', 'India', 'INR'),
(106, 'IO', 'British Indian Ocean Territory', 'USD'),
(107, 'IQ', 'Iraq', 'IQD'),
(108, 'IR', 'Iran', 'IRR'),
(109, 'IS', 'Iceland', 'ISK'),
(110, 'IT', 'Italy', 'EUR'),
(111, 'JE', 'Jersey', 'GBP'),
(112, 'JM', 'Jamaica', 'JMD'),
(113, 'JO', 'Jordan', 'JOD'),
(114, 'JP', 'Japan', 'JPY'),
(115, 'KE', 'Kenya', 'KES'),
(116, 'KG', 'Kyrgyzstan', 'KGS'),
(117, 'KH', 'Cambodia', 'KHR'),
(118, 'KI', 'Kiribati', 'AUD'),
(119, 'KM', 'Comoros', 'KMF'),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD'),
(121, 'KP', 'North Korea', 'KPW'),
(122, 'KR', 'South Korea', 'KRW'),
(123, 'KW', 'Kuwait', 'KWD'),
(124, 'KY', 'Cayman Islands', 'KYD'),
(125, 'KZ', 'Kazakhstan', 'KZT'),
(126, 'LA', 'Laos', 'LAK'),
(127, 'LB', 'Lebanon', 'LBP'),
(128, 'LC', 'Saint Lucia', 'XCD'),
(129, 'LI', 'Liechtenstein', 'CHF'),
(130, 'LK', 'Sri Lanka', 'LKR'),
(131, 'LR', 'Liberia', 'LRD'),
(132, 'LS', 'Lesotho', 'LSL'),
(133, 'LT', 'Lithuania', 'LTL'),
(134, 'LU', 'Luxembourg', 'EUR'),
(135, 'LV', 'Latvia', 'EUR'),
(136, 'LY', 'Libya', 'LYD'),
(137, 'MA', 'Morocco', 'MAD'),
(138, 'MC', 'Monaco', 'EUR'),
(139, 'MD', 'Moldova', 'MDL'),
(140, 'ME', 'Montenegro', 'EUR'),
(141, 'MF', 'Saint Martin', 'EUR'),
(142, 'MG', 'Madagascar', 'MGA'),
(143, 'MH', 'Marshall Islands', 'USD'),
(144, 'MK', 'Macedonia', 'MKD'),
(145, 'ML', 'Mali', 'XOF'),
(146, 'MM', 'Myanmar [Burma]', 'MMK'),
(147, 'MN', 'Mongolia', 'MNT'),
(148, 'MO', 'Macao', 'MOP'),
(149, 'MP', 'Northern Mariana Islands', 'USD'),
(150, 'MQ', 'Martinique', 'EUR'),
(151, 'MR', 'Mauritania', 'MRO'),
(152, 'MS', 'Montserrat', 'XCD'),
(153, 'MT', 'Malta', 'EUR'),
(154, 'MU', 'Mauritius', 'MUR'),
(155, 'MV', 'Maldives', 'MVR'),
(156, 'MW', 'Malawi', 'MWK'),
(157, 'MX', 'Mexico', 'MXN'),
(158, 'MY', 'Malaysia', 'MYR'),
(159, 'MZ', 'Mozambique', 'MZN'),
(160, 'NA', 'Namibia', 'NAD'),
(161, 'NC', 'New Caledonia', 'XPF'),
(162, 'NE', 'Niger', 'XOF'),
(163, 'NF', 'Norfolk Island', 'AUD'),
(164, 'NG', 'Nigeria', 'NGN'),
(165, 'NI', 'Nicaragua', 'NIO'),
(166, 'NL', 'Netherlands', 'EUR'),
(167, 'NO', 'Norway', 'NOK'),
(168, 'NP', 'Nepal', 'NPR'),
(169, 'NR', 'Nauru', 'AUD'),
(170, 'NU', 'Niue', 'NZD'),
(171, 'NZ', 'New Zealand', 'NZD'),
(172, 'OM', 'Oman', 'OMR'),
(173, 'PA', 'Panama', 'PAB'),
(174, 'PE', 'Peru', 'PEN'),
(175, 'PF', 'French Polynesia', 'XPF'),
(176, 'PG', 'Papua New Guinea', 'PGK'),
(177, 'PH', 'Philippines', 'PHP'),
(178, 'PK', 'Pakistan', 'PKR'),
(179, 'PL', 'Poland', 'PLN'),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR'),
(181, 'PN', 'Pitcairn Islands', 'NZD'),
(182, 'PR', 'Puerto Rico', 'USD'),
(183, 'PS', 'Palestine', 'ILS'),
(184, 'PT', 'Portugal', 'EUR'),
(185, 'PW', 'Palau', 'USD'),
(186, 'PY', 'Paraguay', 'PYG'),
(187, 'QA', 'Qatar', 'QAR'),
(188, 'RE', 'Réunion', 'EUR'),
(189, 'RO', 'Romania', 'RON'),
(190, 'RS', 'Serbia', 'RSD'),
(191, 'RU', 'Russia', 'RUB'),
(192, 'RW', 'Rwanda', 'RWF'),
(193, 'SA', 'Saudi Arabia', 'SAR'),
(194, 'SB', 'Solomon Islands', 'SBD'),
(195, 'SC', 'Seychelles', 'SCR'),
(196, 'SD', 'Sudan', 'SDG'),
(197, 'SE', 'Sweden', 'SEK'),
(198, 'SG', 'Singapore', 'SGD'),
(199, 'SH', 'Saint Helena', 'SHP'),
(200, 'SI', 'Slovenia', 'EUR'),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK'),
(202, 'SK', 'Slovakia', 'EUR'),
(203, 'SL', 'Sierra Leone', 'SLL'),
(204, 'SM', 'San Marino', 'EUR'),
(205, 'SN', 'Senegal', 'XOF'),
(206, 'SO', 'Somalia', 'SOS'),
(207, 'SR', 'Suriname', 'SRD'),
(208, 'SS', 'South Sudan', 'SSP'),
(209, 'ST', 'São Tomé and Príncipe', 'STD'),
(210, 'SV', 'El Salvador', 'USD'),
(211, 'SX', 'Sint Maarten', 'ANG'),
(212, 'SY', 'Syria', 'SYP'),
(213, 'SZ', 'Swaziland', 'SZL'),
(214, 'TC', 'Turks and Caicos Islands', 'USD'),
(215, 'TD', 'Chad', 'XAF'),
(216, 'TF', 'French Southern Territories', 'EUR'),
(217, 'TG', 'Togo', 'XOF'),
(218, 'TH', 'Thailand', 'THB'),
(219, 'TJ', 'Tajikistan', 'TJS'),
(220, 'TK', 'Tokelau', 'NZD'),
(221, 'TL', 'East Timor', 'USD'),
(222, 'TM', 'Turkmenistan', 'TMT'),
(223, 'TN', 'Tunisia', 'TND'),
(224, 'TO', 'Tonga', 'TOP'),
(225, 'TR', 'Turkey', 'TRY'),
(226, 'TT', 'Trinidad and Tobago', 'TTD'),
(227, 'TV', 'Tuvalu', 'AUD'),
(228, 'TW', 'Taiwan', 'TWD'),
(229, 'TZ', 'Tanzania', 'TZS'),
(230, 'UA', 'Ukraine', 'UAH'),
(231, 'UG', 'Uganda', 'UGX'),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD'),
(233, 'US', 'United States', 'USD'),
(234, 'UY', 'Uruguay', 'UYU'),
(235, 'UZ', 'Uzbekistan', 'UZS'),
(236, 'VA', 'Vatican City', 'EUR'),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD'),
(238, 'VE', 'Venezuela', 'VEF'),
(239, 'VG', 'British Virgin Islands', 'USD'),
(240, 'VI', 'U.S. Virgin Islands', 'USD'),
(241, 'VN', 'Vietnam', 'VND'),
(242, 'VU', 'Vanuatu', 'VUV'),
(243, 'WF', 'Wallis and Futuna', 'XPF'),
(244, 'WS', 'Samoa', 'WST'),
(245, 'XK', 'Kosovo', 'EUR'),
(246, 'YE', 'Yemen', 'YER'),
(247, 'YT', 'Mayotte', 'EUR'),
(248, 'ZA', 'South Africa', 'ZAR'),
(249, 'ZM', 'Zambia', 'ZMW'),
(250, 'ZW', 'Zimbabwe', 'ZWL');

-- --------------------------------------------------------

--
-- Table structure for table `ecm_category`
--

CREATE TABLE `ecm_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `is_gshoppe` tinyint(1) NOT NULL DEFAULT 0,
  `image_file` varchar(225) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecm_category`
--

INSERT INTO `ecm_category` (`id`, `category_name`, `icon`, `is_gshoppe`, `image_file`, `updated_at`) VALUES
(1, 'Pakaian', 'w-icon-tshirt2', 1, '', NULL),
(2, 'Buku', 'w-icon-mobile', 1, '', NULL),
(3, 'Makanan', 'w-icon-ice-cream', 1, '', NULL),
(4, 'Kesihatan', 'w-icon-heartbeat', 1, '', NULL),
(5, 'Peralatan Latihan', 'w-icon-furniture', 1, '', NULL),
(6, 'Perkhidmatan', 'w-icon-money', 1, '', NULL),
(7, 'Sukan', 'w-icon-sport', 1, '', NULL),
(8, 'Pendidikan & Kursus', 'w-icon-chat', 1, '', NULL),
(9, 'Cenderahati', 'w-icon-gift', 1, '', NULL),
(10, 'Kenderaan', 'w-icon-truck', 0, 'shop/category/10/10.png', '2022-03-15 14:20:11'),
(11, 'Restoran', NULL, 0, 'shop/category/11/11.png', '2022-03-13 13:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `ecm_orders`
--

CREATE TABLE `ecm_orders` (
  `id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `product_price` decimal(11,2) NOT NULL DEFAULT 0.00,
  `ship_method` tinyint(1) NOT NULL DEFAULT 1,
  `ship_cost` decimal(11,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) DEFAULT NULL,
  `pay_status` varchar(50) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `paypal_order_id` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `billcode` varchar(255) DEFAULT NULL,
  `billName` varchar(255) DEFAULT NULL,
  `return_status` tinyint(1) DEFAULT NULL COMMENT 'Payment status. 1= success, 2=pending, 3=fail',
  `billDescription` varchar(100) NOT NULL,
  `billAmount` decimal(11,2) NOT NULL,
  `billTo` varchar(100) DEFAULT NULL,
  `billPhone` varchar(100) DEFAULT NULL,
  `return_response` text DEFAULT NULL,
  `callback_response` text DEFAULT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `toyyib_refno` varchar(255) DEFAULT NULL,
  `toyyib_reason` varchar(255) DEFAULT NULL,
  `payment_created` int(11) DEFAULT NULL,
  `settlement` tinyint(1) DEFAULT 0,
  `order_note` varchar(255) DEFAULT NULL,
  `bank_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecm_orders`
--

INSERT INTO `ecm_orders` (`id`, `total_price`, `product_price`, `ship_method`, `ship_cost`, `status`, `pay_status`, `fullname`, `email`, `transaction_id`, `paypal_order_id`, `created_at`, `created_by`, `billcode`, `billName`, `return_status`, `billDescription`, `billAmount`, `billTo`, `billPhone`, `return_response`, `callback_response`, `group_name`, `toyyib_refno`, `toyyib_reason`, `payment_created`, `settlement`, `order_note`, `bank_code`) VALUES
(11, '107.00', '100.00', 1, '7.00', 10, 'initiate', 'Iqram Rafien', 'iqramtest@gmail.com', 'TRAN_1658395252-0Wk9G2x6', NULL, 1658395252, NULL, NULL, NULL, NULL, '', '107.00', 'Iqram Rafien', '0176209665', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'PBBEMYKL'),
(12, '307.00', '300.00', 1, '7.00', 10, 'initiate', 'Iqram Rafien', 'iqramtest@gmail.com', 'TRAN_1658395288-wWchxZAg', NULL, 1658395288, NULL, NULL, NULL, NULL, '', '307.00', 'Iqram Rafien', '0176209665', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'PBBEMYKL');

-- --------------------------------------------------------

--
-- Table structure for table `ecm_order_addresses`
--

CREATE TABLE `ecm_order_addresses` (
  `order_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecm_order_addresses`
--

INSERT INTO `ecm_order_addresses` (`order_id`, `address`, `city`, `state_id`, `country_code`, `zipcode`, `phone`) VALUES
(11, 'No 123 Jalan Meranti Chabang Empat', 'Tumpat', 3, 'MY', '16210', '0176209665'),
(12, 'No 123 Jalan Meranti Chabang Empat', 'Tumpat', 3, 'MY', '16210', '0176209665');

-- --------------------------------------------------------

--
-- Table structure for table `ecm_order_items`
--

CREATE TABLE `ecm_order_items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `attr_mix` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecm_order_items`
--

INSERT INTO `ecm_order_items` (`id`, `product_name`, `attr_mix`, `product_id`, `unit_price`, `order_id`, `quantity`) VALUES
(7, '2i+Honey', NULL, 1, '100.00', 11, 1),
(8, '2i+Honey', NULL, 1, '100.00', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ecm_products`
--

CREATE TABLE `ecm_products` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL DEFAULT 1,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(2000) DEFAULT NULL,
  `weight` decimal(11,3) NOT NULL DEFAULT 0.000,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(2) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `item_order` int(11) NOT NULL DEFAULT 0,
  `ship_cost` decimal(11,2) NOT NULL DEFAULT 0.00,
  `ship_free` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecm_products`
--

INSERT INTO `ecm_products` (`id`, `seller_id`, `category_id`, `name`, `description`, `image`, `weight`, `price`, `stock`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `item_order`, `ship_cost`, `ship_free`) VALUES
(1, 0, NULL, '2i+Honey', NULL, NULL, '0.000', '100.00', 0, 0, NULL, NULL, NULL, NULL, 0, '7.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ecm_ship_rate`
--

CREATE TABLE `ecm_ship_rate` (
  `id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `weight_from` decimal(11,3) DEFAULT NULL,
  `weight_to` decimal(11,3) DEFAULT NULL,
  `ship_cost` decimal(11,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecm_ship_rate`
--

INSERT INTO `ecm_ship_rate` (`id`, `zone_id`, `weight_from`, `weight_to`, `ship_cost`) VALUES
(1, 1, '0.000', '0.500', '10.00'),
(2, 1, '0.510', '1.000', '11.00'),
(3, 1, '1.010', '1.500', '12.00'),
(4, 1, '1.510', '2.000', '13.00'),
(5, 1, '2.010', '2.500', '14.00'),
(6, 1, '2.510', '3.000', '15.00'),
(7, 1, '3.010', '3.500', '17.00'),
(8, 1, '3.510', '4.000', '19.00'),
(9, 1, '4.010', '4.500', '22.00'),
(10, 1, '4.510', '5.000', '25.00'),
(11, 2, '0.000', '0.500', '15.00'),
(12, 2, '0.510', '1.000', '20.00'),
(13, 2, '1.010', '1.500', '25.00'),
(14, 2, '1.510', '2.000', '30.00'),
(15, 2, '2.010', '2.500', '35.00'),
(16, 2, '2.510', '3.000', '40.00'),
(17, 2, '3.010', '3.500', '45.00'),
(18, 2, '3.510', '4.000', '50.00'),
(19, 2, '4.010', '4.500', '55.00'),
(20, 2, '4.510', '5.000', '60.00');

-- --------------------------------------------------------

--
-- Table structure for table `ecm_zone`
--

CREATE TABLE `ecm_zone` (
  `id` int(11) NOT NULL,
  `zone_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecm_zone`
--

INSERT INTO `ecm_zone` (`id`, `zone_name`) VALUES
(1, 'Semenanjung Malaysia'),
(2, 'Sabah / Sarawak');

-- --------------------------------------------------------

--
-- Table structure for table `ecm_zone_item`
--

CREATE TABLE `ecm_zone_item` (
  `id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecm_zone_item`
--

INSERT INTO `ecm_zone_item` (`id`, `zone_id`, `country_code`, `state_id`) VALUES
(1, 1, 'MY', 1),
(2, 1, 'MY', 2),
(3, 1, 'MY', 3),
(4, 1, 'MY', 4),
(5, 1, 'MY', 5),
(6, 1, 'MY', 6),
(7, 1, 'MY', 7),
(8, 1, 'MY', 8),
(9, 1, 'MY', 9),
(10, 1, 'MY', 12),
(11, 1, 'MY', 13),
(12, 1, 'MY', 14),
(13, 2, 'MY', 10),
(14, 2, 'MY', 11),
(15, 2, 'MY', 15);

-- --------------------------------------------------------

--
-- Table structure for table `fpx`
--

CREATE TABLE `fpx` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(225) NOT NULL,
  `bank_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpx`
--

INSERT INTO `fpx` (`id`, `bank_name`, `bank_code`) VALUES
(1, 'Affin Bank Berhad', 'PHBMMYKL'),
(2, 'AGROBANK / BANK PERTANIAN MALAYSIA BERHAD', 'BPMBMYKL'),
(3, 'Alliance Bank Malaysia Berhad', 'MFBBMYKL'),
(4, 'AL RAJHI BANKING & INVESTMENT CORPORATION (MALAYSIA) BERHAD', 'RJHIMYKL'),
(5, 'AmBank (M) Berhad', 'ARBKMYKL'),
(6, 'Bank Islam Malaysia Berhad', 'BIMBMYKL'),
(7, 'Bank Kerjasama Rakyat Malaysia Berhad', 'BKRMMYKL'),
(8, 'Bank Muamalat (Malaysia) Berhad', 'BMMBMYKL'),
(9, 'Bank Simpanan Nasional Berhad', 'BSNAMYK1'),
(10, 'CIMB Bank Berhad', 'CIBBMYKL'),
(11, 'Citibank Berhad', 'CITIMYKL'),
(12, 'Hong Leong Bank Berhad', 'HLBBMYKL'),
(13, 'HSBC Bank Malaysia Berhad', 'HBMBMYKL'),
(14, 'Kuwait Finance House', 'KFHOMYKL'),
(15, 'Maybank / Malayan Banking Berhad', 'MBBEMYKL'),
(16, 'OCBC Bank (Malaysia) Berhad', 'OCBCMYKL'),
(17, 'Public Bank Berhad', 'PBBEMYKL'),
(18, 'RHB Bank Berhad', 'RHBBMYKL'),
(19, 'Standard Chartered Bank (Malaysia) Berhad', 'SCBLMYKX'),
(20, 'United Overseas Bank (Malaysia) Berhad', 'UOVBMYKL');

-- --------------------------------------------------------

--
-- Table structure for table `negeri`
--

CREATE TABLE `negeri` (
  `negeri_name` varchar(15) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `negeri`
--

INSERT INTO `negeri` (`negeri_name`, `id`) VALUES
('Kelantan', 1),
('Johor', 2),
('Kedah', 3),
('Melaka', 4),
('Negeri Sembilan', 5),
('Pahang', 6),
('Perak', 7),
('Perlis', 8),
('Pulau Pinang', 9),
('Sabah', 10),
('Sarawak', 11),
('Selangor', 12),
('Terengganu', 13),
('WP Kuala Lumpur', 14),
('WP Labuan', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `status`, `password_reset_token`) VALUES
(1, 'admin', 'Admin', '', '$2y$10$G2CqfuUqiTshvYmzFbh/seDgLVXbHRvUrb8fu.8UxCHgyaF9vd3pG', '', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 10, ''),
(3, 'iqramtest@gmail.com', 'Iqram Rafien', 'iqramtest@gmail.com', '$2y$10$G2CqfuUqiTshvYmzFbh/seDgLVXbHRvUrb8fu.8UxCHgyaF9vd3pG', '', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `address`, `city`, `state`, `country`, `zipcode`, `phone`) VALUES
(1, 3, 'No 123 Jalan Meranti Chabang Empat', 'Tumpat', 3, 'MY', '16210', '0176209665');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_code` (`country_code`);

--
-- Indexes for table `ecm_category`
--
ALTER TABLE `ecm_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecm_orders`
--
ALTER TABLE `ecm_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-orders-created_by` (`created_by`);

--
-- Indexes for table `ecm_order_addresses`
--
ALTER TABLE `ecm_order_addresses`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `idx-order_addresses-order_id` (`order_id`);

--
-- Indexes for table `ecm_order_items`
--
ALTER TABLE `ecm_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-order_items-product_id` (`product_id`),
  ADD KEY `idx-order_items-order_id` (`order_id`);

--
-- Indexes for table `ecm_products`
--
ALTER TABLE `ecm_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-products-created_by` (`created_by`),
  ADD KEY `idx-products-updated_by` (`updated_by`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `ecm_ship_rate`
--
ALTER TABLE `ecm_ship_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecm_zone`
--
ALTER TABLE `ecm_zone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecm_zone_item`
--
ALTER TABLE `ecm_zone_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `fpx`
--
ALTER TABLE `fpx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `negeri`
--
ALTER TABLE `negeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `ecm_category`
--
ALTER TABLE `ecm_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ecm_orders`
--
ALTER TABLE `ecm_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ecm_order_items`
--
ALTER TABLE `ecm_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ecm_products`
--
ALTER TABLE `ecm_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ecm_ship_rate`
--
ALTER TABLE `ecm_ship_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ecm_zone`
--
ALTER TABLE `ecm_zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ecm_zone_item`
--
ALTER TABLE `ecm_zone_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fpx`
--
ALTER TABLE `fpx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `negeri`
--
ALTER TABLE `negeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
