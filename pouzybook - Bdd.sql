-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 18 mai 2021 à 09:03
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pouzybook`
--

-- --------------------------------------------------------

--
-- Structure de la table `administres`
--

DROP TABLE IF EXISTS `administres`;
CREATE TABLE IF NOT EXISTS `administres` (
  `idUtilisateur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `utilisateur` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `mail` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administres`
--

INSERT INTO `administres` (`idUtilisateur`, `utilisateur`, `motDePasse`, `nom`, `prenom`, `adresse`, `mail`) VALUES
(1, 'bibiss', 'fabrice76', 'HURÉ', 'Fabrice', '15 allée du vignoble', 'fabrice.hure@gmail.com'),
(2, 'malo', 'malobtssio', 'LERIN', 'Malo', '12 allée du jardin', 'malo.lerin@gmail.com'),
(4, 'JeanMarc', 'fabrice', NULL, NULL, NULL, NULL),
(13, 'fabrice', 'login', 'HURÉ', 'Fabrizio', '15 hameau aristide briand', 'fabrice.hure.35@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `idAuteur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auteur` varchar(50) NOT NULL,
  PRIMARY KEY (`idAuteur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`idAuteur`, `auteur`) VALUES
(1, 'Alain-Fournier'),
(2, 'Anouilh'),
(3, 'Apollinaire'),
(4, 'Aragon'),
(5, 'Artaud'),
(6, 'Audoux'),
(7, 'Aymé'),
(9, '_Autre Auteur');

-- --------------------------------------------------------

--
-- Structure de la table `edition`
--

