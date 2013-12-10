-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 26 Novembre 2013 à 11:48
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `evaletu`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'The  Military  Wives', 'In  My  Dreams'),
(2, 'Adele', '21'),
(3, 'anass', 'haifi'),
(4, 'Lana  Del  Rey', 'Born  To  Die');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cours` varchar(20) NOT NULL,
  `unite` varchar(20) NOT NULL,
  `professeur` varchar(20) NOT NULL,
  `salle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id`, `nom_cours`, `unite`, `professeur`, `salle`) VALUES
(1, 'Rencontres Médias: P', 'UE1-EC2', 'Szoniecky', 'P8 A175'),
(2, 'Participation aux pr', 'UE4-EC1', 'Khaldoune', 'P8 A175'),
(4, 'Communication', 'UE4-EC2', 'Bernard', 'Entreprise');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
