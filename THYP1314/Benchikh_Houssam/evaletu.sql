-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 12 Novembre 2013 à 10:44
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
CREATE DATABASE IF NOT EXISTS `evaletu` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `evaletu`;

-- --------------------------------------------------------

--
-- Structure de la table `assiduite`
--

CREATE TABLE IF NOT EXISTS `assiduite` (
  `presence` int(30) NOT NULL,
  `absence` int(30) NOT NULL,
  `retard` int(30) NOT NULL,
  `justifie` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL,
  `etudiant` varchar(11) NOT NULL,
  `raison` int(11) NOT NULL,
  `cours` int(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id`, `etudiant`, `raison`, `cours`, `date`) VALUES
(0, '', 1, 0, '12:28:53'),
(0, '', 3, 0, '12:30:07'),
(0, '', 2, 0, '01:00:16'),
(0, '', 1, 0, '05:54:41'),
(0, '', 2, 0, '05:54:44'),
(0, '', 4, 0, '06:17:35'),
(0, '', 2, 0, '06:17:38'),
(0, '', 4, 0, '06:44:11'),
(0, '', 4, 0, '06:44:11'),
(0, '', 1, 0, '06:44:17'),
(0, '', 3, 0, '06:54:25'),
(0, '', 3, 0, '07:25:07'),
(0, '', 2, 0, '07:47:07'),
(0, '', 4, 0, '07:47:10'),
(0, '', 1, 0, '07:49:16'),
(0, '', 2, 0, '07:49:20'),
(0, '', 3, 0, '07:49:24'),
(0, '', 3, 0, '07:51:37'),
(0, '', 4, 0, '07:51:40'),
(0, '', 1, 0, '08:24:24'),
(0, '', 2, 0, '08:34:16'),
(0, '', 2, 0, '08:34:18'),
(0, '', 2, 0, '08:34:20'),
(0, '', 4, 0, '08:46:03'),
(0, '', 3, 0, '08:46:08'),
(0, '', 3, 0, '08:49:04'),
(0, '', 2, 0, '08:49:08'),
(0, '', 3, 0, '08:49:11'),
(0, '', 2, 0, '08:49:51'),
(0, '', 3, 0, '08:49:53'),
(0, '', 4, 0, '08:49:54'),
(0, '', 4, 0, '08:49:57'),
(0, '', 2, 0, '08:49:58'),
(0, '', 2, 0, '08:50:01'),
(0, '', 3, 0, '08:50:02'),
(0, '', 3, 0, '08:50:03'),
(0, '', 3, 0, '08:50:04'),
(0, '', 2, 0, '10:11:48'),
(0, '', 3, 0, '10:13:16');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE IF NOT EXISTS `presence` (
  `id` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
