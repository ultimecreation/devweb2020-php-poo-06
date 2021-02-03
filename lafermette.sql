-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 fév. 2021 à 16:04
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lafermette`
--
CREATE DATABASE IF NOT EXISTS `lafermette` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lafermette`;

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `animal_status_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `hunger_level` int(11) NOT NULL,
  `thirst_level` int(11) NOT NULL,
  `global_health` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `type_id`, `animal_status_id`, `name`, `img`, `hunger_level`, `thirst_level`, `global_health`) VALUES
(1, 1, 1, 'Chevreone', 'default.png', 0, 0, 100),
(2, 1, 3, 'Chevretwo', 'default.png', 0, 0, 100),
(3, 2, 2, 'Vacheone', 'default.png', 0, 0, 100),
(4, 2, 1, 'Vachetwo', 'default.png', 0, 0, 100),
(5, 3, 1, 'Pouleone', 'default.png', 0, 0, 100),
(6, 3, 1, 'Pouletwo', 'default.png', 0, 0, 100);

-- --------------------------------------------------------

--
-- Structure de la table `animal_foods`
--

CREATE TABLE `animal_foods` (
  `animal_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `consumed_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `animal_owners`
--

CREATE TABLE `animal_owners` (
  `user_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `animal_status`
--

CREATE TABLE `animal_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animal_status`
--

INSERT INTO `animal_status` (`id`, `name`) VALUES
(1, 'adoption'),
(2, 'vente'),
(3, 'indisponible');

-- --------------------------------------------------------

--
-- Structure de la table `animal_types`
--

CREATE TABLE `animal_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animal_types`
--

INSERT INTO `animal_types` (`id`, `name`) VALUES
(1, 'Chèvre'),
(2, 'Vache'),
(3, 'Poule');

-- --------------------------------------------------------

--
-- Structure de la table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `buildings`
--

INSERT INTO `buildings` (`id`, `level_id`, `name`, `description`, `img`) VALUES
(1, 3, 'Étable', 'une super étable', 'default.png'),
(2, 1, 'Hangar', 'un super hangar', 'default.png'),
(3, 1, 'Poulaillet', 'un super poulaillet', 'default.png'),
(4, 2, 'Chevrerie', 'une super chevrerie', 'default.png');

-- --------------------------------------------------------

--
-- Structure de la table `farms`
--

CREATE TABLE `farms` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `health` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `farms`
--

INSERT INTO `farms` (`id`, `level_id`, `name`, `health`) VALUES
(1, 1, 'nasfarm1', 100),
(2, 2, 'nasfarm2', 100),
(3, 1, 'nasfarm3', 100);

-- --------------------------------------------------------

--
-- Structure de la table `farm_buildings`
--

CREATE TABLE `farm_buildings` (
  `farm_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `farm_owners`
--

CREATE TABLE `farm_owners` (
  `user_id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `farm_owners`
--

INSERT INTO `farm_owners` (`user_id`, `farm_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `farm_technics`
--

CREATE TABLE `farm_technics` (
  `farm_id` int(11) NOT NULL,
  `technic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `energy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `foods`
--

INSERT INTO `foods` (`id`, `name`, `img`, `quantity`, `energy`) VALUES
(1, 'Herbe', 'default.png', 1, 10),
(2, 'Graine', 'default.png', 1, 5),
(3, 'Foin', 'default.png', 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timespan` int(3) NOT NULL,
  `rate` int(3) NOT NULL,
  `cost` decimal(6,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `levels`
--

INSERT INTO `levels` (`id`, `name`, `timespan`, `rate`, `cost`) VALUES
(1, 'starter', 24, 1, '0.00'),
(2, 'semipro', 12, 2, '500.00'),
(3, 'pro', 6, 3, '1000.00'),
(4, 'ultimate', 2, 5, '3000.00');

-- --------------------------------------------------------

--
-- Structure de la table `technics`
--

CREATE TABLE `technics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technics`
--

INSERT INTO `technics` (`id`, `name`, `description`, `img`) VALUES
(1, 'Élevage', 'permet d\'élever des animaux', 'default.png'),
(2, 'Agriculture', 'permet de cultiver des fruits et légumes', 'default.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'email utilisateur',
  `password` varchar(255) NOT NULL COMMENT 'mot de passe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'naser', 'naser@gmail.com', 'naser');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `animal_status_id` (`animal_status_id`);

--
-- Index pour la table `animal_foods`
--
ALTER TABLE `animal_foods`
  ADD PRIMARY KEY (`animal_id`,`food_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Index pour la table `animal_owners`
--
ALTER TABLE `animal_owners`
  ADD PRIMARY KEY (`user_id`,`animal_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `animal_status`
--
ALTER TABLE `animal_status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `animal_types`
--
ALTER TABLE `animal_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Index pour la table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Index pour la table `farm_buildings`
--
ALTER TABLE `farm_buildings`
  ADD PRIMARY KEY (`farm_id`,`building_id`),
  ADD KEY `building_id` (`building_id`);

--
-- Index pour la table `farm_owners`
--
ALTER TABLE `farm_owners`
  ADD PRIMARY KEY (`user_id`,`farm_id`),
  ADD KEY `farm_id` (`farm_id`);

--
-- Index pour la table `farm_technics`
--
ALTER TABLE `farm_technics`
  ADD PRIMARY KEY (`farm_id`,`technic_id`),
  ADD KEY `technic_id` (`technic_id`);

--
-- Index pour la table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `technics`
--
ALTER TABLE `technics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `animal_status`
--
ALTER TABLE `animal_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `animal_types`
--
ALTER TABLE `animal_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `technics`
--
ALTER TABLE `technics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `animal_types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `animals_ibfk_2` FOREIGN KEY (`animal_status_id`) REFERENCES `animal_status` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `animal_foods`
--
ALTER TABLE `animal_foods`
  ADD CONSTRAINT `animal_foods_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_foods_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `animal_owners`
--
ALTER TABLE `animal_owners`
  ADD CONSTRAINT `animal_owners_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_owners_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `buildings_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Contraintes pour la table `farms`
--
ALTER TABLE `farms`
  ADD CONSTRAINT `farms_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Contraintes pour la table `farm_buildings`
--
ALTER TABLE `farm_buildings`
  ADD CONSTRAINT `farm_buildings_ibfk_1` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `farm_buildings_ibfk_2` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `farm_owners`
--
ALTER TABLE `farm_owners`
  ADD CONSTRAINT `farm_owners_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farm_owners_ibfk_2` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `farm_technics`
--
ALTER TABLE `farm_technics`
  ADD CONSTRAINT `farm_technics_ibfk_1` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `farm_technics_ibfk_2` FOREIGN KEY (`technic_id`) REFERENCES `technics` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
