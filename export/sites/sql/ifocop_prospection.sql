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
-- Base de données :  `ifocop_prospection`
--

-- --------------------------------------------------------

--
-- Structure de la table `appels`
--

CREATE TABLE IF NOT EXISTS `appels` (
  `id_appel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_societe` int(10) unsigned NOT NULL,
  `id_contact` int(10) unsigned NOT NULL,
  `date_appel` date NOT NULL,
  `resultat` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `qualite` int(1) NOT NULL,
  `autre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_appel`),
  KEY `SOCIETE` (`id_societe`),
  KEY `CONTACT` (`id_contact`),
  KEY `id_societe` (`id_societe`,`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `contactes`
--

CREATE TABLE IF NOT EXISTS `contactes` (
  `id_contact` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `poste` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `telephone` int(12) NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `extention` int(6) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `societes`
--

CREATE TABLE IF NOT EXISTS `societes` (
  `id_societe` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `societe` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `activite` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `control` int(1) NOT NULL COMMENT 'niveau du traitement',
  `valide` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_societe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=245 ;

--
-- Contenu de la table `societes`
--

INSERT INTO `societes` (`id_societe`, `societe`, `numero`, `adresse`, `activite`, `tel`, `cp`, `ville`, `control`, `valide`) VALUES
(1, 'Acresi', '23', 'RUE DU DOME', 'informatique (logiciel et progiciel)', '01 46 09 97 ', 92100, 'Boulogne-billancourt', 0, NULL),
(2, 'ADC Soft (WinRAR - France)', '18 bis', 'RUE DE L EST', 'informatique (logiciel et progiciel)', '09 81 73 54 ', 92100, 'Boulogne-billancourt', 0, NULL),
(3, 'Addona Editions', '33', 'RUE NATIONALE', 'informatique (logiciel et progiciel)', '01 46 10 30 ', 92100, 'Boulogne-billancourt', 0, NULL),
(4, 'Alef Media Groupe', '135', 'ROUTE DE LA REINE', 'informatique (logiciel et progiciel)', '01 46 99 01 ', 92100, 'Boulogne-billancourt', 0, NULL),
(5, 'Alliance Senior', '67', 'AVENUE PIERRE GRENIER', 'informatique (logiciel et progiciel)', '01 46 20 08 ', 92100, 'Boulogne-billancourt', 0, NULL),
(6, 'Alma IT Consulting', '47', 'AVENUE EDOUARD VAILLANT', 'informatique (logiciel et progiciel)', '01 84 19 04 ', 92100, 'Boulogne-billancourt', 0, NULL),
(7, 'Altered Communication', '84', 'AVENUE DU GENERAL LECLERC', 'informatique (logiciel et progiciel)', '09 67 26 72 ', 92100, 'Boulogne-billancourt', 0, NULL),
(8, 'Apach Network', '86', 'RUE THIERS', 'informatique (logiciel et progiciel)', '01 46 89 66 ', 92100, 'Boulogne-billancourt', 0, NULL),
(9, 'Apach Network', '86', 'RUE THIERS', 'informatique (logiciel et progiciel)', '01 46 89 00 ', 92100, 'Boulogne-billancourt', 0, NULL),
(10, 'Arbitragis Trading', '129', 'RUE DU VIEUX PONT DE SEVRES', 'informatique (logiciel et progiciel)', '01 47 61 02 ', 92100, 'Boulogne-billancourt', 0, NULL),
(11, 'Arcitek', '55', 'RUE D AGUESSEAU', 'informatique (logiciel et progiciel)', '01 41 22 04 ', 92100, 'Boulogne-billancourt', 0, NULL),
(12, 'ARIA TECHNOLOGIES', '8', 'RUE DE LA FERME', 'informatique (logiciel et progiciel)', '01 46 08 68 ', 92100, 'Boulogne-billancourt', 0, NULL),
(13, 'Attic Plus', '89 bis', 'RUE GALLIENI', 'informatique (logiciel et progiciel)', '01 46 05 01 ', 92100, 'Boulogne-billancourt', 0, NULL),
(14, 'BCH (Sté)', '4', 'RUE EDOUARD DETAILLE', 'informatique (logiciel et progiciel)', '01 41 41 03 ', 92100, 'Boulogne-billancourt', 0, NULL),
(15, 'BEGEY HERVE', '696', 'RUE YVES KERMEN', 'informatique (logiciel et progiciel)', '06 19 70 37 ', 92100, 'Boulogne-billancourt', 0, NULL),
(16, 'Bernard', '89 bis', 'RUE GALLIENI', 'informatique (logiciel et progiciel)', '09 71 37 50 ', 92100, 'Boulogne-billancourt', 0, NULL),
(17, 'Blogangels', '52', 'RUE DE LA BELLE FEUILLE', 'informatique (logiciel et progiciel)', '01 41 10 92 ', 92100, 'Boulogne-billancourt', 0, NULL),
(18, 'Borakay Software', '9', 'RUE DE SEINE', 'informatique (logiciel et progiciel)', '01 46 55 95 ', 92100, 'Boulogne-billancourt', 0, NULL),
(19, 'Cegedim', '137', 'RUE D AGUESSEAU', 'informatique (logiciel et progiciel)', '01 46 04 96 ', 92100, 'Boulogne-billancourt', 0, NULL),
(20, 'Cegedim', '137', 'RUE D AGUESSEAU', 'informatique (logiciel et progiciel)', '01 49 09 22 ', 92100, 'Boulogne-billancourt', 0, NULL),
(21, 'Cegedim', '114', 'RUE D AGUESSEAU', 'informatique (logiciel et progiciel)', '01 41 10 57 ', 92100, 'Boulogne-billancourt', 0, NULL),
(22, 'Chaalali', '1 bis', 'RUE BARTHOLDI', 'informatique (logiciel et progiciel)', '09 62 24 87 ', 92100, 'Boulogne-billancourt', 0, NULL),
(23, 'Compuware France', '27', 'QUAI ALPHONSE LE GALLO', 'informatique (logiciel et progiciel)', '01 46 23 88 ', 92100, 'Boulogne-billancourt', 0, NULL),
(24, 'CORAIL SYSTEMS', '253', 'RUE GALLIENI', 'informatique (logiciel et progiciel)', '01 55 60 27 ', 92100, 'Boulogne-billancourt', 0, NULL),
(25, 'CVMM', '23', 'RUE DU BELVEDERE', 'informatique (logiciel et progiciel)', '01 40 83 12 ', 92100, 'Boulogne-billancourt', 0, NULL),
(26, 'Datasport', '63 bis', 'RUE DE SEVRES', 'informatique (logiciel et progiciel)', '01 46 94 89 ', 92100, 'Boulogne-billancourt', 0, NULL),
(27, 'DELANE SI', '164', 'RUE D AGUESSEAU', 'informatique (logiciel et progiciel)', '01 46 05 16 ', 92100, 'Boulogne-billancourt', 0, NULL),
(28, 'Dersin Axelle', '4', 'AVENUE DESFEUX', 'informatique (logiciel et progiciel)', '01 46 20 04 ', 92100, 'Boulogne-billancourt', 0, NULL),
(29, 'Docubase', '56', 'RUE DE BILLANCOURT', 'informatique (logiciel et progiciel)', '08 99 70 84 ', 92100, 'Boulogne-billancourt', 0, NULL),
(30, 'DOMINO INFORMATIQUE', '81 bis', 'RUE DE BELLEVUE', 'informatique (logiciel et progiciel)', '01 46 05 19 ', 92100, 'Boulogne-billancourt', 0, NULL),
(31, 'Enginsoft France', '88', 'AVENUE DU GENERAL LECLERC', 'informatique (logiciel et progiciel)', '01 41 22 99 ', 92100, 'Boulogne-billancourt', 0, NULL),
(32, 'EvoKe', '43', 'RUE PAUL BERT', 'informatique (logiciel et progiciel)', '01 46 55 55 ', 92100, 'Boulogne-billancourt', 0, NULL),
(33, 'Exalog', '95 bis', 'RUE DE BELLEVUE', 'informatique (logiciel et progiciel)', '01 46 04 20 ', 92100, 'Boulogne-billancourt', 0, NULL),
(34, 'Exclusive Networks', '98', 'ROUTE DE LA REINE', 'informatique (logiciel et progiciel)', '01 41 10 09 ', 92100, 'Boulogne-billancourt', 0, NULL),
(35, 'Imaprim', '113', 'ROUTE DE LA REINE', 'informatique (logiciel et progiciel)', '01 46 04 54 ', 92100, 'Boulogne-billancourt', 0, NULL),
(36, 'INFIDIS', '14', 'AV JEAN BAPTISTE CLEMENT', 'informatique (logiciel et progiciel)', '01 55 38 93 ', 92100, 'Boulogne-billancourt', 0, NULL),
(37, 'Infolight', '22', 'RUE JULES FERRY', 'informatique (logiciel et progiciel)', '01 46 20 52 ', 92100, 'Boulogne-billancourt', 0, NULL),
(38, 'Infolight', '20', 'RUE JULES FERRY', 'informatique (logiciel et progiciel)', '01 46 10 48 ', 92100, 'Boulogne-billancourt', 0, NULL),
(39, 'Informatique Investissements Et Particip', '14', 'AVENUE JEAN BAPTISTE CLEMENT', 'informatique (logiciel et progiciel)', '09 61 67 43 ', 92100, 'Boulogne-billancourt', 0, NULL),
(40, 'Internationale des Jeux', '126', 'RUE GALLIENI', 'informatique (logiciel et progiciel)', '01 41 10 37 ', 92100, 'Boulogne-billancourt', 0, NULL),
(41, 'Iridis', '26', 'RUE GALLIENI', 'informatique (logiciel et progiciel)', '01 46 21 37 ', 92100, 'Boulogne-billancourt', 0, NULL),
(42, 'Itway France', '76', 'RUE THIERS', 'informatique (logiciel et progiciel)', '01 46 20 17 ', 92100, 'Boulogne-billancourt', 0, NULL),
(43, 'JESUISAUTONOME', '13', 'RUE DE L ANCIENNE MAIRIE', 'informatique (logiciel et progiciel)', '01 84 19 26 ', 92100, 'Boulogne-billancourt', 0, NULL),
(44, 'L 123 conseils', '116', 'AVENUE JEAN BAPTISTE CLEMENT', 'informatique (logiciel et progiciel)', '01 47 12 00 ', 92100, 'Boulogne-billancourt', 0, NULL),
(45, 'L et A', '6', 'RUE LOUIS PASTEUR', 'informatique (logiciel et progiciel)', '01 41 10 84 ', 92100, 'Boulogne-billancourt', 0, NULL),
(46, 'Lehrer System', '40', 'RUE ANNA JACQUIN', 'informatique (logiciel et progiciel)', '01 84 19 11 ', 92100, 'Boulogne-billancourt', 0, NULL),
(47, 'LORE FINANCE', '117', 'AVENUE VICTOR HUGO', 'informatique (logiciel et progiciel)', '01 84 19 24 ', 92100, 'Boulogne-billancourt', 0, NULL),
(48, 'MEILLEURMOBILE (SA)', '6', 'RUE LOUIS PASTEUR', 'informatique (logiciel et progiciel)', '01 41 12 96 ', 92100, 'Boulogne-billancourt', 0, NULL),
(49, 'New Edge', '116', 'AVENUE JEAN BAPTISTE CLEMENT', 'informatique (logiciel et progiciel)', '01 46 03 63 ', 92100, 'Boulogne-billancourt', 0, NULL),
(50, 'New Edge Primac Sibestan', '106', 'AVENUE JEAN BAPTISTE CLEMENT', 'informatique (logiciel et progiciel)', '01 46 05 12 ', 92100, 'Boulogne-billancourt', 0, NULL),
(51, 'newedge', '108', 'AVENUE JEAN BAPTISTE CLEMENT', 'informatique (logiciel et progiciel)', '01 79 46 75 ', 92100, 'Boulogne-billancourt', 0, NULL),
(52, 'Nexa Technologie', '96', 'RUE DE PARIS', 'informatique (logiciel et progiciel)', '01 46 05 27 ', 92100, 'Boulogne-billancourt', 0, NULL),
(53, 'NIVAC', '2 bis', 'AVENUE DESFEUX', 'informatique (logiciel et progiciel)', '01 46 08 31 ', 92100, 'Boulogne-billancourt', 0, NULL),
(54, 'NIVAC', '2 bis', 'AVENUE DESFEUX', 'informatique (logiciel et progiciel)', '09 51 59 37 ', 92100, 'Boulogne-billancourt', 0, NULL),
(55, 'numerique systeme', '135', 'ROUTE DE LA REINE', 'informatique (logiciel et progiciel)', '01 83 39 94 ', 92100, 'Boulogne-billancourt', 0, NULL),
(56, 'Optoma France', '81', 'AVENUE EDOUARD VAILLANT', 'informatique (logiciel et progiciel)', '01 41 41 90 ', 92100, 'Boulogne-billancourt', 0, NULL),
(57, 'Panda Security', '60 ter', 'RUE DE BELLEVUE', 'informatique (logiciel et progiciel)', '01 46 84 20 ', 92100, 'Boulogne-billancourt', 0, NULL),
(58, 'Repeglio', '79', 'AVENUE EDOUARD VAILLANT', 'informatique (logiciel et progiciel)', '01 46 10 47 ', 92100, 'Boulogne-billancourt', 0, NULL),
(59, 'RD Consulting', '20', 'RUE THIERS', 'informatique (logiciel et progiciel)', '01 47 61 00 ', 92100, 'Boulogne-billancourt', 0, NULL),
(60, 'REFLEX SYS', '58', 'BOULEVARD DE LA REPUBLIQUE', 'informatique (logiciel et progiciel)', '01 71 16 18 ', 92100, 'Boulogne-billancourt', 0, NULL),
(61, 'REFLEX SYS', '56', 'BOULEVARD DE LA REPUBLIQUE', 'informatique (logiciel et progiciel)', '01 46 10 07 ', 92100, 'Boulogne-billancourt', 0, NULL),
(62, 'REFLEX SYS', '56', 'BOULEVARD DE LA REPUBLIQUE', 'informatique (logiciel et progiciel)', '01 46 10 07 ', 92100, 'Boulogne-billancourt', 0, NULL),
(63, 'S-cube', '79', 'RUE DE SEVRES', 'informatique (logiciel et progiciel)', '01 55 18 75 ', 92100, 'Boulogne-billancourt', 0, NULL),
(64, 'Service Comptabilite', '25 bis', 'AVENUE ANDRE MORIZET', 'informatique (logiciel et progiciel)', '09 63 51 60 ', 92100, 'Boulogne-billancourt', 0, NULL),
(65, 'SIDETRADE', '114', 'RUE GALLIENI', 'informatique (logiciel et progiciel)', '01 46 84 14 ', 92100, 'Boulogne-billancourt', 0, NULL),
(66, 'Telemedicine Technologies', '102', 'AVENUE EDOUARD VAILLANT', 'informatique (logiciel et progiciel)', '01 49 10 06 ', 92100, 'Boulogne-billancourt', 0, NULL),
(67, 'Tessi Ged', '56', 'RUE DE BILLANCOURT', 'informatique (logiciel et progiciel)', '01 55 18 00 ', 92100, 'Boulogne-billancourt', 0, NULL),
(68, 'Vianova Systems France', '164', 'RUE D AGUESSEAU', 'informatique (logiciel et progiciel)', '01 46 89 43 ', 92100, 'Boulogne-billancourt', 0, NULL),
(69, 'Warm-Up Interactive', '98', 'RUE DU CHATEAU', 'informatique (logiciel et progiciel)', '09 63 26 99 ', 92100, 'Boulogne-billancourt', 0, NULL),
(70, 'Wassa', '5', 'RUE DE L EGLISE', 'informatique (logiciel et progiciel)', '01 46 08 12 ', 92100, 'Boulogne-billancourt', 0, NULL),
(71, 'Webdeviin', '35', 'RUE DE PARIS', 'informatique (logiciel et progiciel)', '09 67 24 79 ', 92100, 'Boulogne-billancourt', 0, NULL),
(72, 'W-HA', '25 bis', 'AVENUE ANDRE MORIZET', 'informatique (logiciel et progiciel)', '01 41 03 25 ', 92100, 'Boulogne-billancourt', 0, NULL),
(73, 'W-HA', '38', 'RUE PAUL BERT', 'informatique (logiciel et progiciel)', '01 49 09 14 ', 92100, 'Boulogne-billancourt', 0, NULL),
(74, 'ZARGARI SHAHROZ', '14', 'RUE HENRI MARTIN', 'informatique (logiciel et progiciel)', '06 29 88 52 ', 92100, 'Boulogne-billancourt', 0, NULL),
(75, '1000feuille', '18', 'RUE MICHELET', 'agence et conseil en publicite', '01 40 60 77 ', 92100, 'Boulogne-billancourt', 0, NULL),
(76, '22 Juillet Conseil', '9', 'RUE DE VANVES', 'agence et conseil en publicite', '01 46 99 85 ', 92100, 'Boulogne-billancourt', 0, NULL),
(77, 'Adais Signaletique', '51', 'RUE THIERS', 'agence et conseil en publicite', '01 46 20 45 ', 92100, 'Boulogne-billancourt', 0, NULL),
(78, 'Adragante Communication', '17', 'RUE DE L EGLISE', 'agence et conseil en publicite', '01 46 05 42 ', 92100, 'Boulogne-billancourt', 0, NULL),
(79, 'Agence Art Boulevard', '3', 'RUE NATIONALE', 'agence et conseil en publicite', '01 41 22 05 ', 92100, 'Boulogne-billancourt', 0, NULL),
(80, 'Agence Conseil le Cameleon', '14', 'BOULEVARD JEAN JAURES', 'agence et conseil en publicite', '09 67 13 37 ', 92100, 'Boulogne-billancourt', 0, NULL),
(81, 'Automotive Logistics', '71', 'RUE DE BILLANCOURT', 'agence et conseil en publicite', '01 41 10 11 ', 92100, 'Boulogne-billancourt', 0, NULL),
(82, 'AVEC DES MOTS (SARL)', '27', 'RUE DE SOLFERINO', 'agence et conseil en publicite', '01 75 49 82 ', 92100, 'Boulogne-billancourt', 0, NULL),
(83, 'Avec des mots', '27', 'RUE DE SOLFERINO', 'agence et conseil en publicite', '01 83 64 40 ', 92100, 'Boulogne-billancourt', 0, NULL),
(84, 'Avenir Audiotel Multi Media', '80', 'AVENUE EDOUARD VAILLANT', 'agence et conseil en publicite', '01 46 04 47 ', 92100, 'Boulogne-billancourt', 0, NULL),
(85, 'BA COM', '19', 'RUE FERNAND PELLOUTIER', 'agence et conseil en publicite', '01 41 22 93 ', 92100, 'Boulogne-billancourt', 0, NULL),
(86, 'Bbdo Corporate', '69', 'AVENUE PIERRE GRENIER', 'agence et conseil en publicite', '01 46 09 46 ', 92100, 'Boulogne-billancourt', 0, NULL),
(87, 'BBDO Services', '93', 'RUE NATIONALE', 'agence et conseil en publicite', '01 41 23 43 ', 92100, 'Boulogne-billancourt', 0, NULL),
(88, 'BCM Sports', '68', 'RUE ESCUDIER', 'agence et conseil en publicite', '01 46 05 44 ', 92100, 'Boulogne-billancourt', 0, NULL),
(89, 'BCM Sports', '68', 'RUE ESCUDIER', 'agence et conseil en publicite', '09 75 96 78 ', 92100, 'Boulogne-billancourt', 0, NULL),
(90, 'Bel Canto', '18 bis', 'RUE PAUL BERT', 'agence et conseil en publicite', '09 70 40 88 ', 92100, 'Boulogne-billancourt', 0, NULL),
(91, 'Bouchi Dominique', '10', 'RUE DE LA BELLE FEUILLE', 'agence et conseil en publicite', '09 61 24 81 ', 92100, 'Boulogne-billancourt', 0, NULL),
(92, 'Bouchi Jean-Marc', '10', 'RUE DE LA BELLE FEUILLE', 'agence et conseil en publicite', '01 48 25 52 ', 92100, 'Boulogne-billancourt', 0, NULL),
(93, 'Brand Advocate', '30', 'RUE LOUIS PASTEUR', 'agence et conseil en publicite', '01 41 86 07 ', 92100, 'Boulogne-billancourt', 0, NULL),
(94, 'BRITISH AMERICAN TOBACCO FRANCE', '29', 'RUE DE L ABREUVOIR', 'agence et conseil en publicite', '01 55 19 92 ', 92100, 'Boulogne-billancourt', 0, NULL),
(95, 'BRONGNIART', '91', 'RUE MARCEL DASSAULT', 'agence et conseil en publicite', '09 71 57 21 ', 92100, 'Boulogne-billancourt', 0, NULL),
(96, 'C Prism', '28', 'RUE MAHIAS', 'agence et conseil en publicite', '01 41 31 32 ', 92100, 'Boulogne-billancourt', 0, NULL),
(97, 'CCA-WAD', '1', 'AVENUE PIERRE GRENIER', 'agence et conseil en publicite', '01 47 61 10 ', 92100, 'Boulogne-billancourt', 0, NULL),
(98, 'Conseil Media (S C M)', '8', 'RUE DE LA FERME', 'agence et conseil en publicite', '01 46 05 95 ', 92100, 'Boulogne-billancourt', 0, NULL),
(99, 'Conseil Media Sante', '9', 'RUE HENRI MARTIN', 'agence et conseil en publicite', '01 47 79 01 ', 92100, 'Boulogne-billancourt', 0, NULL),
(100, 'Contact Plus', '45 bis', 'AVENUE EDOUARD VAILLANT', 'agence et conseil en publicite', '01 46 20 44 ', 92100, 'Boulogne-billancourt', 0, NULL),
(101, 'Creapress', '93', 'RUE NATIONALE', 'agence et conseil en publicite', '01 41 23 40 ', 92100, 'Boulogne-billancourt', 0, NULL),
(102, 'CREATIVE EVENT S', '20', 'RUE THIERS', 'agence et conseil en publicite', '01 47 61 94 ', 92100, 'Boulogne-billancourt', 0, NULL),
(103, 'Cris', '162', 'RUE DE BILLANCOURT', 'agence et conseil en publicite', '01 49 09 70 ', 92100, 'Boulogne-billancourt', 0, NULL),
(104, 'Dracaena Conseil', '102', 'AVENUE EDOUARD VAILLANT', 'agence et conseil en publicite', '01 46 55 57 ', 92100, 'Boulogne-billancourt', 0, NULL),
(105, 'Drole D Idee', '86', 'RUE DU DOME', 'agence et conseil en publicite', '01 41 31 56 ', 92100, 'Boulogne-billancourt', 0, NULL),
(106, 'Econeo', '12', 'RUE D AGUESSEAU', 'agence et conseil en publicite', '01 49 10 95 ', 92100, 'Boulogne-billancourt', 0, NULL),
(107, 'En Personne', '10', 'RUE DE L EST', 'agence et conseil en publicite', '01 46 03 49 ', 92100, 'Boulogne-billancourt', 0, NULL),
(108, 'Fred', '66', 'RUE ESCUDIER', 'agence et conseil en publicite', '01 45 58 75 ', 92100, 'Boulogne-billancourt', 0, NULL),
(109, 'Futurama', '21', 'RUE DES LONGS PRES', 'agence et conseil en publicite', '01 41 04 22 ', 92100, 'Boulogne-billancourt', 0, NULL),
(110, 'G2 Paris', '63', 'RUE DE SEVRES', 'agence et conseil en publicite', '01 46 84 85 ', 92100, 'Boulogne-billancourt', 0, NULL),
(111, 'Georgeon et Associes', '66', 'RUE DU POINT DU JOUR', 'agence et conseil en publicite', '01 46 10 44 ', 92100, 'Boulogne-billancourt', 0, NULL),
(112, 'GERARD VALLETOUX ET ASSOCIES (SA)', '53', 'RUE DE PARIS', 'agence et conseil en publicite', '01 41 31 52 ', 92100, 'Boulogne-billancourt', 0, NULL),
(113, 'Granite Communication', '1', 'RUE DAMIENS', 'agence et conseil en publicite', '01 46 21 55 ', 92100, 'Boulogne-billancourt', 0, NULL),
(114, 'Graphimages', '7', 'RUE NEUVE SAINT GERMAIN', 'agence et conseil en publicite', '01 46 09 94 ', 92100, 'Boulogne-billancourt', 0, NULL),
(115, 'Groupe 111', '109 bis', 'ROUTE DE LA REINE', 'agence et conseil en publicite', '01 74 71 42 ', 92100, 'Boulogne-billancourt', 0, NULL),
(116, 'HEADWAY INTERNATIONAL (SARL)', '23', 'RUE DE PARIS', 'agence et conseil en publicite', '01 41 31 54 ', 92100, 'Boulogne-billancourt', 0, NULL),
(117, 'Illusio', '67', 'AVENUE PIERRE GRENIER', 'agence et conseil en publicite', '01 46 05 72 ', 92100, 'Boulogne-billancourt', 0, NULL),
(118, 'Image Business', '5', 'RUE NATIONALE', 'agence et conseil en publicite', '01 46 08 06 ', 92100, 'Boulogne-billancourt', 0, NULL),
(119, 'JT International France, Salle Informatique A', '35', 'RUE DES ABONDANCES', 'agence et conseil en publicite', '01 46 03 86 ', 92100, 'Boulogne-billancourt', 0, NULL),
(120, 'JTI - JT International France, Salle Informatique ', '35', 'RUE DES ABONDANCES', 'agence et conseil en publicite', '01 46 99 46 ', 92100, 'Boulogne-billancourt', 0, NULL),
(121, 'JTI - JT International France', '35', 'RUE DES ABONDANCES', 'agence et conseil en publicite', '01 46 99 46 ', 92100, 'Boulogne-billancourt', 0, NULL),
(122, 'Kanabou', '1', 'AVENUE DESFEUX', 'agence et conseil en publicite', '09 63 06 90 ', 92100, 'Boulogne-billancourt', 0, NULL),
(123, 'Le Fil', '52', 'RUE D AGUESSEAU', 'agence et conseil en publicite', '01 72 71 64 ', 92100, 'Boulogne-billancourt', 0, NULL),
(124, 'LEGITEAM', '17', 'RUE DE SEINE', 'agence et conseil en publicite', '01 83 39 44 ', 92100, 'Boulogne-billancourt', 0, NULL),
(125, 'Les Aiguilleurs', '113', 'AVENUE JEAN BAPTISTE CLEMENT', 'agence et conseil en publicite', '01 48 25 77 ', 92100, 'Boulogne-billancourt', 0, NULL),
(126, 'LES EDITIONS D ASTORG (SA)', '60', 'AVENUE DU GENERAL LECLERC', 'agence et conseil en publicite', '01 41 86 06 ', 92100, 'Boulogne-billancourt', 0, NULL),
(127, 'Les Quatre Lunes', '28', 'RUE DE L EST', 'agence et conseil en publicite', '01 41 10 94 ', 92100, 'Boulogne-billancourt', 0, NULL),
(128, 'Les Quatres Lunes', '28', 'RUE DE L EST', 'agence et conseil en publicite', '01 46 05 06 ', 92100, 'Boulogne-billancourt', 0, NULL),
(129, 'Libellule (SARL)', '13', 'RUE SAINT DENIS', 'agence et conseil en publicite', '01 48 25 73 ', 92100, 'Boulogne-billancourt', 0, NULL),
(130, 'Lombardini', '5', 'RUE GALLIENI', 'agence et conseil en publicite', '01 46 08 47 ', 92100, 'Boulogne-billancourt', 0, NULL),
(131, 'LOO MEDIA', '25 bis', 'AVENUE PIERRE GRENIER', 'agence et conseil en publicite', '01 46 10 01 ', 92100, 'Boulogne-billancourt', 0, NULL),
(132, 'MAIRIE INFO (SARL)', '45', 'RUE DE L EST', 'agence et conseil en publicite', '01 83 62 61 ', 92100, 'Boulogne-billancourt', 0, NULL),
(133, 'Marquageservices. Com', '32', 'RUE GALLIENI', 'agence et conseil en publicite', '01 71 16 14 ', 92100, 'Boulogne-billancourt', 0, NULL),
(134, 'MDC', '204', 'RPT DU PONT DE SEVRES', 'agence et conseil en publicite', '01 46 08 98 ', 92100, 'Boulogne-billancourt', 0, NULL),
(135, 'MDLP (Moradpour Dalsace Langlois Pizanti)', '7', 'RUE DU DOME', 'agence et conseil en publicite', '01 46 84 33 ', 92100, 'Boulogne-billancourt', 0, NULL),
(136, 'MILLE FEUILLE', '18', 'RUE MICHELET', 'agence et conseil en publicite', '01 84 19 05 ', 92100, 'Boulogne-billancourt', 0, NULL),
(137, 'Mise en Page', '43', 'RUE DE BELLEVUE', 'agence et conseil en publicite', '01 46 03 90 ', 92100, 'Boulogne-billancourt', 0, NULL),
(138, 'Mixdata', '95', 'RUE MARCEL DASSAULT', 'agence et conseil en publicite', '09 67 49 07 ', 92100, 'Boulogne-billancourt', 0, NULL),
(139, 'MP Conseil et Communication', '43', 'RUE DE BELLEVUE', 'agence et conseil en publicite', '01 46 03 22 ', 92100, 'Boulogne-billancourt', 0, NULL),
(140, 'OMD France', '11', 'AVENUE ANDRE MORIZET', 'agence et conseil en publicite', '01 74 31 55 ', 92100, 'Boulogne-billancourt', 0, NULL),
(141, 'Pauline Formalites', '6', 'VILLA PAULINE', 'agence et conseil en publicite', '01 46 08 28 ', 92100, 'Boulogne-billancourt', 0, NULL),
(142, 'Pierre Bonnerre', '4 C', 'RUE DE L OUEST', 'agence et conseil en publicite', '01 46 99 09 ', 92100, 'Boulogne-billancourt', 0, NULL),
(143, 'Polyvalence (Ste)', '54', 'RUE D AGUESSEAU', 'agence et conseil en publicite', '01 41 10 94 ', 92100, 'Boulogne-billancourt', 0, NULL),
(144, 'Polyvalence', '54', 'RUE D AGUESSEAU', 'agence et conseil en publicite', '01 46 04 19 ', 92100, 'Boulogne-billancourt', 0, NULL),
(145, 'Print Co', '19', 'RUE VAUTHIER', 'agence et conseil en publicite', '01 46 04 61 ', 92100, 'Boulogne-billancourt', 0, NULL),
(146, 'Produits de l Annee France', '66', 'RUE ESCUDIER', 'agence et conseil en publicite', '01 46 04 13 ', 92100, 'Boulogne-billancourt', 0, NULL),
(147, 'PROMOCOME', '4', 'RUE DES 4 CHEMINEES', 'agence et conseil en publicite', '01 47 61 11 ', 92100, 'Boulogne-billancourt', 0, NULL),
(148, 'Prot Jean-Claude', '75', 'RUE MARCEL DASSAULT', 'agence et conseil en publicite', '09 65 22 11 ', 92100, 'Boulogne-billancourt', 0, NULL),
(149, 'Proximity BBDO', '93', 'RUE NATIONALE', 'agence et conseil en publicite', '01 41 23 42 ', 92100, 'Boulogne-billancourt', 0, NULL),
(150, 'Publicis E-brand', '15', 'RUE DU DOME', 'agence et conseil en publicite', '01 55 20 28 ', 92100, 'Boulogne-billancourt', 0, NULL),
(151, 'RC Concept', '12', 'RUE DE PARIS', 'agence et conseil en publicite', '01 46 05 04 ', 92100, 'Boulogne-billancourt', 0, NULL),
(152, 'REGIMEDIA', '15', 'RUE DE SEINE', 'agence et conseil en publicite', '09 67 29 67 ', 92100, 'Boulogne-billancourt', 0, NULL),
(153, 'REVEZ DAILLEURS', '45 bis', 'AVENUE EDOUARD VAILLANT', 'agence et conseil en publicite', '01 46 47 20 ', 92100, 'Boulogne-billancourt', 0, NULL),
(154, 'Roseshocking SARL', '29', 'RUE DE BILLANCOURT', 'agence et conseil en publicite', '06 66 27 74 ', 92100, 'Boulogne-billancourt', 0, NULL),
(155, 'RUOPPOLO', '67', 'AVENUE PIERRE GRENIER', 'agence et conseil en publicite', '09 71 57 69 ', 92100, 'Boulogne-billancourt', 0, NULL),
(156, 'Sarl Rc Concept', '12', 'RUE DE PARIS', 'agence et conseil en publicite', '09 50 81 34 ', 92100, 'Boulogne-billancourt', 0, NULL),
(157, 'Sarl Rc Concept', '12', 'RUE DE PARIS', 'agence et conseil en publicite', '09 55 81 34 ', 92100, 'Boulogne-billancourt', 0, NULL),
(158, 'Savana Media', '39', 'RUE DE LA PYRAMIDE', 'agence et conseil en publicite', '01 46 05 69 ', 92100, 'Boulogne-billancourt', 0, NULL),
(159, 'SERVICE', '162', 'RUE DE BILLANCOURT', 'agence et conseil en publicite', '09 62 28 09 ', 92100, 'Boulogne-billancourt', 0, NULL),
(160, 'Sidiese', '49', 'RUE DE BILLANCOURT', 'agence et conseil en publicite', '01 41 31 78 ', 92100, 'Boulogne-billancourt', 0, NULL),
(161, 'Societe Conseil Media', '8', 'RUE DE LA FERME', 'agence et conseil en publicite', '01 46 09 07 ', 92100, 'Boulogne-billancourt', 0, NULL),
(162, 'Sport And Co', '79 bis', 'RUE MARCEL DASSAULT', 'agence et conseil en publicite', '01 46 10 39 ', 92100, 'Boulogne-billancourt', 0, NULL),
(163, 'Studionysos', '36', 'RUE MARCEL DASSAULT', 'agence et conseil en publicite', '01 47 61 07 ', 92100, 'Boulogne-billancourt', 0, NULL),
(164, 'Ste Conseil Media', '8', 'RUE DE LA FERME', 'agence et conseil en publicite', '09 67 26 07 ', 92100, 'Boulogne-billancourt', 0, NULL),
(165, 'Surf', '86', 'RUE THIERS', 'agence et conseil en publicite', '01 46 20 42 ', 92100, 'Boulogne-billancourt', 0, NULL),
(166, 'TBWA PARIS', '60', 'RUE CARNOT', 'agence et conseil en publicite', '01 49 09 00 ', 92100, 'Boulogne-billancourt', 0, NULL),
(167, 'TBWA Paris', '162', 'RUE DE BILLANCOURT', 'agence et conseil en publicite', '01 49 09 02 ', 92100, 'Boulogne-billancourt', 0, NULL),
(168, 'Terre de Sienne Holding', '79 bis', 'RUE DE PARIS', 'agence et conseil en publicite', '01 41 31 45 ', 92100, 'Boulogne-billancourt', 0, NULL),
(169, 'Tramecom', '17', 'QUAI DE STALINGRAD', 'agence et conseil en publicite', '01 46 10 32 ', 92100, 'Boulogne-billancourt', 0, NULL),
(170, 'WB', '56', 'RUE DE PARIS', 'agence et conseil en publicite', '01 55 19 80 ', 92100, 'Boulogne-billancourt', 0, NULL),
(171, 'WB CONSEIL (SARL)', '56', 'RUE DE PARIS', 'agence et conseil en publicite', '01 41 10 40 ', 92100, 'Boulogne-billancourt', 0, NULL),
(172, 'WB CONSEIL', '56', 'RUE DE PARIS', 'agence et conseil en publicite', '01 41 10 40 ', 92100, 'Boulogne-billancourt', 0, NULL),
(173, 'Young et Rubicam France', '57', 'AVENUE ANDRE MORIZET', 'agence et conseil en publicite', '01 46 84 33 ', 92100, 'Boulogne-billancourt', 0, NULL),
(174, 'Zee Agency', '83 bis', 'RUE THIERS', 'agence et conseil en publicite', '01 46 20 08 ', 92100, 'Boulogne-billancourt', 0, NULL),
(175, 'Agence DNA', '35', 'RUE GALLIENI', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(176, 'AVENIR CONSULT COMPETION L', '4', 'RUE D AGUESSEAU', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(177, 'BYPATH', '1', 'PLACE PAUL VERLAINE', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(178, 'COMMVALOR', '29', 'RUE DES TILLEULS', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(179, 'MADAME CHARLOTTE VIDAUD', '3', 'RUE DE LA PAIX', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(180, 'MADAME CLEMENTINE SISOMBAT', '937', 'COURS AQUITAINE', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(181, 'MADAME COLINE ROSA', '25', 'RUE AUGUSTE PERRET, LE CASTIGLIONE APT 512 ', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(182, 'MONSIEUR ALEXANDRE ORTIZ', '171', 'RUE DE BILLANCOURT', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(183, 'MONSIEUR AMOS JOEL AMOS', '31 bis', 'RUE TRAVERSIERE', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(184, 'MONSIEUR BENOIT DE LA FOREST DIVONNE', '18', 'RUE GEORGES SOREL', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(185, 'MONSIEUR CHRISTOPHE DELIQUAIRE', '27', 'RUE GALLIENI, BATIMENT C, 3E ETAGE', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(186, 'MONSIEUR DAVID COHEN', '78', 'AVENUE DU GENERAL LECLERC', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(187, 'MONSIEUR ERIC JOSEPH JEAN PEREZ', '55', 'AVENUE PIERRE GRENIER', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(188, 'MONSIEUR ETIENNE MALAPERT', '42', 'RUE DE LA ROCHEFOUCAULD', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(189, 'MONSIEUR FABIEN VENDROUX', '43 bis', 'RUE CARNOT', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(190, 'MONSIEUR GAO-FENG YE', '87', 'AVENUE VICTOR HUGO', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(191, 'MONSIEUR HENRI GOSSELIN', '6', 'RUE KOUFRA', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(192, 'MONSIEUR IRWIN ACHARD', '47', 'RUE DE SEVRES', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(193, 'MONSIEUR JEAN MUSSO', '136', 'RUE DU POINT DU JOUR', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(194, 'MONSIEUR JEREMY BCHIRI', '125', 'RUE DU VIEUX PONT DE SEVRES', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(195, 'MONSIEUR JULIEN ATTIAS', '38', 'RUE GAMBETTA', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(196, 'MONSIEUR LAURIC LEBAS', '11', 'RUE SAINT DENIS', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(197, 'MONSIEUR MASSIMO ZAMBELLI', '44', 'RUE DE LA SAUSSIERE', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(198, 'MONSIEUR PHILIPPE BAZI', '47', 'RUE MARCEL DASSAULT', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(199, 'MONSIEUR PHILIPPE PENISSOU', '147', 'RUE DE PARIS', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(200, 'MONSIEUR PIERRE DESOUCHES', '7', 'RUE CASTEJA', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(201, 'MONSIEUR PIERRE ROUSSEL', '4', 'RUE DE CLAMART', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(202, 'MONSIEUR SEBASTIEN BEGHELLI', '60', 'RUE DU CHEMIN VERT', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(203, 'MONSIEUR SRDJAN KLASNJA', '247 bis', 'BOULEVARD JEAN JAURES, CHEZ TODOROVIC DOBRICA', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(204, 'MONSIEUR VINCENT ROCARD', '13', 'RUE DE BELLEVUE', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(205, 'MONSIEUR VINCENT VINCENT', '46', 'QUAI GEORGES GORSE', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(206, 'Ova', '49', 'RUE DE BILLANCOURT', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(207, 'Ova', '49', 'IMPASSE DE BILLANCOURT', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(208, 'SARL 3 F SYSTEMS', '51', 'ROUTE DE LA REINE', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(209, 'SHS FRANCE', '31', 'AVENUE DU GENERAL LECLERC', 'informatique (logiciel et progiciel)', '', 92100, 'Boulogne-billancourt', 0, NULL),
(210, 'A. M. C. - ALFA MARKETING COMMUNICATION', '8', 'RUE DE L EST', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(211, 'AGENCE CRYSTAL', '1', 'PLACE PAUL VERLAINE', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(212, 'AH ARTS HAPPENING (ARTS HAPPENING)', '24', 'RUE DES ABONDANCES', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(213, 'ARTOP', '6 bis', 'RUE DE LA BELLE FEUILLE', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(214, 'BON PLAN', '69', 'RUE DANJOU', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(215, 'Calligrammes', '', '', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(216, 'CAFE SERRE', '9', 'RUE DE VANVES', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(217, 'COSMOPOLIT (VERT POMME)', '43', 'RUE D AGUESSEAU', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(218, 'COTE CLIENT', '32', 'RUE FESSART', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(219, 'DIDIER PAPELOUX ET ASSOCIES DPA', '100 bis', 'AVENUE VICTOR HUGO', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(220, 'DM COM', '73', 'RUE DU CHATEAU', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(221, 'E. WALKING', '134', 'RUE DU POINT DU JOUR', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(222, 'Libellule', '13', 'RUE SAINT DENIS', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(223, 'I BREED', '33 ter', 'AVENUE EDOUARD VAILLANT', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(224, 'LA COMPAGNIE MEDIA', '4 bis', 'RUE DE LA PYRAMIDE', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(225, 'LAB DE COM', '86', 'RUE THIERS', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(226, 'M. P. COMMUNICATION', '8', 'PLACE CORNEILLE', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(227, 'PROMO COM PLV', '3', 'RUE DES 4 CHEMINEES', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(228, 'MANAGEMENT MEDIA INTERNATIONAL', '88 ter', 'AVENUE DU GENERAL LECLERC', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(229, 'NORTH COAST CONSULTANT', '1', 'PLACE PAUL VERLAINE', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(230, 'NORTH COAST CONSULTANT', '57', 'QUAI GEORGES GORSE', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(231, 'OKALA COMMUNICATION', '16', 'RUE DES 4 CHEMINEES', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(232, 'OMNICOLOR FRANCE', '8', 'RUE DE L EST', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(233, 'ONE SHOT STUDIO MUSIC CASTING DUPLICAT', '95', 'AVENUE EDOUARD VAILLANT', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(234, 'ONIRIK', '43', 'RUE DE BELLEVUE', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(235, 'PFD', '14', 'RUE GEORGES SOREL', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(236, 'PIMENT ROUGE', '16', 'RUE D ISSY', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(237, 'PUBLICITE LUMINEUSE ET AFFICHAGE LIOTE', '14', 'RUE VAUTHIER', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(238, 'SEROS', '8', 'RUE DES ABONDANCES', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(239, 'SIGNA RAMA (BELCLARE)', '57', 'ROUTE DE LA REINE', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(240, 'T. R. O. FRANCE', '50', 'RUE DE SILLY', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(241, 'TOTANKA', '3', 'RUE FERNAND PELLOUTIER', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(242, 'TRIBU', '21', 'RUE DE VANVES', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(243, 'TRIBU', '8', 'RUE D ISSY', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL),
(244, 'M. P. COMMUNICATION', '102', 'RUE DU POINT DU JOUR', 'agence et conseil en publicite', '', 92100, 'Boulogne-billancourt', 0, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appels`
--
ALTER TABLE `appels`
  ADD CONSTRAINT `CONTACT` FOREIGN KEY (`id_contact`) REFERENCES `contactes` (`id_contact`) ON UPDATE CASCADE,
  ADD CONSTRAINT `SOCIETE` FOREIGN KEY (`id_societe`) REFERENCES `societes` (`id_societe`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
