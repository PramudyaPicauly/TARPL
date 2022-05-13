-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 06:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_sbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `adminname` varchar(30) NOT NULL,
  `adminpass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `adminname`, `adminpass`) VALUES
(0, 'admin', 'admin'),
(1, 'admin', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Table structure for table `cryptocurrencies`
--

CREATE TABLE `cryptocurrencies` (
  `crypto_id` int(3) NOT NULL,
  `crypto_name` varchar(30) NOT NULL,
  `crypto_symbol` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cryptocurrencies`
--

INSERT INTO `cryptocurrencies` (`crypto_id`, `crypto_name`, `crypto_symbol`) VALUES
(1, 'Bitcoin', 'BTC'),
(2, 'Ethereum', 'ETH'),
(3, 'Binance Coin', 'BNB'),
(4, 'Solana', 'SOL'),
(5, 'Cardano', 'ADA'),
(6, 'Ripple', 'XRP'),
(7, 'Coin micin', 'CM'),
(8, 'Coin Sultan', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `market_id` int(3) NOT NULL,
  `market_name` varchar(30) NOT NULL,
  `market_symbol` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`market_id`, `market_name`, `market_symbol`) VALUES
(1, 'IndonesianRupiah', 'IDR'),
(2, 'USDollar', 'USD'),
(3, 'Euro', 'EUR');

-- --------------------------------------------------------

--
-- Table structure for table `trading_pairs`
--

CREATE TABLE `trading_pairs` (
  `pair_id` int(3) NOT NULL,
  `crypto_id` int(3) NOT NULL,
  `market_id` int(3) NOT NULL,
  `pair_symbol` varchar(11) NOT NULL,
  `pair_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trading_pairs`
--

INSERT INTO `trading_pairs` (`pair_id`, `crypto_id`, `market_id`, `pair_symbol`, `pair_price`) VALUES
(1, 1, 1, 'BTC/IDR', 813000000),
(2, 1, 2, 'BTC/USD', 57000),
(3, 2, 1, 'ETH/IDR', 59790000),
(4, 2, 2, 'ETH/USD', 4190),
(5, 3, 1, 'BNB/IDR', 8070000),
(6, 3, 2, 'BNB/USD', 566),
(7, 4, 1, 'SOL/IDR', 3130000),
(8, 4, 2, 'SOL/USD', 220),
(9, 5, 1, 'ADA/IDR', 29000),
(10, 5, 2, 'ADA/USD', 2),
(11, 6, 1, 'XRP/IDR', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `user_`
--

CREATE TABLE `user_` (
  `user_id` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userpass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_`
--

INSERT INTO `user_` (`user_id`, `username`, `userpass`) VALUES
(0, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(3) NOT NULL,
  `pair` varchar(11) NOT NULL,
  `amount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `pair`, `amount`) VALUES
(3, 'BTC/IDR', 1),
(12, 'BNB/IDR', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cryptocurrencies`
--
ALTER TABLE `cryptocurrencies`
  ADD PRIMARY KEY (`crypto_id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`market_id`);

--
-- Indexes for table `trading_pairs`
--
ALTER TABLE `trading_pairs`
  ADD PRIMARY KEY (`pair_id`),
  ADD KEY `fk_markets` (`market_id`),
  ADD KEY `fk_cryptocurrencies` (`crypto_id`);

--
-- Indexes for table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trading_pairs`
--
ALTER TABLE `trading_pairs`
  ADD CONSTRAINT `fk_cryptocurrencies` FOREIGN KEY (`crypto_id`) REFERENCES `cryptocurrencies` (`crypto_id`),
  ADD CONSTRAINT `fk_markets` FOREIGN KEY (`market_id`) REFERENCES `markets` (`market_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
