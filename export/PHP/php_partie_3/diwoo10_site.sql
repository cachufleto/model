-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 04 Janvier 2016 à 17:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `diwoo10_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(5) NOT NULL AUTO_INCREMENT,
  `reference` int(15) NOT NULL,
  `categorie` varchar(70) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(10) NOT NULL,
  `taille` varchar(2) NOT NULL,
  `sexe` enum('m','f') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` double(7,2) NOT NULL,
  `stock` int(4) NOT NULL,
  PRIMARY KEY (`id_article`),
  UNIQUE KEY `reference` (`reference`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `sexe`, `photo`, `prix`, `stock`) VALUES
(4, 202, 'tee-shirt', 'Tshirt blanc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'blanc', 'S', 'm', '202-tshirt_blanc.jpg', 40.00, 100),
(5, 203, 'tee-shirt', 'Tshirt rouge', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'rouge', 'S', 'm', '203-tshort_rouge.jpg', 42.00, 100),
(6, 301, 'polo', 'Polo rouge', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'rouge', 'S', 'm', '301-polo_rouge.jpg', 50.00, 100),
(7, 302, 'polo', 'Polo noir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'noir', 'S', 'm', '302-polo_noir.jpg', 50.00, 100),
(8, 303, 'polo', 'Polo blanc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'blanc', 'L', 'm', '303-polo_blanc.jpg', 50.00, 100),
(9, 401, 'echarpe', 'Echarpe rose', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'rose', 'L', 'm', '401-echarpe_rose.jpg', 30.00, 100),
(10, 402, 'echarpe', 'Echarpe bleu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'bleu', 'L', 'm', '402-echarpe_bleu.jpg', 30.00, 100),
(11, 403, 'echarpe', 'Echarpe carreau', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'bleu', 'L', 'm', '403-echarpe_carreau.jpg', 30.00, 100),
(12, 404, 'echarpe', 'Echarpe grise', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'gris', 'L', 'm', '404-echarpe_gris.jpg', 30.00, 100),
(13, 501, 'jean', 'Jean fonc&eacute;', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'bleu', 'L', 'm', '501-jean_sombre.jpg', 70.00, 100),
(14, 502, 'jean', 'Jean bleu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'bleu', 'L', 'm', '502-jean_bleu.jpg', 70.00, 100),
(15, 503, 'jean', 'Jean clair', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'bleu', 'L', 'm', '503-jean_clair.jpg', 70.00, 100),
(16, 365544, 'test', 'test', '', '', 'S', 'm', '365544-echarpe_gris.jpg', 0.00, 0),
(17, 601, 'ceinture', 'Ceinture marron', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam purus leo, sodales a urna at, malesuada consectetur tellus. Ut eget purus vel diam varius sollicitudin. ', 'marron', 'L', 'm', '601-ceinture_marron.jpg', 40.00, 70);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(6) NOT NULL AUTO_INCREMENT,
  `id_membre` int(5) DEFAULT NULL,
  `montant` double(7,2) NOT NULL,
  `date` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL DEFAULT 'en cours de traitement',
  PRIMARY KEY (`id_commande`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_details_commande` int(5) NOT NULL AUTO_INCREMENT,
  `id_commande` int(6) NOT NULL,
  `id_article` int(5) DEFAULT NULL,
  `quantite` int(4) NOT NULL,
  `prix` double(7,2) NOT NULL,
  PRIMARY KEY (`id_details_commande`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(15) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sexe` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) unsigned zerofill NOT NULL,
  `adresse` text NOT NULL,
  `statut` int(1) NOT NULL,
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
(2, 'test', 'test', 'test', 'test', 'test@mail.fr', 'm', 'Paris', 75000, 'Mon adresse', 0),
(3, 'admin', 'admin', 'test', 'test', 'admin@mail.fr', 'm', 'Paris', 75000, 'Mon adresse', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
