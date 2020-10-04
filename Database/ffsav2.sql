-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 04 oct. 2020 à 10:21
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ffsav2`
--
CREATE DATABASE IF NOT EXISTS `ffsav2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ffsav2`;

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_asa`
--

CREATE TABLE `0108asap_asa` (
  `id` int(11) NOT NULL,
  `AsaName` varchar(255) NOT NULL,
  `NumberAsa` varchar(6) NOT NULL,
  `id_0108asap_League` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_asa`
--

INSERT INTO `0108asap_asa` (`id`, `AsaName`, `NumberAsa`, `id_0108asap_League`) VALUES
(1, 'ASA Picardie', '0108', 1);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_categorycompetition`
--

CREATE TABLE `0108asap_categorycompetition` (
  `id` int(11) NOT NULL,
  `CategoryCompetition` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_competiton`
--

CREATE TABLE `0108asap_competiton` (
  `id` int(11) NOT NULL,
  `id_0108asap_categorycompetition` int(11) DEFAULT NULL,
  `id_0108asap_sportsevents` int(11) DEFAULT NULL,
  `id_0108asap_typeofcompetition` int(11) DEFAULT NULL,
  `Open` varchar(1) DEFAULT '0',
  `Close` varchar(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_functions`
--

CREATE TABLE `0108asap_functions` (
  `id` int(11) NOT NULL,
  `TypeOfLicence` varchar(250) NOT NULL,
  `PermissionToAccess` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `0108asap_functions`
--

INSERT INTO `0108asap_functions` (`id`, `TypeOfLicence`, `PermissionToAccess`) VALUES
(155, 'Administrateur site', 1);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_functionsummary`
--

CREATE TABLE `0108asap_functionsummary` (
  `id` int(11) NOT NULL,
  `LicenceNumber` varchar(10) DEFAULT NULL,
  `id_0108asap_member` int(11) NOT NULL,
  `id_0108asap_function` int(11) NOT NULL,
  `LicencePrimary` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_functionsummary`
--

INSERT INTO `0108asap_functionsummary` (`id`, `LicenceNumber`, `id_0108asap_member`, `id_0108asap_function`, `LicencePrimary`) VALUES
(3, '249498', 2, 155, 1);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_league`
--

CREATE TABLE `0108asap_league` (
  `id` int(11) NOT NULL,
  `LeagueName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_league`
--

INSERT INTO `0108asap_league` (`id`, `LeagueName`) VALUES
(1, 'HAUTS DE FRANCE'),
(2, 'GRAND EST'),
(3, 'BOURGOGNE FRANCHE-COMTE'),
(4, ' RHONE-ALPES'),
(5, 'CORSE'),
(6, 'OCCITANIE MEDITERRANEE'),
(7, 'OCCITANIE PYRENEES'),
(8, 'NOUVELLE AQUITAINE SUD'),
(9, 'NOUVELLE AQUITAINE NORD'),
(10, 'NORMANDIE'),
(11, 'ILE-DE-FRANCE'),
(12, 'AUVERGNE'),
(13, 'NOUVELLE CALEDONIE'),
(14, 'LSA REUNION'),
(15, 'GUADELOUPE');

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_membres`
--

CREATE TABLE `0108asap_membres` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Firstname` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` blob,
  `Cle` varchar(150) DEFAULT NULL,
  `Actif` varchar(10) DEFAULT 'false',
  `Address` varchar(250) DEFAULT NULL,
  `ZipCode` varchar(5) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `AsaCode` varchar(10) DEFAULT NULL,
  `AsaName` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_membres`
--

INSERT INTO `0108asap_membres` (`id`, `Name`, `Firstname`, `Email`, `Password`, `Cle`, `Actif`, `Address`, `ZipCode`, `City`, `AsaCode`, `AsaName`) VALUES
(2, 'Jonard', 'Gaetan', 'gaetan.jonard@outlook.fr', 0x243279243130243442664a7659463332505945706153664147432f772e735138374d30476b536d43704b30525a6371535a6e623778757a6c63587436, '9ZUYzmjuY8dX6W@16015671829ZUYzmjuY8dX6W@', 'true', 'APT 31 26 parc des clairs Logis', '80290', 'Poix de Picardie', '0108', 'Picardie');

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_permissiontoaccess`
--

CREATE TABLE `0108asap_permissiontoaccess` (
  `id` int(11) NOT NULL,
  `TypeOfAcces` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_permissiontoaccess`
--

INSERT INTO `0108asap_permissiontoaccess` (`id`, `TypeOfAcces`) VALUES
(1, 'WebMasteur'),
(2, 'Official'),
(3, 'Officials responsible');

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_raceoutsiderally`
--

CREATE TABLE `0108asap_raceoutsiderally` (
  `id` int(11) NOT NULL,
  `CompetitionStarDay` date DEFAULT NULL,
  `CompetitionEndDay` date DEFAULT NULL,
  `RequirementDate1` date DEFAULT NULL,
  `RequirementDate2` date DEFAULT NULL,
  `RequirementDate3` date DEFAULT NULL,
  `IdCompetition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_rally`
--

CREATE TABLE `0108asap_rally` (
  `id` int(11) NOT NULL,
  `NumberOfSteps` int(10) NOT NULL,
  `NumberOfEs` int(10) NOT NULL,
  `NumberOfCompetitonDays` int(10) NOT NULL,
  `AsaOrganizer` varchar(255) NOT NULL,
  `DatePcNeed1` date DEFAULT NULL,
  `DatePcNeed2` date DEFAULT NULL,
  `DatePcNeed3` date DEFAULT NULL,
  `DateNeedForTheCommissioner1` date DEFAULT NULL,
  `DateNeedForTheCommissioner2` date DEFAULT NULL,
  `DateNeedForTheCommissioner3` date DEFAULT NULL,
  `id_0108asap_competiton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_registrationforofficials`
--

CREATE TABLE `0108asap_registrationforofficials` (
  `id` int(11) NOT NULL,
  `ResponseDatePcNeed1` varchar(255) DEFAULT NULL,
  `ResponseDatePcNeed2` varchar(255) DEFAULT NULL,
  `ResponseDatePcNeed3` varchar(255) DEFAULT NULL,
  `AvaibleDateNeedForTheCommissioner1` varchar(255) DEFAULT NULL,
  `AvaibleDateNeedForTheCommissioner2` varchar(255) DEFAULT NULL,
  `AvaibleDateNeedForTheCommissioner3` varchar(255) DEFAULT NULL,
  `Accommodation` varchar(255) DEFAULT NULL,
  `id_0108asap_competiton` int(11) DEFAULT NULL,
  `id_0108asap_membres` int(11) DEFAULT NULL,
  `id_0108asap_functions` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_sportsevents`
--

CREATE TABLE `0108asap_sportsevents` (
  `id` int(11) NOT NULL,
  `NameOfTheTest` varchar(255) NOT NULL,
  `Location_Circuit` varchar(255) DEFAULT NULL,
  `Observation` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_typeofcompetition`
--

CREATE TABLE `0108asap_typeofcompetition` (
  `id` int(11) NOT NULL,
  `TypeOfCompetiton` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `0108asap_asa`
--
ALTER TABLE `0108asap_asa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_0108asap_League` (`id_0108asap_League`);

--
-- Index pour la table `0108asap_categorycompetition`
--
ALTER TABLE `0108asap_categorycompetition`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `0108asap_competiton`
--
ALTER TABLE `0108asap_competiton`
  ADD PRIMARY KEY (`id`),
  ADD KEY `	id_0108asap_sportsevents` (`id_0108asap_sportsevents`),
  ADD KEY `0108asap_categorycompetition` (`id_0108asap_categorycompetition`),
  ADD KEY `id_0108asap_typeofcompetition` (`id_0108asap_typeofcompetition`);

--
-- Index pour la table `0108asap_functions`
--
ALTER TABLE `0108asap_functions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_0108asap_PermissionOfAcess` (`PermissionToAccess`);

--
-- Index pour la table `0108asap_functionsummary`
--
ALTER TABLE `0108asap_functionsummary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_0108asap_member` (`id_0108asap_member`);

--
-- Index pour la table `0108asap_league`
--
ALTER TABLE `0108asap_league`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `0108asap_membres`
--
ALTER TABLE `0108asap_membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `0108asap_permissiontoaccess`
--
ALTER TABLE `0108asap_permissiontoaccess`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `0108asap_raceoutsiderally`
--
ALTER TABLE `0108asap_raceoutsiderally`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdCompetition` (`IdCompetition`);

--
-- Index pour la table `0108asap_rally`
--
ALTER TABLE `0108asap_rally`
  ADD PRIMARY KEY (`id`),
  ADD KEY `0108asap_rally_ibfk_2` (`id_0108asap_competiton`);

--
-- Index pour la table `0108asap_registrationforofficials`
--
ALTER TABLE `0108asap_registrationforofficials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `0108asap_registrationforofficials_ibfk_1` (`id_0108asap_competiton`),
  ADD KEY `0108asap_registrationforofficials_ibfk_3` (`id_0108asap_membres`),
  ADD KEY `0108asap_registrationforofficials_ibfk_4` (`id_0108asap_functions`);

--
-- Index pour la table `0108asap_sportsevents`
--
ALTER TABLE `0108asap_sportsevents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `0108asap_typeofcompetition`
--
ALTER TABLE `0108asap_typeofcompetition`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `0108asap_asa`
--
ALTER TABLE `0108asap_asa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `0108asap_categorycompetition`
--
ALTER TABLE `0108asap_categorycompetition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `0108asap_competiton`
--
ALTER TABLE `0108asap_competiton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `0108asap_functions`
--
ALTER TABLE `0108asap_functions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT pour la table `0108asap_functionsummary`
--
ALTER TABLE `0108asap_functionsummary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `0108asap_league`
--
ALTER TABLE `0108asap_league`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `0108asap_membres`
--
ALTER TABLE `0108asap_membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `0108asap_permissiontoaccess`
--
ALTER TABLE `0108asap_permissiontoaccess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `0108asap_raceoutsiderally`
--
ALTER TABLE `0108asap_raceoutsiderally`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `0108asap_rally`
--
ALTER TABLE `0108asap_rally`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `0108asap_registrationforofficials`
--
ALTER TABLE `0108asap_registrationforofficials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `0108asap_sportsevents`
--
ALTER TABLE `0108asap_sportsevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `0108asap_typeofcompetition`
--
ALTER TABLE `0108asap_typeofcompetition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `0108asap_asa`
--
ALTER TABLE `0108asap_asa`
  ADD CONSTRAINT `id_0108asap_League` FOREIGN KEY (`id_0108asap_League`) REFERENCES `0108asap_league` (`id`);

--
-- Contraintes pour la table `0108asap_competiton`
--
ALTER TABLE `0108asap_competiton`
  ADD CONSTRAINT `	id_0108asap_sportsevents` FOREIGN KEY (`id_0108asap_sportsevents`) REFERENCES `0108asap_sportsevents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `0108asap_categorycompetition` FOREIGN KEY (`id_0108asap_categorycompetition`) REFERENCES `0108asap_categorycompetition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_0108asap_typeofcompetition` FOREIGN KEY (`id_0108asap_typeofcompetition`) REFERENCES `0108asap_typeofcompetition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `0108asap_functions`
--
ALTER TABLE `0108asap_functions`
  ADD CONSTRAINT `id_0108asap_PermissionOfAcess` FOREIGN KEY (`PermissionToAccess`) REFERENCES `0108asap_permissiontoaccess` (`id`);

--
-- Contraintes pour la table `0108asap_functionsummary`
--
ALTER TABLE `0108asap_functionsummary`
  ADD CONSTRAINT `0108asap_functionsummary_ibfk_1` FOREIGN KEY (`id_0108asap_member`) REFERENCES `0108asap_membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `0108asap_raceoutsiderally`
--
ALTER TABLE `0108asap_raceoutsiderally`
  ADD CONSTRAINT `0108asap_raceoutsiderally_ibfk_1` FOREIGN KEY (`IdCompetition`) REFERENCES `0108asap_competiton` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `0108asap_rally`
--
ALTER TABLE `0108asap_rally`
  ADD CONSTRAINT `0108asap_rally_ibfk_2` FOREIGN KEY (`id_0108asap_competiton`) REFERENCES `0108asap_competiton` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `0108asap_registrationforofficials`
--
ALTER TABLE `0108asap_registrationforofficials`
  ADD CONSTRAINT `0108asap_registrationforofficials_ibfk_1` FOREIGN KEY (`id_0108asap_competiton`) REFERENCES `0108asap_competiton` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `0108asap_registrationforofficials_ibfk_3` FOREIGN KEY (`id_0108asap_membres`) REFERENCES `0108asap_membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `0108asap_registrationforofficials_ibfk_4` FOREIGN KEY (`id_0108asap_functions`) REFERENCES `0108asap_functions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
