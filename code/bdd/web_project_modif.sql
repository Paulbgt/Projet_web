-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 12 avr. 2018 à 15:38
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id`, `last_name`, `first_name`, `mail`, `pwd`, `statute`) VALUES
(1, 'aa', 'aa', 'a@viacesi.fr', '$2y$12$J00ePHdTcGjg0r6i/7T6Y.81U.O/d75FeGXQwooIN27hist.Rcc.i', 1),
(2, 'bb', 'bb', 'b@viacesi.fr', '$2y$12$zoKhQENk0h8i9dhqbIJuO.vi4b66j.2sUqfdBGXnFN6MB/P0EnaCa', 1),
(3, 'cc', 'cc', 'c@viacesi.fr', '$2y$12$YDejQr.gpDoumqhJqY91JOJw7d1txnB9jyTOjbHPayXl4ARQAgm5y', 1),
(4, 'Dd', 'Dd', 'd@viacesi.fr', '$2y$12$COgcMnkSCclbrMchi0qiaeMnX0Enun9mpG1Iahmi3Hop8LAA8mOPW', 1),
(5, 'Brunelot', 'Romain', 'rbrunelot@cesi.fr', '$2y$12$CQgrSU9nPrdejzu2j9nWHuphyCZaco6wWFYVQmxRXSdtZ5KW.A0Pe', 3),
(6, 'zz', 'zz', 'z@viacesi.fr', '$2y$12$UlNLIMt5ttoYmfn3FvIlWOsGPRCWKlT072pXadRe7Xa3.HqkX/oaS', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE IF NOT EXISTS `commentary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event_picture`
--

DROP TABLE IF EXISTS `event_picture`;
CREATE TABLE IF NOT EXISTS `event_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `ref` tinyint(1) DEFAULT NULL,
  `id_happening` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_event_picture_id_happening` (`id_happening`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `happening`
--

DROP TABLE IF EXISTS `happening`;
CREATE TABLE IF NOT EXISTS `happening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `event_date` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `club` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `Validate` tinyint(1) DEFAULT '0',
  `finished` int(11) DEFAULT NULL,
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_account` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_happening_id_account` (`id_account`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `happening`
--

INSERT INTO `happening` (`id`, `title`, `description`, `event_date`, `place`, `club`, `price`, `Validate`, `finished`, `published`, `id_account`) VALUES
(1, 'dd', 'dd', '2018-04-12', NULL, NULL, NULL, 1, NULL, '2018-04-12 09:22:52', 2),
(2, 'ee', 'ee', '2018-04-12', NULL, NULL, NULL, 1, NULL, '2018-04-12 09:22:52', 2),
(3, 'rr', 'rr', '2018-04-12', NULL, NULL, NULL, 0, NULL, '2018-04-12 09:22:52', 2),
(4, 'ee', 'ee', '2018-04-12', NULL, NULL, NULL, 1, NULL, '2018-04-12 09:22:52', 2),
(5, 'zzzzzzzzzzzzzz', 'zzzzzzzzzzzzz', '2018-04-12', NULL, NULL, NULL, 1, NULL, '2018-04-12 09:22:52', 2),
(6, 'Aurélien', 'Aurélien', 'Tous les jeudi', NULL, NULL, NULL, 1, NULL, '2018-04-12 09:22:52', 2),
(7, 'Florian', 'Florian', 'Tous les mercredi', NULL, NULL, NULL, 1, NULL, '2018-04-12 09:22:52', 1),
(8, 'PAUL', 'PAUL', 'PAUL', NULL, NULL, NULL, 1, NULL, '2018-04-12 09:23:22', 1),
(9, 'efkjdsdhfjb,sbfbsjbfnjbdsnbfj', 'sfkjdshfjbfjbsdjhfbjhbfhsbjbfhjsvfhsbhjfb', 'ksdjfkdnxgdngndngvxnkvnxkvn', NULL, NULL, NULL, 1, NULL, '2018-04-12 09:31:57', 1),
(10, 'dsfsdfjshfhjdjhfb', 'jdscjdsbfjhfb', 'sqkjhfjsbfjdb', NULL, NULL, NULL, 1, NULL, '2018-04-12 09:33:30', 1),
(11, 'aehjg ', 'aekvgu ', 'wxbxwb', 'wbwb', 'xbxfb', '62', 1, NULL, '2018-04-12 09:49:47', 1),
(12, 'aehjg ', 'aekvgu ', '', 'wbwb', 'xbxfb', '62', 1, NULL, '2018-04-12 09:50:24', 1),
(13, 'aa', 'aekvgu ', '', '', 'xbxfb', '62', 1, NULL, '2018-04-12 09:50:42', 1),
(14, 'bb', 'aekvgu ', '', '', 'xbxfb', '6€', 1, NULL, '2018-04-12 09:54:01', 1),
(15, 'bb', 'aekvgu ', '', '', 'xbxfb', '', 1, NULL, '2018-04-12 09:54:12', 1),
(16, 'bb', 'aekvgu ', '', '', '', '', 1, NULL, '2018-04-12 09:54:21', 1),
(17, 'fejhfgjsqfkjnskjfnkdrsgnfsnkfjbsdjfbhj', 'sdgjdfkdshfbskjfbhjsbjcvhd', 'skdjfnsdnbfksfbjdsbfjdsbdjfbjsfbjhb', 'kjdnkdxnfjsbfjbxdjfbjdsbfjsbjb', 'kdjvbkdbjgbsdngbjdsbfkjdsbkvdjbs', 'kcxjbkvbxkjfnkjxbjsbjvbjxbv', 1, NULL, '2018-04-12 09:58:07', 1),
(18, 'Maxime', 'Maxime', 'Maxime', 'Maxime', 'Maxime', 'Maxime', 1, NULL, '2018-04-12 12:31:40', 4),
(19, 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 1, NULL, '2018-04-12 13:25:06', 6),
(20, 'sfhkjsfnkjn', 'cskjnfkdjcn', 'lkvfdkfnkdjn', 'kjdskgfnksjn', 'ksdfnksjnfkj', 'dvsknskdjsgn', 1, NULL, '2018-04-12 13:30:22', 6),
(21, 'rt;,fn', 'scdml', 'nfdkgn', 'VFD.NV?', 'DNSKCDN', 'ndcsknvk', 0, NULL, '2018-04-12 13:30:30', 6);

-- --------------------------------------------------------

--
-- Structure de la table `love`
--

DROP TABLE IF EXISTS `love`;
CREATE TABLE IF NOT EXISTS `love` (
  `id_account` int(11) NOT NULL,
  `id_happening` int(11) NOT NULL,
  PRIMARY KEY (`id_account`,`id_happening`),
  KEY `FK_love_id_account` (`id_account`),
  KEY `FK_love_id_happening` (`id_happening`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post_comment`
--

DROP TABLE IF EXISTS `post_comment`;
CREATE TABLE IF NOT EXISTS `post_comment` (
  `id` int(11) NOT NULL,
  `id_commentary` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_commentary`),
  KEY `FK_post_comment_id_commentary` (`id_commentary`)
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
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL,
  `id_happening` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_happening`),
  KEY `FK_register_id_happening` (`id_happening`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Contraintes pour la table `event_picture`
--
ALTER TABLE `event_picture`
  ADD CONSTRAINT `FK_event_picture_id_happening` FOREIGN KEY (`id_happening`) REFERENCES `happening` (`id`);

--
-- Contraintes pour la table `happening`
--
ALTER TABLE `happening`
  ADD CONSTRAINT `FK_happening_id_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`);

--
-- Contraintes pour la table `love`
--
ALTER TABLE `love`
  ADD CONSTRAINT `FK_love_id_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `FK_love_id_happening` FOREIGN KEY (`id_happening`) REFERENCES `happening` (`id`);

--
-- Contraintes pour la table `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `FK_post_comment_id` FOREIGN KEY (`id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `FK_post_comment_id_commentary` FOREIGN KEY (`id_commentary`) REFERENCES `commentary` (`id`);

--
-- Contraintes pour la table `produce_picture`
--
ALTER TABLE `produce_picture`
  ADD CONSTRAINT `FK_produce_picture_id_produce` FOREIGN KEY (`id_produce`) REFERENCES `produce` (`id`);

--
-- Contraintes pour la table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `FK_register_id` FOREIGN KEY (`id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `FK_register_id_happening` FOREIGN KEY (`id_happening`) REFERENCES `happening` (`id`);

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
