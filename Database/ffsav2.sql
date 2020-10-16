-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 16 oct. 2020 à 14:26
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
(3, 'ASA PICARDIE', '0108', 1),
(4, 'ASA Aisne', '0101', 1),
(5, 'ASA ARTOIS LITTORAL II', '0102', 1),
(6, 'ASA 60', '0105', 1),
(7, 'ASA NORD DE LA FRANCE', '0106', 1),
(8, 'ASA SAMBRE ET HELPE', '0109', 1),
(10, 'ASA 02', '0111', 1),
(11, 'ASA DU DETROIT', '0112', 1),
(12, 'ASA CIRCUIT DE CROIX', '0114', 1),
(13, 'ASA 59 HAUTMONT', '0116', 1),
(14, 'ASA 55', '0302', 2),
(15, 'ASA LORRAIN', '0304', 2),
(16, 'ASA MIRECOURT', '0305', 2),
(17, 'ASA DE LA MOSELLE', '0306', 2),
(18, 'ASA MULHOUSE SUD ALSACE', '0307', 2),
(19, 'ASA NANCY', '0308', 2),
(20, 'ASA DES VALLEES', '0313', 2),
(21, 'ASA VOSGIEN', '0314', 2),
(22, 'ASA DES ARDENNES', '0315', 2),
(23, 'ASA PLAINE DE L ILL', '0318', 2),
(24, 'ASA CHAMBLEY', '0321', 2),
(25, 'ASA ANNEAU DU RHIN', '0322', 2),
(26, 'ASA ALSACE', '0323', 2),
(27, 'ASA AUBOISE', '0324', 2),
(28, 'ASA DE LA CHAMPAGNE', '0325', 2),
(29, 'ASA DE LANGRES', '0326', 2),
(30, 'ASA REGION DE CHAUMONT', '0328', 2);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_categorycompetition`
--

CREATE TABLE `0108asap_categorycompetition` (
  `id` int(11) NOT NULL,
  `CategoryCompetition` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_categorycompetition`
--

INSERT INTO `0108asap_categorycompetition` (`id`, `CategoryCompetition`) VALUES
(1, 'Régionale'),
(2, 'National'),
(3, 'Européen'),
(4, 'International');

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

--
-- Déchargement des données de la table `0108asap_competiton`
--

INSERT INTO `0108asap_competiton` (`id`, `id_0108asap_categorycompetition`, `id_0108asap_sportsevents`, `id_0108asap_typeofcompetition`, `Open`, `Close`) VALUES
(1, 1, 1, 1, '1', '0'),
(2, 2, 2, 2, '1', '0'),
(3, 2, 3, 4, '1', '0'),
(4, 1, 4, 5, '1', '0'),
(5, 1, 5, 1, '1', '0');

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
(155, 'Administrateur site', 259),
(159, ' Entrpise Aoomuki', 259),
(160, ' Entreprise CDAD', 259),
(161, 'Président d ASA', 405),
(162, 'Commissaire C', 55),
(163, 'Commissaire B', 55),
(164, 'Commissaire A', 55),
(165, 'Bénévol', 55),
(166, 'Responsable Officiel', 356),
(167, 'Directeur Es', 55),
(168, 'Directeur Rallye', 356);

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
(3, '249498', 1, 160, 1),
(5, '235620', 4, 160, 1);

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
  `PhonNumber` varchar(15) DEFAULT NULL,
  `id_0108asap_asa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_membres`
--

INSERT INTO `0108asap_membres` (`id`, `Name`, `Firstname`, `Email`, `Password`, `Cle`, `Actif`, `Address`, `ZipCode`, `City`, `PhonNumber`, `id_0108asap_asa`) VALUES
(1, 'Jonard', 'Gaetan', 'dev.gaetan.jonard@outlook.fr', 0x2432792431302439623773696e343770454c35744642335454475050753538673873666c6e51344e6876537a6e73696a38424e47733170472f553479, 'rRPBOFCuh1J5UNPBGk7ce8bROSkBZIS7saKAGJlK1601907390LeBAmhVUuxAD0CtTBBXHw4KQAlLAi8HNkbgzQn3Sh4JRA6JdJx', 'true', 'APT 31 26 parc des clairs Logis', '80290', 'Poix de Picardie   ', '06/14/59/37/45', 3),
(4, 'Langry', 'Wilfried', 'wlangry@aoomuki.com', 0x24327924313024476a3433336e304b704f636748345370776c5235572e46367a7947746b736553784b3230455a4445707070653833626e572f516f47, 'kYi4avxlv4RC9hC1601890054kYi4avxlv4RC9hC', 'true', '9 rue Jean Racine', '02270', 'Couvron et Aumencourt', '', 4);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_officialregistrationcompetition`
--

CREATE TABLE `0108asap_officialregistrationcompetition` (
  `id` int(11) NOT NULL,
  `Aviable` varchar(3) DEFAULT 'Oui',
  `AviableDate1` varchar(3) DEFAULT 'NON',
  `AviableDate2` varchar(3) DEFAULT 'NON',
  `AviableDate3` varchar(3) DEFAULT 'NON',
  `AviableDate4` varchar(3) DEFAULT 'NON',
  `AviableDate5` varchar(3) DEFAULT 'NON',
  `NeedAccomodation1` varchar(3) DEFAULT 'NON',
  `NeedAccomodation2` varchar(3) DEFAULT 'NON',
  `NeedAccomodation3` varchar(3) DEFAULT 'NON',
  `NeedAccomodation4` varchar(3) DEFAULT 'NON',
  `NeedAccomodation5` varchar(3) DEFAULT 'NON',
  `Observation-RequestFromOfficial` varchar(255) DEFAULT NULL,
  `id_0108asap_SportEvents` int(11) NOT NULL,
  `id_0108asap_members` int(11) NOT NULL,
  `id_0108asap_function` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(55, 'Officiel'),
(259, 'Developpeur'),
(356, 'Responsable Officiel'),
(405, 'Président d\'ASA');

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_raceoutsiderally`
--