DROP TABLE IF EXISTS `edition`;
CREATE TABLE IF NOT EXISTS `edition` (
  `idEdition` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `edition` varchar(100) NOT NULL,
  PRIMARY KEY (`idEdition`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `edition`
--

INSERT INTO `edition` (`idEdition`, `edition`) VALUES
(1, 'Gallimard'),
(2, 'Flammarion'),
(3, 'Milan'),
(4, 'Baudelaire'),
(5, 'Minuit'),
(6, 'Hachette'),
(7, 'Le léopard masqué'),
(8, 'Privat'),
(9, 'Julliard'),
(10, 'Allary'),
(12, '_Autre maison d\'édition');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `dateEmprunt` date NOT NULL,
  `idEmprunt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idLivreEmprunte` int(10) UNSIGNED NOT NULL,
  `idEmprunteur` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idEmprunt`),
  KEY `FK_emprunt_livres` (`idLivreEmprunte`),
  KEY `FK_emprunteur` (`idEmprunteur`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`dateEmprunt`, `idEmprunt`, `idLivreEmprunte`, `idEmprunteur`) VALUES
('2021-04-20', 10, 10, 13),
('2021-04-21', 14, 11, 2),
('2021-04-26', 15, 24, 2),
('2021-04-27', 16, 21, 2),
('2021-04-27', 17, 18, 1),
('2021-05-03', 19, 27, 2);

-- --------------------------------------------------------

--
-- Structure de la table `format`
--

DROP TABLE IF EXISTS `format`;
CREATE TABLE IF NOT EXISTS `format` (
  `idFormat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `format` varchar(50) NOT NULL,
  PRIMARY KEY (`idFormat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `format`
--

INSERT INTO `format` (`idFormat`, `format`) VALUES
(1, 'Format livre de poche : 11 x 18 cm'),
(2, 'Format digest : 14 x 21.6 cm'),
(3, 'Format roman A5 :15 x 21 cm'),
(4, 'Format royal : 16 x 24 cm'),
(5, 'Format A4 : 21 x 29.7 cm.'),
(6, '_Autre format de livre');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `idGenre` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `genre` varchar(100) NOT NULL,
  PRIMARY KEY (`idGenre`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`idGenre`, `genre`) VALUES
(1, '_Autre Genre'),
(2, 'Bande dessinée'),
(3, 'Roman d\'amour'),
(4, 'Roman noir'),
(5, 'Roman à énigme'),
(6, 'Fantastique'),
(7, 'Science-fiction'),
(9, 'Art Poétique'),
(10, 'Théâtraux'),
(11, 'Épistolaires'),
(12, 'Argumentatifs');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `idAuteurLivres` int(10) UNSIGNED NOT NULL,
  `ref` bigint(13) UNSIGNED NOT NULL COMMENT 'Référence ISBN',
  `nbrPages` smallint(5) UNSIGNED NOT NULL,
  `idEditionLivres` int(10) UNSIGNED NOT NULL,
  `idGenreLivres` int(10) UNSIGNED NOT NULL,
  `anneeEdition` smallint(6) NOT NULL,
  `langue` varchar(50) NOT NULL,
  `idFormatLivres` int(10) UNSIGNED NOT NULL,
  `idProprietaire` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_livres_auteur` (`idAuteurLivres`),
  KEY `FK_livres_edition` (`idEditionLivres`),
  KEY `FK_livres_genre` (`idGenreLivres`),
  KEY `FK_livres_format` (`idFormatLivres`),
  KEY `FK_livres_proprietaire` (`idProprietaire`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `idAuteurLivres`, `ref`, `nbrPages`, `idEditionLivres`, `idGenreLivres`, `anneeEdition`, `langue`, `idFormatLivres`, `idProprietaire`) VALUES
(10, 'le titre', 2, 1234567891012, 100, 6, 5, 2021, 'la langue', 4, 1),
(11, 'le titre2', 3, 1012123456789, 200, 5, 4, 2022, 'English', 3, 1),
(12, 'le titre3', 3, 1012123456789, 200, 5, 4, 2022, 'English', 3, 4),
(13, 'le titre 10', 5, 1236547891012, 116, 7, 2, 2019, 'la langue', 4, 4),
(15, 'le titre 52', 2, 1234567891012, 116, 2, 5, 2021, 'la langue', 4, 4),
(17, 'le titre3', 3, 1012123456789, 200, 5, 4, 2022, 'English', 3, 4),
(18, 'le titre 10', 5, 1236547891012, 116, 7, 2, 2019, 'la langue', 4, 4),
(19, 'le titre21', 1, 1012123456789, 201, 5, 4, 2017, 'English', 3, 2),
(20, 'le titre', 2, 1234567891012, 100, 6, 5, 2021, 'la langue', 4, 1),
(21, 'le titre2', 3, 1012123456789, 200, 5, 4, 2022, 'English', 3, 1),
(22, 'le titre 10', 5, 1236547891012, 116, 7, 2, 2019, 'la langue', 4, 4),
(24, 'le titre3', 3, 1012123456789, 200, 5, 4, 2022, 'English', 3, 4),
(25, 'le titre21', 1, 1012123456789, 201, 5, 4, 2017, 'English', 3, 2),
(26, 'Les fleurs du mal', 6, 1245875669, 176, 6, 7, 2021, 'Français', 6, 2),
(27, 'le titre', 5, 1122123456987, 176, 6, 4, 2021, 'la langue', 3, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_emprunt_livres` FOREIGN KEY (`idLivreEmprunte`) REFERENCES `livres` (`id`),
  ADD CONSTRAINT `FK_emprunteur` FOREIGN KEY (`idEmprunteur`) REFERENCES `administres` (`idUtilisateur`);

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `FK_livres_auteur` FOREIGN KEY (`idAuteurLivres`) REFERENCES `auteur` (`idAuteur`),
  ADD CONSTRAINT `FK_livres_edition` FOREIGN KEY (`idEditionLivres`) REFERENCES `edition` (`idEdition`),
  ADD CONSTRAINT `FK_livres_format` FOREIGN KEY (`idFormatLivres`) REFERENCES `format` (`idFormat`),
  ADD CONSTRAINT `FK_livres_genre` FOREIGN KEY (`idGenreLivres`) REFERENCES `genre` (`idGenre`),
  ADD CONSTRAINT `FK_livres_proprietaire` FOREIGN KEY (`idProprietaire`) REFERENCES `administres` (`idUtilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
