-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 05 mai 2022 à 11:36
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eval01`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_time_publication` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date_time_publication`) VALUES
(7, 'bvccvnvcbnvc', 'nbvcnbcvbncvbncv', '2022-05-04 22:34:09');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_user` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `mail_user` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `motdepasse_user` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `roles_id` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo_user`, `mail_user`, `motdepasse_user`, `roles_id`, `avatar`) VALUES
(1, 'aycan', 'ladarklaster@gmail.com', 'be1f9c2c62b390a62e01f5acf8d9faca6f5d2289', 0, ''),
(2, 'azeaze', 'azeazeaze@gmail.com', 'be1f9c2c62b390a62e01f5acf8d9faca6f5d2289', 0, ''),
(3, 'azraheal', 'aycank2705@gmail.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', 1, '3.png'),
(4, 'aycan', 'fsdfsdfsdf@gmail.com', 'be1f9c2c62b390a62e01f5acf8d9faca6f5d2289', 0, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
