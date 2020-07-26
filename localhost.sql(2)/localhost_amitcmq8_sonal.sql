-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2019 at 07:11 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amitcmq8_sonal`
--
CREATE DATABASE IF NOT EXISTS `amitcmq8_sonal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `amitcmq8_sonal`;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `created_by` int(50) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `modified_by` int(50) NOT NULL,
  `modified_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 'WilliamEscox', 'raphaeedgemi@gmail.com', 'Ciao!  sonalchoudhary.in \r\n \r\nWe make available \r\n \r\nSending your commercial offer through the feedback form which can be found on the sites in the contact section. Feedback forms are filled in by our program and the captcha is solved. The superiority of this method is that messages sent through feedback forms are whitelisted. This method increases the probability that your message will be open. \r\n \r\nOur database contains more than 25 million sites around the world to which we can send your mess', 0, '2019-08-09 11:43:17.407309', 0, '0000-00-00'),
(2, 'Harlandcaw', 'noreplymonkeydigital@gmail.com', 'Hi there \r\nThe Local SEO package is built to rank local keywords for your local business in the google search and in google maps. We have researched for years what local SEO activities truly work and have put all in one single local SEO plan to accomplish the expected results and more. You will start seeing big increases in ranks from the 1st month of work already. You get monthly SEO reports and benchmark reports. \r\n \r\nhttps://monkeydigital.co/product/local-seo-package/ \r\n \r\nThanks and regards ', 0, '2019-08-30 00:06:38.772041', 0, '0000-00-00'),
(3, 'RonaldSaLge', 'grandallpugh@windstream.net', 'Here is  an interestingoffers for you. http://tulfelaret.tk/o85q5', 0, '2019-09-03 20:45:27.859916', 0, '0000-00-00'),
(4, 'Averyfaife', 'raphaeedgemi@gmail.com', 'Good day!  sonalchoudhary.in \r\n \r\nHave you ever heard of sending messages via contact forms? \r\n \r\nImagine that your letter will be readseen by hundreds of thousands of your probable buyerscustomers. \r\nYour message will not go to the spam folder because people will send the message to themselves. As an example, we have sent you our suggestion  in the same way. \r\n \r\nWe have a database of more than 30 million sites to which we can send your offer. Sites are sorted by country. Unfortunately, you can', 0, '2019-09-10 08:29:41.572801', 0, '0000-00-00'),
(5, 'CherylIntex', 'ftp@alpinadruck.com', 'We would like to inform that you liked a comment ID:35915743 in a social network , January 9, 2019 at 19:48 \r\nThis like has been randomly selected to win the seasonal Â«Like Of The YearÂ» 2019 award! \r\nhttp://facebook.com+email+@1310252231/sQH6Z', 0, '2019-09-16 10:34:48.352641', 0, '0000-00-00'),
(6, 'KarenzorgO', 'patsyCoazy@gmail.com', 'hi there \r\nWe all know there are no tricks with google anymore \r\nSo, instead of looking for ways to trick google, why not perform a whitehat results driven monthly SEO Plan instead. \r\n \r\nCheck out our plans \r\nhttps://googlealexarank.com/index.php/seo-packages/ \r\n \r\nWe know how to get you into top safely, without risking your investment during google updates \r\n \r\nthanks and regards \r\nMike \r\nstr8creativecom@gmail.com', 0, '2019-09-18 17:07:09.924441', 0, '0000-00-00'),
(7, 'DorothyWeNia', 'a.wanka@aerzteimdritten.at', 'We would like to inform that you liked a comment ID:35915743 in a social network , January 9, 2019 at 19:48 \r\nThis like has been randomly selected to win the seasonal Â«Like Of The YearÂ» 2019 award! \r\nhttp://facebook.com+prize+@1310252231/MHXQ5', 0, '2019-09-18 21:08:07.458076', 0, '0000-00-00'),
(8, 'Pedro Molina', 'pedrom@uicinsuk.com', 'Dear Sir, \r\nAm contacting you to partner with me to secure the life insurance of my late client, to avoid it being confiscated. For more information, please contact me on + 447452275874 or pedrom@uicinuk.com \r\nRegards \r\nPedro Molina', 0, '2019-10-09 10:53:54.004140', 0, '0000-00-00'),
(9, 'Dorothyzef', 'flachgau@buchhaltungplus.at', 'We would like to inform that you liked a comment ID:35915743 in a social network , January 9, 2019 at 19:48 \r\nThis like has been randomly selected to win the seasonal Â«Like Of The YearÂ» 2019 award! \r\nhttp://facebook.comÐ¿Ñ˜ÐmailÐ¿Ñ˜Ð@0X4E18DCC7/Wl15en', 0, '2019-10-12 17:05:31.853822', 0, '0000-00-00'),
(10, 'CrystalBit', 'office@bbpv.at', 'We would like to inform that you liked a comment ID:35915743 in a social network , January 9, 2019 at 19:48 \r\nThis like has been randomly selected to win the seasonal Â«Like Of The YearÂ» 2019 award! \r\nhttp://facebook.com+email+@1310252231/97ttx', 0, '2019-10-14 00:18:31.945838', 0, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
