-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : ven. 09 juin 2023 à 11:17
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mamwe`
--

-- --------------------------------------------------------

--
-- Structure de la table `mw_agenda`
--

DROP TABLE IF EXISTS `mw_agenda`;
CREATE TABLE IF NOT EXISTS `mw_agenda` (
  `mw_id_agenda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_date_agenda` date NOT NULL,
  `mw_content_agenda` varchar(1000) NOT NULL,
  `mw_title_agenda` varchar(100) NOT NULL,
  `mw_picture_mw_id_picture` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`mw_id_agenda`),
  KEY `fk_agenda_mw_picture1_idx` (`mw_picture_mw_id_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mw_article`
--

DROP TABLE IF EXISTS `mw_article`;
CREATE TABLE IF NOT EXISTS `mw_article` (
  `mw_id_article` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_title_art` varchar(100) NOT NULL,
  `mw_content_art` text NOT NULL,
  `mw_visible_art` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1 COMMENT '1 = visble 0 = invisble ',
  `mw_date_art` date NOT NULL DEFAULT current_timestamp(),
  `mw_section_mw_id_section` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`mw_id_article`),
  KEY `fk_mw_article_mw_section1_idx` (`mw_section_mw_id_section`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mw_category_ressource`
--

DROP TABLE IF EXISTS `mw_category_ressource`;
CREATE TABLE IF NOT EXISTS `mw_category_ressource` (
  `mw_category_id` int(10) UNSIGNED NOT NULL,
  `mw_category_title` varchar(111) NOT NULL,
  `mw_category_url` varchar(111) NOT NULL,
  `mw_category_content` text DEFAULT NULL,
  PRIMARY KEY (`mw_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mw_homepage`
--

DROP TABLE IF EXISTS `mw_homepage`;
CREATE TABLE IF NOT EXISTS `mw_homepage` (
  `mw_id_homepage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_content_homepage` text NOT NULL,
  `mw_date_homepage` date NOT NULL,
  `mw_picture_mw_id_picture` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`mw_id_homepage`),
  KEY `fk_mw_homepage_mw_picture_idx` (`mw_picture_mw_id_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mw_info`
--

DROP TABLE IF EXISTS `mw_info`;
CREATE TABLE IF NOT EXISTS `mw_info` (
  `mw_id_info` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_content_info` text NOT NULL,
  `mw_date_info` date NOT NULL,
  `mw_picture_mw_id_picture` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`mw_id_info`),
  KEY `fk_mw_info_mw_picture1_idx` (`mw_picture_mw_id_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mw_livredor`
--

DROP TABLE IF EXISTS `mw_livredor`;
CREATE TABLE IF NOT EXISTS `mw_livredor` (
  `mw_id_livredor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_name_livredor` varchar(100) NOT NULL,
  `mw_mail_livredor` varchar(100) NOT NULL DEFAULT '1' COMMENT '1 = visible 0 = invisbile ',
  `mw_message_livredor` text NOT NULL,
  `mw_date_livredor` date NOT NULL DEFAULT current_timestamp(),
  `mw_visibility_livredor` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = visible 0 = invislbe 2 = userban',
  PRIMARY KEY (`mw_id_livredor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mw_patient`
--

DROP TABLE IF EXISTS `mw_patient`;
CREATE TABLE IF NOT EXISTS `mw_patient` (
  `mw_id_patient` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_name_patient` varchar(100) NOT NULL,
  `mw_surename_patient` varchar(100) NOT NULL,
  `mw_birthdate_patient` date NOT NULL,
  `mw_mail_patient` varchar(45) NOT NULL,
  `mw_phone_patient` int(11) NOT NULL,
  PRIMARY KEY (`mw_id_patient`),
  UNIQUE KEY `mw_nom_mail_UNIQUE` (`mw_mail_patient`),
  UNIQUE KEY `mw_nom_gsm_UNIQUE` (`mw_phone_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mw_picture`
--

DROP TABLE IF EXISTS `mw_picture`;
CREATE TABLE IF NOT EXISTS `mw_picture` (
  `mw_id_picture` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_title_picture` varchar(100) DEFAULT NULL,
  `mw_url_picture` varchar(255) CHARACTER SET latin1 NOT NULL,
  `mw_taille_picture` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1 COMMENT '1 = visible 0 = invisble ',
  `mw_posotion_picture` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1 COMMENT '1 = visible 0 = invisible\\\\n1 droite et 0 gauche ',
  `mw_article_mw_id_article` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`mw_id_picture`),
  UNIQUE KEY `mw_url_picture_UNIQUE` (`mw_url_picture`),
  UNIQUE KEY `mw_title_picture_UNIQUE` (`mw_title_picture`),
  KEY `fk_mw_picture_mw_article1_idx` (`mw_article_mw_id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mw_ressources`
--

DROP TABLE IF EXISTS `mw_ressources`;
CREATE TABLE IF NOT EXISTS `mw_ressources` (
  `mw_id_ressource` int(11) NOT NULL,
  `mw_title_ressource` varchar(255) NOT NULL,
  `mw_content_ressource` text NOT NULL,
  `mw_url_ressource` varchar(255) DEFAULT NULL,
  `mw_date_ressource` date DEFAULT NULL,
  `mw_picture_mw_id_picture` int(10) UNSIGNED DEFAULT NULL,
  `mw_category_ressource_mw_category_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`mw_id_ressource`),
  KEY `fk_mw_ressources_mw_picture1_idx` (`mw_picture_mw_id_picture`),
  KEY `fk_mw_ressources_mw_category_ressource1_idx` (`mw_category_ressource_mw_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mw_section`
--

DROP TABLE IF EXISTS `mw_section`;
CREATE TABLE IF NOT EXISTS `mw_section` (
  `mw_id_sect` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_title_sect` varchar(100) NOT NULL,
  `mw_content_sect` text NOT NULL,
  `mw_visible_sect` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 = visible 0 = invisible',
  `mw_picture_mw_id_picture` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`mw_id_sect`),
  UNIQUE KEY `mw_title_sect_UNIQUE` (`mw_title_sect`),
  KEY `fk_mw_section_mw_picture1_idx` (`mw_picture_mw_id_picture`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mw_section`
--

INSERT INTO `mw_section` (`mw_id_sect`, `mw_title_sect`, `mw_content_sect`, `mw_visible_sect`, `mw_picture_mw_id_picture`) VALUES
(1, 'avant', 'qsdfqsdf qsdqf sdfq df sd fsq fsdq f', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mw_user`
--

DROP TABLE IF EXISTS `mw_user`;
CREATE TABLE IF NOT EXISTS `mw_user` (
  `mw_id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_login_user` text NOT NULL,
  `mw_mail_user` text NOT NULL,
  `mw_pwd_user` text NOT NULL,
  PRIMARY KEY (`mw_id_user`),
  UNIQUE KEY `mw_login_user_UNIQUE` (`mw_login_user`) USING HASH,
  UNIQUE KEY `mw_mail_user_UNIQUE` (`mw_mail_user`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mw_agenda`
--
ALTER TABLE `mw_agenda`
  ADD CONSTRAINT `fk_agenda_mw_picture1` FOREIGN KEY (`mw_picture_mw_id_picture`) REFERENCES `mw_picture` (`mw_id_picture`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_article`
--
ALTER TABLE `mw_article`
  ADD CONSTRAINT `fk_mw_article_mw_section1` FOREIGN KEY (`mw_section_mw_id_section`) REFERENCES `mw_section` (`mw_id_sect`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_homepage`
--
ALTER TABLE `mw_homepage`
  ADD CONSTRAINT `fk_mw_homepage_mw_picture` FOREIGN KEY (`mw_picture_mw_id_picture`) REFERENCES `mw_picture` (`mw_id_picture`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_info`
--
ALTER TABLE `mw_info`
  ADD CONSTRAINT `fk_mw_info_mw_picture1` FOREIGN KEY (`mw_picture_mw_id_picture`) REFERENCES `mw_picture` (`mw_id_picture`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_picture`
--
ALTER TABLE `mw_picture`
  ADD CONSTRAINT `fk_mw_picture_mw_article1` FOREIGN KEY (`mw_article_mw_id_article`) REFERENCES `mw_article` (`mw_id_article`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_ressources`
--
ALTER TABLE `mw_ressources`
  ADD CONSTRAINT `fk_mw_ressources_mw_category_ressource1` FOREIGN KEY (`mw_category_ressource_mw_category_id`) REFERENCES `mw_category_ressource` (`mw_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mw_ressources_mw_picture1` FOREIGN KEY (`mw_picture_mw_id_picture`) REFERENCES `mw_picture` (`mw_id_picture`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_section`
--
ALTER TABLE `mw_section`
  ADD CONSTRAINT `fk_mw_section_mw_picture1` FOREIGN KEY (`mw_picture_mw_id_picture`) REFERENCES `mw_picture` (`mw_id_picture`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
