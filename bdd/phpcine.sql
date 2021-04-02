-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2021 at 09:53 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcine`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `idFilm` smallint(5) NOT NULL,
  `nomFilm` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `resumeFilm` text COLLATE utf8_bin,
  PRIMARY KEY (`idFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`idFilm`, `nomFilm`, `resumeFilm`) VALUES
(1, 'Film 1', 'Résumé du Film 1.'),
(2, 'Film 2', 'Résumé du Film 2.');

-- --------------------------------------------------------

--
-- Table structure for table `recap`
--

DROP TABLE IF EXISTS `recap`;
CREATE TABLE IF NOT EXISTS `recap` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idUtil` smallint(5) NOT NULL,
  `idSalle` smallint(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUtil` (`idUtil`),
  KEY `idSalle` (`idSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `idSalle` smallint(5) NOT NULL,
  `numSalle` int(3) DEFAULT NULL,
  `numPlace` int(3) DEFAULT NULL,
  `idFilm` smallint(5) NOT NULL,
  PRIMARY KEY (`idSalle`),
  KEY `idFilm` (`idFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`idSalle`, `numSalle`, `numPlace`, `idFilm`) VALUES
(1, 1, 100, 1),
(2, 11, 100, 1),
(3, 14, 100, 2),
(4, 7, 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `idTarif` smallint(5) NOT NULL,
  `nomTarif` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `prixTarif` char(5) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idTarif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`idTarif`, `nomTarif`, `prixTarif`) VALUES
(1, 'Etudiant', '7.50'),
(2, 'Enfant', '5.00'),
(3, 'Navigo', '8.00'),
(4, 'Plein', '11.00');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtil` smallint(5) NOT NULL AUTO_INCREMENT,
  `rang` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `mdp` text COLLATE utf8_bin,
  `idTarif` smallint(5) NOT NULL,
  PRIMARY KEY (`idUtil`),
  KEY `idTarif` (`idTarif`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtil`, `rang`, `nom`, `prenom`, `email`, `mdp`, `idTarif`) VALUES
(1, 'USER', 'A', 'A', 'a@gmail.com', 'a', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `salle` (`idFilm`);

--
-- Constraints for table `recap`
--
ALTER TABLE `recap`
  ADD CONSTRAINT `recap_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`idSalle`),
  ADD CONSTRAINT `recap_ibfk_2` FOREIGN KEY (`idUtil`) REFERENCES `utilisateur` (`idUtil`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idTarif`) REFERENCES `tarif` (`idTarif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
