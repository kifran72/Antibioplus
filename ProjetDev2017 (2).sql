-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 21 Avril 2017 à 15:25
-- Version du serveur :  5.7.17-0ubuntu0.16.04.2
-- Version de PHP :  7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ProjetDev2017`
--

-- --------------------------------------------------------

--
-- Structure de la table `antibiotique`
--

CREATE TABLE `antibiotique` (
  `ID_Antibiotique` int(10) NOT NULL,
  `Nom_Antibiotique` varchar(30) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Contenu de la table `antibiotique`
--

INSERT INTO `antibiotique` (`ID_Antibiotique`, `Nom_Antibiotique`) VALUES
(1, 'antiflemite'),
(2, 'try');

-- --------------------------------------------------------

--
-- Structure de la table `bacterie`
--

CREATE TABLE `bacterie` (
  `ID_Bacterie` int(10) NOT NULL,
  `Nom_Bacterie` varchar(30) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Contenu de la table `bacterie`
--

INSERT INTO `bacterie` (`ID_Bacterie`, `Nom_Bacterie`) VALUES
(16, 'bact'),
(15, 'bla'),
(7, 'flemaria'),
(17, 'jeremy');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `ID_Equipe` int(10) NOT NULL,
  `Nom_Equipe` varchar(20) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`ID_Equipe`, `Nom_Equipe`) VALUES
(1, 'equipe A'),
(2, 'equipe B');

-- --------------------------------------------------------

--
-- Structure de la table `etude`
--

CREATE TABLE `etude` (
  `ID_Etude` int(10) NOT NULL,
  `Nom_Etude` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `ID_Personne` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `etude_antibiotique`
--

CREATE TABLE `etude_antibiotique` (
  `ID_Etude` int(10) NOT NULL,
  `ID_Antibiotique` int(10) NOT NULL,
  `ID_Equipe` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `etude_bacterie`
--

CREATE TABLE `etude_bacterie` (
  `ID_Etude` int(11) NOT NULL,
  `ID_Souche` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `etude_molecule`
--

CREATE TABLE `etude_molecule` (
  `ID_Etude` int(10) NOT NULL,
  `ID_Molecule` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `molecule`
--

CREATE TABLE `molecule` (
  `ID_Molecule` int(10) NOT NULL,
  `Nom_Molecule` varchar(30) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `ID_Personne` int(10) NOT NULL,
  `Nom_Personne` varchar(20) NOT NULL,
  `Prenom_Personne` varchar(20) NOT NULL,
  `MDP_Personne` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Role_Personne` tinyint(1) NOT NULL,
  `ID_Equipe` int(10) DEFAULT NULL,
  `MAIL_Personne` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`ID_Personne`, `Nom_Personne`, `Prenom_Personne`, `MDP_Personne`, `Role_Personne`, `ID_Equipe`, `MAIL_Personne`) VALUES
(9, 'Rizzon', 'charles', 'epsi1234', 0, NULL, 'charles.rizzon@epsi.fr'),
(10, 'admin', 'admin', 'toor', 0, NULL, 'root');

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `ID_Molecule` int(10) NOT NULL,
  `ID_Souche` int(10) NOT NULL,
  `ID_Antibiotique` int(10) NOT NULL,
  `ID_Etude` int(10) NOT NULL,
  `Efficacité` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Structure de la table `souche`
--