CREATE TABLE `0108asap_raceoutsiderally` (
  `id` int(11) NOT NULL,
  `RequirementDate1` date DEFAULT NULL,
  `RequirementDate2` date DEFAULT NULL,
  `RequirementDate3` date DEFAULT NULL,
  `LodgingPossible1` date DEFAULT NULL,
  `LodgingPossible2` date DEFAULT NULL,
  `LodgingPossible3` date DEFAULT NULL,
  `IdCompetition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_raceoutsiderally`
--

INSERT INTO `0108asap_raceoutsiderally` (`id`, `RequirementDate1`, `RequirementDate2`, `RequirementDate3`, `LodgingPossible1`, `LodgingPossible2`, `LodgingPossible3`, `IdCompetition`) VALUES
(1, '2020-10-23', '2020-01-01', '2020-01-01', '2020-01-01', '2020-10-23', '2020-01-01', 3),
(2, '2020-10-18', '2020-01-01', '2020-01-01', '2020-01-01', '2020-10-18', '2020-01-01', 4);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_rally`
--

CREATE TABLE `0108asap_rally` (
  `id` int(11) NOT NULL,
  `NumberOfSteps` int(10) NOT NULL,
  `NumberOfEs` int(10) NOT NULL,
  `NumberOfCompetitonDays` int(10) NOT NULL,
  `ObservationAccommodation` varchar(255) DEFAULT NULL,
  `RequirementDate1` date NOT NULL,
  `RequirementDate2` date DEFAULT NULL,
  `RequirementDate3` date DEFAULT NULL,
  `RequirementDate4` date DEFAULT NULL,
  `RequirementDate5` date DEFAULT NULL,
  `LodgingPossible1` date DEFAULT NULL,
  `LodgingPossible2` date DEFAULT NULL,
  `LodgingPossible3` date DEFAULT NULL,
  `LodgingPossible4` date DEFAULT NULL,
  `LodgingPossible5` date DEFAULT NULL,
  `id_0108asap_competiton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `0108asap_rally`
--

INSERT INTO `0108asap_rally` (`id`, `NumberOfSteps`, `NumberOfEs`, `NumberOfCompetitonDays`, `ObservationAccommodation`, `RequirementDate1`, `RequirementDate2`, `RequirementDate3`, `RequirementDate4`, `RequirementDate5`, `LodgingPossible1`, `LodgingPossible2`, `LodgingPossible3`, `LodgingPossible4`, `LodgingPossible5`, `id_0108asap_competiton`) VALUES
(1, 2, 4, 2, 'Pas d herbergement sauf pour les personnes habitant a plus de 250 km', '2020-10-24', '2020-10-25', '2020-01-01', '2020-01-01', '2020-01-01', '2020-10-24', '2020-01-01', '2020-01-01', '2020-01-01', '2020-01-01', 1),
(2, 2, 12, 2, 'Hebergement le samedi soir', '2020-10-30', '2020-10-31', '2020-11-01', '2020-01-01', '2020-01-01', '2020-10-31', '2020-01-01', '2020-01-01', '2020-01-01', '2020-01-01', 2),
(3, 2, 4, 1, 'Pas d herbergement sauf pour les personnes habitant a plus de 250 km', '2020-11-14', '2020-11-15', '2020-01-01', '2020-01-01', '2020-01-01', '2020-11-14', '2020-01-01', '2020-01-01', '2020-01-01', '2020-01-01', 5);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_sportsevents`
--

CREATE TABLE `0108asap_sportsevents` (
  `id` int(11) NOT NULL,
  `NameOfTheTest` varchar(255) NOT NULL,
  `Location_Circuit` varchar(255) DEFAULT NULL,
  `Observation` longtext NOT NULL,
  `CompetitionStarDay` date NOT NULL,
  `CompetitionEndDay` date NOT NULL,
  `MinimumNumberOfOfficials` varchar(11) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_0108asap_asa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_sportsevents`
--

INSERT INTO `0108asap_sportsevents` (`id`, `NameOfTheTest`, `Location_Circuit`, `Observation`, `CompetitionStarDay`, `CompetitionEndDay`, `MinimumNumberOfOfficials`, `CreationDate`, `id_0108asap_asa`) VALUES
(1, 'Le 2 eme Rallye des centurion', 'Bray', 'rallye sur une journée', '2020-10-24', '2020-10-25', '50', '2020-10-12 10:33:04', 11),
(2, ' Les 7 vallées d artois', 'Auchy les Hesdin', 'Competition sur 2 jours vendredi vérif', '2020-10-30', '2020-11-01', '150', '2020-10-12 10:34:42', 5),
(3, 'Test ', 'Airaine', 'rallye sur une journée', '2020-10-31', '2020-10-31', '50', '2020-10-12 13:03:23', 3),
(4, 'Teste gt4 ', 'sdsd', 'rallye sur une journée', '2020-10-15', '2020-10-16', '5', '2020-10-14 11:37:40', 29),
(5, 'Le Picardie', 'Airaine', 'rallye sur une journée Verif le samedi', '2020-11-14', '2020-11-15', '50', '2020-10-14 12:46:30', 3);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_typeofcompetition`
--

CREATE TABLE `0108asap_typeofcompetition` (
  `id` int(11) NOT NULL,
  `TypeOfCompetiton` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `0108asap_typeofcompetition`
--

INSERT INTO `0108asap_typeofcompetition` (`id`, `TypeOfCompetiton`) VALUES
(1, 'Rallye'),
(2, 'Rallye tout terrain'),
(3, 'Endurance tt '),
(4, 'Rallye cross'),
(5, 'GT4'),
(6, 'Course de côte'),
(7, 'Drift'),
(8, 'Circuit'),
(9, 'tedst'),
(10, 'testttt');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `AsaName` (`id_0108asap_asa`);

--
-- Index pour la table `0108asap_officialregistrationcompetition`
--
ALTER TABLE `0108asap_officialregistrationcompetition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_0108asap_SportEvents` (`id_0108asap_SportEvents`),
  ADD KEY `id_0108asap_members` (`id_0108asap_members`),
  ADD KEY `id_0108asap_function` (`id_0108asap_function`);

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
-- Index pour la table `0108asap_sportsevents`
--
ALTER TABLE `0108asap_sportsevents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_0108asap_asa` (`id_0108asap_asa`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `0108asap_categorycompetition`
--
ALTER TABLE `0108asap_categorycompetition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `0108asap_competiton`
--
ALTER TABLE `0108asap_competiton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `0108asap_functions`
--
ALTER TABLE `0108asap_functions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT pour la table `0108asap_functionsummary`
--
ALTER TABLE `0108asap_functionsummary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `0108asap_league`
--
ALTER TABLE `0108asap_league`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `0108asap_membres`
--
ALTER TABLE `0108asap_membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `0108asap_officialregistrationcompetition`
--
ALTER TABLE `0108asap_officialregistrationcompetition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `0108asap_permissiontoaccess`
--
ALTER TABLE `0108asap_permissiontoaccess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT pour la table `0108asap_raceoutsiderally`
--
ALTER TABLE `0108asap_raceoutsiderally`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `0108asap_rally`
--
ALTER TABLE `0108asap_rally`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `0108asap_sportsevents`
--
ALTER TABLE `0108asap_sportsevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `0108asap_typeofcompetition`
--
ALTER TABLE `0108asap_typeofcompetition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `0108asap_categorycompetition` FOREIGN KEY (`id_0108asap_categorycompetition`) REFERENCES `0108asap_categorycompetition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_0108asap_sportsevents` FOREIGN KEY (`id_0108asap_sportsevents`) REFERENCES `0108asap_sportsevents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Contraintes pour la table `0108asap_membres`
--
ALTER TABLE `0108asap_membres`
  ADD CONSTRAINT `0108asap_membres_ibfk_1` FOREIGN KEY (`id_0108asap_asa`) REFERENCES `0108asap_asa` (`id`);

--
-- Contraintes pour la table `0108asap_officialregistrationcompetition`
--
ALTER TABLE `0108asap_officialregistrationcompetition`
  ADD CONSTRAINT `0108asap_officialregistrationcompetition_ibfk_1` FOREIGN KEY (`id_0108asap_SportEvents`) REFERENCES `0108asap_sportsevents` (`id`),
  ADD CONSTRAINT `0108asap_officialregistrationcompetition_ibfk_2` FOREIGN KEY (`id_0108asap_members`) REFERENCES `0108asap_membres` (`id`),
  ADD CONSTRAINT `0108asap_officialregistrationcompetition_ibfk_3` FOREIGN KEY (`id_0108asap_function`) REFERENCES `0108asap_functions` (`id`);

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
-- Contraintes pour la table `0108asap_sportsevents`
--
ALTER TABLE `0108asap_sportsevents`
  ADD CONSTRAINT `0108asap_sportsevents_ibfk_1` FOREIGN KEY (`id_0108asap_asa`) REFERENCES `0108asap_asa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
