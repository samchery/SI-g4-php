-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2016 at 10:13 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g4si`
--

-- --------------------------------------------------------

--
-- Table structure for table `voyage`
--

CREATE TABLE IF NOT EXISTS `voyage` (
  `ID` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voyage`
--

INSERT INTO `voyage` (`ID`, `titre`, `resum`, `photo1`, `section`, `visible`, `description`, `adresse`, `map`) VALUES
(1, 'Découvrez de la Mongolie', 'Rencontrez les populations locales pour découvrir de nouveaux univers…', 'mongolie.jpg', 'asie', 3, '', '', ''),
(2, 'La Kirghizie en side-car', 'Que vous soyez conducteur du « side-car » ou accompagnant, les fantastiques routes et pistes du Kirghizistan, pays des steppes et des hauts pâturages, n’auront plus aucun secret pour vous.', 'kirghizie.jpg', 'asie', 3, '', '', ''),
(3, 'Découvrez le Pérou ! ', 'À la poursuite des Mondes perdus du Pérou pour les grands et les petits à partir de 8 ans, du pays des Incas à la mystérieuse jungle amazonienne…', 'perou.jpg', 'amerique', 1, '', '', ''),
(4, 'Découvrir et voyager au Costa Rica..', 'Profitez des grands classiques du Costa Rica et du Panama, si proches et pourtant si opposés. Ce voyage permettra aux grands voyageurs de réaliser un circuit complet entre les deux pays, succombant aux paysages hauts en couleurs!', 'costa.jpg', 'amerique', 1, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
