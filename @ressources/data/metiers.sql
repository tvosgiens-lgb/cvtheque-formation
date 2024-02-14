-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 10 mars 2021 à 13:49
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
-- Déchargement des données de la table `metiers`
--

INSERT INTO `metiers` (`id`, `libelle`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Analyste Développeur', 'L\'analyste programmeur crée, met au point et adapte des logiciels informatiques standardisés, aux besoins des utilisateurs . Il intervient depuis la conception jusqu\'à la mise en place et l\'utilisation des logiciels, il en assure la maintenance', 'analyste-developpeur', '2020-04-20 12:02:10', '2020-04-20 12:02:10'),
(2, 'Administrateur Systèmes et Réseaux', 'Il assure à la fois l\'installation, la configuration, la disponibilité ainsi que le paramétrage des infrastructures et des logiciels informatiques et télécoms.', 'administrateur-systemes-et-reseaux', '2020-04-20 12:02:10', '2020-04-20 13:19:28'),
(3, 'Formateur Informatique', 'Spécialiste de la formation', 'formateur-informatique', '2020-04-20 12:46:14', '2020-04-20 12:46:14'),
(4, 'Web Designer', 'Le Webdesigner est chargé de concevoir et réaliser le design et l\'ergonomie d\'une interface web, en tenant compte des contraintes d\'accessibilité et d\'utilisabilité des utilisateurs.', 'web-designer', '2020-05-01 22:00:00', '2020-05-01 22:00:00'),
(5, 'Chef de projet', 'Sous la responsabilité d\'un directeur de projet, le Chef de projet conçoit, prépare et suit la réalisation de tout ou partie des projets dont il a la charge.', 'chef-de-projet', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(6, 'Responsable support', 'Le Responsable support anime les équipes de support technique et d\'assistance client. Il veille à la qualité de service apportée aux utilisateurs. ', 'responsable-support', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(8, 'Administrateur bases de données', 'L\'Administrateur bases de données conçoit, gère et administre les systèmes de gestion de données de l\'entreprise, en assure la cohérence, la qualité et la sécurité.', 'administrateur-de-bases-de-donnees', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(9, 'Technicien Informatique', 'Le Technicien Informatique intervient à la demande du personnel pour assurer l\'installation et la maintenance du parc informatique dont il a la responsabilité.', 'technicien-informatique', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(10, 'Architecte Logiciel', 'L\'architecte logiciel est un expert en informatique qui est responsable de la création et du respect du modèle d\'architecture logicielle.', 'architecte-logiciel', '2020-05-03 07:36:41', '2020-05-03 07:36:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
