-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-08-2015 a les 13:37:49
-- Versió del servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socialtravel`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `Comment` varchar(300) NOT NULL,
`Id` int(11) NOT NULL,
  `Travel` int(11) NOT NULL,
  `User` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `comments`
--

INSERT INTO `comments` (`Comment`, `Id`, `Travel`, `User`) VALUES
('Des de cebri per 106', 15, 106, 16),
('des de guillem 107', 16, 107, 9),
('Cebri des de 107', 17, 107, 16),
('un altre des de 106', 18, 106, 16);

-- --------------------------------------------------------

--
-- Estructura de la taula `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
`Follow_id` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `USER` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_Followed` int(11) NOT NULL,
  `USER_Followed` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `follow`
--

INSERT INTO `follow` (`Follow_id`, `ID`, `USER`, `ID_Followed`, `USER_Followed`) VALUES
(6, 14, 'pepe', 9, 'guillem'),
(8, 16, 'cebri', 9, 'uille');

-- --------------------------------------------------------

--
-- Estructura de la taula `travel`
--

CREATE TABLE IF NOT EXISTS `travel` (
`Travel_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Title` varchar(80) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Days` int(11) NOT NULL,
  `Image` varchar(11) DEFAULT NULL,
  `Country` varchar(50) NOT NULL,
  `Puntuation` int(11) NOT NULL,
  `Hashtags` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `travel`
--

INSERT INTO `travel` (`Travel_id`, `User_id`, `Title`, `Description`, `Date`, `Days`, `Image`, `Country`, `Puntuation`, `Hashtags`) VALUES
(28, 9, 'African Safari', 'safari perel congo', '09/05/2012', 3, '28.jpg', 'namibia', 9, '#saari'),
(39, 9, 'Japon', 'primavera japonesa es molt bonica perque els arbres son caducs m''ho vaig pasar super be i repetire la experiencia segur', '09/05/2015', 12, '39.jpg', 'Japo', 9, '#cerezos'),
(77, 9, 'grecia', 'sdjfjs', '11/05/2015', 6, '77.jpg', 'greece', 8, '#greece'),
(91, 9, 'Roma', 'molt bonic', '09/05/2005', 12, '91.jpg', 'Italia', 9, '#coliseu'),
(106, 16, 'Croacia', 'sksfjsdj', '11/08/2014', 6, '106.jpg', 'Croacia', 8, '#croacia #fun'),
(107, 16, 'venecia', 'sdfsg', '01/01/2013', 5, '107.jpg', 'italia', 8, '#venecia'),
(108, 9, 'asfafg', 'adga', '11/09/1991', 8, '108.jpg', 'asdhg', 8, '#hola'),
(109, 16, 'Indonesia', 'molt guai', '11/08/2014', 15, '109.jpg', 'Indonesia', 10, '#fun #indo'),
(110, 16, 'Ruta 66', 'increïble', '11/09/2005', 25, '110.jpg', 'USA', 10, '#USA #fun'),
(111, 16, 'Gran Canyon', 'va ploure', '13/08/2009', 10, '111.jpg', 'USA', 9, '#canyon'),
(112, 16, 'Polinesia', 'platja', '12/06/2010', 20, '112.jpg', 'Polinesia Frencesa', 10, '#beach #fun');

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Birth` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `users`
--

INSERT INTO `users` (`ID`, `User`, `Password`, `Birth`, `Email`) VALUES
(1, 'Jorid', 'lasalle', '16/04/1993', 'jordi@jordi.com'),
(9, 'guillem', '1234567890', '04/07/1990', 'guillemgar_90@hotmail.com'),
(11, '', '', '', ''),
(12, 'jordiasdsa', 'cacdevaca', '16/03/1993', 'jordi@jordis.com'),
(13, 'ferran', '1234567890', '02/03/1990', 'ferran@hotmail.com'),
(14, 'pepe', '1234567890', '04/07/1990', 'guillwwswgar_90@hotmail.com'),
(15, 'caca', 'cacacaca', '16/03/1990', 'hola@hotmail.com'),
(16, 'cebri', '1234567890', '11/05/1988', 'adaf@sf.com'),
(17, 'hola2', '1234567890', '11/06/1988', 'a@a.es'),
(18, 'uille', '1234567890', '11/09/1986', 'a@ae.es'),
(19, '', '', '', ''),
(20, '', '', '', ''),
(21, '', '', '', ''),
(22, 'newuser2', '1234567890', '11/05/1988', 'ae@aes.es'),
(23, 'newuser3', '1234567890', '11/08/1992', 'esd@as.es'),
(24, 'username4', '1234567890', '23/07/1991', 'aksjd@kj.es');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
 ADD UNIQUE KEY `Follow_id` (`Follow_id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
 ADD PRIMARY KEY (`Travel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
MODIFY `Follow_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
MODIFY `Travel_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
