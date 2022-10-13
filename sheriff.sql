-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 08 sep. 2022 à 14:55
-- Version du serveur : 10.3.34-MariaDB-0+deb10u1
-- Version de PHP : 7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `holyh1504275_2wowuq`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis_recherche`
--

CREATE TABLE `avis_recherche` (
  `recherche_id` int(11) NOT NULL,
  `matricule` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Centrale',
  `identite` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `motif` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `physique` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `danger` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avis_recherche`
--

INSERT INTO `avis_recherche` (`recherche_id`, `matricule`, `identite`, `motif`, `physique`, `adresse`, `danger`, `date`) VALUES
(13, 'Centrale', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-12 16:16:57'),
(15, '1124', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-12 16:18:27'),
(16, '1124', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-12 16:18:30'),
(17, '1124', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-12 16:18:31'),
(18, '1124', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-12 16:18:43'),
(19, '1124', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-12 16:18:46'),
(20, '1124', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-12 16:18:51'),
(21, '1124', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-12 16:18:52'),
(22, '1124', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-12 16:18:54'),
(23, '1124', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-12 16:18:55'),
(24, '1124', 'Anne Hidalgo', 'Moins de 2% au Ã©lection', 'une meuf chelou avec cheveux noir', 'Mairie de paris', 'Un peu conne', '2022-05-12 17:36:09'),
(25, '1124', 'Bernard Tapis', 'Noir', 'Noir', 'Noir', 'Noir', '2022-05-13 09:11:10');

-- --------------------------------------------------------

--
-- Structure de la table `casier_judiciare`
--

CREATE TABLE `casier_judiciare` (
  `casier_id` int(11) NOT NULL,
  `matricule` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Centrale',
  `identite` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `infractions` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fichage`
--

CREATE TABLE `fichage` (
  `fichage_id` int(11) NOT NULL,
  `identite` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fichage_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fichage`
--

INSERT INTO `fichage` (`fichage_id`, `identite`, `fichage_date`) VALUES
(1, 'test', '0000-00-00 00:00:00'),
(2, 'Dupont Bilouz', '0000-00-00 00:00:00'),
(3, 'Anne Hidalgo', '2022-05-12 17:36:09'),
(4, 'Bernard Tapis', '2022-05-13 09:11:10');

-- --------------------------------------------------------

--
-- Structure de la table `immatriculations`
--

CREATE TABLE `immatriculations` (
  `immatriculations_id` int(11) NOT NULL,
  `matricule` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Centrale',
  `plaque` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `identite` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `modele` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `couleur` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `immatriculations`
--

INSERT INTO `immatriculations` (`immatriculations_id`, `matricule`, `plaque`, `identite`, `type`, `modele`, `couleur`, `date`) VALUES
(19, '1124', 'def fef', 'Dupont Bilouz', 'Voiture', 'Fiat', 'MR500', '2022-05-12 16:44:51'),
(18, '1124', 'dfe ffe', 'Dupont Bilouz', 'Van', 'Suzuki', 'MR500', '2022-05-12 16:44:02'),
(21, '1124', 'DFE FRE', 'Dupont Bilouz', 'Van', 'Fiat', 'Pontu', '2022-05-12 16:47:12'),
(20, '1124', 'efe fef', 'Dupont Bilouz', 'Van', 'Suzuki', 'Pontu', '2022-05-12 16:45:52'),
(17, '1124', 'FER FRF', 'Dupont Bilouz', 'Voiture', 'Suzuki', 'MR500', '2022-05-12 16:43:52'),
(24, '1124', 'FER GRG', 'Dupont Bilouz', 'Voiture', 'Renault', 'Pontu', '2022-05-12 16:51:20'),
(23, '1124', 'FKE GEG', 'Dupont Bilouz', 'Voiture', 'Suzuki', 'Pontu', '2022-05-12 16:50:45'),
(22, '1124', 'HTF GTG', 'Dupont Bilouz', 'Van', 'Renault', 'Clio', '2022-05-12 16:50:06'),
(13, 'Centrale', 'HTF TUH', 'Dupont Bilouz', 'Voiture', 'Fiat', 'Pontu', '2022-05-12 14:44:04'),
(25, '1124', 'HTG HYG', 'Dupont Bilouz', 'Voiture', 'Fiat', 'MR500', '2022-05-12 16:54:33'),
(15, 'Centrale', 'RGT UHG', 'TRY BEST', 'Van', 'Renault', 'Clio', '2022-05-12 14:46:49'),
(14, 'Centrale', 'RTF TOP', 'Jacques Merde', 'Moto', 'Suzuki', 'MR500', '2022-05-12 14:44:59'),
(16, '1', 'RTG TGT', 'TRY BEST', 'Van', 'Fiat', 'Pontu', '2022-05-12 14:51:37'),
(5, 'Centrale', 'TY5 YUI', 'Bernard Barnabé', 'Van', 'Alfa Roméo', 'Noir', '2022-05-11 08:33:37'),
(12, 'Centrale', 'TY5 YUT', 'Bernard Barnabé', 'Voiture', 'Alfa Roméo', 'Noir', '2022-05-11 10:00:06'),
(26, '1124', 'VGG TGE', 'Dupont Bilouz', 'Van', 'Fiat', 'MR500', '2022-05-12 17:00:03');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `agent_id` int(11) NOT NULL,
  `access` int(11) NOT NULL DEFAULT 0,
  `matricule` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`agent_id`, `access`, `matricule`, `password`, `nom`, `prenom`, `service`, `date`) VALUES
(1, 1, '0', 'test', 'test', 'test', '', '2022-05-12 15:55:50'),
(2, 1, '1124', 'test', 'Dexter', 'Accrouet', '', '2022-05-12 15:55:55');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis_recherche`
--
ALTER TABLE `avis_recherche`
  ADD PRIMARY KEY (`recherche_id`),
  ADD UNIQUE KEY `id` (`recherche_id`),
  ADD UNIQUE KEY `immatriculations_id` (`recherche_id`),
  ADD UNIQUE KEY `recherche_id` (`recherche_id`);

--
-- Index pour la table `casier_judiciare`
--
ALTER TABLE `casier_judiciare`
  ADD PRIMARY KEY (`casier_id`),
  ADD UNIQUE KEY `id` (`casier_id`),
  ADD UNIQUE KEY `immatriculations_id` (`casier_id`);

--
-- Index pour la table `fichage`
--
ALTER TABLE `fichage`
  ADD PRIMARY KEY (`fichage_id`),
  ADD UNIQUE KEY `fichage_id` (`fichage_id`);

--
-- Index pour la table `immatriculations`
--
ALTER TABLE `immatriculations`
  ADD PRIMARY KEY (`plaque`),
  ADD UNIQUE KEY `id` (`immatriculations_id`),
  ADD UNIQUE KEY `plaque` (`plaque`),
  ADD UNIQUE KEY `immatriculations_id` (`immatriculations_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`agent_id`),
  ADD UNIQUE KEY `agent_id` (`agent_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis_recherche`
--
ALTER TABLE `avis_recherche`
  MODIFY `recherche_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `casier_judiciare`
--
ALTER TABLE `casier_judiciare`
  MODIFY `casier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `fichage`
--
ALTER TABLE `fichage`
  MODIFY `fichage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `immatriculations`
--
ALTER TABLE `immatriculations`
  MODIFY `immatriculations_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
