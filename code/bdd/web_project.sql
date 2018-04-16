-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 16 avr. 2018 à 09:28
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web_project`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `new_idea`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `new_idea` (IN `_title` VARCHAR(25), IN `_description` VARCHAR(255), IN `_publish_dated` DATE, IN `_mail` VARCHAR(255))  BEGIN
SET autocommit = 0 ;
START TRANSACTION;
INSERT INTO `event`(`title`, `description`, `finished`, `validate`, `publish_dated`, `id_account`) 
VALUES (_title,_description, 0,0,_publish_dated,(SELECT id FROM account WHERE `mail`= _mail));
COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` char(255) NOT NULL,
  `first_name` char(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `statute` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id`, `last_name`, `first_name`, `mail`, `pwd`, `statute`) VALUES
(1, 'Brunelot', 'Romain', 'rbrunelot@cesi.fr', '$2y$12$CQgrSU9nPrdejzu2j9nWHuphyCZaco6wWFYVQmxRXSdtZ5KW.A0Pe', 3),
(2, 'Klein', 'Aurélien', 'aurelien.klein@viacesi.fr', '$2y$12$eB2ubcja4bF5SN3kh1cad.4qEQfp6DeAS74FkEolpion6k5cDQW9K', 2),
(3, 'Bonjour', 'root', 'test@viacesi.fr', '$2y$12$uZkSZY8nc9s5VTgPmaK9Qe7Z9Nysp8ta7GH.BokVypodOT.Yi8Sma', 1),
(4, 'aa', 'aa', 'aa@viacesi.fr', '$2y$12$6JlWhevFluCQM8wHX5wfnuQ0TPYIhsstYWjKBlkZHYgaS5I8bjRyu', 1),
(5, 'bb', 'bb', 'bb@viacesi.fr', '$2y$12$16dSmz6MiM0.qBRj3RmyXeYc.184Oym428qJnh.4vmFaBsOgvrhs.', 1),
(6, 'cc', 'cc', 'cc@viacesi.fr', '$2y$12$p.GCJ/gILSi3G.IITrdk4e59YNBXUPLiHEA8WBrS/S8Ditp9ZRWOO', 1),
(7, 'dd', 'dd', 'dd@viacesi.fr', '$2y$12$K06Z/xXmfGZ0NB397ube5ecGPRLa./RmV3T0BbNLdTppECCGGq9Ny', 1),
(8, 'ee', 'ee', 'ee@viacesi.fr', '$2y$12$2sV6TaOvwaEKpV4f/PbAPOO5LnDmVhNT8Z7hrTyZw73zqcUbvvC96', 1),
(9, 'ff', 'ff', 'ff@viacesi.fr', '$2y$12$JiErNaY62thJf/K5dMxoEObA77CF4gEuF7yOpi/6EbCHKcCtH0JH.', 1),
(10, 'gg', 'gg', 'gg@viacesi.fr', '$2y$12$IvNj142rZ9z3kT/0gcxnouMdd2DfOy7obKu8ggxQrRgp8kBAO1rwS', 1),
(11, 'hh', 'hh', 'hh@viacesi.fr', '$2y$12$lz0vl5bPZGBPnEBmOA4zr.mVuBvwUDERbjW4iWd7m3AvkKwlqkGR.', 1),
(12, 'abcdef', 'abcdef', 'abcdefghijklmnopqrstuvwxyz@viacesi.fr', '$2y$12$VNYq6fOMgdXMM4T8NqrnReALEd897zNPBPdvhEP4HIgPU.eRq8bR2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE IF NOT EXISTS `commentary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com` varchar(255) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_event` (`id_event`),
  KEY `id_account` (`id_account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `event_date` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `club` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `eventStatus` tinyint(1) NOT NULL DEFAULT '0',
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_account` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_event_id_account` (`id_account`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `event_date`, `place`, `club`, `price`, `eventStatus`, `published`, `id_account`) VALUES
(1, 'Test 1', 'Test 1', '12/03/18', 'hjv', 'miam', '789', 0, '2018-04-14 18:29:44', 3),
(5, 'Test 5', 'Test 5', '', '', '', '', 1, '2018-04-15 03:28:54', 2),
(7, 'Test 7', 'Test 7', '7/7/77', '', '', '', 1, '2018-04-14 18:53:29', 3),
(8, 'Test 8', 'Test 8', '', '', '', '', 1, '2018-04-14 18:30:21', 3),
(9, 'Test 9', 'Test 9', '', '', '', '', 1, '2018-04-14 18:30:27', 3),
(24, 'Test 5', 'Test 5', '', '', '', '', 1, '2018-04-15 15:49:39', 2),
(29, 'qsgd', 'dfdbdfb', '', '', '', '', 0, '2018-04-15 16:46:39', 2),
(30, 'sdvsgvr', 'gsgvdfbd', '', '', '', '', 0, '2018-04-15 16:46:49', 2);

-- --------------------------------------------------------

--
-- Structure de la table `event_picture`
--

DROP TABLE IF EXISTS `event_picture`;
CREATE TABLE IF NOT EXISTS `event_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `ref` tinyint(1) DEFAULT NULL,
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_event_picture_id_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `like_event`
--

DROP TABLE IF EXISTS `like_event`;
CREATE TABLE IF NOT EXISTS `like_event` (
  `id_account` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id_account`,`id_event`),
  KEY `FK_like_event_id_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `like_event`
--

INSERT INTO `like_event` (`id_account`, `id_event`) VALUES
(1, 1),
(2, 1),
(5, 1),
(2, 30);

-- --------------------------------------------------------

--
-- Structure de la table `like_event_picture`
--

DROP TABLE IF EXISTS `like_event_picture`;
CREATE TABLE IF NOT EXISTS `like_event_picture` (
  `id_account` int(11) NOT NULL,
  `id_event_picture` int(11) NOT NULL,
  PRIMARY KEY (`id_account`,`id_event_picture`),
  KEY `FK_like_event_picture_id_event_picture` (`id_event_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statute` char(25) NOT NULL,
  `purchase_date` timestamp NOT NULL,
  `id_account` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orders_id_account` (`id_account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `order_composite`
--

DROP TABLE IF EXISTS `order_composite`;
CREATE TABLE IF NOT EXISTS `order_composite` (
  `qantity` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_produce` int(11) NOT NULL,
  PRIMARY KEY (`id_orders`,`id_produce`),
  KEY `FK_order_composite_id_produce` (`id_produce`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produce`
--

DROP TABLE IF EXISTS `produce`;
CREATE TABLE IF NOT EXISTS `produce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_produce_id_category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produce_picture`
--

DROP TABLE IF EXISTS `produce_picture`;
CREATE TABLE IF NOT EXISTS `produce_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `id_produce` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_produce_picture_id_produce` (`id_produce`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id_account` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id_account`,`id_event`),
  KEY `FK_register_id_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `register`
--

INSERT INTO `register` (`id_account`, `id_event`) VALUES
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(2, 7),
(4, 7),
(5, 7),
(6, 7),
(4, 8),
(6, 9);

-- --------------------------------------------------------

--
-- Structure de la table `selling`
--

DROP TABLE IF EXISTS `selling`;
CREATE TABLE IF NOT EXISTS `selling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indent` char(25) NOT NULL,
  `dated_sale` timestamp NOT NULL,
  `quantity` int(11) NOT NULL,
  `statute` char(25) NOT NULL,
  `id_produce` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_selling_id_produce` (`id_produce`),
  KEY `FK_selling_id_account` (`id_account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `FK_id_account_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_id_event_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_event_id_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`);

--
-- Contraintes pour la table `event_picture`
--
ALTER TABLE `event_picture`
  ADD CONSTRAINT `FK_event_picture_id_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`);

--
-- Contraintes pour la table `like_event`
--
ALTER TABLE `like_event`
  ADD CONSTRAINT `FK_like_event_id_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_like_event_id_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `like_event_picture`
--
ALTER TABLE `like_event_picture`
  ADD CONSTRAINT `FK_like_event_picture_id_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_like_event_picture_id_event_picture` FOREIGN KEY (`id_event_picture`) REFERENCES `event_picture` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_id_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`);

--
-- Contraintes pour la table `order_composite`
--
ALTER TABLE `order_composite`
  ADD CONSTRAINT `FK_order_composite_id_orders` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_order_composite_id_produce` FOREIGN KEY (`id_produce`) REFERENCES `produce` (`id`);

--
-- Contraintes pour la table `produce`
--
ALTER TABLE `produce`
  ADD CONSTRAINT `FK_produce_id_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `produce_picture`
--
ALTER TABLE `produce_picture`
  ADD CONSTRAINT `FK_produce_picture_id_produce` FOREIGN KEY (`id_produce`) REFERENCES `produce` (`id`);

--
-- Contraintes pour la table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `FK_register_id_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_register_id_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `selling`
--
ALTER TABLE `selling`
  ADD CONSTRAINT `FK_selling_id_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `FK_selling_id_produce` FOREIGN KEY (`id_produce`) REFERENCES `produce` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
