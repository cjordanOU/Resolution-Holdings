-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 08:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resolution-holdings`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MEMBER_ID` int(11) NOT NULL COMMENT 'Auto Incrementing member ID.',
  `FIRST_NAME` tinytext NOT NULL COMMENT 'The first name of the member.',
  `LAST_NAME` tinytext NOT NULL COMMENT 'The last name of the member.',
  `MIDDLE_INITIAL` tinytext NOT NULL COMMENT 'The middle initial of the member if applicable.',
  `DOB` date NOT NULL COMMENT 'The date of birth of the member.',
  `MEMBER_SINCE` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'When the member''s account was created.',
  `GENDER` enum('M','F','O') NOT NULL COMMENT 'The member''s gender.',
  `PHONE_NUMBER` tinytext DEFAULT NULL COMMENT 'The member''s phone number.',
  `ADDRESS` text NOT NULL COMMENT 'The member''s home address.',
  `EMAIL` tinytext DEFAULT NULL COMMENT 'The member''s email.',
  `USERNAME` tinytext NOT NULL COMMENT 'The member''s username.',
  `PASSWORD` tinytext NOT NULL COMMENT 'The member''s password. Hashed and salted for security purposes.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MEMBER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MEMBER_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incrementing member ID.';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE ACCOUNTS(ACCOUNT_ID INT(42), ACCOUNT_BALACE DOUBLE(10,2), ACCOUNT_TYPE ENUM('checking', 'saving'), CREATED DATETIME, ACCOUNT_STATUS ENUM('open', 'closed', 'frozen'), MEMBER_ID INT(42),
PRIMARY KEY (ACCOUNT_ID),
FOREIGN KEY (MEMBER_ID) REFERENCES members(MEMBER_ID)
);

CREATE TABLE TRANSACTIONS(TRANSACTION_ID INT(42) NOT NULL AUTO_INCREMENT, PERFORMED DATETIME, AMOUNT DOUBLE(10, 2), DESCRIPTION TEXT, TYPE ENUM('withdraw', 'deposit', 'fee'), ACCOUNT_ID INT(42),
PRIMARY KEY (TRANSACTION_ID),
FOREIGN KEY (ACCOUNT_ID) REFERENCES ACCOUNTS(ACCOUNT_ID)
);

CREATE TABLE LOGIN_ATTEMPTS(ATTEMPT INT(42), TIME DATETIME, SUCCESS TINYINT(1), MEMBER_ID INT(42),
PRIMARY KEY(ATTEMPT),
FOREIGN KEY(MEMBER_ID) REFERENCES members(MEMBER_ID)
);

CREATE TABLE EMPLOYEES(MEMBER_ID INT(42), HIRED DATETIME, WHEN_TERMINATED DATETIME, SALARY DOUBLE(10,2),
PRIMARY KEY (MEMBER_ID),
FOREIGN KEY (MEMBER_ID) REFERENCES members(MEMBER_ID)
);
