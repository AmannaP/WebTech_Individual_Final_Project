-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 08:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minto_forex_bureau`
--

-- --------------------------------------------------------

--
-- Table structure for table `billpaymentproviders`
--

CREATE TABLE `billpaymentproviders` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `provider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billpaymentproviders`
--

INSERT INTO `billpaymentproviders` (`id`, `category`, `provider`) VALUES
(1, 'electricity', 'State Electricity Board'),
(2, 'electricity', 'Power Corporation'),
(3, 'electricity', 'City Electric Supply'),
(4, 'water', 'Municipal Water Works'),
(5, 'water', 'City Water Department'),
(6, 'water', 'Water Utility Services'),
(7, 'internet', 'National Broadband'),
(8, 'internet', 'Global Internet'),
(9, 'internet', 'City Fiber Network'),
(10, 'mobile', 'National Mobile Network'),
(11, 'mobile', 'Cellular Services'),
(12, 'mobile', 'Wireless Connect'),
(13, 'insurance', 'National Insurance'),
(14, 'insurance', 'Life Protect'),
(15, 'insurance', 'Global Health Insurance'),
(16, 'subscription', 'Streaming Service'),
(17, 'subscription', 'Cloud Storage'),
(18, 'subscription', 'Digital Magazines');

-- --------------------------------------------------------

--
-- Table structure for table `billpayments`
--

CREATE TABLE `billpayments` (
  `payment_id` int(11) NOT NULL,
  `bill_category` varchar(100) NOT NULL,
  `service_provider` varchar(100) NOT NULL,
  `customer_account_number` varchar(50) NOT NULL,
  `bill_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billpayments`
--

INSERT INTO `billpayments` (`payment_id`, `bill_category`, `service_provider`, `customer_account_number`, `bill_amount`, `payment_method`, `payment_date`) VALUES
(1, 'water', 'Municipal Water Works', '5203265412', 520.00, '0', '2024-12-19 21:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `currency_name` varchar(100) NOT NULL,
  `buy_rate` decimal(10,4) NOT NULL,
  `sell_rate` decimal(10,4) NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencytransactions`
--