CREATE TABLE `souche` (
  `ID_Souche` int(10) NOT NULL,
  `Numero` int(3) NOT NULL,
  `ID_Bacterie` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Contenu de la table `souche`
--

INSERT INTO `souche` (`ID_Souche`, `Numero`, `ID_Bacterie`) VALUES
(6, 30, 7),
(14, 50, 15),
(15, 50, 16),
(17, 23, 16),
(19, 12, 17),
(20, 13, 17);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `antibiotique`
--
ALTER TABLE `antibiotique`
  ADD PRIMARY KEY (`ID_Antibiotique`),
  ADD UNIQUE KEY `Nom_Antibiotique` (`Nom_Antibiotique`);

--
-- Index pour la table `bacterie`
--
ALTER TABLE `bacterie`
  ADD PRIMARY KEY (`ID_Bacterie`),
  ADD UNIQUE KEY `Nom_Bacterie` (`Nom_Bacterie`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`ID_Equipe`);

--
-- Index pour la table `etude`
--
ALTER TABLE `etude`
  ADD PRIMARY KEY (`ID_Etude`),
  ADD KEY `ID_Personne` (`ID_Personne`),
  ADD KEY `ID_Personne_2` (`ID_Personne`);

--
-- Index pour la table `etude_antibiotique`
--
ALTER TABLE `etude_antibiotique`
  ADD KEY `ID_Etude` (`ID_Etude`),
  ADD KEY `ID_Antibiotique` (`ID_Antibiotique`),
  ADD KEY `ID_Equipe` (`ID_Equipe`);

--
-- Index pour la table `etude_bacterie`
--
ALTER TABLE `etude_bacterie`
  ADD KEY `ID_Etude` (`ID_Etude`),
  ADD KEY `ID_Bacterie` (`ID_Souche`);

--
-- Index pour la table `etude_molecule`
--
ALTER TABLE `etude_molecule`
  ADD KEY `ID_Etude` (`ID_Etude`),
  ADD KEY `ID_Molecule` (`ID_Molecule`);

--
-- Index pour la table `molecule`
--
ALTER TABLE `molecule`
  ADD PRIMARY KEY (`ID_Molecule`),
  ADD UNIQUE KEY `Nom_Molecule` (`Nom_Molecule`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`ID_Personne`),
  ADD UNIQUE KEY `MAIL_Personne` (`MAIL_Personne`),
  ADD KEY `ID_Equipe` (`ID_Equipe`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD KEY `ID_Molecule` (`ID_Molecule`),
  ADD KEY `ID_Bacterie` (`ID_Souche`),
  ADD KEY `ID_Antibiotique` (`ID_Antibiotique`),
  ADD KEY `ID_Etude` (`ID_Etude`);

--
-- Index pour la table `souche`
--
ALTER TABLE `souche`
  ADD PRIMARY KEY (`ID_Souche`),
  ADD KEY `ID_Bacterie` (`ID_Bacterie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `antibiotique`
--
ALTER TABLE `antibiotique`
  MODIFY `ID_Antibiotique` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `bacterie`
--
ALTER TABLE `bacterie`
  MODIFY `ID_Bacterie` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `ID_Equipe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `etude`
--
ALTER TABLE `etude`
  MODIFY `ID_Etude` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `molecule`
--
ALTER TABLE `molecule`
  MODIFY `ID_Molecule` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `ID_Personne` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `souche`
--
ALTER TABLE `souche`
  MODIFY `ID_Souche` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etude`
--
ALTER TABLE `etude`
  ADD CONSTRAINT `etude_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`ID_Personne`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `etude_antibiotique`
--
ALTER TABLE `etude_antibiotique`
  ADD CONSTRAINT `etude_antibiotique_ibfk_1` FOREIGN KEY (`ID_Etude`) REFERENCES `etude` (`ID_Etude`) ON UPDATE CASCADE,
  ADD CONSTRAINT `etude_antibiotique_ibfk_2` FOREIGN KEY (`ID_Antibiotique`) REFERENCES `antibiotique` (`ID_Antibiotique`) ON UPDATE CASCADE,
  ADD CONSTRAINT `etude_antibiotique_ibfk_3` FOREIGN KEY (`ID_Equipe`) REFERENCES `equipe` (`ID_Equipe`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `etude_bacterie`
--
ALTER TABLE `etude_bacterie`
  ADD CONSTRAINT `etude_bacterie_ibfk_2` FOREIGN KEY (`ID_Etude`) REFERENCES `etude` (`ID_Etude`) ON UPDATE CASCADE,
  ADD CONSTRAINT `etude_bacterie_ibfk_3` FOREIGN KEY (`ID_Souche`) REFERENCES `souche` (`ID_Souche`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `etude_molecule`
--
ALTER TABLE `etude_molecule`
  ADD CONSTRAINT `etude_molecule_ibfk_1` FOREIGN KEY (`ID_Molecule`) REFERENCES `molecule` (`ID_Molecule`) ON UPDATE CASCADE,
  ADD CONSTRAINT `etude_molecule_ibfk_2` FOREIGN KEY (`ID_Etude`) REFERENCES `etude` (`ID_Etude`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`ID_Equipe`) REFERENCES `equipe` (`ID_Equipe`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `resultat_ibfk_1` FOREIGN KEY (`ID_Molecule`) REFERENCES `molecule` (`ID_Molecule`) ON UPDATE CASCADE,
  ADD CONSTRAINT `resultat_ibfk_2` FOREIGN KEY (`ID_Etude`) REFERENCES `etude` (`ID_Etude`) ON UPDATE CASCADE,
  ADD CONSTRAINT `resultat_ibfk_3` FOREIGN KEY (`ID_Antibiotique`) REFERENCES `antibiotique` (`ID_Antibiotique`) ON UPDATE CASCADE,
  ADD CONSTRAINT `resultat_ibfk_4` FOREIGN KEY (`ID_Souche`) REFERENCES `souche` (`ID_Souche`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `souche`
--
ALTER TABLE `souche`
  ADD CONSTRAINT `souche_ibfk_1` FOREIGN KEY (`ID_Bacterie`) REFERENCES `bacterie` (`ID_Bacterie`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
