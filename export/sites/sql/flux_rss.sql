-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 17 Mars 2016 à 12:20
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `flux_rss`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `date`, `description`) VALUES
(1, 'premier article', '2011-05-01 14:58:10', 'voici le premier article du blog'),
(2, 'autre news', '2011-05-02 14:58:43', 'ceci est une autre news <vxwcghfhqdfh fgh dfhgdfh sdf'),
(3, 'nouvelle du front', '2011-05-04 14:58:55', 'nouvelle du front nouvelle du front nouvelle du front nouvelle du frontv nouvelle du frontnouvelle du front'),
(4, 'actualité du lundi', '2011-05-03 14:59:00', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum <<lorem ipsum lorem ipsum lorem ipsum>> lorem ipsum lorem ipsum lorem ipsum lorem ipsum ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
