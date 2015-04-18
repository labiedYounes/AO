-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Avril 2015 à 23:32
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ao`
--

-- --------------------------------------------------------

--
-- Structure de la table `appel`
--

CREATE TABLE IF NOT EXISTS `appel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeMarche` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateLimit` datetime NOT NULL,
  `maitreOuvrage_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_130D3BD2F4EB6F9` (`maitreOuvrage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=71 ;

--
-- Contenu de la table `appel`
--

INSERT INTO `appel` (`id`, `objet`, `description`, `type`, `passation`, `cp`, `ville`, `typeMarche`, `dateLimit`, `maitreOuvrage_id`) VALUES
(3, 'qsdf', 'qsdf', NULL, NULL, NULL, NULL, NULL, '2015-04-08 00:00:00', NULL),
(4, 'sdf', 'qsdf', 'qsdf', 'sdqf', 'qsdf', 'qsdf', 'qsdf', '2015-06-08 00:00:00', NULL),
(5, 'sqdf', 'sdf', 'qsdf', 'sqdf', 'qsdf', 'sqd', 'sqdf', '2015-04-11 00:00:00', NULL),
(6, 'sdf', 'sdf', 'sdf', 'sdf', 'sdqf', 'sdqf', 'sqdf', '2015-04-10 00:00:00', 3),
(7, 'qdf', 'qsdf', 'qdf', 'qdf', 'qsdf', 'dqsf', 'qsdfdqsf', '2018-01-07 00:00:00', 5),
(12, 'dsfq', 'sqdf', 'qdsf', 'sqf', 'qsdf', NULL, 'qsdf', '2015-06-07 00:00:00', 10),
(13, 'dsfq', 'qsdf', 'sdf', NULL, 'sdf', 'qsdf', 'sqdf', '2017-01-03 00:00:00', 11),
(14, 'fsqf', 'sdf', 'qdsf', 'qsf', '136', 'qsdf', 'sqf', '2016-03-03 00:00:00', 12),
(16, 'qsdf', 'sdf', 'ss', 'ssss', '64', 'qsdf', 'qsdf', '2016-01-01 00:00:00', 14),
(17, 'sdf', 'qsdfsdq', 'fqsd', 'sqdf', '65', 'qsdf', 'qsdf', '2016-01-01 00:00:00', 15),
(19, 'sdf', 'qsdfsdq', 'fqsd', 'sqdf', '65', 'qsdf', 'qsdf', '2016-01-01 00:00:00', 17),
(20, 'dsqf', 'ssdf', 'sdf', 'sdf', '545', 'sdf', 'qsdf', '2017-01-01 00:00:00', 18),
(22, 'dsqf', 'ssdf', 'sdf', 'sdf', '545', 'sdf', 'qsdf', '2017-01-01 00:00:00', 20),
(23, 'dsqf', 'ssdf', 'sdf', 'sdf', '545', 'sdf', 'qsdf', '2017-01-01 00:00:00', 21),
(43, 'dsqf', 'ssdf', 'sdf', 'sdf', '545', 'sdf', 'qsdf', '2017-01-01 00:00:00', 41),
(44, 'dsqf', 'ssdf', 'sdf', 'sdf', '545', 'sdf', 'qsdf', '2017-01-01 00:00:00', 42),
(46, 'dsqf', 'ssdf', 'sdf', 'sdf', '545', 'sdf', 'qsdf', '2017-01-01 00:00:00', 44),
(47, 'dsqf', 'ssdf', 'sdf', 'sdf', '545', 'sdf', 'qsdf', '2017-01-01 00:00:00', 45),
(48, 'dsqf', 'ssdf', 'sdf', 'sdf', '545', 'sdf', 'qsdf', '2017-01-01 00:00:00', 46),
(52, 'dsqf', 'ssdf', 'sdf', 'sdf', '545', 'sdf', 'qsdf', '2017-01-01 00:00:00', 50),
(54, 'test', 'ss', 'ss', 'ssss', '2', 'sss', 'ss', '2017-01-01 00:00:00', 52),
(67, 'test', 'ss', 'ss', 'ssss', '2', 'sss', 'ss', '2017-01-01 00:00:00', 65),
(68, 'test', 'ss', 'ss', 'ssss', '2', 'sss', 'ss', '2017-01-01 00:00:00', 66),
(69, 'test', 'ss', 'ss', 'ssss', '2', 'sss', 'ss', '2017-01-01 00:00:00', 67),
(70, 'lksdf', 'sqdf', 'dsf', 'sdf', '546', 'sdf', 'qsdf', '2016-01-01 00:00:00', 68);

-- --------------------------------------------------------

--
-- Structure de la table `caution`
--

CREATE TABLE IF NOT EXISTS `caution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateDemande` datetime NOT NULL,
  `dateRetour` datetime NOT NULL,
  `situationAppel_id` int(11) DEFAULT NULL,
  `situationMarche_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3E9CC61528B522EF` (`situationAppel_id`),
  KEY `IDX_3E9CC61540FD69F8` (`situationMarche_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `enterprise`
--

CREATE TABLE IF NOT EXISTS `enterprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `secteur` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forme` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `site` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69 ;

--
-- Contenu de la table `enterprise`
--

INSERT INTO `enterprise` (`id`, `nom`, `secteur`, `forme`, `adresse`, `telephone`, `fax`, `mail`, `site`, `type`) VALUES
(3, 'sdf', 'dsqf', 'dsqf', 'qdsfds', 'f', 'dsf', 'dsf', 'sdf', 'sdf'),
(4, 'klmjmk', 'mk;', 'sdf', 'qsdf', 'sqdf', 'sdf', 'qsdf', 'sqdf', 'qsdf'),
(5, 'aaaaa', NULL, NULL, NULL, 'qsdfq', NULL, 'qsdf', NULL, NULL),
(10, 'sdf', 'sdf', 'sdf', 'qsdfsd', 'sdf', 'qsdfss', 'sdf', 'sqdf', 'qsdf'),
(11, 'sdf', 'sdf', 'q', 'sd', 'f', 'd', 'd', 'sqdf', 'sdqf'),
(12, 'sqdf', 'sqdf', 'qfs', 'sdf', 'sdf', 'ssds', 'sdf', 'sdf', 'sdf'),
(13, 'sdf', 'sqsdf', 'qsdf', 'dsf', 'sdf', 'ssds', 'sdf', 'sqdf', 'sdqf'),
(14, 'sdf', 'sdf', 'sdf', 'sd', 'sdf', 'ssds', 'sdf', 'sqdf', 'sdqf'),
(15, 'sdf', 'sdf', 'qsdf', 'sdf', 'sqdf', 'sdf', 'sdf', 'sqdf', 'sqdf'),
(16, 'sdf', 'sdf', 'qsdf', 'sdf', 'sqdf', 'sdf', 'sdf', 'sqdf', 'sqdf'),
(17, 'sdf', 'sdf', 'qsdf', 'sdf', 'sqdf', 'sdf', 'sdf', 'sqdf', 'sqdf'),
(18, 'sqdf', 'sqdf', 'qsdf', 'sdf', 'qsdf', 'sqdf', 'sqdf', 'sqf', 'sqdf'),
(20, 'sqdf', 'sqdf', 'qsdf', 'sdf', 'qsdf', 'sqdf', 'sqdf', 'sqf', 'sqdf'),
(21, 'sqdf', 'sqdf', 'qsdf', 'sdf', 'qsdf', 'sqdf', 'sqdf', 'sqf', 'sqdf'),
(41, 'sqdf', 'sqdf', 'qsdf', 'sdf', 'qsdf', 'sqdf', 'sqdf', 'sqf', 'sqdf'),
(42, 'sqdf', 'sqdf', 'qsdf', 'sdf', 'qsdf', 'sqdf', 'sqdf', 'sqf', 'sqdf'),
(44, 'sqdf', 'sqdf', 'qsdf', 'sdf', 'qsdf', 'sqdf', 'sqdf', 'sqf', 'sqdf'),
(45, 'sqdf', 'sqdf', 'qsdf', 'sdf', 'qsdf', 'sqdf', 'sqdf', 'sqf', 'sqdf'),
(46, 'sqdf', 'sqdf', 'qsdf', 'sdf', 'qsdf', 'sqdf', 'sqdf', 'sqf', 'sqdf'),
(50, 'sqdf', 'sqdf', 'qsdf', 'sdf', 'qsdf', 'sqdf', 'sqdf', 'sqf', 'sqdf'),
(52, 'qsdf', NULL, 'fqsdf', 'qdf', 'qdsf', 'dfs', 'qsdf', 'qsdf', 'sdf'),
(65, 'qsdf', NULL, 'fqsdf', 'qdf', 'qdsf', 'dfs', 'qsdf', 'qsdf', 'sdf'),
(66, 'qsdf', NULL, 'fqsdf', 'qdf', 'qdsf', 'dfs', 'qsdf', 'qsdf', 'sdf'),
(67, 'qsdf', NULL, 'fqsdf', 'qdf', 'qdsf', 'dfs', 'qsdf', 'qsdf', 'sdf'),
(68, 'qsdf', 'qsdf', 'sdqf', 'qsdfsd', 'sdf', 'qsdfss', 'qsdfd', 'dsqf', 'qdsf');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valuesArray` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  `displayedString` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situationAppel_id` int(11) DEFAULT NULL,
  `situationMarche_id` int(11) DEFAULT NULL,
  `modelEtats_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_55CAF76228B522EF` (`situationAppel_id`),
  KEY `IDX_55CAF76240FD69F8` (`situationMarche_id`),
  KEY `IDX_55CAF76227D3E6F4` (`modelEtats_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=70 ;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id`, `ref`, `valuesArray`, `displayedString`, `situationAppel_id`, `situationMarche_id`, `modelEtats_id`) VALUES
(1, '', '{"choices":["Notification"],"dateField":{"displayedString":"Date", "type":"date", "value":null}}', '', NULL, NULL, 2),
(2, '', '{"choices":["Copie du Marché","Visé","Enregistré"]}', '', NULL, NULL, 2),
(3, '', '{"choices":["Ordre de Service"],"dateField":{"displayedString":"Date", "type":"date", "value":null}}', '', NULL, NULL, 2),
(4, '', '{"choices":["Bons de Commande Achat :"],"dateField":{"displayedString":"Date", "type":"date" ,"value":null}}', '', NULL, NULL, 2),
(5, '', '{"delay":{"displayedString":"Délai d’exécution","value":null,"type":"number","suffix":"jours"},"dateField":{"displayedString":"Date Fin d’exécution prévue ", "type":"date", "value":null}}', '', NULL, NULL, 2),
(6, '', '{"choices":["Caution Définitive"],"dateField":{"displayedString":"Date", "type":"date" ,"value":null},"quantity":{"displayedString":"Montant","type":"double" ,"value":null}}', '', NULL, NULL, 2),
(7, '', '{"choices":["Retour Caut.  Prov."] ,"dateField":{"displayedString":"Date", "type":"date" ,"value":null},"quantity":{"displayedString":"Montant","type":"double" ,"value":null}}', '', NULL, NULL, 2),
(8, '', '{"choices":["BL Fournisseurs :  "],"dateField":{"displayedString":"Date", "type":"date" ,"value":null}}', '', NULL, NULL, 2),
(9, '', '{"choices":["Bon de Livraison","Daté","Signé"]}', '', NULL, NULL, 2),
(10, '', '{"choices":["PV de RP"], "dateField":{"displayedString":"Date", "type":"date" ,"value":null}}', '', NULL, NULL, 2),
(11, '', '{"choices":["Caution R.G	"], "dateField":{"displayedString":"Date", "type":"date" ,"value":null},"quantity":{"displayedString":"Montant","type":"double" ,"value":null}}', '', NULL, NULL, 2),
(12, '', '{"choices":["Facture (Décompte) ","Signé"]}', '', NULL, NULL, 2),
(13, '', '{"dateField":{"displayedString":"Date", "type":"date" ,"value":null}, "quantity":{"displayedString":"N°","type":"number" ,"value":null}', '', NULL, NULL, 2),
(14, '', '{"choices":["Oui ","Non"]}', 'soumission', NULL, NULL, 1),
(15, '', '{"textfield":{"displayedString":"si non Motif", "type":"text" ,"value":null}}', 'si non Motif', NULL, NULL, 1),
(16, '', '{"choices":["Oui ","Non"]}', 'avant vente', NULL, NULL, 1),
(17, '', '{"linkes":{"pointing":"entreprise","value":[]}}', 'soumissionaires', NULL, NULL, 1),
(54, '', '{"choices":["Oui ","Non"]}', 'soumission', 56, NULL, NULL),
(55, '', '{"textfield":{"displayedString":"si non Motif","type":"text","value":null}}', 'si non Motif', 56, NULL, NULL),
(56, '', '{"choices":["Oui ","Non"]}', 'avant vente', 56, NULL, NULL),
(57, '', '{"linkes":{"pointing":"entreprise","value":[]}}', 'soumissionaires', 56, NULL, NULL),
(58, '', '{"choices":["Oui ","Non"]}', 'soumission', NULL, NULL, NULL),
(59, '', '{"textfield":{"displayedString":"si non Motif","type":"text","value":null}}', 'si non Motif', NULL, NULL, NULL),
(60, '', '{"choices":["Oui ","Non"]}', 'avant vente', NULL, NULL, NULL),
(61, '', '{"linkes":{"pointing":"entreprise","value":[]}}', 'soumissionaires', NULL, NULL, NULL),
(62, '', '{"choices":["Oui ","Non"],"type":"choice"}', 'soumission', 58, NULL, NULL),
(63, '', '{"textfield":{"displayedString":"si non Motif","type":"text","value":null},"type":"text"}', 'si non Motif', 58, NULL, NULL),
(64, '', '{"choices":["Oui ","Non"],"type":"choice"}', 'avant vente', 58, NULL, NULL),
(66, '', '{"choices":["Oui ","Non"]}', 'soumission', 59, NULL, NULL),
(67, '', '{"textfield":{"displayedString":"si non Motif","type":"text","value":null}}', 'si non Motif', 59, NULL, NULL),
(68, '', '{"choices":["Oui ","Non"]}', 'avant vente', 59, NULL, NULL),
(69, '', '{"linkes":{"pointing":"entreprise","value":[]}}', 'soumissionaires', 59, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

CREATE TABLE IF NOT EXISTS `lot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `suiviPlis_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B81291BEED06555` (`suiviPlis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lotsoumissionnaire`
--

CREATE TABLE IF NOT EXISTS `lotsoumissionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lot_id` int(11) DEFAULT NULL,
  `soumissionnaire_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CBB05571A8CBA5F7` (`lot_id`),
  KEY `IDX_CBB05571D29926FB` (`soumissionnaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `marche`
--

CREATE TABLE IF NOT EXISTS `marche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datePassation` datetime NOT NULL,
  `responsableProjet_id` int(11) DEFAULT NULL,
  `maitreOuvrage_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BAA18ACC885829AB` (`responsableProjet_id`),
  KEY `IDX_BAA18ACC2F4EB6F9` (`maitreOuvrage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `modeletats`
--

CREATE TABLE IF NOT EXISTS `modeletats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isDefault` tinyint(1) DEFAULT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `modeletats`
--

INSERT INTO `modeletats` (`id`, `isDefault`, `type`) VALUES
(1, 1, 'appel'),
(2, 1, 'marche');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `responsabilite` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `situationappel`
--

CREATE TABLE IF NOT EXISTS `situationappel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appel_id` int(11) DEFAULT NULL,
  `numOrder` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resultas` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsableCompte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsableQualification` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantMarche` int(11) DEFAULT NULL,
  `lot` int(11) DEFAULT NULL,
  `dateSoumission` datetime DEFAULT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `modelEtats_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_73F76450270B0E02` (`appel_id`),
  KEY `IDX_73F7645027D3E6F4` (`modelEtats_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Contenu de la table `situationappel`
--

INSERT INTO `situationappel` (`id`, `appel_id`, `numOrder`, `resultas`, `responsableCompte`, `responsableQualification`, `montantMarche`, `lot`, `dateSoumission`, `observation`, `modelEtats_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 23, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL),
(32, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(56, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(57, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(58, 69, 'km', 'ergt', 'sf', 'ss', NULL, NULL, '2018-05-07 04:04:00', NULL, 1),
(59, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `situationmarche`
--

CREATE TABLE IF NOT EXISTS `situationmarche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marche_id` int(11) DEFAULT NULL,
  `modelEtats_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6468D3BE9E494911` (`marche_id`),
  KEY `IDX_6468D3BE27D3E6F4` (`modelEtats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `suiviplis`
--

CREATE TABLE IF NOT EXISTS `suiviplis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateOuverture` datetime NOT NULL,
  `seance` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `responsableCompte_id` int(11) DEFAULT NULL,
  `chagerDepot_id` int(11) DEFAULT NULL,
  `situationAppel_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6B134B127A5CCDF9` (`responsableCompte_id`),
  UNIQUE KEY `UNIQ_6B134B124F30345C` (`chagerDepot_id`),
  UNIQUE KEY `UNIQ_6B134B1228B522EF` (`situationAppel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appel`
--
ALTER TABLE `appel`
  ADD CONSTRAINT `FK_130D3BD2F4EB6F9` FOREIGN KEY (`maitreOuvrage_id`) REFERENCES `enterprise` (`id`);

--
-- Contraintes pour la table `caution`
--
ALTER TABLE `caution`
  ADD CONSTRAINT `FK_3E9CC61528B522EF` FOREIGN KEY (`situationAppel_id`) REFERENCES `situationappel` (`id`),
  ADD CONSTRAINT `FK_3E9CC61540FD69F8` FOREIGN KEY (`situationMarche_id`) REFERENCES `situationmarche` (`id`);

--
-- Contraintes pour la table `etat`
--
ALTER TABLE `etat`
  ADD CONSTRAINT `FK_55CAF76227D3E6F4` FOREIGN KEY (`modelEtats_id`) REFERENCES `modeletats` (`id`),
  ADD CONSTRAINT `FK_55CAF76228B522EF` FOREIGN KEY (`situationAppel_id`) REFERENCES `situationappel` (`id`),
  ADD CONSTRAINT `FK_55CAF76240FD69F8` FOREIGN KEY (`situationMarche_id`) REFERENCES `situationmarche` (`id`);

--
-- Contraintes pour la table `lot`
--
ALTER TABLE `lot`
  ADD CONSTRAINT `FK_B81291BEED06555` FOREIGN KEY (`suiviPlis_id`) REFERENCES `suiviplis` (`id`);

--
-- Contraintes pour la table `lotsoumissionnaire`
--
ALTER TABLE `lotsoumissionnaire`
  ADD CONSTRAINT `FK_CBB05571A8CBA5F7` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`id`),
  ADD CONSTRAINT `FK_CBB05571D29926FB` FOREIGN KEY (`soumissionnaire_id`) REFERENCES `enterprise` (`id`);

--
-- Contraintes pour la table `marche`
--
ALTER TABLE `marche`
  ADD CONSTRAINT `FK_BAA18ACC2F4EB6F9` FOREIGN KEY (`maitreOuvrage_id`) REFERENCES `enterprise` (`id`),
  ADD CONSTRAINT `FK_BAA18ACC885829AB` FOREIGN KEY (`responsableProjet_id`) REFERENCES `responsable` (`id`);

--
-- Contraintes pour la table `situationappel`
--
ALTER TABLE `situationappel`
  ADD CONSTRAINT `FK_73F76450270B0E02` FOREIGN KEY (`appel_id`) REFERENCES `appel` (`id`),
  ADD CONSTRAINT `FK_73F7645027D3E6F4` FOREIGN KEY (`modelEtats_id`) REFERENCES `modeletats` (`id`);

--
-- Contraintes pour la table `situationmarche`
--
ALTER TABLE `situationmarche`
  ADD CONSTRAINT `FK_6468D3BE27D3E6F4` FOREIGN KEY (`modelEtats_id`) REFERENCES `modeletats` (`id`),
  ADD CONSTRAINT `FK_6468D3BE9E494911` FOREIGN KEY (`marche_id`) REFERENCES `marche` (`id`);

--
-- Contraintes pour la table `suiviplis`
--
ALTER TABLE `suiviplis`
  ADD CONSTRAINT `FK_6B134B1228B522EF` FOREIGN KEY (`situationAppel_id`) REFERENCES `situationappel` (`id`),
  ADD CONSTRAINT `FK_6B134B124F30345C` FOREIGN KEY (`chagerDepot_id`) REFERENCES `responsable` (`id`),
  ADD CONSTRAINT `FK_6B134B127A5CCDF9` FOREIGN KEY (`responsableCompte_id`) REFERENCES `responsable` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
