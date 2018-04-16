-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Avril 2018 à 13:59
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `last_name` char(255) NOT NULL,
  `first_name` char(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `statute` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `account`
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
(12, 'abcdef', 'abcdef', 'abcdefghijklmnopqrstuvwxyz@viacesi.fr', '$2y$12$VNYq6fOMgdXMM4T8NqrnReALEd897zNPBPdvhEP4HIgPU.eRq8bR2', 1),
(13, 'Billy', 'The Kid', 'bt@viacesi.fr', '$2y$12$b0H9LxFDdaNWrEVoRmfWNuLaqcYrSrhZ3xaxv57UKedkE404dJvqC', 2);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

CREATE TABLE `commentary` (
  `id` int(11) NOT NULL,
  `com` varchar(255) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `event_date` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `club` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `eventStatus` tinyint(1) NOT NULL DEFAULT '0',
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `event_date`, `place`, `club`, `price`, `eventStatus`, `published`, `id_account`) VALUES
(1, 'Test 1', 'Test 1', '12/03/18', 'hjv', 'miam', '789', 0, '2018-04-14 18:29:44', 3),
(5, 'Test 5', 'Test 5', '', '', '', '', 1, '2018-04-15 03:28:54', 2),
(7, 'Test 7', 'Test 7', '7/7/77', '', '', '', 1, '2018-04-14 18:53:29', 3),
(8, 'Test 8', 'Test 8', '', '', '', '', 1, '2018-04-14 18:30:21', 3),
(9, 'Test 9', 'Test 9', 'Tous les jours', 'Arras', 'Exia-miam', 'Gratuit', 2, '2018-04-14 18:30:27', 3),
(24, 'Test 5', 'Test 5', '', '', '', '', 2, '2018-04-15 15:49:39', 2),
(29, 'qsgd', 'dfdbdfb', '', '', '', '', 0, '2018-04-15 16:46:39', 2),
(33, '651', '591', '', '', '', '', 2, '2018-04-16 10:27:38', 2),
(34, '51', '651', '', '', '', '', 2, '2018-04-16 10:27:43', 2),
(36, 'aaa', 'aaa', '', '', '', '', 0, '2018-04-16 13:02:54', 13),
(37, 'aaa', 'aaa', '', '', '', '', 0, '2018-04-16 13:03:14', 13),
(38, 'bbb', 'bbb', '', '', '', '', 0, '2018-04-16 13:06:16', 13),
(39, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:14:41', 13),
(40, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:16:48', 13),
(41, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:17:02', 13),
(42, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:17:14', 13),
(43, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:17:23', 13),
(44, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:18:02', 13),
(45, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:18:12', 13),
(46, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:18:22', 13),
(47, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:18:41', 13),
(48, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:18:45', 13),
(49, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:18:58', 13),
(50, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:19:19', 13),
(51, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:19:54', 13),
(52, 'ccc', 'ccc', '', '', '', '', 0, '2018-04-16 13:20:32', 13),
(53, 'fddfb', 'dfhbdfb', '', '', '', '', 0, '2018-04-16 13:20:57', 13),
(54, 'hello', 'gdfgbd', '', '', '', '', 0, '2018-04-16 13:21:28', 13),
(55, 'hello', 'gdfgbd', '', '', '', '', 0, '2018-04-16 13:21:42', 13),
(56, 'Hello', 'gdfgbd', '', '', '', '', 0, '2018-04-16 13:23:14', 13),
(57, 'aa', 'aa', '', '', '', '', 0, '2018-04-16 13:28:41', 13),
(58, 'aa', 'aa', '', '', '', '', 0, '2018-04-16 13:29:31', 13),
(59, 'aa', 'aa', '', '', '', '', 0, '2018-04-16 13:30:17', 13),
(60, 'aa', 'aa', '', '', '', '', 0, '2018-04-16 13:30:52', 13),
(61, 'aa', 'aa', '', '', '', '', 0, '2018-04-16 13:31:15', 13),
(62, 'ds', 'ds', '', '', '', '', 0, '2018-04-16 13:41:41', 13),
(63, 'ds', 'ds', '', '', '', '', 0, '2018-04-16 13:44:07', 13),
(64, 'ds', 'ds', '', '', '', '', 0, '2018-04-16 13:45:33', 13);

-- --------------------------------------------------------

--
-- Structure de la table `event_picture`
--

CREATE TABLE `event_picture` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ref` tinyint(1) NOT NULL DEFAULT '1',
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `like_event`
--

CREATE TABLE `like_event` (
  `id_account` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `like_event`
--

INSERT INTO `like_event` (`id_account`, `id_event`) VALUES
(1, 1),
(2, 1),
(5, 1),
(2, 29),
(2, 33);

-- --------------------------------------------------------

--
-- Structure de la table `like_event_picture`
--

CREATE TABLE `like_event_picture` (
  `id_account` int(11) NOT NULL,
  `id_event_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `statute` char(25) NOT NULL,
  `purchase_date` timestamp NOT NULL,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `order_composite`
--

CREATE TABLE `order_composite` (
  `qantity` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_produce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produce`
--

CREATE TABLE `produce` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produce_picture`
--

CREATE TABLE `produce_picture` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `id_produce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `register`
--

CREATE TABLE `register` (
  `id_account` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `register`
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

CREATE TABLE `selling` (
  `id` int(11) NOT NULL,
  `indent` char(25) NOT NULL,
  `dated_sale` timestamp NOT NULL,
  `quantity` int(11) NOT NULL,
  `statute` char(25) NOT NULL,
  `id_produce` int(11) NOT NULL,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_account` (`id_account`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_event_id_account` (`id_account`);

--
-- Index pour la table `event_picture`
--
ALTER TABLE `event_picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_event_picture_id_event` (`id_event`);

--
-- Index pour la table `like_event`
--
ALTER TABLE `like_event`
  ADD PRIMARY KEY (`id_account`,`id_event`),
  ADD KEY `FK_like_event_id_event` (`id_event`);

--
-- Index pour la table `like_event_picture`
--
ALTER TABLE `like_event_picture`
  ADD PRIMARY KEY (`id_account`,`id_event_picture`),
  ADD KEY `FK_like_event_picture_id_event_picture` (`id_event_picture`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_id_account` (`id_account`);

--
-- Index pour la table `order_composite`
--
ALTER TABLE `order_composite`
  ADD PRIMARY KEY (`id_orders`,`id_produce`),
  ADD KEY `FK_order_composite_id_produce` (`id_produce`);

--
-- Index pour la table `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_produce_id_category` (`id_category`);

--
-- Index pour la table `produce_picture`
--
ALTER TABLE `produce_picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_produce_picture_id_produce` (`id_produce`);

--
-- Index pour la table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id_account`,`id_event`),
  ADD KEY `FK_register_id_event` (`id_event`);

--
-- Index pour la table `selling`
--
ALTER TABLE `selling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_selling_id_produce` (`id_produce`),
  ADD KEY `FK_selling_id_account` (`id_account`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentary`
--
ALTER TABLE `commentary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT pour la table `event_picture`
--
ALTER TABLE `event_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produce`
--
ALTER TABLE `produce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produce_picture`
--
ALTER TABLE `produce_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `selling`
--
ALTER TABLE `selling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
