-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 09 mars 2021 à 17:07
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
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `intitule`, `description`, `created_at`, `updated_at`) VALUES
(1, 'WordPress', 'WordPress est un système de gestion de contenu gratuit, CMS, libre et open-source. Ce logiciel écrit en PHP repose sur une base de données MySQL', '2020-04-19 14:05:41', '2020-04-19 14:05:41'),
(2, 'PHP Orienté Objet', 'Langage de programmation ', '2020-04-19 14:05:41', '2020-04-19 14:05:41'),
(3, 'Cobol', 'Langage de programmation près de 220 milliards de lignes\r\nsoit 71% du total sont écrites en Cobol !!', '2020-04-20 06:44:24', '2020-04-20 06:44:24'),
(4, 'Langage C', 'C est un langage de programmation impératif généraliste, de bas niveau. Inventé au début des années 1970 pour réécrire UNIX, C est devenu un des langages les plus utilisés, encore de nos jours', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(5, 'JavaScript', 'JavaScript est un langage de programmation de scripts principalement employé dans les pages web interactives mais aussi pour les serveurs avec l\'utilisation de Node.js', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(6, 'Magento 2', 'Magento est une plateforme de commerce électronique libre lancée le 31 mars 2008. Elle a initialement été créée par l\'éditeur américain Varien sur les bases du Framework Zend. Plus de 250 000 commerçants dans le monde utilisent la plate-forme Magento Commerce, qui représente environ 30 % de la part de marché', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(7, 'Windows Server ', 'Microsoft Windows Server est un système d\'exploitation de Microsoft orienté serveur. ', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(8, 'Red Hat Enterprise Linux Server', 'Red Hat Enterprise Linux est la plateforme Linux d\'entreprise leader sur le marché. Il s\'agit d\'un système d\'exploitation Open Source. Il constitue la base pour faire évoluer des applications existantes et déployer des technologies émergentes, que ce soit sur des systèmes nus, des environnements virtuels, des conteneurs ou tous les types de clouds.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(9, 'CentOS', 'CentOS est une distribution GNU/Linux destinée aux serveurs. Tous ses paquets, à l\'exception du logo, sont des paquets compilés à partir des sources de la distribution RHEL, éditée par la société Red Hat. Elle est donc quasiment identique à celle-ci et se veut 100 % compatible d\'un point de vue binaire', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(10, 'Debian', 'Debian est un système d\'exploitation libre pour votre ordinateur. Un système d\'exploitation est une suite de programmes de base et d’utilitaires permettant à un ordinateur de fonctionner.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(11, 'SQL Server', 'Microsoft SQL Server est un système de gestion de base de données en langage SQL incorporant entre autres un SGBDR développé et commercialisé par la société Microsoft.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(12, 'Oracle Database', 'Oracle Database est un système de gestion de base de données relationnelle qui depuis l\'introduction du support du modèle objet dans sa version 8 peut être aussi qualifié de système de gestion de base de données relationnel-objet', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(13, 'PostgreSQL', 'PostgreSQL est un système de gestion de base de données relationnelle et objet. C\'est un outil libre disponible selon les termes d\'une licence de type BSD. Ce système est concurrent d\'autres systèmes de gestion de base de données, qu\'ils soient libres, ou propriétaires.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(14, 'MongoDB', 'MongoDB est un système de gestion de base de données orienté documents, répartissable sur un nombre quelconque d\'ordinateurs et ne nécessitant pas de schéma prédéfini des données. Il est écrit en C++', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(15, 'Microsoft Azure', 'Microsoft Azure est la plate-forme applicative en nuage de Microsoft. Son nom évoque le « cloud computing », ou informatique en nuage.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(16, 'Photoshop', 'Photoshop est un logiciel de retouche, de traitement et de dessin assisté par ordinateur, lancé en 1990 sur MacOS puis en 1992 sur Windows. Édité par Adobe, il est principalement utilisé pour le traitement des photographies numériques, mais sert également à la création ex nihilo d’images', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(17, 'Illustrator', 'Adobe Illustrator est un logiciel de création graphique vectorielle. Il fait partie de la gamme Adobe, peut être utilisé indépendamment ou en complément de Photoshop, et offre des outils de dessin vectoriel puissants. Les images vectorielles sont constituées de courbes générées par des formules mathématiques', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(18, 'HTML ', 'Le HyperText Markup Language, généralement abrégé HTML ou dans sa dernière version HTML5, est le langage de balisage conçu pour représenter les pages web. C’est un langage permettant d’écrire de l’hypertexte, d’où son nom', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(19, 'CSS', 'Les feuilles de style en cascade, généralement appelées CSS de l\'anglais Cascading Style Sheets, forment un langage informatique qui décrit la présentation des documents HTML et XML. Les standards définissant CSS sont publiés par le World Wide Web Consortium.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(20, 'Algorithmique', 'Un algorithme est une suite finie et non ambiguë d’opérations ou d\'instructions permettant de résoudre une classe de problèmes. Le mot algorithme vient du nom d\'un mathématicien perse du IXᵉ siècle, Al-Khwârizmî.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(21, 'Scrum', 'Scrum est un schéma d’organisation de développement de produits complexes. Il est défini par ses créateurs comme un « cadre de travail holistique itératif qui se concentre sur les buts communs en livrant de manière productive et créative des produits de la plus grande valeur possible ', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(22, 'PMBOK', 'Le PMBOK documente les fondamentaux et les bonnes pratiques de la gestion de projet.\r\n\r\nDu lancement d’un projet à sa clôture, en passant par la planification, l’exécution et le contrôle des tâches, ce guide détaille les différentes étapes de la vie d’un projet. Il accompagne les équipes projet en donnant la méthodologie à suivre pour estimer la charge de travail, les moyens à mettre en oeuvre et les coûts engendrés pour une réalisation optimale.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(23, 'Langage SQL', 'SQL est un langage informatique normalisé servant à exploiter des bases de données relationnelles. La partie langage de manipulation des données de SQL permet de rechercher, d\'ajouter, de modifier ou de supprimer des données dans les bases de données relationnelles', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(24, 'Adaptative Project Framework', 'La méthode APF se base sur l’apprentissage des expériences passées. Le projet se construit autour d’un Requirements Breakdown Structure (structure de répartition des exigences) afin de définir les objectifs stratégiques du projet en fonction des exigences, fonctions, sous-fonctions et fonctionnalités du produit.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(25, 'Six Sigma', 'Six Sigma est un processus d’amélioration de la qualité basé visant à réduire le nombre de défauts (dans le secteur industriel) ou les bugs (dans le développement de logiciels).\r\n\r\nUne note de « Six Sigma » indique que 99,99966% de ce qui est produit est exempt de défauts.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(26, 'GLPI', 'GLPI est un logiciel libre de gestion des services informatiques et de gestion des services d\'assistance. Cette solution libre est éditée en PHP et distribuée sous licence GPL. En tant que technologie libre, toute personne peut exécuter, modifier ou développer le code qui est libre', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(27, 'ClariLog', 'À la fois performant et simple d’utilisation, ClariLog a été conçu pour faciliter les tâches des responsables chargés de faire les inventaires et le suivi des actifs. Cet outil s’utilise de manière intuitive et offre de nombreuses possibilités aux techniciens exploitants et aux managers : inventaire automatique de tous les équipements connectés au réseau, suivi des mouvements, gestion du cycle de vie, etc.', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(28, 'Power BI', 'Power BI est un service d\'analyse commerciale de Microsoft. Il vise à fournir des visualisations interactives et des capacités de business intelligence avec une interface suffisamment simple pour que les utilisateurs finaux puissent créer leurs propres rapports et tableaux de bord', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(29, 'Laravel', 'Laravel est un framework web open-source écrit en PHP respectant le principe modèle-vue-contrôleur et entièrement développé en programmation orientée objet. Laravel est distribué sous licence MIT, avec ses sources hébergées sur GitHub', '2020-05-02 22:00:00', '2020-05-02 22:00:00'),
(30, 'IBM Système i', 'Le serveur Advanced System/400 est un mini-ordinateur de la gamme IBM. L\'AS/400 a été commercialisé le 21 juin 1988, il sera renommé eServer iSeries en 2000 puis System i5 en 2004 avec l\'arrivée des modèles pourvus de processeurs POWER5.', '2020-05-03 07:38:49', '2020-05-03 07:38:49'),
(31, 'Langage RPG', 'Le générateur automatique de programmes est un langage de programmation destiné à la gestion. Ce langage paraît sous ce nom sur les systèmes 3 d\'IBM ; existait sous le nom de RPG dans les systèmes plus anciens d\'IBM.', '2020-05-03 07:39:42', '2020-05-03 07:39:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