CREATE TABLE `currencytransactions` (
  `currency_transaction_id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currencytransactions`
--

INSERT INTO `currencytransactions` (`currency_transaction_id`, `FirstName`, `LastName`, `country`, `currency`, `amount`) VALUES
(2, 'Chika', 'Amanna', 'Ghana', 'GHS', 34.00);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `first_name`, `last_name`, `email`, `message`, `created_at`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 'Great service! Keep it up.', '2024-12-17 13:47:02'),
(2, 'Jane', 'Smith', 'jane.smith@example.com', 'I had an excellent experience. Thank you!', '2024-12-17 13:47:02'),
(3, 'Alice', 'Johnson', 'alice.johnson@example.com', 'The website is user-friendly and intuitive.', '2024-12-17 13:47:02'),
(4, 'Bob', 'Brown', 'bob.brown@example.com', 'I encountered an issue with the payment process.', '2024-12-17 13:47:02'),
(5, 'Emily', 'Davis', 'emily.davis@example.com', 'Looking forward to more updates and features.', '2024-12-17 13:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `moneytransfers`
--

CREATE TABLE `moneytransfers` (
  `transfer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient_email` varchar(100) NOT NULL,
  `recipient_phone` varchar(20) NOT NULL,
  `recipient_name` varchar(100) NOT NULL,
  `recipient_country` varchar(50) NOT NULL,
  `recipient_bank` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transfer_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `RateID` int(11) NOT NULL,
  `CurrencyPair` varchar(7) NOT NULL,
  `BuyRate` decimal(10,4) NOT NULL,
  `SellRate` decimal(10,4) NOT NULL,
  `UpdatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `TransactionType` enum('Buy','Sell') DEFAULT NULL,
  `currency_from` varchar(20) NOT NULL,
  `ExchangeRate` decimal(10,4) DEFAULT NULL,
  `TransactionAmount` decimal(15,2) DEFAULT NULL,
  `TransactionDate` datetime DEFAULT NULL,
  `currency_to` varchar(20) NOT NULL,
  `amount_from` varchar(20) NOT NULL,
  `amount_to` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` varchar(120) DEFAULT NULL,
  `Address` varchar(120) DEFAULT NULL,
  `Country` varchar(120) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff','customer') NOT NULL DEFAULT 'customer',
  `created_at` datetime DEFAULT NULL,
  `DateOfBirth` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `Address`, `Country`, `password`, `role`, `created_at`, `DateOfBirth`) VALUES
(15, 'Chika', 'Amanna', 'chika@gmail.com', '', 'No.1 University Ave, Ashesi University, Ghana', 'Ghana', '$2y$10$99f1jOTpncESibWqXqVv8ObE7VTlsZ2xeDFmqy/98wNLjjYcwk3mK', 'admin', '2024-12-17 16:36:32', '2024-10-03 00:00:00'),
(16, 'kosi', 'chukwu', 'kosi@gmail.com', '', 'No.1 University Ave, Ashesi University, Ghana', 'Ghana', '$2y$10$kNf1wSu5oPHOyu/FLZ5Lh.BN0EAcLbkeP.KqogmnY7pY3HZyj.W8e', 'customer', '2024-12-17 16:41:51', '2024-10-01 00:00:00'),
(17, 'Josh', 'T2funny', 'josh@school.edu', '', 'No.1 University Ave, Ashesi University, Ghana', 'Ghana', '$2y$10$7yD8iEFnPGz/C7uWDdsZ1OUi8ojaT5KiMz7l2JShb9v7Ff4MqR52C', 'customer', '2024-12-17 21:09:03', '2024-10-17 00:00:00'),
(18, 'Chidi', 'Nma', 'chidi@gmail.com', '', 'No.1 University Ave, Ashesi University, Ghana', 'Ghana', '$2y$10$FyDWv3/ZvxbuPrFNDLogU.2bUavCr8F5FgnbQUEZ7y1RLZBPyRzy2', 'customer', '2024-12-18 14:52:29', '2024-12-01 00:00:00'),
(19, 'Mine', 'Name', 'myname@gmail.com', '', 'No.1 University Ave, Ashesi University, Ghana', 'Ghana', '$2y$10$tvbNi0H.AKThyamqVeN2quskobDYmqf5ejd/4jFlQ/7MiFqXGCxDO', 'customer', '2024-12-18 15:01:16', '2024-12-03 00:00:00'),
(20, 'Mine', 'Name', 'myname@gmail.com', '08060696617', 'No.1 University Ave, Ashesi University, Ghana', 'Ghana', '$2y$10$7/jmZT2O9tu6WIL2RmPQwODqdJRhGH1RWqr0pkvXa.Hls4FmLtCHq', 'customer', '2024-12-18 15:06:27', '2024-12-03 00:00:00'),
(21, 'Splendour', 'Kalu', 'kalu@gmail.com', '5269874245', 'No.1 University Ave, Ashesi University, Ghana', 'Ghana', '$2y$10$fWq3pVQSBuuVGBThi7vHueR/KmSQSqcl7Gn58481MrW5luzWtRM7e', 'customer', NULL, '2024-10-10 00:00:00'),
(22, 'Emeka', 'Nweke', 'emeka@gmail.com', '0102456845', 'No.1 University Ave, Ashesi University, Ghana', 'Ghana', '$2y$10$tQgY8TGCbYbU5kg7R0D1Aul8y2nCEB2mjGxgObc9BNv08u2a7K9Bm', 'customer', NULL, '2024-11-07 00:00:00'),
(23, 'Elikem', 'Asudo', 'elikem@gmail.com', '0502364285', 'No.1 University Ave, Ashesi University, Ghana', 'Ghana', '$2y$10$ic.s71Op0txLmz2mINaqeO3WipiQq3wyix0xKgs9JlO9m/FnId/DS', 'admin', NULL, '2024-11-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_balances`
--

CREATE TABLE `user_balances` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `currency` varchar(10) DEFAULT 'USD',
  `balance` decimal(10,2) DEFAULT 100.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_balances`
--

INSERT INTO `user_balances` (`id`, `user_id`, `currency`, `balance`) VALUES
(1, 19, 'USD', 100.00),
(2, 20, 'USD', 100.00),
(3, 21, 'USD', 100.00),
(4, 22, 'USD', 100.00),
(5, 23, 'USD', 100.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billpaymentproviders`
--
ALTER TABLE `billpaymentproviders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billpayments`
--
ALTER TABLE `billpayments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currency_id`),
  ADD UNIQUE KEY `currency_code` (`currency_code`);

--
-- Indexes for table `currencytransactions`
--
ALTER TABLE `currencytransactions`
  ADD PRIMARY KEY (`currency_transaction_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moneytransfers`
--
ALTER TABLE `moneytransfers`
  ADD PRIMARY KEY (`transfer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`RateID`),
  ADD UNIQUE KEY `UC_CurrencyPair` (`CurrencyPair`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `CustomerID` (`user_id`),
  ADD KEY `FK_CurrencyPair` (`currency_from`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_balances`
--
ALTER TABLE `user_balances`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billpaymentproviders`
--
ALTER TABLE `billpaymentproviders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `billpayments`
--
ALTER TABLE `billpayments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencytransactions`
--
ALTER TABLE `currencytransactions`
  MODIFY `currency_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `moneytransfers`
--
ALTER TABLE `moneytransfers`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `RateID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_balances`
--
ALTER TABLE `user_balances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `moneytransfers`
--
ALTER TABLE `moneytransfers`
  ADD CONSTRAINT `moneytransfers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK_CurrencyPair` FOREIGN KEY (`currency_from`) REFERENCES `rates` (`CurrencyPair`),
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
