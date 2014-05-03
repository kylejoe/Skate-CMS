-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2014 at 02:40 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skatedb`
--
CREATE DATABASE IF NOT EXISTS `skatedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `skatedb`;

-- --------------------------------------------------------

--
-- Table structure for table `skate`
--

CREATE TABLE IF NOT EXISTS `skate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(45) DEFAULT NULL,
  `deck` varchar(255) DEFAULT NULL,
  `pros` varchar(255) DEFAULT NULL,
  `cons` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `skate`
--

INSERT INTO `skate` (`id`, `brand`, `deck`, `pros`, `cons`, `price`, `image`, `description`) VALUES
(1, 'Girl', 'Girl 10 year OG re-issue series', 'Slick, 10 year old traditional clean cut re-issue Girl graphics on quality Girl decks', 'Perhaps tradition isn''t your cup of tea ...', 25.32, 'img/girl_skatedeck.jpg', 'Sweet re-issue of graphics from 10 years ago'),
(2, 'Powell', 'Powell Classic Street Issue Skateboard Deck', 'It''s a chunk of skateboarding history that you can hang on the wall, or ride', 'If you aren''t into classic skate styles, then you probably won''t be interested in this deck!', 39.99, 'img/PowellStreetIssue.jpg', 'The Powell Street Issue skateboard deck is shorter and skinnier than most skateboarding trick decks of today.'),
(3, 'Toy Machine', 'Part Animal Part Toy Machine', 'The toy Machine pro skateboarding team is strong, with riders like Marks, Templeton and more', 'Not really a lot wrong with Toy Machine decks - perhaps if they were free ...', 42.87, 'img/ToyMachineDeck.gif', 'Well built in the USA at the Tum Yeto skateboard factory'),
(4, 'Zero', 'Afterlife and Spellbound', 'Well made - Zero has been making decks for a long time, and knows how to do it right', 'There aren''t any cons, other than these boards don''t have any special technology hype', 40.33, 'img/ZeroDecks.gif', 'Zero skateboard decks are mostly black, with white graphics, though several have other colors');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
