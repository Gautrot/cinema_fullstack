-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 05 mai 2021 à 07:10
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
-- Base de données :  `phpcine`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `idFilm` smallint(5) NOT NULL,
  `nomFilm` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `dateSortie` date DEFAULT NULL,
  `resumeFilm` text COLLATE utf8_bin,
  PRIMARY KEY (`idFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`idFilm`, `nomFilm`, `dateSortie`, `resumeFilm`) VALUES
(1, 'Film_1', '2021-03-31', 'Résumé du Film 1.'),
(2, 'Film_2', '2021-03-25', 'Résumé du Film 2.'),
(3, 'Film_3', '2021-04-04', 'Résumé du film 3.');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `idSalle` smallint(5) NOT NULL,
  `numSalle` int(3) DEFAULT NULL,
  `numPlace` int(3) DEFAULT NULL,
  `maxPlace` int(3) DEFAULT NULL,
  `idFilm` smallint(5) NOT NULL,
  PRIMARY KEY (`idSalle`),
  KEY `idFilm` (`idFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idSalle`, `numSalle`, `numPlace`, `maxPlace`, `idFilm`) VALUES
(1, 1, 100, 100, 1),
(2, 11, 100, 100, 1),
(3, 14, 100, 100, 2),
(4, 7, 100, 100, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `idTarif` smallint(5) NOT NULL,
  `nomTarif` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `prixTarif` float(5,2) DEFAULT NULL,
  PRIMARY KEY (`idTarif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`idTarif`, `nomTarif`, `prixTarif`) VALUES
(1, 'Etudiant', 7.50),
(2, 'Enfant', 5.00),
(3, 'Navigo', 8.00),
(4, 'Plein', 11.00);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idUtil` smallint(5) NOT NULL,
  `idSalle` smallint(5) NOT NULL,
  `idTarif` smallint(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUtil` (`idUtil`),
  UNIQUE KEY `idTarif` (`idTarif`),
  KEY `idSalle` (`idSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtil` smallint(5) NOT NULL AUTO_INCREMENT,
  `rang` char(5) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `mdp` text COLLATE utf8_bin,
  `placeRes` int(3) DEFAULT NULL,
  `sommeTarif` float DEFAULT NULL,
  PRIMARY KEY (`idUtil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtil`, `rang`, `nom`, `prenom`, `email`, `mdp`, `placeRes`, `sommeTarif`) VALUES
(1, 'ADMIN', 'A', 'A', 'a@gmail.com', 'a', NULL, NULL),
(2, 'USER', 'B', 'B', 'b@gmail.com', 'b', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `salle_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `film` (`idFilm`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`idUtil`) REFERENCES `utilisateur` (`idUtil`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`idSalle`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`idTarif`) REFERENCES `tarif` (`idTarif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
