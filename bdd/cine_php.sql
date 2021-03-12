-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 10 mars 2021 à 09:07
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cine_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `idFilm` smallint(5) NOT NULL,
  `nomFilm` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `resumeFilm` text COLLATE utf8_bin,
  PRIMARY KEY (`idFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `recap`
--

DROP TABLE IF EXISTS `recap`;
CREATE TABLE IF NOT EXISTS `recap` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idUtil` smallint(5) NOT NULL,
  `idSalle` smallint(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtil` (`idUtil`),
  KEY `idSalle` (`idSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
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
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idSalle`, `numSalle`, `numPlace`, `idFilm`) VALUES
(1, 1, 100, 0),
(2, 11, 100, 0),
(3, 14, 100, 0),
(4, 7, 100, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `idTarif` smallint(5) NOT NULL,
  `nomTarif` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `prixTarif` char(5) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idTarif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`idTarif`, `nomTarif`, `prixTarif`) VALUES
(1, 'Etudiant', '7.50'),
(2, 'Enfant', '5.00'),
(3, 'Navigo', '8.00'),
(4, 'Plein', '11.00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtil` smallint(5) NOT NULL,
  `nom` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `mdp` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `idTarif` smallint(5) NOT NULL,
  PRIMARY KEY (`idUtil`),
  KEY `idTarif` (`idTarif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `salle` (`idFilm`);

--
-- Contraintes pour la table `recap`
--
ALTER TABLE `recap`
  ADD CONSTRAINT `recap_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`idSalle`),
  ADD CONSTRAINT `recap_ibfk_2` FOREIGN KEY (`idUtil`) REFERENCES `utilisateur` (`idUtil`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idTarif`) REFERENCES `tarif` (`idTarif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
