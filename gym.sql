-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 23 mars 2019 à 10:08
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
  PRIMARY KEY (`idActivity`),
  KEY `idActType` (`idActType`),
  KEY `idDay` (`idDay`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`idActivity`, `nameActivity`, `description`, `idDay`, `idActType`) VALUES
(3, 'aero', 'azesqd', 3, 2),
(2, 'zz', 'zz', 2, 2),
(4, 'aero', 'azesqd', 3, 12);

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
  `DateNais` date NOT NULL,
  PRIMARY KEY (`idMembre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `nameMembre`, `addressMembre`, `DateNais`) VALUES
(1, 'tata', 'zouhour city', '1996-05-16'),
(2, 'hamdi', 'zouhour city', '1996-05-16'),
(3, 'hamza', 'zouhour 2', '1998-11-24');

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
  `idActType` int(50) NOT NULL,
  KEY `fk_PerOrders` (`idMember`),
  KEY `idActType` (`idActType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
