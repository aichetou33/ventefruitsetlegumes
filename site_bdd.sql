-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2021 at 06:05 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_bdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `aliment`
--

CREATE TABLE `aliment` (
  `numAl` int(11) NOT NULL,
  `nomAl` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `qteStock` int(5) NOT NULL,
  `prixUnitaire` double NOT NULL,
  `typeAl` varchar(100) NOT NULL,
  `dateArrive` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aliment`
--

INSERT INTO `aliment` (`numAl`, `nomAl`, `image`, `qteStock`, `prixUnitaire`, `typeAl`, `dateArrive`) VALUES
(1, 'Banane', 'banane.jpg', 13, 1.5, 'fruit', '2021-01-14'),
(2, 'Fraise', 'fraise.jpg', 15, 0.25, 'fruit', '2021-01-16'),
(3, 'Raisin', 'raisin.jpg', 7, 1.05, 'fruit', '2021-01-13'),
(4, 'Aubergine', 'aubergine.jpg', 30, 0.5, 'légume', '2021-01-17'),
(5, 'Carotte', 'carotte.jpg', 7, 0.96, 'légume', '2021-01-15'),
(6, 'Tomate', 'tomate.jpg', 28, 0.48, 'légume', '2021-01-12'),
(7, 'Artichaut', 'artichaut.jpg', 5, 1.02, 'legume', '2021-01-17'),
(8, 'Mangue', 'mangue.jpg', 15, 1.23, 'fruit', '2021-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `numCom` int(11) NOT NULL,
  `numInd` int(11) NOT NULL,
  `typeLiv` varchar(100) NOT NULL,
  `dateCom` date NOT NULL,
  `stateCom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`numCom`, `numInd`, `typeLiv`, `dateCom`, `stateCom`) VALUES
(1, 3, 'individuel', '2021-01-12', 'attente'),
(18, 2, 'monstadt jean', '2021-01-12', 'valide'),
(23, 1, 'inosuke charles', '2021-01-12', 'valide'),
(24, 5, 'Individuel', '2021-01-12', 'attente'),
(25, 6, 'monstadt jean', '2021-01-12', 'valide'),
(26, 1, 'Individuel', '2021-01-13', 'attente'),
(27, 1, 'individuel', '2021-01-13', 'attente'),
(28, 3, 'Individuel', '2021-01-18', 'valide');

-- --------------------------------------------------------

--
-- Table structure for table `hebdomadaire`
--

