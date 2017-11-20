-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 24 Octobre 2017 à 20:30
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `demande_conge`
--
CREATE DATABASE IF NOT EXISTS `id3361961_demande_conge` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `demande_conge`;

-- --------------------------------------------------------

--
-- Structure de la table `demandeconges`
--

DROP TABLE IF EXISTS `id3361961_demande_conge`;
CREATE TABLE IF NOT EXISTS `demandeconges` (
  `id_demande` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_demandeur` int(10) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `statut` varchar(20) NOT NULL,
  PRIMARY KEY (`id_demande`),
  KEY `fk_id_demandeur` (`id_demandeur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demandeconges`
--

INSERT INTO `demandeconges` (`id_demande`, `id_demandeur`, `date_debut`, `date_fin`, `statut`) VALUES
(1, 2, '2017-02-05', '2017-02-10', 'manager'),
(2, 3, '2017-11-09', '2017-11-16', 'manager'),
(3, 1, '2017-01-01', '2017-12-01', 'HR');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `id_employe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricule` varchar(4) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom_de_famille` varchar(30) NOT NULL,
  `id_manager` int(10) UNSIGNED NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id_employe`),
  UNIQUE KEY `matricule` (`matricule`),
  KEY `FK_id_manager` (`id_manager`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employes`
--

INSERT INTO `employes` (`id_employe`, `matricule`, `prenom`, `nom_de_famille`, `id_manager`, `password`) VALUES
(1, 'AD02', 'Paul', 'Patron', 1, 'AD02'),
(2, 'FF12', 'Shaffi', 'Chakia', 1, 'FF12'),
(3, 'DC32', 'Jeremy', 'Dooremont', 2, 'DC32'),
(4, 'ZO2D', 'Ludovic', 'Bergier', 2, 'ZO2D'),
(5, '5JDO', 'Rodolphe', 'Mercelis', 2, '5JDO');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `demandeconges`
--
ALTER TABLE `demandeconges`
  ADD CONSTRAINT `fk_id_demandeur` FOREIGN KEY (`id_demandeur`) REFERENCES `employes` (`id_employe`);

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `FK_id_manager` FOREIGN KEY (`id_manager`) REFERENCES `employes` (`id_employe`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
