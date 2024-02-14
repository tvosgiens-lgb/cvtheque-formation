-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 12 mars 2021 à 10:53
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cvtheque`
--

--
-- Déchargement des données de la table `professionnels`
--

INSERT INTO `professionnels` (`id`, `prenom`, `nom`, `cp`, `ville`, `telephone`, `email`, `naissance`, `formation`, `domaine`, `source`, `observation`, `created_at`, `updated_at`, `metier_id`) VALUES
(1, 'Armel', 'Auchère', '45000', 'Orléans', '02 38 44 77 11', 'aa@aol.com', '1980-04-25',1, 'R', 'Le CESI orléans', 'Armel est intervenu pour les BTS SIO en 2015  et 2016',  '2020-05-01 17:28:08', '2020-05-03 07:32:37', 2),
(2, 'Marie', 'Dagniau', '36270', 'Eguzon', '06 13 12 00 55', 'md@eguzon.com','1996-08-05', 1, 'D', 'Maire d\'Eguzon JC Blin', 'Formation ingé.', '2020-05-02 06:37:26', '2020-05-03 07:33:07', 1),
(3, 'Alexandre', 'Lepompais', '36200', 'Argenton sur creuse', '07 14 88 99 00', 'alepompais@gmail.com', '1982-01-14',0, 'S,R', 'Linkedin', 'Échanges fin avril via Linkedin', '2020-05-02 08:35:11', '2020-05-03 07:33:44', 1),
(4, 'Serge', 'Giner', '36000', 'Châteauroux', '02 54 54 54 01', 'sginer@free.fr', '1958-08-30',1, 'D', 'Pesonnelle', 'En vacances en Espagne entre décembre et avril', '2020-04-06 02:10:34', '2020-05-03 07:34:40', 5),
(5, 'Fadhel', 'Boukhris', '37000', 'Tours', '02 47 33 33 33', 'fboukhris@free.fr','1954-05-12', 1, 'D', 'Personnelle', 'Aucune restriction',  '2020-04-06 07:36:11', '2020-05-03 07:37:10', 10),
(6, 'Alex', 'Gaillard', '37000', 'Tours', '02 47 00 00 00', 'agaillard@gmail.com', '1959-11-18',1, 'D', 'Personnelle', NULL, '2020-04-06 07:41:26', '2020-05-03 07:37:33', 1),
(7, 'Pierre', 'Soulin', '36000', 'Déols', '02 54 00 00 25', 'pierre36@gmail.com', '1986-04-03',0, 'D', 'Linkedin', 'Suite annonce Hélène été 2019',  '2020-04-06 07:45:35', '2020-05-03 07:40:42', 4),
(8, 'Sophie', 'Farel', '45000', 'Orléans', '02 38 54 54 54', 'farel.s@orange.fr', '1975-09-22',1, 'S,R,D', 'Linkedin', 'Suite annonce Hélène été 2019', '2020-04-06 07:51:20', '2020-05-03 07:41:04', 3),
(9, 'Christophe', 'Alban', '18000', 'Bourges', '02 48 36 18 41', 'alban@free.fr', '1981-02-25',0, 'S,R', 'Linkedin', 'Suite annonce Hélène été 2019',  '2020-04-06 07:57:59', '2020-05-03 07:41:35', 2),
(10, 'Aline', 'Lechat', '18000', 'Bourges', '0248000000', 'alechat@gmail.com', '1989-01-17',1, 'S,R', 'CCI Châteauroux', NULL,  '2020-04-06 08:00:50', '2020-04-06 08:00:57', 3),
(11, 'Jean-François', 'Regy', '36000', 'Châteauroux', '02 54 11 11 11', 'regy@hotmail.fr','1983-12-16', 1, 'D', 'Par Serge Giner', 'Disponible que les mercredis',  '2020-04-06 08:10:17', '2021-03-05 15:36:58', 5),
(12, 'Tania', 'Blaye', '45000', 'Orléans', '02 38 22 22 33', 'taniablaye@sfr.fr', '1980-04-20',1, 'S', 'Par Serge Giner', NULL,  '2020-04-06 08:14:06', '2020-05-03 07:42:39', 4),
(13, 'Philippe', 'Alain', '45000', 'Orléans', '02 38 01 00 99', 'palain@free.fr', '1994-03-25',1, 'S', 'Linkedin', 'Suite annonce Hélène été 2019',  '2020-04-06 08:27:37', '2020-05-03 07:43:06', 3),
(15, 'Fernand', 'Lapierre', '41000', 'Blois', '02 54 32 01 55', 'fernand.l@free.fr', '1961-07-29',1, 'S,R', 'Annonce linkedin', NULL,  '2020-05-03 07:45:16', '2020-05-03 07:45:16', 6),
(16, 'Jean-Pierre', 'Touline', '36200', 'Argenton sur creuse', '02 54 11 88 67', 'jps36@sos-info.com', '1978-02-03',0, 'S,R', 'Pole emploi', NULL,  '2020-05-03 22:00:00', '2020-05-03 19:40:05', 9),
(17, 'Vivien', 'Micasse', '37000', 'Tours', '02 47 17 18 33', 'v.micasse@laposte.net','1988-10-15', 1, 'S,R', 'CCI Blois', NULL, '2020-05-03 07:48:27', '2020-05-03 07:48:27', 8),
(18, 'Thierry', 'Vosgiens', '36200', 'Ceaulmont', '02 54 47 94 96', 'tvosgiens@free.fr','1967-07-19', 1, 'S,D', 'Perso ...', 'Réseau : les bases', '2020-05-03 15:24:30', '2020-05-07 11:51:48', 5),
(25, 'Armel', 'Alain', '36270', 'Eguzon', '06 00 00 00 00', 'z@aol.com', '1969-08-17',0, 'S,R,D', NULL, NULL,  '2020-05-07 08:07:05', '2020-05-29 10:03:56', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
