-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 19, 2021 at 09:43 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imdstagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentText` text NOT NULL,
  `isLiked` tinyint(1) NOT NULL,
  `commentDate` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
CREATE TABLE IF NOT EXISTS `followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isFollower` int(11) NOT NULL,
  `isFollowing` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isFollower` (`isFollower`,`isFollowing`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `isLiked` tinyint(1) NOT NULL,
  `postedDate` datetime NOT NULL,
  `filters` enum('black&white','sepia') NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `dateCreated` date DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `isPrivate` tinyint(1) DEFAULT NULL,
  `follower_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `bio`, `dateCreated`, `isAdmin`, `isPrivate`, `follower_id`) VALUES
(6, 'user1', 'user1@test.be', '$2y$15$daA/8yQSFv3fHtW/ue4CM.aaV52T/LO8tHs2BBdl2zcWrJwXwoa4u', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'tester', 'test@tester.com', '$2y$15$cEXtFgN3fA/17u.UhCAT2OyvbKEqQXLEtxFHZFabvYKlbewq3PV2S', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'usertest', 'test123@test.be', '$2y$15$ra3iR27Cb8XQ8XYbtaI/W.qC9Di4L1Wj4B/0ja.ywLYBTRc2Tgwf6', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'miyaatest', 'miyaa@test.com', '$2y$15$s0frXt06KCMcoCBeW8vrpODfgysQJqbnwvSw7SYxGjOQIK2cocNTy', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'testtttt', 'check@test.be', '$2y$15$i6CB2jBtSLDZxxQIx9nsZ.uiGch7FaFHT6CtqGNyXrHxJ.ziINF3q', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'joo', 'hey@joo.com', '$2y$15$1YmiZG4gecE0NwmIraZUb.OTw1u2vdRRRO5Zqh7MHrMLgVnkLY7Tq', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'uwu', 'herro@jpn.co', '$2y$15$cu5HhR/G2pYgv3n9dmtBi.aeWUXIo/3cQ95692XUZ4xFTzzWKW9iq', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'uwu', 'herro@jpn.co', '$2y$15$d.3o.1vqaSGtY5kQWJAf1uFOT5cvTC1GkK.JzWh7azzT9JSus70pq', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'test123', 'test@test.be', '$2y$15$zRkztXp.viG8GXJqmMBk3unrGJdX9VxxPUz9mdDWf/pY2HXoCjNju', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'tester', 'test@test.be', '$2y$15$vVgcM1D0mrXjn61.9G/moulsVQ46EkPAFkystC4J.KZAlgS.ryciO', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'chibikun', 'chibi@gmail.com', '$2y$15$izrs1JqUMxLNkcEhEhA8ne9p0VYNpwBiSW8dM1et0UtmLRNAwX0kC', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'tests', 'chapachapa@lol.com', '$2y$15$r/ASjvDtMbXAJm4KUKIX.uj.P85Q/a1tIwKhu/MmWXqA7Xaa1h0sq', NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
