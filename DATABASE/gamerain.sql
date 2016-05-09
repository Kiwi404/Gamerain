-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 09 mei 2016 om 09:51
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `gamerain`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `genre` text NOT NULL,
  `platform` varchar(100) NOT NULL,
  `videoUrl` text NOT NULL,
  `screenshotUrls` text NOT NULL,
  `price` double NOT NULL,
  `coverUrl` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Gegevens worden geëxporteerd voor tabel `games`
--

INSERT INTO `games` (`ID`, `name`, `description`, `date`, `genre`, `platform`, `videoUrl`, `screenshotUrls`, `price`, `coverUrl`) VALUES
(1, 'Minecraft', '-', '2013-03-20', 'Survival', 'PC', '-', '-', 20, '../../../public/userImg/minecraft.jpg'),
(2, 'Fallout 3', '-', '2008-12-04', 'RPG', 'PC', 'https://www.youtube.com/watch?v=iYZpR51XgW0', 'http://img.techpowerup.org/081029/Fallout3%20Building.jpg+http://untitled-magazine.com/online/wp-content/uploads/2015/04/Fallout-3-Screenshot.jpg', 49, '../../../public/userImg/fallout3.PNG'),
(3, 'Borderlands', '-', '2009-10-30', 'RPG, Shooter', 'PC', 'https://www.youtube.com/watch?v=v3ZWbpce_Os', 'http://www.bluesnews.com/screenshots/games/borderlands/20090430/borderlands_new_look_april_2009_4.jpg+http://www.bluesnews.com/screenshots/games/borderlands/20090819/gamescom_12.jpg', 49, '../../../public/userImg/borderlands.jpg'),
(4, 'Bioshock', '-', '2007-08-24', 'RPG, Shooter', 'PC', 'https://www.youtube.com/watch?v=Lmw78t8NgIE', 'http://syllogizing.com/images/bioshock/bioshock16.jpg+http://www.2kgames.com/bioshock/html/screenshots/screenshot_08_xl.jpg', 49, '../../../public/userImg/bioshock.jpg'),
(5, 'Skyrim', '-', '2011-11-11', 'RPG', 'Xbox', 'https://www.youtube.com/watch?v=PjqsYzBrP-M', 'https://i.ytimg.com/vi/hAhViaVqaJs/maxresdefault.jpg+https://i.ytimg.com/vi/Q2ouSfybEY0/maxresdefault.jpg', 49, '../../../public/userImg/skyrim.jpg'),
(6, 'Metal Gear Solid V', '-', '2016-04-14', 'RPG, Shooter', 'Xbox', 'https://www.youtube.com/watch?v=9_8Qi-I4o9E', 'http://www.metalgearinformer.com/wp-content/uploads/2015/06/Metal-Gear-Solid-V-The-Phantom-Pain-Screenshot-8.jpg+http://www.lightninggamingnews.com/wp-content/uploads/2013/06/Metal-Gear-Solid-V-The-Phantom-Pain-%E2%80%93-E3-2013-extended-Trailer-screenshots-Lightninggamingnews-2-1024x576.jpg', 49, '../../../public/userImg/metal_gear.jpg'),
(7, 'Battlefield 4', '-', '2014-06-26', 'Shooter', 'Xbox', '-', '-', 50, '../../../public/userImg/battlefield_4.jpg'),
(8, 'Borderlands 2', '-', '2013-04-16', 'RPG, Shooter', 'Xbox', '-', '-', 45, '../../../public/userImg/borderlands2.PNG'),
(9, 'Bioshock 2', '-', '2012-06-21', 'RPG, Shooter', 'Playstation', '-', '-', 49, '../../../public/userImg/bioshock2.jpg'),
(10, 'Fallout New Vegas', '-', '2011-06-15', 'RPG, Shooter', 'Playstation', '-', '-', 50, '../../../public/userImg/fallout_new_vegas.PNG'),
(11, 'Battlefield Hardline', '-', '2013-11-04', 'Shooter', 'Playstation', '-', '-', 45, '../../../public/userImg/battlefield_hardline.jpg'),
(12, 'Bioshock Infinite ', '-', '2013-06-12', 'RPG, Shooter', 'Playstation', '-', '-', 50, '../../../public/userImg/bioshock_inf.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Gegevens worden geëxporteerd voor tabel `order`
--

INSERT INTO `order` (`ID`, `user_id`, `discount`, `date`, `status`) VALUES
(6, 1, 0, '2015-10-14', 'done'),
(7, 1, 0, '2015-10-14', 'done'),
(8, 1, 0, '2015-10-14', 'payed'),
(9, 1, 0, '2015-10-14', 'payed'),
(10, 1, 0, '2015-10-14', 'payed'),
(11, 1, 0, '2015-10-14', 'payed'),
(12, 1, 0, '2015-10-14', 'done'),
(13, 1, 0, '2015-10-14', 'payed'),
(14, 1, 0, '2015-10-14', 'payed'),
(15, 1, 0, '2015-10-14', 'payed'),
(16, 1, 0, '0000-00-00', 'payed'),
(17, 1, 0, '0000-00-00', 'payed'),
(18, 1, 0, '2015-10-28', 'payed'),
(19, 1, 0, '2015-10-28', 'payed'),
(20, 1, 0, '2015-10-28', 'payed'),
(21, 1, 0, '2015-10-28', 'payed'),
(22, 1, 0, '2015-10-28', 'payed'),
(23, 1, 0, '2015-10-28', 'payed'),
(24, 1, 0, '2015-10-28', 'payed'),
(25, 1, 0, '2015-10-28', 'payed'),
(26, 1, 0, '2015-10-28', 'payed'),
(27, 1, 0, '2015-10-28', 'payed'),
(28, 1, 0, '2015-10-28', 'payed'),
(29, 1, 0, '2015-10-28', 'payed'),
(30, 1, 0, '2015-10-28', 'payed'),
(31, 1, 0, '2015-10-28', 'payed'),
(32, 1, 0, '2015-10-28', 'payed'),
(33, 1, 0, '2015-10-29', 'payed'),
(34, 1, 0, '2015-10-29', 'payed'),
(35, 1, 0, '2015-10-29', 'payed'),
(36, 1, 0, '2015-10-29', 'payed'),
(37, 1, 0, '2015-10-29', 'payed'),
(38, 1, 0, '2015-10-29', 'payed'),
(39, 1, 0, '2015-10-29', 'payed'),
(40, 1, 0, '2015-10-29', 'payed'),
(41, 1, 0, '2015-10-29', 'payed'),
(42, 1, 0, '2015-10-29', 'payed'),
(43, 1, 0, '2015-10-29', 'payed'),
(44, 1, 0, '2015-10-29', 'payed'),
(45, 1, 0, '2015-10-29', 'payed'),
(46, 1, 0, '2015-10-29', 'done'),
(47, 1, 0, '2015-10-29', 'payed'),
(48, 1, 0, '2015-10-29', 'done'),
(49, 1, 0, '2015-10-29', 'done'),
(50, 1, 0, '2015-10-29', 'done'),
(51, 1, 0, '2015-11-02', 'payed'),
(52, 1, 10, '2015-11-11', 'done'),
(53, 1, 0, '2015-11-11', 'payed'),
(54, 1, 0, '2015-11-11', 'payed'),
(55, 1, 0, '2015-11-11', 'payed'),
(56, 1, 0, '2015-11-11', 'payed'),
(57, 1, 0, '2015-11-11', 'payed'),
(58, 1, 0, '2015-11-11', 'payed'),
(59, 1, 0, '2015-11-11', 'payed'),
(60, 1, 0, '2015-11-11', 'payed'),
(61, 1, 0, '2015-11-11', 'payed'),
(62, 1, 0, '2015-11-11', 'payed'),
(63, 1, 0, '2015-11-11', 'payed'),
(64, 1, 0, '2015-11-11', 'payed'),
(65, 1, 0, '2015-11-11', 'payed'),
(66, 1, 0, '2015-11-11', 'payed'),
(67, 1, 0, '2015-11-11', 'payed'),
(68, 1, 0, '2015-11-11', 'done'),
(69, 1, 0, '2015-11-11', 'done'),
(70, 1, 0, '2015-11-11', 'payed'),
(71, 1, 0, '2015-11-11', 'payed'),
(72, 1, 0, '2015-11-12', 'payed'),
(73, 1, 0, '2015-11-12', 'payed'),
(74, 1, 0, '2015-11-12', 'payed'),
(75, 1, 0, '2015-11-12', 'payed'),
(76, 1, 0, '2015-11-12', 'payed'),
(77, 1, 0, '2016-02-15', 'payed');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_row`
--

CREATE TABLE IF NOT EXISTS `order_row` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=210 ;

--
-- Gegevens worden geëxporteerd voor tabel `order_row`
--

INSERT INTO `order_row` (`ID`, `order_id`, `game_id`) VALUES
(25, 6, 5),
(26, 6, 3),
(27, 6, 3),
(28, 6, 3),
(29, 6, 12),
(30, 6, 12),
(31, 7, 5),
(32, 7, 3),
(33, 7, 3),
(34, 7, 3),
(35, 7, 12),
(36, 7, 12),
(37, 8, 5),
(38, 8, 3),
(39, 8, 3),
(40, 8, 3),
(41, 8, 12),
(42, 8, 12),
(43, 9, 5),
(44, 9, 3),
(45, 9, 3),
(46, 9, 3),
(47, 9, 12),
(48, 9, 12),
(61, 12, 5),
(62, 12, 3),
(63, 12, 3),
(64, 12, 3),
(65, 12, 12),
(66, 12, 12),
(67, 14, 5),
(68, 16, 3),
(69, 16, 3),
(70, 17, 3),
(71, 17, 3),
(72, 18, 3),
(73, 18, 3),
(74, 19, 3),
(75, 19, 3),
(76, 20, 3),
(77, 20, 3),
(78, 21, 3),
(79, 21, 3),
(80, 22, 3),
(81, 22, 3),
(82, 23, 3),
(83, 23, 3),
(84, 24, 3),
(85, 24, 3),
(86, 25, 3),
(87, 25, 3),
(88, 26, 3),
(89, 26, 3),
(90, 27, 3),
(91, 27, 3),
(92, 28, 3),
(93, 28, 3),
(94, 29, 12),
(95, 29, 12),
(96, 0, 5),
(97, 0, 5),
(98, 0, 4),
(99, 0, 4),
(100, 0, 5),
(101, 0, 5),
(102, 0, 3),
(103, 0, 3),
(104, 0, 3),
(105, 0, 3),
(106, 0, 3),
(107, 0, 3),
(108, 0, 3),
(109, 0, 3),
(110, 0, 3),
(111, 0, 3),
(112, 0, 3),
(113, 0, 3),
(114, 0, 3),
(115, 0, 12),
(116, 0, 2),
(117, 0, 6),
(118, 0, 12),
(119, 0, 2),
(120, 0, 6),
(121, 0, 12),
(122, 0, 2),
(123, 0, 6),
(124, 0, 12),
(125, 0, 2),
(126, 0, 6),
(127, 41, 12),
(128, 41, 2),
(129, 41, 6),
(130, 42, 12),
(131, 42, 2),
(132, 42, 6),
(133, 43, 12),
(134, 43, 2),
(135, 43, 6),
(136, 44, 12),
(137, 44, 2),
(138, 44, 6),
(139, 45, 12),
(140, 45, 2),
(141, 45, 6),
(142, 46, 2),
(143, 46, 2),
(144, 46, 2),
(145, 46, 2),
(146, 46, 2),
(147, 46, 2),
(148, 47, 9),
(149, 48, 9),
(150, 49, 6),
(151, 50, 1),
(152, 50, 1),
(153, 50, 5),
(154, 51, 6),
(155, 52, 2),
(156, 53, 5),
(157, 53, 6),
(158, 54, 6),
(159, 54, 2),
(160, 54, 2),
(161, 55, 6),
(162, 55, 2),
(163, 55, 2),
(164, 56, 6),
(165, 56, 2),
(166, 56, 2),
(167, 57, 6),
(168, 57, 2),
(169, 57, 2),
(170, 58, 6),
(171, 58, 2),
(172, 58, 2),
(173, 59, 6),
(174, 59, 2),
(175, 59, 2),
(176, 60, 6),
(177, 60, 2),
(178, 60, 2),
(179, 61, 6),
(180, 61, 2),
(181, 61, 2),
(182, 62, 6),
(183, 62, 2),
(184, 62, 2),
(185, 63, 6),
(186, 63, 2),
(187, 63, 2),
(188, 64, 6),
(189, 64, 6),
(190, 64, 6),
(191, 64, 12),
(192, 65, 6),
(193, 65, 6),
(194, 65, 6),
(195, 65, 6),
(196, 65, 6),
(197, 65, 6),
(198, 65, 6),
(199, 65, 6),
(200, 66, 6),
(201, 67, 2),
(202, 67, 6),
(203, 68, 5),
(204, 68, 6),
(205, 69, 1),
(206, 69, 6),
(207, 69, 12),
(208, 70, 3),
(209, 71, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `virtual_stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Gegevens worden geëxporteerd voor tabel `stock`
--

INSERT INTO `stock` (`id`, `game_id`, `stock`, `virtual_stock`) VALUES
(1, 1, 10, 7),
(2, 2, 10, -13),
(3, 3, 10, 8),
(4, 4, 10, 10),
(5, 5, 10, 3),
(6, 6, 10, -16),
(7, 7, 10, 10),
(8, 8, 10, 10),
(9, 9, 10, 8),
(10, 10, 10, 10),
(11, 11, 10, 10),
(12, 12, 10, 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `card_number` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`ID`, `card_number`, `name`, `phone`, `email`) VALUES
(1, 1234567, 'Sybren Lukkien', 600000000, 'sybrenlukkien@fake.nl'),
(2, 1234568, 'Voorbeeld gebruiker', 612312345, 'voorbeeld@fake.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
