-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 17 Mars 2016 à 12:18
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `diwoo10_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(5) NOT NULL AUTO_INCREMENT,
  `titre` varchar(80) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `id_membre` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_membre` (`id_membre`),
  FULLTEXT KEY `contenu` (`contenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=132 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `contenu`, `date`, `id_membre`, `time`) VALUES
(113, 'Meuble Ikea', 'Étagère Billy à 29€ avec une porte en verre à 75€\r\nLivrable en couleur bois ton acajou', '0000-00-00', 1, '0000-00-00 00:00:00'),
(125, '123', 'soleil\r\nlune jupiter saturne\r\n\r\nles astres de février S-O', '0000-00-00', 1, '0000-00-00 00:00:00'),
(126, 'CSS Flexbox', 'La nouvelle fa&ccedil;on de faire des applications web en Responsive Web Design', '0000-00-00', 1, '0000-00-00 00:00:00'),
(127, 'Carte Navigo 1-5', 'Tarification unique de 70€ / mois pris en charge par la région Ile-de-France\r\n\r\nPass valable sur le mois en cours (mars 2016)', '0000-00-00', 1, '0000-00-00 00:00:00'),
(131, 'Tomtom Go', '710 et 720 chez Leclerc !', '0000-00-00', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL COMMENT 'une adresse email ne peut pas aller au dela de 80 caracteres',
  `status` int(1) NOT NULL COMMENT 'admin si egal a 1',
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `status`) VALUES
(1, 'admin', 'admin', 'LE KHANH VAN', 'Valery', 'valery.lkv@orange.fr', 1),
(2, 'user', 'user', 'GENEVIEVE', 'Vallery', 'val3ry1204@gmail.com', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
