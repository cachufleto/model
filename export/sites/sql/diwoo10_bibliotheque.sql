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
-- Base de données :  `diwoo10_bibliotheque`
--

DELIMITER $$
--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `nombre_employes_par_service`(servicerecu varchar(255)) RETURNS int(11)
    READS SQL DATA
begin
declare resultat int;
select count(*)
from employes where service=servicerecu into resultat;
return resultat;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE IF NOT EXISTS `abonne` (
  `id_abonne` int(4) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_abonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `abonne`
--

INSERT INTO `abonne` (`id_abonne`, `prenom`) VALUES
(1, 'Guillaume'),
(2, 'Benoit'),
(3, 'Chloe'),
(4, 'Laura'),
(5, 'ali'),
(6, 'Adreien'),
(7, ''),
(8, ''),
(9, ''),
(10, 'fsdf'),
(11, 'fsfghfgh'),
(12, 'test'),
(13, 'test'),
(14, 'test'),
(15, 'test'),
(16, 'test'),
(17, 'test'),
(18, 'ibrahima'),
(19, 'ibrah&quot;#!&s'),
(20, 'ibrah&eacute;&e');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_emprunt` int(3) NOT NULL AUTO_INCREMENT,
  `id_livre` int(4) DEFAULT NULL,
  `id_abonne` int(4) DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `date_rendu` date DEFAULT NULL,
  PRIMARY KEY (`id_emprunt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `id_livre`, `id_abonne`, `date_sortie`, `date_rendu`) VALUES
(1, 100, 1, '2011-12-17', '2011-12-18'),
(2, 101, 2, '2011-12-18', '2011-12-20'),
(3, 100, 3, '2011-12-19', '2011-12-22'),
(4, 103, 4, '2011-12-19', '2011-12-22'),
(5, 104, 1, '2011-12-19', '2011-12-28'),
(6, 105, 2, '2012-03-20', '2012-03-26'),
(7, 105, 3, '2013-06-13', NULL),
(8, 100, 2, '2013-06-15', NULL),
(9, 0, 0, '0000-00-00', '0000-00-00'),
(10, 0, 0, '0000-00-00', '0000-00-00'),
(11, 1, 0, '0000-00-00', '0000-00-00'),
(12, 1, 1, '0000-00-00', '0000-00-00'),
(13, 1, 1, '0000-00-00', '0000-00-00'),
(14, 1, 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id_livre` int(4) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(25) DEFAULT NULL,
  `titre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_livre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `auteur`, `titre`) VALUES
(100, 'GUY DE MAUPASSANT', 'Une vie'),
(101, 'GUY DE MAUPASSANT', 'Bel-Ami '),
(102, 'HONORE DE BALZAC', 'Le père Goriot'),
(103, 'ALPHONSE DAUDET', 'Le Petit chose'),
(104, 'ALEXANDRE DUMAS', 'La Reine Margot'),
(105, 'ALEXANDRE DUMAS', 'Les Trois Mousquetaires'),
(106, '	ALEXANDRE DUMAS', 'La Reine Margot'),
(107, 'GUY DE MAUPASSANT	', '	Bel-Ami'),
(108, 'GUY DE MAUPASSANT	', 'Bel-Ami'),
(109, '', ''),
(110, 'ALEXANDRE DUMAS |Les troi', NULL),
(111, 'ALEXANDRE DUMAS |Les troi', NULL),
(112, 'ALEXANDRE DUMAS |Les troi', NULL),
(113, 'ALEXANDRE DUMAS |Les troi', NULL),
(114, 'ALEXANDRE DUMAS |Les troi', NULL),
(115, 'ALEXANDRE DUMAS |Les troi', NULL),
(116, 'ALEXANDRE DUMAS |Les troi', NULL),
(117, 'ALEXANDRE DUMAS |Les troi', NULL),
(118, 'ALEXANDRE DUMAS |Les troi', NULL),
(119, 'ALEXANDRE DUMAS |Les troi', NULL),
(120, 'ALEXANDRE DUMAS |Les troi', NULL),
(121, 'ALEXANDRE DUMAS |Les troi', NULL);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_emprunt`
--
CREATE TABLE IF NOT EXISTS `vue_emprunt` (
`prenom` varchar(15)
,`titre` varchar(30)
,`date_sortie` date
);
-- --------------------------------------------------------

--
-- Structure de la vue `vue_emprunt`
--
DROP TABLE IF EXISTS `vue_emprunt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_emprunt` AS select `a`.`prenom` AS `prenom`,`l`.`titre` AS `titre`,`e`.`date_sortie` AS `date_sortie` from ((`abonne` `a` join `livre` `l`) join `emprunt` `e`) where ((`a`.`id_abonne` = `e`.`id_abonne`) and (`e`.`id_livre` = `l`.`id_livre`));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
