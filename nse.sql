-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2021 at 06:04 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i5elegcj_strategyon`
--

-- --------------------------------------------------------

--
-- Table structure for table `nse`
--

CREATE TABLE `nse` (
  `symbol` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `open` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `close` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `high` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `low` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` date NOT NULL,
  `cdate` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `hma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `volume` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nse`
--

INSERT INTO `nse` (`symbol`, `series`, `open`, `close`, `high`, `low`, `date`, `timestamp`, `cdate`, `status`, `hma`, `volume`) VALUES
('SYMBOL', ' SERIES', ' OPEN_PRICE', ' LAST_PRICE', ' HIGH_PRICE', ' LOW_PRICE', ' DATE1', '2021-10-08', '08-Oct-2021', '', '20211008', '');
COMMIT;

CREATE TABLE `coin` (
  `coin` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `symboltoken` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `market` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `ch` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
coin(coin,symboltoken,market,date,ch)

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
