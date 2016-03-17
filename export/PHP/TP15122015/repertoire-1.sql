-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 16 Décembre 2015 à 09:15
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `repertoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuaire`
--

CREATE TABLE IF NOT EXISTS `annuaire` (
  `id_annuaire` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` int(10) unsigned zerofill DEFAULT NULL,
  `profession` varchar(30) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `codepostal` int(5) unsigned zerofill DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `sexe` enum('m','f') NOT NULL,
  `description` text,
  PRIMARY KEY (`id_annuaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `annuaire`
--

INSERT INTO `annuaire` (`id_annuaire`, `nom`, `prenom`, `telephone`, `profession`, `ville`, `codepostal`, `adresse`, `date_de_naissance`, `sexe`, `description`) VALUES
(2, 'CHARBONNIER', 'xavier', 1012141545, 'informaticien', 'Paris', 75020, '102 rue des pyrenées', '1968-04-23', 'm', 'j aime PHP'),
(3, 'RIFAD', 'maha', 1010101010, 'professeur', 'Marseille', 13000, '10 rue perrot', '1995-10-22', 'f', 'science po'),
(8, 'DUMONT', 'paul', 1015101410, 'professeur', 'paris', 75012, '102 rue potiron', '1936-05-20', 'm', 'prof'),
(26, 'GARY', 'romain', 1012111745, 'ecrivain', 'marseille', 13000, '10 rue poil de carotte', '1914-12-12', 'm', 'j aime'),
(27, 'SARTRE', 'jean-paul', 1015101419, 'ecrivain', 'paris', 75018, '102 rue des choses', '1970-01-01', 'm', ' bon ecrivain'),
(28, 'WELLS', 'orson', 1033101410, 'réalisateur', 'londres', 99000, '10 rue guerre des mondes', '1970-01-01', 'm', 'bien');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
