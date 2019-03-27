-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 27 mars 2019 à 11:46
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gym`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `idActivity` int(50) NOT NULL AUTO_INCREMENT,
  `nameActivity` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idDay` int(11) NOT NULL,
  `idActType` int(11) NOT NULL,
  `idTrainer` int(11) NOT NULL,
  PRIMARY KEY (`idActivity`),
  KEY `idActType` (`idActType`),
  KEY `idDay` (`idDay`),
  KEY `idTrainer` (`idTrainer`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`idActivity`, `nameActivity`, `description`, `idDay`, `idActType`, `idTrainer`) VALUES
(3, 'aero', 'azesqd', 3, 2, 0),
(2, 'zz', 'zz', 2, 2, 0),
(4, 'aero', 'azesqd', 3, 12, 0);

-- --------------------------------------------------------

--
-- Structure de la table `activity_plan`
--

DROP TABLE IF EXISTS `activity_plan`;
CREATE TABLE IF NOT EXISTS `activity_plan` (
  `idDay` int(11) NOT NULL,
  `idActivity` int(11) NOT NULL,
  PRIMARY KEY (`idDay`,`idActivity`),
  KEY `idActivity` (`idActivity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `activity_sub`
--

DROP TABLE IF EXISTS `activity_sub`;
CREATE TABLE IF NOT EXISTS `activity_sub` (
  `idSubType` int(11) NOT NULL,
  `idActType` int(11) NOT NULL,
  PRIMARY KEY (`idActType`,`idSubType`),
  KEY `idSubType` (`idSubType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `activity_type`
--

DROP TABLE IF EXISTS `activity_type`;
CREATE TABLE IF NOT EXISTS `activity_type` (
  `idActType` int(50) NOT NULL AUTO_INCREMENT,
  `nameType` varchar(30) NOT NULL,
  PRIMARY KEY (`idActType`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activity_type`
--

INSERT INTO `activity_type` (`idActType`, `nameType`) VALUES
(2, 'cardio');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `idMembre` int(200) NOT NULL AUTO_INCREMENT,
  `nameMembre` varchar(15) NOT NULL,
  `addressMembre` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `DateNais` date NOT NULL,
  PRIMARY KEY (`idMembre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `nameMembre`, `addressMembre`, `username`, `password`, `DateNais`) VALUES
(1, 'tata', 'zouhour city', '', '', '1996-05-16'),
(2, 'hamdi', 'zouhour city', '', '', '1996-05-16'),
(3, 'hamza', 'zouhour 2', 'hamza', 'azerty', '1998-11-24');

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `idDay` int(11) NOT NULL AUTO_INCREMENT,
  `day` date NOT NULL,
  PRIMARY KEY (`idDay`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`idDay`, `day`) VALUES
(3, '2019-03-04');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `idSalle` int(11) NOT NULL AUTO_INCREMENT,
  `nameSalle` varchar(30) NOT NULL,
  `addressSalle` varchar(50) NOT NULL,
  `TownSalle` varchar(15) NOT NULL,
  PRIMARY KEY (`idSalle`),
  UNIQUE KEY `idS` (`idSalle`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idSalle`, `nameSalle`, `addressSalle`, `TownSalle`) VALUES
(3, 'GoldGym', 'USA', 'USA'),
(2, 'California Gym', 'Lac', 'Tunis'),
(4, 'GoldGym', 'USA', 'USA'),
(5, 'GoldGym', 'USA', 'USA');

-- --------------------------------------------------------

--
-- Structure de la table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE IF NOT EXISTS `subscribe` (
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idMember` int(200) NOT NULL,
  `idSubType` int(11) NOT NULL,
  PRIMARY KEY (`idMember`,`idSubType`,`dateDebut`),
  KEY `idSubType` (`idSubType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscribe`
--

INSERT INTO `subscribe` (`dateDebut`, `dateFin`, `idMember`, `idSubType`) VALUES
('2019-03-05', '2019-03-08', 1, 2),
('2019-05-01', '2019-06-01', 11, 2),
('2019-05-01', '2024-06-01', 111, 2);

-- --------------------------------------------------------

--
-- Structure de la table `subscription_type`
--

DROP TABLE IF EXISTS `subscription_type`;
CREATE TABLE IF NOT EXISTS `subscription_type` (
  `idSubType` int(200) NOT NULL AUTO_INCREMENT,
  `nameSubType` varchar(20) NOT NULL,
  `priceSubType` float NOT NULL,
  `durationSubType` float NOT NULL,
  PRIMARY KEY (`idSubType`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscription_type`
--

INSERT INTO `subscription_type` (`idSubType`, `nameSubType`, `priceSubType`, `durationSubType`) VALUES
(2, 'gold', 60, 1.5);

-- --------------------------------------------------------

--
-- Structure de la table `trainer`
--

DROP TABLE IF EXISTS `trainer`;
CREATE TABLE IF NOT EXISTS `trainer` (
  `idTrainer` int(11) NOT NULL AUTO_INCREMENT,
  `nameTrainer` varchar(255) NOT NULL,
  `addressTrainer` varchar(255) NOT NULL,
  PRIMARY KEY (`idTrainer`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `trainer`
--

INSERT INTO `trainer` (`idTrainer`, `nameTrainer`, `addressTrainer`) VALUES
(2, 'azer', 'azer');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'hamdi', '$2y$10$dycU5iKLHd8A35HOcdd69.Jcz/QmCSrLBDD4vFNAAo.F.05fLL.lW', '2019-03-26 17:59:05'),
(2, 'hamza', '$2y$10$LJl07e0tHmqosHWU4e767eJnS6xKOrA0R7xZXIf7tQCCYiACk4kom', '2019-03-26 18:00:07'),
(3, 'haha', '$2y$10$d4fENeWOwY7h7MyqcpwaXuYvGr8lk23x9wE4d/Wiqub.jheSeYFqe', '2019-03-27 11:31:31'),
(4, 'aymen', '$2y$10$sjqgMSecFkgv1/5dymFFDeRy1eOJi0fKpqUM6cJYh52sbAkEYnEau', '2019-03-27 11:37:11'),
(5, 'ben', '$2y$10$hLDYhG90jLYClYyG8uw5j.FDn4MwjejiMXaVbsPown4EuYmW/wVT.', '2019-03-27 11:41:28'),
(6, 'rr', '$2y$10$b6YXGFpQFieFijpMutU12OAikuwp/aFc1v.U/GKPVy7hlPYSr77Ye', '2019-03-27 11:43:21'),
(7, 'zz', '$2y$10$XH5DgHakUu.K3l4bqE0XKuioWV4wLcViGao/msDHMIA9/jeLU3Uo6', '2019-03-27 11:43:39'),
(8, 'baga', '$2y$10$rpVYGyDRR7jAjoFMaZ3VNe209xpLU4biJd/QY55yVH6D2O1boIrKe', '2019-03-27 11:46:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