CREATE TABLE `hebdomadaire` (
  `numHebdo` int(11) NOT NULL,
  `numInd` int(11) NOT NULL,
  `nbPers` int(2) NOT NULL,
  `limitePrix` int(5) NOT NULL,
  `jour` varchar(8) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hebdomadaire`
--

INSERT INTO `hebdomadaire` (`numHebdo`, `numInd`, `nbPers`, `limitePrix`, `jour`, `description`) VALUES
(1, 3, 2, 50, 'jeudi', '<h5>Le panier de cette semaine contient </h5><br>3 Fraise<br>2 Aubergine'),
(2, 2, 2, 77, 'mardi', '<h5>Le panier de cette semaine contient </h5><br>3 Fraise<br>2 Aubergine'),
(3, 1, 5, 56, 'lundi', '<h5>Le panier de cette semaine contient </h5><br>3 Fraise<br>2 Aubergine'),
(4, 8, 2, 60, 'lundi', '<h5>Le panier de cette semaine contient </h5><br>3 Fraise<br>2 Aubergine'),
(5, 9, 1, 50, 'mercredi', '<h5>Le panier de cette semaine contient </h5><br>3 Fraise<br>2 Aubergine');

-- --------------------------------------------------------

--
-- Table structure for table `individu`
--

CREATE TABLE `individu` (
  `numInd` int(11) NOT NULL,
  `nomInd` varchar(100) NOT NULL,
  `prenomInd` varchar(100) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `codePostal` int(5) NOT NULL,
  `tel` int(11) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `individu`
--

INSERT INTO `individu` (`numInd`, `nomInd`, `prenomInd`, `adresse`, `ville`, `codePostal`, `tel`, `mail`, `mdp`) VALUES
(0, 'root', 'root', 'null', 'null', 0, 0, 'admin@site.com', '4b3626865dc6d5cfe1c60b855e68634a'),
(1, 'monstadt', 'jean', '34 rue des moulins', 'ventlevé', 75006, 506894517, 'dandelion@gmail.com', '042f38b694b52bff956837f267472516'),
(2, 'inosuke', 'charles', '5 avenue des cochons', 'Paris', 75001, 636154895, 'dragon@gmail.com', '596f7fea28cdfbac0347a46af3e8e3d1'),
(3, 'kamado', 'tanjiro', '6 rue de muzan', 'Normandie', 76000, 125364879, 'slayer@gmail.com', '83be32aa81db5fdce7ded8d0a1dd863c'),
(5, 'michel', 'robert', '63 boulevard des roses', 'Paris', 75001, 123648597, 'rmichel@gmail.com', 'd780182f77b121450849c2b088a444f0'),
(6, 'dupont', 'marie', '5 rue de giraudon', 'Paris', 75001, 632589471, 'dmarie@gmail.com', 'b3725122c9d3bfef5664619e08e31877'),
(7, 'patrick', 'etoile', '56 rue des poissons', 'Normandie', 86004, 126357986, 'etoile@gmail.com', '5308d4d85a1c054f98a3ee468a46aea9'),
(8, 'sageekaran', 'ragavi', '4 rue de la porte', 'paris', 75006, 689457312, 'ragavi@gmail.com', '77c6dede13bbb9e157423a03bbb05cb4'),
(9, 'pepe', 'san', '6 rue du Troll', 'Grenoble', 38100, 125467988, 'pepesan@gmail.com', '2ff75a8c551edfce74576542b0e8b0ba');

-- --------------------------------------------------------

--
-- Table structure for table `lignecommande`
--

CREATE TABLE `lignecommande` (
  `numLC` int(11) NOT NULL,
  `numCom` int(11) NOT NULL,
  `numAl` int(11) NOT NULL,
  `quantiteCommande` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lignecommande`
--

INSERT INTO `lignecommande` (`numLC`, `numCom`, `numAl`, `quantiteCommande`) VALUES
(2, 2, 3, 5),
(3, 2, 3, 5),
(4, 22, 3, 5),
(5, 23, 3, 5),
(6, 23, 1, 2),
(7, 24, 2, 1),
(8, 25, 1, 2),
(9, 26, 2, 5),
(10, 27, 3, 3),
(11, 28, 4, 2),
(12, 28, 6, 2);

--
-- Triggers `lignecommande`
--
DELIMITER $$
CREATE TRIGGER `updateStock` AFTER INSERT ON `lignecommande` FOR EACH ROW UPDATE ALIMENT SET qteStock = qteStock - new.quantiteCommande WHERE numAl = new.numAl
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

CREATE TABLE `livraison` (
  `numLiv` int(11) NOT NULL,
  `numCom` int(11) NOT NULL,
  `dateLiv` date NOT NULL,
  `typeLiv` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`numLiv`, `numCom`, `dateLiv`, `typeLiv`) VALUES
(1, 18, '2021-01-16', 'I'),
(2, 23, '2021-01-18', 'I'),
(3, 28, '2021-01-23', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `livraison_hebdo`
--

CREATE TABLE `livraison_hebdo` (
  `numLH` int(11) NOT NULL,
  `numHebdo` int(11) NOT NULL,
  `dateLH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livraison_hebdo`
--

INSERT INTO `livraison_hebdo` (`numLH`, `numHebdo`, `dateLH`) VALUES
(1, 1, '2021-01-14'),
(4, 4, '2021-01-18'),
(5, 5, '2021-01-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aliment`
--
ALTER TABLE `aliment`
  ADD PRIMARY KEY (`numAl`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`numCom`),
  ADD KEY `numInd` (`numInd`);

--
-- Indexes for table `hebdomadaire`
--
ALTER TABLE `hebdomadaire`
  ADD PRIMARY KEY (`numHebdo`),
  ADD KEY `numInd` (`numInd`);

--
-- Indexes for table `individu`
--
ALTER TABLE `individu`
  ADD PRIMARY KEY (`numInd`);

--
-- Indexes for table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD PRIMARY KEY (`numLC`);

--
-- Indexes for table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`numLiv`),
  ADD KEY `cirCom` (`numCom`);

--
-- Indexes for table `livraison_hebdo`
--
ALTER TABLE `livraison_hebdo`
  ADD PRIMARY KEY (`numLH`),
  ADD KEY `numHebdo` (`numHebdo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aliment`
--
ALTER TABLE `aliment`
  MODIFY `numAl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `numCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `hebdomadaire`
--
ALTER TABLE `hebdomadaire`
  MODIFY `numHebdo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `individu`
--
ALTER TABLE `individu`
  MODIFY `numInd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lignecommande`
--
ALTER TABLE `lignecommande`
  MODIFY `numLC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `numLiv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `livraison_hebdo`
--
ALTER TABLE `livraison_hebdo`
  MODIFY `numLH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `cirInd` FOREIGN KEY (`numInd`) REFERENCES `individu` (`numInd`);

--
-- Constraints for table `hebdomadaire`
--
ALTER TABLE `hebdomadaire`
  ADD CONSTRAINT `cirIndi` FOREIGN KEY (`numInd`) REFERENCES `individu` (`numInd`);

--
-- Constraints for table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `cirCom` FOREIGN KEY (`numCom`) REFERENCES `commande` (`numCom`);

--
-- Constraints for table `livraison_hebdo`
--
ALTER TABLE `livraison_hebdo`
  ADD CONSTRAINT `cirHebdo` FOREIGN KEY (`numHebdo`) REFERENCES `hebdomadaire` (`numHebdo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
