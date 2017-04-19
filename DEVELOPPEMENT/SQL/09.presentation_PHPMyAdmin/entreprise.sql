-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 19 Avril 2017 à 11:36
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `entreprise`
--

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id_employes` int(3) NOT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `sexe` enum('m','f') NOT NULL,
  `service` varchar(30) DEFAULT NULL,
  `date_embauche` date DEFAULT NULL,
  `salaire` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employes`
--

INSERT INTO `employes` (`id_employes`, `prenom`, `nom`, `sexe`, `service`, `date_embauche`, `salaire`) VALUES
(350, 'Jean-pierre', 'Laborde', 'm', 'direction', '1999-12-09', 200),
(415, 'Thomas', 'Winter', 'm', 'commercial', '2000-05-03', 200),
(417, 'Chloe', 'Dubar', 'f', 'production', '2001-09-05', 200),
(491, 'Elodie', 'Fellier', 'f', 'secretariat', '2002-02-22', 200),
(509, 'Fabrice', 'Grand', 'm', 'comptabilite', '2003-02-20', 200),
(547, 'Melanie', 'Collier', 'f', 'commercial', '2004-09-08', 200),
(592, 'Laura', 'Blanchet', 'f', 'direction', '2005-06-09', 200),
(627, 'Guillaume', 'Miller', 'm', 'commercial', '2006-07-02', 200),
(655, 'Celine', 'Perrin', 'f', 'commercial', '2006-09-10', 200),
(699, 'Julien', 'Cottet', 'm', 'autre', '2007-01-18', 200),
(739, 'ALLO', 'Desprez', 'm', 'secretariat', '2009-11-17', 200),
(780, 'Amandine', 'Thoyer', 'f', 'communication', '2010-01-23', 200),
(802, 'Damien', 'Durand', 'm', 'informatique', '2010-07-05', 200),
(876, 'Nathalie', 'Martin', 'f', 'juridique', '2012-01-12', 200),
(933, 'Emilie', 'Sennard', 'f', 'commercial', '2014-09-11', 200),
(2000, 'test2', 'test2', 'm', 'marketing', '2010-07-05', 200);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id_employes`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id_employes` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2001;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
