-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 10 Mai 2017 à 17:28
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exercice_3`
--

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id_film` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `actors` varchar(100) NOT NULL,
  `director` varchar(20) NOT NULL,
  `producer` varchar(20) NOT NULL,
  `year_of_prod` year(4) NOT NULL,
  `language` varchar(20) NOT NULL,
  `category` enum('action','science-fiction','horreur','policier','autre') NOT NULL,
  `storyline` text NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id_film`, `title`, `actors`, `director`, `producer`, `year_of_prod`, `language`, `category`, `storyline`, `video`) VALUES
(1, 'Alien The Covenant ', 'Michael Fassbender, Katherine Waterston, Billy Crudup ', 'Michael Fassbender, ', 'Ridley Scott', 2017, 'EN', 'science-fiction', 'Les membres d’équipage du vaisseau Covenant, à destination d’une planète située au fin fond de notre galaxie, découvrent ce qu’ils pensent être un paradis encore intouché. ', 'http://www.allocine.fr/film/fichefilm_gen_cfilm=208314.html'),
(2, 'Fight Club ', 'Brad Pitt, Edward Norton, Helena Bonham Carter', 'Brad Pitt, Edward No', 'David Fincher', 1999, 'FR', 'autre', 'Le narrateur, sans identité précise, vit seul, travaille seul, dort seul, mange seul ses plateaux-repas pour une personne comme beaucoup d&#039;autres personnes seules qui connaissent la misère humaine, morale et sexuelle.', 'http://www.allocine.fr/film/fichefilm_gen_cfilm=21189.html'),
(3, '99 francs', ' Jean Dujardin, Jocelyn Quivrin, Patrick Mille', ' Jean Dujardin, Joce', 'Jan Kounen', 2007, 'FR', 'autre', 'Octave est le maître du monde : il exerce la profession de rédacteur publicitaire. Il décide aujourd&#039;hui ce que vous allez vouloir demain. Pour lui, &quot;l&#039;homme est un produit comme les autres&quot;.', 'http://www.allocine.fr/film/fichefilm_gen_cfilm=60627.html'),
(4, 'Into The Wild', 'Emile Hirsch, Marcia Gay Harden, William Hurt', 'Emile Hirsch, Marcia', 'Sean Penn', 2008, 'DE', 'autre', 'Tout juste diplômé de l&#039;université, Christopher McCandless, 22 ans, est promis à un brillant avenir. Pourtant, tournant le dos à l&#039;existence confortable et sans surprise qui l&#039;attend, le jeune homme décide de prendre la route', 'http://www.allocine.fr/film/fichefilm_gen_cfilm=110101.html');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
