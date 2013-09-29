-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 29 Janvier 2013 à 08:58
-- Version du serveur: 5.5.9
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `etunote`
--

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `etu` varchar(255) NOT NULL,
  `exercice` varchar(255) NOT NULL,
  `note` int(11) NOT NULL,
  `maj` datetime NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` VALUES(1, 'CAM00083.jpg', 'machin', 12, '2013-01-28 07:38:49');
INSERT INTO `notes` VALUES(2, 'CAM00083.jpg', 'machin', 12, '2013-01-28 07:39:38');
INSERT INTO `notes` VALUES(3, 'CAM00083.jpg', 'machin', 12, '2013-01-28 07:40:06');
INSERT INTO `notes` VALUES(4, 'CAM00083.jpg', 'machin', 2, '2013-01-28 07:40:26');
INSERT INTO `notes` VALUES(5, 'CAM00083.jpg', 'truc', 100, '2013-01-28 07:50:23');
INSERT INTO `notes` VALUES(6, 'CAM00084.jpg', 'truc', 12, '2013-01-28 07:55:16');
INSERT INTO `notes` VALUES(7, 'CAM00083.jpg', '1.1', 1, '2013-01-28 08:10:07');
INSERT INTO `notes` VALUES(8, 'CAM00083.jpg', '1.2', 2, '2013-01-28 08:14:34');
INSERT INTO `notes` VALUES(9, 'CAM00083.jpg', 'bug', 1, '2013-01-28 08:20:48');
INSERT INTO `notes` VALUES(10, 'CAM00083.jpg', 'bug', 1, '2013-01-28 08:22:18');
INSERT INTO `notes` VALUES(11, 'Rachid Trahim', 'Configurer un rÃ©pertoire svn', 6, '2013-01-28 09:43:51');
