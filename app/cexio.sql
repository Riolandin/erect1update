-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2021 at 09:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cexio`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `sn` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `dollar` varchar(50) NOT NULL,
  `euro` varchar(50) NOT NULL,
  `bit` varchar(50) NOT NULL,
  `eth` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`sn`, `id`, `dollar`, `euro`, `bit`, `eth`) VALUES
(1, '5721136977', '80.69999999999999', '0.00', '0.0', '0.0'),
(2, '115887394515989524739', '400000.1', '0.00', '0.0', '0.0'),
(3, '112788816849878806644', '9.87', '0.00', '0.0', '0.0'),
(4, '104752876112185585152', '0.00', '0.00', '10', '0.00000000');

-- --------------------------------------------------------

--
-- Table structure for table `apis`
--

CREATE TABLE `apis` (
  `sn` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `public` varchar(1000) DEFAULT NULL,
  `private` varchar(1000) DEFAULT NULL,
  `redirect` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apis`
--

INSERT INTO `apis` (`sn`, `name`, `public`, `private`, `redirect`) VALUES
(1, 'google', '818881695167-96f0chbv1pctnltdcf2n8kunrkctqei3.apps.googleusercontent.com', 'rdquOpaJHjbW3Qkbs-6tM97G', 'http://localhost/erect1/app/google.php'),
(2, 'facebook', '2d86a2195bf92a7515065c69d1041221', '174465544659598', 'http://localhost/erect1/app/facebook.php'),
(3, 'stripe', NULL, 'sk_test_51JB7jpG61ITNwdfRCiJ1FMnTBU0wxdddK5tmKoE9oWuMI8AqjdFw0RY15h8Grag5sdNVwGHptd9iQM7dtjzfv0LL00TrMyEhXs', NULL),
(4, 'paystack', 'pk_test_99d69caec3f4f9bcf55f1f96a7c89a5653e2d80c', 'sk_test_98da44136d9c75dc67f3124016fdec282daf82bb', NULL),
(5, 'block', NULL, '2KgicsP3iWhaWBNjtgSmNRK7zMWYT4yeHvDQUKfINqU', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `btc_transaction`
--

CREATE TABLE `btc_transaction` (
  `id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `satoshi` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `xpub` varchar(255) DEFAULT NULL,
  `timestamp` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `txid` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `paid_satoshi` varchar(255) DEFAULT NULL,
  `date time` timestamp NOT NULL DEFAULT current_timestamp(),
  `myid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `btc_transaction`
--

INSERT INTO `btc_transaction` (`id`, `status`, `emailid`, `satoshi`, `description`, `xpub`, `timestamp`, `uuid`, `value`, `txid`, `currency`, `code`, `address`, `paid_satoshi`, `date time`, `myid`) VALUES
(1, '0', 'riolandadedamola@gmail.com', '3367354', NULL, 'xpub6DKXyh1nJgzt57LSv8239YUViJY6eMY6p7Z8jkaYr9z8qiccZaXo39BLdVim6zpRrjSMyLfCrqoxp9BXG39K7xdVhuvXcNjxNkE7NB1WJrQ', '1626823588', '8faa0efd25db45b88338', '1000', NULL, 'USD', 'Deposit', '19ChBRQQCvojfxomwG3f7HajqTzdHm2MZu', '0', '2021-07-28 14:36:44', '1'),
(2, '2', 'riolandadedamola@gmail.com', '24764', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627502275', 'c092e38675da42748808', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', '9876000', '2021-07-28 20:03:58', '104752876112185585152'),
(3, '2', 'riolandadedamola@gmail.com', '24764', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627502275', 'c092e38675da42748808', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', '9876000', '2021-07-28 20:07:46', '104752876112185585152'),
(4, '2', 'riolandadedamola@gmail.com', '24764', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627502275', 'c092e38675da42748808', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', '9876000', '2021-07-28 20:08:14', '104752876112185585152'),
(5, '2', 'riolandadedamola@gmail.com', '24764', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627502275', 'c092e38675da42748808', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', '9876000', '2021-07-28 20:09:18', '104752876112185585152'),
(6, '2', 'riolandadedamola@gmail.com', '24764', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627502275', 'c092e38675da42748808', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', '9876000', '2021-07-28 20:09:46', '104752876112185585152'),
(8, '1', 'riolandadedamola@gmail.com', '25238', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627520497', '005dabc2118b48c583c7', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '184ejk3FRE193PWcvBb5EskDTfopwcQeen', '8000000000', '2021-07-29 01:02:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `sn` int(11) NOT NULL,
  `id` varchar(100) DEFAULT NULL,
  `card_number` varchar(100) DEFAULT NULL,
  `expedite` varchar(100) DEFAULT NULL,
  `ccv` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`sn`, `id`, `card_number`, `expedite`, `ccv`) VALUES
(1, '115887394515989524739', '43245324565461546', '19/24', '567'),
(2, '115887394515989524739', '33344677746667367377', '12/24', '778'),
(3, '115887394515989524739', '3546636636335353', '12/25', '123'),
(4, '115887394515989524739', '4544545454545454545', '06/45', '6767'),
(5, '115887394515989524739', '4544545454545454545', '06/45', '6767'),
(6, '112788816849878806644', '4544545454545454545', '44/88', '445');

-- --------------------------------------------------------

--
-- Table structure for table `payments_trasact`
--

CREATE TABLE `payments_trasact` (
  `id` int(11) NOT NULL,
  `txid` varchar(256) DEFAULT NULL,
  `addr` varchar(256) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `mid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments_trasact`
--

INSERT INTO `payments_trasact` (`id`, `txid`, `addr`, `value`, `status`, `mid`) VALUES
(1, 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', 151259, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `uid` varchar(500) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `reference` varchar(400) DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL,
  `trans` varchar(500) DEFAULT NULL,
  `transaction` varchar(255) DEFAULT NULL,
  `trxref` varchar(255) DEFAULT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `uid`, `message`, `reference`, `status`, `trans`, `transaction`, `trxref`, `orderdate`, `amount`) VALUES
(2, '115887394515989524739', 'Approved', '201891259', 'success', '1221325955', '1221325955', '201891259', '2021-07-16 17:21:54', ''),
(3, '115887394515989524739', 'Approved', '648046545', 'success', '1221334901', '1221334901', '648046545', '2021-07-16 17:30:32', '100000'),
(4, '115887394515989524739', 'Approved', '80474061', 'success', '1221342519', '1221342519', '80474061', '2021-07-16 17:38:31', '100000'),
(5, '115887394515989524739', 'Approved', '744983751', 'success', '1221344096', '1221344096', '744983751', '2021-07-16 17:39:29', '100000'),
(6, '115887394515989524739', 'Approved', '379342210', 'success', '1221344568', '1221344568', '379342210', '2021-07-16 17:39:58', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(40) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `auth_token` varchar(1000) DEFAULT NULL,
  `reset_pass_token` varchar(500) DEFAULT NULL,
  `token_date` varchar(1000) DEFAULT NULL,
  `is_verify` tinyint(1) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `gender` varchar(1000) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `country`, `auth_token`, `reset_pass_token`, `token_date`, `is_verify`, `name`, `picture`, `gender`, `created_at`) VALUES
('104752876112185585152', 'riotech2222@gmail.com', '104752876112185585152', 'not set', '4d27ba140ef5a7ffd9129f92fa15128c', NULL, NULL, NULL, 'Rio Tech', 'https://lh3.googleusercontent.com/a/AATXAJytmBsEzdsiWnAmky0xPbw4EMg_135o57T7ziVS=s96-c', NULL, '2021-07-28'),
('112788816849878806644', 'riolandadedamola@gmail.com', '112788816849878806644', 'not set', '469bf1cb8720b512ce92ca1403d586f8', NULL, NULL, NULL, 'Adedamola Rioland', 'https://lh3.googleusercontent.com/a/AATXAJx96qGEWsO9wk0l0yv6Hg3m6gINFgiuDBliikzB=s96-c', NULL, '2021-07-11'),
('115887394515989524739', 'apezcodes@gmail.com', '115887394515989524739', 'not set', '4ddfc2d64165ea1dbfdab7843d473ae9', NULL, NULL, NULL, 'apez codes', 'https://lh3.googleusercontent.com/a/AATXAJx7t5dC-p9ZihvdjcaBRlAWvsOt9ZshocsJMxvV=s96-c', NULL, '2021-07-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `apis`
--
ALTER TABLE `apis`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `btc_transaction`
--
ALTER TABLE `btc_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `payments_trasact`
--
ALTER TABLE `payments_trasact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `apis`
--
ALTER TABLE `apis`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `btc_transaction`
--
ALTER TABLE `btc_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments_trasact`
--
ALTER TABLE `payments_trasact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
