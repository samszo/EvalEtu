-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 05 Novembre 2013 à 11:56
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `evaletu`
--
CREATE DATABASE IF NOT EXISTS `evaletu` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `evaletu`;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etudiant` varchar(20) COLLATE utf8_bin NOT NULL,
  `raison` int(11) NOT NULL,
  `cours` varchar(20) COLLATE utf8_bin NOT NULL,
  `date` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id`, `etudiant`, `raison`, `cours`, `date`) VALUES
(1, '', 2, '', '0000-00-00'),
(2, '', 3, '', '0000-00-00'),
(3, '', 3, '1', '0000-00-00'),
(4, '', 3, '1', '0000-00-00'),
(5, '', 4, '1', '11:42:56'),
(6, '', 1, 'UE1-EC2', '12:05:40'),
(7, 'Himeur Katia', 2, 'UE1-EC2', '10:48:20');

-- --------------------------------------------------------

--
-- Structure de la table `prescence`
--

CREATE TABLE IF NOT EXISTS `prescence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `prescence`
--

INSERT INTO `prescence` (`id`, `libelle`) VALUES
(1, 'Présent'),
(2, 'Retardé'),
(3, 'Excusé'),
(4, 'Absent');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
