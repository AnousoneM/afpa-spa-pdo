-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 09 juil. 2023 à 23:41
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `afpa-spa`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `ani_id` int(11) NOT NULL,
  `ani_name` varchar(50) NOT NULL,
  `ani_sex` varchar(1) NOT NULL,
  `ani_reserved` tinyint(1) NOT NULL,
  `ani_birthdate` date DEFAULT NULL,
  `ani_adoptiondate` date DEFAULT NULL,
  `ani_arrivaldate` date NOT NULL,
  `ani_microchipped` tinyint(1) NOT NULL,
  `ani_tattooed` tinyint(1) NOT NULL,
  `ani_vaccinated` tinyint(1) NOT NULL,
  `col_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL,
  `bre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `breed`
--

CREATE TABLE `breed` (
  `bre_id` int(11) NOT NULL,
  `bre_name` varchar(30) NOT NULL,
  `spe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `breed`
--

INSERT INTO `breed` (`bre_id`, `bre_name`, `spe_id`) VALUES
(1, 'akita inu', 1),
(2, 'husky', 1),
(3, 'beagle', 1),
(4, 'berger allemand', 1),
(5, 'boxer', 1),
(6, 'labrador', 1),
(7, 'angora', 2),
(8, 'bengal', 2),
(9, 'chartreux', 2),
(10, 'européen', 2),
(11, 'persan', 2),
(12, 'siamois', 2);

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

CREATE TABLE `colors` (
  `col_id` int(11) NOT NULL,
  `col_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `colors`
--

INSERT INTO `colors` (`col_id`, `col_name`) VALUES
(1, 'noir'),
(2, 'blanc'),
(3, 'noir/blanc'),
(4, 'beige'),
(5, 'roux'),
(6, 'gris'),
(7, 'tigré');

-- --------------------------------------------------------

--
-- Structure de la table `species`
--

CREATE TABLE `species` (
  `spe_id` int(11) NOT NULL,
  `spe_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `species`
--

INSERT INTO `species` (`spe_id`, `spe_name`) VALUES
(1, 'chien'),
(2, 'chat');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`ani_id`),
  ADD KEY `animals_colors_FK` (`col_id`),
  ADD KEY `animals_species0_FK` (`spe_id`),
  ADD KEY `animals_breed1_FK` (`bre_id`);

--
-- Index pour la table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`bre_id`),
  ADD KEY `breed_species_FK` (`spe_id`);

--
-- Index pour la table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`col_id`);

--
-- Index pour la table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`spe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `ani_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `breed`
--
ALTER TABLE `breed`
  MODIFY `bre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `colors`
--
ALTER TABLE `colors`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `species`
--
ALTER TABLE `species`
  MODIFY `spe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_breed1_FK` FOREIGN KEY (`bre_id`) REFERENCES `breed` (`bre_id`),
  ADD CONSTRAINT `animals_colors_FK` FOREIGN KEY (`col_id`) REFERENCES `colors` (`col_id`),
  ADD CONSTRAINT `animals_species0_FK` FOREIGN KEY (`spe_id`) REFERENCES `species` (`spe_id`);

--
-- Contraintes pour la table `breed`
--
ALTER TABLE `breed`
  ADD CONSTRAINT `breed_species_FK` FOREIGN KEY (`spe_id`) REFERENCES `species` (`spe_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
